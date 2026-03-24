<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Usuario extends Seeder
{
    public function run()
    {
        $user='Sergio';
        $rol= 'admin';
        $password = password_hash('Desingsgdl', PASSWORD_DEFAULT);

        $arr_v_user=[

                    'usuario' => $user,
                    'password' => $password,
                    'rol' => $rol,

                   ];

                   $this->db->table('t_usuarios')->insert($arr_v_user);
    }
}
