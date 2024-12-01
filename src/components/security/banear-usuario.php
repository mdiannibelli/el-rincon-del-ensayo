<?php
session_start();
require_once("../../db/config/config.php");


if ($db != NULL) {
    $id_usuario;
    if (isset($_POST['id_usuario'])) {
        $id_usuario = mysqli_real_escape_string($db, $_POST['id_usuario']);

        $get_state = "SELECT estado FROM usuarios WHERE id_usuario=$id_usuario";
        $result = mysqli_query($db, $get_state);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $current_status = $row['estado'];

            $new_status = ($current_status == 1) ? 2 : 1;

            $modify_user = "UPDATE usuarios SET estado='$new_status' WHERE id_usuario=$id_usuario";
            $query_result = mysqli_query($db, $modify_user);
            if (!$query_result) {
                echo "Error al actualizar el usuario: ";
                exit;
            }

            header("Location: ../../admin/index.php");
            exit;
        }

    } else {
        echo "ID de usuario no proporcionado.";
    }
}


?>