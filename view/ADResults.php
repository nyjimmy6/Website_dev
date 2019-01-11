<?php

$userID = $_GET['searchInput'];

$psPath = "../powershell/powershellSearch.ps1";

$query = shell_exec("powershell -command $psPath -userID $userID");


//reminder to decode json when it arrives ----
$decodeJSON = json_decode($query, true);


//need to go down a level in array, probably because Powershell messing up JSON since its hash array
//Because Hash array first level, second level was AD group and Adinfo seperation, and powershell will return an array into that as the 3rd level
/*
 * "ADGroups":  [
                     {
                         "name":  "Domain Users"
                     },
                     {
                         "name":  "TestGroupA"
                     }
                 ],
    "ADinfo":  [
                  && index 0 && {
                       "DisplayName":  "Anita Allen",
                       "EmailAddress":  "AnitaBAllen@rhyta.com",
                       "LockedOut":  false,
                       "PasswordExpired":  true
                   }
               ]
 *
 *
 *
 */

//setting variables for ADInfo level
$clearJSON = $decodeJSON['ADinfo'];

//setting so variables will be able to pull associative index
$outJSON = $clearJSON[0];
$fullname = $outJSON['DisplayName'];
$emailAddress =$outJSON['EmailAddress'];
$lockStatus =$outJSON['LockedOut'];
$ExpiredPassword = $outJSON['PasswordExpired'];

$clearADGroup_JSON = $decodeJSON['ADGroups'];

//getting length of array to count through
$GroupLength = count($clearADGroup_JSON);
//initializing new array to make one dimension array
$newArr = array();
//looping through $clearADGroup_JSON
for($x = 0; $x < $GroupLength; $x++)
{
    //grabbing value from incrementing index and the key inded
    $value = $clearADGroup_JSON[$x]['name'];
    //assigning value into the new array
    $newArr[$x] = $value;
   // echo $newArr[$x];
}
echo $newArr[1];
?>

<div class = "container">
    <div class="m-md-3 row">
        <div class="col">
            <b>Name: </b> <p> <?php echo $fullname; ?></p>
        </div>
        <?php
        if ($lockStatus == false)
         {
             echo "<div class='col alert-success'><b>Account Locked: </b> <p>No </p></div></div>";
         }
        else
            {
                echo "<div class='col alert-danger'><b>Account Locked: </b> <p>Yes </p></div></div>";
            }
        ?>

        <div class="m-md-3 row">
        <div class="col">
            <b>Email: </b> <p><?php echo $emailAddress ?> </p>
        </div>
            <?php
                if ($ExpiredPassword == false)
                {
                    echo "<div class='col alert-success'><b>Password Expired </b> <p>No </p></div></div>";
                }
                else
                {
                    echo "<div class='col alert-danger'><b>Password Expired </b> <p>Yes</p></div></div>";

                }
            ?>
            <div class="m-md-3 row">
                <div class="col">
                    <b>Office Location: </b><p> Test</p>
                </div>
            </div>






<table class="m-md-3 table">
    <thead>
    <tr>

        <th>AD Groups</th>
        <th> </th>

    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Mark</td>
        <td>Otto</td>
    </tr>
    <tr>
        <td>Jacob</td>
        <td>Thornton</td>
    </tr>
    </tbody>
</table>

</div>




<?php ?>
