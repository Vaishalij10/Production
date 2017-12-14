function scrapKpiDateCheck() {
     alert ('in test Validation Function ');
    var furnace = document.getElementById("furnace").value;
    var date = document.getElementById("date").value;
   
    var finalResult;
    $(document).ready(function () {
        $.ajax({
            url: 'ScrapKPIValidations.php',
            type: 'post',
            async: false,
            data: {'action': 'checkScrapKPIDate', 'furnace': furnace, 'date': date},
            success: function (result) {
                if (result > 0) {
                    alert("Date is already entered");
                    alert("Please Enter New Date");
                    finalResult = false;
                } else {
                    if (confirm('ARE YOU SURE YOU WANT TO SUBMIT THE FORM ?'))
                  
                    {
                        finalResult = true;
                         
                    } else {
                        finalResult = false;
                    }
                }
            },
            error: function (xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
            }
        });
    });
    // alert('FinalResult');
    return finalResult;
}                              



