<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\ModelHelpers\ModelHelperMethods;
use Illuminate\Support\Facades\DB;

class Buyer extends Model
{
    use ModelHelperMethods{
        getColumnNames as protected getOriginalColumnNames;
        getDataTableQuery as protected getOriginalDataTableQuery;
    }

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
    public function getIdentitySeriaType()
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
     * Get the getUploader for this model.
     */
    public function getUploader()
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
    public function buyerObservations()
    {
        return $this->hasMany('App\Models\BuyerObservation','buyer','id');
    }

    /**
     * Get the order for this model.
     */
    public function orders()
    {
        return $this->hasMany('App\Models\Order','buyer','id');
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

    public static function getColumnNames()
    {
        $columnNames = static::getOriginalColumnNames();
        array_push($columnNames, 'profit', 'income', 'cost');
        return $columnNames;
    }

    public static function getDataTableQuery()
    {
        $query = static::join('orders', 'orders.buyer', '=', 'buyers.id')
            ->join('transports', 'orders.id', '=', 'transports.order')
            ->join('stock_transports', 'stock_transports.id', '=', 'transports.stock')
            ->select(
                'buyers.id', 
                'buyers.first_name',
                'buyers.last_name',
                'buyers.email',
                'buyers.phone_number',
                'buyers.adress',
                'buyers.cnp',
                'buyers.identity_seria_nr',
                'buyers.settlement',
                'buyers.identity_seria_type',
                'buyers.identity_card_type',
                'buyers.uploader',
                'buyers.notification_type',
                DB::raw('SUM(transports.quantity * orders.price) - SUM(stock_transports.average_price * transports.quantity) AS profit'),
                DB::raw('SUM(transports.quantity * orders.price) AS income'),
                DB::raw('SUM(stock_transports.average_price * transports.quantity) as cost'),
                'buyers.created_at',
                'buyers.updated_at'
            )
            ->groupBy('buyers.id');
        return static::getOriginalDataTableQuery($query);
    }

}
