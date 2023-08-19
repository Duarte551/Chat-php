<?php 

use App\Functions\message;
require_once './../App/Functions/messages.php';
$unique_id = $_SESSION['unique_id'];
  if(isset($unique_id)){
    $outgoing_id =  $_POST['outgoing_id'];
    $incoming_id = $_POST['incoming_id'];
    $output = "";

    $stmt = new message;
    $mensagem = $stmt->chat($outgoing_id, $incoming_id);
    $row = $mensagem;
   if(count($mensagem) > 0){
      foreach($row as $key=>$value){
        if($value['outgoing_msg_id'] === $outgoing_id){
          $output .= '<div class="chat outgoing">
                      <div class="details">
                        <p>'. $value['msg'] .'</p>
                      </div>
                      </div>';
        } else {
          $output .= '<div class="chat incoming">
                      <img src="php/images/'. $value['img']. '" alt="">
                      <div class="details">
                          <p>'. $value['msg'] .'</p>
                      </div>
                      </div>';
        }
      }
      echo $output;
    }
  } else{
    header("../login.php");
  }
  ?>