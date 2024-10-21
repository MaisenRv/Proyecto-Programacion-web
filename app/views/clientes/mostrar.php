<section class="containerAdmin">
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>
        <?PHP foreach($clientes as $c){?>
            <tr>
                <td><?PHP echo $c->getId(); ?></td>
                <td><?PHP echo $c->getNombre(); ?></td>
                <td><?PHP echo $c->getApellido(); ?></td>
                <td><?PHP echo $c->getCorreo(); ?></td>
                <td><?PHP echo $c->getDireccion(); ?></td>
                <td><?PHP echo $c->getTelefono(); ?></td>
                <td>
                    <a href="index.php?action=vista-actualizar&id= <?PHP echo $c->getId(); ?>">Actualizar</a>
                    <a href="index.php?action=clientes-eliminar&id= <?PHP echo $c->getId(); ?>">Eliminar</a>
                </td>
            </tr>
        <?PHP }?>
    </tbody>
</table>
</section>
