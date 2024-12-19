<?php

namespace App\Models\User;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'email',
        'username',
        'password_hash',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'email' => [
            'label' => 'Email',
            'rules' => 'required|min_length[1]|max_length[255]'
        ],
        'password_hash' => [
            'label' => 'Senha',
            'rules' => 'required|min_length[6]'
        ],
    ];
    protected $validationMessages = [
        'email' => [
            'required' => 'O campo de email é obrigatório.',
            'min_length' => 'O email deve ter pelo menos 3 caracteres.',
            'max_length' => 'O email não pode exceder 20 caracteres.',
            'is_unique' => 'Desculpe. Esse email já foi registrado. Por favor, escolha outro.',
        ],
        'password_hash' => [
            'required' => 'O campo de senha é obrigatório.',
            'min_length' => 'A senha deve ter pelo menos 6 caracteres.',
        ],
    ];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
