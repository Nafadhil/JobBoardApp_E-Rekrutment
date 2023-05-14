<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserDataModel;

class UserData extends BaseController
{
	protected $berkas;

	public function __construct()
	{
		$this->berkas = new UserDataModel();
	}
	public function index()
	{
		$berkas = new UserDataModel();
		$berkas = $this->berkas->paginate(2, 'userdata');

		$data = [
			'tittle' => "Users Data | E-Rekrutmen",
			'berkas' => $berkas,
			"pager" => $this->berkas->pager
		];

		//$data['berkas'] = $berkas->findAll();
		return view('/view_berkas', $data);
	}

	public function create($id = null)
	{
		$data = [
			'tittle' => "Job Apply | E-Rekrutmen",
			'berkas' => $this->berkas->getUserData($id)
		];
		return view('/form_upload', $data);
	}

	public function save()
	{
		if (
			!$this->validate([
				'name' => [
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Tidak boleh kosong'
					]
				],
				'address' => [
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Tidak boleh kosong'
					]
				],
				'keterangan' => [
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Tidak boleh kosong'
					]
				],
				'berkas' => [
					'rules' => 'uploaded[berkas]|mime_in[berkas,image/jpg,image/jpeg,image/gif,image/png,application/pdf]|max_size[berkas,2048]',
					'errors' => [
						'uploaded' => 'Harus Ada File yang diupload',
						'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
						'max_size' => 'Ukuran File Maksimal 2 MB'
					]
				]
			])
		) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->back()->withInput();
		}

		$berkas = new UserDataModel();
		$dataBerkas = $this->request->getFile('berkas');
		$fileName = $dataBerkas->getRandomName();
		$berkas->insert([
			'name' => $this->request->getPost('name'),
			'address' => $this->request->getPost('address'),
			'file' => $fileName,
			'position' => $this->request->getPost('keterangan')
		]);
		$dataBerkas->move('uploads/berkas/', $fileName);
		session()->setFlashdata('success', 'Berkas Berhasil diupload');
		return redirect()->to(base_url('/'));
	}

	function download($id)
	{
		$berkas = new UserDataModel();
		$data = $berkas->find($id);
		return $this->response->download('uploads/berkas/' . $data->file, null);
	}

	public function delete($id)
	{
		$this->berkas->delete($id);
		return redirect()->to('/berkas');
	}
}