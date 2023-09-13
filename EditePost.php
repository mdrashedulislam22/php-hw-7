<?php
session_start();
// print_r($_SESSION['old-information']['post-title']);
include_once "./databese/evn.php";
$id = $_REQUEST['id'];
$query = "SELECT * FROM post WHERE id='$id'";
$rspons = mysqli_query($conn,$query);
$Post = mysqli_fetch_assoc($rspons);
// print_r($Post);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body style="background-image: url(controller/img/giphy\ \(1\).gif)">
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
<div class="card col-lg-4 m-auto my-3" style="background-color:yellowgreen;transform:translateY(-1em)" >
    <div class="card-header bg-danger text-light text-center "><b>Edite post</b></div>
<div class="card-body" >
<form action="./UpdetePosts.php?id=<?php echo $Post['id'] ?>" method="post" class="card-body"  >
    <!-- id -->
    <input type="hidden" name="id" value="<?php echo $Post['id'] ?>">
  <!-- post title  -->
    <input name="post-title" 
    value="<?php print_r($Post['title']); ?>"
    class="form-control mt-2" type="text"  placeholder="Enter your titel">
    <?php
    if(isset($_SESSION["form-errors"]['title'])){
      ?>
    <span class="text-danger"><?php print_r($_SESSION["form-errors"]['title']); ?> </span>
    <?php
    }else if(isset($_SESSION["form-errors"]['big-title'])){
      ?> 
    <span class="text-danger"><?php print_r($_SESSION["form-errors"]['big-title']); ?> </span>
    <?php
    }
     ?>
     <!-- detail -->
    <textarea name="detail" class="form-control my-2" placeholder="Enter your text"><?php print_r($Post['detail']); ?></textarea>
    <?php
    if(isset($_SESSION["form-errors"]['detail'])){
      ?>
        <span class="text-danger"><?php print_r($_SESSION["form-errors"]['detail']); ?> </span>
    <?php
    }
     ?>
     <!-- author -->
    <input name="author" 
    value="<?php print_r($Post['author']); ?>"
     class="form-control my-2" type="text"  placeholder="Enter name" >
    <?php
    if(isset($_SESSION["form-errors"]['author'])){
      ?><span class="text-danger "><?php print_r($_SESSION["form-errors"]['author']); ?></span><br>
    <?php
    };
    // echo "<br>";
    ?>
    <button class="btn btn-primary mt-2" style="margin-left:7.3em" > Updete your post</button>

</form>

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