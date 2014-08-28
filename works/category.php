<?php require( "../config.php" );

if(isset($_GET['DEL']))
{
   $del = $_GET['DEL'];
   
  $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	 
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $st = $conn->prepare ( "DELETE FROM menus WHERE id = :id LIMIT 1" );
    $st->bindValue( ":id",  $del, PDO::PARAM_INT );
    $st->execute();
	
	
    $conn = null;



}



function get_menu($data, $parent = 0 )
{
static $i = 1;
$tab = str_repeat(" ",$i);

static $a = 0;

$pusher = "-";

$showPusher = str_repeat($pusher,$a);

if($data[$parent])
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
$html .= '<tr> <td style="text-align:center;">'.$v->id.'</td> <td style="text-align:left;">'.$showPusher.' '.$v->title.'</td> 
<td style="text-align:center;">'.$v->sort.'</td> 

<td style="text-align:center;"> 
		  <a type="button" href="redcategory.php?ID='.$v->id.'" class="btn btn-mini btn-info">რედაქტირება</a> 								
																		    <a type="button" href="category.php?DEL='.$v->id.'" class="btn btn-mini btn-danger">წაშლა</a> 

																			</td></tr>';

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

include "../footer_header_en/header.php"
?>
<div class="container" >
		<h2>კატეგორიების მენეჯერი</h2>
				<ul class="nav nav-tabs" id="auth_tab" style="margin-bottom: 0px;">
            			<li class="active" ><a href="category.php">კატეგორია</a></li>
						<li><a href="admin.php?page=1&kategoria=arferi">ნამუშევრები</a></li>
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
			
			<?php
			 
if (isset($_GET["warmateba"])) 
{
 echo  ' <div class="warmateba"> წარმატებით შეინახა </div>';
}
?>

             
<?php
			 
if (isset($_GET["washla"])) 
{
 echo   ' <div class="delete">წარმატებით წაიშალა</div>';
}
?>
			
			
            <div style="text-align:right;width:100%;">
            
                                    <a type="button" class="btn btn-info" href="add-category.php"> <i class="icon-plus icon-white"></i> დამატება</a>
                            </div>
        </div>
    </div>
    </div>
    <div class="container">
    
    <div class=''>
                <form method="post" action="#" id="table" class="form-horizontal">
                     


           <div style="overflow: auto;">
                <table class="table table-bordered table-hover list table-condensed">
                    <thead>
                        <tr>
               <th style="cursor:default;  text-align:center; color:#333333;text-shadow: 0 1px 0 #FFFFFF;  background-color: #e6e6e6; width:40px; ">   No.   </th>
            <th style="cursor:pointer; text-align:center; color:#333333;text-shadow: 0 1px 0 #FFFFFF;  background-color: #e6e6e6;   ">  სათაური     </th>
 
		  <th style="cursor:pointer; text-align:center; color:#333333;text-shadow: 0 1px 0 #FFFFFF;  background-color: #e6e6e6; width:200px; ">  სორტირება     </th>
										 
										 
			  <th style="cursor:default;  text-align:center; color:#333333;text-shadow: 0 1px 0 #FFFFFF;  background-color: #e6e6e6;width:200px; "> მოქმედება</th>
                                                                                    </tr>
                    </thead>
                    <tbody>
                                                                               

 

<?php
echo $menu;
?>
 
                                                                        </tbody>
                </table>
            </div>
			
			
			
			
			
			
			
			
			
			
	


     </form>
    </div>
   
   
</div>  


<?php include "../footer_header_en/footer.php" ?>

		