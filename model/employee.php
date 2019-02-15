<!------------------------------------------------------------------------------
  Modification Log
  Date          Name            Description
  ----------    -------------   -----------------------------------------------
  2-8-2019      CCrownover      Initial Deployment.
  ----------------------------------------------------------------------------->
<?php
    function getVisitorsbyEmail($Email) {
        try{
            $db = Database::getDB();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include('./errors/database_error.php');
            exit();
        }
        

        $visitor = VisitorDB::getEmail($Email);

        $query = "SELECT * FROM visitor
                  WHERE Email = '$Email'
                  ORDER BY Email";
        $result = $db->query($query);
        $visitors = array();
        foreach ($result as $row) {
            $visitor = new Product();
            $visitor->setCategory($category);
            $visitor->setEmail($row['Email']);
            $visitor->setMessage($row['Message']);
            $visitor->setName($row['Name']);

            $visitors[] = $visitor;
        }
        return $visitors;
    }
?>