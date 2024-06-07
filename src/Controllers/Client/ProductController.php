<?php

namespace Danghau\Playfinal\Controllers\Client;

use Danghau\Playfinal\Commons\Controller;
use Danghau\Playfinal\Commons\Helper;
use Danghau\Playfinal\Models\Product;

class ProductController extends Controller
{

    private Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function index()
    {
        $products =  $this->product;

        $this->renderClient('home', [
            'products' => $products
        ]);
    }
    public function shop()
    {
        $products =  $this->product->all();

        $this->renderClient('shop', [
            'products' => $products
        ]);
    }

    public function detail($id)
    {
        $product = $this->product->findByID($id);
        $this->renderClient('product-detail', [
            'product' => $product
        ]);
    }
}
