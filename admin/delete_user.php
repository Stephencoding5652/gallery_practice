<?php
require_once("includes/init.php");

if(!$session->is_signed_in()){
    redirect("login.php");
}

if(isset($_GET['id'])){

    $user = User::find_by_id($_GET['id']);

    if($user){
        $user->delete_user();
        redirect("users.php");
    }else{
        redirect("users.php");
    }
}

?>