<?php
include './DataProvider.php';
include './NguoiDung.php';
include './NguoiDungBusiness.php';

//Khai báo biến
$tenDangNhap = "";
$matKhau = "";
$thongBao = "";
if (isset($_REQUEST['btnDangNhap'])) {
    $thongBao = "";

    $tenDangNhap = $_POST['txtTenDangNhap'];
    $matKhau = $_POST['txtMatKhau'];
    $matKhau = md5($matKhau);
    $service = new NguoiDungBusiness();
    $objUser = $service->kiemTraDangNhap($tenDangNhap);
    
    if ($objUser != null) {
        if ($matKhau == $objUser->matKhau) {
            //Nếu đúng mật khẩu
            //Lưu vào session và đi đến trang quản lý
            session_start();

            //Lưu tên đăng nhập vào session
            $_SESSION['userName'] = $tenDangNhap;

            //Di chuyển sang trang quản trị
            header("location:TrangAdmin.php");
        } else {
            $thongBao = "Mật khẩu không chính xác";
        }
    } 
    else {
        $thongBao = "Tài khoản không tồn tại. Bạn vui lòng kiểm tra lại thông tin";
        
    }
}
?>
<html>
    <head>
        <title>Đăng nhập hệ thống</title>
        <!--KHai báo sử dụng jquery-->
       	<meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="js/images/icons/favicon.ico"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="js/vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="js/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="js/vendor/animate/animate.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="js/vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="js/vendor/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="js/vendor/select2/select2.min.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="js/vendor/daterangepicker/daterangepicker.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="js/css/util.css">
        <link rel="stylesheet" type="text/css" href="js/css/main.css">
        <!--===============================================================================================-->
    </head>
    <body>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="post">
                        <span class="login100-form-title">
                            Sign In
                        </span>

                        <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
                            <input class="input100" type="text" name="txtTenDangNhap" placeholder="Username">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Please enter password">
                            <input class="input100" type="password" name="txtMatKhau" placeholder="Password">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="text-right p-t-13 p-b-23">
                            <span class="txt1">
                                Forgot
                            </span>

                            <a href="#" class="txt2">
                                Username / Password?
                            </a>
                            <div class="text-danger" >
                                <?php echo $thongBao ?>
                            </div>
                        </div>
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" name="btnDangNhap">
                                Sign in
                            </button>
                        </div>

                        <div class="flex-col-c p-t-170 p-b-40">
                            <span class="txt1 p-b-9">
                                Don’t have an account?
                            </span>

                            <a href="#" class="txt3">
                                Sign up now
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--===============================================================================================-->
        <script src="js/vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="js/vendor/animsition/js/animsition.min.js"></script>
        <!--===============================================================================================-->
        <script src="js/vendor/bootstrap/js/popper.js"></script>
        <script src="js/vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="js/vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="js/vendor/daterangepicker/moment.min.js"></script>
        <script src="js/vendor/daterangepicker/daterangepicker.js"></script>
        <!--===============================================================================================-->
        <script src="js/vendor/countdowntime/countdowntime.js"></script>
        <!--===============================================================================================-->
        <script src="js/js/main.js"></script>
    </body>
</html>