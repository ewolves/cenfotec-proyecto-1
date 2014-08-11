/*AJAX PARA INSERTAR CARRERA, JAVIER BARBOZA*/

$("#btn-guardar-carrera").click(function() {
  var codigo = $('#codigo-carrera').val(),
      nombre = $('#nombre-carrera').val(),
      director = $('#director-academico').val(); 

  var request = $.ajax({
    url: "/cenfotec-proyecto-1/includes/functions-carreras.php",
    type: "post",
    data: {
           'call': 'crearCarrera',
           'pCodigo' : codigo,
           'pNombre': nombre,
           'pDirector' : director},
    dataType: 'json',

    success: function(response){           
    }
    
  });
});

/*AJAX PARA INSERTAR CARRERA, JAVIER BARBOZA*/