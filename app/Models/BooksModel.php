<?php

namespace App\Models;

use CodeIgniter\Model;

class BooksModel extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'book_id';
    protected $useTimestamps = true;

    protected $allowedFields = ['title', 'slug', 'category_id', 'desc','qty','file_path', 'cover_path', 'user_id'];

    public function getBook($slug = false)
    {
        $query = $this->where(['slug' => $slug]);

        // Join tabel Categories dan Books berdasarkan category_id
        $query->select('books.*, categories.category_name')
                ->join('categories', 'categories.category_id = books.category_id');

                return $query->first();
    }

    public function getAllBooks()
    {
        return $this->findAll();
    }

    public function getBookWithCategory()
    {
        return $this->select('books.*, categories.category_name')
            ->join('categories', 'categories.category_id = books.category_id')
            ->findAll();
    }
    public function getBooksByCategory($id)
    {
        return $this->select('books.*, categories.category_name')
                    ->join('categories', 'categories.category_id = books.category_id')
                    ->where('books.category_id', $id)
                    ->findAll();
    }

    public function getBooksByUser($id)
    {
        return $this->select('books.*', 'categories.category_name')
                    ->join('categories', 'categories.category_id = books.category_id')
                    ->where('books.user_id', $id)
                    ->where('books.category_id', 'category_id')
                    ->findAll();
    }
} 