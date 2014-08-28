<?php require( "../config.php" );
	  require( "categoryclass.php");


  $results = array(); 

  if ( isset( $_POST['saveChanges'] ) ) {

  
    if ( !$article = catalogi::TitoCatalogi((int)$_POST['ID'] ) ) 
	{
	  $posti = $_POST['ID'];
       header( "Location:redcategoryhelp.php?ID=".$posti );
	 
      return;
    }

    $article->postidanamogeba( $_POST );
	
	
    $article->ganaxleba();
    
	
	  header( "Location:category.php?redaktireba=1");
   
  } elseif ( isset( $_POST['cancel'] ) ) {

    header( "Location: admin.php" );
	
  } else {
  
   if ( isset( $_GET['ID'] ) ) {
   
    $results['statia'] = catalogi::TitoCatalogi( (int)$_GET['ID'] );

     require( "redcategory.php" );
	
	}

  }
  
   if ( isset( $_GET['DEL'] ) ) {
   
      catalogi::washla( $_GET['DEL']);
	  
	 header('Location:category.php?redaktireba=1');
   
   }


?>
