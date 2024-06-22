<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $allowedFields = ['nisn', 'nis', 'nama', 'alamat', 'no_telp', 'id_kelas', 'foto'];
    protected $useTimestamps = true;
    protected $createdField = 'dibuat_pada';
    protected $updatedField = 'diubah_pada';

    public function proses_pembayaran($data, $id_pembayaran)
    {
        return $this->db->table("pembayaran")->update($data, ['id_pembayaran' => $id_pembayaran]);
    }

    public function proses_batal($data, $no_bayar)
    {
        return $this->db->table("pembayaran")->update($data, ['no_bayar' => $no_bayar]);
    }

    public function tambahBulan($data)
    {
        return $this->db->table("pembayaran")->insert($data);
    }

    public function noBayar()
    {
        $query = $this->db->table('pembayaran')
            ->select('RIGHT(no_bayar,4) as no_bayar', false)
            ->orderBy('no_bayar', 'DESC')
            ->limit(1)->get()->getRowArray();

        if ($query['no_bayar'] == null) {
            $no = 1;
        } else {
            $no = intval($query['no_bayar']) + 1;
        }

        $tgl = date('Ymd');
        $batas = str_pad($no, 4, "0", STR_PAD_LEFT);
        return $tgl . $batas;
    }

    public function getAllCetak($id_pembayaran)
    {
        return $this->db->table('pembayaran')
            ->join('siswa', 'siswa.nisn=pembayaran.nisn')
            ->join('petugas', 'petugas.id_petugas=pembayaran.id_petugas')
            ->join('kelas', 'kelas.id_kelas=pembayaran.id_kelas')
            ->join('spp', 'spp.id_spp=pembayaran.id_spp')
            ->where(['id_pembayaran' => $id_pembayaran])
            ->get()->getResultArray();
    }

    public function hapus($id_pembayaran)
    {
        return $this->db->table('pembayaran')->delete(['id_pembayaran' => $id_pembayaran]);
    }

    public function ubahSiswa($data, $nis)
    {
        return $this->db->table('siswa')->update($data, ['nis' => $nis]);
    }

    public function hapusSiswa($nis)
    {
        return $this->db->table('siswa')->delete(['nis' => $nis]);
    }

    public function getSiswa($nis = false)
    {
        if ($nis == false) {
            return $this->db->table('siswa')
                ->join('kelas', 'kelas.id_kelas=siswa.id_kelas')->orderBy('nis DESC')
                ->get()->getResultArray();
        }

        return $this->where(['nis' => $nis])->first();
    }

    public function getDataSiswaCetak($nis)
    {
        return $this->db->table('siswa')
            ->join('kelas', 'kelas.id_kelas=siswa.id_kelas')
            ->where(['nis' => $nis])
            ->get()->getResultArray()[0];
    }
}
