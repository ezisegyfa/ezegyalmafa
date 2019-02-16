<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $location
 * @property int $uploader
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone_number
 * @property string $adress
 * @property string $cnp
 * @property string $created_at
 * @property string $updated_at
 * @property Settlement $settlement
 * @property User $user
 * @property OutputOrder[] $outputOrders
 */
class Buyer extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['location', 'uploader', 'first_name', 'last_name', 'email', 'phone_number', 'adress', 'cnp', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function _settlement()
    {
        return $this->belongsTo('App\Models\Settlement', 'location');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function _user()
    {
        return $this->belongsTo('App\Models\User', 'uploader');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function _outputOrders()
    {
        return $this->hasMany('App\Models\OutputOrder', 'buyer');
    }
}
