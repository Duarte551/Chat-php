<?php 

  use App\Functions\usuario;
  require_once './../App/Functions/users.php';
  $outgoing_id = $_SESSION['unique_id'];
  $searchTerm = $_POST['searchTerm'];
  $output = "";
  $stmt = new usuario();
  $user = $stmt->search($outgoing_id, $searchTerm);
  #$sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (fname LIKE '%{$searchTerm}%' or lname LIKE '%{$searchTerm}%')");
  if($user){
    include "data.php";
  }else{
    $output .="Usuário não encontrado";
  }
  echo $output;
?>