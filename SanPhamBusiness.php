<?php

class SanPhamBusiness {

    public function timKiemSanPham($tuKhoa, $maChuDe) {
        //Khai báo 1 ds
        $listSP = Array();
        //lấy kết nối
        $ketNoi = DataProvider::layKetNoi();

        //Câu lệnh truy vấn để lấy thông tin
        $sql = "Select MaSP, TenSP, MoTa, AnhSP, "
                . "Gia, HangSanXuat,Loai, NgayTao,NgayCapNhap,ChuDeId from sanpham where 1=1";
       //Nếu có từ khóa
        if($tuKhoa != null && strlen($tuKhoa) > 0)
        {
            $sql = $sql . " AND (TenSP like '%" . 
                    $tuKhoa . "%' OR MoTa like '%" . $tuKhoa . "%')";
        }
        //Nếu có mã chủ đề
        if ($maChuDe != null && strlen($maChuDe) > 0) {
            $sql = $sql . " AND ChuDeId = '" . $maChuDe . "'";
        }
        $ketQua = mysqli_query($ketNoi, $sql);
        while ($row = mysqli_fetch_array($ketQua)) {
            //Khai báo và khởi tạo 1 đối tượng sản phẩm
            $sanpham = new SanPham();
            $sanpham->maSP = $row['MaSP'];
            $sanpham->tenSP = $row['TenSP'];
            $sanpham->anhSP = $row['AnhSP'];
            $sanpham->moTa = $row['MoTa'];
            $sanpham->gia = $row['Gia'];
            $sanpham->ngayTao = $row['NgayTao'];
            $sanpham->ngayCapNhap = $row['NgayCapNhap'];
            $sanpham->hangSanXuat = $row['HangSanXuat'];
            $sanpham->loai= $row['Loai'];
            $sanpham->chuDeId= $row['ChuDeId'];
            //Thêm vào mảng
            array_push($listSP, $sanpham);
        }
        //Đóng kết nối

        $ketNoi->close();

        return $listSP;
    }
    
    public function layDanhSach() {
        $listSP = Array();
        $ketNoi = DataProvider::layKetNoi();
        $sql = "Select MaSP, TenSP, MoTa, AnhSP, "
                . "Gia, HangSanXuat,Loai, NgayTao,NgayCapNhap,ChuDeId from sanpham";

        $ketQua = mysqli_query($ketNoi, $sql);
        while ($row = mysqli_fetch_array($ketQua)) {
            //Khai báo và khởi tạo 1 đối tượng sản phẩm
            $sanpham = new SanPham();
            $sanpham->maSP = $row['MaSP'];
            $sanpham->tenSP = $row['TenSP'];
            $sanpham->anhSP = $row['AnhSP'];
            $sanpham->moTa = $row['MoTa'];
            $sanpham->gia = $row['Gia'];
            $sanpham->ngayTao = $row['NgayTao'];
            $sanpham->ngayCapNhap = $row['NgayCapNhap'];
            $sanpham->hangSanXuat = $row['HangSanXuat'];
            $sanpham->loai= $row['Loai'];
            $sanpham->chuDeId= $row['ChuDeId'];
            //Thêm vào mảng
            array_push($listSP, $sanpham);
        }
        $ketNoi->close();
        return $listSP;
    }
    
    public function layChiTietTheoMa($maSP) {
        //Khai báo 1 ds
        $sanpham = new SanPham();
        //lấy kết nối
        $ketNoi = DataProvider::layKetNoi();
        $sql = "Select MaSP, TenSP, MoTa, AnhSP, "
                . "Gia, HangSanXuat,Loai, NgayTao,NgayCapNhap,ChuDeId,NoiDung from SanPham"
                . " where MaSP = ".$maSP;

        $ketQua = mysqli_query($ketNoi, $sql);
        while ($row = mysqli_fetch_array($ketQua)) {
            //Khai báo và khởi tạo 1 đối tượng sản phẩm
            $sanpham->maSP = $row['MaSP'];
            $sanpham->tenSP = $row['TenSP'];
            $sanpham->anhSP = $row['AnhSP'];
            $sanpham->moTa = $row['MoTa'];
            $sanpham->gia = $row['Gia'];
            $sanpham->ngayTao = $row['NgayTao'];
            $sanpham->ngayCapNhap = $row['NgayCapNhap'];
            $sanpham->hangSanXuat = $row['HangSanXuat'];
            $sanpham->loai= $row['Loai'];
            $sanpham->chuDeId = $row['ChuDeId'];
            $sanpham->noiDung = $row['NoiDung'];
            //Thêm vào mảng
        }
        //Đóng kết nối
        $ketNoi->close();
        return $sanpham;
    }

    //Hàm thêm mới
    public function themMoi($sanpham) {

        $ketNoi = DataProvider::layKetNoi();
        $insert = "INSERT INTO SanPham(TenSP, MoTa, AnhSP, HangSanXuat,Loai,"
                . "NgayTao, NgayCapNhap,Gia,ChuDeId,NoiDung) values(?,?,?,?,?,sysdate(),?,?,?,?)";
        $comm = $ketNoi->prepare($insert);
        //Gán các giá trị cho các tham số trong câu lệnh
        $comm->bind_param("ssssssdss", $sanpham->tenSP, $sanpham->moTa,
                $sanpham->anhSP, $sanpham->hangSanXuat,$sanpham->loai,$sanpham->ngayTao, $sanpham->gia,
                $sanpham->chuDeId,$sanpham->noiDung);
        //Thực hiện công việc
        $ketQua = $comm->execute();

        //Đóng kết nối
        $comm->close();
        $ketNoi->close();
        if ($ketQua) {

            echo "Thêm mới sản phấm thành công";
        }
    }

    public function capNhap($sanpham) {
        $ketNoi = DataProvider::layKetNoi();
        //Khai báo câu lệnh thêm mới
        $update = "Update SanPham set TenSP=?, MoTa = ?, "
                . "AnhSP = ?, HangSanXuat=?,Loai=?, NgayTao = ?, Gia = ?,ChuDeId = ?,NoiDung = ?"
                . " where MaSP = ?";
        //Khai báo công việc
        $comm = $ketNoi->prepare($update);
        
        //Gán các giá trị cho các tham số trong câu lệnh
        $comm->bind_param("ssssssdssd", $sanpham->tenSP, $sanpham->moTa,
                $sanpham->anhSP, $sanpham->hangSanXuat,$sanpham->loai, $sanpham->ngayTao,
                $sanpham->gia,$sanpham->chuDeId,$sanpham->noiDung, $sanpham->maSP);
        //Thực hiện công việc
        $ketQua = $comm->execute();
        //Đóng kết nối
        $comm->close();
        $ketNoi->close();
        
        if($ketQua)
        {
            echo "Cập nhật sản phẩm thành công";
        }
    } 
     public function xoaSanPham($maSP) {

        $ketNoi = DataProvider::layKetNoi();
        $delete = "Delete from sanpham where MaSP = ?";

        //Khai báo công việc
        $comm = $ketNoi->prepare($delete);
        //Gán các giá trị cho các tham số trong câu lệnh
        $comm->bind_param("d",$maSP);
        //Thực hiện công việc
        $ketQua = $comm->execute();
        //Đóng kết nối
        $comm->close();
        $ketNoi->close();
        if ($ketQua) {
            echo "Xóa thành công";
        }
    }
    

}


