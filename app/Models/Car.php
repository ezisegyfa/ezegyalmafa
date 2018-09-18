<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\ModelHelpers\ModelHelperMethods;


class Car extends Model
{
    use ModelHelperMethods;
    


    public static $renderColumnNames = ['license_plate_number'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cars';

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
                  'license_plate_number',
                  'type',
                  'uploader'
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
     * Get the getCarType for this model.
     */
    public function getCarType()
    {
        return $this->belongsTo('App\Models\CarType','type','id');
    }

    /**
     * Get the getUser for this model.
     */
    public function getUser()
    {
        return $this->belongsTo('App\User','uploader','id');
    }

    /**
     * Get the driverCar for this model.
     */
    public function driverCar()
    {
        return $this->hasOne('App\Models\DriverCar','car','id');
    }

    /**
     * Get the transport for this model.
     */
    public function transport()
    {
        return $this->hasOne('App\Models\Transport','car','id');
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
