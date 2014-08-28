<?php

require( "../config.php" );
require_once('bannerclass.php');
 

 $data = banner::GetBanners();
  
  
  $results['articles'] = $data['results'];
   include "../footer_header_en/header.php" ?>





 <div class="container" >
		<h2>ბანერების მენეჯერი</h2>
				<ul class="nav nav-tabs" id="auth_tab" style="margin-bottom: 0px;">
            			
						<li  class="active" ><a href="banners.php">ბანერების მენეჯერი</a></li>
			        </ul>
        		    </div>
<div style="height: 52px;">
    <div data-spy="affix" data-offset-top="90" style="
         top: 24px;
         width: 100%;
         padding-top:5px;
         padding-bottom:5px;
         z-index: 100;">
      
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
                                         <th style="cursor:pointer; text-align:center; color:#333333;text-shadow: 0 1px 0 #FFFFFF;  background-color: #e6e6e6; width:500px; ">  პოზიცია     </th>
                                    
							             <th style="cursor:pointer; text-align:center; color:#333333;text-shadow: 0 1px 0 #FFFFFF;  background-color: #e6e6e6;width:150px;"> სტატუსი          </th>
					                     <th style="cursor:default;  text-align:center; color:#333333;text-shadow: 0 1px 0 #FFFFFF;  background-color: #e6e6e6;width:150px; "> მოქმედება</th>
                                                                                    </tr>
                    </thead>
                    <tbody>
                                                                               




                                                                         <!--ეს უნდა გადამრავლდეს-->

																		 <?php foreach (  $results['articles'] as $statiafor ) { ?>
																		 
																			   <tr>
																			   
																			   
																			   
                                                                            <td style="text-align:center;">  <?php  echo  $statiafor->ID ?>      </td>
                                                                            <td style="text-align:center;">   <?php  echo  $statiafor->satauri ?> </td>
                                                                          
																		    <td style="color:#2d9400; text-align:center;">    <?php 
																			
																			if($statiafor->statusi == 1) 
																			{
																			  echo '<img src="../public/media/css/tick.png" alt="გამოქვეყნებული" />'; 
																
																			} else 
																			{
																			 echo '<img src="../public/media/css/publish_x.png" alt="გამოუქვეყნებული" />';  
																			}

																			?>     </td>																			
																		    <td style="text-align:center;"> 
																			<a type="button" href="redbanhelp.php?ID=<?php  echo  $statiafor->ID ?>"  class="btn btn-mini btn-info">რედაქტირება</a> 
																			</td>
																			
																			
                                                                    </tr>
																	
																	<?php } ?>
														
                                                                     <!--ეს უნდა გადამრავლდეს-->			
																	
																	
																	
																	
																	
																	
                                                            
                                                       
                                                                        </tbody>
                </table>
            </div>
			
			
			
			
			
			
			
			
			
			
	


     </form>
    </div>
   
   
</div>  


<?php include "../footer_header_en/footer.php" ?>

		