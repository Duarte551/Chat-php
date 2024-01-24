<?php 

namespace App\Database;
require "/Users/Duarte/xampp/htdocs/Chat-php/global.php";
use PDO;
use PDOException;

class Conexao{

  public static $connection;

  public function getConnection(){
    try{
      self::$connection = new PDO('mysql:host=' . getenv('HOST') . ';dbname=' . getenv('DBNAME'), getenv('USER'), getenv('PASS'));
      self::$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      self::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    } catch (PDOException $e) {
      die($e->getMessage());
    }

    array(PDO::ATTR_PERSISTENT => true);
		
    return self::$connection;
    
  }
}
?>