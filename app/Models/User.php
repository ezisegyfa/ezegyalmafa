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
                  'first_name',
                  'last_name',
                  'email',
                  'phone_number',
                  'adress',
                  'location_id',
                  'identity_card_serial_type_id',
                  'identity_card_serial_number',
                  'accepted_gdpr',
                  'isAnonymized',
                  'last_activity'
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
     * Get the settlement for this model.
     */
    public function settlement()
    {
        return $this->belongsTo('App\Models\Settlement','location_id','id');
    }

    /**
     * Get the identityCardSerialType for this model.
     */
    public function identityCardSerialType()
    {
        return $this->belongsTo('App\Models\IdentityCardSerialType','identity_card_serial_type_id','id');
    }

    /**
     * Get the outputOrder for this model.
     */
    public function outputOrders()
    {
        return $this->hasMany('App\Models\OutputOrder','buyer_id','id');
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
