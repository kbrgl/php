<?php
require_once './config/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $db->prepare('INSERT INTO users (name, username, password) VALUES (?, ?, ?)');
  $stmt->execute(array($_POST['name'], $_POST['username'], password_hash($_POST['password'], PASSWORD_BCRYPT)));
  session_start();
  $_SESSION['username'] = $_POST['username'];
  header('Location: /play.php');
  return;
}
?>
<form action="#" method="POST">
  <input type="text" placeholder="Full Name" name="name">
  <input type="text" placeholder="Username" name="username">
  <input type="password" placeholder="Password" name="password">
  <button>Register</button>
</form>