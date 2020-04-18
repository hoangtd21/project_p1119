<?php
include './DataProvider.php';
include './SanPham.php';
include './SanPhamBusiness.php';
include './ChuDeBusiness.php';
include './ChuDe.php';
$tenSP = "";
$moTa = "";
$hangSanXuat = "";
$gia = 0;
$ngayTao = "";
$anhSP = "";
$maSP = 0;
$loai="";
$ngayCapNhap="";
$maChuDe = "";$noiDung="";

//Khai báo dối tượng chủ đề bus
$chuDeBus = new ChuDeBusiness();
//Lấy ds chủ đề
$dsChuDe = $chuDeBus->layDanhChuDe();

if (isset($_GET['ma'])) {
    $maSP = intval($_GET['ma']);
    $service = new SanPhamBusiness();
    $objSanPham = $service->layChiTietTheoMa($maSP);
    if ($objSanPham != null) {
        $tenSP = $objSanPham->tenSP;
        $moTa = $objSanPham->moTa;
        $anhSP = $objSanPham->anhSP;
        $hangSanXuat = $objSanPham->hangSanXuat;
        $loai = $objSanPham->loai;
        $ngayTao = $objSanPham->ngayTao;
        $ngayCapNhap = $objSanPham->ngayCapNhap;
        $gia = $objSanPham->gia;
        $maChuDe = $objSanPham->chuDeId;
        $noiDung = $objSanPham->noiDung;
    }
}
if (isset($_REQUEST['btnCapNhap'])) {
    //Lấy thông tin từ giao diện
    $maSP = intval($_POST['txtMaSP']);
    $tenSP = $_POST['txtTenSP'];
    $anhSP = $_POST['hAnhSP'];
    $moTa = $_POST['txtMoTa'];
    $hangSanXuat = $_POST['txtHangSanXuat'];
    $loai = $_POST['txtLoai'];
    $gia = $_POST['txtGia'];
    $ngayTao=$_POST['txtNgayTao'];
    $ngayCapNhap = $_POST['txtNgayCapNhap'];
    $maChuDe = $_POST['cboChuDe'];
    $noiDung = $_POST['txtNoiDung'];

    //Xử lý upoad
    if ($_FILES["fUpload"]["error"] > 0) {
        echo "Có lỗi trong quá trình upload. Chi tiết: " . $_FILES['fUpload']['error'] . "<br>";
    } else {
        echo "Upload thành công";
        $anhSP = $_FILES['fUpload']['name'];
        echo"Tên file: " . $_FILES['fUpload']['name'] . "<br>";
        echo "Kiểu file: " . $_FILES['fUpload']['type'] . "<br>";
        echo "Kích thước file: " . $_FILES['fUpload']['size'] / 1024 . "KB<br>";
        echo "Thư mục tạm: " . $_FILES['fUpload']['tmp_name'] . "<br>";

        move_uploaded_file($_FILES["fUpload"]["tmp_name"], "images/" . $_FILES["fUpload"]["name"]);
    }

    $sanpham = new SanPham();
        $sanpham->maSP = $maSP;
        $sanpham->tenSP = $tenSP;
        $sanpham->anhSP=$anhSP;
        $sanpham->moTa=$moTa;
        $sanpham->gia=$gia;
        $sanpham->ngayTao=$ngayTao;
        $sanpham->ngayCapNhap=$ngayCapNhap;
        $sanpham->hangSanXuat=$hangSanXuat;
        $sanpham->loai=$loai;
        $sanpham->chuDeId=$maChuDe;
        $sanpham->noiDung=$noiDung;
    $service = new SanPhamBusiness();
    if ($maSP > 0) {  //trường hợp sửa
        $service->capNhap($sanpham);
    } else {
        $service->themMoi($sanpham);
    }
}
?>

<html>
    <head>
        <title>Thêm mới thông tin sản phẩm</title>
         <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<!--        <meta name="viewport" content="width=device-width, initial-scale=1">  
	<script type="text/javascript" src="vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="1.js"></script>
	<link rel="stylesheet" href="vendor/bootstrap.css">
	<link rel="stylesheet" href="vendor/font-awesome.css">
 	<link rel="stylesheet" href="1.css">-->
    </head>
    <body>
        <form method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Nhập thông tin sản phẩm</legend>  
                <table>
                    <tr>
                        <td>
                            Tên sản phẩm:
                        </td>
                        <td>
                            <input type="text" name="txtTenSP" value="<?php echo $tenSP ?>" />
                            <input type="hidden" name="txtMaSP" value="<?php echo $maSP ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Mô tả:
                        </td>
                        <td>
                            <textarea name="txtMoTa" rows="5">
                                <?php echo $moTa ?>
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Ảnh sản phẩm:
                        </td>
                        <td>
                            Chọn ảnh:<input type="file" id="fUpload" name="fUpload"/>
                            &nbsp;
                            <input type="hidden" name="hAnhSP" value="<?php echo $anhSP ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Giá:
                        </td>
                        <td>
                            <input type="text" name="txtGia" value="<?php echo $gia ?>"/>
                        </td>
                    </tr>
                    <tr>

                        <td>
                            Nội dung
                        </td>
                        <td>
                            <textarea name="txtNoiDung">
                               <?php echo $noiDung ?>
                            </textarea>
                            <script>
                                CKEDITOR.replace('txtNoiDung');
                            </script>

                        </td>

                    </tr>

                    
                    <tr>
                        <td>Chủ đề</td>
                        <td>
                            <select name="cboChuDe">
                                <?php
                                foreach ($dsChuDe as $cd) {
                                    ?>
                                    <option value="<?php echo $cd->maChuDe ?>"><?php echo $cd->tenChuDe ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Hãng sản xuất:
                        </td>
                        <td>
                            <input type="text" name="txtHangSanXuat" value="<?php echo $hangSanXuat ?>"/>
                        </td>
                    </tr>
                     <tr>
                        <td>
                            Loại:
                        </td>
                        <td>
                            <input type="text" name="txtLoai" value="<?php echo $loai ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Ngày tạo:
                        </td>
                        <td>
                            <input type="text" name="txtNgayTao" value="<?php echo $ngayTao ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Ngày cập nhập:
                        </td>
                        <td>
                            <input type="text" name="txtNgayCapNhap" value="<?php echo $ngayCapNhap ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>
                            <input type="submit" name="btnCapNhap"  value="Cập nhập" />
                            &nbsp;
                            <a href="BangQuanLy.php" title="Trở lại"/>Trở lại</a>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </body>
</html>

