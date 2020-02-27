<?php
  include 'includes/user_token.php';
  include 'includes/myfirebase.php';

  // ambil username dari url
  $username_url = $_GET['username'];

  // data admin
  $reference = 'Admin/'.$_SESSION['username'];
  $checkdata = $database->getReference($reference)->getValue();

  // data turis
  $path_user_details = 'Users/'.$username_url;
  $checkdata_user_details = $database->getReference($path_user_details)->getValue();

  // data wisata user
  $path_wisata_user_fb = 'Tickets/'.$username_url.'/wisata';
  $checkdata_wisata = $database->getReference($path_wisata_user_fb)->getValue();

  // data sales
  $path_sales_fb = 'Tickets';
  $checkdata_sales = $database->getReference($path_sales_fb)->getValue();

  // cetak data admin
  $nama_admin_f = $checkdata['nama_admin'];
?>
<html>
    <head>
        <title>Sales - TiketWisata</title>
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
            <div class="item-menu">
              <a href="sales.php"><p class="icon-item-menu"><i class="fas fa-ticket-alt"></i></p></a>
            </div>
            <div class="item-menu inactive">
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
            <img src="images/user_2.png" alt="">
          </div>
          <p class="admin-name"><?php echo $nama_admin_f?></p>
          <p class="admin-level">Super Admin</p>
          <ul class="admin-menus">
            <a href="dashboard.php"><li>My Dashboard</li></a>
            <a href="sales.php"><li class="active-link">Ticket Sales</li></a>
            <a href="wisata.php"><li>Manage Wisata</li></a>
            <a href="customer.php"><li>Customer <span class="badge-tiketwisata badge badge-pill badge-primary">78</span></li></a>
            <a href="setting.php"><li>Account Settings</li></a>
            <a href="#"><li style="padding-top: 80px;">Logout</li></a>
          </ul>
        </div>
      </div>

      <div class="main-content">
        <div class="header row">
          <div class="col-md-12">
            <p class="header-title">Details</p>
            <nav aria-label="sitemap-tw breadcrumb">
                <ol class="breadcrumb" style="margin-left: -15px; background: none;">
                  <li class="breadcrumb-item"><a style="color: #C7C7C7;" href="sales.php">Sales</a></li>
                  <li style="color: #203DD1;" class="breadcrumb-item active" aria-current="page"><?php echo $checkdata_user_details['nama_lengkap']?></li>
                </ol>
            </nav>
          </div>
        </div>
        <div class="row report-group">
          <div class="col-md-12">
            
            <div class="item-big-report col-md-12">
                
                <div class="row">
                    <div class="col-4">
                        <div class="wrap-user-picture-circle">
                            <img class="primary-user-picture-circle" src="images/user_3.png" alt="">
                        </div>
                        <div class="user-info">
                            <p class="title"><?php echo $checkdata_user_details['nama_lengkap']?></p>
                            <p class="subtitle"><?php echo $checkdata_user_details['bio']?></p>
                          </div>
                    </div>
                    <div class="col-4">
                        <p class="total_balance">Total Balance <span class="value-balance"> US$ <?php echo $checkdata_user_details['user_balance']?></span></p>
                    </div>
                </div>

                <div class="row user-wisata-place">
                    <div class="col-md-12">
                        <p class="title"><?php echo $checkdata_user_details['nama_lengkap']?>'s Wisata</p>
                    </div>

                    <?php
                      foreach($checkdata_wisata as $wisata => $value_wisata){
                        
                        // data wisata user
                        $path_wisata_details = 'Wisata/'.$value_wisata['nama_wisata'];
                        $checkdata_wisata_details = $database->getReference($path_wisata_details)->getValue();

                        foreach($checkdata_wisata_details as $wisata_details => $value_wisata_details)
                        {}
                    ?>

                    <div class="item-wisata-place col-md-4">
                        <img src="images/monas.png" alt="">
                        <p class="title-info-wisata-place"><?php echo $checkdata_wisata_details['nama_wisata']?></p>
                        <p class="subtitle-info-wisata-place"><?php echo $checkdata_wisata_details['lokasi']?></p>
                    </div>

                    <?php } ?>

                </div>
                

            </div>
          </div>
        </div>
      </div>
      <!-- </div> -->
        
      <script type="text/javascript" src="js/bootstrap.js"></script>
      <script type="text/javascript" src="js/main.js"></script>
    </body>

</html>