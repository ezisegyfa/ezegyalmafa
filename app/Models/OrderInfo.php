<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\ModelHelpers\ModelHelperMethods;


class OrderInfo extends Model
{
    use ModelHelperMethods;
    


    public static $renderColumnNames = [];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'order_infos';

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
                  'description',
                  'sell_price',
                  'product_type_id'
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
     * Get the productType for this model.
     */
    public function productType()
    {
        return $this->belongsTo('App\Models\ProductType','product_type_id','id');
    }

    /**
     * Get the inputOrder for this model.
     */
    public function inputOrder()
    {
        return $this->hasOne('App\Models\InputOrder','order_info_id','id');
    }

    /**
     * Get the orderInfosUploadedByAdmin for this model.
     */
    public function orderInfosUploadedByAdmin()
    {
        return $this->hasMany('App\Models\OrderInfosUploadedByAdmin','order_info_id','id');
    }

    /**
     * Get the outputOrder for this model.
     */
    public function outputOrder()
    {
        return $this->hasOne('App\Models\OutputOrder','order_info_id','id');
    }

    /**
     * Get the productSize for this model.
     */
    public function productSizes()
    {
        return $this->hasMany('App\Models\ProductSize','order_id','id');
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
