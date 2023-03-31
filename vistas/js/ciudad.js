/*=============================================
EDITAR TIPO TERCERO
=============================================*/
$(".tablas").on("click", ".btnEditarCiudad", function(){

	var idCiudad = $(this).attr("idCiudad");

	var datos = new FormData();
	datos.append("idCiudad", idCiudad);

	$.ajax({
		url: "ajax/ciudad.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarCiudad").val(respuesta["Ciudad"]);
     		$("#idCiudad").val(respuesta["idCiudad"]);

     	}

	})


})

/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEliminarCiudad", function(){

	 var idCiudad = $(this).attr("idCiudad");

	 swal({
	 	title: '¿Está seguro de borrar la ciudad?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar la ciudad!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=ciudad&idCiudad="+idCiudad;

	 	}

	 })

})