<?php 
include("config.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $cat_id = $_GET['cat_id'];
    
    $del_query = "SELECT * FROM post WHERE post_id = '$id'";
    $del_result = mysqli_query($conn, $del_query);
    $row = mysqli_fetch_assoc($del_result);
  
    unlink("upload/".$row['post_img']);
     

    $sql = "DELETE FROM `post` WHERE `post_id` = '$id';
    UPDATE category SET post=post-1 WHERE category_id='$cat_id'";
    $result = mysqli_multi_query($conn, $sql);
    if($result){
        header("location: post.php");
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


?>