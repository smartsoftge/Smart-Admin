<?php

class Statia
{

  public $ID = null;

  public $satauri = null;

  public $surati = null;
 
  public $reziume = null;
   
  public $tarigi = null;
  
  public $avtori = null;
  
  public $kategoria = null;
    
  public $publish = null; 

  public $metasityva = null; 
 
  public $naxva = null;   
  
  public $piri = null;
  
  public $archevab = null;
  

  
  
  public function __construct( $data=array() ) 
  {
  
    if ( isset( $data['ID'] ) )       $this->ID = (int)  $data['ID'];
    if ( isset( $data['satauri'] ) )  $this->satauri =   $data['satauri'];
    if ( isset( $data['surati']  ) )  $this->surati =    $data['surati'] ;
    if ( isset( $data['reziume'] ) )  $this->reziume =   $data['reziume'];
     if ( isset( $data['tarigi'] ) )   $this->tarigi =    $data['tarigi'];
	if ( isset( $data['avtori'] ) )   $this->avtori =    $data['avtori'];
	if ( isset( $data['kategoria'] )) $this->kategoria = $data['kategoria'];
 	if ( isset( $data['publish'] ))   $this->publish =      $data['publish'];
	if ( isset( $data['metasityva'] ))    $this->metasityva =       $data['metasityva'];
 	if ( isset( $data['naxva'] ))     $this->naxva =        $data['naxva'];
    if ( isset( $data['piri'] ) )  $this->piri =   $data['piri'];
    if ( isset( $data['archevab'] ) )  $this->archevab =   $data['archevab'];
 
	
  }

  
  public function ganaxleba() {
  
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	$sql1 = "SET NAMES 'utf8'";
    $st1 = $conn->prepare( $sql1 );
    $st1->execute();
	
 $sql = "UPDATE brchurebi SET  satauri=:satauri, surati=:surati,reziume=:reziume,avtori=:avtori,kategoria=:kategoria,publish=:publish,metasityva=:metasityva,piri=:piri,archevab=:archevab   WHERE id = :id";
 
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":satauri", $this->satauri, PDO::PARAM_STR );
	$st->bindValue( ":surati", $this->surati, PDO::PARAM_STR);
    $st->bindValue( ":reziume", $this->reziume, PDO::PARAM_STR );
    $st->bindValue( ":avtori", $this->avtori, PDO::PARAM_STR );
	$st->bindValue( ":kategoria", $this->kategoria, PDO::PARAM_INT );
    $st->bindValue( ":publish", $this->publish, PDO::PARAM_INT );
	$st->bindValue( ":metasityva", $this->metasityva, PDO::PARAM_INT );
    $st->bindValue( ":piri", $this->piri, PDO::PARAM_STR );
    $st->bindValue( ":archevab", $this->archevab, PDO::PARAM_STR );
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
	 
	 
	 $sql = "SELECT * FROM brchurebi  WHERE kategoria='$kateg' and  publish=1  ORDER BY id DESC  LIMIT  $gverdi,15" ;
	 
	 
    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

	
    while ( $row = $st->fetch() ) {
      $article = new Statia( $row );
      $list[] = $article;
    }
	
	  $sql1 = "SELECT COUNT(*) FROM brchurebi WHERE kategoria='$kateg'  and  publish=1 "; 

	 
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
	 
 
	 $sql = "SELECT * FROM brchurebi  WHERE statia LIKE  '%$search%'  ORDER BY id DESC  LIMIT  $gverdi,15" ;
	 
	 
    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

	
    while ( $row = $st->fetch() ) {
      $article = new Statia( $row );
      $list[] = $article;
    }
	
	  $sql1 = "SELECT  COUNT(*) FROM brchurebi  WHERE statia LIKE  '%$search%' "; 

	 
    $totalRows = $conn->query( $sql1 )->fetch();
    $conn = null;
	
	
    return ( array ("shedegi" => $list, "totalRows" => $totalRows[0] ) );

  }
  
     
  
 
  
     
   
   
  
  
   public function chasma() {

   $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	
	
	$sql = "INSERT INTO brchurebi ( satauri, surati, reziume, tarigi,avtori,kategoria ,publish ,metasityva,piri,archevab ) VALUES (:satauri,:surati,:reziume,  NOW() ,:avtori ,:kategoria , :publish , :metasityva ,:piri ,:archevab  )";
	
    $st = $conn->prepare ( $sql );
	
    $st->bindValue( ":satauri", $this->satauri, PDO::PARAM_STR );
	$st->bindValue( ":surati", $this->surati, PDO::PARAM_STR);
    $st->bindValue( ":reziume", $this->reziume, PDO::PARAM_STR );
    $st->bindValue( ":avtori", $this->avtori, PDO::PARAM_STR );
	$st->bindValue( ":kategoria", $this->kategoria, PDO::PARAM_STR  );
    $st->bindValue( ":publish", $this->publish, PDO::PARAM_INT );
	$st->bindValue( ":metasityva", $this->metasityva, PDO::PARAM_STR );
    $st->bindValue( ":piri", $this->piri, PDO::PARAM_STR );
    $st->bindValue( ":archevab", $this->archevab, PDO::PARAM_STR );
 

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
    
  
   
    $sql = "SELECT * FROM brchurebi WHERE ID = $id";
    $st = $conn->prepare( $sql );
    $st->execute();
    $row = $st->fetch();
     $statis = new Statia( $row );
	$sql = "UPDATE brchurebi SET  naxva=:naxva   WHERE id =  $id";
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
  
  
  
  
  public static function GetPopularul($popularuli) 
  {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	 
	 if($popularuli == 1 ) 
	 {
	 $sql = "SELECT * FROM brchurebi  WHERE archevab=1 and  publish=1  ORDER BY id DESC  LIMIT  500" ;
	 }
	 if($popularuli == 2 ) 
	 {
	 $sql = "SELECT * FROM brchurebi  WHERE archevab=2 and  publish=1  ORDER BY id DESC  LIMIT  500" ;
	 }
	 
	 if($popularuli == 3 ) 
	 {
	 $sql = "SELECT * FROM brchurebi  WHERE archevab=3 and  publish=1  ORDER BY id DESC  LIMIT  500" ;
	 }
	 
	 
    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

	
    while ( $row = $st->fetch() ) {
      $article = new Statia( $row );
      $list[] = $article;
    }
	
	 
    
	
	
    return ( array ("shedegi" => $list, "totalRows" => 65 ) );

  }
  
  
  
  
  

  public static function GetStatia( $gverdi, $kateg ) 
  {
  
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	

	
	 if ( $brand == "a" ) 
	 {
	 
	 $sql = "SELECT * FROM brchurebi  WHERE category='$kateg' LIMIT  $gverdi,15" ;
	 
	 }
	 else 
	 {
	 
	 $sql = "SELECT * FROM brchurebi  WHERE category='$kateg' AND brand='$brand' LIMIT  $gverdi,15" ;
	 
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
	 $sql = "SELECT * FROM  brchurebi  ORDER BY id DESC LIMIT  $gverdi,30" ;
	 } else
	 {
	 $sql = "SELECT * FROM brchurebi  WHERE kategoria='$kateg'  ORDER BY id DESC  LIMIT  $gverdi,30" ;
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
	 $sql1 = "SELECT COUNT(*) FROM brchurebi  ";
     } else 
	 {
	  $sql1 = "SELECT COUNT(*) FROM brchurebi WHERE kategoria='$kateg'   "; 
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
    $st = $conn->prepare ( "DELETE FROM brchurebi WHERE id = :id LIMIT 1" );
    $st->bindValue( ":id", $idi, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }

}

?>
