<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    
    public function news(): HasMany { 
        // метод извлечет все новости связанные с категорией        
        return $this->hasMany(News::class, 'category_id'); // отношение один ко многим
        // News::class - имя класса связанной модели , 'category_id' имя поля по которому идет связь
    }
}
