<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserVerificationRequest extends Model
{
	protected $fillable = [
		'user_id',
		'verification_request_id'
	];
	
	public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function verificationRequest()
    {
        return $this->belongsTo('App\Models\VerificationRequest', 'verification_request_id');
    }
}
