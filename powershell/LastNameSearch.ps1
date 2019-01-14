$lastName = @()

$lastName = Get-ADUser -Filter {Surname -eq "Allen"} -Properties DisplayName, EmployeeID, EmailAddress | Select DisplayName, EmployeeID, EmailAddress

$countResults = $lastName.Length

if($countResults -lt 1)

{
    Write-Host "Success"
    return $lastName | ConvertTo-Json
}
else
{
    Write-Host $countResults
    return $lastName | ConvertTo-Json
}


#$ADout = Get-ADPrincipalGroupMembership  | select name


