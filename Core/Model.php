<?php


namespace Core;
use App\Configs\DBconfigs;
use mysql_xdevapi\Exception;
use PDO;
use PDOException;

abstract class Model
{
    private $db_host = DBconfigs::DB_SERVERNAME;
    private $db_user = DBconfigs::DB_USERNAME;
    private $db_password = DBconfigs::DB_PASSWORD;
    private $db_name=DBconfigs::DB_NAME;

    protected $dbh;
    protected $stmt;


    // connecting to DB
    public function __construct(){
        try {
            $this->dbh=new PDO("mysql:host=".$this->db_host.";dbname=".$this->db_name, $this->db_user, $this->db_password);
        } catch (PDOException $e) {
            new Exception("PDO exception something wrong with DB");
        }

    }

    // making query method
    public function query($query){

        $this->stmt=$this->dbh->prepare($query);


    }
    // making bind method
    public function bind($param, $value, $type=null){
        if(is_null($type)){
            switch (true) {
                case is_int($value):
                    $type=PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type=PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type=PDO::PARAM_NULL;
                    break;
                default:
                    $type=PDO::PARAM_STR;
                    break;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    // execute query method
    public function execute(){

        $this->stmt->execute();
    }
    // getting results
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // check if there is last inserted id
    public function lastInsertId(){
        return $this->dbh->lastInsertId();
    }
// getting single result
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
}