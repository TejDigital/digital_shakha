<?php
require('./config/dbcon.php');

if (isset($_POST['state_id'])) {
    $stateId = $_POST['state_id'];

    $sql = "SELECT * FROM tbl_cities WHERE state_id = '$stateId' ORDER BY city_name ASC";
    $query = mysqli_query($con, $sql);

    if ($query && mysqli_num_rows($query) > 0) {
        while ($result = mysqli_fetch_assoc($query)) {
            $cityId = $result['city_id'];
            $name = $result['city_name'];
            echo "<option value='$cityId'>$name</option>";
        }
    } else {
        echo "<option value=''>No City found</option>";
    }
} 

