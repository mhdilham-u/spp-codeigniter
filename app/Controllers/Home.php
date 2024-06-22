<?php

namespace App\Controllers;

use App\Models\LaporanModel;

class Home extends BaseController
{
	public function __construct()
	{
		$this->LaporanModel = new LaporanModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Welcome!'
		];
		return view('home/index', $data);
	}

	public function dashboard()
	{
		$data = [
			'title' => 'Page | Dashboard',
			'dataSiswa' => $this->LaporanModel->countSiswa(),
			'dataKelas' => $this->LaporanModel->countKelas(),
			'dataPetugas' => $this->LaporanModel->countPetugas()
		];
		return view('layout/dashboard', $data);
	}

	public function profile()
	{
		$data = [
			'title' => 'Page | Profile'
		];
		return view('home/profile', $data);
	}
}
