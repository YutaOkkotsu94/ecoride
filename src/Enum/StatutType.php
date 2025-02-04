<?php

declare(strict_types=1);

namespace App\Enum;

enum StatutType: string
{
    case COMPLET = 'complet';
    case DISPONIBLE = 'disponible';
}