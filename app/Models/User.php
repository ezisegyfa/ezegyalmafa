<?php

namespace App;

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
     * Get the buyerObservation for this model.
     */
    public function buyerObservation()
    {
        return $this->hasOne('App\Models\BuyerObservation','uploader','id');
    }

    /**
     * Get the buyer for this model.
     */
    public function buyer()
    {
        return $this->hasOne('App\Models\Buyer','uploader','id');
    }

    /**
     * Get the car for this model.
     */
    public function car()
    {
        return $this->hasOne('App\Models\Car','uploader','id');
    }

    /**
     * Get the driver for this model.
     */
    public function driver()
    {
        return $this->hasOne('App\Models\Driver','uploader','id');
    }

    /**
     * Get the order for this model.
     */
    public function order()
    {
        return $this->hasOne('App\Models\Order','uploader','id');
    }

    /**
     * Get the stockTransport for this model.
     */
    public function stockTransport()
    {
        return $this->hasOne('App\Models\StockTransport','uploader','id');
    }

    /**
     * Get the transport for this model.
     */
    public function transport()
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
