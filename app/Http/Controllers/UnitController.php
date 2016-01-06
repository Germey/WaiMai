<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UnitRequest;
use View, Redirect, Flash;
use App\Model\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('unit.index')->withUnits(Unit::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(UnitRequest $request)
    {
        $unit = Unit::create($request->all());
        if ($unit) {
            Flash::success('添加成功！');
        } else {
            Flash::error('添加失败！');
        }
        return Redirect::to('/admin/unit/');
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
    public function destroy(Unit $unit)
    {
        if ($unit->delete()) {
            Flash::success('删除成功！');
            return Redirect::to('admin/unit');
        } else {
            Flash::error('删除失败！');
            return Redirect::to('admin/unit');
        }
    }

}
