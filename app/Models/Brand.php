<?php

namespace App\Models;

use App\Helpers\ModelHelpers\ModelHelperMethods;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $logo_image
 * @property string $name
 * @property Image $image
 * @property ProductTypeBrand[] $productTypeBrands
 */
class Brand extends Model
{
    use ModelHelperMethods;
    
    /**
     * @var array
     */
    protected $fillable = ['logo_image', 'name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function _image()
    {
        return $this->belongsTo('App\Models\Image', 'logo_image');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function _productTypeBrands()
    {
        return $this->hasMany('App\Models\ProductTypeBrand', 'brand');
    }
}
