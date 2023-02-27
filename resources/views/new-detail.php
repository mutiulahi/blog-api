<?php
include 'database/connection.php';
 if(!$_GET['id']){
     header('Location: news.php');
 }else{

        $id = $_GET['id'];
        $sql = "SELECT * FROM news WHERE id = '$id'";
        $result = mysqli_query($dbconnect, $sql);
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $created_at = $row['created_at'];
        $body = $row['body'];
        $image = $row['image'];
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Blog | News</title>



    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="assets/css/font-awesome-all.css" rel="stylesheet">
    <link href="assets/css/flaticon.css" rel="stylesheet">
    <link href="assets/css/owl.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/color.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
    <style>
        #sub-dropdown:hover {
            color: #0fac49;
        }
    </style>

</head>


<!-- page wrapper -->

<body>

    <div class="boxed_wrapper">

        <!-- main header -->
        <?php include './layout/header.php' ?>
        <!-- main-header end -->

        <section class="page-title" style="margin-top: -50px;">
            <!-- <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-87.png);"></div> -->
            <div class="auto-container">
                <div class="sec-title style-two">
                    <h5>NEWS</h5>
                    <div class="divider" style="background-image: url(assets/images/icons/divider-1.png);"></div>
                </div>
            </div>
        </section>
        <!-- blog-grid -->
        <section class="sidebar-page-container">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="blog-details-content">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <img src="assets/images/news/<?php echo $image;?>" alt="">
                                </figure>
                                <div class="lower-content">
                                    <span class="post-date"><?php echo date("M, d Y", strtotime($created_at)); ?></span>
                                    <ul class="post-info clearfix">
                                        <!-- <li><i class="far fa-user"></i><a href="blog-details.html">Admin</a></li> -->
                                    </ul>
                                    <h2><?php echo $title;?></h2>
                                    <div class="text">
                                    <?php echo $body;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="blog-sidebar">
                            <div class="sidebar-widget post-widget">
                                <div class="widget-title">
                                    <h3>Tranding Post</h3>
                                </div>
                                <div class="post-inner">
                                    <?php
                                    include 'database/connection.php';
                                    $sql = "SELECT * FROM news";
                                    $result = mysqli_query($dbconnect, $sql);
                                    while ($row_news = mysqli_fetch_array($result)) {
                                    ?>
                                        <div class="post" style="padding-left: 10px;">
                                            <h4><a href="new_detail.php?id=<?php echo $row_news['id']; ?>"><?php echo $row_news['title']; ?></a></h4>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog-grid end -->

        <!-- main-footer -->
        <?php @include "./layout/footer.php" ?>
        <!-- main-footer end -->
    </div>


    <!-- jequery plugins -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/validation.js"></script>
    <script src="assets/js/jquery.fancybox.js"></script>
    <script src="assets/js/appear.js"></script>
    <script src="assets/js/scrollbar.js"></script>
    <script src="assets/js/tilt.jquery.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/bxslider.js"></script>
    <!-- main-js -->
    <script src="assets/js/script.js"></script>
</body>

</html>