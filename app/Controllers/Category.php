<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class Category extends BaseController
{
    protected $categoryModel;
    public function __construct()
    {
       $this->categoryModel = new CategoryModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Admin | Category',
            'category' => $this->categoryModel->getCategory()
        ];
        return view('category/index', $data);
    }

    public function insert()
    {
        $this->categoryModel->save([
            'category_name' => $this->request->getVar('category_name')
        ]);

        session()->setFlashdata('message', 'Data successfully changed.');
        return redirect()->to('category');
    }

    public function delete($id)
    {
        $this->categoryModel->delete($id);

        session()->setFlashdata('message', 'Data successfully deleted.');
        return redirect()->to('/category');
    }

    public function update($id)
    {
        $this->categoryModel->save([
            'category_id' => $id,
            'category_name' => $this->request->getVar('category_name')
        ]);

        session()->setFlashdata('message', 'Data successfully changed.');
        return redirect()->to('category');
    }
}
