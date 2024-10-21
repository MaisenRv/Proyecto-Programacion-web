<?PHP 

    class Cliente {
        private $idCliente;
        private $nombreCliente;
        private $apellidoCliente;
        private $correoCliente;
        private $direccionCliente;
        private $telefonoCliente;

        public function __construct($idCliente= null, $nombreCliente, $apellidoCliente, $correoCliente, $telefonoCliente, $direccionCliente ) {
            $this->idCliente = $idCliente ?? -1;
            $this->nombreCliente = $nombreCliente;
            $this->apellidoCliente = $apellidoCliente;
            $this->correoCliente = $correoCliente;
            $this->direccionCliente = $direccionCliente;
            $this->telefonoCliente = $telefonoCliente;
        }

        public function getId(){ return $this->idCliente; }
        public function getNombre(){ return $this->nombreCliente; }
        public function getApellido(){ return $this->apellidoCliente; }
        public function getCorreo(){ return $this->correoCliente; }
        public function getDireccion(){ return $this->direccionCliente; }
        public function getTelefono(){ return $this->telefonoCliente; }
    }

?>