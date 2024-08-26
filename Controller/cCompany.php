<?php
    include_once('Model/mCompany.php');
    class controlCompany{

        function viewAllCompany(){
            $m = new modelCompany();
            $tblCompany = $m -> SelectAllCompany();
            return $tblCompany;
        }
        
    }
?>


