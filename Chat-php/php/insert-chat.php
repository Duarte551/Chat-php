<?php 

use App\Functions\message;
require_once './../App/Functions/messages.php';

  if(isset($_SESSION['unique_id'])){
    $outgoing_id =$_POST['outgoing_id'];
    $incoming_id = $_POST['incoming_id'];
    $message = $_POST['message'];

    if(!empty($message)){
      $stmt = new message;
      $envio = $stmt->insert( $incoming_id, $outgoing_id, $message)
      or die();

    }

  } else{
    header("../login.php");
  }
?>