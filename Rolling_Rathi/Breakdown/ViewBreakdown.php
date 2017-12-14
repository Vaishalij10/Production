
<?php


// Form to get the Breakdown Details in between from date and to date .
session_start();
include('..\Connection.php');

extract($_GET);
$date1 = date('Y-m-d', strtotime($date1));
$date2 = date('Y-m-d', strtotime($date2));


$_SESSION["date1"] = $date1;
$_SESSION["date2"] = $date2;
// Query to get the Details from the breakdown table on the basis of from date and to date .
if ($link != NULL) {
    //$res=  mysqli_query($con,"select location.locationid,location.locationname from location INNER JOIN breakdown ON location.locationid=breakdown.breakdown_id");
   $res = mysqli_query($link, "select
          `bd_date`, `heat_no`, `mill_1_size`,`by_pass_mill`, `shift`, `bd_start_time`, 
          `bd_end_time`, `bd_total_time`, `stand`, `dep_mr`, `indep_mr`, `total_mr`, `total_cutting`, 
          `bp3_mtr`, `bp6_mtr`, `total_bp`, `resp_person`, `loc_code`, `dep_name`, `shift_formen`, 
          `reason_code`
          FROM `breakdown`     
             where `bd_date` >= '$date1' and `bd_date` <= '$date2' order by `bd_date`, `heat_no` asc ");
    
    echo "<table border='black'>";
    echo "<tr><td> Date </td>"
    . "<td>Heat Number </td>"
    . "<td> Mill Size </td>"
    . "<td> By Pass Mill </td>"
    . "<td> Shift</td>"
    . "<td>BD Start Time</td>"
    . "<td>BD End Time</td>"
    . "<td>BD Total Time</td>"
    . "<td>Stand</td>"
    . "<td>Dep MR</td>"
    . "<td>Indep MR</td>"
    . "<td>Total MR</td>"
    . "<td>Cutting</td>"
    . "<td>BBP3mtr</td>"
    . "<td>BBP6mtr</td>"
    . "<td>TBBP</td>"
    . "<td>RespPerson</td>"
    . "<td>Location</td>"
    . "<td>Dept</td>"
    . "<td>Shift_formen</td>"
    . "<td>Reason</td>";        
 
    while ($row = mysqli_fetch_array($res)) {
        echo "<tr>";
        for ($i = 0; $i <21; $i++){
            echo "<td>" . $row[$i] . "</td>";
        }
        
    }
     echo "</table>";
}else {
    echo "Not Connect";
}
    ?>
<br><br>

<!-- Exporting the Data to the excel sheet -->
<a href="R-BD-Excel.php"> Export To Excel </a> </br></br>
<a href="../home.php"> Home </a> 

