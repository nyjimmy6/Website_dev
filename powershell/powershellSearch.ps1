param([string]$userID) 

$output = ""

$userID = "AA1379"
$innerArray = @()
$ADGroups = @()
$output = @{

ADinfo = @() 
ADGroups = @()

}



$output.ADinfo += Get-ADUser -Filter {Name -eq $userID} -Properties DisplayName, Surname , EmailAddress, LockedOut, PasswordExpired | Select DisplayName, EmailAddress, LockedOut, PasswordExpired
$ADGroupsOutPut = Get-ADPrincipalGroupMembership $userID | select name


foreach($group in $ADGroupOutPut)
{
    $ADGroups += $group.name
}

$output.ADGroups += $ADGroupsOutPut

If($output -eq $Null)
{
    Return "No User Found"

}
Else
{
  # return $output | ConvertTo-Json
   #return $ADGroupOutPut |ConvertTo-Json
   return $output | ConvertTo-Json
}



