<?php

namespace appOrquestas\Http\Controllers;

use Illuminate\Http\Request;

use appOrquestas\Http\Requests;
use appOrquestas\Enumerado;
use Illuminate\Support\Facades\Redirect;
use appOrquestas\Http\Requests\EnumeradoFormRequest;

use DB;

class EnumeradoController extends Controller
{
    //
    public function _construct()
    {
        
    }

    public function index(Request $request)
    {
        if($request)
        {
            $query = trim($request->get('searchText'));
            $enumerados = DB::table('enumerado')->where('Nombre','LIKE','%'.$query.'%')            
            ->orderBy('idEnumerado','desc')
            ->paginate(7);
            return view('item.enumerado.index',["enumerados"=>$enumerados,"searchText"=>$query]);
        }
    }

    public function create()
    {
        return view("item.enumerado.create");
    }

    public function store(EnumeradoFormRequest $request)
    {              
        $enumerdo = new Enumerado;
        $enumerdo->Nombre=$request->get('Nombre'); 
        $enumerdo->Valor_enumerado=$request->get('Valor_enumerado'); 
        $enumerdo->Tipo_Enumerado=$request->get('Tipo_Enumerado'); 
        $enumerdo->Estado_Enumerado=$request->get('Estado_Enumerado');      
        $enumerdo->save();   

        return Redirect::to('item/enumerado'); 
    }

    public function show($id)
    {
        return view("item.enumerado.show",["enumerado"=>Enumerado::findOrFail($id)]);
    }

    public function edit($id)
    { 
        return view("item.enumerado.edit",["enumerado"=>Enumerado::findOrFail($id)]);
    }

    public function update(EnumeradoFormRequest  $request,$id)
    {
        $enumerdo=Enumerado::findOrFail($id);
        $enumerdo->Nombre=$request->get('Nombre'); 
        $enumerdo->Valor_enumerado=$request->get('Valor_enumerado'); 
        $enumerdo->Tipo_Enumerado=$request->get('Tipo_Enumerado'); 
        $enumerdo->Estado_Enumerado=$request->get('Estado_Enumerado');  
        $enumerdo->update();
        return Redirect::to('item/enumerado'); 
    }

    public function destroy($id)
    {
        $enumerdo=Enumerado::findOrFail($id);        
        $enumerdo->delete();
        return Redirect::to('item/enumerado'); 
    }
}
