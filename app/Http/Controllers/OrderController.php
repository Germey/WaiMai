<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View, Redirect, Response;
use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\Product;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('order.index')->withOrders(Order::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $result = $request->all();
        list($items, $total) = $this->getOrderInfo($request, 'content');
        $extra = ['identifier' => time() . $request->get('phone', '')];
        $result = array_merge($result, $total, $extra);
        $order = Order::create($result);
        if ($order) {
            return Redirect::to('/pay')->withOrder($order);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Preview the order.
     *
     * @param Request $request
     * @return mixed
     */
    public function postPreview(Request $request)
    {
        list($items, $total) = $this->getOrderInfo($request, 'order');
        return View::make('order.preview')->with([
            'items' => $items,
            'total' => $total,
        ]);
    }

    /**
     * Get order info by info posted.
     *
     * @param Request $request
     * @return array
     */
    private function getOrderInfo(Request $request, $key)
    {
        $order = $request->get($key, []);
        $items = [];
        $total['price'] = 0;
        $total['number'] = 0;
        foreach ($order as $o) {
            $product = Product::find($o['index']);
            $item['index'] = $o['index'];
            $item['name'] = $product->name;
            $item['price'] = $product->price * $product->discount * $o['number'];
            $item['unit'] = $product->getUnit->name;
            $item['number'] = $o['number'];
            array_push($items, $item);
            $total['price'] += $item['price'];
            $total['number'] += $o['number'];
        }
        return array($items, $total);
    }

    /**
     * Editable ajax change status.
     *
     * @param Request $request
     * @return mixed
     */
    public function postChangeStatus(Request $request)
    {
        $data = $request->all();
        if (Order::where('id', '=', $data['pk'])->update([
            'delivery_status' => $data['value']
        ])
        ) {
            return Response::json(['status' => 200]);
        } else {
            return Response::json(['status' => 502]);
        };

    }

}
