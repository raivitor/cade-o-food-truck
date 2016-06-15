<?php 
	$id = $_GET['idTruck']; 
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
				<h1 class="page-header">Nome do food truck</h1>

			</div>
		</div><!--/.row-->
		
		<?php include_once 'includes/cards.php'; ?>

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Cardápio </div>

					<div class="col-xs-6 col-md-6 col-lg-6">
						<br>
						<form role="form">
							<div class="form-group">
								<label>Nome</label>
								<input class="form-control" placeholder="Nome do produto">
							</div>

							<div class="form-group">
								<label>preco</label>
								<input class="form-control" placeholder="preco">
							</div>

							<div class="form-group">
								<label>Telefone</label>
								<input class="form-control" placeholder="Telefone">
							</div>

							<div class="form-group">
								<label>Sabor</label>
								<select class="form-control">
								  <option>Doce</option>
								  <option>Salgado</option>
								</select>
							</div>

							<div class="form-group">
								<label>Categoria</label>
								<select class="form-control">
								  <option>Sorvete</option>
								  <option>Sanduiche</option>
								  <option>Pizza</option>
								  <option>4</option>
								  <option>5</option>
								</select>
							</div>
							<a href="empresa.php" class="btn btn-primary" >Cadastrar</a>
						</form>
					</div>

					<div class="col-xs-6 col-md-6 col-lg-6">
						<br>
						<table data-toggle="table" >
						    <thead>
						    <tr>
						        <th>Nome</th>
						        <th>Preço</th>
						        <th>Ingredientes</th>
						        <th>Descricao </th>
						        <th>Sabor </th>
						        <th>Categoria</th>
						        <th></th>
						    </tr>
						    </thead>
						    <tbody>
						    	<tr>
						    		<td>1</td>
						    		<td>1</td>
						    		<td>1</td>
						    		<td>1</td>
						    		<td>1</td>
						    		<td>1</td>
						    		<td><a href="#" class="btn bg-danger" >Excluir</a>
						    			<a href="#" class="btn btn-primary" >Editar</a></td>
						    	</tr>
						    </tbody>
						</table>
					</div>

				</div>
			</div>
		</div><!--/.row-->	
	</div>	<!--/.main-->
	<?php include_once 'includes/footer.php' ?>
</body>
</html>