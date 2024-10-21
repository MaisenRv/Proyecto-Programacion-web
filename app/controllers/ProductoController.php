<?PHP
require_once ('BaseController.php');
require_once (__DIR__.'/../daos/ProductoDAO.php');
require_once (__DIR__.'/../models/producto.php');

class ProductoController extends BaseController{
    private  $productoDAO;

    public function __construct() {
        $this->productoDAO =  new ProductoDAO();
    }
    public function showAll(){
        $productos = $this->productoDAO->getAllProductos();
        $this->loadView('productos/mostrar',['title'=> 'Clientes','productos'=>$productos,'showAdmin'=>true]);
    }
    public function showAllPublic(){
        $productos = $this->productoDAO->getAllProductos();
        $this->loadView('Home',['title'=> 'Home','productos'=>$productos,'showAdmin'=>false]);
    }
    public function showAddProducto(){
        $this->loadView('productos/agregar',['title'=>'agregar producto','showAdmin'=>true]);
    }
    public function addProducto(){
        $newProducto = new Producto(null,$_POST['nombre'], $_POST['valor'],$_POST['descripcion'],$_POST['img']);
        $this->productoDAO->addProducto($newProducto);
        header("Location: index.php?action=productos");
        exit();
    }
    public function deleteProducto($id){
        $this->productoDAO->deleteProducto($id);
        header("Location: index.php?action=productos");
        exit();
    }
    public function showUpdate($id){
        $producto = $this->productoDAO->getProducto($id);
        $this->loadView('productos/actualizar',['title'=>'Actualizar producto', 'producto'=> $producto,'showAdmin'=>true]);
    }
    public function updateProducto($id){
        $updateProducto = new Producto($id,$_POST['nombre'], $_POST['valor'],$_POST['descripcion'],$_POST['img']);
        $this->productoDAO->updateProducto($updateProducto);
        header("Location: index.php?action=productos");
        exit();
    }
}

?>