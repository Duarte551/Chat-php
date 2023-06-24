<?php

use App\Functions\usuario;
?>

<?php 
  include_once "header.php";
?>
<body>
  <div class="wrapper">
   <section class="users">
    <header>
      <?php 
require_once 'App/Functions/users.php';
        $stmt = new usuario();
        if($stmt->user()->numRows() > 0){
          $row = mysqli_fetch_assoc($sql);
        } 
      ?>
      <div class="content">
        <img src="php/images/<?php echo $row['img'] ?>" alt="">
        <div class="details">
          <span> <?php echo $row['fname'] . " " . $row['lname']  ?></span>
          <p><?php echo $row['status'] ?></p>
        </div>
      </div>
      <a href="php/logout.php?logout_id=<?php echo $row['unique_id']?>" class="logout">Sair</a>
    </header>
    <div class="search">
      <span class="text">Selecione um usuário para iniciar conversa</span>
      <input type="text" placeholder="Insira nomes para procurar ...">
      <button><i class="fas fa-search"></i></fa-search></button>
    </div>
    <div class="users-list">
     
    </div>
   </section>
   </div>

   <script src="javascript/users.js"></script>

</body>
</html>