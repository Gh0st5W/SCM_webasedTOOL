
<!----------------------------- SESSION -------------------------------->


<?php
// Recordamos la variable de session creada en el login 
  session_start();

  // Importamos los datos de conexión 
  require './lib/database.php';


  // Validar una varible de session al pasar por el login, restringiendo al acceso si no se accede con credenciales
  $usuario = $_SESSION['user_id'];    // Es el nombre del campo de nuestra base de datos
    // Si no se ha logeado el usuario, lo mandamos al login. Si no se ha seteado la variable $usuario, al login
  if (!isset($usuario)) {
        header("location:login.php"); //----> Por lo que sea no está setenado $usuario
  }
  

?>

<!----------------------------------------------------------------------->






<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

        <!-- G:\6_DESARROLLO\HTML\_BOOTSTRAP 5\startbootstrap-sb-admin-gh-pages\startbootstrap-sb-admin-gh-pages -->
    </head>

    <body>
<!-- Header -->

<?php
    include "header.php";
?>

<!-- Sidebar -->

<?php
    include "sidebar.php";
?>



            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Components</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Components</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>code</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
<?php
    
    $conn=mysqli_connect('localhost','root','1234','db_tucai_scm');

    // Sintaxis de la consulta
    $sql = "SELECT * FROM articles";
    // Ejecutamos la consulta
    $result=mysqli_query($conn,$sql);
    $array = mysqli_fetch_array($result);

    while($mostrar=mysqli_fetch_array($result)){
?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $mostrar['art_code']?></td>
                                            <td><?php echo $mostrar['art_description']?></td>
                                        </tr>

<?php
    //Cierro  aqui para incluir los resultados en el bucle
    }
?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>


<!-- Footer -->

<?php
    include "footer.php";
?>

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
