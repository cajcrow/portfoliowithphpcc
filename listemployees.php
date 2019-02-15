<?php
try{
    require('/model/database.php');
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('./errors/database_error.php');
    exit();
}


class Employee {
    public $Email;

    public function __construct($Email) {
        $this->Email = $Email;
    }
    public function getEmail(){
        return $this->Email;
    }
    // Show properties – private, protected, and public
    public function showAll() {
        echo '<ul>';
        foreach($this as $Email => $value ) {
            echo "<li>$Email = $value</li>";
        }
        echo '</ul>';
    }
}

class EmployeeDB {
    public static function getEmployees(){
        $db = Database::getDB();
        $query = 'SELECT * FROM employee
                  ORDER BY EmployeeID';
        $statement = $db->prepare($query);
        $statement->execute();
        
        $employees = array();
        foreach ($statement as $row) {
            $employee = new Employee($row['Email']);
            $employees[] = $employee;
        }
        return $employees;
    }
}

$employees = EmployeeDB::getEmployees();
?>

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
    <section>
        <br>
        <h2>Employee List</h2>
        <?php echo is_a($employees, 'Employee'); ?>
        <ul>
            <?php foreach ($employees as $employee) : ?>
            <li>
                <?php echo $employee->getEmail(); ?>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>
    <!--END NAVIGATION-->
    <br><br>
    <main>
        <h2>This is our current employee list!</h2>
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
