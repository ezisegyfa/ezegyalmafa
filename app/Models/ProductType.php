<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $category
 * @property string $name
 * @property float $price
 * @property ProductCategory $productCategory
 * @property OrderInfo[] $orderInfos
 * @property ProductTypeBrand[] $productTypeBrands
 * @property ProductTypeImage[] $productTypeImages
 * @property ProductTypeProperty[] $productTypeProperties
 * @property ProductTypeSpeciality[] $productTypeSpecialities
 */
class ProductType extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['category', 'name', 'price'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function _productCategory()
    {
        return $this->belongsTo('App\Models\ProductCategory', 'category');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function _orderInfos()
    {
        return $this->hasMany('App\Models\OrderInfo', 'product_type');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function _productTypeBrands()
    {
        return $this->hasMany('App\Models\ProductTypeBrand', 'product_type');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function _productTypeImages()
    {
        return $this->hasMany('App\Models\ProductTypeImage', 'product_type');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function _productTypeProperties()
    {
        return $this->hasMany('App\Models\ProductTypeProperty', 'product_type');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function _productTypeSpecialities()
    {
        return $this->hasMany('App\Models\ProductTypeSpeciality', 'product_type');
    }

    public function getMainImageLink()
    {
        if (count($this->_productTypeImages) == 0)
            return Image::getDefaultLink();
        else
            return $this->_productTypeImages[0]->_image->getLink();
    }

    public function getProperties()
    {
        return $this->_productTypeProperties->map(function($property) {
            return $property->name;
        });
    }

    public function getSpecialities()
    {
        return $this->_productTypeSpecialities->map(function($speciality) {
            return $speciality->_productSpeciality->name;
        });
    }
}
