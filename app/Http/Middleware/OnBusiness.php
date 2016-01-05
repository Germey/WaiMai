<?php namespace App\Http\Middleware;

use Closure;
use DB;

class OnBusiness
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        if (!$this->isOnBusiness()) {
//            return 'shabi';
//        }
        return $next($request);
    }


    /**
     * Return if it is on business.
     * when both of the two variable is true.
     *
     * @return bool
     */
    private function isOnBusiness()
    {
        $time_business = $this->dealBusinessTime();
        $on_business = $this->dealBusinessSwitch();
        return $time_business && $on_business;
    }

    /**
     * Confirm if now time is between the start and end time.
     * If yes, return true. else return false.
     *
     * @return bool
     */
    private function dealBusinessTime()
    {
        $order_start = $this->getConfigValueByKey('order_start');
        $order_end = $this->getConfigValueByKey('order_end');
        $start_time = strtotime($order_start);
        $end_time = strtotime($order_end);
        if ($start_time > $end_time) {
            $end_time += 86400;
        }
        if (time() > $start_time && time() < $end_time) {
            return true;
        }
        return false;
    }

    /**
     * Deal with on business or not.
     * A variable controlled by user.
     *
     * @return mixed
     */
    private function dealBusinessSwitch()
    {
        return $this->getConfigValueByKey('on_business');
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
