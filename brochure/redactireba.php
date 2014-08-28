<?php include "../footer_header_en/header.php" ?>
	
 <div class="container" >
		<h2>Brochure Manager</h2>
				<ul class="nav nav-tabs" id="auth_tab" style="margin-bottom: 0px;">
 						<li ><a href="../bank/admin.php?page=1&kategoria=arferi">Companies</a></li>
 						<li  class="active" ><a href="../brochure/admin.php?page=1&kategoria=arferi">Brochure</a></li>
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
  <a  style="  margin-top:-2px;"  target="_blank"type="button" class="btn btn-info"  href="../../catalogue.php?ID=<?php echo $results['statia']->ID ?>">  <i class="icon-eye-open icon-white"></i> &nbsp; View  &nbsp;</a>
			 
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
                        <label  class="control-label"><b>Company   <b style="color: red;">*</b>  </b> </label>
                            <div class="controls">
                                <select name="kategoria">
				 	  	
						<?php

 
require( "compclass.php");


    $data = StatiaC::getcompany();
  

    $resulta['articles'] = $data['shedegi'];

 



						foreach (  $resulta['articles'] as $statiafor ) { ?>
	 <option  <?php if ($results['statia']->kategoria == $statiafor->ID) { echo "selected='selected'";} else { echo " "; }  ?> value="<?php echo $statiafor->ID ?>"> <?php echo $statiafor->satauri ?></option>
							
							 <?php } ?>
					 
								</select>

			                            </div>
                        </div>
                 
						   
						   
						   
						   
									<div class="control-group ">
                        <label  class="control-label"><b>Type   <b style="color: red;">*</b>  </b> </label>
                            <div class="controls">
                                <select name="piri">
 <?php
								
								if ( $results['statia']->piri ==  "1"  )
								{
								 echo "<option selected='selected' value='1'>Particuliers</option>";
								}
								else 
								{
								 echo "<option  value='1'>Particuliers</option>";
								}  
								
								if ( $results['statia']->piri ==  "2"  )
								{
								 echo "<option selected='selected' value='2'>Professionnels</option>";
								}
								else 
								{
								 echo "<option  value='2'>Professionnels</option>";
								}   
								?>
				 
								</select>

			                            </div>
                        </div>
						   
						   
						   
									  
						
						  <div class="control-group ">
                        <label  class="control-label"><b>Brochure                                <b
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
                        <label  class="control-label"><b>LE CALCULE   <b style="color: red;">*</b>  </b> </label>
                            <div class="controls">
                                 <select name="archevab">
								
  								<?php
								
								if ( $results['statia']->archevab ==  "0"  )
								{
								 echo "<option  selected='selected'  value='0'> Select</option>";
								}
								else 
								{
								 echo "<option value='0'> Select</option>";
								}  
								
								 
								if ( $results['statia']->archevab ==  "1"  )
								{
								 echo "<option  selected='selected'  value='1'> OUVERTURE ET FONCTIONNEMENT</option>";
								}
								else 
								{
								 echo "<option value='1'> OUVERTURE ET FONCTIONNEMENT</option>";
								}  
								
								if ( $results['statia']->archevab ==  "2"  )
								{
								 echo "<option  selected='selected'  value='2'> CRÉDITS</option>";
								}
								else 
								{
								 echo "<option value='2'> CRÉDITS</option>";
								}  
								
								
								if ( $results['statia']->archevab ==  "3"  )
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