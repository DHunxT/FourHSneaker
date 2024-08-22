<?php 
    include '../lib/session.php';
?>
<?php  include '../classes/adminCategory.php' ?>
<?php
  $category = new adminCategory();
//   if(!isset($_GET['productId']) || $_GET['productId'] == NULL) {
//     echo "<script>window.location='productAdmin.php'</script>";
//   }
//   else {
    $id = $_GET['productId'];
    echo $id;
//   }
   if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    echo "idsubmit: ". $id;
        $updateProduct = $category->update_product($_POST, $_FILES, $id);
   }
   if(isset($_POST['xoa'])) {
        $productName = $_POST['productName'];
        $categoryId = $_POST['category'];
        $productPrice = $_POST['productPrice'];
        $quantity = $_POST['quanity'];

        $productName = "";
        $categoryId = "";
        $productPrice = "";
   }
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sửa sản phẩm</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Trang quản trị</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Trang chủ</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Quản lý
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Quản lý</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="categoryAdd.php">Thêm danh mục</a>
                        <a class="collapse-item" href="categoryAdmin.php">Quản lý danh mục</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Sản phẩm</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="productAdd.php">Thêm sản phẩm</a>
                        <a class="collapse-item" href="productAdmin.php">Quản lý sản phẩm</a>
                    </div>
                </div>
            </li>

           

            <hr class="sidebar-divider">
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="orderAdmin.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Đơn hàng</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="blogAdmin.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Bài viết</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="blogAddAdmin.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Thêm bài viết</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="userAdmin.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Quản lý TK người dùng</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="reviewAdmin.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Quản lý đánh giá</span></a>
            </li>
            

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper">
        <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

    <!-- Topbar Search -->
    <form
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small"
                            placeholder="Search for..." aria-label="Search"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 12, 2019</div>
                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-success">
                            <i class="fas fa-donate text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 7, 2019</div>
                        $290.29 has been deposited into your account!
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-warning">
                            <i class="fas fa-exclamation-triangle text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 2, 2019</div>
                        Spending Alert: We've noticed unusually high spending for your account.
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
            </div>
        </li>

        <!-- Nav Item - Messages -->


        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo Session::get('adminUsername') ?></span>
                <img class="img-profile rounded-circle"
                    src="img/undraw_profile.svg">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="http://localhost:120/TH/TH/Frontend/index.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Trang sản phẩm
                                </a>
            </div>
        </li>

    </ul>

</nav>
    <div class="p-3">
        <h3 class="text-center font-bold">Sửa sản phẩm</h3>

        <div class="container">
            <?php
                $getProductById = $category->getProductById($id);
                if($getProductById) {
                    while($resultProduct = $getProductById->fetch_assoc()) {
               
             ?>
            <form action="productEdit.php" method="POST" enctype="multipart/form-data">
                <?php
                    if(isset($updateProduct)) {
                        echo $updateProduct;
                    }
                 ?>
                    <input type="hidden" name="id" value="<?php echo $id ?>">

                <div class="form-group">
                    <label for="productName">Tên sản phẩm<span class="text-danger">*</span></label>
                 
                    <input type="text" class="form-control" id="productName" name="productName" value="<?php echo $resultProduct['product_name'] ?>" placeholder="Nhập tên sản phẩm...">
                </div>
                <div class="form-group">
                    
                    <label for="categoryAll">Danh mục<span class="text-danger">*</span></label>
                    <select name="category" id="">
                        <!-- get all category -->
                        <?php
                            $categoryList = $category->selectAllCategory();
                            while($result = $categoryList->fetch_assoc()) {
  
                        ?>
                            <option 
                            <?php if($result['category_id'] == $resultProduct['category_id']) echo 'selected' ?>
                            value="<?php echo $result['category_id'] ?>"><?php echo $result['category_name'] ?></option>
                        <?php
                        }
                     ?>
                    </select>
                    
                </div>
                <!-- Image -->
                <div class="form-group">
                    <label for="productImage">Hình ảnh<span class="text-danger">*</span></label>
                    <img style="width: 120px" src="uploads/<?php echo $resultProduct['image'] ?>" alt="">
                 
                    <input type="file" class="form-control" id="image" name="image" placeholder="Nhập tên sản phẩm...">
                </div>
                <div class="form-group">
                    <label for="quantity">Số lượng<span class="text-danger">*</span></label>
                 
                    <input type="text" class="form-control" id="quanity" name="quanity"  value="<?php echo $resultProduct['quanity'] ?>" placeholder="Nhập số lượng...">
                </div>
                <!-- Price -->
                <div class="form-group">
                    <label for="productPrice">Giá tiền<span class="text-danger">*</span></label>
                 
                    <input type="text" class="form-control" id="productPrice"  value="<?php echo $resultProduct['price'] ?>" name="productPrice" placeholder="Nhập giá sản phẩm...">
                </div>
                <!-- Button -->
                <button type="submit" name="submit" class="btn btn-primary">Cập nhật</button>
                <button type="submit" name="xoa" class="btn btn-warning">Nhập lại</button>
                <button type="reset" class="btn btn-success"><a href="productAdmin.php" class="text-decoration-none text-white">Quản lý sản phẩm</a></button>
            </form>
            <?php }} ?>
        </div>
       
        
        
    </div>
    
<!-- End of Topbar -->


        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

  

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>