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
                    include '../view/ADResults.php';
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


?>