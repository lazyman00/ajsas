<?php

# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

$hostname_connect = "localhost";
$username_connect = "root";
$password_connect = "1150"; //1150
$database_connect = "ajsas"; // ajsas
$conn = new mysqli($hostname_connect, $username_connect, $password_connect, $database_connect);
if ($conn->connect_errno) {
	echo $conn->connect_error;
	exit;
} else
{
  //echo "Database Connected.";
}

$conn->set_charset("utf8");	
mysqli_query($conn, "SET NAMES UTF8");
date_default_timezone_set('Asia/Bangkok');
if (!isset($_SESSION)) {
	session_start();
}
// $_SESSION["level"] = 'a';
// $_SESSION["acc"] = '04';//เจ้าหน้าที่ระดับพื้นที่
// $_SESSION["PROVINCE_ID"] = '41';
// $_SESSION["AMPHUR_ID"] = '623';

// echo $_SERVER["SCRIPT_NAME"];
if($_SESSION['sta_login'] != 'Active'){
	header('Location: ../../index.php');
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

function in_num($text_post){
	$Text = "";
	$num = strlen($text_post);
	for($i=0; $i<$num; $i++){
		if(is_numeric($text_post[$i])){
			$Text.= $text_post[$i];  
		}  
	}
	return $Text;
}

function date_sort($d,$m,$y){
	$date_text = $y."-".$m."-".$d;
	return $date_text;
}

function tel($tel){
	if($tel!=""){  
		$txt_tel="";
		for($i=0; $i<3; $i++){
			$txt_tel.=$tel[$i];
		}   
		$txt_tel.="-";
		for($i=3; $i<6; $i++){
			$txt_tel.=$tel[$i];
		}
		$txt_tel.="-";
		for($i=6; $i<9; $i++){
			$txt_tel.=$tel[$i];
		}  
		$txt_tel;
		return $txt_tel;
	}
}

function phone($phone){
	if($phone!=""){  
		$txt_phone="";
		for($i=0; $i<3; $i++){
			$txt_phone.=$phone[$i];
		}   
		$txt_phone.="-";
		for($i=3; $i<6; $i++){
			$txt_phone.=$phone[$i];
		}
		$txt_phone.="-";
		for($i=6; $i<10; $i++){
			$txt_phone.=$phone[$i];
		}  
		$txt_phone;
		return $txt_phone;
	}
}

function card_id($card_id){
	if($card_id!=""){  
		$txt_card_id="";
		for($i=0; $i<1; $i++){
			$txt_card_id.=$card_id[$i];
		}   
		$txt_card_id.="-";
		for($i=1; $i<4; $i++){
			$txt_card_id.=$card_id[$i];
		}
		$txt_card_id.="-";
		for($i=4; $i<9; $i++){
			$txt_card_id.=$card_id[$i];
		}  
		$txt_card_id.="-";
		for($i=9; $i<11; $i++){
			$txt_card_id.=$card_id[$i];
		}    
		$txt_card_id.="-";
		for($i=11; $i<12; $i++){
			$txt_card_id.=$card_id[$i];
		} 
		$txt_card_id;
		return $txt_card_id;
	}
}

$thai_month_arr=array(
	"0"=>"",
	"1"=>"มกราคม",
	"2"=>"กุมภาพันธ์",
	"3"=>"มีนาคม",
	"4"=>"เมษายน",
	"5"=>"พฤษภาคม",
	"6"=>"มิถุนายน",  
	"7"=>"กรกฎาคม",
	"8"=>"สิงหาคม",
	"9"=>"กันยายน",
	"10"=>"ตุลาคม",
	"11"=>"พฤศจิกายน",
	"12"=>"ธันวาคม"         
);

function thai_date($time){
	global $thai_day_arr,$thai_month_arr;
	$thai_date_return=$thai_day_arr[date("w",$time)];
	$thai_date_return.=date("j",$time);
	$thai_date_return.=" ".$thai_month_arr[date("n",$time)];
	$thai_date_return.=" ".(date("Y",$time)+543);

	return $thai_date_return;
}
// $eng_date=strtotime($row_edit_study['study']);
// echo thai_date($eng_date); 
function date_d($date_d){    
	$date=date_create($date_d);
	$d_l = date_format($date,"d");
	return $d_l;
}
function date_m($date_m){    
	$date=date_create($date_m);
	$m_l = date_format($date,"m");
	return $m_l;
}
function date_y1($date_y){    
	$date=date_create($date_y);
	$Y_l = date_format($date,"Y")-543;
	return $Y_l;
}
function random_password($len){
	srand((double)microtime()*10000000);
	$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	$ret_str = "";
	$num = strlen($chars);
	for($i = 0; $i < $len; $i++)
	{
		$ret_str.= $chars[rand()%$num];
		$ret_str.=""; 
	}
	return $ret_str; 
}
function ConvertTo_name_pdf($file){

	$date = date("dmYHis");
	$txt_name = strchr($file, '.pdf', true);
	$type = strchr($file, '.pdf');
	$new_name = $txt_name."_".$date.$type;
	return array($new_name, $date);
// return $new_name;
}
function Convert_name_pdf($file, $date){
	$txt_name = strchr($file, '.pdf', true);
	$type = strchr($file, '.pdf');
	$new_name = $txt_name."_".$date.$type;
// return array($new_name, $date);
	return $new_name;
}

// $file_name = 'my_pict.ure_01.docx' ;
// $info = pathinfo( $file_name , PATHINFO_EXTENSION ) ;
// echo ".".$info ;

// $file_name = 'my_picture_01.docx' ;
// $info = end( explode( '.' , $file_name ) ) ;
// echo $info ;

// $file_name = 'my_picture_01.jpg' ;
// $info = substr( $file_name , strpos( $file_name , '.' )+1 ) ;
// echo $info ;

// $file_name = 'my_picture_01.jpg' ;
// $info = preg_match( '/\.([^\.]+)$/' , $file_name , $info ) ;
// echo $info[1] ;

function Cf_encode($id,$idfiles,$file_name){
	$type = pathinfo( $file_name , PATHINFO_EXTENSION ) ;
	$exp = explode('.' , $file_name);
	$nof = substr($file_name , 0 , -(strlen($exp[count($exp)-1])+1));
	
	$new_name = base64_encode($nof);
	$new_name_filesMin = $new_name.".".$type ;
	$new_name_filesFull = $id."_".$idfiles."_".$new_name.".".$type ;
	$new_id = $id."_".$idfiles."_"; 
	return array($new_name_filesFull,$new_name_filesMin, $new_id);
	// return $new_name;
}
function Cf_decode($file_name){
	$type = pathinfo( $file_name , PATHINFO_EXTENSION ) ;
	$exp = explode('.' , $file_name);
	$nof = substr($file_name , 0 , -(strlen($exp[count($exp)-1])+1));
	
	$new_name = base64_decode($nof);
	$new_name = $new_name.".".$type ;
	return $new_name;
}

function Convert_name_file($file_name){
	$re_name=time()."_".rand(1,9999);	
	$info = pathinfo( $file_name , PATHINFO_EXTENSION ) ;
	$new_type = $re_name.".".$info ;
	// echo $new_type;
	return $new_type;
}

function get_clientip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

function log_filse($id_member,$action) {
	$conn = $GLOBALS['conn'];

	$sql = "SELECT `id` FROM `log_files` ORDER BY `id` DESC";
	$query = $conn->query($sql);
	$row = $query->fetch_assoc();
	$newId = $row['id']+1;

	$sql = sprintf("INSERT INTO `log_files`(`id`, `id_member`, `login_ip`, `action`) VALUES (%s,%s,%s,%s)",
		GetSQLValueString($newId, 'text'),
		GetSQLValueString($id_member, 'text'),
		GetSQLValueString(get_clientip(), 'text'),
		GetSQLValueString($action, 'text'));
	$query = $conn->query($sql);
        // return $sql;
}

function return_date($date){
	if(isset($date)&&($date!="")){
		$date_text=$date;
		$day=$date_text[0].$date_text[1];
		$thaimonth=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$date3=$date_text;
		if(strstr($date3,"ม.ค.")){ $date1="ม.ค."; }
		else if(strstr($date3,"ก.พ.")) { $date1="ก.พ."; }
		else if(strstr($date3,"มี.ค.")) { $date1="มี.ค."; }
		else if(strstr($date3,"เม.ย.")) { $date1="เม.ย."; }
		else if(strstr($date3,"พ.ค.")) { $date1="พ.ค."; }
		else if(strstr($date3,"มิ.ย.")) { $date1="มิ.ย."; }
		else if(strstr($date3,"ก.ค.")) { $date1="ก.ค."; }
		else if(strstr($date3,"ส.ค.")) { $date1="ส.ค."; }
		else if(strstr($date3,"ก.ย.")) { $date1="ก.ย."; }
		else if(strstr($date3,"ต.ค.")) { $date1="ต.ค."; }
		else if(strstr($date3,"พ.ย.")) { $date1="พ.ย."; }
		else if(strstr($date3,"ธ.ค.")) { $date1="ธ.ค."; }
		else {  }
			print_r($thaimonth);

			foreach($thaimonth as $courtNum){
				if($courtNum=="ม.ค." && $courtNum==$date1){
					$date="01";
				}
				else if($courtNum=="ก.พ." && $courtNum==$date1){
					$date="02";
				}
				else if($courtNum=="มี.ค." && $courtNum==$date1){
					$date="03";
				}
				else if($courtNum=="เม.ย." && $courtNum==$date1){
					$date="04";
				}
				else if($courtNum=="พ.ค." && $courtNum==$date1){
					$date="05";
				}
				else if($courtNum=="มิ.ย." && $courtNum==$date1){
					$date="06";
				}
				else if($courtNum=="ก.ค." && $courtNum==$date1){
					$date="07";
				}
				else if($courtNum=="ส.ค." && $courtNum==$date1){
					$date="08";
				}
				else if($courtNum=="ก.ย." && $courtNum==$date1){
					$date="09";
				}
				else if($courtNum=="ต.ค." && $courtNum==$date1){
					$date="10";
				}
				else if($courtNum=="พ.ย." && $courtNum==$date1){
					$date="11";
				}
				else if($courtNum=="ธ.ค." && $courtNum==$date1){
					$date="12";
				}

			} 


			$a = $date_text;
			$b = strrev($a);
			$c = $b[0].$b[1].$b[2].$b[3];
			$x = strrev($c);
			$year = $x-543;


			$date_time= $year."-".$date."-".$day;
		}else{
			$date_time="";
		}
		return $date_time;
	}
?>
