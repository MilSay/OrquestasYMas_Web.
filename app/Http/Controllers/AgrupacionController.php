<?php

namespace appOrquestas\Http\Controllers;

use Illuminate\Http\Request;

use appOrquestas\Http\Requests;
use appOrquestas\Agrupacion;
use appOrquestas\DetalleAgrupacion;
use appOrquestas\Videos;
use Illuminate\Support\Facades\Redirect;
use appOrquestas\Http\Requests\AgrupacionFormRequest;
use appOrquestas\Http\Requests\AgrupacionUpdateFormRequest;
use Illuminate\Support\Facades\Input; 
use DB;
use Carbon\Carbon;

class AgrupacionController extends Controller
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
            $agrupaciones =  DB::table('agrupacion as agrup')
            ->join('enumerado as e','agrup.GeneroMusical','=','e.idEnumerado')  
            ->select('agrup.idAgrupacion','agrup.Foto','agrup.RazonSocial','agrup.Ruc','e.nombre as GeneroMusical')	           
            ->where('agrup.RazonSocial','LIKE','%'.$query.'%')             
            ->orwhere('agrup.Ruc','LIKE','%'.$query.'%')           
            ->orderBy('agrup.idAgrupacion','desc')
            ->paginate(7);
            return view('contrato.agrupacion.index',["agrupaciones"=>$agrupaciones,"searchText"=>$query]);
        }
    }

    public function create()    
    {
        $generoMusical=DB::table('enumerado')->where('Tipo_Enumerado','=','GeneroMusical')->get();
        $departamentos=DB::table('ubigeo')->where('cod_prov','=','01')->where('cod_dist','=','01')->get();
        $personasManager=DB::table('persona')->where('idRol','=','27')->get();
        $personas=DB::table('persona')->get();
        $tipoPersonas=DB::table('enumerado')->where('Tipo_Enumerado','=','CargoMusico')->get();
        return view("contrato.agrupacion.create",["generoMusical"=>$generoMusical,"departamentos"=>$departamentos,"personas"=>$personas,"tipoPersonas"=>$tipoPersonas,"personasManager"=>$personasManager]);
    }

    public function store(AgrupacionFormRequest $request)
    {  
               
            $agrupacion = new Agrupacion;
            $agrupacion->RazonSocial=$request->get('RazonSocial'); 
            $agrupacion->Ruc=$request->get('Ruc');        
            $agrupacion->Historia=$request->get('Historia'); 
            $agrupacion->CodigoDepartamento=$request->get('CodigoDepartamento'); 
            $agrupacion->CodigoProvincia=$request->get('CodigoProvincia'); 
            $agrupacion->CodigoDistrito=$request->get('CodigoDistrito'); 
            $agrupacion->GeneroMusical=$request->get('GeneroMusical'); 

            $agrupacion->facebook=$request->get('facebook'); 
            $agrupacion->twitter=$request->get('twitter'); 
            $agrupacion->youtuve=$request->get('youtuve'); 

            $agrupacion->idPersona=$request->get('idPersonaManager');            
            $agrupacion->direccion=$request->get('direccion'); 

            if(Input::hasFile('Foto')){
                $file=Input::file('Foto');
                $file->move(public_path().'/agrupacion/fotos',$file->getClientOriginalName());
                $agrupacion->Foto=$file->getClientOriginalName();
            }      
            $mytime = Carbon::now('America/Lima');
            $agrupacion->FechaCreacion=$mytime->toDateTimeString(); 
            $agrupacion->save(); 

            
            $idPersona=$request->get('idPersona'); 
            $TipoPersona=$request->get('TipoPersona'); 
            $FechaRegistro=$mytime->toDateTimeString(); 
            $cont = 0;     
            
            if($idPersona!=null){
                while($cont < count($idPersona)){
                    $detalleAgrupacion = new DetalleAgrupacion();
                    //$detalleAgrupacion->idingreso=$idingreso->get('idingreso'); 
                    $detalleAgrupacion->idAgrupacion=$agrupacion->idAgrupacion;
                    $detalleAgrupacion->idPersona=$idPersona[$cont]; 
                    $detalleAgrupacion->TipoPersona=$TipoPersona[$cont];                 
                    $detalleAgrupacion->FechaRegistro=$FechaRegistro;                 
                    $detalleAgrupacion->save();
                    $cont = $cont+1;
                }
            }

            $link=$request->get('link'); 
            $Descripcion=$request->get('Descripcion'); 
            $FechaRegistroVideos=$mytime->toDateTimeString(); 
            $contv = 0;            
            if($link!=null){
                while($contv < count($link)){
                    $videos = new Videos();
                    //$videos->idingreso=$idingreso->get('idingreso'); 
                    $videos->idAgrupacion=$agrupacion->idAgrupacion;
                    $videos->link=$link[$contv]; 
                    $videos->Descripcion=$Descripcion[$contv];                 
                    $videos->FechaRegistro=$FechaRegistroVideos;                 
                    $videos->save();
                    $contv = $contv+1;
                }
            }
        
        return Redirect::to('contrato/agrupacion'); 
    }

    public function show($id)
    {
        return view("contrato.agrupacion.show",["agrupacion"=>Agrupacion::findOrFail($id)]);
    }

    public function edit($id)
    { 
        $agrupacion=Agrupacion::findOrFail($id);
        $generoMusical=DB::table('enumerado')->where('Tipo_Enumerado','=','GeneroMusical')->get();
        $departamentos=DB::table('ubigeo')->where('cod_prov','=','01')->where('cod_dist','=','01')->get(); 
        $personas=DB::table('persona')->get();
        $personasManager=DB::table('persona')->where('idRol','=','27')->get();
        $tipoPersonas=DB::table('enumerado')->where('Tipo_Enumerado','=','CargoMusico')->get();

        $detalleAgrupacion=DB::table('detalleagrupacion as da')
        ->join('persona as p','da.idPersona','=','p.idPersona')
		->join('enumerado as e','da.TipoPersona','=','e.idEnumerado')
        ->select('p.Nombres as Nombres','p.Apellidos as Apellidos','e.Nombre as TipoPersona','da.idDetalleAgrupacion as idDetalle')
        ->where('da.idAgrupacion','=',$id)
        ->get();

        $detalleVideos=DB::table('videos as vi')       
        ->select('vi.link','vi.Descripcion','vi.idVideos')
        ->where('vi.idAgrupacion','=',$id)
        ->get();

        return view("contrato.agrupacion.edit",["agrupacion"=> $agrupacion,"generoMusical"=> $generoMusical,"departamentos"=>$departamentos,"personas"=>$personas,"tipoPersonas"=>$tipoPersonas,"detalleAgrupacion"=>$detalleAgrupacion,"detalleVideos"=>$detalleVideos,"personasManager"=>$personasManager]);
    }

    public function update(AgrupacionUpdateFormRequest  $request,$id)
    {
         
            $agrupacion=Agrupacion::findOrFail($id);
            $agrupacion->RazonSocial=$request->get('RazonSocial'); 
            $agrupacion->Ruc=$request->get('Ruc');         
            $agrupacion->Historia=$request->get('Historia'); 
            $agrupacion->CodigoDepartamento=$request->get('CodigoDepartamento'); 
            $agrupacion->CodigoProvincia=$request->get('CodigoProvincia'); 
            $agrupacion->CodigoDistrito=$request->get('CodigoDistrito'); 
            $agrupacion->GeneroMusical=$request->get('GeneroMusical');     
            
            $agrupacion->facebook=$request->get('facebook'); 
            $agrupacion->twitter=$request->get('twitter'); 
            $agrupacion->youtuve=$request->get('youtuve'); 

            $agrupacion->idPersona=$request->get('idPersonaManager');             
            $agrupacion->direccion=$request->get('direccion'); 

            if(Input::hasFile('Foto')){
                $file=Input::file('Foto');
                $file->move(public_path().'/agrupacion/fotos',$file->getClientOriginalName());
                $agrupacion->Foto=$file->getClientOriginalName();
            }     

            $mytime = Carbon::now('America/Lima');
            $agrupacion->FechaCreacion=$mytime->toDateTimeString(); 
            $agrupacion->update();

            $idPersona=$request->get('idPersona'); 
            $TipoPersona=$request->get('TipoPersona'); 
            $FechaRegistro=$mytime->toDateTimeString(); 
            $cont = 0;            
            if($idPersona!=null){
                while($cont < count($idPersona)){
                    $detalleAgrupacion = new DetalleAgrupacion();
                    //$detalleAgrupacion->idingreso=$idingreso->get('idingreso'); 
                    $detalleAgrupacion->idAgrupacion=$agrupacion->idAgrupacion;
                    $detalleAgrupacion->idPersona=$idPersona[$cont]; 
                    $detalleAgrupacion->TipoPersona=$TipoPersona[$cont];                 
                    $detalleAgrupacion->FechaRegistro=$FechaRegistro;                 
                    $detalleAgrupacion->save();
                    $cont = $cont+1;
                }
            }
            $link=$request->get('link'); 
            $Descripcion=$request->get('Descripcion'); 
            $FechaRegistroVideos=$mytime->toDateTimeString(); 
            $contv = 0;            
            if($link!=null){
                while($contv < count($link)){
                    $videos = new Videos();
                    //$videos->idingreso=$idingreso->get('idingreso'); 
                    $videos->idAgrupacion=$agrupacion->idAgrupacion;
                    $videos->link=$link[$contv]; 
                    $videos->Descripcion=$Descripcion[$contv];                 
                    $videos->FechaRegistro=$FechaRegistroVideos;                 
                    $videos->save();
                    $contv = $contv+1;
                }
            }
     
        return Redirect::to('contrato/agrupacion'); 
    }

    public function destroy($id)
    {
        $agrupacion=Agrupacion::findOrFail($id);        
        $agrupacion->delete();
        return Redirect::to('contrato/agrupacion'); 
    }

    public function deleteIntegrante(Request $request,$id,$idDetalle)
    {
        if($request->ajax()){           
            $detalleAgrupacion=DetalleAgrupacion::findOrFail($idDetalle);        
            $detalleAgrupacion->delete();
            return;
        } 
    }
    public function deleteVideos(Request $request,$id,$idVideos)
    {
        if($request->ajax()){           
            $videos=Videos::findOrFail($idVideos);        
            $videos->delete();
            return;
        } 
    }
   /* public function obtenerDetalle(Request $request,$id)
    {    
        if($request->ajax()){
            $detalleAgrupacion=DB::table('detalleagrupacion as da')
            ->join('persona as p','da.idPersona','=','p.idPersona')
            ->join('enumerado as e','da.TipoPersona','=','e.idEnumerado')
            ->select('p.Nombres as Nombres','p.Apellidos as Apellidos','e.Nombre as TipoPersona','da.idDetalleAgrupacion as idDetalle')
            ->where('da.idAgrupacion','=',$id)
            ->get();    
            return response()->json($detalleAgrupacion);
        }
    }*/

   
    public  function provincia(Request $request,$id,$cod_depa)
    {
        if($request->ajax()){
            $provincias=DB::table('ubigeo')->where('cod_depa','=',$cod_depa)->where('cod_dist','=','01')->get();            
            return response()->json($provincias);
        } 
    }

    public  function distrito(Request $request,$id,$cod_depa,$cod_prov)
    {
        if($request->ajax()){
            $distritos=DB::table('ubigeo')->where('cod_depa','=',$cod_depa)->where('cod_prov','=',$cod_prov)->get();                
            return response()->json( $distritos);
        } 
    }

    public  function provinciaCreate(Request $request,$cod_depa)
    {
        if($request->ajax()){
            $provincias=DB::table('ubigeo')->where('cod_depa','=',$cod_depa)->where('cod_dist','=','01')->get();            
            return response()->json($provincias);
        } 
    }

    public  function distritoCreate(Request $request,$cod_depa,$cod_prov)
    {
        if($request->ajax()){
            $distritos=DB::table('ubigeo')->where('cod_depa','=',$cod_depa)->where('cod_prov','=',$cod_prov)->get();                
            return response()->json( $distritos);
        } 
    }
}
