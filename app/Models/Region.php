<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $code
 * @property Settlement[] $settlements
 */
class Region extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'code'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function _settlements()
    {
        return $this->hasMany('App\Models\Settlement', 'region');
    }
}
