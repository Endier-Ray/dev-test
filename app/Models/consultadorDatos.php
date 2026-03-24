<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class consultadorDatos extends Model{
       
        public function consultarDatos($date = []){

        $build = $this->db->table('t_usuarios');

        if (!empty($date)) {
            $build->where($date);
        }
    
        return $build->get()->getResultArray();

        }

        public function eliminarDato($data) {
            $Usuario = $this->db->table('t_usuarios');
            $Usuario->where($data); 
            return $Usuario->delete(); 
        }

        public function actualizarDato($id, $arrayData) {
            $Usuario = $this->db->table('t_usuarios');
            $Usuario->where('id_usuario', $id);
            #esto no lo entendi 
            return $Usuario->update($arrayData); 
        }

    }