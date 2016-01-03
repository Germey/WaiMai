<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded  = [];

    /**
     * Order to string.
     *
     * @param $education
     * @return string
     */
    public function setContentAttribute($content)
    {
        $this->attributes['content'] = serialize($content);
    }

    /**
     * Get tag list id of this article
     *
     * @return mixed
     */
    public function getContentAttribute($content) {
        $content = unserialize($content);
        $items = [];
        foreach($content as $value) {
            $product = Product::find($value['index']);
            $item['name'] = $product->name;
            $item['number'] = $value['number'];
            $item['unit'] = $product->unit;
            array_push($items, $item);
        }
        return $items;
    }

}
