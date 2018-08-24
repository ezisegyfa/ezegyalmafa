<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuyerNotification extends Model
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
    protected $table = 'buyer_notifications';

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
                  'text',
                  'score',
                  'type',
                  'buyer'
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
     * Get the getNotificationType for this model.
     */
    public function getNotificationType()
    {
        return $this->belongsTo('App\Models\NotificationType','type','id');
    }

    /**
     * Get the getBuyer for this model.
     */
    public function getBuyer()
    {
        return $this->belongsTo('App\Models\Buyer','buyer','id');
    }



}