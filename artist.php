<?php
// if ((isset($_GET['aid'])) && (isset($_GET['aname']))) {
//   $aid = (int) $_GET['aid'];
//   $aname = $_GET['aname'];

//   // echo "$aid $aname";
// }
// else {
//   $aid = 1;
//   $aname = '';
// }


?>

<?php
$conn = mysqli_connect('localhost','root','','songsite');
if($conn) {
  echo "DB Connected";
}
else {
  echo "Unable to connect";
}

$sql = 'select distinct(song_artist) from song';
$result = mysqli_query($conn, $sql);



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

    .footer{
      color: white;
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
    </style>
    <!-- Custom styles for this website -->
    <link href="jumbotron.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background: linear-gradient(to right, #cc6600 0%, #000000 100%);">
  <a class="navbar-brand" href="#" style="font-family: 'Varela Round', sans-serif;
"> <img src='logo.png' width="38"> MUSICAL WAVES</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">ABOUT</a>
      </li>
      <li class="nav-item active">
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
  <div class="container" style="margin-top: 55px";>
    <h2 class="text-white">Artists</h2>
    <ul>
  <?php while($row = mysqli_fetch_assoc($result)): ?>
      <li style="list-style-type: none;"><a  class="btn btn-outline-light btn-lg btn-block" href='show_songs.php?artist=<?php echo $row['song_artist']; ?>'><?php echo $row['song_artist']; ?></a></li>
  <?php endwhile; ?>
</ul>
    </div>

  </main>

<footer class="footer mt-5">
  <p>&copy; Company 2017-2018</p>
</footer>
<script type="text/javascript" src="admin/assets/js/jquery.min.js"></script>

<script type="text/javascript" src="admin/assets/js/bootstrap.min.js"></script>



</body>
</html>
