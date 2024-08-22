<?php 
    include '../lib/database.php';
    include '../helpers/format.php';
?>
<?php
    class adminCategory {
        private $db;
        private $fm;
        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_category($categoryName) {
            $categoryName = $this->fm->validation($categoryName);

            if(empty($categoryName)) {
                $alert = "<p class=' text-danger'>Tên danh mục không được để trống !</p>";
                return $alert;
            }
            else {
                    $queryInsert = "INSERT INTO category(category_name) VALUES('$categoryName')";
                    $resultInsert = $this->db->insert($queryInsert);
                    if($resultInsert) {
                        $alert = "<p class='  text-success'>Đã thêm mới một danh mục !</p>";
                        return $alert;
                    }
                    else {
                        $alert = "<p class=' text-danger'>Thêm mới thất bại, vui lòng kiểm tra lại !</p>";
                        return $alert;
                    }
            }
        }
        public function selectAllCategory() {
            $queryInsert = "SELECT * FROM category order by category_id DESC";
            $resultInsert = $this->db->select($queryInsert);
            return $resultInsert;
        }
        public function getCategoryById($categoryId) {
            $queryInsert = "SELECT * FROM category WHERE category_id='$categoryId'";
            $resultInsert = $this->db->select($queryInsert);
            return $resultInsert;
        }
        public function update_category($categoryName, $categoryId) {
            $categoryName = $this->fm->validation($categoryName);

            $querySelect = "SELECT * FROM category WHERE category_name = '$categoryName'";
            $resultSelect = $this->db->select($querySelect);
            if($resultSelect) {
                $alert = "<p class='  text-danger'>Đã tồn tại tên danh mục, vui lòng nhập lại !</p>";
                return $alert;
            }
            else {
                $queryUpdate = "UPDATE category SET category_name = '$categoryName' WHERE category_id='$categoryId'";
                $resultUpdate = $this->db->update($queryUpdate);
                if($resultUpdate) {
                    $alert = "<p class='  text-success'>Đã sửa danh mục !</p>";
                    return $alert;
                }
                else {
                    $alert = "<p class=' text-danger'>Cập nhật thất bại, vui lòng kiểm tra lại !</p>";
                    return $alert;
                }
            }
        }
        public function deleteCategoryById($categoryId) {
            $queryInsert = "DELETE FROM category WHERE category_id=$categoryId";
            $resultInsert = $this->db->delete($queryInsert);
            return $resultInsert;
        }

        // Product
        public function insert_product($data, $files) {
            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $productPrice = mysqli_real_escape_string($this->db->link, $data['productPrice']);
            $quantity = mysqli_real_escape_string($this->db->link, $data['quantity']);

            $permitted = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            if (in_array($file_ext, $permitted)) {
                $unique_image = substr(md5(time()), 0, 10). '.' .$file_ext;
                $upload_image = "uploads/".$unique_image;
            }
            

            if($productName == "" || $category == "" || $productPrice == "" || $file_name == "") {
                $alert = "<p class=' text-danger'>Các trường này không được để trống !</p>";
                return $alert;
            }
            else {
                move_uploaded_file($file_tmp, $upload_image);
                    $queryInsert = "INSERT INTO product(product_name, category_id, price, image, quanity) VALUES('$productName', '$category', '$productPrice', '$unique_image', '$quantity')";
                    $resultInsert = $this->db->insert($queryInsert);
                    if($resultInsert) {
                        $alert = "<p class='  text-success'>Đã thêm mới một sản phẩm !</p>";
                        return $alert;
                    }
                    else {
                        $alert = "<p class=' text-danger'>Thêm mới thất bại, vui lòng kiểm tra lại !</p>";
                        return $alert;
                    }
                }
        }
        public function selectAllProduct() {
            $queryInsert = "SELECT product.*, category.category_name
                            FROM product INNER JOIN category ON product.category_id = category.category_id
                            order by product_id DESC";
            $resultInsert = $this->db->select($queryInsert);
            return $resultInsert;
        }
        public function getProductById($productId) {
            $queryInsert = "SELECT * FROM product WHERE product_id='$productId'";
            $resultInsert = $this->db->select($queryInsert);
            return $resultInsert;
        }
        public function update_product($data, $files, $productId) {
            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $productPrice = mysqli_real_escape_string($this->db->link, $data['productPrice']);
            $quanity = mysqli_real_escape_string($this->db->link, $data['quanity']);
            $id = mysqli_real_escape_string($this->db->link, $data['id']);
            echo "id: " . $id;

            $permitted = array('jpg', 'jpeg', 'png', 'gif');


            
            $file_name = $_FILES['image']['name'];
            echo "file name : " .$file_name;
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
                $unique_image = substr(md5(time()), 0, 10). '.' .$file_ext;
                $upload_image = "uploads/".$unique_image;

            if($productName == "" || $category == "" || $productPrice == "" || $quanity == "") {
                $alert = "<p class=' text-danger'>Các trường này không được để trống !</p>";
                return $alert;
            }
            else {
                if(!empty($file_name)) {
                    
                    move_uploaded_file($file_tmp, $upload_image);

                    $queryUpdate = "UPDATE product SET product_name='$productName',category_id='$category',price='$productPrice',quanity='$quanity',image='$unique_image' WHERE product_id = $id";
                    echo "   " . $queryUpdate;
                    $resultUpdate = $this->db->update($queryUpdate);
                    if($resultUpdate) {
                        $alert = "<p class='  text-success'>Đã sửa sản phẩm !</p>";
                        return $alert;
                    }
                    else {
                        $alert = "<p class=' text-danger'>Cập nhật thất bại, vui lòng kiểm tra lại !</p>";
                        return $alert;
                    }
                }
                else {
                    $queryUpdate = "UPDATE product SET product_name='$productName', category_id='$category',price='$productPrice',quanity='$quanity' WHERE product_id = $id";
                    echo "   " .$queryUpdate;
                    $resultUpdate = $this->db->update($queryUpdate);
                if($resultUpdate) {
                    $alert = "<p class='  text-success'>Đã sửa sản phẩm !</p>";
                    return $alert;
                }
                else {
                    $alert = "<p class=' text-danger'>Cập nhật thất bại, vui lòng kiểm tra lại !</p>";
                    return $alert;
                }
                }
                
            }
        }
        public function deleteProductById($productId) {
            $queryDelete = "DELETE FROM product WHERE product_id='$productId'";
            $resultDelete = $this->db->delete($queryDelete);
            return $resultDelete;
        }
        public function getLatestProducts() {
            $queryDelete = "SELECT * FROM product order by product_id desc LIMIT 8";
            $resultDelete = $this->db->select($queryDelete);
            return $resultDelete;

        }
        public function getSellMostProducts() {
            $queryDelete = "SELECT * FROM product order by price LIMIT 8";
            $resultDelete = $this->db->select($queryDelete);
            return $resultDelete;

        }
        public function getProductByCategory($cateId) {
            $queryDelete = "SELECT * FROM product WHERE category_id='$cateId'";
            $resultDelete = $this->db->select($queryDelete);
            return $resultDelete;

        }
        public function getLatestProducts9() {
            $queryDelete = "SELECT * FROM product order by product_id desc LIMIT 9";
            $resultDelete = $this->db->select($queryDelete);
            return $resultDelete;

        }
        // văn hậu
        
    public function getProducts()
    {
        $color = $_GET['mau'];
        $cateId = $_GET['categoryId'];
        $priceCondition = $_GET['gia'];
        $item_per_page = $_GET['perpage'];
        $current_page = $_GET['page'];
        $offset = ($current_page - 1) * $item_per_page;
        $sortedPrice = $_GET['price'];
        if ($cateId == 0) {
            if ($sortedPrice != null) {
                if($color != null){
                    switch ($priceCondition) {
                        case 1:
                            $queryDelete = "SELECT * FROM product WHERE  discounted_price < 500 AND color = '".$color."' order by discounted_price " . $sortedPrice . " LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 2:
                            $queryDelete = "SELECT * FROM product WHERE discounted_price > 500 AND discounted_price < 650 AND color = '".$color."' order by discounted_price " . $sortedPrice . " LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 3:
                            $queryDelete = "SELECT * FROM product WHERE discounted_price > 650 AND discounted_price < 800 AND color = '".$color."' order by discounted_price " . $sortedPrice . " LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 4:
                            $queryDelete = "SELECT * FROM product WHERE discounted_price > 800 AND discounted_price < 1000 AND color = '".$color."' order by discounted_price " . $sortedPrice . " LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 5:
                            $queryDelete = "SELECT * FROM product WHERE discounted_price > 1000 AND color = '".$color."' order by discounted_price " . $sortedPrice . " LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        default:
                            $queryDelete = "SELECT * FROM product WHERE color = '".$color."' order by discounted_price " . $sortedPrice . " LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                    }
                } else {
                    switch ($priceCondition) {
                        case 1:
                            $queryDelete = "SELECT * FROM product WHERE  discounted_price < 500 order by discounted_price " . $sortedPrice . " LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 2:
                            $queryDelete = "SELECT * FROM product WHERE discounted_price > 500 AND discounted_price < 650 order by discounted_price " . $sortedPrice . " LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 3:
                            $queryDelete = "SELECT * FROM product WHERE discounted_price > 650 AND discounted_price < 800 order by discounted_price " . $sortedPrice . " LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 4:
                            $queryDelete = "SELECT * FROM product WHERE discounted_price > 800 AND discounted_price < 1000 order by discounted_price " . $sortedPrice . " LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 5:
                            $queryDelete = "SELECT * FROM product WHERE discounted_price > 1000 order by discounted_price " . $sortedPrice . " LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        default:
                            $queryDelete = "SELECT * FROM product order by discounted_price " . $sortedPrice . " LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                    }
                }
            } else {
                if($color != null){
                    switch ($priceCondition) {
                        case 1:
                            $queryDelete = "SELECT * FROM product WHERE  discounted_price < 500 AND color = '".$color."' order by product_id DESC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 2:
                            $queryDelete = "SELECT * FROM product WHERE discounted_price > 500 AND discounted_price < 650 AND color = '".$color."' order by product_id DESC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 3:
                            $queryDelete = "SELECT * FROM product WHERE discounted_price > 650 AND discounted_price < 800 AND color = '".$color."' order by product_id DESC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 4:
                            $queryDelete = "SELECT * FROM product WHERE discounted_price > 800 AND discounted_price < 1000 AND color = '".$color."' order by product_id DESC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 5:
                            $queryDelete = "SELECT * FROM product WHERE discounted_price > 1000 AND color = '".$color."' order by product_id DESC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        default:
                            $queryDelete = "SELECT * FROM product WHERE color = '".$color."' order by product_id DESC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                    }
                } else {
                    switch ($priceCondition) {
                        case 1:
                            $queryDelete = "SELECT * FROM product WHERE  discounted_price < 500 order by product_id DESC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 2:
                            $queryDelete = "SELECT * FROM product WHERE discounted_price > 500 AND discounted_price < 650 order by product_id DESC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 3:
                            $queryDelete = "SELECT * FROM product WHERE discounted_price > 650 AND discounted_price < 800 order by product_id DESC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 4:
                            $queryDelete = "SELECT * FROM product WHERE discounted_price > 800 AND discounted_price < 1000 order by product_id DESC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 5:
                            $queryDelete = "SELECT * FROM product WHERE discounted_price > 1000 order by product_id DESC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        default:
                            $queryDelete = "SELECT * FROM product order by product_id DESC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                    }
                }
            }
        } else {
            if ($sortedPrice != null) {
                if($color != null) {
                    switch ($priceCondition) {
                        case 1:
                            $queryDelete = "SELECT * FROM product WHERE category_id = " . $cateId . " AND discounted_price < 500 AND color = '".$color."' order by discounted_price " . $sortedPrice . " LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 2:
                            $queryDelete = "SELECT * FROM product WHERE category_id = " . $cateId . " AND discounted_price > 500 AND discounted_price < 650 AND color = '".$color."' order by discounted_price " . $sortedPrice . " LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 3:
                            $queryDelete = "SELECT * FROM product WHERE category_id = " . $cateId . " AND discounted_price > 650 AND discounted_price < 800 AND color = '".$color."' order by discounted_price " . $sortedPrice . " LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 4:
                            $queryDelete = "SELECT * FROM product WHERE category_id = " . $cateId . " AND discounted_price > 800 AND discounted_price < 1000 AND color = '".$color."' order by discounted_price " . $sortedPrice . " LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 5:
                            $queryDelete = "SELECT * FROM product WHERE category_id = " . $cateId . " AND discounted_price > 1000 AND color = '".$color."' order by discounted_price " . $sortedPrice . " LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        default:
                            $queryDelete = "SELECT * FROM product WHERE category_id = " . $cateId . " AND color = '".$color."'  order by discounted_price " . $sortedPrice . " LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                    }
                } else {
                    switch ($priceCondition) {
                        case 1:
                            $queryDelete = "SELECT * FROM product WHERE category_id = " . $cateId . " AND discounted_price < 500 order by discounted_price " . $sortedPrice . " LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 2:
                            $queryDelete = "SELECT * FROM product WHERE category_id = " . $cateId . " AND discounted_price > 500 AND discounted_price < 650 order by discounted_price " . $sortedPrice . " LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 3:
                            $queryDelete = "SELECT * FROM product WHERE category_id = " . $cateId . " AND discounted_price > 650 AND discounted_price < 800 order by discounted_price " . $sortedPrice . " LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 4:
                            $queryDelete = "SELECT * FROM product WHERE category_id = " . $cateId . " AND discounted_price > 800 AND discounted_price < 1000 order by discounted_price " . $sortedPrice . " LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 5:
                            $queryDelete = "SELECT * FROM product WHERE category_id = " . $cateId . " AND discounted_price > 1000 order by discounted_price " . $sortedPrice . " LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        default:
                            $queryDelete = "SELECT * FROM product WHERE category_id = " . $cateId . " order by discounted_price " . $sortedPrice . " LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                    } 
                }

            } else {
                if($color != null){
                    switch ($priceCondition) {
                        case 1:
                            $queryDelete = "SELECT * FROM product WHERE category_id = " . $cateId . " AND discounted_price < 500 AND color = '".$color."' order by product_id DESC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 2:
                            $queryDelete = "SELECT * FROM product WHERE category_id = " . $cateId . " AND discounted_price > 500 AND discounted_price < 650 AND color = '".$color."' order by product_id DESC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 3:
                            $queryDelete = "SELECT * FROM product WHERE category_id = " . $cateId . " AND discounted_price > 650 AND discounted_price < 800 AND color = '".$color."' order by product_id DESC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 4:
                            $queryDelete = "SELECT * FROM product WHERE category_id = " . $cateId . " AND discounted_price > 800 AND discounted_price < 1000 AND color = '".$color."' order by product_id DESC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 5:
                            $queryDelete = "SELECT * FROM product WHERE category_id = " . $cateId . " AND discounted_price > 1000 AND color = '".$color."' order by product_id DESC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        default:
                            $queryDelete = "SELECT * FROM product WHERE category_id = " . $cateId . " AND color = '".$color."' order by product_id DESC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                    }   
                } else {
                    switch ($priceCondition) {
                        case 1:
                            $queryDelete = "SELECT * FROM product WHERE category_id = " . $cateId . " AND discounted_price < 500 order by product_id DESC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 2:
                            $queryDelete = "SELECT * FROM product WHERE category_id = " . $cateId . " AND discounted_price > 500 AND discounted_price < 650 order by product_id DESC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 3:
                            $queryDelete = "SELECT * FROM product WHERE category_id = " . $cateId . " AND discounted_price > 650 AND discounted_price < 800 order by product_id DESC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 4:
                            $queryDelete = "SELECT * FROM product WHERE category_id = " . $cateId . " AND discounted_price > 800 AND discounted_price < 1000 order by product_id DESC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        case 5:
                            $queryDelete = "SELECT * FROM product WHERE category_id = " . $cateId . " AND discounted_price > 1000 order by product_id DESC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                        default:
                            $queryDelete = "SELECT * FROM product WHERE category_id = " . $cateId . " order by product_id DESC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $resultDelete = $this->db->select($queryDelete);
                            break;
                    }
                }
            }
        }


        return $resultDelete;
    }
    public function countAllProduct()
    {
        $queryInsert = "SELECT * FROM product";
        $resultInsert = $this->db->select($queryInsert);
        $result = mysqli_num_rows($resultInsert);
        return $result;
    }

    public function countProduct()
    {
        $queryInsert = "SELECT * FROM product WHERE category_id = " . $_GET['categoryId'] . "";
        $resultInsert = $this->db->select($queryInsert);
        $result = mysqli_num_rows($resultInsert);
        return $result;
    }
    // van hau

        // order
        public function getAllOrders($userId) {
            $query = "SELECT * FROM orders where user_id = '$userId'";
            $result = $this->db->select($query);
            return $result;
        }
        public function getAllOrders2() {
            $query = "SELECT * FROM orders";
            $result = $this->db->select($query);
            return $result;
        }
        // 22/05/2024
        public function deliverOrder($orderId, $orderDate) {
            $query = "UPDATE orders SET order_status='Đã vận chuyển' where created_at='$orderDate'";
            $result = $this->db->update($query);
            return $result;
        }
        public function successOrder($orderDate) {
            $query = "UPDATE orders SET order_status='Thành công' where created_at='$orderDate'";
            $result = $this->db->update($query);
            return $result;
        }
        // 01/06/2024
        public function insert_blog($data, $files) {
            $title = mysqli_real_escape_string($this->db->link, $data['title']);
            $short_des = mysqli_real_escape_string($this->db->link, $data['short_des']);
            $long_des = mysqli_real_escape_string($this->db->link, $data['long_des']);

            $permitted = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            if (in_array($file_ext, $permitted)) {
                $unique_image = substr(md5(time()), 0, 10). '.' .$file_ext;
                $upload_image = "uploads/".$unique_image;
            }
            

            if($title == "" || $short_des == "" || $long_des == "") {
                $alert = "<p class=' text-danger'>Các trường này không được để trống !</p>";
                return $alert;
            }
            else {
                move_uploaded_file($file_tmp, $upload_image);
                // $now = new DateTime();
                //     $c = $now->format('Y-m-d H:i:s');
                    $queryInsert = "INSERT INTO blog(title, short_des, long_des, image_title) VALUES('$title', '$short_des', '$long_des', '$unique_image' )";
                    $resultInsert = $this->db->insert($queryInsert);
                    if($resultInsert) {
                        $alert = "<p class='  text-success'>Đã thêm mới một bài viết !</p>";
                        return $alert;
                    }
                    else {
                        $alert = "<p class=' text-danger'>Thêm mới thất bại, vui lòng kiểm tra lại !</p>";
                        return $alert;
                    }
            }
        }
        public function selectAllBlog() {
            $query = "SELECT * FROM blog";
            $result = $this->db->select($query);
            return $result;
        }
        public function deleteBlogById($id) {
            $query = "DELETE FROM blog WHERE id='$id'";
            $result = $this->db->delete($query);
            return $result;
        }
        public function getBlogById($id) {
            $query = "SELECT * FROM blog WHERE id='$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function selectAllUser() {
            $query = "SELECT * FROM user";
            $result = $this->db->select($query);
            return $result;
        }
        public function paginationProduct($start, $limit) {
            $sql = "SELECT product.*, category.category_name FROM product INNER JOIN category ON product.category_id = category.category_id LIMIT $start,$limit";
            $result = $this->db->select($sql);
            return $result;
        }
        public function countProductPagination() {
            $sql = "SELECT COUNT(*) AS total FROM product";
            $result = $this->db->select($sql);
            return $result;
        }
        public function countCategoryPagination() {
            $sql = "SELECT COUNT(*) AS total FROM category";
            $result = $this->db->select($sql);
            return $result;
        }
        public function countUserPagination() {
            $sql = "SELECT COUNT(*) AS total FROM user";
            $result = $this->db->select($sql);
            return $result;
        }
        public function countOrderPagination() {
            $sql = "SELECT COUNT(*) AS total FROM orders";
            $result = $this->db->select($sql);
            return $result;
        }
        public function selectAllRating() {
            $query = "SELECT rating.*, product.product_name, user.username FROM rating INNER JOIN product ON rating.product_id = product.product_id INNER JOIN user ON rating.user_id = user.id";
            $result = $this->db->select($query);
            return $result;
        }
        // 02/06/2024
        public function searchOrder($key) {
            $query = "SELECT * FROM orders WHERE product_name LIKE '%$key%'";
            $result = $this->db->select($query);
            return $result;
        }
        public function searchProduct($key) {
            $query = "SELECT * FROM product WHERE product_name LIKE '%$key%'";
            $result = $this->db->select($query);
            return $result;
        }
        public function searchCategory($key) {
            $query = "SELECT * FROM category WHERE category_name LIKE '%$key%'";
            $result = $this->db->select($query);
            return $result;
        }
        public function searchBlog($key) {
            $query = "SELECT * FROM blog WHERE title LIKE '%$key%'";
            $result = $this->db->select($query);
            return $result;
        }
        public function deleteOrder($id) {
            $query = "DELETE FROM orders WHERE id LIKE '%$id%'";
            $result = $this->db->delete($query);
            return $result;
        }
    }
    
 ?>