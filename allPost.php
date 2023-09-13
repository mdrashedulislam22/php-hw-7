<?php
session_start();
// print_r($_SESSION['old-information']['post-title']);
include "./databese/evn.php";
$query = "SELECT * FROM post";
//WHERE author = 'rashed'
$respons = mysqli_query($conn, $query);
$posts = mysqli_fetch_all($respons,1);
// echo "<pre>";
// var_dump($posts);
// echo "</pre>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body style="background-image: url(controller/img/free-download-1600x900-resolution-of-high-quality-background-cool.jpg );background-image:cover;" img="flued"> 
 <nav class="navbar navbar-expand-lg bg-body-tertiary " >
  <div class="container " >
    <a class="navbar-brand " style="margin: 0em 2em 0em 18em;" href="./index.php"><b>Post SYS</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav  mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">Add post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./allPost.php">All post</a>
        </li>
    </div>
  </div>
</nav>
<!-- table section  -->
<div class="col-lg-8 m-auto" >
<table class="table">
<tr style="text-align:center;">
<th style="background-color:#fcbd;">id</th>
<th style="background-color:#fcbd;">title</th>
<th style="background-color:#fcbd;">detail</th>
<th style="background-color:#fcbd;">author</th>
<th style="background-color:#fcbd;"></th>
</tr>
<?php 
if($posts >=0){
foreach($posts as $key=>$post){
  ?>
  <tr >
  <td style="background-color:#fcba;"><?php echo ++$key?></td>
  <td style="background-color:#fcba;"><?php echo $post['title']?></td>
  <td style="background-color:#fcba;"><?php echo strlen($post['detail']) > 50 ? substr($post['detail'],0,50)."...." : $post['detail']?></td>
  <td style="Width:9em;text-align:center;background-color:#fcba;">
  <!-- <img src="./controller/img/DSC_0089.JPG" style="width:25px; height:25px; border-radius:50%;"><br> -->
  <img src="https://api.dicebear.com/7.x/initials/svg?seed=<?php echo $post['author'] ?>&backgroundColor=32f645" style="width:25px; height:25px; border-radius:50%;"><br>
    <?php echo $post['author']?>
</td>
  <!-- butttons -->
  <td style="background-color:#fcba;">
    <div class="btn-group" >
      <a  href="./ShowPost.php?id=<?php echo $post['id']?>" class="btn btn-warning">Show</a>
      <a  href="./EditePost.php?id=<?php echo $post['id']?>" class="btn btn-primary">Edite</a>
      <a  href="./DeletePost.php?id=<?php echo $post['id']?>" class="btn btn-danger">Delete</a>
    </div>
  </td>
  </tr>
  <?php
}
}else{
  ?>
  <tr>
  <td colspan="4" style="text-align:center">
  <h2> your data is not found 😒😒😒</h2>
  </td>
  </tr>
  <?php
}
?>
</table>
</div>
<!-- toast success notification -->
<div class="toast <?php echo  isset($_SESSION['message']) ? "show" : '' ?>" style="position:absolute; right:0em; left:64em;top:-1em;" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <img src="./controller/img/dsc_0089.jpg" width="50px" height="50px" class="rounded me-2" alt="...">
    <strong class="me-auto">your post</strong>
    <small>1 second ago</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
  <?php echo  isset($_SESSION['message']) ? $_SESSION['message'] : '' ?>
  </div>
</div>
</div>
</div>
<!-- rotate: -90deg; -->
<!-- form section end here -->
<!-- bootstrap js file -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
<?php
session_unset();
?>