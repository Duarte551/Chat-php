<?php

use App\Functions\usuario;
require_once 'App/Functions/users.php';
$unique_id = $_SESSION['unique_id'];
?>

<?php 
  include_once "header.php";
?>
<body>
  <div class="wrapper">
   <section class="users">
    <header>
      <?php 

        $stmt = new usuario();
        $user = $stmt->user($unique_id);
        if(!empty($user)){
          foreach($user as $key => $value){
        # echo $value['img'];
          }
        } 
      ?>
      <div class="content">
        <img src="php/images/<?php foreach($user as $key => $value){echo $value['img'];}?>" alt="">
        <div class="details">
          <span> <?php foreach($user as $key => $value){echo $value['fname'] . " " . $value['lname'];}?></span>
          <p><?php foreach($user as $key => $value){echo $value['status'];} ?></p>
        </div>
      </div> <?php foreach($user as $key => $value){ ?>
      <a href="php/logout.php?logout_id=<?php echo $value['unique_id'];}?>" class="logout">Sair</a>
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