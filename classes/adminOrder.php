<?php 
    include '../lib/session.php';
    Session::checkLogin();
    include '../lib/database.php';
    include '../helpers/format.php';
?>
<?php

class adminOrder {
    private $db;
    private $fm;
    public function __construct() {
        $this->db = new Database();
        $this->fm = new Format();
    }
    
    public function getAllOrder($userId) {
        $query = "SELECT * FROM orders where created_at = (SELECT MAX(created_at) FROM orders) and user_id = '$userId'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getAllOrders($userId) {
        $query = "SELECT * FROM orders where user_id = '$userId' order by id desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function getDeliveredOrders($userId) {
        $query = "SELECT * FROM orders where user_id = '$userId' AND order_status='Thành công'";
        $result = $this->db->select($query);
        return $result;
    }
}
?>