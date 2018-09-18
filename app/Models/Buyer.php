<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\ModelHelpers\ModelHelperMethods;

class Buyer extends Model
{
    use ModelHelperMethods;
    


    public static $renderColumnNames = ['email'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'buyers';

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
                  'cnp',
                  'identity_seria_nr',
                  'settlement',
                  'identity_seria_type',
                  'identity_card_type',
                  'uploader',
                  'notification_type'
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
     * Get the getSettlement for this model.
     */
    public function getSettlement()
    {
        return $this->belongsTo('App\Models\Settlement','settlement','id');
    }

    /**
     * Get the getIdentityCardSeries for this model.
     */
    public function getIdentityCardSeries()
    {
        return $this->belongsTo('App\Models\IdentityCardSeries','identity_seria_type','id');
    }

    /**
     * Get the getIdentityCardType for this model.
     */
    public function getIdentityCardType()
    {
        return $this->belongsTo('App\Models\IdentityCardType','identity_card_type','id');
    }

    /**
     * Get the getUser for this model.
     */
    public function getUser()
    {
        return $this->belongsTo('App\User','uploader','id');
    }

    /**
     * Get the getNotificationType for this model.
     */
    public function getNotificationType()
    {
        return $this->belongsTo('App\Models\NotificationType','notification_type','id');
    }

    /**
     * Get the buyerObservation for this model.
     */
    public function buyerObservation()
    {
        return $this->hasOne('App\Models\BuyerObservation','buyer','id');
    }

    /**
     * Get the order for this model.
     */
    public function order()
    {
        return $this->hasOne('App\Models\Order','buyer','id');
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
