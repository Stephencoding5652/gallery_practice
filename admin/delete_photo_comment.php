<?php
require_once("includes/init.php");

if(!$session->is_signed_in()){
    redirect("login.php");
}

if(isset($_GET['id'])){

    $comment = Comment::find_by_id($_GET['id']);

    if($comment){
        $comment->delete();
        redirect("photo_comment.php?id=" . $comment->photo_id);
    }else{
        redirect("photo_comment.php?id=" . $comment->photo_id);
    }
}

?>