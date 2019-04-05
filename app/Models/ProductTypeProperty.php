<?php

namespace App\Models;

use App\Helpers\ModelHelpers\ModelHelperMethods;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $product_type
 * @property string $name
 * @property ProductType $productType
 */
class ProductTypeProperty extends Model
{
    use ModelHelperMethods;
    
    /**
     * @var array
     */
    protected $fillable = ['product_type', 'name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function _productType()
    {
        return $this->belongsTo('App\Models\ProductType', 'product_type');
    }
}
