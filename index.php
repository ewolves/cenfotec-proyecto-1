<?php 
	require_once('includes/functions.php');
	$currentModule = ''; 
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo APP_TITLE; ?></title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/gic.css">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/pages/dashboard.css">
	</head>
	<body>
		<div class="wrapper">
			<?php include(ROOT.'/includes/header.php'); ?>

			<main class="dashboard">
				<?php include(ROOT.'/includes/agenda.php'); ?>

				<?php include(ROOT.'/includes/mi-ranking.php'); ?>
				
				<?php include(ROOT.'/includes/mensajes-nuevos.php'); ?>

				<?php include(ROOT.'/includes/evaluaciones-pendientes.php'); ?>
			</main>
			
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>
		<!-- Load JS -->
        <script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
	</body>
</html>