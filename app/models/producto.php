<?PHP 

    class Producto {
        private $idProducto;
        private $nombre;
        private $valor;
        private $descripcion;
        private $img;

        public function __construct($idProducto= null, $nombre, $valor, $descripcion, $img) {
            $this->idProducto = $idProducto ?? -1;
            $this->nombre = $nombre;
            $this->valor = $valor;
            $this->descripcion = $descripcion;
            $this->img = $img;
        }

        public function getId(){ return $this->idProducto; }
        public function getNombre(){ return $this->nombre; }
        public function getValor(){ return $this->valor; }
        public function getDescripcion(){ return $this->descripcion; }
        public function getImg(){ return $this->img; }
    }

?>