<?php include 'inc/head.php' ?>

<?php 
    // if($_SERVER['RESQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $id = $_POST['id'];
        $phoneNumber = $_POST['phoneNumber'];
        $address = $_POST['address'];
        echo "id" . $id;
        $updateInfor = $user->updateUser($firstName, $lastName, $phoneNumber, $address, $id);
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
					<h1>Đơn hàng của tôi</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
						<a href="myPurchase.php">Đơn hàng của tôi</a>
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
					<div class="head">Quản lý đơn hàng</div>
					<!-- Logic php -->
					
					<ul class="main-categories">
                        <li class="main-nav-list"><a href="myPurchase.php" ><span
								 class="lnr lnr-arrow-right"></span>Đang vận chuyển</a>
						</li>
                        <li class="main-nav-list"><a href="deliveredOrder.php" ><span
								 class="lnr lnr-arrow-right"></span>Đã giao hàng</a>
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
                        <h3 class="text-center font-bold">Đơn hàng của tôi</h3>
                    <div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Tên</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                
                <tbody>
                <?php
                    $id = Session::get("userId");
                    $allOrders = $order->getDeliveredOrders($id);
                    if($allOrders) {
                        while($result = $allOrders->fetch_assoc()) {

                    ?>
                    <tr>
                        <td><?php echo $result['product_name'] ?></td>
                        <td>
                            <img style="width: 50px" src="admin/uploads/<?php echo $result['image'] ?>" alt="">
                        </td>
                        <td><?php echo $result['quantity'] ?></td>
                        <td><?php echo $fm->format_currency($result['total_price']) ?>.000đ</td>
                        <td>
                            <button class="btn btn-primary"><a class="text-white" href="single-product.php?productId=<?php echo $result['product_id'] ?>">Mua lại</a></button>
                        </td>
                        
                    </tr>
                    <?php
                        }}
                     ?>
                    
                </tbody>
            </table>
         

        </div>
       
        
        
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