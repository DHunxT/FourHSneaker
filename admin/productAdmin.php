<?php 
    include '../lib/session.php';
    Session::checkSession();
    include '../classes/adminCategory.php'
?>
<?php
  $category = new adminCategory();
   if(isset($_GET['deletedId'])) {
        $id = $_GET['deletedId'];
        $deletedCategory = $category->deleteProductById($id);
   }
 ?>
 <?php
    if(isset($_POST['search'])) {
        $key = $_POST['key'];
        $searchKey = $category->searchProduct($key);
    }
 ?>
 <?php
       $limit = 5;
       $page = isset($_GET['page']) ? $_GET['page'] : 1;
       $start = ($page - 1) * $limit;
       $countProduct = $category->countProductPagination();
       $countProductPagination = $countProduct->fetch_assoc();
       $total_records = $countProductPagination['total'];
       $total_pages = ceil($total_records / $limit);
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quản lý sản phẩm</title>

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
                    <span>Danh mục</span>
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

           

           

            <!-- Divider -->
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
    <form method="post" action=""
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" name="key" class="form-control bg-light border-0 small" placeholder="Theo tên sản phẩm..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit" name="search">
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
                <form  class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small"
                            placeholder="Theo tên sản phẩm...." aria-label="Search"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" name="">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
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
<!-- Table -->
</nav>
    <div class="p-3">
        <h3 class="text-center font-bold">Quản lý sản phẩm</h3>
        <div>
        
            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                
                <tbody>
                <?php
                    
                    $productList = $category->paginationProduct($start, $limit);
                    if($searchKey) {
                        while($result = $searchKey->fetch_assoc()) {
                        
                    ?>
                        <tr>
                            <th scope="row"><?php echo $result['product_id'] ?></th>
                            <td><?php echo $result['product_name'] ?></td>
                            <td>
                                <img style="width: 50px; border-radius: 50%;" src="uploads/<?php echo $result['image'] ?>" alt="">
                            </td>
                            <td><?php echo $result['quanity'] ?></td>
                            <td><?php echo $result['price']?>,000</td>
                            <td><?php echo $result['category_name'] ?></td>
                            <td>
                                <button class="btn btn-info">
                                    <a href="productEdit.php?productId=<?php echo $result['product_id'] ?>" class="text-white text-decoration-none" href="">Sửa</a>
                                </button>
                                <button class="btn btn-danger">
                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này ?')" href="?deletedId=<?php echo $result['product_id'] ?>" class="text-white text-decoration-none" href="">Xóa</a>
                                </button>
                            </td>
                        </tr>
                    <?php }} else 
                    // if($productList) {
                        while($result = $productList->fetch_assoc()) {
                            $getCategory = $category->getCategoryById($result['category_id']);

                    ?>
                    <tr>
                        <th scope="row"><?php echo $result['product_id'] ?></th>
                        <td><?php echo $result['product_name'] ?></td>
                        <td>
                            <img style="width: 50px; border-radius: 50%;" src="uploads/<?php echo $result['image'] ?>" alt="">
                        </td>
                        <td><?php echo $result['quanity'] ?></td>
                        <td><?php echo $result['price']?>,000</td>
                        <td><?php echo $result['category_name'] ?></td>
                        <td>
                            <button class="btn btn-info">
                                <a href="productEdit.php?productId=<?php echo $result['product_id'] ?>" class="text-white text-decoration-none" href="">Sửa</a>
                            </button>
                            <button class="btn btn-danger">
                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này ?')" href="?deletedId=<?php echo $result['product_id'] ?>" class="text-white text-decoration-none" href="">Xóa</a>
                            </button>
                        </td>
                    </tr>
                    <?php
                        }
                     ?>
                    
                </tbody>
            </table>
            
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <?php
                        if($page == 1) {
                            
                     ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="productAdmin.php?page=<?php echo $page - 1 ?>" tabindex="-1">Trước</a>
                        </li>
                    <?php } else { ?>
                        <li class="page-item">
                            <a class="page-link" href="productAdmin.php?page=<?php echo $page - 1 ?>" tabindex="-1">Trước</a>
                        </li>
                    <?php } ?>
                    <?php
                        for ($i=1; $i<=$total_pages; $i++) {
                            if($i == $page) {
                     ?>
                        <li class="page-item active"><a class="page-link" href="productAdmin.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                     <?php } else {?>
                        <li class="page-item"><a class="page-link" href="productAdmin.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                    <?php } ?>
                    <?php } ?>
                    <?php
                        if($page == $total_pages) {
                     ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Sau</a>
                        </li>
                     <?php } else { ?>
                        <li class="page-item">
                            <a class="page-link" href="productAdmin.php?page=<?php echo $page + 1 ?>">Sau</a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
         

        </div>
       
        
        
    </div>

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