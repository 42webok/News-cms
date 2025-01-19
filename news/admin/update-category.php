<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                <?php 
                 include("config.php");
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $query = "SELECT * FROM category WHERE category_id = '$id'";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
                    $catogary = $row['category_name'];
                    $catogary_id = $row['category_id'];
                }
                ?>
                  <form action="" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $catogary_id; ?>" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $catogary; ?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="sumbit" class="btn btn-primary" value="Update" required />
                  </form>
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
<?php 
if(isset($_POST['sumbit'])){
    $cat_id = $_POST['cat_id'];
    $cat_name = $_POST['cat_name'];
    $query = "UPDATE category SET category_name = '$cat_name' WHERE category_id = '$cat_id'";
    $result = mysqli_query($conn, $query);
    if($result){
        header("location: category.php");
    }
    else{
        echo "Error";
    }
}

?>