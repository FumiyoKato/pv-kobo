<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'phone',
        'name_incharge',
        'delivery_email',
        'on_service',
        'registered_at',
        'revised_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'on_service' => 'boolean',
        'registered_at' => 'datetime',
        'revised_at' => 'datetime',
    ];

    /**
     * Customize the names of the timestamp columns.
     */
    const CREATED_AT = 'registered_at';
    const UPDATED_AT = 'revised_at';

    /**
     * リレーション: User has many ForecastUnits.
     */
    public function forecastUnits()
    {
        return $this->hasMany(ForecastUnit::class, 'user_id');
    }
}
