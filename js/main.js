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
        startSearchLoad(searchInput, flagtype)
    }
    else if (flagtype === 2)
    {
        var searchInput = $("#searchinput").val();
        //alert("Username search " + searchInput + "FlagType = 2");
        startSearchLoad(searchInput, flagtype)

    }
    //trying to put another condition in just messes up somehow hmmm
    else
    {
        var searchInput = $("#searchinput").val();
        //alert("Username search " + searchInput + "FlagType = 2");
        startSearchLoad(searchInput, flagtype)
    }

}

function startSearchLoad(inputSearch, inputFlag)
{
    $("#loadMessage").show();
    $("#success").hide();
    loadDoc(inputSearch, inputFlag);

}
function loadDoc(SearchInput, flagInput) {

    $( "#success" ).load( "../controller/controller.php?action=adresults&searchInput=" + SearchInput +"&flagtype=" + flagInput, function(response, status, xhr ) {
        //$("#loader").hide();
        $("#loadMessage").hide();
        $("#success").show();
        if ( status == "error" ) {
            var msg = "Sorry but there was an error: ";
            $( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
        }
    });
}