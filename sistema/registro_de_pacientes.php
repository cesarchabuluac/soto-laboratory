<?php include_once "includes/header.php";?>
<?php include_once "modelo_guardar.php";?>
<!--BOOSTRAP ONLINE-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
  integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
  </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
  integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
  </script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="js\moment.js"></script>


<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pacientes Registrados</h1>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
      style="background:#06383e">
      + <i class="fas fa-user" style="color: white;font-size: 30px;"></i>
    </button>
  </div>
  <!-- Content Row -->
  <div class="row">
    <div class="col-lg-12">
      <!-- MODAL PARA REGISTAR CLIENTES--->
      <!-- Modal Para registrar el cliente -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <br>
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Registrar Paciente</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header  text-white" style="background:   #1d6376  ;">
                    Datos del Paciente
                  </div>
                  <div class="card-body">
                    <form action="modelo_guardar.php" method="post" autocomplete="off" style="color:black ">
                      <?php echo isset($alert) ? $alert : ''; ?>
                      <div class="form-group row">
                        <div class="col-md-6">
                          <label for="nombre">Nombre y Apellidos <i class="fas fa-lock" style="color:red"></i></label>
                          <input type="text" class="form-control" placeholder="Ingrese Nombre y Apellidos"
                            name="nombre_paciente" id="nombre_paciente" autocomplete="" required="">
                        </div>
                        <div class="col-md-6">
                          <label for="nombre">DPI </label>
                          <input type="text" class="form-control" placeholder="Ingrese DPI" name="dpi_paciente"
                            id="dpi_paciente" autocomplete="">
                        </div>
                        <div class="col-md-6">
                          <label for="nombre">Género</label>
                          <select type="text" class="form-control" placeholder="Género" name="id_genero" id="id_genero"
                            autocomplete="off" required="">
                            <option selected="" value="">Seleccionar Género</option>
                            <?php
                            
                            foreach ($generos as $generos_encontrados) {
                            ?>
                            <option value="<?php echo $generos_encontrados['id_genero'] ?>">
                              <?php echo $generos_encontrados['nombre_genero'] ?>
                            </option>
                            <?php
                            }
                            ?>

                          </select>
                        </div>
                        <div class="col-md-6">
                          <label for="nombre">Teléfono</label>
                          <input type="text" class="form-control" placeholder="Ingrese Teléfono"
                            name="telefono_paciente" id="telefono_paciente" autocomplete="">
                        </div>

                        <div class="col-md-6">
                          <label for="nombre">Correo Electrónico</label>
                          <input type="text" class="form-control" placeholder="Ingrese correo" name="correo_paciente"
                            id="correo_paciente" autocomplete="off">
                        </div>
                        <div class="col-md-6">
                          <label for="nombre">Dirección Domiciliar</label>
                          <input type="text" class="form-control" placeholder="Ingrese Dirección"
                            name="direccion_paciente" id="direccion_paciente" autocomplete="off">
                        </div>
                        <div class="col-md-6">
                          <label for="nombre">Fecha de Nacimiento</label>
                          <input type="date" class="form-control" placeholder="Ingrese Fecha de Nacimiento"
                            name="fecha_nacimiento_paciente" id="fecha_nacimiento_paciente" autocomplete="off"
                            onchange="ocultar_edad()">
                        </div>
                        <div class="col-md-6">
                          <label for="nombre" id="agregar_edad_titulo">Edad</label>
                          <input type="text" class="form-control" placeholder="Ingrese Edad" name="edad_paciente"
                            id="edad_paciente" autocomplete="off" onclick="ocultar_edad()">
                        </div>


                        <script type="text/javascript">
                          function ocultar_edad() {

                            var fecha_nacimiento_paciente = (document.getElementById(
                              "fecha_nacimiento_paciente").value);

                            if (fecha_nacimiento_paciente == 0) {


                              var edad_paciente = document.getElementById("edad_paciente");
                              var agregar_edad_titulo = document.getElementById(
                                "agregar_edad_titulo");
                              edad_paciente.style.display = "block";
                              agregar_edad_titulo.style.display = "block";

                            } else {
                              var edad_paciente = document.getElementById("edad_paciente");
                              var agregar_edad_titulo = document.getElementById(
                                "agregar_edad_titulo");

                              edad_paciente.style.display = "none";
                              agregar_edad_titulo.style.display = "none";


                            }

                          }
                        </script>
                        <div class="col-md-12">
                          <br>
                          <button class="btn btn-primary" type="submit" class="btn btn-primary-outline"
                            style="color: white" name="guardar_paciente" value="Crear Formulario"> <i
                              class="fas fa-user" style="font-size:40px"></i> Guardar
                            Paciente</button>
                        </div>
                      </div>
                  </div>

                  <div class="col-md-6">
                    <br>
                  </div>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="col-lg-12">
      <div class="table-responsive">
        <table id="registro_paciente" class="table table-striped table-bordered" cellspacing="0" width="100%"
          style="color:black;font-size: 15px;font-family: inherit;">
          <thead style="font-size: 12px;">
            <tr>
              <th>#</th>
              <th>Editar</th>
              <th>DPI</th>
              <th>Nombre & Apellidos</th>
              <th>Teléfono</th>
              <th>Género</th>
              <th>Correo</th>
              <th>Dirección</th>
              <th>Fecha de Nacimiento</th>
              <th>Solicitar Prueba</th>
              <th>Cargar Resultados</th>
              <th>Cotización</th>
            </tr>
          </thead>
          <tbody style="font-size:13px">
          </tbody>
        </table>

      </div>
    </div>

  </div>
</div>
</div>

<!-- FIN ROW-->
<?php include_once "includes/footer.php";?>