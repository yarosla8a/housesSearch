<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $houses = House::all();
        return view('index', compact('houses'));
    }

}
