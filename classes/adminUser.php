<?php 
    include '../lib/session.php';
    Session::checkLogin();
    include '../lib/database.php';
    include '../helpers/format.php';
?>
<?php

class adminUser {
    private $db;
    private $fm;
    public function __construct() {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function login_user($username, $password) {
            if($username == '' || $password == '') {
                $alert = "<p class='text-danger text-center'>Các trường đều bắt buộc phải nhập, làm ơn thử lại ! !</p>";
                return $alert;
            }
            else {
                $query = "SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 1";
                $result = $this->db->select($query);

                if($result) {
                    echo "Vao duoc day khong ?";

                    $value = $result->fetch_assoc();
                    Session::set("userSuccess", true);
                    Session::set("userId", $value['id']);
                    Session::set("userUsername", $value['username']);
                    Session::set("userImage", $value['image']);
                    echo "Success fully";
                    header('Location:category.php?categoryId=0&perpage=8&page=1');
                }
                else {
                    echo "Hay vao day ?";

                    $alert = "<p class='text-danger text-center'>Tài khoản hoặc mật khẩu không chính xác !</p>";
                    return $alert;
                }
            }
    }
    public function register_user($data) {
        $username = mysqli_real_escape_string($this->db->link, $data['username']);
        $password = mysqli_real_escape_string($this->db->link, $data['password']);
        $confirmPassword = mysqli_real_escape_string($this->db->link, $data['confirmPassword']);
        $firstName = mysqli_real_escape_string($this->db->link, $data['firstName']);
        $lastName = mysqli_real_escape_string($this->db->link, $data['lastName']);
        $phoneNumber = mysqli_real_escape_string($this->db->link, $data['phoneNumber']);

        if($username == "" || $password == '' || $confirmPassword == '' || $firstName == '' || $lastName == '' || $phoneNumber == '') {
            $alert = "<p class='text-danger text-center'>Các trường đều bắt buộc phải nhập, làm ơn thử lại ! !</p>";
            return $alert;
        }
        else if($password != $confirmPassword) {
            $alert = "<p class='text-danger text-center'>Mật khẩu phải giống mật khẩu nhập lại  ! !</p>";
            return $alert;
        }
        else {
            $query = "SELECT * FROM user WHERE username='$username'";
            $result = $this->db->select($query);
            if($result) {
                $alert = "<p class='text-danger text-center'>Tài khoản đã tồn tại, vui lòng chọn tài khoản khác !</p>";
            }
            else {
                $queryInsert = "INSERT INTO user(username, password, firstName, lastName, phoneNumber) VALUES('$username', '$password', '$firstName', '$lastName', '$phoneNumber')";
                $resultInsert = $this->db->insert($queryInsert);
                if($resultInsert) {
                    $alert = "<p class='  text-success'>Thành công, chào mừng bạn trở thành thành viên mới !</p>";
                    return $alert;
                }
                else {
                    $alert = "<p class=' text-danger'>Oops, có vẻ như đã có lỗi trong quá trình nhập dữ liệu, vui lòng kiểm tra lại !</p>";
                    return $alert;
                }
            }
        }
        
        
    }
    public function take_newPassword($data) {
        $username = mysqli_real_escape_string($this->db->link, $data['username']);
        $password = mysqli_real_escape_string($this->db->link, $data['password']);
        $confirmPassword = mysqli_real_escape_string($this->db->link, $data['confirmPassword']);
        
        if($username == '' || $password == '' || $confirmPassword == '') {
            $alert = "<p class='text-danger text-center'>Các trường đều bắt buộc phải nhập, làm ơn thử lại ! !</p>";
            return $alert;
        }
        else {
            $query = "SELECT * FROM user WHERE username='$username'";
            $result = $this->db->select($query);
            if(!$result) {
                $alert = "<p class='text-danger text-center'>Tài khoản chưa tồn tại, vui lòng chọn tài khoản khác !</p>";
                return $alert;

            }
            else {
                $queryUpdate = "UPDATE user SET password='$password' WHERE username='$username'";
                $resultUpdate = $this->db->update($queryUpdate);
                if($resultUpdate) {
                    $alert = "<p class='  text-success'>Đổi mật khẩu thành công, vui lòng đăng nhập lại !</p>";
                    return $alert;
                }
                else {
                    $alert = "<p class=' text-danger'>Oops, có vẻ như đã có lỗi trong quá trình nhập dữ liệu, vui lòng kiểm tra lại !</p>";
                    return $alert;
                }
            }
        }
        
        
    }
    public function getUserById($id) {
        $query = "SELECT * FROM user WHERE id='$id'";
        $result = $this->db->select($query);
        return $result;      
    }
    public function updateUser($data, $files) {
        $firstName = mysqli_real_escape_string($this->db->link, $data['firstName']);
        $lastName = mysqli_real_escape_string($this->db->link, $data['lastName']);
        $phoneNumber = mysqli_real_escape_string($this->db->link, $data['phoneNumber']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $id = mysqli_real_escape_string($this->db->link, $data['id']);

        $permitted = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        if (in_array($file_ext, $permitted)) {
            $unique_image = substr(md5(time()), 0, 10). '.' .$file_ext;
            $upload_image = "admin/uploads/".$unique_image;
        }

        if($firstName == "" || $lastName == "" || $phoneNumber == "" || $address == "") {
            $alert = "<p class=' text-danger'>Các trường này không được để trống !</p>";
            return $alert;
        }
        else {
            move_uploaded_file($file_tmp, $upload_image);
            $queryUpdate = "UPDATE user SET firstName='$firstName', lastName='$lastName',phoneNumber='$phoneNumber',image='$unique_image', address='$address' WHERE id = '$id'";
            $result = $this->db->update($queryUpdate);
            if($result) {
                $alert = "<p class='  text-success'>Đổi thông tin thành công!</p>";
                return $alert;
            }
            else {
                $alert = "<p class=' text-danger'>Oops, có vẻ như đã có lỗi trong quá trình nhập dữ liệu, vui lòng kiểm tra lại !</p>";
                return $alert;
            }    
        }
        
    }
    public function updateUser2($firstName, $lastName, $phoneNumber, $address, $id) {


        if($firstName == "" || $lastName == "" || $phoneNumber == "" || $address == "") {
            $alert = "<p class=' text-danger'>Các trường này không được để trống !</p>";
            return $alert;
        }
        else {
            $queryUpdate = "UPDATE user SET firstName='$firstName', lastName='$lastName',phoneNumber='$phoneNumber', address='$address' WHERE id = '$id'";
            $result = $this->db->update($queryUpdate);
            if($result) {
                $alert = "<p class='  text-success'>Đổi thông tin thành công!</p>";
                return $alert;
            }
            else {
                $alert = "<p class=' text-danger'>Oops, có vẻ như đã có lỗi trong quá trình nhập dữ liệu, vui lòng kiểm tra lại !</p>";
                return $alert;
            }    
        }
        
    }
}
?>