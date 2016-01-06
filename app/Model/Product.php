<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{


    use SoftDeletes;

    /**
     * Dates for softDeletes.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var arrays
     */
    protected $fillable = ['name', 'image', 'price', 'unit', 'discount', 'remain', 'detail', 'max'];

    /**
     * Set default discount.
     *
     * @param $discount
     */
    public function setDiscountAttribute($discount)
    {
        $this->attributes['discount'] = $discount != '' ? $discount : 1;
    }

    /**
     * Set default remain.
     *
     * @param $remain
     */
    public function setRemainAttribute($remain)
    {
        $this->attributes['remain'] = $remain ? $remain : 999;
    }

    /**
     * Set default max num.
     *
     * @param $max
     */
    public function setMaxAttribute($max)
    {
        $this->attributes['max'] = $max ? $max : 999;
    }


    /**
     * Return the unit this belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getUnit()
    {
        return $this->belongsTo('App\Model\Unit', 'unit');
    }


}
