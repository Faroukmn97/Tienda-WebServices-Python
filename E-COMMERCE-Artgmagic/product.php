<?php
	session_start();
	if(!isset($_SESSION['id_user'])){
		header('location: login.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ArtMagic</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<script src="js/librarys/jquery-3.4.1.min.js" type="text/javascript"></script>
	<link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" href="css/load.css">
	<script src="js/librarys/sweetalert.min.js" type="text/javascript"></script>
</head>
<body>
	<header>
		<div class="logo-place"><a href="index.php"><img src="assets/logo.png"></a></div>
		<div class="search-place">
			<input type="text" id="idsearch" placeholder="Encuentra todo lo que necesitas en ArtMagic...">
		    <button class="btn-main btn-search"><i class="fa fa-search" aria-hidden="true"></i> 
			</button>
		</div>
		<div class="options-place">	
				<?php
					if(isset($_SESSION['id_user'])) {
						echo'<div class="item-option">
						<i class="fa fa-user-circle-o" arian-hidden="true"> </i> <span>'.$_SESSION['nameus'].'</span></div>';
					}else{ 
					?>
					<div class="item-option" tittle="Registrate">
						<i class="fa fa-user-circle-o" arian-hidden="true"> </i>
					</div>
					
					<div class="item-option" tittle="Ingresar">
						<i class="fa fa-sign-in" arian-hidden="true"> </i>
					</div>
				<?php
					} 
				?>

				<div class="item-option" tittle="Mis compras">
					<a href="shopping.php"><i class="fa fa-shopping-cart" arian-hidden="true"> </i></a>
				</div>
		</div>
	</header>
	<div class="main-content">
		<div class="content-page">
            <section>
				<div class="page-partOne">
					<img id="imageid" src="assets/products/crepe.jpg">
				</div>
				<div class="page-partTwo">
					<h2 id="titleid">NOMBRE PRINCIPAL</h2>
					<h4 id="priceid">S/ . 35. <span>99</span></h4>
					<h3 id="descriptionid">Descripción del producto</h3>
                    <button style="float:right;" onclick="start_Buy()">Buy</button>
				</div>
			</section>
			<div class="title-section">
				Featured Products
			</div>
			<div class="products-list" id="space-list">
				
			</div>
		</div>
	</div>
		<!-- MODALS  -->
		<div class="load-modal" id="load-modal-id" style="display:none">
		<div class="la-ball-spin-clockwise">
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
		</div>
	</div>
	<script type="text/javascript" src="js/0_global.js"></script>
    <script type="text/javascript">
		var p='<?php echo $_GET["p"]; ?>';
		var u='<?php echo $_SESSION['id_user']; ?>';
	</script>
	<script type="text/javascript" src="js/product.js"></script>
</body>
</html>