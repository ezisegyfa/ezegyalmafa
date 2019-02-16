<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $product_type
 * @property int $brand
 * @property Brand $brand
 * @property ProductType $productType
 */
class ProductTypeBrand extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['product_type', 'brand'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function _brand()
    {
        return $this->belongsTo('App\Models\Brand', 'brand');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function _productType()
    {
        return $this->belongsTo('App\Models\ProductType', 'product_type');
    }
}
