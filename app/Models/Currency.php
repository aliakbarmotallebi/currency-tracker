<?php

namespace App\Models;

use App\Enums\Model\CurrencyStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    protected $casts = [
        'status' => CurrencyStatusEnum::class
    ];

    public function scopeAvailable($query)
    {
        return $query->whereStatus(CurrencyStatusEnum::STATUS_CONFIRMED->value);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
