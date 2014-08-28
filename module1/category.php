<?php require( "../config.php" );
require_once('categoryclass.php');
  

 $data = Catalogi::GetCatalogebi();
  
  
  $results['articles'] = $data['results'];
include "../footer_header_en/header.php" ?>
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
            
                                    <a type="button" class="btn btn-info" href="add-category.php"> <i class="icon-plus icon-white"></i> Add</a>
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
            <th style="cursor:pointer; text-align:center; color:#333333;text-shadow: 0 1px 0 #FFFFFF;  background-color: #e6e6e6;   ">  Title     </th>
 
		  <th style="cursor:pointer; text-align:center; color:#333333;text-shadow: 0 1px 0 #FFFFFF;  background-color: #e6e6e6; width:200px; ">  Image     </th>
										 
										 
			  <th style="cursor:default;  text-align:center; color:#333333;text-shadow: 0 1px 0 #FFFFFF;  background-color: #e6e6e6;width:200px; "> Action</th>
                                                                                    </tr>
                    </thead>
                    <tbody>
                                                                               









                                                                    
<?php foreach (  $results['articles'] as $statiafor ) { ?>
					
																			   <tr>
																			   
																			   
																			   
                                 <td style="text-align:center;"> <?php  echo  $statiafor->ID ?>  </td>
                   <td > <?php  echo  $statiafor->satauri ?>    </td>
                   

				   <td style="text-align:center;">  <img style="height: 40px;" src="<?php if ( $statiafor->surati != "0" ) {  echo $statiafor->surati ; } if ( $statiafor->surati == "0" ) {  echo "../images/noimage.png"; } ?>" alt="" />   </td>
                                                        																			
					  <td style="text-align:center;"> 
		  <a type="button" href="redcategoryhelp.php?ID=<?php  echo  $statiafor->ID ?>" class="btn btn-mini btn-info">Edit</a> 								
																		    <a type="button" href="redcategoryhelp.php?DEL=<?php  echo  $statiafor->ID ?>" class="btn btn-mini btn-danger">Delete</a> 

																			</td>
																			
																			
                                                                    </tr>
																						
<?php } ?>
			
														
                                                                   	
																	
																	
																	
																	
																	
														
																	
                                                            
                                                       
                                                                        </tbody>
                </table>
            </div>
			
			
			
			
			
			
			
			
			
			
	


     </form>
    </div>
   
   
</div>  


<?php include "../footer_header_en/footer.php" ?>

		