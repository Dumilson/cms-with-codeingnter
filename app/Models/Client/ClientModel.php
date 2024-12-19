<?php

namespace App\Models\Client;

use CodeIgniter\Model;

class ClientModel extends Model
{
    protected $table            = 'clients';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name',
        'email',
        'phone',
        'segment_id',
        'created_at',
        'deleted_at',
        'updated_at'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
    protected $validationRules = [
        'name' => 'required|min_length[3]|max_length[255]',
        'email' => 'required|valid_email|max_length[255]|is_unique[clients.email,id,{id}]',
        'phone' => 'required|min_length[6]|max_length[15]',
        'segment_id' => 'required|integer',
        'id' => 'permit_empty|integer',
    ];

    protected $validationMessages = [
        'name' => [
            'required' => 'O campo Nome é obrigatório.',
            'min_length' => 'O campo Nome deve ter pelo menos 3 caracteres.',
            'max_length' => 'O campo Nome não pode exceder 255 caracteres.',
        ],
        'email' => [
            'required' => 'O campo Email é obrigatório.',
            'valid_email' => 'O campo Email deve conter um endereço de email válido.',
            'max_length' => 'O campo Email não pode exceder 255 caracteres.',
            'is_unique' => 'O campo Email deve ser único.',
        ],
        'phone' => [
            'required' => 'O campo Telefone é obrigatório.',
            'min_length' => 'O campo Telefone deve ter pelo menos 10 caracteres.',
            'max_length' => 'O campo Telefone não pode exceder 15 caracteres.',
        ],
        'segment_id' => [
            'required' => 'O campo Segmento ID é obrigatório.',
            'integer' => 'O campo Segmento ID deve ser um número inteiro.',
        ],
    ];

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

    public function getClientById($id)
    {
        return $this->find($id);
    }

    public function getClientWithSegmentById($id)
    {
        return $this->select('clients.*, segments.name as segment_name')
            ->join('segments', 'segments.id = clients.segment_id')
            ->where('clients.id', $id)
            ->first();
    }

    public function getAllClients()
    {
        return $this->select('clients.*, segments.name as segment_name')
            ->join('segments', 'segments.id = clients.segment_id')
            ->findAll();
    }

    public function createClient($data)
    {
        return $this->insert($data);
    }

    public function updateClient($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteClient($id)
    {
        return $this->delete($id);
    }

    public function getCustomValidationRules($id = null)
    {
        $rules = $this->validationRules;
        if ($id !== null) {
            $rules['email'] = str_replace('{id}', $id, $rules['email']);
        }
        return $rules;
    }

    public function getClientCountBySegment()
    {
        return $this->select('segments.name as segment_name, COUNT(clients.id) as client_count')
        ->join('segments', 'segments.id = clients.segment_id')
        ->groupBy('segments.name')
        ->findAll();
    }
}
