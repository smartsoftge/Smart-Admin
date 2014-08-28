<?php

class Statia
{

  public $ID = null;

  public $satauri = null;

  public $surati = null;
 
  public $reziume = null;
   
  public $statia = null;

  public $tarigi = null;
  
  public $avtori = null;
  
  public $kategoria = null;

  public $marjvenabox = null;  
  
  public $publish = null; 

  public $slaidi = null; 
   
  public $dgis = null; 
   
  public $analitika = null; 
  
  public $naxva = null; 
  
  
  public function __construct( $data=array() ) 
  {
  
    if ( isset( $data['ID'] ) )       $this->ID = (int)  $data['ID'];
    if ( isset( $data['satauri'] ) )  $this->satauri =   $data['satauri'];
    if ( isset( $data['surati']  ) )  $this->surati =    $data['surati'] ;
    if ( isset( $data['reziume'] ) )  $this->reziume =   $data['reziume'];
    if ( isset( $data['statia'] ) )   $this->statia =    $data['statia'];
    if ( isset( $data['tarigi'] ) )   $this->tarigi =    $data['tarigi'];
	if ( isset( $data['avtori'] ) )   $this->avtori =    $data['avtori'];
	if ( isset( $data['kategoria'] )) $this->kategoria = $data['kategoria'];
	if ( isset( $data['marjvenabox'] ))$this->marjvenabox = $data['marjvenabox'];
	if ( isset( $data['publish'] ))   $this->publish =      $data['publish'];
	if ( isset( $data['slaidi'] ))    $this->slaidi =       $data['slaidi'];
	if ( isset( $data['dgis'] ))      $this->dgis =         $data['dgis'];
	if ( isset( $data['analitika'] )) $this->analitika =    $data['analitika'];
	if ( isset( $data['naxva'] ))     $this->naxva =        $data['naxva'];
	
  }

  
  public function ganaxleba() {
  
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	$sql1 = "SET NAMES 'utf8'";
    $st1 = $conn->prepare( $sql1 );
    $st1->execute();
	
 $sql = "UPDATE statiebi SET  satauri=:satauri, surati=:surati,reziume=:reziume,statia=:statia,avtori=:avtori,kategoria=:kategoria,marjvenabox=:marjvenabox,publish=:publish,slaidi=:slaidi,dgis=:dgis,analitika=:analitika  WHERE id = :id";
 
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":satauri", $this->satauri, PDO::PARAM_STR );
	$st->bindValue( ":surati", $this->surati, PDO::PARAM_STR);
    $st->bindValue( ":reziume", $this->reziume, PDO::PARAM_STR );
	$st->bindValue( ":statia", $this->statia, PDO::PARAM_STR );
    $st->bindValue( ":avtori", $this->avtori, PDO::PARAM_STR );
	$st->bindValue( ":kategoria", $this->kategoria, PDO::PARAM_INT );
	$st->bindValue( ":marjvenabox", $this->marjvenabox, PDO::PARAM_INT);
    $st->bindValue( ":publish", $this->publish, PDO::PARAM_INT );
	$st->bindValue( ":slaidi", $this->slaidi, PDO::PARAM_INT );
	$st->bindValue( ":dgis", $this->dgis, PDO::PARAM_INT);
    $st->bindValue( ":analitika", $this->analitika, PDO::PARAM_INT );
	$st->bindValue( ":id", $this->ID, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
	
	
  }

  public static function GetCateg( $gverdi, $kateg ) 
  {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	 
	 
	 $sql = "SELECT * FROM statiebi  WHERE kategoria='$kateg' and  publish=1  ORDER BY id DESC  LIMIT  $gverdi,15" ;
	 
	 
    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

	
    while ( $row = $st->fetch() ) {
      $article = new Statia( $row );
      $list[] = $article;
    }
	
	  $sql1 = "SELECT COUNT(*) FROM statiebi WHERE kategoria='$kateg'  and  publish=1 "; 

	 
    $totalRows = $conn->query( $sql1 )->fetch();
    $conn = null;
	
	
    return ( array ("shedegi" => $list, "totalRows" => $totalRows[0] ) );

  }
  
  
  public static function search( $gverdi, $search ) 
  {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	 
 
	 $sql = "SELECT * FROM statiebi  WHERE statia LIKE  '%$search%'  ORDER BY id DESC  LIMIT  $gverdi,15" ;
	 
	 
    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

	
    while ( $row = $st->fetch() ) {
      $article = new Statia( $row );
      $list[] = $article;
    }
	
	  $sql1 = "SELECT  COUNT(*) FROM statiebi  WHERE statia LIKE  '%$search%' "; 

	 
    $totalRows = $conn->query( $sql1 )->fetch();
    $conn = null;
	
	
    return ( array ("shedegi" => $list, "totalRows" => $totalRows[0] ) );

  }
  
    
  public static function searchbyauthor( $gverdi, $search ) 
  {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	 
 
	 $sql = "SELECT * FROM statiebi  WHERE avtori LIKE  '%$search%'  ORDER BY id DESC  LIMIT  $gverdi,15" ;
	 
	 
    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

	
    while ( $row = $st->fetch() ) {
      $article = new Statia( $row );
      $list[] = $article;
    }
	
	  $sql1 = "SELECT  COUNT(*) FROM statiebi  WHERE avtori LIKE  '%$search%' "; 

	 
    $totalRows = $conn->query( $sql1 )->fetch();
    $conn = null;
	
	
    return ( array ("shedegi" => $list, "totalRows" => $totalRows[0] ) );

  }
  

  public static function GetDgis( ) 
  {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	 
	 
	 $sql = "SELECT * FROM statiebi  WHERE dgis=1 and  publish=1  ORDER BY id DESC  LIMIT  15" ;
	 
	 
    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

	
    while ( $row = $st->fetch() ) {
      $article = new Statia( $row );
      $list[] = $article;
    }
	
	  $sql1 = "SELECT COUNT(*) FROM statiebi WHERE  dgis=1 and  publish=1  "; 

	 
    $totalRows = $conn->query( $sql1 )->fetch();
    $conn = null;
	
	
    return ( array ("shedegi" => $list, "totalRows" => $totalRows[0] ) );

  }
  
   function GetDgisKvela($page) 
  {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	 
	 
	 $sql = "SELECT * FROM statiebi  WHERE dgis=1 and  publish=1  ORDER BY id DESC  LIMIT  $page,15" ;
	 
	 
    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

	
    while ( $row = $st->fetch() ) {
      $article = new Statia( $row );
      $list[] = $article;
    }
	
	  $sql1 = "SELECT COUNT(*) FROM statiebi WHERE  dgis=1 and  publish=1  "; 

	 
    $totalRows = $conn->query( $sql1 )->fetch();
    $conn = null;
	
	
    return ( array ("shedegi" => $list, "totalRows" => $totalRows[0] ) );

  }
  public static function GetAnalitika( ) 
  {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	 
	 
	 $sql = "SELECT * FROM statiebi  WHERE analitika=1 and  publish=1  ORDER BY id DESC  LIMIT  6" ;
	 
	 
    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

	
    while ( $row = $st->fetch() ) {
      $article = new Statia( $row );
      $list[] = $article;
    }
	
	  $sql1 = "SELECT COUNT(*) FROM statiebi WHERE  dgis=1 and  publish=1  "; 

	 
    $totalRows = $conn->query( $sql1 )->fetch();
    $conn = null;
	
	
    return ( array ("shedegi" => $list, "totalRows" => $totalRows[0] ) );

  }
  
  public static function GetSlaid( ) 
  {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	 
	 
	 $sql = "SELECT * FROM statiebi  WHERE slaidi=1 and  publish=1  ORDER BY id DESC  LIMIT  30" ;
	 
	 
    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

	
    while ( $row = $st->fetch() ) {
      $article = new Statia( $row );
      $list[] = $article;
    }
	
	  $sql1 = "SELECT COUNT(*) FROM statiebi WHERE  dgis=1 and  publish=1  "; 

	 
    $totalRows = $conn->query( $sql1 )->fetch();
    $conn = null;
	
	
    return ( array ("shedegi" => $list, "totalRows" => $totalRows[0] ) );

  }
  
  
  public static function GetMarjvena($marjven) 
  {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	 
	 if($marjven == 1 ) 
	 {
	 $sql = "SELECT * FROM statiebi  WHERE marjvenabox=1 and  publish=1  ORDER BY id DESC  LIMIT  16" ;
	 }
	 if($marjven == 2 ) 
	 {
	 $sql = "SELECT * FROM statiebi  WHERE marjvenabox=2 and  publish=1  ORDER BY id DESC  LIMIT  16" ;
	 }
	 
	 if($marjven == 3 ) 
	 {
	 $sql = "SELECT * FROM statiebi  WHERE marjvenabox=3 and  publish=1  ORDER BY id DESC  LIMIT  16" ;
	 }
	 
	 
    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

	
    while ( $row = $st->fetch() ) {
      $article = new Statia( $row );
      $list[] = $article;
    }
	
	  $sql1 = "SELECT COUNT(*) FROM statiebi WHERE  dgis=1 and  publish=1  "; 

	 
    $totalRows = $conn->query( $sql1 )->fetch();
    $conn = null;
	
	
    return ( array ("shedegi" => $list, "totalRows" => $totalRows[0] ) );

  }
  
  
   public function chasma() {

   $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	
	
	$sql = "INSERT INTO statiebi ( satauri, surati, reziume, statia,tarigi,avtori,kategoria,marjvenabox ,publish ,slaidi ,dgis ,analitika ) VALUES (:satauri,:surati,:reziume, :statia , NOW() ,:avtori ,:kategoria,:marjvenabox , :publish , :slaidi , :dgis , :analitika )";
	
    $st = $conn->prepare ( $sql );
	
    $st->bindValue( ":satauri", $this->satauri, PDO::PARAM_STR );
	$st->bindValue( ":surati", $this->surati, PDO::PARAM_STR);
    $st->bindValue( ":reziume", $this->reziume, PDO::PARAM_STR );
	$st->bindValue( ":statia", $this->statia, PDO::PARAM_STR );
    $st->bindValue( ":avtori", $this->avtori, PDO::PARAM_STR );
	$st->bindValue( ":kategoria", $this->kategoria, PDO::PARAM_INT );
	$st->bindValue( ":marjvenabox", $this->marjvenabox, PDO::PARAM_INT);
    $st->bindValue( ":publish", $this->publish, PDO::PARAM_INT );
	$st->bindValue( ":slaidi", $this->slaidi, PDO::PARAM_INT );
	$st->bindValue( ":dgis", $this->dgis, PDO::PARAM_INT);
    $st->bindValue( ":analitika", $this->analitika, PDO::PARAM_INT );
    $st->execute();
	
	
    $conn = null;
	
  }
  
 public function postidanamogeba($postebi) 
 {
    $this->__construct( $postebi );
 }
  
   public static function TitoStatia( $id ) {
 
   $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
   
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
    
  
   
    $sql = "SELECT * FROM statiebi WHERE ID = $id";
    $st = $conn->prepare( $sql );
    $st->execute();
    $row = $st->fetch();
     $statis = new Statia( $row );
	$sql = "UPDATE statiebi SET  naxva=:naxva   WHERE id =  $id";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":naxva", ++$statis->naxva, PDO::PARAM_STR );
    $st->execute();
    $conn = null;
	
    if ( $row ) return new Statia( $row );
   
  }
  
  
  public static function Dzebna( $gverdi , $dzebna) 
  {
  
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	
	 
	 $sql = "SELECT * FROM product  WHERE title LIKE  '%$dzebna%'  LIMIT  $gverdi,15" ;
	 
	
    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

    while ( $row = $st->fetch() )
	{
      $article = new Statia( $row );
      $list[] = $article;
    }
	

	  $sql1 = "SELECT COUNT(*) FROM product  WHERE title LIKE  '%$dzebna%'  " ;
	
	 
    $totalRows = $conn->query( $sql1 )->fetch();
    $conn = null;
	
    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
  
  
  }
  

  public static function GetStatia( $gverdi, $kateg ) 
  {
  
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	

	
	 if ( $brand == "a" ) 
	 {
	 
	 $sql = "SELECT * FROM statiebi  WHERE category='$kateg' LIMIT  $gverdi,15" ;
	 
	 }
	 else 
	 {
	 
	 $sql = "SELECT * FROM statiebi  WHERE category='$kateg' AND brand='$brand' LIMIT  $gverdi,15" ;
	 
	 }
	
    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

    while ( $row = $st->fetch() ) {
      $article = new Statia( $row );
      $list[] = $article;
    }
	
	
	  $sql1 = "SELECT COUNT(*) FROM product  WHERE category='$kateg'";

	 
    $totalRows = $conn->query( $sql1 )->fetch();
    $conn = null;
	

    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
  
  
  
  }


  
  public static function GetStatiaAdmin( $gverdi, $kateg ) 
  {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	 
	 if ( $kateg == "arferi" ) 
	 {
	 $sql = "SELECT * FROM  statiebi  ORDER BY id DESC LIMIT  $gverdi,30" ;
	 } else
	 {
	 $sql = "SELECT * FROM statiebi  WHERE kategoria='$kateg'  ORDER BY id DESC  LIMIT  $gverdi,30" ;
	 }
	 
    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

	
    while ( $row = $st->fetch() ) {
      $article = new Statia( $row );
      $list[] = $article;
    }
	 if ( $kateg == "arferi" ) 
	 {
	 $sql1 = "SELECT COUNT(*) FROM statiebi  ";
     } else 
	 {
	  $sql1 = "SELECT COUNT(*) FROM statiebi WHERE kategoria='$kateg'   "; 
	 }
	 
    $totalRows = $conn->query( $sql1 )->fetch();
    $conn = null;
	
	
    return ( array ("shedegi" => $list, "totalRows" => $totalRows[0] ) );

  }
  

    
  public static function GetMtavari( $gverdi, $mtavari ) 
  {
  
    $mt = (int) $mtavari; 
	
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	 
	 if ( $mt  == 1 ) 
	 {
	 
	 $sql = "SELECT * FROM statiebi WHERE  slaidi=1  ORDER BY id DESC  LIMIT  $gverdi,30" ;
	 
	 } 
	 if ( $mt  == 2 ) 
	 {
	 
	 $sql = "SELECT * FROM statiebi WHERE dgis=1 and publish=1 ORDER BY id DESC  LIMIT  $gverdi,30" ;
	 
	 } 
	 if ( $mt  == 3 ) 
	 {
	 
	 $sql = "SELECT * FROM statiebi WHERE analitika=1  ORDER BY id DESC  LIMIT  $gverdi,30" ;
	 
	 } 
	 if ( $mt  == 4 ) 
	 {
	 
	 $sql = "SELECT * FROM statiebi WHERE marjvenabox=1 ORDER BY id DESC  LIMIT  $gverdi,30" ;
	 
	 } 
	 if ( $mt  == 5 ) 
	 {
	 
	 $sql = "SELECT * FROM statiebi WHERE marjvenabox=2 ORDER BY id DESC  LIMIT  $gverdi,30" ;
	 
	 } 
	  if ( $mt  == 6 ) 
	 {
	 
	 $sql = "SELECT * FROM statiebi WHERE marjvenabox=3 ORDER BY id DESC  LIMIT  $gverdi,30" ;
	 
	 } 
	 
	 
    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

	
    while ( $row = $st->fetch() ) {
      $article = new Statia( $row );
      $list[] = $article;
    }
	
	 
	 if ( $mt  == 1 ) 
	 {
	 
	 $sql1 = "SELECT  COUNT(*) FROM statiebi WHERE slaidi=1" ;
	 
	 } 
	 if ( $mt  == 2 ) 
	 {
	 
	 $sql1 = "SELECT  COUNT(*) FROM statiebi WHERE dgis=1" ;
	 
	 } 
	 if ( $mt  == 3 ) 
	 {
	 
	 $sql1 = "SELECT  COUNT(*) FROM statiebi WHERE analitika=1 " ;
	 
	 } 
	 if ( $mt  == 4 ) 
	 {
	 
	 $sql1 = "SELECT  COUNT(*) FROM statiebi WHERE marjvenabox=1 " ;
	 
	 } 
	 if ( $mt  == 5 ) 
	 {
	 
	 $sql1 = "SELECT COUNT(*) FROM statiebi WHERE marjvenabox=2 " ;
	 
	 } 
	  if ( $mt  == 6 ) 
	 {
	 
	 $sql1 = "SELECT COUNT(*) FROM statiebi WHERE marjvenabox=3 " ;
	 
	 } 
	 
	 
    $totalRows = $conn->query( $sql1 )->fetch();
    $conn = null;
	
	
    return ( array ("shedegi" => $list, "totalRows" => $totalRows[0] ) );

  }
  

  
 


  public function update($gverdi) {

    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "UPDATE articles SET publicationDate=FROM_UNIXTIME(:publicationDate), title=:title, summary=:summary, content=:content WHERE id = :id";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":publicationDate", $this->publicationDate, PDO::PARAM_INT );
    $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
    $st->bindValue( ":summary", $this->summary, PDO::PARAM_STR );
    $st->bindValue( ":content", $this->content, PDO::PARAM_STR );
    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }


  public function washla($idi) {

    
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $st = $conn->prepare ( "DELETE FROM statiebi WHERE id = :id LIMIT 1" );
    $st->bindValue( ":id", $idi, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }


  
  
   public static function fornika($id) 
  {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
 
    $sql1 = "SET NAMES 'utf8'";
    $st1 = $conn->prepare( $sql1 );
    $st1->execute();
  
  
  $sql = "SELECT * FROM statiebi WHERE ID = $id";

  
    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

 
    while ( $row = $st->fetch() ) {
      $article = new Statia( $row );
      $list[] = $article;
    }
 
   $sql1 = "SELECT COUNT(*) FROM  statiebi WHERE ID = $id "; 

  
    $totalRows = $conn->query( $sql1 )->fetch();
    $conn = null;
 
 
    return ( array ("shedegi" => $list, "totalRows" => $totalRows[0] ) );

  }
  
  
  
  
  
  
  
  
  
  
}

?>
