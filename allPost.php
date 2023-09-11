<?php
session_start();
// print_r($_SESSION['old-information']['post-title']);
include "./databese/evn.php";
$query = "SELECT * FROM post ";
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
<body style="background-image: url(controller/img/free-download-1600x900-resolution-of-high-quality-background-cool.jpg );background-image:cover" img="flued"> 
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
<div class=" col-lg-7 m-auto "style="background-color:red">
<table class="table" style=" background-color:red">
<tr>
<th >id</th>
<th>title</th>
<th>detail</th>
<th>author</th>
</tr>
<?php 
if($posts >=0){
foreach($posts as $key=>$post){
  ?>
  <tr>
  <td><?php echo ++$key?></td>
  <td><?php echo $post['title']?></td>
  <td><?php echo strlen($post['detail']) > 50 ? substr($post['detail'],0,50)."...." : $post['detail']?></td>
  <td><?php echo $post['author']?></td>
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
<div class="toast <?php echo  isset($_SESSION['message']) ? "show" : '' ?>" style="position:absolute; right:10em; left:34em;top:27em" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <img src="..." class="rounded me-2" alt="...">
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
<!-- form section end here -->
<!-- bootstrap js file -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
<?php
session_unset();
?>