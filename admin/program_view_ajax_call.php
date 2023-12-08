<?php
require('./config/dbcon.php');
$limit = 4;
if (isset($_POST['page_no'])) {
    $page = $_POST['page_no'];
} else {
    $page = 0;
}
$sql = "SELECT * FROM program_tbl LIMIT {$page},$limit";
$sql_run = mysqli_query($con, $sql);
if (mysqli_num_rows($sql_run) > 0) {
    $output = "";
    while ($data = mysqli_fetch_assoc($sql_run)) {
        $last_id = $data['program_id'];
        $output .= "    <div class='col-md-3 pb-3'>
                            <a href='./program_view.php?id={$data["program_id"]}'>
                                <div class='box'>
                                    <div class='img'>
                                        <img src='./admin/program_images/{$data["program_image"]}' alt=''>
                                    </div>
                                    <div class='text'>
                                        <h4>{$data["program_name"]}</h4>
                                        <p>{$data["program_detail"]}</p>
                                    </div>
                                </div>
                            </a>
                        </div>";
    }
    $output .= " <div class='btn_area' id='btn_id'>
                        <button id='load_page_btn' data-id='{$last_id}'>Load 10 More</button>
                    </div>";

    echo $output;
} else {
    echo "";
}
