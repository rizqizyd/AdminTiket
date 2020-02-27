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
        <title>Wisata - TiketWisata</title>
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
            <img src="images/user_2.png" alt="">
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
            <p class="header-title">Manage Wisata</p>
            <p class="subheader-title">The place where the products were born</p>
          </div>
        </div>
        <div class="row report-group">
          <div class="col-md-12">
            
            <div class="item-big-report col-md-12">
                <table class="table-wisata table-tiketwisata table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Nama Wisata</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Harga Tiket</th>
                        <th scope="col">Menu</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                      foreach($checkdata_wisata as $wisata => $value_wisata)
                      {
                    ?>

                      <tr>
                        <td><?php echo $value_wisata['nama_wisata']?></td>
                        <td><?php echo $value_wisata['lokasi']?></td>
                        <td><?php echo $value_wisata['date_wisata']?></td>
                        <td><?php echo $value_wisata['harga_tiket']?></td>
                        <td>
                            <a href="manage_wisata.php?nama_wisata=<?php echo $value_wisata['nama_wisata'] ?>" class="btn btn-small-table btn-primary">Details</a>
                        </td>
                      </tr>

                      <?php } ?>

                    </tbody>
                  </table>
            </div>
          </div>
        </div>
      </div>
      <!-- </div> -->
        
      <script type="text/javascript" src="js/bootstrap.js"></script>
      <script type="text/javascript" src="js/main.js"></script>
    </body>

</html>