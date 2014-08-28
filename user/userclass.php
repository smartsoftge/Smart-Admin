<?php class Momxmarebeli
{

  public $ID = null;

  public $login = null;

  public $password = null;

  public $mail = null;

  public $saxeli = null;
  
  public $status = null; 
  
  public $jgufi	= null; 
  
  public $mowmobisnomeri	= null; 
   
  public $xarisxi	= null; 
     
  public $moqalaqeoba	= null; 
  
  public $dabadeba	= null; 
  
  
  public function __construct( $data=array() ) 
  {
  
    if ( isset( $data['ID'] ) )       $this->ID = (int)  $data['ID'];
    if ( isset( $data['login'] ) )       $this->login =   $data['login'];
    if ( isset( $data['password']  ) )  $this->password =    $data['password'] ;
    if ( isset( $data['mail'] ) )   $this->mail =   $data['mail'];
    if ( isset( $data['saxeli'] ) )   $this->saxeli =    $data['saxeli'];
 	if ( isset( $data['status'] )) $this->status = $data['status'];
	if ( isset( $data['jgufi'] ))      $this->jgufi =      $data['jgufi'];
    if ( isset( $data['mowmobisnomeri'] ) )   $this->mowmobisnomeri =    $data['mowmobisnomeri'];
    if ( isset( $data['xarisxi'] ) )   $this->xarisxi =    $data['xarisxi'];
    if ( isset( $data['moqalaqeoba'] ) )   $this->moqalaqeoba =    $data['moqalaqeoba'];
    if ( isset( $data['dabadeba'] ) )   $this->dabadeba =    $data['dabadeba'];
  }

  
  public  static function shesvla($login,$password) {

  session_start();
    $dbh = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	$sql1 = "SET NAMES 'utf8'";
    $st1 = $dbh->prepare( $sql1 );
    $st1->execute();
   

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("SELECT id FROM momxmareblebi WHERE login = :login AND password = :password AND status=1");

        $stmt->bindParam(':login', $login, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR, 40);
        $stmt->execute();
		
		  $id = $stmt->fetchColumn(0);

          if($id == false)
        {
                header("Location:login.php?momavlidan=ups");
        }
		else
        {
		
    $sql = "SELECT * FROM momxmareblebi WHERE ID = $id";
    $st = $dbh->prepare( $sql );
    $st->execute();
    $row = $st->fetch();
    $dbh = null;
    $user = new Momxmarebeli( $row );
	   if($user->jgufi!=4)
	     {
                $_SESSION['login'] = $user->login;
				$_SESSION['jgufi'] = $user->jgufi;
				$_SESSION['status'] = $user->status;
				$_SESSION['saxeli'] = $user->saxeli;
               header("Location:index.php?ok=ok");
         }
		 else
		 {
		     header("Location:login.php?momavlidan=ups");
		 }
		}

    $conn = null;
	
  }

  
  
  public  static function shesvlasaiti($login,$password) {

  session_start();
    $dbh = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	$sql1 = "SET NAMES 'utf8'";
    $st1 = $dbh->prepare( $sql1 );
    $st1->execute();
   

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("SELECT id FROM momxmareblebi WHERE login = :login AND password = :password AND status=1");

        $stmt->bindParam(':login', $login, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR, 40);
        $stmt->execute();
		
		  $id = $stmt->fetchColumn(0);

          if($id == false)
        {
                header("Location:login.php?momavlidan=upsss");
        }
		else
        {
		
    $sql = "SELECT * FROM momxmareblebi WHERE ID = $id";
    $st = $dbh->prepare( $sql );
    $st->execute();
    $row = $st->fetch();
    $dbh = null;
    $user = new Momxmarebeli( $row );
	   if($user->jgufi!=4)
	     {
                $_SESSION['login'] = $user->login;
				$_SESSION['jgufi'] = $user->jgufi;
				$_SESSION['ID'] = $user->ID;
				$_SESSION['status'] = $user->status;
				$_SESSION['saxeli'] = $user->saxeli;
               header("Location:index.php?მომხარებელი-შევიდა");
         }
		 else
		 {
		     header("Location:login.php?momavlidan=ups");
		 }
		}

    $conn = null;
	
  }

  
   public function chasma() {

   $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	

	$sql = "INSERT INTO momxmareblebi ( login,password,mail,saxeli,status,jgufi,mowmobisnomeri,xarisxi,moqalaqeoba,dabadeba) VALUES (:login,:password,:mail,:saxeli,:status,:jgufi,:mowmobisnomeri,:xarisxi,:moqalaqeoba,:dabadeba)";
	
    $st = $conn->prepare( $sql );
	
    $st->bindValue( ":login", $this->login, PDO::PARAM_STR );
	$st->bindValue( ":password", $this->password, PDO::PARAM_STR);
    $st->bindValue( ":mail",   $this->mail, PDO::PARAM_STR );
    $st->bindValue( ":saxeli", $this->saxeli, PDO::PARAM_STR );
 	$st->bindValue( ":status", $this->status, PDO::PARAM_INT );
    $st->bindValue( ":jgufi", $this->jgufi, PDO::PARAM_INT);
    $st->bindValue( ":mowmobisnomeri", $this->mowmobisnomeri, PDO::PARAM_STR );
    $st->bindValue( ":xarisxi", $this->xarisxi, PDO::PARAM_STR );
    $st->bindValue( ":moqalaqeoba", $this->moqalaqeoba, PDO::PARAM_STR );
    $st->bindValue( ":dabadeba", $this->dabadeba, PDO::PARAM_STR );
    $st->execute();
	
    $conn = null;
	
  }
  
 public function postidanamogeba($postebi) 
 {
    $this->__construct( $postebi );
 }
  
  
   public function ganaxleba() {
  
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	$sql1 = "SET NAMES 'utf8'";
    $st1 = $conn->prepare( $sql1 );
    $st1->execute();
   
	
 $sql = "UPDATE momxmareblebi SET  login=:login,password=:password,mail=:mail,saxeli=:saxeli,status=:status,jgufi=:jgufi,mowmobisnomeri=:mowmobisnomeri,xarisxi=:xarisxi,moqalaqeoba=:moqalaqeoba,dabadeba=:dabadeba  WHERE id = :id";
 
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":login", $this->login, PDO::PARAM_STR );
	$st->bindValue( ":password", $this->password, PDO::PARAM_STR);
    $st->bindValue( ":mail",   $this->mail, PDO::PARAM_STR );
    $st->bindValue( ":saxeli", $this->saxeli, PDO::PARAM_STR );
 	$st->bindValue( ":status", $this->status, PDO::PARAM_INT );
    $st->bindValue( ":jgufi", $this->jgufi, PDO::PARAM_INT);
	$st->bindValue( ":mowmobisnomeri", $this->mowmobisnomeri, PDO::PARAM_STR );
	$st->bindValue( ":xarisxi", $this->xarisxi, PDO::PARAM_STR );
	$st->bindValue( ":moqalaqeoba", $this->moqalaqeoba, PDO::PARAM_STR );
	$st->bindValue( ":dabadeba", $this->dabadeba, PDO::PARAM_STR );
	$st->bindValue( ":id", $this->ID, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
	
  }
  
  public static function TitoMomxmarebeli( $id ) {
 
   $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
   
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
 
   
    $sql = "SELECT * FROM momxmareblebi WHERE ID = $id";
    $st = $conn->prepare( $sql );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    if ( $row ) return new Momxmarebeli( $row );

  }
  
  
 
  
  public static function GetMomxmareblebi( $gverdi ) 
  {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	   $sql1 = "SET NAMES 'utf8'";
	   $st1 = $conn->prepare( $sql1 );
	   $st1->execute();
	 

	 $sql = "SELECT * FROM  momxmareblebi ORDER BY id DESC LIMIT  $gverdi,30" ; 

	 $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

	
    while ( $row = $st->fetch() ) {
      $article = new Momxmarebeli( $row );
      $list[] = $article;
   }
	  $sql1 = "SELECT COUNT(*) FROM momxmareblebi "; 
	
	 
    $totalRows = $conn->query( $sql1 )->fetch();
    $conn = null;
	
	
    return ( array ("shedegi" => $list, "totalRows" => $totalRows[0] ) );

  }

  



  public function washla($idi) {

    
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $st = $conn->prepare ( "DELETE FROM momxmareblebi WHERE id = :id LIMIT 1" );
    $st->bindValue( ":id", $idi, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }

}

?>