<?php require( "../config.php" );
require( "statia.php");


 
 if(isset($_POST['statia'])){
    $stati = new Statia;
	
    $stati->postidanamogeba( $_POST );
	
    $stati->chasma();
	
   header( 'Location:admin.php?page=1&kategoria=arferi&warmateba=1' );

}
 include "../footer_header_en/header.php" ?>



    <div class="container" >
		<h2>Article Manager</h2>
				<ul class="nav nav-tabs" id="auth_tab" style="margin-bottom: 0px;">
            			<li ><a href="category.php">კატეგორია</a></li>
						<li  class="active" ><a href="admin.php?page=1&kategoria=arferi">სტატიები</a></li>
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
                <a class="btn" href="admin.php?page=1&kategoria=arferi">  &nbsp; დახურვა  &nbsp; </a>
               
            </div>
        </div>
    </div>
    </div>
<div class="container">

<div class='x-table well  ' style="background:#FBFBFB;">

        <form method="post" action="#"  enctype="multipart/form-data"
           style="padding: 0; margin: 0;" class="form-horizontal">
                                                  




												  <div class="control-group ">
                        <label  class="control-label"><b>სათაური <b style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
                                <input type="text" name="satauri" />   </div>
                        </div>
						
	


									<div class="control-group ">
                        <label  class="control-label"><b>კატეგორია   <b style="color: red;">*</b>  </b> </label>
                            <div class="controls">
                                <select name="kategoria">
										  <?php
require( "categoryclass.php");

   $data = catalogi::GetCatalogebi();
  
  
  $results['articles'] = $data['results'];
  
  
?>
								 <?php foreach (  $results['articles'] as $statiafor ) { ?>		
								<option value="<?php echo $statiafor->ID ;?>">   <?php echo $statiafor->satauri ;?></option>
								<?php  }  ?> 	
								 
								 
								
								
								</select>

			                            </div>
                        </div>
                                            
                                    
									
									
									
									
									
								  
						            
                                
						
						
						
						
						  <div class="control-group ">
                        <label  class="control-label"><b>სურათი                                <b
                                        style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
							
				<script type="text/javascript">
function openKCFinder(field) {
    window.KCFinder = {
        callBack: function(url) {
            field.value = url;
            window.KCFinder = null;
        }
    };
    window.open('../public/media/kcfinder/browse.php?type=files&langCode=ru', 'kcfinder_textbox',
        'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
        'resizable=1, scrollbars=0, width=800, height=600'
    );
}
</script>
 
<input type="text" name="surati"onclick="openKCFinder(this)" value="0" style="width:210px;cursor:pointer"  />			
							
   
 


							</div>
                        </div>  
						 
						  
						  
						  <div class="control-group ">
                        <label  class="control-label"><b>სტატუსი                                 
                            </b> </label>
                            <div class="controls">
							
							
                             
                 <?php if($_SESSION['jgufi'] == 3)
				 {
				                echo "დეაკტიური";
								echo '<input name="publish"  checked="checked"  value="0" type="hidden" />';
		      }
								else
								{
								echo '<label class="radio inline" style="margin-bottom:9px;"><input name="publish"    value="0" type="radio"  />დეაქტიური</label>';
								echo '<label class="radio inline" style="margin-bottom:9px;"><input name="publish" checked="checked"  value="1" type="radio"  />აქტიური</label>';
							 
								}
								
								 
								?>
			 
								
								
							

								</div>
                        </div>
						  
						  
						  
					
						  
						  


								   <div class="control-group ">
                        <label  class="control-label"><b>მეტა აღწერა                                 
                            </b> </label>
                            <div class="controls">
                                <textarea  id="dataArticlesArticle_rezume" name="reziume"  style="width:650px; height:100px;"  ></textarea>
<script>
CKEDITOR.replace("dataArticlesArticle_rezume1",{width:660,height:100});	
</script>                            </div>
                        </div>
						 
						 
						 

								   <div class="control-group ">
                        <label  class="control-label"><b>სტატია                                 
                            </b> </label>
                            <div class="controls">
                                <textarea  id="dataArticlesArticle_content"  name="statia" style="width:680px; height:400px;"  ></textarea>
<script>
CKEDITOR.replace("dataArticlesArticle_content",{width:660,height:250});	
</script>                            </div>
                        </div>
						 
						 
						 
						 

								   <div class="control-group ">
                        <label  class="control-label"><b>მეტა სიტყვები    </b> </label>
                            <div class="controls">
                                <textarea  name="slaidi" style="width:650px; height:80px;"  ></textarea>
                        </div>
                        </div>
						 
						 
						 


						
						                            
   <input  style="margin-left:740px;"  class="btn btn-info " type="submit" value="შენახვა" />
   
   	
							<div style="visibility:hidden;"  class="control-group ">
                        <label  class="control-label"><b>Home Article    </b> </label>
                            <div class="controls">
                                <select name="marjvenabox">
								
								<option value="0">Select</option>
								<option value="1">show on Home page</option>
							 
 							 

								</select>

			                            </div>
                        </div>
                               
						
					
						 <div style="visibility:hidden;" class="control-group ">
                        <label  class="control-label"><b>მთავარი გვერდი                                 
                            </b> </label>
                            <div class="controls">

		  
					  <div style="float:left;margin-left:20px;"  > 	   <div style="float:left;margin:4px;"  >დღის ამბები</div>     <input type="checkbox"   value="1" name="dgis"/>  </div> 
					  <div style="float:left;margin-left:20px;"  > 	   <div style="float:left;margin:4px;"  >სლაიდის ქვედა</div>     <input type="checkbox" value="1" name="analitika"/>  </div>  

					 
                       </div>
					   
					   
                        </div>
                        </form>

</div>
</div>  






<?php include "../footer_header_en/footer.php" ?>