<?php
	session_start(); 
	error_reporting(0);
	require_once('../includes/functions.php');
	require_once(ROOT.'/includes/functions-micuenta.php');
	
	$currentModule = '';
	$currentSubModule = 'contraseña';
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo APP_TITLE; ?></title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/gic.css">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/pages/configuracion.css">
	</head>
	<body>
		<div class="wrapper">
			<?php include(ROOT.'/includes/header.php'); ?>
			<?php include(ROOT.'/includes/aside-miCuenta.php'); ?>

			<main>
				<section>
					<div class="mod-hd">
						<h2>Cambiar contraseña</h2>
					</div>
					<div class="mod-bd">
						<form id="cambiar-contrasena" class="mod-bd form-horizontal" action="" method="post" data-validate="true" novalidate>
						<div class="form-row">
							<label for="contrasena-actual">Contraseña actual:</label>
							<input id="contrasena-actual" type="password" placeholder="Ingrese la contraseña actual" class="form-control" value="" required/>
							<?php 
								$usuarioActivoId = $_SESSION['usuarioActivoId'];
	    						$row = getPassword($usuarioActivoId);
								echo '<input id="usuario-activo" type="hidden" value="'.$usuarioActivoId.'">';
								echo '<input id="clave-usuario" type="hidden" value="'.$row['contrasena'].'">';
							?>							
						</div>

						<div class="form-row">
							<label for="contrasena-nueva">Nueva contraseña:</label>
							<input id="contrasena-nueva" type="password" placeholder="Ingrese la nueva contraseña" class="form-control" value="" required/>
						</div>
						
						<div class="form-row">
							<label for="contrasena-confirmar">Confirmación:</label>
							<input id="contrasena-confirmar" type="password" placeholder="Confirme la nueva contraseña" class="form-control" value="" required/>
						</div>

						<div class="form-row form-row-button">
							<button id="btn-guardar-contrasena" class="btn btn-primary" type="submit">Guardar</button>
						</div>
					</form>
					</div>
				</section>
			</main>
			
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>

		<script src="/cenfotec-proyecto-1/js/vendors/jquery-1.8.3.min.js"></script>
		<script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
		<script src="/cenfotec-proyecto-1/js/micuenta.js"></script>
	</body>
</html>