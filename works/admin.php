<?php include "../footer_header_en/header.php" ?>
<?php require( "../config.php" );
require_once('statia.php');
//    session_start();
 
  //  if ($_SESSION['loggedin'] != 1) {
       
    //    header("Location: login.php");
    //    exit;
    //}
$page = 1; 
$kategor= "arferi"; 


if (isset($_GET["page"])) 
{ $p = $_GET["page"]; } 
 
 
if (isset($_GET["kategoria"])) 
{ $c = $_GET["kategoria"]; } 




  $results = array();
  $startfr =(int)  ($p-1) * 30; 
  
  if(isset($_GET["mtavari"]))
  {
    $data = Namushevari::GetMtavari( $startfr,$_GET["mtavari"]);
  }
  else 
  {
   $data = Namushevari::GetNamushevariAdmin( $startfr,$c);
  }
  
  $totali = $data['totalRows'];
  $results['articles'] = $data['shedegi'];

  
   if ( $totali < 30 )
   {
     $total_pages = 1 ;
   }
   else 
   {
     $total_pages = ceil($totali / 30);
   }
  
   $pages = $p;

   					 																


?>



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
<?php
		
								
										 
if (isset($_GET["redaktireba"])) 
{
 echo  ' <div class="warmateba"> წარმატებით შეინახა </div>';
}
?>




		
            <div style="text-align:right;width:100%;">
            
			<div  style="margin-left:10px;position:absolute; margin-left:0px; margin-top:2px;height:29px;" >სულ ნამუშევრების რაოდენობა:<b style="color:#478FED;"><? echo $totali; ?></b>
			</div>
			
		 
			 
                                    <a  style="  margin-top:-2px;" type="button" class="btn btn-info" href="add-article.php"> <i class="icon-plus icon-white"></i> დამატება</a>
                            </div>
        </div>
    </div>
    </div>
    <div class="container">
    
    <div class=''>
                <form method="post" action="?com_id=2&xtype=index" id="table" class="form-horizontal">
                     


           <div style="overflow: auto;">
                <table class="table table-bordered table-hover list table-condensed">
                    <thead>
                        <tr>
                                         <th style="cursor:default;  text-align:center; color:#333333;text-shadow: 0 1px 0 #FFFFFF;  background-color: #e6e6e6; width:40px; ">   No.   </th>
                                         <th style="cursor:pointer; text-align:center; color:#333333;text-shadow: 0 1px 0 #FFFFFF;  background-color: #e6e6e6; width:700px; ">  სათაური     </th>
                                        
                                      
										 <th style="cursor:pointer; text-align:center; color:#333333;text-shadow: 0 1px 0 #FFFFFF;  background-color: #e6e6e6;   width:140px;  ">ავტორი </th>
							             <th style="cursor:pointer; text-align:center; color:#333333;text-shadow: 0 1px 0 #FFFFFF;  background-color: #e6e6e6; width:70px;"> ნახვა    </th>
										 <th style="cursor:pointer; text-align:center; color:#333333;text-shadow: 0 1px 0 #FFFFFF;  background-color: #e6e6e6; width:100px;"> თარიღი    </th>
							             <th style="cursor:pointer; text-align:center; color:#333333;text-shadow: 0 1px 0 #FFFFFF;  background-color: #e6e6e6;">  სტატუსი </th>
					                     <th style="cursor:default;  text-align:center; color:#333333;text-shadow: 0 1px 0 #FFFFFF;  background-color: #e6e6e6;width:150px; "> მოქმედება</th>
                                                                                    </tr>
                    </thead>
                    <tbody>
                                                                               









                                                                         <!--ეს უნდა გადამრავლდეს--> 
																		 
																		 																
<?php foreach (  $results['articles'] as $statiafor ) { ?>

																			   <tr <?php if ( $statiafor->publish != $statiafor->gamoqveyneba) { echo "style='background:#feb1b1;'";}else{echo " ";}  ?>>
																			   
																			   
                                  <td style="text-align:center; ">   <?php echo $statiafor->ID ?>   </td>
                                  <td style="">    <?php echo $statiafor->satauri?>  </td>
                               
																			
        <!-- <td style="text-align:center;">  <?php echo   date('Y-d-m H:i', strtotime($statiafor->tarigi))?>      </td>-->
         <td style="text-align:center;">  <?php echo $statiafor->avtori?>       </td> 
										   <td style="text-align:center; width:40px;"> <?php echo $statiafor->naxva?>        </td>
										   
										    <td style="text-align:center; width:80px;">  <?php echo   date('Y-d-m')?>   </td>
										   
										   
											 <td style="color:#2d9400; text-align:center;">    <?php 
																			
																			if($statiafor->publish == 1) 
																			{
																			  echo '<img src="../public/media/css/tick.png" alt="გამოქვეყნებული" />'; 
																
																			} else 
																			{
																			 echo '<img src="../public/media/css/publish_x.png" alt="გამოუქვეყნებული" />';  
																			}

																			?>  

																			</td>																			
																		    <td style="text-align:center;"> 
							 <?php if($_SESSION['jgufi'] != 3) 
								  {
								echo '<a type="button" href="redaktirebahelper.php?ID= '.$statiafor->ID .'" class="btn btn-mini btn-info">რედაქტირება</a>';
					        	echo '<a type="button" href="redaktirebahelper.php?DEL='.$statiafor->ID .'" class="btn btn-mini btn-danger">წაშლა </a>';
                              	  }	
								  else 
								  {
								   echo "ups";
								  }
                              ?>								  
								</td>
													
                                                                       </tr>
														
                                                                  

																	 
<?php } ?>																	 
															
															
                                                    
                                                                        </tbody>
                </table>
            </div>
			
			
			
			
			
			        
<div class="pagination pagination-right">
    
    
    <ul>
                                
                                           	   
<?php 

for ($i=1; $i <= $total_pages; $i++) 
{ 
       if( $pages == $i)
	   {
	      
		  echo "<li class='active'> <a href='#'>".$i."</a></li>";
		  
	    } else 
		{
		if (isset($_GET["mtavari"])) 
{
   echo "<li><a href='admin.php?page=".$i."&mtavari=".$_GET["mtavari"]."' >".$i."</a></li>";
}
else
{
	     echo "<li><a href='admin.php?page=".$i."&kategoria=".$c."' >".$i."</a></li>";
}

	   }	
};
 
?>
                                         
               
                            </ul>
</div>



     </form>
    </div>
   
   
</div>  


<?php include "../footer_header_en/footer.php" ?>

		