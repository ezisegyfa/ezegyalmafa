<?php

namespace App\Models;

use App\Helpers\ModelHelpers\ModelHelperMethods;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $order
 * @property int $size
 * @property OrderInfo $orderInfo
 */
class ProductSize extends Model
{
    use ModelHelperMethods;
    
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
