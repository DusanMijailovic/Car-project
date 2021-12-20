<?php


namespace App\Models;


class Manufacturer
{

    private $table = "manufacturer";

    public function getAll(){
    return \DB::table($this->table)
        ->get();

}


}
