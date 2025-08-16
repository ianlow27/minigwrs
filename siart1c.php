#!/usr/bin/php
<?php

$Ll18="";
$Rh18=18;
$Rh18=6;
$LlCy18="";
$LlEn18="";
$LlGwers="";
$RhRhesi=0;
$RhDydd=0;
$LlTeitl="";
$LlNodwch="";
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
$DFfeil = explode("\n", file_get_contents("./testun"));
$LlGeiriau="";
$BSylweb = 0;
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
  $ll1a = preg_replace("/([a-zA-Z]{1,1})`([a-zA-Z]{1,1})/", "$1xxxxx$2", $ll1a);
  $ll1a = preg_replace("/([a-zA-Z]{1,1})%([a-zA-Z]{1,1})/", "$1xxyxx$2", $ll1a);
  //----------------------------------------------
  if(  (substr($ll1a,0,1)=="`")
     ||(substr($ll1a,0,1)=="|")  ){

    if(!preg_match("/=/", $ll1a)){
      if(substr($ll1a,0,1) =="|" ){
        $LlEn .= "<p>".  $ll1a."</p>";
      }
    }else {
      $d1a = explode("=", substr($ll1a,1));
      $d1a[0] = trim($d1a[0]);
      $d1a[1] = trim($d1a[1]); 
      if      ($d1a[0]=="gwers"){
        $LlGwers=preg_replace("/\//", "<br/>", $d1a[1]);
      }else if($d1a[0]=="teitl"){
        $LlTeitl=$d1a[1];
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
      }else if($d1a[0]=="llun1"){
        $DLlun1=explode("/", $d1a[1]);
      }else if($d1a[0]=="llun2"){
        $DLlun2=explode("/", $d1a[1]);
      }else if($d1a[0]=="llun3"){
        $DLlun3=explode("/", $d1a[1]);
      }else if($d1a[0]=="llun4"){
        $DLlun4=explode("/", $d1a[1]);
      }else if(preg_match("/^([0-9]+)\)/", $d1a[0])){
        $d1b = explode(")", $d1a[0]);
        $d1b[1] = preg_replace("/ /", "_", trim($d1b[1]));
        $d1b[0] = (int)$d1b[0];

        if(!preg_match("/gwers00([125]{1,1})/", $LlFfeil)){
          if(substr($ll1a,0,1)=="`")
            $LlGeiriau .= strtolower(trim($d1b[1])). "/". strtolower(trim($d1a[1] )). "\n";
        }

        $d1b[1] = acenau($d1b[1]);

        if      ( (($d1b[0] % 7) == 1) && (!preg_match("/Alphabet/", $LlTeitl)) ){
            $LlCy .= ucfirst(trim($d1b[1])). " ";
            $LlEn .= ucfirst(trim($d1a[1])). " ";
        }else if((($d1b[0] % 7) == 5) && (!preg_match("/Alphabet/", $LlTeitl) ) ){
            $LlCy .= ucfirst(trim($d1b[1])). " ";
            $LlEn .= ucfirst(trim($d1a[1])). " ";
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
      }else if(substr($ll1a,1,5) == "====="){
        //-----------------------------------------------------
        $llAtalnod=",";
        $llCromfach="(";
        if(substr($ll1a,0,1) =="|"){
          $llAtalnod="";
          $LlEn = preg_replace("/([a-zA-Z_\-\[\]\^´']+)`/", "<b><em>$1</em></b>", $LlEn);

          $LlEn = preg_replace("/([\|%]{1,1})/", "", $LlEn);
          $LlEn = preg_replace("/\]/", "</u>", $LlEn);
          /*
          m t a h c d n
          */
          $LlEn = preg_replace("/m\[(\"*)(f)[bm]/i", "<u style='background-color:#ff0;color:#e00;' >$1$2", $LlEn); //meddal
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
        $LlCy = preg_replace("/ \/\/\//", ".<br/>", $LlCy);
        $LlCy = preg_replace("/ \/\//",   $llAtalnod."<br/>", $LlCy);
        $LlCy = preg_replace("/ \//",     $llAtalnod."<br/> &emsp; ", $LlCy);
        $LlEn = $llCromfach. preg_replace("/ \/\/\//", ".)<br/>", $LlEn);
        $LlEn = preg_replace("/ \/\//",   $llAtalnod."<br/>", $LlEn);
        $LlEn = preg_replace("/ \//",     $llAtalnod."<br/> &emsp; ", $LlEn);
        $LlNodwch = preg_replace("/\//",     "<br/>", $LlNodwch);
        //-----------------------------------------------------
$DEn = preg_split("/<p>/", $LlEn);
// print_r($DEn);
//---------------------------------
//---------------------------------
//---------------------------------
//---------------------------------
//---------------------------------
if(count($DEn)>=2){
  //---------------------------------
  $DEn[1] = ' <img src="./'. $DLlun3[0]. '.png" style="margin-top:'. $DLlun3[2] .'px;float:right;width:'.$DLlun3[1]. 'px; left:'. $DLlun3[2]. 'px;top:'.$DLlun3[3].'px;" />'
   .
   $DEn[1]
   ;
  //---------------------------------
  $DEn[count($DEn)-(int)($DLlun4[3])] = ' <img src="./'. $DLlun4[0]. '.png" style="margin-top:'. $DLlun4[2] .'px;float:right;width:'.$DLlun4[1]. 'px;left:'. $DLlun4[2]. 'px;xxtop:'.$DLlun4[3].'px;" />'
   .
   (  
     isset($DEn[(count($DEn)-(int)$DLlun4[3])] )
     ?
     $DEn[(count($DEn)-(int)$DLlun4[3])] 
     :
     ""
   )
   ;
  $LlEn = "";
  $cRhif1=0;
  foreach($DEn as $l2a){
    if($cRhif1)
    $LlEn .= "<p>". $l2a."\n";
    $cRhif1++;
  }//dforeach
}
//---------------------------------
//---------------------------------
//---------------------------------
//---------------------------------
//---------------------------------
$LlFfram = "ffram-glas1";
if      (substr(strrev($LlFfeil),0,1)=="b"){
  $LlFfram = "ffram-oren1";
}else if(substr(strrev($LlFfeil),0,1)=="c"){
  $LlFfram = "ffram-gwyrdd1";
}else if(substr(strrev($LlFfeil),0,1)=="e"){
  $LlFfram = "ffram-gwyrdd1";
}
//============================================================
//============================================================
//============================================================
//============================================================
//============================================================
//============================================================
//============================================================
//============================================================
if(preg_match("/^Vocab Stanza/", $LlTeitl)){
  $dTeitl=preg_split("/[\/ ]/",  $LlTeitl);
  $rhRhes = (int) $dTeitl[2];
  echo sprintf("%03d", $dTeitl[2])."\n";
  if(!(($rhRhes-1) % 3)){
    $RhDydd++;
    if($RhDydd == 1) $Ll18 .= '<tr><td><div class="clDydd">Llun</div></td>';
    if($RhDydd == 2) $Ll18 .= "<tr><td><div class='clDydd'>Mawrth ".  "</div></td>";
    if($RhDydd == 3) $Ll18 .= "<tr><td><div class='clDydd'>Mercher ". "</div></td>";
    if($RhDydd == 4) $Ll18 .= "<tr><td><div class='clDydd'>Iau ".     "</div></td>";
    if($RhDydd == 5) $Ll18 .= "<tr><td><div class='clDydd'>Gwener ".  "</div></td>";
    if($RhDydd == 6) $Ll18 .= "<tr><td><div class='clDydd'>Sadwrn ".  "</div></td>";
  }

  $Ll18 .= "<td><table border=0 style='width:100%;margin-top:-5px;'><tr><td style='vertical-align:bottom;'><b>Pennill ". $rhRhes."</b></td><td style='font-size:110%;text-align:right;vertical-align:bottom;'>☐ ☐ ☐ ☐ ☐ &emsp;&emsp;&emsp;</td></tr></table>\n".

           "<pre class='pre-cy'>". $LlCy."</pre>\n".
           "<pre class='pre-en'>".$LlEn."</pre>\n</td>";

  if(!(($rhRhes+0) % 3)){
    $Ll18 .= "</tr>\n\n";
  }


  if(!($rhRhes % $Rh18)){
    $RhRhesi++;
    echo sprintf("%02d",$RhRhesi)."/32___________________________\n";
    file_put_contents("./siart". sprintf("%02d", $RhRhesi ). ".html", '<!DOCTYPE html><html><head>
      <style>
      .clDydd {font-weight:bold;font-size:150%;margin-top:-10px;text-align:left;transform:rotate(-90deg) translateX(-90px);}
      .clPeniad {font-weight:bold;font-size:150%;text-align:center;}
      td {vertical-align:top;}
      th {text-align:left;}
      pre {font-family:Arial;margin-top:2px;}
      .pre-en {font-size:60%;margin-top:-8px;}
      .pre-cy {font-size:90%;margin-top:2px;}
      </style>
      </head>
      <body style="font-size:72%;font-family:Arial;">
      <div class="clPeniad">Beginner-1 Sylfaenol &ensp;-&ensp; Wythnos '. $RhRhesi .' o 32 &ensp;-&ensp; Learn Welsh Rhagori yn Gymraeg</div>
      <table border=0 border-color=blue cellspacing=1 style="width:100%;">
      <tr><th style="width:1%;"></th> <th>B R E C W A S T</th> <th>C I N I O</th> <th>S W P E R</th> </tr>
      '.
      $Ll18
      .'
      <!-- tr><td>Sul:</td> <td></td> <td></td> <td></td> </tr --></table>
      </body>
      </html>'
    );
    $Ll18 = "";
    $RhDydd = 0;
  }
}
//============================================================
/*
file_put_contents("./". $LlFfeil. ".html", '<!DOCTYPE html><html><head>
i<style>
p {text-indent:-20px;padding-left:20px;margin-top:-18px;}
</style>
</head>
<body style="font-family:Arial;">
'.
(
  (substr($ll1a,0,1)=="|xxxx")
    ? ""
    : '
<img src="./'. $DLlun1[0]. '.png" style="position:absolute;width:'.$DLlun1[1]. 'px; left:'. $DLlun1[2]. 'px; top:'.$DLlun1[3].'px;" />
<img src="./'. $DLlun2[0]. '.png" style="position:absolute;width:'.$DLlun2[1]. 'px; left:'. $DLlun2[2]. 'px; top:'.$DLlun2[3].'px;" />

      '
)
//-------------------------
.'<div style="background-image:url(./'. $LlFfram.'.png);width:600px;height:600px;background-size:contain;border:1px solid blue;">

<div style="text-align:center;font-weight:bold;font-size:160%;color:#00f;font-style:italic;margin-top:10px;">'. $LlGwers. '</div>

<div style="text-align:center;font-weight:bold;font-size:120%;color:#0a0;font-style:italic;margin-top:0px;margin-bottom:5px;">'. preg_replace("/\//", "<br/>", $LlTeitl). '</div>

<table width=100% border=0 style="'.
(($LlLledYmylCy!="")?("margin-left:".$LlLledYmylCy."px;"):"")
.'" >
<tr>
<td width=5%>
</td>
<td width=90% style="font-size:'. 
( ($LlMaintCy != "") ? $LlMaintCy : "160" )
.'%;font-weight:bold;" ><nobr> '. $LlCy. ' </nobr> </td>
<td width=5%>
</td>
</tr>
</table> '.
//-------------------------
'
<table width=100% border=0 style="max-height:200px;'.
(($LlLledYmylEn!="")?("margin-left:".$LlLledYmylEn."px;"):"")
.'" >
<tr style="max-height:200px;">
<td width=5%>
</td>
<td width=90% style="font-size:'. 
( ($LlMaintEn != "") ? $LlMaintEn : "110" )
.'%;font-weightxx:bold;" >'.
$LlEn. 
' </td>
<td width=5%>
</td>
</tr>
</table>'.
//-------------------------
' <table width=100% border=0 style="margin-top:-15px;" >
<tr>
<td width=49%>
</td>
<td width=2% style="font-size:88%;">'.
(
   ($LlNodwch != "")
      ? '<b>Note:</b>'
      : ''
)
.'<br/><nobr> '. preg_replace("/\|/", "/", $LlNodwch). ' </nobr> </td>
<td width=49%>
</td>
</tr>
</table>

</div>

</body>
</html>
');
*/
//============================================================
//============================================================
//============================================================
//============================================================
//============================================================
//============================================================
        //-----------------------------------------------------
        // file_put_contents("./geiriau.txt", $LlGeiriau);
        //-----------------------------------------------------
        //-----------------------------------------------------
$LlGwers="";
$LlTeitl="";
$LlNodwch="";
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
    }//dif if(!preg_match("/=/", $ll1a)){
    
  //----------------------------------------------
  //----------------------------------------------
  //----------------------------------------------
  //----------------------------------------------
  //----------------------------------------------
  //----------------------------------------------
  }//dif 

}//dforeach


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
  $pstr = preg_replace("/exxxxx/",  "è", $pstr);
  $pstr = preg_replace("/ixxyxx/",  "ï", $pstr);
  $pstr = preg_replace("/oxxyxx/",  "ö", $pstr);
    
return $pstr;
}//dfunc



?>
