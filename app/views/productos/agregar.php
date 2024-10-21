<section class="container">
<form action="index.php?action=agregar-producto" method="POST" class="form-container"> 
    <label for="nombre"> Nombre producto </label>
    <input type="text" name="nombre" placeholder="Nombre" >
    <label for="valor"> Valor producto </label>
    <input type="number" name="valor" placeholder="Valor" >
    <label for="descripcion"> Descripcion producto </label>
    <input type="text" name="descripcion" placeholder="Descripcion" >
    <label for="img"> Imagen producto </label>
    <input type="file" name="img" placeholder="img" >
    <button type="submit"> Agregar</button>
</form>
</section>
