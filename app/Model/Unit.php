<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array2s
     */
    protected $fillable = ['name'];


    /**
     * Return products which have this unit.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product()
    {
        return $this->hasMany('App\Model\Product');
    }

}
