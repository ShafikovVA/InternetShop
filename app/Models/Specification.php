<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    use HasFactory;
    protected $table = 'specifications';
    
    protected $fillable = [
        'name',
        'value'
    ];
    public function specification_title(){
        return $this->belongsTo(Specification_title::class, 'specification_title_id');
    }
}
