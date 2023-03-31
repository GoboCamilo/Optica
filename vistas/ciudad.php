
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>DataTables</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Administrador de Ciudades</h3>
            </div>
            <div class="card-body">
              <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modal-crearCiudad">
                Crear Ciudad
              </button>
              <BR></BR>
              <table class="table table-bordered table-striped dt-responsive tablas" >
                <thead>
                      <tr>
                      <th style="width:10px">#</th>
                      <th>Ciudad</th>
                      <th>Acciones</th>

                      </tr>
                </thead>
                <tbody>
                  <?php
                    $item = null;
                    $valor = null;

                    $ciudad = ControladorCiudad::ctrMostrarCiudad($item, $valor);

                    foreach ($ciudad as $key => $value) {


                    echo '<tr>

                            <td>'.($key+1).'</td>

                            <td>'.$value["Ciudad"].'</td>

                            <td> 

                              <div class="btn-group">
      
                                <button class="btn btn-warning btnEditarCiudad"  data-toggle="modal" data-target="#modal-editarCiudad" idCiudad="'.$value["idCiudad"].'"><i class="fas fa-edit"></i></button>

                                <button class="btn btn-danger btnEliminarCiudad" idCiudad="'.$value["idCiudad"].'"><i class="fas fa-times"></i></button>

                              </div>  

                            </td>

                          </tr>';

                    }

                  ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
 

<!--=====================================
MODAL CREAR  tipo TERCERO
======================================-->

<div class="modal fade" id="modal-crearCiudad">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post">
        <div class="modal-header">
          <h4 class="modal-title">Crear Ciudad</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">                
              <div class="col-sm-6">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="nav-icon fas fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Ingrese la ciudad" name="nuevoCiudad" >
                </div>                 
              </div>
            </div>
            <br> 
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        <?php

        $crearCiudad = new ControladorCiudad();
        $crearCiudad -> ctrCrearCiudad();

        ?>
      </form> 
      
    </div>    
  </div>
</div>

<!--=====================================
MODAL EDITAR TIPO TERCERO
======================================-->

<div class="modal fade" id="modal-editarCiudad">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post">
        <div class="modal-header">
          <h4 class="modal-title">Editar la ciudad</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">                
              <div class="col-sm-6">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="nav-icon fas fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" name="editarCiudad" id="editarCiudad" >
                  <input type="hidden"  name="idCiudad" id="idCiudad" required>
                </div>                 
              </div>
            </div>
            <br> 
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        <?php

          $editarCiudad = new ControladorCiudad();
          $editarCiudad -> ctrEditarCiudad();

        ?>
      </form> 
     
    </div>    
  </div>
</div>

<?php

  $borrarCiudad = new ControladorCiudad();
  $borrarCiudad -> ctrBorrarCiudad();

?>


