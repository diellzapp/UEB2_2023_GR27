
<div class="navbar-brand">
    <a href="index.php">
        <h1 class="navbar-heading">ABC Cinema</h1>
    </a>
</div>

 
<?php
$sessionTimeout = 1;

// Get the current time
$currentTime = time();

// Calculate the expiration time for the cookie
$expirationTime = $currentTime + $sessionTimeout;

// Set the cookie with the expiration time
setcookie("session_id", session_id(), $expirationTime);

// Start the session
session_start();


// Check if user is logged in
if (isset($_SESSION['username'])) {
    // User is logged in
    // Set the session expiration time in seconds (e.g., 30 minutes)
    $sessionExpiration = 1 * 10; // 30 minutes

    // Calculate the expiration time
    $expirationTime = time() + $sessionExpiration;

    // Set the session expiration time as a cookie
    setcookie('session_expiration', $expirationTime, $expirationTime, '/');

    // Rest of your code for the logged-in state
    $emri = "Profile";
} else {
    // User is not logged in
    // Rest of your code for the logged-out state
    $emri = "Login";
   
}

// Check if the session has expired

?>







<div class="navbar-container">
    <nav class="navbar">
        <ul class="navbar-menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="schedule.php">Schedule</a></li>
            <!-- <li><a href="TxnStatus.php" target="_blank">Status</a></li> -->
            <li><a href="team.php">Team</a></li>           
            <li><a href="contact-us.php">Contact</a></li>
            <li><a href="login.php"><?php echo $emri;?></a></li>
        </ul>
    </nav>
</div>
