<?php
require_once './config/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $db->prepare('SELECT * FROM users WHERE username = ?');
  $stmt->execute(array($_POST['username']));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  if (!empty($row)) {
    if (password_verify($_POST['password'], $row['password'])) {
      session_start();
      $_SESSION['username'] = $_POST['username'];
      header('Location: /play.php');
      return;
    }
  }
}
?>
<form action="#" method="POST">
  <input type="text" placeholder="Username" name="username">
  <input type="password" placeholder="Password" name="password">
  <button>Login</button>
</form>