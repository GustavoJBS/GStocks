<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Akaunting\Money\Currency;
use Akaunting\Money\Money;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
    ];

    public function assetMovements(): HasMany
    {
        return $this->hasMany(AssetMovement::class);      
    }

    public function currentBalance(): Attribute
    {
        return new Attribute(
            get: function () {
                $userBalance = Asset::withWhereHas('movements')->get()
                    ->reduce(function ($accumulatorBalance, Asset $asset) {
                        return $accumulatorBalance + $asset->currentBalance ;
                    }, 0);

                $userBalance = (new Money(
                        $userBalance,
                        (new Currency('BRL')),
                        true,
                    ))->format();

                return $userBalance;
            }
        );
    }
}
