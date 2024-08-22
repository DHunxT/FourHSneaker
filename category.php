<?php include 'inc/head.php' ?>
<?php
	if(isset($_GET['productIdd'])) {
        $userId = Session::get("userId");
		$productId = $_GET['productIdd'];
        $insertOrder = $cart->addToCartTwo($userId,$productId);
    }
 ?>
<script language="javascript">

</script>

<script language="javascript">
	function handleClick2(myRadio) {
		var color = myRadio.value;
		if (color === 'đen') {
			var url = '?categoryId=<?php echo $_GET['categoryId'] ?>&perpage=<?php echo $_GET['perpage'] ?>&page=1&price=<?php echo $_GET['price'] ?>&gia=<?php echo $_GET['gia'] ?>&mau=đen';
			window.location.replace(url);
		} else if (color === 'trắng') {
			var url = '?categoryId=<?php echo $_GET['categoryId'] ?>&perpage=<?php echo $_GET['perpage'] ?>&page=1&price=<?php echo $_GET['price'] ?>&gia=<?php echo $_GET['gia'] ?>&mau=trắng';
			window.location.replace(url);
		} else if (color === 'be') {
			var url = '?categoryId=<?php echo $_GET['categoryId'] ?>&perpage=<?php echo $_GET['perpage'] ?>&page=1&price=<?php echo $_GET['price'] ?>&gia=<?php echo $_GET['gia'] ?>&mau=be';
			window.location.replace(url);
		} else if (color === 'họa tiết') {
			var url = '?categoryId=<?php echo $_GET['categoryId'] ?>&perpage=<?php echo $_GET['perpage'] ?>&page=1&price=<?php echo $_GET['price'] ?>&gia=<?php echo $_GET['gia'] ?>&mau=họa tiết';
			window.location.replace(url);
		}

	}

	function handleClick(myRadio) {

		var condition = myRadio.value;
		if (condition === 'gia1') {
			var url = '?categoryId=<?php echo $_GET['categoryId'] ?>&perpage=<?php echo $_GET['perpage'] ?>&page=1&price=<?php echo $_GET['price'] ?>&gia=1&mau=<?php echo $_GET['mau'] ?>';
			window.location.replace(url);
		} else if (condition === 'gia2') {
			var url = '?categoryId=<?php echo $_GET['categoryId'] ?>&perpage=<?php echo $_GET['perpage'] ?>&page=1&price=<?php echo $_GET['price'] ?>&gia=2&mau=<?php echo $_GET['mau'] ?>';
			window.location.replace(url);
		} else if (condition === 'gia3') {
			var url = '?categoryId=<?php echo $_GET['categoryId'] ?>&perpage=<?php echo $_GET['perpage'] ?>&page=1&price=<?php echo $_GET['price'] ?>&gia=3&mau=<?php echo $_GET['mau'] ?>';
			window.location.replace(url);
		} else if (condition === 'gia4') {
			var url = '?categoryId=<?php echo $_GET['categoryId'] ?>&perpage=<?php echo $_GET['perpage'] ?>&page=1&price=<?php echo $_GET['price'] ?>&gia=4&mau=<?php echo $_GET['mau'] ?>';
			window.location.replace(url);
		} else if (condition === 'gia5') {
			var url = '?categoryId=<?php echo $_GET['categoryId'] ?>&perpage=<?php echo $_GET['perpage'] ?>&page=1&price=<?php echo $_GET['price'] ?>&gia=5&mau=<?php echo $_GET['mau'] ?>';
			window.location.replace(url);
		}
	}

	function selectedOption() {
		var a = document.getElementById("filter");
		var display = a.options[a.selectedIndex].text;
		if (display === 'Hiện 4') {
			var url = '?categoryId=<?php echo $_GET['categoryId'] ?>&perpage=4&page=1&price=<?php echo $_GET['price'] ?>&gia=<?php echo $_GET['gia'] ?>&mau=<?php echo $_GET['mau'] ?>';
			window.location.replace(url);
		} else {
			var url = '?categoryId=<?php echo $_GET['categoryId'] ?>&perpage=8&page=1&price=<?php echo $_GET['price'] ?>&gia=<?php echo $_GET['gia'] ?>&mau=<?php echo $_GET['mau'] ?>';
			window.location.replace(url);
		}
	}

	function selectedSortedPrice() {
		var b = document.getElementById("sortedPrice");
		var display = b.options[b.selectedIndex].text;
		if (display === 'Tăng dần (theo giá)') {
			var url = '?categoryId=<?php echo $_GET['categoryId'] ?>&perpage=<?php echo $_GET['perpage'] ?>&page=1&price=ASC&gia=<?php echo $_GET['gia'] ?>&mau=<?php echo $_GET['mau'] ?>';
			window.location.replace(url);
		} else if (display === 'Giảm dần (theo giá)') {
			var url = '?categoryId=<?php echo $_GET['categoryId'] ?>&perpage=<?php echo $_GET['perpage'] ?>&page=1&price=DESC&gia=<?php echo $_GET['gia'] ?>&mau=<?php echo $_GET['mau'] ?>';
			window.location.replace(url);
		} else {
			var url = '?categoryId=<?php echo $_GET['categoryId'] ?>&perpage=<?php echo $_GET['perpage'] ?>&page=1&gia=<?php echo $_GET['gia'] ?>&mau=<?php echo $_GET['mau'] ?>';
			window.location.replace(url);
		}
	}


</script>

<body id="category">

	<!-- Start Header Area -->
	<?php include 'inc/header.php' ?>

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Danh mục</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Của hàng<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.php">Danh mục</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head">Danh sách danh mục</div>
					<!-- Logic php -->

					<ul class="main-categories">
						<?php
						$categoryList = $category->selectAllCategory();
						if ($categoryList) {
							$i = 0;
							while ($result = $categoryList->fetch_assoc()) {
								$i++;

								?>
								<li class="main-nav-list"><a class="active"
										href="category.php?categoryId=<?php echo $result["category_id"] ?>&perpage=8&page=1"><span
											class="lnr lnr-arrow-right"></span><?php echo $result["category_name"] ?></a>

								</li>
							<?php }
						} ?>
					</ul>

				</div>

				<div class="sidebar-filter mt-50">
					<div class="top-filter-head">Lọc sản phẩm</div>
					<div class="common-filter">
						<div class="head">Khoảng giá</div>
						<form action="">
							<ul>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="apple"
										name="selectedPrice" value="gia1" onchange="handleClick(this);"><label
										for="apple">Dưới 500.000</label></li>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="asus"
										name="selectedPrice" value="gia2" onchange="handleClick(this);"><label
										for="asus">500.000-650.000</label></li>
								<li class="filter-list"><input class="pixel-radio" type="radio" value="gia3" id="gionee"
										name="selectedPrice" onchange="handleClick(this);"><label
										for="gionee">650.000-800.000</label></li>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="micromax"
										value="gia4" name="selectedPrice" onchange="handleClick(this);"><label
										for="micromax">800.000-1.000.000</span></label></li>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="samsung"
										value="gia5" name="selectedPrice" onchange="handleClick(this);"><label
										for="samsung">Trên 1.000.000</label></li>
							</ul>
						</form>
					</div>
					<div class="common-filter">
						<div class="head">Màu sắc</div>
						<form action="#">
							<ul>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="black"
										onchange="handleClick2(this)"value="đen"><label
										for="black">Đen</label></li>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="balckleather"
										onchange="handleClick2(this)" value="trắng"><label for="balckleather">Trắng
									</label></li>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="blackred"
										onchange="handleClick2(this)" value="be"><label for="blackred">Be</label></li>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="spacegrey"
										onchange="handleClick2(this)" value="họa tiết"><label for="spacegrey">Họa
										tiết</label></li>
							</ul>
						</form>
					</div>

				</div>
			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">

					<div class="sorting">
						<select id="sortedPrice" onchange="selectedSortedPrice();">
							<?php
							$price = $_GET['price'];
							if ($price == "ASC") {
								?>
								<option>Không sắp xếp</option>
								<option selected="selected">Tăng dần (theo giá)</option>
								<option>Giảm dần (theo giá)</option>
								<?php
							} else if ($price == "DESC") {
								?>
									<option>Không sắp xếp</option>
									<option>Tăng dần (theo giá)</option>
									<option selected="selected">Giảm dần (theo giá)</option>
								<?php
							} else {
								?>
									<option selected="selected">Không sắp xếp</option>
									<option>Tăng dần (theo giá)</option>
									<option>Giảm dần (theo giá)</option>
								<?php
							}
							?>
						</select>
					</div>
					<div class="sorting mr-auto">
						<select id="filter" onchange="selectedOption();">
							<?php
							$perpage = $_GET['perpage'];
							if ($perpage == 8) {
								?>
								<option selected="selected" value="8">Hiện 8</option>
								<option value="4">Hiện 4</option>
								<?php
							} else {
								?>
								<option value="8">Hiện 8</option>
								<option selected="selected" value="4">Hiện 4</option>
								<?php
							}
							?>
						</select>
					</div>
					<div class="sorting mr-auto">
						<a href="category.php?categoryId=0&perpage=8&page=1"><span class="text-white"><-</span></a>
					</div>
					

					<?php									
						include ('pagination.php');
					?>
				</div>
				<!-- End Filter Bar -->
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row">
						<!-- Logic php -->
						<?php
						$id = $_GET['categoryId'];
						$getLaterProducts = $category->getProducts();
						if ($getLaterProducts) {
							while ($result = $getLaterProducts->fetch_assoc()) {

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
												<h6 class="text-success">
													<?php echo round(100 - ($result['discounted_price'] / $result['price'] * 100), 0) ?>%
													GIẢM
												</h6>
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
							<?php }
						}
						?>
					</div>
				</section>
				<!-- End Best Seller -->
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
					<?php
					if($totalPages>1){
						include ('pagination.php');
					}
					
					?>
				</div>
				<!-- End Filter Bar -->
			</div>
		</div>
	</div>

	<!-- Start related-product Area -->
	<section class="related-product-area section_gap">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Có thể bạn cũng tìm kiếm</h1>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-9">
					<div class="row">
						<?php
						$getLatestProducts = $category->getLatestProducts9();

						if ($getLatestProducts) {
							while ($result = $getLatestProducts->fetch_assoc()) {

								?>
								<div class="col-lg-4 col-md-4 col-sm-6">
									<div class="single-related-product d-flex">
										<a href="single-product.php?productId=<?php echo $result['product_id'] ?>"><img
												width="60px" src="admin/uploads/<?php echo $result["image"] ?>" alt=""></a>
										<div class="desc">
											<a href="#" class="title"><?php echo $result["product_name"] ?></a>
											<div class="price">
												<h6><?php echo $result["discounted_price"] ?>.000đ</h6>
												<h6 class="l-through"><?php echo $fm->format_currency($result["price"]) ?>.000đ</h6>
											</div>
										</div>
									</div>
								</div>
							<?php }
						} ?>
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
									<h6>150.000</h6>
									<h6 class="l-through">210.000</h6>
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

	<!-- start footer Area -->
	<?php include 'inc/footer.php' ?>
	<!-- End footer Area -->

	<!-- Modal Quick Product View -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="container relative">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="product-quick-view">
					<div class="row align-items-center">
						<div class="col-lg-6">
							<div class="quick-view-carousel">
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="quick-view-content">
								<div class="top">
									<h3 class="head">Mill Oil 1000W Heater, White</h3>
									<div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span
											class="ml-10">$149.99</span></div>
									<div class="category">Category: <span>Household</span></div>
									<div class="available">Availibility: <span>In Stock</span></div>
								</div>
								<div class="middle">
									<p class="content">Mill Oil is an innovative oil filled radiator with the most
										modern technology. If you are
										looking for something that can make your interior look awesome, and at the same
										time give you the pleasant
										warm feeling during the winter.</p>
									<a href="#" class="view-full">View full Details <span
											class="lnr lnr-arrow-right"></span></a>
								</div>
								<div class="bottom">
									<div class="color-picker d-flex align-items-center">Color:
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
									</div>
									<div class="quantity-container d-flex align-items-center mt-15">
										Quantity:
										<input type="text" class="quantity-amount ml-15" value="1" />
										<div class="arrow-btn d-inline-flex flex-column">
											<button class="increase arrow" type="button" title="Increase Quantity"><span
													class="lnr lnr-chevron-up"></span></button>
											<button class="decrease arrow" type="button" title="Decrease Quantity"><span
													class="lnr lnr-chevron-down"></span></button>
										</div>

									</div>
									<div class="d-flex mt-20">
										<a href="#" class="view-btn color-2"><span>Add to Cart</span></a>
										<a href="#" class="like-btn"><span class="lnr lnr-layers"></span></a>
										<a href="#" class="like-btn"><span class="lnr lnr-heart"></span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include 'inc/upToTop.php' ?>



	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
		integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
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