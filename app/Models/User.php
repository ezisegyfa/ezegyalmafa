<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Helpers\ModelHelpers\ModelHelperMethods;

class User extends Authenticatable
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property string $last_activity
 * @property boolean $accepted_gdpr
 * @property boolean $isAnonymized
 * @property string $created_at
 * @property string $updated_at
 * @property Buyer[] $buyers
 * @property OrderInfo[] $orderInfos
 */
{
    use ModelHelperMethods;

    public static $renderColumnNames = ['email'];

    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'remember_token', 'last_activity', 'accepted_gdpr', 'isAnonymized', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function _buyers()
    {
        return $this->hasMany('App\Models\Buyer', 'uploader');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function _orderInfos()
    {
        return $this->hasMany('App\Models\OrderInfo', 'uploader');
    }
}
