<?php
session_start();
require_once("../../db/config/config.php");

if ($db != NULL) {
  $email;
  $password;

  if (isset($_POST['email']) and isset($_POST['password'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $query = "SELECT * FROM usuarios WHERE email='$email'";
    $result = mysqli_query($db, $query);

    $data = mysqli_fetch_array($result);

    if ($data == NULL) {
      header("Location: ../../pages/ingresar.php?log=no");
    }

    if ($data['estado'] == 1) { // si esta activo..
      $query2 = "SELECT * FROM usuarios WHERE email='$email' AND contrasena='$password'";
      $result2 = mysqli_query($db, $query2);
      $data2 = mysqli_fetch_array($result2);
      if ($data2 == NULL) {
        header("Location: ../../pages/ingresar.php?pass=no");
      } else {
        if ($data2['fk_rol'] == 1) { // si es administrador (1)
          $_SESSION = $data2;
          header("Location: ../../admin/index.php");
        } else { // si es usuario (2)
          $_SESSION = $data2;
          header("Location: ../../users/index.php");
        }
      }
    }
  }
}

?>