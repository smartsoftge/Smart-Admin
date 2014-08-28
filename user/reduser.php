<?php include "../footer_header_en/header.php" ?>
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
                <a class="btn" href="user.php">  &nbsp; Close  &nbsp; </a>
               
            </div>
        </div>
    </div>
    </div>
<div class="container">

<div class='x-table well  ' style="background:#FBFBFB;">
     <form method="post" action="reduserhelp.php?"  enctype="multipart/form-data"
          id="crudForm" style="padding: 0; margin: 0;" class="form-horizontal">
                                             




											 <div class="control-group ">
 <label for="crudRowsPerPage" class="control-label"><b>სახელი გვარი  <b  style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
                                <input type="text"  name="saxeli" value="<?php echo $results['statia']->saxeli ?>" required />                            </div>
                        </div>
                                   
											 <div class="control-group ">
 <label for="crudRowsPerPage" class="control-label"><b>პირადობის ნომერი  <b  style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
                                <input type="text"  name="login" value="<?php echo $results['statia']->login ?>" required />                            </div>
                        </div>
                                   

											 <div class="control-group ">
 <label for="crudRowsPerPage" class="control-label"><b>პირადობის მოწ. </br> ან პასპ. ნომერი  <b  style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
                                <input type="text"  name="mowmobisnomeri"  value="<?php echo $results['statia']->mowmobisnomeri ?>"  required />                            </div>
                        </div>
                                   



								   <div class="control-group ">
                        <label for="crudRowsPerPage" class="control-label"><b>პაროლი                                <b
                                        style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
							
                                <input type="text" name="password" value="<?php echo $results['statia']->password ?>" required />                            </div>
                        </div>
                                    



                                   



								   <div class="control-group ">
                        <label for="crudRowsPerPage" class="control-label"><b>ჯგუფი                                 
                            </b> </label>
                            <div class="controls">
							
							
                                <select name="jgufi" required>
								
								<option  <?php if($results['statia']->jgufi = 1){ echo "selected";} ?>  value="1">Admin </option>
								<option   <?php if($results['statia']->jgufi = 2){ echo "selected";} ?>  value="2">Manager </option>
								<option <?php if($results['statia']->jgufi = 3){ echo "selected";} ?>  value="3">Site User </option>
 					        	</select>                      


								</div>
                        </div>
                                 
  
                
											 <div class="control-group ">
 <label for="crudRowsPerPage" class="control-label"><b>ხარისხი  <b  style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
                                <select name="xarisxi"   required> 
  <option   value="">ხარისხი</option>
  <option <?php if($results['statia']->xarisxi = "მოსწავლე"){ echo "selected";} ?>  value="მოსწავლე">მოსწავლე</option>
  <option <?php if($results['statia']->xarisxi = "ბაკალავრი"){ echo "selected";} ?> value="ბაკალავრი">ბაკალავრი</option>
  <option <?php if($results['statia']->xarisxi = "მაგისტრი"){ echo "selected";} ?> value="მაგისტრი">მაგისტრი</option>
  <option <?php if($results['statia']->xarisxi = "დოქტორი"){ echo "selected";} ?> value="დოქტორი">დოქტორი</option>
  <option <?php if($results['statia']->xarisxi = "სხვა"){ echo "selected";} ?> value="სხვა">სხვა</option>
</select>


                          </div>
                        </div>
                                   
						
						 
											 <div class="control-group ">
 <label for="crudRowsPerPage" class="control-label"><b>მოქალაქეობა  <b  style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
		<select name="moqalaqeoba"   required> 
  <option value="">მოქალაქეობა</option>
  <option value="Georgia">Georgia</option> 
  <option value="United States">United States</option> 
  <option value="Russian Federation">Russian Federation</option> 
 
 </select>

								</div>
                        </div>
                                   
						
						 
											 <div class="control-group ">
 <label for="crudRowsPerPage" class="control-label"><b>დაბ. თარიღი  <b  style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">
                                <input type="text" placeholder="მაგ.: dd/mm/yyyy"  name="dabadeba" value="<?php echo $results['statia']->dabadeba ?>"  required />                            </div>
                        </div>
                                   
						
						 


								 <div class="control-group ">
                        <label for="crudRowsPerPage" class="control-label"><b>ელ. ფოსტა                                <b
                                        style="color: red;">*</b>  
                            </b> </label>
                            <div class="controls">

                               <input type="email" name="mail" value="<?php echo $results['statia']->mail ?>"    required />            

							   </div>
                        </div>
						
						


									   
									   
									   <div class="control-group ">
                        <label for="crudRowsPerPage" class="control-label"><b>სტატუსი                                 
                            </b> </label>
                            <div class="controls">
							
							
                                <label class="radio inline" style="margin-bottom:9px;">
								<input <?php if($results['statia']->status = 1){ echo "checked";} ?> name="status" id="dataCrud_usersUser_status1" value="1" type="radio" />აქტიური</label>
								
								
								
								<label class="radio inline" style="margin-bottom:9px;">
								<input  <?php if($results['statia']->status = 0){ echo "checked";} ?>name="status" id="dataCrud_usersUser_status0" value="0" type="radio" />დეაქტიური</label>

								</div>
                        </div>
						
			 	 <input type="hidden" name="saveChanges" value="SaveChanges" />
                             <input type="hidden" name="ID" value="<?php echo $results['statia']->ID ?>"/>

								  
						
						                            
   <input style="margin-left:290px;"  class="btn btn-info " type="submit" value="დამატება" />
						
						
                        </form>

</div>
</div>
     


<?php include "../footer_header_en/footer.php" ?>
