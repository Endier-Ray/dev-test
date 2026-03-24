<?php

namespace App\Filters;

//  OJO ALA ESCRITURA POR 1 LETRA O PALABRA MAL XX
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
//ssdad
use CodeIgniter\Filters\FilterInterface;

class validador implements FilterInterface{
    public function before(RequestInterface $request, $arguments = null)
    {


    //creacion de variable, y deposito de informacion existente de la seession acutal y extrae el ROL
    $session = session();
    $rol = $session->get('rol'); 

    // url requerida o solicitada
    $uri = $request->getUri()->getPath();

   
    
    // SI NO HAY SESION AL LOGGIN
    if (empty($rol)) {
        return redirect()->to(base_url('/'));
    }

    // Si el ADMIN intenta entrar al dashboard de USER
    if ($rol == 'admin' && $uri == 'dashboardUser') {
        return redirect()->to(base_url('dashboard'));
    }

    // Si el EMPLEADO intenta entrar al dashboard de ADMIN
    if ($rol == 'empleado' && $uri == 'dashboard') {
        return redirect()->to(base_url('dashboardUser'));
    }

    

     /* switch (session('rol')) {
            default:
                 return redirect()->to(base_url('/'));
                break;
        }*/
   

       /* if (session('rol')!=='admin') {
                    return redirect()->to(base_url('/dashboardUser'));
                }*/
    } 

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    
    }
}