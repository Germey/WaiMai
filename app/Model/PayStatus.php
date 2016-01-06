<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PayStatus extends Model
{

    /**
     * Return orders belongs to this payStatus.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order()
    {
        return $this->hasMany('App\Model\Order');
    }

}
