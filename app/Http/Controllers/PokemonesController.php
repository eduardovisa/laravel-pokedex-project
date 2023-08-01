<?php

namespace App\Http\Controllers;

use App\Models\Pokemones;
use Illuminate\Http\Request;

class PokemonesController extends Controller
{
    public function index(Request $request){
        $pokemon = New Pokemones();

        $pokemon->Nombre=$request->Nombre;
        $pokemon->Imagen=$request->Imagen;
        $pokemon->Valor=$request->Valor;

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
}
