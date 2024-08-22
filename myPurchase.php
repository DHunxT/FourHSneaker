<?php include 'inc/head.php' ?>

<?php 
    // if($_SERVER['RESQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $id = $_POST['id'];
        $phoneNumber = $_POST['phoneNumber'];
        $address = $_POST['address'];
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
    if(isset($_POST['search'])) {
        $key = $_POST['key'];
        $searchKey = $category->searchOrder($key);
     }
	if( isset($_GET['orderDate'])) {
		$order_date = $_GET['orderDate'];
        $deliveredOrder = $category->successOrder($order_date);
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
                    <form action="" method="POST">
                        <div class="input-group">
                        
                                <div class="form-outline" data-mdb-input-init>
                                    <input type="text" name="key" id="form1" class="form-control" placeholder="Theo tên sản phẩm, tên đơn hàng..." />
                                </div>
                                <button type="submit" name="search" class="btn btn-warning text-white" data-mdb-ripple-init>
                                    Tìm kiếm
                                </button>
                        </div>
                    </form>            

        
            
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Tên</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Ngày nhận hàng</th>
                        </tr>
                    </thead>
                
                <tbody>
                <?php
                    $id = Session::get("userId");
                    $allOrders = $order->getAllOrders($id);
                    if($searchKey) {
                        while($result = $searchKey->fetch_assoc()) {

                    ?>
                    <tr>
                        <td><?php echo $result['product_name'] ?></td>
                        <td>
                            <img style="width: 50px; border-radius: 50%" src="admin/uploads/<?php echo $result['image'] ?>" alt="">
                        </td>
                        <td><?php echo $result['quantity'] ?></td>
                        <td><?php echo $fm->format_currency($result['total_price'])?>.000đ</td>
             
                        <td>
                            <?php
								$orderDate = $result['created_at'];
                                if($result['order_status'] == "Đang vận chuyển") {

                                
                             ?>
                                <button class="btn btn-danger">Dự kiến nhận hàng vào 11/06/2024</button>
                                
                            <?php } else if($result['order_status'] == "Đã vận chuyển") { ?>
                                <button class="btn btn-warning"><a  class="text-white" href="myPurchase.php?orderDate=<?php echo $orderDate ?>">Đã nhận được hàng</a></button>
                            <?php } else { ?>
                                <button class="btn btn-success">Giao hàng thành công</button>

                                <?php } ?>
                        </td>
                        
                    </tr> 
                    <?php } } else  
                    // if($allOrders) {
                        while($result = $allOrders->fetch_assoc()) {

                    ?>
                    <tr>
                        <td><?php echo $result['product_name'] ?></td>
                        <td>
                            <img style="width: 50px; border-radius: 50%" src="admin/uploads/<?php echo $result['image'] ?>" alt="">
                        </td>
                        <td><?php echo $result['quantity'] ?></td>
                        <td><?php echo $fm->format_currency($result['total_price'])?>.000đ</td>
             
                        <td>
                            <?php
								$orderDate = $result['created_at'];
                                if($result['order_status'] == "Đang vận chuyển") {

                                
                             ?>
                                <button class="btn btn-danger">Dự kiến nhận hàng vào 25/06/2024</button>
                                
                            <?php } else if($result['order_status'] == "Đã vận chuyển") { ?>
                                <button class="btn btn-warning"><a  class="text-white" href="myPurchase.php?orderDate=<?php echo $orderDate ?>">Đã nhận được hàng</a></button>
                            <?php } else { ?>
                                <button class="btn btn-success">Giao hàng thành công</button>

                                <?php } ?>
                        </td>
                        
                    </tr>
                    <?php
                        }
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