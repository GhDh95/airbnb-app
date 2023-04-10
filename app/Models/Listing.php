<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Listing extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query
            ->when($filters['category'] ?? false, fn($query, $category) => $query->whereHas('category', fn($q) => $q->where('name', 'like', $category)));
    }
}
