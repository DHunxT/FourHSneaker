<?php include 'inc/head.php' ?>

<?php
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

        $registerCheck = $user->take_newPassword($_POST);
    }
	if(isset($_POST['delete'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        $username = "";
        $password = "";
        $confirmPassword = "";
       
   }
 ?>
<body>

	<!-- Start Header Area -->
	<?php include 'inc/header.php' ?>

	<!-- End Header Area -->

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Lấy lại mật khẩu</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
						<a href="login.php">Đăng nhập<span class="lnr lnr-arrow-right"></span></a>
						<a href="forget-password.php">Quên mật khẩu</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="img/login.jpg" alt="">
						<div class="hover">
							<h4>Bạn đã có tài khoản ?</h4>
							<p>Hãy cùng đến với trải nghiệm mua sắm tuyệt vời với chúng tôi !</p>
							<a class="primary-btn" href="login.php">Đăng nhập ngay</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Quản lý mật khẩu</h3>
						<?php
							if($registerCheck) {
								echo $registerCheck;
							}
						 ?>
						<form class="row login_form" action="forget-password.php" method="post" id="contactForm" novalidate="novalidate">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="username" name="username" placeholder="Tên tài khoản"  onblur="validateUsername()">
								<p id="usernameError" class="text-danger mt-1"></p>
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu mới" onblur="validatePassword()">
								<p id="passwordError" class="text-danger mt-1"></p>
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Xác nhận mật khẩu" onblur="validateConfirmPassword()">
								<p id="confirmPasswordError" class="text-danger mt-1"></p>
							</div>
							
							
							<div class="col-md-6 form-group">
								<button type="submit" name="submit" class="primary-btn">Lưu</button>
							</div>
							<div class="col-md-6 form-group">
								<button type="submit" name="delete" class="primary-btn">Nhập lại</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

	<!-- start footer Area -->
	<?php include 'inc/footer.php' ?>
	<?php include 'inc/upToTop.php' ?>

	
	<!-- End footer Area -->


	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
	<script>
		
		function validateUsername() {
			var username = document.getElementById("username").value.trim();
			if(username == '') {
				document.getElementById("usernameError").textContent = "Vui lòng nhập tài khoản !";
			}
			else if(username.length < 6) {
				document.getElementById("usernameError").textContent = "Tài khoản phải có ít nhất 6 ký tự !";
			}
			else {
				document.getElementById("usernameError").textContent = "";
			}		
		}
		function validatePassword() {
			var password = document.getElementById("password").value.trim();
			if(password === '') {
				document.getElementById("passwordError").textContent = "Vui lòng nhập mật khẩu !";
			}
			else if(password.length < 6) {
				document.getElementById("passwordError").textContent = "Mật khẩu phải có ít nhất 6 ký tự !";
			}
			else {
				document.getElementById("passwordError").textContent = "";
			}		
		}
		function validateConfirmPassword() {
			var confirmPassword = document.getElementById("confirmPassword").value.trim();
			var password = document.getElementById("password").value.trim();
			if(confirmPassword === '') {
				document.getElementById("confirmPasswordError").textContent = "Vui lòng nhập lại mật khẩu !";
			}
			else if(confirmPassword.length < 6) {
				document.getElementById("confirmPasswordError").textContent = "Mật khẩu phải có ít nhất 6 ký tự !";
			}
			else if(confirmPassword !== password) {
				document.getElementById("confirmPasswordError").textContent = "Mật khẩu nhập lại không trùng khớp !";
			}
			else {
				document.getElementById("confirmPasswordError").textContent = "";
			}		
		}
		function validateFirstname() {
			var firstName = document.getElementById("firstName").value.trim();
			if(firstName === '') {
				document.getElementById("firstNameError").textContent = "Vui lòng nhập họ của bạn !";
			}
			else {
				document.getElementById("firstNameError").textContent = "";
			}		
		}
		function validateLastname() {
			var lastName = document.getElementById("lastName").value.trim();
			if(lastName === '') {
				document.getElementById("lastNameError").textContent = "Vui lòng nhập tên của bạn !";
			}
			else {
				document.getElementById("lastNameError").textContent = "";
			}		
		}
		function validatePhonenumber() {
			var phoneNumber = document.getElementById("phoneNumber").value.trim();
			if(phoneNumber === '') {
				document.getElementById("phoneNumberError").textContent = "Vui lòng nhập số điện thoại !";
			}
			else {
				document.getElementById("phoneNumberError").textContent = "";
			}		
		}
	</script>
</body>

</html>