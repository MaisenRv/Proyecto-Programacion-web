<section class="containerAdmin">
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Valor</th>
            <th>descripcion</th>
            <th>Img</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>
        <?PHP foreach($productos as $p){?>
            <tr>
                <td><?PHP echo $p->getId(); ?></td>
                <td><?PHP echo $p->getNombre(); ?></td>
                <td><?PHP echo $p->getValor(); ?></td>
                <td><?PHP echo $p->getDescripcion(); ?></td>
                <td>
                    <img src=<?PHP  echo '../public/assets/img/'.$p->getImg(); ?> alt="">
                
                </td>
                <td>
                    <a href="index.php?action=vista-actualizar-p&id= <?PHP echo $p->getId(); ?>">Actualizar</a>
                    <a href="index.php?action=productos-eliminar&id= <?PHP echo $p->getId(); ?>">Eliminar</a>
                </td>
            </tr>
        <?PHP }?>
    </tbody>
</table>
</section>