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

    <style>
        #titulli {
  background-color: #333;
  color: #fff;
  padding: 20px;
  text-align: center;
}

#team {
  display: flex;
  justify-content: space-around;
  align-items: center;
  margin-top: 50px;
}

.member {
  text-align: center;
}

.member img {
  width: 200px;
  height: 250px;
  border-radius: 80%;
}

.member h3 {
  margin-top: 10px;
}

.member p {
  margin-top: 5px;
  font-style: italic;
}

    </style>
<h1 id="titulli">Our Team</h1>
<section id="team">
    <div class="member">
      <img src="img/Aladini.6.png" alt="Member 1">
      <h3>Aladin Bajra</h3>
      <p>Chief Executive Officer(CEO)</p>
    </div>

    <div class="member">
      <img src="img/Diellza.5.png" alt="Member 2">
      <h3>Diellza Prebreza</h3>
      <p>co-CEO</p>
    </div>

    <div class="member">
      <img src="img/Endi.3.png" alt="Member 3">
      <h3>Endi Rashica</h3>
      <p>Co-Founder</p>
    </div>

    <div class="member">
      <img src="img/Blina.3.png" alt="Member 4">
      <h3>Blina Retkoceri</h3>
      <p>Co-Founderr</p>
    </div>

    <div class="member">
      <img src="img/Armela.jpg" alt="Member 5">
      <h3>Armela Hajra</h3>
      <p>Co-Founder</p>
    </div>
  </section>






    <footer></footer>
    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/owl.carousel.min.js "></script>
    <script src="scripts/script.js "></script>
</body>

</html>