<?php
include_once("ketnoi.php");

class modelCompanyAdmin {
    function SelectAllCompanyAdmin() {
        $p = new clsketnoi();
        $con = $p->ketnoiDB();
        if($con) {
            $string = "SELECT * FROM loaisach ";
            $table = mysqli_query($con, $string);
            $p->dongketnoi($con);
            return $table;
        } else {
            return false;
        }
    }
    function insertCompany($LoaiSach) {
        $p = new clsketnoi();
        $con = $p->ketnoiDB();
        if($con) {
            $stmt = mysqli_prepare($con, "INSERT INTO `quanlybansach`.`loaisach` (`LoaiSach`, `SachMode`) VALUES (?, '1')");
            mysqli_stmt_bind_param($stmt, 's', $LoaiSach);
            $result = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            $p->dongketnoi($con);
            
            return $result;
        } else {
            return false;
        }
    }
    public function companyExists($LoaiSach) {
        $db = new mCompanyAdmin(); 
        $existingCompany = $db->selectCompany($LoaiSach); 
    
        return ($existingCompany !== false);
    }
    function selectCompany($MaLoaiSach) {
        $p = new clsketnoi();
        $con = $p->ketnoiDB();
        if($con) {
            $stmt = mysqli_prepare($con, "SELECT * FROM loaisach WHERE MaLoaiSach = ?");
            mysqli_stmt_bind_param($stmt, 'i', $MaLoaiSach);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            $p->dongketnoi($con);
            return $result;
        } else {
            return false;
        }
    }

    
    public function getCompanyByName($LoaiSach) {
        $p = new clsketnoi();
        $conn = $p->ketnoiDB();

        $query = "SELECT * FROM loaisach WHERE LoaiSach = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $LoaiSach);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $stmt->close();
        $conn->close();

        return ($row !== null) ? $row : false;
    }

    function deleteCompany($MaLoaiSach) {
        $p = new clsketnoi();
        $con = $p->ketnoiDB();
        if($con) {
                $string = "Update `quanlybansach`.`loaiSach` SET `SachMode` = '0' WHERE `loaiSach`.`MaLoaiSach` = $MaLoaiSach ;";
                $result = mysqli_query($con, $string);
                $p->dongketnoi($con);
                return $result;
            return $result;
        } else {
            return false;
        }
    }
}
?>