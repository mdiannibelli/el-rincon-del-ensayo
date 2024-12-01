<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Panel Administrador</title>
  <link rel="stylesheet" href="../styles/hide-scrollbar.css">
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="../public/icons/favicon.png">
</head>

<body class="bg-neutral-950">
  <header class="flex flex-col lg:flex-row justify-around items-center my-2">
    <div>
      <figure>
        <a href="../pages/inicio.php">
          <img src="../public/imgs/logo.png" alt="El Rincón del Ensayo"
            class="h-[60%] w-[60%] mx-auto md:h-full md:w-full object-cover">
        </a>
      </figure>
    </div>
  </header>

  <main>
    <h1 class="text-4xl text-gray-500 font-light uppercase text-center mt-8">Panel Administrativo</h1>
    <div class="h-[1.5px] bg-gray-700 w-[60%] mx-auto my-4"></div>

    <section class="flex flex-col">
      <h2 class="p-6 text-gray-500 font-2xl uppercase font-light">Todas las salas</h2>
      <div class="scroll-container flex overflow-x-scroll gap-x-8 px-4">
        <?php
        include_once("../components/salas/mostrar-salas-admin.php");
        ?>
      </div>
      <span class="my-4 text-gray-500 font-2xl uppercase font-light text-center">Deslizar para ver las demás>></span>
    </section>

    <section class="flex flex-col">
      <h2 class="p-6 text-gray-500 font-2xl uppercase font-light">Todos los equipos</h2>
      <div class="scroll-container flex overflow-x-scroll gap-x-8 px-4">
        <?php
        include_once("../components/equipos/mostrar-equipos-admin.php");
        ?>
      </div>
      <span class="my-4 text-gray-500 font-2xl uppercase font-light text-center">Deslizar para ver los demás>></span>
    </section>

    <section class="flex justify-around max-w-[1280px] mx-auto">
      <div>
        <h2 class="p-6 text-gray-500 font-2xl uppercase font-light">Agregar nueva sala+</h2>
        <form action="../components/security/agregar-sala.php" enctype="multipart/form-data" method="POST" class="px-8">
          <div class="flex flex-col">
            <label for="nombreSala" class="text-gray-400 p-1">Nombre:</label>
            <input
              class="bg-neutral-950 border-[1px] border-orange-600 text-white px-6 w-[560px] py-2 rounded-md select-none outline-none"
              type="text" name="nombreSala" id="nombreSala">
          </div>
          <div class="flex flex-col">
            <label for="descripcionSala" class="text-gray-400 p-1">Descripción:</label>
            <input
              class="bg-neutral-950 border-[1px] border-orange-600 text-white px-6 w-[560px] py-2 rounded-md select-none outline-none"
              type="text" name="descripcionSala" id="descripcionSala">
          </div>
          <div class="flex flex-col">
            <label for="capacidadSala" class="text-gray-400 p-1">Capacidad:</label>
            <input
              class="bg-neutral-950 border-[1px] border-orange-600 text-white px-6 w-[560px] py-2 rounded-md select-none outline-none"
              type="number" min="1" max="10" name="capacidadSala" id="capacidadSala">
          </div>
          <div class="flex flex-col">
            <label for="precioSala" class="text-gray-400 p-1">Precio por hora:</label>
            <input
              class="bg-neutral-950 border-[1px] border-orange-600 text-white px-6 w-[560px] py-2 rounded-md select-none outline-none"
              type="number" name="precioSala" id="precioSala">
          </div>
          <div class="flex flex-col">
            <label for="direccionSala" class="text-gray-400 p-1">Dirección:</label>
            <input
              class="bg-neutral-950 border-[1px] border-orange-600 text-white px-6 w-[560px] py-2 rounded-md select-none outline-none"
              type="text" name="direccionSala" id="direccionSala">
          </div>
          <div class="flex flex-col">
            <label for="fotoSala" class="text-gray-400 p-1">Imagen:</label>
            <input
              class="bg-neutral-950 border-[1px] border-orange-600 text-white px-6 w-[560px] py-2 rounded-md select-none outline-none"
              type="file" accept="image/*" name="fotoSala" id="fotoSala">
          </div>
          <div>
            <button
              class="bg-orange-600 text-white px-6 w-[560px] py-2 rounded-md font-semibold uppercase mt-6 select-none outline-none"
              type="submit">Agregar sala</button>
          </div>
        </form>
      </div>
      <div>
        <h2 class="p-6 text-gray-500 font-2xl uppercase font-light">Agregar nuevo equipo+</h2>
        <form action="../components/security/agregar-equipo.php" enctype="multipart/form-data" method="POST"
          class="px-8">
          <div class="flex flex-col">
            <label for="nombreEquipo" class="text-gray-400 p-1">Nombre:</label>
            <input
              class="bg-neutral-950 border-[1px] border-orange-600 text-white px-6 w-[560px] py-2 rounded-md select-none outline-none"
              type="text" name="nombreEquipo" id="nombreEquipo">
          </div>
          <div class="flex flex-col">
            <label for="descripcionEquipo" class="text-gray-400 p-1">Descripción:</label>
            <input
              class="bg-neutral-950 border-[1px] border-orange-600 text-white px-6 w-[560px] py-2 rounded-md select-none outline-none"
              type="text" name="descripcionEquipo" id="descripcionEquipo">
          </div>
          <div>
            <label for="idSala" class="text-gray-400 p-1">Pertenece a la sala:</label>
            <select
              class="mt-2 bg-neutral-950 border-[1px] border-orange-600 text-white px-6 w-[560px] py-2 rounded-md select-none outline-none"
              name="idSala" id="idSala">
              <?php
              require_once("../db/config/config.php");
              if ($db != NULL) {
                $query = "SELECT * FROM salas";
                $result = mysqli_query($db, $query);

                while ($row = mysqli_fetch_array($result)) {
                  print "
              <option value=$row[id_sala]>$row[nombre]</option>
            ";
                }
              }
              ?>
            </select>
          </div>
          <div class="flex flex-col">
            <label for="fotoEquipo" class="text-gray-400 p-1">Imagen:</label>
            <input
              class="bg-neutral-950 border-[1px] border-orange-600 text-white px-6 w-[560px] py-2 rounded-md select-none outline-none"
              type="file" accept="image/*" name="fotoEquipo" id="fotoEquipo">
          </div>
          <div>
            <button
              class="bg-orange-600 text-white px-6 w-[560px] py-2 rounded-md font-semibold uppercase mt-6 select-none outline-none"
              type="submit">Agregar equipo</button>
          </div>
        </form>
      </div>
    </section>
    <div class="text-center">
      <?php
      if (isset($_GET['no'])) {
        print "<p class='text-red-500 p-3'>Todos los campos son obligatorios!</p>";

      }
      if (isset($_GET['si'])) {
        print "<p class='text-green-500 p-3' >Se ha agregado un nuevo item!</p>";

      }
      ?>
    </div>

    <section class="flex flex-col">
      <h2 class="p-6 text-gray-500 font-2xl uppercase font-light text-center mt-8">Todos los usuarios</h2>
      <div class="flex flex-col mx-auto p-8">
        <?php
        include_once("../components/users/mostrar-usuarios-admin.php");
        ?>
      </div>
    </section>


  </main>

  <?php
  include_once("../components/footer.php");
  ?>
</body>

</html>