<?php

class DataProvider {

    public static function layKetNoi() {
        $conn = new mysqli("localhost", "root",
                "", "qldodientu", 3306);

        if ($conn->connect_error) {
            die("Không kết nối được đến MySQL. Chi tiết: " .$conn->connect_error);
        }
 $conn->query("SET NAMES 'utf8'");//Làm việc với tiếng việt có dấu
    return $conn;
    }

}
