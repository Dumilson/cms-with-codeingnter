<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\UserModel;
use App\Modules\CMS\Auth\App\UserEntity;

class AuthController extends BaseController
{
    private $model;
    private $auth;

    public function __construct()
    {
        $this->model = new UserModel();
        $this->auth = service('authentication');
    }

    public function index()
    {
        if ($this->auth->check()) {
            return redirect()->to('/dashboard');
        }

        $data = [
            'title' => 'Login',
            'isLogin' => true
        ];

        echo view('template/header', $data);
        echo view('auth/login');
        echo view('template/footer', $data);
    }

    public function login()
    {
        $validation = \Config\Services::validation();
        $validation->setRules($this->model->validationRules, $this->model->getValidationMessages());

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user = $this->model->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Usuário não encontrado.');
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Senha inválida.');
        }

        $userEntity = new UserEntity($user);

        if ($this->auth->login($userEntity)) {
            return redirect()->to('/dashboard')->with('success', 'Login realizado com sucesso!');
        }

        return redirect()->back()->with('error', 'Usuário ou senha inválidos');
    }

    public function logout()
    {

        $this->auth->logout();
        session()->destroy();
        return redirect()->to('auth/login');
    }
}
