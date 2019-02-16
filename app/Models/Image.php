<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $original_link
 * @property Brand[] $brands
 * @property ProductCategory[] $productCategories
 * @property ProductTypeImage[] $productTypeImages
 */
class Image extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'original_link'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function _brands()
    {
        return $this->hasMany('App\Models\Brand', 'logo_image');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function _productCategories()
    {
        return $this->hasMany('App\Models\ProductCategory', 'image');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function _productTypeImages()
    {
        return $this->hasMany('App\Models\ProductTypeImage', 'image');
    }

    public function getLink()
    {
        return join_paths(url('images'), 'webshop', $this->name);
    }

    public static function getDefaultLink()
    {
        return join_paths(url('images'), 'webshop', 'defaultImage.png');
    }
}
