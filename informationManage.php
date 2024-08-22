<?php include 'inc/head.php' ?>

<?php 
    // if(isset($_POST['submit'])) {
        // $firstName = $_POST['firstName'];
        // $lastName = $_POST['lastName'];
        // $id = $_POST['id'];
        // $phoneNumber = $_POST['phoneNumber'];
        // $address = $_POST['address'];
        $updateInfor = $user->updateUser($_POST, $_FILES);
    // }
    if(isset($_POST['delete'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $phoneNumber = $_POST['phoneNumber'];
        $address = $_POST['address'];
        $firstName = "";
        $lastName = "";
        $phoneNumber = "";;
        $address = "";;
    }
?>
<body id="category">

	<!-- Start Header Area -->
	<?php include 'inc/header.php' ?>

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Tài khoản của tôi</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
						<a href="informationManage.php">Thông tin</a>
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
					<div class="head">Quản lý thông tin</div>
					<!-- Logic php -->
					
					<ul class="main-categories">
                        <li class="main-nav-list active"><a href="" ><span
								 class="lnr lnr-arrow-right"></span>Thông tin cá nhân</a>
						</li>
                        <li class="main-nav-list"><a href="forget-password.php" ><span
								 class="lnr lnr-arrow-right"></span>Đổi mật khẩu</a>
						</li>
                        <li class="main-nav-list"><a href="bankAccount.php" ><span
								 class="lnr lnr-arrow-right"></span>Tài khoản ngân hàng</a>
						</li>
					</ul>
					
				</div>
				
			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">
			
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
					
				
					
					<div class="pagination">
						<a href="index.php" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
						
					</div>
				</div>
				<!-- End Filter Bar -->
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
					<!-- <div class="row"> -->
                        <div class="p-3">
                            <h3 class="text-center font-bold">Tài khoản của tôi</h3>
                            <p class="text-center font-bold">Quản lý và bảo vệ tài khoản của bạn</p>

                        
                        <div class="container">
                            
                            <form action="" method="POST" enctype="multipart/form-data">
                               
                                <?php
                                    $id = Session::get('userId');
                                    $getUserById = $user->getUserById($id);
                                    while($result = $getUserById->fetch_assoc()) {
                                        
                                    
                                 ?>
                                    <input type="hidden" name="id" value="<?php echo $id?>">
                                    <div class="form-group">
                                        <label for="categoryName">Tài khoản</label>
                                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $result['username']?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="categoryName">Họ</label>
                                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Nhập họ..." value="<?php echo $result['firstName']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="categoryName">Tên</label>
                                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Nhập tên..." value="<?php echo $result['lastName']?>">
                                    </div>
									<div class="form-group">
										
                                        <label for="image">Hình ảnh: </label>
										<img style="width: 150px; height: 150px" src="admin/uploads/<?php echo $result['image'] ?>" alt="">
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>
                                    <div class="form-group">
                                        <label for="categoryName">Số điện thoại</label>
                                        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Nhập tên..." value="<?php echo $result['phoneNumber']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="categoryName">Địa chỉ</label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ..." value="<?php echo $result['address']?>">
                                </div>
                                <?php } ?>
                                <button type="submit" name="submit" class="btn btn-primary">Lưu</button>
                                <button type="submit" name="delete" class="btn btn-warning">Nhập lại</button>
                            </form>
                        </div>
                                
                </div>   
					</div>
				</section>
				<!-- End Best Seller -->
				
			</div>
		</div>
	</div>
		        
	<!-- start footer Area -->
	<?php include 'inc/footer.php' ?>
	<!-- End footer Area -->

	<!-- Modal Quick Product View -->
	<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
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
									<div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span class="ml-10">$149.99</span></div>
									<div class="category">Category: <span>Household</span></div>
									<div class="available">Availibility: <span>In Stock</span></div>
								</div>
								<div class="middle">
									<p class="content">Mill Oil is an innovative oil filled radiator with the most modern technology. If you are
										looking for something that can make your interior look awesome, and at the same time give you the pleasant
										warm feeling during the winter.</p>
									<a href="#" class="view-full">View full Details <span class="lnr lnr-arrow-right"></span></a>
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
											<button class="increase arrow" type="button" title="Increase Quantity"><span class="lnr lnr-chevron-up"></span></button>
											<button class="decrease arrow" type="button" title="Decrease Quantity"><span class="lnr lnr-chevron-down"></span></button>
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
	</div> -->
	<?php include 'inc/upToTop.php' ?>



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