<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Provider extends Model
{
    use HasFactory;
    protected $table = 'providers';
    protected $fillable = ['provider_name', 'created_by'];

    //relation to transaction
    public function providerToTransaction(): HasMany
    {
        return $this->hasMany(Transaction::class, 'provider_id', 'id');
    }
    //relation to rate
    public function rateToTransaction(): HasOne
    {
        return $this->hasOne(Rate::class, 'provider_id', 'id');
    }
}
