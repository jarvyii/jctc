<?php
// Login Query
require_once 'class/DataAccess.php';
require_once 'class/Class.Login.php';
require_once 'inquiry.php';

error_reporting(E_ALL|E_STRICT);

ini_set('display_errors', 'on');
/*
		User Level :  0 -> Administrator, 1-> Supervisor, 2-> Operator
*/
$user = $_POST['username'];
$pass = $_POST['psw'];
$db = new DataAccess();
$log =  $db->Login($user, $pass);
switch ($log) {
	case  2: Tracking($user); // Operator Level
	  	     break;
	case  1: TrackingInquiry($user); // Supervisor Level
		     break;
	case  0:  break; // System administrator Level
	case -1: echo "Wrong User ID";
		      break;
	case -2: echo "Wrong Password";
}
exit();
?>
