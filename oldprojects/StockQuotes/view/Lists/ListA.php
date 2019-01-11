<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Stocks </title>
        <script type ="text/javascript" src="C:\xampp\htdocs\oldprojects\StockQuotes\javascript\sorttable.js"></script>
    </head>
    <body>




<?php
/**
 * Class to fetch stock data from Yahoo! Finance
 *
 */

    class YahooStock {

        /**
         * Array of stock code
         */
        private $stocks = array();

        /**
         * Parameters string to be fetched  
         */
        private $format;

        /**
         * Populate stock array with stock code
         *
         * @param string $stock Stock code of company   
         * @return void
         */
        public function addStock($stock)
        {
            $this->stocks[] = $stock;
        }

        /**
         * Populate parameters/format to be fetched
         *
         * @param string $param Parameters/Format to be fetched
         * @return void
         */
        public function addFormat($format)
        {
            $this->format = $format;
        }

        /**
         * Get Stock Data
         *
         * @return array
         */
        public function getQuotes()
        {       
            
        
            $result = array();     
            $format = $this->format;
 
            foreach ($this->stocks as $stock)
            {     
       
              ini_set('max_execution_time', 300);
              $s = file_get_contents("http://finance.yahoo.com/d/quotes.csv?s=$stock&f=sghpl1n");
                /**
                 * convert the comma separated data into array
                 */
               $data = explode( ',', $s);
                /**
                 * populate result array with stock code as key
                 */
                $result[$stock] = $data;
                
            }
            return $result;
        }
    }
    $objYahooStock = new YahooStock;

    /**
        Add format/parameters to be fetched

        s = Symbol
        n = Name
        l1 = Last Trade (Price Only)
        d1 = Last Trade Date
        t1 = Last Trade Time
        c = Change and Percent Change
        v = Volume
     */
    $objYahooStock->addFormat("sghpl1n");

$nameOfFile = $_GET["fileName"];
//echo $nameOfFile;
$txt_file    = file_get_contents('C:\xampp\htdocs\oldprojects\StockQuotes\\view\Lists\txtFiles\danslist.txt');
$rows        = explode("\n", $txt_file);
array_shift($rows);

foreach($rows as $row => $data)
{
    //get row data
    $row_data = explode('|', $data);

    $info[$row]['id']= $row_data[0];
    //display data
   $objYahooStock->addStock($info[$row]['id']);
   
}
   
    ?>





<!--<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}/style>-->
        <style>
            table.sortable thead {
    background-color:#eee;
    color:#666666;
    font-weight: bold;
    cursor: default;
            }
            </style>




        
    <table class ="sortable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Symbol</th>
                <th>Day Low</th>
                <th>Day High</th>
                <th>Previous Day</th>
                <th>Dan Equation</th>
                <th>Last Trade</th>
                <th>Resistance Level</th>
                <th>Resistance Level 2 </th>
                <th>Buy (Y/N)</th>

                <!--<th>Last Trade Price</th>
                <th>Last Trade Time</th>
                <th>Change and Percent Change</th>
                <th>Volume</th>-->
            </tr>
        </thead>
        <tbody>
    <?php 
    foreach( $objYahooStock->getQuotes() as $code => $stock)
    {
        $varible1 = $stock[1];
        $varible2 = $stock[2];
        $varible3 = $stock[3];
        
        $DanEquation = ($varible1 + $varible2 + $varible3)/3;
        $varR1 = ($DanEquation * 2) - $stock[1];
        $varR2 = $DanEquation +($varible2 - $varible1);
        ?>
       
        <tr>
            <td><?php echo $stock[5]; ?></td>
            <td><?php echo $stock[0]; ?></td>
            <td><?php echo $stock[1]; ?></td>
            <td><?php echo $stock[2]; ?></td>
            <td><?php echo $stock[3]; ?></td>
            <td><?php echo round($DanEquation, 3); ?></td>
            <td><?php echo $stock[4]; ?></td>
            <td><?php echo round($varR1, 3); ?></td>
            <td><?php echo round($varR2, 3); ?></td>
            
            
            <td><?php 
                if ($DanEquation < $stock[4])
                {
                    echo 'Y';
                    
                }
                else { echo 'N';
                    
                }
                ?>
            
            
            

           
        </tr>

        <?php
    }
?>
        </tbody>
    </table>
</body>
</html>