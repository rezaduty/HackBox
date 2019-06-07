#!/usr/bin/perl

##
#KuNdUz
##

#     !!!! * Insert string search = Login or login, Password or password, Username or username, Admin or admin, Sing or sing * !!!!

use IO::Socket;
use HTTP::Request;
use LWP::UserAgent;

system('cls');
system('title Admin Control Panel Finder');

print"\n";
print "\t>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>\n";
print "\t<                                    <\n";
print "\t>     Admin Control Panel Finder     >\n";
print "\t<                                    <\n";
print "\t> 08/10/08           Coded_By_KuNdUz >\n";
print "\t<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<\n";
print "\n";

print "~ Enter Site\n\n-> ";
$site=<STDIN>;
chomp $site;

if ( $site !~ /^http:/ ) {
$site = 'http://' . $site;
}
if ( $site !~ /\/$/ ) {
$site = $site . '/';
}
print "\n";
print "~ Insert string search\n(ex: Username or Password or Senha or Admin vs..)\n\n-> ";
$string=<STDIN>;
chomp $string;
print "\n";

print "~ Scaning...\n\n";

$a1="admin1.php";
$a2="admin1.html";
$a3="admin2.php";
$a4="admin2.html";
$a5="yonetim.php";
$a6="yonetim.html";
$a7="yonetici.php";
$a8="yonetici.html";
$a9="admin/";
$a10="admin/account.php";
$a11="admin/account.html";
$a12="admin/index.php";
$a13="admin/index.html";
$a14="admin/login.php";
$a15="admin/login.html";
$a16="admin/home.php";
$a17="admin/controlpanel.html";
$a18="admin/controlpanel.php";
$a19="admin.php";
$a20="admin.html";
$a21="admin/cp.php";
$a22="admin/cp.html";
$a23="cp.php";
$a24="cp.html";
$a25="administrator/";
$a26="administrator/index.html";
$a27="administrator/index.php";
$a28="administrator/login.html";
$a29="administrator/login.php";
$a30="administrator/account.html";
$a31="administrator/account.php";
$a32="administrator.php";
$a33="administrator.html";
$a34="login.php";
$a35="login.html";
$a36="modelsearch/login.php";
$a37="moderator.php";
$a38="moderator.html";
$a39="moderator/login.php";
$a40="moderator/login.html";
$a41="moderator/admin.php";
$a42="moderator/admin.html";
$a43="moderator/";
$a44="account.php";
$a45="account.html";
$a46="controlpanel.php";
$a47="controlpanel.html";
$a48="admincontrol.php";
$a49="admincontrol.html";
$a50="admin/account.php";
$a51="admin/account.html";
$a52="adminpanel.php";
$a53="adminpanel.html";
$a54="admin1.asp";
$a55="admin2.asp";
$a56="yonetim.asp";
$a57="yonetici.asp";
$a58="admin/account.asp";
$a59="admin/index.asp";
$a60="admin/login.asp";
$a61="admin/home.asp";
$a62="admin/controlpanel.asp";
$a63="admin.asp";
$a64="admin/cp.asp";
$a65="cp.asp";
$a66="administrator/index.asp";
$a67="administrator/login.asp";
$a68="administrator/account.asp";
$a69="administrator.asp";
$a70="login.asp";
$a71="modelsearch/login.asp";
$a72="moderator.asp";
$a73="moderator/login.asp";
$a74="moderator/admin.asp";
$a75="account.asp";
$a76="controlpanel.asp";
$a77="admincontrol.asp";
$a78="admin/account.asp";
$a79="adminpanel.asp";

for ($i=1;$i<80;$i++){

$add=a.$i;
chomp $add;

$final=$site.$$add;

my $req=HTTP::Request->new(GET=>$final);
my $ua=LWP::UserAgent->new();
$ua->timeout(30);
my $response=$ua->request($req);

if($response->content =~ /$string/){
print " \n [+] Yepp -> $final\n\n";
}else{
print "[-] Not Found <- $final\n";
}
}
##
# KuNdUz
##