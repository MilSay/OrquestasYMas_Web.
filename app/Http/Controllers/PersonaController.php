<?php

namespace appOrquestas\Http\Controllers;

use Illuminate\Http\Request;

use appOrquestas\Http\Requests;
use appOrquestas\Persona;
use Illuminate\Support\Facades\Redirect;
use appOrquestas\Http\Requests\PersonaFormRequest;
use appOrquestas\Http\Requests\PersonaUpdateFormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use DB;

class PersonaController extends Controller
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
            $personas = DB::table('persona')->where('Nombres','LIKE','%'.$query.'%')            
            ->orderBy('idPersona','desc')
            ->paginate(7);
            return view('seguridad.persona.index',["personas"=>$personas,"searchText"=>$query]);
        }
    }

    public function create()
    {
        $generoEnumerados=DB::table('enumerado')->where('Tipo_Enumerado','=','GENERO')->get();
        $rolEnumerados=DB::table('enumerado')->where('Tipo_Enumerado','=','Rol')->get();
        $departamentos=DB::table('ubigeo')->where('cod_prov','=','01')->where('cod_dist','=','01')->get();  
        return view("seguridad.persona.create", ["generoEnumerados"=>$generoEnumerados,"departamentos"=>$departamentos,"rolEnumerados"=>$rolEnumerados]);
    }

    public function store(PersonaFormRequest $request)
    {              
        $persona = new Persona;
        $persona->Nombres=$request->get('Nombres'); 
        $persona->Apellidos=$request->get('Apellidos');        
        $persona->Dni=$request->get('Dni'); 
        $persona->GeneroId=$request->get('GeneroId'); 
        $persona->FechaNacimiento=$request->get('FechaNacimiento'); 
        $persona->Celular=$request->get('Celular'); 
        $persona->Email=$request->get('Email');    
        $persona->UserName=$request->get('UserName');
        $persona->password=Hash::make($request->get('password'));
        $persona->CodigoDepartamento=$request->get('CodigoDepartamento');
        $persona->CodigoProvincia=$request->get('CodigoProvincia');
        $persona->CodigoDistrito=$request->get('CodigoDistrito');
        $persona->idRol=$request->get('idRol');

        if(Input::hasFile('Foto')){
            $file=Input::file('Foto');
            $file->move(public_path().'/persona/fotos',$file->getClientOriginalName());
            $persona->Foto=$file->getClientOriginalName();
        }    
        $mytime = Carbon::now('America/Lima');               
        $persona->FechaRegistro=$mytime->toDateTimeString();
     
        $persona->save();   

        // 'title' => Crypt::encrypt($request->title),

        return Redirect::to('seguridad/persona'); 
    }

    public function show($id)    
    {       
        return view("seguridad.persona.show",["persona"=>Persona::findOrFail($id)]);
    }

    public function edit($id)
    { 
        
        $persona=Persona::findOrFail($id);
        $generoEnumerados=DB::table('enumerado')->where('Tipo_Enumerado','=','GENERO')->get();
        $departamentos=DB::table('ubigeo')->where('cod_prov','=','01')->where('cod_dist','=','01')->get();      
        $rolEnumerados=DB::table('enumerado')->where('Tipo_Enumerado','=','Rol')->get();
        return view("seguridad.persona.edit",["persona"=> $persona,"generoEnumerados"=>$generoEnumerados,"departamentos"=>$departamentos,"rolEnumerados"=>$rolEnumerados]);
    }

    public function update(PersonaUpdateFormRequest  $request,$id)
    {
        $persona=Persona::findOrFail($id);
        $persona->Nombres=$request->get('Nombres'); 
        $persona->Apellidos=$request->get('Apellidos');        
        $persona->Dni=$request->get('Dni'); 
        $persona->GeneroId=$request->get('GeneroId'); 
        $persona->FechaNacimiento=$request->get('FechaNacimiento'); 
        $persona->Celular=$request->get('Celular'); 
        $persona->Email=$request->get('Email');    
        $persona->UserName=$request->get('UserName');
        $persona->password=Hash::make($request->get('password'));
        $persona->CodigoDepartamento=$request->get('CodigoDepartamento');
        $persona->CodigoProvincia=$request->get('CodigoProvincia');
        $persona->CodigoDistrito=$request->get('CodigoDistrito');
        $persona->idRol=$request->get('idRol');
        if(Input::hasFile('Foto')){
            $file=Input::file('Foto');
            $file->move(public_path().'/persona/fotos',$file->getClientOriginalName());
            $persona->Foto=$file->getClientOriginalName();
        }    
        $mytime = Carbon::now('America/Lima');               
        $persona->FechaRegistro=$mytime->toDateTimeString();
      
        $persona->update();
        return Redirect::to('seguridad/persona'); 
    }

    public function destroy($id)
    {
        $persona=Persona::findOrFail($id);        
        $persona->delete();
        return Redirect::to('seguridad/persona'); 
    }

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
