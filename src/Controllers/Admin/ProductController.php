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
        [$products, $totalPage] = $this->product->paginate();

        $this->renderAdmin("products.index", [
            "products" => $products,
            "totalPage" => $totalPage,
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
        // VALIDATE
        $validator = new Validator;
        // make it
        $validation = $validator->make($_POST + $_FILES, [
            'email'                           => 'required',
            'name'                            => 'required',
            'category_id'                     => 'required',
            'overview'                        => 'max:500',
            'content'                         => 'max:65000',
            'img_thumbnail'                   => 'uploaded_file:0,1000K,png,jpeg',
        ]);

        // then validate
        $validation->validate();
        // then validate
        if ($validation->fails()) {

            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url('admin/products/create'));
            exit;
        } else {
            $data = [
                'email'         => $_POST['email'],
                'password'      => !empty($_POST['password']),
                'name'          => $_POST['name'],
                'category_id'   => $_POST['category_id'],
                'overview'      => $_POST['overview'],
                'content'       => $_POST['content'],
            ];

            if (!empty($_FILES['img_thumbnail']) && $_FILES['img_thumbnail']['size'] > 0) {
                $from = $_FILES['img_thumbnail']['tmp_name'];
                $to   = 'assets/uploads/' . time() . $_FILES['img_thumbnail']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['img_thumbnail'] = $to;
                } else {
                    $_SESSION['errors']['img_thumbnail'] = 'Upload Not Successfully';
                    header('Location: ' . url('admin/products/create'));
                    exit;
                }
            }

            // $this->product->insert($data);

            Helper::debug($data);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = "Succesfully";

            header('Location: ' . url('admin/products'));
            exit;
        }
    }

    public function show($id)
    {
        $product   = $this->product->findByID($id);


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
                'category_id'   => 'required',
                'password'      => 'required',
                'name'          => 'required|max:100',
                'overview'      => 'max:500',
                'content'       => 'max:65000',
                'img_thumbnail' => 'uploaded_file:0,2048K,png,jpeg,jpg',
            ]
        );
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url("admin/products/$id/edit"));
            exit;
        }

        $data = [
            'category_id'   => $_POST['category_id'],
            'name'          => $_POST['name'],
            'overview'      => $_POST['overview'],
            'content'       => $_POST['content'],
            'updated_at'    => date('Y-m-d H:i:s'),
        ];

        $flagUpload = false;
        if (!empty($_FILES['img_thumbnail']) && $_FILES['img_thumbnail']['size'] > 0) {

            $from = $_FILES['img_thumbnail']['tmp_name'];
            $to   = 'assets/uploads/' . time() . $_FILES['img_thumbnail']['name'];

            if (move_uploaded_file($from, PATH_ROOT . $to)) {
                $data['img_thumbnail'] = $to;
                $flagUpload = true;
            } else {

                $_SESSION['errors']['img_thumbnail'] = 'Upload KHÔNG thành công!';

                header('Location: ' . url("admin/products/$id/edit"));
                exit;
            }
        }

        $this->product->update($id, $data);

        if (
            $flagUpload
            && $product['img_thumbnail']
            && file_exists(PATH_ROOT . $product['img_thumbnail'])
        ) {
            unlink(PATH_ROOT . $product['img_thumbnail']);
        }

        $_SESSION['status'] = true;
        $_SESSION['msg'] = 'Thao tác thành công!';

        header('Location: ' . url("admin/products/$id/edit"));
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

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';
        } catch (\Throwable $th) {
            $_SESSION['status'] = false;
            $_SESSION['msg'] = 'Thao tác KHÔNG thành công!';
        }

        header('Location: ' . url('admin/products'));
        exit();
    }
}
