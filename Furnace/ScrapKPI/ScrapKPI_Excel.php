<?php

/* 
 * IN THIS CODE WE ARE GENERATING THE DATA IN TO THE EXCELA ND USER ACAN DOWNLOAD THE EXCEL ALSO
 */


include('..\Connection.php');

session_start();
$date1 = $_SESSION["date1"];
$date2 = $_SESSION["date2"];





$res = mysqli_query($conn, "SELECT `kpi_date`, `furnacename`, "
    . "`burning loss recipe`, `burning loss actual`, "
    . "`scrap stock`, `Man power`, `dust scrap sorting`,"
    . " `ci scrap sorting`, `os scrap sorting`, `cylinders`, "
    . "`oversize scrap`, `gas cutting scrap`, `sorted scrap f/c`, "
    . "`total scrap unload`, `jp_production`, `jp_bundles`, "
    . "`jp_power`, `jp_light_scrap_recive`, \n"
    . " `jp_running_hr`, `jp_bd_reason`, `isc_production`, \n"
    . " `isc_power`, `isc_running_hr`, `isc_bd_reason`, \n"
    . " `sp_production`, `sp_power`, `sp_running_hr`, `stainlesssteel`,\n"
    . " `aluminium`, `copper`, `bronze` FROM `scrapkpi` s , `furnace` f where f.furnaceid=s.furnaceid\n"
    . " and kpi_date >='$date1' and kpi_date <='$date2' order by kpi_date");

//$setRec = mysqli_query($conn, $res);  

$columnHeader = '';
$columnHeader = "Date" . "\t" .
        "Furnace" . "\t" .
        "Burning Loss Recipe" . "\t" .
        "Burning Loss Actual" . "\t" .
        "Scrap Stock" . "\t" .
        "Man Powe" . "\t".
        "Scrap Sorting(Dust)" . "\t" .
        "Scrap Sorting(Cast Iron)" . "\t" .
        "Scrap Sorting(Oversize)" . "\t" .
        "No.of Cylinders/ Shockup Remove" . "\t" .
        "OverSize Scrap cut from Shearing cut" . "\t" .
        "Gas Cutting Scrap(MT)" . "\t" .
        "Total Sorted Scrap for Furnace Use" . "\t".
        "Total Scrap Unload" . "\t".
        "Jumbo Press Production(MT)" . "\t".
        "No.of Bundles" . "\t".
        "Power" . "\t".
        "Light scrap Recieved (MT)" . "\t".
        "Running Hr" . "\t".
        "Jumbo Press_BD Reason " . "\t".
        "ISC_Production(MT) " . "\t".
        "Power" . "\t".
        "Running Hr" . "\t".
        "BD Reason " . "\t".
        "PM_Production(MT) " . "\t".
        "Power " . "\t".
        "Running_hr " . "\t".
        "Stainless Steel" . "\t".
        "Aluminium " . "\t".
        "Copper " . "\t".
        "Bronze " . "\t"
       ;

$setData = '';


while ($rec = mysqli_fetch_row($res)) {
    $rowData = '';
    foreach ($rec as $value) {
        $value = '"' . $value . '"' . "\t";
        $rowData .= $value;
    }
    $setData .= trim($rowData) . "\n";
}


header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename= ScrapKPI_Excel.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo ucwords($columnHeader) . "\n" . $setData . "\n";
?> 


