<?php
    use App\Functions\message;
    require_once './../App/Functions/messages.php';

    $row = $user;
      #echo "teste ";
      $stmt = new message();
      $message = $stmt->messages($row[1]['unique_id'], $outgoing_id);
      $row2 = $message;
      if(count($message) > 0){
       
        $result = $row2['msg'];
      
      } else {
        $result = "Sem mensagens";
      }

      (strlen($result) > 28) ? $msg = substr($result, 0 , 28). '...' : $msg = $result;

      ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "Você: " : $you = " ";
      
      foreach($row as $key=>$value){
      ($value['status'] == "Offline") ? $offline = "offline" : $offline = ""; 
      $output .= '<a href="chat.php?user_id='.$value['unique_id'].'">
                  <div class="content">
                  <img src="php/images/'. $value['img'] .'" alt="">
                  <div class="details">
                    <span>'. $value['fname'] . " " . $value['lname'] .'</span>
                    <p>'. $you . $msg .'</p>
                  </div>
                  </div>
                  <div class="status-dot '.$offline.'"><i class="fas fa-circle"></i></div>
                  </a>';
    } 
   # echo count($nonuser);
?>