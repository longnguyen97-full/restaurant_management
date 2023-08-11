<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Item extends Model
{
    use HasFactory, Searchable;

    public $table = "items";

    protected $fillable = [
        'name', 'description', 'price', 'thumbnail', 'category_id', 'user_id'
    ];

    /**
     * Get the category that owns the item.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }

    /**
     * Get the voucher that owns the item.
     */
    public function voucher(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Voucher::class, 'voucher_id');
    }

    /**
     * Get the indexable data array for the model.
     */
    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
        ];
    }
}
