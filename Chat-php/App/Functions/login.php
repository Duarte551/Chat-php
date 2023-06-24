<?php 

namespace App\Functions;
use App\Database\Conexao;
require_once './App/Database/config.php';
use PDO;

class logar{

  public function login($email, $password){
    $db = new Conexao();
    $sql = ("SELECT * FROM users WHERE email = $email and password = $password");
    $stmt = $db->getConnection()->prepare($sql);
    return $stmt->fetchAll();
  }
  
  public function status($email){
    $db = new Conexao();
    $sql = ("UPDATE users SET status = 'Ativo agora' WHERE email = $email");
    $stmt = $db->getConnection()->prepare($sql);
    $stmt->execute();
    return $stmt;
  }
}