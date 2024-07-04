<?php

session_start();
require_once("connection.php");
if (!isset($_SESSION["username"]) || $_SESSION["role"] != "super_admin") {
  // The user is not logged in or does not have the correct role, so redirect them to the login page
  header("Location: login.php");
}
?>

<?php 
	
	$user_list = '';

	// getlist
	$query = "SELECT * FROM user WHERE id>= 0 ";
	$users = mysqli_query($connection,$query);
 
	{
		
		while ($user = mysqli_fetch_assoc($users)) {
			$user_list .= "<tr>";
			$user_list .= "<td>{$user['name']}</td>";
			$user_list .= "<td>{$user['username']}</td>";
			$user_list .= "<td>{$user['role']}</td>";
			$user_list .= "<td> <a href=\"edit_users.php?user_id={$user['id']}\">Edit</a> </td>";
			$user_list .= "</tr>";
		}
	}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Users</title>
	<link rel="stylesheet" href="css/view_users.css">
</head>
<body>
	

	<main>

	<table class="table">
		<tr>
		<th>Name</th>
		<th>Username</th>
		<th>Role</th>
		<th>Edit</th>
		</tr>

			<?php echo $user_list; ?>
		</table>
	</main>

	
</body>
</html>