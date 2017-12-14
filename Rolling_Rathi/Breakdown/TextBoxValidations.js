 var specialKeys = new Array();
                                    specialKeys.push(8); //Backspace
                                   
                                    function IsNumericValidation(e) {
                                    var keyCode = e.which ? e.which : e.keyCode
                                    var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
                                    return ret;
                                    }
                                     function IsNumericValidationDecimal(e) {
                                    var keyCode = e.which ? e.which : e.keyCode
                                    var ret = ((keyCode >= 46 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
                                    return ret;
                                    }
                                               function IsNumeric(e) {
                                               var ret = IsNumericValidation(e);
                                    document.getElementById("error").style.display = ret ? "none" : "inline";
                                  return ret;
                                  }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
                                    
                                    
                                    
                                               function IsNumeric1(e) {
                                               var ret = IsNumericValidation(e);
                                    document.getElementById("error1").style.display = ret ? "none" : "inline";
                                  return ret;
                                  }
                                
                                   
                                               function IsNumeric2(e) {
                                               var ret = IsNumericValidation(e);
                                    document.getElementById("error2").style.display = ret ? "none" : "inline";
                                  return ret;
                                  }
                                                    
                                               function IsNumeric3(e) {
                                               var ret = IsNumericValidationDecimal(e);
                                    document.getElementById("error3").style.display = ret ? "none" : "inline";
                                  return ret;
                                  }
                                
                                   
                                               function IsNumeric4(e) {
                                               var ret =  IsNumericValidationDecimal(e);
                                    document.getElementById("error4").style.display = ret ? "none" : "inline";
                                  return ret;
                                  }
                                 
                                  
                                               function IsNumeric5(e) {
                                               var ret = IsNumericValidation(e);
                                    document.getElementById("error5").style.display = ret ? "none" : "inline";
                                  return ret;
                                  }
                                
                                   
                                               function IsNumeric6(e) {
                                               var ret = IsNumericValidation(e);
                                    document.getElementById("error6").style.display = ret ? "none" : "inline";
                                  return ret;
                                  }