<?php include "../footer_header_en/header.php" ?>
			 <div class="container" >
		<h2>ბანერების მენეჯერი</h2>
				<ul class="nav nav-tabs" id="auth_tab" style="margin-bottom: 0px;">
            			
						<li  class="active" ><a href="banners.php">ბანერების მენეჯერი</a></li>
			        </ul>
        		    </div>
<div style="height: 52px;">
    <div data-spy="affix" data-offset-top="90" style="
         top: 24px;
         width: 100%;
         padding-top:5px;
         padding-bottom:5px;
         z-index: 100;">
        <div class="container" style="border-bottom: 1px solid #CCC; padding-bottom:5px;padding-top:5px;
        	background: #FBFBFB;
       		background-image: linear-gradient(to bottom, #FFFFFF, #FBFBFB);">
            <div style="text-align:right;width:100%;">
                <a class="btn" href="banners.php">  &nbsp; Close  &nbsp; </a>
               
            </div>
        </div>
    </div>
    </div>

<div class="container">

<div class='x-table well  ' style="background:#FBFBFB;">

        <form method="post" action="redbanhelp.php"  enctype="multipart/form-data"
           style="padding: 0; margin: 0;" class="form-horizontal">
                                                  




												  <div class="control-group ">
                        <label  class="control-label"><b>დასახელება <b style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
       <input type="text"  name="satauri" value="<?php  echo $results['statia']->satauri ?>" >                          </div>
  </div>
						
						
						
						
	
						  
						  
						  
						  <div class="control-group ">
                        <label  class="control-label"><b>სტატუსი                                 
                            </b> </label>
                            <div class="controls">
							
							
                                                       
<?php 
                       if( $results['statia']->statusi == 0 )
					   {
							 echo  "<label class='radio inline' style='margin-bottom:9px;'><input name='statusi'  checked='checked'  value='0' type='radio' />დეაქტიური</label>";
		               }
					   else 
					   {
					        echo  "<label class='radio inline' style='margin-bottom:9px;'><input name='statusi'   value='0' type='radio' />დეაქტიური</label>";
					   }
					   
					     if( $results['statia']->statusi== 1 )
					   {
							 echo  "<label class='radio inline' style='margin-bottom:9px;'><input name='statusi'  checked='checked'  value='1' type='radio' />აქტიური</label>";
		               }
					   else 
					   {
					        echo  "<label class='radio inline' style='margin-bottom:9px;'><input name='statusi'   value='1' type='radio' />აქტიური</label>";
					   }
														
?>

								</div>
                        </div>
						  
						  
						  
						  
						  
						  
						 
						 

								   <div class="control-group ">
                        <label  class="control-label"><b>HTML                                 
                            </b> </label>
                            <div class="controls">
                                <textarea  id="dataArticlesArticle_content"  style="width:680px; height:400px;"  name="banner" ><?php  echo $results['statia']->banner ?></textarea>
<script>
CKEDITOR.replace("dataArticlesArticle_content",{width:660,height:250});	
</script>                            </div>
                        </div>
						 
						 
	
						
						
	                       <input type="hidden" name="saveChanges" value="SaveChanges" />
                           <input type="hidden" name="ID" value="<?php echo $results['statia']->ID ?>"/>
						
						                            
   <input style="margin-left:740px;"  class="btn btn-info " type="submit" value="Save" />
   
   
                        </form>

</div>
</div>  






<?php include "../footer_header_en/footer.php" ?>

		