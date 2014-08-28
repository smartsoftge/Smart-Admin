<?php require( "../config.php" );
require_once('userclass.php');
 
//    session_start();
 
  //  if ($_SESSION['loggedin'] != 1) {
       
    //    header("Location: login.php");
    //    exit;
    //}
 

$page = 1; 


if (isset($_GET["page"])) 
{ $p = $_GET["page"]; } 
 
 

  $results = array();
  $startfr =(int)  ($p-1) * 30; 
  
  
   $data = Momxmarebeli::GetMomxmareblebi( $startfr);
 
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

  include "../footer_header_en/header.php" ?>

	


      <div class="container">
		<h2>მომხმარებლის მენეჯერი</h2>
        <ul class="nav nav-tabs" id="auth_tab" style="margin-bottom: 0px;">
                    <li class="active"><a href="user.php?page=1&redaktireba=1"> &nbsp; მომხმარებლები &nbsp; </a></li>
            <li><a href="group.php">ჯგუფი</a></li>
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
            
                <a type="button" class="btn btn-info" href="add-user.php"> <i class="icon-plus icon-white"></i> დამატება</a>
            </div>
        </div>
    </div>
    </div>
    <div class="container">
    
    <div class=''>
                <form method="post" action="?xtype=index" id="table" class="form-horizontal">
                        <input type="hidden" name="src[page]" id="srcPage" value="1"/>
            <input type="hidden" name="src[limit]" id="srcLimit" value="20"/>
            <input type="hidden" name="src[order_field]" id="srcOrder_field" value="crud_users.user_name"/>
            <input type="hidden" name="src[order_type]" id="srcOrder_type" value="asc"/>
            

           <div style="overflow: auto;">
                <table class="table table-bordered table-hover list table-condensed">
                    <thead>
                        <tr>
                  <th style="cursor:default;  text-align:center; color:#333333;text-shadow: 0 1px 0 #FFFFFF;  background-color: #e6e6e6;
                                        width:40px; 
                                        ">
                                        No.                                    </th>
      <th   style="cursor:pointer; text-align:center; color:#333333;text-shadow: 0 1px 0 #FFFFFF;  background-color: #e6e6e6;"> პირადობის ნომერი<i class="arrow asc"></i>
                                                                            </th>
           <th   style="cursor:pointer; text-align:center; color:#333333;text-shadow: 0 1px 0 #FFFFFF;  background-color: #e6e6e6;   "> ჯგუფი </th>
      <th style="cursor:pointer; text-align:center; color:#333333;text-shadow: 0 1px 0 #FFFFFF;  background-color: #e6e6e6;">სახელი გვარი</th>
        <th  style="cursor:pointer; text-align:center; color:#333333;text-shadow: 0 1px 0 #FFFFFF;  background-color: #e6e6e6;    ">     სტატუსი  </th>
        <th style="cursor:default;  text-align:center; color:#333333;text-shadow: 0 1px 0 #FFFFFF;  background-color: #e6e6e6;  ">მოქმედება</th>
                                                                                    </tr>
                    </thead>
                    <tbody>
					
																	 																
<?php foreach (  $results['articles'] as $statiafor ) { ?>
                                                                                    <tr>
                                                                            <td style="text-align:center;">
                                                                                            <?php echo $statiafor->ID?>                                                                                     </td>
                                                                            <td style="text-align:center;">
                                                                                             <?php echo $statiafor->login?>                                                                                     </td>
                                                                            <td style="text-align:center;">
                                                                                              <?php 
							 	if (  $statiafor->jgufi == 1 )
								{
								 echo "Admin";
								}
								
								
								if ($statiafor->jgufi == 2 )
								{
								 echo "Manager";
								}
								
								if ($statiafor->jgufi == 3 )
								{
								 echo "User";
								}
								
								 
								?>
								
							                                                                 </td>
                                                                            <td style="text-align:center;">
                                                                                             <?php echo $statiafor->saxeli?>                                                                                 </td>
                                                                             
                                                                       
                                                                            <td style="text-align:center;">
                                                                                             <?php 
																			
																			if($statiafor->status == 1) 
																			{
																			  echo '<img src="../public/media/css/tick.png" alt="Active" />'; 
																
																			} else 
																			{
																			 echo '<img src="../public/media/css/publish_x.png" alt="Unactive" />';  
																			}

																			?>                                                                                    </td>
                                                                            <td style="text-align:center;">
                                                                                             <a href="reduserhelp.php?ID=<?php echo $statiafor->ID?>" type="button" class="btn btn-mini btn-info">რედაქტირება</a> 
																							 <a href="reduserhelp.php?DEL=<?php echo $statiafor->ID?>"type="button" class="btn btn-mini btn-danger">წაშლა</a>                                                                                    </td>
                                                                    </tr>
																	
																	
																	<?php } ?>	
                                                         
                                                            
                                                                        </tbody>
                </table>
            </div>
 
    
       </form>
	   
	   
	   
	   
	              
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

	     echo "<li><a href='user.php?page=".$i."' >".$i."</a></li>";

	   }	
};
 
?>
               
                            </ul>
</div>
	   
	   
	   
	   
	   
	   
	   
	   
	   
    </div>
    <img src="public/media/icons/loading.gif" style="display: none;" />
  

  
  </div>
  
  

<?php include "../footer_header_en/footer.php" ?>

		