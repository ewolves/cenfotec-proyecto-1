<!DOCTYPE html>
<html>
	<head>
		<title><?php echo APP_TITLE; ?></title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/gic.css">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/pages/citas.css">
	</head>
	<body>
		<div class="wrapper">
			<header>
				<a href="../index.html" class="home">
					<h1 class="logo">Gestor Inteligente de Citas</h1>
				</a>

				<!-- Menu principal -->
				<nav class="main-nav">
					<ul>
						<li>
							<a href="citas.html" class="citas active flaticon-calendar68"><span>Citas</span></a>
						</li>
						<li>
							<a href="../evaluacion/miRanking.html" class="evaluacion flaticon-verification5"><span>Evaluación</span></a>
						</li>
						<li>
							<a href="../mensajeria/mensajeria.html" class="mensajeria flaticon-black218"><span>Mensajería</span></a>
						</li>
						<li>
							<a href="../reportes/reportes.html" class="reportes flaticon-seo2"><span>Reportes</span></a>
						</li>
						<li>
							<a href="../configuracion/perfil.html" class="configuracion flaticon-machine2"><span>Configuración</span></a>
						</li>
					</ul>
				</nav>

				<section class="busqueda">
					<input id="q" type="text" value="" placeholder="Buscar personas" />
					<button id="btnBuscar" class="flaticon-magnifier12" type="submit"></button>
				</section>

				<section class="usr-info">
					<span class="usr-greeting">Bienvenido, Álvaro!</span>
					<img class="usr-photo" src="../images/users/default-user.png" width="40" height="40">
					<ul>
						<li>
							<a href="../configuracion/perfil.html" class="usr-editar-perfil">Mi cuenta</a>
						</li>
						<li>
							<a href="../seguridad/iniciarSesion.html" class="usr-cerrar-sesion">Cerrar sesión</a>
						</li>
					</ul>
				</section>
			</header>

			<aside>
				<nav class="secondary-nav">
					<ul class="sec-nav-category">
						<li class="accordion-item">
							<a href="citas.html">Agenda</a>							
						</li>
						<li class="accordion-item expanded">
							<span id="crearSolicitud" class="flaticon-add73"></span>
							<a href="solicitudes.html" class="active">Solicitudes de cita</a>
							<ul class="thrd-nav-category accordion-detail">
								<li><a href="solicitudes.html">Ernesto Rivera</a></li>
								<li><a href="solicitudesEstudiantes.html">Pablo Monestel</a></li>
								<li>
									<span class="listo flaticon-check34"></span>
									<a href="solicitudInfo.html">Alejandro Leiva</a>
								</li>
								<li>
									<span class="listo flaticon-check34"></span>
									<a href="#">Olger Cubillo</a>
								</li>
								<li>
									<span class="listo flaticon-check34"></span>
									<a href="#">Rocío Solano</a>
								</li>
								<li>
									<span class="listo flaticon-check34"></span>
									<a href="#">Alejandro Villalobos</a>
								</li>
							</ul>
						</li>
					</ul>
				</nav>
			</aside>

			<main>
				<section class="msg-confirm">
					<div class="mod-hd">
						<h2 class="flaticon-cancel17"><?php echo urldecode($_GET['titulo']) ?></h2>
					</div>
					<div class="mod-bd">
						<p>Se ha enviado un mensaje al correo electrónico de <strong><?php echo urldecode($_GET['nombreInvitado']) ?></strong> para notificarle sobre la acción realizada.</p>
						
						<a href="solicitudes.php?idCita=0" class="btn btn-default">Volver</a>
					</div>
				</section>
			</main>
			
			<footer>
				<p>2014 Universidad Cenfotec. Todos los derechos reservados.</p>
			</footer>
		</div>

		<!-- Load JS -->
        <script src="/cenfotec-proyecto-1/js/vendors/jquery-1.8.3.min.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/bootstrap.min.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/bootstrap-select.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/flatui-checkbox.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/flatui-radio.js"></script>
        <script src="/cenfotec-proyecto-1/js/gic.js"></script>
		<script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
		<script src="/cenfotec-proyecto-1/js/solicitarCita.js"></script>
	</body>
</html>