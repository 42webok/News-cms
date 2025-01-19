<?php include 'header.php'; ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                    <?php 
                      include("admin/config.php");
                      if(isset($_GET['cid'])){
                        $cid = $_GET['cid'];
                      }
                      $cate = "SELECT * FROM category WHERE category_id = '$cid'";
                      $results = mysqli_query($conn, $cate);
                      $rows = mysqli_fetch_assoc($results);
                    ?>
                  <h2 class="page-heading"><?php echo $rows['category_name']; ?></h2>
                    <!-- Ahmad Php code start here -->
                    <?php 
                     
                          $limit = 3;
                          if(isset($_GET['page'])){
                            $page = $_GET['page'];
                          }
                          else{
                            $page = 1;
                          }
                          $offset = ($page - 1) * $limit;

                            $read_query = "SELECT * FROM post
                            LEFT JOIN category ON post.category = category.category_id
                            LEFT JOIN user ON post.author = user.user_id
                            WHERE post.category = '$cid'
                            ORDER BY post_id DESC LIMIT {$limit} OFFSET {$offset} ";
                         
                         $read_result = mysqli_query($conn, $read_query);
                         $count = mysqli_num_rows($read_result);
                         if($count > 0){
                             while($row=mysqli_fetch_assoc($read_result)){
                              
                                ?>
                        <!-- Ahmad Php code end here -->

                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php?id=<?php echo $row['post_id'] ?>"><img src="admin/upload/<?php echo $row['post_img'] ?>" alt=""/></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href='single.php?id=<?php echo $row['post_id'] ?>'><?php echo $row['title'] ?></a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='category.php?cid=<?php echo $row['category_id'] ?>'><?php echo $row['category_name'] ?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <a href='author.php?aid=<?php echo $row['user_id']?>'><?php echo $row['username'] ?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <?php echo $row['post_date'] ?>
                                            </span>
                                        </div>
                                        <p class="description">
                                        <?php echo substr($row['description'] , 0 , 160) . "..."; ?>
                                        </p>
                                        <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id'] ?>'>read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                         }
                      ?>
                        <?php
                  }

                  $sqli2 = "SELECT * FROM post WHERE post.category = '$cid'";
                  $result2 = mysqli_query($conn, $sqli2);
                  if(mysqli_num_rows($result2) > 0){
                    $total = mysqli_num_rows($result2);
                    
                    $pages = ceil($total/$limit);
                    echo "<ul class='pagination admin-pagination'>";
                    if($page > 1){
                        echo "  <li><a href='?cid={$cid}&page=".($page-1)."'>Prev</a></li> ";
                    }
                    for($i = 1; $i<=$pages; $i++){
                        if($i == $page){
                            $active = "active";
                        }
                        else{
                            $active = "";
                        }
                       echo "<li class='".$active."'><a href='?cid={$cid}&page=$i'>$i</a></li>";
                    }
                    if($pages > $page){
                         echo "  <li><a href='?cid={$cid}&page=".($page+1)."'>Next</a></li> ";
                    }
                   
                    echo "</ul>";
                  }
                  ?>
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
