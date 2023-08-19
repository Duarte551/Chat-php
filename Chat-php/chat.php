<?php 

use App\Functions\usuario;
require_once 'App/Functions/users.php';
  #session_start();
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>

<?php 
  include_once "header.php";
?>
<body>
  <div class="wrapper">
   <section class="chat-area">
    <header>
      <?php 
          $user_id =  $_GET['user_id'];
          $stmt = new usuario;
          $user = $stmt->user($user_id);
         # $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
          if(count($user) > 0){
            $row = $user;
          }
        ?>
      <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="php/images/<?php foreach($row as $key => $value){echo $value['img'];}?>" alt="">
        <div class="details">
          <span><?php foreach($row as $key => $value){ echo $value['fname'];}" " ;foreach($row as $key => $value){ $value['lname'];} ?></span>
          <p><?php foreach($row as $key => $value){echo $value['status'];} ?></p>
        </div>
    </header>
    <div class="chat-box">

  </div>
    <form action="#" class="typing-area">
      <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
      <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
      <input type="text" name="message" class="input-field" placeholder="Digite sua mensagem">
      <button><i class="fab fa-telegram-plane"></i></button>
    </form>
   </section>
  </div>

  <script src="javascript/chat.js"></script>

</body>
</html>