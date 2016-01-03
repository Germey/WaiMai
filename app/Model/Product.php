<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'image', 'price', 'unit', 'discount', 'remain', 'detail'];


    /**
     * Set default discount.
     *
     * @param $education
     * @return string
     */
    public function setDiscountAttribute($discount)
    {
        $this->attributes['discount'] = $discount ? $discount : 1;
    }

    /**
     * Set default discount.
     *
     * @param $education
     * @return string
     */
    public function setRemainAttribute($remain)
    {
        $this->attributes['remain'] = $remain ? $remain : 999;
    }


}
