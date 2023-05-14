<?php

namespace App\Controllers;

use App\Models\JobModel;
use App\Models\UserDataModel;

class Home extends BaseController
{
    protected $jobModel;
    protected $userdataModel;
    public function __construct()
    {
        $this->jobModel = new JobModel();
        $this->userdataModel = new UserDataModel();
    }
    public function index()
    {
        $job = $this->jobModel->findAll();
        $jumlah_baris = $this->jobModel->countAll(); // Menghitung jumlah baris pada tabel

        $userdata = $this->userdataModel->findAll();
        $jumlah_baris2 = $this->userdataModel->countAll();

        $data = [
            'tittle' => "Dashboard | E-Rekrutmen",
            'job' => $job,
            'jumlah' => $jumlah_baris,
            'jumlah2' => $jumlah_baris2
        ];

        return view('home', $data);
    }
}