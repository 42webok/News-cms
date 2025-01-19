<?php 

include("config.php");

if(isset($_GET['id'])){
    $sql = "DELETE FROM category WHERE category_id = '".$_GET['id']."'";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("location: category.php");
    }
    else{
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

?>