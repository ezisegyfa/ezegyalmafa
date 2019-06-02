<?php

namespace App\Models;

use App\Helpers\ModelHelpers\ModelHelperMethods;
use App\Models\Image;
use Illuminate\Database\Eloquent\Model;


class ProductType extends Model
{
    use ModelHelperMethods;
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public static $renderColumnNames = [];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_types';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'name',
                  'price',
                  'category_id'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the productCategory for this model.
     */
    public function productCategory()
    {
        return $this->belongsTo('App\Models\ProductCategory','category_id','id');
    }

    /**
     * Get the orderInfo for this model.
     */
    public function orderInfos()
    {
        return $this->hasMany('App\Models\OrderInfo','product_type_id','id');
    }

    /**
     * Get the productTypeBrand for this model.
     */
    public function productTypeBrand()
    {
        return $this->hasOne('App\Models\ProductTypeBrand','product_type_id','id');
    }

    /**
     * Get the productTypeImage for this model.
     */
    public function productTypeImages()
    {
        return $this->hasMany('App\Models\ProductTypeImage','product_type_id','id');
    }

    /**
     * Get the productTypeProperty for this model.
     */
    public function productTypeProperties()
    {
        return $this->hasMany('App\Models\ProductTypeProperty','product_type_id','id');
    }

    /**
     * Get the productTypeSpeciality for this model.
     */
    public function productTypeSpecialities()
    {
        return $this->hasMany('App\Models\ProductTypeSpeciality','product_type_id','id');
    }

    public function getMainImageLink()
    {
        if (count($this->productTypeImages) == 0)
            return Image::getDefaultLink();
        else
            return $this->productTypeImages[0]->image->getLink();
    }

    public function getPropertyNames()
    {
        return $this->productTypeProperties->map(function($property) {
            return $property->name;
        });
    }

    public function getSpecialityNames()
    {
        return $this->productTypeSpecialities->map(function($speciality) {
            return $speciality->productSpeciality->name;
        });
    }
}
