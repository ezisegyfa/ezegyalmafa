<?php

namespace App\Models;

use App\Helpers\ModelHelpers\ModelHelperMethods;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $image
 * @property int $product_type
 * @property Image $image
 * @property ProductType $productType
 */
class ProductTypeImage extends Model
{
    use ModelHelperMethods;
    
    /**
     * @var array
     */
    protected $fillable = ['image', 'product_type'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function _image()
    {
        return $this->belongsTo('App\Models\Image', 'image');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function _productType()
    {
        return $this->belongsTo('App\Models\ProductType', 'product_type');
    }
}
