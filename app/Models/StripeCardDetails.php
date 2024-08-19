<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StripeCardDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'stripe_customer_id',
        'card_last_four',
        'card_brand',
        'encrypted_card_number',
        'encrypted_cvv',
        'card_expiration_date'
    ];
}
