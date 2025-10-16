#!/usr/bin/php
<?php
/* This is the 'homework' generator. For lines beginning with "|" and Welsh words suffixed with backtick (`)  followed by the word type, which is 1 of the following 12: it (initiator), rs (response), iv (infinitive), nn (noun), ex (excalamation), pn (pronoun), ix (inflexion), ct (connector), av (adverb), ps (preposition), id (idiom), or aj (adjective) then it generates a selection list for that word in the HTML. A new word can be specified using the not symbol (¬) followed by the English for the Welsh e.g. "music¬cerddoriaeth". This uses the library at CDN https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js to create a confetti effect when the student selects all the correct options.
 *
 * [[[[USAGE GUIDE for dewisiadau1.php]]]]
 *
 * [[[Overview]]]
 * When a new project is generated the "dws" command file is created inside the project folder (beginning with the "cwrs_" substring). If the name of the project is "proj1" then the project folder name is "cwrs_proj1". The project input file is itself "./cwrs_proj1/proj". To generate the lesson modules from the "proj" file, we need to make sure we are in the bash shell in the project folder, and simply run "dws" (short for dewisiadau), which will call ../dewisiadau1.php. Running "dws" creates the "modiwl???.html" HTML files that can be used as activities in a language course. Of course depending on the configuration inputted into the project file, e.g. "proj1" different types of activities can be created such as essay submission, word selections for sentence completion, and word selections for image areas. This document explains how to configure the project file so as to generate the required HTML activity page. These activities can be accessed via the student exercise homepage, which is part of this project.
 *
 * [[[Types of HTML Activity Pages]]]
 * The following types of activity pages can be generated:
 * 1. Sound clip word selections
 * 2. Simply story sentence word selections
 * 3. Split story sentences word selections
 * 4. Image area word selections
 * 5. Essay submission
 * 
 * [[[Overview of Project Folder Structure]]]
 *
 *
 *
 * [[[Sound Clip Word Selections]]]
 *
 *
 *
 * [[[Simply Story Sentence Word Selections]]]
 *
 *
 *
 * [[[Split Story Sentences Word Selections]]]
 *
 *
 * [[[Image Area Word Selections]]]
 *
 *
 *
 * [[[Essay Submission]]]
 *
 *
 *
 *
 * [[[Student Exercise Homepage]]]
 *
 *
 *
 *
 */

$LlTestun="testun";
$LlModiwl="";
if(isset($argv[1])) $LlTestun = $argv[1];
if(isset($argv[2])) $LlModiwl = $argv[2];
echo $LlTestun. "__". $LlModiwl;
sleep(1);
//$cwrs =  "./". $LlTestun. "_cwrs";
//if (file_exists( $cwrs)) {
//    echo "The directory $cwrs exists.";
//} else {
//    mkdir( $cwrs, 0755);
//    echo "The directory $cwrs was successfully created.";
//}
unlink('./geiriau.txt');
$DGeiriau = array();
//============================================
include "../cyutils.php";
include "../htmlfmt.php";
include "../mjemojis.php";
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
//===========================
//GLOBALS;
$outstr = "<!DOCTYPE><html><body>";
$LlTxtMinWrds = "";
$LlTxtMaxWrds = "";
$LlTxtInclude = "";
$LlTxtExclude = "";
$lbtnsdesc="";
$lSplitStoryFiles="";
$lswords=""; $lsitwords=""; $lsrswords=""; $lsixwords=""; $lsnnwords=""; $lsexwords=""; $lspnwords=""; $lsivwords=""; $lsctwords=""; $lsavwords=""; $lsppwords=""; $lsidwords=""; $lsajwords=""; $lsltwords=""; $lsanswords=""; $lsartwords=""; $lsnewwords=""; $lsnbwords=""; $lspvwords=""; $l2ndMod=""; $b2ndMod = false; $a2ndMod = []; $lsvcb=""; $lvcbcount = 1;
//===========================
htmlfmtinit();
foreach(explode("\n", file_get_contents("./". $LlTestun)) as $line){
  $origline = trim($line);
  if((mb_substr($line, 0, 1)=="|")//select word from list
   ||(mb_substr($line, 0, 1)=="`")//fill word in blank
   ||(mb_substr($line, 0, 1)=="!")//reset spacing in line
   ||(mb_substr($line, 0, 1)=="¬")//under word
   ||(mb_substr($line, 0, 1)=="&")//word lists preprocessor
   ){
    $char1 = mb_substr($line, 0, 1);

    $line = mb_substr($line, 1);
    //echo "____". $line. "\n";
    $line = preg_replace("/ \"/", " {{ ", $line);
    $line = preg_replace("/^\"/", " {{ ", $line);
    $line = preg_replace("/\" /", " }} ", $line);
    $line = preg_replace("/([!?,\.;:])/", " $1", $line);

    if((substr($line, 1, 4) == "====")
     ||(substr($line, 1, 4) == "----")) {
//-------------------------
$atmp2d = explode("-", $LlGwers);
if($LlModiwl !== "") if($atmp2d[0] != $LlModiwl) continue;
//-------------------------

      if($char1 != "&"){
        $outstr = preputcleandata($outstr, $LlGwers);
        file_put_contents("./". $LlFfeil. ".html", $outstr);
        if($LlGwers != "") $lbtnsdesc .= '"'.$LlGwers.'": "'. $LlBtnsDesc. '",'. "\n";
      }
      if($lsvcb != "") 
        file_put_contents("./". $LlFfeil. "_vcb.txt", $lsvcb);
      //Note that the l2ndMod variable is used to hold the vocab
      //list from the splitstory functionality.
      if($l2ndMod != ""){
        if($b2ndMod)
          file_put_contents("./". $LlFfeil. "_2ndmod.txt", $l2ndMod);
      }
      if($lSplitStoryFiles != ""){
        file_put_contents("./". $LlFfeil. "_splitstory.txt", $lSplitStoryFiles);
      }
      //-----------------
      putnewtxt($lsnewwords, $l2ndMod, "");
      //-----------------

      $outstr = "";
      $lSplitStoryFiles="";
      $LlTxtMinWrds = "";
      $LlTxtMaxWrds = "";
      $LlTxtInclude = "";
      $LlTxtExclude = "";
      $lswords=""; $lsitwords=""; $lsrswords=""; $lsixwords=""; $lsnnwords=""; $lsexwords=""; $lspnwords=""; $lsivwords=""; $lsctwords=""; $lsavwords=""; $lsppwords=""; $lsidwords=""; $lsajwords=""; $lsltwords=""; $lsanswords=""; $lsartwords=""; $lsnewwords=""; $lsnbwords=""; $lspvwords=""; $l2ndMod = ""; $b2ndMod = false; $a2ndMod = []; $lsvcb=""; $lvcbcount = 1;
      
      htmlfmtinit();
      
    //}else if(substr($line, 1, 4) == "----"){
    //   $lswords="";
    //--------------------------------------------
    //This checks if the line contains a module setting.
    // If it doesn't, then continue, because this is
    //  a data line
    }else if(htmlfmtsettings($line, $origline) == ""){
//-------------------------
$atmp2d = explode("-", $LlGwers);
if($LlModiwl !== "") if($atmp2d[0] != $LlModiwl) continue;
//-------------------------
       if(mb_substr($line, 0,6) == "txtbx_"){
          $atmp1d = explode("_", $line);
          if(isset($atmp1d[1])) $LlTxtMinWrds = trim($atmp1d[1]);
          if(isset($atmp1d[2])) $LlTxtMaxWrds = trim($atmp1d[2]);
          if(isset($atmp1d[3])) $LlTxtInclude = trim($atmp1d[3]);
          if(isset($atmp1d[4])) $LlTxtExclude = trim($atmp1d[4]);
          //$outstr .= $lnout."\n";

print_r($atmp1d);
//sleep(1);
       }else {
         if      (mb_substr($line, 0,11)=="splitstory_"){
           $atmp2a = explode("_", preg_replace("/ /", "", $line));
           $splitletter = trim($atmp2a[1]);
           $splitimg = "";
           if(isset($atmp2a[2])) $splitimg = trim($atmp2a[2]);
echo "___>SPLITIMG>>". $splitimg;
           $outstr = preputcleandata($outstr, $LlGwers. $splitletter. '0');
           file_put_contents("./". $LlFfeil. $splitletter."0.html", $outstr);
           if($LlGwers != "") $lbtnsdesc .= '"'.$LlGwers. $splitletter. '0": "'. $LlBtnsDesc. ' 0",'. "\n";

           putnewtxt($lsnewwords, $l2ndMod, $splitletter, $splitimg);

$lsnewwords = "";
$outstr = "";
$l2ndMod = "";



         }else if(mb_substr($line, 0,4) =="plys"){
    //echo ">>>>>>". mb_substr($line, 0,4). "\n";
    //sleep(1);
    
          $tmpln1 = preg_replace("/ /", " = ", mb_substr($line, 8). "\n");
          $tmpln1 = preg_replace("/`ix/", " (vbifx)", $tmpln1);
          $tmpln1 = preg_replace("/`iv/", " (vbifv)", $tmpln1);
          $tmpln1 = preg_replace("/`nn/", " (noun)", $tmpln1);
          $tmpln1 = preg_replace("/`it/", " (init)", $tmpln1);
          $tmpln1 = preg_replace("/`lt/", " (lttr)", $tmpln1);
          $tmpln1 = preg_replace("/`av/", " (adv)", $tmpln1);
          $tmpln1 = preg_replace("/`pn/", " (pron)", $tmpln1);
          $tmpln1 = preg_replace("/`pp/", " (prep)", $tmpln1);
          $tmpln1 = preg_replace("/`pv/", " (poss)", $tmpln1);
          $tmpln1 = preg_replace("/`id/", " (idm)", $tmpln1);
          $tmpln1 = preg_replace("/`aj/", " (adj)", $tmpln1);
          $tmpln1 = preg_replace("/`ct/", " (cnct)", $tmpln1);
          $tmpln1 = preg_replace("/`rs/", " (resp)", $tmpln1);
          $tmpln1 = preg_replace("/`ex/", " (excl)", $tmpln1);
          $tmpln1 = preg_replace("/`nb/", " (num)", $tmpln1);
          $tmpln1 = preg_replace("/_/", " ", $tmpln1);
          $lsvcb .= $lvcbcount++ . ") ". $tmpln1;
        }
  
        $lnout = parsewords($line, $char1);
        //if(preg_match("/\{mj/", $lnout)){
        //  $lnout = mjemojis($lnout);
        // }
        $outstr .= $lnout."\n";
        $l2ndMod .= "\n"; //any onward module after current
      } 
    }
  }

}//endforeach


file_put_contents("./btnsdesc.js", 'const abtnsdesc = {'.  $lbtnsdesc. '};');

function parsewords($line, $cluelevel = "|"){
//irinepicapia;
global $lswords;
global $lsvcb;
global $lvcbcount;
global $lsitwords;
global $lsltwords;
global $lsanswords;
global $lsartwords;
global $lsrswords;
global $lsixwords;
global $lsnnwords;
global $lsnbwords;
global $lsnewwords;
global $lsexwords;
global $lspnwords;
global $lsivwords;
global $lsctwords;
global $lsavwords;
global $lsppwords;
global $lspvwords;
global $lsidwords;
global $lsajwords;
global $l2ndMod;
global $b2ndMod;
global $a2ndMod;
global $LlTxtMinWrds;
global $LlTxtMaxWrds;
global $LlTxtInclude;
global $LlTxtExclude;
global $DGeiriau;

  // If line starts with ! then reset all punctuation
  // i.e. by removing incorrect spacing etc.
  // and then return back immediately
  if($cluelevel == "!"){
    return "<em style='color:#555;'>". resetpunc($line). "</em>";
  }
  $awords = explode(" ", $line);
  $lnout = "";
  $lnwords = "";
  if(mb_substr($line,0,8)=="plyssnd_"){
    $atmp2f = preg_split("/[\s`]/", mb_substr($line,8));
    if(isset($DGeiriau[$atmp2f[0]])){
echo "ERROR!!!(268)---vocab word already used before>[". $atmp2f[0]. "] in [". $line ."]\n";
//sleep(3);
//die();
    }else {
      $DGeiriau[$atmp2f[0]] = $atmp2f[count($atmp2f)-2];
    }
  
  }
  foreach($awords as $word){
    $origword = $word;
    if(trim($word)=="") continue;
    $bnewword = false;
    if((preg_match("/`/", $word)) && (!preg_match("/`@/", $word)) ){
      $atmp1 = explode("`", $word);
      $type = "nn";
      if(isset($atmp1[1])){ $type = $atmp1[1]; }
      $word = $atmp1[0]. "`";
      $lword="";
      // If line starts with ` then show blank spaces
      // for where the answer should appear
      if($cluelevel == "`"){ //clue0
        // backtick symbol - display blank with clue
        $lword = mb_substr($word,0,1). "___";
        if(preg_match("/_/", $word)) $lword .= "___";
        $lword .= " ";
        $lword = "{lnkb:". $lword. "&ensp;:}";
        $lswords .= mb_substr($word,0,-1). " ";
      // If line starts with | then show selection list
      // for the answer option
      }else if(($cluelevel == "|")
             ||($cluelevel == "&")){ //clue1
        // pipe symbol - display blank no clue
        //
        //$lword =  "____";
        //if(preg_match("/_/", $word)) $lword .= "___";
        $lword =  mb_substr($word,0,-1);
        //$lword .= " ";
        //$lword = "{lnkb:". $lword. "&ensp;:}";
        $lswords .= mb_substr($word,0,-1). " ";
        if      ($type == "it"){
          $lsitwords .= mb_substr($word,0,-1). " ";
        }else if($type == "at"){
          $lsartwords .= mb_substr($word,0,-1). " ";
        }else if($type == "ans"){
          $lsanswords .= mb_substr($word,0,-1). " ";
        }else if($type == "lt"){
          $lsltwords .= mb_substr($word,0,-1). " ";
        }else if($type == "rs"){
          $lsrswords .= mb_substr($word,0,-1). " ";
        }else if($type == "ix"){
          $lsixwords .= mb_substr($word,0,-1). " ";
        }else if($type == "nn"){
          $lsnnwords .= mb_substr($word,0,-1). " ";
        }else if($type == "nb"){
          $lsnbwords .= mb_substr($word,0,-1). " ";
        }else if($type == "ex"){
          $lsexwords .= mb_substr($word,0,-1). " ";
        }else if($type == "pn"){
          $lspnwords .= mb_substr($word,0,-1). " ";
        }else if($type == "iv"){
          $lsivwords .= mb_substr($word,0,-1). " ";
        }else if($type == "ct"){
          $lsctwords .= mb_substr($word,0,-1). " ";
        }else if($type == "av"){
          $lsavwords .= mb_substr($word,0,-1). " ";
        }else if($type == "pp"){
          $lsppwords .= mb_substr($word,0,-1). " ";
        }else if($type == "pv"){
          $lspvwords .= mb_substr($word,0,-1). " ";
        }else if($type == "id"){
          $lsidwords .= mb_substr($word,0,-1). " ";
        }else if($type == "aj"){
          $lsajwords .= mb_substr($word,0,-1). " ";
        }else if($type == "nm"){
          $lsnnwords .= mb_substr($word,0,-1). " ";
        }else if($type == "nf"){
          $lsnnwords .= mb_substr($word,0,-1). " ";
        }else {
echo "ERROR!!!(251)---speechtype code not found>[". $origword. "] in [". $line ."]\n";
die();

          $lsnnwords .= mb_substr($word,0,-1). " ";
        }



      //¬ underline answer for reading
      //If line starts with ¬ then underling the
      //answer.
      }else if($cluelevel == "¬"){ //bold
        // not symbol - display text in bold
        $lword = "<u>{*". mb_substr($word,0,-1). "*}</u> ";
      //& Preprocessor for longer stories
      //that need to be split up into segments
      //and vocab lists
      //}else if($cluelevel == "&"){ //bold
       // $lword = "xx". $word;



      }
      if($lnout != "") $lnout .= ', ';
      $lnout .= '"'. $lword. '"';

      if($lnwords != "") $lnwords .= ', ';
      $lnwords .= '"'. $lword. '"';
      
    //`@ words are not used as vocab test words,
    //instead, they are preprocessed to be used
    //as vocab learning words in a later module
    //by writing to the _text.txt files
    }else if(preg_match("/`@/", $word)){
      //--------------------
      $atmp1 = explode("`", $word);
      // word = "phone`@ffo*n!nm"
      if(isset($atmp1[1])){
//echo "__________________283a>>".  $atmp1[0]. "___". $atmp1[1]. "\n";
        if(preg_match("/¬/", $atmp1[1])){
//echo "__________________283b>>".  $lsnewwords. "\n";
          if($lsnewwords != "") $lsnewwords .= ' ';
          $lsnewwords .=  strtolower($atmp1[0]. $atmp1[1]);


//echo ">>>>1[".$lsnewwords ."]______________\n";
//sleep(2);


          $bnewword = true;
          if($l2ndMod != "") $l2ndMod .= ' ';
          $l2ndMod .= 
            preg_replace("/@/", "",
              preg_replace("/¬/", "`", $atmp1[1])
            );
          $b2ndMod = true; 
          $a2ndMod[$atmp1[0]] = $atmp1[1];
//echo "__________________283>>".  $atmp1[0]. "___". $atmp1[1]. "\n";
        }else {
//echo "__________________285>>".  $atmp1[0]. "\n";
          if(!isset($a2ndMod[$atmp1[0]])){
echo "ERROR!!!(292)-engword not set with cymword-->[". $atmp1[0]. "] not set in [". $line ."]\n";
die();
          }else {
            $bnewword = true;
            if($l2ndMod != "") $l2ndMod .= ' ';
            $l2ndMod .= 
              preg_replace("/@/", "",
                preg_replace("/¬/", "`", $a2ndMod[$atmp1[0]])
              );
          }
           
        }
      }
      //--------------------
      $atmp2 = explode("`@", $word);
      $lsword2 = $atmp2[0];
      if($lnout != "") $lnout .= ', ';
      $lnout .= '"'. $lsword2. '"';

    }else {
      if($lnout != "") $lnout .= ', ';
      $lnout .= '"'. $word. '"';
    }//endif
    //-------------------------------------
    if( !$bnewword){
      if($l2ndMod != "") $l2ndMod .= ' ';
      $l2ndMod .= preg_replace("/\`/", "", $word);
    }
    //-------------------------------------
    //-------------------------------------
    //-------------------------------------
    //-------------------------------------


  }//endforeach

echo "_____". $lnout. "____\n";
echo "____________". $lnwords. "____\n";



/*
 *       {
    text: ["The", "girl", "is", "the sister of the", "boy", "."],
    answers: ["girl","boy"]
  },

 */
  $lnout = "{ text: [". $lnout. "], answers: [". $lnwords. "] },";
      //$lnout = resetpunc($lnout);
  

  return $lnout;
}//endfunc
//---------------------------------------------------
function putnewtxt($lsnewwords,$l2ndMod,$splitletter="",$splitimg=""){
global $LlFfeil;
global $LlGwers;
global $LlTeitl;
global $LlBtnsDesc;
global $LlDidoli;
global $LlPlygellSain;
global $LlLlun1;
global $lbtnsdesc;
global $lSplitStoryFiles;
 if($LlPlygellSain == "") $LlPlygellSain = "mp3";
 if($lsnewwords != ""){
//echo "____94>>". $lsnewwords. "\n";
   $atmp1 = explode(" ", $lsnewwords);
   $atmp1 = array_filter(array_unique($atmp1)); 
   sort($atmp1);
   $retstr = "";
   $lsnewwords = "";
   $lsimgjs = "";
   $lcount = 0;
   foreach($atmp1 as $ln){
     $lcount++;
     $ln = preg_replace("/¬/", "@", $ln);
     //$atmp1b = preg_split("/[@&]/", $ln);
     $atmp1b = explode("@", $ln);
//echo "LN FOR PICS>>>>\n";
//print_r($atmp1b);
//sleep(2);

     //$lsimgjs .= '"'. $atmp1b[1]. '": [0, '. ($lcount * 5) ."],\n";
     $lsimgjs .= '"'. $atmp1b[1].
      (isset($atmp1b[2]) ? " (". $atmp1b[2].")" : "")
      .'": [0, 0'. "],\n";
     if(isset($atmp1b[2])){
       $lsnewwords .= $ln. " ";
//echo "__________>>105>>>". $atmp1b[1]."___[". $atmp1b[2]. "]__". $ln. "\n";
       $retstr .=  "|plyssnd_". $atmp1b[1]. " (". $atmp1b[2] ." {*".mb_substr($ln,0,1)."__*}) ".$atmp1b[0]."`ans\n";
     }
   }//endforeach
  // $retstr = trim($lsnewwords) . "\n\n". $retstr;
   $l2ndMod = preg_replace("/^splitstory.*$/m", '', $l2ndMod);
   $retstr =
       "|ffeil=". $LlFfeil. $splitletter. "1\n".
       "|modiwl=". $LlGwers. $splitletter. "1\n".
       "|teitl=u5\n".
       "|btnsdesc=".$LlBtnsDesc." ".strtoupper($splitletter)."1\n".
       "|didoli=hapnam\n".
       "|plygellsain=". $LlPlygellSain. "\n".
       $retstr.
       "|--------------------------------------\n".
       "|======================================\n".
       "|ffeil=". $LlFfeil. $splitletter. "3\n".
       "|modiwl=". $LlGwers. $splitletter. "3\n".
       "|teitl=u5\n".
       "|btnsdesc=".$LlBtnsDesc." ".strtoupper($splitletter)."2\n".
       "|didoli=hapnamxx\n".
       "|plygellsain=". $LlPlygellSain. "\n".
       preg_replace("/^/m","|", $l2ndMod).
       "|--------------------------------------\n".
       "|======================================\n".
       "";
   $lSplitStoryFiles .= "\n\n". $retstr. "\n\n";
   //-------
   $splitimg = preg_replace("/\./", "2i.", $splitimg);
   $lsimgjs = circleimagemob($lsimgjs, $splitimg, $LlGwers. $splitletter. '2i');
   if($LlGwers != "") $lbtnsdesc .= '"'.$LlGwers. $splitletter. '2i": "'. $LlBtnsDesc. ' Pic",'. "\n";
   file_put_contents("./". $LlFfeil. $splitletter. "2i.html", $lsimgjs);
 }
}//endfunc
//---------------------------------------------------
function preputcleandata($outstr, $pLlGwers){
global $lsitwords; global $lsltwords; global $lsanswords; global $lsartwords; global $lsrswords; global $lsixwords; global $lsnnwords; global $lsnbwords; global $lsnewwords; global $lsexwords; global $lspnwords; global $lsivwords; global $lsctwords; global $lsavwords; global $lsppwords; global $lspvwords; global $lsidwords; global $lsajwords; 
global $LlFfeil;
//--------------
  $outstr = acenau($outstr);

  $outstr = preg_replace( "/plysnd_(['´âêîôûŵŴŷáÁỳàäëïÏöÖëa-zA-Z0-9^_]+)/", "<plysnd>$1</plysnd>", $outstr);
  $outstr = preg_replace("/plyssnd_(['´âêîôûŵŴŷáÁỳàäëïÏöÖëa-zA-Z0-9^_]+)/", "<plyssnd>$1</plyssnd>", $outstr);
  $outstr = preg_replace( "/shwjpg_(['´âêîôûŵŴŷáÁỳàäëïÏöÖëa-zA-Z0-9^_\.\,\-]+)/", "<shwjpg>$1</shwjpg>", $outstr);
  $outstr = preg_replace( "/shwpng_(['´âêîôûŵŴŷáÁỳàäëïÏöÖëa-zA-Z0-9^_\.\,\-]+)/", "<shwpng>$1</shwpng>", $outstr);

  $outstr2 = 
  "\nconst ansrOptions = [". dwsfmt($lsanswords, "ans"). "];\n".
  "\nconst artlOptions = [". dwsfmt($lsartwords, "art"). "];\n".
  "\nconst initOptions = [". dwsfmt($lsitwords, "init"). "];\n".
  "\nconst lttrOptions = [". dwsfmt($lsltwords, "ltr"). "];\n".
  "\nconst respOptions = [". dwsfmt($lsrswords, "rsp"). "];\n".
  "\nconst infxOptions = [". dwsfmt($lsixwords, "vifx"). "];\n".
  "\nconst nounOptions = [". dwsfmt($lsnnwords, "noun"). "];\n".
  "\nconst numbOptions = [". dwsfmt($lsnbwords, "num"). "];\n".
  "\nconst exclOptions = [". dwsfmt($lsexwords, "excl"). "];\n".
  "\nconst pronOptions = [". dwsfmt($lspnwords, "pron"). "];\n".
  "\nconst infvOptions = [". dwsfmt($lsivwords, "vifv"). "];\n".
  "\nconst cnctOptions = [". dwsfmt($lsctwords, "cnct"). "];\n".
  "\nconst advbOptions = [". dwsfmt($lsavwords, "adv"). "];\n".
  "\nconst prepOptions = [". dwsfmt($lsppwords, "prep"). "];\n".
  "\nconst possOptions = [". dwsfmt($lspvwords, "poss"). "];\n".
  "\nconst idimOptions = [". dwsfmt($lsidwords, "idm"). "];\n".
  "\nconst adjvOptions = [". dwsfmt($lsajwords, "adj"). "];\n".
  "";
  $outstr2 = acenau($outstr2);

  $outstr = ffurfweddu((dewisiadausetsections($outstr, $outstr2, $LlFfeil, $pLlGwers )));
  return $outstr;
//--------------
}//endfunc
//---------------------------------------------------
function resetpunc($lnout){
      $lnout = preg_replace("/(\s*)\{\{(\s*)/", " \"", $lnout);
      $lnout = preg_replace("/(\s*)\}\}(\s*)/", "\" ", $lnout);
      $lnout = preg_replace("/ ([!?,\.;:])/", "$1", $lnout);
      return $lnout;

}//endfunc
//---------------------------------------------------
function dewisiadausetsections($outstr, $outstr2, $pmod="test1", $pLlGwers){

global $LlCwrs;
global $LlGwers;
global $LlBtnsDesc;
global $LlDidoli;
global $LlTeitl;
global $LlFideo;
global $LlCynModiwl;
global $LlCynTeitl;
global $LlNesaf;
global $LlPlygellSain;
global $LlLlun1;
global $LlCyfarwyddo;
global $LlFfram;
global $LlTxtMinWrds;
global $LlTxtMaxWrds;
global $LlTxtInclude;
global $LlTxtExclude;


if($LlPlygellSain == "") $LlPlygellSain = "mp3";

$LlHtmlBrig='
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ian\'s Welsh Class Homework</title>
  <style>
    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between; /* Distribute columns evenly across the width xxv5 */
      gap: 10px;
    }
    .column {
      display: flex;
      flex-direction: column;
      gap: 10px;
      flex: 1 1 20%; /* Make columns grow and shrink equally, taking up 20% of available width xxv5 */
      min-width: 200px; /* Ensure columns do not get too small */
    }

    /* Style for each individual div inside the column xxv5 */
    .xxxxitem {
      xxxxpadding: 10px;
      xxxborder: 1px solid #ccc;
      xxxxborder-radius: 5px;
      xxxxbackground-color: lightgray;
    }







    #lock-screen {
      position: fixed;
      xxtop: 0; left: 0; right: 0; bottom: 0;
      top: 50px; left: 0; right: 0; bottom: 0;
      xxbackground: #111;
      xxcolor: #fff;
      display: flex;
      flex-direction: column;
      //justify-content: center;
      justify-content: flex-start;
      align-items: center;
      z-index: 9999;
    }
    #content {
      display: none;
      padding: 20px;
    }
    input[type="password"] {
      padding: 10px;
      font-size: 16px;
      margin-top: 10px;
    }
    button {
      padding: 10px 15px;
      margin-top: 10px;
    }



















    body {
      font-family: Arial, sans-serif;
      xxpadding: 20px;
    }

    select {
      margin: 0 5px;
    }

    .sentence {
      margin-bottom: 15px;
    }

    .correct {
      background-color: #d4edda;
    }

    .incorrect {
      background-color: #f8d7da;
    }

    #xxxgoodJob {
      display: none;
      font-size: 2em;
      color: #28a745;
      margin-top: 30px;
      text-align: center;
  xxpadding: 20px 40px;
  /*
  top: 50%;
  transform: translate(-50%, -50%);
  */
    }

#dvMsg {
  position: fixed;
  xxtop: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 80%;
  background-color: #ffffff;
  color: #000000;
  display: none;
  z-index:1;
  top: 50px;
  transform: translate(-50%);
  padding: 10px 10px;
  border: 3px solid #188715;
  border-radius: 10px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
  text-align: center;
}

#goodJob {
  display: none;
  position: fixed;
  left: 50%;
  width: 80%;
  top: 50px;
  transform: translate(-50%);
  font-size: 160%;
  color: #188715;
  background-color: white;
  padding: 10px 10px;
  border: 3px solid #188715;
  border-radius: 10px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
  z-index: 9999;
  text-align: center;
}
  </style>
</head>
<body>
<div id="lock-screen">
  <center>
  <a id="alnkHome2" style="z-index:9999;font-size:140%;text-decoration:none;">🏠</a>
  <h2>Ian\'s Welsh Class - Homework<br/>'.  $pmod. '<br/>


  <div style="display:'.


  ($LlCynTeitl == "" ? "none" : "block" )



.';"><br/>Enter your success code from modiwl00' . $LlCynModiwl     .'<br/>
  <input type="password" id="successcode" placeholder="Success Code">

  </div>Enter your password to access the page<br/>
  <input type="password" id="password-input" placeholder="Password">
  <p id="error" style="color: red; display: none;"></p>

  </h2>



  </center>
</div>

<div id="content">
<div style="position:fixed; top:0px; left:0px; background-color:#ffffff;width:100%;text-align:center;">

  <div id="dvMsg" ></div>

</div>

';

$LlHtmlPenniad=
'<div xxstyle="background-image:url(./'. $LlFfram.'.png);width:600px;height:600px;background-size:contain;border:0px solid blue;">

<!--
<div style="xxtext-align:center;font-weight:bold;font-size:250%;xxcolor:#00f;xxfont-style:italic;xxtext-decoration:underline;margin-top:10px;">'. acenau($LlCwrs). '</div>

<div style="xxtext-align:center;font-weight:bold;font-size:150%;xxcolor:#00f;xxfont-style:italic;text-decoration:underline;margin-top:10px;">'. acenau($pLlGwers)  . '</div>

<div style="xxtext-align:center;font-weight:bold;font-size:150%;xxcolor:#0a0;font-style:italic;margin-top:0px;margin-bottom:15px;">'. preg_replace("/\//", "<br>", acenau($LlTeitl)  ). '</div>


<div style="xxtext-align:center;xxfont-weight:bold;font-size:150%;xxcolor:#0a0;font-style:italic;margin-top:0px;margin-bottom:15px;">'. preg_replace("/\//", "<br>", acenau($LlCyfarwyddo)  ). '</div> -->';


$LlHtmlGwaelod=
'</div>
</div>
</body>
</html>
';


$LlCyn= '
  <div style="text-align:center;font-size:120%;font-weight:bold;">'. $LlBtnsDesc.'</div>
<a id="alnkHome" style="z-index:9999;font-size:140%;">🏠</a>
&ensp;
  <span style="font-size:140%;font-weight:bold;">
   '. $pLlGwers. ' - Choose the correct answer for all selections.</span><br/>
  <span style="font-size:90%;xxfont-weight:bold;">
   <!-- You can check your answers by clicking on the \'Check Answers\' button. 
   When you have completed all selections correctly, a message will appear. Make a note of the "Success code" and time taken in seconds. -->' .
    //', and paste them into my Preply chat at <u>https://preply.com/en/messages</u>. 
    '<span xxstyle="color:red;">If you are having technical issues, please message me immediately at preply.com/en/messages. If you are finding the exercise too difficult, please take a screenshot and we can look at it in class. Repeat this exercise as often as you like by clicking the \'Restart\' button to gain a better timing. Best of luck!  </span>  '.

   ($LlFideo == "" ? "" :
  '<span xxstyle="color:red;"><br/>
<span style="font-size:140%;">
🎞️
</span>
<b>The video for this activity can be found by <a href="'. $LlFideo. '"  target="blank" >clicking on this link</a>.</b>  </span> '
   )

   .' <span style="font-weight:bold;"><br/><br/>'. acenau($LlCyfarwyddo) .'<br/></span>
</span><br/> '.

($LlLlun1 == "" ? "" : '<img style="max-width:90%;max-height:250px;" src="./img/'.$LlLlun1. '"></img>')

.'

  <div class="container" xxv5 id="sentences"></div>
';



$LlCynB = '

  <button style="display:none;" onclick="checkAnswers()">Check Answers</button>
  <button id="reset-btn">Restart</button>&emsp;<a id="nextlnk" href="./modiwl00'. $LlNesaf. '.html" style="display:'.



   ( $LlNesaf == "" ? "none" : "inline" )



  .';" >Next Assignment - '. $LlNesaf. '</a>

  <div id="goodJob">'
    .'🎉 <b>Good Job! </b>🎉'.
   '<br/><a id="alnkHome3" style="z-index:9999;font-size:100%;text-decoration:none;">🏠</a>
&ensp;<span style="font-size:70%;">Please make a note of your success code and module number as you will need it later:<br/>Success Code: <b>' .  strtolower($LlTeitl ). '</b><br/>Module: <b>'. strtolower($pLlGwers)
    .'</b> <br>Time taken: <span id="spsecs"></span> secs
       <br>Average time: <span id="avgSecs"></span> secs
       <br><span style="font-size:350%;" id="speedEmoji"></span>
       <br><span id="speedMsg"></span><br/>
</span>

  <button onclick="window.location.reload();">Reset</button>
  </div>



  <!-- Include canvas-confetti via CDN -->
  <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

  <script>
  
      function createColumn() { //xxv5
        const column = document.createElement("div");
        column.classList.add("column");
        return column;
      }
  
  </script>

  <script>
    let selwordcount = 0;
    const sentences1 = [
';






$LlRhwng='
    ];

    // Shuffle function using Fisher-Yates
    function shuffleArray(array) {
      const copy = [...array]; // Make a shallow copy to avoid modifying original
'.
( $LlDidoli != "hapnam" ? '' : '
      for (let i = copy.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [copy[i], copy[j]] = [copy[j], copy[i]]; }'
) 
. '
      return copy;
    }
    
    // Generate the randomized sentences
    const sentences = shuffleArray(sentences1);

    // Options for dropdowns
    ';


($LlPlygellSain == "" ?  "mp3" : $LlPlygellSain);


$LlWedi='
    let usrInitials = "";
    let homePage = "";
    function createSelect(options, correctValue) {
      const select = document.createElement("select");
      for (let opt of options) {
        const option = document.createElement("option");
        option.value = opt;
        option.textContent = opt;
        select.appendChild(option);
      }
      select.dataset.correct = correctValue;
      return select;
    }

    function renderSentences() {
      const container = document.getElementById("sentences");
      container.innerHTML = "";

      let columnIndex = 0; // To keep track of which column we are on xxv5
      let currentColumn = createColumn(); // Create the first column xxv5

      let index = -1; //xxv5

      for (let s of sentences) {

        index++; //xxv5

        if(index % 10  === 0 && index !== 0){  //xxv5
          container.appendChild(currentColumn);
          currentColumn = createColumn();
        }
        
        const div = document.createElement("div");
        div.className = "sentence";

        let answerIndex = 0;

        for (let word of s.text) {
          let bselectword = true;
          if (infxOptions.includes(word)) {
            const select = createSelect(infxOptions, s.answers[answerIndex++]);
            div.appendChild(select);
          } else if (adjvOptions.includes(word)) {
            const select = createSelect(adjvOptions, s.answers[answerIndex++]);
            div.appendChild(select);
          } else if (idimOptions.includes(word)) {
            const select = createSelect(idimOptions, s.answers[answerIndex++]);
            div.appendChild(select);
          } else if (advbOptions.includes(word)) {
            const select = createSelect(advbOptions, s.answers[answerIndex++]);
            div.appendChild(select);
          } else if (cnctOptions.includes(word)) {
            const select = createSelect(cnctOptions, s.answers[answerIndex++]);
            div.appendChild(select);
          } else if (exclOptions.includes(word)) {
            const select = createSelect(exclOptions, s.answers[answerIndex++]);
            div.appendChild(select);
          } else if (infvOptions.includes(word)) {
            const select = createSelect(infvOptions, s.answers[answerIndex++]);
            div.appendChild(select);
          } else if (initOptions.includes(word)) {
            const select = createSelect(initOptions, s.answers[answerIndex++]);
            div.appendChild(select);
          } else if (ansrOptions.includes(word)) {
            const select = createSelect(ansrOptions, s.answers[answerIndex++]);
            div.appendChild(select);
          } else if (respOptions.includes(word)) {
            const select = createSelect(respOptions, s.answers[answerIndex++]);
            div.appendChild(select);
          } else if (lttrOptions.includes(word)) {
            const select = createSelect(lttrOptions, s.answers[answerIndex++]);
            div.appendChild(select);
          } else if (pronOptions.includes(word)) {
            const select = createSelect(pronOptions, s.answers[answerIndex++]);
            div.appendChild(select);
          } else if (possOptions.includes(word)) {
            const select = createSelect(possOptions, s.answers[answerIndex++]);
            div.appendChild(select);
          } else if (prepOptions.includes(word)) {
            const select = createSelect(prepOptions, s.answers[answerIndex++]);
            div.appendChild(select);
          } else if (nounOptions.includes(word)) {
            const select = createSelect(nounOptions, s.answers[answerIndex++]);
            div.appendChild(select);
          } else if (numbOptions.includes(word)) {
            const select = createSelect(numbOptions, s.answers[answerIndex++]);
            div.appendChild(select);
          } else if (artlOptions.includes(word)) {
            const select = createSelect(artlOptions, s.answers[answerIndex++]);
            div.appendChild(select);
          //} else if (newwOptions.includes(word)) {
          //  bselectword = false;
          //  const span = document.createElement("span");
          //  span.textContent = word + " ";
          //  div.appendChild(span);

          } else {
            bselectword = false;
            //const span = document.createElement("span");
            //span.textContent = word + " ";
            //div.appendChild(span);

            word = word.replace(/`@/g, "");
            const span = document.createElement("span");
            let wrdtmp = "";
            if(word.charAt(0) == "<"){
//----------------------------------
               if(word.substring(0,8) == "<xxxxxplysnd>"){


                 //word = word.replace(/\'/g, "");
                 word = word.replace(/<plysnd>/, "<button style=\'font-size: 18px; cursor: pointer; background: none; border: none; padding:0px; margin:0px;\' onclick=\"playSound(\'./'.

(($LlPlygellSain == "") ? "mp3" : $LlPlygellSain)

.'/");
                 word = word.replace(/<\/plysnd>/, ".mp3\')\">▶️</button>");
               } else if(word.substring(0,9) == "<xxxxplyssnd>"){
                 //word = word.replace(/\'/g, "");
                 wrdtmp = " " + word;
                 wrdtmp = wrdtmp.replace(/<plyssnd>/, "");
                 wrdtmp = wrdtmp.replace(/<\/plyssnd>/, "");
                 word = word.replace(/<plyssnd>/, "<button style=\'font-size: 18px; cursor: pointer; background: none; border: none; padding:0px; margin:0px;\' onclick=\"playSound(\'./'.

(($LlPlygellSain == "") ? "mp3" : $LlPlygellSain)

.'/");
                 word = word.replace(/<\/plyssnd>/, ".mp3\')\">▶️</button> ");
                 word = removeAccents(word);
//----------------------------------
//----------------------------------
              }else if(word.substring(0,8) == "<plysnd>"){
                word = word.replace(/<plysnd>/, "");
                word = word.replace(/<\/plysnd>/, "");
                let fname2 = removeAccents(word);
                word = "<button style=\'font-size: 18px; cursor: pointer; background: none; border: none; padding:0px; margin:0px;\' onclick=\"playSound(\'./'.

(($LlPlygellSain == "") ? "mp3" : $LlPlygellSain)

.'/" + fname2 + ".mp3\')\">▶️</button>";

              }else if(word.substring(0,9) == "<plyssnd>"){
                word = word.replace(/<plyssnd>/, "");
                word = word.replace(/<\/plyssnd>/, "");
                wrdtmp = " " + word;
                let fname2 = removeAccents(word);
                word = "<button style=\'font-size: 18px; cursor: pointer; background: none; border: none; padding:0px; margin:0px;\' onclick=\"playSound(\'./'.
(($LlPlygellSain == "") ? "mp3" : $LlPlygellSain)
.'/" + fname2 + ".mp3\')\">▶️</button>";

//----------------------------------
               } else if(word.substring(0,8) == "<shwjpg>"){
                 wrdtmp = "";
                 word = word.replace(/<shwjpg>/, "<img style=\'max-width:90%;height:auto;\' src=\'./img_'. $pLlGwers. '/");
                 word = word.replace(/<\/shwjpg>/, ".jpg\' />");
                 word = removeAccents(word);
               } else if(word.substring(0,8) == "<shwpng>"){
                 wrdtmp = "";
                 word = word.replace(/<shwpng>/, "<img style=\'max-width:90%;height:auto;\' src=\'./img_'. $pLlGwers. '/");
                 word = word.replace(/<\/shwpng>/, ".jpg\' />");
                 word = removeAccents(word);
               } 
               span.innerHTML = word + "<b>" + wrdtmp + "</b> ";
            }else                      span.textContent = word + " ";
            div.appendChild(span);


          }//endif
          if(bselectword) selwordcount++;
        }//endfor

        //xxv5 container.appendChild(div);
        currentColumn.appendChild(div);

      }//endfor
      container.appendChild(currentColumn);

    }//endfunc

    function removeAccents(pstr){
        if (pstr.match(/[âêîôûŵŴŷáÁỳàäëïÏöÖë\']+/)){
          pstr = pstr.replace(/â/, "a");
          pstr = pstr.replace(/ê/, "e");
          pstr = pstr.replace(/î/, "i");
          pstr = pstr.replace(/ô/, "o");
          pstr = pstr.replace(/û/, "u");
          pstr = pstr.replace(/ŵ/, "w");
          pstr = pstr.replace(/Ŵ/, "W");
          pstr = pstr.replace(/ŷ/, "y");
          pstr = pstr.replace(/á/, "a");
          pstr = pstr.replace(/Á/, "A");
          pstr = pstr.replace(/ỳ/, "y");
          pstr = pstr.replace(/à/, "a");
          pstr = pstr.replace(/ä/, "a");
          pstr = pstr.replace(/ë/, "e");
          pstr = pstr.replace(/ï/, "i");
          pstr = pstr.replace(/Ï/, "I");
          pstr = pstr.replace(/ö/, "o");
          pstr = pstr.replace(/ë/, "e");
          pstr = pstr.replace(/\'/,"-");
        }
        return pstr;

    }//endfunc

    function checkAnswers() {
      const selects = document.querySelectorAll("select");
      let allCorrect = true;

      selects.forEach(select => {
        const userAnswer = select.value;
        const correctAnswer = select.dataset.correct;

        if (userAnswer === correctAnswer) {
          select.classList.add("correct");
          select.classList.remove("incorrect");
        } else {
          select.classList.add("incorrect");
          select.classList.remove("correct");
          allCorrect = false;
        }
      });

      if (allCorrect) {
        showSuccess();
      }
    }

    function showSuccess() {
      // Show message
      const message = document.getElementById("goodJob");

      const now = Date.now();
      const secondsElapsed = Math.floor((now - loadTime) / 1000);
      const spsecs = document.getElementById("spsecs");
      spsecs.innerHTML = secondsElapsed;
      
      const avgSecs =  (secondsElapsed/selwordcount).toFixed(2);
      const repeatMsg = "Repeat this activity as often as you like to see whether you can be a faster animal.";
      let speedStr = "You are a squirrel! You are the 8th fastest!" + " " + repeatMsg;
      let speedEmoji = "🐿";
    
      if      (avgSecs < 1.5){
         speedStr = "You are a cheetah! You are the fastest!";
         speedEmoji = "🐆";
      }else if(avgSecs < 1.7){
         speedStr = "You are a lion! You are the 2ns fastest!" + " " + repeatMsg;
         speedEmoji = "🦁";
      }else if(avgSecs < 1.9){
         speedStr = "You are a horse! You are the 3rd fastest!" + " " + repeatMsg;
         speedEmoji = "🐎";
      }else if(avgSecs < 2.1){
         speedStr = "You are a hare! You are the 4th fastest!" + " " + repeatMsg;
         speedEmoji = "🐇";
      }else if(avgSecs < 2.5){
         speedStr = "You are an elk! You are the 5th fastest!" + " " + repeatMsg;
         speedEmoji = "🫎";
      }else if(avgSecs < 3){
         speedStr = "You are a zebra! You are the 6th fastest!" + " " + repeatMsg;
         speedEmoji = "🦓";
      }else if(avgSecs < 3.5){
         speedStr = "You are a kangaroo! You are the 7th fastest!" + " " + repeatMsg;
         speedEmoji = "🦘";
      }
      document.getElementById("avgSecs").innerHTML = avgSecs;
      document.getElementById("speedMsg").innerHTML = speedStr;
      document.getElementById("speedEmoji").innerHTML = speedEmoji;



      message.style.display = "block";

      // Trigger confetti explosion
      confetti({
        particleCount: 150,
        spread: 100,
        origin: { y: 0.6 }
      });

      sendMessage(correctPassword, secondsElapsed, usrInitials);
    }

    // Initialize
    renderSentences();
  </script>



<script>
  let loadTime = "";

  '.

   ($LlCynTeitl == "" 
    ?  'document.getElementById("password-input").focus();' 
    :  'document.getElementById("successcode").focus();' )

  .'
   document.getElementById("reset-btn").addEventListener("click", () => {
      location.reload();
    });

  let correctPassword = "K\.?s{4(:@(3613~,?45!KJd^%$@£!)0{{1(Jksi3(*!%$@:"; // Change this to your desired password

  function checkPassword(pstr) {
    const input = document.getElementById("password-input").value.toLowerCase();;
    const successcode = document.getElementById("successcode").value.toLowerCase();;
    //const error = document.getElementById("error");

    console.log (String(input).toLowerCase()  == String(correctPassword).toLowerCase() ); 
    if ((pstr===1) || (String(input).toLowerCase()  == String(correctPassword).toLowerCase() ) ){
      if (successcode == String("'. $LlCynTeitl. '").toLowerCase() ){
        document.getElementById("lock-screen").style.display = "none";
        document.getElementById("content").style.display = "block";
        loadTime = Date.now();
      }

    } else {
     //error.style.display = "block";
    }
  }
  checkPassword(2);
</script>

<script>
    (function () {
      const inputpw = document.getElementById("password-input");
      inputpw.addEventListener("input", checkPassword, { passive: true });
      inputpw.addEventListener("paste", () => setTimeout(checkPassword, 0));
    })();
/*
  const inputBox = document.getElementById("password-input");
  inputBox.addEventListener("input", function() {
    checkPassword();
    //if (inputBox.value == correctPassword){
    //    showSuccess();
    //}
    //console.log("Current value:", inputBox.value, "___", correctPassword);
  });
*/
</script>

<script>
    function xxplaySoundxx(pstr, correctAns) {
      correctAns = "./mp3/" + correctAns.replace(/[^a-zA-Z0-9]+/,"").toLowerCase() + ".mp3";
      const audio = new Audio(correctAns);

      console.log(correctAns);

      audio.oncanplaythrough = function(){
        //audio.pause();
        //audio.currentTime = 0;
        audio.play();
      }

      audio.onerror = function(){
        pstr = pstr.replace(/\'/g, "");
        audio.src = pstr;
        //audio.pause();
        //audio.currentTime = 0;
        audio.play();
      }
    }

    function playSound(pstr, correctAns) {
      let audioFile =  pstr.replace(/\'/g, "");
      if(typeof correctAns != "undefined" ){
        audioFile = "./mp3/" + correctAns.replace(/[^a-zA-Z0-9]+/, "").toLowerCase() + ".mp3";
      }
      const audio = new Audio(audioFile);
    
      audio.oncanplaythrough = function () {
        audio.play();
      };
    
      audio.onerror = function () {
        //const fallbackAudio = new Audio(pstr.replace(/\'/g, ""));
        const fallbackAudio = new Audio("./mp3/correct1.mp3");
        fallbackAudio.play();
      };
    }
</script>


<script>
// Function to shift each character by 2 positions backwards in the alphabet
function shiftCharacter(char) {
    // ASCII codes for lowercase letters: "a" = 97, "z" = 122
    const charCode = char.charCodeAt(0);

    if (charCode >= 97 && charCode <= 122) {
        // For "a" to "z", shift by 2 positions backwards
        return String.fromCharCode((charCode - 97 - 2 + 26) % 26 + 97);
    }

    // For any other character (non-alphabetic), return as is
    return char;
}

// Function to encrypt the string by shifting each character
function encryptString(str) {
    return str.split("").map(shiftCharacter).join("");
}

function getLeftOfp5w(str){
  const match = str.match(/^(.*?)p5w/);
  return match ? match[1] : str;
}

// Function to get the URL parameter "u" and encrypt it
function getEncryptedParameter() {
    const urlParams = new URLSearchParams(window.location.search);
    const u = urlParams.get("u");  // Get the parameter "u" from the URL

    if (u) {
        // Encrypt the parameter
        //const encryptedValue = encryptString(u);
        // Store the result in the passwd variable
        let passwd =  u; //encryptedValue;
        homePage = u;
        usrInitials = getLeftOfp5w(passwd);
        //console.log("Encrypted value:", passwd);
        document.getElementById("nextlnk").href="./modiwl00'. $LlNesaf. '.html?u=" + u; 
        correctPassword = usrInitials + "123";



        alnkHome = document.getElementById("alnkHome");
        alnkHome.href = "./home/" + homePage + ".html";
        alnkHome2 = document.getElementById("alnkHome2");
        alnkHome2.href = "./home/" + homePage + ".html";
        alnkHome3 = document.getElementById("alnkHome3");
        alnkHome3.href = "./home/" + homePage + ".html";


    } else {
    }
}

// Run the function when the page loads
window.onload = getEncryptedParameter;
</script>


<script>
    // JavaScript function to send the Ajax request
    function sendMessage(correctPassword, secondsElapsed, usrInitials) {
        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();
        
        // Open a POST request to the PHP page
        xhr.open("POST", "./home/send_email.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        
        // The message to be sent to the PHP page
        var xxmessage = "The module is '. $pLlGwers. ', the passcode code is " + correctPassword  + ", the time taken is " + secondsElapsed + " seconds";

        var message = 
        "" + usrInitials + "" +
        " ('. $pLlGwers. '), " +
        " " + selwordcount  + " qstn," +
        " " + secondsElapsed + " sec," +
        " avg " + (secondsElapsed/selwordcount).toFixed(2) + " sec";





        var subject = "Welsh Homework Student Results";
        
        // Send the request
        // xhr.send("message=" + encodeURIComponent(message));
        xhr.send("message=" + encodeURIComponent(message) 
              + "&subject=" + encodeURIComponent(subject)
              + "&usr=" + encodeURIComponent(usrInitials)
              + "&modref=" + encodeURIComponent("'. $pLlGwers.'")
              + "&homepage=" + encodeURIComponent(homePage)
              );

        // Handle the response
        xhr.onload = function () {
            if (xhr.status === 200) {
                console.log("Message sent successfully!");
            } else {
                console.log("Failed to send message.");
            }
        };
    }
</script>



<script>


const encouragingEmojis = [
 "💪","🌟","🚀",
 //"🔥",
 "🙌",
 //"🧠", brain
 //"✏️",
 "📚","🌈",
 //"☀️",
 "🍀",
 //"🕊️", dove
 "🫶","🤗","💖","👏","🚀","🌱","🌈"
 ,"✨","✨"
];







  function dispCorrectAnsMsg(pmsg){
    //const messageDiv = document.getElementById("correctAnsMsg");
    const dvMsg = document.getElementById("dvMsg");
    dvMsg.style.display = "block";

    let fadeTimeout, resetTimeout;
    // Clear any previous timeouts to reset fade
    clearTimeout(fadeTimeout);
    clearTimeout(resetTimeout);

    //pmsg = pmsg.replace(/_/g, " ");
    // Show message and make it fully opaque


    // messageDiv.innerHTML = "<span style=\"font-weight:bold;color:red;background-color:#ffff88;border:2px solid red;padding:2px;\">Answer: " + pmsg + "</span>";

    const aEmojiPair = Array.from(getRandomEmojiPair());
    let lHtml  =
        "<center><div style=\"font-size:100%;\">" + 
        "<span style=\"font-size:150%;\"> "+ aEmojiPair[0] + " </span>" +
        "<span style=\"font-size:100%;\"> "+ pmsg + " </span>" +
        "<span style=\"font-size:150%;\"> "+ aEmojiPair[1] + " </span>" +
        "</div></center>";
    //messageDiv.innerHTML = lHtml;
    dvMsg.innerHTML = lHtml;


    //messageDiv.style.transition = "none";  // reset transition to show immediately
    //messageDiv.style.opacity = "1";
    dvMsg.style.transition = "none";
    dvMsg.style.opacity = "1";

    // Force reflow to apply the style without transition
   // messageDiv.offsetWidth;
    dvMsg.offsetWidth;

    // After 2 seconds, fade out over 2 seconds
    resetTimeout = setTimeout(() => {
      //messageDiv.style.transition = "opacity 0.3s linear";
      //messageDiv.style.opacity = "0";
      dvMsg.style.transition = "opacity 0.3s linear";
      dvMsg.style.opacity = "0";
    }, 300);

    // After fade completes (4s total), clear the message text
    fadeTimeout = setTimeout(() => {
      //messageDiv.innerHTML = "<span style=\"font-size:150%;\"> _____ </span>";
      dvMsg.style.display = "none";
    }, 1000);
  //});
  }//endfunc


function getRandomEmojiPair() {
  const firstIndex = Math.floor(Math.random() * (encouragingEmojis.length - 1));
  
  let secondIndex;
  do {
    secondIndex = Math.floor(Math.random() * (encouragingEmojis.length -1));
  } while (secondIndex === firstIndex); // Ensure it is different
console.log(firstIndex + "___" + secondIndex);

  const emojiPair = encouragingEmojis[firstIndex] + encouragingEmojis[secondIndex];
  return emojiPair;
}



</script>


<script>
// Assuming this code is inside a change event handler for a select element
function handleSelectChange(event) {
  const select = event.target;
  const userAnswer = select.value;
  const correctAnswer = select.dataset.correct;

  const goodJobEmojis = [
    "🥳", "🎈", "🎉" , "🎊" , "🎊"
  ];
  const encouragingPhrases = [
      "BRILLIANT!", "WELL DONE!", "PERFECT!",
      "GOOD JOB!", "GREAT WORK!", "NICE!",
      "EXCELLENT!", "IMPRESSIVE!",
      "BRAVO!", "AWESOME!", "FANTASTIC!",
      "AMAZING!", "WONDERDUL!",
  ];
  const phrsIdx = Math.floor(Math.random() * (encouragingPhrases.length - 1));
  const goodJobEmojiIdx1 = Math.floor(Math.random() * (goodJobEmojis.length - 1));
  const goodJobEmojiIdx2 = Math.floor(Math.random() * (goodJobEmojis.length - 1));

  if (userAnswer === correctAnswer) {
//-------------------------------------------------
     let bplayed = false;
     const parentDiv = this.closest(".sentence");
     // Get all span siblings before or after the select
     const spans = parentDiv.querySelectorAll("span");
     spans.forEach(span => {
           const button = span.querySelector("button");
           if (button) {
               const onclickAttr = button.getAttribute("onclick");
               const match = onclickAttr.match(/playSound\([\'"](.+?)[\'"]\)/);
               if (match) {
                   bplayed = true;
                   playSound(match[1]); // "./mp3/test1.mp3"
               }
           }
      });
//--------------------------------------------------------
    if(!bplayed) {
    }
//--------------------------------------------------------
    if(!bplayed) playSound("./mp3/correct1.mp3", userAnswer);
//---------------------------------------------

    dispCorrectAnsMsg(
      " <span style=\"font-size:150%;\">" + goodJobEmojis[goodJobEmojiIdx1] + "</span>" 
    + " <span style=\"font-weight:bold;color:green;\">"+ encouragingPhrases[phrsIdx]  + "</span>" 
    + " <span style=\"font-size:150%;\">" + goodJobEmojis[goodJobEmojiIdx2] + "</span>"  );
    select.classList.add("correct");
    select.classList.remove("incorrect");
  } else {
    dispCorrectAnsMsg("Answer: <span style=\"font-weight:bold;color:red;\">"+ correctAnswer + "</span>");
    select.classList.add("incorrect");
    select.classList.remove("correct");
  }

  // Optional: If you want to check if all selects are correct after this change
  const selects = document.querySelectorAll("select");
  let allCorrect = true;
  selects.forEach(s => {
    if (s.value !== s.dataset.correct) {
      allCorrect = false;
    }
  });

  if (allCorrect) {
    showSuccess();
  }
}

// Attach event listener to all selects (do this once)
document.querySelectorAll("select").forEach(select => {
  select.addEventListener("change", handleSelectChange);
});


</script>





'; //END OF $LlWedi





$LlTextboxDiv='';
$LlTextboxScript='';
if($LlTxtMinWrds != ""){
//echo "_________________1a>". $LlTxtMinWrds. "\n";
//sleep(1);
  if($LlTxtMaxWrds == "") $LlTxtMaxWrds = '10000000';
  $LlTextboxDiv='
    <form id="essayForm">
        <label for="essay">Enter your essay below:</label><br>
        <textarea style="width:90%;height:200px;" id="essay" name="essay" required></textarea><br><br>
        <div id="message" style="color:red;margin-top:2px;margin-bottom:2px;"></div>
        <button type="submit">Submit Essay</button>
    </form>
'; //END OF $LlTextboxDiv 


$LlTextboxScript='
    <script>
        const mustInclude = "'. $LlTxtInclude.'";
        const mustExclude = "'. $LlTxtExclude.'";

        document.getElementById("essayForm").addEventListener("submit", function(event) {
            event.preventDefault();

            const essay = document.getElementById("essay").value.toLowerCase();
            const messageEl = document.getElementById("message");
            messageEl.className = "error";
            messageEl.textContent = "";

            const includeWords = mustInclude.split("|");
            const excludeWords = mustExclude.split("|");

            //const missing = includeWords.filter(word => !essay.includes(word));
            const missing = includeWords.filter(word => {
              const regex = new RegExp(`\\\\b${word}\\\\b`, "i"); 
              return !regex.test(essay);
            }); // !essay.includes(word));

            //const foundExcluded = excludeWords.filter(word => essay.includes(word));
            const foundExcluded = excludeWords.filter(word => {
              const regex = new RegExp(`\\\\b${word}\\\\b`, "i"); 
              return regex.test(essay);
            }); // !essay.includes(word));

            if (missing.length > 0) {
                messageEl.textContent = "Error: Your essay is missing the following required words: " + missing.join(", ");
                return;
            }

            if (foundExcluded.length > 0) {
                messageEl.textContent = "Error: Your essay includes prohibited words: " + foundExcluded.join(", ");
                return;
            }

            const wordCount = essay.trim().split(/\s+/).filter(word => word.length > 0).length;
            if (wordCount < '. $LlTxtMinWrds .' || wordCount > '. $LlTxtMaxWrds .') {
                messageEl.textContent = `Error: Essay must be between '. $LlTxtMinWrds. ' and '.  $LlTxtMaxWrds  .' words. Your essay has ${wordCount} word(s).`;
                return;
            }

            // Extract module reference from filename
            const pathParts = window.location.pathname.split("/");
            const filename = pathParts[pathParts.length - 1];
            const moduleRefMatch = filename.match(/module0*(\d+-\w+)\.html/i);
            let moduleRef = "'. $pLlGwers. '";

            // Get "u" parameter from URL
            const urlParams = new URLSearchParams(window.location.search);
            const homepage1 = urlParams.get("u") || "unknown";
            const  initials = getLeftOfp5w(homepage1);
            //const homeURL =  "https://2lnk.net/ianswelshclass/home/" + homepage1 + ".html";
            //const homeURL =  "./home/" + homepage1 + ".html";
            const homeURL =  "./" + homepage1 + ".html";

            // Create form to submit
            const form = document.createElement("form");
            form.method = "POST";
            form.action = "./home/send_email.php";

            const essayInput = document.createElement("input");
            essayInput.type = "hidden";
            essayInput.name = "essay";
            essayInput.value = essay;

            const homepgInput = document.createElement("input");
            homepgInput.type = "hidden";
            homepgInput.name = "homepg";
            homepgInput.value = homepage1;

            const homeInput = document.createElement("input");
            homeInput.type = "hidden";
            homeInput.name = "homeurl";
            homeInput.value = homeURL;

            const moduleInput = document.createElement("input");
            moduleInput.type = "hidden";
            moduleInput.name = "module";
            moduleInput.value = moduleRef;

            const initialsInput = document.createElement("input");
            initialsInput.type = "hidden";
            initialsInput.name = "initials";
            initialsInput.value = initials;

            form.appendChild(essayInput);
            form.appendChild(homeInput);
            form.appendChild(homepgInput);
            form.appendChild(moduleInput);
            form.appendChild(initialsInput);

            document.body.appendChild(form);
            form.submit();
        });
    </script>

'; //END OF $LlTextboxScript
}



return $LlHtmlBrig. $LlHtmlPenniad. 




$LlCyn.

$LlTextboxDiv.

$LlCynB.

$outstr. 
$LlRhwng.
$outstr2. 




$LlWedi.


$LlTextboxScript.


$LlHtmlGwaelod;
}//endfunc
//---------------------------------------------
function dwsfmt($pstr, $popt){
  $atmp1 = explode(" ", $pstr);
  $atmp1 = array_filter(array_unique($atmp1)); 
  sort($atmp1);
  $retstr = "";
  foreach($atmp1 as $ln){
    if($retstr != "") $retstr .=', ';
    $retstr .= '"'. $ln.'"';
  }//endforeach
  
  if ($retstr != "") $retstr = ", ". $retstr;
  return '"_'. $popt. '_"'. $retstr;
}//endfunc
//---------------------------------------------
function circleimagemob($pstr, $splitimg, $pLlGwers){

file_put_contents("./js/". $pLlGwers. "__.js", '
const avocabpics = {
' . $pstr.  '
  };');

return '
      <!DOCTYPE html>
      <html lang="en">
      <head>
        <meta charset="UTF-8">
        <title>Mobile Vocabulary Game</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
        <style>
      
          #lock-screen {
            position: fixed;
            xxtop: 0; left: 0; right: 0; bottom: 0;
            top: 50px; left: 0; right: 0; bottom: 0;
            xxbackground: #111;
            xxcolor: #fff;
            display: flex;
            flex-direction: column;
            //justify-content: center;
            justify-content: flex-start;
            align-items: center;
            z-index: 9999;
          }
          #content {
            display: none;
            padding: 20px;
          }
          input[type="password"] {
            padding: 10px;
            font-size: 16px;
            margin-top: 10px;
          }
          button {
            padding: 10px 15px;
            margin-top: 10px;
          }
      
      
      
      
      
      
      
      
      #dvMsg {
        position: fixed;
        xxtop: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 80%;
        background-color: #ffffff;
        color: #000000;
        display: none;
        z-index:1;
        top: 50px;
        transform: translate(-50%);
        padding: 10px 10px;
        border: 3px solid #188715;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        text-align: center;
      }
      #goodJob {
        display: none;
        position: fixed;
        left: 50%;
        width: 80%;
        top: 50px;
        transform: translate(-50%);
        font-size: 160%;
        color: #188715;
        background-color: white;
        padding: 10px 10px;
        border: 3px solid #188715;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        z-index: 9999;
        text-align: center;
      }
      
      
      
      
      
      
          body {
            font-family: sans-serif;
            margin: 0;
            padding: 20px;
            text-align: center;
            background: #f9f9f9;
          }
      
          #container {
            position: relative;
            width: 100%;
            max-width: 500px;
            margin: auto;
            aspect-ratio: 1 / 1;
          }
      
          #main-image {
            width: 100%;
            xxheight: 100%;
            xxobject-fit: cover;
            display: block;
          }
      
          .circle {
            position: absolute;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            cursor: pointer;
            z-index: 2;
          }
      
          /* Modal styles */
          #modal {
            display: none;
            position: fixed;
            z-index: 10;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.6);
            align-items: center;
            justify-content: center;
          }
      
          #modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            max-width: 300px;
            margin: auto;
          }
      
          .option-button {
            display: block;
            width: 100%;
            margin: 10px 0;
            padding: 12px;
            font-size: 18px;
            border: none;
            border-radius: 6px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
          }
      
          .option-button:hover {
            background-color: #0056b3;
          }
      
          #modal h3 {
            margin-bottom: 15px;
          }
        </style>
        <script src="./js/'. $pLlGwers . '.js"></script>
      </head>
      <body>
      <div id="lock-screen">
        <center>
        <a id="alnkHome2" style="z-index:9999;font-size:140%;text-decoration:none;">🏠</a>
        <h2>Ian\'s Welsh Class - Homework<br/>modiwl003-h1<br/>
      
      
        <div style="display:none;"><br/>Enter your success code from modiwl00<br/>
        <input type="password" id="successcode" placeholder="Success Code">
      
        </div>Enter your password to access the page<br/>
        <input type="password" id="password-input" placeholder="Password">
        <p id="error" style="color: red; display: none;"></p>
      
        </h2>
      
      
      
        </center>
      </div>
      <div id="content">
      
      
      
       <div id="dvMsg" ></div>
      
      <a id="alnkHome" style="z-index:9999;font-size:140%;">🏠</a>
      
        <button style="display:none;" onclick="checkAnswers()">Check Answers</button>
        <button id="reset-btn" style="z-index:9999;">Restart</button>&emsp;<a id="nextlnk" href="./modiwl00.html" style="display:none;" >Next Assignment - </a>
      
        <div id="goodJob">🎉 <b>Good Job! </b>🎉<br/><a id="alnkHome3" style="z-index:9999;font-size:100%;text-decoration:none;">🏠</a>
      &ensp;<span style="font-size:70%;">Please make a note of your success code and module number as you will need it later:<br/>Success Code: <b>d2</b><br/>Module: <b>3-h1</b> <br>Time taken: <span id="spsecs"></span> secs
             <br>Average time: <span id="avgSecs"></span> secs
             <br><span style="font-size:350%;" id="speedEmoji"></span>
             <br><span id="speedMsg"></span><br/>
      </span>
      
        <button onclick="window.location.reload();">Reset</button>
        </div>
      
      
      
      
      
      
      
      
        <h3>Click on the green circles and select the correct meaning</h3>
      
        <div id="container">
          <img src="./img/'. $splitimg .'" id="main-image" alt="Main image">
          <!-- Circles will be injected here -->
        </div>
      
        <!-- Modal for answer selection -->
        <div id="modal">
          <div id="modal-content">
            <h3>Select the correct word</h3>
            <!-- Option buttons injected here -->
          </div>
        </div>
      
        <!-- Confetti -->
        <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
      
        <script>


document.addEventListener("mousemove", function(event) {
  // Get the image element
  const image = document.getElementById("main-image");  // Replace "myImage" with your image\'s ID or another selector
  
  // Get the position and size of the image relative to the viewport
  const rect = image.getBoundingClientRect();

  // Calculate the mouse position relative to the image
  const mouseX = Number((event.clientX - rect.left ) /3).toFixed(2);  // Subtract image\'s left position
  const mouseY = Number((event.clientY - rect.top ) /3).toFixed(2);   // Subtract image\'s top position

  // Log the mouse position relative to the image
  console.log("Mouse Position Relative to Image - X:", mouseX, "Y:", mouseY);
});





          const xxxxavocabpics = {

' . $pstr.  '

          };
          const options = Object.keys(avocabpics);
      const totvocabpics = options.length;
      let countCorrect = 0;
          let remaining = options.length;
          let activeCircle = null;
      
          const container = document.getElementById("container");
          const modal = document.getElementById("modal");
          const modalContent = document.getElementById("modal-content");
      
          // Add a circle for each vocab item
          function createCircle(id, leftPct, topPct) {
            const circle = document.createElement("img");
            circle.src = "./img/circle.png";
            circle.className = "circle";
            circle.id = id;
            circle.style.left = `calc(${leftPct}% - 24px)`; // Adjust for 48px size
            circle.style.top = `calc(${topPct}% - 24px)`;
      
            circle.addEventListener("click", () => {
              activeCircle = circle;
              showModal();
            });
      
            container.appendChild(circle);
          }
      
          // Show modal with answer buttons
          function showModal() {
            const buttonsContainer = document.createElement("div");
            buttonsContainer.id = "buttons-container";
            modalContent.appendChild(buttonsContainer);
      
            options.forEach(option => {
              const btn = document.createElement("button");
              btn.className = "option-button";
              btn.textContent = option;
              btn.onclick = () => {
                //CORRECT ANSWER
                if (option === activeCircle.id) {
      dispCorrectAnsMsg("Correct!");
      playSound("./mp3/correct1.mp3", activeCircle.id);
      
      
                  activeCircle.remove();
                  remaining--;
                  if (remaining === 0) {
                    setTimeout(() => {
                      confetti({
                        particleCount: 200,
                        spread: 100,
                        origin: { y: 0.6 }
                      });
                      //alert("Well done!");
                    }, 200);
                  }
      countCorrect++;
      if(countCorrect  == totvocabpics) showSuccess();
      
      
      
                //WRONG ANSWER
      //showSuccess();
                }else {
      dispCorrectAnsMsg(activeCircle.id);
      
                }
                closeModal();
              };
              buttonsContainer.appendChild(btn);
            });
      
            modal.style.display = "flex";
          }
      
          // Close modal and clean up
          function closeModal() {
            modal.style.display = "none";
            const buttonsContainer = document.getElementById("buttons-container");
            if (buttonsContainer) buttonsContainer.remove();
          }
      
          // Initialize circles on load
          window.onload = function () {
            for (const [key, [left, top]] of Object.entries(avocabpics)) {
              createCircle(key, left, top);
            }
          };
      
          // Close modal on outside click
          window.addEventListener("click", (e) => {
            if (e.target === modal) closeModal();
          });
      
      
        </script>
      
      
      
      
      
      
      
      
      
      
      
      
      <script>
      const encouragingEmojis = [
       "💪","🌟","🚀",
       //"🔥",
       "🙌",
       //"🧠", brain
       //"✏️",
       "📚","🌈",
       //"☀️",
       "🍀",
       //"🕊️", dove
       "🫶","🤗","💖","👏","🚀","🌱","🌈"
       ,"✨","✨"
      ];
      
      function getRandomEmojiPair() {
        const firstIndex = Math.floor(Math.random() * (encouragingEmojis.length - 1));
        
        let secondIndex;
        do {
          secondIndex = Math.floor(Math.random() * (encouragingEmojis.length -1));
        } while (secondIndex === firstIndex); // Ensure it is different
      console.log(firstIndex + "___" + secondIndex);
      
        const emojiPair = encouragingEmojis[firstIndex] + encouragingEmojis[secondIndex];
        return emojiPair;
      }
      
      function dispCorrectAnsMsg(pmsg){
          const dvMsg = document.getElementById("dvMsg");
          dvMsg.style.display = "block";
      
          let fadeTimeout, resetTimeout;
          // Clear any previous timeouts to reset fade
          clearTimeout(fadeTimeout);
          clearTimeout(resetTimeout);
      
          const aEmojiPair = Array.from(getRandomEmojiPair());
          let lHtml  =
              "<center><div style=\"font-size:100%;\">" + 
              "<span style=\"font-size:150%;\"> "+ aEmojiPair[0] + " </span>" +
              "<span style=\"font-size:100%;\"> "+ pmsg + " </span>" +
              "<span style=\"font-size:150%;\"> "+ aEmojiPair[1] + " </span>" +
              "</div></center>";
          dvMsg.innerHTML = lHtml;
      
      
          //messageDiv.style.transition = "none";  // reset transition to show immediately
          //messageDiv.style.opacity = "1";
          dvMsg.style.transition = "none";
          dvMsg.style.opacity = "1";
      
          // Force reflow to apply the style without transition
         // messageDiv.offsetWidth;
          dvMsg.offsetWidth;
      
          // After 2 seconds, fade out over 2 seconds
          resetTimeout = setTimeout(() => {
            //messageDiv.style.transition = "opacity 0.3s linear";
            //messageDiv.style.opacity = "0";
            dvMsg.style.transition = "opacity 0.3s linear";
            dvMsg.style.opacity = "0";
          }, 300);
      
          // After fade completes (4s total), clear the message text
          fadeTimeout = setTimeout(() => {
            //messageDiv.innerHTML = "<span style=\"font-size:150%;\"> _____ </span>";
            dvMsg.style.display = "none";
          }, 1000);
        //});
        }//endfunc
      
      
      </script>
      
      
      
      
      <script>
          function playSound(pstr, correctAns) {
            let audioFile =  pstr.replace(/\'/g, "");
            if(typeof correctAns != "undefined" ){
              audioFile = "./mp3/" + correctAns.replace(/[^a-zA-Z0-9]+/, "").toLowerCase() + ".mp3";
            }
            const audio = new Audio(audioFile);
          
            audio.oncanplaythrough = function () {
              audio.play();
            };
          
            audio.onerror = function () {
              //const fallbackAudio = new Audio(pstr.replace(/\'/g, ""));
              const fallbackAudio = new Audio("./mp3/correct1.mp3");
              fallbackAudio.play();
            };
          }
      </script>
      
      
      
      
      
      
      <script>
      let selwordcount = 0;
        const encouragingPhrases = [
            "BRILLIANT!", "WELL DONE!", "PERFECT!",
            "GOOD JOB!", "GREAT WORK!", "NICE!",
            "EXCELLENT!", "IMPRESSIVE!",
            "BRAVO!", "AWESOME!", "FANTASTIC!",
            "AMAZING!", "WONDERDUL!",
        ];
        //let loadTime = Date.now();
        const goodJobEmojis = [
          "🥳", "🎈", "🎉" , "🎊" , "🎊"
        ];
        const phrsIdx = Math.floor(Math.random() * (encouragingPhrases.length - 1));
        const goodJobEmojiIdx1 = Math.floor(Math.random() * (goodJobEmojis.length - 1));
        const goodJobEmojiIdx2 = Math.floor(Math.random() * (goodJobEmojis.length - 1));
      
       function showSuccess() {
            // Show message
            const message = document.getElementById("goodJob");
      
            const now = Date.now();
            const secondsElapsed = Math.floor((now - loadTime) / 1000);
            const spsecs = document.getElementById("spsecs");
            spsecs.innerHTML = secondsElapsed;
            
            const avgSecs =  (secondsElapsed/selwordcount).toFixed(2);
            const repeatMsg = "Repeat this activity as often as you like to see whether you can be a faster animal.";
            let speedStr = "You are a squirrel! You are the 8th fastest!" + " " + repeatMsg;
            let speedEmoji = "🐿";
          
            if      (avgSecs < 1.5){
               speedStr = "You are a cheetah! You are the fastest!";
               speedEmoji = "🐆";
            }else if(avgSecs < 1.7){
               speedStr = "You are a lion! You are the 2ns fastest!" + " " + repeatMsg;
               speedEmoji = "🦁";
            }else if(avgSecs < 1.9){
               speedStr = "You are a horse! You are the 3rd fastest!" + " " + repeatMsg;
               speedEmoji = "🐎";
            }else if(avgSecs < 2.1){
               speedStr = "You are a hare! You are the 4th fastest!" + " " + repeatMsg;
               speedEmoji = "🐇";
            }else if(avgSecs < 2.5){
               speedStr = "You are an elk! You are the 5th fastest!" + " " + repeatMsg;
               speedEmoji = "🫎";
            }else if(avgSecs < 3){
               speedStr = "You are a zebra! You are the 6th fastest!" + " " + repeatMsg;
               speedEmoji = "🦓";
            }else if(avgSecs < 3.5){
               speedStr = "You are a kangaroo! You are the 7th fastest!" + " " + repeatMsg;
               speedEmoji = "🦘";
            }
            document.getElementById("avgSecs").innerHTML = avgSecs;
            document.getElementById("speedMsg").innerHTML = speedStr;
            document.getElementById("speedEmoji").innerHTML = speedEmoji;
      
      
      
            message.style.display = "block";
      
            // Trigger confetti explosion
            confetti({
              particleCount: 150,
              spread: 100,
              origin: { y: 0.6 }
            });
      
            sendMessage(correctPassword, secondsElapsed, usrInitials);
          }
      
      
      </script>
      
      
      
<script>
    // JavaScript function to send the Ajax request
    function sendMessage(correctPassword, secondsElapsed, usrInitials) {
        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();
        
        // Open a POST request to the PHP page
        xhr.open("POST", "./home/send_email.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        
        // The message to be sent to the PHP page
        var xxmessage = "The module is '. $pLlGwers. ', the passcode code is " + correctPassword  + ", the time taken is " + secondsElapsed + " seconds";

        var message = 
        "" + usrInitials + "" +
        " ('. $pLlGwers. '), " +
        " " + selwordcount  + " qstn," +
        " " + secondsElapsed + " sec," +
        " avg " + (secondsElapsed/selwordcount).toFixed(2) + " sec";





        var subject = "Welsh Homework Student Results";
        
        // Send the request
        // xhr.send("message=" + encodeURIComponent(message));
        xhr.send("message=" + encodeURIComponent(message) 
              + "&subject=" + encodeURIComponent(subject)
              + "&usr=" + encodeURIComponent(usrInitials)
              + "&modref=" + encodeURIComponent("'. $pLlGwers.'")
              + "&homepage=" + encodeURIComponent(homePage)
              );

        // Handle the response
        xhr.onload = function () {
            if (xhr.status === 200) {
                console.log("Message sent successfully!");
            } else {
                console.log("Failed to send message.");
            }
        };
    }
</script>
      
      
      
      
      <script>
        let loadTime = "";
      
        document.getElementById("password-input").focus();
      //   document.getElementById("reset-btn").addEventListener("click", () => {
      //      location.reload();
      //    });
      
        let correctPassword = "K\.?s{4(:@(3613~,?45!KJd^%$@£!)0{{1(Jksi3(*!%$@:"; // Change this to your desired password
      
        function checkPassword(pstr) {
          const input = document.getElementById("password-input").value.toLowerCase();;
          const successcode = document.getElementById("successcode").value.toLowerCase();;
          //const error = document.getElementById("error");
      
          console.log (String(input).toLowerCase()  == String(correctPassword).toLowerCase() ); 
          if (String(input).toLowerCase()  == String(correctPassword).toLowerCase() ) {
            if (successcode == String("").toLowerCase() ){
              document.getElementById("lock-screen").style.display = "none";
              document.getElementById("content").style.display = "block";
              loadTime = Date.now();
            for (const [key, [left, top]] of Object.entries(avocabpics)) {
              createCircle(key, left, top);
            }
      
            }
      
          } else {
           //error.style.display = "block";
          }
        }
      </script>
      
      
      
      <script>
      // Function to shift each character by 2 positions backwards in the alphabet
      function shiftCharacter(char) {
          // ASCII codes for lowercase letters: "a" = 97, "z" = 122
          const charCode = char.charCodeAt(0);
      
          if (charCode >= 97 && charCode <= 122) {
              // For "a" to "z", shift by 2 positions backwards
              return String.fromCharCode((charCode - 97 - 2 + 26) % 26 + 97);
          }
      
          // For any other character (non-alphabetic), return as is
          return char;
      }
      
      // Function to encrypt the string by shifting each character
      function encryptString(str) {
          return str.split("").map(shiftCharacter).join("");
      }
      
      function getLeftOfp5w(str){
        const match = str.match(/^(.*?)p5w/);
        return match ? match[1] : str;
      }
      
      // Function to get the URL parameter "u" and encrypt it
      function getEncryptedParameter() {
          const urlParams = new URLSearchParams(window.location.search);
          const u = urlParams.get("u");  // Get the parameter "u" from the URL
      
          if (u) {
              // Encrypt the parameter
              //const encryptedValue = encryptString(u);
              // Store the result in the passwd variable
              let passwd =  u; //encryptedValue;
              homePage = u;
              usrInitials = getLeftOfp5w(passwd);
              //console.log("Encrypted value:", passwd);
              document.getElementById("nextlnk").href="./modiwl00.html?u=" + u; 
              correctPassword = usrInitials + "123";
      
      
      
              alnkHome = document.getElementById("alnkHome");
              alnkHome.href = "./home/" + homePage + ".html";
              alnkHome2 = document.getElementById("alnkHome2");
              alnkHome2.href = "./home/" + homePage + ".html";
              alnkHome3 = document.getElementById("alnkHome3");
              alnkHome3.href = "./home/" + homePage + ".html";
      
      
          } else {
          }
      }
      
      // Run the function when the page loads
      window.onload = getEncryptedParameter;
      </script>
      
      
      
      <script>
          (function () {
            const inputpw = document.getElementById("password-input");
            inputpw.addEventListener("input", checkPassword, { passive: true });
            inputpw.addEventListener("paste", () => setTimeout(checkPassword, 0));
          })();
      /*
        const inputBox = document.getElementById("password-input");
        inputBox.addEventListener("input", function() {
          checkPassword();
          //if (inputBox.value == correctPassword){
          //    showSuccess();
          //}
          //console.log("Current value:", inputBox.value, "___", correctPassword);
        });
      */
      </script>
      
      </div>
      </body>
      </html>
';


}//endfunc
//---------------------------------------------
//---------------------------------------------
//---------------------------------------------
//---------------------------------------------
//---------------------------------------------
//---------------------------------------------
//---------------------------------------------
//---------------------------------------------
//---------------------------------------------



