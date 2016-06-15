<?php 
	$id = $_GET['id']; 
?>
<!DOCTYPE html>
<html>
<head>
	<?php require_once 'includes/header.php'; ?>
</head>

<body>
	
	<?php require_once 'includes/navbar.php'; ?>
	<?php require_once 'includes/sidebar.php'; ?>
	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Nome do Truck</h1>

			</div>
		</div><!--/.row-->
		
		<?php include_once 'includes/cards.php'; ?>

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Meus Food Trucks <a href="truckNovo.php" class="btn btn-primary" >Adicionar</a> </div>

					<div class="col-xs-12 col-md-6 col-lg-3">
						<br>

						<a href="#">
							<div class="panel panel-blue panel-widget ">
								<div class="row no-padding">
									<div class="col-sm-3 col-lg-5 widget-left">
										<svg class="glyph stroked location pin"><use xlink:href="#stroked-location-pin"/></svg>

									</div>
									<div class="col-sm-9 col-lg-7 widget-right">
										<div class="large">Rotas</div>
									</div>
								</div>
							</div>
						</a>

						<a href="cardapio.php?idTruck=1">
							<div class="panel panel-blue panel-widget ">
								<div class="row no-padding">
									<div class="col-sm-3 col-lg-5 widget-left">
										<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
									</div>
									<div class="col-sm-9 col-lg-7 widget-right">
										<div class="large">Cardapio</div>
									</div>
								</div>
							</div>
						</a>

						<a href="">
							<div class="panel panel-blue panel-widget ">
								<div class="row no-padding">
									<div class="col-sm-3 col-lg-5 widget-left">
										<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
									</div>
									<div class="col-sm-9 col-lg-7 widget-right">
										<div class="large">Promoção</div>
									</div>
								</div>
							</div>
						</a>
					</div>

				</div>
			</div>
		</div><!--/.row-->	
	</div>	<!--/.main-->
	<?php include_once 'includes/footer.php' ?>
</body>
</html>