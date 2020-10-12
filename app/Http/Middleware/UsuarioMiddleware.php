<?php

namespace appOrquestas\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Auth;
class UsuarioMiddleware
{

    protected $auth;
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        switch ($this->auth->user()->idRol) 
        {
            case '26':
                # Administrador 
                return redirect()->to('admin');               
                break;
            case '27':
                # Responsable de Área
                return redirect()->to('responsable');  
                break;
            case '29':
                # Secretaria
                return redirect()->to('secretaria');  
                break;            
            default:
                return redirect()->to('/');  
                break;
        }                
            
        return $next($request);
    }      
       
    
}
