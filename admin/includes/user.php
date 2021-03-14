<?php

class User{

    protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name');
    public $user_id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    public static function find_all_users(){
        $syntax = "SELECT * FROM users";

        return self::find_this_query($syntax);
    }

    public static function find_user_by_id($user_id){
        global $database;
        $syntax = "SELECT * FROM users WHERE user_id = {$user_id}";
        $result_set = self::find_this_query($syntax);

        // if(!empty($result_set)){
        //     $first_item = array_shift($result_set);
        //     return $first_item;
        // }else{
        //     return false;
        // }

        return !empty($result_set) ? array_shift($result_set) : false;
    }

    public static function find_this_query($sql){
        global $database;
        $result_set = $database->query($sql);
        $the_object_array = array();
        while($row = mysqli_fetch_array($result_set)){
            $the_object_array[] = self::instantation($row);
        }

        return $the_object_array;
    }

    public static function verify_user($username, $password){
        global $database;

        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM users WHERE ";
        $sql .= "username = '{$username}' ";
        $sql .= "AND password = '{$password}' LIMIT 1";

        $result_set = self::find_this_query($sql);
        return !empty($result_set) ? array_shift($result_set) : false;
    }

    public static function instantation($the_record){
        $the_object = new self;
    
        // $the_object->id = $found_user['user_id'];
        // $the_object->username = $found_user['username'];
        // $the_object->password = $found_user['password'];
        // $the_object->first_name = $found_user['first_name'];
        // $the_object->last_name = $found_user['last_name'];

        foreach($the_record as $the_attribute => $value){
            if($the_object->has_the_attribute($the_attribute)){
                $the_object->$the_attribute = $value;
            }
        }

        return $the_object;
    }

    private function has_the_attribute($the_attribute){
        $object_properties = get_object_vars($this);

        return array_key_exists($the_attribute, $object_properties);
    }

    protected function properties(){

        $properties = array();

        foreach(self::$db_table_fields as $db_field){
            if(property_exists($this, $db_field)){
                $properties[$db_field] = $this->$db_field;
            }
        }

        return $properties;
    }

    public function save(){
        return isset($this->user_id) ? $this->update() : $this->create() ;
    }

    public function create(){
        global $database;

        $properties = $this->properties();
        $sql = "INSERT INTO users (". implode(",",array_keys($properties)) .") ";
        $sql .= "VALUES ('" . implode("','",array_values($properties)) . "')";
        // $sql .= $database->escape_string($this->username) . "', '";
        // $sql .= $database->escape_string($this->password) . "', '";
        // $sql .= $database->escape_string($this->first_name) . "', '";
        // $sql .= $database->escape_string($this->last_name) . "')";

        if($database->query($sql)){
            $this->user_id = $database->the_insert_id();
            return true;
        }else{
            return false;
        }
    }

    public function update(){
        global $database;

        $properties = $this->properties();

        $properties_pairs = array();

        foreach($properties as $key => $value){
            $properties_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE users SET ";
        $sql .= implode(", ", $properties_pairs);
        $sql .= " WHERE user_id = " . $database->escape_string($this->user_id);

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }

    public function delete(){
        global $database;

        $sql = "DELETE FROM users ";
        $sql .= "WHERE user_id = " . $database->escape_string($this->user_id);
        $sql .= " LIMIT 1";

        $database->query($sql);
    }
}


?>