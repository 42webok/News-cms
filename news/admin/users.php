<?php include "header.php"; ?>
<?php include "config.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Users</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-user.php">add user</a>
            </div>

            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Full Name</th>
                        <th>User Name</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php 
                          $limit = 3;
                          if(isset($_GET['page'])){
                            $page = $_GET['page'];
                          }
                          else{
                            $page = 1;
                          }
                          $offset = ($page - 1) * $limit;


                          $read_query = "SELECT * FROM user LIMIT {$limit} OFFSET {$offset}";

                         $read_result = mysqli_query($conn, $read_query);
                         $count = mysqli_num_rows($read_result);
                         if($count > 0){
                            while($row=mysqli_fetch_assoc($read_result)){
                        ?>
                        <tr>
                            <td class='id'><?php echo $row['user_id']; ?></td>
                            <td><?php echo $row['first_name']. ' ' . $row['last_name']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['role'] != 0 ? "Admin" : "Normal User"; ?></td>
                            <td class='edit'><a href='update-user.php?id=<?php echo $row['user_id'];?>'><i class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href='delete-user.php?id=<?php echo $row['user_id'];?>'><i class='fa fa-trash-o'></i></a></td>
                        </tr>
                        <?php
                         }
                      ?>
                    </tbody>

                </table>
                <?php
                  }

                  $sqli2 = "SELECT * FROM user";
                  $result2 = mysqli_query($conn, $sqli2);
                  if(mysqli_num_rows($result2) > 0){
                    $total = mysqli_num_rows($result2);
                    
                    $pages = ceil($total/$limit);
                    echo "<ul class='pagination admin-pagination'>";
                    if($page > 1){
                        echo "  <li><a href='?page=".($page-1)."'>Prev</a></li> ";
                    }
                    for($i = 1; $i<=$pages; $i++){
                        if($i == $page){
                            $active = "active";
                        }
                        else{
                            $active = "";
                        }
                       echo "<li class='".$active."'><a href='?page=$i'>$i</a></li>";
                    }
                    if($pages > $page){
                         echo "  <li><a href='?page=".($page+1)."'>Next</a></li> ";
                    }
                   
                    echo "</ul>";
                  }
                  ?>
                
                  
                    
                
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>