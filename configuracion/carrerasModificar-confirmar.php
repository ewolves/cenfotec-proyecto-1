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
		<header>
					<a href="../index.html" class="home">
						<h1 class="logo">Gestor Inteligente de Citas</h1>
					</a>

					<!-- Menu principal -->
					<nav class="main-nav">
					<ul>
						<li>
							<a href="../citas/citas.html" class="citas flaticon-calendar68"><span>Citas</span></a>
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
							<a href="perfil.html" class="configuracion active flaticon-machine2"><span>Configuración</span></a>
						</li>
					</ul>
				</nav>

					<section class="busqueda">
						<input id="q" type="text" value="" placeholder="Buscar personas" />
						<button id="btnBuscar" class="flaticon-magnifier12" type="submit"></button>
					</section>

				<section class="usr-info">
					<span class="usr-greeting">Bienvenido, Carlos!</span>
					<img class="usr-photo" src="../images/users/administrador.jpg" width="40" height="40">
					<ul>
						<li>
							<a href="perfil.html" class="usr-editar-perfil">Mi cuenta</a>
						</li>
						<li>
							<a href="../seguridad/iniciarSesion.html" class="usr-cerrar-sesion">Cerrar sesión</a>
						</li>
					</ul>
				</section>
			</header>

			<aside>
                <nav class="secondary-nav">
                    <ul class="sec-nav-category accordion">
                        <li class="accordion-item">
                            <a href="perfil.html">Perfil</a>
                        </li>
                        <li class="accordion-item">
                            <a href="miCuenta.html">Mi cuenta</a>
                        </li>
                        <li class="accordion-item">
                            <a href="consultarCarrerasCarreraModificada.html" class="active">Carreras y cursos</a>
                        </li>
                        <li class="accordion-item">
                            <a href="consultarUsuario.html">Usuarios</a>
                        </li>
                        <li class="accordion-item">
                            <a href="configuracionGeneral.html">General</a>
                        </li>
                    </ul>
                </nav>
            </aside>

			<main>
				<section class="msg-confirm">
					<div class="mod-hd">
						<h2 class="flaticon-male12">Carrera modificada</h2>
					</div>
					<div class="mod-bd">
						<p>La carrera Desarrollo de Software se ha modificado con éxito.</p>

						<a href="consultarCarrerasCarreraModificada.html" class="btn btn-default">Volver</a>
					</div>
				</section>
			</main>
			
			<footer>
				<p>2014 Universidad Cenfotec. Todos los derechos reservados.</p>
			</footer>
		</div>

		<!-- Load JS -->
		<script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
	</body>
</html>