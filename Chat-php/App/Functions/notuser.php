<?php 

namespace App\Functions;
use App\Database\Conexao;
require_once './../App/Database/config.php';
use PDO;
session_start();

if(isset($_SESSION['unique_id'])){
  $unique_id = $_SESSION['unique_id'];
} else{
  $unique_id = 0;
}


class notuser{
    public function notuser($unique_id){
        $conn = new Conexao();
        $sql = ("SELECT * FROM users WHERE NOT unique_id = :unique_id");
        $stmt = $conn->getConnection()->prepare($sql);
        $stmt->bindParam(':unique_id', $unique_id);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
      } 

    public function user($unique_id) {
		$db = new Conexao();
		$sql  = "SELECT * FROM users WHERE unique_id not in (:unique_id)";
		$stmt = $db->getConnection()->prepare($sql);
		$stmt->bindParam(':unique_id', $unique_id);
		$stmt->execute();	
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

  public function iduser($unique_id){
    $conn = new Conexao();
    $sql = ("SELECT unique_id FROM users WHERE NOT unique_id = :unique_id");
    $stmt = $conn->getConnection()->prepare($sql);
    $stmt->bindParam(':unique_id', $unique_id);
    $stmt->execute();
    return $stmt->fetchAll();
  } 
}