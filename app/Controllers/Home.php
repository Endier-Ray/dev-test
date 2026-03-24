<?php

namespace App\Controllers;

// se importa el modelo escrito de extractos de datos del post
use App\Models\Usuarios;
use App\Models\consultadorDatos;

class Home extends BaseController
{
    public function index(): string
    {
        $mensaje = session('mensaje');
        return view('login', ['mensaje'=> $mensaje]);
    }

    public function  dashboard():string 
    {
        //return view('dashboard');

        $model = new consultadorDatos();
        
       
        $datosUsuarios = $model->consultarDatos();
        
        if (session('rol') === 'empleado') {
     
        return $this->dashboardUser(); 
    }


        $model = new consultadorDatos();
        $datosUsuarios = $model->consultarDatos();
        return view('dashboard', ['lista' => $datosUsuarios]);

   
    
    }

    public function dashboardUser():string{
        return view('dashboardUser');
    }

    /*
        controlador de inicio de sesión del login
    */
    
    public function login (){


        $ruser = $this->request->getPost('input-user');
        $rpass = $this->request->getPost('input-pass');
        //le damos a fuser la clase de usuarios de models
        $fuser = new Usuarios();

        //comparador de los datos adquiridos con la db
        $datosUsuario = $fuser->obtenerUsuario(['usuario' => $ruser]);


            //verificamos que los datos sean iguales alos de la bd
        if (count($datosUsuario) > 0 && password_verify($rpass, $datosUsuario[0]['password'])){

            $data = [
                    'usuario' => $datosUsuario [0]['usuario'],
                    'rol' => $datosUsuario[0]['rol'],
            ];

            //creamos una session y le damos la informacion que comparamos para meterla en nuestros vistas
            $session = session();
            $session-> set($data);
            
            return redirect()->to(base_url('/dashboard'))->with('mensaje','Exito pa');

        }   else{

            return redirect()->to(base_url('/'))->with('mensaje','2');

        }







    }

     public function registrar (){


           $ruser = $this->request->getPost('input-user');
$rpass = $this->request->getPost('input-pass');
$rrol  = $this->request->getPost('input-rol'); 

// 2. Instanciar el Modelo correctamente
$fuser = new \App\Models\Usuarios();

// 3. Verificar si el usuario ya existe (USANDO EL MODELO)
$existente = $fuser->where('usuario', $ruser)->first();

if ($existente) {
    return redirect()->to(base_url('dashboard'))->with('mensaje', 'usuario existente');
}

// 4. Si no existe, preparamos datos y el hash
$passHash = password_hash($rpass, PASSWORD_DEFAULT);
$data = [
    'usuario'  => $ruser,
    'password' => $passHash,
    'rol'      => $rrol,
];

// 5. Insertar usando tu función del modelo
$exito = $fuser->insertarUsuario($data);

if ($exito) {
    return redirect()->to(base_url('dashboard'))->with('mensaje', 'exito');
} else {
    return redirect()->back()->with('mensaje', 'Error al registrar');
}



    }

    //salir, destruye la sesion existente para para poder registrarnos o acceder
    public function salir (){
        $session = session();
        $session-> remove(['usuario','rol','isLoggedIn']);
        $session->destroy();
        return  redirect()->to(base_url('/'));
    }

    //elimina el usuario y todo lo que tenga que ver con el ID
    public function eliminar($id) {
        //usamos el modelo que creamos
        $model = new consultadorDatos();
        
      
        $respuesta = $model->eliminarDato(['id_usuario' => $id]);

        if ($respuesta) {
            return redirect()->to(base_url('dashboard'))->with('mensaje', 'eliminado con exito');
        } else {
            return redirect()->to(base_url('dashboard'))->with('mensaje', '2');
        }
}

    public function actualizar($id){
    
            #guardar post
            $userA = $this->request->getPost('user-act');
            $rolA = $this->request->getPost('input-rol-act');
            $passA = $this->request->getPost('pass-act');

            #definimos los datos básicos que siempre se actualizan
            $arrayData = [
                'usuario' => $userA,
                'rol'     => $rolA
            ];

            #control de contraseña si NO esta vacia
            if (!empty($passA)) {
                // IMPORTANTE: Nunca guardes $passA directo
                $arrayData['password'] = password_hash($passA, PASSWORD_DEFAULT);
            }
        
                #usamos modelo de consultador de datos porque ahi tenemos nuestra fucnion de actualizar dato
                $model = new consultadorDatos();
                $actualizacion = $model->actualizarDato($id , $arrayData);

                    if ($actualizacion) {
                        return redirect()->to(base_url('dashboard'))->with('mensaje','dato actualizado');
                    } else {
                        return redirect()->to(base_url('dashboard'))->with('mensaje','dato no actualizado');
                    }
                    


                }

}


