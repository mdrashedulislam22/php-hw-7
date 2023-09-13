<?php
session_start();
include "./databese/evn.php";
$id = $_REQUEST['id'];
$query = "DELETE FROM post WHERE id='$id'";
$respons = mysqli_query($conn,$query);
if($respons){
    $_SESSION['message'] = "your post has been deleted";
    // $_SSESSION[''];
    header("Location:./allPost.php");
}
?>