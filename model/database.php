<!-- good as of project 4 -->
<?php
class Database {
    private static $dsn = 'mysql:host=localhost;dbname=portfolio'; // portfolio database
    private static $username = 'root';      // corrected
    private static $password = 'Pa$$w0rd';  // corrected
    private static $db;

    private function __construct() {}

    public static function getDB () {
        if (!isset(self::$db)) {
            // try catch in case database is unavail will be mirrored in all files where database is called
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('./errors/database_error.php');
                exit();
            }
        }
        return self::$db;
    }
}
?>