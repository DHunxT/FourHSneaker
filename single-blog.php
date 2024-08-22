<?php include 'inc/head.php' ?>
<?php
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $blogDetail = $category->getBlogById($id);
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
                    <h1>Chi tiết bài viết</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="blog.php">Blog</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section_gap">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-8 posts-list">
                    
                    
                    <div class="single-post row">
                    <?php
                        $blogAll = $category->selectAllBlog();
                        if($blogAll) {
                            while($result = $blogDetail->fetch_assoc()) {
                    
                    ?>
                        <div class="col-lg-12">
                            <div class="feature-img">
                                <img class="img-fluid" src="admin/uploads/<?php echo $result['image_title'] ?>" alt="">
                            </div>
                        </div>
                        <div class="col-lg-3  col-md-3">
                            <div class="blog_info text-right">
                                <div class="post_tag">
                                    <a href="#">Food,</a>
                                    <a class="active" href="#">Technology,</a>
                                    <a href="#">Politics,</a>
                                    <a href="#">Lifestyle</a>
                                </div>
                                <ul class="blog_meta list">
                                        <li><a href="#">Hung Le<i class="lnr lnr-user"></i></a></li>
                                        <li><a href="#">31/05/2024<i class="lnr lnr-calendar-full"></i></a></li>
                                        <li><a href="#">1.2M lượt xem<i class="lnr lnr-eye"></i></a></li>
                                        <li><a href="#">06 bình luận<i class="lnr lnr-bubble"></i></a></li>
                                </ul>
                                <ul class="social-links">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-github"></i></a></li>
                                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 blog_details">
                            <h2><?php echo $result['title'] ?></h2>
                            <p class="excert">
                                <?php echo $result['short_des'] ?>
                            </p>
                            
                        </div>
                        <div class="col-lg-12">
                            
                            <div class="row">
                                <div class="col-12">
                                    <img class="img-fluid" src="https://tyhisneaker.com/wp-content/uploads/2023/03/phoi-do-voi-nike-am-duong-1536x2048.webp" alt="">
                                </div>
                                
                                <div class="col-lg-12 mt-25">
                                    <p>
                                        <?php echo $result['long_des'] ?>
                                    </p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }} ?>
                    
                    
                    <div class="comment-form">
                        <h4>Leave a Reply</h4>
                        <form>
                            <div class="form-group form-inline">
                                <div class="form-group col-lg-6 col-md-6 name">
                                    <input type="text" class="form-control" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter Name'">
                                </div>
                                <div class="form-group col-lg-6 col-md-6 email">
                                    <input type="email" class="form-control" id="email" placeholder="Enter email address"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" placeholder="Subject" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Subject'">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                            </div>
                            <a href="#" class="primary-btn submit_btn">Post Comment</a>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <
                        <aside class="single_sidebar_widget author_widget">
                            <img class="author_img rounded-circle" src="img/blog/author.png" alt="">
                            <h4>Hưng Lê</h4>
                            <p>Senior blog writer</p>
                            <div class="social_icon">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-github"></i></a>
                                <a href="#"><i class="fa fa-behance"></i></a>
                            </div>
                            <p>Chào mừng bạn đến với HHHSneaker – điểm đến lý tưởng cho những người yêu thời trang và giày dép. Với sứ mệnh đem lại sự tự tin và phong cách cho mỗi bước đi, chúng tôi tự hào là địa chỉ hàng đầu cho những ai đang tìm kiếm những đôi giày replica chất lượng và đẳng cấp..</p>
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Bài viết nổi bật</h3>
                            <?php
                                $blogAll = $category->selectAllBlog();
                                if($blogAll) {
                                    while($result = $blogAll->fetch_assoc()) {
                    
                            ?>
                            <div class="media post_item">
                                <img style="width:100px; height:50px;" src="admin/uploads/<?php echo $result['image_title'] ?>" alt="post">
                                <div class="media-body">
                                    <a href="single-blog.php">
                                        <h3><?php echo $result['title'] ?></h3>
                                    </a>
                                </div>
                            </div>
                            <?php }} ?>
                            <div class="br"></div>
                        </aside>
                        
                        <aside class="single-sidebar-widget newsletter_widget">
                            <h4 class="widget_title">Bản tin</h4>
                            <p>
                            Bên cách đó, Shop Giày Replica Tyhisneaker liên tục có những chương trình Flash Sale lớn hằng năm như các ngày lễ tết: Tết Dương Lịch 1/1, Tết Nguyên Đán, Valentine 14/2, Quốc tế Phụ nữ 8/3, Phụ Nữ Việt Nam 20-10, Ngày Nhà Giáo 20/11, Giáng Sinh… Không chỉ vậy, trong các tháng luôn diễn ra các sự kiện giảm giá “đỉnh cao” khác vào các ngày như: Sale 4.4, Sale 5.5, Sale 6.6, Sale 7.7, Sale 8.8, Sale 9.9, Sale 10.10, Sale 11.11, Sale 12.12. Đây là thời điểm để người mua hàng có thể nhanh tay chọn ngay cho mình những mặt hàng ưa thích với mức giá giảm kỷ lục. Ngoài ra, bạn còn có thể thỏa thích săn sale vào các ngày trong tháng như Sale đồng giá giữa tháng và Sale cuối tháng.
                            </p>
                            <div class="form-group d-flex flex-row">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
                                </div>
                                <a href="register.php" class="bbtns">Đăngký</a>
                            </div>
                            <p class="text-bottom">Bạn cũng có thể hủy đăng ký bất cứ lúc nào</p>
                            <div class="br"></div>
                        </aside>
                        <aside class="single-sidebar-widget tag_cloud_widget">
                            <h4 class="widget_title">Thẻ</h4>
                            <ul class="list">
                                <li><a href="#">Technology</a></li>
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Architecture</a></li>
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Food</a></li>
                                <li><a href="#">Technology</a></li>
                                <li><a href="#">Lifestyle</a></li>
                                <li><a href="#">Art</a></li>
                                <li><a href="#">Adventure</a></li>
                                <li><a href="#">Food</a></li>
                                <li><a href="#">Lifestyle</a></li>
                                <li><a href="#">Adventure</a></li>
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

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