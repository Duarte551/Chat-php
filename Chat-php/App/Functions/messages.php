<?php 

namespace App\Functions;
use App\Database\Conexao;
require_once './../App/Database/config.php';
use PDO;

@session_start();
$unique_id = $_SESSION['unique_id'];

class message{

  public function messages($unique_id, $outgoing_id){
    $db = new Conexao();
    $sql = ("SELECT * FROM messages WHERE (incoming_msg_id = :unique_id
    OR outgoing_msg_id = :unique_id) AND (outgoing_msg_id = :outgoing_id
    OR incoming_msg_id = :outgoing_id) ORDER BY msg_id DESC LIMIT 1");
    $stmt = $db->getConnection()->prepare($sql);
    $stmt->bindParam(':unique_id', $unique_id);
    $stmt->bindParam(':outgoing_id', $outgoing_id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }  

  public function chat($outgoing_id, $incoming_id){
    $db = new Conexao();
    $sql = ("SELECT * FROM messages 
    LEFT JOIN users ON users.unique_id = messages.incoming_msg_id
    WHERE (outgoing_msg_id = :outgoing_id AND incoming_msg_id = :incoming_id)
     OR (outgoing_msg_id = :incoming_id AND incoming_msg_id = :outgoing_id) ORDER BY msg_id ");
    $stmt = $db->getConnection()->prepare($sql);
    $stmt->bindParam(':outgoing_id', $outgoing_id);
    $stmt->bindParam(':incoming_id', $incoming_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function insert($incoming_id, $outgoing_id, $message){
    $db = new Conexao();
    $sql = ("INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
    VALUES (:incoming_id, :outgoing_id, :message)");
    $stmt = $db->getConnection()->prepare($sql);
    $stmt->bindParam(':incoming_id', $incoming_id);
    $stmt->bindParam(':outgoing_id', $outgoing_id);
    $stmt->bindParam(':message', $message);
    return $stmt->execute();
  }
}