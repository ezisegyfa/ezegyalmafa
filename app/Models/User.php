<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Helpers\ModelHelpers\ModelHelperMethods;

class User extends Authenticatable
{
    use ModelHelperMethods;

    public static $renderColumnNames = ['email'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

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
                  'email',
                  'password',
                  'remember_token',
                  'last_activity',
                    'accepted_gdpr',
                    'isAnonymized'
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
     * Get the buyerObservation for this model.
     */
    public function buyerObservations()
    {
        return $this->hasMany('App\Models\BuyerObservation','uploader','id');
    }

    /**
     * Get the buyer for this model.
     */
    public function buyers()
    {
        return $this->hasMany('App\Models\Buyer','uploader','id');
    }

    /**
     * Get the car for this model.
     */
    public function cars()
    {
        return $this->hasMany('App\Models\Car','uploader','id');
    }

    /**
     * Get the driver for this model.
     */
    public function drivers()
    {
        return $this->hasMany('App\Models\Driver','uploader','id');
    }

    /**
     * Get the order for this model.
     */
    public function orders()
    {
        return $this->hasMany('App\Models\Order','uploader','id');
    }

    /**
     * Get the stockTransport for this model.
     */
    public function stockTransports()
    {
        return $this->hasMany('App\Models\StockTransport','uploader','id');
    }

    /**
     * Get the transport for this model.
     */
    public function transports()
    {
        return $this->hasMany('App\Models\Transport','uploader','id');
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
