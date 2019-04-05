<?php

namespace App\Models;

use App\Helpers\ModelHelpers\ModelHelperMethods;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $region
 * @property string $name
 * @property int $post_code
 * @property Region $region
 * @property Buyer[] $buyers
 * @property OutputOrder[] $outputOrders
 */
class Settlement extends Model
{
    use ModelHelperMethods;
    
    /**
     * @var array
     */
    protected $fillable = ['region', 'name', 'post_code'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function _region()
    {
        return $this->belongsTo('App\Models\Region', 'region');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function _buyers()
    {
        return $this->hasMany('App\Models\Buyer', 'location');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function _outputOrders()
    {
        return $this->hasMany('App\Models\OutputOrder', 'location');
    }
}
