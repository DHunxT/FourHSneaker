
<?php
$item_per_page = $_GET['perpage'];
$cate = $_GET['categoryId'];
if($cate == 0) {
    $count = $category->countAllProduct();
}
else{
    $count = $category->countProduct();
}
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$totalPages = ceil($count / $item_per_page);
?>
<!-- 31/05/2024 -->
<div class="pagination">
    <?php
        if($page == 1) {
     ?>
     <?php } else { ?>
    <a href="?categoryId=<?php echo $_GET['categoryId'] ?>&perpage=<?php echo $item_per_page ?>&page=<?php echo $page - 1 ?>&price=<?php echo $_GET['price']; ?>&gia=<?php echo $_GET['gia'] ?>&mau=<?php echo $_GET['mau'] ?>" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>

    <?php } ?>
    <?php 
    for ($i = 1; $i <= $totalPages; $i++) {
        if($i == $page) {
        ?>
        <a class="active" href="?categoryId=<?php echo $_GET['categoryId'] ?>&perpage=<?php echo $item_per_page ?>&page=<?php echo $i; ?>&price=<?php echo $_GET['price']; ?>&gia=<?php echo $_GET['gia'] ?>&mau=<?php echo $_GET['mau'] ?>" class=""><?php echo $i; ?></a>
        <?php
    } else {?>
        <a class="" href="?categoryId=<?php echo $_GET['categoryId'] ?>&perpage=<?php echo $item_per_page ?>&page=<?php echo $i; ?>&price=<?php echo $_GET['price']; ?>&gia=<?php echo $_GET['gia'] ?>&mau=<?php echo $_GET['mau'] ?>" class=""><?php echo $i; ?></a>
    <?php }} ?>
    <?php
        if($page == $totalPages) {
     ?>
       
    <?php } else { ?>
        <a href="?categoryId=<?php echo $_GET['categoryId'] ?>&perpage=<?php echo $item_per_page ?>&page=<?php echo $page + 1 ?>&price=<?php echo $_GET['price']; ?>&gia=<?php echo $_GET['gia'] ?>&mau=<?php echo $_GET['mau'] ?>" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
        <?php } ?>
</div>