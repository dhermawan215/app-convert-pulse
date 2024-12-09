<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $table = 'payment_methods';
    protected $fillable = ['name', 'created_by'];

    //relation to transaction
    public function paymentToTransaction(): HasMany
    {
        return $this->hasMany(Transaction::class, 'payment_id', 'id');
    }
}
