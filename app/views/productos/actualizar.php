<?PHP
    require_once __DIR__.'/../../controllers/ClienteController.php';
    $controladorCliente = new ClienteController();
?>

<section class="container">
    <form action="index.php?action=actualizar-producto&id=<?PHP echo $producto->getId(); ?>" method="POST" class="form-container"> 
        <label for="nombre"> Nombre producto </label>
        <input type="text" name="nombre" placeholder="Nombre" value="<?PHP echo $producto->getNombre(); ?>">
        <label for="valor"> Valor producto </label>
        <input type="number" name="valor" placeholder="Valor" value="<?PHP echo $producto->getValor(); ?>">
        <label for="descripcion"> Descripcion producto </label>
        <input type="text" name="descripcion" placeholder="Descripcion" value="<?PHP echo $producto->getDescripcion(); ?>">
        <label for="img"> Imagen producto </label>
        <input type="file" name="img" placeholder="img" value="<?PHP echo $producto->getImg(); ?>">
        <button type="submit"> Actualizar</button>
    </form>
</section>