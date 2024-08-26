<?php

include_once("Model/mCompanyAdmin.php");

class controlCompanyAdmin{
    
    function controlActionCompany() {
        $p = new controlCompanyAdmin();
        if (isset($_REQUEST['btnSubmitActionSach'])) {
            if ($_REQUEST['btnSubmitActionSach'] == 'Xóa') {
                $p->controlDeleteCompany();
            } else {
               
            }
        }
    }
    function getAllCompanyAdmin(){
        $p = new modelCompanyAdmin();
        $tblCompany = $p -> SelectAllCompanyAdmin();
        return $tblCompany;
    }

    function addCompany($LoaiSach){
        $p = new modelCompanyAdmin();
        $result = $p -> insertCompany($LoaiSach);
        return $result;
    }

    function getCompanyUpdate(){
        $p = new modelCompanyAdmin();
        $result = $p -> selectCompany($_REQUEST['MaLoaiSach']);
        return $result;
    }

    function companyExists($LoaiSach){
        $db = new modelCompanyAdmin();
        $existingCompany = $db -> getCompanyByName($LoaiSach);
        return ($existingCompany !== false);
    }

    function controlDeleteCompany() {
        $p = new modelCompanyAdmin();
        $MaLoaiSach = $_REQUEST['MaLoaiSach'];
        $result = $p->deleteCompany($MaLoaiSach);
        return $result;

    }
}