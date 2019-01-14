param([string]$lastName) 

#$lastNameOUT = @{}
#$lastName = "Mentzer"
try
{
    #$lastName = "asdf"

    $output = Get-ADUser -Filter {Surname -eq $lastName} -Properties DisplayName, Name, EmailAddress| Select DisplayName, Name, EmailAddress

    $count = $output.Length
   # Write-Host $count
    if($output -eq $null)
    {
        return 'no'
    }
    elseif($count -lt 1)
    {
        
        #$output += 1
        #Write-Host $output[1]
        
        return $output | ConvertTo-Json
    }
    else
    {
        #Write-Host $countResults
        return $output | ConvertTo-Json
    }
}
catch
{
    Return 'no'
}


#$ADout = Get-ADPrincipalGroupMembership  | select name


