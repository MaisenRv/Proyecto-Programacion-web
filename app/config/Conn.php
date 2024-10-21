<?PHP 

class Conn{
    private const DB_NAME = 'empresa_db';
    private const USERNAME = 'root';
    private const PASS = '';
    private const HOST = 'localhost';

    private $conn;
    public function __construct(){
        $this->connect();
    }
    
    private function connect (){
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $this->conn = new PDO('mysql:host='.self::HOST.';dbname='.self::DB_NAME, 
                                self::USERNAME,
                                self::PASS,
                                $pdo_options);
    }

    public function getConn(){ return $this->conn; }
}

?>