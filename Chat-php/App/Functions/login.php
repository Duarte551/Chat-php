<?php 

namespace App\Functions;
use App\Database\Conexao;
require_once './../App/Database/config.php';
use PDO;

class logar{

  public function login($email, $password){
    $db = new Conexao();
    $sql = ("SELECT * FROM users WHERE email = :email and password = :password");
    $stmt = $db->getConnection()->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  
  public function status($unique_id){
    $db = new Conexao();
    $sql = ("UPDATE users SET status = 'Ativo agora' WHERE unique_id = :unique_id");
    $stmt = $db->getConnection()->prepare($sql);
    $stmt->bindParam(':unique_id', $unique_id);
    $stmt->execute();
    return $stmt;
  }

  public function logout(){
    $db = new Conexao();
    $sql = ("UPDATE users SET status = :status WHERE unique_id = :logout_id");
    $stmt = $db->getConnection()->prepare($sql);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':logout_id', $logout_id);
    $stmt->execute();
    return $stmt;
  }
}