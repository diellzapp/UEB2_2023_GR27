<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Contact Us</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <script src="_.js "></script>
</head>

<body>
    <?php
    include "connection.php";
    ?>
    <header></header>
    <div class="contact-us-container">
        <div class="contact-us-section contact-us-section1">
            <h1>Contact</h1>
            <p>Feel Free to Contact Us </p>
            <form action="" method="POST">
                <input placeholder="First Name" name="fName" required><br>
                <input placeholder="Last Name" name="lName"><br>
                <input placeholder="E-mail Address" name="eMail" required><br>
                <textarea placeholder="Enter your message !" name="feedback" rows="10" cols="30" required></textarea><br>
                <button type="submit" name="submit" value="submit">Send your Message</button>
                <?php
                if (isset($_POST['submit'])) {
                    $insert_query = "INSERT INTO 
                        feedbackTable ( senderfName,
                                        senderlName,
                                        sendereMail,
                                        senderfeedback)
                        VALUES (        '" . $_POST["fName"] . "',
                                        '" . $_POST["lName"] . "',
                                        '" . $_POST["eMail"] . "',
                                        '" . $_POST["feedback"] . "')";
                    $add = mysqli_query($con, $insert_query);

                    if ($add) {
                        echo "<script>alert('Succesfully Submitted');</script>";
                    }
                }
                ?>
            </form>

        </div>
        <div class="contact-us-section contact-us-section2">
            <h1>Address & Info</h1>
            <h3>Phone Numbers</h3>
            <p><a href="tel:01011391148">+38349100200</a><br>
                <a href="tel:01011391148">+38349100200</a></p>
            <h3>Address</h3>
            <p>Prishtine, rruga Agim Ramadani,nr 07</p>
            <h3>E-mail</h3>
            <p><a href="mailto:cinemareservation@bue.edu.eg">cinemareservation@gmail.com</a></p>
        </div>
    </div>
    <div style="width: 75%; height: 350px; margin: 15%;">
        <div id="gmap_canvas"></div>

        <script>
        function initMap() {
       
            var center = { lat: 37.7749, lng: -122.4194 };

           
            var map = new google.maps.Map(document.getElementById('gmap_canvas'), {
                center: center,
                zoom: 12
            });

            var marker = new google.maps.Marker({
                position: center,
                map: map,
                title: 'Marker Title'
            });
        }
    </script>

   
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5qdBCGU8lUw-fwLbmiVs4rMlOrQlfDAM&callback=initMap" async defer></script>
    </div>
    
    <footer></footer>
    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/owl.carousel.min.js "></script>
    <script src="scripts/script.js "></script>
</body>

</html>