<?php

namespace App\Controllers;

use App\Models\SiswaModel;

class Transaksi extends BaseController
{
    public function __construct()
    {
        $this->SiswaModel = new SiswaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Transaksi | Pembayaran SPP',
            'db' => $this->db,
            'model' => $this->SiswaModel,
            'validation' => \Config\Services::validation()
        ];
        return view('transaksi/index', $data);
    }

    public function proses($nis, $id_pembayaran)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $no_bayar = $this->SiswaModel->noBayar();
        // $pembayaran = $this->db->query("SELECT * FROM pembayaran WHERE id_pembayaran = $id_pembayaran");
        // $p = $pembayaran->getResultArray()[0];
        $p = $this->SiswaModel->db->table('pembayaran')
            ->join('petugas', 'petugas.id_petugas=pembayaran.id_petugas')
            ->join('spp', 'spp.id_spp=pembayaran.id_spp')
            ->join('siswa', 'siswa.nisn=pembayaran.nisn')
            ->where(['id_pembayaran' => $id_pembayaran])
            ->get()->getResultArray()[0];
        $data = [
            'tgl_bayar' => $tgl,
            'no_bayar' => $no_bayar,
            'jumlah_bayar' => $p['nominal'],
            'status' => 'LUNAS',
            'id_kelas' => $p['id_kelas']
        ];
        $this->SiswaModel->proses_pembayaran($data, $id_pembayaran);
        session()->setFlashdata('berhasil', "Pembayaran SPP bulan $p[bulan] tahun $p[tahun] berhasil!");
        return redirect()->to("/transaksi?nis=" . $nis);
    }

    public function batal($no_bayar, $nis)
    {
        $pembayaran = $this->db->query("SELECT * FROM pembayaran WHERE no_bayar = $no_bayar");
        $p = $pembayaran->getResultArray()[0];
        $data = [
            'tgl_bayar' => null,
            'no_bayar' => null,
            'jumlah_bayar' => null,
            'status' => null,
        ];
        $this->SiswaModel->proses_batal($data, $no_bayar);
        session()->setFlashdata('batal', "Pembatalan SPP bulan $p[bulan] tahun $p[tahun] berhasil!");
        return redirect()->to("/transaksi?nis=" . $nis);
    }

    public function tambahBulan($nis)
    {
        if (!$this->validate([
            'bulan' => [
                'rules' => 'required',
                'error' => [
                    'required' => 'Maaf, Bulan harus diisi!'
                ]
            ],
            'tahun' => [
                'rules' => 'required',
                'error' => [
                    'required' => 'Maaf, Tahun harus diisi!'
                ]
            ]
        ])) {
            return redirect()->to("/transaksi?nis=$nis")->withInput();
        }
        $pembayaran = $this->SiswaModel->db->table('siswa')
            ->where(['nis' => $nis])
            ->get()->getResultArray();
        $p = $pembayaran[0];

        $data = [
            'id_petugas' => session()->get('idpetugas'),
            'bulan' => $this->request->getPost('bulan'),
            'tahun' => $this->request->getPost('tahun'),
            'id_spp' => 1,
            'nisn' => $p['nisn'],
            'jumlah_bayar' => 0
        ];
        $this->SiswaModel->tambahBulan($data);
        return redirect()->to("/transaksi?nis=$p[nis]");
    }

    public function cetak($id_pembayaran)
    {
        $data = [
            'title' => 'Cetak Bukti Pembayaran',
            'd' => $this->SiswaModel->getAllCetak($id_pembayaran)[0]
        ];
        return view('transaksi/cetak', $data);
    }

    public function hapus($nis, $id_pembayaran)
    {
        $this->SiswaModel->hapus($id_pembayaran);
        session()->setFlashdata('pesan', 'Dihapus!');
        return redirect()->to("/transaksi?nis=$nis");
    }
}
