<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DeliveryStatus extends Model {

    /**
     * Return orders belongs to this deliveryStatus.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order() {
        return $this->hasMany('App\Model\Order');
    }

}
