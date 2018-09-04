<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuyerObservation extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'buyer_observations';

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
                  'buyer',
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
     * Get the getObservationType for this model.
     */
    public function getObservationType()
    {
        return $this->belongsTo('App\Models\ObservationType','type','id');
    }

    /**
     * Get the getBuyer for this model.
     */
    public function getBuyer()
    {
        return $this->belongsTo('App\Models\Buyer','buyer','id');
    }

    /**
     * Get the getUser for this model.
     */
    public function getUser()
    {
        return $this->belongsTo('App\User','uploader','id');
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
