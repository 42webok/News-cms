<?php include "header.php"; ?>
<?php include "config.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <?php 
               $update_id = $_GET['id'];
               $sql = "SELECT * FROM user WHERE user_id='$update_id'";
               $result = mysqli_query($conn, $sql);
               if ($row = mysqli_fetch_assoc($result)) {
                $prv_id = $row['user_id'];
                $prv_fname = $row['first_name'];
                $prv_lname = $row['last_name'];
                $prv_username = $row['username'];
                $prv_role = $row['role'];
            } else {
                echo "<div class='alert alert-danger'>User not found!</div>";
                exit;
            }
               
               ?>


              <div class="col-md-offset-4 col-md-4">
                  <!-- Form Start -->
                  <form  action="" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="<?php echo $prv_id; ?>" placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="f_name" class="form-control" value="<?php echo $prv_fname; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="<?php echo $prv_lname; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $prv_username; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" >
                          <option value="0" <?php echo ($prv_role == 0) ? "selected" : ""; ?>>Normal User</option>
                          <option value="1" <?php echo ($prv_role == 1) ? "selected" : ""; ?>>Admin</option>
                             
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
              </div>
          </div>
      </div>
  </div>

<!-- Php code of update data here -->
<?php 
 
 if(isset($_POST['submit'])){
    $id = $_POST['user_id'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $username = $_POST['username'];
    $role = $_POST['role'];

    $update_query = "UPDATE  user SET first_name = '$f_name' , last_name = '$l_name' , username = '$username' , role = '$role' WHERE user_id = '$id'";
    $update_result = mysqli_query($conn, $update_query);
    if($update_result){
        // header("Location:users.php?msg= update");
        echo "<script>window.open('users.php', '_self');</script>";
        exit;
    }else{
        echo "<script>alert('Error in update')</script>";
    }
 }
 
 ?>











<?php include "footer.php"; ?>
