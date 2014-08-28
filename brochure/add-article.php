<?php require( "../config.php" );
require( "class.php");
require( "compclass.php");


    $data = StatiaC::getcompany();
  

    $resulta['articles'] = $data['shedegi'];

 
 if(isset($_POST['surati'])){
 
    $stati = new Statia;
	
    $stati->postidanamogeba( $_POST );
	
    $stati->chasma();
	
   header( 'Location:admin.php?page=1&kategoria=arferi&warmateba=1' );

}
 include "../footer_header_en/header.php" ?>




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
                <a class="btn" href="admin.php?page=1&kategoria=arferi">  &nbsp; Close  &nbsp; </a>
               
            </div>
        </div>
    </div>
    </div>
<div class="container">

<div class='x-table well  ' style="background:#FBFBFB;">

        <form method="post" action="#"  enctype="multipart/form-data"
           style="padding: 0; margin: 0;" class="form-horizontal">
                                                  




												  <div class="control-group ">
                        <label  class="control-label"><b>Title <b style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
                                <input type="text" name="satauri" />   </div>
                        </div>
						
	


									<div class="control-group ">
                        <label  class="control-label"><b>Company   <b style="color: red;">*</b>  </b> </label>
                            <div class="controls">
                                <select name="kategoria">
				 	  	
						<?php foreach (  $resulta['articles'] as $statiafor ) { ?>
								<option value="<?php echo $statiafor->ID ?>"> <?php echo $statiafor->satauri ?></option>
							
							 <?php } ?>
					 
								</select>

			                            </div>
                        </div>
                                            
                                    
								


									<div class="control-group ">
                        <label  class="control-label"><b>Type   <b style="color: red;">*</b>  </b> </label>
                            <div class="controls">
                                <select name="piri">
 
								<option value="1"> Particuliers</option>
								<option value="2"> Professionnels</option>
							 
					 
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
 
<input type="text" name="surati" onclick="openKCFinder(this)" value="0" style="width:210px;cursor:pointer"  />			
							
   
  

							</div>
                        </div>  
						
				   
						  
						  
						  <div class="control-group ">
                        <label  class="control-label"><b>Status                                 
                            </b> </label>
                            <div class="controls">
							
							
                             
                 <?php if($_SESSION['jgufi'] == 3)
				 {
				                echo "დეაკტიური";
								echo '<input name="publish"  checked="checked"  value="0" type="hidden" />';
		      }
								else
								{
								echo '<label class="radio inline" style="margin-bottom:9px;"><input name="publish"    value="0" type="radio"  />Unactive</label>';
								echo '<label class="radio inline" style="margin-bottom:9px;"><input name="publish" checked="checked"  value="1" type="radio"  />Active</label>';
							 
								}
								
								 
								?>
			 
								
								
							

								</div>
                        </div>
						  
						  
					 
	<div class="control-group ">
                        <label  class="control-label"><b>LE CALCULE   <b style="color: red;">*</b>  </b> </label>
                            <div class="controls">
                                <select name="archevab">
				 	  			<option value="0"> Select</option>
				 	  			<option value="1"> OUVERTURE ET FONCTIONNEMENT</option>
 								<option value="2"> CRÉDITS</option>
								<option value="3"> ÉPARGNE</option>
					 
								</select>

			                            </div>
                        </div>
                                            				  


								   <div class="control-group ">
                        <label  class="control-label"><b>Meta Description                                 
                            </b> </label>
                            <div class="controls">
                                <textarea  id="dataArticlesArticle_rezume" name="reziume"  style="width:650px; height:100px;"  ></textarea>
<script>
CKEDITOR.replace("dataArticlesArticle_rezume1",{width:660,height:100});	
</script>                            </div>
                        </div>
						 
						 
						 

								   <div class="control-group ">
                        <label  class="control-label"><b>Meta Keywords    </b> </label>
                            <div class="controls">
                                <textarea  name="metasityva" style="width:650px; height:80px;"  ></textarea>
                        </div>
                        </div>
						 
						  
						
						 <input  type="Hidden"  name="avtori"  value=" <?php echo $_SESSION['saxeli'];?>" readonly>
						                            
   <input style="margin-left:740px;"  class="btn btn-info " type="submit" value="Save" />
   
   	
	
	
                        </form>

</div>
</div>  






<?php include "../footer_header_en/footer.php" ?>