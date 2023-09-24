<?php

namespace App\Enums;

enum AssetMovementType: int 
{
    case BUY = 1;
    case SELL = 2;

    public function description(): string
    {
        return $this === self::BUY
            ? 'Compra'
            : 'Venda';    
    }

    public static function selectCases(): array
    {
        return array_map(fn (self $enum) => [
            'label' => $enum->description(),
            'value' => $enum->value
        ], self::cases());
    }
}