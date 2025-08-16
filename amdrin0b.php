#!/usr/bin/php
<?php
$DGeirfa = array();

foreach(explode("\n", file_get_contents("../geirfa.txt")) as $ll1a){
  $d1a = explode("\t", $ll1a);
  if(!isset($d1a[2])) continue;
  $d1a[0] = preg_replace("/ /", "_", strtolower($d1a[0]) );
  $d1a[2] = preg_replace("/ /", "_", strtolower($d1a[2]) );
  if(!isset($DGeirfa[$d1a[2]])){
    $DGeirfa[$d1a[2]] = $d1a[0]."~".$d1a[1];
  }else {
    $DGeirfa[$d1a[2]] .= "/". $d1a[0]."~".$d1a[1];
  }
}//dforeach
//echo count($DGeirfa);
//---------------------
$DGeiriau = array();
$DSaesneg = array();
foreach(explode(" ", file_get_contents("./geiriau.txt")) as $ll1a){
  if( trim($ll1a) == "") continue;
  $d1a = explode("/", trim($ll1a) );
  if(!isset($d1a[1])) continue;
  $DGeiriau[$d1a[0]] = $d1a[1];
  $d1b = explode("~", $d1a[1]);
  $DSaesneg[$d1b[0]] = $d1a[0];
}
//---------------------
$DFfeil = explode("\n", file_get_contents("./testun"));
$LlRhestr="";
$LlNewydd="";
//print_r($DGeiriau);
//print_r($DSaesneg);
$LlGeiriau="";
$cyRhif=0;
$DLlGeiriau=array();
$DRhifau=array();
$LlTestun="";
foreach($DFfeil as $ll1a){
  if(substr($ll1a,0,10)=="&YMADAEL!!"){ break; }

  if(substr($ll1a,0,7)=="&ffeil="){
    $LlGeiriau="";
  }

  //-------------------------------------------------------------------
  //-------------------------------------------------------------------
  //-------------------------------------------------------------------
  //-------------------------------------------------------------------
  //-------------------------------------------------------------------
  if(substr($ll1a,0,1)=="&"){
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
    //echo $llGair."___\n";
    if($llGair == "") die("GWAL!! Diffyg o arwyddnod '`' yn '".$ll1a."'. ");
    $cyRhif++;
    $dGair = explode("~", $llGair);
    //echo "`". $cyRhif. ") ". $dGair[0]. " = ".  $d1a[2]."~".$dGair[1]."\n";
    $LlGeiriau .= $dGair[0]. " = ".  $d1a[2]."~".$dGair[1]."\n";
    if(!isset($DLlGeiriau[$dGair[0]])){
      $DLlGeiriau[$dGair[0]] = trim($d1a[2])."~".trim($dGair[1]);
    }else {
      $DLlGeiriau[$dGair[0]] .= "/".trim($d1a[2])."~".trim($dGair[1]);
    }//dif


    $cy1a = substr($d1a[0],1);
    //echo "____>>>".$cy1a;
    if(!isset($DRhifau[$cy1a])){
      $DRhifau[$cy1a] = trim($d1a[2])."~".trim($dGair[0])."~".trim($dGair[1]);
    }else {
      $DRhifau[$cy1a] .= "/".trim($d1a[2])."~".trim($dGair[0])."~".trim($dGair[1]);
    }//dif
  //-------------------------------------------------------------------
  }else  if(substr($ll1a,0,1)=="^"){
//echo $ll1a."\n";
    
    if(substr($ll1a,0,7)=="^ffeil="){
     //echo $ll1a."\n";
     //echo "_________________________________\n";
      $LlTestun="";
      $LlRhestr="";
      $LlNewydd="";
    }else {
      $LlTestun .="|". substr($ll1a,1)."\n";
    }

    if(preg_match("/=/", $ll1a)) continue;

    $ll1a = preg_replace("/([0-9\^`'\-_]+)([^0-9\^`'\-_]+)/", "$1 $2", $ll1a);
    $ll1a = preg_replace("/([^0-9\^`'\-_]+)([0-9\^`'\-_]+)/", "$1 $2", $ll1a);

    $d1a = explode(" ", substr($ll1a,1));
    foreach($d1a as $ll1b){
      if(substr(strrev($ll1b),0,1) == "`"){
        $ll2a = strtolower(strrev(substr(strrev($ll1b),1)));
    
        //echo $ll2a."\n";
        if(isset($Rhifau[$ll2a] )){
          $LlRhestr.=$ll2a."xxx(".$DRhifau[$ll2a] .") ";
        }else {
          $LlRhestr.=strtolower(strrev(substr(strrev($ll1b),1)))." ";
        }
      }else {
        if(!isset($DGeiriau[strtolower($ll1b)])){
          if(preg_match("/[a-zA-Z\^'\-_]/", strtolower($ll1b) )){
            $LlNewydd .= strtolower($ll1b). " ";
          }
        }
      }
    }//dforeach

  }//dif

}//dforeach

//echo $LlGeiriau; die();
//echo $LlRhestr; //die();
//-------------------------------
$DRhestr= explode(" ",$LlRhestr);
sort($DRhestr);
$DRhestr = array_unique($DRhestr);
//print_r($DRhestr);
//print_r($DRhifau);

echo "*** ".$LlNewydd." ***\n";
$LlTestunA = $LlTestun;
$LlTestunC = $LlTestun;

echo "`ffeil=gwersxxxb\n";
foreach($DRhestr as $ll1a){
  $ll1a = trim(strtolower($ll1a));
  if($ll1a == "") continue;
  //echo $ll1a."\n";
  $d5a = explode("~", $DRhifau[$ll1a]);
  echo "`".$ll1a.") ". $d5a[0]. " = ". $d5a[1]."~".$d5a[2]."\n";
  $LlTestunA = preg_replace("/\b".$ll1a."`/", $d5a[1]."`", $LlTestunA);
  $LlTestunC = preg_replace("/\b".$ll1a."`/", $d5a[0]."`", $LlTestunC);
  //}
}//dforeach
echo "`============================\n\n";
//-------------------------------
echo "|ffeil=gwersxxxa\n";
echo $LlTestunA."";
echo "|============================\n\n";
echo "|ffeil=gwersxxxc\n";
echo $LlTestunC."";
echo "|============================\n\n";


?>
