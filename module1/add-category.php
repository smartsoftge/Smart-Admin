<?php require( "../config.php" );
require( "categoryclass.php");

 
 
 if(isset($_POST['surati'])){
    $surati = new catalogi;
	
    $surati->postidanamogeba( $_POST );
	
    $surati->chasma();
	
   header( 'Location:category.php?warmateba=1' );

} include "../footer_header_en/header.php" ?>
<div class="container" >
		<h2>Module  Bank</h2>
				<ul class="nav nav-tabs" id="auth_tab" style="margin-bottom: 0px;">
            			<li class="active" ><a href="category.php">Modules</a></li>
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
                <a class="btn" href="category.php">  &nbsp; Close  &nbsp; </a>
               
            </div>
        </div>
    </div>
    </div>

<div class="container">

<div class='x-table well  ' style="background:#FBFBFB;">

        <form method="post" action="#"  enctype="multipart/form-data"  style="padding: 0; margin: 0;" class="form-horizontal">
                                                  




												  <div class="control-group ">
                        <label  class="control-label"><b>Title <b style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
       <input type="text"  name="satauri" value="" >                          </div>
  </div>
						
						
						
						
						
                                    

<div class="control-group ">
                        <label  class="control-label"><b>Image<b style="color: red;">*</b>  
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
 
<input type="text" name="surati" onclick="openKCFinder(this)" value="0" style="width:210px;cursor:pointer" />			


							</div>
                        </div>  
						  
						  
						  
						  
						

												  <div class="control-group ">
                        <label  class="control-label"><b>Link <b style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
       <input type="text"  name="nomeri" value="" >                          </div>
  </div>
						  
						  
					
  
						  
					
						
						
						                            
   <input style="margin-left:280px;"  class="btn btn-info " type="submit" value="Save" />
   
   
                        </form>

</div>
</div>  






<?php include "../footer_header_en/footer.php" ?>

		