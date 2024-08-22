<?php 
    include '../lib/database.php';
    include '../helpers/format.php';
?>
<?php
    class adminComment {
        private $db;
        private $fm;
        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function addComment($ratingStars, $message, $productId, $userId) {
            if($message == "" || $ratingStars == "") {
                $alert = "<p class=' text-danger'>Các trường này không được để trống !</p>";
                return $alert;
            }
            else {
                $now = new DateTime();
                $c = $now->format('Y-m-d H:i:s');

                $queryInsert = "INSERT INTO rating(user_id, product_id, message, ratingStars, created_at) VALUES('$userId', '$productId', '$message', '$ratingStars', '$c')";
                $resultInsert = $this->db->insert($queryInsert);
                    if($resultInsert) {
                        $alert = "<p class='  text-success'>Đã thêm mới một bình luận !</p>";
                        return $alert;
                    }
                    else {
                        $alert = "<p class=' text-danger'>Thêm mới thất bại, vui lòng kiểm tra lại !</p>";
                        return $alert;
                    }
            }
        }
        public function getAllReviews($productId) {
            $queryInsert = "SELECT rating.*, user.username
            FROM rating INNER JOIN user ON rating.user_id = user.id
            WHERE product_id='$productId'";
            $resultInsert = $this->db->select($queryInsert);
            return $resultInsert;
        }
        public function deleteComment($commentId, $id) {
            $queryInsert = "DELETE FROM rating WHERE review_id='$commentId'";
            echo $id;
            $resultInsert = $this->db->delete($queryInsert);
            if($resultInsert) {
                header("Location:single-product.php?productId=$id");
            }
            
        }
    }
 ?>