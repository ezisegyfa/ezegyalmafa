<?php

namespace App\Models;

use App\Helpers\ModelHelpers\ModelHelperMethods;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property ProductTypeSpeciality[] $productTypeSpecialities
 */
class ProductSpeciality extends Model
{
    use ModelHelperMethods;
    
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
