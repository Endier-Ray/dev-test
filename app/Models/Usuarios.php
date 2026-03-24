<?php
    namespace App\Models;

    use CodeIgniter\Model;

    class Usuarios extends Model {

    protected $table      = 't_usuarios'; 
    protected $primaryKey = 'id_usuario'; 

    #de preferencia usar palabras neutras porque si no luego se complica ver o entenderlo, no es fisica 
    protected $allowedFields = ['usuario', 'password', 'rol'];
# purbea git
    //recopila o manda a llamar los datos de la BD de mi tabla, y los guarda en $usuario
        public function obtenerUsuario($data){

            $Usuario = $this->db->table('t_usuarios');
            $Usuario->where($data);
            return $Usuario->get()->getResultArray();
        }

    //inserta los datos que extrai desde mi post o formulario en dashboard admin
        public function insertarUsuario($data) {
            $builder = $this->db->table('t_usuarios');
            return $builder->insert($data); 
        }
    }

    