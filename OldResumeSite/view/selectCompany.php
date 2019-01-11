<?php include 'headFile.php';?>



<div class = "container">
<div class="blog-header">
	<form action = "../controller/controller.php?action=inputCompany" method="post">
		<div>
			<label>Company Code</label>
			<input type="text" name ="companyCode" id = "companyCode" value =""/>
			<input type="submit"/>
		</div>
		
	</form>
</div>
</div>



<?php include 'footerFile.php' ?>