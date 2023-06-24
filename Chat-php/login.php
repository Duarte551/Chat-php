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

<?php 
  use App\Functions\logar;
  require 'App/Functions/login.php';

  session_start();
  $logar = $_SESSION['logar'] ?? false;
  
  if ($_POST){
  echo "Teste";
  if (isset($_POST['submit'])){
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $_SESSION['email'] = $email;
  $logar = new logar();
  $dados = $logar->login($email, $senha);
  $num = $dados->rowCount();
  
  if ($num == 1) {
      $_SESSION ['logar'] = true;
      $_SESSION ['email'] = $email;
      echo "<script> alert('Sessão Iniciada...') ; window.location='http://Localhost:8000/'</script>";
  } else {
      echo "Dados inválidos, tente novamente";
  }
  
  }
  
  }
?>