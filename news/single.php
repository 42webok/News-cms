<?php include 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                   <?php 
                   include("admin/config.php");
                   if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $read_query = "SELECT * FROM post
                    LEFT JOIN category ON post.category = category.category_id
                    LEFT JOIN user ON post.author = user.user_id
                    WHERE post_id = '$id'";
                    
                    $read_result = mysqli_query($conn, $read_query);
                    $row = mysqli_fetch_assoc($read_result);
                    $title = $row['title'];
                    $dec = $row['description'];
                    $image = $row['post_img'];
                    $category = $row['category_name'];
                    $category_id = $row['category'];
                    $author = $row['username'];
                    $author_id = $row['user_id'];
                    $date = $row['post_date'];

                   
                   }
                  

                   ?>
                    <div class="post-container">
                        <div class="post-content single-post">
                            <h3><?php echo $title; ?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <a href="category.php?cid=<?php echo $category_id ?>" ><?php echo $category; ?></a>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href='author.php?aid=<?php echo $author_id ?>'><?php echo $author; ?></a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $date; ?>
                                </span>
                            </div>
                            <img class="single-feature-image" src="admin/upload/<?php echo $image; ?>" alt=""/>
                            <p class="description">
                            <?php echo $dec ; ?>
                            </p>
                        </div>
                    </div>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
