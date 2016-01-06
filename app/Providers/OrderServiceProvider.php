<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View, Response, DB;

class OrderServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeDeliveryStatus();
        $this->composePriceFormat();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Get paths behind 'admin'.
     *
     * Compose sidebar variable.
     */
    private function composeDeliveryStatus()
    {
        View::composer('order.index', function ($view) {
            $view->with([
                'delivery_status' => Response::json(DB::table('delivery_statuses')->select('id as value', 'name as text')->get())->getContent()
            ]);
        });
    }


    /**
     * Compose the number of decimal places of price.
     */
    private function composePriceFormat()
    {
        View::composer(['order.preview', 'order.index'], function ($view) {
            $view->with([
                'price_format' => $this->getConfigValueByKey('price_format')
            ]);
        });
    }


    /**
     * Get config value.
     *
     * @return mixed
     */
    private function getConfigValueByKey($key)
    {
        $value = DB::table('configs')->where('key', $key)->first()->value;
        return $value;
    }

}
