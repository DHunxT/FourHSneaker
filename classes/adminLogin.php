<?php 
    include '../lib/session.php';
    Session::checkLogin();
    include '../lib/database.php';
    include '../helpers/format.php';
?>
<?php

    class adminLogin {
        private $db;
        private $fm;
        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function login_admin($username, $password) {
                $query = "SELECT * FROM admin WHERE username='$username' AND password='$password' LIMIT 1";
                $result = $this->db->select($query);

                if($result) {
                    $value = $result->fetch_assoc();
                    Session::set("adminLogin", true);
                    Session::set("adminId", $value['id']);
                    Session::set("adminUsername", $value['username']);
                    Session::set("email", $value['email']);
                    echo "Success fully";
                    header('Location:index.php');
                }
                else {
                    $alert = "<p class='text-danger text-center'>Tài khoản hoặc mật khẩu không chính xác !</p>";
                    return $alert;
                }
            
        }
    }
 ?>