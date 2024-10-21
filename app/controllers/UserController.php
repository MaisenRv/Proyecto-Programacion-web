<?PHP
require_once ('BaseController.php');
require_once (__DIR__.'/../models/Usuario.php');
require_once (__DIR__.'/../daos/UsuarioDAO.php');

class UserController extends BaseController{

    public function login(){
        $usuario = new Usuario($_POST['Usuario'],$_POST['Contrasena']);
        $usuarioDAO = new UsuarioDAO();
        $res = $usuarioDAO->getUsuario($usuario);
        if(isset($res)){
            session_start();
            $_SESSION['usuario'] = $res->getUsuario();
            $_SESSION['contrasena'] = $res->getCotrasena();
            $this->index();
        }else{
            echo "<script type='text/javascript'>
            alert('El usuario o la contraseña no son correctos');
            </script>";
            $this->loadView('admin/admin',['title'=> 'admin','showAdmin'=>true]);
        }
    }
    public function logout(){
        if (session_status() == PHP_SESSION_ACTIVE) {
            session_unset(); 
            session_destroy();
            UserController::blockSession();
        }
    }

    public static function blockSession(){
        header("Location: index.php?action=admin");
        exit();
    }
}



?>