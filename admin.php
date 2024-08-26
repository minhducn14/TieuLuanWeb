<!DOCTYPE html>
	<html lang="vn">
	<head>
		<title>Book Store</title>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="format-detection" content="telephone=no">
	    <meta name="apple-mobile-web-app-capable" content="yes">
	    <link rel="stylesheet" type="text/css" href="css/normalize.css">
	    <link rel="stylesheet" type="text/css" href="icomoon/icomoon.css">
	    <link rel="stylesheet" type="text/css" href="css/vendor.css">
	    <link rel="stylesheet" type="text/css" href="style.css">
		<script src="js/modernizr.js"></script>
	</head>
<body>

<div id="header-wrap">
	<div class="top-content">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
				</div>
				<div class="col-md-6">
					<div class="right-element">
						<a href="admin.php" class="user-account for-buy"><i class="icon icon-user"></i><span>Admin</span></a>
						<a href="#" class="cart for-buy"><i class="icon icon-clipboard"></i><span>Số dư:(0 VNĐ)</span></a>

						<div class="action-menu">

							<div class="search-bar">
								<a href="#" class="search-button search-toggle" data-selector="#header-wrap">
									<i class="icon icon-search"></i>
								</a>
								<form role="search" method="get" class="search-box">
									<input class="search-field text search-input" name="btnSearch" placeholder="Search" type="search">
								</form>
							</div>
						</div>

					</div>
				</div>
				
			</div>
		</div>
	</div>

	<header id="header">
		<div class="container">
			<div class="row">

				<div class="col-md-2">
					<div class="main-logo">
						<a href="index.php"><img src="images/main-logo.png" alt="logo"></a>
					</div>
				</div>
				<div class="col-md-10">
					
					<nav id="navbar">
						<div class="main-menu stellarnav">
							<ul class="menu-list">
								<li class="menu-item active"><a href="index.php" data-effect="Home">Home</a></li>
								<li class="menu-item"><a href="#about" class="nav-link" data-effect="About">About</a></li>
								<li class="menu-item has-sub">
									<a href="#pages" class="nav-link" data-effect="Pages">Page</a>

									<ul>
								        <li class="active"><a href="index.php">Home</a></li>
								        <li><a href="#">Về chúng tôi</a></li>
								        <li><a href="#">Phong cách</a></li>
								        <li><a href="#">Blog</a></li>
								        <li><a href="#">Contact</a></li>
								     </ul>

								</li>
								<li class="menu-item"><a href="#popular-books" class="nav-link" data-effect="Shop">Shop</a></li>
								<li class="menu-item"><a href="#latest-blog" class="nav-link" data-effect="Articles">Articles</a></li>
								<li class="menu-item"><a href="#contact" c	lass="nav-link" data-effect="Contact">Contact</a></li>
							</ul>

							<div class="hamburger">
				                <span class="bar"></span>
				                <span class="bar"></span>
				                <span class="bar"></span>
				            </div>

						</div>
					</nav>

				</div>

			</div>
		</div>
	</header>
		
</div>

<section id="popular-books" class="bookshelf">
	<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="section-header align-center">
				<h2 class="section-title">Trang dành cho quản trị viên</h2>
			</div>
		</div>
        <table border="1px solid" style="margin: auto; text-align: center; width: 1200px">
        <tr class="normal">
			<td colspan="2"><h2 class="banner-title">Trang quản lý</h2></td>
        </tr>
        <tr class="normal">
            <td colspan="2"><a href="index.php">Trang chủ</a></td>
        </tr>
        <tr class="_normal">
            <td id="left">
                <a href="admin.php?action=aComp">Quản lý loại sách</a>
                <br>
                <a href="admin.php?action=aProd">Quản lý sách</a>
            </td>
            <td id="main">
                <?php
					include("View/vCompanyAdmin.php");
                    include("View/vProductAdmin.php");
					if(isset($_REQUEST['action'])){
						if($_REQUEST['action'] == "addComp"){
							showAddCompany();
						} elseif($_REQUEST['action'] == "addProd"){ 
							showAddProduct();
						} elseif($_REQUEST['action'] == "aComp"){
							displayAdminCompany(); 
						} elseif($_REQUEST['action'] == "aProd"){ 
							showAllProductAdmin(); 
						} 
					} elseif (isset($_REQUEST['btnSubmitActionProd'])) {
						$action = $_REQUEST['btnSubmitActionProd'];
						if ($action == "Sửa") {
							showUpdateProduct();
						} elseif ($action == "Xoá") {
							showDeleteProduct();
						}
					}	elseif (isset($_REQUEST['btnSubmitActionSach'])) {
						$action = $_REQUEST['btnSubmitActionSach'];
						if ($action == "Xoá") {
							showDeleteCompany();
						}
					}		
                ?>
            </td>
        </tr>
    </table>
		</div>
	</div>
</section>
<!-- 
<footer id="footer">
	<div class="container">
		<div class="row">

			<div class="col-md-4">
				
				<div class="footer-item">
					<div class="company-brand">
						<img src="images/main-logo.png" alt="logo" class="footer-logo">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sagittis sed ptibus liberolectus nonet psryroin. Amet sed lorem posuere sit iaculis amet, ac urna. Adipiscing fames semper erat ac in suspendisse iaculis.</p>
					</div>
				</div>
				
			</div>

			<div class="col-md-2">

				<div class="footer-menu">
					<h5>About Us</h5>
					<ul class="menu-list">
						<li class="menu-item">
							<a href="#">vision</a>
						</li>
						<li class="menu-item">
							<a href="#">articles </a>
						</li>
						<li class="menu-item">
							<a href="#">careers</a>
						</li>
						<li class="menu-item">
							<a href="#">service terms</a>
						</li>
						<li class="menu-item">
							<a href="#">donate</a>
						</li>
					</ul>
				</div>

			</div>
			<div class="col-md-2">

				<div class="footer-menu">
					<h5>Discover</h5>
					<ul class="menu-list">
						<li class="menu-item">
							<a href="#">Home</a>
						</li>
						<li class="menu-item">
							<a href="#">Books</a>
						</li>
						<li class="menu-item">
							<a href="#">Authors</a>
						</li>
						<li class="menu-item">
							<a href="#">Subjects</a>
						</li>
						<li class="menu-item">
							<a href="#">Advanced Search</a>
						</li>
					</ul>
				</div>

			</div>
			<div class="col-md-2">

				<div class="footer-menu">
					<h5>My account</h5>
					<ul class="menu-list">
						<li class="menu-item">
							<a href="#">Sign In</a>
						</li>
						<li class="menu-item">
							<a href="#">View Cart</a>
						</li>
						<li class="menu-item">
							<a href="#">My Wishtlist</a>
						</li>
						<li class="menu-item">
							<a href="#">Track My Order</a>
						</li>
					</ul>
				</div>

			</div>
			<div class="col-md-2">

				<div class="footer-menu">
					<h5>Help</h5>
					<ul class="menu-list">
						<li class="menu-item">
							<a href="#">Help center</a>
						</li>
						<li class="menu-item">
							<a href="#">Report a problem</a>
						</li>
						<li class="menu-item">
							<a href="#">Suggesting edits</a>
						</li>
						<li class="menu-item">
							<a href="#">Contact us</a>
						</li>
					</ul>
				</div>

			</div>

		</div>

	</div>
</footer> -->

<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/script.js"></script>

</body>
</html>	