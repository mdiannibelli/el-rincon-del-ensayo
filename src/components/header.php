<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>El Rincón del Ensayo</title>
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
    <nav>
      <ul
        class="flex my-6 md:my-0 gap-x-6 text-xs md:text-base [&>li]:text-white hover:[&>li]:text-orange-500 [&>li]:duration-300">
        <li><a href="../pages/inicio.php">Inicio</a></li>
        <li><a href="../pages/salas.php">Salas</a></li>
        <li><a href="../pages/equipos.php">Equipos</a></li>
        <li><a href="../pages/contacto.php">Contacto</a></li>
      </ul>
    </nav>
    <aside class="my-6 lg:my-0">
      <?php if (isset($_SESSION['nombre']) && $_SESSION['nombre'] != ''): ?>
        <div class="flex items-center gap-x-4">
          <span class="text-white">Bienvenido <strong
              class="text-orange-600"><?php echo $_SESSION['nombre']; ?></strong></span>
          <a href="<?php echo isset($_SESSION['fk_rol']) && $_SESSION['fk_rol'] == 1 ? '../admin/index.php' : '../users/index.php'; ?>"
            class="text-white text-xs bg-orange-600 px-3 py-1 rounded-2xl">Panel</a>
          <form method="POST" action="../components/security/logout.php">
            <button type="submit" class="text-white text-xs bg-gray-900 px-3 py-1 rounded-2xl">Logout</button>
          </form>
        </div>
      <?php else: ?>
        <div class="flex items-center gap-x-4">
          <a href="../pages/ingresar.php" class="flex">
            <svg class='w-6 h-6 text-gray-800 dark:text-white' aria-hidden='true' xmlns='http://www.w3.org/2000/svg'
              width='24' height='24' fill='#ff4b1f' viewBox='0 0 24 24'>
              <path fill-rule='evenodd'
                d='M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z'
                clip-rule='evenodd' />
            </svg>
            <span class="text-orange-600">Iniciar sesión</span>
          </a>
          <div class="w-[1px] h-[14px] bg-orange-600"></div>
          <a href="../pages/registrarse.php">
            <span class="text-white">Registrarse</span>
          </a>
        <?php endif; ?>
      </div>
    </aside>
  </header>