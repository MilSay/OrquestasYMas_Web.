<?php

namespace appOrquestas\Http\Controllers;

use Illuminate\Http\Request;

use appOrquestas\Http\Requests;
use appOrquestas\Contrato;
use Illuminate\Support\Facades\Redirect;
use appOrquestas\Http\Requests\ContratoFormRequest;

use DB;

class ContratoController extends Controller
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
            $contratos =  DB::table('contrato as con')
            ->join('persona as p','con.idPersona','=','p.idPersona')
			->join('evento as eve','con.idEvento','=','eve.idEvento')
			->join('agrupacion as ag','con.idAgrupacion','=','ag.idAgrupacion')			 
            ->select('con.idContrato','eve.LocalDeEvento','p.Nombres','p.Apellidos','ag.RazonSocial','con.FechaContrato','con.MontoInicial','con.MontoTotal')	           
            ->where('p.Nombres','LIKE','%'.$query.'%')   
			->orwhere('p.Apellidos','LIKE','%'.$query.'%')   
			->orwhere('ag.RazonSocial','LIKE','%'.$query.'%')            
            ->orderBy('idContrato','desc')
            ->paginate(7);
            return view('contrato.contrato.index',["contratos"=>$contratos,"searchText"=>$query]);
        }
    }

    public function create()
    {
        $personas=DB::table('persona')->get();
        $agrupaciones=DB::table('agrupacion')->get();
        $eventos=DB::table('evento')->get();
        return view("contrato.contrato.create",["personas"=>$personas,"agrupaciones"=>$agrupaciones,"eventos"=>$eventos]);
    }

    public function store(ContratoFormRequest $request)
    {              
        $contrato = new Contrato;
        $contrato->idEvento=$request->get('idEvento'); 
        $contrato->FechaContrato=$request->get('FechaContrato');        
        $contrato->idPersona=$request->get('idPersona'); 
        $contrato->idAgrupacion=$request->get('idAgrupacion'); 
        $contrato->MontoInicial=$request->get('MontoInicial'); 
        $contrato->MontoTotal=$request->get('MontoTotal');        
        $contrato->save();   

        return Redirect::to('contrato/contrato'); 
    }

    public function show($id)
    {
        return view("contrato.contrato.show",["contrato"=>Contrato::findOrFail($id)]);
    }

    public function edit($id)
    { 
        $contrato=Contrato::findOrFail($id);
        $personas=DB::table('persona')->get();
        $agrupaciones=DB::table('agrupacion')->get();
        $eventos=DB::table('evento')->get();
        return view("contrato.contrato.edit",["contrato"=>$contrato,"personas"=>$personas,"agrupaciones"=>$agrupaciones,"eventos"=>$eventos]);
    }

    public function update(ContratoFormRequest  $request,$id)
    {
        $contrato=Contrato::findOrFail($id);
        $contrato->idEvento=$request->get('idEvento'); 
        $contrato->FechaContrato=$request->get('FechaContrato');        
        $contrato->idPersona=$request->get('idPersona'); 
        $contrato->idAgrupacion=$request->get('idAgrupacion'); 
        $contrato->MontoInicial=$request->get('MontoInicial'); 
        $contrato->MontoTotal=$request->get('MontoTotal'); 
        $contrato->update();
        return Redirect::to('contrato/contrato'); 
    }

    public function destroy($id)
    {
        $contrato=Contrato::findOrFail($id);        
        $contrato->delete();
        return Redirect::to('contrato/contrato'); 
    }
}
