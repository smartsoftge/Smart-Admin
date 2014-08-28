<?php require( "../config.php" );
require( "bannerclass.php");


  $results = array();

  if ( isset( $_POST['saveChanges'] ) ) {

  
    if ( !$article = banner::Titobanner((int)$_POST['ID'] ) ) 
	{
	  $posti = $_POST['ID'];
       header( "Location:redbanhelp.php?ID=".$posti );
	 
      return;
    }

    $article->postidanamogeba( $_POST );
	
	
    $article->ganaxleba();
    
	
	  header( "Location:banners.php?redaktireba=1");
   
  } elseif ( isset( $_POST['cancel'] ) ) {

    header( "Location: admin.php" );
	
  } else {
  
   if ( isset( $_GET['ID'] ) ) {
   
    $results['statia'] = banner::Titobanner( (int)$_GET['ID'] );

     require( "redbanner.php" );
	
	}

  }
  


?>
