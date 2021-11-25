<?php

  /* Creamos una variable de clase SESSION para usarla la linea 22 */
  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: login.php'); 
  }

  /* Establecemos conexion con la DB */
  require './lib/database.php';


  // Si user y pasword estan rellenados, realizamos la consulta.
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    // Preparamos la consulta
    $records = $conn->prepare('SELECT user_id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $message = '';



    /*  Comprobamos que los datos pasados son lo que tenemos en la DB */
    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) { // NO ME ESTA VERIFICANDO EL SEGUNDO PARAMETRO  && password_verify($_POST['password'], $results['password'])
      /* El id_user que sacamos de la DB lo almacenamos en la variable y creamos la variable de session */
      $_SESSION['user_id'] = $results['user_id'];
      /* Redireccionaremos a la pagina inicial */
        header("location:index.php");
      }else{
          $message ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
          <strong>Error no se encontraron tus datos</strong> Por favor, verifica tus datos.
          <span aria-hidden='true'>&times;</span>
          </button>
          </div>";
          
    }
  }


?>



<!DOCTYPE html>
        <html>
          <head>
            <meta charset="utf-8">
            <title>Login</title>
            <link rel="stylesheet" type="text/css" href="css/login.css">  
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
                
          </head>
  <body>


<!--- LOGIN --->  

    <section id="content">
          <form action="login.php" method="POST">
                <div class="container">
                    <div class="brand-logo"></div>
                    <div class="brand-title">LOGIN</div>
                    <div class="inputs">
                        <label>USER</label>
                        <input name="email" type="text" placeholder="Enter your email">
                        <label>PASSWORD</label>
                        <input name="password" type="password" placeholder="Enter your Password">
                        <input type="submit" value="ACCES"></div>
                        <div><p><a href="signup.php">Create an account</p></div>
                        
                </div>
          </form>
    </section>


  </body>
</html>
