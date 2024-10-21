<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href= "../public/assets/css/index.css">
    <title><?PHP echo isset($title) ?  $title : 'Document' ?></title>
</head>
<body>
    <nav>
        <?PHP if($showAdmin){?>
            <a href="index.php?action=logout">Cerrar Sesion</a>
            <a href="index.php?action=HomeAdmin">Home</a>
        <?PHP }elseif($title == 'Home'){ ?>
            <a href="index.php?action=admin">Iniciar sesion</a>
        <?PHP }?>
    </nav>
    <?PHP if (isset($view)) { include($view); } ?>
</body>
</html>