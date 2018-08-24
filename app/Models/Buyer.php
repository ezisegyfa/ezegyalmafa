<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
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
                  'seria_nr',
                  'city',
                  'seria',
                  'identity_card_type'
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
     * Get the getCity for this model.
     */
    public function getCity()
    {
        return $this->belongsTo('App\Models\City','city','id');
    }

    /**
     * Get the getIdentityCardSeries for this model.
     */
    public function getIdentityCardSeries()
    {
        return $this->belongsTo('App\Models\IdentityCardSeries','seria','id');
    }

    /**
     * Get the getIdentityCardType for this model.
     */
    public function getIdentityCardType()
    {
        return $this->belongsTo('App\Models\IdentityCardType','identity_card_type','id');
    }

    /**
     * Get the getBuyerNotification for this model.
     */
    public function getBuyerNotification()
    {
        return $this->hasOne('App\Models\BuyerNotification','buyer','id');
    }

    /**
     * Get the getOrder for this model.
     */
    public function getOrder()
    {
        return $this->hasOne('App\Models\Order','buyer','id');
    }



}
