<?php
  include('koneksi.php'); 

  if (isset($_GET['id'])) {
    
    $id_buku = ($_GET["id"]);

    
    $query = "SELECT * FROM data_buku where id like '%".$id_buku."%';";
    $result = mysqli_query($conn, $query);
    
    if(!$result){
      die ("Query Error: ".mysqli_errno($conn).
         " - ".mysqli_error($conn));
    }
    
    $data = mysqli_fetch_assoc($result);
      
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='jelajah.php';</script>";
       }
  } else {
    echo "<script>alert('Masukkan data id.');window.location='jelajah.php';</script>";
  }

  function custom_echo($x, $length)
      {
          if(strlen($x)<=$length)
          {
              echo $x;
            }
            else
            {
                $y=substr($x,0,$length) . '...';
                echo $y;
            }
        }
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <title>Pustaka - Jelajah</title>

    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext"
      rel="stylesheet"
    />
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/fontawesome-all.css" rel="stylesheet" />
    <link href="css/swiper.css" rel="stylesheet" />
    <link href="css/magnific-popup.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />

    <style>
        .row:after {
  content: "";
  display: table;
  clear: both;
}
    </style>
  </head>
  <body data-spy="scroll" data-target=".fixed-top">
    <div class="spinner-wrapper">
      <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
      </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top" style="background-color: #5f4def;">
      <div class="container">
        <a class="navbar-brand logo-image" href="index.html"
          style="text-decoration: none;"><h1 style="color: white;">Pustaka</h1></a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarsExampleDefault"
          aria-controls="navbarsExampleDefault"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-awesome fas fa-bars"></span>
          <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link page-scroll" href="index.html"
                >HOME <span class="sr-only">(current)</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="jelajah.php">JELAJAHI BUKU </a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="berbagi.php">BERBAGI BUKU </a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="admin.php">ADMIN </a>
            </li>
        </div>
      </div>
    </nav>

    <div style="box-sizing: border-box;">
        <div style="background-color: white; height: 450px; border: 10px solid #5f4def; border-radius: 50px; margin-top: 15%; width: 75%; margin-right: auto; margin-left: auto; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="row">
                <div class="column" style=" float: left; width: 50%; padding: auto; height: 430px;">
                    <img src="images/<?php echo $data['gambar']; ?>" alt="" style="height: 100%; margin-left: 20%;">
                </div>
                <div class="column" style=" float: left; width: 50%; height: 430px; padding: 5% 5% 5% 0%;">
                    <h1><?php echo $data['judul']; ?></h1>
                    <ul style="list-style-type: none; margin-left: -35px;">
                        <li style="float: left; ">Penulis : <?php echo $data['penulis']; ?></li>
                        <li style="float: left; margin-left: 20px;">Jenis : <?php echo $data['jenis']; ?></li>
                    </ul>  
                    <br>
                    <p style="font-size: 12px; line-height: normal; text-align: justify; margin-top: 25px; "><?php custom_echo($data['sinopsis'], 1000); ?></p>
                </div>
            </div>

        </div>
    </div>
    <center>
    <button class="btn btn-primary" style="background-color: #5f4def; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-top: 5%;"><a href="unduh.php?id=<?php echo $data['id'] ?>" class="fa fa-download" style="color:white; text-decoration: none;">Unduh Buku</a></button>
    </center>
    

    <svg
    style="margin-top: 10%;"
      class="footer-frame"
      data-name="Layer 2"
      xmlns="http://www.w3.org/2000/svg"
      preserveAspectRatio="none"
      viewBox="0 0 1920 79"
    >
      <defs>
        <style>
          .cls-2 {
            fill: #5f4def;
          }
        </style>
      </defs>
      <title>footer-frame</title>
      <path
        class="cls-2"
        d="M0,72.427C143,12.138,255.5,4.577,328.644,7.943c147.721,6.8,183.881,60.242,320.83,53.737,143-6.793,167.826-68.128,293-60.9,109.095,6.3,115.68,54.364,225.251,57.319,113.58,3.064,138.8-47.711,251.189-41.8,104.012,5.474,109.713,50.4,197.369,46.572,89.549-3.91,124.375-52.563,227.622-50.155A338.646,338.646,0,0,1,1920,23.467V79.75H0V72.427Z"
        transform="translate(0 -0.188)"
      />
    </svg>
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="footer-col first">
              <h4>Tentang Pustaka</h4>
              <p class="p-small">
                Pustaka adalah layanan berbagi buku antar pengguna secara gratis 
              </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="footer-col last">
              <h4>Kontak Kami</h4>
              <ul class="list-unstyled li-space-lg p-small">
                <li class="media">
                  <i class="fas fa-map-marker-alt"></i>
                  <div class="media-body">
                    Purwoketo, Jawa Tengah, Indonesia
                  </div>
                </li>
                <li class="media">
                  <i class="fas fa-envelope"></i>
                  <div class="media-body">
                    <a class="white" href="mailto:contact@tivo.com"
                      >contact@pustaka.com</a
                    ><br>
                    <i class="fas fa-globe" style="margin-left: -24px;"></i
                    ><a class="white" href="#your-link">www.pustaka.com</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/swiper.min.js"></script>
    <script src="js/jquery.magnific-popup.js"></script>
    <script src="js/validator.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>
