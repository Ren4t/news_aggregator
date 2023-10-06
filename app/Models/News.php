<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model {

    use HasFactory;

    protected $fillable = [ // поля которые можно менять в таблице
        'title',
        'category_id',
        'author',
        'status',
        'image',
        'description'
    ];

    public function category(): BelongsTo {
        
        return $this->belongsTo(Category::class, 'category_id');
    }
    
    public function scopeStatus(Builder $query) : void{ //scope  для фильтра по статусу
        if(request()->has('f') && request()->f != 'selected'){    
            $query->where('status', request()->query('f', 'draft')); // запрос который будет применятся когда фильтр запушен
        }
    }
}
