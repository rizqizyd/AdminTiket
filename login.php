<html>
    <head>
        <title>Sign In Admin Tiket</title>
        <meta charset="UTF-8">
        <meta name="description" content="Login Tiket Admin">
        <meta name="keywords" content="Tiket, Web Dashboard, Login Tiket">
        <meta name="author" content="Team">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="https://use.fontawesome.com/33d05bf7fb.js"></script>
    </head>
    <body>
        <div class="container">
          <div class="row header-sign-in">
            <div class="col-md-12">
              <img class="logo-header" height="80" src="images/applogocolored.png" alt="">
            </div>
          </div>
          <div class="row form-sign-in">
            <div class="col-md-10 offset-md-1">
              <div class="row">
                <div class="col-md-6 d-none d-sm-block">
                  <img class="icon-header" height="276" src="images/illustration_login.png" alt="">
                </div>
                <div class="col-md-4">
                  <p class="title-form">Sign In</p>
                  <p class="subtitle-form">Let's make a report today</p>
                  <form method="POST" action="includes/data_model.php">
                    <div class="form-group content-sign-in">
                      <label class="title-input-primary-tiketwisata" for="exampleInputEmail1">Username</label>
                      <input type="text" name="username" class="form-control input-type-primary-tiketwisata" id="exampleInputEmail1" aria-describedby="emailHelp">
                      </div>
                    <div class="form-group">
                      <label class="title-input-primary-tiketwisata" for="exampleInputPassword1">Password</label>
                      <input type="password" name="password" class="form-control input-type-primary-tiketwisata" id="exampleInputPassword1">
                    </div>
                    <button type="submit" name="signin" class="btn btn-primary btn-primary-tiketwisata">Sign In</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>