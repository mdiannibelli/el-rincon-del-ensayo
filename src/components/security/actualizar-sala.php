<?php
require_once("../../db/config/config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_sala = mysqli_real_escape_string($db, $_POST['id_sala']);
    $nombre = mysqli_real_escape_string($db, $_POST['nombre']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $capacidad = mysqli_real_escape_string($db, $_POST['capacidad']);

    $query = "UPDATE salas SET nombre='$nombre', descripcion='$descripcion', capacidad='$capacidad' WHERE id_sala='$id_sala'";

    if (mysqli_query($db, $query)) {
        header("Location: ../../admin/index.php");
    } else {
        echo "Error al actualizar la sala: " . mysqli_error($db);
    }
}
?>