<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'short_desc',
    ];

    protected $hidden = [];

    protected $casts = [];

    public function spendings()
    {
        return $this->hasMany(Spending::class, 'category_id', 'id');
    }
}
