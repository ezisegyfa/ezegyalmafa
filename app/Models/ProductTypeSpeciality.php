<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\ModelHelpers\ModelHelperMethods;


class ProductTypeSpeciality extends Model
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
    protected $table = 'product_type_specialities';

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
                  'product_type_id',
                  'product_speciality_id'
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
     * Get the productType for this model.
     */
    public function productType()
    {
        return $this->belongsTo('App\Models\ProductType','product_type_id','id');
    }

    /**
     * Get the productSpeciality for this model.
     */
    public function productSpeciality()
    {
        return $this->belongsTo('App\Models\ProductSpeciality','product_speciality_id','id');
    }



}
