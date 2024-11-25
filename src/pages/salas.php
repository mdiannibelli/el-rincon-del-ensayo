<?php
include_once("../components/header.php");

?>

<main>
  <h2 class="text-gray-500 uppercase font-light text-lg md:text-3xl text-center">Todas nuestras salas:</h2>
  <div class="h-[1px] bg-gray-500 w-[80%] md:w-[560px] mt-2 mx-auto"></div>
  <section class="my-12">
    <div class="grid grid-cols-1 md:grid-cols-3 lg:gap-4 gap-y-8 justify-center mt-12 lg:max-w-[1400px] mx-auto">
      <?php
      include_once("../components/salas/mostrar-salas.php");
      ?>
    </div>
  </section>
</main>

<?php
include_once("../components/footer.php");
?>