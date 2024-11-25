<form class="bg-neutral-900 rounded-md p-4 flex justify-center items-center flex-col max-w-[600px] mx-auto gap-y-4"
  action="../components/security/register.php" method="POST">
  <div>
    <input
      class="bg-neutral-950 border-[1px] border-orange-600 text-white px-6 w-[560px] py-2 rounded-md select-none outline-none"
      type="text" placeholder="Nombre Completo" name="nombre">
  </div>
  <div>
    <input
      class="bg-neutral-950 border-[1px] border-orange-600 text-white px-6 w-[560px] py-2 rounded-md select-none outline-none"
      type="email" placeholder="Dirección e-mail" name="email">
  </div>
  <div>
    <input
      class="bg-neutral-950 border-[1px] border-orange-600 text-white px-6 w-[560px] py-2 rounded-md select-none outline-none"
      type="number" placeholder="Número de telefono" name="phone">
  </div>
  <div>
    <input
      class="bg-neutral-950 border-[1px] border-orange-600 text-white px-6 w-[560px] py-2 rounded-md select-none outline-none"
      type="password" placeholder="Contraseña" name="password">
  </div>
  <div>
    <input
      class="bg-neutral-950 border-[1px] border-orange-600 text-white px-6 w-[560px] py-2 rounded-md select-none outline-none"
      type="password" placeholder="Repetir contraseña" name="password2">
  </div>
  <div>
    <button
      class="bg-orange-600 hover:bg-orange-700 duration-500 text-white px-6 w-[560px] py-2 rounded-md font-semibold uppercase mt-2 select-none outline-none"
      type="submit">Registrarse</button>
  </div>

  <?php
  if (isset($_GET['no'])) {
    print "<p class='text-red-500 p-3'>Todos los datos son obligatorios!</p>";

  }
  if (isset($_GET['pass'])) {
    print "<p class='text-red-500 p-3'>Credenciales incorrectas!</p>";

  }
  if (isset($_GET['correo'])) {
    print "<p class='text-red-500 p-3'>El correo ya se encuentra en uso!</p>";

  }
  if (isset($_GET['si'])) {
    print "<p class='text-green-500 p-3' >Se ha creado la cuenta con éxito!</p>";

  }
  ?>
</form>