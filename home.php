
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/home.css">
  <title>Home Page</title>
</head>
<body>
<?php
session_start();
if(!isset($_SESSION['id'])){

  header("location:login.php");

}
require_once("connection.php");


    $query = " SELECT * FROM foods WHERE stock = 'in stock' ";
	$foods = mysqli_query($connection,$query);

    $row=mysqli_fetch_assoc($foods);
    
?>





<header><div class="name"><h1>Home Page<h1></div>
  <div class="loggedin"><p>Welcome, <?php echo $_SESSION["name"]; ?>!</p>
 <a href="logout.php"><button>Log Out</button></a>
</div>
</header>

<div class="item">
    <img class="image" src="images/9.jpeg" alt="">
    <p>25%</p>
   <p>Chiken Biriyani</p>
    <p>Rs.1500.00</p>
    <p>In Stock</p>
    
</div>

<div class="item">
    <img class="image" src="images/8.jpeg" alt="">
    <p>50%</p>
   <p>Chiken Kottu</p>
    <p>Rs.1500.00</p>
    <p>In Stock</p>
    
</div>
<div class="item">
    <img class="image" src="images/7.jpeg" alt="">
    <p>25%</p>
   <p>Chiken Rice</p>
    <p>Rs.1500.00</p>
    <p>In Stock</p>
    
</div>
<div class="item">
    <img class="image" src="images/10.jpeg" alt="">
    <p>30%</p>
   <p>Chiken buger</p>
    <p>Rs.1000.00</p>
    <p>In Stock</p>
    
</div>

  <div class="item1">
    <img class="image" src="<?php echo $row["img"]; ?>" alt="">
    <div class="itemtext"><?php echo $row["name"]; ?></div>
    <div class="price"><?php echo $row["price"]; ?></div>
    <div class="discount"><?php echo $row["discount"]; ?></div>
    <div class="stock"><?php echo $row["stock"];?></div>
    
</div>


</body>
</html>