<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NguoiDungBusiness
 *
 * @author TRAN HOANG
 */
class NguoiDungBusiness {

    public function kiemTraDangNhap($tenDN) {

        $nguoiDung = new NguoiDung();


        $ketNoi = DataProvider::layKetNoi();

        
        $sql = "Select Id, TenDangNhap, MatKhau, HoTen"
                . " from NguoiDung where TenDangNhap = '"
                . $tenDN . "'";
        
        $ketQua = mysqli_query($ketNoi, $sql);
        //Đọc thông tin từng dòng để đưa vào danh sách dạng đối tượng
        while ($row = mysqli_fetch_array($ketQua)) {
            $nguoiDung->id = $row['Id'];
            $nguoiDung->tenDangNhap = $row['TenDangNhap'];
            $nguoiDung->matKhau = $row['MatKhau'];
            $nguoiDung->hoTen = $row['HoTen'];
        }

        //Đóng kết nối
        $ketNoi->close();

        return $nguoiDung;
    }

}
