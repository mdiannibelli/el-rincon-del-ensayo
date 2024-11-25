<?php
require_once("../db/config/config.php");
if ($db != NULL) {
  $query = "SELECT * FROM usuarios";
  $result = mysqli_query($db, $query);

  while ($row = mysqli_fetch_array($result)) {
    echo "
    <table class='table-auto border-collapse border border-gray-300 w-full text-gray-700'>
        <thead>
            <tr class='bg-gray-200'>
                <th class='border border-gray-700 bg-neutral-950 px-24 py-2'>ID</th>
                <th class='border border-gray-700 bg-neutral-950 px-24 py-2'>Nombre</th>
                <th class='border border-gray-700 bg-neutral-950 px-24 py-2'>Email</th>
                <th class='border border-gray-700 bg-neutral-950 px-24 py-2'>Teléfono</th>
                <th class='border border-gray-700 bg-neutral-950 px-24 py-2'>Estado</th>
                <th class='border border-gray-700 bg-neutral-950 px-24 py-2'>Rol</th>
            </tr>
        </thead>
        <tbody>
    ";

    while ($row = mysqli_fetch_array($result)) {
      echo "
        <tr class='odd:bg-white even:bg-gray-100'>
            <td class='border border-gray-700 bg-neutral-950 px-24 text-center py-2'>{$row['id_usuario']}</td>
            <td class='border border-gray-700 bg-neutral-950 px-24 text-center py-2'>{$row['nombre']}</td>
            <td class='border border-gray-700 bg-neutral-950 px-24 text-center py-2'>{$row['email']}</td>
            <td class='border border-gray-700 bg-neutral-950 px-24 text-center py-2'>{$row['telefono']}</td>
            <td class='border border-gray-700 bg-neutral-950 px-24 text-center py-2'>" . ($row['estado'] ? 'Activo' : 'Inactivo') . "</td>
            <td class='border border-gray-700 bg-neutral-950 px-24 text-center py-2'>" . ($row['fk_rol'] == 1 ? 'Administrador' : 'Usuario') . "</td>
        </tr>
        ";
    }

    echo "
        </tbody>
    </table>
    ";
  }
}
?>