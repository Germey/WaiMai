<?php namespace App\Providers;

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
                'units' => Unit::all()->lists('name', 'name'),
            ]);
        });
    }

}
