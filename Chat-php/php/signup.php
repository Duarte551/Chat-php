<?php 
   
  session_start();
  include_once "config.php";
  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $lname = mysqli_real_escape_string($conn, $_POST['lname']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // checando se o email é válido
      $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
      if(mysqli_num_rows($sql) > 0){ // checando se o email já existe no banco
        echo "Esse email já existe!";
      } else { // checando se o arquivo foi enviado ou não
        if(isset($_FILES['image'])){ //se o arquivo for enviado
          $img_name = $_FILES['image']['name'];
          $img_type = $_FILES['image']['type'];
          $tmp_name = $_FILES['image']['tmp_name'];

          $img_explode = explode('.' , $img_name);
          $img_ext = end($img_explode);

          $extensions = ['png', 'jpeg', 'jpg'];
          if(in_array($img_ext, $extensions) === true){
            $time = time();

            $new_img_name = $time.$img_name;

            if(move_uploaded_file($tmp_name, "images/".$new_img_name)){
              $status = "Ativo agora";
              $random_id = rand(time(), 10000000);

              $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                    VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
                if ($sql2){
                  $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                  if(mysqli_num_rows($sql3) > 0){
                    $row = mysqli_fetch_assoc($sql3);
                    $_SESSION['unique_id'] = $row['unique_id'];
                    echo "success";
                  } 
                } else {
                  echo "Algo deu errado!";
                } 
          }         
        }
          else{
            echo "Por favor, selecione um arquivo de imagem - jpeg, jpg, png";
          }
        } else {
          echo "Por favor, selecione um arquivo de imagem";
        }
      }
    } else {
      echo "Coloque um email válido";
    }
    
  } else {
    echo "Preencha todos os campos!";
  }
?>