<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property ProductTypeSpeciality[] $productTypeSpecialities
 */
class ProductSpeciality extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function _productTypeSpecialities()
    {
        return $this->hasMany('App\Models\ProductTypeSpeciality', 'product_speciality');
    }
}
