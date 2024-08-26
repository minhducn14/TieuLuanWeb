<?php
include_once('Controller/cCompany.php');

function viewAllCompany() {
    $c = new controlCompany();
    $tblCompany = $c->viewAllCompany();

    if ($tblCompany) {
        if (mysqli_num_rows($tblCompany) > 0) {
            while($row = mysqli_fetch_assoc($tblCompany)) {
                echo '<li data-tab-target="#all-genre" class="active tab"><a href="index.php?Comp='.$row["MaLoaiSach"].'" style="text-decoration: none;">'.$row["LoaiSach"].'</a></li>';
            }
        } else {
            echo "0 result";
        }
    } else {
        echo "Error";
    }
}
?>
