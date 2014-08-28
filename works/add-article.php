<?php require( "../config.php" );
require( "statia.php");


 
 if(isset($_POST['satauri'])){
    $stati = new Namushevari;
	
    $stati->postidanamogeba( $_POST );
	
    $stati->chasma();
	
   header( 'Location:admin.php?page=1&kategoria=arferi&warmateba=1' );

}


 

function get_menu($data, $parent = 0 )
{
static $i = 1;
$tab = str_repeat(" ",$i);

static $a = 0;

$pusher = "-";

$showPusher = str_repeat($pusher,$a);

if(isset($data[$parent]))
{
$html = "$tab";
$i++;
foreach($data[$parent] as $v)
{
$a++;
$child = get_menu($data, $v->id);

if($v->parent_id == 0)
{
$listChild = "";
}

$html .= "$tab";
$html .= '<option value="'.$v->id.'">'.$showPusher.' '.$v->title.'</option>';

$a–;

if($child)
{
$i–;
$html .= $child;
$html .= "$tab";
}
$html .= '</li>';
}
$html .= "$tab";
return $html;
}
else
{
return false;
}
}

$dbh = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $dbh->prepare( $sql1 );
	   $st1->execute();
	   
	$sql1 = "SELECT * FROM menus ORDER BY sort";
    $st1 = $dbh->prepare( $sql1 );
    $st1->execute();
	
while($r = $st1->fetch(PDO::FETCH_OBJ))
{
$data[$r->parent_id][] = $r;
}
$menu = get_menu($data);

 include "../footer_header_en/header.php" ?>



    <div class="container" >
		<h2>ნამუშევრების მენეჯერი</h2>
				<ul class="nav nav-tabs" id="auth_tab" style="margin-bottom: 0px;">
            			<li ><a href="category.php">კატეგორია</a></li>
						<li  class="active" ><a href="admin.php?page=1&kategoria=arferi">ნამუშევრები</a></li>
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
                                <input type="text" name="satauri" required />   </div>
                        </div>
						
	


									<div class="control-group ">
                        <label  class="control-label"><b>კატეგორია   <b style="color: red;">*</b>  </b> </label>
                            <div class="controls">
                                <select name="kategoria" required >
							<option value=""> კატეგორიის არჩევა  </option>
 								<?php  echo $menu;?>
 								</select>

			                            </div>
                        </div>
                                            
                                    
									
									
									
									
									
								  
						            
                                
						
						
						
						
						  <div class="control-group ">
                        <label  class="control-label"><b>ფაილი                                <b
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
 
<input type="text" name="faili"onclick="openKCFinder(this)" value="0" style="width:210px;cursor:pointer"  />			
							</div>
                        </div>  
						 
						  
						  
						  
						  
						  	<div class="control-group ">
                        <label  class="control-label"><b>გამოქვეყნება   <b style="color: red;">*</b>  </b> </label>
                            <div class="controls">
                                <select name="gamoqveyneba">
		
					<option value="0"> გამოუქვეყენებელი  </option>
					<option value="1"> გამოქვეყნებული </option>
					
								</select>

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
                        <label  class="control-label"><b>სტატია                                 
                            </b> </label>
                            <div class="controls">
                                <textarea  id="dataArticlesArticle_content"  name="teqsti" style="width:680px; height:400px;"  ></textarea>
<script>
CKEDITOR.replace("dataArticlesArticle_content",{width:660,height:250});	
</script>                            </div>
                        </div>
						 
						 
						 
						   <input type="hidden" name="avtori"  value="<?php echo $_SESSION['saxeli']; ?>" /> 
						
						                            
   <input  style="margin-left:740px;"  class="btn btn-info " type="submit" value="შენახვა" />
   
 
                        </form>

</div>
</div>   
<?php include "../footer_header_en/footer.php" ?>