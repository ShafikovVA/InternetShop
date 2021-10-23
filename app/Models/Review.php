<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $fillable = [
        'review',
        'good_id',
        'user_id'
    ];
    public function good(){
        return $this->belongsTo(Good::class, 'good_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
