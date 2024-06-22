<?php

namespace App\Controllers;

use App\Models\KelasModel;

class Kelas extends BaseController
{
    public function __construct()
    {
        $this->KelasModel = new KelasModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data | Kelas',
            'kelas' => $this->KelasModel->findAll()
        ];
        return view('kelas/kelas', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah | Kelas',
            'validation' => \Config\Services::validation()
        ];
        return view('kelas/tambah_kelas', $data);
    }

    public function simpankelas()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->KelasModel->save([
            'nama_kelas' => $this->request->getPost('namakelas'),
            'kompetensi_keahlian' => $this->request->getPost('jurusan')
        ]);
        session()->setFlashdata('pesan', 'Ditambahkan!');
        return redirect()->to('/kelas');
    }

    public function ubahKelas($id_kelas)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = [
            'nama_kelas' => $this->request->getPost('namakelas'),
            'kompetensi_keahlian' => $this->request->getPost('jurusan')
        ];

        $this->KelasModel->ubahKelas($data, $id_kelas);
        session()->setFlashdata('pesan', 'Diubah!');
        return redirect()->to("/kelas");
    }

    public function ubah($id_kelas)
    {
        session();
        $data = [
            'title' => 'Ubah Data Kelas',
            'kelas' => $this->KelasModel->getKelas($id_kelas)
        ];
        return view('kelas/ubah_kelas', $data);
    }

    public function hapus($id_kelas)
    {
        $this->KelasModel->hapusKelas($id_kelas);
        session()->setFlashdata('pesan', 'Dihapus!');
        return redirect()->to('/kelas');
    }
}
