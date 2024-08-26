<?php

include_once("Controller/cProductAdmin.php");

function showAllProductAdmin(){
    $p = new cProductAdmin();
    $p -> controlActionProduct();
    $arrayCompany = $p -> getAllCompany();
    $tbl = $p -> getAllProduct();


    echo "<h1> Quản lý sách </h1>";
    echo '
    <a href="admin.php?action=addProd">Thêm sản phẩm</a>
    ';
    echo "
    <table border='1px solid' class='tblRight'>
    <tr>
        <td>Mã sách</td>
        <td>Tên sách</td>
        <td>Tác giả</td>
        <td>Giá</td>
        <td>Ảnh sách</td>
        <td>Tên loại sách</td>
        <td>Action</td>
    </tr>
    ";
    while($row = mysqli_fetch_assoc($tbl)){
        if($row['ProdMode'] == 1){
            echo "<tr>";
            echo "<td>". $row['MaSach'] ."</td>";
            echo "<td>". $row['TenSach'] ."</>"; 
            echo "<td>". $row['TacGia'] ."</td>"; 
            echo "<td>". $row['Gia'] ."</td>"; 
            echo "<td>  <img src='images/".$row['SachImage']."' hight='70px' width='70px'></td>"; 
            echo "<td> ".$arrayCompany[$row['MaLoaiSach']] ."</td>";
            echo '<td> 
            <form action="#" method="get">
            <input type="hidden" name="MaSach" value="'.$row['MaSach'].'">
            <input type="submit" value="Sửa" name="btnSubmitActionProd">
            <input type="submit" value="Xoá" name="btnSubmitActionProd">
            </form>
            ';
            echo "</tr>";
        }
        
    }
    echo "</table>";

}


function showAddProduct(){
    $p = new cProductAdmin();
    $p -> controlAddProduct();
    $arrayCompany = $p -> getAllCompany();
    echo '
    <form action="#" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td></td>
                    <td><h2>Thêm Sách</h2></td>
                </tr>
                <tr>
                    <td>Tên sách:</td>
                    <td><input type="text" name="TenSach"></td>
                </tr>
                <tr>
                    <td>Tác giả:</td>
                    <td><input type="text" name="TacGia"></td>
                </tr>
                <tr>
                    <td>Giá: </td>
                    <td><input type="text" name="Gia"></td>
                </tr>
                <tr>
                    <td>Ảnh của sách:</td>
                    <td><input type="file" name="SachImage"></td>
                </tr>
                <tr>
                    <td>Tên loại sách:</td>
                    <td> 
                    
                    <select name="MaLoaiSach" id="">';

                        foreach($arrayCompany as $id => $name){
                            echo "<option value='$id'>$name</option>";
                        }
                    echo '</select>
                    
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="reset" value="Reset">
                        <input type="submit" value="Thêm sách" name="btnInsertProduct">
                    </td>
                </tr>
                
            </table>
        </form>
    ';
}

function showUpdateProduct(){
    $p = new cProductAdmin();
    $p -> controlUpdateProduct();
    $oldProd = $p-> getProductUpdate();
    $arrayCompany = $p -> getAllCompany(); 
    echo '
    <form action="#" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td></td>
                    <td><h2>Sửa sách</h2></td>
                </tr>
                <tr>
                    <td>Mã sách:</td>
                    <td>'.$oldProd['ID'].'<input type="hidden" name="MaSach" value="'.$oldProd['ID'].'"></td>
                </tr>
                <tr>
                    <td>Tên sách:</td>
                    <td><input type="text" name="TenSach" value="'.$oldProd['Name'].'"></td>
                </tr>
                <tr>
                    <td>Tác giả:</td>
                    <td><input type="text" name="TacGia" value="'.$oldProd['Author'].'"></td>
                </tr>
                <tr>
                    <td>Giá:</td>
                    <td><input type="text" name="Gia" value="'.$oldProd['Price'].'"></td>
                </tr>
                <tr>
                    <td>Ảnh của sách:</td>
                    <td>
                    <img src="images/'.$oldProd['Image'].'" hight="70px" width="70px"> </br>
                    <input type="file" name="SachImage">
                    </td>
                </tr>
                <tr>
                    <td>Loại sách:</td>
                    <td> 
                    
                    <select name="MaLoaiSach" id="">';

                        foreach($arrayCompany as $id => $name){
                            
                            if($id == $oldProd['MaLoaiSach']){
                                echo "<option value='$id'  selected >$name</option>";
                            }else{
                                echo "<option value='$id' >$name</option>";
                            }
                            
                        }
                    echo '</select>
                    
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="reset" value="Reset">
                        <input type="submit" value="Sửa sách" name="btnUpdateProduct">
                    </td>
                </tr>
                
            </table>
        </form>
    ';
}

function showDeleteProduct(){
    $p = new cProductAdmin();
    $result = $p->controlDeleteProduct(); 

    if ($result) {
        echo "Sản phẩm đã được xóa thành công.";
    } else {
        echo "Không thể xóa sản phẩm.";
    }
}