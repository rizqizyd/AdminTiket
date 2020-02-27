<?php
  include 'includes/user_token.php';
  include 'includes/myfirebase.php';

  // data admin
  $reference = 'Admin/'.$_SESSION['username'];
  $checkdata = $database->getReference($reference)->getValue();

  // data turis
  $path_turis_fb = 'Users';
  $checkdata_turis = $database->getReference($path_turis_fb)->getValue();

  // data sales
  $path_sales_fb = 'Tickets';
  $checkdata_sales = $database->getReference($path_sales_fb)->getValue();

  // data wisata
  $path_wisata_fb = 'Wisata';
  $checkdata_wisata = $database->getReference($path_wisata_fb)->getValue();

  // cetak data admin
  $nama_admin_f = $checkdata['nama_admin'];
?>
<html>
    <head>
        <title>Dashboard - TiketWisata</title>
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
            <div class="item-menu">
              <a href="dashboard.php"><p class="icon-item-menu"><i class="fab fa-delicious"></i></p></a>
            </div>
            <div class="item-menu inactive">
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
            <a href="dashboard.php"><li class="active-link">My Dashboard</li></a>
            <a href="sales.php"><li>Ticket Sales</li></a>
            <a href="wisata.php"><li>Manage Wisata</li></a>
            <a href="customer.php"><li>Customer <span class="badge-tiketwisata badge badge-pill badge-primary">78</span></li></a>
            <a href="setting.php"><li>Account Settings</li></a>
            <a href="includes/user_destroy.php"><li style="padding-top: 80px;">Logout</li></a>
          </ul>
        </div>
      </div>

      <div class="main-content">
        <div class="header row">
          <div class="col-md-12">
            <p class="header-title">My Dashboard</p>
            <p class="subheader-title">Latest report uploaded this week and on</p>
          </div>
        </div>
        <div class="row report-group">
            <div class="col-md-4">
              <div class="item-report col-md-12">
                <div class="row">
                  <div class="content col-md-12">
                    <img height="50" src="images/icon_total_pengguna.png" alt="">
                    <p class="title-item">TOURIST</p>
                    <p class="subtitle-item">USERS LIFETIME</p>
                    <p class="value-item"><?php echo count($checkdata_turis);?></p>
                    <p class="desc-item">around the earth</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="item-report col-md-12">
                <div class="row">
                  <div class="content col-md-12">
                    <img height="50" src="images/icon_total_sales.png" alt="">
                    <p class="title-item">SALES</p>
                    <p class="subtitle-item">TICKETS BEING SOLD</p>
                    <p class="value-item"><?php echo count($checkdata_sales);?></p>
                    <p class="desc-item">around the world</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="item-report col-md-12">
                <div class="row">
                  <div class="content col-md-12">
                    <img height="50" src="images/icon_total_wisata.png" alt="">
                    <p class="title-item">WISATA</p>
                    <p class="subtitle-item">PLACE THAT AVAILABLE</p>
                    <p class="value-item"><?php echo count($checkdata_wisata);?></p>
                    <p class="desc-item">around the earth</p>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="row report-group">
          <div class="col-md-6">
            
            <div class="item-big-report col-md-12">
              <p class="title"><span class="title-blue">NEWEST</span> USERS</p>
              <p class="subtitle">USER THAT SIGN UP NOWDAYS</p>
              <a href="#" class="btn btn-small btn-primary btn-primary-tiketwisata">See More</a>
              
              <div class="divider-line"></div>

              <?php
                foreach($checkdata_turis as $data_turis){

                
              ?>

              <div class="user-item">
                <div class="user-picture">
                  <img src="images/admin_picture2.png" alt="">
                </div>
                <div class="user-info">
                  <p class="title"><?php echo $data_turis['nama_lengkap'];?></p>
                  <p class="subtitle"><?php echo $data_turis['bio'];?></p>
                  <a href="#" style="margin-left: 222px;" class="btn btn-view btn-primary btn-small-border ">View Profile</a>
                </div>
              </div>

                <?php } ?>

            </div>
          </div>

          <div class="col-md-6">
            
            <div class="item-big-report col-md-12">
              <p class="title"><span class="title-blue">TICKETS</span> SOLD</p>
              <p class="subtitle">USERS JUST BOUGHT TICKET</p>
              <a href="#" class="btn btn-small btn-primary btn-primary-tiketwisata">See More</a>
              
              <div class="divider-line"></div>

              <?php

                foreach($checkdata_sales as $data_sales => $data_print_sales){
                  $path_data_based_on_username = 'Users/'.$data_print_sales['username'];
                  $print_data_user_profile = $database->getReference($path_data_based_on_username)->getValue();

                  foreach($print_data_user_profile as $profile => $value_profile)
                  {}

              ?>

              <div class="user-item">
                <div class="user-picture">
                  <img src="images/user_2.png" alt="">
                </div>
                <div class="user-info">
                  <p class="title"><?php echo $print_data_user_profile['nama_lengkap']?></p>
                  <p class="subtitle"><?php echo $print_data_user_profile['bio']?></p>
                  <a href="#" style="margin-left: 222px;" class="btn btn-primary btn-small-border ">View Profile</a>
                </div>
              </div>

                <?php } ?>

            </div>
          </div>
        </div>
      </div>
      <!-- </div> -->
        
      <script type="text/javascript" src="js/bootstrap.js"></script>
      <script type="text/javascript" src="js/main.js"></script>
    </body>

</html>