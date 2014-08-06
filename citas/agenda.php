<?php 
	require_once('../includes/functions.php');
	$currentModule = 'citas';
	$currentSubModule = 'agenda'; 
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo APP_TITLE; ?></title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/gic.css">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/pages/citas.css">
	</head>
	<body id="page-agenda">
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
						<li class="accordion-item expanded">
							<a href="citas.html" class="active">Agenda</a>
							<div id="agenda" class="accordion-detail">
								<input id="agenda-fecha" type="text" class="datepicker" />
							</div>
						</li>
						<li class="accordion-item">
							<a href="solicitudes.html">Solicitudes de cita</a>
						</li>
					</ul>
				</nav>
			</aside>

			<?php include(ROOT.'/includes/header.php'); ?>
			<?php include(ROOT.'/includes/aside-citas.php'); ?>


			<main>
				<section class="cita cita-23-07-2014 visible">
					<div class="mod-hd">
						<h2>Miércoles 23 de Julio</h2>
						<span class="cita-hora-inicio-fin">6:00 p.m. a 7:00 p.m.</span>
					</div>
					<div class="mod-bd">
						<div class="row">
							<span class="label">Invitado:</span>
							<div class="data-wrap">
								<span class="data cita-invitado">Juan Carlos Brenes Álvarez</span>
								<span class="data">jbrenesa@ucenfotec.ac.cr</span>
								<span class="data">8850-0504</span>
							</div>
						</div>

						<img class="cita-photo" src="../images/users/juan-carlos-brenes.jpg" width="75" height="75">

						<div class="row">
							<span class="label">Asunto a tratar:</span>
							<span class="data">Casos de uso en formato expandido</span>
						</div>

						<div class="row">
							<span class="label">Curso:</span>
							<span class="data">Proyecto de ingeniería de software 1</span>
						</div>

						<div class="row">
							<span class="label">Modalidad:</span>
							<span class="data">Virtual</span>
						</div>

						<div class="row">
							<span class="label">Tipo:</span>
							<span class="data">Grupal</span>
						</div>

						<div class="row">
							<span class="label">Observaciones:</span>
							<span class="data">Profesor, nuestro equipo quiere recibir retroalimentación sobre nuestros casos de uso en formato expandido. Mi id de skype es: juancarlos.brenes</span>
						</div>
						<div class="form-row form-row-button">
							<a href="/cenfotec-proyecto-1/citas/citaFinalizada.php" class="btn btn-primary js-modal" data-modal-id="modal-finalizar">Finalizar</a>
							<a href="/cenfotec-proyecto-1/citas/citaCancelada.php" class="btn btn-default js-modal" data-modal-id="modal-cancelar">Cancelar</a>
						</div>
					</div>
				</section>

				<section class="cita cita-24-07-2014">
					<div class="mod-hd">
						<h2>Jueves 24 de Julio</h2>
						<span class="cita-hora-inicio-fin">2:00 p.m. a 3:00 p.m.</span>
					</div>
					<div class="mod-bd">
						<div class="row">
							<span class="label">Invitado:</span>
							<div class="data-wrap">
								<span class="data cita-invitado">Diego Barillas Valverde</span>
								<span class="data">dbarillasv@ucenfotec.ac.cr</span>
								<span class="data">2568-5635</span>
							</div>
						</div>

						<img class="cita-photo" src="../images/users/diego-barillas.jpg" width="75" height="75">

						<div class="row">
							<span class="label">Asunto a tratar:</span>
							<span class="data">Casos de uso</span>
						</div>

						<div class="row">
							<span class="label">Curso:</span>
							<span class="data">Proyecto de ingeniería de software 1</span>
						</div>

						<div class="row">
							<span class="label">Modalidad:</span>
							<span class="data">Virtual</span>
						</div>

						<div class="row">
							<span class="label">Tipo:</span>
							<span class="data">Grupal</span>
						</div>

						<div class="row">
							<span class="label">Observaciones:</span>
							<span class="data">Hola profe, es sobre casos de uso expandidos.</span>
						</div>
						<div class="form-row form-row-button">
							<a href="/cenfotec-proyecto-1/citas/citaFinalizada.php" class="btn btn-primary js-modal" data-modal-id="modal-finalizar">Finalizar</a>
							<a href="/cenfotec-proyecto-1/citas/citaCancelada.php" class="btn btn-default js-modal" data-modal-id="modal-cancelar">Cancelar</a>
						</div>
					</div>
				</section>

				<section class="cita cita-28-07-2014">
					<div class="mod-hd">
						<h2>Lunes 28 de Julio</h2>
						<span class="cita-hora-inicio-fin">4:00 p.m. a 5:00 p.m.</span>
					</div>
					<div class="mod-bd">
						<div class="row">
							<span class="label">Invitado:</span>
							<div class="data-wrap">
								<span class="data cita-invitado">Susana Fuentes Morales</span>
								<span class="data">sfuentesm@ucenfotec.ac.cr</span>
								<span class="data">7002-2414</span>
							</div>
						</div>

						<img class="cita-photo" src="../images/users/susana-fuentes.jpg" width="75" height="75">

						<div class="row">
							<span class="label">Asunto a tratar:</span>
							<span class="data">Algoritmos</span>
						</div>

						<div class="row">
							<span class="label">Curso:</span>
							<span class="data">Fundamentos de programación</span>
						</div>

						<div class="row">
							<span class="label">Modalidad:</span>
							<span class="data">Presencial</span>
						</div>

						<div class="row">
							<span class="label">Tipo:</span>
							<span class="data">Individual</span>
						</div>

						<div class="row">
							<span class="label">Observaciones:</span>
							<span class="data">Tengo disponibilidad los lunes y jueves por las tardes.</span>
						</div>

						<div class="form-row form-row-button">
							<a href="/cenfotec-proyecto-1/citas/citaFinalizada.php" class="btn btn-primary js-modal" data-modal-id="modal-finalizar">Finalizar</a>
							<a href="/cenfotec-proyecto-1/citas/citaCancelada.php" class="btn btn-default js-modal" data-modal-id="modal-cancelar">Cancelar</a>
						</div>
					</div>
				</section>

				<section class="cita cita-29-07-2014">
					<div class="mod-hd">
						<h2>Martes 29 de Julio, 2014</h2>
						<span class="cita-hora-inicio-fin">5:00 p.m. a 6:00 p.m.</span>
					</div>
					<div class="mod-bd">
						<div class="row">
							<span class="label">Invitado:</span>
							<div class="data-wrap">
								<span class="data cita-invitado">Luis Guzmán Valverde</span>
								<span class="data">lguzmanv@ucenfotec.ac.cr</span>
								<span class="data">8337-9008</span>
							</div>
						</div>

						<img class="cita-photo" src="../images/users/luis-guzman.jpg" width="75" height="75">

						<div class="row">
							<span class="label">Asunto a tratar:</span>
							<span class="data">Revisión de la ERS</span>
						</div>

						<div class="row">
							<span class="label">Curso:</span>
							<span class="data">Proyecto de ingeniería de software 1</span>
						</div>

						<div class="row">
							<span class="label">Modalidad:</span>
							<span class="data">Presencial</span>
						</div>

						<div class="row">
							<span class="label">Tipo:</span>
							<span class="data">Grupal</span>
						</div>

						<div class="row">
							<span class="label">Observaciones:</span>
							<span class="data">Profesor, queremos recibir sus comentarios sobre la ERS. Gracias.</span>
						</div>

						<div class="form-row form-row-button">
							<a href="/cenfotec-proyecto-1/citas/citaFinalizada.php" class="btn btn-primary js-modal" data-modal-id="modal-finalizar">Finalizar</a>
							<a href="/cenfotec-proyecto-1/citas/citaCancelada.php" class="btn btn-default js-modal" data-modal-id="modal-cancelar">Cancelar</a>
						</div>
					</div>
				</section>

				<section class="cita cita-30-07-2014">
					<div class="mod-hd">
						<h2>Miércoles 30 de Julio, 2014</h2>
						<span class="cita-hora-inicio-fin">1:00 p.m. a 2:00 p.m.</span>
					</div>
					<div class="mod-bd">
						<div class="row">
							<span class="label">Invitado:</span>
							<div class="data-wrap">
								<span class="data cita-invitado">Walter Torres García</span>
								<span class="data">wtorresg@ucenfotec.ac.cr</span>
								<span class="data">6054-8488</span>
							</div>
						</div>

						<img class="cita-photo" src="../images/users/walter-torres.jpg" width="75" height="75">

						<div class="row">
							<span class="label">Asunto a tratar:</span>
							<span class="data">Revisión de casos de uso en formato expandido</span>
						</div>

						<div class="row">
							<span class="label">Curso:</span>
							<span class="data">Proyecto de ingeniería de software 1</span>
						</div>

						<div class="row">
							<span class="label">Modalidad:</span>
							<span class="data">Presencial</span>
						</div>

						<div class="row">
							<span class="label">Tipo:</span>
							<span class="data">Grupal</span>
						</div>

						<div class="row">
							<span class="label">Observaciones:</span>
							<span class="data">Quiero recibir una tutoría sobre herencia, métodos privados y públicos.</span>
						</div>

						<div class="form-row form-row-button">
							<a href="/cenfotec-proyecto-1/citas/citaFinalizada.php" class="btn btn-primary js-modal" data-modal-id="modal-finalizar">Finalizar</a>
							<a href="/cenfotec-proyecto-1/citas/citaCancelada.php" class="btn btn-default js-modal" data-modal-id="modal-cancelar">Cancelar</a>
						</div>
					</div>
				</section>

				<section class="cita cita-31-07-2014">
					<div class="mod-hd">
						<h2>Jueves 31 de Julio, 2014</h2>
						<span class="cita-hora-inicio-fin">2:00 p.m. a 3:00 p.m.</span>
					</div>
					<div class="mod-bd">
						<div class="row">
							<span class="label">Invitado:</span>
							<div class="data-wrap">
								<span class="data cita-invitado">Marcela Madriz López</span>
								<span class="data">mmadrizl@ucenfotec.ac.cr</span>
								<span class="data">8822-3456</span>
							</div>
						</div>

						<img class="cita-photo" src="../images/users/marcela-madriz.jpg" width="75" height="75">

						<div class="row">
							<span class="label">Asunto a tratar:</span>
							<span class="data">Diagramas de flujo</span>
						</div>

						<div class="row">
							<span class="label">Curso:</span>
							<span class="data">Fundamentos de programación</span>
						</div>

						<div class="row">
							<span class="label">Modalidad:</span>
							<span class="data">Presencial</span>
						</div>

						<div class="row">
							<span class="label">Tipo:</span>
							<span class="data">Individual</span>
						</div>

						<div class="row">
							<span class="label">Observaciones:</span>
							<span class="data">Hola! Necesito una tutoría sobre diagramas de flujo. Los miércoles es el día que más me conviene.</span>
						</div>

						<div class="form-row form-row-button">
							<a href="/cenfotec-proyecto-1/citas/citaFinalizada.php" class="btn btn-primary js-modal" data-modal-id="modal-finalizar">Finalizar</a>
							<a href="/cenfotec-proyecto-1/citas/citaCancelada.php" class="btn btn-default js-modal" data-modal-id="modal-cancelar">Cancelar</a>
						</div>
					</div>
				</section>

				<section class="cita no-cita">
					<p class="flaticon-information38">No hay citas agendadas.</p>
				</section>


				<div id="modal-finalizar" class="modal js-modal-window">
					<span class="close flaticon-close3 js-modal-close">Close</span>
					<h3>¿Está seguro que desea finalizar la cita de atención?</h3>
					<div class="form-row">
						<a href="/cenfotec-proyecto-1/citas/citaFinalizada.php" class="btn btn-primary js-modal-aceptar">Sí</a>
						<a href="#" class="btn btn-default js-modal-close">No</a>
					</div>
				</div>
				<div id="modal-cancelar" class="modal js-modal-window">
					<span class="close flaticon-close3 js-modal-close">Close</span>
					<h3>¿Está seguro que desea cancelar la cita de atención?</h3>
					<div class="form-row">
						<a href="/cenfotec-proyecto-1/citas/citaCancelada.php" class="btn btn-primary js-modal-aceptar">Sí</a>
						<a href="#" class="btn btn-default js-modal-close">No</a>
					</div>
				</div>
			</main>
			
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>

		<!-- Load JS -->
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-1.8.3.min.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-ui.js"></script>
		<script src="/cenfotec-proyecto-1/js/gic.js"></script>
        <script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
        <script src="/cenfotec-proyecto-1/js/citas.js"></script>
	</body>
</html>