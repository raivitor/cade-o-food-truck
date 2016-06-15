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
					<div class="panel-heading">Minhas empresas <a href="empresaNova.php" class="btn btn-primary" >Adicionar</a>
					</div>
					<div class="panel-body">
						<table data-toggle="table" >
						    <thead>
						    <tr>
						        <th data-field="id" >Empresa ID</th>
						        <th data-field="name">Nome</th>
						        <th data-field="price">CNPJ</th>
						        <th> </th>
						        <th> </th>
						    </tr>
						    </thead>
						    <tbody>
						    	<tr>
						    		<td>1</td>
						    		<td>1</td>
						    		<td>1</td>
						    		<td><a href="empresaDetalhe.php?id=1" class="btn btn-primary" >Detalhes</a></td>
						    		<td><a href="empresa.php" class="btn bg-danger" >Excluir</a></td>
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