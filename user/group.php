<?php include "../footer_header_en/header.php" ?>
  <div class="container">
		<h2>მომხმარებლის მენეჯერი</h2>
        <ul class="nav nav-tabs" id="auth_tab" style="margin-bottom: 0px;">
                    <li><a href="user.php?page=1&redaktireba=1"> &nbsp; მომხმარებლები &nbsp; </a></li>
            <li class="active"><a href="group.php">ჯგუფი</a></li>
                  </ul>
            </div>
			
		 
<div style="height: 52px;">

    </div>
    <div class="container">
    
    <div class=''>
                <form method="post" action="?xtype=index" id="table" class="form-horizontal">
                   


          <div style="overflow: auto;">
                <table class="table table-bordered table-hover list table-condensed">
                    <thead>
                        <tr>
                                                                                                <th style="cursor:default;  text-align:center; color:#333333;text-shadow: 0 1px 0 #FFFFFF;  background-color: #e6e6e6;
                                        width:40px; 
                                        ">
                                        No.                                    </th>
                                                                                                                                <th onclick="order('crud_groups.group_name');" style="cursor:pointer; text-align:center; color:#333333;text-shadow: 0 1px 0 #FFFFFF;  background-color: #e6e6e6;
                                        ">
                                        ჯგუფის სახელი                                                                                     <i class="arrow asc"></i>
                                                                            </th>
                                                                                                                                <th style="cursor:default;  text-align:center; color:#333333;text-shadow: 0 1px 0 #FFFFFF;  background-color: #e6e6e6;
                                        width:150px; 
                                        ">
                                        სტატუსი                                    </th>
                                                                                    </tr>
                    </thead>
                    <tbody>
                                                                                    <tr>
                                                                            <td style="text-align:center;">
                                                                                            1                                                                                    </td>
                                                                            <td style="">
                                                                                            ადმინი                                                                                    </td>
                                                                            <td style="text-align:center;">
                                                                                     აქტიური                                                                                    </td>
                                                                    </tr>
																	
																	
																	           <tr>
                                                                            <td style="text-align:center;">
                                                                                            2                                                                                  </td>
                               <td style="">  მენეჯერი  </td>
                                                                            <td style="text-align:center;">
                                                                                     აქტიური                                                                                    </td>
                                                                    </tr>
																	
																	      <tr>
                                                                            <td style="text-align:center;">
                                                                                            3                                                                                 </td>
                               <td style="">  საიტის მომხმარებელი  </td>
                                                                            <td style="text-align:center;">
                                                                                     აქტიური                                                                                    </td>
                                                                    </tr>
																	
																	
																	    
																	
                                                         
                                                            
                                                                        </tbody>
                </table>
            </div>
            

        </form>
    </div>
  
   
   

</div>     


<?php include "../footer_header_en/footer.php" ?>



