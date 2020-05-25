<?php


namespace App\Models;


use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'products';
    protected $primaryKey = 'product_id';

    protected $returnType     = 'object';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'name', 'price', 'amount', 'purchase_date', 'comment', 'category_id', 'shop_id', 'user_id'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;

    public function getAllForUserForPeriod(int $userId, string $currentPeriodStart, string $currentPeriodEnd)
    {
        return $this->where('user_id', $userId)
            ->where('purchase_date >=', $currentPeriodStart)
            ->where('purchase_date <', $currentPeriodEnd)
            ->findAll();
    }
}