<?php


namespace App\Models;


use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table      = 'categories';
    protected $primaryKey = 'category_id';

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'name', 'user_id', 'limit'
    ];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;

    public function getAllForUser(int $userId)
    {
        return $this->where('user_id', $userId)->findAll();
    }
}