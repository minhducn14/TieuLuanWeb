<meta charset="UTF-8">
<?php
    include_once('Controller/cProduct.php');
    function viewAllProduct() {   
        $p = new controlProduct();
        
        if (isset($_REQUEST["Comp"])) {
            $comp = $_REQUEST["Comp"];
            $tblProduct = $p->getAllProductByCompany($comp);
            displayProduct($tblProduct);
        } elseif (isset($_REQUEST["btnSearch"])) {
            $search = $_REQUEST['btnSearch'];
            if (!$search) {
                echo header("refresh: 0; url='index.php'");
            } else {
                $tblProduct = $p->getSearchProduct($search); 
                displayProduct($tblProduct);
            }
        } else {
            $tblProduct = $p->getAllProduct();
            displayProduct($tblProduct);
        }
    }
    
    function displayProduct($tblProduct) {
        if ($tblProduct) {
            $numRows = mysqli_num_rows($tblProduct);
            if ($numRows > 0) {
                $dem = 0;
                echo "<div class='row'>";
                while ($row = mysqli_fetch_assoc($tblProduct)) {
                    echo "<div class='col-md-3'>";
                        echo "<figure class='product-style'>";
                            echo "<img src='images/" . $row["SachImage"] . "' alt='" . $row["TenSach"] . "' class='product-item'>";
                            echo "<figcaption>";
                                echo "<h3>" . $row['TenSach'] . "</h3>";
                                echo "<p>" . $row['TacGia'] . "</p>";
                                echo "<div class='item-price'>" . number_format($row["Gia"], 0, ".", ".") . "VNĐ</div>";
                            echo "</figcaption>";
                        echo "</figure>";
                    echo "</div>";
                    $dem++;
                    if ($dem % 4 == 0) {
                        echo "</div><div class='row'>";
                        $dem = 0;
                    }
                }
                echo "</div>";
            } else {
                echo "0 result";
            }
        } else {
            echo "Không có giá trị nào";
        }
    }  

    function displayProductByFilter($fistFilter,$lastFilter){
        $p = new controlProduct();
        $tblProduct = $p->getFilterProduct($fistFilter, $lastFilter);
        displayProduct($tblProduct);
    }      
?>