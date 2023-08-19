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
    <section class="form signup">
      <header>RealTime Chat App</header>
      <form action="" enctype="multipart/form-data" autocomplete="off">
        <div class="error-txt"></div>
        <div class="name-details">
          <div class="field input">
            <label>Nome</label>
            <input type="text" name="fname" placeholder="Digite seu nome" required>
          </div>
          <div class="field input">
            <label>Sobrenome</label>
            <input type="text" name="lname" placeholder="Digite seu sobrenome" required>
          </div>
        </div>
          <div class="field input">
            <label>Email</label>
            <input type="text" name="email" placeholder="Digite seu email" required>
          </div>
          <div class="field input">
            <label>Senha</label>
            <input type="password" name="password" placeholder="Digite sua senha" required>
            <i class="fas fa-eye"></i>
          </div>
          <div class="field image">
            <label>Selecione uma imagem</label>
            <input type="file" name="image" required>
          </div>
          <div class="field button">
            <input type="submit" value="Vá para o chat">
          </div>
      </form>
      <div class="link">Já tem uma conta? <a href="login.php">Faça Login</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>

  
</body>
</html>