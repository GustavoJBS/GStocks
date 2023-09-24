<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Asset extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function movements(): HasMany 
    {
        return $this->hasMany(AssetMovement::class)
            ->where('user_id', auth()->user()->id)
            ->orderByDesc();
    }
}
