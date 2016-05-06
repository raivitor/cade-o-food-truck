<html>
    <head>
        <link rel="stylesheet" href="<?= base_url("css/bootstrap.css") ?>">
    </head>
    <body>
    	<div class="container">
    		<h1> Usuários</h1>
	        <table class="table">
	            <?php foreach($usuarios as $usuario) : ?>
	            <tr>
	                <td><?= $usuario["nome"] ?></td>
	                <td><?= $usuario["email"] ?></td>
	            </tr>
	        <?php endforeach ?>
	        </table>
    	</div>
    </body>
</html>