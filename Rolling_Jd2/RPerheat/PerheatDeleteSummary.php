<?php

if ($_POST['action'] === "deletePerHeatSummary") {
    $perheatid = $_POST['perheatid'];
    //echo $perheatid;
    echo deletePerHeatSummary($perheatid);
}

function deletePerHeatSummary($perheatid) {
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "rolling_jd2";
    $link = mysqli_connect($hostname, $username, $password, $databaseName);

    if ($link === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $sql_2 = "delete from per_heat_production where  per_heat_id='" . $perheatid . "'";
    $res = mysqli_query($link, $sql_2);
    return $res;
  
}

