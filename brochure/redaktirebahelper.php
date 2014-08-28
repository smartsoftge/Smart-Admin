<?php require( "../config.php" );
require( "class.php");


  $results = array();

  if ( isset( $_POST['saveChanges'] ) ) {

    if ( !$article = Statia::TitoStatia( (int)$_POST['ID'] ) ) 
	{
	  $posti = $_POST['ID'];
      header( "Location: redaktirebahelper.php?ID=".$posti );
	 
      return;
    }

    $article->postidanamogeba( $_POST );
    $article->ganaxleba();
    $posti = $_POST['ID'];
	
    
	 header('Location:admin.php?page=1&kategoria=arferi&redaktireba=1');
   
  } elseif ( isset( $_POST['cancel'] ) ) {

    header( "Location: admin.php" );
  } else {
  
   if ( isset( $_GET['ID'] ) ) {
   
    $results['statia'] = Statia::TitoStatia( (int)$_GET['ID'] );

    require(  "redactireba.php" );
	
	}

  }
  
   if ( isset( $_GET['DEL'] ) ) {
   
      Statia::washla( $_GET['DEL']);
	  
	 header('Location:admin.php?page=1&kategoria=arferi&washla=1');
   
   }


?>
