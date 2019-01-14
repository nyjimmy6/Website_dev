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
        startSearchLoad(searchInput, flagtype);
    }
    else if (flagtype === 2)
    {
        var searchInput = $("#searchinput").val();
        //alert("Username search " + searchInput + "FlagType = 2");
        startSearchLoad(searchInput, flagtype);

    }
    //out of order because of doing last name listing till last
    else if(flagtype === 4)
    {
        //making sure that ID name is different than for the search bar
        //burrned myself because i fogot the page is still loaded in
        var searchInput = $("#selectedName").text();
        //forcing flag type to 1 since it is going to be userID search
        startSearchLoad(searchInput, 1);
      //  alert(searchInput);

    }
    //trying to put another condition in just messes up somehow hmmm
    else
    {
        var searchInput = $("#searchinput").val();
        //alert("Username search " + searchInput + "FlagType = 2");
        startSearchLoad(searchInput, flagtype);
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