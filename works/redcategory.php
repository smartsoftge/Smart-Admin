<?php require( "../config.php" );

if(isset($_GET['ID']))
{
   
   $katid =$_GET['ID'];
    $id ;
	$title;
	$sort;
	$url;
	$parent ;
  
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
  $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
    $sql1 = "SET NAMES 'utf8'";
    $st1 = $conn->prepare( $sql1 );
    $st1->execute();
  
  
  $sql = "SELECT * FROM menus WHERE ID = $katid";

  
    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

 
    while ( $row = $st->fetch() ) {
    
	  $id = $row['id'];
	  $title =  $row['title'];
      $sort =   $row['sort'];
      $parent = $row['parent_id'];
   }
 

    $conn = null;
 
 
  
	

}


if(isset($_POST['title']))
{

$title = $_POST['title'];
$parent_id =  $_POST['parent_id'];
$id    = $_POST['id'];
$sort    = $_POST['sort'];

  $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	 
  $sql = "UPDATE menus SET title=:title, parent_id=:parent_id, sort=:sort WHERE id = :id";
  
  $st = $conn->prepare ( $sql );
  

    $st->bindValue( ":title", $title, PDO::PARAM_STR );
    $st->bindValue( ":id", $id, PDO::PARAM_STR );
    $st->bindValue( ":sort", $sort, PDO::PARAM_STR );
    $st->bindValue( ":parent_id", $parent_id, PDO::PARAM_STR );
   
    $st->execute();



}





function get_menu($data, $parent = 0, $selected )
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
$child = get_menu($data, $v->id,$selected);

if($v->parent_id == 0)
{
$listChild = "";
}

$html .= "$tab";
if ($v->id ==  $selected)
{
$html .= '<option  selected value="'.$v->id.'">'.$showPusher.' '.$v->title.'</option>';
} else 
{
$html .= '<option value="'.$v->id.'">'.$showPusher.' '.$v->title.'</option>';
}
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
$menu = get_menu($data,0,$parent);
 include "../footer_header_en/header.php" ?>

<div class="container" >
		<h2>კატეგორიების მენეჯერი</h2>
				<ul class="nav nav-tabs" id="auth_tab" style="margin-bottom: 0px;">
            			<li  class="active" ><a href="category.php">კატეგორია</a></li>
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

        <form method="post" action="#"   style="padding: 0; margin: 0;" class="form-horizontal">
                                                  




												  <div class="control-group ">
                        <label  class="control-label"><b>სათაური <b style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
       <input type="text"  name="title" value="<?php echo $title; ?>" >                          </div>
  </div>
						

												
			 
						  
						  
						

												  <div  class="control-group ">
                        <label  class="control-label"><b>კატეგორია <b style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
 
<select name="parent_id" size="10" style="float:left;margin-right:50px;" id="parent">
<option  value="0">მშობლიური</option>
<?php

echo $menu;
?>
 </select>

	   </div>
  </div>
						  
						  
			  <div class="control-group ">
                        <label  class="control-label"><b>სორტირება <b style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
       <input type="text"  name="sort" value="0" >                          </div>
  </div>
						 		  
					 <input type="hidden"  name="id" value="<?php echo $katid; ?>" >    
						
						
						                            
   <input style="margin-left:280px;"  class="btn btn-info " type="submit" value="Save" />
   
   
                        </form>

</div>
</div>  






<?php include "../footer_header_en/footer.php" ?>

		