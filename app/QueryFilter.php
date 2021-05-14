<?php


namespace App;


use Illuminate\Http\Request;

abstract class QueryFilter
{
    protected $builder;
    protected $request;
    public function __construct(Request $request){
       // $this->builder =$builder;
        $this->request =$request;
    }
    public function apply($builder){
        //dd($this->filters());
        $this->builder=$builder;
        foreach ($this->filters() as $f=>$value){
        //call methods from class(Filter) where we input data
            if (method_exists($this, $f)){
                $this->$f($value);
            }
        }
        return $this->builder;
    }
    public function filters(){
        return $this->request->all();
    }
}
