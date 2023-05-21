<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class Login extends ResourceController
{
    protected $session;
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = \Config\Services::session();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'tittle' => "Login | E-Rekrutmen",
        ];

        echo view('auth/login', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->userModel
            ->where('email', $email)
            ->first();

        if (!$user) {
            throw new \Exception("User not found!");
        }

        if (md5($password) != $user['password']) {
            throw new \Exception("Credentials is invalid!");
        }

        $this->session->set('id', $user['id']);
        $this->session->set('name', $user['name']);
        $this->session->set('loggedIn', true);
        $this->session->set('role', $user['role']);

        return redirect()->to('/');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}