<?php
    $Name = filter_input(INPUT_POST, 'contact');
    $Email = filter_input(INPUT_POST, 'email');
    $Message = filter_input(INPUT_POST, 'comments');
    
    // Validate inputs
    if ($Name == null || $Email == null || $Message == null) {
        $error = "Invalid input data. Check all fields and try again.";
        //include('error.php');
        echo "Form Data Error: " . $error; 
        exit();
    } else {
        
        try{
            include "./model/database.php";
            include "./model/visitor.php";
            addVisitor($Name, $Email, $Message);
        } catch (PDOException $e) {
            echo 'Connection error: ' . $e->getMessage();
        }
            
//            $Name = addVisitor($Name, $Email, $Message);
//            if ($Name == 1) {
//                $message = "Unable to add to database. Please check back later";
//            } else {
//                $message = "Thank you, " . $Name . ", for contacting me! I will get back to you shortly.";
//            }
            
    }
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
        <h3>Thanks for getting in touch <?php echo $Name; ?>. I will get back to you as soon as possible!</h3>
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