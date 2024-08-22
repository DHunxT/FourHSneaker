<?php include 'inc/head.php' ?>
<?php
    if(isset($_POST['update'])) {
        $quantity = $_POST['quantity'];
        $productId = $_POST['productId'];
        $updateQuantity = $cart->updateQuantity($quantity, $productId);
    }
    if(isset($_GET['productId'])) {
        $id = $_GET['productId'];
        $deletedProductInCart = $cart->deleteProductInCart($id);
   }
   if(isset($_GET['user_id'])) {
    $id = $_GET['user_id'];
    $deletedProductInCart = $cart->deleteAllCart($id);
}
 ?>
<?php
    
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
                    <h1>Giỏ hàng của bạn</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="cart.php">Giỏ hàng</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <?php 
                    $id = Session::get('userId');
                    $cartAll = $cart->getAllCart($id);
                    if($cartAll) {
                ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Đơn giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Size</th>
                                <th scope="col">Tổng giá</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                                    $subTotal = 0;
                                    $count = 0;
                                    while($result = $cartAll->fetch_assoc()) {

                                    
                             ?>
                            <tr>
                               
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <a href="single-product.php?productId=<?php echo $result['product_id'] ?>">
                                                <img width="50px" style="border-radius: 50%" src="admin/uploads/<?php echo $result['image'] ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <a class="text-#333" href="single-product.php?productId=<?php echo $result['product_id'] ?>">
                                                <p><?php echo $result['product_name'] ?></p>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5><?php echo $fm->format_currency($result['initial_price']) ?>.000đ</h5>
                                </td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="productId" value="<?php echo $result['product_id'] ?>">
                                        <input type="number" name="quantity" value="<?php echo $result['quantity'] ?>">
                                        <button class="btn" name="update" type="submit">Cập nhật</button>
                                    </form>
                                </td>
                                <td>
                                    <p><?php echo $result['size'] ?></p>
                                </td>
                                
                                <td>
                                    <h5><?php
                                    $total = $result['initial_price'] *  $result['quantity'];
                                     echo $fm->format_currency($total);
                                     ?>.000đ</h5>
                                </td>
                                <td>
                                    <button class="btn btn-danger">
                                        <a href="?productId=<?php echo $result['product_id'] ?>" class="text-white text-decoration-none" href="">Xóa</a>
                                     </button>
                                </td>
                            </tr>
                            <?php $subTotal += $total; $count++; }?>
                            
                            <tr class="bottom_button">
                                <td>
                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa toàn bộ giỏ hàng ?')" href="?user_id=<?php echo Session::get("userId") ?>" class="gray_btn text-decoration-none">XÓA GIỎ HÀNG</a>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                    <div class="cupon_text d-flex align-items-center">
                                        <input type="text" placeholder="Mã giảm giá">
                                        <a class="primary-btn" href="#">ÁP DỤNG</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Tổng tiền</h5>
                                </td>
                                <td>
                                    <h5><?php echo $fm->format_currency($subTotal) ?>.000đ</h5>

                                </td>
                                
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Tổng sản phẩm</h5>
                                </td>
                                <td>
                                   
                                    <h5><?php echo $count ?></h5>
                                    <?php
                                        Session::set("count", $count);
                                     ?>
                                </td>
                                
                            </tr>
                            <tr class="shipping_area">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    
                                </td>
                            </tr>
                            <tr class="out_button_area">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="gray_btn" href="category.php?categoryId=0&perpage=8&page=1">Tiếp tục mua hàng</a>
                                        <a class="primary-btn" href="checkout.php">Thanh toán</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php } else { ?>
                    <h3 class="text-center">Giỏ hàng trống, vui lòng thêm sản phẩm mới</h3>
                    <h4 class="text-center"><a href="category.php?categoryId=0&perpage=8&page=1">Trang sản phẩm</a></h4>
                    <?php } ?>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->

    <!-- start footer Area -->
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