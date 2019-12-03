<?php
try{
    include('./model/database.php');
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('./errors/database_error.php');
    exit();
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Caleb Portfolio</title>
    <meta charset="utf-8">
    <link rel='icon' href='images/favicon.ico' type='image/x-icon'/>
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <header>
        <h1><mark>Caleb J Crownover</mark></h1>
    </header>
    <!--END HEADER-->

    <nav>
        <ul>
            <li><a href="landing.html">Home</a> &nbsp; &nbsp;</li>
            <li><a href="experience.html">Experience</a> &nbsp; &nbsp;</li>
            <li><a href="samples.html">Samples</a> &nbsp; &nbsp;</li>
            <li><a href="about.html">About Me</a> &nbsp; &nbsp;</li>
            <li><a href="contact.html">Contact Me</a> &nbsp; &nbsp;</li>
            <li><a href="login.php">Admin</a> &nbsp; &nbsp;</li>
        </ul>
    </nav>
    <!--END NAVIGATION-->
    <br><br>
    <main>
        <form action="admin.php">

        <div class="container">
          <label for="username"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="username" required>

          <label for="password"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" required>
          <br><br>
          <button type="submit">Login</button>
</form>
    </main>
    <!--END MAIN-->

    <footer>
        <a href="https://www.facebook.com/" target="_blank"><img src="images/facebook.png" alt="facebook logo"></a>
        <a href="https://www.linkedin.com/" target="_blank"><img src="images/linkedin.png" alt="linkedin logo"></a>
        <a href="https://github.com/" target="_blank"><img src="images/github.png" alt="github logo"></a>
        <p>Created by Caleb J Crownover</p>
    </footer>
    <!--END FOOTER-->
</body>
</html>