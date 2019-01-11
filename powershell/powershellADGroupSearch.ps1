param([string]$userID) 

$userID = "AA1379"

$ADGroups = @()

$ADGroupsOutPut = Get-ADPrincipalGroupMembership $userID | select name


foreach($group in $ADGroupOutPut)
{
    $ADGroups += $group.name
}

return $ADGroups | ConvertTo-Json
