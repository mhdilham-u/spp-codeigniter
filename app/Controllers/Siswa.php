<?php

namespace App\Controllers;

use App\Models\SiswaModel;

class Siswa extends BaseController
{
    public function __construct()
    {
        $this->SiswaModel = new SiswaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data | Siswa',
            'siswa' => $this->SiswaModel->getSiswa()
        ];
        return view('siswa/siswa', $data);
    }

    public function tambah()
    {
        session();
        $data = [
            'title' => 'Tambah | Siswa',
            'validation' => \Config\Services::validation()
        ];
        return view('siswa/tambah_siswa', $data);
    }

    public function simpansiswa()
    {
        if (!$this->validate([
            'nisn' => [
                'rules' => 'required|max_length[10]|is_unique[siswa.nisn]',
                'errors' => [
                    'required' => 'NISN harus diisi!',
                    'max_length' => 'Maaf, NISN tidak boleh lebih dari 10 angka!',
                    'is_unique' => 'Maaf, NISN yang anda masukkan sudah terdaftar!'
                ]
            ],
            'nis' => [
                'rules' => 'required|max_length[4]|is_unique[siswa.nis]',
                'errors' => [
                    'required' => 'NIS harus diisi!',
                    'max_length' => 'Maaf, NIS tidak boleh lebih dari 4 angka!',
                    'is_unique' => 'Maaf, NIS yang anda masukkan sudah terdaftar'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi!'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi!'
                ]
            ],
            'notelp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No Telp harus diisi!'
                ]
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|ext_in[foto,jpg,jpeg,png,svg]',
                'errors' => [
                    'uploaded' => 'Maaf, Foto harus diisi!',
                    'ext_in' => 'Maaf, yang anda pilih bukan gambar!'
                ]
            ]
        ])) {
            return redirect()->to('/siswa/tambah')->withInput();
        }
        // ambil gambar
        $fileFoto = $this->request->getFile('foto');
        $namaFoto = $fileFoto->getRandomName();
        $fileFoto->move('img/siswa', $namaFoto);

        date_default_timezone_set('Asia/Jakarta');
        $this->SiswaModel->save([
            'nisn' => $this->request->getPost('nisn'),
            'nis' => $this->request->getPost('nis'),
            'nama' => $this->request->getPost('nama'),
            'id_kelas' => $this->request->getPost('kelas'),
            'no_telp' => $this->request->getPost('notelp'),
            'alamat' => $this->request->getPost('alamat'),
            'foto' => $namaFoto
        ]);
        session()->setFlashdata('pesan', 'Ditambahkan!');
        return redirect()->to('/siswa');
    }

    public function ubah($nis)
    {
        session();
        $data = [
            'title' => 'Tambah Data Siswa',
            'siswa' => $this->SiswaModel->getDataSiswaCetak($nis),
            'validation' => \Config\Services::validation()
        ];
        return view('siswa/ubah_siswa', $data);
    }

    public function ubahSiswa($nis)
    {
        if (!$this->validate([
            'nisn' => [
                'rules' => 'required|max_length[10]|is_unique[siswa.nisn,nis,' . $nis . ']',
                'errors' => [
                    'required' => 'NISN harus diisi!',
                    'max_length' => 'Maaf, NISN tidak boleh lebih dari 10 angka!',
                    'is_unique' => 'Maaf, NISN yang anda masukkan sudah terdaftar!'
                ]
            ],
            'nis' => [
                'rules' => 'required|max_length[4]|is_unique[siswa.nis,nis,' . $nis . ']',
                'errors' => [
                    'required' => 'NIS harus diisi!',
                    'max_length' => 'Maaf, NIS tidak boleh lebih dari 4 angka!',
                    'is_unique' => 'Maaf, NIS yang anda masukkan sudah terdaftar!'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi!'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi!'
                ]
            ],
            'notelp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No Telp harus diisi!'
                ]
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|ext_in[foto,jpg,jpeg,png,svg]',
                'errors' => [
                    'uploaded' => 'Maaf, Foto harus diisi!',
                    'ext_in' => 'Maaf, yang anda pilih bukan gambar!'
                ]
            ]
        ])) {
            return redirect()->to("/siswa/ubah/$nis")->withInput();
        }
        $fileFoto = $this->request->getFile('foto');
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getFile('fotoLama');
        } else {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('img/siswa', $namaFoto);
            unlink('img/siswa/' . $this->request->getPost('fotoLama'));
        }

        date_default_timezone_set('Asia/Jakarta');
        $data = [
            'nis' => $this->request->getPost('nis'),
            'nisn' => $this->request->getPost('nisn'),
            'nama' => $this->request->getPost('nama'),
            'id_kelas' => $this->request->getPost('kelas'),
            'alamat' => $this->request->getPost('alamat'),
            'no_telp' => $this->request->getPost('notelp'),
            'foto' => $namaFoto
        ];

        $this->SiswaModel->ubahSiswa($data, $nis);
        session()->setFlashdata('pesan', 'Diubah!');
        return redirect()->to("/siswa");
    }

    public function hapus($nis)
    {
        // cari gambar berdasarkan nis
        $siswa = $this->SiswaModel->where('nis', $nis)->get()->getRowArray();

        // hapus gambar 
        unlink('img/siswa/' . $siswa['foto']);
        $this->SiswaModel->hapusSiswa($nis);
        session()->setFlashdata('pesan', 'Dihapus');
        return redirect()->to('/siswa');
    }
}
