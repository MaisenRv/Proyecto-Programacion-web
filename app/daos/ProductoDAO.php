<?PHP
require_once (__DIR__.'/../config/Conn.php');
require_once(__DIR__.'/../models/producto.php');

class productoDAO{
    private $conn;

    public function __construct() {
        $connection = new Conn();
        $this->conn = $connection->getConn();
    }
    public function addProducto($newProducto) {
        $nuevo = $this->conn->prepare('INSERT INTO producto (nombre,valor,descripcion,img) VALUES (:nombre,:valor,:descripcion,:img)');
        $nuevo->bindValue(':nombre',$newProducto->getNombre());
        $nuevo->bindValue(':valor',$newProducto->getValor());
        $nuevo->bindValue(':descripcion',$newProducto->getDescripcion());
        $nuevo->bindValue(':img',$newProducto->getImg());
        $nuevo->execute();
    }
    public function getAllProductos(){
        $listaProductos = [];
        $productos = $this->conn->query('SELECT * FROM producto');
        foreach($productos->fetchAll() as $c){
            $newProducto = new Producto($c['idProducto'], $c['nombre'], $c['valor'], $c['descripcion'],$c['img']);
            $listaProductos[] = $newProducto;
        }
        return $listaProductos;
    }
    public function deleteProducto($id){
        $borrar = $this->conn->prepare('DELETE FROM producto WHERE idProducto = :id');
        $borrar->bindValue(':id',$id);
        $borrar->execute();
    } 
    public function getProducto($id){
        $newQuery = $this->conn->query('SELECT * FROM producto WHERE idProducto ='.$id);
        $productoDB = $newQuery->fetch();
        $producto = new Producto($productoDB['idProducto'], $productoDB['nombre'], $productoDB['valor'], $productoDB['descripcion'],$productoDB['img']);
        return $producto;
    }
    public function updateProducto($productoUpdate){
        $actualizar = $this->conn->prepare('UPDATE producto SET nombre =:nombre, valor = :valor, descripcion= :descripcion, img=:img  WHERE idProducto='.$productoUpdate->getId());
        $actualizar->bindValue(':nombre',$productoUpdate->getNombre());
        $actualizar->bindValue(':valor',$productoUpdate->getValor());
        $actualizar->bindValue(':descripcion',$productoUpdate->getDescripcion());
        $actualizar->bindValue(':img',$productoUpdate->getImg());
        $actualizar->execute();
    }
}
?>