<?php

require __DIR__ . '/../service/productservice.php';
require __DIR__ . '/controller.php';

class ProductController extends Controller{
    private $productService;

    function __construct()
    {
        $this->productService = new ProductService();
    }

    public function index() {
        require __DIR__ . '/../view/product/index.php';
    }

    public function detail() {
        // $model = $this->productService->getById($_GET['id']);
        // $this->displayView($model);

        require __DIR__ . '/../view/product/detail.php';
    }
}
