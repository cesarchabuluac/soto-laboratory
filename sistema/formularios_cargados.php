<?php include_once "includes/header.php";?>

<?php include_once "modelo_guardar.php";?>
<?php include_once "modelo_consulta.php";?>


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
        <h1 class="h3 mb-0 text-gray-800">Formularios Realizados</h1>

</div>
 <div class="card">
     <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="resultados_pac" class="table table-striped table-bordered" cellspacing="0" width="100%" style="color:black;font-size: 15px;font-family: inherit;">
                        <thead style="font-size: 12px;">
                            <tr>
                                <th>#</th>
                                <th>Nombre & Apellidos</th>
                                <th>Código Formulario</th>
                                <th>Fecha</th>
                                <th>hora</th>
                                <th>Referido</th>
                                <th>Técnico</th>
                                <th>Área</th>
                                <th>Visualizar</th>
                                <th>última Modificación</th>
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