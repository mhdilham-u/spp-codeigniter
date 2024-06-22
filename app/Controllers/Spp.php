<?php

namespace App\Controllers;

use App\Models\SppModel;

class Spp extends BaseController
{
    public function __construct()
    {
        $this->SppModel = new SppModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data | SPP',
            'spp' => $this->SppModel->findAll()
        ];
        return view('spp/spp', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah | SPP',
            'validation' => \Config\Services::validation()
        ];
        return view('spp/tambah_spp', $data);
    }

    public function simpanspp()
    {
        if (!$this->validate([
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun harus diisi!'
                ]
            ],
            'nominal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nominal harus diisi!'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/spp/tambah')->withInput()->with('validation', $validation);
        }
        date_default_timezone_set('Asia/Jakarta');
        $this->SppModel->save([
            'tahun' => $this->request->getPost('tahun'),
            'nominal' => $this->request->getPost('nominal')
        ]);
        session()->setFlashdata('pesan', 'Ditambahkan!');
        return redirect()->to('/spp');
    }

    public function ubah($id_spp)
    {
        session();
        $data = [
            'title' => 'Tambah Data Siswa',
            'spp' => $this->SppModel->getSpp($id_spp),
            'validation' => \Config\Services::validation()
        ];
        return view('spp/ubah_spp', $data);
    }

    public function ubahSpp($id_spp)
    {
        if (!$this->validate([
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun harus diisi!'
                ]
            ],
            'nominal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nominal harus diisi!'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to("/spp/ubah/$id_spp")->withInput()->with('validation', $validation);
        }

        date_default_timezone_set('Asia/Jakarta');
        $data = [
            'tahun' => $this->request->getPost('tahun'),
            'nominal' => $this->request->getPost('nominal')
        ];

        $this->SppModel->ubahSpp($data, $id_spp);
        session()->setFlashdata('pesan', 'Diubah!');
        return redirect()->to("/spp");
    }

    public function hapus($id_spp)
    {
        $this->SppModel->hapusSpp($id_spp);
        session()->setFlashdata('pesan', 'Dihapus!');
        return redirect()->to('/spp');
    }
}
