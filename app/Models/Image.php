<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\ModelHelpers\ModelHelperMethods;


class Image extends Model
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
    protected $table = 'images';

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
                  'original_link'
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
     * Get the brand for this model.
     */
    public function brands()
    {
        return $this->hasMany('App\Models\Brand','logo_image_id','id');
    }

    /**
     * Get the productCategory for this model.
     */
    public function productCategories()
    {
        return $this->hasMany('App\Models\ProductCategory','image_id','id');
    }

    /**
     * Get the productTypeImage for this model.
     */
    public function productTypeImage()
    {
        return $this->hasOne('App\Models\ProductTypeImage','image_id','id');
    }

    public function getLink()
    {
        return join_paths(url('images'), 'webshop', 'products', $this->name);
    }

    public static function getDefaultLink()
    {
        return join_paths(url('images'), 'webshop', 'defaultImage.png');
    }

}
