<!------------------------------------------------------------------------------
  Modification Log
  Date          Name            Description
  ----------    -------------   -----------------------------------------------
  2-14-2019      CCrownover      Initial Deployment.
  ----------------------------------------------------------------------------->
<?php
// get access to database and get function calls from extrnl files
try{
    include('./model/database.php');
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('./errors/database_error.php');
    exit();
}

include('./model/visitor.php');
include('./model/employee.php');

    // check and define action
    $action = filter_input(INPUT_POST, 'action');
        if ($action == NULL) {
            $action = 'list_visitors';
        } else {
            echo $action;
        }

    // List the visitors & employees
    if ($action == 'list_visitors') {

        // Read employee data 
        $Email = filter_input(INPUT_GET, 'Email', 
                FILTER_VALIDATE_INT);
        if ($Email == NULL || $Email == FALSE) {
            $Email = 1;
        }

        $visitors = getVisitorByEmail($Email);
    }
    // Executed when user clicks delete button
    else if ($action == 'deleteVisitor') {
        $count = deleteVisitor($Email);
        if ($count == 1){
            $message = "Cannot delete.";
            header("Location: ./errors/error.php");
        }else {
            header("Location: admin.php");
        }
    }

//set up function to get comments from database
function get_comment() {
    $db = Database::getDB();
    $query = 'SELECT * FROM visitor';
    $statement = $db->prepare($query);
    $statement->execute();
    $comment = $statement->fetchAll();
    $statement->closeCursor();
    return $comment;
}

$visitor = get_comment();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Caleb Portfolio</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<main>
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
    <h1>Comments List</h1>
    <section>
        <table>
            <tr>
                <th>Email</th>
                <th>Comment</th>
                <th>&nbsp;</th>
            </tr>
            <!-- display a table of visitors and comments -->
            <?php foreach ($visitor as $comment) : ?>
            <tr>
                <td><?php echo $comment['Email']; ?></td>
                <td><?php echo $comment['Message']; ?></td>
                <td><form action="admin.php" method="post">
                    <input type="hidden" name="action" value="deleteVisitor">
                    <input type="hidden" name="Email" value="<?php echo $comment['Email']; ?>">
                    <!-- need to be able to delete comments -->
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </section>
</main>