<?php 
	
	include 'headFile.php' 
?>




<div class = "container">

<table class = "table table-striped">
<thead>
<tr>
<?php
foreach($outJSON['Meta Data'] as $metaData => $metaKey)
{
	
	if($metaData == '2. Symbol')
	{
		echo '<th scope="col"> Company Code </th>';
	}
	else
	{
		echo '<th scope="col">'. $metaData . '</th>';
	}
}
?>
</tr>
<tr>
<?php


foreach($outJSON['Meta Data'] as $metaData)
{
	
	echo '<th scope="col">'. $metaData . '</th>';
}

?>



</tr>
<tr>
	<th scope="col">Date </th>
	<th scope="col">Open </th>
	<th scope="col">High </th>
	<th scope="col">Low </th>
	<th scope="col">Close </th>
	<th scope="col">Volume </th>
 </tr>
 </thead>
 
 <tbody>
 
 
 <?php
 //moving through the json arrays - PITA / first level grabs the 2 arrays Meta data and time 
 
//unsetting the metadata array, wont need and also gets in the way of loops 
unset($outJSON['Meta Data']);

//looping through array, going down one level to the dates
foreach($outJSON as $first => $data)
	{
		//getting the dates as values and not as keys of other arrays
		foreach($data as $output =>$date)
		{
			echo '<tr><td>' . $output . '</td>';
			//getting values under dates arrays and rounding them
			foreach($date as $item)
			{
					echo '<td>$' . round($item, 2) . '</td>';
			}
			echo '</tr>';
		
		}

	}
	
 ?>
 
 
 </tbody>
</table>


<?php include 'footerFile.php' ?>