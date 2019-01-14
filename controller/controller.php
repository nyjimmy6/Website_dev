<?php

            require_once '../model/model.php';
            if  (isset($_POST['action'])) // check get and post
            {
            $action = $_POST['action'];
            }
            else if (isset($_GET['action']))
            {
            $action = $_GET['action'];
            }
            else
            {
            include('../view/index.php'); // default action
            exit();
            }

            switch ($action) {
                case 'contact':
                    include '../view/contact.php';
                    break;
                case 'home':
                    include '../view/index.php';
                    break;
                case 'otherprojects':
                    include '../view/otherprojects.php';
                    break;
                case 'contact':
                    include '../view/contact.php';
                    break;
                case 'about':
                    include '../view/about.php';
                    break;
                case 'signin':
                    include '../view/signin.php';
                    break;
                case 'adsearch':
                    include '../view/ADWebSearch.php';
                    break;
                case 'adresults':
                    checkFlagType();
                    break;



//--------------------------------------------------------------//
                case 'resume':
                    include '../view/resume.php';
                    break;
                case 'getFinance':
                    getFinanceInfo();
                    break;
                case 'selectCompany':
                    selectedCompany();
                    break;
                case 'inputCompany':
                    getCompanyData();
                    break;
            }

function checkFlagType()
{
    $flag = $_GET['flagtype'];

    if($flag == 1)
    {
        showADResults($flag);

    }
    elseif ($flag == 2)
    {
        showADResults($flag);
    }
    else
    {
        showADResults($flag);

    }


}
function lastNameReturn($searchInput)
{
    $userID = $searchInput;

    $psPath = "../powershell/powershellSearch.ps1";

    $query = shell_exec("powershell -command $psPath -userID $userID");

    // var_dump($query);

    //have to trim query variable because powershell or PHP likes to throw in space at the end
    $test = rtrim($query);
    //var_dump($test);

    if ($test == "no") {
        include '../view/nosearchresults.php';

    } else {
        //reminder to decode json when it arrives ----
        $decodeJSON = json_decode($query, true);

        include '../view/ADResults.php';

    }


}
function showADResults($flagSearch)
{
    if ($flagSearch == 1) {

        $userID = $_GET['searchInput'];

        $psPath = "../powershell/powershellSearch.ps1";

        $query = shell_exec("powershell -command $psPath -userID $userID");

        // var_dump($query);

        //have to trim query variable because powershell or PHP likes to throw in space at the end
        $test = rtrim($query);
        //var_dump($test);

        if ($test == "no") {
            include '../view/nosearchresults.php';

        } else {
            //reminder to decode json when it arrives ----
            $decodeJSON = json_decode($query, true);

            include '../view/ADResults.php';

        }

    }
    elseif($flagSearch == 2)
    {

        $empID = $_GET['searchInput'];

        $psPath = "../powershell/powershell_EMP_ID_Search.ps1";

        $query = shell_exec("powershell -command $psPath -employeeID $empID");

        // var_dump($query);

        //have to trim query variable because powershell or PHP likes to throw in space at the end
        $test = rtrim($query);
        //var_dump($test);

        if ($test == "no") {
            include '../view/nosearchresults.php';

        } else {
            //reminder to decode json when it arrives ----
            $decodeJSON = json_decode($query, true);

            include '../view/ADResults.php';

        }

    }
    elseif($flagSearch == 3)
    {
        $inputLastName = $_GET['searchInput'];

        $psPath = "../powershell/LastNameSearch.ps1";

        $query = shell_exec("powershell -command $psPath -lastName $inputLastName");

        // var_dump($query);
        $decodeJSON = json_decode($query, true);
        //have to trim query variable because powershell or PHP likes to throw in space at the end
        $test = rtrim($query);
       // var_dump($decodeJSON[0]);

        if ($test == "no") {
            include '../view/nosearchresults.php';

        }
        elseif (is_null($decodeJSON[0]))
        {
            //print_r ("returning null");
            //include '../controller/controller.php?action=adresults&searchInput=' . $decodeJSON['Name'] . '&flagtype=1';

            lastNameReturn($decodeJSON['Name']);

        }
        else {
            //reminder to decode json when it arrives ----


            include '../view/select_User.php';

        }
    }
}


?>