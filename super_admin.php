<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/super_admin.css">
  <title>Superadmin Home Page</title>
</head>
<body>
<?php
session_start();
require_once("connection.php");
if (!isset($_SESSION["username"]) || $_SESSION["role"] != "super_admin") {
  // The user is not logged in or does not have the correct role, so redirect them to the login page
  header("Location: login.php");
}

?>
<main>
  <div class="superadmin">
  <h1>Super Admin Home Page</h1>
  <p>Welcome, <?php echo $_SESSION["name"]; ?>!</p>


  <a href="view_users.php"><button>View Users</button></a><br>
  <a href="add_item.php"><button>Add Items</button></a><br>
  <a href="home.php"><button>View Items</button></a><br>
  <a href="logout.php"><button>Logout</button></a><br>
  
  
 

</main>
</body>
</html>