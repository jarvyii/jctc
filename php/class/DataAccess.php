<?php
class DataAccess {
	private $db_name = "";
	private $user_name = "";
	private $user_password = "";
	private $os = "i5";
	protected $user, $registered, $server, $FileHandler;
	private $pass, $hash, $tkitConn, $config;

  private $conn;  //Database connector

	function __construct( $user=false, $pass=false ) {
		$this->user 	= ( isset( $user ) && $user != '' && $user != false ? $user: false );
		$this->pass 	= ( isset( $pass ) && $pass != '' && $pass != false ? $pass: false );
		$this->error 	= false;
		$this->connect();
	}

	/************************************************
        function connect()
	************************************************/
function connect()
	{
		$this-> conn = new PDO('sqlite:../data/jctc.db');
	}
	/********************************************************
	  function Login($user, $pass)
	********************************************************/
function Login($user, $pass){
	$sql = "SELECT password, level FROM users where username = '$user';";
	$ret = 	$this-> conn ->query($sql);
	$result =$ret->fetchAll();
  if (count($result) > 0) {
  	 foreach ($result as $Record) {
  	 	if($Record['password'] === $pass){
            return $Record['level']; // good user and password
    	  } else {
    	  	 return  -2; // Wrong password.
     	  }
       }
     } else {
         return -1;// Unknown or wrong user Id
     }
}
/**********************************************
      getMachineName($OrderNumber, $LineNumber, $Operator)
  Return the Description of the one machine with specific Id Code
**********************************************/
  function getMachineDesc($idMachine) {
  //  $Data = $this->conn->fetchRow('SELECT MACHDESC FROM CATPACDBF.MACHLIST WHERE MACHINEID=?', $idMachine);
  //  return $Data['MACHDESC'];
	$sql = "SELECT MACHDESC FROM MACHLIST WHERE MACHINEID='$idMachine';";
	$ret = 	$this-> conn ->query($sql);
	$Data =$ret->fetchAll();
	foreach( $Data as $Row ){
	   return $Row['MACHDESC'];
	}
 }
 /******************************************

    return the Description of one specific Item from the table
    CATPACDBF.PMMM -> Inventory Item Master
 ********************************************/
function getItemDesc( $codeItem){
	$sql = "SELECT PMDESC FROM PMMM WHERE PMPN='$codeItem';";
	$ret = 	$this-> conn ->query($sql);
  $Data = $ret->fetchAll();
	foreach( $Data as $Row ){
		 return $Row['PMDESC'];
	}
}
 /****************************************
        checkOrder($Order)
   Check if the order exist in the table  CATPACDBF.EHM
 ****************************************/
function checkOrder($Order, $Line){
	    // return  getOrderHeader($Order, "");
			 $sql = "SELECT EHCTNO, EHORDT FROM EHM WHERE EHORD='$Order' and EHLLN='$Line';";
			 	$ret = 	$this-> conn ->query($sql);
			 $Data = $ret->fetchAll();
			 return $Data;
}
/****************************************
    checkOverrideCode($Code)
    Return the Supervisor Name or ""
******************************************/
function checkOverrideCode($Code){
  // Table Name SUPER   :: Fields  CODE  char(10),  SUPERVISOR CHAR(25)
	$Code = trim($Code);
	$sql ="SELECT CODE, SUPERVISOR FROM SUPER  WHERE  CODE='$Code';";
	$ret = 	$this-> conn ->query($sql);
  $Data = $ret->fetchAll();
	foreach( $Data as $Row) {
      return  $Row;
   }
}
  /**********************************************
      function getOrderHeader()
      Return the  row value for an specific Order from the Table FLEXWEB.EHM
  **********************************************/
function getOrderHeader($OrderNumber, $Line) {
   // $Data = $this ->conn->query('SELECT 'EHCT#', EHORDT FROM FLEXWEB.EHM');
    //var_dump($Data);
  //  $Data = $this->conn->fetchRow('SELECT EHCT#, EHORDT FROM FLEXWEB.EHM WHERE EHORD=?', $OrderNumber);
		$sql = "SELECT   EHCTNO, EHORDT FROM EHM where EHORD= '$OrderNumber' and EHLLN='$Line';";

		$ret = 	$this-> conn ->query($sql);
		$Data =$ret->fetchAll();
	//		$Data =$ret->fetchRow();
		//$test =$ret->fetchArray();
		//var_dump($Data);
		$Row = array();
		foreach( $Data as $d ){
			// var_dump($d);echo "<br>";
			 //echo "<br>";
		//	 print ($d);
			 foreach($d as $index=>$content){
				   if ($index == 'EHCTNO'){
						 $Row['EHCT#'] = $content;
					   }else {
						 $Row['EHORDT'] = $content;
					  }
				  }

		}
	  return $Row;
 }

 /**********************************************
      function getOrderItem()
      Return the row value for an specific Order from the Table FLEXWEB.EIM
  **********************************************/
 function getOrderItem($OrderNumber, $Line) {
    //   $Data = $this->conn->fetchRow('SELECT EIOCQ,EICCQ,EIPN,EILID,EIPNT FROM FLEXWEB.EIM WHERE EIORD=?', $OrderNumber);
    $sql = "SELECT EIOCQ,EICCQ,EIPN,EILID,EIPNT FROM EIM WHERE EIORD='$OrderNumber' and EILIN='$Line';";
		$ret = 	$this-> conn ->query($sql);
		$Data =$ret->fetchAll();
		$Row = array();
		foreach( $Data as $d ){
			// var_dump($d);echo "<br>";
			 //echo "<br>";
		//	 print ($d);
			 foreach($d as $index=>$content){
				  switch ($index) {
						case 'EIOCQ': $Row['EIOCQ'] = $content;
						              break;
						case 'EICCQ': $Row['EICCQ'] = $content;
												  break;
						case 'EIPN': $Row['EIPN'] = $content;
												 break;
						case 'EILID': $Row['EILID'] = $content;
						 						  break;
						case 'EIPNT': $Row['EIPNT'] = $content;
													 break;
					}
			  }

		}
	  return $Row;
 }

 /**********************************************
      function getTrackLocHistory()
      Return all rows value from the historic of one specific Order from the Table FLEXWEB.FMLOCHIST
  **********************************************/
 function getTrackLocHistory($OrderNumber, $Line){
	 $sql="SELECT LHLIN, LHOPER, LHQTY, LHSTRDTTIM, LHSTPDTTIM, LHSOVR,LHCOMM, MACHDESC FROM FMLOCHIST INNER JOIN MACHLIST ON  FMLOCHIST.LHMACH = MACHLIST.MACHINEID WHERE LHORD='$OrderNumber' and LHLIN='$Line' ORDER BY LHSTRDTTIM, LHMACH, LHOPER;";
   $Data = $this ->conn->query($sql);
   $Rows = $Data->fetchAll();
	 //var_dump($Rows);
  return $Rows;
 }
 /**********************************************
      function insertHistoric()
      Inserts rows in the Table FMLOCHIST
 ***********************************************/
 function insertHistoric($Param){
        $OrderNumber = $Param['order']; $LineNumber = $Param['line']; $Machine = $Param['machine'];
				$Operator = trim($Param['operator']); $Qtty = $Param['qty']; $startTime = $Param['starttime'];
				$stopTime = $Param['endtime']; $Override = $Param['override']; $Comment = $Param['comment'];
        $sql = "INSERT INTO FMLOCHIST (LHORD, LHLIN, LHMACH, LHOPER, LHQTY, LHSTRDTTIM, LHSTPDTTIM, LHSOVR, LHCOMM) VALUES ('$OrderNumber', '$LineNumber','$Machine', '	$Operator', '$Qtty', '$startTime', '$stopTime', '$Override', '$Comment')";
        $Data = $this->conn->prepare($sql);

        $Data->execute();

 }
/***********************************************
          function qtyCompleted($OrderNumber)
    Rteurn how many quantity has beeen completed for one specific order.
 ************************************************/
 function qtyCompleted($Order, $Line){
    $Data = $this ->conn->query("SELECT SUM(LHQTY) FROM FMLOCHIST WHERE LHORD='$Order' and LHLIN='$Line'");
    $Rows = $Data->fetch();
     foreach( $Rows as $index=>$content) {
      return $content;
     }
 }
}
?>
