<?php

class User extends Db_object{

    protected static $db_table = "users";
    protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name', 'user_image');
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $user_image;
    public $tmp_path;
    public $upload_directory = "images";
    public $errors = array();
    public $upload_errors = array(
        UPLOAD_ERR_OK           => "There is no error",
        UPLOAD_ERR_INI_SIZE     => "The uploaded file exceeds the upload_max filesize directive in php.ini",
        UPLOAD_ERR_FORM_SIZE    => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML",
        UPLOAD_ERR_PARTIAL      => "The uploaded file was only partially uploaded",
        UPLOAD_ERR_NO_FILE      => "No file was uploaded",
        UPLOAD_ERR_NO_TMP_DIR   => "Missing a temporary folder",
        UPLOAD_ERR_CANT_WRITE   => "Failed to write file to disk",
        UPLOAD_ERR_EXTENSION    => "A PHP extention stopped the file upload"
    );

    

    

    public static function verify_user($username, $password){
        global $database;

        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM users WHERE ";
        $sql .= "username = '{$username}' ";
        $sql .= "AND password = '{$password}' LIMIT 1";

        $result_set = static::find_by_query($sql);
        return !empty($result_set) ? array_shift($result_set) : false;
    }

    public function image_path(){
        return $this->upload_directory.DS.$this->user_image;
    }

    public function delete_user(){
        $target_path = $this->image_path();

        if($this->delete()){
            return unlink($target_path) ? true : false;
        }else{

            return false;
        }
    }

    public function set_file($file){

        if(empty($file) || !$file || !is_array($file)){

            $this->errors[] = "There was no file uploaded here";
            return false;

        }else if($file['error'] != 0){

            $this->errors[] = $this->upload_errors[$file['error']];
            return false;

        }else{

            $this->user_image = $file['name'];
            $this->tmp_path = $file['tmp_name'];

        }
        
    }

    public function save_user_image(){


        if(!empty($this->errors)){

            return false;

        }

        if(empty($this->user_image) || empty($this->tmp_path)){

            $this->errors[]= "the file was not available";
            return false;

        }

        $target_path = $this->image_path();

        if(file_exists($target_path)){

            $this->errors[] = "This file {$this->user_image} already exists";
            return false;

        }

        if(move_uploaded_file($this->tmp_path, $target_path)){
            
            unset($this->tmp_path);
            return true;

        }else{

            $this->errors[] = "the file directory probably does not have permission";
            return false;

        }

    }

}


?>