<?php
session_start();
// print_r($_SESSION['old-information']['post-title']);
include_once "./databese/evn.php";
$id = $_REQUEST['id']; 
$query = "SELECT * FROM post WHERE id='$id'";
$respons = mysqli_query($conn, $query);
$posts = mysqli_fetch_assoc($respons);
// print_r($posts);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body style="background-image: url(controller/img/giphy.gif)">
    <!-- navigation section --> 
 <nav class="navbar navbar-expand-lg bg-body-tertiary " >
  <div class="container " >
    <a class="navbar-brand " style="margin: 0em 3.3em 0em 19.5em;" href="./index.php"><b>Post SYS</b></a>
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
<!-- form section start here -->
<div class="card col-lg-4 m-auto my-3" style="background-color:chartreuse;transform:translateY(-1em);" >
    <div class="card-header bg-dark text-light text-center "><h3><?=ucfirst($posts['title']); ?></h3></div>
<div class="card-body" ><?=$posts['detail']; ?>
    <!-- Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fuga beatae tempore dolorum cum! Inventore id tenetur voluptatibus rem cumque repellendus iste autem repudiandae quidem assumenda natus accusantium, animi vero dolor. -->
</div>
<div class="card-footer">
    <h5>Author name = <?=ucfirst($posts['author']); ?></h5>
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