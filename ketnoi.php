<?php
class clsketnoi {
    function ketnoiDB() {
        $con = mysqli_connect("localhost", "madanly", "madanly", "quanlybansach");

        if ($con) {
            mysqli_set_charset($con, "utf8");
            return $con; 
        } else {
            return false; 
        }
    }

    function dongketnoi($con) {
        mysqli_close($con);
    }
}

?>
