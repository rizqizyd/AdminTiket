<?php
  include 'includes/user_token.php';
  include 'includes/myfirebase.php';

  // ambil username dari url
  $nama_wisata_url = $_GET['nama_wisata'];

  // data admin
  $reference = 'Admin/'.$_SESSION['username'];
  $checkdata = $database->getReference($reference)->getValue();

  // data detail wisata
  $path_wisata_details = 'Wisata/'.$nama_wisata_url;
  $checkdata_wisata_details  = $database->getReference($path_wisata_details)->getValue();

  // cetak data admin
  $nama_admin_f = $checkdata['nama_admin'];
?>
<html>
    <head>
        <title>Manage Wisata Details - TiketWisata</title>
        <meta charset="UTF-8">
        <meta name="description" content="Login Tiket Admin">
        <meta name="keywords" content="Tiket, Web Dashboard, Login Tiket">
        <meta name="author" content="Team">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
        <body>

      <div class="side-left">
        <div class="shortcut" onmouseover="showAdminProfile()">
          <div class="emblemapp">
            <img src="images/emblem_app.png" height="23" alt="">
          </div>
          <div class="menus">
            <div class="item-menu inactive">
              <a href="dashboard.php"><p class="icon-item-menu"><i class="fab fa-delicious"></i></p></a>
            </div>
            <div class="item-menu inactive">
              <a href="sales.php"><p class="icon-item-menu"><i class="fas fa-ticket-alt"></i></p></a>
            </div>
            <div class="item-menu">
              <a href="wisata.php"><p class="icon-item-menu"><i class="fas fa-globe"></i></p></a>
            </div>
            <div class="item-menu inactive">
              <a href="customer.php"><p class="icon-item-menu"><i class="fas fa-users"></i></p></a>
            </div>
            <div class="item-menu inactive">
              <a href="setting.php"><p class="icon-item-menu"><i class="fas fa-cog"></i></p></a>
            </div>
            <div class="item-menu inactive">
              <a href="#"><p class="icon-item-menu"><i class="fas fa-power-off"></i></p></a>
            </div>
          </div>
        </div>
        <div class="admin-profile" id="sl_ap" onmouseover="showAdminProfile()" onmouseout="hideAdminProfile()">
          <div class="admin-picture">
            <img src="images/admin_picture.png" alt="">
          </div>
          <p class="admin-name"><?php echo $nama_admin_f?></p>
          <p class="admin-level">Super Admin</p>
          <ul class="admin-menus">
            <a href="dashboard.php"><li>My Dashboard</li></a>
            <a href="sales.php"><li>Ticket Sales</li></a>
            <a href="wisata.php"><li class="active-link">Manage Wisata</li class="active-link"></a>
            <a href="customer.php"><li>Customer <span class="badge-tiketwisata badge badge-pill badge-primary">78</span></li></a>
            <a href="setting.php"><li>Account Settings</li></a>
            <a href="#"><li style="padding-top: 80px;">Logout</li></a>
          </ul>
        </div>
      </div>

      <div class="main-content">
        <div class="header row">
          <div class="col-md-12">
            <p class="header-title"><?php echo $checkdata_wisata_details['nama_wisata']?></p>
            <nav aria-label="sitemap-tw breadcrumb">
                <ol class="breadcrumb" style="margin-left: -15px; background: none;">
                  <li class="breadcrumb-item"><a style="color: #C7C7C7;" href="wisata.php">Wisata</a></li>
                  <li style="color: #203DD1;" class="breadcrumb-item active" aria-current="page">Details Wisata</li>
                </ol>
            </nav>
        </div>
        </div>
        <div class="row report-group">
          <div class="col-md-12">
            <div class="item-big-report col-md-12">

                <div class="row">
                    <div class="overlay-box col-md-4">
                        <a href="#" id="open_file" class="btn btn-primary btn-third-tiketwisata">Replace</a>
                            
                    </div>
                    <div style="padding-left: 30px; margin-right: 50px;" class="thumbnail-box col-md-4">
                        <p class="label-thumbnail">Thumbnail Wisata</p>
                        <img class="thumbnail-wisata" src="images/monas.png" alt="">
                    </div>
    
                    <div class="col-md-5">
                        <form method="POST" action="includes/data_model.php">
                            <div class="form-group content-sign-in">
                              <label class="title-input-primary-tiketwisata" for="exampleInputEmail1">Nama Wisata</label>
                              <input disabled name="nama_wsata" value="<?php echo $checkdata_wisata_details['nama_wisata']?>" type="text" class="form-control input-type-primary-tiketwisata" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                              <label class="title-input-primary-tiketwisata" for="exampleInputPassword1">Lokasi Wisata</label>
                              <input name="lokasi" value="<?php echo $checkdata_wisata_details['lokasi']?>" type="text" class="form-control input-type-primary-tiketwisata" id="exampleInputPassword1">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="title-input-primary-tiketwisata" for="exampleInputPassword1">Harga Tiket (US$)</label>
                                        <input name="harga_tiket" value="<?php echo $checkdata_wisata_details['harga_tiket']?>" type="number" class="form-control input-type-primary-tiketwisata" id="exampleInputPassword1">  
                                    </div>
                                    <div class="col-md-6">
                                        <label class="title-input-primary-tiketwisata" for="exampleInputPassword1">Tanggal Wisata</label>
                                        <input name="date_wisata" value="<?php echo $checkdata_wisata_details['date_wisata']?>" type="text" class="form-control input-type-primary-tiketwisata" id="exampleInputPassword1">  
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" style="margin-top: -16px;">
                                <label class="title-input-primary-tiketwisata" for="exampleFormControlTextarea1">Ketentuan</label>
                                <textarea name="ketentuan" class="input-type-primary-tiketwisata form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $checkdata_wisata_details['ketentuan']?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="title-input-primary-tiketwisata" for="exampleFormControlTextarea1">Deskripsi Wisata</label>
                                <textarea name="short_desc" class="input-type-primary-tiketwisata form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $checkdata_wisata_details['short_desc']?></textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="title-input-primary-tiketwisata" for="exampleInputPassword1">has Wifi?</label>
                                        <input name="is_wifi" value="<?php echo $checkdata_wisata_details['is_wifi']?>" type="text" class="form-control input-type-primary-tiketwisata" id="exampleInputPassword1">  
                                    </div>
                                    <div class="col-md-4">
                                        <label class="title-input-primary-tiketwisata" for="exampleInputPassword1">has Spot?</label>
                                        <input name="is_photo_spot" value="<?php echo $checkdata_wisata_details['is_photo_spot']?>" type="text" class="form-control input-type-primary-tiketwisata" id="exampleInputPassword1">  
                                    </div>
                                    <div class="col-md-4">
                                        <label class="title-input-primary-tiketwisata" for="exampleInputPassword1">has Event?</label>
                                        <input name="is_festival" value="<?php echo $checkdata_wisata_details['is_festival']?>" type="text" class="form-control input-type-primary-tiketwisata" id="exampleInputPassword1">  
                                    </div>
                                </div>
                            </div>
                            <div style="visibility: hidden; margin-bottom: -70px;" class="form-group content-sign-in">
                                <input id="image_file" type="file">
                            </div>
                            <input type="hidden" name="nama_wisata_url" value="<?php echo $nama_wisata_url?>">
                            <button name="updateWisata" type="submit" class="btn btn-primary btn-primary-tiketwisata">Update</button>
                            <button style="margin-left: 10px;" type="reset" class="btn btn-primary btn-secondary-tiketwisata">Cancel</button>
                          </form>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      <!-- </div> -->

      <script
  src="http://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
        
      <script type="text/javascript" src="js/bootstrap.js"></script>
      <script type="text/javascript" src="js/main.js"></script>
    </body>

</html>