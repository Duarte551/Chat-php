<?php 

use App\Functions\logar;
require './../App/Functions/login.php';

  if(isset($_SESSION['unique_id'])){
    $logout_id = $_GET['logout_id'];
    if(isset($logout_id)){
      $status = "Offline";

      $stmt = new logar;
      $sql = $stmt->logout($status, $logout_id);
      if($sql){
        session_unset();
        session_destroy();
        header("location: ../login.php");
      }
    } else{
      header("location: ../users.php");
    }
  } else{
    header("location: ../login.php");
  }

?>