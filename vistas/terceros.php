
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
              <th>id</th>
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

<script>

$(document).ready(function(){ 

  var table;
  var accion;

  $.ajax({
    url: "ajax/terceros.ajax.php",
    type: "POST",
    data: {'accion': 1 },//1: LISTAR PRODUCTOS 
    dataType: 'json',
    success: function(respuesta) {
      console.log("respuesta", respuesta);
    }
  });

  table = $("#tbl_terceros").DataTable({
    dom: 'Bfrtip',
    buttons: [{
      text: 'Agregar Producto',
      className: 'addNewRecord',
      action: function(e, dt, node, config) {
        $("#mdlGestionarProducto").modal('show');
        accion = 2; //registrar
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
      data: {'accion': 1 },//1: LISTAR PRODUCTOS

    },
    responsive: {
      details: {
        type: 'column'
      }
    },

    columnDefs:[
      {
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
                  "<span class='btnEditarProducto text-warning px-3' style='cursor:pointer;'>" +
                  "<i class='fas fa-edit fs-5'></i>" +
                  "</span>" +
                  "<span class='btnEliminarProducto text-danger px-3' style='cursor:pointer;'>" +
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


})

</script>