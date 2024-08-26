<?php
include_once("Controller/cCompanyAdmin.php");
function displayAdminCompany(){
    $p = new controlCompanyAdmin();
    $p -> controlActionCompany();

    $tblCompany = $p->getAllCompanyAdmin();
    if($tblCompany) {
        echo "<center><h2>Quản lý loại sách</h2></center>"; 
        echo '<a href="admin.php?action=addComp">Thêm loại sách</a>';
        echo "<table border='1px solid' style='margin: auto; width=100%'>";
        echo "<tr><td>Mã loại sách</td><td>Loại sách</td><td>Action</td></tr>";

        while ($row = mysqli_fetch_assoc($tblCompany)){ 
            if($row['SachMode'] == 1){
                echo "<tr>";
                echo "<td>". $row['MaLoaiSach'] ."</td>";
                echo "<td>". $row['LoaiSach'] ."</td>"; 
                echo '<td> 
                <form action="#" method="get">
                <input type="hidden" name="MaLoaiSach" value="'.$row['MaLoaiSach'].'">
                <input type="submit" value="Sửa" name="btnSubmitActionSach">
                <input type="submit" value="Xoá" name="btnSubmitActionSach">
                </form>
                </td>';
                echo "</tr>";
            } 
        }
        echo '</table>';
    } else {
        echo "Không có giá trị nào";
    }
}

function showControllerAddCompany(){
    $p = new controlCompanyAdmin();
    
    if(isset($_POST['btnInsertCompany'])){
        $LoaiSach = $_POST['LoaiSach'];
        
        if ($p->companyExists($LoaiSach)) {
            echo "Company already exists!";
            return; 
        } else {
            $result = $p->addCompany($LoaiSach); 
            if ($result) {
                echo "Company add successful!";
            } else {
                echo "An error occurred.";
            }
        }
    }
}


function showAddCompany(){
    showControllerAddCompany();
    echo '
    <form action="admin.php?action=addComp" method="post">
        <table>
            <tr>
                <td></td>
                <td><h2>Thêm loại sách</h2></td>
            </tr>
            <tr>
                <td>Loại sách:</td>
                <td><input type="text" name="LoaiSach"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="reset" value="Reset">
                    <input type="submit" value="Cập nhật" name="btnInsertCompany">
                </td>
            </tr>
        </table>
    </form>
    ';
}

function showDeleteCompany(){
    $p = new controlCompanyAdmin();
    $MaLoaiSach = $_REQUEST['MaLoaiSach'];
    $result = $p->controlDeleteCompany();
    if($result){
        echo "Xoá thành công";
    } else {
        echo "Xoá thất bại";
    }
}
?>
