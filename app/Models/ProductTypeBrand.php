<?php

namespace App\Models;

use App\Helpers\ModelHelpers\ModelHelperMethods;
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
    use ModelHelperMethods;
    
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
