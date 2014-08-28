<?php include "../footer_header_en/header.php" ?>
		<div class="container" >
		<h2>კატეგორიების მენეჯერი</h2>
					<ul class="nav nav-tabs" id="auth_tab" style="margin-bottom: 0px;">
            			<li  class="active" ><a href="category.php">კატეგორია </a></li>
						<li ><a href="admin.php?page=1&kategoria=arferi">სტატიები</a></li>
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
                <a class="btn" href="category.php">  &nbsp; დახურვა  &nbsp; </a>
               
            </div>
        </div>
    </div>
    </div>

<div class="container">

<div class='x-table well  ' style="background:#FBFBFB;">

        <form method="post" action="redcategoryhelp.php"  enctype="multipart/form-data"
           style="padding: 0; margin: 0;" class="form-horizontal">
                                                  




												  <div class="control-group ">
                        <label  class="control-label"><b>სათაური <b style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
       <input type="text"  value="<?php  echo $results['statia']->satauri ?>" name="satauri" >                          </div>
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
						  
						  
						  
						  
						  
						   
						
						
				

												  <div style="visibility:hidden;" class="control-group ">
                        <label  class="control-label"><b>ID <b style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
       <input type="text"  name="nomeri" value="<?php  echo $results['statia']->nomeri ?>" >                          </div>
  </div>
 
						
						 <input type="hidden" name="saveChanges" value="SaveChanges" />
                         <input type="hidden" name="ID" value="<?php echo $results['statia']->ID ?>"/>

						                            
   <input style="margin-left:307px;"  class="btn btn-info " type="submit" value="Save" />
   
   
                        </form>

</div>
</div>  






<?php include "../footer_header_en/footer.php" ?>

		