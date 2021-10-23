<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory_2 extends Model
{
    use HasFactory;

    protected $table = 'subcategories2lvl';

    protected $fillable = [
        'name',
        'slug',
        'img',
        'subcategory_id'
    ];

    public function subcategory(){
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }

    public function goods(){
        return $this->hasMany(Good::class, 'subcategory2_id');
    }

}
