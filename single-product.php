<?php include 'inc/head.php' ?>
<?php
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
		$quantity = $_POST['quantity'];
		$size = $_POST['size'];
		$id = $_POST['id'];
		$username = $_POST['userId'];
		$addToCart = $cart->addToCart($id, $size, $quantity, $username);
	}
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkout'])) {
		$quantity = $_POST['quantity'];
		$size = $_POST['size'];
		$id = $_POST['id'];
		$userId = $_POST['userId'];
		$insertOrder = $cart->addToCart($id, $size, $quantity, $userId);
	}
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send'])) {
		$ratingStars = $_POST['ratingStars'];
		$message = $_POST['message'];
		$userId = $_POST['userId'];
		$productId = $_POST['productId'];
		$insertComment = $comment->addComment($ratingStars, $message, $productId, $userId);
	}
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['xoa'])) {
		$ratingStars = $_POST['ratingStars'];
		$message = $_POST['message'];
		$userId = $_POST['userId'];
		$productId = $_POST['productId'];

		$ratingStars = "";
		$message = "";
		
	}
	if(isset($_GET['deleteComment'])) {
		$deleteComment = $_GET['deleteComment'];
		$id = $_GET['productId'];
		$deleteComment = $comment->deleteComment($deleteComment, $id);
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
					<h1>Chi tiết sản phẩm</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.php">Cửa hàng<span class="lnr lnr-arrow-right"></span></a>
						<a href="single-product.php">Chi tiết sản phẩm</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Single Product Area =================-->
	<div class="product_image_area">
			<?php
					 	$id = $_GET['productId'];
						 $getProductById = $category->getProductById($id);
						 if($getProductById) {
							while($result = $getProductById->fetch_assoc()) {
					   
					 
			 ?>
		<div class="container">
			<div class="row s_product_inner">
			
				<div class="col-lg-6">
					<div class="s_Product_carousel">
						<div class="single-prd-item">
							<img class="img-fluid" src="admin/uploads/<?php echo $result['image'] ?>" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="admin/uploads/<?php echo $result['image'] ?>" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="admin/uploads/<?php echo $result['image'] ?>" alt="">
						</div>
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					
					<div class="s_product_text">
						<h3><?php echo $result['product_name'] ?></h3>
						<h2><?php echo $fm->format_currency($result['discounted_price']) ?>.000đ</h2>
						<h6>Tình trạng: <span class="text-success">Còn hàng</span></h6>
						<h6>Đã bán: <span class="text-success"><?php echo $result['price']-$result['discounted_price'] ?></span></h6>
						
						<h6 class="mt-4">Mô tả:</h6>
						<p><?php echo $result['description'] ?></p>

						<ul>
							<h6>Ưu đãi</h6>
							<li><span><i class="lnr lnr lnr-diamond"></i></span> : Freeship khi mua 2 đôi</li>
							<li><span><i class="lnr lnr lnr-diamond"></i></span> : Tặng tất theo sản phẩm(Tùy đôi)</li>
							<li><span><i class="lnr lnr lnr-diamond"></i></span> : Mua 5 đôi tặng 1 đôi</li>
						</ul>
						<div class="card_area d-flex align-items-center mt-3">
							<form class="row login_form" action="" method="post" id="contactForm">
								<div class="col-md-6 form-group">
									<h6 class="mt-2">Size</h6>
									<input type="hidden" name="userId" value="<?php echo Session::get('userId') ?>">
									<input type="hidden" name="id" value="<?php echo $id ?>"/>
									<select class="form-control" id="size" name="size">
										<option value="36">36</option>
										<option value="37">37</option>
										<option value="38">38</option>
										<option value="39">39</option>
										<option value="40">40</option>	
										<option value="41">41</option>	
										<option value="42">42</option>	
										<option value="43">43</option>	
									</select>
								</div>
								<div class="col-md-6 form-group">
									<h6 class="mt-2">Số lượng:</h6>
									<input type="number" class="form-control" id="quantity" name="quantity" placeholder="Số lượng" value="1"/>
								</div>
								<div class="col-md-12 form-group">
									<button type="submit" name="submit" class="primary-btn">Thêm vào giỏ</button>
								</div>
								<div class="col-md-12 form-group">
									<button type="submit" name="checkout" class="primary-btn">Đặt hàng ngay</button>
								</div>
							</form>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
							}}
					   
					 
			 ?>
	</div>
	<div class="container">
		<h3 class="mt-5 mb-2">Cách chọn size giày</h3>
		<img src="https://tyhisneaker.com/wp-content/uploads/2022/08/bang-size-giay-cach-quy-doi-size-giay-quoc-te-va-viet-nam-2022-11082022164620-1.jpg" alt="">
		<h6 class="mt-4">
		<span  class="text-danger">Lưu ý</span>: Shop có các mẫu Sneaker Bigsize từ 44 - 45 -46 - 47 - 48 - 49 cho anh em chân to giá chênh lệch 30 - 50k so với size chuẩn. Vui lòng nhắn tin Fanpage hoặc Zalo để check size. Xin cảm ơn.
						</h6>
	</div>
	<div class="container">
		<h3 class="mt-5 mb-2 uppercase">Những lý do bạn nên mua giày sneaker tại Karma Sneaker</h3>
		<ul>
			<li class="mt-2">- Giày chuẩn hàng Trung bản chuẩn nhất, cao cấp nhất thị trường.</li>
			<li class="mt-2">- Kiểm tra hàng mới thanh toán, đổi trả size nhanh chóng.</li>
			<li class="mt-2">- Mẫu giày Trends, đẹp, đủ mẫu, đủ size.</li>
			<li class="mt-2">- Ship COD toàn quốc nhanh chóng.</li>
			<li class="mt-2">- Bảo hành lên đến 6 tháng.</li>
			<li class="mt-2">- Freeship cho đơn 2 đôi hoặc đơn thứ 2; Mua 5 đôi tặng 1 đôi.</li>
		</ul>
	</div>
	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->
	<section class="product_description_area">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Mô tả</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
					 aria-selected="false">Thông số</a>
				</li>
				
				<li class="nav-item">
					<a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
					 aria-selected="false">Khách hàng</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
					<p>Giày Nike Wmns Air Jordan 1 Low ‘Panda’ DC0774-100 Rep 1:1 với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.

					Và nếu bạn cũng là một người đam mê dòng sneaker dễ mang, dễ phố đồ thì không nên bỏ qua mẫu giày siêu phẩm này đâu nhé! Dưới đây là một số hình ảnh của đôi Giày Nike Air Jordan 1 Low Panda Trắng đen Rep 1:1 , tại TyHi Sneaker (hàng chuẩn 1:1, bản xịn nhất thị trường).</p>
					<p>Suốt chặng đường làm nên tên tuổi huyền thoại của mình trong làng sneakers, những mẫu Air Jordan chưa từng khiến những người yêu mến phải thất vọng. Hãng Nike luôn biết cách chiều lòng mọi bạn trẻ mê giày với thiết kế tinh tế, có chút đáng yêu và dễ dàng phối đồ hơn bao giờ hết.</p>
					<p>Phải kể đến giày nike wmns jordan 1 low ‘panda’ dc0774-100 là một trong những đôi giày mới nhất của Nike đã khiến mọi sneakerheads phải trầm trồ, muốn sở hữu bằng được, khiến cho những đôi giày này đã nhanh chóng out-stock trên các kệ hàng trên toàn thế giới.</p>
				</div>
				<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<div class="table-responsive">
						<table class="table">
							<tbody>
								<tr>
									<td>
										<h5>Chiều rộng</h5>
									</td>
									<td>
										<h5>128mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Chiều cao</h5>
									</td>
									<td>
										<h5>508mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Chiều sâu</h5>
									</td>
									<td>
										<h5>85mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Khối lượng</h5>
									</td>
									<td>
										<h5>52gm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Được kiểm hàng</h5>
									</td>
									<td>
										<h5>Được</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Thời gian trả hàng</h5>
									</td>
									<td>
										<h5>03 ngày</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Loại hàng</h5>
									</td>
									<td>
										<h5>Rep 1:1</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Quà tặng</h5>
									</td>
									<td>
										<h5>Full box + tax + bill, Tặng tất</h5>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!-- Reviews -->
				<!-- <div class="container">
				
					<div class="mt-5 mb-5" ><h3 class="review__title">Bình luận và đánh giá </h3> </div>
						<div class="card">
							<div class="card-header">Sản Phẩm Mẫu</div>
							<div class="card-body">
								<div class="row">
									<div class="col-sm-4 text-center tpl-rating">
										<h1 class="text-warning mt-4 mb-4">
											<b><span id="average_rating">0.0</span> / 5</b>
										</h1>
										<div class="mb-3">
											<i class="fa fa-star star-light mr-1 main_star"></i>
											<i class="fa fa-star star-light mr-1 main_star"></i>
											<i class="fa fa-star star-light mr-1 main_star"></i>
											<i class="fa fa-star star-light mr-1 main_star"></i>
											<i class="fa fa-star star-light mr-1 main_star"></i>
										</div>
										<h3><span id="total_review">0</span> Review</h3>
									</div>
									<div class="col-sm-4">
										<p>
											<div class="progress-label-left"><b>5</b> <i class="fa fa-star text-warning"></i></div>
			
											<div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
											<div class="progress">
												<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
											</div>
										</p>
										<p>
											<div class="progress-label-left"><b>4</b> <i class="fa fa-star text-warning"></i></div>
											
											<div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
											<div class="progress">
												<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
											</div>               
										</p>
										<p>
											<div class="progress-label-left"><b>3</b> <i class="fa fa-star text-warning"></i></div>
											
											<div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
											<div class="progress">
												<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
											</div>               
										</p>
										<p>
											<div class="progress-label-left"><b>2</b> <i class="fa fa-star text-warning"></i></div>
											
											<div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
											<div class="progress">
												<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
											</div>               
										</p>
										<p>
											<div class="progress-label-left"><b>1</b> <i class="fa fa-star text-warning"></i></div>
											
											<div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
											<div class="progress">
												<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
											</div>               
										</p>
									</div>
									<div class="col-sm-4 text-center">
										<h3 class="mt-4 mb-3">Đánh giá sản phẩm</h3>
										<button type="button" name="add_review" id="add_review" class="btn btn-primary">Reviews</button>
									</div>
								</div>
							</div>
						</div>
					<div class="mt-5" id="review_content"></div>
				</div> -->
			<!-- Reviews -->
			<!-- Modal reviews -->
			<!-- <div id="review_modal" class="modal" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Gửi Đánh Giá</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body" >
							<h4 class="text-center mt-2 mb-4" >
								<i class="fa fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
								<i class="fa fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
								<i class="fa fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
								<i class="fa fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
								<i class="fa fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
							</h4>
							<div class="form-group">
								<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Nhập tên..." />
							</div>
							<div class="form-group">
								<textarea name="user_review" id="user_review" class="form-control" placeholder="Viết đánh giá..."></textarea>
							</div>
							<div class="form-group text-center mt-4">
								<button type="button" class="btn btn-primary" id="save_review">Gửi</button>
							</div>
						</div>
					</div>
				</div>
			</div> -->
			<!-- End modal reviews -->
			<!-- Review original -->
				
				<div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
					<div class="row">
						<div class="col-lg-6">
							<!-- <div class="row total_rate">
								<div class="col-6">
									
								</div>
								<div class="col-6">
									<div class="rating_list">
										<h3>Based on 3 Reviews</h3>
										<ul class="list">
											<li><a href="#">5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
													 class="fa fa-star"></i><i class="fa fa-star"></i> </a></li>
											<li><a href="#">4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i
													 class="fa fa-star"></i><i class="fa fa-star"></i> </a></li>
											<li><a href="#">3 Star <i class="fa fa-star"></i><i
													 class="fa fa-star"></i><i class="fa fa-star"></i> </a></li>
											<li><a href="#">2 Star <i
													 class="fa fa-star"></i><i class="fa fa-star"></i> </a></li>
											<li><a href="#">1 Star <i class="fa fa-star"></i> </a></li>
										</ul>
									</div>
								</div>
							</div> -->
							<div class="review_list">
								<?php
								 	$getTotalReview = $comment->getAllReviews($id);
									if($getTotalReview) {
										while($result = $getTotalReview->fetch_assoc()) {

										
								 ?>
								<div class="review_item">
									<div class="media">
										<div class="d-flex">
											<img style="width: 50px; border-radius: 50%;" src="admin/uploads/cd9a5e77cd.jpg" alt="">
										</div>
										<div class="media-body">
											<h4><?php echo $result['username'] ?></h4>
											<p><?php echo $result['created_at'] ?></p>
											<?php 
												// echo $result['ratingStars'];
												if( $result['ratingStars'] == 5) {
											 ?>
												<div class="rating_list">
													<ul class="list">
														<li><a href="#"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
																class="fa fa-star"></i><i class="fa fa-star"></i> </a></li>
											
													</ul>
												</div>
											<?php } else if( $result['ratingStars'] == 4) { ?>
												<div class="rating_list">
													<ul class="list">
														<li><a href="#"><i class="fa fa-star"></i><i
																class="fa fa-star"></i><i class="fa fa-star"></i> </a></li>
											
													</ul>
												</div>
											<?php } else if( $result['ratingStars'] == 3) { ?>
												<div class="rating_list">
													<ul class="list">
														<li><a href="#"><i class="fa fa-star"></i><i
																class="fa fa-star"></i></a></li>
											
													</ul>
												</div>
											<?php }  if( $result['ratingStars'] == 2) { ?>
												<div class="rating_list">
													<ul class="list">
														<li><a href><i
																class="fa fa-star"></i></a></li>
											
													</ul>
												</div>
											<?php } else { ?>
												<div class="rating_list">
													<ul class="list">
														<li><a href></a></li>
											
													</ul>
												</div>
											<?php } ?>
										</div>
									</div>
									<p><?php echo $result['message'] ?></p>
										<div class="col-md-12 text-right">
											<button type="" value="submit" name="" class="btn btn-warning"><a class="text-white" href="single-product.php?deleteComment=<?php echo $result['review_id']?>&productId=<?php echo $id ?>">Xóa</a></button>
										</div>
								

								</div>
								<?php }} ?>
							</div>
						</div>
						<!-- Comments -->
						<div class="col-lg-6">
							<div class="review_box">
								<h4>Viết bình luận: </h4>
								<?php
								 	$userId = Session::get('userId');
									if($insertComment) {
										echo $insertComment;
									}
								 ?>
								<form class="row contact_form" action="" method="post" id="contactForm" novalidate="novalidate">
									<input type="hidden" name="userId" value="<?php echo $userId ?>">
									<input type="hidden" name="productId" value="<?php echo $id ?>">
									<div class="col-md-12">
										<select name="ratingStars" id="">
											<option value="5">5 Sao</option>
											<option value="4">4 Sao</option>
											<option value="3">3 Sao</option>
											<option value="2">2 Sao</option>
											<option value="1">1 Sao</option>
										</select>
										
									</div>
										<div class="col-md-12 mt-2">
											<div class="form-group">
												<textarea class="form-control" name="message" id="message" rows="1" placeholder="Bình luận"></textarea>
											</div>
										</div>
										<div class="col-md-12 text-right">
											<button type="submit" value="submit" name="send" class="primary-btn">Gửi</button>
											<button type="submit" name="xoa" class="primary-btn">Nhập lại</button>
										</div>
										</form>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Product Description Area =================-->

	<!-- Start related-product Area -->
	<section class="related-product-area ">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>CÓ THỂ BẠN CŨNG TÌM KIẾM</h1>
						
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
										<h6><?php echo $result["discounted_price"] ?>.000</h6>
										<h6 class="l-through"><?php echo $result["price"] ?>.000</h6>
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
	<section class="features-area section_gap_bottom">
		
		<div class="container">
				<div class="section-title text-center">
						<h1>HHH Sneaker</h1>
						
					</div>
			<div class="row features-inner">
				
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon1.png" alt="">
						</div>
						<h6>Hoàn tiền
						100%
						nếu không đúng hàng</h6>
						<p>Ưu đãi giảm giá cho lần mua đầu tiên</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon2.png" alt="">
						</div>
						<h6>Nhận hàng
Kiểm tra hàng
Thoải mái</h6>
						<p>Hoàn trả cho đơn hàng lỗi</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon3.png" alt="">
						</div>
						<h6>Đổi trả trong
						3 ngày
						nếu sản phẩm lỗi</h6>
						<p>Cổng thông tin hỗ trợ 24/7</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon4.png" alt="">
						</div>
						<h6>Hotline đặt hàng
						0932.433.160
						(Zalo, 7h30 – 21h cả T7, CN)</h6>
						<p>Đảm bảo thông tin bảo mật</p>
					</div>
				</div>
			</div>
		</div>
	</section>							
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