<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable = [
        'transaction_number',
        'provider_id',
        'rate',
        'pulse_amount',
        'total_pulse',
        'payment_id',
        'payment_name',
        'account_name',
        'transaction_date',
        'status_transaction',
    ];

    //relation belongs to provider
    public function transactionToProvider(): BelongsTo
    {
        return $this->belongsTo(Provider::class, 'provider_id', 'id');
    }
    //relation to payment
    public function transactionToPayment(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_id', 'id');
    }
}
