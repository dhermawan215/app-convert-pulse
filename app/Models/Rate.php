<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rate extends Model
{
    use HasFactory;
    protected $table = 'rates';
    protected $fillable = ['provider_id', 'rate_value'];

    //belong to provider
    public function rateToProvider(): BelongsTo
    {
        return $this->belongsTo(Provider::class, 'provider_id', 'id');
    }
}
