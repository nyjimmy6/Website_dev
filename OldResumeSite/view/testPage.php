<?php include "../view/headFile.php" ?>

<div class = "container">
<div class="blog-header">
	<form id ="submitForm" action "../controller/controller.php?action=inputCompany" method="POST">
	 
		<label>Company Code</label>
		<input type="text" name ="companyCode" id = "companyCode" value =""/>
	
	  <input type="submit"/>
	</form>
</div>
</div>

<?php include "../view/footerFile.php" ?>