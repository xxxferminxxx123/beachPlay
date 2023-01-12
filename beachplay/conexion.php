<?php
class Conexion extends PDO{
    
    public function __construct(){
       
    try{
        
        parent::__construct("mysql:dbname=beachplay;host=localhost:3307",'root',"1234");
        parent::exec("set names utf8");

    }catch(PDOExecption $e){
        echo "Error al conectar" .$e->getMessage();
        exit;
        }
    }
}

?>



