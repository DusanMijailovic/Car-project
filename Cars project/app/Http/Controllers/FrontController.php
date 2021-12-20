<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Models\Model;
use App\Models\Wish;
use Illuminate\Http\Request;

class FrontController extends Controller
{

    private $data;

    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Request::ajax()){
            $wishModel = new Wish();
            return $wishModel->getWishes();

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manufacturerModel = new Manufacturer();
        $this->data['manu'] = $manufacturerModel->getAll();



        return view('index', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('saveBtn')){
            $manufacturerID = $request->manufacturerId;
            $modelID = $request->modelId;

            $wishModel = new Wish();


            try {
                $wishModel->addWish($manufacturerID,$modelID);
                $wishes = $wishModel->getWishes();
                return response($wishes,201);
            }
            catch (\PDOException $e){
                return response(500);
            }

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getModels(Request $request){

        $id = $request->id;
        $modelModel = new Model();

        return $modelModel->getModelsByManufacturer($id);


    }
}
