/*=============================================
EDITAR PAIS
=============================================*/
$(".tablas").on("click", ".btnEditarPais", function(){

	var idPais = $(this).attr("idPais");

	var datos = new FormData();
	datos.append("idPais", idPais);

	$.ajax({
		url: "ajax/pais.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarPais").val(respuesta["Pais"]);
     		$("#idPais").val(respuesta["idPais"]);

     	}

	})


})

/*=============================================
ELIMINAR PAIS
=============================================*/
$(".tablas").on("click", ".btnEliminarPais", function(){

	 var idPais = $(this).attr("idPais");

	 swal({
	 	title: '¿Está seguro de borrar la Pais?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar la pais!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=pais&idPais="+idPais;

	 	}

	 })

})