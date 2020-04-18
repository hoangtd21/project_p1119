<?php
include './DataProvider.php';
include './SanPham.php';
include './SanPhamBusiness.php';
include './ChuDeBusiness.php';
include './ChuDe.php';
include './NguoiDung.php';
include './NguoiDungBusiness.php';

$service = new SanPhamBusiness();
$tuKhoa = "";
$chuDe = "";
if (isset($_REQUEST['btnTimKiem'])) {
    //lấy từ khóa về chủ đề
    $tuKhoa = $_POST["txtTuKhoa"];
    $chuDe = $_POST["cboChuDe"];
    $ds = $service->timKiemSanPham($tuKhoa, $chuDe);
} else {
    $ds = $service->layDanhSach();
}
//Khai báo đối tượng
$chuDeBus = new ChuDeBusiness();
//Lấy ds chủ đề 
$dsChuDe = $chuDeBus->layDanhChuDe();
?>
<html>
    <head> <title>Bảng quản lý</title>
        <?php include './layout1/ThuVien.php'; ?>
    </head>
    <body class="fix-header">    
        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
            </svg>
        </div>

        <div id="wrapper">
            <?php
            include './layout1/Header.php';
            ?>
            <div class="navbar-default sidebar" role="navigation">
                <?php include './layout1/SiderBar.php'; ?>
            </div>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row bg-title">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h4 class="page-title">QUẢN LÝ THÔNG TIN SẢN PHẨM</h4>
                        </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            
                            <ol class="breadcrumb">
                                <li><a href="BangQuanLy.php">Quản lý sản phẩm</a></li>
                                <li class="active">Basic Table</li>
                            </ol>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /row -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="white-box">
                                <h3 class="box-title"></h3>
                               <!-- <p class="text-muted">Add class <code>.table</code></p>-->
                                <form method="post">
                                  
                                    <fieldset>
                                        <legend>Nhập thông tin tìm kiếm</legend>
                                        <table>
                                            <tr>
                                                <td>
                                                    Từ khóa
                                                </td>
                                                <td>
                                                    <input class="form-control" type="text" name="txtTuKhoa"/>
                                                </td>
                                                <td>Chủ đề</td>
                                                <td>
                                                    <select class="form-control" name="cboChuDe">
                                                        <?php
                                                        foreach ($dsChuDe as $cd) {
                                                            ?>
                                                            <option value="<?php echo $cd->maChuDe ?>"><?php echo $cd->tenChuDe ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                                <td style="padding-left: 5px;">
                                                    <input type="submit"  name="btnTimKiem" class="btn btn-primary"  value="Tìm kiếm" />
                                                </td>
                                            </tr>
                                        </table>
                                    </fieldset>

                                    <div style="text-align: right;">
                                        <a href="SanPhamAdd.php" class="btn btn-primary">Thêm mới</a>
                                    </div>
                                    <table class="table table-striped table-bordered" border="1" style="border-collapse: collapse; margin-left: 2px">
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

                                                <td><img width="75" height="83" src="images/<?php echo $sp->anhSP ?>"</td>
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

                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <footer class="footer text-center"> Địa chỉ:Hà Nội </footer>
            </div>
            <!-- ============================================================== -->
            <!-- End Page Content -->
        </div>
    </body>
</html>
