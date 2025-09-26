<?php
$LlCwrs="";
$LlGwers="";
$LlTeitl="";
$LlNodwch="";
$LlCyfarwyddo="";
$LlLlun1="";
$LlLlun2="";
$LlFfeil="";
$LlFfeilPrev="";
$LlLledYmylCy="";
$LlLledYmylEn="";
$LlMaintCy="";
$LlMaintEn="";
$LlFfram="";
$LlCy="";
$LlEn="";
$DLlun1 = array();
$DLlun2 = array();
$DLlun3 = array();
$DLlun4 = array();
$DFfeil1 = explode("\n", file_get_contents("./". $LlTestun) );
//$LlTestun="";

//---------------------------------------
//---------------------------------------
//---------------------------------------
//---------------------------------------
function htmlfmtinit(){
global $LlCwrs; global $LlGwers; global $LlTeitl; global $LlNodwch; global $LlCyfarwyddo; global $LlLlun1; global $LlLlun2; global $LlFfeil; global $LlFfeilPrev; global $LlLledYmylCy; global $LlLledYmylEn; global $LlMaintCy; global $LlMaintEn; global $LlCy; global $LlEn; global $DLlun1; global $DLlun2; global $DLlun3; global $DLlun4; global $DFfeil1; global $LlTestun;
$LlCwrs="";
$LlGwers="";
$LlTeitl="";
$LlNodwch="";
$LlCyfarwyddo="";
$LlLlun1="";
$LlLlun2="";
$LlFfeil="";
$LlFfeilPrev="";
$LlLledYmylCy="";
$LlLledYmylEn="";
$LlMaintCy="";
$LlMaintEn="";
$LlFfram="";
$LlCy="";
$LlEn="";
}//endfunc
//---------------------------------------
//---------------------------------------
function htmlfmtsettings($ll1a){
global $LlCwrs; global $LlGwers; global $LlTeitl; global $LlNodwch; global $LlCyfarwyddo; global $LlLlun1; global $LlLlun2; global $LlFfeil; global $LlFfeil;  global $LlLledYmylCy; global $LlLledYmylEn; global $LlMaintCy; global $LlMaintEn; global $LlCy; global $LlEn; global $DLlun1; global $DLlun2; global $DLlun3; global $DLlun4; global $DFfeil1; global $LlTestun;
$bfound=false;
      //____$d1a = explode("=", substr($ll1a,1));
      $d1a = explode("=", substr($ll1a,0));

      if(!isset($d1a[1])) return "";

      $d1a[0] = trim($d1a[0]);
     
      $d1a[1] = trim(preg_replace("/@/", "~",$d1a[1]) ); 
//echo "<2___________________________[".$d1a[0]."]____[".$d1a[1]."]\n";
      if      ($d1a[0]=="modiwl"){
        $LlGwers=preg_replace("/\//", "<br>", $d1a[1]);
        $bfound=true;
      }else if($d1a[0]=="teitl"){
        $LlTeitl=$d1a[1];
        $bfound=true;
      }else if($d1a[0]=="cwrs"){
        $LlCwrs.=$d1a[1]. "/";
        $bfound=true;
      }else if($d1a[0]=="cyfarwyddo"){
        $LlCyfarwyddo.=$d1a[1]. "/";
        $bfound=true;
      }else if($d1a[0]=="nodwch"){
        $LlNodwch.=$d1a[1]. "/";
        $bfound=true;
      }else if($d1a[0]=="lledymylcy"){
        $LlLledYmylCy.=$d1a[1]. "";
        $bfound=true;
      }else if($d1a[0]=="lledymylen"){
        $LlLledYmylEn.=$d1a[1]. "";
        $bfound=true;
      }else if($d1a[0]=="maintcy"){
        $LlMaintCy.=$d1a[1]. "";
        $bfound=true;
      }else if($d1a[0]=="mainten"){
        $LlMaintEn.=$d1a[1]. "";
//echo "<<<<<____". $LlMaintEn."\n";
        $bfound=true;
      }else if($d1a[0]=="llun1"){
        $LlLlun1 = preg_replace("/ /", "", $d1a[1]);
        $DLlun1=explode("/", $d1a[1]);
        $bfound=true;
      }else if($d1a[0]=="llun2"){
        $DLlun2=explode("/", $d1a[1]);
        $bfound=true;
      }else if($d1a[0]=="llun3"){
        $DLlun3=explode("/", $d1a[1]);
        $bfound=true;
      }else if($d1a[0]=="llun4"){
        $DLlun4=explode("/", $d1a[1]);
        $bfound=true;
      }else if(preg_match("/^([0-9]+)\)/", $d1a[0])){
//echo "<3___________________________".$d1a[1]."\n";
        $d1b = explode(")", $d1a[0]);
        $d1b[1] = preg_replace("/ /", "_", trim($d1b[1]));
        $d1b[0] = (int)$d1b[0];

        if(substr($ll1a,0,1)=="`")
          $LlGeiriau .= strtolower(trim($d1b[1])). "/". strtolower(trim($d1a[1] )). "\n";

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
     

        $bfound=true;
      }else if($d1a[0]=="ffeil"){
        $LlFfeilPrev=$LlFfeil;
        $LlFfeil=$d1a[1];
        $bfound=true;
 		 }
	 if($bfound == true) return "found!";
	 else return "";
}//endfunc
//---------------------------------------
function htmlfmtsetsections($outstr){
global $LlCwrs;
global $LlGwers;
global $LlTeitl;
global $LlCyfarwyddo;
global $LlFfram;

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


return $LlHtmlBrig. $LlHtmlPenniad. $outstr. $LlHtmlGwaelod;

}//endfunc
//---------------------------------------
//---------------------------------------
//---------------------------------------
//---------------------------------------
//---------------------------------------
//---------------------------------------
//---------------------------------------
//---------------------------------------
//---------------------------------------
//---------------------------------------

?>
