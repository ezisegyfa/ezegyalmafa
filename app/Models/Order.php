<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\ModelHelpers\ModelHelperMethods;


class Order extends Model
{
    use ModelHelperMethods;
    


    public static $renderColumnNames = ['buyer', 'product_type', 'created_at'];

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
                  'settlement',
                  'price'
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
        return $this->belongsTo('App\Models\Settlement','settlement','id');
    }

    /**
     * Get the transport for this model.
     */
    public function transport()
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

}
