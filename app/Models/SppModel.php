<?php

namespace App\Models;

use CodeIgniter\Model;

class SppModel extends Model
{
    protected $table = 'spp';
    protected $allowedFields = ['tahun', 'nominal'];
    protected $useTimestamps = true;
    protected $createdField = 'dibuat_pada';
    protected $updatedField = 'diubah_pada';

    public function getHistory($nis)
    {
        return $this->db->table('pembayaran')
            ->join('petugas', 'petugas.id_petugas=pembayaran.id_petugas')
            ->where(['nis' => $nis])
            ->get()->getResultArray();
    }

    public function getSpp($id_spp = false)
    {
        if ($id_spp == false) {
            $this->findAll();
        }

        return $this->where(['id_spp' => $id_spp])->first();
    }

    public function ubahSpp($data, $id_spp)
    {
        return $this->db->table('spp')->update($data, ['id_spp' => $id_spp]);
    }

    public function hapusSpp($id_spp)
    {
        return $this->db->table('spp')->delete(['id_spp' => $id_spp]);
    }
}
