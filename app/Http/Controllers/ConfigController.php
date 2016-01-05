<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConfigRequest;
use App\Model\Config;
use View, Redirect, Flash;
use Illuminate\Http\Request;

class ConfigController extends Controller
{

    private $config_items = [
        'title',
        'subtitle',
        'description',
        'order_start',
        'order_end',
        'start_price',
        'delivery_price',
        'package_price',
        'price_format',
        'on_business',
    ];

    /**
     * Index to config.
     *
     * @return mixed
     */
    public function index()
    {
        return Redirect::to('/admin/config/edit');
    }

    /**
     * Get config page.
     *
     * @return mixed
     */
    public function getEdit()
    {
        return View::make('config.edit')->with([
            'configs' => Config::all()->toArray(),
            'config_items' => $this->config_items,
        ]);
    }

    public function postUpdate(ConfigRequest $request)
    {
        $configs = $request->all();
        foreach($configs as $key => $value) {
            Config::where('key', '=', $key)->update(['value' => $value]);
        }
        Flash::success('修改成功！');
        return Redirect::to('/admin/config/edit');
    }

}
