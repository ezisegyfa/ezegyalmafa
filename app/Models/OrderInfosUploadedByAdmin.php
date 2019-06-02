<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\ModelHelpers\ModelHelperMethods;


class OrderInfosUploadedByAdmin extends Model
{
    use ModelHelperMethods;
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public static $renderColumnNames = [];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'order_infos_uploaded_by_admin';

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
                  'uploader_id',
                  'order_info_id'
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
     * Get the admin for this model.
     */
    public function admin()
    {
        return $this->belongsTo('App\Models\Admin','uploader_id','id');
    }

    /**
     * Get the orderInfo for this model.
     */
    public function orderInfo()
    {
        return $this->belongsTo('App\Models\OrderInfo','order_info_id','id');
    }



}
