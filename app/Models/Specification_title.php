<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specification_title extends Model
{
    use HasFactory;
    protected $table = 'specification_title';
    
    protected $fillable = [
        'name'
       
    ];
    public function good(){
        return $this->belongsTo(Good::class, 'goods_id');
    }
    public function specifications(){
        return $this->hasMany(Specification::class, 'specification_title_id');
    }
    
}
