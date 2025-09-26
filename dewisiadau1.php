#!/usr/bin/php
<?php
/* This is the 'homework' generator. For lines beginning with "|" and Welsh words suffixed with backtick (`) followed by the word type, which is 1 of the following 12: it (initiator), rs (response), iv (infinitive), nu (noun), ex (excalamation), pn (pronoun), ix (inflexion), ct (connector), av (adverb), ps (preposition), id (idiom), or aj (adjective) then it generates a selection list for that word in the HTML. A new word can be specified using the not symbol (¬) followed by the English for the Welsh e.g. "music¬cerddoriaeth". This uses the library at CDN https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js to create a confetti effect when the student selects all the correct options.
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
$lswords=""; $lsitwords=""; $lsrswords=""; $lsixwords=""; $lsnuwords=""; $lsexwords=""; $lspnwords=""; $lsivwords=""; $lsctwords=""; $lsavwords=""; $lspswords=""; $lsidwords=""; $lsajwords="";
htmlfmtinit();
foreach(explode("\n", file_get_contents("./". $LlTestun)) as $line){
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
      //$outstr .= "</body></html>";
      //echo $outstr;
      //$outstr = preg_replace("/\n/", "<br>", $outstr);
      $outstr = acenau($outstr);


/*
    const initOptions = ["_it_", "beth", "yr"];
    const vifxOptions = ["_ix_", "ydw", "ydwyt", "ydy","ydym","ydych","ydynt","ydys" ];
    const vinfOptions = ["_iv_", "hoffi", "licio", "caru"];
    const pronOptions = ["_p_", "i","ti","ef","hi","ni","chi","nhw","yna"];
    const prepOptions = ["_ps_", "yn", "ar", "o dan"];
    const nounOptions = ["_n_", "tad cu", "mam gu", "girl", "boy"];
    $outstr2 = 
      "\nconst initOptions = [". dwsfmt($lsitwords, "it"). "];\n".
      "\nconst respOptions = [". dwsfmt($lsrswords, "rs"). "];\n".
      "\nconst infxOptions = [". dwsfmt($lsixwords, "ix"). "];\n".
      "\nconst nounOptions = [". dwsfmt($lsnuwords, "nu"). "];\n".
      "\nconst exclOptions = [". dwsfmt($lsexwords, "ex"). "];\n".
      "\nconst pronOptions = [". dwsfmt($lspnwords, "pn"). "];\n".
      "\nconst infvOptions = [". dwsfmt($lsivwords, "iv"). "];\n".
      "\nconst cnctOptions = [". dwsfmt($lsctwords, "ct"). "];\n".
      "\nconst advbOptions = [". dwsfmt($lsavwords, "av"). "];\n".
      "\nconst prepOptions = [". dwsfmt($lspswords, "ps"). "];\n".
      "\nconst idimOptions = [". dwsfmt($lsidwords, "id"). "];\n".
      "\nconst adjvOptions = [". dwsfmt($lsajwords, "aj"). "];\n".
      "";
*/
    $outstr2 = 
      "\nconst initOptions = [". dwsfmt($lsitwords, "init"). "];\n".
      "\nconst respOptions = [". dwsfmt($lsrswords, "resp"). "];\n".
      "\nconst infxOptions = [". dwsfmt($lsixwords, "vifx"). "];\n".
      "\nconst nounOptions = [". dwsfmt($lsnuwords, "noun"). "];\n".
      "\nconst exclOptions = [". dwsfmt($lsexwords, "excl"). "];\n".
      "\nconst pronOptions = [". dwsfmt($lspnwords, "pron"). "];\n".
      "\nconst infvOptions = [". dwsfmt($lsivwords, "vinf"). "];\n".
      "\nconst cnctOptions = [". dwsfmt($lsctwords, "cnct"). "];\n".
      "\nconst advbOptions = [". dwsfmt($lsavwords, "adv"). "];\n".
      "\nconst prepOptions = [". dwsfmt($lspswords, "prep"). "];\n".
      "\nconst idimOptions = [". dwsfmt($lsidwords, "idm"). "];\n".
      "\nconst adjvOptions = [". dwsfmt($lsajwords, "adj"). "];\n".
      "";
      $outstr2 = acenau($outstr2);

      //$outstr = ffurfweddu(dewisiadausetsections($outstr));
      $outstr = (dewisiadausetsections($outstr, $outstr2, $LlFfeil ));

      file_put_contents("./". $LlFfeil. ".html", $outstr);

      $outstr = "";
      $lswords=""; $lsitwords=""; $lsrswords=""; $lsixwords=""; $lsnuwords=""; $lsexwords=""; $lspnwords=""; $lsivwords=""; $lsctwords=""; $lsavwords=""; $lspswords=""; $lsidwords=""; $lsajwords="";
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
    }else if(htmlfmtsettings($line) == ""){

      $lnout = parsewords($line, $char1);
      //if(preg_match("/\{mj/", $lnout)){
      //  $lnout = mjemojis($lnout);
      // }
      $outstr .= $lnout."\n";
  
    }
  }

}//endforeach



function parsewords($line, $cluelevel = "|"){
//irinepicapia;
global $lswords;
global $lsitwords;
global $lsrswords;
global $lsixwords;
global $lsnuwords;
global $lsexwords;
global $lspnwords;
global $lsivwords;
global $lsctwords;
global $lsavwords;
global $lspswords;
global $lsidwords;
global $lsajwords;

  if($cluelevel == "!"){
    return "<em style='color:#555;'>". resetpunc($line). "</em>";
  }
      $awords = explode(" ", $line);
      $lnout = "";
      $lnwords = "";
      foreach($awords as $word){
        if(trim($word)=="") continue;
        if(preg_match("/`/", $word)){
          $atmp1 = explode("`", $word);
          $type = "nu";
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
            }else if($type == "rs"){
              $lsrswords .= mb_substr($word,0,-1). " ";
            }else if($type == "ix"){
              $lsixwords .= mb_substr($word,0,-1). " ";
            }else if($type == "nu"){
              $lsnuwords .= mb_substr($word,0,-1). " ";
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
            }else if($type == "ps"){
              $lspswords .= mb_substr($word,0,-1). " ";
            }else if($type == "id"){
              $lsidwords .= mb_substr($word,0,-1). " ";
            }else if($type == "aj"){
              $lsajwords .= mb_substr($word,0,-1). " ";
            }else {
              $lsnuwords .= mb_substr($word,0,-1). " ";
            }




          }else if($cluelevel == "¬"){ //bold
            // not symbol - display text in bold
            $lword = "<u>{*". mb_substr($word,0,-1). "*}</u> ";
          }
          if($lnout != "") $lnout .= ', ';
          $lnout .= '"'. $lword. '"';

          if($lnwords != "") $lnwords .= ', ';
          $lnwords .= '"'. $lword. '"';
          
        }else {
          if($lnout != "") $lnout .= ', ';
          $lnout .= '"'. $word. '"';
        }

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
global $LlTeitl;
global $LlLlun1;
global $LlCyfarwyddo;
global $LlFfram;

$xxLlHtmlBrig=
"\xEF\xBB\xBF". '<!DOCTYPE html><html><head>
<style>
xxxp {text-indent:-20px;padding-left:20px;margin-top:-18px;}
p {xxtext-indent:-20px;padding:0px;margin:0px;}
.p1 {font-size:150%;}
.p2 {font-size:70%;}
</style>
</head>
<body style="font-family:Arial;">';




$LlHtmlBrig='
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ian\'s Welsh Class Homework</title>
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
    }
#goodJob {
  display: none;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 160%;
  color: #188715;
  background-color: white;
  padding: 20px 40px;
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
  <h2>Ian\'s Welsh Class - Homework<br/>'.  $pmod. '
  <br/>Enter the password to access the page</h2>
  </center>
  <input type="password" id="password-input" placeholder="Password">
  <!-- button onclick="checkPassword()">Submit</button -->
  <p id="error" style="color: red; display: none;"></p>
</div>

<div id="content">

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
  <span style="font-size:140%;font-weight:bold;">'. $LlGwers .' - Choose the correct words for each sentence</span><br/>
  <span style="font-size:90%;xxfont-weight:bold;">
   Once you have completed all the correct words make a note of the "Success code" and time taken in seconds, and paste them into the Preply chat at <u>https://preply.com/en/messages</u>. <span style="color:red;">If you are having difficulties, please take a screenshot and we will discuss it in class.</span> <!-- b>Note: init=initiator, rs=response, ix=inflexion, nu=noun, ex=exclamation, pn=pronoun, iv=infinitive, ct=connector, av=adverb, ps=preposition, id=idiom, aj=adjective.</b -->

  </span><br/>
  <!--
  <img style="height:300px;" src="file://C:/Users/user/downloads/Copilot_20250925_110423.png"></img> 
  -->
  <img style="height:300px;" src="./'.$LlLlun1. '"></img>

  <div id="sentences"></div>

  <button onclick="checkAnswers()">Check Answers</button>
  <button id="reset-btn">Reset</button>


  <div id="goodJob">🎉 Good Job! 🎉<br/><span style="font-size:70%;">Success Code: <b>' . 

    strtoupper( preg_replace("/\-/", "", $LlGwers . $LlTeitl ))
    .'</b> <br>Time taken: <span id="spsecs"></span> secs</span></div>


  <!-- Include canvas-confetti via CDN -->
  <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

  <script>
    const sentences = [
';






$LlRhwng='
    ];

    // Options for dropdowns
    ';




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

      for (let s of sentences) {
        const div = document.createElement("div");
        div.className = "sentence";

        let answerIndex = 0;

        for (let word of s.text) {
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
          } else if (pronOptions.includes(word)) {
            const select = createSelect(pronOptions, s.answers[answerIndex++]);
            div.appendChild(select);
          } else if (prepOptions.includes(word)) {
            const select = createSelect(prepOptions, s.answers[answerIndex++]);
            div.appendChild(select);
          } else if (nounOptions.includes(word)) {
            const select = createSelect(nounOptions, s.answers[answerIndex++]);
            div.appendChild(select);
          } else {
            const span = document.createElement("span");
            span.textContent = word + " ";
            div.appendChild(span);
          }
        }

        container.appendChild(div);
      }
    }

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


      message.style.display = "block";

      // Trigger confetti explosion
      confetti({
        particleCount: 150,
        spread: 100,
        origin: { y: 0.6 }
      });
    }

    // Initialize
    renderSentences();
  </script>



<script>
  let loadTime = "";

   document.getElementById("password-input").focus();
   document.getElementById("reset-btn").addEventListener("click", () => {
      location.reload();
    });

  const correctPassword = "pass"; // Change this to your desired password

  function checkPassword() {
    const input = document.getElementById("password-input").value;
    //const error = document.getElementById("error");

    console.log (String(input).toLowerCase()  == String(correctPassword).toLowerCase() ); 
    if (String(input).toLowerCase()  == String(correctPassword).toLowerCase() ) {
      document.getElementById("lock-screen").style.display = "none";
      document.getElementById("content").style.display = "block";
      loadTime = Date.now();

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


