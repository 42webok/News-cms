<?php
include "config.php";
session_start();
if (isset($_SESSION['username'])) {
    header("location: post.php");
}
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN | Login</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div id="wrapper-admin" class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-md-4">
                    <img class="logo" src="../images/news.jpg">
                    <h3 class="heading">Admin</h3>
                    <!-- Form Start -->
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="" required>
                        </div>
                        <input type="submit" name="login" class="btn btn-primary" value="login" />
                    </form>
                    <!-- /Form  End -->
                </div>
            </div>
        </div>
    </div>

    <!-- Alert code here -->
    <div class="alert alert-danger alert-dismissible text-center" id="myAlert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        Wrong Details !🙄
    </div>



</body>
<script>
    function wrongPassword() {
        // Select the alert by ID
        var alert = document.getElementById('myAlert');
        alert.style.display = "block";

        // Set a timeout to hide the alert after 5 seconds (5000 ms)
        setTimeout(function() {
            alert.style.display = 'none';
        }, 3000);
    }
</script>

</html>
<?php 
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
     $row = mysqli_fetch_assoc($result);
    
     $_SESSION['username'] = $row['username'];
     
     $_SESSION['role'] = $row['role'];
     $_SESSION['user_id'] = $row['user_id'];
     header("location: post.php");
    }
    else{
      echo "<script>wrongPassword();</script>";
    }
}


?>
