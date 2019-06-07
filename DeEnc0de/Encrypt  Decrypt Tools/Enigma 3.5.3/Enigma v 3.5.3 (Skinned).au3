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
$gui = GUICreate("Enigma  v1.0.0", 406, 552,-1,-1,0x80000000,0x00080000)
guisetbkcolor(0xffffff)
$pic=guictrlcreatepic(@scriptdir&"\SkinEnigma.bmp",0,0,406,552)
GUICtrlSetState(-1,128)
$Bar=guictrlcreatepic(@scriptdir&"\TopBar.bmp",32,4,320,18)
$MnmzBttn=guictrlcreatepic(@scriptdir&"\MnmzDsbld.bmp",357,4,10,18)
$ClsBttn=guictrlcreatepic(@scriptdir&"\ClsDsbld.bmp",376,4,13,18)
$button1 = guictrlcreatepic(@scriptdir&"\Cripta.bmp",270,130,38,29)
$button2 = guictrlcreatepic(@scriptdir&"\Decripta.bmp",325,130,43,29)
$edit1 = GUICtrlCreateEdit("",8,163,390,360,0x00200000)
GUICtrlSetBkColor(-1,0x222222)
guictrlsetcolor(-1,0x00ff00)
$label1 = guictrlcreatelabel("by erma96",344,526)
GUICtrlSetBkColor(-1,0x0b0b0b)
guictrlsetcolor(-1,0x00ff00)
$label2 = guictrlcreatelabel($algrtm1,58,142)
GUICtrlSetBkColor(-1,0x0b0b0b)
guictrlsetcolor(-1,0x00ff00)
$label3 = guictrlcreatelabel($algrtm2,132,142)
GUICtrlSetBkColor(-1,0x0b0b0b)
guictrlsetcolor(-1,0x00ff00)
$input1 = guictrlcreateinput($algcounts,8,139,30,20,0x2000)
GUICtrlSetBkColor(-1,0x222222)
guictrlsetcolor(-1,0x00ff00)
$frcS1=guictrlcreatepic(@scriptdir&"\FrcciaSUDsbld.bmp",41,141,10,7)
$frcG1=guictrlcreatepic(@scriptdir&"\FrcciaGIùDsbld.bmp",41,150,10,7)
$input2 = GuiCtrlCreateInput($algcounte, 85, 139, 30, 20,0x2000)
GUICtrlSetBkColor(-1,0x222222)
guictrlsetcolor(-1,0x00ff00)
$frcS2=guictrlcreatepic(@scriptdir&"\FrcciaSUDsbld.bmp",118,141,10,7)
$frcG2=guictrlcreatepic(@scriptdir&"\FrcciaGIùDsbld.bmp",118,150,10,7)
$input3 = guictrlcreateinput("",165,139,80,20)
GUICtrlSetBkColor(-1,0x222222)
guictrlsetcolor(-1,0x00ff00)
$pic=guictrlcreatepic(@scriptdir&"\TransparentPixel.bmp",0,0,1,1)
GUICtrlSetState(-1,128)
GUISetState()
While 1
	$msg=guigetmsg()
	if $msg=$button1 Then
		GUICtrlSetImage($button1,@scriptdir&"\CriptaPrmt.bmp")
		$guictrlstate=0
	while $guictrlstate=0
		$array=GUIGetCursorInfo ()
		if $array[2]=0 Then
			GUICtrlSetImage($button1,@scriptdir&"\Cripta.bmp")
			$guictrlstate=1
		EndIf
		if $array[0]<270   or $array[0]>308   or $array[1]<130    or $array[1]>159 Then
			GUICtrlSetImage($button1,@scriptdir&"\Cripta.bmp")
			$guictrlstate=2
		endif
	WEnd
	if $guictrlstate=1 then cripta()
	endif
	if $msg=$button2 Then
		GUICtrlSetImage($button2,@scriptdir&"\DecriptaPrmt.bmp")
		$guictrlstate=0
	while $guictrlstate=0
		$array=GUIGetCursorInfo ()
		if $array[2]=0 Then
			GUICtrlSetImage($button2,@scriptdir&"\Decripta.bmp")
			$guictrlstate=1
		EndIf
		if $array[0]<325   or $array[0]>368   or $array[1]<130    or $array[1]>159 Then
			GUICtrlSetImage($button2,@scriptdir&"\Decripta.bmp")
			$guictrlstate=2
		endif
	WEnd
	if $guictrlstate=1 then decripta()
	endif
		if $msg=$ClsBttn Then
		GUICtrlSetImage($ClsBttn,@scriptdir&"\ClsActV.bmp")
		$guictrlstate=0
	while $guictrlstate=0
		$array=GUIGetCursorInfo ()
		if $array[2]=0 Then
			GUICtrlSetImage($ClsBttn,@scriptdir&"\ClsDsbld.bmp")
			$guictrlstate=1
		EndIf
		if $array[0]<376   or $array[0]>389   or $array[1]<4    or $array[1]>22 Then
			GUICtrlSetImage($ClsBttn,@scriptdir&"\ClsDsbld.bmp")
			$guictrlstate=2
		endif
	WEnd
	if $guictrlstate=1 then 
		iniwrite($INI,"STAT","in",$algcounts)
iniwrite($INI,"STAT","co",$algcounte)
		exit
		endif
	endif
	if $msg=$MnmzBttn Then
		GUICtrlSetImage($MnmzBttn,@scriptdir&"\MnmzActV.bmp")
		$guictrlstate=0
	while $guictrlstate=0
		$array=GUIGetCursorInfo ()
		if $array[2]=0 Then
			GUICtrlSetImage($MnmzBttn,@scriptdir&"\MnmzDsbld.bmp")
			$guictrlstate=1
		EndIf
		if $array[0]<357   or $array[0]>367   or $array[1]<4    or $array[1]>22 Then
			GUICtrlSetImage($MnmzBttn,@scriptdir&"\MnmzDsbld.bmp")
			$guictrlstate=2
		endif
	WEnd
	if $guictrlstate=1 then WinSetState ( $gui, "", @SW_MINIMIZE  )
	endif
		if $msg=$Bar Then			
		$original=mousegetpos()
		$Mouse_Gui=wingetpos("Enigma  v1.0.0")
		$x=$original[0]-$Mouse_Gui[0]
		$y=$original[1]-$Mouse_Gui[1]		
		$guictrlstate=0
	while $guictrlstate=0
		$array=GUIGetCursorInfo ()
		$mouse=mousegetpos()
		if $x<>$array[0] or $y<>$array[1] then
			WinMove ( "Enigma  v1.0.0", "", $mouse[0]-$x, $mouse[1]-$y)			
			sleep(100)
			endif
		if $array[2]=0 Then
			$guictrlstate=1
		EndIf		
	WEnd	
endif
	if $msg=$frcS1 Then
		GUICtrlSetImage($frcS1,@scriptdir&"\FrcciaSUActV.bmp")
		$guictrlstate=0
while $guictrlstate=0		
		guictrlsetdata($input1,guictrlread($input1)+1)
		if guictrlread($input1)>255 then guictrlsetdata($input1,1)
		for $rept=1 to 30
		sleep(10)
		$array=GUIGetCursorInfo ()
		if $array[2]=0 Then
			GUICtrlSetImage($frcS1,@scriptdir&"\FrcciaSUDsbld.bmp")
			$guictrlstate=1
			$rept=30
		EndIf
		if $array[0]<41   or $array[0]>51   or $array[1]<141    or $array[1]>148 Then
			GUICtrlSetImage($frcS1,@scriptdir&"\FrcciaSUDsbld.bmp")
			$guictrlstate=2
			$rept=30
		endif
		next		
		while $guictrlstate=0
			$array=GUIGetCursorInfo ()
			sleep(10)
			guictrlsetdata($input1,guictrlread($input1)+1)
			if guictrlread($input1)>255 then guictrlsetdata($input1,1)
		if $array[2]=0 Then
			GUICtrlSetImage($frcS1,@scriptdir&"\FrcciaSUDsbld.bmp")
			$guictrlstate=1
		EndIf
		if $array[0]<41   or $array[0]>51   or $array[1]<141    or $array[1]>148 Then
			GUICtrlSetImage($frcS1,@scriptdir&"\FrcciaSUDsbld.bmp")
			$guictrlstate=2
		endif
		wend
	WEnd
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
	if $msg=$frcG1 Then
		GUICtrlSetImage($frcG1,@scriptdir&"\FrcciaGIùActV.bmp")
		$guictrlstate=0
while $guictrlstate=0
		guictrlsetdata($input1,guictrlread($input1)-1)
		if guictrlread($input1)<1 then guictrlsetdata($input1,255)
		for $rept=1 to 30
		sleep(10)
		$array=GUIGetCursorInfo ()
		if $array[2]=0 Then
			GUICtrlSetImage($frcG1,@scriptdir&"\FrcciaGIùDsbld.bmp")
			$guictrlstate=1
			$rept=30
		EndIf
		if $array[0]<41   or $array[0]>51   or $array[1]<150    or $array[1]>157 Then
			GUICtrlSetImage($frcG1,@scriptdir&"\FrcciaGIùDsbld.bmp")
			$guictrlstate=2
			$rept=30
		endif
		next
		while $guictrlstate=0
			$array=GUIGetCursorInfo ()
			sleep(10)
			guictrlsetdata($input1,guictrlread($input1)-1)
			if guictrlread($input1)<1 then guictrlsetdata($input1,255)
		if $array[2]=0 Then
			GUICtrlSetImage($frcG1,@scriptdir&"\FrcciaGIùDsbld.bmp")
			$guictrlstate=1
		EndIf
		if $array[0]<41   or $array[0]>51   or $array[1]<150    or $array[1]>157 Then
			GUICtrlSetImage($frcG1,@scriptdir&"\FrcciaGIùDsbld.bmp")
			$guictrlstate=2
		endif
		wend
	WEnd
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
	if $msg=$frcS2 Then
		GUICtrlSetImage($frcS2,@scriptdir&"\FrcciaSUActV.bmp")
		$guictrlstate=0
while $guictrlstate=0
		guictrlsetdata($input2,guictrlread($input2)+1)
		if guictrlread($input2)>765 then guictrlsetdata($input2,1)
		for $rept=1 to 30
		sleep(10)
		$array=GUIGetCursorInfo ()
		if $array[2]=0 Then
			GUICtrlSetImage($frcS2,@scriptdir&"\FrcciaSUDsbld.bmp")
			$guictrlstate=1
			$rept=30
		EndIf
		if $array[0]<118   or $array[0]>128   or $array[1]<141    or $array[1]>148 Then
			GUICtrlSetImage($frcS2,@scriptdir&"\FrcciaSUDsbld.bmp")
			$guictrlstate=2
			$rept=30
		endif
		next
		while $guictrlstate=0
			$array=GUIGetCursorInfo ()
			sleep(10)
			guictrlsetdata($input2,guictrlread($input2)+1)
			if guictrlread($input2)>765 then guictrlsetdata($input2,1)
		if $array[2]=0 Then
			GUICtrlSetImage($frcS2,@scriptdir&"\FrcciaSUDsbld.bmp")
			$guictrlstate=1
		EndIf
		if $array[0]<118   or $array[0]>128   or $array[1]<141    or $array[1]>148 Then
			GUICtrlSetImage($frcS2,@scriptdir&"\FrcciaSUDsbld.bmp")
			$guictrlstate=2
		endif
		wend
	WEnd
					$algcounte=guictrlread($input2)
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
	if $msg=$frcG2 Then
		GUICtrlSetImage($frcG2,@scriptdir&"\FrcciaGIùActV.bmp")
		$guictrlstate=0
while $guictrlstate=0
		guictrlsetdata($input2,guictrlread($input2)-1)
		if guictrlread($input2)<1 then guictrlsetdata($input2,765)
		for $rept=1 to 30
		sleep(10)
		$array=GUIGetCursorInfo ()
		if $array[2]=0 Then
			GUICtrlSetImage($frcG2,@scriptdir&"\FrcciaGIùDsbld.bmp")
			$guictrlstate=1
			$rept=30
		EndIf
		if $array[0]<118   or $array[0]>128   or $array[1]<150    or $array[1]>157 Then
			GUICtrlSetImage($frcG2,@scriptdir&"\FrcciaGIùDsbld.bmp")
			$guictrlstate=2
			$rept=30
		endif
		next
		while $guictrlstate=0
			$array=GUIGetCursorInfo ()
			sleep(10)
			guictrlsetdata($input2,guictrlread($input2)-1)
			if guictrlread($input2)<1 then guictrlsetdata($input2,765)
		if $array[2]=0 Then
			GUICtrlSetImage($frcG2,@scriptdir&"\FrcciaGIùDsbld.bmp")
			$guictrlstate=1
		EndIf
		if $array[0]<118   or $array[0]>128   or $array[1]<150    or $array[1]>157 Then
			GUICtrlSetImage($frcG2,@scriptdir&"\FrcciaGIùDsbld.bmp")
			$guictrlstate=2
		endif
		wend
	WEnd
					$algcounte=guictrlread($input2)
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
	switch $msg
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
	EndSwitch	
Wend
func cripta()
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
		$ToTPsswrd=round($ToTPsswrd/2)
			while $stringa<>""
			$DECpsswrD=asc(stringleft($PssdAdtNVl,1))
			$result=round(Asc ( stringleft($stringa,1))+$AddMOD+stringleft($VrzDAlg,1)*9+$LenPsd*$LenPsd*5+$DECpsswrD*2+$ToTPsswrd)
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
EndFunc
Func decripta()
	$stringa=GUICtrlRead($edit1)
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
		$ToTPsswrd=round($ToTPsswrd/2)
		while $stringa<>""
			$DECpsswrD=asc(stringleft($PssdAdtNVl,1))
			$last=stringleft($stringa,2)
			$dec=int(dec($last)-$AddMOD-stringleft($VrzDAlg,1)*9-$LenPsd*$LenPsd*5-$DECpsswrD*2-$ToTPsswrd)
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
EndFunc