<?php require('./includes/header.php');
require('./admin/config/dbcon.php');
?>

<section class="blog_1">
    <div class="container">
        <div class="row flex-change">
            <div class="col-md-4">
                <div class="text">
                    <h1>Insights, Inspiration, Innovation</h1>
                    <p>Delve deeper into the details; take a closer look at the intricacies that shape our narrative
                        and define our journey.</p>
                    <a href="#!">Know more<i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
            </div>
            <div class="col-md-8 d-flex align-content-center justify-content-center">
                <div class="img">
                    <img src="./assets/images/blog_bg-1.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog_2">
<div class="heading">
            <p>Latest Blogs & Articles</p>
        </div>
    <div class="row">
       
        <?php
        $sql = "SELECT * FROM blog_tbl LEFT JOIN blog_category_tbl ON blog_tbl.blog_category = blog_category_tbl.blog_category_id WHERE blog_status = 1 ORDER BY blog_tbl.created_at DESC LIMIT 3";
        $sql_run = mysqli_query($con, $sql);
        if (mysqli_num_rows($sql_run) > 0) {
            while ($data = mysqli_fetch_assoc($sql_run)) {
        ?>
                <div class="col-md-4 px-3 mb-3">
                    <a href="./blog_view.php?blog_id=<?=$data['blog_id']?>">
                    <div class="blog_box">
                        <div class="text">
                            <b><?php if($data['blog_category'] == $data['blog_category_id']){echo $data['blog_category_name'];}?></b>
                            <p><?=$data['blog_name']?></p>
                        </div>
                        <div class="img">
                            <img src="./admin/blog_images/<?=$data['blog_image']?>" alt="">
                        </div>
                    </div>
                    </a>
                </div>
        <?php
            }
        }
        ?>
        <!-- <div class="col-md-4 px-5">
            <div class="blog_box">
                <div class="text">
                    <b>SEMINAR</b>
                    <p>Unveiling Horizons: A Seminar on Cutting-Edge Technologies</p>
                </div>
                <div class="img">
                    <img src="./assets/images/blog_img_1.png" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-4 px-5">
            <div class="blog_box">
                <div class="text">
                    <b>CULTURAL</b>
                    <p>Cultural Mosaic: Celebrating Diversity and Unity</p>
                </div>
                <div class="img">
                    <img src="./assets/images/blog_img_2.png" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-4 px-5">
            <div class="blog_box">
                <div class="text">
                    <b>AI & ML</b>
                    <p>AI & ML Insight: Navigating the Future of Intelligent Systems</p>
                </div>
                <div class="img">
                    <img src="./assets/images/blog_img_3.png" alt="">
                </div>
            </div>
        </div> -->
    </div>
</section>
<section class="blog_3">
    <div class="container">
        <div class="row" id="loadBlog">
            <div class="heading">
                <p>Old Blogs & Articles</p>
            </div>
            <!-- <div class="col-md-4 px-5">
                <div class="blog_box">
                    <div class="head_text">
                        <p>04 OCT °</p>
                        <b>SEMINAR</b>
                    </div>
                    <div class="main_text">
                        <p>Unveiling Horizons: A Seminar on Cutting-Edge Technologies</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 px-5">
                <div class="blog_box">
                    <div class="head_text">
                        <p>04 OCT °</p>
                        <b>SEMINAR</b>
                    </div>
                    <div class="main_text">
                        <p>Unveiling Horizons: A Seminar on Cutting-Edge Technologies</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 px-5">
                <div class="blog_box">
                    <div class="head_text">
                        <p>04 OCT °</p>
                        <b>SEMINAR</b>
                    </div>
                    <div class="main_text">
                        <p>Unveiling Horizons: A Seminar on Cutting-Edge Technologies</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 px-5">
                <div class="blog_box">
                    <div class="head_text">
                        <p>04 OCT °</p>
                        <b>SEMINAR</b>
                    </div>
                    <div class="main_text">
                        <p>Unveiling Horizons: A Seminar on Cutting-Edge Technologies</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 px-5">
                <div class="blog_box">
                    <div class="head_text">
                        <p>04 OCT °</p>
                        <b>SEMINAR</b>
                    </div>
                    <div class="main_text">
                        <p>Unveiling Horizons: A Seminar on Cutting-Edge Technologies</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 px-5">
                <div class="blog_box">
                    <div class="head_text">
                        <p>04 OCT °</p>
                        <b>SEMINAR</b>
                    </div>
                    <div class="main_text">
                        <p>Unveiling Horizons: A Seminar on Cutting-Edge Technologies</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 px-5">
                <div class="blog_box">
                    <div class="head_text">
                        <p>04 OCT °</p>
                        <b>SEMINAR</b>
                    </div>
                    <div class="main_text">
                        <p>Unveiling Horizons: A Seminar on Cutting-Edge Technologies</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 px-5">
                <div class="blog_box">
                    <div class="head_text">
                        <p>04 OCT °</p>
                        <b>SEMINAR</b>
                    </div>
                    <div class="main_text">
                        <p>Unveiling Horizons: A Seminar on Cutting-Edge Technologies</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 px-5">
                <div class="blog_box">
                    <div class="head_text">
                        <p>04 OCT °</p>
                        <b>SEMINAR</b>
                    </div>
                    <div class="main_text">
                        <p>Unveiling Horizons: A Seminar on Cutting-Edge Technologies</p>
                    </div>
                </div>
            </div> -->
           
        </div>
    </div>
</section>
<section class="home_4">
    <div class="container">
        <div class="heading">
            <h1>Let’s craft cool things</h1>
            <div class="row">
                <div class="col-md-6 d-flex align-content-center justify-content-center">
                    <div class="text">
                        <div>
                            <p>Let us help you build delightfulexperiences to propel yourcompany's growth.</p>
                            <p>We're just one message away.</p>
                        </div>
                        <a href="#!">Get in touch <img src="./assets/images/arrow.png" alt=""></a>
                    </div>
                </div>
                <div class="padding-top col-md-6 d-flex align-content-center justify-content-center">
                    <div class="img_area">
                        <div class="img">
                            <img src="./assets/images/Rectangle 6.png" alt="">
                        </div>
                        <div class="img">
                            <img src="./assets/images/Rectangle 7.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
require('./includes/footer.php');
require('./includes/script.php'); ?>
<script>
    $(document).ready(function() {
        function loadMore(page) {
            $.ajax({
                type: "POST",
                url: "./admin/blog_ajax_call.php",
                data: {
                    page_no: page
                },
                success: function(response) {
                    if (response) {
                        $("#load_blog_area").remove();
                        $("#loadBlog").append(response);
                    } else {
                        $("#loadBTN").prop("disabled", true);
                    }
                }
            });
        }
        loadMore();
        $(document).on("click", "#loadBTN", function() {
            var p_id = $(this).data("id");
            loadMore(p_id);
        });
    });
</script>
<?php
require('./includes/end_html.php');
?>