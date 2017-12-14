
// Validations for the Text box fields in the Scrap KPI form 

var specialKeys = new Array();
specialKeys.push(8); //Backspace
function IsNumericValidationDecimal(e) {
    var keyCode = e.which ? e.which : e.keyCode;
    var ret = ((keyCode >= 46 && keyCode <= 57) || specialKeys.indexOf(keyCode) !== -1);
    return ret;
}
function IsNumericValidation(e) {
    var keyCode = e.which ? e.which : e.keyCode;
    var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) !== -1);
    return ret;
}
function blRecipe(e) {
    var ret = IsNumericValidationDecimal(e);
    document.getElementById("blrecipe").style.display = ret ? "none" : "inline";
    return ret;
}
function acRecipe(e) {
    var ret = IsNumericValidationDecimal(e);
    document.getElementById("acrecipe").style.display = ret ? "none" : "inline";
    return ret;
}
function scrapStock(e) {
    var ret = IsNumericValidationDecimal(e);
    document.getElementById("scrapstock").style.display = ret ? "none" : "inline";
    return ret;
}
function manPower(e) {
    var ret = IsNumericValidation(e);
    document.getElementById("manpower").style.display = ret ? "none" : "inline";
    return ret;
}
function scrapSortingDust(e) {
    var ret = IsNumericValidationDecimal(e);
    document.getElementById("dust").style.display = ret ? "none" : "inline";
    return ret;
}
function scrapSortingCI(e) {
    var ret = IsNumericValidationDecimal(e);
    document.getElementById("castiron").style.display = ret ? "none" : "inline";
    return ret;
}
function scrapSortingOS(e) {
    var ret = IsNumericValidationDecimal(e);
    document.getElementById("oversize").style.display = ret ? "none" : "inline";
    return ret;
}

function cylinders(e) {
    var ret =IsNumericValidation (e);
    document.getElementById("cylinders").style.display = ret ? "none" : "inline";
    return ret;
}
function overSizeScrap(e) {
    var ret = IsNumericValidationDecimal(e);
    document.getElementById("oversizescrap").style.display = ret ? "none" : "inline";
    return ret;
}
function gasCuttingScrap(e) {
    var ret = IsNumericValidationDecimal(e);
    document.getElementById("gascutting").style.display = ret ? "none" : "inline";
    return ret;
}
 function furnaceSortedScrap(e) {
    var ret = IsNumericValidationDecimal(e);
    document.getElementById("fsscrap").style.display = ret ? "none" : "inline";
    return ret;
}    
 function scrapUnload(e) {
    var ret = IsNumericValidationDecimal(e);
    document.getElementById("scrapunload").style.display = ret ? "none" : "inline";
    return ret;
}  
 function jpProd(e) {
    var ret = IsNumericValidationDecimal(e);
    document.getElementById("jpprod").style.display = ret ? "none" : "inline";
    return ret;
} 
function jpBundle(e) {
    var ret = IsNumericValidation(e);
    document.getElementById("jpbundle").style.display = ret ? "none" : "inline";
    return ret;
} 
function jpPower(e) {
    var ret = IsNumericValidationDecimal(e);
    document.getElementById("jppower").style.display = ret ? "none" : "inline";
    return ret;
}  
function jpLightScrap(e) {
    var ret = IsNumericValidationDecimal(e);
    document.getElementById("jplscrap").style.display = ret ? "none" : "inline";
    return ret;
}
function iscProd(e) {
    var ret = IsNumericValidationDecimal(e);
    document.getElementById("iscprod").style.display = ret ? "none" : "inline";
    return ret;
} 
function iscBundle(e) {
    var ret = IsNumericValidation(e);
    document.getElementById("iscbundle").style.display = ret ? "none" : "inline";
    return ret;
} 
function iscPower(e) {
    var ret = IsNumericValidation(e);
    document.getElementById("iscpower").style.display = ret ? "none" : "inline";
    return ret;
}  
function spProd(e) {
    var ret = IsNumericValidationDecimal(e);
    document.getElementById("spprod").style.display = ret ? "none" : "inline";
    return ret;
} 

function spPower(e) {
    var ret = IsNumericValidation(e);
    document.getElementById("sppower").style.display = ret ? "none" : "inline";
    return ret;
}  
function stainlessSteel(e) {
    var ret = IsNumericValidation(e);
    document.getElementById("ssteel").style.display = ret ? "none" : "inline";
    return ret;
} 
function sortedAlum(e) {
    var ret = IsNumericValidation(e);
    document.getElementById("alum").style.display = ret ? "none" : "inline";
    return ret;
} 
function sortedBronze(e) {
    var ret = IsNumericValidation(e);
    document.getElementById("bronze").style.display = ret ? "none" : "inline";
    return ret;
} 
function sortedCopper(e) {
    var ret = IsNumericValidation(e);
    document.getElementById("copper").style.display = ret ? "none" : "inline";
    return ret;
} 