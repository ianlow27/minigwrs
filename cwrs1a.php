#!/usr/bin/php
<?php

unlink('geiriau.txt');

$LlTestun="testun";
if(isset($argv[1])) $LlTestun = $argv[1];
echo $LlTestun;
sleep(1);
  
$LlCwrs="";
$LlGwers="";
$LlTeitl="";
$LlNodwch="";
$LlCyfarwyddo="";
$LlLlun1="";
$LlLlun2="";
$LlFfeil="";
$LlLledYmylCy="";
$LlLledYmylEn="";
$LlMaintCy="";
$LlMaintEn="";
$LlCy="";
$LlEn="";
$DLlun1 = array();
$DLlun2 = array();
$DLlun3 = array();
$DLlun4 = array();
$DFfeil1 = explode("\n", file_get_contents("./". $LlTestun) );
$LlTestun="";
foreach($DFfeil1 as $ll1a){
  $ll1a = trim($ll1a);
  if(substr($ll1a,0,5)=="|>>>|"){
    $LlTestun.= "|=_________________________\n";
    $dCfmsr = explode("|", $ll1a);
    for($j=2; $j < count($dCfmsr); $j++){
      $LlTestun.= "|". $dCfmsr[$j]. "\n";
    }//dfor
  }else if(substr($ll1a,0,5)=="|<<<|"){
    $dCfmsr = explode("|", $ll1a);
    for($j=2; $j < count($dCfmsr); $j++){
      $LlTestun.= "|". $dCfmsr[$j]. "\n";
    }//dfor
  }else {
    $LlTestun.= $ll1a. "\n";
  }//dif
  
}//dforeach

file_put_contents("./0buff1.txt", $LlTestun);

//echo $LlTestun; return;

$LlGeiriau="";
$BSylweb = 0;
$DFfeil = explode("\n", $LlTestun);
$LlGeirfa = "";
foreach($DFfeil as $ll1a){
  $ll1a = trim($ll1a);
  if(substr($ll1a,0,2)=="/*"){ $BSylweb = 1; }
  if(substr($ll1a,0,2)=="*/"){ $BSylweb = 0;  continue; }
  if($BSylweb) continue;
  //----------------------------------------------
  if(substr($ll1a,0,10)=="|YMADAEL!!"){ break; }
  //----------------------------------------------
  //----------------------------------------------
  //----------------------------------------------
  //----------------------------------------------
  $ll1a = preg_replace("/([a-zA-Z@]{1,1})`([a-zA-Z@]{1,1})/", "$1xxxxx$2", $ll1a);
  $ll1a = preg_replace("/([a-zA-Z@]{1,1})%([a-zA-Z@]{1,1})/", "$1xxyxx$2", $ll1a);
  //----------------------------------------------
  if(  (substr($ll1a,0,1)=="`")
     ||(substr($ll1a,0,1)=="|")  ){

    if( (!preg_match("/=/", $ll1a)) ){ //Y mae 'r hyn dim ond testun bur yn unig
      //&&(!preg_match("/¬/", $ll1a)) ){ 
      if(substr($ll1a,0,1) =="|" ){
        $LlEn .= "<p>".  $ll1a."</p>";
      }
    }else {
echo "<1___________________________".$ll1a."\n";
      $d1a = explode("=", substr($ll1a,1));
      $d1a[0] = trim($d1a[0]);
     
      $d1a[1] = trim(preg_replace("/@/", "~",$d1a[1]) ); 
echo "<2___________________________[".$d1a[0]."]____[".$d1a[1]."]\n";
      if      ($d1a[0]=="gwers"){
        $LlGwers=preg_replace("/\//", "<br>", $d1a[1]);
      }else if($d1a[0]=="teitl"){
        $LlTeitl=$d1a[1];
      }else if($d1a[0]=="cwrs"){
        $LlCwrs.=$d1a[1]. "/";
      }else if($d1a[0]=="cyfarwyddo"){
        $LlCyfarwyddo.=$d1a[1]. "/";
      }else if($d1a[0]=="nodwch"){
        $LlNodwch.=$d1a[1]. "/";
      }else if($d1a[0]=="lledymylcy"){
        $LlLledYmylCy.=$d1a[1]. "";
      }else if($d1a[0]=="lledymylen"){
        $LlLledYmylEn.=$d1a[1]. "";
      }else if($d1a[0]=="maintcy"){
        $LlMaintCy.=$d1a[1]. "";
      }else if($d1a[0]=="mainten"){
        $LlMaintEn.=$d1a[1]. "";
echo "<<<<<____". $LlMaintEn."\n";
      }else if($d1a[0]=="llun1"){
        $DLlun1=explode("/", $d1a[1]);
      }else if($d1a[0]=="llun2"){
        $DLlun2=explode("/", $d1a[1]);
      }else if($d1a[0]=="llun3"){
        $DLlun3=explode("/", $d1a[1]);
      }else if($d1a[0]=="llun4"){
        $DLlun4=explode("/", $d1a[1]);
      }else if(preg_match("/^([0-9]+)\)/", $d1a[0])){
echo "<3___________________________".$d1a[1]."\n";
        $d1b = explode(")", $d1a[0]);
        $d1b[1] = preg_replace("/ /", "_", trim($d1b[1]));
        $d1b[0] = (int)$d1b[0];

        //if(!preg_match("/gwers00([125]{1,1})/", $LlFfeil)){
          if(substr($ll1a,0,1)=="`")
            $LlGeiriau .= strtolower(trim($d1b[1])). "/". strtolower(trim($d1a[1] )). "\n";
        //}

        $d1b[1] = acenau($d1b[1]);
				$LlGeirfa .= acenau($ll1a). "<br>";

        if      ( (($d1b[0] % 7) == 1) && (!preg_match("/Alphabet/", $LlTeitl)) ){
            $LlCy .= uccyntaf(trim($d1b[1])). " ";
            $LlEn .= uccyntaf(trim($d1a[1])). " ";
        }else if((($d1b[0] % 7) == 5) && (!preg_match("/Alphabet/", $LlTeitl) ) ){
            $LlCy .= uccyntaf(trim($d1b[1])). " ";
            $LlEn .= uccyntaf(trim($d1a[1])). " ";
        }else {
          $LlCy .= trim($d1b[1]). " ";
          $LlEn .= trim($d1a[1]). " ";
        }

        if      (($d1b[0] % 7) == 0){
          $LlCy .= "//";
          $LlEn .= "//";
        }else if(($d1b[0] % 7) == 4){
          $LlCy .= "/";
          $LlEn .= "/";
        }
     

      }else if($d1a[0]=="ffeil"){
        $LlFfeil=$d1a[1];
      }else if( (substr($ll1a,1,5) == "=____")
              ||(substr($ll1a,1,5) == "=====") ){
echo "<5__________________________".$ll1a."\n";
        $llAtalnod=",";
        $llCromfach="(";
        if(substr($ll1a,0,1) =="|"){
          $llAtalnod="";
          $LlEn = preg_replace("/([a-zA-Z_\-\[\]\^´']+)@([a-zA-Z_\-\[\]\^´']+)`/", "<b><em>$1</em></b>", $LlEn);
          $LlEn = preg_replace("/([a-zA-Z@_\-\[\]\^´']+)`/", "<b><em>$1</em></b>", $LlEn);

          $LlEn = preg_replace("/([\|%]{1,1})/", "", $LlEn);
          $LlEn = preg_replace("/\]/", "</u>", $LlEn);
          /*
          m t a h c d n
          */
          $LlEn = preg_replace("/m\[(\"*)(f)[bm]/i", "<u style='background-color:#ff0;color:#e00;' >$1$2", $LlEn); //meddal
          $LlEn = preg_replace("/c\[(\"*)(f)[bm]/i", "<u style='background-color:#ff0;color:#060;' >$1$2", $LlEn); //meddal
          $LlEn = preg_replace("/m\[(\"*)/", "<u style='background-color:#ff0;color:#e00;' >$1", $LlEn); //meddal
          $LlEn = preg_replace("/t\[(\"*)/", "<u style='background-color:#ff0;color:#833;' >$1", $LlEn); //trwynol
          $LlEn = preg_replace("/a\[(\"*)/", "<u style='background-color:#ff0;color:#00e;' >$1", $LlEn); //anadlol
          $LlEn = preg_replace("/h\[(\"*)/", "<u style='background-color:#ff0;color:#a0c;' >$1", $LlEn); //h-llytheren
          $LlEn = preg_replace("/c\[(\"*)/", "<u style='background-color:#ff0;color:#060;' >$1", $LlEn); //cymysg
          $LlEn = preg_replace("/d\[(\"*)/", "<u style='background-color:#fbb;color:#000;' >$1", $LlEn); //ddiim
          $LlEn = preg_replace("/n\[(\"*)/", "<u style='background-color:#bfb;color:#000;' >$1", $LlEn); //nodyn
          $LlEn = acenau($LlEn);
          $llCromfach="";
        }else {
          $LlCy .= "/";
          $LlEn .= "/";
        }
        $LlCy = preg_replace("/ \/\/\//", ".<br>", $LlCy);
        $LlCy = preg_replace("/ \/\//",   $llAtalnod."<br>", $LlCy);
				//xxx1   $LlCy = preg_replace("/ \//",     $llAtalnod."<br>", trim($LlCy));
        $LlEn = $llCromfach. preg_replace("/ \/\/\//", ".)<br>", $LlEn);
        $LlEn = preg_replace("/ \/\//",   $llAtalnod."<br>", $LlEn);
				//xxx1  $LlEn = preg_replace("/ \//",     $llAtalnod."<br>", trim($LlEn));
        $LlNodwch = preg_replace("/\//",     "<br>", $LlNodwch);
        $LlCyfarwyddo = preg_replace("/\//", "<br>", $LlCyfarwyddo);
        $LlCwrs = preg_replace("/\//", "<br>", $LlCwrs);
        //-----------------------------------------------------
$DEn = preg_split("/<p>/", $LlEn);
// print_r($DEn);
//---------------------------------
//---------------------------------
//---------------------------------
//---------------------------------
//---------------------------------
if(count($DEn)>=2){
//echo "<<<<<____". $LlMaintEn."\n";
  //---------------------------------
/*
  $DEn[1] = '<img src="./'. $DLlun3[0]. '.png" style="margin-top:'. $DLlun3[2] .'px;float:right;width:'.$DLlun3[1]. 'px; left:'. $DLlun3[2]. 'px;top:'.$DLlun3[3].'px;" />'
   .
   $DEn[1]
   ;
  //---------------------------------
  $DEn[count($DEn)-(int)($DLlun4[3])] = '<img src="./'. $DLlun4[0]. '.png" style="margin-top:'. $DLlun4[2] .'px;float:right;width:'.$DLlun4[1]. 'px;left:'. $DLlun4[2]. 'px;xxtop:'.$DLlun4[3].'px;" />'
   .
   $DEn[(count($DEn)-(int)$DLlun4[3])]
   ;
 */
  $LlEn = "";
  $cRhif1=0;
  foreach($DEn as $l2a){
    if($cRhif1)
		$l2a = preg_replace("/ \/ /", "</span> <br> <span class='p2'>", $l2a);
    $LlEn .= "<p><span class='p1'>". $l2a."</span>\n";
    $cRhif1++;
  }//dforeach
}
//---------------------------------
$LlEn = preg_replace("/\{__\}/", "&#91;&ensp;&ensp;&#93; <br><br>", $LlEn);
//---------------------------------
//---------------------------------
//---------------------------------
//---------------------------------
$LlFfram = "ffram-glas1";
//if      (substr(strrev($LlFfeil),0,1)=="b"){
if      (preg_match("/gwers([0-9]+)b([0-9]*)/", $LlFfeil ) ){
  $LlFfram = "ffram-oren1";
//}else if(substr(strrev($LlFfeil),0,1)=="c"){
}else if      (preg_match("/gwers([0-9]+)c([0-9]*)/", $LlFfeil ) ){
  $LlFfram = "ffram-gwyrdd1";
}else if(substr(strrev($LlFfeil),0,1)=="e"){
  $LlFfram = "ffram-gwyrdd1";
}


//============================================

//============================================
//============================================
//============================================
$LlHtmlBrig=
"\xEF\xBB\xBF". '<!DOCTYPE html><html><head>
<style>
xxxp {text-indent:-20px;padding-left:20px;margin-top:-18px;}
p {xxtext-indent:-20px;padding:0px;margin:0px;}
.p1 {font-size:150%;}
.p2 {font-size:70%;}
</style>
</head>
<body style="font-family:Arial;">';

$LlHtmlPenniad=
'<div style="background-image:url(./'. $LlFfram.'.png);width:600px;height:600px;background-size:contain;border:0px solid blue;">

<div style="xxtext-align:center;font-weight:bold;font-size:250%;xxcolor:#00f;xxfont-style:italic;xxtext-decoration:underline;margin-top:10px;">'. acenau($LlCwrs). '</div>

<div style="xxtext-align:center;font-weight:bold;font-size:150%;xxcolor:#00f;xxfont-style:italic;text-decoration:underline;margin-top:10px;">'. acenau($LlGwers)  . '</div>

<div style="xxtext-align:center;font-weight:bold;font-size:150%;xxcolor:#0a0;font-style:italic;margin-top:0px;margin-bottom:15px;">'. preg_replace("/\//", "<br>", acenau($LlTeitl)  ). '</div>


<div style="xxtext-align:center;xxfont-weight:bold;font-size:150%;xxcolor:#0a0;font-style:italic;margin-top:0px;margin-bottom:15px;">'. preg_replace("/\//", "<br>", acenau($LlCyfarwyddo)  ). '</div>';


$LlHtmlGwaelod=
'</div>
</body>
</html>
';
//============================================
//============================================
//============================================
//============================================
if(trim($LlCy) == ""){
  file_put_contents("./". $LlFfeil. ".html", 
    $LlHtmlBrig .
    $LlHtmlPenniad .
/*
(
  (substr($ll1a,0,1)=="|xxxx")
    ? ""
    : '
<img src="./'. $DLlun1[0]. '.png" style="position:absolute;width:'.$DLlun1[1]. 'px; left:'. $DLlun1[2]. 'px; top:'.$DLlun1[3].'px;" />
<img src="./'. $DLlun2[0]. '.png" style="position:absolute;width:'.$DLlun2[1]. 'px; left:'. $DLlun2[2]. 'px; top:'.$DLlun2[3].'px;" />

      '
)
'<br/><br/><br/><br/><br/><br/><br/>'.
'<br/><br/><br/><br/><br/><br/><br/>'.
'<br/><br/><br/><br/><br/><br/><br/>'.
'<br/><br/><br/><br/><br/><br/><br/>'.
'<br/><br/><br/><br/><br/><br/><br/>'.
'<br/><br/><br/><br/><br/><br/><br/>'.
'<br/><br/><br/><br/><br/><br/><br/>'.
'<br/><br/><br/><br/><br/><br/><br/>'.
'<br/><br/><br/><br/><br/><br/><br/>'.
'<br/><br/><br/><br/><br/><br/><br/>'.
'<br/><br/><br/><br/><br/><br/><br/>'.
 */




/*
'<table width=100% border=0 style="'.
(($LlLledYmylCy!="")?("margin-left:".$LlLledYmylCy."px;"):"")
.'" >
<tr>
<!-- td width=5%>
</td-->
<td width=90% style="font-size:'. 
( ($LlMaintCy != "") ? $LlMaintCy : "160" )
.'%;font-weight:bold;" ><nobr> '. $LlCy. ' </nobr> </td>
<td width=5%>
</td>
</tr>
</table> '.
 */
'<nobr><b>'. $LlCy. '</b></nobr>'.
//if($LlFfeil == "gwers040a2"){ echo "[3]".$LlMaintEn."\n"; }
//========================================================
//========================================================
//========================================================
/*
'<table width=100% border=0 style="max-height:200px;'.
(($LlLledYmylEn!="")?("margin-left:".$LlLledYmylEn."px;"):"")
.'" >
<tr style="max-height:200px;">
<!--td width=5%>
</td-->
<td width=90% style="font-size:'. 
( ($LlMaintEn != "") ? $LlMaintEn : "110" )
.'%;font-weightxx:bold;" >'.
$LlEn. 
' </td>
<td width=5%>
</td>
</tr>
</table>'.
*/
''. $LlEn. ''.
//========================================================
//========================================================
//========================================================
//========================================================
/*
'<table width=100% border=0 style="margin-top:-15px;" >
<tr>
<!-- td width=49%>
</td -->
<td width=2% style="font-size:88%;">'.
(
   ($LlNodwch != "")
      ? '<b>Note:</b>'
      : ''
)
.'<br><nobr>'. preg_replace("/\|/", "/", $LlNodwch). ' </nobr> </td>
<td width=49%>
</td>
</tr>
</table>'.
 */
''. $LlNodwch. ''.

/*
'<br/><br/><br/><br/><br/><br/><br/>'.
'<br/><br/><br/><br/><br/><br/><br/>'.
'<br/><br/><br/><br/><br/><br/><br/>'.
'<br/><br/><br/><br/><br/><br/><br/>'.
'<br/><br/><br/><br/><br/><br/><br/>'.
'<br/><br/><br/><br/><br/><br/><br/>'.
'<br/><br/><br/><br/><br/><br/><br/>'.
'<br/><br/><br/><br/><br/><br/><br/>'.
'<br/><br/><br/><br/><br/><br/><br/>'.
'<br/><br/><br/><br/><br/><br/><br/>'.
 */
$LlHtmlGwaelod);
//============================================
//============================================
//============================================
}else {
//============================================
//============================================
//============================================


	$LlEn =  preg_replace("/ \//", "<br>", $LlEn);
	$LlCy =  preg_replace("/ \//", "<br>", $LlCy);

	$LlEn =  substr( substr( trim(preg_replace('/~(\w+)/', '&ThinSpace;($1)', $LlEn)), 0, -5 ), 1 );
	$DEnx1 = explode("<br>", $LlEn);
	$LlCy =  substr( substr( trim(preg_replace('/~(\w+)/', '&ThinSpace;($1)', $LlCy)), 0, -4 ), 0 );
	$DCyx1 = explode("<br>", $LlCy);
	$Ll1 = "";
	for($i=0; $i < count($DCyx1); $i++){
		$llmod = $i % 4;
		$llNod = "";
		if(($llmod == 1) || ($llmod == 3)){
      $llNod.= "&emsp;"; 
		}
    
	  $Ll1 .= $llNod. "<span style='font-weight:bold;font-size:170%;'>". $DCyx1[$i] . "</span><br>";
	  $Ll1 .= $llNod. "<span style='font-size:110%;xxcolor:#111;'>". preg_replace("/ /", "&emsp;", $DEnx1[$i]) . "</span><br>";
	}//endfor


//file_put_contents("./". $LlFfeil. ".html", "". '<!DOCTYPE html><html><head>
        
	$LlGeirfa = preg_replace("/`/", "", $LlGeirfa);
	$LlGeirfa = preg_replace("/=(\s+)([a-zA-z]+)~([a-zA-Z]+)/", "= $2 ($3)", $LlGeirfa);


	
  file_put_contents("./". $LlFfeil. ".html",
    $LlHtmlBrig.
    $LlHtmlPenniad.
  	$Ll1. 
  	'<hr/>'.
  	$LlGeirfa. 
  	'<hr/>'.
  	$LlNodwch. 
  	
    $LlHtmlGwaelod);

	/*
   $data = iconv("CP1257", "UTF-8", '<!DOCTYPE html><html><head>
	<meta charset="UTF-8" />
	</head><body>Cy WAS NOT BLANK<br>'. 
             $Ll1. '</body></html> ');

file_put_contents("./". $LlFfeil. ".html", $data);
	 */




}//endif $LlCy == ""
//============================================
//============================================
//============================================
//============================================
//============================================
//============================================
//============================================
//============================================
//============================================
//============================================
        //-----------------------------------------------------
         file_put_contents("./geiriau.txt", $LlGeiriau);
        //-----------------------------------------------------
        //-----------------------------------------------------
$LlCwrs="";
$LlGwers="";
$LlTeitl="";
$LlCyfarwyddo="";
$LlNodwch="";
$LlGeirfa = "";
$LlLlun1="";
$LlLlun2="";
$LlFfeil="";
$LlMaintCy="";
$LlMaintEn="";
$LlLledYmylCy="";
$LlLledYmylEn="";
$LlCy="";
$LlEn="";
        //-----------------------------------------------------
      }//dif
echo "<6__________________________".substr($ll1a,1,5)."__". $ll1a."\n";
    }//dif if(!preg_match("/=/", $ll1a)){
    
  //----------------------------------------------
  //----------------------------------------------
  //----------------------------------------------
  //----------------------------------------------
  //----------------------------------------------
  //----------------------------------------------
  }//dif 

}//endforeach
//------------------------------------------------------
function acenau($pstr){
  $pstr = preg_replace("/a\^/", "â", $pstr);
  $pstr = preg_replace("/e\^/", "ê", $pstr);
  $pstr = preg_replace("/i\^/", "î", $pstr);
  $pstr = preg_replace("/o\^/", "ô", $pstr);
  $pstr = preg_replace("/u\^/", "û", $pstr);
  $pstr = preg_replace("/w\^/", "ŵ", $pstr);
  $pstr = preg_replace("/y\^/", "ŷ", $pstr);
  $pstr = preg_replace("/a´/",  "á", $pstr);
  $pstr = preg_replace("/yxxxxx/",  "ỳ", $pstr);
  $pstr = preg_replace("/axxxxx/",  "à", $pstr);
  $pstr = preg_replace("/axxyxx/",  "ä", $pstr);
  //$pstr = preg_replace("/exxxxx/",  "è", $pstr);
  $pstr = preg_replace("/exxxxx/",  "ë ", $pstr);
  $pstr = preg_replace("/ixxyxx/",  "ï", $pstr);
  $pstr = preg_replace("/oxxyxx/",  "ö", $pstr);
return $pstr;
}//dfunc
//------------------------------------------------------
function uccyntaf($pstr){
	$ch1 = mb_substr($pstr,0,1);
  //if(!preg_match("/gwers00([125]{1,1})/", $LlFfeil)){
	if(preg_match("/([âêîôûŵŷáỳàäèëïö]+)/", $pstr[0])){
    if($ch1 == "â") $ch1 = "Â";
    else if($ch1 == "ê") $ch1 = "Ê";
    else if($ch1 == "î") $ch1 = "Î";
    else if($ch1 == "ô") $ch1 = "Ô";
    else if($ch1 == "û") $ch1 = "Û";
    else if($ch1 == "ŵ") $ch1 = "Ŵ";
    else if($ch1 == "ŷ") $ch1 = "Ŷ";
    else if($ch1 == "á") $ch1 = "Á";
    else if($ch1 == "ỳ") $ch1 = "Ỳ";
    else if($ch1 == "à") $ch1 = "À";
    else if($ch1 == "ä") $ch1 = "Ä";
    else if($ch1 == "è") $ch1 = "È";
    else if($ch1 == "ë") $ch1 = "Ë";
    else if($ch1 == "ï") $ch1 = "Ï";
    else if($ch1 == "ö") $ch1 = "Ö";
     echo "XXXXX1__". $ch1. "____". mb_strlen($pstr)."____". $pstr;
	}else {
    $ch1 = ucfirst($ch1);
    echo "XXXXX2__". $ch1. "___". mb_strlen($pstr)."_____". mb_substr($pstr,1);
	}

return $ch1 . mb_substr($pstr,1);

}//dfunc
//------------------------------------------------------
//------------------------------------------------------
//------------------------------------------------------



?>
