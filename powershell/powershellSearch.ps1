param([string]$userID) 

$output = ""

#$userID = "asdf"
$innerArray = @()
$ADGroups = @()
$output = @{

ADinfo = @() 
ADGroups = @()

}

try
{

    $output.ADinfo += Get-ADUser -Filter {Name -eq $userID} -Properties DisplayName, EmailAddress, LockedOut, PasswordExpired | Select DisplayName, EmailAddress, LockedOut, PasswordExpired
    $ADGroupsOutPut = Get-ADPrincipalGroupMembership $userID | select name


    foreach($group in $ADGroupOutPut)
    {
        $ADGroups += $group.name
    }

    $output.ADGroups += $ADGroupsOutPut

    If($output -eq $Null)
    {
        Return "No User found"

    }
    Else
    {
      # return $output | ConvertTo-Json
       #return $ADGroupOutPut |ConvertTo-Json
       return $output | ConvertTo-Json
    }
}
catch
{
    Return 'no'
}



