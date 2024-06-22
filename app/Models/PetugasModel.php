<?php

namespace App\Models;

use CodeIgniter\Model;

class PetugasModel extends Model
{
    protected $table = 'petugas';
    protected $allowedFields = ['username', 'password', 'nama_petugas', 'level', 'fotopetugas'];
    protected $useTimestamps = true;
    protected $createdField = 'dibuat_pada';
    protected $updatedField = 'diubah_pada';

    public function hapusPetugas($id_petugas)
    {
        return $this->db->table('petugas')->delete(['id_petugas' => $id_petugas]);
    }

    public function ubahPetugas($data, $id_petugas)
    {
        return $this->db->table('petugas')->update($data, ['id_petugas' => $id_petugas]);
    }

    public function getPetugas($id_petugas = false)
    {
        if ($id_petugas == false) {
            return $this->findAll();
        }

        return $this->where(['id_petugas' => $id_petugas])->first();
    }
}
