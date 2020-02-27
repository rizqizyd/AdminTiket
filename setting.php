<?php
  include 'includes/user_token.php';
  include 'includes/myfirebase.php';

  // data admin
  $reference = 'Admin/'.$_SESSION['username'];
  $checkdata = $database->getReference($reference)->getValue();

  // cetak data admin
  $nama_admin_f = $checkdata['nama_admin'];
?>
<html>
    <head>
        <title>Account Settings - TiketWisata</title>
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
            <div class="item-menu inactive">
              <a href="wisata.php"><p class="icon-item-menu"><i class="fas fa-globe"></i></p></a>
            </div>
            <div class="item-menu inactive">
              <a href="customer.php"><p class="icon-item-menu"><i class="fas fa-users"></i></p></a>
            </div>
            <div class="item-menu">
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
            <a href="wisata.php"><li>Manage Wisata</li></a>
            <a href="customer.php"><li>Customer <span class="badge-tiketwisata badge badge-pill badge-primary">78</span></li class="active-link"></a>
            <a href="setting.php"><li class="active-link">Account Settings</li class="active-link"></a>
            <a href="#"><li style="padding-top: 80px;">Logout</li></a>
          </ul>
        </div>
      </div>

      <div class="main-content-user-details main-content">
        <div class="header row">
          <div class="col-md-12">
            <p class="header-title">Settings</p>
            <p class="subheader-title">Ensure your account is healthy to used</p>
          </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="row report-group">
                    <div class="col-md-12">
                      
                      <div class="item-big-report col-md-12">
                          
                          <div class="row">
                              <div class="col-4">
                                  <div class="wrap-user-picture-circle">
                                      <img class="primary-user-picture-circle" src="images/user_2.png" alt="">
                                  </div>
                              </div>
                          </div>
          
                          <div class="form-new-user row">
                              <div class="col-md-8">
                                  <form method="POST" action="includes/data_model.php">
                                      <div class="form-group content-sign-in">
                                        <label class="title-input-primary-tiketwisata" for="exampleInputEmail1">Nama Admin</label>
                                        <input name="nama_admin" value="<?php echo $checkdata['nama_admin']?>" type="text" class="form-control input-type-primary-tiketwisata" id="exampleInputEmail1" aria-describedby="emailHelp">
                                      </div>
                                      <div class="form-group content-sign-in">
                                        <label class="title-input-primary-tiketwisata" for="exampleInputEmail1">Username</label>
                                        <input disabled value="<?php echo $checkdata['username']?>" type="text" class="form-control input-type-primary-tiketwisata" id="exampleInputEmail1" aria-describedby="emailHelp">
                                      </div>
                                      <div class="form-group">
                                        <label class="title-input-primary-tiketwisata" for="exampleInputPassword1">Alamat Email</label>
                                        <input name="email_admin" value="<?php echo $checkdata['email_admin']?>" type="email" class="form-control input-type-primary-tiketwisata" id="exampleInputPassword1">
                                      </div>
                                      <div class="form-group">
                                        <label class="title-input-primary-tiketwisata" for="exampleInputPassword1">Kata Sandi</label>
                                        <input name="password" value="<?php echo $checkdata['password']?>" type="text" class="form-control input-type-primary-tiketwisata" id="exampleInputPassword1">
                                      </div>
                                      <div style="visibility: hidden; margin-bottom: -70px;" class="form-group content-sign-in">
                                          <input id="image_file" type="file">
                                      </div>
                                      <input type="hidden" name="username_admin_url" value="<?php echo $checkdata['username']?>">
                                      <button name="updateAdmin" type="submit" class="btn btn-primary btn-primary-tiketwisata">Save Now</button>
                                      <a href="customer.php" style="margin-left: 10px;" class="btn btn-cancel-secondary">Cancel</a>
                                    </form>
                              </div>
                          </div>
                          
          
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-md-4">
                <div class="item-danger-zone">
                    <p class="title">Danger Zone</p>
                    <p class="desc">U R able to delete the user and once you deleted it - it's gone</p>
                    <a href="delete_admin.php?username_url=<?php echo $checkdata['username'] ?>" class="btn-delete btn btn-primary">Delete User</a>
                </div>
            </div>
        </div>
      </div>
      <!-- </div> -->
        
      <script type="text/javascript" src="js/bootstrap.js"></script>
      <script type="text/javascript" src="js/main.js"></script>
    </body>

</html>