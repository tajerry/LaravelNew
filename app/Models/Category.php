<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $casts = [
        'isActive' => 'boolean'
    ];
    protected $table ='categories';
    protected $fillable = [
        'title', 'description'
    ];
    public function scopeActive($query){
        return $query->where('is_active', true);
    }
    public function news(): HasMany
    {
        return $this->hasMany(News::class, 'category_id', 'id');
    }
}
