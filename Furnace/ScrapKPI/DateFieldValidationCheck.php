<?php

require_once '..\Connection.php';

if ($_POST['action'] === "checkScrapKPIDate") {
    $furnace = $_POST['furnace'];
    $kpi_date = strtr($_REQUEST['date'], '/', '-');
    $kpidate= date('Y-m-d', strtotime($kpi_date));
    checkKPIDate($furnace, $kpidate);
   
 
}

function checkKPIDate($furnace, $kpidate) {

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "furnace";
    $link = mysqli_connect($hostname, $username, $password, $databaseName);

    if ($link === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    $sql_3 = "select `furnaceid` from `scrapkpi` where `furnaceid`='" . $furnace . "' and `kpi_date` ='" . $kpidate . "'";
   
    $result = mysqli_query($link, $sql_3);
    $rowcount = mysqli_num_rows($result);
    echo $rowcount;
    return $rowcount;
    
    }