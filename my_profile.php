<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
          crossorigin="anonymous">
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/home.css">
    <script src="js/my_profile.js"></script>
    <script src="js/validateForm.js"></script>
    <script src="js/restrict.js"></script>
</head>
<body>
<!-- including side navigations -->
<?php include("sections/sidenav.html"); ?>
<div class="container-fluid">
    <div class="container">
        <!-- header section -->
        <?php
        require "php/header.php";
        createHeader('user', 'Profile', 'Manage Admin Details');
        // header section end
        require "php/db_connection.php";
        if ($con) {
          $query = "SELECT * FROM admin_credentials";
          $result = mysqli_query($con, $query);
      
          if ($result && mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);
              // access values from $row
              
              $username = $row['USERNAME'];
          } else {
              // Handle the case where no rows are returned
              echo "No rows found in the result set.";
          }
      }
        ?>
        <div class="row">
            <div class="col-md-6">

                
                <div class="col-md-12 form-group">
                    <label class="font-weight-bold" for="username">Username :</label>
                    <input id="username" type="text" class="form-control" value="<?php echo $username; ?>"
                           placeholder="Username" onkeyup="notNull(this.value, 'username_error');" disabled>
                    <code class="text-danger small font-weight-bold float-right mb-2" id="username_error"
                          style="display: none;"></code>
                </div>

                <!-- horizontal line -->
                <hr class="col-md-12 float-left" style="padding: 0px; width: 95%; border-top: 2px solid #02b6ff;">

                <!-- form submit button -->
                <div class="col-md-12 m-auto" id="edit">
                    <div class="col-md-2 form-group float-right"></div>
                    <div id="edit_button" class="col-md-4 form-group float-right">
                        <button class="btn btn-primary form-control font-weight-bold" onclick="edit();">EDIT</button>
                    </div>
                    <div id="password_button" class="col-md-4 form-group float-right">
                        <a href="change_password.php"
                           class="btn btn-warning form-control font-weight-bold">Change Password</a>
                    </div>
                </div>

                <div class="col-md-12 m-auto" id="update_cancel" style="display: none;">
                    <div class="col-md-2 form-group float-right"></div>
                    <div id="cancel_button" class="col-md-4 form-group float-right">
                        <button class="btn btn-danger form-control font-weight-bold" onclick="edit(true);">CANCEL
                        </button>
                    </div>
                    <div id="update_button" class="col-md-4 form-group float-right">
                        <button class="btn btn-success form-control font-weight-bold"
                                onclick="updateAdminDetails();">UPDATE
                        </button>
                    </div>
                </div>
                <!-- result message -->
                <div id="admin_acknowledgement" class="col-md-12 h5 text-success font-weight-bold text-center"
                     style="font-family: sans-serif;"></div>
            </div>
        </div>
        <hr style="border-top: 2px solid #ff5252;">
    </div>
</div>
</body>
</html>
