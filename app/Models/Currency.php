<?php

namespace App\Models;

use App\Enums\Model\CurrencyStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => CurrencyStatusEnum::class
    ];
}
