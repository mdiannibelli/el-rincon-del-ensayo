<?php
require_once("../db/config/config.php");
if ($db != NULL) {
  $query = "SELECT * FROM salas";
  $result = mysqli_query($db, $query);

  while ($row = mysqli_fetch_array($result)) {
    print "
          <div class='md:mt-0'>
          <div class='flex flex-col gap-x-6 justify-center items-center bg-neutral-900 rounded-md pb-6 h-full relative p-4'>
          <figure>
            <img src=$row[foto] alt=$row[nombre] class='w-64 h-24 object-cover rounded opacity-50 hover:opacity-100 duration-500'/>
          </figure>
              <h2 class='mt-2 text-white uppercase text-lg font-light'>$row[nombre]</h2>
              <p class='text-white text-xs max-w-[300px] text-center my-2'>$row[descripcion]</p>
              <div class='flex mt-2 items-center'>
              <svg class='w-6 h-6 text-gray-800 dark:text-white' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='#ff4b1f' viewBox='0 0 24 24'>
<path fill-rule='evenodd' d='M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z' clip-rule='evenodd'/>
</svg>
                <span class='text-white uppercase text-lg font-medium'>$row[capacidad] PERSONAS</span>
                </div>
                <div class='absolute -right-4 top-0'>
                  <button onclick='toggleEditForm({$row['id_sala']})' class='text-white bg-orange-500 px-2 py-1 rounded-2xl'><svg  xmlns='http://www.w3.org/2000/svg'  width='24'  height='24'  viewBox='0 0 24 24'  fill='none'  stroke='currentColor'  stroke-width='2'  stroke-linecap='round'  stroke-linejoin='round'  class='icon icon-tabler icons-tabler-outline icon-tabler-edit'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><path d='M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1' /><path d='M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z' /><path d='M16 5l3 3' /></svg></button>
                </div>
                <form method='POST' action='../components/security/actualizar-sala.php' id='form-edit-{$row['id_sala']}' style='display: none;' class='flex mt-4'>
                        <input type='hidden' name='id_sala' value='{$row['id_sala']}' />
                        <div class='mt-2'>
                        <input type='text' name='nombre' value='{$row['nombre']}' class='bg-gray-800 text-white px-2 py-1 rounded' />
                        </div>
                        <div class='mt-2'>
                        <textarea name='descripcion' class='bg-gray-800 text-white px-2 py-1 rounded'>{$row['descripcion']}</textarea>
                        </div>
                        <div class='mt-2'>
                        <input type='number' name='capacidad' value='{$row['capacidad']}' class='bg-gray-800 text-white px-2 py-1 rounded' />
                        </div>
                        <div class='mt-2'>
                        <button type='submit' class='text-white bg-green-500 px-3 py-1 rounded-2xl'>Guardar</button>
                        </div>
                </form>
                <form method='POST' action='../components/security/eliminar-sala.php' class='absolute right-8 top-0'>
                  <input type='hidden' name='id_sala' value='" . $row['id_sala'] . "'>
                  <button type='submit' class='text-white bg-red-500 px-3 py-1 rounded-2xl'>X</button>
                </form>
            </div>
          </div>
        ";
  }
}
?>

<script>
  function toggleEditForm(id) {
    const form = document.getElementById(`form-edit-${id}`);
    const isHidden = form.style.display === 'none';
    form.style.display = isHidden ? 'block' : 'none';
  }
</script>