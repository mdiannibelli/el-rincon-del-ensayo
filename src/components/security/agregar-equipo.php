<?php
session_start();
require_once("../../db/config/config.php");

if ($db != NULL) {
  $nombreEquipo;
  $descripcionEquipo;
  $idSala;
  $fotoEquipo;

  if (isset($_POST['nombreEquipo']) && isset($_POST['descripcionEquipo']) && isset($_POST['idSala']) && isset($_FILES['fotoEquipo'])) {
    $nombreEquipo = trim(mysqli_real_escape_string($db, $_POST['nombreEquipo']));
    $descripcionEquipo = trim(mysqli_real_escape_string($db, $_POST['descripcionEquipo']));
    $idSala = trim(mysqli_real_escape_string($db, $_POST['idSala']));

    $tempFile = $_FILES['fotoEquipo']['tmp_name'];
    $newFileName = time() . '_' . $_FILES['fotoEquipo']['name'];
    $pathToUpload = '../../public/imgs/equipos/';
    $dest_path = $pathToUpload . $newFileName;

    if (empty($nombreEquipo) || empty($descripcionEquipo) || empty($idSala)) {
      header("Location: ../../admin/index.php?no=no");
      exit();
    }

    if (move_uploaded_file($tempFile, $dest_path)) {
      $fotoEquipo = '../public/imgs/equipos/' . $newFileName;
      $insert = "INSERT INTO equipos(nombre, descripcion, fk_sala, foto) VALUES ('$nombreEquipo', '$descripcionEquipo', '$idSala', '$fotoEquipo')";
      $result = mysqli_query($db, $insert);
      header("Location: ../../admin/index.php?si=si");
    }

  }
}

?>