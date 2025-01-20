<?php 
session_start();
include("config.php");

if(isset($_POST['submit'])){
 
    $errors = array();
    $unique_name = null;

   
    if (isset($_FILES['fileToUpload'])) {
        $file_name = $_FILES['fileToUpload']['name'];
        $file_size = $_FILES['fileToUpload']['size'];
        $file_tmp = $_FILES['fileToUpload']['tmp_name'];
        $file_type = $_FILES['fileToUpload']['type'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

      
        $extensions = array("jpeg", "jpg", "png", "webp");

        
        if (!in_array($file_ext, $extensions)) {
            $errors[] = "Extension not allowed, please choose a JPEG, PNG, or WEBP file.";
        }

       
        if ($file_size > 10485760) { 
            $errors[] = 'File size must not exceed 10 MB.';
        }

      
        if (empty($errors)) {
            $unique_name = uniqid("img_", true) . '.' . $file_ext;
            $upload_dir = "upload/";

         
            if (!move_uploaded_file($file_tmp, $upload_dir . $unique_name)) {
                $errors[] = 'Failed to upload the file. Please check directory permissions or file size.';
            }
        }
    } else {
        $errors[] = 'Please upload an image file.';
    }

 
    if (!empty($errors)) {
        print_r($errors);
    } else {
       
        $post_title = mysqli_real_escape_string($conn , $_POST['post_title']);
        $postdesc = mysqli_real_escape_string($conn , $_POST['postdesc']);
        $category = $_POST['category'];
        $author = $_SESSION['user_id'];
        $post_date = date("d M, Y");

       
        $sql = "INSERT INTO post (title, description, category, post_date, author, post_img) 
                VALUES ('$post_title', '$postdesc', $category, '$post_date', $author, '$unique_name');";

     
        $sql .= " UPDATE category SET post = post + 1 WHERE category_id = $category";

        if (mysqli_multi_query($conn, $sql)) {
            header("location: post.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>
