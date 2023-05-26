
<!-- Content Header (Page header) -->
<div class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">

                <h2 class="m-0">Modulo de Ventas</h2>

            </div><!-- /.col -->

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>

                    <li class="breadcrumb-item active">Ventas</li>

                </ol>

            </div><!-- /.col -->

        </div><!-- /.row -->

    </div><!-- /.container-fluid -->

</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="card card-gray shadow">

                <div class="card-body p-2">
                    <div class="row">
                        <!-- SELECCIONAR TIPO DE DOCUMENTO -->
                        <div class="col-md-3 form-group mb-2">
                            <label class="col-form-label p-0" for="selDocumentoVenta">
                                <i class="fas fa-file-alt fs-6"></i>
                                <span class="small">Documento</span>
                                <span class="text-danger">*</span>
                            </label>

                            <select class="form-select form-select-sm"
                                        aria-label=".form-select-sm example" 
                                        id="selDocumentoVenta"
                                        name="selDocumentoVenta">
                            </select>

                            <span id="validate_categoria" class="text-danger small fst-italic" style="display:none">
                                Debe Seleccione documento
                            </span>

                        </div>

                        <!-- SERIE Y NRO DE BOLETA -->
                        <div class="col-md-6 form-group">

                            <div class="row">

                                <div class="col-md-6">

                                    <label for="iptNroVenta" class="p-0 m-0">Correlativo</label>

                                    <input type="text" min="0" name="iptEfectivo" id="iptNroVenta" class="form-control form-control-sm" placeholder="Nro Venta" disabled>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">   
                        <div class="col-md-10 mb-3">
                            <div class="form-group mb-2">
                                <label class="col-form-label" 
                                for="search_cliente">
                                    <i class="fas fa-users fs-6"></i>
                                    <span class="small">Terceros</span>
                                </label>
                                <input type="text" 
                                    class="form-control form-control-sm" 
                                    id="search_cliente" 
                                    placeholder="Ingrese el Documento o el nombre del cliente">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table id="lstProductosVenta" class="display nowrap table-striped w-100 shadow ">
                            <thead class="bg-gray text-left fs-6">
                                <tr>
                                    <th>id</th>
                                    <th>idTipTer</th>
                                    <th>Tipo Tercero</th>
                                    <th>Nombre</th>
                                    <th>idTipDoc</th>
                                    <th>Tipo Documento</th>
                                    <th>Numero documento</th>
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                    <th class="text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody class="small text-left fs-6">
                            </tbody>
                        </table>
                        <!-- / table -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="card card-gray shadow">

                <div class="card-body p-2">
                    <div class="row">
                        <!-- SELECCIONAR TIPO DE DOCUMENTO -->
                        <div class="form-group">

                            <div class="row">

                                <div class="col-md-2">

                                    <label for="iptNroSerie" class="p-0 m-0">Esfera O.D</label>

                                    <input type="text" min="0" name="iptEfectivo" id="iptNroSerie" class="form-control form-control-sm" >
                                </div>

                                <div class="col-md-2">

                                    <label for="iptNroVenta" class="p-0 m-0">Cilindro O.D</label>

                                    <input type="text" min="0" name="iptEfectivo" id="iptNroVenta" class="form-control form-control-sm" >

                                </div>

                                <div class="col-md-2">

                                    <label for="iptNroSerie" class="p-0 m-0">Eje O.D</label>

                                    <input type="text" min="0" name="iptEfectivo" id="iptNroSerie" class="form-control form-control-sm" >
                                </div>

                                <div class="col-md-2">

                                    <label for="iptNroVenta" class="p-0 m-0">Adiccion O.D</label>

                                    <input type="text" min="0" name="iptEfectivo" id="iptNroVenta" class="form-control form-control-sm" >

                                </div>

                                <div class="col-md-2">

                                    <label for="iptNroVenta" class="p-0 m-0">Altura O.D</label>

                                    <input type="text" min="0" name="iptEfectivo" id="iptNroVenta" class="form-control form-control-sm">

                                </div>

                            </div>

                        </div>
                        <div class="form-group">

                            <div class="row">

                                <div class="col-md-2">

                                    <label for="iptNroSerie" class="p-0 m-0">Esfera O.I</label>

                                    <input type="text" min="0" name="iptEfectivo" id="iptNroSerie" class="form-control form-control-sm"  >
                                </div>

                                <div class="col-md-2">

                                    <label for="iptNroVenta" class="p-0 m-0">Cilindro O.I</label>

                                    <input type="text" min="0" name="iptEfectivo" id="iptNroVenta" class="form-control form-control-sm"  >

                                </div>

                                <div class="col-md-2">

                                    <label for="iptNroSerie" class="p-0 m-0">Eje O.I</label>

                                    <input type="text" min="0" name="iptEfectivo" id="iptNroSerie" class="form-control form-control-sm" >
                                </div>

                                <div class="col-md-2">

                                    <label for="iptNroVenta" class="p-0 m-0">Adiccion O.I</label>

                                    <input type="text" min="0" name="iptEfectivo" id="iptNroVenta" class="form-control form-control-sm"  >

                                </div>

                                <div class="col-md-2">

                                    <label for="iptNroVenta" class="p-0 m-0">Altura O.I</label>

                                    <input type="text" min="0" name="iptEfectivo" id="iptNroVenta" class="form-control form-control-sm"  >

                                </div>

                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-md-10">
                                <label for="inputMessage">Observaciones</label>
                                <textarea id="inputMessage" class="form-control" ></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Ver Historias Clinicas">
                        </div>
                    </div>      
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var form;
    var items = []; // SE USA PARA EL INPUT DE AUTOCOMPLETE
    var itemProducto = 1;

    var Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000
    });


    $(document).ready(function(){
        /*===================================================================*/
        //SOLICITUD AJAX PARA CARGAR SELECT DE TIPO DE DOCUMENTO
        /*===================================================================*/
        $.ajax({
            url: "ajax/tipoDocumentos.ajax.php",
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(respuesta) {
            
                var options = '<option selected value="">Seleccione el tipo Documento</option>';

                for (let index = 0; index < respuesta.length; index++) {
                    options = options + '<option value=' + respuesta[index][0] + '>' + respuesta[index][1] + '</option>';
                }

                $("#selDocumentoVenta").append(options);
            }
        });

        
        /* ======================================================================================
        TRAER EL NRO DE BOLETA
        ======================================================================================*/
        CargarNroBoleta();


        /* ======================================================================================
        EVENTO PARA ELIMINAR UN PRODUCTO DEL LISTADO
        ======================================================================================*/
        $('#lstProductosVenta tbody').on('click', '.btnEliminarproducto', function() {
            table.row($(this).parents('tr')).remove().draw();
        });

        /* ======================================================================================
        INICIALIZAR LA TABLA DE VENTAS
        ======================================================================================*/
        table = $('#lstProductosVenta').DataTable({
            "columns": [{
                    "data": "idTercero"
                },
                {
                    "data": "idTipTer"
                },
                {
                    "data": "descripcionT"
                },
                {
                    "data": "nombre"
                },
                {
                    "data": "idTipDoc"
                },
                {
                    "data": "descripcion"
                },
                {
                    "data": "numIdentidad"
                },
                {
                    "data": "direccion"
                },
                {
                    "data": "telefono"
                },
                {
                    "data": "acciones"
                }
            ],
            columnDefs: [{
                    targets: 0,
                    visible: false
                },
                {
                    targets: 1,
                    visible: false
                },
                {
                    targets: 4,
                    visible: false
                },
                {
                    targets: 2,
                    visible: false
                }
            ],
            "order": [
                [0, 'desc']
            ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            }
        });

        /* ======================================================================================
        TRAER LISTADO DE PRODUCTOS PARA INPUT DE AUTOCOMPLETADO
        ======================================================================================*/
        $.ajax({
            async: false,
            url: "ajax/productos.ajax.php",
            method: "POST",
            data: {
                'accion': 6
            },
            dataType: 'json',
            success: function(respuesta) {
                console.log("respuesta", respuesta);
                

                for (let i = 0; i < respuesta.length; i++) {
                    items.push(respuesta[i]['nombre'])
                    //console.log("🚀 ~ file: crear-venta.php ~ line 287 ~ $ ~ respuesta", respuesta)

                }
                

                $("#search_cliente").autocomplete({

                    source: items,
                    select: function(event, ui) {
                        //console.log("🚀 ~ file: crear-venta.php ~ line 312 ~ $ ~ ui.item.value", ui.item.value)


                        CargarProductos(ui.item.value);

                        $("#search_cliente").val("");

                        $("#search_cliente").focus();

                        return false;
                    }
                })
                
            }
        });

        /* ======================================================================================
        EVENTO QUE REGISTRA EL PRODUCTO EN EL LISTADO CUANDO SE INGRESA EL CODIGO DE BARRAS
        ======================================================================================*/
        $("#search_cliente").change(function() {
            CargarProductos();
        });

    
    

    })

    /*===================================================================*/
    //FUNCION PARA CARGAR EL NRO DE BOLETA
    /*===================================================================*/
        function CargarNroBoleta() {

            $.ajax({
                async: false,
                url: "ajax/ventas.ajax.php",
                method: "POST",
                data: {
                    'accion': 4
                },
                dataType: 'json',
                success: function(respuesta) {

                    nro_boleta = respuesta["nro_venta"];

                    $("#iptNroVenta").val(nro_boleta);
                }
            });
        }

    /*===================================================================*/
    //FUNCION PARA CARGAR PRODUCTOS EN EL DATATABLE
    /*===================================================================*/
    function CargarProductos(producto = "") {

        if (producto != "") {
            var num_Identidad = producto;

        } else {
            var num_Identidad = $("#search_cliente").val();
        }

        console.log("🚀 ~ file: crear-venta.php ~ line 422 ~ CargarProductos ~ num_Identidad", num_Identidad)

        $.ajax({
            url: "ajax/productos.ajax.php",
            method: "POST",
            data: {
                'accion': 7, //BUSCAR PRODUCTOS POR SU CODIGO DE BARRAS
                'numIdentidad': num_Identidad
            },
            dataType: 'json',
            success: function(respuesta) {

                console.log(respuesta);
                /*===================================================================*/
                //SI LA RESPUESTA ES VERDADERO, TRAE ALGUN DATO
                /*===================================================================*/
                if (respuesta) {

                    table.row.add({
                        'idTercero': respuesta['idTercero'],
                        'idTipTer': respuesta['idTipTer'],
                        'descripcionT': respuesta['descripcionT'],
                        'nombre': respuesta['nombre'],
                        'idTipDoc': respuesta['idTipDoc'],
                        'descripcion': respuesta['descripcion'],
                        'numIdentidad': respuesta['numIdentidad'],
                        'direccion': respuesta['direccion'],
                        'telefono': respuesta['telefono'],
                        'acciones': "<center>" +
                            "<span class='btnEliminarproducto text-danger px-1'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar producto'> " +
                            "<i class='fas fa-trash fs-5'> </i> " +
                            "</span>" +
                            "<div class='btn-group'>" +
                            "<button type='button' class=' p-0 btn btn-primary transparentbar dropdown-toggle btn-sm' data-bs-toggle='dropdown' aria-expanded='false'>" +
                            "<i class='fas fa-cog text-primary fs-5'></i> <i class='fas fa-chevron-down text-primary'></i>" +
                            "</button>" +
                            "</div>" +
                            "</center>"
                    }).draw();

                    /*===================================================================*/
                    //SI LA RESPUESTA ES FALSO, NO TRAE ALGUN DATO
                    /*===================================================================*/
                } else {

                    $("#search_cliente").val("");
                    $("#search_cliente").focus();
                }
            }
        });
    } 

</script>

