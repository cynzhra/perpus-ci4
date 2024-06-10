<?php


namespace App\Controllers;
use App\Models\BooksModel;
use App\Models\CategoryModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Book extends BaseController
{
    protected $booksModel;
    protected $categoryModel;
    public function __construct()
    {
       $this->booksModel = new BooksModel();
       $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Admin | Book',
            'books' => $this->booksModel->getBookWithCategory(),
            'categories' => $this->categoryModel->getCategory()
        ];

        $categoryId = $this->request->getPost('category');
        $data['selectedCategory'] = $categoryId;

        if (!empty($categoryId)) {
            // Filter data buku berdasarkan kategori
            $data['books'] = $this->booksModel->getBooksByCategory($categoryId);
        }

        // if(session()->get('role') != 'admin'){
        //     $data['books'] = $this->booksModel->getBooksByUser(user()->id);
        // }
        return view('book/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Book',
            'book' => $this->booksModel->getBook($slug)
        ];

        return view('book/detail', $data);
    }

    public function add()
    {
        session();
        $data = [
            'title' => 'Add Book Form',
            'category' => $this->categoryModel->getCategory(),
            'validation' => \Config\Services::validation()
        ];
        
        return view('book/create', $data);
    }

    public function insert()
    {
        // validasi input
        if($this->validate([
            'title' => [
                'rules' => 'is_unique[books.title]',
                'errors' => [
                    'is_unique' => 'The book is already listed!'
                ]
            ],
            'file_path' => [
                'rules' => 'ext_in[file_path,pdf]',
                'errors' => [
                    'is_unique' => 'Invalid file!'
                ]                
            ],
            'cover_path' => [
                'rules' => 'max_size[cover_path,1024]|is_image[cover_path]|mime_in[cover_path,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Image size to large',
                    'is_image' => 'Invalid image file',
                    'mime_in' => 'Please upload a jpg, jpeg, or png imag'
                ]
            ]
        ])){
            $slug = url_title($this->request->getVar('title'), '-', true);

            //ambil gambar
            $fileCover = $this->request->getFile('cover_path');
            // pengkondisian gambar
            if($fileCover->getError() == 4){
                $nameCover = 'default.png';
            } else{
                // random name
                $nameCover = $fileCover->getRandomName();
                // memindahkan file ke dalam folde yang telah dibuat (cover)
                $fileCover->move('cover', $nameCover);
            }
            $fileBook = $this->request->getFile('file_path');
            //generate random name
            $nameFile = $fileBook->getRandomName();
            //pindahkan file ke dalam folder
            $fileBook->move('file');
            $this->booksModel->save([
                'title' => $this->request->getVar('title'),
                'slug' => $slug,
                'category_id' => $this->request->getVar('category_id'),
                'desc' => $this->request->getVar('desc'),
                'qty' => $this->request->getVar('qty'),
                'file_path' => $nameFile,
                'cover_path' => $nameCover,
                'user_id' => $this->request->getVar('user_id')
            ]);

            session()->setFlashdata('message', 'Data added successfully.');
            return redirect()->to('/book');
        } else{
            return redirect()->to('/book/add')->withInput();
        }
    }

    public function delete($id)
    {
        // Mencari gambar&file berdasarkan id
        $book = $this->booksModel->find($id);

        // cek jika gambarnya default
        if($book['cover_path'] != 'default.png'){
            // delete img
            unlink('cover/' . $book['cover_path']);

        }

        // delete file
        unlink('file/' . $book['file_path']);

        $this->booksModel->delete($id);

        session()->setFlashdata('message', 'Data successfully deleted.');
        return redirect()->to('/book');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Book',
            'book' => $this ->booksModel->getBook($id),
            'category' => $this->categoryModel->getCategory()

        ];
        return view('book/edit', $data);
    }

    public function update($id)
    {
        $oldBook = $this->booksModel->getBook($this->request->getVar('slug'));
        if($oldBook['title'] == $this->request->getVar('title')){
            $rule_title = 'required';
        } else{
            $rule_title = 'is_unique[books.title]';
        }
        if(!$this->validate([
            'title' => [
                'rules' => $rule_title,
                'errors' => 'The book is already listed!'
            ],
            'file_path' => [
                'rules' => 'ext_in[file_path,pdf]',
                'errors' => [
                    'is_unique' => 'Invalid file!'
                ]                
            ],
            'cover_path' => [
                'rules' => 'max_size[cover_path,1024]|is_image[cover_path]|mime_in[cover_path,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Image size to large',
                    'is_image' => 'Invalid image file',
                    'mime_in' => 'Please upload a jpg, jpeg, or png imag'
                ]
            ]
        ])){
            return redirect()->to('/book/edit/' .$this->request->getVar('slug'))->withInput();
        }

        $fileCover = $this->request->getFile('cover_path');
        $oldCover = $this->request->getVar('old_cover');
        // Cek gambar
        if($fileCover->getError() == 4){
            $nameCover = $oldCover;
        } else{
            // generate nama file random
            $nameCover = $fileCover->getRandomName();
            // pindahkan gambar
            $fileCover->move('cover', $nameCover);
        }

        $slug = url_title($this->request->getVar('title'), '-', true);

        $this->booksModel->save([
            'book_id' => $id,
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'category_id' => $this->request->getVar('category_id'),
            'desc' => $this->request->getVar('desc'),
            'qty' => $this->request->getVar('qty'),
            'file_path' => $this->request->getVar('file_path'),
            'cover_path' => $nameCover,
            'user_id' => $this->request->getVar('user_id')
        ]);

        session()->setFlashdata('message', 'Data successfully changed.');
        return redirect()->to('book');
    }

    public function export()
    {
        $books = $this->booksModel->getBookWithCategory();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        // Set header kolom
        $sheet->setCellValue('A1', 'Title');
        $sheet->setCellValue('B1', 'Category Name');
        $sheet->setCellValue('C1', 'Quantity');
        $sheet->setCellValue('D1', 'File Pdf');
        $sheet->setCellValue('E1', 'Book Cover');

        // Isi data buku
        $column = 2;
        foreach ($books as $book) {
            $sheet->setCellValue('A' . $column, $book['title']);
            $sheet->setCellValue('B' . $column, $book['category_name']);
            $sheet->setCellValue('C' . $column, $book['qty']);
            $sheet->setCellValue('D' . $column, $book['file_path']);
            $sheet->setCellValue('E' . $column, $book['cover_path']);
            $column++;
        }

        $sheet->getStyle('A1:E1')->getFont()->setBold(true);
        $sheet->getStyle('A1:E1')->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setARGB('ff6faac9');
        $styleArray =[
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000']
                ]
            ]
        ];

        $sheet->getStyle('A1:E'.($column-1))->applyFromArray($styleArray);

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);

        // Set judul dan format file
        $filename = 'book_list_' . date('YmdHis') . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit();
    }

    public function myBook()
    {

    }
}
