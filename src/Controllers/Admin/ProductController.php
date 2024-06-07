<?php

namespace Danghau\Playfinal\Controllers\Admin;

use Danghau\Playfinal\Commons\Controller;
use Danghau\Playfinal\Commons\Helper;
use Danghau\Playfinal\Models\Category;
use Danghau\Playfinal\Models\Product;
use Rakit\Validation\Validator;

class ProductController extends Controller
{
    private Product $product;
    private Category $category;

    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
    }

    public function index()
    {
        // [$products, $totalPage] = $this->product->paginate();
        $products = $this->product->all();

        $this->renderAdmin("products.index", [
            "products" => $products,
        ]);
    }

    public function create()
    {
        $categories = $this->category->all();

        $categoryPluck = array_column($categories, 'name', 'id');

        $this->renderAdmin('products.create', [
            'categoryPluck' => $categoryPluck,
        ]);
    }

    public function store()
    {
        // Validate the form data
        $validator = new Validator;
        $validation = $validator->make(
            $_POST + $_FILES,
            [
                'name'                     => 'required',
                'price_regular'            => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'category_id'              => 'required',
                'img_thumbnail'            => 'uploaded_file:0,1000K,png,jpeg', // File must be under 1MB and in jpeg or png format
            ]
        );
        $validation->validate();

        // If validation fails, redirect back to the form with error messages
        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();
            header('Location: ' . url('admin/products/create'));
            exit;
        } else {
            // Prepare the data to be inserted into the database
            $data = [
                'name'           => $_POST['name'],
                'price_regular'  => $_POST['price_regular'],
                'price_sale'     => $_POST['price_sale'],
                'category_id'    => $_POST['category_id'],
                'img_thumbnail'  => $_FILES['img_thumbnail']
            ];

            // Move the uploaded file to the server if it exists
            if (!empty($_FILES['img_thumbnail']) && $_FILES['img_thumbnail']['size'] > 0) {
                $from = $_FILES['img_thumbnail']['tmp_name'];
                $to   = 'assets/admin/images/' . time() . $_FILES['img_thumbnail']['name'];
                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['img_thumbnail'] = $to;
                } else {
                    $_SESSION['errors']['img_thumbnail'] = 'Upload Not Successfully';
                    header('Location: ' . url('admin/products/create'));
                    exit;
                }
            }

            // Insert the data into the database
            $this->product->insert($data);

            // Set success message and redirect to products page
            $_SESSION['status'] = true;
            $_SESSION['msg'] = "Successfully";
            header('Location: ' . url('admin/products'));
            exit;
        }
    }

    public function show($id)
    {
        $product = $this->product->findByID($id);

        $this->renderAdmin('products.show', [
            'product' => $product,
        ]);
    }

    public function edit($id)
    {
        $product   = $this->product->findByID($id);
        $categories = $this->category->all();

        $categoryPluck = array_column($categories, 'name', 'id');

        $this->renderAdmin('products.edit', [
            'product' => $product,
            'categoryPluck' => $categoryPluck,
        ]);
    }

    public function update($id)
    {
        $product = $this->product->findByID($id);

        // VALIDATE
        $validator = new Validator;
        $validation = $validator->make(
            $_POST + $_FILES,
            [
                'name'                     => 'required',
                'price_regular'            => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'category_id'              => 'required',
                'img_thumbnail'            => 'uploaded_file:0,1000K,png,jpeg', // File must be under 1MB and in jpeg or png format
            ]
        );
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url("admin/products/$id/edit"));
            exit;
        }

        $data = [
            'name'           => $_POST['name'],
            'price_regular'  => $_POST['price_regular'],
            'price_sale'     => $_POST['price_sale'],
            'category_id'    => $_POST['category_id'],
        ];

        $flagUpload = false;
        if (isset($_FILES['img_thumbnail']) && $_FILES['img_thumbnail']['size'] > 0) {

            $flagUpload = true;

            $from = $_FILES['img_thumbnail']['tmp_name'];
            $to   = 'assets/admin/images/' . time() . $_FILES['img_thumbnail']['name'];

            if (move_uploaded_file($from, PATH_ROOT . $to)) {
                $data['img_thumbnail'] = $to;
            }
        }

        $this->product->update($id, $data);

        if (
            $flagUpload &&
            $product['img_thumbnail'] &&
            file_exists(PATH_ROOT . $product['img_thumbnail'])
        ) {
            unlink(PATH_ROOT . $product['img_thumbnail']);
        }

        // Helper::debug($data);

        $_SESSION['status'] = true;
        $_SESSION['msg'] = 'Upload Successfully!';

        header('Location: ' . url("admin/products/{$product['id']}/edit"));
        exit;
    }

    public function delete($id)
    {

        try {
            $product = $this->product->findByID($id);

            $this->product->delete($id);

            if ($product['img_thumbnail'] && file_exists(PATH_ROOT . $product['img_thumbnail'])) {
                unlink(PATH_ROOT . $product['img_thumbnail']);
            }
        } catch (\Throwable $th) {
            $_SESSION['status'] = false;
            $_SESSION['msg'] = 'Delete Successfully';
        }

        header('Location: ' . url('admin/products'));
        exit();
    }
}
