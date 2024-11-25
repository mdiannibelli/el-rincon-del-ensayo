<?php
require_once("../db/config/config.php");
if ($db != NULL) {
  $query = "SELECT * FROM salas";
  $result = mysqli_query($db, $query);

  while ($row = mysqli_fetch_array($result)) {
    print "
          <div class='md:mt-0'>
          <div class='flex flex-col gap-x-6 justify-center items-center bg-neutral-900 rounded-md pb-6 h-[250px]'>
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
            </div>
          </div>
        ";
  }
}
?>