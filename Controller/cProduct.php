<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
    include_once('Model/mProduct.php');
    class controlProduct{
        function getAllProduct(){
            $p = new modelProduct();
            $tblProduct = $p -> SelectAllProduct();
            return $tblProduct;
        }

        function getAllProductByCompany($comp)
        {
            $p = new modelProduct(); 
            $tblProduct = $p->SelectAllProductByCompany($comp);
            return $tblProduct;
        }

        function getSearchProduct($search){
            $p = new modelProduct();
            $tblProduct = $p -> SelectProductBySearch($search);
            return $tblProduct;
        }

        function getFilterProduct($fistFilter, $lastFilter)
        {
            $p = new modelProduct(); 
            $tblProduct = $p->SelectProductByFilter($fistFilter, $lastFilter);
            return $tblProduct;
        }
    }
?>