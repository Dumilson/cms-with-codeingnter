<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\Client\ClientModel;
use App\Models\Client\SegmentModel;
use App\Modules\CMS\Client\App\ClientEntity;

class ClientController extends BaseController
{
    protected $model;
    protected $modelSegment;

    public function __construct()
    {
        $this->model = new ClientModel();
        $this->modelSegment = new SegmentModel();
    }

    public function index()
    {
        $clients = $this->model->getAllClients();
        $data = [
            'clients' => $clients,
            'title' => 'Clientes',
            'isLogin' =>  false
        ];

        echo view('template/header', $data);
        echo view('client/index', $data);
        echo view("template/footer", $data);
    }


    public function create()
    {
        $data = [
            'segments' => $this->modelSegment->findAll(),
            'title' => 'Cadastro de Clientes',
            'isLogin' =>  false
        ];
        echo view('template/header', $data);
        echo  view('client/create');
        echo view("template/footer", $data);
    }

    public function store()
    {

        $clientData = $this->request->getPost();

        $validation = \Config\Services::validation();
        $validation->setRules($this->model->validationRules, $this->model->getValidationMessages());

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $clientEntity = new ClientEntity();
        $clientEntity->fill($clientData);

        if ($this->model->createClient($clientEntity)) {
            return redirect()->to('/client')->with('success', 'Client created successfully');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->model->errors());
        }
    }

    public function edit($id)
    {
        $client = $this->model->find($id);
        if ($client) {
            $data = [
                'segments' => $this->modelSegment->findAll(),
                'title' => 'Editar Cliente',
                'client' => $client,
                'isLogin' =>  false
            ];
            echo view('template/header', $data);
            echo view('client/edit', $data);
            echo view("template/footer", $data);
        } else {
            return redirect()->to('/client')->with('error', 'Client not found');
        }
    }



    public function update($id)
    {
        $clientData = $this->request->getPost();
        $validation = \Config\Services::validation();

        $validation->setRules($this->model->getCustomValidationRules($id), $this->model->getValidationMessages());

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }


        $clientEntity = new ClientEntity();
        $clientEntity->fill($clientData);
    
        if ($this->model->updateClient($id, $clientEntity)) {

            return redirect()->to('/client')->with('success', 'Client updated successfully');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->model->errors());
        }
    }

    public function delete($id)
    {
        if ($this->model->delete($id)) {
            return redirect()->to('/client')->with('success', 'Client deleted successfully');
        } else {
            return redirect()->to('/client')->with('error', 'Failed to delete client');
        }
    }
}