#Include <Array.au3>
#include <WindowsConstants.au3>
#include <GUIConstantsEx.au3>


$INI=@scriptdir&"\enigmalg.ini"
if fileexists($INI) =0 then
	$fierfilma=guicreate("File Mancante...",300,200)
	GUISetIcon(@scriptdir&"\icona16.ico")
	GUICtrlCreateLabel(' Non è stato trovato il file "enigmalg.ini"'&" all' interno della"&@crlf&" cartella: "&'"'&@scriptdir&'".'&@crlf&@crlf&" Per risolvere il problema è necessario: "&@crlf&@crlf&'  -Scaricare il file tramite il pulsante "Scarica INI".'&@crlf&"           ( E' necessaria una connessione internet)"&@crlf&@crlf&'  -Generare il file tramite il pulsante "Genera INI".'&@crlf&'       ATTENZIONE!   Il file generato con questa procedura'&@crlf&'       impedirà la decriptazione di stringhe provenienti'&@crlf&'       da altri programmi "Enigma".',5,5)
	$but1=guictrlcreatebutton("Scarica INI",45,170)
	$but2=guictrlcreatebutton("Genera INI",135,170)
	$but3=guictrlcreatebutton("Esci",225,170)
	guisetstate()
	
	while 1
		Switch guigetmsg()
		Case -3
			exit
		case $but3
			exit
		case $but1
			InetGet("http://erma96.altervista.org/enigmalg.ini", $INI)
			exitloop
		case $but2
			dim $numero[256]
			
			$INIcrin="[STAT]"&@crlf&"in=1"&@crlf&"co=1"&@crlf&"[MOD]"
			
			for $bambam=1 to 255
				$INIcrin=$INIcrin&@crlf&$bambam&"="&random(1,9,1)&random(1,9,1)&random(1,9,1)&random(1,9,1)
			next
			filewrite($INI,$INIcrin)
			guidelete($fierfilma)
			exitloop
		EndSwitch
		
	WEnd
	msgbox(0,"Completato!","Operazione completata, Il programma può funzionare correttamente")
endif

$algcounts=iniread($INI,"STAT","in","error")
$algcounte=iniread($INI,"STAT","co","error")
$algcountot=$algcounte+$algcounts-1
				$algcounterlv=$algcountot
				while $algcounterlv>255
					$algcounterlv-=255
				wend
$algrtm1=iniread($INI,"MOD",$algcounts,"error")
$algrtm2=iniread($INI,"MOD",$algcounterlv,"error")

if $algcounts="error" or $algcounte="error" OR $algrtm1="error" or $algrtm2="error" Then
	filedelete($INI)
	msgbox(0,"File cancellato","Il file INI corrotto è stato eliminato")
	exit
EndIf

$gui = GUICreate("Enigma  v1.0.0", 406, 380,-1,-1)

$button1 = GUICtrlCreateButton("Cripta",315,2)
$button2 = GUICtrlCreateButton("Decripta",350,2)

$edit1 = GUICtrlCreateEdit("",8,30,390,330,0x00200000)

$label1 = guictrlcreatelabel("by erma96",347,365)
$label2 = guictrlcreatelabel($algrtm1,68,8)
$label3 = guictrlcreatelabel($algrtm2,152,8)

$input1 = guictrlcreateinput($algcounts,8,5,55,20,0x2000)
GuiCtrlCreateUpDown(-1)
$input2 = GuiCtrlCreateInput($algcounte, 95, 5, 55, 20,0x2000)
GuiCtrlCreateUpDown(-1)
$input3 = guictrlcreateinput("",185,5,100,20)
GUISetState()

While 1	
	switch guigetmsg()		
	case -3		
		iniwrite($INI,"STAT","in",$algcounts)
		iniwrite($INI,"STAT","co",$algcounte)		
		exit
		case $input1
			if guictrlread($input1)<1 or guictrlread($input1)>255 then guictrlsetdata($input1,"1")
			if guictrlread($input1)<> $algcounts Then
				$algcounts=guictrlread($input1)
				$algcountot=$algcounte+$algcounts-1
				$algcounterlv=$algcountot
				while $algcounterlv>255
					$algcounterlv-=255
				wend
				$algrtm1=iniread($INI,"MOD",$algcounts,"error")
				$algrtm2=iniread($INI,"MOD",$algcounterlv,"error")
				if $algcounts="error" or $algcounte="error" OR $algrtm1="error" or $algrtm2="error" Then
	filedelete($INI)
	msgbox(0,"File cancellato","Il file INI corrotto è stato eliminato")
	exit
EndIf
				guictrlsetdata($label3,$algrtm2)
				guictrlsetdata($label2,$algrtm1)
			endif			
		case $input2
			if guictrlread($input2)<1 or guictrlread($input2)>765 then guictrlsetdata($input2,"1")
			if guictrlread($input2)<> $algcounte Then
				$algcounte=guictrlread($input2)
				$algcountot=$algcounte+$algcounts-1
				$algcounterlv=$algcountot
				while $algcounterlv>255
					$algcounterlv-=255
				wend
				$algrtm2=iniread($INI,"MOD",$algcounterlv,"error")
				if $algcounts="error" or $algcounte="error" OR $algrtm1="error" or $algrtm2="error" Then
	filedelete($INI)
	msgbox(0,"File cancellato","Il file INI corrotto è stato eliminato")
	exit
EndIf
guictrlsetdata($label3,$algrtm2)
			endif			
	    case $button1
			$psswrd=guictrlread($input3)
		    $bbb=""
		    $stringa=GUICtrlRead($edit1)
		    $len=stringlen($stringa)
			$mod1=stringleft($algrtm1,1)
			$mod2=stringright($algrtm1,1)
			$mod3=stringleft($algrtm2,1)
			$mod4=stringright($algrtm2,1)
			$mod5=stringleft(stringtrimleft($algrtm1,1),1)       
			$mod6=stringleft(stringtrimleft($algrtm2,1),1)   
			$mod7=stringleft(stringtrimleft($algrtm1,3),1)   
			$mod8=stringleft(stringtrimleft($algrtm2,2),1)   
			$MultMOD=$mod1*$mod2*$mod3*$mod4*$mod5*$mod6*$mod7*$mod8
			$AddMOD=$mod1+$mod2+$mod3+$mod4+$mod5+$mod6+$mod7+$mod8+$algcounts
			$rptlpfrsz=Ceiling ($len/8)
			$aiaiai=1
			$VrzDAlg=""
			while $aiaiai<$rptlpfrsz+1
				$VrzDAlg=$VrzDAlg&$algrtm1&$algrtm2
				$aiaiai=$aiaiai+1
			wend
			
			$aiaiai=1
			$PssdAdtNVl=""
			$LenPsd=stringlen($psswrd)
			if $psswrd<>"" then			
			$rptlpfrsz=Ceiling ($len/$LenPsd)
			while $aiaiai<$rptlpfrsz+1
				$PssdAdtNVl=$PssdAdtNVl&$psswrd
				$aiaiai=$aiaiai+1
			wend
		endif
		
		$aiaiai=$psswrd
		$ToTPsswrd=0
		while $aiaiai<>""
			$ToTPsswrd=$ToTPsswrd+asc(stringleft($aiaiai,1))
			$aiaiai=stringtrimleft($aiaiai,1)
		WEnd
		
				
			while $stringa<>""
			$DECpsswrD=asc(stringleft($PssdAdtNVl,1))
			$result=round(Asc ( stringleft($stringa,1))+$AddMOD+stringleft($VrzDAlg,1)*9+$LenPsd*$LenPsd*5+$DECpsswrD*$DECpsswrD*$DECpsswrD*3+$ToTPsswrd*2)
			$VrzDAlg=stringtrimleft($VrzDAlg,1)
			$PssdAdtNVl=stringtrimleft($PssdAdtNVl,1)
			
			while $result>255
					$result-=255
						wend
			$hex=hex($result,2)
			$bbb=$bbb&$hex
			$stringa=stringtrimleft($stringa,1)
			wend
guictrlsetdata($edit1,$bbb)
guictrlsetdata($input3,"")
	case $button2	
		$psswrd=guictrlread($input3)
        $len=stringlen($stringa)
			$mod1=stringleft($algrtm1,1)
			$mod2=stringright($algrtm1,1)
			$mod3=stringleft($algrtm2,1)
			$mod4=stringright($algrtm2,1)
			$mod5=stringleft(stringtrimleft($algrtm1,1),1)       
			$mod6=stringleft(stringtrimleft($algrtm2,1),1)   
			$mod7=stringleft(stringtrimleft($algrtm1,3),1)   
			$mod8=stringleft(stringtrimleft($algrtm2,2),1)   
			$MultMOD=$mod1*$mod2*$mod3*$mod4*$mod5*$mod6*$mod7*$mod8
			$AddMOD=$mod1+$mod2+$mod3+$mod4+$mod5+$mod6+$mod7+$mod8+$algcounts
		$bbb=""
		$stringa=GUICtrlRead($edit1)
		$len=stringlen($stringa)
		$rptlpfrsz=Ceiling ($len/8)
			$aiaiai=1
			$VrzDAlg=""
			
			while $aiaiai<$rptlpfrsz+1
				$VrzDAlg=$VrzDAlg&$algrtm1&$algrtm2
				$aiaiai=$aiaiai+1
			wend
			
			$aiaiai=1
			$PssdAdtNVl=""
			$LenPsd=stringlen($psswrd)
			if $psswrd<>"" then			
			$rptlpfrsz=Ceiling ($len/$LenPsd)
			while $aiaiai<$rptlpfrsz+1
				$PssdAdtNVl=$PssdAdtNVl&$psswrd
				$aiaiai=$aiaiai+1
			wend
		endif
		
		$aiaiai=$psswrd
		$ToTPsswrd=0
		while $aiaiai<>""
			$ToTPsswrd=$ToTPsswrd+asc(stringleft($aiaiai,1))
			$aiaiai=stringtrimleft($aiaiai,1)
		WEnd
		
		
		while $stringa<>""
			$DECpsswrD=asc(stringleft($PssdAdtNVl,1))
			$last=stringleft($stringa,2)
			$dec=int(dec($last)-$AddMOD-stringleft($VrzDAlg,1)*9-$LenPsd*$LenPsd*5-$DECpsswrD*$DECpsswrD*$DECpsswrD*3-$ToTPsswrd*2)
			$VrzDAlg=stringtrimleft($VrzDAlg,1)
			$PssdAdtNVl=stringtrimleft($PssdAdtNVl,1)
			while $dec<1
					$dec+=255
			wend			
			$char=Chr($dec)
		    $bbb=$bbb&$char
			$stringa=stringtrimleft($stringa,2)			
		wend
	guictrlsetdata($edit1,$bbb)
	guictrlsetdata($input3,"")
	EndSwitch	
Wend