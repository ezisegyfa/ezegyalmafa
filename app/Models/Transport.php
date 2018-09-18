<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\ModelHelpers\ModelHelperMethods;


class Transport extends Model
{
    use ModelHelperMethods;
    


    public static $renderColumnNames = ['order', 'created_at'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'transports';

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
                  'quantity',
                  'order',
                  'uploader',
                  'car',
                  'driver',
                  'stock'
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
     * Get the getOrder for this model.
     */
    public function getOrder()
    {
        return $this->belongsTo('App\Models\Order','order','id');
    }

    /**
     * Get the getUser for this model.
     */
    public function getUser()
    {
        return $this->belongsTo('App\User','uploader','id');
    }

    /**
     * Get the getCar for this model.
     */
    public function getCar()
    {
        return $this->belongsTo('App\Models\Car','car','id');
    }

    /**
     * Get the getDriver for this model.
     */
    public function getDriver()
    {
        return $this->belongsTo('App\Models\Driver','driver','id');
    }

    /**
     * Get the getStockTransport for this model.
     */
    public function getStockTransport()
    {
        return $this->belongsTo('App\Models\StockTransport','stock','id');
    }


    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function CreatedAtAttribute($value)
    {
        return \DateTime::createFromFormat('j/n/Y g:i A', $value);

    }

    /**
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function UpdatedAtAttribute($value)
    {
        return \DateTime::createFromFormat('j/n/Y g:i A', $value);

    }

}
