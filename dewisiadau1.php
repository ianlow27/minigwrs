#!/usr/bin/php
<?php
/* This is the 'homework' generator. For lines beginning with "|" and Welsh words suffixed with backtick (`) followed by the word type, which is 1 of the following 12: it (initiator), rs (response), iv (infinitive), nn (noun), ex (excalamation), pn (pronoun), ix (inflexion), ct (connector), av (adverb), ps (preposition), id (idiom), or aj (adjective) then it generates a selection list for that word in the HTML. A new word can be specified using the not symbol (¬) followed by the English for the Welsh e.g. "music¬cerddoriaeth". This uses the library at CDN https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js to create a confetti effect when the student selects all the correct options.
 *
 *
 *
 */



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
$outstr = "<!DOCTYPE><html><body>";
$lswords=""; $lsitwords=""; $lsrswords=""; $lsixwords=""; $lsnnwords=""; $lsexwords=""; $lspnwords=""; $lsivwords=""; $lsctwords=""; $lsavwords=""; $lsppwords=""; $lsidwords=""; $lsajwords=""; $lsltwords=""; $lsanswords=""; $lsartwords=""; $lsnewwords=""; $lsnbwords=""; $lspvwords=""; $l2ndMod=""; $b2ndMod = false; $a2ndMod = [];
htmlfmtinit();
foreach(explode("\n", file_get_contents("./". $LlTestun)) as $line){
  $origline = trim($line);
  if((mb_substr($line, 0, 1)=="|") 
   ||(mb_substr($line, 0, 1)=="`")
   ||(mb_substr($line, 0, 1)=="!")
   ||(mb_substr($line, 0, 1)=="¬")){
    $char1 = mb_substr($line, 0, 1);

    $line = mb_substr($line, 1);
    //echo "____". $line. "\n";
    $line = preg_replace("/ \"/", " {{ ", $line);
    $line = preg_replace("/^\"/", " {{ ", $line);
    $line = preg_replace("/\" /", " }} ", $line);
    $line = preg_replace("/([!?,\.;:])/", " $1", $line);

    if(substr($line, 1, 4) == "===="){

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

      //$outstr = ffurfweddu(dewisiadausetsections($outstr));
      $outstr = ffurfweddu((dewisiadausetsections($outstr, $outstr2, $LlFfeil )));

      file_put_contents("./". $LlFfeil. ".html", $outstr);
      if($l2ndMod != ""){
        if($b2ndMod)
          file_put_contents("./". $LlFfeil. "_2mod.txt", $l2ndMod);
      }
      if($lsnewwords != ""){
//echo "____94>>". $lsnewwords. "\n";
           $atmp1 = explode(" ", $lsnewwords);
           $atmp1 = array_filter(array_unique($atmp1)); 
           sort($atmp1);
           $retstr = "";
           $lsnewwords = "";
           foreach($atmp1 as $ln){
             //if($retstr != "") $retstr .='\n';
             $ln = preg_replace("/¬/", "@", $ln);
             //$atmp1b = preg_split("/[@&]/", $ln);
             $atmp1b = explode("@", $ln);
             if(isset($atmp1b[2])){
               $lsnewwords .= $ln. " ";
echo "__________>>105>>>". $atmp1b[1]."___[". $atmp1b[2]. "]__". $ln. "\n";
               $retstr .=  "|plyssnd_". $atmp1b[1]. " (". $atmp1b[2] ." {*".mb_substr($ln,0,1)."__*}) ".$atmp1b[0]."`ans\n";
             }
           }//endforeach
           $retstr = trim($lsnewwords) . "\n\n". $retstr;
           file_put_contents("./". $LlFfeil. "_new.txt", $retstr);
  
      }

      $outstr = "";
      $lswords=""; $lsitwords=""; $lsrswords=""; $lsixwords=""; $lsnnwords=""; $lsexwords=""; $lspnwords=""; $lsivwords=""; $lsctwords=""; $lsavwords=""; $lsppwords=""; $lsidwords=""; $lsajwords=""; $lsltwords=""; $lsanswords=""; $lsartwords=""; $lsnewwords=""; $lsnbwords=""; $lspvwords=""; $l2ndMod = ""; $b2ndMod = false; $a2ndMod = [];
      
      htmlfmtinit();
      
    }else if(substr($line, 1, 4) == "----"){
       /*
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
       */
       $lswords="";
    }else if(htmlfmtsettings($line, $origline) == ""){

      $lnout = parsewords($line, $char1);
      //if(preg_match("/\{mj/", $lnout)){
      //  $lnout = mjemojis($lnout);
      // }
      $outstr .= $lnout."\n";
      $l2ndMod .= "\n";
  
    }
  }

}//endforeach



function parsewords($line, $cluelevel = "|"){
//irinepicapia;
global $lswords;
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

  if($cluelevel == "!"){
    return "<em style='color:#555;'>". resetpunc($line). "</em>";
  }
      $awords = explode(" ", $line);
      $lnout = "";
      $lnwords = "";
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
          if($cluelevel == "`"){ //clue0
            // backtick symbol - display blank with clue
            $lword = mb_substr($word,0,1). "___";
            if(preg_match("/_/", $word)) $lword .= "___";
            $lword .= " ";
            $lword = "{lnkb:". $lword. "&ensp;:}";
            $lswords .= mb_substr($word,0,-1). " ";
          }else if($cluelevel == "|"){ //clue1
            // pipe symbol - display blank no clue
            //
            //
            //
            //
            //
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




          }else if($cluelevel == "¬"){ //bold
            // not symbol - display text in bold
            $lword = "<u>{*". mb_substr($word,0,-1). "*}</u> ";
          }
          if($lnout != "") $lnout .= ', ';
          $lnout .= '"'. $lword. '"';

          if($lnwords != "") $lnwords .= ', ';
          $lnwords .= '"'. $lword. '"';
          
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


function resetpunc($lnout){
      $lnout = preg_replace("/(\s*)\{\{(\s*)/", " \"", $lnout);
      $lnout = preg_replace("/(\s*)\}\}(\s*)/", "\" ", $lnout);
      $lnout = preg_replace("/ ([!?,\.;:])/", "$1", $lnout);
      return $lnout;

}//endfunc


function dewisiadausetsections($outstr, $outstr2, $pmod="test1"){

global $LlCwrs;
global $LlGwers;
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
      padding: 20px;
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
  z-index:1000;
  top: 100px;
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
  <h2>Ian\'s Welsh Class - Homework<br/>'.  $pmod. '<br/>


  <div style=display:'.


  ($LlCynTeitl == "" ? "none" : "block" )



.';""><br/>Enter your success code from modiwl00' . $LlCynModiwl     .'<br/>
  <input type="password" id="successcode" placeholder="Success Code">

  </div>Enter your password to access the page<br/>
  <input type="password" id="password-input" placeholder="Password">
  <p id="error" style="color: red; display: none;"></p>

  </h2>



  </center>
</div>

<div id="content">
<div style="position:fixed; top:0px; left:0px; background-color:#ffffff;width:100%;text-align:center;">
  </span>

  <!-- center><div id="xxdvMsg" style="margin-top:2px;" ><span id="correctAnsMsg" xxstyle="font-weight:bold;color:red;background-color:#ffff00;">&emsp;</span></div></center -->
  <div id="dvMsg" ></div>

</div>

';

$LlHtmlPenniad=
'<div xxstyle="background-image:url(./'. $LlFfram.'.png);width:600px;height:600px;background-size:contain;border:0px solid blue;">

<!--
<div style="xxtext-align:center;font-weight:bold;font-size:250%;xxcolor:#00f;xxfont-style:italic;xxtext-decoration:underline;margin-top:10px;">'. acenau($LlCwrs). '</div>

<div style="xxtext-align:center;font-weight:bold;font-size:150%;xxcolor:#00f;xxfont-style:italic;text-decoration:underline;margin-top:10px;">'. acenau($LlGwers)  . '</div>

<div style="xxtext-align:center;font-weight:bold;font-size:150%;xxcolor:#0a0;font-style:italic;margin-top:0px;margin-bottom:15px;">'. preg_replace("/\//", "<br>", acenau($LlTeitl)  ). '</div>


<div style="xxtext-align:center;xxfont-weight:bold;font-size:150%;xxcolor:#0a0;font-style:italic;margin-top:0px;margin-bottom:15px;">'. preg_replace("/\//", "<br>", acenau($LlCyfarwyddo)  ). '</div> -->';


$LlHtmlGwaelod=
'</div>
</div>
</body>
</html>
';


$LlCyn= '
<a id="alnkHome" style="font-size:140%;">🏠</a>
&ensp;
  <span style="font-size:140%;font-weight:bold;">
   '. $LlGwers. ' - Choose the correct answer for all selections.</span><br/>
  <span style="font-size:90%;xxfont-weight:bold;">
   <!-- You can check your answers by clicking on the \'Check Answers\' button. 
   When you have completed all selections correctly, a message will appear. Make a note of the "Success code" and time taken in seconds. -->' .
    //', and paste them into my Preply chat at <u>https://preply.com/en/messages</u>. 
    '<span xxstyle="color:red;">If you are having technical issues, please message me immediately at preply.com/en/messages. If you are finding the exercise too difficult, please take a screenshot and we can look at it in class. Repeat this exercise as often as you like by clicking the \'Restart\' button to gain a better timing. Best of luck!  </span> 
    <br/><span xxstyle="color:red;">
The video for this activity can be found by <a href="'. $LlFideo. '"  target="blank" >clicking on this link</a>.  </span> 
    <span style="font-weight:bold;"><br/>'. acenau($LlCyfarwyddo) .'</span>
</span>
  <!--
  <img style="height:300px;" src="file://C:/Users/user/downloads/Copilot_20250925_110423.png"></img> 
  -->'.

($LlLlun1 == "" ? "" : '<img style="height:300px;" src="./'.$LlLlun1. '"></img>')

.'

  <div class="container" xxv5 id="sentences"></div>

  <button style="display:none;" onclick="checkAnswers()">Check Answers</button>
  <button id="reset-btn">Restart</button>&emsp;<a id="nextlnk" href="./modiwl00'. $LlNesaf. '.html" style="display:'.




   ( $LlNesaf == "" ? "none" : "inline" )



  .';" >Next Assignment - '. $LlNesaf. '</a>

  <div id="goodJob">'
    .'🎉 <b>Good Job! </b>🎉'.
   '<br/><span style="font-size:70%;">Please make a note of your success code and module number as you will need it later:<br/>Success Code: <b>' .  strtolower($LlTeitl ). '</b><br/>Module: <b>'. strtolower($LlGwers)
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


($LlPlygellSain == "" ?  "mp3_". $LlGwers : $LlPlygellSain);


$LlWedi='
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
                 word = word.replace(/<shwjpg>/, "<img style=\'width:90%;\' src=\'./img_'. $LlGwers. '/");
                 word = word.replace(/<\/shwjpg>/, ".jpg\' />");
                 word = removeAccents(word);
               } else if(word.substring(0,8) == "<shwpng>"){
                 wrdtmp = "";
                 word = word.replace(/<shwpng>/, "<img style=\'width:90%;\' src=\'./img_'. $LlGwers. '/");
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
    
      //alert(avgSecs);
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

      sendMessage(correctPassword, secondsElapsed);
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

  function checkPassword() {
    const input = document.getElementById("password-input").value.toLowerCase();;
    const successcode = document.getElementById("successcode").value.toLowerCase();;
    //const error = document.getElementById("error");

    console.log (String(input).toLowerCase()  == String(correctPassword).toLowerCase() ); 
    if (String(input).toLowerCase()  == String(correctPassword).toLowerCase() ) {
      if (successcode == String("'. $LlCynTeitl. '").toLowerCase() ){
        document.getElementById("lock-screen").style.display = "none";
        document.getElementById("content").style.display = "block";
        loadTime = Date.now();
      }

    } else {
     //error.style.display = "block";
    }
  }
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
        const fallbackAudio = new Audio(pstr.replace(/\'/g, ""));
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

// Function to get the URL parameter "u" and encrypt it
function getEncryptedParameter() {
    const urlParams = new URLSearchParams(window.location.search);
    const u = urlParams.get("u");  // Get the parameter "u" from the URL

    if (u) {
        // Encrypt the parameter
        const encryptedValue = encryptString(u);
        // Store the result in the passwd variable
        const passwd = encryptedValue;
        //console.log("Encrypted value:", passwd);
        //alert("Encrypted Password: " + passwd);
        document.getElementById("nextlnk").href="./modiwl00'. $LlNesaf. '.html?u=" + u; 
        correctPassword = passwd + "123";
        alnkHome = document.getElementById("alnkHome");
        alnkHome.href = "https://2lnk.net/ianswelshclass/home/" + passwd + ".html";
    } else {
        //alert("No \"u\" parameter in the URL!");
    }
}

// Run the function when the page loads
window.onload = getEncryptedParameter;
</script>


<script>
    // JavaScript function to send the Ajax request
    function sendMessage(correctPassword, secondsElapsed) {
        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();
        
        // Open a POST request to the PHP page
        xhr.open("POST", "send_email.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        
        // The message to be sent to the PHP page
        var xxmessage = "The module is '. $LlGwers. ', the passcode code is " + correctPassword  + ", the time taken is " + secondsElapsed + " seconds";

        var message = 
        "Passcode: " + correctPassword + "\\r\\n" +
        "Module: '. $LlGwers. '\\r\\n" +
        "Total Selections: " + selwordcount  + "\\r\\n" +
        "Total time: " + secondsElapsed + " seconds\\r\\n" +
        "Average time: " + (secondsElapsed/selwordcount).toFixed(2) + " seconds\\r\\n";
        //alert(message);





        var subject = "Welsh Homework Student Results";
        
        // Send the request
        // xhr.send("message=" + encodeURIComponent(message));
        xhr.send("message=" + encodeURIComponent(message) + "&subject=" + encodeURIComponent(subject));

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
    }, 4000);
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
//alert(userAnswer);
    }
//--------------------------------------------------------
    if(!bplayed) playSound("./correct1.mp3", userAnswer);
//---------------------------------------------
   // playSound("./correct1.mp3");

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





';





return $LlHtmlBrig. $LlHtmlPenniad. 




$LlCyn.


$outstr. 
$LlRhwng.
$outstr2. 




$LlWedi.




$LlHtmlGwaelod;
}//endfunc



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


