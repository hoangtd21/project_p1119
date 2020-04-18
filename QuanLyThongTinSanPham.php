<?php
include './DataProvider.php';
include './SanPham.php';
include './SanPhamBusiness.php';
include './ChuDeBusiness.php';
include './ChuDe.php';


$service = new SanPhamBusiness();
$tuKhoa="";
$chuDe="";
if(isset($_REQUEST['btnTimKiem']))
{
    //lấy từ khóa về chủ đề
    $tuKhoa=$_POST["txtTuKhoa"];
    $chuDe=$_POST["cboChuDe"];
    $ds=$service->timKiemSanPham($tuKhoa, $chuDe);
}
 else {
 $ds=$service->layDanhSach();    
}
//Khai báo đối tượng
$chuDeBus = new ChuDeBusiness();
//Lấy ds chủ đề 
$dsChuDe = $chuDeBus->layDanhChuDe();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Quản lý thông tin sản phẩm</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">  
	<script type="text/javascript" src="vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="1.js"></script>
	<link rel="stylesheet" href="vendor/bootstrap.css">
	<link rel="stylesheet" href="vendor/font-awesome.css">
 	<link rel="stylesheet" href="1.css">
    </head>
    <body>
        <form method="post">
        <div style="text-align: center;">
            <h3>QUẢN LÝ THÔNG TIN SẢN PHẨM</h3>
        </div>
        <fieldset>
            <legend>Nhập thông tin tìm kiếm</legend>
            <table>
                <tr>
                    <td>
                        Từ khóa
                    </td>
                    <td>
                        <input type="text" name="txtTuKhoa"/>
                    </td>
                    <td>Chủ đề</td>
                    <td>
                        <select name="cboChuDe">
                        <?php
                        foreach ($dsChuDe as $cd) {
                        ?>
                        <option value="<?php echo $cd->maChuDe?>"><?php echo $cd->tenChuDe?></option>
                        <?php } ?>
                    </select>
                    </td>
                    <td>
                        <input type="submit"  name="btnTimKiem" value="Tìm kiếm" />
                    </td>
                </tr>
            </table>
        </fieldset>

        <div style="text-align: right;">
            <a href="SanPhamAdd.php" class="btn btn-outline-success">Thêm mới</a>
        </div>
       <table border="1" style="border-collapse: collapse; margin-left: 2px">
            <tr> 
                <th>
                   Ảnh
                </th>
                <th>
                    Mã sản phẩm
                </th>
                <th>
                    Tên sản phẩm
                </th>
                <th>
                    Hãng sản xuất
                </th>
                <th>
                    Loại
                </th>
                <th>
                    Mô tả
                </th>
                <th>
                    Giá
                </th>
<!--                <th>  sửa Ngày tạo -> Ngày sản xuất
                    Ngày sản xuất 
                </th>-->
                <th>
                    Ngày cập nhập
                </th>
                <th>

                </th>

            </tr>
            <?php
            foreach ($ds as $sp) {
                ?>

                <tr>

                    <td><img width="85" height="90" src="images/<?php echo $sp->anhSP ?>"</td>
                    <td><?php echo $sp->maSP ?></td>
                    <td><?php echo $sp->tenSP ?></td>
                    <td><?php echo $sp->hangSanXuat ?></td>
                    <td><?php echo $sp->loai ?></td>
                    <td><?php echo $sp->moTa ?></td>
                    <td><?php echo $sp->gia ?></td>
<!--                    <td><?php echo $sp->ngayTao ?></td>-->
                    <td><?php echo $sp->ngayCapNhap ?></td>

                    <td>
                        <a href="SanPhamAdd.php?ma=<?php echo $sp->maSP ?>" class="btn btn-warning btn-xs">
                            <i class="fa fa-pencil">Sửa</i></a>                       
                        <a onclick="return confirm('Bạn chắc chắn muốn xóa?') 
                           "href="XoaSanPham.php?ma=<?php echo $sp->maSP ?>" class="btn btn-outline-danger btn-xs">
                            <i class="fa fa-remove">Xóa</i></a>
                    </td>

                </tr>

                <?php
            }
            ?>

        </table>
        </form>

    </body>

</html>



