<?php

namespace appOrquestas\Http\Controllers;

use Illuminate\Http\Request;

use appOrquestas\Http\Requests;
use appOrquestas\Evento;
use Illuminate\Support\Facades\Redirect;
use appOrquestas\Http\Requests\EventoFormRequest;

use DB;

class EventoController extends Controller
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
            $eventos =  DB::table('evento as ev')
            ->join('enumerado as enTipoEven','ev.TipoEventoId','=','enTipoEven.idEnumerado')
			->join('enumerado as enTipoEntra','ev.TipoEntradaId','=','enTipoEntra.idEnumerado')
			 ->join('enumerado as enEstadoEven','ev.EstadoEventoId','=','enEstadoEven.idEnumerado')			 
            ->select('ev.idEvento','ev.HoraInicio','ev.HoraFin','ev.LocalDeEvento','ev.DireccionLocal','enTipoEven.Nombre as TipoEvento','enTipoEntra.Nombre as TipoEntrada','enEstadoEven.Nombre as EstadoEvento')	           
            ->where('ev.LocalDeEvento','LIKE','%'.$query.'%')             
            ->orderBy('idEvento','desc')
            ->paginate(7);
            return view('contrato.evento.index',["eventos"=>$eventos,"searchText"=>$query]);
        }
    }

    public function create()
    {
        $tipoEventos=DB::table('enumerado')->where('Tipo_Enumerado','=','TipoEvento')->get();
        $tipoEntradas=DB::table('enumerado')->where('Tipo_Enumerado','=','TipoEntrada')->get();
        $estadoEventos=DB::table('enumerado')->where('Tipo_Enumerado','=','EstadoEvento')->get();
        return view("contrato.evento.create",["tipoEventos"=>$tipoEventos,"tipoEntradas"=>$tipoEntradas,"estadoEventos"=>$estadoEventos]);
    }

    public function store(EventoFormRequest $request)
    {              
        $evento = new Evento;
        $evento->Fecha=$request->get('Fecha'); 
        $evento->LocalDeEvento=$request->get('LocalDeEvento');        
        $evento->DireccionLocal=$request->get('DireccionLocal'); 
        $evento->TipoEventoId=$request->get('TipoEventoId'); 
        $evento->TipoEntradaId=$request->get('TipoEntradaId'); 
        $evento->EstadoEventoId=$request->get('EstadoEventoId'); 
        $evento->HoraInicio=$request->get('HoraInicio');    
        $evento->HoraFin=$request->get('HoraFin');
        $evento->save();   

        return Redirect::to('contrato/evento'); 
    }

    public function show($id)
    {
        return view("contrato.evento.show",["evento"=>Evento::findOrFail($id)]);
    }

    public function edit($id)    
    { 
        $evento=Evento::findOrFail($id);
        $tipoEventos=DB::table('enumerado')->where('Tipo_Enumerado','=','TipoEvento')->get();
        $tipoEntradas=DB::table('enumerado')->where('Tipo_Enumerado','=','TipoEntrada')->get();
        $estadoEventos=DB::table('enumerado')->where('Tipo_Enumerado','=','EstadoEvento')->get();
        return view("contrato.evento.edit",["evento"=>$evento,"tipoEventos"=>$tipoEventos,"tipoEntradas"=>$tipoEntradas,"estadoEventos"=>$estadoEventos]);
    }

    public function update(EventoFormRequest  $request,$id)
    {
        $evento=Evento::findOrFail($id);
        $evento->Fecha=$request->get('Fecha'); 
        $evento->LocalDeEvento=$request->get('LocalDeEvento');        
        $evento->DireccionLocal=$request->get('DireccionLocal'); 
        $evento->TipoEventoId=$request->get('TipoEventoId'); 
        $evento->TipoEntradaId=$request->get('TipoEntradaId'); 
        $evento->EstadoEventoId=$request->get('EstadoEventoId'); 
        $evento->HoraInicio=$request->get('HoraInicio');    
        $evento->HoraFin=$request->get('HoraFin');
        $evento->update();
        return Redirect::to('contrato/evento'); 
    }

    public function destroy($id)
    {
        $evento=Evento::findOrFail($id);        
        $evento->delete();
        return Redirect::to('contrato/evento'); 
    }
}
