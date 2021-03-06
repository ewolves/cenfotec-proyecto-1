<?php
	error_reporting(0);
	require_once('../includes/functions.php');

	function getCarrerasDirector(){
		$query = 'SELECT tcarrera.id as carreraId, tcarrera.nombre as carreraNombre, tcarrera.activo as carreraActiva, tusuarios.nombre as directorNombre, tusuarios.apellido1 as directorApellido1, tusuarios.apellido2 as directorApellido2 '.
			 	 'FROM tcarrera, tusuarios WHERE tcarrera.idDirector = tusuarios.id ORDER BY tcarrera.nombre';
		$result = do_query($query);
		return $result;
	}

	function displayCarreras() {
		$carreras = getCarrerasDirector();
		while($row = mysqli_fetch_assoc($carreras)){
			$html .= '<div class="accordion-group">';
			$html .= 	'<div class="accordion-heading">
							<a class="accordion-toggle collapsed" href="#collapseTwo_'.utf8_encode($row['carreraId']).'" data-parent="#basic-accordion"
							data-toggle="collapse">'.utf8_encode($row['carreraNombre']).'</a>
				  	  	</div>';
			$html .= 	'<div id="collapseTwo_'.$row['carreraId'].'" class="accordion-body collapse">
							<div class="accordion-inner">
								<form class="detalleCarrera" action="#" method="post">
									<div class="colorDetalleCarrera">
										<fieldset>
											<div class="form-row">
												<label for="text1">Código:</label>
												<input id="text1" type="text"  placeholder="'.utf8_encode($row['carreraId']).'"  class="form-control1"
													readonly="readonly"/>
											</div>
											<div class="form-row">
												<label for="text2">Director académico:</label>
												<input id="text2" type="text" placeholder="'.utf8_encode($row['directorNombre']).' '.utf8_encode($row['directorApellido1']).' '.utf8_encode($row['directorApellido2']).'"
												class="form-control1" readonly="readonly"/>
											</div>
											<div class="form-row">
												<a href="consultarCursos.php?idCarrera='.utf8_encode($row['carreraId']).'" class="flaticon-list40">Ver cursos</a>
											</div>
											<div class="form-row form-row-buttonAcciones" id="'.utf8_encode($row['carreraId']).'">
												<input type="button" class="btn btn-secondaryAction" id="btn_enable" '.($row['carreraActiva'] == 1? 'disabled' : '').'
													value="Habilitar">
												<input type="button" class="btn btn-secondaryAction" id="btn_disable" '.($row['carreraActiva'] == 1? '' : 'disabled').'
													value="Deshabilitar">
												<input type="button" class="btn btn-secondaryAction" id="btnModificar" value="Modificar" onclick=location.href="/cenfotec-proyecto-1/configuracion/carrerasModificar.php?idCarrera='.utf8_encode($row['carreraId']).'">
											</div>
										</fieldset>
									</div>
								</form>
							</div>
						</div>
					</div>';
		}
		
		return $html;
	}

	function buscarCriterioCarrera(){


		if(isset( $_GET['pnombreCarrera'])){
		$nombre = utf8_decode($_GET['pnombreCarrera']);
		$query =  "SELECT tcarrera.id as carreraId, tcarrera.nombre as carreraNombre, tcarrera.activo as carreraActiva, tusuarios.nombre as directorNombre,
		 tusuarios.apellido1 as directorApellido1, tusuarios.apellido2 as directorApellido2 FROM tcarrera, tusuarios WHERE
		  tcarrera.idDirector = tusuarios.id AND tcarrera.nombre LIKE('%$nombre%') ORDER BY tcarrera.nombre";
	} else {

		$query = 'SELECT tcarrera.id as carreraId, tcarrera.nombre as carreraNombre, tcarrera.activo as carreraActiva, tusuarios.nombre as directorNombre, tusuarios.apellido1 as directorApellido1, tusuarios.apellido2 as directorApellido2 FROM tcarrera, tusuarios WHERE tcarrera.idDirector = tusuarios.id ORDER BY tcarrera.nombre';

	}

	$result = do_query($query);
		return $result;


		}
	

	function displayCarrerasFiltradas() {
		$carrerasFiltradas= buscarCriterioCarrera();
		while($row = mysqli_fetch_assoc($carrerasFiltradas)){
			$html .= '<div class="accordion-group">';
			$html .= 	'<div class="accordion-heading">
							<a class="accordion-toggle collapsed" href="#collapseTwo_'.utf8_encode($row['carreraId']).'" data-parent="#basic-accordion"
							data-toggle="collapse">'.utf8_encode($row['carreraNombre']).'</a>
				  	  	</div>';
			$html .= 	'<div id="collapseTwo_'.$row['carreraId'].'" class="accordion-body collapse">
							<div class="accordion-inner">
								<form class="detalleCarrera" action="#" method="post">
									<div class="colorDetalleCarrera">
										<fieldset>
											<div class="form-row">
												<label for="text1">Código:</label>
												<input id="text1" type="text"  placeholder="'.utf8_encode($row['carreraId']).'"  class="form-control1"
													readonly="readonly"/>
											</div>
											<div class="form-row">
												<label for="text2">Director académico:</label>
												<input id="text2" type="text" placeholder="'.utf8_encode($row['directorNombre']).' '.utf8_encode($row['directorApellido1']).' '.utf8_encode($row['directorApellido2']).'"
												class="form-control1" readonly="readonly"/>
											</div>
											<div class="form-row">
												<a href="consultarCursos.php?idCarrera='.utf8_encode($row['carreraId']).'" class="flaticon-list40">Ver cursos</a>
											</div>
											<div class="form-row form-row-buttonAcciones" id="'.utf8_encode($row['carreraId']).'">
												<input type="button" class="btn btn-secondaryAction" id="btn_enable" '.($row['carreraActiva'] == 1? 'disabled' : '').'
													value="Habilitar">
												<input type="button" class="btn btn-secondaryAction" id="btn_disable" '.($row['carreraActiva'] == 1? '' : 'disabled').'
													value="Deshabilitar">
												<input type="button" class="btn btn-secondaryAction" id="btnModificar" value="Modificar" onclick=location.href="/cenfotec-proyecto-1/configuracion/carrerasModificar.php?idCarrera='.utf8_encode($row['carreraId']).'">
											</div>
										</fieldset>
									</div>
								</form>
							</div>
						</div>
					</div>';
		}
		
		echo json_decode($html);
	}	



	function getSpecificCarrera($pidCarrera){
		
		$query = "SELECT tcarrera.id as carreraId, tcarrera.nombre as carreraNombre, tusuarios.id as idusuario, tusuarios.nombre as directorNombre, tusuarios.apellido1 as directorApellido1, tusuarios.apellido2 as directorApellido2
			 	  FROM tcarrera, tusuarios WHERE tcarrera.id='$pidCarrera' AND tcarrera.idDirector = tusuarios.id";	 	 
		 
		$result = do_query($query);	
		$row = mysqli_fetch_assoc($result);
				
		return $row;
	}
	
	// obtener directores academicos
	function obtenerDirectores(){
		$query = "SELECT * FROM tusuarios WHERE rol=3 AND activo=1";
		$result = do_query($query);
		return $result;
	}

	function mostrarDirectores() {
		$directores = obtenerDirectores();

		while($row = mysqli_fetch_assoc($directores)){
			echo '<option value='.$row['id'].' > '.utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']).'</option>';
		}
	}

	function actualizarEstado(){
		if (isset($_POST['pId_carrera']) && isset($_POST['pEstado'])) {
			$idCarrera = utf8_decode($_POST['pId_carrera']);
			$estado = utf8_decode($_POST['pEstado']);
			$query = "UPDATE tcarrera SET activo='$estado' WHERE id='$idCarrera'";
			$result = do_query($query);		
		}
	}


		function actualizarEstadoCurso(){
		if (isset($_POST['pId_curso']) && isset($_POST['pEstado'])) {
			$idCurso = utf8_decode($_POST['pId_curso']);
			$estado = utf8_decode($_POST['pEstado']);
			$query = "UPDATE tcursos SET activo='$estado' WHERE id='$idCurso'";
			$result = do_query($query);		
		}
	}

	if($_SERVER['REQUEST_METHOD']=="POST") {
		$function = $_POST['call'];
		if(function_exists($function)) {
	    	call_user_func($function);
		} else {
	    	echo 'Function Not Exists!!';
		}
	}

?>
