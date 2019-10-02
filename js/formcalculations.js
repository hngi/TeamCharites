
function getHomeCost()
{
    
    var theForm  = document.forms["netWorthForm"].elements["home"].value;
    // var homeCost = theForm.elements["home"];

    var howmuch =0;
    //If the textbox is not blank
    if(theForm != " ")
    {
        howmuch = parseInt(theForm);
    }


return howmuch;
}


function getLandCost()
{
    
    var theForm  = document.forms["netWorthForm"].elements["land"].value;
    
    var howmuch =0;
    //If the textbox is not blank
    if(theForm != " ")
    {
        howmuch = parseInt(theForm);
    }


return howmuch;
}


function getInvestmentCost()
{
    
    var theForm  = document.forms["netWorthForm"].elements["investments"].value;
    // var homeCost = theForm.elements["home"];

    var howmuch =0;
    //If the textbox is not blank
    if(theForm != " ")
    {
        howmuch = parseInt(theForm);
    }


return howmuch;
}
    
console.log(getHomeCost());    
function calculateTotal()
{
    
    var assetValue =  getHomeCost() + getLandCost() + getInvestmentCost();
    
    //display the result
    var divobj = document.getElementById('totalPrice');
    divobj.style.display='block';
    divobj.innerHTML = "Total Asset Value $"+assetValue;

}

function hideTotal()
{
    var divobj = document.getElementById('totalPrice');
    divobj.style.display='none';
}