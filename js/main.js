function testAlert()
{
    alert("Test Success");
    var testInput =  $("#searchinput").val();
    alert(testInput);

}

function searchStart(flagtype)
{
    if(flagtype === 1)
    {

        var searchInput = $("#searchinput").val();
        //alert("Username search " + searchInput);
        startSearchLoad(searchInput)
    }
    else if (flagtype === 2)
    {
        alert("Employee ID search");

    }
    //trying to put another condition in just messes up somehow hmmm
    else
    {
        alert("LastName search");
    }

}

function startSearchLoad(inputSearch)
{
    $("#loadMessage").show();
    loadDoc(inputSearch);

}
function loadDoc(SearchInput) {

    $( "#success" ).load( "../controller/controller.php?action=adresults&searchInput=" + SearchInput, function(response, status, xhr ) {
        //$("#loader").hide();
        $("#loadMessage").hide();
        if ( status == "error" ) {
            var msg = "Sorry but there was an error: ";
            $( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
        }
    });
}