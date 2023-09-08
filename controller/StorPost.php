<?php
//session_start
session_start();
$title = $_REQUEST['post-title'];
$detail = $_REQUEST['detail'];
$author = $_REQUEST['author'];
$erorse = [];

if(empty($title)){
    $erorse['title'] = "tomar title koi?" ;
    print_r($erorse ['title']);
}else if(strlen($title) > 50){
    $erorse['big-title'] = "ar koto?";
    print_r($erorse ['big-title']);
};
if(empty($detail)){
    $erorse['detail'] = "tomar detail koi?";
    print_r($erorse ['detail']);
};
if(empty($author)){
    $erorse['author'] = "tomar name koi?";
    print_r($erorse ['author']);
};
//back on home page for errors
if(count($erorse) > 0){
    $_SESSION['old-information'] = $_REQUEST;
    $_SESSION["form-errors"] = $erorse;
    header("location:../index.php");
}else{

};
?>