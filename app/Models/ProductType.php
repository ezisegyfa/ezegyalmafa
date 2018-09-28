<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\ModelHelpers\ModelHelperMethods;


class ProductType extends Model
{
    use ModelHelperMethods;
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public static $renderColumnNames = ['material_type', 'process_type'];

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
                  'image',
                  'material_type',
                  'process_type',
                  'average_price',
                  'description'
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
     * Get the getMaterialType for this model.
     */
    public function getMaterialType()
    {
        return $this->belongsTo('App\Models\MaterialType','material_type','id');
    }

    /**
     * Get the getProcessType for this model.
     */
    public function getProcessType()
    {
        return $this->belongsTo('App\Models\ProcessType','process_type','id');
    }

    /**
     * Get the order for this model.
     */
    public function orders()
    {
        return $this->hasMany('App\Models\Order','product_type','id');
    }

    /**
     * Get the stockTransport for this model.
     */
    public function stockTransports()
    {
        return $this->hasMany('App\Models\StockTransport','product_type','id');
    }



}
