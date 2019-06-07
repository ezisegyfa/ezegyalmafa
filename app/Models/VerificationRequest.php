<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerificationRequest extends Model
{
	protected $fillable = [
		'token'
	];

    public function userVerificationRequest()
    {
        return $this->hasOne('App\Models\UserVerificationRequest', 'verification_request_id', 'id');
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
