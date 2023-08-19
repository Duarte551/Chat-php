<?php 
  include_once "header.php";
 
?>
<body>
  <div class="wrapper">
    <section class="form login">
      <header>RealTime Chat App</header>
      <form method="POST" action="">
        <div class="error-txt"></div>
          <div class="field input">
            <label>Email</label>
            <input type="text" name="email" placeholder="Digite seu email" required>
          </div>
          <div class="field input">
            <label>Senha</label>
            <input type="password" name="senha" placeholder="Digite sua senha" required>
            <i class="fas fa-eye"></i>
          </div>
          <div class="field button">
            <input type="submit" value="Vá para o chat" name="submit" id="submit">
          </div>
      </form>
      <div class="link">Ainda não tem uma conta? <a href="index.php">Crie sua conta</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>

</body>
</html>

<?php /*
  use App\Functions\logar;
  require 'App/Functions/login.php';

  session_start();
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  if(!empty($email) && !empty($senha)){
  $logar = new logar();
  $dados = $logar->login($email, $senha);
  if (!empty($dados)) {
    foreach($dados as $key=>$value){
      $_SESSION['unique_id'] = $value['unique_id'];
      $update = $logar->status($value['unique_id']);
      echo "success";
    }
  } else {
      echo "Dados inválidos, tente novamente";
  }
} else{
  echo "Preencha todos os campos";
}
*/
?>