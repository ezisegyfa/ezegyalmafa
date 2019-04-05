<?php

namespace App\Models;

use App\Helpers\ModelHelpers\ModelHelperMethods;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $order_info
 * @property OrderInfo $orderInfo
 */
class InputOrder extends Model
{
    use ModelHelperMethods;
    
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
