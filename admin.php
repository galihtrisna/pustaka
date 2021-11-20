<?php
  include('koneksi.php'); 
  session_start();

if (!isset($_SESSION["username"])) {
	echo "<script>alert('Anda belum login');window.location='login.php';</script>";
	exit;
}

$id_user=$_SESSION["id"];
$username=$_SESSION["username"];
  
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
        #a {
          background-color: #9400D3;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
    }
    table {
      border: solid 1px #DDEEEE;
      border-collapse: collapse;
      border-spacing: 0;
      width: 70%;
      margin: 0px auto 10px auto;
    }
    table thead th {
        background-color: #DDEFEF;
        border: solid 1px #DDEEEE;
        color: #336B6B;
        padding: 10px;
        text-align: center;
        text-shadow: 1px 1px 1px #fff;
        text-decoration: none;
    }
    table tbody td {
        border: solid 1px #DDEEEE;
        color: #333;
        padding: 10px;
        text-align: center;
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

    <center><a class="btn-solid-lg page-scroll"  style="margin-top: 15%;"href="logout.php">Logout  </a></center>
    <center><form action="admin.php" method="get" style="margin-top: 3%; max-width: 50%;">
                <input sty id="form1" class="form-control" type="search" name="cari" placeholder="Cari buku.." value="">
              </form>
            </center>
      </form>
    <br/>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Judul Buku</th>
          <th>Penulis</th>
          <th>Jenis Buku</th>
          <th>Gambar Buku</th>
          <th>tindakan</th>
        </tr>
    </thead>      
      <tbody>
      <?php

      if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
        $query = "SELECT * FROM data_buku
        where judul like '%".$cari."%';";	
        $result = mysqli_query($conn, $query);		
      }else{
        $query = "SELECT * FROM data_buku;";
        $result = mysqli_query($conn, $query);
        
        if(!$result){
         die ("Query Error: ".mysqli_errno($conn).
             " - ".mysqli_error($conn));
        }	
      }

      
      $no = 1; 
      
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

      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['judul']; ?></td>
          <td><?php echo $row['penulis']; ?></td>
          <td><?php echo $row['jenis']; ?></td>
          <td style="text-align: center;"><img src="images/<?php echo $row['gambar']; ?>" style="width: 120px;"></td>
          <td style="width: 200px;">
              <a id="a" href="ubah.php?id=<?php echo $row['id']; ?>">Ubah</a> |
              <a id="a" href="hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
        $no++;
      }
      ?></tbody></table>

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
