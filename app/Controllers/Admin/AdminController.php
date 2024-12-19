<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminController extends BaseController
{
    public function index()
    {


        $data = [
            'clients' => [],
            'title' => 'Dashboard',
            'isLogin' =>  false
        ];

        echo view('template/header', $data);
        echo view('Admin/dashboard', $data);
        echo view("template/footer", $data);
    }
}
