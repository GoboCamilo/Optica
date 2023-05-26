
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Administrador de Terceros</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active">Terceros</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <!-- row para criterios de busqueda -->
    <div class="row">
      <div class="col-lg-12">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">CRITERIOS DE BÚSQUEDA</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool text-danger" id="btnLimpiarBusqueda">
                <i class="fas fa-times"></i>
              </button>
            </div> <!-- ./ end card-tools -->
          </div> <!-- ./ end card-header -->
          <div class="card-body">
            <div class="row">
              <div class="d-none d-md-flex col-md-12 ">
                <div style="width: 25%;" class="form-floating mx-1">
                  <input type="text" id="iptTipoTercero" class="form-control" data-index="3">
                  <label for="iptTipoTercero">Tipo de Tercero</label>
                </div>

                <div style="width: 25%;" class="form-floating mx-1">
                  <input type="text" id="iptTipoDocumento" class="form-control" data-index="6">
                  <label for="iptTipoDocumento">Tipo de Documento</label>
                </div>

                <div style="width: 25%;" class="form-floating mx-1">
                  <input type="text" id="iptPais" class="form-control" data-index="9">
                  <label for="iptPais">Pais</label>
                </div>

                <div style="width: 25%;" class="form-floating mx-1">
                  <input type="text" id="iptCiudad" class="form-control" data-index="11">
                  <label for="iptCiudad">Ciudad</label>
                </div>                          
              </div>

              <div class="d-block d-sm-none">

                <div style="width: 100%;" class="form-floating mx-1 my-1">
                  <input type="text" id="iptTipoTercero" class="form-control" data-index="2">
                  <label for="iptTipoTercero">Tipo de Tercero</label>
                </div>

                <div style="width: 100%;" class="form-floating mx-1 my-1">
                  <input type="text" id="iptTipoDocumento" class="form-control" data-index="4">
                  <label for="iptTipoDocumento">Tipo de Documento</label>
                </div>

                <div style="width: 100%;" class="form-floating mx-1 my-1">
                  <input type="text" id="iptPais" class="form-control" data-index="5">
                  <label for="iptPais">Pais</label>
                </div>

                <div style="width: 100%;" class="form-floating mx-1 my-1">
                  <input type="text" id="iptCiudad" class="form-control">
                  <label for="iptCiudad">Ciudad</label>
                </div>                               
              </div>
            </div>
          </div> <!-- ./ end card-body -->
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <table id="tbl_terceros" class="table table-striped w-100 shadow">
          <thead class="bg-info">
            <tr style="font-size: 15px;">
              <th></th>
              <th>idTercero</th>
              <th>idTipTer</th>
              <th>Tipo Tercero</th>
              <th>Nombre</th>
              <th>idTipDoc</th>
              <th>Tipo Documento</th>
              <th>Numero documento</th>                             
              <th>iPais</th>
              <th>Pais</th>                            
              <th>idCiudad</th>
              <th>Ciudad</th>
              <th>Direccion</th>
              <th>Telefono</th>
              <th>Fecha nacimiento</th>                          
              <th class="text-cetner">Opciones</th>
            </tr>
          </thead>
          <tbody class="text-small">
          </tbody>
        </table>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</div>

<!-- Ventana Modal para ingresar o modificar un Terceros -->
<div class="modal fade" id="mdlGestionarTercero" role="dialog">

    <div class="modal-dialog modal-lg">

        <!-- contenido del modal -->
        <div class="modal-content">

            <!-- cabecera del modal -->
            <div class="modal-header bg-gray py-1">

                <h5 class="modal-title">Agregar Tercero</h5>

                <button type="button" class="btn btn-outline-primary text-white border-0 fs-5" data-bs-dismiss="modal" id="btnCerrarModal">
                    <i class="far fa-times-circle"></i>
                </button>

            </div>

            <!-- cuerpo del modal -->
            <div class="modal-body">
    
                <form class="needs-validation" novalidate >
                    <!-- Abrimos una fila -->
                    <div class="row">

                        <!-- Columna para registro del tipo de tercero -->
                        <div class="col-12  col-lg-6">
                            <div class="form-group mb-2">
                                <label class="" for="selTipoTerceroReg"><i class="fas fa-dumpster fs-6"></i>
                                    <span class="small">Tipo de terceros</span><span class="text-danger">*</span>
                                </label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                    id="selTipoTerceroReg" required>
                                </select>
                                <div class="invalid-feedback">Seleccione el tipo de tercero</div>
                            </div>
                        </div>

                        <!-- Columna para registro para el nombre -->
                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-2">
                            <label class="" for="iptNombreReg"><i
                                        class="fas fa-file-signature fs-6"></i> <span
                                        class="small">Nombre Completo</span><span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" id="iptNombreReg"
                                    placeholder="Nombre completo" required>
                                <div class="invalid-feedback">Debe ingresar el nombre del tercero</div>
                            </div>
                        </div>


                        <div class="col-12  col-lg-6">
                            <div class="form-group mb-2">
                                <label class="" for="selTipoDocumentoReg"><i class="fas fa-dumpster fs-6"></i>
                                    <span class="small">Tipo de documento</span><span class="text-danger">*</span>
                                </label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                    id="selTipoDocumentoReg" required>
                                </select>
                                <div class="invalid-feedback">Seleccione el tipo de documento</div>
                            </div>
                        </div>
                        <div class="col-12  col-lg-6">
                          <div class="form-group mb-2">
                            <label class="" for="iptNumDocReg"><i class="fas fa-barcode fs-6"></i>
                              <span class="small">Numero de documento</span><span class="text-danger">*</span>
                            </label>
                            <input type="number" min="0" class="form-control form-control-sm" id="iptNumDocReg"
                              name="iptNumDocReg" placeholder="Numero de documento" required>
                            <div class="invalid-feedback">Debe ingresar Numero de documento</div>
                          </div>
                        </div>

                        <div class="col-12  col-lg-6">
                            <div class="form-group mb-2">
                                <label class="" for="selPaisReg"><i class="fas fa-dumpster fs-6"></i>
                                    <span class="small">Pais</span><span class="text-danger">*</span>
                                </label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                    id="selPaisReg" required>
                                </select>
                                <div class="invalid-feedback">Seleccione el pais</div>
                            </div>
                        </div>
                        <div class="col-12  col-lg-6">
                            <div class="form-group mb-2">
                                <label class="" for="selCiudadReg"><i class="fas fa-dumpster fs-6"></i>
                                    <span class="small">Ciudad</span><span class="text-danger">*</span>
                                </label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                    id="selCiudadReg" required>
                                </select>
                                <div class="invalid-feedback">Seleccione la ciudad</div>
                            </div>
                        </div>

                        <!-- Columna para registro de la descripción del producto -->
                        <div class="col-12">
                            <div class="form-group mb-2">
                                <label class="" for="iptDireccionReg"><i
                                        class="fas fa-file-signature fs-6"></i> <span
                                        class="small">Direccion</span><span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" id="iptDireccionReg"
                                    placeholder="Direccion" required>
                                <div class="invalid-feedback">Debe ingresar la direccion</div>
                            </div>
                        </div>

                        <div class="col-12  col-lg-6">
                          <div class="form-group mb-2">
                            <label class="" for="iptTelefonoReg"><i class="fas fa-barcode fs-6"></i>
                              <span class="small">Numero de telefono</span><span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control form-control-sm" id="iptTelefonoReg"
                              name="iptTelefonoReg" placeholder="Numero de telefono" required>
                            <div class="invalid-feedback">Debe ingresar Numero de Telefono</div>
                          </div>
                        </div>

                        <div class="col-12  col-lg-6">
                          <div class="form-group mb-2">
                            <label class="" for="iptFechaNacReg"><i class="fas fa-barcode fs-6"></i>
                              <span class="small">Fecha de nacimiento</span><span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control form-control-sm" id="iptFechaNacReg"
                              placeholder="Fecha de nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>
                            <div class="invalid-feedback">Debe ingresar la fecha de nacimiento</div>
                          </div>
                        </div>

                        <!-- creacion de botones para cancelar y guardar el producto -->
                        <button type="button" class="btn btn-danger mt-3 mx-2" style="width:170px;"
                            data-bs-dismiss="modal" id="btnCancelarRegistro">Cancelar</button>
                        <button type="button" style="width:170px;" class="btn btn-primary mt-3 mx-2"
                            id="btnGuardarTercero">Guardar Tercero</button>
                        <!-- <button class="btn btn-default btn-success" type="submit" name="submit" value="Submit">Save</button> -->

                    </div>
                </form>
            
            </div>

        </div>
    </div>


</div>

<script>

  var table;
  var accion;
  /*===================================================================*/
  //INICIALIZAMOS EL MENSAJE DE TIPO TOAST (EMERGENTE EN LA PARTE SUPERIOR)
  /*===================================================================*/
    
  var Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
  });

    $.ajax({
        url: "ajax/terceros.ajax.php",
        type: "POST",
        data: {'accion' : 1},
        dataType: 'json',
        success:function(respuesta){
          console.log("respuesta",respuesta);
        }
    });

  $(document).ready(function(){ 
    /*===================================================================*/
    // CARGA DEL LISTADO CON EL PLUGIN DATATABLE JS
    /*===================================================================*/  
      table = $("#tbl_terceros").DataTable({
        dom: 'Bfrtip',
        buttons: [{
            text: 'Agregar Tercero',
            className: 'addNewRecord',
            action: function(e, dt, node, config) {
              $("#mdlGestionarTercero").modal('show');
              accion = 2; //registrar
              $(".needs-validation").removeClass("was-validated");
              
              /*===================================================================*/
              //SOLICITUD AJAX PARA CARGAR SELECT DE TIPO TERCEROS
              /*===================================================================*/
              $.ajax({
                url: "ajax/tipoTerceros.ajax.php",
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(respuesta) {

                  var options = '<option selected value="">Seleccione el tipo de tercero</option>';

                  for (let index = 0; index < respuesta.length; index++) {
                    options = options + '<option value=' + respuesta[index][0] + '>' + respuesta[index][
                      1
                    ] + '</option>';
                  }

                  $("#selTipoTerceroReg").append(options);
                }
              });

              /*===================================================================*/
              //SOLICITUD AJAX PARA CARGAR SELECT DE DOCUMENTOS
              /*===================================================================*/
              $.ajax({
                url: "ajax/tipoDocumentos.ajax.php",
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(respuesta) {
                  var options = '<option selected value="">Seleccione el tipo de documento</option>';

                  for (let index = 0; index < respuesta.length; index++) {
                    options = options + '<option value=' + respuesta[index][0] + '>' + respuesta[index][
                      1
                    ] + '</option>';
                  }

                  $("#selTipoDocumentoReg").append(options);
                }
              });

              /*===================================================================*/
              //SOLICITUD AJAX PARA CARGAR SELECT DE PAIS
              /*===================================================================*/
              $.ajax({
                url: "ajax/pais.ajax.php",
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(respuesta) {
                  var options = '<option selected value="">Seleccione el pais</option>';

                  for (let index = 0; index < respuesta.length; index++) {
                    options = options + '<option value=' + respuesta[index][0] + '>' + respuesta[index][
                      1
                    ] + '</option>';
                  }

                  $("#selPaisReg").append(options);
                }
              });
              /*===================================================================*/
              //SOLICITUD AJAX PARA CARGAR SELECT DE CIUDAD
              /*===================================================================*/
              $.ajax({
                url: "ajax/ciudad.ajax.php",
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(respuesta) {
                  var options = '<option selected value="">Seleccione la ciudad</option>';

                  for (let index = 0; index < respuesta.length; index++) {
                    options = options + '<option value=' + respuesta[index][0] + '>' + respuesta[index][
                      1
                    ] + '</option>';
                  }
                  $("#selCiudadReg").append(options);
                }
              });
          }
        },
        'excel', 'print', 'pageLength'
    ],
    pageLength: [5, 10, 15, 30, 50, 100],
    pageLength: 10,
    ajax: {
      url: "ajax/terceros.ajax.php",
      dataSrc: '',
      type: "POST",
      data: {
        'accion': 1 //1: LISTAR PRODUCTOS
      },
    }, 
    responsive: {
      details: {
        type: 'column'
      }
    },
    columnDefs:[{
      targets: 0,
      orderable: false,
      className: 'control'
      },
      {
        targets: 1,
        visible: false
      },
      {
        targets: 2,
        visible: false
      },
      {
        targets: 5,
        visible: false
      },
      {
        targets: 8,
        visible: false
      },
      {
        targets: 10,
        visible: false
      },
      {
        targets: 15,
        orderable: false,
        render: function(data, type, full, meta) {
          return "<center>" +
                  "<span class='btnEditarTercero text-warning px-3' style='cursor:pointer;'>" +
                  "<i class='fas fa-edit fs-5'></i>" +
                  "</span>" +
                  "<span class='btnEliminarTercero text-danger px-3' style='cursor:pointer;'>" +
                  "<i class='fas fa-trash fs-5'></i>" +
                  "</span>" +
                  "</center>"
        }
      }
    ],
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    }
  });
  /*===================================================================*/
    // EVENTOS PARA CRITERIOS DE BUSQUEDA (CODIGO, CATEGORIA Y PRODUCTO)
    /*===================================================================*/
    $("#iptTipoTercero").keyup(function() {
        table.column($(this).data('index')).search(this.value).draw();
    })

    $("#iptTipoDocumento").keyup(function() {
        table.column($(this).data('index')).search(this.value).draw();
    })

    $("#iptPais").keyup(function() {
        table.column($(this).data('index')).search(this.value).draw();
    })

    $("#iptCiudad").keyup(function() {
        table.column($(this).data('index')).search(this.value).draw();
    });

    /*===================================================================*/
    // EVENTO PARA LIMPIAR INPUTS DE CRITERIOS DE BUSQUEDA
    /*===================================================================*/
    $("#btnLimpiarBusqueda").on('click', function() {

        $("#iptTipoTercero").val('')
        $("#iptTipoDocumento").val('')
        $("#iptPais").val('')
        $("#iptCiudad").val('')

        table.search('').columns().search('').draw();
    })

    $("#btnCancelarRegistro, #btnCerrarModal").on('click', function() {

    $("#validate_codigo").css("display", "none");
    $("#validate_categoria").css("display", "none");
    $("#validate_descripcion").css("display", "none");
    $("#validate_precio_compra").css("display", "none");
    $("#validate_precio_venta").css("display", "none");
    $("#validate_stock").css("display", "none");
    $("#validate_min_stock").css("display", "none");

    $("#selTipoTerceroReg").val("");
    $("#iptNombreReg").val("");
    $("#selTipoDocumentoReg").val("");
    $("#iptNumDocReg").val("");
    $("#selPaisReg").val("");
    $("#selCiudadReg").val("");
    $("#iptDireccionReg").val("");
    $("#iptTelefonoReg").val("");
    $("#iptFechaNacReg").val("");

    })

    /* ======================================================================================
    EVENTO AL DAR CLICK EN EL BOTON EDITAR TERCERO
    =========================================================================================*/
    $('#tbl_terceros tbody').on('click', '.btnEditarTercero', function() {

      accion = 4; //seteamos la accion para editar

      $("#mdlGestionarTercero").modal('show');

      // var data = table.row($(this).parents('tr')).data();

      var data = table.row($(this).parents('tr')).data();
      
      $("#selTipoTerceroReg").val(data[2]);
      $("#iptNombreReg").val(data[4]);
      $("#selTipoDocumentoReg").val(data[5]);
      $("#iptNumDocReg").val(data[7]);
      $("#selPaisReg").val(data[8]);
      $("#selCiudadReg").val(data[10]);
      $("#iptDireccionReg").val(data[12]);
      $("#iptTelefonoReg").val(data[13]);
      $("#iptFechaNacReg").val(data[14]);

    })

    /* ======================================================================================
    EVENTO AL DAR CLICK EN EL BOTON ELIMINAR PRODUCTO
    =========================================================================================*/
    $('#tbl_terceros tbody').on('click', '.btnEliminarTercero', function() {
        
        accion = 5; //seteamos la accion para editar
        
        var data = table.row($(this).parents('tr')).data();

        var idTercero = data["idTercero"];

        Swal.fire({
            title: 'Está seguro de eliminar el tercero?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, deseo eliminarlo!',
            cancelButtonText: 'Cancelar',
        }).then((result) => {

            if (result.isConfirmed) {

                var datos = new FormData();

                datos.append("accion", accion);
                datos.append("idTercero", idTercero); //codigo_producto               

                $.ajax({
                    url: "ajax/terceros.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(respuesta) {

                      if (respuesta == "ok") {

                        Toast.fire({
                            icon: 'success',
                            title: 'El tercero se eliminó correctamente'
                        });

                        table.ajax.reload();

                      } else {
                        Toast.fire({
                            icon: 'error',
                            title: 'El tercero no se pudo eliminar'
                        });
                      }

                    } 
                });

            }
        })
    })


});

/*===================================================================*/
//EVENTO QUE GUARDA LOS DATOS DEL PRODUCTO, PREVIA VALIDACION DEL INGRESO DE LOS DATOS OBLIGATORIOS
/*===================================================================*/
document.getElementById("btnGuardarTercero").addEventListener("click", function() {

  // Get the forms we want to add validation styles to
  var forms = document.getElementsByClassName('needs-validation');
  // Loop over them and prevent submission
  var validation = Array.prototype.filter.call(forms, function(form) {

    if (form.checkValidity() === true) {   

      console.log("Listo para registrar el tercero")


        Swal.fire({
          title: 'Está seguro de registrar el tercero?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, deseo registrarlo!',
          cancelButtonText: 'Cancelar',
        }).then((result) => {

          if (result.isConfirmed) {

            var datos = new FormData();

            datos.append("accion", accion);
            datos.append("idTipTer", $("#selTipoTerceroReg").val()); //codigo_tercero
            datos.append("nombre", $("#iptNombreReg").val()); //id_categoria_tercero
            datos.append("idTipDoc", $("#selTipoDocumentoReg").val()); //descripcion_tercero
            datos.append("numIdentidad", $("#iptNumDocReg").val()); //precio_compra_tercero
            datos.append("idPais", $("#selPaisReg").val()); //precio_venta_tercero
            datos.append("idCiudad", $("#selCiudadReg").val()); //utilidad
            datos.append("direccion", $("#iptDireccionReg").val()); //precio_venta_tercero
            datos.append("telefono", $("#iptTelefonoReg").val()); //telefono
            datos.append("fechaNac", $("#iptFechaNacReg").val()); //precio_venta_tercero  
              
            if(accion == 2){
              var titulo_msj = "El Tercero se registró correctamente"
            }

            if(accion == 4){
              var titulo_msj = "El Tercero se actualizó correctamente"
            }

            $.ajax({
              url: "ajax/terceros.ajax.php",
              method: "POST",
              data: datos,
              cache: false,
              contentType: false,
              processData: false,
              dataType: 'json',
              success: function(respuesta) {

                if (respuesta == "ok") {

                  Toast.fire({
                      icon: 'success',
                      title: titulo_msj
                  });

                  table.ajax.reload();

                  $("#mdlGestionarTercero").modal('hide');

                  $("#selTipoTerceroReg").val("");
                  $("#iptNombreReg").val(0);
                  $("#selTipoDocumentoReg").val("");
                  $("#iptNumDocReg").val("");
                  $("#selPaisReg").val("");
                  $("#selCiudadReg").val("");
                  $("#iptDireccionReg").val("");
                  $("#iptTelefonoReg").val("");
                  $("#iptFechaNacReg").val("");

                } else {
                  Toast.fire({
                      icon: 'error',
                      title: 'El tercero no se pudo registrar'
                  });
                }


              }
            });
          }
        })
      }else {
        console.log("No paso la validacion")
      }

      form.classList.add('was-validated');
  });
});

/*===================================================================*/
//EVENTO QUE LIMPIA LOS MENSAJES DE ALERTA DE INGRESO DE DATOS DE CADA INPUT AL CANCELAR LA VENTANA MODAL
/*===================================================================*/
document.getElementById("btnCancelarRegistro").addEventListener("click", function() {
    $(".needs-validation").removeClass("was-validated");
})
</script>