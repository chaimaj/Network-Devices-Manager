<?php include 'header.php'; ?>

<div class="container">
		
		<div class="form-bg">
			<form name="form1" method="post" action="checklogin.php">
				<h2>Authentification</h2>
				<p><input name="myusername" type="text" id="myusername" placeholder="Username"></p>
				<p><input name="mypassword" type="password" id="mypassword" placeholder="Password"></p>
				<button type="submit"></button>
			<form>
		</div>

	


	</div><!-- container -->
<!-- JS  -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
	<script>window.jQuery || document.write("<script src='js/jquery-1.5.1.min.js'>\x3C/script>")</script>
	<script src="js/app.js"></script>
<!--?php include 'sidebar.php'; ?>-->
<?php include 'footer.php'; ?>