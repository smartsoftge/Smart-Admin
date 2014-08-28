<?php
class Namushevari
{

  public $ID = null;

  public $satauri = null; 
  
  public $kategoria = null;
  
  public $teqsti = null;

  public $faili = null;

  public $gamoqveyneba = null;

  public $tarigi = null;
  
  public $naxva = null; 

  public $avtori = null;
  
  public $publish = null; 
   
  
  
  public function __construct( $data=array() ) 
  {
  
     if ( isset( $data['ID'] ) )       $this->ID = (int)  $data['ID'];
     if ( isset( $data['satauri'] ) )  $this->satauri =   $data['satauri'];
	 if ( isset( $data['kategoria'] )) $this->kategoria = $data['kategoria'];
     if ( isset( $data['teqsti'] ) )   $this->teqsti =    $data['teqsti'];
     if ( isset( $data['faili'] ) )   $this->faili =    $data['faili'];
     if ( isset( $data['gamoqveyneba'] ) )   $this->gamoqveyneba =    $data['gamoqveyneba'];
     if ( isset( $data['tarigi'] ) )   $this->tarigi =    $data['tarigi'];
	 if ( isset( $data['naxva'] ))     $this->naxva =        $data['naxva'];
	 if ( isset( $data['avtori'] ) )   $this->avtori =    $data['avtori'];
 	 if ( isset( $data['publish'] ))   $this->publish =      $data['publish'];
	
  }

  
  public function ganaxleba() {
  
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	$sql1 = "SET NAMES 'utf8'";
    $st1 = $conn->prepare( $sql1 );
    $st1->execute();
	
 $sql = "UPDATE namushevrebi SET  satauri=:satauri,kategoria=:kategoria,teqsti=:teqsti,faili=:faili,gamoqveyneba=:gamoqveyneba,avtori=:avtori,publish=:publish  WHERE id = :id";
   //echo $this->teqsti;
  // die();
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":satauri", $this->satauri, PDO::PARAM_STR );
	$st->bindValue( ":kategoria", $this->kategoria, PDO::PARAM_STR);
 	$st->bindValue( ":teqsti", $this->teqsti, PDO::PARAM_STR );
 	$st->bindValue( ":faili", $this->faili, PDO::PARAM_STR );
 	$st->bindValue( ":gamoqveyneba", $this->gamoqveyneba, PDO::PARAM_STR );
    $st->bindValue( ":avtori", $this->avtori, PDO::PARAM_STR );
    $st->bindValue( ":publish", $this->publish, PDO::PARAM_INT );
   	$st->bindValue( ":id", $this->ID, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
	
	
  }

  public static function GetCategor( $kateg ,$sort) 
  {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	 
 
	 $sql = "SELECT * FROM namushevrebi  WHERE kategoria='$kateg' and  publish=1  ORDER BY id $sort " ;
     if($sort == "anb")
     {
         $sql = "SELECT * FROM namushevrebi  WHERE kategoria='$kateg' and  publish=1  ORDER BY  satauri" ;
     }
	 
	 if( $kateg == "all" )
	 {  
	   if($sort == "anb")
     {
	  $sql = "SELECT * FROM namushevrebi  WHERE publish=1  ORDER BY satauri " ;
      }else 
      {
         $sql = "SELECT * FROM namushevrebi  WHERE publish=1  ORDER BY id $sort " ;
      }
	 }
    
	 
    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

	
    while ( $row = $st->fetch() ) {
      $article = new Namushevari( $row );
      $list[] = $article;
    }
	
	  $sql1 = "SELECT COUNT(*) FROM namushevrebi WHERE kategoria='$kateg'  and  publish=1 "; 
        if( $kateg == "all")
	 {
	  $sql1 = "SELECT COUNT(*) FROM namushevrebi WHERE   publish=1 "; 
	 }
	 
	 
    $totalRows = $conn->query( $sql1 )->fetch();
    $conn = null;
	
	
    return ( array ("shedegi" => $list, "totalRows" => $totalRows[0] ) );

  }

  public static function cheminamushevrebi($saxeli) 
  {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	 
 
	 $sql = "SELECT * FROM namushevrebi  WHERE avtori='$saxeli' ORDER BY id" ;
 
    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

	
    while ( $row = $st->fetch() ) {
      $article = new Namushevari( $row );
      $list[] = $article;
    }
	
	  $sql1 = "SELECT COUNT(*) FROM namushevrebi WHERE avtori='$saxeli'"; 
   
	 
    $totalRows = $conn->query( $sql1 )->fetch();
    $conn = null;
	
	
    return ( array ("shedegi" => $list, "totalRows" => $totalRows[0] ) );

  }
  
  
  public static function search($search) 
  {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	 
 
	 $sql = "SELECT * FROM namushevrebi  WHERE satauri OR avtori LIKE  '%$search%'  ORDER BY id " ;
	 
	 
    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

	
    while ( $row = $st->fetch() ) {
      $article = new Namushevari( $row );
      $list[] = $article;
    }
	
	  $sql1 = "SELECT  COUNT(*) FROM namushevrebi  WHERE satauri OR avtori LIKE  '%$search%' "; 

	 
    $totalRows = $conn->query( $sql1 )->fetch();
    $conn = null;
	
	
    return ( array ("shedegi" => $list, "totalRows" => $totalRows[0] ) );

  }
  
    
  public static function searchbyauthor( $search, $sort ) 
  {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	 
    
	 $sql = "SELECT * FROM namushevrebi  WHERE avtori LIKE  '%$search%'  ORDER BY id $sort" ;
	 
	 if($sort == "anb")
     {
        
       $sql = "SELECT * FROM namushevrebi  WHERE avtori LIKE  '%$search%'  ORDER BY satauri" ;  
     }
    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

	
    while ( $row = $st->fetch() ) {
      $article = new Namushevari( $row );
      $list[] = $article;
    }
	
	  $sql1 = "SELECT  COUNT(*) FROM namushevrebi  WHERE avtori LIKE  '%$search%' "; 

	 
    $totalRows = $conn->query( $sql1 )->fetch();
    $conn = null;
	
	
    return ( array ("shedegi" => $list, "totalRows" => $totalRows[0] ) );

  }
  

  
  
  
   public function chasma() {

   $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	
	
	$sql = "INSERT INTO namushevrebi ( satauri, kategoria, teqsti,faili,gamoqveyneba,tarigi,avtori,publish ) VALUES (:satauri,:kategoria,:teqsti, :faili, :gamoqveyneba , NOW() ,:avtori , :publish )";
	
    $st = $conn->prepare ( $sql );
	
    $st->bindValue( ":satauri", $this->satauri, PDO::PARAM_STR );
    $st->bindValue( ":kategoria", $this->kategoria, PDO::PARAM_STR );
    $st->bindValue( ":teqsti", $this->teqsti, PDO::PARAM_STR );
    $st->bindValue( ":faili", $this->faili, PDO::PARAM_STR );
    $st->bindValue( ":gamoqveyneba", $this->gamoqveyneba, PDO::PARAM_STR );
    $st->bindValue( ":avtori", $this->avtori, PDO::PARAM_STR );
    $st->bindValue( ":publish", $this->publish, PDO::PARAM_INT );
    $st->execute();
	
	
    $conn = null;
	
  }
  
 public function postidanamogeba($postebi) 
 {
    $this->__construct( $postebi );
 }
  
   public static function TitoNamushevari( $id ) {
 
   $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
   
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
    
  
   
    $sql = "SELECT * FROM namushevrebi WHERE ID = $id";
    $st = $conn->prepare( $sql );
    $st->execute();
    $row = $st->fetch();
     $statis = new Namushevari( $row );
	$sql = "UPDATE namushevrebi SET  naxva=:naxva   WHERE id =  $id";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":naxva", ++$statis->naxva, PDO::PARAM_STR );
    $st->execute();
    $conn = null;
	
    if ( $row ) return new Namushevari( $row );
   
  }
  
   
  
 


  
  public static function GetNamushevariAdmin( $gverdi, $kateg ) 
  {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	 
	 if ( $kateg == "arferi" ) 
	 {
	 $sql = "SELECT * FROM  namushevrebi  ORDER BY id DESC LIMIT  $gverdi,30" ;
	 } else
	 {
	 $sql = "SELECT * FROM namushevrebi  WHERE kategoria='$kateg'  ORDER BY id DESC  LIMIT  $gverdi,30" ;
	 }
	 
    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

	
    while ( $row = $st->fetch() ) {
      $article = new Namushevari( $row );
      $list[] = $article;
    }
	 if ( $kateg == "arferi" ) 
	 {
	 $sql1 = "SELECT COUNT(*) FROM namushevrebi  ";
     } else 
	 {
	  $sql1 = "SELECT COUNT(*) FROM namushevrebi WHERE kategoria='$kateg'   "; 
	 }
	 
    $totalRows = $conn->query( $sql1 )->fetch();
    $conn = null;
	
	
    return ( array ("shedegi" => $list, "totalRows" => $totalRows[0] ) );

  }
  
 

 
  

  public function washla($idi) {

    
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $st = $conn->prepare ( "DELETE FROM namushevrebi WHERE id = :id LIMIT 1" );
    $st->bindValue( ":id", $idi, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }



 
  
  
  
   public static function namushevrismigeba($id) 
  {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
 
    $sql1 = "SET NAMES 'utf8'";
    $st1 = $conn->prepare( $sql1 );
    $st1->execute();
  
  
  $sql = "SELECT * FROM namushevrebi WHERE ID = $id";

  
    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

 
    while ( $row = $st->fetch() ) {
      $article = new Namushevari( $row );
      $list[] = $article;
    }
 
   $sql1 = "SELECT COUNT(*) FROM  namushevrebi WHERE ID = $id "; 

  
    $totalRows = $conn->query( $sql1 )->fetch();
    $conn = null;
 
 
    return ( array ("shedegi" => $list, "totalRows" => $totalRows[0] ) );

  }
 
}

?>