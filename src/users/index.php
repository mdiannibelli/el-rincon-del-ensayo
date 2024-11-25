<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
  header("Location: ../pages/ingresar.php");
  exit();
}

$nombre = $_SESSION['nombre'];
$email = $_SESSION['email'];
$telefono = $_SESSION['telefono'];
$estado = $_SESSION['estado'];
$fk_rol = $_SESSION['fk_rol'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Panel Usuario</title>
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
    <h1 class="text-orange-600 text-3xl font-bold text-center">
      ¡Bienvenido, <?php echo htmlspecialchars($nombre); ?>!
    </h1>
    <div class="flex flex-col gap-4 text-gray-500 justify-center max-w-[400px] mx-auto my-12 font-light">
      <span>Email: <?php echo htmlspecialchars($email); ?></span>
      <span>Teléfono: <?php echo htmlspecialchars($telefono); ?></span>
      <span>Estado: <?php echo htmlspecialchars($estado); ?></span>
      <span>Rol: <?php echo htmlspecialchars($fk_rol); ?></span>
    </div>
  </main>

  <?php
  include_once("../components/footer.php");
  ?>
</body>

</html>