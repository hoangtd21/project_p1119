<?php 
include './DataProvider.php';
include './SanPham.php';
include './SanPhamBusiness.php';

$service = new SanPhamBusiness();

//Lấy danh sách trong hệ thống
$ds = $service->layDanhSach();
  ?>
<html>
    <head>
        <title>Electronic</title>
        <?php include './layout/ThuVienCSS_JS.php'; ?>
    </head>
    <body>
        <div id="main_container">
            <?php
            include'./layout/Header.php';
            ?>
            <div id="main_content">
                <?php
                include"./layout/Siderbar1.php";
                ?>
                <div class="center_content">
                    <div class="center_title_bar">Products</div>
                    <?php
                    $i = 0;
                    foreach ($ds as $sanpham) {
                        ?>             
                    <div class="prod_box">
                        <div class="top_prod_box"></div>
                        <div class="center_prod_box">
                            <div class="product_title"><a href="details.html"><?php echo $sanpham->tenSP;?></a></div>
                            <div class="product_img"><a href="details.html"><img src="images/<?php echo $sanpham->anhSP ?>" height="100" width="auto" alt="" border="0" /></a></div>
                            <div class="prod_price"><span class="price"><?php echo $sanpham->gia;?><?php echo '$';?></span></div>
                        </div>
                        <div class="bottom_prod_box"></div>
                        <div class="prod_details_tab"> <a href="" title="header=[Add to cart] body=[&nbsp;] fade=[on]"><img src="layout/images/cart.gif" alt="" border="0" class="left_bt" /></a> <a href="" title="header=[Specials] body=[&nbsp;] fade=[on]"><img src="layout/images/favs.gif" alt="" border="0" class="left_bt" /></a> <a href="" title="header=[Gifts] body=[&nbsp;] fade=[on]"><img src="layout/images/favorites.gif" alt="" border="0" class="left_bt" /></a> <a href="ChiTiet.php?ma=<?php echo $sanpham->maSP?>" class="prod_details">details</a> </div>
                    </div>
                    <?php  $i++;
                    } ?>
                </div>
                <?php
                include"./layout/Siderbar2.php";
                ?>
            </div>
                <div class="footer">
                    <?php
                    include'./layout/Footer.php';
                    ?>
                </div>
            </div>
    </body>
</html>



