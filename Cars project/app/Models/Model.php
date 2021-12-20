<?php


namespace App\Models;


class Model
{

    private $table = "model";

    public function getAll()
    {
        return \DB::table($this->table)
            ->join('manufacturer', 'model.idManufacturer', '=', 'manufacturer.idManufacturer' )
            ->select('model.*')
            ->get();
    }

    public function getModelsByManufacturer($manuID){
        return \DB::table($this->table)
            ->join('manufacturer', 'model.idManufacturer', '=', 'manufacturer.idManufacturer' )
            ->select('model.*')
            ->where('model.idManufacturer',$manuID)
            ->get();



    }
}
