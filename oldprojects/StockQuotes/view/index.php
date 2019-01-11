<!DOCTYPE html> 
 
 <html> 
 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <title>  Index </title>
    </head> 
	
	<body>
            
            <?php $dir ='C:\xampp\htdocs\oldprojects\StockQuotes\view\Lists\txtFiles';
            $files = scandir($dir);
            $x =0;
            foreach ($files as $fileList)
            {
                $x +=1;
            }
            for($y = 2; $y < $x; $y++)
            {
            echo '<br>';
                ?>
            <a href='../controller/controller.php?action=ListA&fileName=<?php echo $files[$y]?>'><br>Stock List: <?php echo $files[$y]?> <br><br></a>
            <?php
            } ?>
           
              
            
           
              
               
               
               
        </body>
        
 </html>

<!-- <a href='../controller/controller.php?action=ListE'><br>Stocks 'E'<br><br></a>
               <a href='../controller/controller.php?action=ListF'><br>Stocks 'F'<br><br></a>
               <a href='../controller/controller.php?action=ListG'><br>Stocks 'G'<br><br></a>
               <a href='../controller/controller.php?action=ListH'><br>Stocks 'H'<br><br></a>
               <a href='../controller/controller.php?action=ListI'><br>Stocks 'I'<br><br></a>
               <a href='../controller/controller.php?action=ListJ'><br>Stocks 'J'<br><br></a>
               <a href='../controller/controller.php?action=ListK'><br>Stocks 'K'<br><br></a>
               <a href='../controller/controller.php?action=ListL'><br>Stocks 'L'<br><br></a>
               <a href='../controller/controller.php?action=ListM'><br>Stocks 'M'<br><br></a>
               <a href='../controller/controller.php?action=ListN'><br>Stocks 'N'<br><br></a>
               <a href='../controller/controller.php?action=ListO'><br>Stocks 'O'<br><br></a>
               <a href='../controller/controller.php?action=ListP'><br>Stocks 'P'<br><br></a>
               <a href='../controller/controller.php?action=ListQ'><br>Stocks 'Q'<br><br></a>
               <a href='../controller/controller.php?action=ListR'><br>Stocks 'R'<br><br></a>
               <a href='../controller/controller.php?action=ListS'><br>Stocks 'S'<br><br></a>
               <a href='../controller/controller.php?action=ListT'><br>Stocks 'T'<br><br></a>
               <a href='../controller/controller.php?action=ListU'><br>Stocks 'U'<br><br></a>
               <a href='../controller/controller.php?action=ListV'><br>Stocks 'V'<br><br></a>
               <a href='../controller/controller.php?action=ListW'><br>Stocks 'W'<br><br></a>
               <a href='../controller/controller.php?action=ListX'><br>Stocks 'X'<br><br></a>
               <a href='../controller/controller.php?action=ListY'><br>Stocks 'Y'<br><br></a>
               <a href='../controller/controller.php?action=ListZ'><br>Stocks 'Z'<br><br></a>-->