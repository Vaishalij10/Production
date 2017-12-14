<?php

/**
 * IN THE SLACK.PHP WE ARE SENDING THE MESSAGE TO THE SLACK , FOR THIS WE HAVE CALL A FUNCTION FROM THE POSTMESSAGETOSLACK.PHP CODE
 * postMessagesToSlack_scrapregister, THIS IS THE FUNCTION WHICH WE HAVE CALLED , AND SENDING THE LIVE STOCK INFORMATION TO THE SLACK CHANNEL
 * 
 */
//   require_once '..\Connection.php';
   require_once '..\DBfile.php';
   require_once '..\PostMessagetoSlack.php';
   
   if ($_POST['action'] === "checkSlack") {

       
       $scrapDate = $_POST['scrapDate'];
        $show_date = DateTime::createFromFormat('d/m/Y', $scrapDate)->format('Y-m-d');
       $typeOfScrapArray = $_POST['typeOfScrapArray'];
       $stockArray = $_POST['stockArray'];
      
      $furnaceId=ScrapRpt::getInstance()->get_furnace_id($_POST['furnaceName']);
 
 $slackMsg=''."*Date-*".'`'.$show_date.'`'."\n"."*Furnace-*".'`'.$furnaceId.'`';
    
      for($r=0; $r <= count($typeOfScrapArray)-1; $r++){ 
       $slackMsg = $slackMsg."\n *" .$typeOfScrapArray[$r].' *'.'-'.' `' .$stockArray[$r].'`';
      $total+= $stockArray[$r];    
      }
      echo $slackMsg;
      Slack::getInstance()->postMessagesToSlack_scrapregister( 
"$slackMsg
*Total*- *$total*" ,"Scrap_Sorting");
      // echo var_dump($typeOfScrapArray);

 
   }
 