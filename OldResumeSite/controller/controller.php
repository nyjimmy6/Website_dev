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

        switch ($action) 
        {
        case 'home':
            include '../view/index.php';
            break;
        case 'finance':
            include '../view/loadPage.php';
            break;
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
		
        
       // case 'Alert':
            //include '../view/composeAlert.php';
           // break;
        
      }
function getCompanyData()
	{
		$companyCode = $_POST['companyCode'];
		
		finaceGeneratePage($companyCode);
	}
function selectedCompany()
	{
		$companyCode ="";
		
		include '../view/selectCompany.php';
	}
	  
	  
	  
	  
function getFinanceInfo()
	{
		
		//URL for getting JSON - see advantage website for API info
		$jsonurl = "https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=MSFT&apikey=&apikey=QKO40SIM4U6E8EW7";
		//Getting contents of returned JSON 
		$json = file_get_contents($jsonurl);
		//decoding json and placing in an array
		$decodedJSON = json_decode($json, true);
		$outJSON = $decodedJSON;
		
		include '../view/finance_page.php';
	
	
	}
function finaceGeneratePage($inputCompanyCode)
	{
		//URL for getting JSON - see advantage website for API info
		$jsonurl = "https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=" . $inputCompanyCode . "&apikey=&apikey=QKO40SIM4U6E8EW7";
		//Getting contents of returned JSON 
		$json = file_get_contents($jsonurl);
		//decoding json and placing in an array
		$decodedJSON = json_decode($json, true);
		$outJSON = $decodedJSON;
		
		include '../view/selected_Finance_Code.php';
		
	}
        ?>