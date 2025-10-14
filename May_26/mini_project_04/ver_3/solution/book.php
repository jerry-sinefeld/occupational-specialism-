<?php

echo "<form method='post' action=''>";

$staff = staff_getter(dbconnect_insert());

echo "<input type='date' name='date' value='" . date("Y-m-d") . "'>";

echo "<input type='time' name='app_time'>";

echo "<select name='staff'>";

foreach ($staff as $staf) {

    if ($staf ['role'] = 'doc') {
        $role = 'Doctor';
    } else if ($staf ['role'] = 'nur') {
        $role = 'Nurse';
    }
    echo "<option value=" . $staf ['doc_id'] . ">" . $role . "". $staf['name']."".
        $staf['lname']. "room". $staf['room_numb']. "</option>";
}