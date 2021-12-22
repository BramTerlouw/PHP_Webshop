<?php

require __DIR__ . '/../model/product.php';
require __DIR__ . '/repository.php';

class CartRepository extends Repository
{
    public function getAll($cart_products, $array_Question_marks)
    {
        
        try {

            $sqlquery = "SELECT * FROM products WHERE id IN ($array_Question_marks)";
            $stmt = $this->connection->prepare($sqlquery);
            $stmt->execute(array_keys($cart_products));
            
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $products;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function addToCart($product_id, $quantity)
    {
        $sqlQuery = "SELECT * FROM products WHERE id=:id";
        $stmt = $this->connection->prepare($sqlQuery);
        $stmt->bindParam(':id', $product_id);

        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);


        if ($product && $quantity > 0) {

            // check existence session variable
            if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {

                // if already in array, update quantity, else add
                if (array_key_exists($product_id, $_SESSION['cart'])) {
                    $_SESSION['cart'][$product_id] += $quantity;
                } 
                else {
                    $_SESSION['cart'][$product_id] = $quantity;
                }
            } 
            else { // or make array var in session
                $_SESSION['cart'] = array($product_id => $quantity);
            }
        }
    }
}