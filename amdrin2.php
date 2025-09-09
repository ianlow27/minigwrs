#!/usr/bin/php
<?php
$LlTestun="testun";
if(isset($argv[1])) $LlTestun = $argv[1];
echo "y ffeil hwn: ". $LlTestun;

include "../htmlfmt.php";

$cyRhif=0;
$DFfeil = explode("\n", file_get_contents("./". $LlTestun));
$LlGeiriau="";
$BSylweb = 0;
$cynllinell="";
$lorigtxt="";
foreach($DFfeil as $ll1a){
  $ll1a = trim($ll1a);
  if(substr($ll1a,0,2)=="/*"){ $BSylweb = 1; }
  if(substr($ll1a,0,2)=="*/"){ $BSylweb = 0;  continue; }
  if($BSylweb) continue;

  if((mb_substr($ll1a,0,1)=="|") &&
     (mb_substr($ll1a,0,6)!="|=====") ){
    $lorigtxt .= $ll1a."\n";
  }

  if(substr($ll1a,0,10)=="|YMADAEL!!"){ break; }

  if(substr($ll1a,0,7)=="|ffeil="){
    $lorigtxt="";
    $LlGeiriau="";
    $lsettings1=mb_substr($ll1a,1);
    htmlfmtsettings($lsettings1);
  }

  if(substr($ll1a,0,7)=="***^a2>"){
    $lsettings1=mb_substr($ll1a,7);
    htmlfmtsettings($lsettings1);
  }

  if(substr($ll1a,0,1)=="!"){
//echo "_____".$ll1a."\n";
    $d1a = preg_split("/[\)=]/", $ll1a);
    $d1b = explode("/", $d1a[1]);
    $llGair="";
    foreach($d1b as $ll1b){
      $ll1b = trim($ll1b);
      $llGair=preg_replace("/`/", "", $ll1b) ;
      if(substr(strrev($ll1b),0,1)=="`"){
        break;
      }
    }//dforeach
    if($llGair == ""){
       echo $cynllinell. "\r\n";
       die("GWALL!! Diffyg o arwyddnod '`' yn '".$ll1a."'. ");
    }
    $cyRhif++;
    $dGair = explode("~", $llGair);
    //echo "`". $cyRhif. ") ". $dGair[0]. " = ".  $d1a[2]."~".$dGair[1]."\n";
    $LlGeiriau .= $dGair[0]. " = ".  $d1a[2]."~".$dGair[1]."\n";
  }//dif

  $cynllinell=$ll1a;
}//dforeach

//--------------------------
$moduleNum= mb_substr($LlFfeil,6,3);
//--------------------------
$DGeiriau = explode("\n", $LlGeiriau);
if(mb_substr($LlFfeil,6,3)!="001") sort($DGeiriau); // DO NOT SORT EGWYDDOR IN MODIWL001!!
$cyRhif=0;
$lvocablist = "";
foreach($DGeiriau as $ll1a){
  if(trim($ll1a)=="") continue;
  $cyRhif++;
  $lvocablist .= "`". $cyRhif. ") ". $ll1a."\n";
  $atmp1 = explode("=", trim($ll1a));
  $atmp1[0] = trim($atmp1[0]);
  $atmp1b = explode("~", trim($atmp1[1]));
  $atmp1b[0] = trim($atmp1b[0]);
  $lorigtxt = preg_replace("/".$atmp1b[0]."`/i",
                            $atmp1[0]."`", $lorigtxt);

  $search = $atmp1b[0]."`"; //'string';
  $replace = $atmp1[0]."`"; //'thread';
  $pattern = "/\b" . preg_quote($search, '/') . "/i";
  $lorigtxt = preg_replace_callback(
      $pattern,
      function ($matches) use ($search, $replace) {
          $match = $matches[0];
echo "\n>>>>1___". $match;
          if (ctype_upper($match)) {
echo "\n>>>>2___". $match;
              return strtoupper($replace);
          } elseif (ctype_lower($match)) {
echo "\n>>>>3___". $match;
              return strtolower($replace);
          } elseif (ucfirst(strtolower($match)) === $match) {
echo "\n>>>>4___". $match;
              return ucfirst($replace);
          } else {
echo "\n>>>>5___". $match;
              return $replace;
          }
      },
      $lorigtxt
  );


}//dforeach
//--------------------------
echo '
|===================================
|ffeil=modiwl'. $moduleNum . '-4b
|modiwl='. $LlGwers .'
|teitl='. $LlTeitl .'
'. $lorigtxt. '|========================================';
//--------------------------
echo  '
=====================================================
`ffeil=modiwl'. $moduleNum . '-2
`modiwl='. $LlGwers .'
`teitl='. $LlTeitl .'
';


echo $lvocablist;


echo '`nodwch=1)
`nodwch=2)
`nodwch=3)
`maintcy=135
`llun1=grammadeg1/170/425/45
`llun2=cenhinen/80/503/390
`llun3=gwacter/1/3/7
`llun4=gwacter/80/495/325
`===========
';
?>
