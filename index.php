
<?php include 'inc/head.php' ?>
<?php
	if(isset($_GET['productIdd'])) {
		echo "vao day";
        $userId = Session::get("userId");
		$productId = $_GET['productIdd'];
        $insertOrder = $cart->addToCartTwo($userId,$productId);
        // header("Location:confirmation.php");
    }
 ?>
<body>

	<!-- Start Header Area -->
	<?php include 'inc/header.php' ?>
	<!-- End Header Area -->

	<!-- start banner Area -->
	<?php include 'inc/banner.php' ?>
	<!-- End banner Area -->

	<!-- start features Area -->
	<section class="features-area section_gap">
		<div class="container">
			<div class="row features-inner">
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon1.png" alt="">
						</div>
						<h6>Miễn phí vận chuyển</h6>
						<p>Ưu đãi giảm giá cho lần mua đầu tiên</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon2.png" alt="">
						</div>
						<h6>Chính sách hoàn trả</h6>
						<p>Hoàn trả cho đơn hàng lỗi</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon3.png" alt="">
						</div>
						<h6>24/7 Support</h6>
						<p>Cổng thông tin hỗ trợ 24/7</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon4.png" alt="">
						</div>
						<h6>Thanh toán an toàn</h6>
						<p>Đảm bảo thông tin bảo mật</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end features Area -->

	<!-- Start category Area -->
	<section class="category-area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-md-12">
					<div class="row">
						<div class="col-lg-8 col-md-8">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="img/category/c1.jpg" alt="">
								<a href="img/category/c1.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Sneaker for Sports</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="img/category/c2.jpg" alt="">
								<a href="img/category/c2.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Sneaker for Sports</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="img/category/c3.jpg" alt="">
								<a href="img/category/c3.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Product for Couple</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-8 col-md-8">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="img/category/c4.jpg" alt="">
								<a href="img/category/c4.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Sneaker for Sports</h6>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-deal">
						<div class="overlay"></div>
						<img class="img-fluid w-100" src="img/category/c5.jpg" alt="">
						<a href="img/category/c5.jpg" class="img-pop-up" target="_blank">
							<div class="deal-details">
								<h6 class="deal-title">Sneaker for Sports</h6>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End category Area -->

	<!-- start product Area -->
	<section class="owl-carousel active-product-area section_gap">
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>MỚI NHẤT</h1>
							<p>Đến với chúng tôi để bạn có được những trải nghiệm tốt nhất</p>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- Logic php -->
					<?php
						$getLatestProducts = $category->getLatestProducts();

						if($getLatestProducts) {
							while($result = $getLatestProducts->fetch_assoc()) {
								
					 ?>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">

							<a href="single-product.php?productId=<?php echo $result['product_id'] ?>">
								<img class="img-fluid" src="admin/uploads/<?php echo $result['image'] ?>" alt="">
							</a>
							<div class="product-details">
								<h6><?php echo $result['product_name'] ?></h6>
								<div class="price">
									<h6><?php echo $fm->format_currency($result['discounted_price']) ?>.000</h6>
									<h6 class="l-through"><?php echo $fm->format_currency($result['price']) ?>.000</h6>
									<h6 class="text-success"><?php echo round(100-($result['discounted_price'] /  $result['price'] * 100), 0)?>% GIẢM</h6>
								</div>
								<div class="prd-bottom">

									<a href="index.php?productIdd=<?php echo $result['product_id']?>" class="social-info">
										<span class="ti-bag"></span>
										<p class="hover-text">Thêm vào giỏ</p>
									</a>
								
					
									<a href="single-product.php?productId=<?php echo $result['product_id'] ?>" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">Xem chi tiết</p>
									</a>
								</div>
							</div>
						</div>
					</div>
					<?php }} ?>
				</div>
			</div>
		</div>
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>BÁN CHẠY</h1>
							<p>Sứ mệnh của chúng tôi để bạn có được những trải nghiệm tốt nhất và nâng tầm outfit của bạn</p>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- single product -->
					<?php
						$getLatestProducts = $category->getSellMostProducts();

						if($getLatestProducts) {
							while($result = $getLatestProducts->fetch_assoc()) {
								
					 ?>
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<a href="single-product.php?productId=<?php echo $result['product_id'] ?>">
								<img class="img-fluid" src="admin/uploads/<?php echo $result['image'] ?>" alt="">
							</a>
							<div class="product-details">
								<h6><?php echo $result['product_name'] ?></h6>
								<div class="price">
									<h6><?php echo $fm->format_currency($result['discounted_price']) ?>.000</h6>
									<h6 class="l-through"><?php echo $fm->format_currency($result['price']) ?>.000</h6>
									<h6 class="text-success"><?php echo round(100-($result['discounted_price'] /  $result['price'] * 100), 0)?>% GIẢM</h6>
								</div>
								<div class="prd-bottom">

									<a href="index.php?productIdd=<?php echo $result['product_id']?>" class="social-info">
										<span class="ti-bag"></span>
										<p class="hover-text">Thêm vào giỏ</p>
									</a>
								
					
									<a href="single-product.php?productId=<?php echo $result['product_id'] ?>" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">Xem chi tiết</p>
									</a>
								</div>
							</div>
						</div>
					</div>
					<?php }}?>				
				</div>
			</div>
		</div>
	</section>
	
	<!-- end product Area -->

	<!-- Start exclusive deal Area -->
	<section class="exclusive-deal-area">
		<div class="container-fluid">
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-6 no-padding exclusive-left">
					<div class="row clock_sec clockdiv" id="clockdiv">
						<div class="col-lg-12">
							<h1>Ưu đãi hấp dẫn độc quyền sắp kết thúc!</h1>
							<p>Dành cho thành viên có niềm đam mê với giày sneaker.</p>
						</div>
						<div class="col-lg-12">
							<div class="row clock-wrap">
								<div class="col clockinner1 clockinner">
									<h1 class="days">150</h1>
									<span class="smalltext">Ngày</span>
								</div>
								<div class="col clockinner clockinner1">
									<h1 class="hours">23</h1>
									<span class="smalltext">Giờ</span>
								</div>
								<div class="col clockinner clockinner1">
									<h1 class="minutes">47</h1>
									<span class="smalltext">Phút</span>
								</div>
								<div class="col clockinner clockinner1">
									<h1 class="seconds">59</h1>
									<span class="smalltext">Giây</span>
								</div>
							</div>
						</div>
					</div>
					<a href="category.php" class="primary-btn">Mua ngay</a>
				</div>
				<div class="col-lg-6 no-padding exclusive-right">
					<div class="active-exclusive-product-slider">
						<!-- single exclusive carousel -->
						<div class="single-exclusive-slider">
							<img class="img-fluid" src="img/product/e-p1.png" alt="">
							<div class="product-details">
								<div class="price">
									<h6>150.000đ</h6>
									<h6 class="l-through">210.000đ</h6>
								</div>
								<h4>addidas New Hammer sole
									for Sports person</h4>
								<div class="add-bag d-flex align-items-center justify-content-center">
									<a class="add-btn" href=""><span class="ti-bag"></span></a>
									<span class="add-text text-uppercase">Thêm vào giỏ</span>
								</div>
							</div>
						</div>
						<!-- single exclusive carousel -->
						<div class="single-exclusive-slider">
							<img class="img-fluid" src="img/product/e-p1.png" alt="">
							<div class="product-details">
								<div class="price">
									<h6>150.000đ</h6>
									<h6 class="l-through">210.000đ</h6>
								</div>
								<h4>addidas New Hammer sole
									for Sports person</h4>
								<div class="add-bag d-flex align-items-center justify-content-center">
									<a class="add-btn" href=""><span class="ti-bag"></span></a>
									<span class="add-text text-uppercase">Thêm vào giỏ</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End exclusive deal Area -->

	<!-- Start brand Area -->
	<section class="brand-area section_gap">
		<div class="container">
			<div class="row">
				<a class="col single-img" href="#">
					<img class="img-fluid d-block mx-auto" src="img/brand/1.png" alt="">
				</a>
				<a class="col single-img" href="#">
					<img class="img-fluid d-block mx-auto" src="img/brand/2.png" alt="">
				</a>
				<a class="col single-img" href="#">
					<img class="img-fluid d-block mx-auto" src="img/brand/3.png" alt="">
				</a>
				<a class="col single-img" href="#">
					<img class="img-fluid d-block mx-auto" src="img/brand/4.png" alt="">
				</a>
				<a class="col single-img" href="#">
					<img class="img-fluid d-block mx-auto" src="img/brand/5.png" alt="">
				</a>
			</div>
		</div>
	</section>
	<!-- End brand Area -->

	<!-- Start related-product Area -->
	<section class="related-product-area section_gap_bottom">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>NHỮNG SẢN PHẨM ĐANG GIẢM GIÁ</h1>
						
					</div>
				</div>
			</div>
			<div class="row">

				<div class="col-lg-9">
					<div class="row">
					<?php
						$getLatestProducts = $category->getLatestProducts9();

						if($getLatestProducts) {
							while($result = $getLatestProducts->fetch_assoc()) {
								
					 ?>
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="single-related-product d-flex">
								<a href="single-product.php?productId=<?php echo $result['product_id']?>"><img width="60px" src="admin/uploads/<?php echo $result["image"] ?>" alt=""></a>
								<div class="desc">
									<a href="#" class="title"><?php echo $result["product_name"] ?></a>
									<div class="price">
										<h6><?php echo $result["discounted_price"] ?>.000đ</h6>
										<h6 class="l-through"><?php echo $fm->format_currency($result["price"]) ?>.000đ</h6>
									</div>
								</div>
							</div>
						</div>
						<?php }} ?>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="ctg-right">
						<a href="#" target="_blank">
							<img class="img-fluid d-block mx-auto" src="img/category/c5.jpg" alt="">
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End related-product Area -->

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
	<script src="js/countdown.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>