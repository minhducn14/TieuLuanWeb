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
								<li class="menu-item"><a href="#contact" class="nav-link" data-effect="Contact">Contact</a></li>
							</ul>
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
				<h2 class="section-title">Sách</h2>
			</div>
   
			<ul class="tabs">
				<?php
					include_once('View/vCompany.php');
                    viewAllCompany();
				?>
			</ul>
			<form action="#" method="get"  style="padding-left:330px">
                    Tìm kiếm theo giá <input type="number" name="min" value="<?php if(isset($_REQUEST["min"])) echo $_REQUEST["min"] ?>" size="10px"> 
                    - <input type="number" name="max" value="<?php if(isset($_REQUEST["max"])) echo $_REQUEST["max"] ?>" size="10px">
                    <input type="submit" class="btn btn-outline-warning" value="Tìm kiếm">
                </form>
			<div class="tab-content">
			  <div id="all-genre" data-tab-content class="active">
					<?php 
						include_once('View/vProduct.php');
						
						if(isset($_REQUEST["min"]) && $_REQUEST["max"]){
							displayProductByFilter($_REQUEST["min"] , $_REQUEST["max"]);
						}else{
							viewAllProduct();
						}
					?>
			  </div>
			</div>

		</div>
			
		</div>
	</div>
</section>

<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/script.js"></script>

</body>
</html>	