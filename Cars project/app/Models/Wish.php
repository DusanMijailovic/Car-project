<?php


namespace App\Models;


class Wish
{
    private $table = "wish";

    public function addWish($manuId, $modelId){

        return \DB::table($this->table)
            ->insert([
                "idManufacturer" => $manuId,
                "idModel" => $modelId

            ]);
    }
public function getWishes(){
    return \DB::table($this->table)
        ->join('manufacturer', 'wish.idManufacturer', '=', 'manufacturer.idManufacturer')
        ->join('model', 'wish.idModel', '=', 'model.idModel')
        ->select('manufacturer.name as manuName','model.name as modelName' )
        ->get();

}


}
