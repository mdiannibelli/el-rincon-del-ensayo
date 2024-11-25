<?php
require_once("../db/config/config.php");
if ($db != NULL) {
  $query = "SELECT * FROM equipos";
  $result = mysqli_query($db, $query);

  while ($row = mysqli_fetch_array($result)) {
    print "
          <div class='px-10 md:px-2 lg:px-10 md:mt-0'>
          <div class='flex flex-col gap-x-6 justify-center items-center bg-neutral-900 rounded-md pb-6'>
          <figure>
            <img src=$row[foto] alt=$row[nombre] class='w-screen h-64 object-cover rounded opacity-50 hover:opacity-100 duration-500'/>
          </figure>
              <h2 class='mt-2 text-white uppercase text-md md:text-lg xl:text-2xl font-light'>$row[nombre]</h2>
              <p class='text-white text-xs max-w-[300px] text-center my-2'>$row[descripcion]</p>
            </div>
          </div>
        ";
  }
}
?>