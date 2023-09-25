<?php

namespace App\Models;

use App\Casts\Money;
use App\Facades\Services\Stocks;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Asset extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'last_price' => Money::class,
    ];

    public function movements(): HasMany 
    {
        return $this->hasMany(AssetMovement::class)
            ->where('user_id', auth()->user()->id)
            ->orderByDesc('date');
    }

    public function assetQuantity(): Attribute
    {
        return new Attribute(
            get: fn () => $this->movements->reduce(function (int $accumulator, AssetMovement $assetMovement) {
                return $assetMovement->type->isBuy()
                    ? $accumulator + $assetMovement->quantity
                    : $accumulator - $assetMovement->quantity;
            }, 0)
        );
    }

    public function assetValue(): Attribute
    {
        return new Attribute(
            get: function () {
                if (!$this->last_price || now()->diffInMinutes($this->updated_at) > 20) {
                    $lastPrice = str(collect(Stocks::searchTicker($this->code))->first()['price'])
                        ->replace(',', '.')
                        ->value();

                    $this->last_price = $lastPrice;

                    $this->save();
        
                    return $this->last_price;
                }

                return $this->last_price;
                
            } 
        );
    }
}
