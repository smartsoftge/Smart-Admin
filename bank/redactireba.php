<?php include "../footer_header_en/header.php" ?>
	
 <div class="container" >
		<h2>Companies Manager</h2>
				<ul class="nav nav-tabs" id="auth_tab" style="margin-bottom: 0px;">
 						<li  class="active" ><a href="../bank/admin.php?page=1&kategoria=arferi">Companies</a></li>
 						<li><a href="../brochure/admin.php?page=1&kategoria=arferi">Brochure</a></li>
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
  <a  style="  margin-top:-2px;"  target="_blank"type="button" class="btn btn-info"  href="../../bank.php?ID=<?php echo $results['statia']->ID ?>">  <i class="icon-eye-open icon-white"></i> &nbsp; View  &nbsp;</a>
			 
                <a  style="  margin-top:-2px;"  class="btn" href="admin.php?page=1&kategoria=arferi">  &nbsp; Close  &nbsp; </a>
               
               
            </div>
        </div>
    </div>
    </div>
<div class="container">

<div class='x-table well  ' style="background:#FBFBFB;">

        <form method="post" action="redaktirebahelper.php"  enctype="multipart/form-data"
           style="padding: 0; margin: 0;" class="form-horizontal">
                                                  
												  
												  <div class="control-group ">
                        <label  class="control-label"><b>Title <b style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
                                <input type="text"  value="<?php echo $results['statia']->satauri ?>" name="satauri" />   </div>
                        </div>
						
	                       <input type="hidden" name="saveChanges" value="SaveChanges" />
                           <input type="hidden" name="ID" value="<?php echo $results['statia']->ID ?>"/>


									<div class="control-group ">
                        <label  class="control-label"><b>Category <b style="color: red;">*</b>  </b> </label>
                            <div class="controls">
                                <select name="kategoria">
							 
								
								<?php
								
								if ( $results['statia']->kategoria ==  "Banks"  )
								{
								 echo "<option selected='selected' value='Banks'>Banks</option>";
								}
								else 
								{
								 echo "<option  value='Banks'>Banks</option>";
								}  
								
								if ( $results['statia']->kategoria ==  "Assurance"  )
								{
								 echo "<option selected='selected' value='Assurance'>Assurance</option>";
								}
								else 
								{
								 echo "<option  value='Assurance'>Assurance</option>";
								}   
								?>
						 
								
								</select>

			                            </div>
                        </div>
                                            
                                    
									
									
									
									
									
								  
						            
                                
						
						
						
						
						  <div class="control-group ">
                        <label  class="control-label"><b>Image                                <b
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
                        <label  class="control-label"><b>Date                                <b
                                        style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
                                <input type="text"  value="<?php


echo $results['statia']->tarigi ;
?>" readonly>
          </div>
            </div>  

					


					
						
					
						  
						  
						  
						  
						  
						  
						  
						  
						  <div class="control-group ">
                        <label  class="control-label"><b>Status                                 
                            </b> </label>
                            <div class="controls">
							
							
                             
<?php 
                       if( $results['statia']->publish == 0 )
					   {
							 echo  "<label class='radio inline' style='margin-bottom:9px;'><input name='publish'  checked='checked'  value='0' type='radio' />Unactive</label>";
		               }
					   else 
					   {
					        echo  "<label class='radio inline' style='margin-bottom:9px;'><input name='publish'   value='0' type='radio' />Unactive</label>";
					   }
					   
					     if( $results['statia']->publish== 1 )
					   {
							 echo  "<label class='radio inline' style='margin-bottom:9px;'><input name='publish'  checked='checked'  value='1' type='radio' />Active</label>";
		               }
					   else 
					   {
					        echo  "<label class='radio inline' style='margin-bottom:9px;'><input name='publish'   value='1' type='radio' />Active</label>";
					   }
														
?>
	
	</div>
                        </div>
						  
						  
						  
						  
						  
					
						  	  <div class="control-group ">
                        <label  class="control-label"><b>Address <b style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
       <input type="text"  name="address" value="<?php  echo $results['statia']->address ?>" >                          </div>
  </div>
						  
						  
						
						  	  <div class="control-group ">
                        <label  class="control-label"><b>Web <b style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
       <input type="text"  name="web" value="<?php  echo $results['statia']->web ?>" >                          </div>
  </div>
						   
				
						  	  <div class="control-group ">
                        <label  class="control-label"><b>Mail <b style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
       <input type="text"  name="mail" value="<?php  echo $results['statia']->mail ?>" >                          </div>
  </div>
						  
						  
				
						  	  <div class="control-group ">
                        <label  class="control-label"><b>Phone <b style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
       <input type="text"  name="phone" value="<?php  echo $results['statia']->phone ?>" >                          </div>
  </div>
					
				
						  	  <div class="control-group ">
                        <label  class="control-label"><b>Opposition carte <b style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
       <input type="text"  name="carte" value="<?php  echo $results['statia']->carte ?>" >                          </div>
  </div>
						  
						  
					
						  	  <div class="control-group ">
                        <label  class="control-label"><b>Open <b style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
       <input type="text"  name="clock" value="<?php  echo $results['statia']->clock ?>" >                          </div>
  </div>
						  
							  
					
						  	  <div class="control-group ">
                        <label  class="control-label"><b>Facebook <b style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
       <input type="text"  name="facebook" value="<?php  echo $results['statia']->facebook ?>" >                          </div>
  </div>
						  
						  
					
					
						  	  <div class="control-group ">
                        <label  class="control-label"><b>Twitter <b style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
       <input type="text"  name="twitter" value="<?php  echo $results['statia']->twitter ?>" >                          </div>
  </div>
				
					
						  	  <div class="control-group ">
                        <label  class="control-label"><b>Youtube <b style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
       <input type="text"  name="youtube" value="<?php  echo $results['statia']->youtube ?>" >                          </div>
  </div>
						  
						  
						  
						
						  	  <div class="control-group ">
                        <label  class="control-label"><b>Carrières <b style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
       <input type="text"  name="vakansia" value="<?php  echo $results['statia']->vakansia ?>" >                          </div>
  </div>
					
						  
						  	<div class="control-group ">
                        <label  class="control-label"><b>LE CALCULE   <b style="color: red;">*</b>  </b> </label>
                            <div class="controls">
                                 <select name="archeva">
								
  								<?php
								
								if ( $results['statia']->archeva ==  "0"  )
								{
								 echo "<option  selected='selected'  value='0'> Select</option>";
								}
								else 
								{
								 echo "<option value='0'> Select</option>";
								}  
								
								 
								if ( $results['statia']->archeva ==  "1"  )
								{
								 echo "<option  selected='selected'  value='1'> OUVERTURE ET FONCTIONNEMENT</option>";
								}
								else 
								{
								 echo "<option value='1'> OUVERTURE ET FONCTIONNEMENT</option>";
								}  
								
								if ( $results['statia']->archeva ==  "2"  )
								{
								 echo "<option  selected='selected'  value='2'> CRÉDITS</option>";
								}
								else 
								{
								 echo "<option value='2'> CRÉDITS</option>";
								}  
								
								
								if ( $results['statia']->archeva ==  "3"  )
								{
								 echo "<option  selected='selected'  value='3'> ÉPARGNE</option>";
								}
								else 
								{
								 echo "<option value='3'> ÉPARGNE</option>";
								}  
								
								   
								?>
						 
				 	  		 
					 
								</select>

			                            </div>
                        </div>
						  
						  
						  


								   <div class="control-group ">
                        <label  class="control-label"><b>Meta Description                                 
                            </b> </label>
                            <div class="controls">
                                <textarea  id="dataArticlesArticle_rezume" name="reziume"  style="width:650px; height:100px;"  ><?php echo $results['statia']->reziume ?></textarea>
<script>
CKEDITOR.replace("dataArticlesArticle_rezume1",{width:660,height:100});	
</script>                            </div>
                        </div>
						 
						 
						 

								   <div class="control-group ">
                        <label  class="control-label"><b>Article                                 
                            </b> </label>
                            <div class="controls">
                                <textarea  id="dataArticlesArticle_content"  name="statia" style="width:680px; height:400px;"  ><?php echo $results['statia']->statia ?></textarea>
<script>
CKEDITOR.replace("dataArticlesArticle_content",{width:660,height:250});	
</script>                            </div>
                        </div>
						 
						 
						 

								   <div class="control-group ">
                        <label  class="control-label"><b>Meta Keywords                                 
                            </b> </label>
                            <div class="controls">
                                <textarea  id="dataArticlesArticle_rezume" name="metasityva"  style="width:650px; height:100px;"  ><?php echo $results['statia']->metasityva ?></textarea>
<script>
CKEDITOR.replace("dataArticlesArticle_rezume1",{width:660,height:100});	
</script>                            </div>
                        </div>
						 


						
						
								 
   <input style="margin-left:740px;"  class="btn btn-info " type="submit" value="Save" />
   
   
    
                        </form>
						 
						
								 
							
</div>
</div>  






<?php include "../footer_header_en/footer.php" ?>