<?php
require_once("../db/config/config.php");
if ($db != NULL) {
  $query = "SELECT * FROM equipos";
  $result = mysqli_query($db, $query);

  while ($row = mysqli_fetch_array($result)) {
    print "
          <div>
          <div class='flex flex-col gap-x-6 items-center bg-neutral-900 rounded-md h-[210px]'>
          <figure>
            <img src=$row[foto] alt=$row[nombre] class='w-screen h-24 object-cover rounded opacity-50 hover:opacity-100 duration-500'/>
          </figure>
              <h2 class='mt-6 text-white uppercase text-md font-light'>$row[nombre]</h2>
              <p class='text-white text-xs max-w-[300px] text-center my-2'>$row[descripcion]</p>
            </div>
          </div>
        ";
  }
}
?>