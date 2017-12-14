

/*THIS IS THE JAVASCRIPT CODE FOR SENDING MESSAGE TO SLACK , HERE WE HAVE USED THE AJAX CALL
 * AND IN THE AJAX CALL , IT IS CALLING SLACK.PHP , WHERE WE HAVE WRITTEN THE CODE OF THE POST MESSAGE TO SLACK 
 * HERE IN THE AJAX CALL, WE ARE CALLING CHECKSLACK FUNCTION AND SENDING , TYPE OF SCRAP ,STOC DETAILS , PLANTID AND DATE 
 * 
 */ 
function testSlack(typeOfScrapArray, stockArray, srArray, ascArray,rowData){
        var scrapDate = document.getElementById("date").value;
        var furnaceName= document.getElementById("plantid").value;

           $.ajax({
               url: 'Slack.php',
               type: 'post',
               async: false,
               data: {'action': 'checkSlack', 'typeOfScrapArray' : typeOfScrapArray, 'stockArray' : stockArray, 'srArray' : srArray, 'ascArray' : ascArray, 'scrapDate': scrapDate, 'furnaceName':furnaceName,'rowData':rowData},                                                                                                                                                                                                                            
               error: function (xhr, desc, err) {
                   alert ('error');
                   console.log(xhr);
                   console.log("Details: " + desc + "\nError:" + err);
               }
       });
}

