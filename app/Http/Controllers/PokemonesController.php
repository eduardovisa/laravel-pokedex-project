<?php

namespace App\Http\Controllers;

use App\Models\Pokemones;
use Illuminate\Http\Request;

class PokemonesController extends Controller
{
    public function index(Request $request){
        $pokemon = New Pokemones();

        $pokemon->nombre=$request->nombre;
        $pokemon->imagen=$request->imagen;
        $pokemon->valor=$request->valor;

        $data=$pokemon->save();
        if (!$data) {
            return response()->json([
                'status'=>404,
                'error'=>'Ocurrio un problema'
            ]);
        } else {
            return response()->json([
                'status'=>200,
                'message'=>'Data Successfully saved!'
            ]);
        }
    }

    public function pokemones(){
        $pokemon = Pokemones::all();

        if (isset($pokemon)) {
            return response()->json([
                'pokemones'=>$pokemon
            ]);
        } else {
            return response()->json([
                'error'=>'Data not found!',
            ]);
        }
    }

    public function delete(){
        $estado = Pokemones::truncate();
        if (!$estado) {
            return response()->json([
                'status'=>404,
                'error'=>'Ocurrio un problema'
            ]);
        } else {
            return response()->json([
                'status'=>200,
                'message'=>'Data Successfully deleted!'
            ]);
        }
    }
}
