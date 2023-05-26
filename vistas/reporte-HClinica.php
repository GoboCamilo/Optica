<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6">
                <h2 class="m-0">Historial Paciente</h2>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item">Terceros</li>
                    <li class="breadcrumb-item active">Historial-Paciente</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <table id="tbl_HClinica" class="table table-striped w-100 shadow border border-secondary">
                    <thead class="bg-gray">
                        <tr style="font-size: 15px;">
                            <th></th>
                            <th>id</th>
                            <th>idTercero</th>
                            <th>Nombre</th>
                            <th>N° Documento</th>
                            <th>idPat</th>
                            <th>Patologia</th>
                            <th>fecha Consulta</th> 
                            <th>odEsfera</th>
                            <th>odCilindro</th>
                            <th>odEje</th>                             
                            <th>odAdicion</th>
                            <th>odAltura</th>                            
                            <th>oiEsfera</th>
                            <th>oiCilindro</th>
                            <th>oiEje</th>
                            <th>oiAdicion</th>
                            <th>oiAltura</th>
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
    var accion;
    var table;
    var operacion_stock = 0; // permitar definir si vamos a sumar o restar al stock (1: sumar, 2:restar)

    /*===================================================================*/
    //INICIALIZAMOS EL MENSAJE DE TIPO TOAST (EMERGENTE EN LA PARTE SUPERIOR)
    /*===================================================================*/
    var Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000
    });

    $(document).ready(function() {


        /*===================================================================*/
        // CARGA DEL LISTADO CON EL PLUGIN DATATABLE JS
        /*===================================================================*/
        table = $("#tbl_HClinica").DataTable({
            dom: 'Bfrtip',
            pageLength: [5, 10, 15, 30, 50, 100],
            pageLength: 10,
            ajax: {
                url: "ajax/ventas.ajax.php",
                dataSrc: '', 
                type: "POST",
                data: {'accion': 1 },//1: LISTAR PRODUCTOS
                    
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
                    targets: 6,
                    visible: false
                },
                {
                    targets: 18,
                    orderable: false,
                    render: function(data, type, full, meta) {
                        return "<center>" +
                            "<span class='btnEditarProducto text-primary px-1' style='cursor:pointer;'>" +
                            "<i class='fas fa-pencil-alt fs-5'></i>" +
                            "</span>" +
                            "<span class='btnAumentarStock text-success px-1' style='cursor:pointer;'>" +
                            "<i class='fas fa-plus-circle fs-5'></i>" +
                            "</span>" +
                            "<span class='btnDisminuirStock text-warning px-1' style='cursor:pointer;'>" +
                            "<i class='fas fa-minus-circle fs-5'></i>" +
                            "</span>" +
                            "<span class='btnEliminarProducto text-danger px-1' style='cursor:pointer;'>" +
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
        $("#iptCodigoBarras").keyup(function() {
            table.column($(this).data('index')).search(this.value).draw();
        })

        $("#iptCategoria").keyup(function() {
            table.column($(this).data('index')).search(this.value).draw();
        })

        $("#iptProducto").keyup(function() {
            table.column($(this).data('index')).search(this.value).draw();
        })

        /*===================================================================*/
        // EVENTOS PARA CRITERIOS DE BUSQUEDA POR RANGO (PREVIO VENTA)
        /*===================================================================*/
        $("#iptPrecioVentaDesde, #iptPrecioVentaHasta").keyup(function() {
            table.draw();
        })

        $.fn.dataTable.ext.search.push(

            function(settings, data, dataIndex) {

                var precioDesde = parseFloat($("#iptPrecioVentaDesde").val());
                var precioHasta = parseFloat($("#iptPrecioVentaHasta").val());

                var col_venta = parseFloat(data[6]);

                if ((isNaN(precioDesde) && isNaN(precioHasta)) ||
                    (isNaN(precioDesde) && col_venta <= precioHasta) ||
                    (precioDesde <= col_venta && isNaN(precioHasta)) ||
                    (precioDesde <= col_venta && col_venta <= precioHasta)) {
                    return true;
                }

                return false;
            }
        )

        /*===================================================================*/
        // EVENTO PARA LIMPIAR INPUTS DE CRITERIOS DE BUSQUEDA
        /*===================================================================*/
        $("#btnLimpiarBusqueda").on('click', function() {

            $("#iptCodigoBarras").val('')
            $("#iptCategoria").val('')
            $("#iptProducto").val('')
            $("#iptPrecioVentaDesde").val('')
            $("#iptPrecioVentaHasta").val('')

            table.search('').columns().search('').draw();
        })

        $("#btnCancelarRegistro, #btnCerrarModal").on('click', function() {

            $("#iptCodigoReg").val("");
            $("#selCategoriaReg").val(0);
            $("#iptDescripcionReg").val("");
            $("#iptPrecioCompraReg").val("");
            $("#iptPrecioVentaReg").val("");
            $("#iptPrecioVentaMayorReg").val("");
            $("#iptPrecioVentaOfertaReg").val("");
            $("#iptStockReg").val("");
            $("#iptMinimoStockReg").val("");

        })

    });

</script>