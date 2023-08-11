<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'discount'
    ];

    /**
     * Get the items for the voucher.
     */
    public function items(): HasMany
    {
        return $this->hasMany(\App\Models\Item::class);
    }
}
