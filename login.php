<?php include 'inc/head.php' ?>
<?php
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dn'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $login_check = $user->login_user($username, $password);
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
					<h1>Đăng nhập/Đăng kí</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
						<a href="login.php">Đăng nhập</a>
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
							<h4>Bạn là người mới ?</h4>
							<p>Vậy còn chần chừ gì mà không trở thành thành viên của HHHH Sneaker</p>
							<a class="primary-btn" href="register.php">Tạo tài khoản</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Đăng nhập</h3>
						
						<form class="row login_form" action="login.php" method="post" id="contactForm">
							<?php
							if($login_check) {
								echo $login_check;
							}
							?>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="username" name="username" placeholder="Tên tài khoản"  onblur="validateUsername()"/>
								<p id="usernameError" class="text-danger mt-1"></p>
								
							</div>
							

							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" onblur="validatePassword()">
								<p id="passwordError" class="text-danger mt-1"></p>
							</div>
							
							<div class="col-md-12 form-group">
								<button type="submit" name="dn" class="primary-btn">Đăng nhập</button>
								<a href="forget-password.php">Quên mật khẩu?</a>
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
	<!-- <button onclick="scrollToTop()" id="scrollToTop">Up to top</button> -->
	
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
		
	</script>
	
</body>

</html>