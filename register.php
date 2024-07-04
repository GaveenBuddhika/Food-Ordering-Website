<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="css/register.css">
</head>
<body>

<?php

// Connect to the database
$connection = mysqli_connect('localhost','root','','my_db');

// Check if the user has submitted the form
if (isset($_POST['register'])) {

    // Get the form data
    $username = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $mobile_number = $_POST['mobile_number'];

    // Validate the form data
    if (empty($username) || empty($name) || empty($password) || empty($mobile_number)) {
        echo 'Please fill in all required fields.';
    } else if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        echo 'Please enter a valid email address.';
    } else if (strlen($password) < 6) {
        echo 'Your password must be at least 6 characters long.';
    } else {

        // Insert the user into the database
        $query= "INSERT INTO user (username, name, password, mobile_number) VALUES ('{$username}', '{$name}', '{$password}', '{$mobile_number}')";
        $result = mysqli_query($connection, $query);
        // Redirect the user to the login page
        $_SESSION['name']=$user['name'];
        header('Location: home.php');
    }
}

?>

<main>
<form class="register"action="register.php" method="post">
<div class="center"><h1>REGISTER</h1></div>

<label for="username">EMAIL:</label>
<input type="text" name="username" placeholder="Username/E-mail"><br>

<label for="name">NAME:</label>
<input type="text" name="name" placeholder="Name"><br>

<label for="password">PASSWORD:</label>
<input type="password" name="password" placeholder="Password"><br>

<label for="password">CONFIRM PASSWORD:</label>
<input type="password" name="CONFIRM password" placeholder="Confirm Password"><br>

<label for="mobile_number">MOBILE NUMBER:</label>
<input type="text" name="mobile_number" placeholder="Mobile Number"><br>

<button type="submit" name="register" value="Register">REGISTER</button>
</form>

</main>
</body>
</html>