<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price',
        'total_quantity',
        'total_discount',
        'is_confirmed',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class)->using(ArticleOrder::class)->withPivot('label', 'price', 'quantity', 'created_at', 'updated_at');
    }
}
