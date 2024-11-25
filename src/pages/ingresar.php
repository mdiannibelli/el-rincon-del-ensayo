<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Iniciar Sesión</title>
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

  <main class="my-24">
    <h1 class="text-gray-500 uppercase font-light text-lg md:text-3xl text-center mt-2 mb-4">Ingresá tus credenciales
    </h1>
    <?php
    include_once("../components/form/inicio-sesion.php");
    ?>
  </main>

  <?php
  include_once("../components/footer.php")
    ?>
</body>

</html>