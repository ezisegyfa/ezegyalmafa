<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\ModelHelpers\ModelHelperMethods;


class IdentityCardSeries extends Model
{
    use ModelHelperMethods;
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public static $renderColumnNames = ['name'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'identity_card_series';

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
                  'name'
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
     * Get the buyer for this model.
     */
    public function buyer()
    {
        return $this->hasOne('App\Models\Buyer','identity_seria_type','id');
    }



}
