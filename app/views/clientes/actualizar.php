<?PHP
    require_once __DIR__.'/../../controllers/ClienteController.php';
    $controladorCliente = new ClienteController();
?>

<section class="container">
    <form action="index.php?action=actualizar-cliente&id=<?PHP echo $cliente->getId(); ?>" method="POST" class="form-container"> 
        <label for="nombre"> Nombre Cliente </label>
        <input type="text" name="nombre" placeholder="Nombre" value="<?PHP echo $cliente->getNombre(); ?>">
        <label for="apellido"> Apellido Cliente </label>
        <input type="text" name="apellido" placeholder="Apellido" value="<?PHP echo $cliente->getApellido(); ?>">
        <label for="correo"> Correo Cliente </label>
        <input type="text" name="correo" placeholder="Correo" value="<?PHP echo $cliente->getCorreo(); ?>">
        <label for="telefono"> Telefono Cliente </label>
        <input type="text" name="telefono" placeholder="Telefono" value="<?PHP echo $cliente->getTelefono(); ?>" >
        <label for="direccion"> Direccion Cliente </label>
        <input type="text" name="direccion" placeholder="Direccion" value="<?PHP echo $cliente->getDireccion(); ?>">
        <button type="submit"> Actualizar</button>
    </form>
</section>