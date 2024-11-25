<form class="bg-neutral-900 rounded-md p-4 flex justify-center items-center flex-col max-w-[600px] mx-auto gap-y-4"
  action="../components/security/login.php" method="POST">
  <div>
    <input
      class="bg-neutral-950 border-[1px] border-orange-600 text-white px-6 w-[560px] py-2 rounded-md select-none outline-none"
      type="email" placeholder="E-mail" name="email">
  </div>
  <div>
    <input
      class="bg-neutral-950 border-[1px] border-orange-600 text-white px-6 w-[560px] py-2 rounded-md select-none outline-none"
      type="password" placeholder="Contraseña" name="password">
  </div>
  <div>
    <button
      class="bg-orange-600 hover:bg-orange-700 duration-500 text-white px-6 w-[560px] py-2 rounded-md font-semibold uppercase mt-2 select-none outline-none"
      type="submit">Ingresar</button>
  </div>

  <?php
  if (isset($_GET['log'])) {
    print "<p class='text-red-500 p-3' >No se ha encontrado un usuario con el email ingresado!</p>";

  }
  if (isset($_GET['pass'])) {
    print "<p class='text-red-500 p-3'>Credenciales incorrectas!</p>";

  }
  ?>
</form>