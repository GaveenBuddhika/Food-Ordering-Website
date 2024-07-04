<?php 

require_once("connection.php");

// Get the values 
if(isset($_POST['submit'])) {
    $name= $_POST['name'];
    $price= $_POST['price'];
    $image= $_POST['img'];
    $discount=$_POST['discount'];
    $stock= $_POST['stock'];

    $query= "INSERT INTO foods (name , price , img,discount, stock) VALUES ('$name','$price','$image','$discount','$stock')";

    mysqli_query($connection, $query);

   
   

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/add item.css">
    <title>Add Item </title>
    
</head>
<body>

<main>
    <div class="add">
    <form class="add1" action="add-item.php" method="post">
       
        
        <input type="text" name="name" placeholder="enter item  name"><br>
        <input type="text" name="price" placeholder="enter item price"><br>
        <input type="text" name="img" placeholder="enter your image link"><br>
        <input type="text" name="discount" placeholder="discount"><br>
        <input type="text" name="stock" placeholder="stock/instock"><br>
        
        
        <button type="submit" name="submit" value="add" class="form-btn">Add</button>

        
       <a href="home.php"><button>View Items</button></a>
     </form>
     </div>

     </main>
</body>
</html>
