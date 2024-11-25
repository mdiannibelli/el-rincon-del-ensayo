<?php
include_once("../components/header.php");

?>

<main>
  <div class="relative">
    <div class="relative">
      <img src="../public/imgs/background.jpg" alt="Sala de ensayo"
        class="object-cover max-h-[720px] opacity-30 h-full w-full">
    </div>
    <div class="absolute inset-0 flex flex-col items-center justify-center">
      <h1 class="text-white text-4xl px-4 md:px-0 md:text-4xl lg:text-5xl xl:text-6xl font-medium">Encontrá las
        <strong class="text-orange-600">mejores salas</strong>
        de
        ensayo
      </h1>
      <a href="./salas.php"
        class="py-2 px-6 border-orange-600 rounded border-[1.5px] mt-6 md:mt-12 text-white uppercase text-xs md:text-base font-light duration-500 hover:bg-orange-500">Explorá
        nuestras salas</a>
    </div>
  </div>
  <section class="my-12">
    <h2 class="text-gray-500 uppercase font-light text-lg md:text-2xl text-center">Nuestra selección para vos:</h2>
    <div class="h-[1px] bg-gray-500 w-[80%] md:w-[360px] mt-2 mx-auto"></div>
    <div class="flex flex-col md:flex-row md:gap-x-2 xl:gap-x-12 justify-center mt-12">
      <?php
      include_once("../components/salas/mostrar-destacadas.php");
      ?>
    </div>
  </section>
</main>


<?php
include_once("../components/footer.php");
?>