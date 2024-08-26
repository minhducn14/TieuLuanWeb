<?php
include_once('ketnoi.php');

class modelCompany {
    function SelectAllCompany() {
        $p = new clsketnoi();
        $con = $p->ketnoiDB();
        if ($con) {
            $query = "SELECT * FROM loaisach Where SachMode='1'";
            $result = mysqli_query($con, $query);
            $p->dongketnoi($con);
            return $result;
        } else {
            return false; 
        }
    }
}
?>
