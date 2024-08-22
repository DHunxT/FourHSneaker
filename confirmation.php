<?php include 'inc/head.php' ?>

<body>

	<!-- Start Header Area -->
	<?php include 'inc/header.php' ?>
	
	<!-- End Header Area -->

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Xác nhận đơn hàng</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
						<a href="confirmation.php">Xác nhận đơn hàng</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Order Details Area =================-->
	<section class="order_details section_gap">
		<div class="container">
			<h3 class="title_confirmation">Đặt hàng thành công. Đơn hàng sẽ được chuyển đến bạn trong thời gian sớm nhất.</h3>
			<div class="row order_d_inner">
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Thông tin đơn hàng</h4>
						<ul class="list">
							<li><a href="#"><span>Mã đơn hàng</span> : 60235</a></li>
							<li><a href="#"><span>Ngày đặt hàng</span> : 08/06/2024</a></li>
							<li><a href="#"><span>Phương thức TT</span> : Giao hàng tận nhà</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Địa chỉ nhận hàng</h4>
						<ul class="list">
							<li><a href="#"><span>Tỉnh/TP</span> : Hà Nội</a></li>
							<li><a href="#"><span>Quận/Huyện</span> : Nam Từ Liêm</a></li>
							<li><a href="#"><span>Số nhà, địa chỉ</span> : 113/Ngõ 80-Xuân Phương</a></li>
							<!-- <li><a href="#"><span>Postcode </span> : 36952</a></li> -->
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Thông tin người nhận</h4>
						<ul class="list">
								<?php
                                    $id = Session::get('userId');
                                    $getUserById = $user->getUserById($id);
                                    while($result = $getUserById->fetch_assoc()) {
                                        
                                    
                                 ?>
							<li><a href="#"><span>Họ tên</span> : <?php echo $result['firstName']?> <?php echo $result['lastName']?></a></li>
							<li><a href="#"><span>Số điện thoại</span> : <?php echo $result['phoneNumber']?></a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="order_details_table">
				<h2>Chi tiết đơn hàng</h2>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Sản phẩm</th>
								<th scope="col">Số lượng</th>
								<th scope="col">Giá</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$id = Session::get("userId");
								$getAllOrder = $order->getAllOrder($id);
								if($getAllOrder) {
									$subTotal = 0;
									while($result = $getAllOrder->fetch_assoc()) {

									
							 ?>
								<tr>
									<td>
										<p><?php echo $result['product_name'] ?></p>
									</td>
									<td>
										<h5>x <?php echo $result['quantity'] ?></h5>
									</td>
									<td>
										
										<p><?php 
										$total = $result['total_price'];
										echo $fm->format_currency($total);
										?>.000đ</p>
									</td>
								</tr>
								<?php $subTotal += $total; }} ?>
								<tr>
									<td>
										<h4>Tổng</h4>
									</td>
									<td>
										<h5></h5>
									</td>
									<td>
										<p><?php echo $fm->format_currency($subTotal) ?>.000đ</p>
									</td>
								</tr>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!--================End Order Details Area =================-->

	<!-- start footer Area -->
	<?php
		$userId = Session::get("userId");
		$deletedProductInCart = $cart->deleteAllCart($userId);
	 ?>
	<?php include 'inc/footer.php' ?>
	
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
</body>

</html>