<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\ModelHelpers\ModelHelperMethods;


class Admin extends Model
{
    use ModelHelperMethods;
    


    public static $renderColumnNames = [];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'admins';

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
                  'name',
                  'email',
                  'password',
                  'remember_token'
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
     * Get the investment for this model.
     */
    public function investments()
    {
        return $this->hasMany('App\Models\Investment','owner_id','id');
    }

    /**
     * Get the orderInfosUploadedByAdmin for this model.
     */
    public function orderInfosUploadedByAdmin()
    {
        return $this->hasOne('App\Models\OrderInfosUploadedByAdmin','uploader_id','id');
    }


    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function CreatedAtAttribute($value)
    {
        return \DateTime::createFromFormat('j/n/Y g:i A', $value);

    }

    /**
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function UpdatedAtAttribute($value)
    {
        return \DateTime::createFromFormat('j/n/Y g:i A', $value);

    }

}
