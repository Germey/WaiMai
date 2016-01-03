<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Model\Product;
use Illuminate\Http\Request;
use View, Validator, Auth, Flash, Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('product.index')->withProducts(Product::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->all());
        if ($product) {
            Flash::success('发布成功！');
            return Redirect::to('/admin/product/'.$product->id.'/edit');
        } else {
            Flash::error('发布失败！');
            return Redirect::back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Response
     * @internal param int $id
     */
    public function show(Product $product)
    {
        return View::make('product.show')->withProduct($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit(Product $product)
    {
        return View::make('product.edit')->withProduct($product);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param Product $product
     * @return mixed
     */
    public function update(ProductRequest $request, Product $product)
    {
        //dd($request->all());
        $product->update($request->all());
        if ($product) {
            Flash::success('修改成功！');
            return Redirect::to('/admin/product/'.$product->id.'/edit');
        } else {
            Flash::error('修改失败！');
            return Redirect::back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(Product $product)
    {
        if ($product->delete()) {
            Flash::success('删除成功！');
            return Redirect::to('admin/product');
        } else {
            Flash::error('删除失败！');
            return Redirect::to('admin/product');
        }
    }


    /**
     * List all of the products.
     *
     * @return mixed
     */
    public function lists()
    {
        return View::make('product.list')->withProducts(Product::all());
    }

}
