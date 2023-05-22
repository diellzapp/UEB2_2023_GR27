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

</head>
<body>
<?php
// Startimi i session
$delay = 2;

// Caktimi i cookie me delay time
setcookie("redirect", "1", time() + $delay);

// dergimi te lokacioni i caktuar pas delay 
echo '<script>
    setTimeout(function() {
        location.href = "profile.php?logout=1";
    }, ' . ($delay * 1000) . ');
</script>';
// Startimi session
session_start();

// kontrollimi nese useri eshte i loguar
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Databaza connection settings
$host = 'localhost';
$db = 'cinema_db';
$user = 'root';
$password = '';

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

try {
   
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $password);

   
    $username = $_SESSION['username'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

?>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        h2 {
            text-align: center;
        }
        .profile-info {
            margin-top: 20px;
        }
        .profile-info label {
            font-weight: bold;
            display: inline-block;
            width: 100px;
        }
        .profile-info p {
            margin: 5px 0;
        }
        .logout-button {
            text-align: center;
            margin-top: 20px;
        }
        .logout-button button {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>


<header></header>
    <div class="container">
        <h2>Profile</h2>
        <div class="profile-info">
            <p>
                <label>Username:</label>
                <span><?php echo $user['username']; ?></span>
            </p>
            <p>
                <label>Name:</label>
                <span><?php echo $user['name']; ?></span>
            </p>
            <p>
                <label>Surname:</label>
                <span><?php echo $user['surname']; ?></span>
            </p>
            <p>
                <label>Email:</label>
                <span><?php echo $user['email']; ?></span>
            </p>
        </div>
        <div class="logout-button">
            <button onclick="location.href='profile.php?logout=1'">Log Out</button>
        </div>
    </div>
    

    <footer></footer>
</body>

<?php
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>

    
    <script src="scripts/script.js "></script>
</body>
</html>