<?php require('./includes/header.php');
require('./admin/config/dbcon.php');
?>
<section class="event_1">
    <div class="container">
        <div class="heading">
            <h1>Upcoming event</h1>
        </div>
        <div class="row py-4">
            <div class="col-md-12">
                <section class="splide">
                    <div class="splide__arrows">
                        <button class="splide__arrow splide__arrow--prev">
                            <img src="./assets/images/arrow_1.png" alt="">
                        </button>
                        <button class="splide__arrow splide__arrow--next">
                            <img src="./assets/images/arrow.png" alt="">
                        </button>
                    </div>
                    <div class="splide__track">
                        <ul class="splide__list">
                            <?php
                            $sql = "SELECT * FROM event_tbl WHERE event_status = 1";
                            $sql_run = mysqli_query($con, $sql);
                            if (mysqli_num_rows($sql_run) > 0) {
                                while ($data = mysqli_fetch_assoc($sql_run)) {
                                    $timestamp = strtotime($data['event_date']);
                                    $day = date('d', $timestamp);
                                    $month = date('F', $timestamp);

                                    $time = strtotime($data['event_start_time']);
                                    $formatted_time = date('g:i A', $time);

                                    $time2 = strtotime($data['event_end_time']);
                                    $formatted_time2 = date('g:i A', $time2);
                            ?>
                                    <li class="splide__slide">
                                        <div class="box">
                                            <div class="date">
                                                <p><?= $day ?></p>
                                                <p><?= $month ?></p>
                                            </div>
                                            <div class="text">
                                                <p><?= $data['event_title'] ?></p>
                                                <p><span><?= $formatted_time ?> - </span> <span> <?= $formatted_time2 ?></span></p>
                                                <p>Office, <?= $data['event_address'] ?></p>
                                            </div>
                                        </div>
                                    </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
<section class="event_2">
    <div class="container">
        <div class="row">
            <h1>All Events</h1>
            <?php
            $sql = "SELECT * FROM event_tbl WHERE event_status = 1";
            $sql_run = mysqli_query($con, $sql);
            if (mysqli_num_rows($sql_run) > 0) {
                while ($data = mysqli_fetch_assoc($sql_run)) {
                    $timestamp = strtotime($data['event_date']);
                    $day = date('d', $timestamp);
                    $month = date('F', $timestamp);
            ?>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="image_content">
                                    <div class="flex-box">
                                        <div class="date">
                                            <p><?=$day?></p>
                                            <p><?=$month?></p>
                                        </div>
                                        <div class="img">
                                          <img src="./admin/event_image/<?=$data['event_image']?>" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text">
                                    <h1><?= $data['event_title'] ?></h1>
                                    <p><?=implode(' ',array_slice(str_word_count($data['event_description'], 1), 0, 35)) ?>...</p>
                                    <a href="./event_view.php?event_id=<?=$data['event_id']?>">Know More <img src="./assets/images/arrow.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
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
                <div class="padding-top col-md-6 d-flex align-items-center justify-content-center">
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
<?php require('./includes/footer.php'); ?>
<?php require('./includes/script.php'); ?>
<script>
    var splide = new Splide('.splide', {
        type: 'loop',
        perPage: 4,
        perMove: 1,
        gap: '0.7rem',
        pagination: false,
        breakpoints: {
            998: {
                perPage: 3,
            },
            768: {
                perPage: 2,
            },
        },
    });

    splide.mount();
</script>
<?php require('./includes/end_html.php'); ?>