<?php
session_start();
require_once("connection.php");

if (!isset($_SESSION["username"]) || $_SESSION["role"] != "admin") {
  // The user is not logged in or does not have the correct role, so redirect them to the login page
  header("Location: login.php");
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/admin.css">
  <title>Admin Home Page</title>
</head>
<body>

<main>
<div class="admin">
  <h1>Admin Home Page</h1>
  <p>Welcome, <?php echo $_SESSION["name"]; ?>!</p>
  
 
  <a href="add_item.php"><button>Add Items</button></a><br>
  <a href="home.php"><button>View Items</button></a><br>
  <a href="logout.php"><button>Logout</button></a>
 
  </div>

</main>
</body>
</html>