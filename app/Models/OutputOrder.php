<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $order_info
 * @property int $buyer
 * @property int $location
 * @property Buyer $buyer
 * @property Settlement $settlement
 * @property OrderInfo $orderInfo
 */
class OutputOrder extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['order_info', 'buyer', 'location'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function _buyer()
    {
        return $this->belongsTo('App\Models\Buyer', 'buyer');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function _settlement()
    {
        return $this->belongsTo('App\Models\Settlement', 'location');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function _orderInfo()
    {
        return $this->belongsTo('App\Models\OrderInfo', 'order_info');
    }
}
