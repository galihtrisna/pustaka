<?php
  
include 'koneksi.php';

session_start();

if (!isset($_SESSION["username"])) {
	echo "<script>alert('Anda belum login');window.location='login.php';</script>";
	exit;
}

  
  if (isset($_GET['id'])) {
    
    $id_buku = ($_GET["id"]);

    
    $query = "SELECT * FROM data_buku
        where id like '%".$id_buku."%';";
    $result = mysqli_query($conn, $query);
    
    if(!$result){
      die ("Query Error: ".mysqli_errno($conn).
         " - ".mysqli_error($conn));
    }
    
    $data = mysqli_fetch_assoc($result);
      
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='admin.php';</script>";
       }
  } else {
    echo "<script>alert('Masukkan data id.');window.location='admin.php';</script>";
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
      * {
        font-family: "balsamiq sans";
      }
    button {
          background-color: white;
          color: #5f4def;
          padding: 10px;
          text-decoration: none;
          font-size: 15px;
          border: 0px;
          margin-top: 20px;
          border-radius: 10px;
    }
    label {
      margin-top: 10px;
      float: left;
      color: white;
      text-align: left;
      width: 100%;
    }
    input ,textarea {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: red;
      border-radius: 10px;
    }
    select {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: yellow;
      border-radius: 10px;
    }
    .base {
      width: 50%;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #5f4def;
      border-radius: 15px;
    }
    #lihat {
      font-size: 10px;
    }
    .id_buku{
      padding: 6px;
      width: 10%;
      color: #00000000;
      box-sizing: border-box;
      background: #00000000;
      border: 2px solid #00000000;
      outline-color: #00000000;
      border-radius: 10px;
      pointer-events: none;
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
    
      <form method="POST" action="simpan_ubah.php" enctype="multipart/form-data" >
      <div class="base" style="margin-top: 20%;">
          <label>Judul Buku</label>
          <input type="text" name="judul" autofocus="" required="" value="<?php echo $data['judul']; ?>"/>
          <label>Penulis</label>
         <input type="text" name="penulis" required="" value="<?php echo $data['penulis']; ?>"/>
          <label>Jenis Buku</label>
         <select name="jenis" required="">
             <option value="<?php echo $data['jenis']; ?>"><?php echo $data['jenis']; ?></option>
             <option value="Komik">Komik</option>
             <option value="Novel">Novel</option>
             <option value="Buku Cerita">Buku Cerita</option>
             <option value="Buku Pelajaran">Buku Pelajaran</option>
             <option value="Sejarah">Sejarah</option>
             <option value="Agama">Agama</option>
             <option value="Biografi">Biografi</option>
            </select>
          <label>Gambar Buku</label>
          <img src="images/<?php echo $data['gambar']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
         <input type="file" name="gambar"/>
         <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak perlu</i>
         <label>File Buku</label>
         <input type="file" name="file"/>
         <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak perlu</i>
         <label>Sinopsis</label>
         <textarea
        id="comment"
        name="sinopsis"
        placeholder="Ketik sinopsis buku di sini..."
        style="height: 150px;"
        required=""
      ><?php echo $data['sinopsis']; ?></textarea>
         <center><button type="submit">Simpan Buku</button></center>
        </div>
        <input type="text" name="id" class="id_buku" required="" value="<?php echo $data['id']; ?>"/>
      </form>

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
