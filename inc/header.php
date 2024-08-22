
<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.php"><img src="img/logo.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="index.php">Trang chủ</a></li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Cửa hàng</a>
								<ul class="dropdown-menu">
									<!-- <li class="nav-item"><a class="nav-link" href="category.php?categoryId=0&perpage=8&page=1">Danh mục</a></li> -->
									<li class="nav-item"><a class="nav-link" href="cart.php">Giỏ hàng</a></li>
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Bài viết</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="blog.php">Bài viết</a></li>
									<li class="nav-item"><a class="nav-link" href="single-blog.php">Chi tiết bài viết</a></li>
								</ul>
							</li>
							
							<!-- <li class="nav-item"><a class="nav-link" href="contact.php">Liên hệ</a></li> -->
							<li class="nav-item"><a class="nav-link" href="cart.php">Giỏ hàng</a></li>
							
							<li class="nav-item submenu dropdown">
								<?php 
									if(Session::get('userUsername')) {

									
								?>
									
									<li class="nav-item"><a class="nav-link" href="login.php">
										<?php
											if(isset($_GET['action']) && $_GET['action'] == 'logout') {
												Session::destroy();
											}
										?>
										
										<li class="nav-item submenu dropdown">
											<a href="admin/index.php" class="nav-link dropdown-toggle"  role="button" aria-haspopup="true"
											aria-expanded="false"><span><img class="mr-1" width="25px" style="border-radius: 50%;" src="admin/uploads/cd9a5e77cd.jpg" alt=""></span><?php echo Session::get('userUsername') ?></a>
											<ul class="dropdown-menu">
												<li class="nav-item"><a class="nav-link" href="admin/index.php">Trang quản lý</a></li>
												<li class="nav-item"><a class="nav-link" href="informationManage.php">Thông tin</a></li>
												<li class="nav-item"><a class="nav-link" href="myPurchase.php">Đơn hàng của tôi</a></li>
												
												<li class="nav-item"><a class="nav-link" href="?action=logout">Đăng xuất</a></li>
											</ul>
							</li>
										
								<?php } else {?>
								<li class="nav-item"><a class="nav-link" href="login.php">Đăng nhập</a></li>
								<?php }?>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="cart.php" class="cart"><span class="ti-bag"></span><span>(
								<?php
									if(Session::get("count")) {
										echo Session::get("count");
									}
									else {
										echo "Empty";
									}
								?>
								
								)</span></a></li>
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<!-- <div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div> -->
	</header>