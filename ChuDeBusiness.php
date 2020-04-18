<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ChuDeBusiness
 *
 * @author TRAN HOANG
 */
class ChuDeBusiness {
     public function layDanhChuDe() {
        //Khai báo 1 ds
        $listChuDe = Array();

        //lấy kết nối
        $ketNoi = DataProvider::layKetNoi();

        //Câu lệnh truy vấn để lấy thông tin
        $sql = "Select MaChuDe, TenChuDe from ChuDe";

        $ketQua = mysqli_query($ketNoi, $sql);
        while ($row = mysqli_fetch_array($ketQua)) {
            //Khai báo và khởi tạo 1 đối tượng sách
            $chuDe = new ChuDe();
            $chuDe->maChuDe = $row['MaChuDe'];
            $chuDe->tenChuDe = $row['TenChuDe'];
            //Thêm vào mảng

            array_push($listChuDe, $chuDe);
        }
        //Đóng kết nối

        $ketNoi->close();

        return $listChuDe;
    }

    //Lấy chi tiết
    public function layChiTietTheoMa($maChuDe) {
        //Khai báo 1 đối tượng chủ đề
        $chuDe = new ChuDe();
        //lấy kết nối
        $ketNoi = DataProvider::layKetNoi();
        //Câu lệnh truy vấn để lấy thông tin
        $sql = "Select MaChuDe , TenChuDe from ChuDe where MaChuDe = '" 
                .$maChuDe ."'"  ;
        $ketQua = mysqli_query($ketNoi, $sql);
        while ($row = mysqli_fetch_array($ketQua)) {
            //Khai báo và khởi tạo 1 đối tượng sách
           
            $chuDe->maChuDe = $row['MaChuDe'];
            $chuDe->tenChuDe = $row['TenChuDe'];
            //Thêm vào mảng
        }
        //Đóng kết nối
        $ketNoi->close();
        return $chuDe;
    }

}


