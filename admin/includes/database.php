<?php
require_once("config.php");
class Database{

    public $connection;

    function __construct(){
        $this->open_db_connection();
    }

    public function open_db_connection(){
        $this->connection = new mysqli(db_host,db_user,db_pass,db_name);

        if($this->connection ->connect_errno){
            die("Database connection failed badly". $this->connection->error);
        }
    }

    public function query($sql){
        $result = $this->connection->query($sql);
        return $result;
    }

    private function comfirm_query($result){
        if(!$result){
            die("Query Failed" . $this->connection->error);
        }
    }

    public function escape_string($string){
        $escape_string = $this->connection->real_escape_string($string);

        return $escape_string;
    }

    public function the_insert_id(){
        return $this->connection->insert_id;
    }
}
$database = new Database();

?>