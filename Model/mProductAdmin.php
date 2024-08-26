<?php
include_once("ketnoi.php");

class modelProductAdmin {
    function SelectAllProduct() {
        $p = new clsketnoi();
        $con = $p->ketnoiDB();
        if ($con) {
            $string = "SELECT * FROM tensach where ProdMode = '1'";
            $table = mysqli_query($con, $string);
            $p->dongketnoi($con);
            return $table;
        } else {
            return false;
        }
    }

    function SelectAllCompany() {
        $p = new clsketnoi();
        $con = $p->ketnoiDB();
        if ($con) {
            $string = "SELECT * FROM loaisach where SachMode = '1'";
            $table = mysqli_query($con, $string);
            $p->dongketnoi($con);
            return $table;
        } else {
            return false;
        }
    }

    function deleteProduct($MaSach) {
        $p = new clsketnoi();
        $con = $p->ketnoiDB();
        if ($con) {
            $string = "Update `quanlybansach`.`tensach` SET `ProdMode` = '0' WHERE `tensach`.`MaSach` = $MaSach ;";
            $result = mysqli_query($con, $string);
            $p->dongketnoi($con);
            return $result;
        } else {
            return false;
        }
    }


    function insertProduct($TenSach, $TacGia, $Gia, $SachImage, $MaLoaiSach) {
        $p = new clsketnoi();
        $con = $p->ketnoiDB();
        if ($con) {
            $string = "INSERT INTO `quanlybansach`.`tensach` (`TenSach`, `TacGia`, `Gia`, `SachImage`, `MaLoaiSach`, `ProdMode`) VALUES ('$TenSach', '$TacGia', '$Gia', '$SachImage', '$MaLoaiSach', '1');";
            $result = mysqli_query($con, $string);
            $p->dongketnoi($con);
            return $result;
        } else {
            return false;
        }
    }

    function selectProductUpdate($MaSach) {
        $p = new clsketnoi();
        $con = $p->ketnoiDB();
        if ($con) {
            $string = "SELECT * FROM tensach WHERE MaSach = $MaSach";
            $table = mysqli_query($con, $string);
            $p->dongketnoi($con);
            return $table;
        } else {
            return false;
        }
    }

    function updateProduct($MaSach, $TenSach, $TacGia, $Gia, $SachImage, $MaLoaiSach) {
        $p = new clsketnoi();
        $con = $p->ketnoiDB();
        if ($con) {
            if (!empty($SachImage)) {
                $string = "UPDATE `quanlybansach`.`tensach` SET `TenSach` = '$TenSach', `MaLoaiSach` = '$MaLoaiSach', `TacGia` = '$TacGia', `Gia` = '$Gia', `SachImage` = '$SachImage' WHERE `tensach`.`MaSach` = $MaSach LIMIT 1;";
            } else {
                $string = "UPDATE `quanlybansach`.`tensach` SET `TenSach` = '$TenSach', `MaLoaiSach` = '$MaLoaiSach', `TacGia` = '$TacGia', `Gia` = '$Gia' WHERE `tensach`.`MaSach` = $MaSach LIMIT 1;";
            }
            $result = mysqli_query($con, $string);
            $p->dongketnoi($con);
            return $result;
        } else {
            return false;
        }
    }

    function getProductByName($TenSach) {
        $p = new clsketnoi();
        $con = $p->ketnoiDB();
        if ($con) {
            $string = "SELECT * FROM tensach WHERE TenSach = '$TenSach'";
            $table = mysqli_query($con, $string);
            $p->dongketnoi($con);
            return $table;
        } else {
            return false;
        }
    }
}
?>
