<?php 

  //agregar conexion a la base de datos
  require "includes/config/database.php";
  $db = conectar_db();

  //autentificar usuario

  $errores = [];

  if($_SERVER['REQUEST_METHOD'] === "POST" ){
    //var_dump($_POST);

    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(!$email){
      $errores[] = "El email es obligatorio o no es valido";
    }

    if(!$password){
      $errores[] = "El password es obligatorio";
    }

    if(empty($errores)){
      //Revisar si el usuario existe

      $query = "SELECT * FROM usuarios WHERE email = '$email'";

      $resultado = mysqli_query($db, $query);
      
      //var_dump($resultado);

      if($resultado->num_rows){
        //Revisar si el password es correcto
        $usuario = mysqli_fetch_assoc($resultado);

        //Verificar si el password es correcto
        $auth = password_verify($password, $usuario['password']);

        //var_dump($auth);
        if($auth){
          //El usuario esta autenticado
          session_start();

          //Llenar el arreglo de la sesion
          $_SESSION['usuario'] = $usuario['email'];
          $_SESSION['login'] = true;

          header("Location: /real-estate-php/admin/index.php");

        } else{
          $errores[] = "Password Incorrecto";
        }

      } else{
        $errores[] = "El usuario no existe";
      }

      
    }
  }

//Agrega el header
   require 'includes/funciones.php';
   incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
      <h1>Iniciar Sesión</h1>

      <?php 
        foreach($errores as $error):?>

          <div class="alerta error">
            <?= "$error"; ?>
          </div>
      <?php endforeach;?>


      <form action="" class="formulario" method="POST" nonvalidate>
          <fieldset>
            <legend>Email y Password</legend>
  
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" placeholder="Tu correo" />
  
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Tu password" />
  
          </fieldset>

          <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
      </form>
    </main>
    <?php incluirTemplate("footer"); ?>

