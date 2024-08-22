<?php 
    include '../lib/database.php';
    include '../helpers/format.php';
?>
<?php
    class adminCart {
        private $db;
        private $fm;
        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function addToCart($id, $size, $quantity, $username) {
            echo "Userid: " . $username;
            $query = "SELECT * FROM product WHERE product_id='$id'";
            $result = $this->db->select($query)->fetch_assoc();

            $product_name = $result["product_name"];
            $image = $result["image"];
            $price = $result["discounted_price"] * $quantity;
            $initial_price = $result["discounted_price"];

            $qr = "SELECT * FROM cart WHERE product_id = '$id'";
            $resultCheck = $this->db->select($qr);
            if($resultCheck) {
                echo "YES";
                $result2 = $this->db->select($qr)->fetch_assoc();
                $quantityInRes = $result2['quantity'];
                $newQuantity = $quantityInRes + $quantity;
                $price2 = $result2["initial_price"] * $newQuantity;
                $queryInset2 = "UPDATE cart SET quantity='$newQuantity',price='$price2' WHERE  product_id = '$id'";
                $insertCart2 = $this->db->update($queryInset2);
                if($insertCart2) {
                    header('Location:cart.php');
                }
                else {
                    header('Location:404.php');  
                }

            }
            else {
                $queryInset = "INSERT INTO cart(product_name, image, size, quantity, price, product_id, initial_price, user_id) VALUES('$product_name', '$image', '$size', '$quantity', '$price', '$id', '$initial_price', '$username')";
                $insertCart = $this->db->insert($queryInset);
                if($insertCart) {
                    header('Location:cart.php');
                }
                else {
                    header('Location:404.php');  
                }
            }
           
        }
        public function addToCartTwo($userId,$productId) {
            $query = "SELECT * FROM product WHERE product_id='$productId'";
            $result = $this->db->select($query)->fetch_assoc();

            $product_name = $result["product_name"];
            $image = $result["image"];
            $price = $result["discounted_price"] * $quantity;
            $initial_price = $result["discounted_price"];

            $qr = "SELECT * FROM cart WHERE product_id = '$productId'";
            $resultCheck = $this->db->select($qr);
            if($resultCheck) {
                echo "YES";
                $result2 = $this->db->select($qr)->fetch_assoc();
                $quantityInRes = $result2['quantity'];
                $newQuantity = $quantityInRes + $quantity;
                $price2 = $result2["initial_price"] * $newQuantity;
                $queryInset2 = "UPDATE cart SET quantity='$newQuantity',price='$price2' WHERE  product_id = '$productId'";
                $insertCart2 = $this->db->update($queryInset2);
                if($insertCart2) {
                    header('Location:cart.php');
                }
                else {
                    header('Location:404.php');  
                }

            }
            else {
                $price = $initial_price * 1;
                $queryInset = "INSERT INTO cart(product_name, image, quantity, price, product_id, initial_price, user_id) VALUES('$product_name', '$image', '1', '$price', '$productId', '$initial_price', '$userId')";
                $insertCart = $this->db->insert($queryInset);
                if($insertCart) {
                    header('Location:cart.php');
                }
                else {
                    header('Location:404.php');  
                }
            }
           
        }
        public function getAllCart($id) {
            $query = "SELECT * FROM cart WHERE user_id = '$id'";
            $querySelectAll = $this->db->select($query);
            return $querySelectAll;
        }
        public function updateQuantity($quantity, $productId) {
           
            $qr = "SELECT * FROM cart WHERE product_id = '$productId'";
            $resultCheck = $this->db->select($qr)->fetch_assoc();
            $newPrice = $resultCheck['initial_price'] * $quantity;

            $query = "UPDATE cart SET quantity = '$quantity', price='$newPrice' WHERE product_id = '$productId'";
            $querySelectAll = $this->db->update($query);
            return $querySelectAll;
        }
        public function deleteProductInCart($productId) {
           
            $query = "DELETE FROM cart WHERE product_id = '$productId'";
            $querySelectAll = $this->db->delete($query);
            return $querySelectAll;
        }
        public function getTotalPrice($id) {
           
            $query = "SELECT SUM(price) AS price FROM cart WHERE user_id = '$id'";
            $querySelectAll = $this->db->select($query);
            return $querySelectAll;
        }
        public function getTotalItem($id) {
           
            $query = "SELECT COUNT(*) AS count FROM cart WHERE user_id = '$id'";
            $querySelectAll = $this->db->select($query);
            return $querySelectAll;
        }
        public function deleteAllCart($userId) {
            $query = "DELETE FROM cart WHERE user_id = '$userId'";
            $result = $this->db->delete($query);
            return $result;
        }
        public function insertOrder($userId) {
            echo $userId;
            $query = "SELECT * FROM cart WHERE user_id = '$userId'";
            $result = $this->db->select($query);
            if($result) {
                echo $userId;
                while($res = $result->fetch_assoc()) {
                    $productId = $res['product_id'];
                    $productName = $res['product_name'];
                    $quantity = $res['quantity'];
                    $total_price = $res['price'];
                    $image = $res['image'];
                    $now = new DateTime();
                    echo "Current date and time using DateTime class: " . $now->format('Y-m-d H:i:s') . "\n";
                    $c = $now->format('Y-m-d H:i:s');


                    $queryInset = "INSERT INTO orders(product_name, created_at, image, quantity, total_price, product_id, user_id, order_status) VALUES('$productName','$c', '$image', '$quantity', '$total_price', '$productId', '$userId', 'Đang vận chuyển')";
                    $insertCart = $this->db->insert($queryInset);

                }
            }
            return $insertCart;
        }
        public function insertOneOrder($productId, $size, $quantity, $userId) {
            $query = "SELECT * FROM product WHERE product_id='$productId'";
            $result = $this->db->select($query)->fetch_assoc();

            $product_name = $result["product_name"];
            $image = $result["image"];
            $price = $result["discounted_price"] * $quantity;
            $initial_price = $result["discounted_price"];

            $qr = "SELECT * FROM cart WHERE product_id = '$productId'";
            $resultCheck = $this->db->select($qr);
            if($resultCheck) {
                echo "YES";
                $result2 = $this->db->select($qr)->fetch_assoc();
                $quantityInRes = $result2['quantity'];
                $newQuantity = $quantityInRes + $quantity;
                $price2 = $result2["initial_price"] * $newQuantity;
                $queryInset2 = "UPDATE cart SET quantity='$newQuantity',price='$price2' WHERE  product_id = '$productId'";
                $insertCart2 = $this->db->update($queryInset2);
                if($insertCart2) {
                    header('Location:cart.php');
                }
                else {
                    header('Location:404.php');  
                }

            }
            else {
                $price = $initial_price * $quantity;
                $queryInset = "INSERT INTO cart(product_name, image, quantity, price, product_id, initial_price, user_id) VALUES('$product_name', '$image', '1', '$price', '$productId', '$initial_price', '$userId')";
                $insertCart = $this->db->insert($queryInset);
                if($insertCart) {
                    header('Location:cart.php');
                }
                else {
                    header('Location:404.php');  
                }
            }
        }
    }
 ?>