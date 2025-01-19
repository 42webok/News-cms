<?php include "config.php"; ?>

<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM user WHERE user_id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("location:users.php");
    }
    else{
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

?>