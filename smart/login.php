<?php require( "../config.php" );
require( "../user/userclass.php");

 if(isset($_POST['login'])){
 
    $login =  $_POST['login'] ;
	$paroli = $_POST['password'];
 
    Momxmarebeli::shesvla($login,$paroli); 
}
?>
<!DOCTYPE html>
<html lang="ka">

<head>
	<meta charset="utf-8">
	<title>CMS Smart Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Le styles -->
	<link href="../public/media/css/template.css" rel="stylesheet">
	<link href="../public/media/bootstrap-modal/css/animate.min.css" rel="stylesheet">
	<script src="../public/media/jquery/jquery-1.8.2.min.js"></script>
	<script src="../public/media/bootstrap/js/bootstrap.min.js"></script>
	<script src="../public/media/bootstrap-modal/js/bootstrap.modal.js"></script>
	<script src="../public/media/bootstrap-modal/js/jquery.easing.1.3.js"></script>
	<style type="text/css">
	body{
		padding-top:200px;
		height: auto;
	}
	</style>
</head>
<body>
	<div class="container">
	<div class="row">
		<div class="span4 offset4 well">
			<legend>CMS Smart Admin</legend>
			<form action="#" method="post">
     <?php  
      if(isset($_GET['momavlidan']))
   {
      echo "<div style='color:red;'>მომხმარებელი ან პაროლი არასწორია</div>";
   }

?>				  
			<div class="control-group">
              <label class="control-label">მომხმარებელი</label>
              <div class="controls">
                <input type="text" name="login" placeholder="მომხმარებელი" class="span4"  value="" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">პაროლი</label>
              <div class="controls">
                <input  type="password" name="password"  placeholder="პაროლი" class="span4"  value="" />
              </div>
            </div>
          
			<button class="btn btn-info" name="submit" type="submit">შესვლა</button>
			<label class="checkbox inline" for="remember_me"> 
				<input type="hidden" name="remember_me" value="0" />
				 		</label>
		
			</form> 
		</div>
	</div>
	
</div>




</body>
</html>
