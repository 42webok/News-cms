<?php 
session_start();
include("config.php");

if(isset($_POST['submit'])){
    if (isset($_FILES['fileToUpload'])) {
        $errors = array();
        $file_name = $_FILES['fileToUpload']['name'];
        $file_size = $_FILES['fileToUpload']['size'];
        $file_tmp = $_FILES['fileToUpload']['tmp_name'];
        $file_type = $_FILES['fileToUpload']['type'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    
        // Allowed extensions
        $extensions = array("jpeg", "jpg", "png", "webp");
    
        // Validate file extension
        if (!in_array($file_ext, $extensions)) {
            $errors[] = "Extension not allowed, please choose a JPEG, PNG, or WEBP file.";
        }
    
        // Validate file size (10 MB limit)
        if ($file_size > 10485760) { // 10 MB
            $errors[] = 'File size must not exceed 10 MB.';
        }
    
        // If no errors, process the upload
        if (empty($errors)) {
            $unique_name = uniqid("img_", true) . '.' . $file_ext;
            $upload_dir = "upload/";
    
            // Move uploaded file to the target directory
            if (move_uploaded_file($file_tmp, $upload_dir . $unique_name)) {
                echo "<script>alert('File uploaded successfully!');</script>";
            } else {
                echo "<script>alert('Failed to upload the file. Please check directory permissions or file size.');</script>";
            }
        } else {
            // Print all errors if any
            print_r($errors);
        }
    }
    
    $post_title = mysqli_real_escape_string($conn , $_POST['post_title']);
    $postdesc = mysqli_real_escape_string($conn , $_POST['postdesc']);
    $category = $_POST['category'];
    $aurthr = $_SESSION['user_id'];
    $post_date = date("d M, Y");

    echo $sql = "INSERT INTO post(title , description , category	, post_date , author , post_img) VALUES ('$post_title','$postdesc', $category, '$post_date' , $aurthr, '$unique_name');
    UPDATE category SET post = post + 1 WHERE category_id = $category;";
    $result = mysqli_multi_query($conn, $sql);
    if($result){
        header("location: post.php");
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }


}

?>