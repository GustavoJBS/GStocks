<?php

namespace App\Models;

use App\Casts\Money;
use App\Enums\AssetMovementType;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetMovement extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    protected $casts = [
        'type' => AssetMovementType::class,
        'price' => Money::class
    ];

    public function asset() 
    {
        return $this->belongsTo(Asset::class);
    }

    public function totalAmount(): Attribute
    {
        return new Attribute(
            get: fn () => (float) $this->price * $this->quantity
        );
    }
}

