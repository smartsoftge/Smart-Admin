<?php include "../footer_header_en/header.php" ?>
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
  <a  style="  margin-top:-2px;"  target="_blank"type="button" class="btn btn-info"  href="../../article.php?ID=<?php echo $results['statia']->ID ?>">  <i class="icon-eye-open icon-white"></i> &nbsp; ნახვა  &nbsp;</a>
			 
                <a  style="  margin-top:-2px;"  class="btn" href="admin.php?page=1&kategoria=arferi">  &nbsp; დახურვა  &nbsp; </a>
               
               
            </div>
        </div>
    </div>
    </div>
<div class="container">

<div class='x-table well  ' style="background:#FBFBFB;">

        <form method="post" action="redaktirebahelper.php"  enctype="multipart/form-data"
           style="padding: 0; margin: 0;" class="form-horizontal">
                                                  
												  
												  <div class="control-group ">
                        <label  class="control-label"><b>სათაური <b style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
                                <input type="text"  value="<?php echo $results['statia']->satauri ?>" name="satauri" />   </div>
                        </div>
						
	                       <input type="hidden" name="saveChanges" value="SaveChanges" />
                           <input type="hidden" name="ID" value="<?php echo $results['statia']->ID ?>"/>


									<div class="control-group ">
                        <label  class="control-label"><b>კატეგორია <b style="color: red;">*</b>  </b> </label>
                            <div class="controls">
                                <select name="kategoria">
								
							 	  <?php
require( "categoryclass.php");

   $data = catalogi::GetCatalogebi();
  
  
  $results['articles'] = $data['results'];
  
  
?> <?php foreach (  $results['articles'] as $statiafor ) { ?>		
							 	
								
								<?php
								
								if ( $results['statia']->kategoria ==  $statiafor->ID  )
								{
								 echo "<option selected='selected' value='". $statiafor->ID ."'> ". $statiafor->satauri  ."</option>";
								}
								else 
								{
								 echo "<option  value='". $statiafor->ID ."'> ". $statiafor->satauri  ."</option>";
								}   
								?>
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
 
<input type="text" name="surati"onclick="openKCFinder(this)" value="<?php  echo $results['statia']->surati ?>" style="width:210px;cursor:pointer" />			
							
   
 


							</div>
                        </div>  
						
					 


						 <div class="control-group ">
                        <label  class="control-label"><b>თარიღი                                <b
                                        style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
                                <input type="text"  value="<?php


echo $results['statia']->tarigi ;
?>" readonly>
          </div>
            </div>  

					


					
						
					
						  
						  
						  
						  
						  
						  
						  
						  
						  <div class="control-group ">
                        <label  class="control-label"><b>სტატუსი                                 
                            </b> </label>
                            <div class="controls">
							
							
                             
<?php 
                       if( $results['statia']->publish == 0 )
					   {
							 echo  "<label class='radio inline' style='margin-bottom:9px;'><input name='publish'  checked='checked'  value='0' type='radio' />დეაქტიური</label>";
		               }
					   else 
					   {
					        echo  "<label class='radio inline' style='margin-bottom:9px;'><input name='publish'   value='0' type='radio' />დეაქტიური</label>";
					   }
					   
					     if( $results['statia']->publish== 1 )
					   {
							 echo  "<label class='radio inline' style='margin-bottom:9px;'><input name='publish'  checked='checked'  value='1' type='radio' />აქტიური</label>";
		               }
					   else 
					   {
					        echo  "<label class='radio inline' style='margin-bottom:9px;'><input name='publish'   value='1' type='radio' />აქტიური</label>";
					   }
														
?>
	
	</div>
                        </div>
						  
						  
						  
						  
						  
						  
						  
						  


								   <div class="control-group ">
                        <label  class="control-label"><b>მეტა აღწერა                                 
                            </b> </label>
                            <div class="controls">
                                <textarea  id="dataArticlesArticle_rezume" name="reziume"  style="width:650px; height:100px;"  ><?php echo $results['statia']->reziume ?></textarea>
<script>
CKEDITOR.replace("dataArticlesArticle_rezume1",{width:660,height:100});	
</script>                            </div>
                        </div>
						 
						 
						 

								   <div class="control-group ">
                        <label  class="control-label"><b>სტატია                                 
                            </b> </label>
                            <div class="controls">
                                <textarea  id="dataArticlesArticle_content"  name="statia" style="width:680px; height:400px;"  ><?php echo $results['statia']->statia ?></textarea>
<script>
CKEDITOR.replace("dataArticlesArticle_content",{width:660,height:250});	
</script>                            </div>
                        </div>
						 
						 
						 

								   <div class="control-group ">
                        <label  class="control-label"><b>მეტა სიტყვები                                 
                            </b> </label>
                            <div class="controls">
                                <textarea  id="dataArticlesArticle_rezume" name="slaidi"  style="width:650px; height:100px;"  ><?php echo $results['statia']->slaidi ?></textarea>
<script>
CKEDITOR.replace("dataArticlesArticle_rezume1",{width:660,height:100});	
</script>                            </div>
                        </div>
						 


						
						
								 
   <input style="margin-left:740px;"  class="btn btn-info " type="submit" value="შენახვა" />
   
   
   
   
						
							<div  style="visibility:hidden;"      class="control-group ">
                        <label  class="control-label"><b>Home Article</b> </label>
                            <div class="controls">
                                <select name="marjvenabox">
								<?php 
								
								if ( $results['statia']->marjvenabox == 0 )
								{
								 echo "<option selected='selected' value='0'>Select</option>";
								}
								else 
								{
								 echo "<option  value='0'>Select</option>";
								}
                             
	                            if ( $results['statia']->marjvenabox == 1 )
								{
								 echo "<option selected='selected' value='1'>show on Home page</option>";
								}
								else 
								{
								 echo "<option  value='1'>show on Home page</option>";
								}
								
								
								 
								
								?>
								 
								
								 
								 
								</select>

			                            </div>
                        </div>
                               
						
   
   
   
   
   
   
   
   	 <div  style="visibility:hidden;" class="control-group ">
                        <label  class="control-label"><b>მთავარი გვერდი                                 
                            </b> </label>
                            <div class="controls">
                
				
					 	 
						 
						
						 <input type='hidden' value='0' name="dgis" >
						 
						 
						 <input type='hidden' value='0' name="analitika" >
						 
						 

					 
					  
					  <div style="float:left;margin-left:20px;"  > 	   <div style="float:left;margin:4px;"  >დღის ამბები</div>     <input type="checkbox"   value="1" name="dgis"
					   
					  <?php
					   if ( $results['statia']->dgis == 1 ) 
                        echo " checked";					   
					  
					  ?>
					  
					  />  </div> 
					  <div style="float:left;margin-left:20px;"  > 	   <div style="float:left;margin:4px;"  >სლაიდის ქვედა</div>     <input type="checkbox" value="1" name="analitika"
					 
					   
					  <?php
					   if ( $results['statia']->analitika == 1 ) 
                        echo " checked";					   
					  
					  ?>
					  />  </div> 
			    


				<div style="float:left;margin-left:20px;"  > 	   <div style="float:left;margin:4px;"  >პრივატული(არ მუშაობს)</div>     <input type="checkbox" value="1" name="privatuli"
					 
					   
					  <?php
					   if ( $results['statia']->privatuli == 1 ) 
                        echo " checked";					   
					  
					  ?>
					  />  </div> 
					  
					  
			   
                       </div>
					   
					   
                        </div>
                        </form>
						 
						
								 
							
</div>
</div>  






<?php include "../footer_header_en/footer.php" ?>