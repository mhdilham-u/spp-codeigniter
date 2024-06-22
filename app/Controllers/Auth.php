<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->AuthModel = new AuthModel();
    }
    public function login()
    {
        session();
        $data = [
            'title' => 'Login',
            'error' => false,
            'validation' => \Config\Services::validation()
        ];
        return view('auth/login', $data);
    }

    public function ceklogin()
    {
        if ($this->validate([
            'username' => [
                'rules' => 'required|is_not_unique[petugas.username]',
                'errors' => [
                    'required' => 'Maaf, Username harus diisi!',
                    'is_not_unique' => 'Maaf, Username yang anda masukkan salah!'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Maaf, Password harus diisi!'
                ]
            ]
        ])) {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $cek = $this->AuthModel->where('username', $username)->first();
            $pass = $cek['password'];
            if ($cek['username'] == $username) {
                if (password_verify($password, $pass)) {
                    session()->set('login', true);
                    session()->set('idpetugas', $cek['id_petugas']);
                    session()->set('username', $cek['username']);
                    session()->set('nama_petugas', $cek['nama_petugas']);
                    session()->set('level', $cek['level']);
                    session()->set('foto', $cek['fotopetugas']);
                    session()->set('nis', $cek['nis']);
                    return redirect()->to('/home');
                } else {
                    return redirect()->to('/login')->withInput();
                }
            } else {
                return redirect()->to('/login')->withInput();
            }
        } else {
            return redirect()->to('/login')->withInput();
        }
    }

    public function logout()
    {
        session()->remove('login');
        session()->remove('idpetugas');
        session()->remove('username');
        session()->remove('nama_petugas');
        session()->remove('level');
        session()->remove('foto');
        session()->setFlashdata('logout', 'Anda Berhasil Logout!');
        return redirect()->to('/login');
    }
}
