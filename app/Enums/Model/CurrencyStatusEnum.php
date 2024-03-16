<?php
namespace App\Enums\Model;


enum CurrencyStatusEnum:string
{
    case STATUS_CONFIRMED = 'Confirmed';
    case STATUS_UNCONFIRMED = 'Unconfirmed';
}
