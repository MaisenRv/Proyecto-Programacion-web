<?PHP
require_once('../app/controllers/ClienteController.php');
require_once('../app/controllers/BaseController.php');
require_once('../app/controllers/ProductoController.php');
require_once('../app/controllers/UserController.php');
$actionName = isset($_GET['action']) ? $_GET['action'] : 'Home';


function checkSession(){
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(!isset($_SESSION['usuario']) || !isset($_SESSION['contrasena'])){
        UserController::blockSession();
        return false;
    }
    return true;

}

$clienteController = new ClienteController();
$BaseController = new BaseController();
$productoController = new ProductoController();
$UserController = new UserController();

if ($actionName == 'admin') { $BaseController->admin(); } 
elseif ($actionName == 'login') { $UserController->login(); } 
elseif ($actionName == 'Home') { $productoController->showAllPublic(); } 
elseif (checkSession()) {
    if ($actionName == 'HomeAdmin') { $BaseController->index(); } 
    elseif ($actionName == 'logout') { $UserController->logout(); } 
    // Clientes
    elseif ($actionName == 'clientes'){ $clienteController->showAll(); }
    elseif ($actionName == 'vista-actualizar'){ $clienteController->showUpdate($_GET['id']); }
    elseif ($actionName == 'clientes-eliminar'){ $clienteController->deleteCliente($_GET['id']); }
    elseif ($actionName == 'actualizar-cliente'){ $clienteController->UpdateCliente($_GET['id']); }
    elseif($actionName == 'vista-agregar-cliente'){ $clienteController->showAddCliente(); }
    elseif($actionName == 'agregar-cliente'){ $clienteController->addCliente(); }
    // Productos
    elseif($actionName == 'productos'){$productoController->showAll(); }
    elseif($actionName == 'vista-actualizar-p'){$productoController->showUpdate($_GET['id']); }
    elseif($actionName == 'productos-eliminar'){$productoController->deleteProducto($_GET['id']); }
    elseif($actionName == 'actualizar-producto'){$productoController->updateProducto($_GET['id']); }
    elseif($actionName == 'vista-agregar-productos'){$productoController->showAddProducto(); }
    elseif($actionName == 'agregar-producto'){$productoController->AddProducto(); }
}




?>