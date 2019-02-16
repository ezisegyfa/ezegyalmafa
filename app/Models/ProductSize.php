<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $order
 * @property int $size
 * @property OrderInfo $orderInfo
 */
class ProductSize extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['order', 'size'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function _orderInfo()
    {
        return $this->belongsTo('App\Models\OrderInfo', 'order');
    }
}
