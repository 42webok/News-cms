<?php include 'header.php'; ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                     <!-- post-container -->
                     <div class="post-container">
                    <?php 
                      include("admin/config.php");
                      if(isset($_GET['search'])){
                        $search_term = mysqli_real_escape_string($conn , $_GET['search']);
                     
                    //   $cate = "SELECT * FROM user WHERE user_id = '$$search_term'";
                    //   $results = mysqli_query($conn, $cate);
                    //   $rows = mysqli_fetch_assoc($results);
                    ?>
                  <h2 class="page-heading">Search : <?php echo $search_term; ?></h2>
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
                            WHERE post.title LIKE '%$search_term%' OR post.description LIKE '%$search_term%' OR category.category_name LIKE '%$search_term%' OR user.username LIKE '%$search_term%'
                            ORDER BY post_id DESC LIMIT {$limit} OFFSET {$offset} ";
                         
                         $read_result = mysqli_query($conn, $read_query);
                         $count = mysqli_num_rows($read_result);
                         if($count > 0){
                             while($row=mysqli_fetch_assoc($read_result)){
                                // echo "<pre>";
                                // print_r($row);
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
                                                <a href='author.php?aid=<?php echo $row['user_id'] ?>'><?php echo $row['username'] ?></a>
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
                  }else{
                    echo "<h2>No posts found</h2>";
                  }

               // Fetch the total number of matching rows for pagination
                $total_query = "SELECT COUNT(*) AS total_rows FROM post
                LEFT JOIN category ON post.category = category.category_id
                LEFT JOIN user ON post.author = user.user_id
                WHERE post.title LIKE '%$search_term%' 
                OR post.description LIKE '%$search_term%' 
                OR category.category_name LIKE '%$search_term%' 
                OR user.username LIKE '%$search_term%'";
                $total_result = mysqli_query($conn, $total_query);
                $total_row = mysqli_fetch_assoc($total_result);
                $total_rows = $total_row['total_rows'];


                $total_pages = ceil($total_rows / $limit);

                echo "<ul class='pagination admin-pagination'>";


                if ($page > 1) {
                echo "<li><a href='?search={$search_term}&page=" . ($page - 1) . "'>Prev</a></li>";
                }


                for ($i = 1; $i <= $total_pages; $i++) {
                $active = ($i == $page) ? "active" : "";
                echo "<li class='$active'><a href='?search={$search_term}&page=$i'>$i</a></li>";
                }


                if ($page < $total_pages) {
                echo "<li><a href='?search={$search_term}&page=" . ($page + 1) . "'>Next</a></li>";
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
