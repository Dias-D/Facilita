<?php

namespace App\Enums;

enum BorrowingStatusEnum: string
{
    case LATE = 'Atrasado';
    case RETURNED = 'Devolvido';

    public static function values(): array
    {
        return array_column(self::cases(), 'value', 'name');
    }

    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function fromName(string $name): string
    {
        foreach (self::cases() as $status) {
            if ($name === $status->name) {
                return $status->value;
            }
        }
    }
}
