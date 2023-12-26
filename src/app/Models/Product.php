<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'category_id' ,'slug', 'price', 'is_active', 'image'];

    public function tag(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'product_tags');
    }
    
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
