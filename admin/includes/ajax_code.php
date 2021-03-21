<?php 

require_once("init.php");

$photo = new Photo();

if(isset($_POST['image_name'])){

    $user = User::find_by_id($_POST['user_id']);
    $user->user_image = $_POST['image_name'];

    $user->save();
}

if(isset($_POST['photo_id'])){

    Photo::display_sidebar_data($_POST['photo_id']);
}





?>