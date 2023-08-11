<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'description'
    ];

    /**
     * Get the items for the category.
     */
    public function items(): HasMany
    {
        return $this->hasMany(\App\Models\Item::class);
    }

    /**
     * Get the blogs for the category.
     */
    public function blogs(): HasMany
    {
        return $this->hasMany(\App\Models\Blog::class);
    }
}
