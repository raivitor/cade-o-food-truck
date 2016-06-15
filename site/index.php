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
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<?php include_once 'includes/cards.php'; ?>
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Site Traffic Overview</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
								

	</div>	<!--/.main-->

	<?php include_once 'includes/footer.php' ?>
</body>

</html>
