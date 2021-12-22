<?php

require __DIR__ . '/../service/adminservice.php';
require __DIR__ . '/controller.php';

class AdminController extends Controller
{

    private $adminService;

    function __construct()
    {
        $this->adminService = new AdminService();
    }
    public function index()
    {
        $model = $this->adminService->getAll();
        $this->displayView($model);
    }

    public function insert()
    {
        if (isset($_POST['inputName'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW); // <-- filter POST

            // check all individual post fields
            if (isset($_POST['inputName'])) {
                $productName = $_POST['inputName'];
            }

            if (isset($_POST['inputDescription'])) {
                $productDescription = $_POST['inputDescription'];
            }

            if (isset($_POST['inputPrice']) && is_numeric($_POST['inputPrice'])) {
                $productPrice = $_POST['inputPrice'];
            }

            // if all fields are not empty then insert new product
            if (!empty($productName) && !empty($productDescription) && !empty($productPrice)) {
                $this->adminService->insert($productName, $productDescription, $productPrice);
                header('Location: /product');
            } else {
                header('Location: /admin?error=insertfailed'); // else show error message
            }
        }
    }

    public function update()
    {
        if (isset($_POST['inputName'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW); // <-- filter POST

            // check all individual post fields
            if (isset($_POST['id'])) {
                $product_id = $_POST['id'];
            }

            if (isset($_POST['inputName'])) {
                $productName = $_POST['inputName'];
            }

            if (isset($_POST['inputDescription'])) {
                $productDescription = $_POST['inputDescription'];
            }

            if (isset($_POST['inputPrice']) && is_numeric($_POST['inputPrice'])) {
                $productPrice = $_POST['inputPrice'];
            }

             // if all fields are not empty then update new product
            if (!empty($productName) && !empty($productDescription) && !empty($productPrice) && !empty($product_id)) {
                $this->adminService->update($product_id, $productName, $productDescription, $productPrice);
                header('Location: /product');
            } else {
                header('Location: /admin?error=updatefailed'); // else show error message
            }
        }
    }

    public function delete() {
        $product_id = $_GET['id'];

        $this->adminService->delete($product_id);
        header('Location: /admin');
    }
}
