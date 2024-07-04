<?php

session_start();
require_once("connection.php");
if (!isset($_SESSION["username"]) || $_SESSION["role"] != "super_admin") {
  // The user is not logged in or does not have the correct role, so redirect them to the login page
  header("Location: login.php");
}
?>

<?php 


    $user_id='';
    $name='';
    $email ='';
    $user_type ='';

    if(isset($_GET['user_id'])) {

        $user_id = mysqli_real_escape_string($connection, $_GET['user_id']);
        $query = "SELECT * FROM user WHERE id = {$user_id} LIMIT 1";
        $result_set = mysqli_query($connection,$query);

        if ($result_set) {
            if (mysqli_num_rows($result_set))
            {
                // user found
                $result = mysqli_fetch_assoc($result_set);
                $user_id = $result['id'];
                $name = $result['name'];
                $email = $result['username'];
                $user_type=$result['role'];

            } else {
                // user not found
                header('Location: view_users.php?err=user_not_found');	
            }
        } else {
            // query unsuccessful
            header('Location: view_users.php?err=query_failed');
        }

    }

	if(isset($_POST['submit'])) {
        $user_type11=$_POST['user_type'];
        $user_id=$_POST['user_id'];
    



		    // no errors found... adding new record
			$user_type = mysqli_real_escape_string($connection, $_POST['user_type']);
            $id = mysqli_real_escape_string($connection, $_POST['user_id']);

			$query = "UPDATE user SET ";
			$query .= "role = '{$user_type11}' ";
			$query .= "WHERE id = {$user_id} LIMIT 1";



			$result = mysqli_query($connection, $query);

			if ($result) {
				// query successful... redirecting to users page
				header('Location: view_users.php?user_modified=true');
			}

	}



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit_User</title>
	<link rel="stylesheet" href="css/edit_users.css">
</head>
<body>

	<main>

<div class="info">
    <div class="center">EDIT USERS</div>
		<form action="edit_users.php" method="post" class="userform">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        
            <p>
				<label for="">Name:</label><br>
				<input type="text" name="name" <?php echo 'value="' . $name . '"'; ?>disabled>
			</p>

			<p>
				<label for="">Username:</label><br>
				<input type="text" name="email" <?php echo 'value="' . $email . '"'; ?>disabled>
			</p>

			<p>
				<label for="">Type:</label><br>
				<input type="text" name="user_type" <?php echo 'value="' . $user_type . '"'; ?>>
			</p>

            <p>
				
				<button type="submit" name="submit">Save</button>
			</p>

			

		</form>
        </div>
		
		
	</main>
</body>
</html>
