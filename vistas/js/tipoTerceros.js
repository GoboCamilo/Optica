/*=============================================
EDITAR TIPO TERCERO
=============================================*/
$(".tablas").on("click", ".btnEditarTipoTercero", function(){

	var idTipoTercero = $(this).attr("idTipoTercero");

	var datos = new FormData();
	datos.append("idTipoTercero", idTipoTercero);

	$.ajax({
		url: "ajax/tipoTerceros.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarTipoTercero").val(respuesta["descripcion"]);
     		$("#idTipoTercero").val(respuesta["idTipTer"]);

     	}

	})


})

/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEliminarTipoTercero", function(){

	 var idTipoTercero = $(this).attr("idTipoTercero");

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

	 		window.location = "index.php?ruta=tipoTerceros&idTipoTercero="+idTipoTercero;

	 	}

	 })

})