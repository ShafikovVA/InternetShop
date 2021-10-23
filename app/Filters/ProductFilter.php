<?php

namespace App\Filters;

class ProductFilter extends QueryFilter{
    public function price($from, $to){
        return $this->builder->where('price', '>=', $from)->where('price', '<=', $to);
    }

}