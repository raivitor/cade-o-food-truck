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
				<h1 class="page-header">Empresas</h1>
			</div>
		</div><!--/.row-->
		
		<?php include_once 'includes/cards.php'; ?>

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Nova Empresa</div>
					<div class="panel-body">
						<form role="form">
							<div class="form-group">
								<label>Nome</label>
								<input class="form-control" placeholder="Nome da empresa">
							</div>

							<div class="form-group">
								<label>Descrição</label>
								<input class="form-control" placeholder="Descrição">
							</div>

							<div class="form-group">
								<label>Telefone</label>
								<input class="form-control" placeholder="Telefone">
							</div>

							<div class="form-group">
								<label>Gerente</label>
								<select class="form-control">
								  <option>1</option>
								  <option>2</option>
								  <option>3</option>
								  <option>4</option>
								  <option>5</option>
								</select>
							</div>
							<a href="empresa.php" class="btn btn-primary" >Cadastrar</a>
						</form>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
	</div>	<!--/.main-->
	<?php include_once 'includes/footer.php' ?>
</body>
</html>