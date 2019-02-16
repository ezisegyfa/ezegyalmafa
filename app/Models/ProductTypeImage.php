<?php

namespace App\Models;

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
