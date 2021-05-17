<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarModel;
use App\Models\Gama;
use App\Http\Controllers\ImagenesController;
use App\Models\Variante;

class CarModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($id)
    {
        $carmodel= CarModel::where("id",$id)->get();
        return view('infomodelo',compact('carmodel'));
    }

    public function gestionmodelos(){
        $carmodel= CarModel::all();
        return view('gestionmodelos',compact('carmodel'));
    }

    public function subirmodelo(){
        $gamas = Gama::all();
        return view('subirmodelo',compact('gamas'));
    }

    public function nuevomodelo(Request $request){
        $gamaid = Gama::where("name",$request->gamas)->get();
        CarModel::create(['name'=>$request->nombre,
        'price'=>$request->precio,
        'gama_id'=>$gamaid[0]->id,
        'description'=>$request->description
        ]);
        $modelo = CarModel::all()->last();
        $modelo_id = $modelo->id;
        $colores = Variante::where('type','Color')->get();
        $llantas = Variante::where('type','Llanta')->get();
        return view('vistaimagenes',compact('modelo','modelo_id','colores','llantas'));
    }

    public function editarmodelo($id){
        $carmodel= CarModel::where("id",$id)->get();
        return view('añadirmodelo',compact('carmodel'));
    }

    public function borrarmodelo($id){
        $carmodel= CarModel::where("id",$id);
        $carmodel->delete();
        return $this->gestionmodelos();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}
