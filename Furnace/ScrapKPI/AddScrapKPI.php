<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once  '..\Connection.php';
require_once '..\PostMessagetoSlack.php';
 require_once '..\DBfile.php';

$kpi_date=$_POST['date'];
$show_date = DateTime::createFromFormat('d/m/Y', $kpi_date)->format('Y-m-d');
$furnace=ScrapRpt::getInstance()->get_furnace_id($_POST['furnace']);
echo "furnace"; echo "<br>"; echo $furnace;

$furnace_id= $_POST['furnace'];
$bl_recipe=$_POST['blrecipe'];
$bl_actual=$_POST['blactual'];
$scrap_stock=$_POST['scrapstock'];
$man_power=$_POST['manpower'];
$dust_ss=$_POST['dustss'];
$ci_ss=$_POST['ciss'];
$os_ss=$_POST['osss'];
$cylinder=$_POST['cylinder'];
$oss_cut=$_POST['osscut'];
$gascut_scrap=$_POST['gascutscrap'];
$tss_fc=$_POST['tssfc'];
$ts_unload=$_POST['tsunload'];
//jumpo press
$jp_prod=$_POST['jp_prod'];
$jp_bundles=$_POST['jp_bundles'];
$jp_power=$_POST['jp_power'];
$jp_lightscrap=$_POST['jp_lightscraprec'];
$jp_bd_reason=$_POST['jp_bd_reason'];
$jp_run_hr=$_POST['jp_run_hr'];
//isc machine
$isc_prod=$_POST['is_prod'];
$isc_power=$_POST['is_power'];
$isc_lightscrap=$_POST['isc_lightscraprec'];
$isc_run_hr=$_POST['is_run_hr'];
$isc_bd_reason=$_POST['is_bd_reason'];
//small press machine
$sp_prod=$_POST['sp_prod'];
$sp_power=$_POST['sp_power'];
$sp_run_hr=$_POST['sp_run_hr'];
//sorted kpi
$stainlesssteel=$_POST['stainlesssteel'];
$aluminium=$_POST['aluminium'];
$copper=$_POST['copper'];
$bronze=$_POST['bronze'];



/** perton power consumption Calculation 
 * 
 */
if($furnace_id==1){
$pertonpower_jp=$jp_prod/$jp_power;
$pertonpower_isc=$isc_prod/$isc_power;
}
 else {
     
$pertonpower_isc=0;
$pertonpower_jp=0;
}
/*CALCULATION FOR THE MONTHLY JUMBO PRESS PRODUCTION AND AVERAGE PER DAY PRODUCTION */
$s1= mysqli_query($conn,"select kpi_date from scrapkpi where kpi_id in (select max(kpi_id) from scrapkpi)");
$r1= mysqli_fetch_row($s1);
$prev_date= $r1[0];
echo $prev_date; echo "<br>";
//Previous Date Month Value 
$prev_mon_val=date('m', strtotime($prev_date));
echo $prev_mon_val;

// present date Month Value
$pres_mon_value=date('m', strtotime($show_date));
echo "<br>";
echo $pres_mon_value;
echo "<br>";
$pres_day_value=date('d', strtotime($show_date));
echo $pres_day_value;

/**
 * calculations for the Monthly jumbo press production and Average Jumbo press Production 
 * 
 */
if($prev_mon_val!=$pres_mon_value){
  
    $mon_jp_prod=number_format((float)($jp_prod),2,'.','');
    echo "<br>"; echo $mon_jp_prod;
}
else{
    $r2= mysqli_fetch_row(mysqli_query($conn,"select `mon_jp_prod` from  scrapkpi where kpi_id in (select max(kpi_id) from scrapkpi)")); 
     
    $prev_jumbo_prod= $r2[0];
    echo "<br>";
    echo $prev_jumbo_prod;
    $mon_jp_prod= number_format((float)($prev_jumbo_prod + $jp_prod),2,'.','');
    echo $mon_jp_prod;
}

$avg_jp_prod= number_format((float)($mon_jp_prod/$pres_day_value),2,'.','');
echo "<br>"; echo $avg_jp_prod;

/*
 * calculation for the Average and Monthly isc press machine Production
 * 
 */

if($prev_mon_val!=$pres_mon_value){
  
    $mon_isc_prod=number_format((float)($isc_prod),2,'.','');
    echo "<br>"; echo $mon_jp_prod;
}
else{
    $r3= mysqli_fetch_row(mysqli_query($conn,"select `mon_isc_prod` from  scrapkpi where kpi_id in (select max(kpi_id) from scrapkpi)")); 
     
    $prev_isc_prod= $r3[0];
    echo "<br>";
    echo $prev_isc_prod;
    $mon_isc_prod= number_format((float)($prev_isc_prod + $isc_prod),2,'.','');
    echo $mon_isc_prod;
}

$avg_isc_prod= number_format((float)($mon_isc_prod/$pres_day_value),2,'.','');

$sql_scrapkpi= "INSERT INTO `scrapkpi` (`kpi_date`, 
         `furnaceid`, `burning loss recipe`, 
        `burning loss actual`, `scrap stock`, 
        `Man power`, `dust scrap sorting`, `ci scrap sorting`, 
        `os scrap sorting`, `cylinders`, `oversize scrap`, 
        `gas cutting scrap`, `sorted scrap f/c`, `total scrap unload`, 
        `jp_production`, `jp_bundles`, `jp_power`, `jp_light_scrap_recive`, 
        `jp_running_hr`, `jp_bd_reason`, `isc_production`, `isc_power`,
        `isc_running_hr`, `isc_bd_reason`, `sp_production`, `sp_power`, 
        `sp_running_hr`, `stainlesssteel`, `aluminium`, `copper`, `bronze`,`mon_jp_prod`,`avg_jp_prod`,mon_isc_prod,
        `avg_isc_prod`,`per_ton_power_jp`,`per_ton_power_isc`,`isc_light_scrap_recieve`) values
        ('".$show_date."','".$furnace_id."','".$bl_recipe."','".$bl_actual."','".$scrap_stock."',"
        . "'".$man_power."','".$dust_ss."','".$ci_ss."','".$os_ss."','".$cylinder."',"
        . "'".$oss_cut."','".$gascut_scrap."','".$tss_fc."','".$ts_unload."','".$jp_prod."',"
        ."'".$jp_bundles."','".$jp_power."','".$jp_lightscrap."','".$jp_run_hr."','".$jp_bd_reason."',"
        ."'".$isc_prod."','".$isc_power."','".$isc_run_hr."','".$isc_bd_reason."',"
        ."'".$sp_prod."','".$sp_power."','".$sp_run_hr."','".$stainlesssteel."','".$aluminium."','".$copper."','".$bronze."','".$mon_jp_prod."',"
        . "'".$avg_jp_prod."','".$mon_isc_prod."',"
        . "'".$avg_isc_prod."','".$pertonpower_jp."','".$pertonpower_isc."','".$isc_lightscrap."')";


$test = (mysqli_query($conn, $sql_scrapkpi) or die(mysqli_error($conn)));

if (!$test) {
    echo "not added";
    //echo "$hn";
} else {
    echo "Records added";
}

echo "<br>";
echo $furnace;
echo "<br>";
echo $furnace_id;

if($jp_lightscrap==''){
    $jp_lightscrap=0;
}
if($jp_bd_reason=='')
{
    $jp_bd_reason="No Breakdowns";
}
if($isc_run_hr==''){
    $isc_run_hr=0;
}
if($jp_run_hr==''){
    $jp_run_hr=0;
}
if($isc_bd_reason==''){
    $isc_bd_reason="No Breakdowns";
}
if($furnace_id == 1){
Slack::getInstance()->postMessagesToSlack_scrapkpi("*Date*- `$show_date`
*Furnace*- `$furnace`
*Scrap Sorting(Dust)*- `$dust_ss`
*Scrap Sorting(OS)*- `$os_ss`
*Scrap Sorting(CI)*-`$ci_ss`
*No. of Cylinders/ShockUp Remove*-`$cylinder`  
*Total Sorted Scrap for Furnace Use*-`$tss_fc`
*Total Scrap Unload*-`$ts_unload`    
    ","Test");
Slack::getInstance()->postMessagesToSlack_jumbopress("
*Date*-`$show_date`
*Production*-`$jp_prod` 
*Power*- `$jp_power`
*Running Hr*-  `$jp_run_hr`  
*Light Scrap Received*-_*`$jp_lightscrap`*_ 
*Monthly Production*- _*`$mon_jp_prod`*_ 
*Average Per Day Prod*-_*`$avg_jp_prod`*_ 
*BD Reason*-_*`$jp_bd_reason`*_    
","Test");

Slack::getInstance()->postMessagesToSlack_iscmachine("
*Date*-`$show_date`
*Production*-`$isc_prod`
*Power*- `$isc_power`  
*Light Scrap Recieve*-_*`$isc_lightscrap`*_    
*Running Hr*-  `$isc_run_hr`  
*Monthly Production*- _*`$mon_isc_prod`*_ 
*Average Per Day Prod*-_*`$avg_isc_prod`*_ 
*BD Reason*-_*`$isc_bd_reason`*_    
","Test");
}
else{
    Slack::getInstance()->postMessagesToSlack_scrapkpi( "
*Date*- `$show_date`
*Furnace*- `$furnace`
*Scrap Sorting(Dust)*- `$dust_ss`
*Scrap Sorting(OS)*- `$os_ss`
*Scrap Sorting(CI)*-`$ci_ss`
*No. of Cylinders/ShockUp Remove*-`$cylinder`  
*Total Sorted Scrap for Furnace Use*-`$tss_fc`
*Total Scrap Unload*-_*`$ts_unload`*_    
    "     ,"Test");
}
  mysqli_close($conn);
header("Location: http://dataapp.moira.local/furnace/Home.php");
exit();
