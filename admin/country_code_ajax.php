<?php
require('./config/dbcon.php');

if (isset($_POST['country_id'])) {
    $countryId = $_POST['country_id'];

    $sql = "SELECT * FROM tbl_states WHERE country_id = '$countryId' ORDER BY state_name ASC";
    $query = mysqli_query($con, $sql);

    if ($query && mysqli_num_rows($query) > 0) {
        while ($result = mysqli_fetch_assoc($query)) {
            $stateId = $result['state_id'];
            $name = $result['state_name'];
            echo "<option value='$stateId'>$name</option>";
        }
    } else {
        echo "<option value=''>No State found</option>";
    }
} 

