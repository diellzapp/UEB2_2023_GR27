

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Login</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	
	
    
    <style>
        .login-container {
	max-width: 500px;
	margin: 0 auto;
	padding: 20px;
	background-color: #f1f1f1;
	border-radius: 5px;
	box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
}

h2 {
	text-align: center;
}

label {
	display: block;
	margin-bottom: 10px;
}

input[type="text"],
input[type="password"] {
	width: 100%;
	padding: 10px;
	margin-bottom: 20px;
	border-radius: 5px;
	border: 1px solid #ccc;
}

button[type="submit"] {
	background-color: #4CAF50;
	color: white;
	padding: 10px 20px;
	border: none;
	border-radius: 5px;
	cursor: pointer;
}

button[type="submit"]:hover {
	background-color: #3e8e41;
}

#error-message {
	color: red;
	font-weight: bold;
	margin-top: 10px;
	text-align: center;
}
.login-container .register {
        text-align: center;
        margin-top: 40px;

      }

      .login-container .register a {
        color: #4CAF50;
        text-decoration: none;
      }
    </style>
</head>

<body>
    
  

  

<?php
include 'connection.php';


$error = "";


session_start();


if (isset($_SESSION['username'])) {
    header("Location: profile.php");
    exit();
}
    
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $username = $_POST["username"];
        $password = $_POST["password"];

        if ($con->connect_error) {
          $error = "Connection failed: " . $con->connect_error;
        } else {
  
          $stmt = $con->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
          $stmt->bind_param("ss", $username, $password);
          $stmt->execute();
          $result = $stmt->get_result();

          
          if ($result->num_rows == 1) {
           
            $_SESSION['username'] = $username;
            header("Location: profile.php");
            exit();
          } else {
            $error = "Invalid username or password.";
          }
        }

      
        $con->close();
      }
?>

    <header></header>
    <?php

if (!isset($_COOKIE['username'])  ) {
    if (basename($_SERVER['HTTP_REFERER']) === 'profile.php' && basename($_SERVER['REQUEST_URI']) === 'login.php') {
        echo 'You have been logged out.';
    }
}
?>

    
    <div class="login-container">
    <?php if ($error != "") { ?>
          <div class="error-message"><?php echo $error; ?></div>
        <?php } ?>
		<h2>Log-in</h2>
		<form id="login-form" method="post">
			<label for="username">Username:</label>
			<input type="text" name="username" id="username">
			<label for="password">Password:</label>
			<input type="password" name="password" id="password">
			<button type="submit" id="login-btn">Login</button>
		</form>
        <div class="register">
        <a href="register.php">Create an account</a>
      </div>
		<div id="error-message"></div>
	</div>
	
    
    <footer></footer>
    
    
    <script src="scripts/script.js "></script>
   

	
</body>

</html>
