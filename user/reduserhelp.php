<?php require( "../config.php" );
require( "userclass.php");


  $results = array();

  if ( isset( $_POST['saveChanges'] ) ) {

    if ( !$article = Momxmarebeli::TitoMomxmarebeli( (int)$_POST['ID'] ) ) 
	{
	  $posti = $_POST['ID'];
      header( "Location:reduserhelp.php?ID=".$posti );
	 
      return;
    }

    $article->postidanamogeba( $_POST );
    $article->ganaxleba();
    $posti = $_POST['ID'];
	
    
	 header('Location:user.php?page=1&redaktireba=1');
   
  } elseif ( isset( $_POST['cancel'] ) ) {

    header( "Location: admin.php" );
  } else {
  
   if ( isset( $_GET['ID'] ) ) {
   
    $results['statia'] = Momxmarebeli::TitoMomxmarebeli( (int)$_GET['ID'] );

    require(  "reduser.php" );
	
	}

  }
  
   if ( isset( $_GET['DEL'] ) ) {
   
      Momxmarebeli::washla( $_GET['DEL']);
	  
	 header('Location:user.php?page=1&washla=1');
   
   }


?>
