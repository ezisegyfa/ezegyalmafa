<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $product_type
 * @property int $uploader
 * @property int $quantity
 * @property int $average_price
 * @property string $description
 * @property float $sell_price
 * @property string $created_at
 * @property string $updated_at
 * @property ProductType $productType
 * @property User $user
 * @property InputOrder $inputOrder
 * @property OutputOrder $outputOrder
 * @property ProductSize[] $productSizes
 */
class OrderInfo extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['product_type', 'uploader', 'quantity', 'average_price', 'description', 'sell_price', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function _productType()
    {
        return $this->belongsTo('App\Models\ProductType', 'product_type');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function _user()
    {
        return $this->belongsTo('App\Models\User', 'uploader');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function _inputOrder()
    {
        return $this->hasOne('App\Models\InputOrder', 'order_info');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function _outputOrder()
    {
        return $this->hasOne('App\Models\OutputOrder', 'order_info');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function _productSizes()
    {
        return $this->hasMany('App\Models\ProductSize', 'order');
    }
}
