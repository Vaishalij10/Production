

<?php
include '../Connection.php';

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rathi Breakdown Form </title>
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
                                <link rel="stylesheet" type="text/css" href="view.css" media="all"></link>
                                <script type="text/javascript" src="./R-BD-Validations.js"></script>
                                <script type="text/javascript" src="./TextBoxValidations.js"></script>
                              
</head>
<body id="main_body" >
	
<img id="top" src="top.png" alt="">
<div id="form_container">
	
		<h1><a>Rathi Breakdown Form </a></h1>
                 
<form id="form_63053" class="appnitro"  method="post" action="AddBreakdown.php" onsubmit="return onFormSubmit(); return confirm('Are you sure you want to submit this form?');">
<div class="form_description">
<h2>Rathi Breakdown Form </h2>
<p>This is your form description. Click here to edit.</p>
  <p> <a href="http://dataapp.moira.local/Rolling_Rathi/Home.php"> Home </a> </p>
</div>						
			
                    
                    <ul>
			   <li id="li_1" >
                                                        <div ng-app="myApp" ng-controller="myCntrl"> 

                                                            <label class="description" for="element_1">Date <span class="required">*</span> </label>
                                                            <div>

                                                                <input type="text" uib-datepicker-popup="{{dateformat}}" ng-model="dt" is-open="showdp" max-date="dtmax" name="bddate" readonly/>
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
    <li id="li_15" >
        <label class="description" for="element_15">Shift<span class="required">*</span> </label>

        <select class="element text medium" id="element_15" name="shift" required/>
        <option>Day</option>
        <option>Night</option>

        </select>

    </li>		
    <li id="li_16" >
        <label class="description" for="element_16">Heat No <span class="required">*</span> </label>
        <div>
            <select class="element text medium" id="element_16" name="hnumber" required/>
            <option value="1" >1</option>
            <option value="2" >2</option>
            <option value="3" >3</option>
            <option value="4" >4</option>
            <option value="5" >5</option>
            <option value="6" >6</option>
            <option value="7" >7</option>
            <option value="8" >8</option>
            <option value="9" >9</option>
            <option value="10" >10</option>
            <option value="11" >11</option>
            <option value="12" >12</option>
            <option value="13" >13</option>
            <option value="14">14</option>

            </select>
        </div> 
    </li>			
    <li id="li_2" >
        <label class="description" for="element_2">Mill-Size<span class="required">*</span>  </label>
        <div>
            <select class="element text medium " name ="millsize" id ="millsize" required/> 

            <?php
            $q1 = mysqli_query($link, "select * from size  where `by_pass_mill`=0 ORDER BY size_1_id ASC");
            $r1 = mysqli_num_rows($q1);

            while ($r1 = mysqli_fetch_array($q1)) {

                echo "<option value='" . $r1['size_1_name'] . "'>" . $r1['size_1_name'] . "</option>";
            }
            ?>
            </select>

        </div> 

    </li>		
    <li id="li_3">
        <label class="description" for="element_3">By Pass Mill<span class="required">*</span>  </label>
        <div>
            <select class="element text medium " name ="bypassmill" id ="bypassmill" required/> 

            <?php
            $q2 = mysqli_query($link, "select * from size  where `by_pass_mill`=1 ORDER BY size_1_id DESC");
            $r2 = mysqli_num_rows($q2);

            while ($r2 = mysqli_fetch_array($q2)) {

                echo "<option value='" . $r2['size_1_name'] . "'>" . $r2['size_1_name'] . "</option>";
            }
            ?>
            </select>

        </div> 

    </li>	
                       
                    </li>	
                    <li id="li_2">
                                                        <label class="description" for="element_111">Start time<span class="required">*</span> </label>
                                                     <!-- <div class="container"> 
                                                          <!--  <div class='col-md-5'> -->
                                                                <div class="form-group">
                                                                    <div class='input-group date' id='datetimepicker6'>
                                                                        <input type="text" name ="start_time" id="starttime" required/>
                                                                        <span class="input-group-addon">
                                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                                        </span>
                                                                        
                                                                 
                                                                    </div>
                                                             
                                                                   </div>
                                                             <!--</div>-->
                                                           
                                                            
                                                            <label class="description" for="element_1121">End time<span class="required">*</span> </label>
                                                          <!-- <div class='col-md-5'> -->
                                                           <div class="form-group">
                                                                    <div class='input-group date' id='datetimepicker7'>
                                                                        <input type="text"  name ="end_time" id="endtime" onblur="checkIfSameDate()" required/>
                                                                        <span class="input-group-addon">
                                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                                            </span> 
                                                                     
                                                                   </div>
                                                             </div>
                                                           
                                                         <!--   </div>--> 
                                                    <!--    </div>-->
                                                        
                                                        <!-- Hidden Input type for the -->
                                                        
                                                        <input type='hidden' name ="sTime_only" id="sTime_only"/>
                                                        <input type='hidden' name ="eTime_only" id="eTime_only"/>
                                                        
                                                        <script type="text/javascript">
                                                                
                                                              $(function () {
                                                          
                                                               $('#datetimepicker6').datetimepicker();
                                                                $('#datetimepicker7').datetimepicker({
                                                                 useCurrent: false //Important! See issue #1075 
                                                                });
                                                                $("#datetimepicker6").on("dp.change", function (e) {
                                                                $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
                                                                });
                                                                $("#datetimepicker7").on("dp.change", function (e) {
                                                                $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
                                                                });
                                                               
                                                                    });



  </script>    
                       
                        
                    <li id="li_4" >
		<label class="description" for="element_4">Dependent Missroll </label>
		<div>
			<input id="element_4" name="dep_missroll" class="element text medium" type="text" onkeypress="return IsNumeric(event);"/> 
		</div> 
                <span id="error" style="color: Red; display: none">* Please Enter Number Only </span>
		</li>		<li id="li_5" >
		<label class="description" for="element_5">Independent Missroll </label>
		<div>
			<input id="element_5" name="indep_missroll" class="element text medium" type="text" onkeypress="return IsNumeric1(event);"/> 
		</div>
                <span id="error1" style="color: Red; display: none">* Please Enter Number Only</span>
		</li>		<li id="li_6" >
		<label class="description" for="element_6">No .of Cutting </label>
		<div>
			<input id="element_6" name="no_cutting" class="element text medium" type="text" onkeypress="return IsNumeric2(event);"/> 
		</div> 
                <span id="error2" style="color: Red; display: none">* Please Enter Number Only</span>
		</li>		<li id="li_7" >
		<label class="description" for="element_7">Avg 3mtr Billet Wt(in Kg) </label>
		<div>
			<input id="element_7" name="3mtrbilletwt" class="element text medium" type="text" onkeypress="return IsNumeric3(event);"/> 
		</div> 
                <span id="error3" style="color: Red; display: none">* Please Enter Number Only</span>
		</li>		<li id="li_8" >
		<label class="description" for="element_8">Avg 6mtr Billet Wt(in Kg) </label>
		<div>
			<input id="element_8" name="6mtrbilletwt" class="element text medium" type="text" onkeypress="return IsNumeric4(event);"/> 
		</div> 
                <span id="error4" style="color: Red; display: none">* Please Enter Number Only </span>
		</li>		<li id="li_9" >
		<label class="description" for="element_9">No .of Billets BP Due to MR &BD (3mtr) </label>
		<div>
			<input id="element_9" name="bbp3mtr" class="element text medium" type="text" onkeypress="return IsNumeric5(event);"/> 
		</div> 
                <span id="error5" style="color: Red; display: none">* Please Enter Number Only </span>
		</li>		<li id="li_10" >
		<label class="description" for="element_10">No .of Billets BP Due to MR &BD (6mtr) </label>
		<div>
			<input id="element_10" name="bbp6mtr" class="element text medium" type="text" onkeypress="return IsNumeric6(event);"/> 
		</div> 
                <span id="error6" style="color: Red; display: none">* Please Enter Number Only</span>
		</li>		
                <li id="li_11" >
		<label class="description" for="element_11">Stand<span class="required">*</span>  </label>
		<div>
			<select class="element text medium " name ="stand" id ="stand" required/> 
		
                <?php
                $q3=mysqli_query($link,"select * from STAND  ORDER BY stand_id ASC"  );
                 $r3= mysqli_num_rows($q3);           
                 
                    while ($r3= mysqli_fetch_array($q3)){
                  
                  echo "<option value='".$r3['stand_name']."'>".$r3['stand_name']."</option>";
                    }
                    ?>
                   </select>
                    </div>
                </li>
                <li id="li_12" >
		<label class="description" for="element_12">Responsible Person<span class="required">*</span>   </label>
		<div>
		    <select class="element text medium " name ="resp_person" id ="resp_person" required/> 
		
                <?php
                $q4=mysqli_query($link,"select * from res_person where shift_formen=0 ORDER BY res_per_id DESC");
                 $r4= mysqli_num_rows($q4);           
                 
                    while ($r4= mysqli_fetch_array($q4)){
                  
                  echo "<option value='".$r4['res_per_name']."'>".$r4['res_per_name']."</option>";
                    }
                    ?>
                   </select>
    
                </div> 
               
		</li>	
		
                <li id="li_13" >
		<label class="description" for="element_13">Location COde<span class="required">*</span>  </label>
		<div>
			<div>
		    <select class="element text medium " name ="loc_code" id ="loc_code" required/> 
		
                <?php
                $q5=mysqli_query($link,"select * from location ORDER BY loc_id DESC");
                 $r5= mysqli_num_rows($q5);           
                 
                    while ($r5= mysqli_fetch_array($q5)){
                  
                  echo "<option value='".$r5['loc_name']."'>".$r5['loc_name']."</option>";
                    }
                    ?>
                   </select>
  
		</div> 
		</li>		<li id="li_14" >
		<label class="description" for="element_14">Dept <span class="required">*</span> </label>
		<div>
                    <select class="element text medium " name ="dep_name" id ="dep_name" required/> 

                    <?php
                    $q6 = mysqli_query($link, "select * from department ORDER BY dep_id DESC");
                    $r6 = mysqli_num_rows($q6);

                    while ($r6 = mysqli_fetch_array($q6)) {

                        echo "<option value='" . $r6['dep_name'] . "'>" . $r6['dep_name'] . "</option>";
                    }
                    ?>
                    </select>
                </div> 
                </li>		<li id="li_15" >
		<label class="description" for="element_15">Shift Formen<span class="required">*</span>  </label>
		<div><select class="element text medium " name ="shift_formen" id ="shift-formen" required/> 
		
                <?php
                $q7=mysqli_query($link,"select * from res_person where shift_formen=1 ORDER BY res_per_id DESC");
                 $r7= mysqli_num_rows($q7);           
                 
                    while ($r7= mysqli_fetch_array($q7)){
                  
                  echo "<option value='".$r7['res_per_name']."'>".$r7['res_per_name']."</option>";
                    }
                    ?>
                   </select>
    
		</div> 
		</li>		<li id="li_16" >
		<label class="description" for="element_16">Reason Code <span class="required">*</span> </label>
		<div>
			  <select class="element text medium " name ="reason_code" id ="reason_code" required/> 

                    <?php
                    $q8 = mysqli_query($link, "select * from reason ORDER BY reason_id DESC");
                    $r8 = mysqli_num_rows($q8);

                    while ($r8 = mysqli_fetch_array($q8)) {

                        echo "<option value='" . $r8['reason_code'] . "'>" . $r8['reason_code'] . "</option>";
                    }
                    ?>
                    </select>
		</div> 
		</li>		<li id="li_17" >
		<label class="description" for="element_17">BD Details And Action Taken </label>
		<div>
                    <textarea rows="4" cols="50" id="element_11" name="bd_action"></textarea>
		</div> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="63053" />
			    
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
