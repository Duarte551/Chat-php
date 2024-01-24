<?php
    use App\Functions\message;
    require_once './../App/Functions/messages.php';

    $row = $user;
      $stmt = new message();
      $message = $stmt->messages($outgoing_id, $row[0]['unique_id']);
      $row2 = $message;
      $you = " ";
      $msg = " ";
      #var_dump($message);
      if($message){
       
        $result = $row2['msg']; 

        foreach($row as $key=>$value){

          if($row2['outgoing_msg_id'] == $value['unique_id'] or $row2['incoming_msg_id'] == $value['unique_id']){
            (strlen($result) > 28) ? $msg = substr($result, 0 , 28). '...' : $msg = $result;
          }
          else{
            $msg = " ";
          }         #(strlen($result) > 28) ? $msg = substr($result, 0 , 28). '...' : $msg = $result;
          
          ($value['status'] == "Offline") ? $offline = "offline" : $offline = ""; 
          
          ($value['unique_id'] == $row2['incoming_msg_id']) ? $you = "Você: " : $you = " ";
  
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
      
      } else {

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
      }

      #(strlen($result) > 28) ? $msg = substr($result, 0 , 28). '...' : $msg = $result;
      
      
   # echo count($nonuser);
?>