<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                      <?php 
                      include("config.php");

                          $limit = 3;
                          if(isset($_GET['page'])){
                            $page = $_GET['page'];
                          }
                          else{
                            $page = 1;
                          }
                          $offset = ($page - 1) * $limit;

                          if($_SESSION['role'] == 1){
                            $read_query = "SELECT * FROM post
                            LEFT JOIN category ON post.category = category.category_id
                            LEFT JOIN user ON post.author = user.user_id
                            LIMIT {$limit} OFFSET {$offset}";
                         }else if($_SESSION['role'] == 0){
                            $read_query = "SELECT * FROM post
                            LEFT JOIN category ON post.category = category.category_id
                            LEFT JOIN user ON post.author = user.user_id
                            WHERE post.author = {$_SESSION['user_id']}
                            LIMIT {$limit} OFFSET {$offset}";
                         }
                         
                         
                         $read_result = mysqli_query($conn, $read_query);
                         $count = mysqli_num_rows($read_result);
                         if($count > 0){
                          $counter = 1;
                             while($row=mysqli_fetch_assoc($read_result)){
                              
                                ?>
                          <tr>
                              <td class='id'><?php echo $counter ?></td>
                              <td><?php echo $row['title'] ?></td>
                              <td><?php echo $row['category_name'] ?></td>
                              <td><?php echo $row['post_date'] ?></td>
                              <td><?php echo $row['username'] ?></td>
                              <td class='edit'><a href='update-post.php?id=<?php echo $row['post_id'];?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-post.php?id=<?php echo $row['post_id'];?>&cat_id=<?php echo $row['category']?>'><i class='fa fa-trash-o'></i></a></td>
                            </tr>
                            <?php
                            $counter++;
                         }
                      ?>
                      </tbody>
                  </table>
                  <?php
                  }

                  if($_SESSION['role'] == 1){
                    $sqli2 = "SELECT * FROM post";
                  }else if($_SESSION['role'] == 0){
                    $sqli2 = "SELECT * FROM post WHERE author = {$_SESSION['user_id']}";
                  }
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
