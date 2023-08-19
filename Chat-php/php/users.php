<?php 
use App\Functions\notuser;
require_once './../App/Functions/notuser.php';
  $outgoing_id = $_SESSION['unique_id'];
  $stmt = new notuser();
  $user = $stmt->user($outgoing_id);
  $output = "";
  $nonuser = $stmt->iduser($outgoing_id);
  
  if(count($user) == 1){
    $output .= "Sem usuários ativos";
  }elseif(count($user) > 0){
    include "data.php";
  } 
  echo $output;
?>