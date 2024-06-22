<?php

namespace App\Controllers;

use App\Models\SppModel;

class History extends BaseController
{
    public function __construct()
    {
        $this->SppModel = new SppModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data = [
            'title' => 'History Pembayaran',
            'db' => $this->db,
            'data' => $this->SppModel
        ];
        return view('history/index', $data);
    }
}
