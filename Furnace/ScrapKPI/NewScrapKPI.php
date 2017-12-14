<?php 
include('..\Connection.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Scrap KPI</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	
			
			<ul >
			  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

                <script src="js/refreshform.js"></script>
                <link rel="stylesheet" type="text/css" href="view.css" media="all">

                    <!-- Load jQuery from Google's CDN -->

                    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
                        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>  


                            <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
                                <script language="javascript" src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.js"></script>
                                <script language="javascript" src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular-animate.js"></script>
                                <script language="javascript" src="http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.14.3.js"></script>


                                <link rel="stylesheet" href="./css/bootstrap.min.css" />
                                <link rel="stylesheet" href="./css/bootstrap-datetimepicker.min.css" />
                                <link rel="stylesheet" href="./css/font-awesome-min.css" />
                                <script type="text/javascript" src="../js/jquery.min.js"></script>
                                <script type="text/javascript" src="../js/moment.min.js"></script>
                                <script type="text/javascript" src="../js/bootstrap.min.js"></script>
                                <script type="text/javascript" src="../js/bootstrap-datetimepicker.min.js"></script> 
                                <script type="text/javascript" src="./Validations_scrapkpi.js"></script>
				<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Scrap KPI</a></h1>
                <form id="form_61050" class="appnitro"  method="post" action="AddScrapKPI.php" onsubmit="return scrapKpiDateCheck(); ">
					<div class="form_description">
			<h2>Scrap KPI</h2>
			<p>This is your form description. Click here to edit.</p>
                         <p> <a href="http://dataapp.moira.local/Furnace/Home.php"> Home </a> </p>
		</div>					 
                                <li id="li_100" >
                                                        <div ng-app="myApp" ng-controller="myCntrl"> 

                                                            <label class="description" for="element_1">Date<span class="required">*</span>  </label>
                                                            <div>

                                                                <input type="text" uib-datepicker-popup="{{dateformat}}" ng-model="dt" is-open="showdp" max-date="dtmax" id="date" name="date" required/>
                                                                <span>
                                                                    <button type="button" class="btn btn-default" ng-click="showcalendar($event)">
                                                                        <i class="glyphicon glyphicon-calendar"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                            <script language="javascript">
                                                                        angular.module('myApp', ['ngAnimate', 'ui.bootstrap']);
                                                                        angular.module('myApp').controller('myCntrl', function ($scope) {
                                                                            $scope.today = function () {
                                                                                $scope.dt = new Date();
                                                                            };
                                                                            $scope.dateformat = "dd/MM/yyyy";
                                                                            $scope.today();
                                                                            $scope.showcalendar = function ($event) {
                                                                                $scope.showdp = true;
                                                                            };
                                                                            $scope.showdp = false;
                                                                            $scope.dtmax = new Date();
                                                                        });

                                                            </script>

                                                        </div> 

                                                    </li>	
                            
                            <li id="li_101">
                                                        <label class="description" for="element_17">Furnace<span class="required">*</span> </label>
                                                        <div>
                                                            <select class="element select small" id="furnace" name="furnace" required/>
                                                           
                                                            <?php
// mysql select query
                                                            $query = "SELECT * FROM `furnace`";

// for method 1
                                                            $res = mysqli_query($conn, $query);
                                                            ?>
                                                            <?php while ($r1 = mysqli_fetch_array($res)):; ?>
                                                                <option value="<?php echo $r1[0]; ?>"><?php echo $r1[1]; ?></option>
<?php endwhile; ?>

                                                            </select>
                                                        </div> 
                                                    </li>	
                            
                            
                            
                            <li id="li_1" >
		<label class="description" for="element_1">Burning Loss Recipe <span class="required">*</span></label>
		<div>
                    <input id="element_1" name="blrecipe" class="element text medium" type="text" onkeypress="return blRecipe(event);" required/> 
		</div> 
                 <span id="blrecipe" style="color: Red; display: none">* Please Enter Number Only </span>
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Burning Loss Actual<span class="required">*</span> </label>
		<div>
                    <input id="element_2" name="blactual" class="element text medium" type="text" onkeypress="return acRecipe(event);"required/> 
		</div> 
                <span id="acrecipe" style="color: Red; display: none">* Please Enter Number Only </span>
		</li>		
                <li id="li_3" >
		<label class="description" for="element_3">Scrap Stock (MT)/Day<span class="required">*</span> </label>
		<div>
			<input id="element_3" name="scrapstock" class="element text medium" type="text" onkeypress="return scrapStock(event);" required/> 
		</div> 
                 <span id="scrapstock" style="color: Red; display: none">* Please Enter Number Only </span>
		</li>		<li id="li_4" >
		<label class="description" for="element_4">Man Power<span class="required">*</span> </label>
		<div>
			<input id="element_4" name="manpower" class="element text medium" type="text" onkeypress="return manPower(event);" required/> 
		</div> 
                 <span id="manpower" style="color: Red; display: none">* Please Enter Number Only </span>
		</li>		<li id="li_5" >
		<label class="description" for="element_5">Scrap Sorting(Dust)<span class="required">*</span> </label>
		<div>
			<input id="element_5" name="dustss" class="element text medium" type="text" onkeypress="return scrapSortingDust(event);" required/> 
		</div>
                 <span id="dust" style="color: Red; display: none">* Please Enter Number Only </span>
		</li>		<li id="li_7" >
		<label class="description" for="element_7">Scrap Sorting (Cast Iron)<span class="required">*</span> </label>
		<div>
			<input id="element_7" name="ciss" class="element text medium" type="text" onkeypress="return scrapSortingCI(event);" required/> 
		</div> 
                 <span id="castiron" style="color: Red; display: none">* Please Enter Number Only </span>
		</li>		
                <li id="li_71" >
		<label class="description" for="element_71">Scrap Sorting (Over Size)<span class="required">*</span> </label>
		<div>
			<input id="element_71" name="osss" class="element text medium" type="text" onkeypress="return scrapSortingCI(event);" required/> 
		</div>
                <span id="oversize" style="color: Red; display: none">* Please Enter Number Only </span>
		</li>
                <li id="li_6" >
		<label class="description" for="element_6">No. of Cylinders/ Shockup Remove<span class="required">*</span>
 </label>
		<div>
			<input id="element_6" name="cylinder" class="element text medium" type="text"onkeypress="return cylinders(event);" required/> 
		</div> 
                    <span id="cylinders" style="color: Red; display: none">* Please Enter Number Only </span>
		</li>		<li id="li_8" >
		<label class="description" for="element_8">Oversize Scrap cut from Shearing (MT)<span class="required">*</span> </label>
		<div>
			<input id="element_8" name="osscut" class="element text medium" type="text" onkeypress="return overSizeScrap(event);" required/> 
		</div> 
                <span id="oversizescrap" style="color: Red; display: none">* Please Enter Number Only </span>
		</li>		
                <li id="li_9" >
		<label class="description" for="element_9">Gas Cutting Scrap (MT) <span class="required">*</span></label>
		<div>
			<input id="element_9" name="gascutscrap" class="element text medium" type="text" onkeypress="return gasCuttingScrap(event);"required/> 
		</div> 
                <span id="gascutting" style="color: Red; display: none">* Please Enter Number Only </span>
		</li>		
                <li id="li_10" >
		<label class="description" for="element_10">Total Sorted Scrap for Furnace use<span class="required">*</span> </label>
		<div>
			<input id="element_10" name="tssfc" class="element text medium" type="text" onkeypress="return furnaceSortedScrap(event);"required/> 
		</div> 
                 <span id="fsscrap" style="color: Red; display: none">* Please Enter Number Only </span>
		</li>		
                <li id="li_11" >
		<label class="description" for="element_11">Total Scrap Unload<span class="required">*</span> </label>
		<div>
			<input id="element_11" name="tsunload" class="element text medium" type="text" onkeypress="return scrapUnload(event);"required/> 
		</div> 
                 <span id="scrapunload" style="color: Red; display: none">* Please Enter Number Only </span>
		</li>		
                 <h5 style="color:#8B0000;"><b>JUMBO PRESS MACHINE</b></h5>
                
                <li id="li_12" >
		<label class="description" for="element_12"> Production (MT) </label>
		<div>
			<input id="element_12" name="jp_prod" class="element text medium" type="text" onkeypress="return jpProd(event);"/> 
		</div> 
                 <span id="jpprod" style="color: Red; display: none">* Please Enter Number Only </span>
				
		</li>		
                 <li id="li_13" >
		<label class="description" for="element_13">No. Of Bundles </label>
		<div>
                    <input id="element_13" name="jp_bundles" class="element text medium" type="text" onkeypress="return jpBundle(event);" /> 
		</div> 
                <span id="jpbundle" style="color: Red; display: none">* Please Enter Number Only </span>
		</li>		<li id="li_14" >
		<label class="description" for="element_14">Power </label>
		<div>
			<input id="element_14" name="jp_power" class="element text medium" type="text" onkeypress="return jpPower(event);" /> 
		</div> 
                 <span id="jppower" style="color: Red; display: none">* Please Enter Number Only </span>
		</li>		
                <li id="li_15" >
		<label class="description" for="element_15">Light Scrap Received(MT) </label>
		<div>
                    <input id="element_15" name="jp_lightscraprec" class="element text medium" type="text" onkeypress="return jpLightScrap(event);" /> 
		</div> 
                 <span id="jplscrap" style="color: Red; display: none">* Please Enter Number Only </span>
		</li>		
                <li id="li_21" >
		<label class="description" for="element_21">Running Hr </label>
		<div>
			<input id="time" name="jp_run_hr" class="small" type="time"> 
		</div> 
		</li>		<li id="li_16" >
		<label class="description" for="element_16">BD Reason  </label>
		<div>
			<textarea rows="4" cols="50" name="jp_bd_reason" ></textarea> 
		</div> 
		</li>
                 <h5 style="color:#8B0000;"><b>ISC MACHINE</b></h5>
                <li id="li_17" >
		<label class="description" for="element_17">Production(MT) </label>
		<div>
                    <input id="element_17" name="is_prod" class="element text medium" type="text" onkeypress="return iscProd(event);"/> 
		</div> 
                <span id="iscprod" style="color: Red; display: none">* Please Enter Number Only </span>
		</li>		
                 <li id="li_18" >
		<label class="description" for="element_18">Power </label>
		<div>
                    <input id="element_18" name="is_power" class="element text medium" type="text" onkeypress="iscPower(event);"/> 
		</div> 
                <span id="iscpower" style="color: Red; display: none">* Please Enter Number Only </span>
		</li>		
                 <li id="li_15" >
		<label class="description" for="element_15">Light Scrap Received(MT) </label>
		<div>
                    <input id="element_15" name="isc_lightscraprec" class="element text medium" type="text" onkeypress="return iscLightScrap(event);" /> 
		</div> 
                 <span id="isclscrap" style="color: Red; display: none">* Please Enter Number Only </span>
		</li>		
                 
                 
                 <li id="li_19" >
		<label class="description" for="element_19">Running Hr </label>
		<div>
			<input id="time" name="is_run_hr" class="small" type="time" maxlength="255" value=""/> 
		</div> 
		</li>		
                <li id="li_20" >
		<label class="description" for="element_20">BD reason </label>
		<div>
			<textarea rows="4" cols="50" id="element_11" name="is_bd_reason" ></textarea> 
		</div> 
		</li>		
                 <h5 style="color:#8B0000;"><b>SMALL PRESS MACHINE</b></h5>
                <li id="li_22" >
		<label class="description" for="element_22">Production (MT) </label>
		<div>
			<input id="element_22" name="sp_prod" class="element text medium" type="text" onkeypress="return spProd(event);"/> 
		</div> 
                 <span id="spprod" style="color: Red; display: none">* Please Enter Number Only </span>
		</li>		<li id="li_23" >
		<label class="description" for="element_23">Power </label>
		<div>
                    <input id="element_23" name="sp_power" class="element text medium" type="text" onkeypress="return spPower(event);"/> 
		</div> 
                <span id="sppower" style="color: Red; display: none">* Please Enter Number Only </span>
		</li>		<li id="li_24" >
		<label class="description" for="element_24">Running Hr </label>
		<div>
			<input id="time" name="sp_run_hr" class="small" type="time" maxlength="255" value=""/> 
		</div> 
		</li>		
                
                 <h5 style="color:#8B0000;"><b>SORTED KPI</b></h5>
                <li id="li_25" >
		<label class="description" for="element_25">Stainless Steel </label>
		<div>
                    <input id="element_25" name="stainlesssteel" class="element text medium" type="text" onkeypress="return stainlessSteel(event);"/> 
		</div> 
                 <span id="ssteel" style="color: Red; display: none">* Please Enter Number Only </span>
		</li>		<li id="li_26" >
		<label class="description" for="element_26">Aluminium </label>
		<div>
			<input id="element_26" name="aluminium" class="element text medium" type="text" onkeypress="return sortedAlum(event);"/> 
		</div> 
                 <span id="alum" style="color: Red; display: none">* Please Enter Number Only </span>
		</li>		
                <li id="li_27" >
		<label class="description" for="element_27">Copper </label>
		<div>
			<input id="element_27" name="copper" class="element text medium" type="text" onkeypress="return sortedCopper(event);"/> 
		</div> 
                 <span id="copper" style="color: Red; display: none">* Please Enter Number Only </span>
		</li>		
                <li id="li_28" >
		<label class="description" for="element_28">Bronze </label>
		<div>
			<input id="element_28" name="bronze" class="element text medium" type="text" onkeypress="return sortedBronze(event);"/> 
		</div> 
                 <span id="bronze" style="color: Red; display: none">* Please Enter Number Only </span>
		</li>		
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="61050" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
		</form>	
		<div id="footer">
			Generated by <a href="http://www.phpform.org">pForm</a>
		</div>
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>

