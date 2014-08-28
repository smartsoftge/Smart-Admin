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
    
  public $publish = null; 

  public $metasityva = null; 
   
  public $address = null;
  
  public $web = null;
  
  public $mail = null;
    
  public $phone = null;
  
  public $carte = null;
 
  public $clock = null; 
 
  public $facebook = null;
  
  public $twitter = null;
  
  public $youtube = null;
  
  public $vakansia = null;
  
  
  public $archeva = null;
    
   
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
 	if ( isset( $data['publish'] ))   $this->publish =      $data['publish'];
	if ( isset( $data['metasityva'] ))    $this->metasityva =       $data['metasityva'];
 	if ( isset( $data['naxva'] ))     $this->naxva =        $data['naxva'];
    if ( isset( $data['address'] ) )  $this->address =   $data['address'];
    if ( isset( $data['web'] ) )  $this->web =   $data['web'];
    if ( isset( $data['mail'] ) )  $this->mail =   $data['mail'];
    if ( isset( $data['phone'] ) )  $this->phone =   $data['phone'];
    if ( isset( $data['carte'] ) )  $this->carte =   $data['carte'];
    if ( isset( $data['clock'] ) )  $this->clock =   $data['clock'];
    if ( isset( $data['facebook'] ) )  $this->facebook =   $data['facebook'];
    if ( isset( $data['twitter'] ) )  $this->twitter =   $data['twitter'];
    if ( isset( $data['youtube'] ) )  $this->youtube =   $data['youtube'];
    if ( isset( $data['vakansia'] ) )  $this->vakansia =   $data['vakansia'];
    if ( isset( $data['archeva'] ) )  $this->archeva =   $data['archeva'];

	
  }

  
  public function ganaxleba() {
  
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	$sql1 = "SET NAMES 'utf8'";
    $st1 = $conn->prepare( $sql1 );
    $st1->execute();
	
 $sql = "UPDATE kompaniebi SET  satauri=:satauri, surati=:surati,reziume=:reziume,statia=:statia,avtori=:avtori,kategoria=:kategoria,publish=:publish,metasityva=:metasityva,address=:address,web=:web,mail=:mail,phone=:phone,carte=:carte,clock=:clock,facebook=:facebook,twitter=:twitter,youtube=:youtube,vakansia=:vakansia,archeva=:archeva  WHERE id = :id";
 
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":satauri", $this->satauri, PDO::PARAM_STR );
	$st->bindValue( ":surati", $this->surati, PDO::PARAM_STR);
    $st->bindValue( ":reziume", $this->reziume, PDO::PARAM_STR );
	$st->bindValue( ":statia", $this->statia, PDO::PARAM_STR );
    $st->bindValue( ":avtori", $this->avtori, PDO::PARAM_STR );
	$st->bindValue( ":kategoria", $this->kategoria, PDO::PARAM_INT );
    $st->bindValue( ":publish", $this->publish, PDO::PARAM_INT );
	$st->bindValue( ":metasityva", $this->metasityva, PDO::PARAM_INT );
    $st->bindValue( ":address", $this->address, PDO::PARAM_STR );
    $st->bindValue( ":web", $this->web, PDO::PARAM_STR );
    $st->bindValue( ":mail", $this->mail, PDO::PARAM_STR );
    $st->bindValue( ":phone", $this->phone, PDO::PARAM_STR );
    $st->bindValue( ":carte", $this->carte, PDO::PARAM_STR );
    $st->bindValue( ":clock", $this->clock, PDO::PARAM_STR );
    $st->bindValue( ":facebook", $this->facebook, PDO::PARAM_STR );
    $st->bindValue( ":twitter", $this->twitter, PDO::PARAM_STR );
    $st->bindValue( ":youtube", $this->youtube, PDO::PARAM_STR );
    $st->bindValue( ":vakansia", $this->vakansia, PDO::PARAM_STR );
    $st->bindValue( ":archeva", $this->archeva, PDO::PARAM_STR );
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
	 
	 
	 $sql = "SELECT * FROM kompaniebi  WHERE kategoria='$kateg' and  publish=1  ORDER BY id DESC  LIMIT  $gverdi,15" ;
	 
	 
    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

	
    while ( $row = $st->fetch() ) {
      $article = new Statia( $row );
      $list[] = $article;
    }
	
	  $sql1 = "SELECT COUNT(*) FROM kompaniebi WHERE kategoria='$kateg'  and  publish=1 "; 

	 
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
	 
 
	 $sql = "SELECT * FROM kompaniebi  WHERE statia LIKE  '%$search%'  ORDER BY id DESC  LIMIT  $gverdi,15" ;
	 
	 
    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

	
    while ( $row = $st->fetch() ) {
      $article = new Statia( $row );
      $list[] = $article;
    }
	
	  $sql1 = "SELECT  COUNT(*) FROM kompaniebi  WHERE statia LIKE  '%$search%' "; 

	 
    $totalRows = $conn->query( $sql1 )->fetch();
    $conn = null;
	
	
    return ( array ("shedegi" => $list, "totalRows" => $totalRows[0] ) );

  }
  
     
  public static function getcompany() 
  {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	 
 
	 $sql = "SELECT * FROM kompaniebi" ;
	 
	 
    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

	
    while ( $row = $st->fetch() ) {
      $article = new Statia( $row );
      $list[] = $article;
    }
	
	  $sql1 = "SELECT  COUNT(*) FROM kompaniebi"; 

	 
    $totalRows = $conn->query( $sql1 )->fetch();
    $conn = null;
	
	
    return ( array ("shedegi" => $list, "totalRows" => $totalRows[0] ) );

  }
  
     
 
  
     
   
   
  
  
   public function chasma() {

   $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	
	
	$sql = "INSERT INTO kompaniebi ( satauri, surati, reziume, statia,tarigi,avtori,kategoria ,publish ,metasityva,address,web,mail,phone,carte,clock,facebook,twitter,youtube,vakansia ,archeva  ) VALUES (:satauri,:surati,:reziume, :statia , NOW() ,:avtori ,:kategoria , :publish , :metasityva ,:address,:web,:mail,:phone,:carte,:clock,:facebook,:twitter,:youtube,:vakansia,:archeva  )";
	
    $st = $conn->prepare ( $sql );
	
    $st->bindValue( ":satauri", $this->satauri, PDO::PARAM_STR );
	$st->bindValue( ":surati", $this->surati, PDO::PARAM_STR);
    $st->bindValue( ":reziume", $this->reziume, PDO::PARAM_STR );
	$st->bindValue( ":statia", $this->statia, PDO::PARAM_STR );
    $st->bindValue( ":avtori", $this->avtori, PDO::PARAM_STR );
	$st->bindValue( ":kategoria", $this->kategoria, PDO::PARAM_INT );
    $st->bindValue( ":publish", $this->publish, PDO::PARAM_INT );
	$st->bindValue( ":metasityva", $this->metasityva, PDO::PARAM_INT );
    $st->bindValue( ":address", $this->address, PDO::PARAM_STR );
    $st->bindValue( ":web", $this->web, PDO::PARAM_STR );
    $st->bindValue( ":mail", $this->mail, PDO::PARAM_STR );
    $st->bindValue( ":phone", $this->phone, PDO::PARAM_STR );
    $st->bindValue( ":carte", $this->carte, PDO::PARAM_STR );
    $st->bindValue( ":clock", $this->clock, PDO::PARAM_STR );
    $st->bindValue( ":facebook", $this->facebook, PDO::PARAM_STR );
    $st->bindValue( ":twitter", $this->twitter, PDO::PARAM_STR );
    $st->bindValue( ":youtube", $this->youtube, PDO::PARAM_STR );
    $st->bindValue( ":vakansia", $this->vakansia, PDO::PARAM_STR );
    $st->bindValue( ":archeva", $this->archeva, PDO::PARAM_STR );

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
    
  
   
    $sql = "SELECT * FROM kompaniebi WHERE ID = $id";
    $st = $conn->prepare( $sql );
    $st->execute();
    $row = $st->fetch();
     $statis = new Statia( $row );
	$sql = "UPDATE kompaniebi SET  naxva=:naxva   WHERE id =  $id";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":naxva", ++$statis->naxva, PDO::PARAM_STR );
    $st->execute();
    $conn = null;
	
    if ( $row ) return new Statia( $row );
   
  }
  
  
  public static function GetPopularul($popularuli) 
  {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	 
	 if($popularuli == 1 ) 
	 {
	 $sql = "SELECT * FROM kompaniebi  WHERE archeva=1 and  publish=1  ORDER BY id DESC  LIMIT  500" ;
	 }
	 if($popularuli == 2 ) 
	 {
	 $sql = "SELECT * FROM kompaniebi  WHERE archeva=2 and  publish=1  ORDER BY id DESC  LIMIT  500" ;
	 }
	 
	 if($popularuli == 3 ) 
	 {
	 $sql = "SELECT * FROM kompaniebi  WHERE archeva=3 and  publish=1  ORDER BY id DESC  LIMIT  500" ;
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
	 
	 $sql = "SELECT * FROM kompaniebi  WHERE category='$kateg' LIMIT  $gverdi,15" ;
	 
	 }
	 else 
	 {
	 
	 $sql = "SELECT * FROM kompaniebi  WHERE category='$kateg' AND brand='$brand' LIMIT  $gverdi,15" ;
	 
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
	 $sql = "SELECT * FROM  kompaniebi  ORDER BY id DESC LIMIT  $gverdi,30" ;
	 } else
	 {
	 $sql = "SELECT * FROM kompaniebi  WHERE kategoria='$kateg'  ORDER BY id DESC  LIMIT  $gverdi,30" ;
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
	 $sql1 = "SELECT COUNT(*) FROM kompaniebi  ";
     } else 
	 {
	  $sql1 = "SELECT COUNT(*) FROM kompaniebi WHERE kategoria='$kateg'   "; 
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
    $st = $conn->prepare ( "DELETE FROM kompaniebi WHERE id = :id LIMIT 1" );
    $st->bindValue( ":id", $idi, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }

}

?>
