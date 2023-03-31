/*=============================================
EDITAR TIPO TERCERO
=============================================*/
$(".tablas").on("click", ".btnEditarTipoDocumento", function(){

	var idTipoDocumento = $(this).attr("idTipoDocumento");

	var datos = new FormData();
	datos.append("idTipoDocumento", idTipoDocumento);

	$.ajax({
		url: "ajax/tipoDocumentos.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarTipoDocumento").val(respuesta["descripcion"]);
     		$("#idTipoDocumento").val(respuesta["idTipDoc"]);

     	}

	})


})

/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEliminarTipoDocumento", function(){

	 var idTipoDocumento = $(this).attr("idTipoDocumento");

	 swal({
	 	title: '¿Está seguro de borrar el tipo de tercero?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar tercero!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=tipoDocumentos&idTipoDocumento="+idTipoDocumento;

	 	}

	 })

})