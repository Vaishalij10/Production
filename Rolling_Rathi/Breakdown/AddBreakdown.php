<?php
include('..\Connection.php');
include('..\postMessagesToSlack.php');


$BD_DATE= $_POST['bddate'];
$F_BD_DATE = DateTime::createFromFormat('d/m/Y', $BD_DATE)->format('Y-m-d');
$SHIFT=$_POST['shift'];
$HEAT_NO=$_POST['hnumber'];
$MILL_SIZE=$_POST['millsize'];
$BY_PASS_MILL=$_POST['bypassmill'];
$START_TIME=$_POST['sTime_only'];
$END_TIME=$_POST['eTime_only'];
$DEP_MR= $_POST['dep_missroll'];
$INDEP_MR=$_POST['indep_missroll'];
$CUTTING=$_POST['no_cutting'];
$AVG_3MTR_BWT=$_POST['3mtrbilletwt'];
$AVG_6MTR_BWT=$_POST['6mtrbilletwt'];
$BBP3MTR=$_POST['bbp3mtr'];
$BBP6MTR=$_POST['bbp6mtr'];
$STAND=$_POST['stand'];
$RES_PERSON=$_POST['resp_person'];
$LOC_CODE=$_POST['loc_code'];
$DEP_NAME=$_POST['dep_name'];
$SHIFT_FORMEN=$_POST['shift_formen'];
$REASON_CODE=$_POST['reason_code'];
$BD_DETAIL=$_POST['bd_action'];


$STRAT_TIME_WHOLE = $_POST['start_time'];
$END_TIME_WHOLE = $_POST['end_time'];



function lz($num) {
    return (strlen($num) < 2) ? "0{$num}" : $num;
}
//converting time from decimal to hh:mm format
// start by converting to seconds

$total_time = abs(strtotime($END_TIME_WHOLE) - strtotime($STRAT_TIME_WHOLE)) / 3600;
 $seconds = ($total_time * 3600);
// we're given hours, so let's get those the easy way
$hours = floor($total_time);
// since we've "calculated" hours, let's remove them from the seconds variable
$seconds -= $hours * 3600;
// calculate minutes left
$minutes = floor($seconds / 60);
// remove those from seconds as well
$seconds -= $minutes * 60;
// return the time formatted HH:MM:SS
$TOTAL_BD_TIME = lz($hours) . ":" . lz($minutes); //.":".lz($seconds);


/*
 * TOTAL MISSROLLS CALCULATIONS
 * 
 */
$TOTAL_MR= $DEP_MR+$INDEP_MR;
$TOTAL_BPP=$BBP3MTR+2*$BBP6MTR;

/* TOTAL MISSROLL PRODUCTION IN  METRIC TON */
$MR_PROD= ($TOTAL_MR*$AVG_3MTR_BWT)/1000;

/**
 * 3MTR AND 6MTR  BILLETS BYPASS PRODUCTION IN METRIC TON 
 */
$BBYPS3M_PROD= ($BBP3MTR*$AVG_3MTR_BWT)/1000;

$BBYPS6M_PROD=($BBP6MTR*$AVG_6MTR_BWT)/1000;

/*TOTAL BILLETS BYPASS PRODUCTION OF 3MTR AND 6MT
 * 
 */
$TBBYPSPROD= $BBYPS3M_PROD+$BBYPS6M_PROD;
/**TOTAL CUTTING PRODUCTION
 * IN METRIC TON 
 */
$CUTTING_PROD=$CUTTING/10;



echo $START_TIME;echo "<br>";
echo $END_TIME; echo "<br>";
echo $TOTAL_BD_TIME; echo "<br>";
echo $STRAT_TIME_WHOLE; echo "<br>";
echo $DEP_NAME;

$sql="INSERT INTO `breakdown` (`bd_date`, `heat_no`, `mill_1_size`,
    `by_pass_mill`, `shift`, `bd_start_time`, `bd_end_time`, `bd_total_time`, 
    `stand`, `dep_mr`, `indep_mr`, `total_mr`, `total_cutting`, `bp3_mtr`, `bp6_mtr`, 
    `total_bp`, `resp_person`, `loc_code`, `dep_name`,
    `shift_formen`, `reason_code`, `mr_prod`, `3mtr_bbp_prod`, `6mtr_bbp_prod`, `total_bbp_prod`, 
    `total_cutting_prod`, `bd_details`) 
     values
     ('".$F_BD_DATE."','".$HEAT_NO."','".$MILL_SIZE."','".$BY_PASS_MILL."','".$SHIFT."',"
      . "'".$STRAT_TIME_WHOLE."','".$END_TIME_WHOLE."','".$TOTAL_BD_TIME."','".$STAND."','".$DEP_MR."',"
      . "'".$INDEP_MR."','".$TOTAL_MR."','".$CUTTING."','".$BBP3MTR."','".$BBP6MTR."',"
      . "'".$TOTAL_BPP."','".$RES_PERSON."','".$LOC_CODE."','".$DEP_NAME."',"
      . "'".$SHIFT_FORMEN."','".$REASON_CODE."','".$MR_PROD."','".$BBYPS3M_PROD."','".$BBYPS6M_PROD."',"
      . "'".$TBBYPSPROD."','".$CUTTING_PROD."','".$BD_DETAIL."')";

$res_r1 = (mysqli_query($link, $sql) or die(mysqli_error($link)));


if (!$res_r1) {
    echo "not added";
    //echo "$hn";
} else {
    echo "Records added";
 if($DEP_MR==""){
        $DEP_MR=0;
    }
    else{
        $DEP_MR= $_POST['dep_missroll'];
    }
    if($INDEP_MR==""){
        $INDEP_MR=0;
    }
    else{
        $INDEP_MR=$_POST['indep_missroll'];
    }
   
 if( $BBP3MTR==""){
         $BBP3MTR=0;
    }
    else{
         $BBP3MTR=$_POST['bbp3mtr'];
    }
    if( $BBP6MTR==""){
         $BBP6MTR=0;
    }
    else{
         $BBP6MTR=$_POST['bbp6mtr'];
    }
    // SEND MESSAGE TO SLACK IN ROLLING CHANNEL
    Slack::getInstance()->postMessagesToSlack("*Date-* *$F_BD_DATE*
    *HN-* *`$HEAT_NO`* *MILLS-* *`$MILL_SIZE`* *BYPSMILL-* *`$BY_PASS_MILL`*
    *BD Start-* *`$START_TIME`* *BD End-* *`$END_TIME`* *Net-* *`$TOTAL_BD_TIME`*
    *DEP-* *`$DEP_MR`*  *INDEP-* *`$INDEP_MR`* *TMR-* *`$TOTAL_MR`*
    *BP3-* *`$BBP3MTR`* *BP6-* *`$BBP6MTR`* *TBP-* *`$TOTAL_BPP`*
     *`$LOC_CODE`*
     *`$REASON_CODE`*
     *`$DEP_NAME`*
     *`$RES_PERSON`*
     
    "
    ,"Rolling_Rathi"
            );
   
}



mysqli_close($link);
header("Location: http://dataapp.moira.local/Rolling_Rathi/Home.php");
exit();









