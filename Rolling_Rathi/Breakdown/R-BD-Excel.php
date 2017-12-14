<?php
include('..\Connection.php');
session_start();
$date1 = $_SESSION["date1"];
$date2 = $_SESSION["date2"];




$res = mysqli_query($link,"SELECT  `bd_date`, `heat_no`, `mill_1_size`, `by_pass_mill`, `shift`, `bd_start_time`, `bd_end_time`, `bd_total_time`, 
          `stand`, `dep_mr`, `indep_mr`, `total_mr`, 
        `total_cutting`, `bp3_mtr`, `bp6_mtr`, `total_bp`, `resp_person`, `loc_code`, `dep_name`, `shift_formen`, 
        `reason_code`, `mr_prod`, `3mtr_bbp_prod`, `6mtr_bbp_prod`, `total_bbp_prod`, `total_cutting_prod`, `bd_details`
         FROM `breakdown` where `bd_date` >= '$date1' and `bd_date` <= '$date2' order by `bd_date`, `heat_no` asc" );

//$setRec = mysqli_query($conn, $res);  

$columnHeader = '';
$columnHeader = "Date" . "\t" .
        "Heat Number" . "\t" .
        "Mill Size" . "\t" .
        "BY Pass Mill Size" . "\t" .
        "Shift" . "\t" .
        "BD Start Time" . "\t" .
       " BD End time" . "\t" .
        "BD Total Time" . "\t" .
        "Stand" . "\t" .
        "Dep MR" . "\t" .
        "InDep MR" . "\t" .
        "Total MR" . "\t" .
        "Cutting" . "\t" .
        "3 MTR BP" . "\t" .
        "6 MTR BP" . "\t" .
        "Total BBP" . "\t" .
        "Responsible Person" . "\t" .
        "Location_code" . "\t" .
        "Department" . "\t" .
        "Shift_formen" . "\t" .
        "Reason_code" . "\t".
        "mr_prod" . "\t".
        "3mrr_bbp_prod" . "\t".
        "6mtr_bbp_prod" . "\t".
        "total_bbp_prod" . "\t".
        "total_cutting_prod" . "\t".
        "BD_details" . "\t";
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
header("Content-Disposition: attachment; filename=Rathi-BD-Excel.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo ucwords($columnHeader) . "\n" . $setData . "\n";
?> 
