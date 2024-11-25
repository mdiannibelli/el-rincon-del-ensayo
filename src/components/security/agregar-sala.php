<?php
session_start();
require_once("../../db/config/config.php");

if ($db != NULL) {
  $nombreSala;
  $descripcionSala;
  $capacidadSala;
  $precioSala;
  $direccionSala;
  $fotoSala;

  if (isset($_POST['nombreSala']) && isset($_POST['descripcionSala']) && isset($_POST['capacidadSala']) && isset($_POST['precioSala']) && isset($_POST['direccionSala']) && isset($_FILES['fotoSala'])) {
    $nombreSala = trim(mysqli_real_escape_string($db, $_POST['nombreSala']));
    $descripcionSala = trim(mysqli_real_escape_string($db, $_POST['descripcionSala']));
    $capacidadSala = trim(mysqli_real_escape_string($db, $_POST['capacidadSala']));
    $precioSala = trim(mysqli_real_escape_string($db, $_POST['precioSala']));
    $direccionSala = trim(mysqli_real_escape_string($db, $_POST['direccionSala']));

    $tempFile = $_FILES['fotoSala']['tmp_name'];
    $newFileName = time() . '_' . $_FILES['fotoSala']['name'];
    $pathToUpload = '../../public/imgs/rooms/';
    $dest_path = $pathToUpload . $newFileName;

    if (empty($nombreSala) || empty($descripcionSala) || empty($capacidadSala) || empty($precioSala) || empty($direccionSala)) {
      header("Location: ../../admin/index.php?no=no");
      exit();
    }

    if (move_uploaded_file($tempFile, $dest_path)) {
      $fotoSala = '../public/imgs/rooms/' . $newFileName;
      $insert = "INSERT INTO salas(nombre, descripcion, capacidad, precio_hora, direccion, foto) VALUES ('$nombreSala', '$descripcionSala', '$capacidadSala', '$precioSala', '$direccionSala', '$fotoSala')";
      $result = mysqli_query($db, $insert);
      header("Location: ../../admin/index.php?si=si");
    }
  }
}

?>