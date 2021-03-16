<?php
require_once("includes/init.php");

if(!$session->is_signed_in()){
    redirect("login.php");
}

if(isset($_GET['id'])){

    $photo = Photo::find_by_id($_GET['id']);

    if($photo){
        $photo->delete_photo();
        redirect("../photos.php");
    }else{
        redirect("../photos.php");
    }
}

?>