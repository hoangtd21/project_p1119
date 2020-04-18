<?php
include './DataProvider.php';
include './SanPham.php';
include './SanPhamBusiness.php';
include './ChuDeBusiness.php';
include './ChuDe.php';


$service = new SanPhamBusiness();

//Lấy danh sách trong hệ thống
$maSP = $_GET['ma'];
$sanpham = $service->layChiTietTheoMa($maSP);
?>

<html>
    <head>
        <title>Chi tiết Electronix</title>
        <?php include './layout/ThuVienCSS_JS.php'; ?>
    </head>
    <body>
        <div id="main_container">
            <?php
            include'./layout/Header.php';
            ?>
            <div id="main_content">
                <?php
                include"./layout/Siderbar1.php"
                ?>
                <div class="center_content">
                    <div class="center_title_bar"><?php echo $sanpham->loai?></div>
                    <div class="prod_box_big">
                        <div class="top_prod_box_big"></div>
                        <div class="center_prod_box_big">
                            <div class="product_img_big"> <a href="javascript:popImage('images/big_pic.jpg','Some Title')" title="header=[Zoom] body=[&nbsp;] fade=[on]"><img src="images/<?php echo $sanpham->anhSP?>" height="auto" width="180" alt="" border="0" /></a>
<!--                                <div class="thumbs"> <a href="" title="header=[Thumb1] body=[&nbsp;] fade=[on]"><img src="images/<?php echo $sanpham->anhSP?>" height="30" width="29"alt="" border="0" /></a> <a href="" title="header=[Thumb2] body=[&nbsp;] fade=[on]"><img src="images/thumb1.gif" alt="" border="0" /></a> <a href="" title="header=[Thumb3] body=[&nbsp;] fade=[on]"><img src="images/thumb1.gif" alt="" border="0" /></a> </div>-->
                            </div>
                            <div class="details_big_box">
                                <div class="product_title_big"><?php echo $sanpham->tenSP;?></div>
                                <div class="specifications">Hãng sản xuất: <span class="blue"><?php echo $sanpham->hangSanXuat?> </span><br/>
                                     Tình trạng: <span class="blue">Còn hàng</span><br/>
                                    <span class=""><?php echo $sanpham->moTa;?></span><br />
                                    <span class="blue" text-align="top" ><img src="layout/images/ship.png" height="25" width="25" border="0"/>SẢN PHẨM NHẬN GIAO HÀNG TRONG 1 GIỜ</span><br />             
<!--                                    Garantie: <span class="">24 luni</span><br />-->
                                    <span class="blue"><img src="layout/images/bh.png" height="25" width="25"/>Bảo hàng 12 tháng</span><br />
                                    <span class="blue"><img src="layout/images/1swap1.png" height="25" width="25"/>1 đổi 1 trong 15 ngày</span><br />
                                </div>
                                <div class="prod_price_big"><span class="price"><?php echo $sanpham->gia?><?php echo '$';?></span></div>
                                <a href="" class="addtocart">thêm vào giỏ</a> <a href="" class="compare">so sánh</a> </div>
                        </div>
                        <div class="bottom_prod_box_big"></div>
                        <p><?php echo $sanpham->noiDung?></p>
                    </div>
                </div>
                <?php
                include"./layout/Siderbar2.php"
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