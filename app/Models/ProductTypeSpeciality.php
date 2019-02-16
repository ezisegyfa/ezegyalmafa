<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $product_type
 * @property int $product_speciality
 * @property ProductSpeciality $productSpeciality
 * @property ProductType $productType
 */
class ProductTypeSpeciality extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['product_type', 'product_speciality'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function _productSpeciality()
    {
        return $this->belongsTo('App\Models\ProductSpeciality', 'product_speciality');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function _productType()
    {
        return $this->belongsTo('App\Models\ProductType', 'product_type');
    }
}
