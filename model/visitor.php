<!------------------------------------------------------------------------------
  Modification Log
  Date          Name            Description
  ----------    -------------   -----------------------------------------------
  2-11-2019      CCrownover      Initial Deployment.
  ----------------------------------------------------------------------------->
<?php    
    function getVisitorByEmail($Email) {
        try{
            $db = Database::getDB();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include('./errors/database_error.php');
            exit();
        }
        $query1 = 'SELECT * FROM visitor
                    WHERE Email = :Email
                    ORDER BY Name';
        $statement1 = $db->prepare($query1);
        $statement1->bindValue(":Email", $Email);
        $statement1->execute();
        $visitors = $statement1;
        
        return $visitors;
    }

    function addVisitor($Name, $Email, $Message){
        try{
            $db = Database::getDB();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include('./errors/database_error.php');
            exit();
        }
        // Add the product to the database  
        $query = 'INSERT INTO visitor
                     (Name, Email, Message)
                  VALUES
                     (:Name, :Email, :Message)';
        $statement = $db->prepare($query);
        $statement->bindValue(':Name', $Name);
        $statement->bindValue(':Email', $Email);
        $statement->bindValue(':Message', $Message);
        $check = $statement->execute();
        $statement->closeCursor();

        if ($check > 0){
        return $Name;
        } else {
            return 1;
        }
    }
    
    function deleteVisitor($Email) { 
        try{
            $db = Database::getDB();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include('./errors/database_error.php');
            exit();
        }
        $Email = filter_input(INPUT_POST, 'Email');
        $query = 'DELETE FROM visitor
                  WHERE Email = :Email';
        $statement = $db->prepare($query);
        $statement->bindValue(':Email', $Email);
        try{
            $statement->execute();
        } catch (PDOException $e) {
            echo 'CANNOT delete: ' . $e->getMessage();
        }
        $statement->closeCursor();
    }
?>