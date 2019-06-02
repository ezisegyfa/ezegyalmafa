<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\ModelHelpers\ModelHelperMethods;


class Settlement extends Model
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
    protected $table = 'settlements';

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
                  'region_id',
                  'post_code'
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
     * Get the region for this model.
     */
    public function region()
    {
        return $this->belongsTo('App\Models\Region','region_id','id');
    }

    /**
     * Get the outputOrder for this model.
     */
    public function outputOrders()
    {
        return $this->hasMany('App\Models\OutputOrder','location_id','id');
    }

    /**
     * Get the user for this model.
     */
    public function users()
    {
        return $this->hasMany('App\Models\User','location_id','id');
    }



}
