<?php
include "includes/header.php";?>

<?php include_once "modelo_consulta.php";?>

<?php
if(isset($paciente_editar))
{
foreach ($paciente_editar as  $encontrados)
                            {
                            
                            //OTRA FORMA DE EXTRER REGISTROS CON FOREACH

                            }
                        }
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Paciente</h1>
        <a href="registro_de_pacientes.php" class="btn btn-primary"><i class="fas fa-arrow-circle-left" ></i> Regresar</a>
    </div>


  <div class="row">
  
 
<div class="col-lg-12">
                <div class="card">
                    <div class="card-header  text-white" style="background:  #1d6376  ;">
                        Datos del Paciente
                    </div>
                    <div class="card-body" >
            <form action="modelo_update.php" method="post" autocomplete="off" style="color:black ">
                <?php echo isset($alert) ? $alert : ''; ?>
          
                              <input type="hidden" class="form-control" placeholder="id_paciente" name="id_paciente" id="id_paciente" autocomplete="" required="" value="<?php echo $id_paciente ?>">


                       <div class="form-group row"> 
 
    <div class="col-md-6" >
             
                    <label for="nombre">Nombre y Apellidos <i class="fas fa-lock" style="color:red"></i></label>
                    <input type="text" class="form-control" placeholder="Ingrese Nombre y Apellidos" name="nombre_paciente" id="nombre_paciente" autocomplete="" required="" value="<?php echo $encontrados['nombre_paciente']; ?>">
                </div>
<div class="col-md-6" >
                    <label for="nombre">DPI </label>
                    <input type="text" class="form-control" placeholder="Ingrese DPI" name="dpi_paciente" id="dpi_paciente" autocomplete="" value="<?php echo $encontrados['dpi_paciente']; ?>" >
                </div>
<div class="col-md-6" >
                    <label for="nombre">Género</label>
                    <select type="text" class="form-control" placeholder="Género" name="id_genero" id="id_genero" autocomplete="off" required="" >
               



                     <?php

                      $id_genero=$encontrados['id_genero'];
                               
                      foreach ($generos as $generos_encontrados) {
                  
                      ?>

                        <option value="<?php echo $generos_encontrados['id_genero'] ?>" 


                            <?php if($generos_encontrados['id_genero']==$id_genero)
                              {
                                echo "selected";
                              }


                            ?>

          

                            >



                            <?php echo $generos_encontrados['nombre_genero'] ?>
                            




                        </option>
                         <?php 

                     } 


                      ?>

                  
                    </select>
                </div>
<div class="col-md-6" >
                    <label for="nombre">Teléfono</label>
                    <input type="text" class="form-control" placeholder="Ingrese Teléfono" name="telefono_paciente" id="telefono_paciente" autocomplete=""  value="<?php  echo $encontrados['telefono_paciente'] ?>">
                </div>
               
<div class="col-md-6" >
                    <label for="nombre">Correo Electrónico</label>
                    <input type="text" class="form-control" placeholder="Ingrese correo" name="correo_paciente" id="correo_paciente" autocomplete="off"  value="<?php  echo $encontrados['correo_paciente'] ?>">
                </div>

<div class="col-md-6" >
                    <label for="nombre">Dirección Domiciliar</label>
                    <input type="text" class="form-control" placeholder="Ingrese Dirección" name="direccion_paciente" id="direccion_paciente" autocomplete="off"  value="<?php  echo $encontrados['direccion_paciente'] ?>">
                </div>
<div class="col-md-6" >
                    <label for="nombre">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" placeholder="Ingrese Fecha de Nacimiento" name="fecha_nacimiento_paciente" id="fecha_nacimiento_paciente" autocomplete="off"  value="<?php  echo $encontrados['fecha_nacimiento_paciente'] ?>" onchange="ocultar_edad()">
                </div>
        

<?php

if($encontrados['fecha_nacimiento_paciente']>0)
{

}
else{
  ?>



<div class="col-md-6" >
                       <label for="nombre" id="agregar_edad_titulo">Edad</label>
                    <input type="text" class="form-control" placeholder="Ingrese Edad" name="edad_paciente" id="edad_paciente" autocomplete="off" onclick="ocultar_edad()" value="<?php  echo $encontrados['edad_paciente'] ?>">
                </div>
<?php

}
 ?>

<script type="text/javascript">
    
function ocultar_edad(){

var fecha_nacimiento_paciente=(document.getElementById("fecha_nacimiento_paciente").value);

if(fecha_nacimiento_paciente==0)
{


    var edad_paciente= document.getElementById("edad_paciente");
    var agregar_edad_titulo=document.getElementById("agregar_edad_titulo");
      edad_paciente.style.display ="block";
    agregar_edad_titulo.style.display="block";

}
else
{
    var edad_paciente= document.getElementById("edad_paciente");
        var agregar_edad_titulo=document.getElementById("agregar_edad_titulo");

      edad_paciente.style.display ="none";
          agregar_edad_titulo.style.display="none";


}

}


</script>

     <div class="col-md-6" >
                <br>

                <button  type="submit" value="" class="btn btn-primary" name="editar_paciente"><i class="fas fa-save"></i> Guardar Cambios</button>
            </div>
            </div>
        </div>
            </form>
        </div>
    </div>

   </div>

 </div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>