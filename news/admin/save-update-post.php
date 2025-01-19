<?php 
include("config.php");

if(isset($_POST['submit'])){
    $post_id = $_POST['post_id'];
    $post_title = $_POST['post_title'];
    $post_content = $_POST['postdesc'];
    $category = $_POST['category'];
    $old_category = $_POST['cate_id'];

    if(empty($_FILES['new-image'] ["name"])){
        $unique_name = $_POST['old-image'];
    }else{
        $errors = array();
        $file_name = $_FILES['new-image']['name'];
        $file_size = $_FILES['new-image']['size'];
        $file_tmp = $_FILES['new-image']['tmp_name'];
        $file_type = $_FILES['new-image']['type'];
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

    $query = "UPDATE post SET title = '$post_title' , description = '$post_content' , category = $category , post_img = '$unique_name'
    WHERE post_id = $post_id;
    UPDATE category SET post=post+1 WHERE category_id='$category';
    UPDATE category SET post=post-1 WHERE category_id='$old_category'";
    $result = mysqli_multi_query($conn, $query);
    if($result){
        header("location: post.php");
    }
    else{
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

}

?>