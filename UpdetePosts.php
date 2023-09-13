<?php
//session_start
session_start();
include "./databese/evn.php";
$id = $_REQUEST['id'];
// print_r($id);
// exit();
$title = $_REQUEST['post-title'];
$detail = $_REQUEST['detail'];
$author = $_REQUEST['author'];
$erorse = [];

if(empty($title)){
    $erorse['title'] = "মনের ভাষা বুঝিনা  title দিয়া যাও 🤷‍♂️";
    // $erorse['title'] = "tomar title koi?" ;
    print_r($erorse ['title']);
}else if(strlen($title) > 50){
    $erorse['big-title'] = "ar koto?";
    print_r($erorse ['big-title']);
};
if(empty($detail)){
     $erorse['detail'] = "তোমায় আমি চিনিনা detail's দিয়া যাও 😏";   
    // $erorse['detail'] = "tomar detail koi?";
    print_r($erorse ['detail']);
};
if(empty($author)){
    $erorse['author'] = "অন্যকে মনটা দিয়ে নিজেকে ভুলে গেলে?🫢";
    print_r($erorse ['author']);
};
//back on home page for errors
if(count($erorse) > 0){
     $_SESSION["form-errors"] = $erorse;
    header("location:./EditePost.php?id=$id");
}else{
  $updete =  "UPDATE post SET title='$title',detail='$detail',author='$author' WHERE id = '$id'";
  $respons = mysqli_query($conn, $updete);
  $_SESSION['message'] = "your post has been updated";
header("location:./allPost.php");

};
?>