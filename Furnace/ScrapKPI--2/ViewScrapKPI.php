


<?php


// Form to get the Breakdown Details in between from date and to date .
session_start();
include('..\Connection.php');

extract($_GET);
$date1 = date('Y-m-d', strtotime($date1));
$date2 = date('Y-m-d', strtotime($date2));


$_SESSION["date1"] = $date1;
$_SESSION["date2"] = $date2;
echo $date1; echo "<br>"; echo $date2;
// Query to get the Details from the breakdown table on the basis of from date and to date .
if ($conn != NULL) {
    //$res=  mysqli_query($con,"select location.locationid,location.locationname from location INNER JOIN breakdown ON location.locationid=breakdown.breakdown_id");
   $sql_kpi = mysqli_query($conn, "SELECT `kpi_date`, `furnacename`, "
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
    
    echo "<table border='black'>";
    echo "<tr><td align ='center'width='10%'> Date </td>"
    . "<td align ='center'width='10%'>Furnace </td>"
    . "<td align ='center'width='10%'> Burning Loss Recipe </td>"
    . "<td align ='center'width='10%'> Burning Loss Actual </td>"
    . "<td align ='center'width='10%'> Scrap Stock(MT) /Days</td>"
    . "<td align ='center'width='10%'>Man Power</td>"
    . "<td align ='center'width='10%'>Scrap Sorting(Dust)</td>"        
    . "<td align ='center'width='10%'>Scrap Sorting(Cast Iron)</td>"
    . "<td align ='center'width='10%'>Scrap Sorting (Over Size)</td>"
    . "<td align ='center'width='10%'>No. of Cylinders/ Shockups</td>"
    . "<td align ='center'width='10%'>OverSize Scrap cut from Shearing(MT)</td>"
    . "<td align ='center'width='10%'>Gas Cutting Scrap(MT)</td>"
    . "<td align ='center'width='10%'>Total Sorted Scrap for f/c use</td>"
    . "<td align ='center'width='10%'>Total Scrap Unload</td>"
    . "<td align ='center'width='10%'>Jumbo Press Production</td>"
    . "<td align ='center'width='10%'>No. of bundles</td>"
    . "<td align ='center'width='10%'> Power</td>"
    . "<td align ='center'width='10%'>Light Scrap Received(MT)</td>"
    . "<td align ='center'width='10%'>Running Hr</td>"
    . "<td align ='center'width='10%'>Jumbo Press BD Reason</td>"        
    . "<td align ='center'width='10%'>ISC Production(MT)</td>"
    . "<td align ='center'width='10%'>Power</td>"
    . "<td align ='center'width='10%'>Running Hr</td>"
    . "<td align ='center'width='10%'>ISC Press BD Reason</td>"  
    . "<td align ='center'width='10%'>Small Press Production (MT)</td>"
    . "<td align ='center'width='10%'>Power</td>"       
    . "<td align ='center'width='10%'>Running Hr</td>"
    . "<td align ='center'width='10%'>Stainless Steel</td>"
    . "<td align ='center'width='10%'>Aluminium</td>"
    . "<td align ='center'width='10%'>Bronze</td>"
    . "<td align ='center'width='10%'>Copper</td>";

/**
 * 
 * this is the function to check the select query error , and the Error is mysqli_fetch array expects to be 1 parameter
 */
//if (!$sql_kpi) {
  //  printf("Error: %s\n", mysqli_error($conn));
    //exit();
//}
    while ($row = mysqli_fetch_array($sql_kpi)) {
        echo "<tr>";
        for ($i = 0; $i <31; $i++){
            echo "<td>" . $row[$i] . "</td>";
        }
    }
     echo "</table>";
} 
else
    {

    echo "Not Connect";
    }
    ?>
<br><br>

    
<br><br>

<!-- Exporting the Data to the excel sheet -->
<a href="ScrapKPI_Excel.php"> Export To Excel </a> </br></br>
<a href="../home.php"> Home </a> 