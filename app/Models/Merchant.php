<?php

namespace App\Models;

use App\Notifications\MerchantEmailVerification;
use Illuminate\Support\Facades\URL;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Merchant  extends Authenticatable implements MustVerifyEmail
{
    
    use HasFactory, Notifiable;

    public function sendEmailVerificationNotification()
    {
        if(config('verification.way') == 'email'){
             $url= URL::temporarySignedRoute(
            'merchant.verification.verify',
             now()->addMinutes(30), 
             [
               'id'=> $this->getKey(),
                'hash'=> sha1($this->getEmailForVerification())
            ]
        );
        $this->notify(new MerchantEmailVerification($url));
        }
      
    }

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
