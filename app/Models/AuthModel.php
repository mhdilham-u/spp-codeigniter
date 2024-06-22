<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'petugas';

    public function login($username, $password)
    {
        return $this->db->table('petugas')->where(['username' => $username, 'password' => $password])->get()->getRowArray();
    }
}
