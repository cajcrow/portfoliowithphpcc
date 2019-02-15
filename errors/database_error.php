<!DOCTYPE html>
<html lang="en">

<head>
    <title>Caleb Portfolio</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <header>
        <h1><mark>List of Employees</mark></h1>
    </header>
    <!--END HEADER-->

    <nav>
        <ul>
            <li><a href="index.html">Home</a> &nbsp; &nbsp;</li>
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
        <h1>Database Error</h1>
        <p class="first_paragraph">There was an error connecting to the database.</p>
        <p>The database may not be available.</p>
        <p>The database credentials may be out of date.</p>
        <h2 class="last_paragraph">Error message: <?php echo $error_message; ?></h2>
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