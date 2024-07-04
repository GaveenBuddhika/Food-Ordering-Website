
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/login.css">
  <title>Login Page</title>
</head>
<body>


<?php


// Connect to the database
require_once("connection.php");

if (isset($_POST['login'])) {
// Get the username and password 
$username = $_POST["username"];
$password = $_POST["password"];


// Check if the user exists in the database
$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($connection, $sql);

if ($result->num_rows > 0) {
  // The user exists, so log them in
  session_start();
  $user=mysqli_fetch_assoc($result);
  $_SESSION["username"] = $user['username'];
  $_SESSION["password"] = $user['password'];
  $_SESSION["role"] = $user['role'];

  //go to admin page
  if($_SESSION['role'] === 'admin') {
    $_SESSION['name']=$user['name'];
    $_SESSION['username']=$user['username'];

    header('Location: admin.php');}


 //go to super admin page
    elseif($_SESSION['role'] === 'super_admin') {
      $_SESSION['name']=$user['name'];
      $_SESSION['id']=$user['id'];
      header('Location: super_admin.php');}


 //go to home page
 else{
  $_SESSION['name']=$user['name'];
  header("Location: home.php");
}
}
}
// Close the database connection
$connection->close();

?>



<main>

  <form class="login" action="login.php" method="post">
  <div class="center"><h1>LOGIN</h1></div>
    <label for="username">EMAIL:</label>
    <input type="text" name="username" placeholder="Username"><br>

    <label for="password">PASSWORD:</label>
    <input type="password" name="password" placeholder="Password">
    

    <button type="submit"name="login" value="Login">LOG IN</button>

    <p>Do not have account ? <a href="register.php">REGISTER</a></p>

  </form>
  <main>
</body>
</html>