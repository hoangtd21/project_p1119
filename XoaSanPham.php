<?php
include './DataProvider.php';
include './SanPham.php';
include './SanPhamBusiness.php';

if(isset($_GET['ma']))
{
    $maSP = intval($_GET['ma']);
    //Khai báo 1 đối tư
    $service = new SanPhamBusiness();
    $service->xoaSanPham($maSP);
    
    header("location:BangQuanLy.php");
}
