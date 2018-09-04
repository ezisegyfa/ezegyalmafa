<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    

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
                  'remember_token'
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
     * Get the getBuyerObservation for this model.
     */
    public function getBuyerObservation()
    {
        return $this->hasOne('App\Models\BuyerObservation','uploader','id');
    }

    /**
     * Get the getBuyer for this model.
     */
    public function getBuyer()
    {
        return $this->hasOne('App\Models\Buyer','uploader','id');
    }

    /**
     * Get the getCar for this model.
     */
    public function getCar()
    {
        return $this->hasOne('App\Models\Car','uploader','id');
    }

    /**
     * Get the getDriver for this model.
     */
    public function getDriver()
    {
        return $this->hasOne('App\Models\Driver','uploader','id');
    }

    /**
     * Get the getOrder for this model.
     */
    public function getOrder()
    {
        return $this->hasOne('App\Models\Order','uploader','id');
    }

    /**
     * Get the getTransport for this model.
     */
    public function getTransport()
    {
        return $this->hasOne('App\Models\Transport','uploader','id');
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
