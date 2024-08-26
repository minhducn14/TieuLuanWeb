<?php

include_once("Model/mProductAdmin.php");

class cProductAdmin {

    function getAllProduct() {
        $p = new modelProductAdmin();
        $tblProduct = $p->SelectAllProduct();
        return $tblProduct;
    }

    function getProductUpdate() {
        $p = new modelProductAdmin();
        $oldProd = $p->selectProductUpdate($_REQUEST['MaSach']);
        $oldProdArray = array();

        while ($row = mysqli_fetch_assoc($oldProd)) {
            $oldProdArray['ID'] = $row['MaSach'];
            $oldProdArray['Name'] = $row['TenSach'];
            $oldProdArray['MaLoaiSach'] = $row['MaLoaiSach'];
            $oldProdArray['Author'] = $row['TacGia'];
            $oldProdArray['Price'] = $row['Gia'];
            $oldProdArray['Image'] = $row['SachImage'];
        }

        return $oldProdArray;
    }

    function controlActionProduct() {
        $p = new cProductAdmin();
        if (isset($_REQUEST['btnSubmitActionProd'])) {
            if ($_REQUEST['btnSubmitActionProd'] == 'Sửa') {
                $p->controlUpdateProduct();
            } else {
                $p->controlDeleteProduct();
            }
        }
    }

    function getAllCompany() {
        $p = new modelProductAdmin();
        $tbl = $p->SelectAllCompany();

        $arrCompany = array();
        while ($row = mysqli_fetch_assoc($tbl)) {
            $LoaiSach = $row['LoaiSach'];
            $MaLoaiSach = $row['MaLoaiSach'];
            $arrCompany[$MaLoaiSach] = $LoaiSach;
        }

        return $arrCompany;
    }

    function controlUploadImage($file, & $name){
        $checkFile = array('image/jpg','image/png','image/jpeg');
        if(!in_array($file['type'], $checkFile)){
            echo "Sai định dạng file";
            // echo header("refresh:2; url=index.php");
        }else{
           $maxSize = 4 * 1024 * 1024;
            if($file['size'] > $maxSize){
                echo "Giới hạn dung lượng hình ảnh là 4MB";
                echo header("refresh:2; url=index.php");
            } else{
                $pos = strpos($file["name"], '.');
                $name = substr($file["name"], 0, $pos).date("ymdHms") . strstr($file["name"], '.');
                $dir = "images/".$name;
                $result = move_uploaded_file($file["tmp_name"], $dir);

                return $result;
            }
        }
    }

    function productExists($TenSach){
        $db = new modelProductAdmin();
        $existingCompany = $db -> getProductByName($TenSach);
        return ($existingCompany !== false);
    }

    function uploadImage(){
        $p = new cProductAdmin();
        $name = '';
       
            $file = $_FILES["SachImage"];
            $result = $p -> controlUploadImage($file, $name);
        
            if($result){
                echo "<script>alert('Thành công load ảnh')</script>";
                return $name;
            }else{
                echo "<script>alert('Không có ảnh')</script>";
            }
    }

    function controlAddProduct() {
        $p = new modelProductAdmin();
        $c = new cProductAdmin();
    
        if (isset($_REQUEST['btnInsertProduct'])) {
            $TenSach = $_REQUEST['TenSach'];
            $MaLoaiSach = $_REQUEST['MaLoaiSach'];
            $TacGia = $_REQUEST['TacGia'];
            $Gia = $_REQUEST['Gia'];
            $SachImage = $c->uploadImage();

             if ($c->productExists($TenSach)) {
                echo "<script>alert('Product already exists!')</script>";
            } else {
                $result = $p->insertProduct($TenSach, $TacGia, $Gia, $SachImage, $MaLoaiSach);
                return $result;
            }
        } else {
            return false;
        }
    }
    

    function controlUpdateProduct() {
        $p = new modelProductAdmin();
        $c = new cProductAdmin();

        if (isset($_REQUEST['btnUpdateProduct'])) {
            $MaSach = $_REQUEST['MaSach'];
            $TenSach = $_REQUEST['TenSach'];
            $MaLoaiSach = $_REQUEST['MaLoaiSach'];
            $TacGia = $_REQUEST['TacGia'];
            $Gia = $_REQUEST['Gia'];
            if ($_FILES['SachImage']['name'] == '') {
                $SachImage = '';
            } else {
                $SachImage = $c->uploadImage();
            }

            $result = $p->updateProduct($MaSach, $TenSach, $TacGia, $Gia, $SachImage, $MaLoaiSach);
            return $result;
            

        } else {
            return false;
        }
    }

    function controlDeleteProduct() {
        $p = new modelProductAdmin();
        $MaSach = $_REQUEST['MaSach'];
        $result = $p->deleteProduct($MaSach);
        return $result;

    }
    
}

?>
