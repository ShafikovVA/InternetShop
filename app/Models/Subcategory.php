<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    
    protected $table = 'subcategories';
    
    protected $fillable = [
        'name',
        'slug',
        'img',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function goods(){
        return $this->hasMany(Good::class, 'subcategory_id');
    }

    public function subcategories(){
        return $this->hasMany(Subcategory_2::class, 'subcategory_id');
    }
}
