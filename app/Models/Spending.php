<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spending extends Model
{

    use HasFactory;

    protected $fillable = [
        'category_id',
        'created_by',
        'name',
        'amount',
        'used_date',
        'note',
    ];

    protected $hidden = [];

    protected $casts = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id')
            ->withDefault([
                'name' => 'n/a',
                'email' => 'n/a',
            ]);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function scopeOfOwner($query)
    {
        return $query->whereBelongsTo(auth()->user());
    }

    public function formatAmount()
    {
        return number_format($this->amount) . 'đ';
    }

    public function formatCategory()
    {
        return $this->category->name;
    }
}
