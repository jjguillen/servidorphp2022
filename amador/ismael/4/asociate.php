<?php
include "includes/cabecera.php";
?>
<section id="contenido">
  <article>
    <div id="formulario">
      <form action="" method="post">
        <div class="campo">
          <label for="email">Email</label><br>
          <input required type="email" name="email" value="ejemplo@gmail.com">
        </div>
        <div class="campo">
          <label>Nombre</label><br>
          <input required type="text" name="nombre" value="Nombre">
        </div>
        <div class="campo">
          <label>Apellidos</label><br>
          <input required type="text" name="apellidos" value="Apellidos">
        </div>
        <div class="campo">
          <label>Direccion</label><br>
          <input required type="text" name="direccion" value="Direccion">
        </div>
        <div class="campo">
          <label>Provincia/Localidad</label><br>
          <input required type="text" name="provincia-localidad" value="Provincia/Localidad">
        </div>
        <div class="campo">
          <label>Codigo Postal</label><br>
          <input type="number" name="postal" value="CodigoPostal">
        </div>
        <div class="campo">
          <input type="submit" value="Registrate">
        </div>
      </form>
    </div>

  </article>
</section>

<?php
include "includes/footer.php";
?>