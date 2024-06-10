<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    protected $allowedFields = ['category_name'];

    public function getCategory()
    {
        return $this->findAll();
    }

    public function getCategoryByName($category_name)
    {
        return $this->where('categories', ['category_name' => $category_name])->row_array();
    }
} 