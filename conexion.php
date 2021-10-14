<?php
interface CRUD_api{
    public function read_by_dni(int $dni, string $tabla);
    public function get_all();
}
class Conexion implements CRUD_api {
    private $con;
    public function __construct()
    {
        $this->con=new PDO('mysql:host=localhost;dbname=prueba2', "root", "");
    }

    public function read_by_dni(int $dni, string $tabla)
    {
        $campo=($tabla=="user_db")? "Dni": "user_dni";
        
        $stament="SELECT * FROM {$tabla} WHERE {$campo}=?";
        
        $prepared=$this->con->prepare($stament);
        $prepared->bindValue(1, $dni);
        $prepared->execute();

        return $prepared->fetchAll();

    }
    public function get_all()
    {   

        return array_values(($this->con->query("SELECT * FROM user_tb WHERE rol=0"))->fetchAll(PDO::FETCH_ASSOC));
    }
    public function auth(string $username, string $password){
        $stament="SELECT (EXISTS (SELECT * FROM user2_tb WHERE username=? AND pass=?))";
        $prepared=$this->con->prepare(($stament));
        $prepared->bindValue(1, $username);
        $prepared->bindValue(2, $password);
        $prepared->execute();
        return $prepared->fetch();
    }
}

?>