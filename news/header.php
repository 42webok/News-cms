<?php 
include("admin/config.php");

$base = basename($_SERVER['PHP_SELF']);
switch ($base) {
    case 'single.php':
        if(isset($_GET['id'])){
            $query = "SELECT * FROM post WHERE post_id = '".$_GET['id']."'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $title = $row['title'];
        }else{
            $title = "Post Not Found !";
        }
        break;
    case 'search.php':
        if(isset($_GET['search'])){
            $title = $_GET['search'];
        }else{
            $title = "Post Not Found !";
        }
        break;
    case 'category.php':
        if(isset($_GET['cid'])){
            $query = "SELECT * FROM category WHERE category_id = '".$_GET['cid']."'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $title = $row['category_name'] . " News";
        }else{
            $title = "Post Not Found !";
        }
        break;
    case 'author.php':
        if(isset($_GET['aid'])){
            $query = "SELECT * FROM user WHERE user_id = '".$_GET['aid']."'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $title = "Post By ".$row['first_name'] . " " . $row['last_name'];
        }else{
            $title = "Post Not Found !";
        }
        break;
    
    default:
          $title = "News Site";
        break;
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title; ?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
                <a href="index.php" id="logo"><img src="images/ntsLogo.png"></a>
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class='menu'>
                    <li><a href='index.php'>Home</a></li>
                    <?php 
                      include("admin/config.php");
                      if(isset($_GET['cid'])){
                          $cid = $_GET['cid'];
                      }
                      $sql = "SELECT * FROM category WHERE post > 0";
                      $result = mysqli_query($conn, $sql);
                      while($row = mysqli_fetch_assoc($result)) {
                        if(isset($_GET['cid'])){
                            if($row['category_id'] == $cid){
                                $active = "active";
                            }else{
                                $active = "";
                            }
                        }
                    ?>
                    <li><a class="<?php echo $active?>" href='category.php?cid=<?php echo $row['category_id'];?>'><?php echo $row['category_name']; ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->

