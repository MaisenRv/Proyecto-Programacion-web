<?PHP
require_once('BaseController.php');
require_once(__DIR__.'/../daos/ClienteDAO.php');
require_once(__DIR__.'/../models/Cliente.php');

class ClienteController extends BaseController{
    private  $clienteDAO;

    public function __construct() {
        $this->clienteDAO =  new clienteDAO();
    }
    public function showAll(){
        $clientes = $this->clienteDAO->getAllClientes();
        $this->loadView('clientes/mostrar',['title'=> 'Clientes','clientes'=>$clientes,'showAdmin'=>true]);
    }
    public function showUpdate($id){
        $cliente = $this->clienteDAO->getCliente($id);
        $this->loadView('clientes/actualizar',['title'=>'Actualizar cliente', 'cliente'=> $cliente,'showAdmin'=>true]);
    }
    public function UpdateCliente($id){
        $updateCliente = new Cliente($id,$_POST['nombre'], $_POST['apellido'],$_POST['correo'],$_POST['telefono'],$_POST['direccion']);
        $this->clienteDAO->updateCliente($updateCliente);
        header("Location: index.php?action=clientes");
        exit();
    }
    public function deleteCliente($id){
        $this->clienteDAO->deleteCliente($id);
        header("Location: index.php?action=clientes");
        exit();
    }
    public function showAddCliente(){
        $this->loadView('clientes/agregar',['title'=>'agregar cliente','showAdmin'=>true]);
    }
    public function addCliente(){
        $newCliente = new Cliente(null,$_POST['nombre'], $_POST['apellido'],$_POST['correo'],$_POST['telefono'],$_POST['direccion']);
        $this->clienteDAO->addCliente($newCliente);
        header("Location: index.php?action=clientes");
        exit();
    }
}


?>