<?php include 'inc/head.php' ?>
<?php
    if(isset($_GET['orderId']) && $_GET['orderId']=='order') {
        $userId = Session::get("userId");
        $insertOrder = $cart->insertOrder($userId);
        $deletedProductInCart = $cart->deleteAllCart($userId);
        header("Location:confirmation.php");
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $id = $_POST['id'];
        $phoneNumber = $_POST['phoneNumber'];
        $address = $_POST['address'];
        $updateInfor = $user->updateUser2($firstName, $lastName, $phoneNumber, $address, $id);
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
                    <h1>Xác nhận đơn hàng</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="checkout.php">Đơn hàng</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            <!-- <div class="returning_customer">
                <div class="check_title">
                    <h2>Returning Customer? <a href="#">Click here to login</a></h2>
                </div>
                <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new
                    customer, please proceed to the Billing & Shipping section.</p>
                <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                    <div class="col-md-6 form-group p_star">
                        <input type="text" class="form-control" id="name" name="name">
                        <span class="placeholder" data-placeholder="Username or Email"></span>
                    </div>
                    <div class="col-md-6 form-group p_star">
                        <input type="password" class="form-control" id="password" name="password">
                        <span class="placeholder" data-placeholder="Password"></span>
                    </div>
                    <div class="col-md-12 form-group">
                        <button type="submit" value="submit" class="primary-btn">login</button>
                        <div class="creat_account">
                            <input type="checkbox" id="f-option" name="selector">
                            <label for="f-option">Remember me</label>
                        </div>
                        <a class="lost_pass" href="#">Lost your password?</a>
                    </div>
                </form>
            </div> -->
            <!-- <div class="cupon_area">
                <div class="check_title">
                    <h2>Have a coupon? <a href="#">Click here to enter your code</a></h2>
                </div>
                <input type="text" placeholder="Enter coupon code">
                <a class="tp_btn" href="#">Apply Coupon</a>
            </div> -->
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Thông tin thanh toán</h3>
                        <form class="row contact_form" action="checkout.php" method="post">
                            <?php
                                $id = Session::get('userId');
                                $getUserById = $user->getUserById($id);
                                while($result = $getUserById->fetch_assoc()) {
      
                            ?>
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                <div class="col-md-6 form-group p_star">
                                    <label for="first" class="font-bold mb-2">Họ <span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control" id="first" name="firstName" value="<?php echo $result['firstName']?>" >
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <label for="first" class="font-bold mb-2">Tên <span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control" id="last" name="lastName" value="<?php echo $result['lastName']?>" >
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <label for="first" class="font-bold mb-2">Số điện thoại <span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control" id="number" name="phoneNumber" value="<?php echo $result['phoneNumber']?>" >
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <label for="first" class="font-bold mb-2">Địa chỉ email (nếu có)</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Địa chỉ email (nếu có)">
                                </div>
                                
                                <div class="col-md-12 form-group p_star">
                                    <label for="first" class="font-bold mb-2">Địa chỉ nhận hàng: <span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $result['address']?>">
                                </div>
                                
                            <?php } ?>
                            <hr/>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <h5 for="f-option3">Ghi chú</h5>
                                </div>
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Ghi chú về đơn hàng, ví du: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn."></textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" name="submit" class="btn btn-warning">Cập nhật</button>

                                </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Đơn hàng của tôi</h2>
                        
                            <ul class="list">
                                <li><a href="#">Sản phẩm <span>Tổng</span></a></li>
                                <?php
                                $id = Session::get('userId');
                                $cartAll = $cart->getAllCart($id);
                                if($cartAll) {
                                    while($result = $cartAll->fetch_assoc()) {

                                    
                             ?>
                             <li><a href="#"><img width="50px" style="border-radius: 50%;" src="admin/uploads/<?php echo $result['image'] ?>" alt=""><span class="middle">x <?php echo $result['quantity'] ?></span> <span class="last"><?php echo $fm->format_currency($result['price']) ?>.000đ</span></a></li>
                            <?php } } ?>
                            </ul>

                            <ul class="list list_2">
                                    <?php
                                        $id2 = Session::get('userId');
                                        $totalPrice = $cart->getTotalPrice($id2);
                                        while($result = $totalPrice->fetch_assoc()) {
                            
                                            $priceInVND = $result['price'] * 1000;
                                     ?>
                                     <li><a href="#">Tổng tiền sản phẩm <span><?php echo $fm->format_currency($result['price']) ?>.000đ</span></a></li>
                                    
                                
                                <li><a href="#">Phí vận chuyển <span>Miễn phí</span></a></li>
                                <li><a href="#">Tổng <span><?php echo $fm->format_currency($result['price']) ?>.000đ</span></a></li>
                                <?php } ?>

                            </ul>
                            
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" name="selector">
                                    <label for="f-option6">Qua thẻ ngân hàng </label>
                                    <img src="img/product/card.jpg" alt="">
                                    <div class="check"></div>
                                </div>
                                 <form action="congThanhToanvnpay.php" method="POST">
                                    <input type="hidden" name="total_congthanhtoan" value="<?php echo $priceInVND; ?>">
                                    <button class="btn btn-danger" name="redirect" id="redirect">Thanh toán VnPay</button>
                                </form>
                                <!-- <form action="congThanhToanMomo.php" method="POST">
                                    <input type="hidden" name="total_congthanhtoan" value="<?php echo $priceInVND; ?>">
                                    <button class="btn btn-danger" name="redirect" id="redirect">Thanh toán QR Momo</button>
                                </form> -->

                            </div>
                            <div class="creat_account">
                                <input type="checkbox" checked id="f-option4" name="selector">
                                <label for="f-option4">Tôi đã đọc và chấp nhận </label>
                                <a href="#">dịch vụ & điều khoản*</a>
                            </div>
                            <a onclick="return confirm('Bằng việc ấn đồng ý, bạn sẽ chấp nhận điều khoản, dịch vụ, và thanh toán đơn hàng này ?')" class="primary-btn" href="?orderId=order">Thanh toán</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->

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