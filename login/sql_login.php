<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_connect = "localhost";
$username_connect = "root";
$password_connect = "1150";
$database_connect = "ajsas";
$conn = new mysqli($hostname_connect, $username_connect, $password_connect, $database_connect);
if ($conn->connect_errno) {
	echo $conn->connect_error;
	exit;
} else
{
  //echo "Database Connected.";
}

$conn->set_charset("utf8");	
//mysqli_query($conn, "SET NAMES UTF8");
date_default_timezone_set('Asia/Bangkok');
if (!isset($_SESSION)) {
	session_start();
}

// Check connection
if (!function_exists("GetSQLValueString")) {
	function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
	{
		if (PHP_VERSION < 6) {
			$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
		}
		$conn = $GLOBALS['conn'];
	//conn db
		$theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($conn, $theValue) : mysqli_escape_string($conn, $theValue);

		switch ($theType) {
			case "text":
			$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
			break;    
			case "long":
			case "int":
			$theValue = ($theValue != "") ? intval($theValue) : "NULL";
			break;
			case "double":
			$theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
			break;
			case "date":
			$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
			break;
			case "defined":
			$theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
			break;
		}
		return $theValue;
	}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
	$editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

// function get_clientip() {
//         $ipaddress = '';
//         if (isset($_SERVER['HTTP_CLIENT_IP']))
//             $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
//         else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
//             $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
//         else if(isset($_SERVER['HTTP_X_FORWARDED']))
//             $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
//         else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
//             $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
//         else if(isset($_SERVER['HTTP_FORWARDED']))
//             $ipaddress = $_SERVER['HTTP_FORWARDED'];
//         else if(isset($_SERVER['REMOTE_ADDR']))
//             $ipaddress = $_SERVER['REMOTE_ADDR'];
//         else
//             $ipaddress = 'UNKNOWN';
//         return $ipaddress;
//     }

// function log_filse($id_member,$action) {
// 	$conn = $GLOBALS['conn'];

// 	$sql = "SELECT `id` FROM `log_files` ORDER BY `id` DESC";
// 	$query = $conn->query($sql);
// 	$row = $query->fetch_assoc();
// 	$newId = $row['id']+1;

// 	$sql = sprintf("INSERT INTO `log_files`(`id`, `id_member`, `login_ip`, `action`) VALUES (%s,%s,%s,%s)",
// 		GetSQLValueString($newId, 'text'),
// 		GetSQLValueString($id_member, 'text'),
// 		GetSQLValueString(get_clientip(), 'text'),
// 		GetSQLValueString($action, 'text'));
// 	$query = $conn->query($sql);
//         // return $sql;
// }

$cl1 = "-1";
if (isset($_POST["user"])) {
	$cl1 = $_POST["user"];
}
$cl2 = "-1";
if (isset($_POST["pass"])) {
	$cl2 = md5($_POST["pass"]);
}
$sql = sprintf("SELECT * FROM `user` WHERE  `email` = %s and `password` = %s",
	GetSQLValueString($cl1, "text"),
	GetSQLValueString($cl2, "text"));
$query = $conn->query($sql);
$row = $query->fetch_assoc();
$totalRows = $query->num_rows;
if($totalRows>0){
	if($cl2===$row['password']){
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['type_user_id'] = $row['type_user_id'];
		$_SESSION['sta_login'] = 'Active';
		echo $_SESSION['type_user_id'];
		// log_filse($_SESSION['id_member'],"เข้าสู่ระบบ");
		// header('Location: ../pages/home.php');
	}else{
		$_SESSION['sta_login']='false';
		echo '0';
		// header('Location: login.php?sta=n');
	}
}else{
	$_SESSION['sta_login']='false';
	echo '0';
	// header('Location: ../login.php?sta=n');
}
?>
