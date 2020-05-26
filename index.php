<?php
// $conn = mysqli_connect('localhost','root','','songsite');
// if(!$conn) {
//   echo "DB Connected";
// }

// $sql = 'select * from album';
// $result = mysqli_query($conn, $sql);

?>

    <?php

        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 12;
        $offset = ($pageno-1) * $no_of_records_per_page;
        $conn=mysqli_connect("localhost","root","","songsite");
        // Check connection
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            die();
        }

        $total_pages_sql = "SELECT COUNT(*) FROM album";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql = "SELECT * FROM album LIMIT $offset, $no_of_records_per_page";
        $res_data = mysqli_query($conn,$sql);
     
        mysqli_close($conn);
    ?>


<!doctype html>
<html lang="en">
<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>MUSICAL WAVES</title>

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">


    <style>

    body{

      background-image: url("https://www.pixelstalk.net/wp-content/uploads/images1/Rock-Band-Backgrounds-HD.jpg");
      background-position: center;
      background-size: cover;

    }
    .card{
      background: rgba(255,255,255,0.5);
      color: black;
    }

          .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .jumbotron{
        background-image: url(http://thegiggingbassplayer.com/wp-content/uploads/2009/09/Flickr-Bass-Guitar-Feliciano-Gulmaraes-1132x509.jpg);
        background-position: center;
        color: white;
      }

      .navbar-nav, .mr-auto {
flex: 1;
margin: auto !important;
display: flex;
justify-content: flex-end;
}

      .iframe{

        background-position: center;
        background-size: cover;

      }

    </style>
    <!-- Custom styles for this website -->
    <link href="jumbotron.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background: linear-gradient(to right, #cc6600 0%, #000000 100%);">
  <a class="navbar-brand" href="#" style="font-family: 'Varela Round', sans-serif;
"><img src='logo.png' width="38"> MUSICAL WAVES </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">ABOUT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="artist.php">ARTIST</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pop.php">GENRE</a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="admin/genre/index.php">ADMIN</a>
      </li>
    </ul>
  </div>
</nav>

<main role="main">
  <div class="container" style="margin-top: 90px; ">
<div class="card-group">
  <?php while($row = mysqli_fetch_assoc($res_data)): ?>
  
  <div class="col-3  my-2">
  <a href="view_album.php?aid=<?php echo $row['album_id'];?>&aname=<?php echo $row['album_name'] ?>"><div class="card">
    <img src="<?php echo $row['album_image'] ?>" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"><?php echo $row['album_name'] ?></h5>
      <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
    </div>
    <div class="card-footer">
      <small class="text-muted"><?php echo $row['datenew'] ?></small>
    </div>
  </div>
</a>
</div>
<?php endwhile; ?>

  
</div>

    <ul class="pagination justify-content-center pagination-lg">
    <li class="page-item"><a class="page-link" href="?pageno=1">First</a></li>
    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
        <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
    </li>
    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
        <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
    </li>
    <li class="page-item"><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
    
</div>
</main>
<div class="iframe">
  
     <!--  <iframe ></iframe> -->

</div>

<footer class="footer mt-5">
  <p>&copy; Company 2017-2018</p>
</footer>
<script type="text/javascript" src="admin/assets/js/jquery.min.js"></script>

<script type="text/javascript" src="admin/assets/js/bootstrap.min.js"></script>



</body>
</php>
