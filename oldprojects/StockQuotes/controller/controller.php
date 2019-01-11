<?php

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
        case 'ListA':
            include '../view/Lists/ListA.php';
            break;
        
        case 'ListB':
            include '../view/Lists/test.php';
            break;
        
       // case 'Alert':
            //include '../view/composeAlert.php';
           // break;
        
      }
        
        ?>