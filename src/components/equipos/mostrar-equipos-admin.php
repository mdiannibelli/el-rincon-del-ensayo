<?php
require_once("../db/config/config.php");
if ($db != NULL) {
  $query = "SELECT * FROM equipos";
  $result = mysqli_query($db, $query);

  while ($row = mysqli_fetch_array($result)) {
    print "
          <div class='relative'>
            <div class='flex flex-col gap-x-6 items-center bg-neutral-900 rounded-md h-[210px]'>
              <figure>
                <img src=$row[foto] alt=$row[nombre] class='w-screen h-24 object-cover rounded opacity-50 hover:opacity-100 duration-500'/>
              </figure>
                  <h2 class='mt-6 text-white uppercase text-md font-light'>$row[nombre]</h2>
                  <p class='text-white text-xs max-w-[300px] text-center my-2'>$row[descripcion]</p>
              </div>
              <div>
                <form method='POST' action='../components/security/eliminar-equipo.php' class='absolute -right-2 top-0'>
                  <input type='hidden' name='id_equipo' value='" . $row['id_equipo'] . "'>
                  <button type='submit' class='text-white bg-red-500 px-3 py-1 rounded-2xl'>X</button>
                </form>
              </div>
            </div> 
        ";
  }
}
?>