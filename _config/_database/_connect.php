<?php 

require_once("./_config/config.php");

class Db_connect
{
    private static $instance;
    private $dbHost = DB_HOST;
    private $dbName = DB_NAME;
    private $dbUsr = DB_USR;
    private $dbP = DB_PASS;

    private $stmt;
    private $dbConnexion;

    public function __construct()
    {
        try {
            $this->dbConnexion = new PDO('mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName, $this->dbUsr, $this->dbP);
        } catch (\PDOException $e) {
            echo $e->getMessage();        }
    }

    public static function getinstance(){
        if(self::$instance== null){
            self::$instance =new Db_connect();
        }
        return self::$instance;
    }

    /**
     * Get the value of instance
     *
     * @return $instance
     */
    public function getPdo()
    {
        return $this->dbConnexion;
    }

}