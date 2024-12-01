<?php
session_start();
require_once("../../db/config/config.php");


if ($db != NULL) {
    $id_sala;
    if (isset($_POST['id_sala'])) {
        $id_sala = mysqli_real_escape_string($db, $_POST['id_sala']);

        $delete_horarios_disponibles = "DELETE FROM horarios_disponibles WHERE fk_sala='$id_sala'";
        if (!mysqli_query($db, $delete_horarios_disponibles)) {
            echo "Error eliminando horarios disponibles: " . mysqli_error($db);
            exit;
        }

        $delete_equipos = "DELETE FROM equipos WHERE fk_sala='$id_sala'";
        if (!mysqli_query($db, $delete_equipos)) {
            echo "Error eliminando equipos: " . mysqli_error($db);
            exit;
        }

        $delete_imagenes = "DELETE FROM imagenes_salas WHERE fk_sala='$id_sala'";
        if (!mysqli_query($db, $delete_imagenes)) {
            echo "Error eliminando imagenes de salas: " . mysqli_error($db);
            exit;
        }

        $delete_reservas = "DELETE FROM reservas WHERE fk_sala='$id_sala'";
        if (!mysqli_query($db, $delete_reservas)) {
            echo "Error eliminando reservas: " . mysqli_error($db);
            exit;
        }

        $delete_reseñas = "DELETE FROM reseñas WHERE fk_sala='$id_sala'";
        if (!mysqli_query($db, $delete_reseñas)) {
            echo "Error eliminando reseñas: " . mysqli_error($db);
            exit;
        }

        $delete_salas = "DELETE FROM salas WHERE id_sala='$id_sala'";
        if (!mysqli_query($db, $delete_salas)) {
            echo "Error eliminando salas: " . mysqli_error($db);
            exit;
        }

        header("Location: ../../admin/index.php");

    } else {
        echo "ID de sala no proporcionado.";
    }
}


?>