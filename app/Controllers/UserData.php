<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserDataModel;

class UserData extends BaseController
{
    protected $userdataModel;

    public function __construct()
    {
        $this->userdataModel = new UserDataModel();
    }
    public function index()
    {
        $userdata = $this->userdataModel->paginate(2, 'userdata');

        $data = [
            'tittle' => "Users Data | E-Rekrutmen",
            'userdata' => $userdata,
            "pager" => $this->userdataModel->pager
        ];

        return view('userdata/index', $data);
    }

    public function save()
    {
        if (session()->get('role') != 2) {
            return redirect()->to('/');
        }

        if (
            !$this->validate([
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Name Tidak boleh kosong'
                    ]
                ],
                'address' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Address Tidak boleh kosong'
                    ]
                ],
                'position' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Position Tidak boleh kosong'
                    ]
                ],
                'file' => [
                    'rules' => 'uploaded[file]|mime_in[file,application/pdf]|max_size[file,2048]',
                    'errors' => [
                        'uploaded' => 'Harus Ada File yang diupload',
                        'mime_in' => 'File Extension Harus Berupa PDF',
                        'max_size' => 'Ukuran File Maksimal 2 MB'
                    ]
                ]
            ])
        ) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $userdata = $this->userdataModel;
        $dataUser = $this->request->getFile('file');
        $fileName = $dataUser->getRandomName();
        $userdata->insert([
            'name' => $this->request->getPost('name'),
            'address' => $this->request->getPost('address'),
            'file' => $fileName,
            'position' => $this->request->getPost('position')
        ]);
        $dataUser->move('uploads/file/', $fileName);
        session()->setFlashdata('success', 'Data Berhasil diupload');
        return redirect()->to(base_url('/job'));
    }

    function download($id)
    {
        if (session()->get('role') != 1) {
            return redirect()->to('/');
        }

        $userdata = $this->userdataModel;
        $data = $userdata->find($id);
        return $this->response->download('uploads/file/' . $data->file, null);
    }

    public function delete($id)
    {
        if (session()->get('role') != 1) {
            return redirect()->to('/');
        }

        $userdata = $this->userdataModel;
        $data = $userdata->find($id);

        // Hapus file
        $file_path = 'uploads/file/' . $data->file;
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        // Hapus data dari database
        $this->userdataModel->delete($id);

        return redirect()->to('/berkas');
    }
}