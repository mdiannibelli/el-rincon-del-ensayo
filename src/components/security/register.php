<?php
require_once("../../db/config/config.php");

if ($db != NULL) {
  $nombre;
  $email;
  $phone;
  $password;
  $password2;

  if (isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['password']) && isset($_POST['password2'])) {
    $nombre = trim(mysqli_real_escape_string($db, $_POST['nombre']));
    $email = trim(mysqli_real_escape_string($db, $_POST['email']));
    $phone = trim(mysqli_real_escape_string($db, $_POST['phone']));
    $password = trim(mysqli_real_escape_string($db, $_POST['password']));
    $password2 = trim(mysqli_real_escape_string($db, $_POST['password2']));

    if (empty($nombre) || empty($email) || empty($phone) || empty($password) || empty($password2)) {
      header("Location: ../../pages/registrarse.php?no=no");
      exit();
    }

    if ($password == $password2) {
      $query = "SELECT * FROM `usuarios` WHERE `email`='$email'";
      $result = mysqli_query($db, $query);
      if (mysqli_num_rows($result) > 0) {
        header("Location: ../../pages/registrarse.php?correo=no");
      } else {
        $insert = "INSERT INTO usuarios(nombre, email, contrasena, telefono, estado, fk_rol) VALUES ('$nombre', '$email', '$password', '$phone', '1', '2')";

        mysqli_query($db, $insert);
        header("Location: ../../users/panel.php");
      }
    } else {
      header("Location: ../../pages/registrarse.php?pass=no");
    }
  } else {
    header("Location: ../../pages/registrarse.php?no=no");
  }
}


?>