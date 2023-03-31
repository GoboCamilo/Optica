/*=============================================
CARGAR LA TABLA DINÁMICA DE TERCEROS
=============================================

$.ajax({

	url: "ajax/datatable-terceros.ajax.php",
	success:function(respuesta){
		
		console.log("respuesta", respuesta);

	}

})
var perfilOculto = $("#perfilOculto").val();*/

$('.tablaTerceros').DataTable( {
    "ajax": "ajax/datatable-terceros.ajax.php",
    "deferRender": true,
	"retrieve": true,
	"processing": true,
	 "language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

	}

} );
/*=============================================
EDITAR CLIENTE
=============================================*/
$(".tablaTerceros tbody").on("click", "button.btnEditarTercero", function(){

	var idTercero = $(this).attr("idTercero");

	var datos = new FormData();
    datos.append("idTercero", idTercero);

    $.ajax({

      url:"ajax/terceros.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

        var datosTipoTerceros = new FormData();
        datosTipoTerceros.append("idTipTer",respuesta["idTipTer"]);

         $.ajax({

            url:"ajax/tipoTerceros.ajax.php",
            method: "POST",
            data: datosTipoTerceros,
            cache: false,
            contentType: false,
            processData: false,
            dataType:"json",
            success:function(respuesta){
                
                $("#editarIdTipoTercero").val(respuesta["idTipTer"]);
                $("#editarIdTipoTercero").html(respuesta["descripcion"]);

            }

        })

        var datosTipoDocumentos = new FormData();
        datosTipoDocumentos.append("idTipDoc",respuesta["idTipDoc"]);

         $.ajax({

            url:"ajax/tipoDocumentos.ajax.php",
            method: "POST",
            data: datosTipoDocumentos,
            cache: false,
            contentType: false,
            processData: false,
            dataType:"json",
            success:function(respuesta){
                
                $("#editarIdTipDocumento").val(respuesta["idTipDoc"]);
                $("#editarIdTipDocumento").html(respuesta["descripcion"]);

            }

        })

        var datosPais = new FormData();
        datosPais.append("idPais",respuesta["idPais"]);

         $.ajax({

            url:"ajax/pais.ajax.php",
            method: "POST",
            data: datosPais,
            cache: false,
            contentType: false,
            processData: false,
            dataType:"json",
            success:function(respuesta){
                
                $("#editarIdPais").val(respuesta["idPais"]);
                $("#editarIdPais").html(respuesta["Pais"]);

            }

        })

        var datosCiudad = new FormData();
        datosCiudad.append("idCiudad",respuesta["idCiudad"]);

         $.ajax({

            url:"ajax/ciudad.ajax.php",
            method: "POST",
            data: datosCiudad,
            cache: false,
            contentType: false,
            processData: false,
            dataType:"json",
            success:function(respuesta){
                
                $("#editarIdCiudad").val(respuesta["idCiudad"]);
                $("#editarIdCiudad").html(respuesta["Ciudad"]);

            }

        })

    
	      $("#editarTercero").val(respuesta["nombre"]);
	      $("#editarDocumentoId").val(respuesta["numIdentida"]);
	      $("#editarDireccion").val(respuesta["direccion"]);
        $("#editarFechaNacimiento").val(respuesta["fechaNac"]);
        $("#editarTelefono").val(respuesta["telefono"]);
	  }

  	})

})

/*=============================================
ELIMINAR CLIENTE
=============================================*/
$(".tablaTerceros tbody").on("click", ".btnEliminarTercero", function(){

	var idTercero = $(this).attr("idTercero");
	
	swal({
        title: '¿Está seguro de borrar el tercero?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar tercero!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=terceros&idTercero="+idTercero;
        }

  })

})