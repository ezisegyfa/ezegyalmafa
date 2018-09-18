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

    public static $renderColumnNames = ['name'];

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
                  'region',
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
     * Get the getRegion for this model.
     */
    public function getRegion()
    {
        return $this->belongsTo('App\Models\Region','region','id');
    }

    /**
     * Get the buyer for this model.
     */
    public function buyer()
    {
        return $this->hasOne('App\Models\Buyer','settlement','id');
    }

    /**
     * Get the order for this model.
     */
    public function order()
    {
        return $this->hasOne('App\Models\Order','settlement','id');
    }



}
