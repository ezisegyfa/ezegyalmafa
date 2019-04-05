<?php

namespace App\Models;

use App\Helpers\ModelHelpers\ModelHelperMethods;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property Buyer[] $buyers
 */
class IdentityCardSerialType extends Model
{
    use ModelHelperMethods;

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function _buyers()
    {
        return $this->hasMany('App\Models\Buyer', 'identity_card_serial_type');
    }
}
