<?php 

namespace App\Functions;
use App\Database\Conexao;
require_once './App/Database/config.php';
use PDO;

if(!isset($_SESSION['unique_id'])){
  header("location: login.php");
};

class usuario{
  public function user(){
    $conn = new Conexao();
    $sql = ("SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
    $stmt = $conn->getConnection()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }
}