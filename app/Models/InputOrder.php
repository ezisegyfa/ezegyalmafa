<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $order_info
 * @property OrderInfo $orderInfo
 */
class InputOrder extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['order_info'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function _orderInfo()
    {
        return $this->belongsTo('App\Models\OrderInfo', 'order_info');
    }
}
