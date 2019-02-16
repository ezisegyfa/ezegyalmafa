<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $image
 * @property string $name
 * @property Image $image
 * @property ProductType[] $productTypes
 */
class ProductCategory extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['image', 'name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function _image()
    {
        return $this->belongsTo('App\Models\Image', 'image');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function _productTypes()
    {
        return $this->hasMany('App\Models\ProductType', 'category');
    }
}
