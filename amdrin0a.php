#!/usr/bin/php
<?php
$DGeirfa = array();

foreach(explode("\n", file_get_contents("../geirfa.txt")) as $ll1a){
  $d1a = explode("\t", $ll1a);
  if(!isset($d1a[2])) continue;
  $d1a[0] = preg_replace("/ /", "_", strtolower($d1a[0]) );
  $d1a[2] = preg_replace("/ /", "_", strtolower($d1a[2]) );
  if(!isset($DGeirfa[$d1a[0]])){
    $DGeirfa[$d1a[0]] = $d1a[2]."~".$d1a[1];
  }else {
    $DGeirfa[$d1a[0]] .= "/". $d1a[2]."~".$d1a[1];
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
foreach($DFfeil as $ll1a){
  if(substr($ll1a,0,10)=="%YMADAEL!!"){ break; }

  if(substr($ll1a,0,1)=="%"){
//echo $ll1a."\n";
    
    if(substr($ll1a,0,7)=="%ffeil="){
     //echo $ll1a."\n";
     //echo "_________________________________\n";
      $LlRhestr="";
      $LlNewydd="";
    }
    if(preg_match("/=/", $ll1a)) continue;

    $ll1a = preg_replace("/([a-zA-Z\^`'\-_]+)([^a-zA-Z\^`'\-_]+)/", "$1 $2", $ll1a);
    $ll1a = preg_replace("/([^a-zA-Z\^`'\-_]+)([a-zA-Z\^`'\-_]+)/", "$1 $2", $ll1a);

    $d1a = explode(" ", substr($ll1a,1));
    foreach($d1a as $ll1b){
      //if(substr(strrev($ll1b),0,1) == "`"){
        /*
        $ll2a = strtolower(strrev(substr(strrev($ll1b),1)));
    
        if(isset($DGeiriau[$ll2a] )){
          $LlRhestr.=$ll2a."xxx(".$DGeiriau[$ll2a] .") ";
          //$LlRhestr.=$ll2a."xxx ";
          //die("**********\nGWALL! Mae'r gair '". $ll2a. "(". $DSaesneg[$ll2a].")' wedi'i gael ei ddefnyddio!\n**********\n");
        }else { */
          $LlRhestr.=strtolower(trim($ll1b) )." ";
        //}
      /*
      }else {
        if(!isset($DGeiriau[strtolower($ll1b)])){
          if(preg_match("/[a-zA-Z\^'\-_]/", strtolower($ll1b) )){
            $LlNewydd .= strtolower($ll1b). " ";
          }
        }
      }*/
    }//dforeach

  }//dif

}//dforeach

//echo $LlRhestr; 
//-------------------------------
$DRhestr= explode(" ", trim($LlRhestr));
sort($DRhestr);
$DRhestr = array_unique($DRhestr);
//print_r($DRhestr);

$CyRhif=0;
echo "*** ".$LlNewydd." ***\n";
foreach($DRhestr as $ll1a){
  $ll1a = trim(strtolower($ll1a));
  if($ll1a == "") continue;
  $CyRhif++;
  //echo $ll1a."\n";
 
  if(!isset($DGeirfa[$ll1a])){
    if(preg_match("/xxx/", $ll1a)){
      //echo "**********\nGWALL! nid ydy'r gair Cymraeg ar gyfer '". $ll1a. "' yn bodoli yn geirfa.txt!\n**********\n";
      $d2b = explode("xxx", $ll1a);
      $ll1a = $d2b[0];
      echo "**********\nNODWCH! mae'r gair Saesneg (". $d2b[0]. ") wedi'i ddefnyddiwyd o'r blaen gyda'r gair Cymraeg ". $d2b[1]. "!\n**********\n";
    }else {
      die("**********\nGWALL! nid ydy'r gair Cymraeg ar gyfer '". $ll1a. "' yn bodoli yn geirfa.txt!\n**********\n");
    }
  }

  if(preg_match("/xxx/", $ll1a)){
    $ll1a = preg_replace("/xxx/", "", $ll1a);
    echo "&".$CyRhif.") !!!". $DSaesneg[$ll1a]. " = ". $ll1a."\n";
  }else {
    echo "&".$CyRhif.") ". $DGeirfa[$ll1a]. " = ". $ll1a."\n";
  }
}//dforeach
//-------------------------------

?>
