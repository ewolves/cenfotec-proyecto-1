// ------------------------------------------
// CREACION DE UNA NUEVA SOLICITUD
// ------------------------------------------

// ------------------------------------------
// Variables globales
// ------------------------------------------
var btnEnviar=document.querySelector('#btnEnviar');
var btnCrearSolicitud=document.querySelector('#crearSolicitud');

//cargar date picker
var eDatePickers = $('.datepicker');
if (eDatePickers.length) {
	eDatePickers.datepicker({
		dateFormat: 'dd/mm/yy',
		dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
		hideOnSelect: true,
		prevText: 'Prev',
		nextText: 'Sig',
		minDate: new Date(),
		monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
		'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre']
	});
}

//busqueda de cursos
function buscarCurso(evento){
    var resCursos = document.querySelector('#resCursos'),
    input = document.querySelector('#txtCurso');
	autocompletar(resCursos, input, obtenerCursos()[0], obtenerCursos()[1]);
}

var rCursos=document.querySelector('#resCursos');
if(rCursos){
	rCursos.addEventListener('click', function(e) {
		var input = document.querySelector('#txtCurso');
		reemplazarTextoInput(rCursos,input,e.target, "idCurso");		
	});
}
	
//busqueda de invitados
function buscarInvitado(evento){
    var resInvitados = document.querySelector('#resInvitados'),
    input = document.querySelector('#txtInvitado');
	autocompletar(resInvitados, input, obtenerInvitados()[0], obtenerInvitados()[1]);
}

var rInvitados=document.querySelector('#resInvitados');
if(rInvitados){
	rInvitados.addEventListener('click', function(e) {
		var input = document.querySelector('#txtInvitado');
		reemplazarTextoInput(rInvitados,input,e.target, "idInvitado");		
	});
}
	
//obtener cursos
function obtenerCursos() {	
	var resultados=[];
	
	// Solicitar datos al servicio.
	$.ajax({
		url: '../includes/service-cursos.php',
		type: 'get', // Se utiliza get por vamos a obtener datos, no a postearlos.
		data: { // Objeto con los parámetros que utiliza el servicio.
			'query': 'consultarCursosActivos'
		},
		dataType: 'json',
		success: function(response){
			var respuesta=$.parseJSON(response.data);
			var nombres =[];
			var ids = [];
			for (var i=0; i<respuesta.cursos.length; i++)
			{
				nombres.push(respuesta.cursos[i].nombre);
				ids.push(respuesta.cursos[i].id);
			}
			resultados.push(nombres);
			resultados.push(ids);
		},
		error: function(response){
			resultados=null;
		},
		async: false
	});
	return resultados;
};

//obtener profesores
function obtenerInvitados() {	
	var resultados=[];
	
	// Solicitar datos al servicio.
	$.ajax({
		url: '../includes/service-usuarios.php',
		type: 'get', // Se utiliza get por vamos a obtener datos, no a postearlos.
		data: { // Objeto con los parámetros que utiliza el servicio.
			query: 'consultarInvitados'
		},
		dataType: 'json',
		success: function(response){
			var respuesta=$.parseJSON(response.data);
			var nombres =[];
			var ids = [];
			for (var i=0; i<respuesta.invitados.length; i++)
			{
				nombres.push(respuesta.invitados[i].nombre);
				ids.push(respuesta.invitados[i].id);
			}
			resultados.push(nombres);
			resultados.push(ids);
		},
		error: function(response){
			resultados=null;
		},
		async: false
	});
	return resultados;
};


//enviar formulario
if(btnEnviar!=null){
	btnEnviar.addEventListener('click',function(event){
		event.preventDefault();
		if(!inputLlenos('solicitarCita')){
			event.preventDefault();
		}
		else
		{
			if(!hayRadioSeleccionado('rdoModalidad'))
			{
				event.preventDefault();
			}
			else
			{
				if(!hayRadioSeleccionado('rdoTipo'))
				{
					event.preventDefault();
				}
				else
				{
				
					var idcurso = $('#idCurso').text(),
						idSolicitado = $('#idInvitado').text(),
						asunto = $('#txtAsunto').val(),
						modalidad=getRadioChecked('rdoModalidad'),
						tipo=getRadioChecked('rdoTipo'),
						observaciones=$('textarea#txtObservaciones').val();

					var request = $.ajax({
						url: "../includes/service-citas.php",
						type: "get",
						data: {
							   'query': 'crearSolicitud',
							   'idSolicitado' : idSolicitado,
							   'asunto' : asunto,
							   'modalidad' : modalidad,
							   'tipo' : tipo,
							   'observaciones' : observaciones,
							   'idCurso' : idcurso
							  },
						dataType: 'json',
						success: function(response){ 
							var mensaje = '<h3>Nueva solicitud de cita</h3>' +
										  '<p><b>' + $('#txtInvitado').val() + '</b> te ha solicitado una cita sobre:</p>' + 
										  '<p style="font-style: italic;">' + asunto + '</p>',
								subject = 'Nueva solicitud de cita';

							enviarEmail(idSolicitado, subject, mensaje);
							setTimeout(function(){window.location ="solicitudEnviada.php?nombreInvitado="+$('#txtInvitado').val()+"&titulo=La solicitud de cita de atención ha sido realizada";},3000)
							//window.location ="solicitudEnviada.php?nombreInvitado="+$('#txtInvitado').val()+"&titulo=La solicitud de cita de atención ha sido realizada";
							
						},
						error: function(response){
							var error = document.createElement("p");
							error.className="alert-error flaticon-remove11";
							var msj = document.createTextNode("Ya tiene una solicitud pendiente con ese usuario.");
							error.appendChild(msj);
							var botonesDiv=document.querySelector('.form-row-button');
							botonesDiv.appendChild(error);
							
						},
						async: "false"
					});
				}
			}
		}
		
	});
}

//crear nueva solicitud
if(btnCrearSolicitud!=null){
	btnCrearSolicitud.addEventListener('click',function(){
		var url = window.location.pathname;
		var primerDivision = url.split("/");
		primerDivision=primerDivision[primerDivision.length-1];
		if (primerDivision.indexOf("profesor") >= 0)
		{
			window.location = "solicitarCita-profesor.html"
		}
		else
		{
			if (primerDivision.toLowerCase().indexOf("estudiante") >= 0)
			{
				window.location = "solicitarCita-estudiante.html"
			}
			else
			{
				window.location = "solicitarCita.php"
			}
		}
				
	});
}
//obtener el radio activo
function getRadioChecked(radioName){
	var radios = document.getElementsByName(radioName);
	var radioChecked;
	for (var i=0; i<radios.length; i++) {
		if (radios[i].checked) {
			radioChecked=radios[i].value;
		}
	}
	return radioChecked;
}

//aceptar solicitud y proponer hora
var btnAceptar=document.querySelector('#btnAceptar');
if(btnAceptar!=null){
	btnAceptar.addEventListener('click',function(event){
		if(!inputLlenos('solicitarCita')){
			event.preventDefault();
		}
		else
		{
			var noHayErrores=true;
			var today=new Date();
			today.setHours(0);
			today.setMinutes(0);
			today.setSeconds(0);
			var fecha=document.querySelector('#txtFecha');
			if($('#txtFecha').datepicker("getDate")<today)
			{					
				mostrarMensajeError(fecha,"Debe seleccionar una fecha válida");
				noHayErrores=false;
				event.preventDefault();
			}
			
			var hInicio = new Date (new Date().toDateString() + ' ' + $('#txtHoraInicio').val());
			var hFin = new Date (new Date().toDateString() + ' ' + $('#txtHoraFin').val());
			
			
			if(hFin<hInicio)
			{
				noHayErrores=false;
				mostrarMensajeError(document.querySelector('#txtHoraFin'),"Debe seleccionar una hora mayor a la hora de inicio");
				event.preventDefault();
			}
			else
			{
				var horaFin = new Date(hFin.getTime() - 30*60000); 
				if(horaFin<hInicio)
				{
					noHayErrores=false;
					mostrarMensajeError(document.querySelector('#txtHoraFin'),"La cita debe durar mínimo 30 minutos");
					event.preventDefault();
				}
			}
			
			if(noHayErrores){
				event.preventDefault();
				var idCita = location.search.split("=")[1];//,
					//fechaInicio = $('#txtFecha').datepicker({ dateFormat: 'yy-mm-dd' }).val()+" "+$('#txtHoraInicio').val()+":00",
					//fechaFin = $('#txtFecha').datepicker({ dateFormat: 'yy-mm-dd' }).val()+" "+$('#txtHoraFin').val()+":00";
					
				var today = $('#txtFecha').datepicker('getDate')
				var dd = today.getDate();
				var mm = today.getMonth()+1;//January is 0!
				var yyyy = today.getFullYear();
				var hours = today.getHours();
				var minutes = today.getMinutes();
				var seconds = today.getSeconds();
				if(dd<10){dd='0'+dd}
				if(mm<10){mm='0'+mm}
				var resultDate = yyyy+'-'+mm+'-'+dd;
				var fechaInicio=yyyy+'-'+mm+'-'+dd+' '+$('#txtHoraInicio').val()+":00"
				var fechaFin=yyyy+'-'+mm+'-'+dd+' '+$('#txtHoraFin').val()+":00"

				var request = $.ajax({
					url: "../includes/service-citas.php",
					type: "get",
					data: {
						   'query': 'actualizarHoraSolicitud',
						   'idCita': idCita,
						   'fechaInicio' : fechaInicio,
						   'fechaFin' : fechaFin
						  },
					dataType: 'json',
					success: function(response){ 
						var mensaje = '<h3>Solicitud de cita - Hora propuesta</h3>' +
										  '<p><b>' + $('.cita-invitado').text() + '</b> te ha propuesto una hora para la cita:</p>' + 
										  '<p style="font-style: italic;">' + fechaInicio + '</p>',
								subject = 'Solicitud de cita - Hora propuesta';
						var idSolicitado= location.search.split("=")[1];
						enviarEmail(idSolicitado, subject, mensaje);
						setTimeout(function(){window.location ="solicitudEnviada.php?nombreInvitado="+$('.cita-invitado').text()+"&titulo=La propuesta de hora para la solicitud de cita ha sido realizada";},3000);
						//window.location ="solicitudEnviada.php?nombreInvitado="+$('.cita-invitado').text()+"&titulo=La propuesta de hora para la solicitud de cita ha sido realizada";
					},
					error: function(response){
						var error = document.createElement("p");
						error.className="alert-error flaticon-remove11";
						var msj = document.createTextNode("No se pudo modificar la hora");
						error.appendChild(msj);
						var botonesDiv=document.querySelector('.form-row-button');
						botonesDiv.appendChild(error);						
					}
				});
			}
			
		}
	});
}

//rechazar solicitud y NO proponer hora
var btnRechazar=document.querySelector('#btnRechazar');
if(btnRechazar!=null){
	btnRechazar.addEventListener('click',function(event){
		event.preventDefault();
		// Confirmar con modal window
		$('#modal-rechazar .js-modal-aceptar').on('click', function() {
			rechazarSolicitud();
		});
	});
}

//rechazar solicitud y NO proponer hora
var btnRechazarPropuesta=document.querySelector('#btnRechazarPropuesta');
if(btnRechazarPropuesta!=null){
	btnRechazarPropuesta.addEventListener('click',function(event){
		event.preventDefault();
		// Confirmar con modal window
		$('#modal-rechazar .js-modal-aceptar').on('click', function() {
			rechazarSolicitud();
		});
	});
}

function rechazarSolicitud(){
	var idCita = getQueryVariable('idCita');
	var request = $.ajax({
		url: "../includes/service-citas.php",
		type: "get",
		data: {
			   'query': 'rechazarSolicitud',
			   'idCita': idCita
			  },
		dataType: 'json',
		success: function(response){ 
			window.location ="solicitudEnviada.php?nombreInvitado="+$('.cita-invitado').text()+"&titulo=La solicitud ha sido rechazada con éxito";
		},
		error: function(response){
			var error = document.createElement("p");
			error.className="alert-error flaticon-remove11";
			var msj = document.createTextNode("No se pudo rechazar la solicitud");
			error.appendChild(msj);
			var botonesDiv=document.querySelector('.form-row-button');
			botonesDiv.appendChild(error);						
		}
	});
}

//aceptar propuesta de hora
var btnAceptarPropuesta=document.querySelector('#btnAceptarPropuesta');
if(btnAceptarPropuesta!=null){
	btnAceptarPropuesta.addEventListener('click',function(event){
		event.preventDefault();
		var idCita = getQueryVariable('idCita');

		var request = $.ajax({
			url: "../includes/service-citas.php",
			type: "get",
			data: {
				   'query': 'aceptarPropuestaSolicitud',
				   'idCita': idCita
				  },
			dataType: 'json',
			success: function(response){ 
				// Enviar correo de creacion de cita.
				enviarEmailCreacionCita(idCita);
				$(document).bind('emailCreacionCitaEnviado', function(event) {
					window.location ="solicitudEnviada.php?nombreInvitado="+$('.cita-invitado').text()+"&titulo=La solicitud ha sido aceptada exitosamente";
				});
			},
			error: function(response){
				var error = document.createElement("p");
				error.className="alert-error flaticon-remove11";
				var msj = document.createTextNode("No se pudo aceptar la solicitud");
				error.appendChild(msj);
				var botonesDiv=document.querySelector('.form-row-button');
				botonesDiv.appendChild(error);						
			}
		});
	});
}

//verificar si los inputs estan llenos
function inputLlenos(idContainer){
	limpiarMensajesError();
	var estanLlenos=true;
	var myInputs=new Array();
	//select all inputs text
	var inputs = document.getElementById(idContainer).getElementsByTagName('input');	
	for(i=0; i<inputs.length; i++){		
		if((inputs[i].type=="text" || inputs[i].type=="time" )&& inputs[i].getAttribute('id')!="txtCurso")
		{
			myInputs.push(inputs[i]);
		}
	}
	
	for(i=0;i<myInputs.length;i++){
		if(myInputs[i].value.trim()==''){
			mostrarMensajeError(myInputs[i], "Este campo no puede estar vacío.");
			estanLlenos=false;
		}
	}
	return estanLlenos;
}

function enviarEmailSolicitud(to, asunto, solicitante) {
	var mensaje = '<h3>Nueva solicitud de cita</h3>' +
				  '<p><b>' + decodeURI(solicitante) + '</b> te ha solicitado una cita sobre:</p>' + 
				  '<p style="font-style: italic;">' + asunto + '</p>',
		subject = 'Nueva solicitud de cita';

	enviarEmail(to, subject, mensaje);
}

function enviarEmailCreacionCita(citaId) {
	var mensaje,
		subject = 'Cita programada';

	$(document).bind('consultarCitaPorId', function(event, data) {
		$.ajax({
			url: '../includes/service-citas.php',
			type: 'get', // Se utiliza get por vamos a obtener datos, no a postearlos.
			data: { // Objeto con los parámetros que utiliza el servicio.
				query: 'consultarUsuarioPorId',
				usuarioId: data.correoSolicitado
			},
			dataType: 'json',
			success: function(response) {
				nombreSolicitado = $.parseJSON(response.data)[0].nombreCompleto;
				mensaje = '<h3">Nueva cita programada</h3>' +
					  '<table style="text-align: left; width: 100%; vertical-align: top;"><tbody>' + 
					  '<tr><th>Invitados:</th><td>' + data.nombreSolicitante + '<br />' + nombreSolicitado + '</td></tr>' + 
					  '<tr><th>Asunto a tratar:</th><td>' + data.asunto + '</td></tr>' + 
					  '<tr><th>Fecha:</th><td>' + data.fecha + '</td></tr>' + 
					  '<tr><th>Hora:</th><td>' + data.horaInicio + ' a ' + data.horaFin + '</td></tr>' +
					  '</tbody></table>';
				// Enviar correo a usuario solicitante
				enviarEmail(data.nombreSolicitante, subject, mensaje);
				// Enviar correo a usuario solicitado
				enviarEmail(data.correoSolicitado, subject, mensaje);
				$(document).trigger('emailCreacionCitaEnviado');
			},
			error: function(response) {
				console.log('error');
				console.log(response);
			}
		});		
	});

	consultarCitaPorId(citaId);
}

function consultarCitaPorId(citaId) {
	$.ajax({
		url: '../includes/service-citas.php',
		type: 'get', // Se utiliza get por vamos a obtener datos, no a postearlos.
		data: { // Objeto con los parámetros que utiliza el servicio.
			query: 'consultarCitaPorId',
			citaId: citaId
		},
		dataType: 'json',
		success: function(response) {
			$(document).trigger('consultarCitaPorId', $.parseJSON(response.data));
		},
		error: function(response) {
			console.log(response);	
		}
	});
}