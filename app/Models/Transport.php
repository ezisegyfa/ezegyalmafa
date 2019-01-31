<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\ModelHelpers\ModelHelperMethods;
use Illuminate\Support\Facades\DB;

class Transport extends Model
{
    use ModelHelperMethods{
        getColumnNames as protected getOriginalColumnNames;
        getDataTableQuery as protected getOriginalDataTableQuery;
    }

    public static $renderColumnNames = ['order', 'created_at'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'transports';

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
                  'order',
                  'uploader',
                  'car',
                  'driver',
                  'stock'
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
     * Get the getOrder for this model.
     */
    public function getOrder()
    {
        return $this->belongsTo('App\Models\Order','order','id');
    }

    /**
     * Get the getUploader for this model.
     */
    public function getUploader()
    {
        return $this->belongsTo('App\User','uploader','id');
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
     * Get the getStockTransport for this model.
     */
    public function getStock()
    {
        return $this->belongsTo('App\Models\StockTransport','stock','id');
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

    public function getProfit()
    {
        return $this->getIncome() - $this->getCost();
    }

    public function getIncome()
    {
        return $this->getOrder->price * $this->quantity;
    }

    public function getCost()
    {
        return $this->getStock->average_price * $this->quantity;
    }

    public static function getColumnNames()
    {
        $columnNames = static::getOriginalColumnNames();
        array_push($columnNames, 'profit', 'income', 'cost');
        return $columnNames;
    }

    public static function getDataTableQuery($query = null)
    {
        $query = static::join('orders', 'orders.id', '=', 'transports.order')
            ->join('stock_transports', 'stock_transports.id', '=', 'transports.stock')
            ->select(
                'transports.id', 
                'transports.quantity',
                'transports.order',
                'transports.uploader',
                'transports.car',
                'transports.driver',
                'transports.stock',
                DB::raw('(orders.price - stock_transports.average_price) * transports.quantity as profit'),
                DB::raw('orders.price * transports.quantity as income'),
                DB::raw('stock_transports.average_price * transports.quantity as cost'),
                'transports.created_at',
                'transports.updated_at'
            );
        return static::getOriginalDataTableQuery($query);
    }
}
