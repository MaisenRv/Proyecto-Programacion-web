<?PHP
require_once (__DIR__.'/../config/Conn.php');
require_once(__DIR__.'/../models/Cliente.php');

class clienteDAO{
    private $conn;

    public function __construct() {
        $connection = new Conn();
        $this->conn = $connection->getConn();
    }

    public function getAllClientes(){
        $listaClientes = [];
        $clientes = $this->conn->query('SELECT * FROM clientes');
        foreach($clientes->fetchAll() as $c){
            $newCliente = new Cliente($c['idCliente'], $c['nombreCliente'], $c['apellidoCliente'], $c['correoCliente'],$c['telefono'],$c['direccion']);
            $listaClientes[] = $newCliente;
        }
        return $listaClientes;
    }

    public function getCliente($id)  {
        $newQuery = $this->conn->query('SELECT * FROM clientes WHERE idCliente ='.$id);
        $clienteDB = $newQuery->fetch();
        $cliente = new Cliente($clienteDB['idCliente'],$clienteDB['nombreCliente'],$clienteDB['apellidoCliente'],$clienteDB['correoCliente'],$clienteDB['telefono'],$clienteDB['direccion']);
        return $cliente;
    }

    public function updateCliente($cliente){
        $actualizar = $this->conn->prepare('UPDATE clientes SET nombreCliente =:nombre, apellidoCliente = :apellido, correoCliente= :correo, telefono=:telefono, direccion =:direccion  WHERE idCliente='.$cliente->getId());
        $actualizar->bindValue(':nombre',$cliente->getNombre());
        $actualizar->bindValue(':apellido',$cliente->getApellido());
        $actualizar->bindValue(':correo',$cliente->getCorreo());
        $actualizar->bindValue(':telefono',$cliente->getTelefono());
        $actualizar->bindValue(':direccion',$cliente->getDireccion());
        $actualizar->execute();
    }

    public function deleteCliente($id){
        $borrar = $this->conn->prepare('DELETE FROM clientes WHERE idCliente = :id');
        $borrar->bindValue(':id',$id);
        $borrar->execute();
    }
    public function addCliente($newCliente){
        $nuevo = $this->conn->prepare('INSERT INTO clientes (nombreCliente,apellidoCliente,correoCliente,telefono,direccion) VALUES (:nombre,:apellido,:correo,:telefono,:direccion)');
        $nuevo->bindValue(':nombre',$newCliente->getNombre());
        $nuevo->bindValue(':apellido',$newCliente->getApellido());
        $nuevo->bindValue(':correo',$newCliente->getCorreo());
        $nuevo->bindValue(':telefono',$newCliente->getTelefono());
        $nuevo->bindValue(':direccion',$newCliente->getDireccion());
        $nuevo->execute();
    }

}

?>