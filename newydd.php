<?php
$usage = " Usage: php $argv[0] <lesson-number> ";

if(!isset($argv[1])){
  echo $usage;
	die();
}
$lessonNum = sprintf("%03d", $argv[1]);

if(isset($argv[1])){
  //-----------------------------------------
  if($argv[1]=="-h"){            // Option -h
    echo $usage;
  //-----------------------------------------
  }else if($argv[1]=="-newgit"){ // Option -newgit
    newlocalgit(); 
  //-----------------------------------------
  }else if($argv[1]=="-upddep"){ // Option -upddepend  !!
  //-----------------------------------------
  }else if($argv[1]=="-adddep"){ // Option -adddepend  !!
    echo "Please enter the relative path to the dependent file: "; $depfile = trim(readline());
    if(!file_exists($depfile)){
//if(False){
      echo "ERROR: Sorry, this file does not exist!";
      return; 
    }
  }
}

$output = runcmd("figlet ". $lessonNum, "getoutput");
echo "\n\n\n\n\n\n\n\n". $output;

echo "|==================================
|cwrs=Welsh Course with Ian <br> Lesson ". $argv[1]. "
|ffeil=gwers". $lessonNum. "-1a
|gwers=". $argv[1]. "-1a Introduction - Previous Lesson
|teitl=". $argv[1]. "-1a Cyflwyniad - Gwers Blaenorol
|* Recite the 28 new words from the previous lesson
|* Quick test on random questions from the previous lesson's quiz.
|==================================
|ffeil=gwers". $lessonNum. "-1b
|gwers=". $argv[1]. "-1b Introduction - This Lesson
|teitl=". $argv[1]. "-1b Cyflwyniad - Y Gwers hwn
|This lesson consists of the following parts:
|". $argv[1]. "-1) Introduction
|". $argv[1]. "-2) 28 New Words
|". $argv[1]. "-3) Grammar Notes
|". $argv[1]. "-4) Topic: EN_XXXXXXXXXX
|". $argv[1]. "-5) Reading Exercises
|". $argv[1]. "-6) Lesson Test
|". $argv[1]. "-7) Homework
|==================================
|ffeil=gwers". $lessonNum. "-3
|gwers=". $argv[1]. "-3 Grammar Notes
|teitl=". $argv[1]. "-3 Nodynnau Gramadeg
|1) {*Sut mae*} is a common way of saying \"hi\". If you want to start a conversation in Welsh just say \"Sut mae\". This is pronounced {*Shwmae*} in the South, and {*S'mae*} in the North. {/}
|==================================
|ffeil=gwers". $lessonNum. "-6
|gwers=". $argv[1]. "-6 Lesson Test
|teitl=". $argv[1]. "-6 Prawf Gwers
|cyfarwyddo=Answer True or False to each of the 15 sentences below:
|1) The plural of brawd (brother) is brawdiau {__}
|==================================
|ffeil=gwers". $lessonNum. "-7
|gwers=". $argv[1]. "-7 Lesson ". $argv[1]. " Homework
|teitl=". $argv[1]. "-7 Gwaith Cartref Gwers ". $argv[1]. "
|Please watch this video which will include all 4 sections below: {lnk:video link:} {/}
|1. Memorize the 28 new words from section ". $argv[1]. "-2. You will need to be able to recite/sing them to the tune of \"Bah-bah-black-sheep\" at the start of the next lesson.
|2. Review the answers from the quiz in section ". $argv[1]. "-6.
|3. Review the 28 new words for the next lesson.
|4. Review the grammar notes for the next lesson.
|==================================
|ffeil=gwers". $lessonNum. "-4a
|gwers=". $argv[1]. "-4a EN_XXXXXXXX
|teitl=". $argv[1]. "-4a CY_XXXXXXX
|Hi_there`! Sut wyt_ti? 
|==================================
|ffeil=gwers". $lessonNum. "-4b
|gwers=". $argv[1]. "-4b EN_XXXXXXXX
|teitl=". $argv[1]. "-4b CY_XXXXXXX
|Sut_mae`! Sut wyt_ti? 
|==================================
`ffeil=gwers". $lessonNum. "-2
`gwers=". $argv[1]. "-2 28 Words
`teitl=". $argv[1]. "-2 28 Gair
`1) achos =  because~conj
`=================================
";



//----------------------------------
function runcmd($cmd, $popt){
  $output = null;
  $retval = null;
	if($popt != "getoutput"){
    echo "In function 'runcmd()' running command: [". $cmd."]\n";
	}
  exec($cmd, $output, $retval);

	if($popt == "getoutput"){
		$retval = "";
		foreach($output as $line){
      $retval .= $line. "\n";
		}
		return $retval;
	}

  echo "runcmd() retval: ".$retval. " - ";
  if(!$retval){
    echo "SUCCESS";
    if(isset($output[0])){
      echo " - output value: ".$output[0]. "\n";
      return $output[0];
    }
    echo "\n";
    return "success";
  }else {
    echo "FAILURE\n";
  }
  return "failure";
}//endfunc
//----------------------------------
?>
