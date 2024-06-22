<?php

namespace App\Controllers;

use App\Models\LaporanModel;

class Laporan extends BaseController
{
    public function __construct()
    {
        $this->LaporanModel = new LaporanModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Generate Laporan'
        ];
        return view('laporan/index', $data);
    }

    public function siswa()
    {
        $data = [
            'title' => 'Laporan | Siswa',
            'db' => $this->db
        ];
        return view('laporan/laporan_siswa', $data);
    }

    public function kelas()
    {
        $data = [
            'title' => 'Laporan | Kelas',
            'db' => $this->db
        ];
        return view('laporan/laporan_kelas', $data);
    }

    public function petugas()
    {
        $data = [
            'title' => 'Laporan | Petugas',
            'db' => $this->db
        ];
        return view('laporan/laporan_petugas', $data);
    }

    public function spp()
    {
        $data = [
            'title' => 'Laporan | SPP (Lunas)',
            'laporan' => $this->LaporanModel
        ];
        return view('laporan/laporan_spp', $data);
    }

    public function sppBlmLunas()
    {
        $data = [
            'title' => 'Laporan | SPP (Belum Lunas)',
            'laporan' => $this->LaporanModel
        ];
        return view('laporan/laporan_sppblmlunas', $data);
    }
}
