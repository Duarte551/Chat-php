<?php 

namespace App\Functions;
use App\Database\Conexao;
require_once './../App/Database/config.php';
use PDO;

class Cadastro{

  public function cadastro($random_id, $fname, $lname, $email, $password, $img, $status){
    $db = new Conexao();
    $sql = ("INSERT INTO users (unique_id, fname, lname, email, password, img, status)
    VALUES (:random_id, :fname, :lname, :email, :password, :img, :status)");
    $stmt = $db->getConnection()->prepare($sql);
    $stmt->bindParam(':random_id', $random_id);
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':lname', $lname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':img', $img);
    $stmt->bindParam(':status', $status);
    $stmt->execute();
    return $stmt;
  }

  public function email($email){
    $db = new Conexao();
    $sql = ( "SELECT email FROM users WHERE email = :email");
    $stmt = $db->getConnection()->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    return $stmt;
  }

  public function users($unique_id){
    $db = new Conexao();
    $sql = ( "SELECT * FROM users WHERE unique_id = :unique_id");
    $stmt = $db->getConnection()->prepare($sql);
    $stmt->bindParam(':unique_id', $unique_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}