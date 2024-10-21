<?PHP
require_once (__DIR__.'/../config/Conn.php');
require_once(__DIR__.'/../models/Usuario.php');

class UsuarioDAO{
    private $conn;

    public function __construct() {
        $connection = new Conn();
        $this->conn = $connection->getConn();
    }
    public function getUsuario($usuario)  {
        $login =  $this->conn->prepare('SELECT * FROM usuario WHERE usuario = :us AND contrasena = :con');
        $login->bindValue(':us',$usuario->getUsuario());
        $login->bindValue(':con',$usuario->getCotrasena());
        $login->execute();
        if($login->rowCount() > 0){
            $usuarioDB = $login->fetch(PDO::FETCH_ASSOC);
            $usuario = new Usuario($usuarioDB['usuario'],$usuarioDB['contrasena']);
            return $usuario;
        }
        return null;
    }
}
?>