<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Client\ClientModel;
use App\Models\User\UserModel;

class AdminController extends BaseController
{

    private $model;

    public function __construct()
    {
        $this->model = new ClientModel();
    }

    public function index()
    {
        $data = [
            'clients' => $this->model->getClientCountBySegment(),
            'title' => 'Dashboard',
            'isLogin' => false
        ];

        return view('template/header', $data)
            . view('admin/dashboard', $data)
            . view('template/footer', $data);
    }
}
