<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';

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
                  'quantity',
                  'buyer',
                  'product_type',
                  'uploader',
                  'city',
                  'price',
                  'car',
                  'driver'
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
     * Get the getBuyer for this model.
     */
    public function getBuyer()
    {
        return $this->belongsTo('App\Models\Buyer','buyer','id');
    }

    /**
     * Get the getProductType for this model.
     */
    public function getProductType()
    {
        return $this->belongsTo('App\Models\ProductType','product_type','id');
    }

    /**
     * Get the getUser for this model.
     */
    public function getUser()
    {
        return $this->belongsTo('App\User','uploader','id');
    }

    /**
     * Get the getSettlement for this model.
     */
    public function getSettlement()
    {
        return $this->belongsTo('App\Models\Settlement','city','id');
    }

    /**
     * Get the getCar for this model.
     */
    public function getCar()
    {
        return $this->belongsTo('App\Models\Car','car','id');
    }

    /**
     * Get the getDriver for this model.
     */
    public function getDriver()
    {
        return $this->belongsTo('App\Models\Driver','driver','id');
    }

    /**
     * Get the getTransport for this model.
     */
    public function getTransport()
    {
        return $this->hasOne('App\Models\Transport','order','id');
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

    public function getIdenitifier()
    {
        $buyer = $this->getBuyer;
        return $buyer->first_name . ' ' . $buyer->last_name . ': ' . $this->created_at; 
    }
}
