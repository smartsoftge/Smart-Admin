<?php					 
session_start();
 if(!isset( $_SESSION['login'] ))
{
   header("Location:../smart/login.php");  
exit;	
  
} 
 							 if ($_SESSION['jgufi'] == 3 )
								{
					    header( 'Location:../smart/logout.php' );

								} 
?><!DOCTYPE html>
<html lang="ka">
    <head>
        <meta charset="utf-8">
        <title>Smart Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="../public/media/css/template.css" rel="stylesheet">
        <link href="../public/media/bootstrap-modal/css/animate.min.css" rel="stylesheet">
        <link href="../public/media/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
        <link href="../public/media/select2/select2.css" rel="stylesheet">
        
        <script src="../public/media/jquery/jquery-1.8.2.min.js"></script>
        <script src="../public/media/bootstrap/js/bootstrap.min.js"></script>
        <script src="../../ckeditor/ckeditor.js"></script>
        <script src="../public/media/bootstrap-modal/js/bootstrap.modal.js"></script>
		<script src="../public/media/bootstrap-modal/js/jquery.easing.1.3.js"></script>
		<script src="../public/media/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
		<script src="../public/media/select2/select2.js"></script>
		<script type="text/javascript">
		;(function($){
			$.fn.datetimepicker.dates['en'] = {"days":["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"],"daysShort":["Sun","Mon","Tue","Wed","Thu","Fri","Sat","Sun"],"daysMin":["Su","Mo","Tu","We","Th","Fr","Sa","Su"],"months":["January","February","March","April","May","June","July","August","September","October","November","December"],"monthsShort":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]};
		}(jQuery));
				
		</script>
		
  
  
    </head>

    <body onload="load()" onunload="GUnload()">
        <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container"><a class="btn btn-navbar"
                                  data-toggle="collapse" data-target=".nav-collapse"> <span
                    class="icon-bar"></span> <span class="icon-bar"></span> <span
                    class="icon-bar"></span> </a> <a class="brand" href="../smart/">Smart Admin</a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li ><a href="../smart/">მთავარი</a></li>
                                            <li class="dropdown ">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">მომხმარებლი <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href= "../user/user.php?page=1">მომხმარებლის მენეჯერი</a></li>
                                <li><a href="../user/group.php">ჯგუფი</a></li>
                            </ul>
                        </li>
                                        
					<li class="dropdown " id="mnu_component"><a data-toggle="dropdown"
						class="dropdown-toggle" href="#">კომპონტები <b
							class="caret"></b> </a>
						<ul class="dropdown-menu">
														<li class="dropdown-submenu">
								<a href="../article/admin.php?page=1&kategoria=arferi" tabindex="-1">სტატიების მენეჯერი</a>
								<ul class="dropdown-menu">
																		<li><a href="../article/category.php">კატეგორია</a></li>
																		<li><a href="../article/admin.php?page=1&kategoria=arferi">სტატიები</a></li>
																		<li><a href="../article/add-article.php">სტატიის დამატება</a></li>
																	</ul>
							</li>	
							
							
							
 
 
													
  <!--	<li class="dropdown-submenu">
								<a href="#" tabindex="-1">Company</a>
								<ul class="dropdown-menu">
																		<li><a href="../bank/admin.php?page=1&kategoria=arferi">Bank</a></li>
																		<li><a href="../brochure/admin.php?page=1&kategoria=arferi">Brochure</a></li>
 
																	</ul>
							</li>	
 	  
  <li><a href="../module1/category.php">Module Banks</a></li>	-->							
  
  <li><a href="../works/admin.php?page=1&kategoria=arferi">ნამუშევრები</a></li>
  <li><a href="../banners/banners.php">ბანერების მენეჯერი</a></li>
 
  <li><a href="../media-manager">მედია მენეჯერი</a></li>								
							
							 
													</ul>
					</li>
					
			 
					
					
					  <li ><a target="_blank" href="http://cp.ge/roundcube/">ელ. ფოსტა</a></li>
					
					
					
					
					
					
					
					
										
									</ul>
									
									
									
                <ul class="nav pull-right">
                  
  
                    <li class="dropdown">
                        <a class=" dropdown-toggle" data-toggle="dropdown" href="#" > &nbsp;  <i class="icon icon-user"></i>&nbsp; 
						 <?php 
						 
 
                   echo $_SESSION['saxeli'];
 						
						?> 
						<b class="caret"></b></a>
                        <ul class="dropdown-menu">
							                                                      
                               
                                <li class="divider"></li>
                                                        <li><a  href="../../" target="_blank"> <i class="icon-user"></i> View Site</a></li>
                             <li><a href="../smart/logout.php"> <i class="icon-minus-sign"></i> log out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
 

<script>
	function clickGroup(obj){
		window.location = $(obj).parent().find('ul').find('a:first').attr('href');
	}
    $(document).ready(function(){
    	$('#mnu_component > ul > li').each(function(){
			if ($(this).hasClass('dropdown-submenu')){
				if ($(this).find('li').length <= 0){
					$(this).remove();
				}
			}
       });
        
       if ($('#mnu_component').children('ul').find('li').length <= 0){
           $('#mnu_component').hide();
       }else{
           $('#mnu_component').show();
       } 
    });
</script>    
