<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Register</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
      $('form').submit(function(event) {
        event.preventDefault(); 

        var form = $(this);
        var url = form.attr('action');
        var formData = form.serialize();

        $.ajax({
          type: 'POST',
          url: url,
          data: formData,
          success: function(response) {
            $('.message').html(response); 
          }
        });
      });
    });
  </script>
     <style>
        .container {
  width: 300px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
}

h2 {
  text-align: center;
}

.form-group {
  margin-bottom: 15px;
}
input[type="text"],
input[type="email"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
}

input[type="submit"] {
  width: 100%;
  padding: 10px;
  background-color: #4CAF50;
  color: white;
  border: none;
  cursor: pointer;
}

    </style>


<body>
<header></header>

<?php
include 'connection.php';
$error1 = ' ';

if($_SERVER["REQUEST_METHOD"] == "POST") {

        
        $username = $_POST['username'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $confirmEmail = $_POST['confirm_email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];
    

        $stmt = $con->prepare("SELECT COUNT(*) as count FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();
    
        if ($count > 0) {
            // Username veqse ekziston ne databaze 
          
         ?>
    <script>
    $('.message').html("Username already exist");
</script>
<?php
} else{
    if ($email !== $confirmEmail) {
        $errorMsg = "Email and Confirm Email do not match.";
    } elseif ($password !== $confirmPassword) {
        $errorMsg = "Password and Confirm Password do not match.";
    } else {
       
        $stmt = $con->prepare("INSERT INTO users (username, name, surname, email, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $username, $name, $surname, $email, $password);
        if ($stmt->execute()) {
           ?> <script>
            $('.message').html("Registration was succsesful.");
           </script><?php
        } else {
            
            ?>
            <script> $('.message').html(" Error:<?php echo $stmt->error; ?>"); </script>
            <?php
        }
        $stmt->close();
    }
}
}

$con->close();
?>


<div class="container">
    <h2>Registration </h2>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <p class="message"></p>
    <div class="form-group">
    
        <label for="username">Username:</label>
        <input type="text" name="username" required>
      </div>
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
      </div>
      <div class="form-group">
        <label for="surname">Surname:</label>
        <input type="text" name="surname" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="confirm_email">Confirm Email:</label>
        <input type="email" name="confirm_email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" required>
      </div>
      <div class="form-group">
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" required>
      </div>
      <div class="form-group">
        <input type="submit" value="Register">
      </div>
    </form>
  </div>






<footer></footer>
<script src="scripts/script.js "></script>
</body>

</html>