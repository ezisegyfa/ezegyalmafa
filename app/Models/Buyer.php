<?php

namespace App\Models;

use App\Helpers\ModelHelpers\ModelHelperMethods;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $location
 * @property int $identity_card_serial_type
 * @property int $uploader
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone_number
 * @property string $adress
 * @property string $identity_card_serial_number
 * @property string $created_at
 * @property string $updated_at
 * @property IdentityCardSerialType $identityCardSerialType
 * @property Settlement $settlement
 * @property User $user
 * @property OutputOrder[] $outputOrders
 */
class Buyer extends Model
{
    use ModelHelperMethods;

    public static $ignoredFormColumnNames = ['location', 'uploader', 'identity_card_serial_type', 'identity_card_serial_number'];

    /**
     * @var array
     */
    protected $fillable = ['location', 'identity_card_serial_type', 'uploader', 'first_name', 'last_name', 'email', 'phone_number', 'adress', 'identity_card_serial_number', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function _identityCardSerialType()
    {
        return $this->belongsTo('App\Models\IdentityCardSerialType', 'identity_card_serial_type');
    }

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
