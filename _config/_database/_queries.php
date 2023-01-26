<?php 
require_once("./_config/_database/_connect.php");

class Query
{

    private $dbConnexion;

    public function __construct()
    {
        $this->dbConnexion = new Db_connect;
    }

    public function createDatabase($query)
    {
        $stmt = $this->dbConnexion->getPdo()->prepare($query);
        $stmt->execute();
    }

    public function basicInsertQuery($sql, $data = [])
    {
        $stmt = $this->dbConnexion->getPdo()->prepare($sql);
        $stmt->execute($data);
    }

    public function selectColumnTable($table,$column = "*")
    {
        $stmt = $this->dbConnexion->getPdo()->prepare('SELECT'.$table.' FROM '.$column);
        $stmt->execute();
        $stmt->fetch();
    }
}