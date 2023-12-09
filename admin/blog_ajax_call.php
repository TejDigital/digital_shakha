<?php
require('./config/dbcon.php');
$limit = 3;
if (isset($_POST['page_no'])) {
    $page = $_POST['page_no'];
} else {
    $page = 0;
}
$sql = "SELECT * FROM blog_tbl LEFT JOIN blog_category_tbl ON blog_tbl.blog_category = blog_category_tbl.blog_category_id where blog_status = 1 LIMIT {$page},$limit";
$sql_run = mysqli_query($con, $sql);
if (mysqli_num_rows($sql_run) > 0) {
    $output = "";
    while ($data = mysqli_fetch_assoc($sql_run)) {
        $timestamp = strtotime($data['blog_date']);
        $day = date('d', $timestamp);
        $month = date('M', $timestamp);
        $last_id = $data['blog_id'];
        $output .= "    <div class='col-md-4 px-5'>
        <a href ='./blog_view.php?blog_id={$data['blog_id']}'>
        <div class='blog_box'>
            <div class='head_text'>
                <p>{$day} {$month} °</p>
    ";
        if ($data['blog_category'] == $data['blog_category_id']) {
            $output .= "<p>{$data["blog_category_name"]}</p>";
        }

        $output .=         "</div>
            <div class='main_text'>
                <p>{$data["blog_name"]}</p>
            </div>
        </div>
        </a>
    </div>";
    }
    $output .= "  <div class='load_btn' id='load_blog_area'>
    <button id='loadBTN' data-id='{$last_id}'>Load More</button>
</div>";

    echo $output;
} else {
    echo "";
}
