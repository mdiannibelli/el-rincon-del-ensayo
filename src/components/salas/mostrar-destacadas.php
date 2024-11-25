<?php
require_once("../db/config/config.php");
if ($db != NULL) {
  $query = "SELECT * FROM salas ORDER BY precio_hora DESC LIMIT 3";
  $result = mysqli_query($db, $query);

  while ($row = mysqli_fetch_array($result)) {
    print "
          <div class='px-2 mt-4 md:mt-0'>
          <div class='flex flex-col gap-x-6 justify-center items-center bg-neutral-900 rounded-md pb-6'>
          <figure>
            <img src=$row[foto] alt=$row[nombre] class='w-full h-64 object-cover rounded opacity-50 hover:opacity-100 duration-500'/>
          </figure>
              <h2 class='mt-2 text-white uppercase text-2xl font-light'>$row[nombre]</h2>
              <p class='text-white text-xs max-w-[300px] text-center my-2'>$row[descripcion]</p>
              <div class='flex mt-2 items-center'>
              <svg class='w-6 h-6 text-gray-800 dark:text-white' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='#ff4b1f' viewBox='0 0 24 24'>
<path fill-rule='evenodd' d='M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z' clip-rule='evenodd'/>
</svg>
                <span class='text-white uppercase text-lg font-medium'>$row[capacidad] PERSONAS</span>
                </div>
                <a href='../../pages/contacto.php' class='text-white text-sm bg-orange-600 hover:bg-orange-700 duration-500 py-1 px-2 rounded-lg mt-4'>Consultar precio</a>
            </div>
          </div>
        ";
  }
}
?>