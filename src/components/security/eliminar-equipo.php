<?php
session_start();
require_once("../../db/config/config.php");


if ($db != NULL) {
    $id_equipo;
    if (isset($_POST['id_equipo'])) {
        $id_equipo = mysqli_real_escape_string($db, $_POST['id_equipo']);

        $delete_equipos = "DELETE FROM equipos WHERE id_equipo='$id_equipo'";
        if (!mysqli_query($db, $delete_equipos)) {
            echo "Error eliminando equipos: " . mysqli_error($db);
            exit;
        }

        header("Location: ../../admin/index.php");

    } else {
        echo "ID de equipo no proporcionado.";
    }
}


?>