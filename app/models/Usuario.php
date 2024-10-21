<?PHP 
class Usuario{
    private $usuario;
    private $contrasena;

    public function __construct($usuario, $contrasena) {
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
    }
    public function getUsuario(){
        return $this->usuario;
    }
    public function getCotrasena(){
        return $this->contrasena;
    }
}
?>