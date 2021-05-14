<?php


namespace App;
use App\QueryFilter;

class Filter extends QueryFilter
{
    // make filter for each input
    //func name is filter
    public function name($value){
        $this->builder->where('name','LIKE', "%$value%");
    }
    public function min($value){
        if (!empty($value)) {
            $this->builder->where('price', '>=', $value);
        }
    }
    public function max($value){
        if (!empty($value)) {
            $this->builder->where('price', '<=', $value);
        }
    }
    public function bedrooms($value){
        if (!empty($value)){
            $this->builder->where('bedrooms', $value);
        }
    }
    public function bathrooms($value){
        if (!empty($value)) {
            $this->builder->where('bathrooms', $value);
        }
    }
    public function storeys($value){
        if (!empty($value)) {
            $this->builder->where('storeys', $value);
        }
    }
    public function garages($value){
        if (!empty($value)){
        $this->builder->where('garages', $value);
            }
    }



}
