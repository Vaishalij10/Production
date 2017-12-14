function testCheck (rowData){
    var scrapDate = document.getElementById("date").value;
        var furnaceName= document.getElementById("plantid").value;
        var reMarks= document.getElementById("remarks").value;
        //alert('hi');
        //alert(scrapDate);
        //alert(furnaceName);
        //alert(reMarks);
            $.ajax({
                url: 'AddScrap.php',
                type: 'post',
                async: false,
                data: {'action': 'checkTest', 'rowData': rowData,'scrapDate': scrapDate,'furnaceName':furnaceName,'reMarks':reMarks},
                error: function (xhr, desc, err) {
                    alert ('error');
                    console.log(xhr);
                    console.log("Details: " + desc + "\nError:" + err);
                }
        });
}/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


