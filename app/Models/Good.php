<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Buider;

class Good extends Model
{
    use HasFactory;
    protected $table = 'goods';
    
    protected $fillable = [
        'name',
        'price',
        'description',
        'quantity',
        'img',
        'is_popular'
    ];
    public function subcategory(){
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function subcategory2(){
        return $this->belongsTo(Subcategory2::class, 'subcategory2_id');
    }
    public function images(){
        return $this->hasMany(Image::class, 'goods_id');
    }
    public function reviews(){
        return $this->hasMany(Review::class, 'good_id');
    }
    public function specification_titles(){
        return $this->hasMany(Specification_title::class, 'goods_id');
    }
    public function scopeFilter(Buider $buider, QueryFilter $filter){
        return $filter->apply($buider);
    }
}
