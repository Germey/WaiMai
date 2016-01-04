<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Illuminate\Http\Request;

class SidebarServiceProvider extends ServiceProvider {

    /**
     * The adminPath array.
     *
     * @array Guard
     */
    private $admin_path;

    /**
     * The menuItem array.
     *
     * @array Guard
     */
    private $menu_items;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Request $request) {
        $this->admin_path = $this->getRequestPath($request);
        $this->composeSidebar();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Get paths behind 'admin'.
     *
     * Compose sidebar variable.
     */
    private function composeSidebar() {
        View::composer('admin.sidebar', function ($view) {
            $view->with([
                'admin_path' => $this->getAdminPath(),
                'menu_items' => $this->getMenuItems(),
            ]);
        });
    }

    /**
     * Get paths behind 'admin'.
     *
     * @param $request
     */
    private function getRequestPath($request) {
        $uri = $request->server()['REQUEST_URI'];
        $paths = explode('/', $uri);
        if (in_array('admin', $paths)) {
            $requestPath = array_slice($paths, 2);
            return $requestPath;
        }
    }

    /**
     * Return adminPath;
     *
     * @return mixed
     */
    public function getAdminPath() {
        return $this->admin_path;
    }

    /**
     * @return mixed
     */
    public function getMenuItems() {
        $this->menu_items = [
            ['path' => '', 'text' => '首页', 'icon' => 'signal'],
            ['path' => 'product', 'text' => '商品管理', 'icon' => 'signal'],
            ['path' => 'order', 'text' => '订单管理', 'icon' => 'signal'],
            ['path' => 'shop', 'text' => '店铺管理', 'icon' => 'signal'],

        ];
        return $this->menu_items;
    }


}
