<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table = 'pembayaran';

    public function countSiswa()
    {
        return $this->db->table('siswa')->countAll();
    }

    public function countPetugas()
    {
        return $this->db->table('petugas')->countAll();
    }

    public function countKelas()
    {
        return $this->db->table('kelas')->countAll();
    }
}
