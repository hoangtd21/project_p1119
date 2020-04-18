<?php
include './DataProvider.php';
include './SanPham.php';
include './SanPhamBusiness.php';
include './ChuDeBusiness.php';
include './ChuDe.php';
include './NguoiDung.php';
include './NguoiDungBusiness.php';


//Khai báo và khởi tạo 1 đối tượng
//Kiểm tra đã đăng nhập hay chưa
$tenDangNhap = "";
session_start();
//Lấy thông tin từ session
if (isset($_SESSION['userName'])) {
    $tenDangNhap = $_SESSION['userName'];
} else {
//Di chuyển sang trang đăng nhập
    header("location:DangNhap.php");
}
?>
<html>
    <head> <title>Trang quản lý</title>
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
                            <h4 class="page-title">Dashboard</h4> </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <a href="" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Upgrade to Pro</a>
                            <ol class="breadcrumb">
                                <li><a href="#">Dashboard</a></li>
                            </ol>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <!-- ============================================================== -->
                    <!-- Different data widgets -->
                    <!-- ============================================================== -->
                    <!-- .row -->
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 col-xs-12">
                            <div class="white-box analytics-info">
                                <h3 class="box-title">Total Visit</h3>
                                <ul class="list-inline two-part">
                                    <li>
                                        <div id="sparklinedash"></div>
                                    </li>
                                    <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success">659</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-xs-12">
                            <div class="white-box analytics-info">
                                <h3 class="box-title">Total Page Views</h3>
                                <ul class="list-inline two-part">
                                    <li>
                                        <div id="sparklinedash2"></div>
                                    </li>
                                    <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple">869</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-xs-12">
                            <div class="white-box analytics-info">
                                <h3 class="box-title">Unique Visitor</h3>
                                <ul class="list-inline two-part">
                                    <li>
                                        <div id="sparklinedash3"></div>
                                    </li>
                                    <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info">911</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--/.row -->
                    <!--row -->
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="white-box">
                                <h3 class="box-title">Products Yearly Sales</h3>
                                <ul class="list-inline text-right">
                                    <li>
                                        <h5><i class="fa fa-circle m-r-5 text-info"></i>Mac</h5> </li>
                                    <li>
                                        <h5><i class="fa fa-circle m-r-5 text-inverse"></i>Windows</h5> </li>
                                </ul>
                                <div id="ct-visits" style="height: 405px;"></div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- table -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <div class="white-box">
                                <div class="col-md-3 col-sm-4 col-xs-6 pull-right">
                                    <select class="form-control pull-right row b-none">
                                        <option>March 2020</option>
                                        <option>February 2020</option>
                                        <option>January 2020</option>
                                        <option>December 2019</option>                             
                                        <option>November 2019</option>
                                    </select>
                                </div>
                                <h3 class="box-title">Recent sales</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>NAME</th>
                                                <th>STATUS</th>
                                                <th>DATE</th>
                                                <th>PRICE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td class="txt-oflo">Iphone 8</td>
                                                <td>SALE</td>
                                                <td class="txt-oflo">April 18, 2019</td>
                                                <td><span class="text-success">$670</span></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td class="txt-oflo">Iphone X</td>
                                                <td>IN STOCK</td>
                                                <td class="txt-oflo">April 19, 2019</td>
                                                <td><span class="text-info">$735</span></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td class="txt-oflo">Iphone 11Pro max</td>
                                                <td>IN STOCK</td>
                                                <td class="txt-oflo">April 19, 2019</td>
                                                <td><span class="text-info">$1560</span></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td class="txt-oflo">Iphone 11</td>
                                                <td>IN STOCK</td>
                                                <td class="txt-oflo">April 20, 2019</td>
                                                <td><span class="text-info">$1130</span></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td class="txt-oflo">Laptop Dell</td>
                                                <td>SALE</td>
                                                <td class="txt-oflo">March 25, 2020</td>
                                                <td><span class="text-success">$799</span></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td class="txt-oflo">Laptop HP s15</td>
                                                <td>SALE</td>
                                                <td class="txt-oflo">March 21, 2020</td>
                                                <td><span class="text-success">$756</span></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td class="txt-oflo">Samsung glaxy s10</td>
                                                <td>SALE</td>
                                                <td class="txt-oflo">April 22, 2019</td>
                                                <td><span class="text-success">$480</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- chat-listing & recent comments -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <!-- .col -->
                        <div class="col-md-12 col-lg-8 col-sm-12">
                            <div class="white-box">
                                <h3 class="box-title">Recent Comments</h3>
                                <div class="comment-center p-t-10">
                                    <div class="comment-body">
                                        <div class="user-img"> <img src="layout1/plugins/images/users/pawandeep.jpg" alt="user" class="img-circle">
                                        </div>
                                        <div class="mail-contnet">
                                            <h5>Alex Costa</h5><span class="time">9:30 AM   15  January 2020</span>
                                            <br/><span class="mail-desc">Service is perfect. I fell very satisfied! </span> <a href="javacript:void(0)" class="btn btn btn-rounded btn-default btn-outline m-r-5"><i class="ti-check text-success m-r-5"></i>Approve</a><a href="javacript:void(0)" class="btn-rounded btn btn-default btn-outline"><i class="ti-close text-danger m-r-5"></i> Reject</a>
                                        </div>
                                    </div>
                                    <div class="comment-body">
                                        <div class="user-img"> <img src="layout1/plugins/images/users/sonu.jpg" alt="user" class="img-circle">
                                        </div>
                                        <div class="mail-contnet">
                                            <h5>Tom</h5><span class="time">10:20 AM   20  December 2019</span>
                                            <br/><span class="mail-desc">Product is good.</span>
                                        </div>
                                    </div>
                                    <div class="comment-body b-none">
                                        <div class="user-img"> <img src="layout1/plugins/images/users/arijit.jpg" alt="user" class="img-circle">
                                        </div>
                                        <div class="mail-contnet">
                                            <h5> Jason Statham</h5><span class="time">19:20 AM  19 November 2019</span>
                                            <br/><span class="mail-desc">The product price is very reasonable.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="panel">
                                <div class="sk-chat-widgets">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            CHAT LISTING
                                        </div>
                                        <div class="panel-body">
                                            <ul class="chatonline">
                                                <li>
                                                    <div class="call-chat">
                                                        <button class="btn btn-success btn-circle btn-lg" type="button"><i class="fa fa-phone"></i></button>
                                                        <button class="btn btn-info btn-circle btn-lg" type="button"><i class="fa fa-comments-o"></i></button>
                                                    </div>
                                                    <a href="javascript:void(0)"><img src="layout1/plugins/images/users/varun.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                                </li>
                                                <li>
                                                    <div class="call-chat">
                                                        <button class="btn btn-success btn-circle btn-lg" type="button"><i class="fa fa-phone"></i></button>
                                                        <button class="btn btn-info btn-circle btn-lg" type="button"><i class="fa fa-comments-o"></i></button>
                                                    </div>
                                                    <a href="javascript:void(0)"><img src="layout1/plugins/images/users/genu.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                                </li>
                                                <li>
                                                    <div class="call-chat">
                                                        <button class="btn btn-success btn-circle btn-lg" type="button"><i class="fa fa-phone"></i></button>
                                                        <button class="btn btn-info btn-circle btn-lg" type="button"><i class="fa fa-comments-o"></i></button>
                                                    </div>
                                                    <a href="javascript:void(0)"><img src="layout1/plugins/images/users/ritesh.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                                </li>
                                                <li>
                                                    <div class="call-chat">
                                                        <button class="btn btn-success btn-circle btn-lg" type="button"><i class="fa fa-phone"></i></button>
                                                        <button class="btn btn-info btn-circle btn-lg" type="button"><i class="fa fa-comments-o"></i></button>
                                                    </div>
                                                    <a href="javascript:void(0)"><img src="layout1/plugins/images/users/arijit.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                                </li>
                                                <li>
                                                    <div class="call-chat">
                                                        <button class="btn btn-success btn-circle btn-lg" type="button"><i class="fa fa-phone"></i></button>
                                                        <button class="btn btn-info btn-circle btn-lg" type="button"><i class="fa fa-comments-o"></i></button>
                                                    </div>
                                                    <a href="javascript:void(0)"><img src="layout1/plugins/images/users/govinda.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                                </li>
                                                <li>
                                                    <div class="call-chat">
                                                        <button class="btn btn-success btn-circle btn-lg" type="button"><i class="fa fa-phone"></i></button>
                                                        <button class="btn btn-info btn-circle btn-lg" type="button"><i class="fa fa-comments-o"></i></button>
                                                    </div>
                                                    <a href="javascript:void(0)"><img src="layout1/plugins/images/users/hritik.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                                </li>
                                                <li>
                                                    <div class="call-chat">
                                                        <button class="btn btn-success btn-circle btn-lg" type="button"><i class="fa fa-phone"></i></button>
                                                        <button class="btn btn-info btn-circle btn-lg" type="button"><i class="fa fa-comments-o"></i></button>
                                                    </div>
                                                    <a href="javascript:void(0)"><img src="layout1/plugins/images/users/varun.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
                <!-- /.container-fluid -->

                <footer class="footer text-center"> Địa chỉ:Hà Nội </footer>
            </div>
            <!-- ============================================================== -->
            <!-- End Page Content -->
        </div>
    </body>
</html>


