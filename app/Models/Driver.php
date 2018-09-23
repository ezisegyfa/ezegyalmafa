<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\ModelHelpers\ModelHelperMethods;

class Driver extends Model
{
    use ModelHelperMethods;
    


    public static $renderColumnNames = ['last_name', 'first_name'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'drivers';

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
                  'first_name',
                  'last_name',
                  'cnp',
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
     * Get the getUploader for this model.
     */
    public function getUploader()
    {
        return $this->belongsTo('App\User','uploader','id');
    }

    /**
     * Get the driverCar for this model.
     */
    public function driverCars()
    {
        return $this->hasMany('App\Models\DriverCar','driver','id');
    }

    /**
     * Get the transport for this model.
     */
    public function transports()
    {
        return $this->hasMany('App\Models\Transport','driver','id');
    }

    public function cars()
    {
        return $this->belongsToMany('App\Models\car');
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
