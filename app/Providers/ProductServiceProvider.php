<?php namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use App\Model\Unit;
use View;
class ProductServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeUnits();
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
    private function composeUnits()
    {
        View::composer('product.form', function ($view) {
            $view->with([
                'units' => Unit::all()->lists('name', 'id'),
            ]);
        });
    }


    /**
     * Compose the number of decimal places of price.
     */
    private function composePriceFormat() {
        View::composer('product.list', function ($view) {
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
