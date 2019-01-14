<?php
//setting variables for ADInfo level
//$clearJSON = $decodeJSON['ADinfo'];

$GroupLength = count($decodeJSON);
//var_dump($decodeJSON);
//initializing new array to make one dimension array
$newArr = array();
//looping through $clearADGroup_JSON
for ($x = 0; $x < $GroupLength; $x++) {
    //grabbing value from incrementing index and the key inded
    $value = $decodeJSON[$x];
    //assigning value into the new array
    $newArr[$x] = $value;
    // echo $newArr[$x];

}
//var_dump($newArr);
//test
//setting so variables will be able to pull associative index




?>
<div class = "container">
<table class="table m-md-2">
    <thead class="thead-dark">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Username</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for($x = 0; $x < $GroupLength; $x++)
    {
        //print_r($decodeJSON[$x]);
        echo '<tr>
                <th scope ="row">' . $x . '</th>
                <td>' . $decodeJSON[$x]['DisplayName'] . ' </td>
                <td>' . $decodeJSON[$x]['EmailAddress'] . '</td>
                <td><a href = "#" onclick ="searchStart(4)"><div id = "selectedName">' . $decodeJSON[$x]['Name'] . '</div></td>

            </tr>';

    }

    ?>

    </tbody>
</table>
</div>
<?php ?>
