<?php
//------------------------------------------------------
//------------------------------------------------------
//------------------------------------------------------
//------------------------------------------------------
//------------------------------------------------------
function acenau($pstr){
  $pstr = preg_replace("/a\^/", "â", $pstr);
  $pstr = preg_replace("/e\^/", "ê", $pstr);
  $pstr = preg_replace("/i\^/", "î", $pstr);
  $pstr = preg_replace("/o\^/", "ô", $pstr);
  $pstr = preg_replace("/u\^/", "û", $pstr);
  $pstr = preg_replace("/w\^/", "ŵ", $pstr);
  $pstr = preg_replace("/W\^/", "Ŵ", $pstr);
  $pstr = preg_replace("/y\^/", "ŷ", $pstr);
  $pstr = preg_replace("/a´/",  "á", $pstr);
  $pstr = preg_replace("/A´/",  "Á", $pstr);
  $pstr = preg_replace("/yxxxxx/",  "ỳ", $pstr);
  $pstr = preg_replace("/axxxxx/",  "à", $pstr);
  $pstr = preg_replace("/axxyxx/",  "ä", $pstr);
  //$pstr = preg_replace("/exxxxx/",  "è", $pstr);
  $pstr = preg_replace("/exxxxx/",  "ë", $pstr);
  $pstr = preg_replace("/ixxyxx/",  "ï", $pstr);
  $pstr = preg_replace("/Ixxyxx/",  "Ï", $pstr);
  $pstr = preg_replace("/oxxyxx/",  "ö", $pstr);
  $pstr = preg_replace("/Oxxyxx/",  "Ö", $pstr);
return $pstr;
}//dfunc
//------------------------------------------------------
//------------------------------------------------------
//------------------------------------------------------
//------------------------------------------------------
function datdreiglo($p1a){
$p1a = strtolower($p1a);
$ll1a = substr($p1a,0,1);
$d1a = preg_split("/([\\[\\]]{1,1})/", $p1a);
  if(count($d1a) != 3){
    return $p1a;
  }else if($ll1a == "["){
    die("\nGWALL 005!!! Mae'r gair '". $p1a. "' yn diffygio  y llytheren m, a, t, c, d, neu n tu flaen i'r arwyddnod '['.\n");
  }else {
    //echo $d1a[0]."__". $d1a[1]. "___". $d1a[2]."\n";

$llDyfynnod="";
$llDychweliad=$p1a;
if(preg_match("/xxzzxx/", $d1a[1]) ){
  $d1a[1] = preg_replace("/xxzzxx/", "", $d1a[1]);
  $llDyfynnod='"';
} //die( "____".$d1a[1]."__".$p1a." \n");

    if      ($d1a[0] == "m"){
      if      ($d1a[1] == "g"){  $llDychweliad= "c".$d1a[2];
      }else if($d1a[1] == "b"){  $llDychweliad= "p".$d1a[2];
      }else if($d1a[1] == "d"){  $llDychweliad= "t".$d1a[2];
      }else if($d1a[1] == "f"){  $llDychweliad= "b".$d1a[2];
      }else if($d1a[1] == "fb"){ $llDychweliad= "b".$d1a[2];
      }else if($d1a[1] == "fm"){ $llDychweliad= "m".$d1a[2];
      }else if($d1a[1] == "dd"){ $llDychweliad= "d".$d1a[2];
      }else if($d1a[1] == "l"){  $llDychweliad= "ll".$d1a[2];
      }else if($d1a[1] == "r"){  $llDychweliad= "rh".$d1a[2];
      }else {                    $llDychweliad= "g".$d1a[1].$d1a[2];
      }
    }else if($d1a[0] == "a"){
      if      ($d1a[1] == "ch"){  $llDychweliad= "c".$d1a[2];
      }else if($d1a[1] == "ph"){  $llDychweliad= "p".$d1a[2];
      }else if($d1a[1] == "th"){  $llDychweliad= "t".$d1a[2];
      }else {                     $llDychweliad= $d1a[1].$d1a[2];
      }
    }else if($d1a[0] == "t"){
      if      ($d1a[1] == "ngh"){ $llDychweliad= "c".$d1a[2];
      }else if($d1a[1] == "mh"){  $llDychweliad= "p".$d1a[2];
      }else if($d1a[1] == "nh"){  $llDychweliad= "t".$d1a[2];
      }else if($d1a[1] == "ng"){  $llDychweliad= "g".$d1a[2];
      }else if($d1a[1] == "m"){   $llDychweliad= "b".$d1a[2];
      }else if($d1a[1] == "n"){   $llDychweliad= "d".$d1a[2];
      }else { $llDychweliad= $d1a[1].$d1a[2];
      }
    }else if($d1a[0] == "h"){
      $llDychweliad= "".$d1a[2];
    }else if($d1a[0] == "c"){
      if      ($d1a[1] == "ch"){  $llDychweliad= "c".$d1a[2];
      }else if($d1a[1] == "chg"){ $llDychweliad= "g".$d1a[2];
      }else if($d1a[1] == "ph"){  $llDychweliad= "p".$d1a[2];
      }else if($d1a[1] == "th"){  $llDychweliad= "t".$d1a[2];
      }else if($d1a[1] == "f"){  $llDychweliad= "b".$d1a[2];
      }else if($d1a[1] == "fb"){ $llDychweliad= "b".$d1a[2];
      }else if($d1a[1] == "fm"){ $llDychweliad= "m".$d1a[2];
      }else if($d1a[1] == "dd"){ $llDychweliad= "d".$d1a[2];
      }else if($d1a[1] == "l"){  $llDychweliad= "ll".$d1a[2];
      }else if($d1a[1] == "r"){  $llDychweliad= "r".$d1a[2];
      }else {                    $llDychweliad= "g".$d1a[1].$d1a[2];
      }
    }else {
      $llDychweliad= $d1a[1].$d1a[2];
    }

  }
  $llDyfynnod = "";
  return $llDyfynnod . $llDychweliad;

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
function ffurfweddu($pstr){
$pstr = preg_replace("/\{lnkb:/", "<span style='font-weight:bold;color:blue;xxtext-decoration:underline;'>", $pstr);

$pstr = preg_replace("/:\}/", "</span>", $pstr);
$pstr = preg_replace("/\{lnk:/", "<span style='color:blue;xxtext-decoration:underline;'>", $pstr);
$pstr = preg_replace("/:\}/", "</span>", $pstr);

$pstr = preg_replace("/\{\*/", "<b>", $pstr);
$pstr = preg_replace("/\*\}/", "</b>", $pstr);

$pstr = preg_replace("/\{\/\}/", "<br>", $pstr);
$pstr = preg_replace("/\{\/\/\}/", "<br><br>", $pstr);


return $pstr;
}//dfunc
//------------------------------------------------------
//------------------------------------------------------

?>
