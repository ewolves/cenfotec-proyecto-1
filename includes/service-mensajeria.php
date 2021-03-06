<?php session_start(); 
    error_reporting(0);
	require_once('../includes/functions.php');
	require_once('../includes/functions-mensajeria.php');

	// Retornar un json.
	header('Content-Type:application/json');

	// Procesar el request (url)
	if (!empty($_GET['query'])) {
		$queryType = $_GET['query'];

		switch ($queryType) {
			case 'crearConversacion':
				crearConversacion();
				break;
			case 'obtenerNuevosMensajes':
				obtenerNuevosMensajes();
				break;
		}
	} else {
		// Invalid request.
		deliver_response(400, 'Bad request', NULL);
	}

	function crearConversacion() {
		insertConversacion($_SESSION['usuarioActivoId'], $_GET['idReceptor'], $_GET['mensaje'], $_GET['horaFecha']);
		deliver_response(200, 'OK', NULL);
	}
	
	function obtenerNuevosMensajes() {
		$nuevosMensajes = getNuevosMensajes($_SESSION['usuarioActivoId'], $_GET['idUsuarioOtro']);
		deliver_response(200, 'OK', json_encode($nuevosMensajes));
	}
	
	function obtenerTotalNoLeidos(){
		$total = getTotalNoLeidos($_SESSION['usuarioActivoId']);
		deliver_response(200,'OK',json_encode($total));
	}


	
	// Esta función retorna la respuesta que se enviará
	// a la solicitud de ajax.
	// Parámetros:
	//   $status: código del estado (referencia: https://dev.twitter.com/docs/error-codes-responses)
	// 		200: OK
	// 		400: Bad Request
	//   $statusMessage: mensaje a mostrar para el valor de $status
	//   $data: el objeto a retornar.
	// Ejemplo:
	// deliver_response(200, 'OK', json_encode($ARRAY_CON_DATOS));
	function deliver_response($status, $statusMessage, $data) {
		header("HTTP/1.1 $status $statusMessage");
		$response['status'] = $status;
		$response['status-message'] = $statusMessage;
		$response['data'] = $data;

		echo json_encode($response);
	} 
?>