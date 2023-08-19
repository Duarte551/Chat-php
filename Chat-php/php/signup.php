<?php 
   
  session_start();
  Use App\Functions\Cadastro;
  require './../App/Functions/signup.php';
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // checando se o email é válido
      $verifica = new Cadastro;
      $sql = $verifica->email($email);
      $num = $sql->rowCount();
      if($num > 0){ // checando se o email já existe no banco
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
              $cadastrar = new Cadastro;
              $sql2 = $cadastrar->cadastro($random_id, $fname, $lname, $email, $password, $new_img_name, $status);
                if ($sql2){
                  $sql3 = $cadastrar->users($random_id);
                  if(!empty($sql3)){
                  foreach($sql3 as $key => $value){
                    $_SESSION['unique_id'] = $value['unique_id'];
                    echo "success";
                  }
                  } else{
                    echo "Algo deu errado!";
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