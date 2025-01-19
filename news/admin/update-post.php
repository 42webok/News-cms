<?php include "header.php"; ?>
<?php 
    include("config.php");  
if($_SESSION['role'] == 0){
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM post WHERE  post_id = '$id'";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_assoc($result);
        if($rows['author'] != $_SESSION['user_id']){
            header("location: post.php");
        }
    }
}

?>

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Update Post</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <?php 
                include("config.php");
         if(isset($_GET['id'])){
            $id = $_GET['id'];
            $read_query = "SELECT * FROM post
                            LEFT JOIN category ON post.category = category.category_id
                            LEFT JOIN user ON post.author = user.user_id
                            WHERE post.post_id = '$id'";
            $result = mysqli_query($conn, $read_query);
            $row = mysqli_fetch_assoc($result);
            $title = $row['title'];
            $description = $row['description'];
            $category = $row['category_name'];
            $image = $row['post_img'];
            $post_id = $row['post_id'];
         }
        
        ?>
                <!-- Form for show edit-->
                <form action="save-update-post.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-group">
                        <input type="hidden" name="post_id" class="form-control" value="<?php echo $post_id ?>" placeholder="">
                        <input type="hidden" name="cate_id" class="form-control" value="<?php echo $row['category'] ?>" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTile">Title</label>
                        <input type="text" name="post_title" class="form-control" id="exampleInputUsername"
                            value="<?php echo $title ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Description</label>
                        <textarea name="postdesc" class="form-control" required rows="5">
                        <?php echo $description ?>
                </textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCategory">Category</label>
                        <select class="form-control" name="category">
                            <?php 
                            $query = "SELECT * FROM category";
                            $result1 = mysqli_query($conn,$query);
                            while($row1 = mysqli_fetch_assoc($result1)){

                                $selected = ($row['category'] == $row1['category_id']) ? "selected" : "";
                                echo "<option value='{$row1['category_id']}' {$selected}>{$row1['category_name']}</option>";
                            }
                            ?>
                           
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Post image</label>
                        <input type="file" name="new-image">
                        <img src="upload/<?php echo $image ?>" height="150px">
                        <input type="hidden" name="old-image" value="<?php echo $image ?>">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Update" />
                </form>
                <!-- Form End -->
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>