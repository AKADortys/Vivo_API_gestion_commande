<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ArticleOrder extends Pivot
{
    protected $fillable = [
        'article_id',
        'order_id',
        'label',
        'price',
        'quantity',
    ];
}
