<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\ModelHelpers\ModelHelperMethods;


class OutputOrder extends Model
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
    protected $table = 'output_orders';

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
                  'order_info_id',
                  'buyer_id',
                  'location_id',
                  'address'
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
     * Get the orderInfo for this model.
     */
    public function orderInfo()
    {
        return $this->belongsTo('App\Models\OrderInfo','order_info_id','id');
    }

    /**
     * Get the user for this model.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User','buyer_id','id');
    }

    /**
     * Get the settlement for this model.
     */
    public function settlement()
    {
        return $this->belongsTo('App\Models\Settlement','location_id','id');
    }



}
