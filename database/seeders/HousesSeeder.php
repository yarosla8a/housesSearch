<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class HousesSeeder extends Seeder
{
//    public function _construct(){
//        $this->filename = ' csv/data.csv';
//        $this->table = 'houses';
//    }
    public function run()
    {
        DB::table('houses')->truncate();
        $p=resource_path('csv/data.csv');// path to file in resources dir
        $data = []; //create empty array
        $header = NULL;

        if(($handle = fopen($p, 'r')) !== FALSE) //open and read data from .csv file
        {
            while(($row = fgetcsv($handle, 1000, ',')) !== FALSE)
            {
                if(!$header) {
                    $header = $row;
                } else {
                    $data[] = array_combine($header, $row); //add data from .csv file to $data array
                }
            }
            fclose($handle);
        }
        foreach ($data as $d){
            DB::table('houses')->insert( //insert all data from $data array to our DB
                [
                    'name'=>$d['Name'],
                    'price'=>$d['Price'],
                    'bedrooms'=>$d['Bedrooms'],
                    'bathrooms'=>$d['Bathrooms'],
                    'storeys'=>$d['Storeys'],
                    'garages'=>$d['Garages'],
                ]
            );
        }
    }
}
