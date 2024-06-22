<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $table = 'kelas';
    protected $allowedFields = ['nama_kelas', 'kompetensi_keahlian'];
    protected $useTimestamps = true;
    protected $createdField = 'dibuat_pada';
    protected $updatedField = 'diubah_pada';

    public function hapusKelas($id_kelas)
    {
        return $this->db->table('kelas')->delete(['id_kelas' => $id_kelas]);
    }

    public function ubahKelas($data, $id_kelas)
    {
        return $this->db->table('kelas')->update($data, ['id_kelas' => $id_kelas]);
    }

    public function getKelas($id_kelas = false)
    {
        if ($id_kelas == false) {
            return $this->findAll();
        }

        return $this->where(['id_kelas' => $id_kelas])->first();
    }
}
