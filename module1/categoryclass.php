<?php class catalogi
{



  public $ID = null;

  public $satauri = null;

  public $surati = null;
  
  public $nomeri = null;
  
 
  
  
  public function __construct( $data=array() ) 
  {
  
    if ( isset( $data['ID'] ) )       $this->ID = (int)  $data['ID'];
    if ( isset( $data['satauri'] ) )  $this->satauri =   $data['satauri'];
    if ( isset( $data['surati']  ) )  $this->surati =    $data['surati'] ;
    if ( isset( $data['nomeri']  ) )  $this->nomeri =    $data['nomeri'] ;
    
    
	
  }

  
  public function ganaxleba() {
  
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	$sql1 = "SET NAMES 'utf8'";
    $st1 = $conn->prepare( $sql1 );
    $st1->execute();
   
	
    $sql = "UPDATE module1 SET  satauri=:satauri,surati=:surati,nomeri=:nomeri WHERE id = :id";
 
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":satauri", $this->satauri, PDO::PARAM_STR );
	$st->bindValue( ":surati", $this->surati, PDO::PARAM_STR);
    $st->bindValue( ":nomeri", $this->nomeri, PDO::PARAM_STR );
	$st->bindValue( ":id", $this->ID, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
	
  }

   public function chasma() {

   $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	

	$sql = "INSERT INTO module1 ( satauri,surati,nomeri ) VALUES (:satauri,:surati,:nomeri)";
	
    $st = $conn->prepare( $sql );
	
   
    $st->bindValue( ":satauri", $this->satauri, PDO::PARAM_STR );
	$st->bindValue( ":surati", $this->surati, PDO::PARAM_STR);
	$st->bindValue( ":nomeri", $this->nomeri, PDO::PARAM_STR );
     $st->execute();
	
    $conn = null;
	
  }
  
 public function postidanamogeba($postebi) 
 {
    $this->__construct( $postebi );
 }
  
  
  public static function TitoCatalogi( $id ) {
 
   $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
   
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
 
   
    $sql = "SELECT * FROM module1 WHERE ID = $id";
    $st = $conn->prepare( $sql );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    if ( $row ) return new catalogi( $row );

  }
  
 
  
  public static function GetCatalogebi() 
  {
  
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	  
	
	 $sql = "SELECT * FROM module1 ORDER BY nomeri ASC" ;
	
    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

    while ( $row = $st->fetch() ) {
      $article = new catalogi( $row );
      $list[] = $article;
    }
	
	
	  $sql1 = "SELECT COUNT(*) FROM module1 ";

	 
    $totalRows = $conn->query( $sql1 )->fetch();
    $conn = null;
	

    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
  
  
  
  }


  
  public static function GetCatalogiAdmin( $gverdi, $kateg ) 
  {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	 
	
	 $sql = "SELECT * FROM  module1  ORDER BY nomeri ASC LIMIT  $gverdi,30" ;
	 
    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

	
    while ( $row = $st->fetch() ) {
      $article = new catalogi( $row );
      $list[] = $article;
    }

	  $sql1 = "SELECT COUNT(*) FROM  module1"; 
	
	 
    $totalRows = $conn->query( $sql1 )->fetch();
    $conn = null;
	
	
    return ( array ("shedegi" => $list, "totalRows" => $totalRows[0] ) );

  }

  


  public function washla($idi) {

    
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $st = $conn->prepare ( "DELETE FROM module1 WHERE id = :id LIMIT 1" );
    $st->bindValue( ":id", $idi, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }

}

?>
