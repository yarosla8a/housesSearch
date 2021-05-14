<?php

namespace App\Http\Controllers;

use App\Filter;
use App\Models\House;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request, Filter $filters){
//        $houses = House::all();
//        $houses = DB::table('houses');
//        $houses =(new Filter($houses, $request))->apply()->get();
          $houses = House::filter($filters)->get();
        if ($request->expectsJson()){

                return response()->json($houses->toArray());


        }
        return view('index', compact('houses'));
    }

}
