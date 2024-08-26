<?php
include_once("ketnoi.php");

class modelProduct {
    function SelectAllProduct() {
        $p = new clsketnoi();
        $con = $p->ketnoiDB();
        if ($con) {
            $string = "SELECT * FROM tensach Where ProdMode ='1'";
            $table = mysqli_query($con, $string);
            $p->dongketnoi($con);
            return $table;
        } else {
            return false;
        }
    }

    function SelectAllProductByCompany($comp) {
        $p = new clsketnoi();
        $con = $p->ketnoiDB();
        if ($con) {
            $string = "SELECT * FROM tensach WHERE MaLoaiSach = '".mysqli_real_escape_string($con, $comp)."' and ProdMode ='1'";
            $table = mysqli_query($con, $string);
            $p->dongketnoi($con);
            return $table;
        } else {
            return false;
        }
    }

    function SelectProductBySearch($search) {
        $p = new clsketnoi();
        $con = $p->ketnoiDB();
        if ($con) {
            $search = mysqli_real_escape_string($con, $search);
            $string = "SELECT * FROM tensach WHERE TenSach LIKE N'%".$search."%' ORDER BY MaSach DESC";
            $table = mysqli_query($con, $string);
            $p->dongketnoi($con);
            return $table;
        } else {
            return false;
        }
    }
    
    function SelectProductByFilter($fistFilter, $lastFilter) {
        $p = new clsketnoi();
        $con = $p->ketnoiDB();
        if ($con) {
            $fistFilter = mysqli_real_escape_string($con, $fistFilter);
            $lastFilter = mysqli_real_escape_string($con, $lastFilter);
            $string = "SELECT * FROM tensach WHERE Gia >= $fistFilter AND Gia <= $lastFilter ORDER BY MaSach DESC";
            $table = mysqli_query($con, $string);
            $p->dongketnoi($con);
            return $table;
        } else {
            return false;
        }
    }
}
?>
