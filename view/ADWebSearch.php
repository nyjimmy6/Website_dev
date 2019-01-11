<?php include 'header.php'; ?>
<style>
    /* Center the loader */
    #loader {
        position: relative;
        left: 50%;
        top: 50%;
        z-index: 1;
        width: 150px;
        height: 150px;
        margin: 10px 0 0 -70px;
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Add animation to "page content" */
    .animate-bottom {
        position: relative;
        -webkit-animation-name: animatebottom;
        -webkit-animation-duration: 1s;
        animation-name: animatebottom;
        animation-duration: 1s
    }

    @-webkit-keyframes animatebottom {
        from { bottom:-100px; opacity:0 }
        to { bottom:0px; opacity:1 }
    }

    @keyframes animatebottom {
        from{ bottom:-100px; opacity:0 }
        to{ bottom:0; opacity:1 }
    }

    #myDiv {
        display: none;
        text-align: center;
    }
</style>
<div class="container">
    <div class = "mt-5 row">
    <div class="input-group">
        <input id = "searchinput" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">

    </div>
        <button type="button" class="btn btn-primary col mt-2 ml-2" onclick = " searchStart(1)">Username</button>
        <button type="button" class="btn btn-primary col mt-2 ml-2" onclick = " searchStart(2)">EmployeeID</button>
        <button type="button" class="btn btn-primary col mt-2 ml-2" onclick = " searchStart(3)">LastName</button>
    </div>
    <div id = "demo">


    </div>


</div>

<div id="loadMessage" style = "width: auto; hieght: 100%; text-align: center; padding: 100px 0 0 0px; display: none">
    <div id="loader"></div>
    Please wait</div>
<div id="success"></div>


<div id="error"></div>

<script>
    function displayTest(){
        $("#loadMessage").show();
        setTimeout(loadDoc(), 10000);
    }




</script>
<?php include 'footer.php'; ?>
