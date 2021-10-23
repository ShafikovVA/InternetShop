<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = 'good_image';
    
    protected $fillable = [
        'path'
         ];
    public function good(){
        return $this->belongsTo(Good::class, 'goods_id');
    }
}
