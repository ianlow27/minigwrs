#!/usr/bin/php
<?php



$LlTestun="testun";
if(isset($argv[1])) $LlTestun = $argv[1];
echo $LlTestun;
sleep(1);
//$cwrs =  "./". $LlTestun. "_cwrs";
//if (file_exists( $cwrs)) {
//    echo "The directory $cwrs exists.";
//} else {
//    mkdir( $cwrs, 0755);
//    echo "The directory $cwrs was successfully created.";
//}
unlink('./geiriau.txt');
//============================================
include "../cyutils.php";
include "../htmlfmt.php";
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
//============================================
$outstr = "<!DOCTYPE><html><body>";
$lswords="";
foreach(explode("\n", file_get_contents("./". $LlTestun)) as $line){
	if((mb_substr($line, 0, 1)=="|") 
	 ||(mb_substr($line, 0, 1)=="`")
	 ||(mb_substr($line, 0, 1)=="¬")){
	  $char1 = mb_substr($line, 0, 1);





		$line = mb_substr($line, 1);
		//echo "____". $line. "\n";
		$line = preg_replace("/([!?,\.;:])/", " $1", $line);


    if(substr($line, 1, 4) == "===="){
      //$outstr .= "</body></html>";
      //echo $outstr;
			$outstr = preg_replace("/\n/", "<br>", $outstr);
			$outstr = acenau($outstr);
			$outstr = ffurfweddu(setHtmlFmt($outstr));
      file_put_contents("./". $LlFfeil. ".html", $outstr);
			$outstr = "";
		}else if(substr($line, 1, 4) == "----"){
       //$outstr .= $lswords."\n";
			 $atmp1 = (explode(" ",strtolower($lswords)));
			 shuffle($atmp1);
			 $listwrds = "";
			 foreach($atmp1 as $tmp1){
					if(trim($tmp1)=="") continue;
					if($listwrds != "") $listwrds .= " / ";

          $listwrds .= $tmp1. "";
       }
       if($listwrds != "")
         $outstr .= "{lnkb:( ". $listwrds . " ):}";
			 $outstr .="<hr>"; //\n---------------------------\n";
       $lswords="";
  	}else if(htmlfmtsettings($line) == ""){

			$lnout = parsewords($line, $char1);
      $outstr .= $lnout."\n";
  
    }
	}

}//endforeach



function parsewords($line, $cluelevel = "|"){
global $lswords;
			$awords = explode(" ", $line);
			$lnout = "";
			foreach($awords as $word){
        if(mb_substr($word, -1) == "`"){
          $lword="";
					if($cluelevel == "`"){ //clue0
			      $lword = mb_substr($word,0,1). "___ ";
					  $lword = "{lnkb:". $lword. "&ensp;:}";
					}else if($cluelevel == "|"){ //clue1
			      $lword =  "____ ";
					  $lword = "{lnkb:". $lword. "&ensp;:}";
					}else if($cluelevel == "¬"){ //bold
					  $lword = "<u>{*". mb_substr($word,0,-1). "*}</u> ";
          }
          $lnout .= $lword;
					$lswords .= mb_substr($word,0,-1). " ";
				}else {
			    $lnout .= $word. " ";
				}

			}//endforeach
  
		  $lnout = preg_replace("/ ([!?,\.;:])/", "$1", $lnout);

  return $lnout;
}//endfunc


