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

}
