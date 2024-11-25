<form class="bg-neutral-900 rounded-md p-4 flex justify-center items-center flex-col max-w-[600px] mx-auto gap-y-4">
  <h1 class="text-gray-500 uppercase font-light text-lg md:text-3xl text-center mt-2 mb-4">Consultá por tu sala</h1>
  <div>
    <input
      class="bg-neutral-950 border-[1px] border-orange-600 text-white px-6 w-[560px] py-2 rounded-md select-none outline-none"
      type="text" placeholder="Nombre" name="nombre">
  </div>
  <div>
    <input
      class="bg-neutral-950 border-[1px] border-orange-600 text-white px-6 w-[560px] py-2 rounded-md select-none outline-none"
      type="text" placeholder="Apellido" name="apellido">
  </div>
  <div>
    <input
      class="bg-neutral-950 border-[1px] border-orange-600 text-white px-6 w-[560px] py-2 rounded-md select-none outline-none"
      type="email" placeholder="Dirección e-mail" name="email">
  </div>
  <div>
    <label for="sala" class="text-gray-400 p-1">Sala a consultar:</label>
    <select
      class="mt-2 bg-neutral-950 border-[1px] border-orange-600 text-white px-6 w-[560px] py-2 rounded-md select-none outline-none"
      name="sala" id="sala">
      <?php
      require_once("../db/config/config.php");
      if ($db != NULL) {
        $query = "SELECT * FROM salas";
        $result = mysqli_query($db, $query);

        while ($row = mysqli_fetch_array($result)) {
          print "
              <option value=$row[nombre]>$row[nombre]</option>
            ";
        }
      }
      ?>
    </select>
  </div>
  <div>
    <label for="horario" class="text-gray-400 p-1">Horario:</label>
    <select name="horario" id="horario"
      class="mt-2 bg-neutral-950 border-[1px] border-orange-600 text-white px-6 w-[560px] py-2 rounded-md select-none outline-none">
      <?php
      require_once("../db/config/config.php");
      if ($db != NULL) {
        $query = "SELECT * FROM horarios_disponibles";
        $result = mysqli_query($db, $query);

        while ($row = mysqli_fetch_array($result)) {
          print "
              <option value=$row[hora_inicio]>$row[dia_semana]: $row[hora_inicio] - $row[hora_fin]</option>
            ";
        }
      }
      ?>
    </select>
  </div>
  <div>
    <input
      class="bg-orange-600 text-white px-6 w-[560px] py-2 rounded-md font-semibold uppercase mt-6 select-none outline-none"
      type="submit" placeholder="Consultar">
  </div>
</form>