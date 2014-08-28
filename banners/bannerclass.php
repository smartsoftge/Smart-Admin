<?php

class banner
{

  public $ID = null;

  public $satauri = null;

  public $statusi = null;
  
  public $banner = null;

  
  
  public function __construct( $data=array() ) 
  {
  
    if ( isset( $data['ID'] ) )       $this->ID = (int)  $data['ID'];
    if ( isset( $data['satauri'] ) )  $this->satauri =   $data['satauri'];
    if ( isset( $data['banner']  ) )  $this->banner =    $data['banner'] ;
	if ( isset( $data['statusi']  ) )  $this->statusi = (int)   $data['statusi'] ;

  }

  
  public function ganaxleba() {
  
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	$sql1 = "SET NAMES 'utf8'";
    $st1 = $conn->prepare( $sql1 );
    $st1->execute();
   
    $sql = "UPDATE banners SET  satauri=:satauri,banner=:banner,statusi=:statusi WHERE id = :id";
 
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":satauri", $this->satauri, PDO::PARAM_STR );
	$st->bindValue( ":statusi", $this->statusi, PDO::PARAM_INT );
	$st->bindValue( ":banner", $this->banner, PDO::PARAM_STR);
	$st->bindValue( ":id", $this->ID, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
	
  }

  
 public function postidanamogeba($postebi) 
 {
    $this->__construct( $postebi );
 }
  

  
  public static function Titobanner( $id ) {
 
   $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
   
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();

    $sql = "SELECT * FROM banners WHERE ID = $id";
    $st = $conn->prepare( $sql );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    if ( $row ) return new banner( $row );

  }
  

  
  public static function GetBanners() 
  {
  
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	  
	
	 $sql = "SELECT * FROM banners ORDER BY id DESC" ;
	
    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

    while ( $row = $st->fetch() ) {
      $article = new banner( $row );
      $list[] = $article;
    }
	
	
	  $sql1 = "SELECT COUNT(*) FROM banners ";

	 
    $totalRows = $conn->query( $sql1 )->fetch();
    $conn = null;
	

    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
  
  
  
  }


  

}

?>
