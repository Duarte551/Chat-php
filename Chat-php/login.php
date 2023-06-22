<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php 
  include_once "header.php";
?>
<body>
  <div class="wrapper">
    <section class="form login">
      <header>RealTime Chat App</header>
      <form action="#" autocomplete="off">
        <div class="error-txt"></div>
          <div class="field input">
            <label>Email</label>
            <input type="text" name="email" placeholder="Digite seu email">
          </div>
          <div class="field input">
            <label>Senha</label>
            <input type="password" name="password" placeholder="Digite sua senha">
            <i class="fas fa-eye"></i>
          </div>
          <div class="field button">
            <input type="submit" value="Vá para o chat">
          </div>
      </form>
      <div class="link">Ainda não tem uma conta? <a href="index.php">Crie sua conta</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>

  
</body>
</html>