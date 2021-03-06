<?php
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
				<section class="msg-confirm">
					<div class="mod-hd">
						<h2 class="flaticon-male12">Contraseña actualizada</h2>
					</div>
					<div class="mod-bd">
						<p>Su contraseña ha sido actualizada con éxito.</p>
						<a href="/cenfotec-proyecto-1/configuracion/perfil.php" class="btn btn-default">Volver</a>
					</div>
				</section>
			</main>
			
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>

		<!-- Load JS -->
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-1.8.3.min.js"></script>
		<script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
	</body>
</html>