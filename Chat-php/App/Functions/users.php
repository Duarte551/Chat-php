<?php 

namespace App\Functions;
use App\Database\Conexao;
require_once '/Users/Duarte/xampp/htdocs/Chat-php/App/Database/config.php';
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

  public function search($outgoing_id, $searchTerm){
    $conn = new Conexao();
    $sql = ("SELECT * FROM users WHERE NOT unique_id = :outgoing_id AND (fname LIKE '%{$searchTerm}%' or lname LIKE '%{$searchTerm}%')");
    $stmt = $conn->getConnection()->prepare($sql);
    $stmt->bindParam(':outgoing_id', $outgoing_id);
    #$stmt->bindParam(':searchTerm', $searchTerm);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }  
}