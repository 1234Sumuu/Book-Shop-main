<?php

	session_start();
	$db = new mysqli("localhost","root","","sign_up");

	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
        $password = $_POST['password'];

		$query = "INSERT INTO userinfo(name, email, password) VALUES ('$name', '$email', '$password')";
		$run = mysqli_query($db, $query);

		if($run){
			echo "Registration successful!";
		}else{
			echo "error".mysql_error($db);
		}
	}

	if(isset($_POST['login'])){
		$name = $_POST['name'];
		$password = $_POST['password'];

		$mysqli = new mysqli("localhost","root","","sign_up");
		$result = $mysqli->query("SELECT * FROM userinfo WHERE name = '$name' AND password ='$password' ");
		$row = $result->fetch_assoc();

		if($row['name'] == $name && $row['password'] == $password){
			$message = "Login successful.!";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}else{
			$message1 = "Login Unsuccessful.!";
			echo "<script type='text/javascript'>alert('$message1');</script>";
		}
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login/signup</title>
    <link rel = "stylesheet" type= "text/css" href = "style1.css">
</head>
<body>
    <div class = "log-in-page">
    <div class ="form">
        <form action = "login.php" method ="post" class ="register-form">
            <input type="text" name= "name" placeholder = "Enter Your Name">
            <input type ="email" name = "email" placeholder = "Enter Your Email">
            <input type = "password" name = "password" placeholder = "your password">
            <button name ="Submit">Create Account</button>
            <p class = "message" >Have an Account? <a href="#">Login</a></p> 
        </form>

        <form action ="../index.php" method ="post" class ="login-form">
            <input type="text" name= "name" placeholder= "Enter Your Name">
            <input type ="password" name ="password" placeholder ="Enter Your Password">
            <button name ="login"> Login</button>
            <p class ="message">Not Register? <a href ="#">Register</a></p>
        </form>

    </div>
    </div>


    <script src='http://code.jquery.com/jquery-3.3.1.min.js'></script>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstarp.min.js"></script>
	<script src="js/custom.js"></script>

	<script>
		$('.message a').click(function(){
			$('form').animate({height: "toggle",opacity: "toggle"}, "slow");
		});
	</script>

    
</body>
</html>