<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
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
        //
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
        dd($request->all());
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

    public function postSubmit(Request $request) {
        dd($request->all());
    }


    public function postPreview(Request $request)
    {
        list($items, $total) = $this->getOrderInfo($request);
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
    private function getOrderInfo(Request $request)
    {
        $order = $request->get('order', []);
        $items = [];
        $total['price'] = 0;
        $total['number'] = 0;
        foreach ($order as $o) {
            $product = Product::find($o['index']);
            $item['index'] = $o['index'];
            $item['name'] = $product->name;
            $item['price'] = $product->price * $product->discount * $o['number'];
            $item['unit'] = $product->unit;
            $item['number'] = $o['number'];
            array_push($items, $item);
            $total['price'] += $item['price'];
            $total['number'] += $o['number'];
        }
        return array($items, $total);
    }

}
