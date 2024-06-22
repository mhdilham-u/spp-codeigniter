<?php

namespace App\Controllers;

use App\Models\PetugasModel;

class Petugas extends BaseController
{
    public function __construct()
    {
        $this->PetugasModel = new PetugasModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data | Petugas',
            'petugas' => $this->PetugasModel->findAll()
        ];
        return view('petugas/petugas', $data);
    }

    public function tambah()
    {
        session();
        $data = [
            'title' => 'Tambah | Petugas',
            'validation' => \Config\Services::validation()
        ];
        return view('petugas/tambah_petugas', $data);
    }

    public function simpanPetugas()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|max_length[10]|is_unique[petugas.username]',
                'errors' => [
                    'required' => 'Username harus diisi!',
                    'max_length' => 'Maaf, Username tidak boleh lebih dari 10 huruf!',
                    'is_unique' => 'Maaf, Username yang anda masukkan sudah terdaftar!'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi!'
                ]
            ],
            'ulangipassword' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Ulangi Password harus diisi!',
                    'matches' => 'Password anda tidak sama!'
                ]
            ],
            'namapetugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi!'
                ]
            ],
            'fotopetugas' => [
                'rules' => 'uploaded[fotopetugas]|ext_in[fotopetugas,jpg,jpeg,png,svg]',
                'errors' => [
                    'uploaded' => 'Foto harus diisi!',
                    'ext_in' => 'Maaf, yang anda pilih bukan gambar!'
                ]
            ]
        ])) {
            return redirect()->to('/petugas/tambah')->withInput();
        }
        // ambil gambar
        $fileFoto = $this->request->getFile('fotopetugas');
        $namaFotoPetugas = $fileFoto->getRandomName();
        $fileFoto->move('img/petugas', $namaFotoPetugas);

        date_default_timezone_set('Asia/Jakarta');
        $this->PetugasModel->save([
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'nama_petugas' => $this->request->getPost('namapetugas'),
            'level' => $this->request->getPost('level'),
            'fotopetugas' => $namaFotoPetugas
        ]);
        session()->setFlashdata('pesan', 'Ditambahkan!');
        return redirect()->to('/petugas');
    }

    public function ubah($id_petugas)
    {
        session();
        $data = [
            'title' => 'Ubah Data Petugas',
            'petugas' => $this->PetugasModel->getPetugas($id_petugas),
            'validation' => \Config\Services::validation()
        ];
        return view('petugas/ubah_petugas', $data);
    }

    public function ubahPetugas($id_petugas)
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|max_length[10]|is_unique[petugas.username,id_petugas,' . $id_petugas . ']',
                'errors' => [
                    'required' => 'Username harus diisi!',
                    'max_length' => 'Maaf, Username tidak boleh lebih dari 10 huruf!',
                    'is_unique' => 'Maaf, Username yang anda masukkan sudah terdaftar!'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi!'
                ]
            ],
            'ulangipassword' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Ulangi Password harus diisi!',
                    'matches' => 'Password anda tidak sama!'
                ]
            ],
            'namapetugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi!'
                ]
            ],
            'fotopetugas' => [
                'rules' => 'uploaded[fotopetugas]|ext_in[fotopetugas,svg,jpg,jpeg,png]',
                'errors' => [
                    'uploaded' => 'Foto harus diisi!',
                    'ext_in' => 'Maaf, yang anda pilih bukan gambar!'
                ]
            ]
        ])) {
            return redirect()->to('/petugas/ubah/' . $id_petugas)->withInput();
        }
        $fileFoto = $this->request->getFile('fotopetugas');
        if ($fileFoto->getError() == 4) {
            $namaFotoPetugas = $this->request->getFile('fotoLamaPetugas');
        } else {
            $namaFotoPetugas = $fileFoto->getRandomName();
            $fileFoto->move('img/petugas', $namaFotoPetugas);
            unlink('img/petugas/' . $this->request->getPost('fotoLamaPetugas'));
        }

        date_default_timezone_set('Asia/Jakarta');
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'nama_petugas' => $this->request->getPost('namapetugas'),
            'level' => $this->request->getPost('level'),
            'fotopetugas' => $namaFotoPetugas
        ];

        $this->PetugasModel->ubahPetugas($data, $id_petugas);

        session()->setFlashdata('pesan', 'Diubah!');
        return redirect()->to('/petugas');
    }

    public function hapus($id_petugas)
    {
        // cari gambar berdasarkan id petugas
        $petugas = $this->PetugasModel->where('id_petugas', $id_petugas)->get()->getRowArray();

        // hapus gambar petugas
        unlink('img/petugas/' . $petugas['fotopetugas']);

        $this->PetugasModel->hapusPetugas($id_petugas);
        session()->setFlashdata('pesan', 'Dihapus!');
        return redirect()->to('/petugas');
    }
}
