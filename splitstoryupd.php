<?php

$DSaesneg = json_decode(file_get_contents('./dsaesneg.json'), true);

//echo $DSaesneg["hair"];
//die();
$outstr="";
foreach (explode("\n", file_get_contents('./ssuin.txt')) as $line){
  $line = preg_replace("/([^A-Za-z\'_\-]+)/u", " $1", $line);
  $line = preg_replace("/ '/u", " ' ", $line);
  $lnout="";
  foreach (explode(" ", $line) as $word){
    if($lnout!="") $lnout.=" ";
    if(isset($DSaesneg[strToLower($word)])){
      $lnout .= $DSaesneg[strToLower($word)]. "_";
    }else {
//echo "[".$word."]";
      $lnout .=  $word. "";
    }
  }//endforeach
  $lnout = preg_replace("/ ([\,\.\?;:!])/u", "$1", $lnout);
  $lnout = preg_replace("/ \' /u", " '", $lnout);
  $lnout = preg_replace("/ +/u", " ", $lnout);
  $lnout = preg_replace("/ +/u", " ", $lnout);
  $outstr .= trim($lnout). "\n";
}//endforeach

file_put_contents('./ssuout.txt', $outstr);

?>
