<?PHP
require_once (__DIR__.'/../models/Usuario.php');
require_once (__DIR__.'/../daos/UsuarioDAO.php');
class BaseController{
    protected function loadView($viewPath, $data = []){
        extract($data);
        $view = "../app/views/{$viewPath}.php";
        require '../app/views/layouts/main.php';
    } 
    public function index(){
        $this->loadView('HomeAdmin',['title'=> 'HomeAdmin','showAdmin'=>true]);
    }
    public function admin(){
        $this->loadView('admin/admin',['title'=> 'admin','showAdmin'=>false]);
    }
}


?>