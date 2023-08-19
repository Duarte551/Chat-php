<?php 

namespace App\Functions;
use App\Database\Conexao;
require_once './App/Database/config.php';
use PDO;
session_start();

$unique_id = $_SESSION['unique_id'];

class usuario{

  public function user($unique_id){
    $conn = new Conexao();
    $sql = ("SELECT * FROM users WHERE unique_id = :unique_id");
    $stmt = $conn->getConnection()->prepare($sql);
    $stmt->bindParam(':unique_id', $unique_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }  
}