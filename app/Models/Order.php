<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\ModelHelpers\ModelHelperMethods;
use Illuminate\Support\Facades\DB;


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
                  'address',
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
     * Get the getUploader for this model.
     */
    public function getUploader()
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
    public function transports()
    {
        return $this->hasMany('App\Models\Transport','order','id');
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

    public static function getUncomplitedOrdersQuery()
    {
        return static::leftJoin('transports', 'orders.id', '=', 'transports.order')
            ->select(
                'orders.id', 
                DB::raw('IF(ISNULL(SUM(transports.quantity)), orders.quantity, orders.quantity - SUM(transports.quantity)) AS quantity'), 
                'orders.buyer', 
                'orders.product_type', 
                'orders.uploader', 
                'orders.settlement', 
                'orders.price', 
                'orders.created_at', 
                'orders.updated_at'
            )
            ->groupBy('orders.id', 'orders.quantity', 'orders.buyer', 'orders.product_type', 'orders.uploader', 'orders.settlement', 'orders.price', 'orders.created_at', 'orders.updated_at')
            ->havingRaw('ISNULL(SUM(transports.quantity)) OR orders.quantity > SUM(transports.quantity) ');
    }

}
