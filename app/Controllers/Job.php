<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JobModel;

class Job extends BaseController
{
    protected $jobModel;
    protected $session;

    public function __construct()
    {
        $this->jobModel = new JobModel();
        $this->session = \Config\Services::session();
        $this->session->start();

        if (!$this->session->get('jobs')) {
            $this->session->set('jobs');
        }
    }

    public function index()
    {
        // $job = $this->jobModel->findAll();
        $job = $this->jobModel->paginate(5, 'jobs');

        $data = [
            'tittle' => "Job List | E-Rekrutmen",
            'job' => $job,
            "pager" => $this->jobModel->pager
        ];

        return view('jobs/index', $data);
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

    public function apply($id = null)
    {
        $job = $this->jobModel->find($id);
        $data = [
            'tittle' => "Apply Job | E-Rekrutmen",
            'job' => $job
        ];

        return view('/userdata/apply', $data);
    }
    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function create()
    {
        $data = [
            'tittle' => "Add Job | E-Rekrutmen"
        ];

        return view('jobs/upload', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function save()
    {
        $data = [
            "position" => $this->request->getPost('position'),
            "location" => $this->request->getPost('location'),
            "end_date" => $this->request->getPost('end_date')
        ];

        $this->jobModel->insert($data);
        return redirect()->to('/jobs/index');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = [
            'tittle' => "Edit Job | E-Rekrutmen",
            'job' => $this->jobModel->getJob($id)
        ];
        echo view('/jobs/edit', $data);

    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id)
    {
        $data = [
            "position" => $this->request->getPost('position'),
            "location" => $this->request->getPost('location'),
            "end_date" => $this->request->getPost('end_date')
        ];

        $this->jobModel->update($id, $data);

        return redirect()->to('/jobs/index');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id)
    {
        $this->jobModel->delete($id);
        return redirect()->to('/jobs/index');
    }

}
