<?php
$usage = " Usage: php $argv[0] <lesson-number|new-project-name>";

if(!isset($argv[1])){
  echo $usage;
	die();
}

if(!is_numeric($argv[1])){
  echo "Cwrs newydd: ". $argv[1]. "\n";
  $LlTestun=$argv[1];
  sleep(1);
  $cwrs =  "./cwrs_". $LlTestun. "";
  if (file_exists( $cwrs)) {
      echo "Mae'r isblygell $cwrs wedi yn bodoli.\n";
  } else {
      mkdir( $cwrs, 0755);
      echo "Mae'r isblygell $cwrs wedi cael ei chreuwyd yn llwyddiannus.\n";
  }
  //============================================
	// a1
	file_put_contents($cwrs. "/a1", "#!/bin/sh
     file=$(echo \"$(pwd)\" | awk -F'/' '{print \$NF}' | cut -d'_' -f2 )
     php ../amdrin1.php \$file $1 $2 $3");
  //============================================
	// a2
	file_put_contents($cwrs. "/a2", "#!/bin/sh
     file=$(echo \"$(pwd)\" | awk -F'/' '{print \$NF}' | cut -d'_' -f2 )
     php ../amdrin2.php \$file $1 $2 $3");
  //============================================
	// cwrs
	file_put_contents($cwrs. "/cwrs", "#!/bin/sh
     file=$(echo \"$(pwd)\" | awk -F'/' '{print \$NF}' | cut -d'_' -f2 )
     php ../cwrs1a.php \$file $1 $2 $3
     echo \"Note the following modifiers after English words in geirfa23.txt e.g. 'ti	pron	you@sg' that can be specified in stage 'r! a1':\"
     grep @ ../geirfa23.txt |cut -f2 -d@|sed \"s/ //g\" | sed \"s/^/@/g\"| sort|uniq | tr '\n' ' '
     ");
  //============================================
	// trns
	file_put_contents($cwrs. "/trns", "#!/bin/sh
     file=$(echo \"$(pwd)\" | awk -F'/' '{print \$NF}' | cut -d'_' -f2 )
     php ../transcy2kw.php \$file $1 $2 $3");
  //============================================
	// cf3
	file_put_contents($cwrs. "/cf1", "#!/bin/sh
     file=$(echo \"$(pwd)\" | awk -F'/' '{print \$NF}' | cut -d'_' -f2 )
     php ../cfai_amdrin1.php \$file $1 $2 $3");
  //============================================
	// cf2
	file_put_contents($cwrs. "/cf2", "#!/bin/sh
     file=$(echo \"$(pwd)\" | awk -F'/' '{print \$NF}' | cut -d'_' -f2 )
     php ../cfai_amdrin2.php \$file $1 $2 $3");
  //============================================
	// cf3
	file_put_contents($cwrs. "/cf3", "#!/bin/sh
     file=$(echo \"$(pwd)\" | awk -F'/' '{print \$NF}' | cut -d'_' -f2 )
     php ../cfai1.php \$file $1 $2 $3");
  //============================================
	// dws
	file_put_contents($cwrs. "/dws", "#!/bin/sh
     file=$(echo \"$(pwd)\" | awk -F'/' '{print \$NF}' | cut -d'_' -f2 )
     php ../dewisiadau1.php \$file $1 $2 $3");
  //============================================
	// cf3
	file_put_contents($cwrs. "/nw", "#!/bin/sh
     file=$(echo \"$(pwd)\" | awk -F'/' '{print \$NF}' | cut -d'_' -f2 )
     php ../newydd.php  $1 $2 $3");
  //============================================
	// send_email.php for posting test results using dws (dewisiadau1.php)
	file_put_contents($cwrs. "/send_email.php", 
"
<?php
// Check if the 'message' is passed
if(isset(\$_POST['message'])) {
    \$message = \$_POST['message'];
    
    // The recipient email address
    \$to = \"<ENTER EMAIL HERE!!>\";
    
    // Subject of the email
    \$subject = \$_POST['subject'];
    
    // Additional headers
    \$headers = \"From: no-reply@test.com\" . \"\\r\\n\" .
               \"Reply-To: no-reply@test.com\" . \"\\r\\n\" .
               \"X-Mailer: PHP/\" . phpversion();

    // Send the email
    if(mail(\$to, \$subject, \$message, \$headers)) {
        echo \"Email sent successfully!\";
    } else {
        echo \"Failed to send email.\";
    }
} else {
    echo \"No message received.\";
}
?>

");
  //============================================
  //============================================
  //============================================
  //============================================
  $argv1 = 1;
  $lessonNum = sprintf("%03d", $argv1);
  $output = mklession($lessonNum, $argv1);
	file_put_contents($cwrs. "/". $LlTestun, $output);


	echo "Nawr, y cam nesaf yw i 'cd ". $cwrs. "' ac wedyn adolygu y ffeil gyda'r enw '". $LlTestun."' trwy ddefnyddio y adolygydd VI neu VIM sef 'vi ". $LlTestun."', ac wedyn i mewn yn yr adolygydd i redeg 1) 'r! a1', ac wedyn 2) 'r! a2', ac wedyn 3) '!cwrs'.\nAc wedyn, ar ol y cyflawniad o'ch cyntaf modiwl, i ychwangeu y modiwl nesaf ar y gwaelod o'r ffeil trwy redeg y gorchymyn 'r! nw 2' i cydatodi yr ail modiwl, ac ar ol hynny y 3dd, 4dd, ayyb. Peidiwch ag anghofio i ddiweddaru send_mail.php yn y blygell newydd gyda'ch ebost gwirioneddol. \n ";
  die();
}
//===========================================
//===========================================
//===========================================
//===========================================
//===========================================
//===========================================
//===========================================


$lessonNum = sprintf("%03d", $argv[1]);
$argv1 = $argv[1];

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

echo mklession($lessonNum, $argv1);
//===========================================
//===========================================
//===========================================
function mklession($lessonNum, $argv1){

$output = runcmd("figlet ". $lessonNum, "getoutput");
$output =  "\n\n\n\n\n\n\n\n". $output;

$output .=  "|==================================
|cwrs=Welsh Course with Ian <br> Lesson ". $argv1. "
|ffeil=modiwl". $lessonNum. "-1a
|modiwl=". $argv1. "-1a Introduction - Previous Lesson
|teitl=". $argv1. "-1a Cyflwyniad - Gwers Blaenorol
|* Recite the 28 new words from the previous lesson
|* Quick test on random questions from the previous lesson's quiz.
|==================================
|ffeil=modiwl". $lessonNum. "-1b
|modiwl=". $argv1. "-1b Introduction - This Lesson
|teitl=". $argv1. "-1b Cyflwyniad - Y Gwers hwn
|This lesson consists of the following parts:
|". $argv1. "-1) Introduction
|". $argv1. "-2) 28 New Words
|". $argv1. "-3) Grammar Notes
|". $argv1. "-4) Topic: EN_XXXXXXXXXX
|". $argv1. "-5) Reading Exercises
|". $argv1. "-6) Lesson Test
|". $argv1. "-7) Homework
|==================================
|ffeil=modiwl". $lessonNum. "-3
|modiwl=". $argv1. "-3 Grammar Notes
|teitl=". $argv1. "-3 Nodynnau Gramadeg
|1) {*Sut mae*} is a common way of saying \"hi\". If you want to start a conversation in Welsh just say \"Sut mae\". This is pronounced {*Shwmae*} in the South, and {*S'mae*} in the North. {/}
|==================================
|ffeil=modiwl". $lessonNum. "-6
|modiwl=". $argv1. "-6 Lesson Test
|teitl=". $argv1. "-6 Prawf Gwers
|cyfarwyddo=Answer True or False to each of the 15 sentences below:
|1) The plural of brawd (brother) is brawdiau {__}
|==================================
|ffeil=modiwl". $lessonNum. "-7
|modiwl=". $argv1. "-7 Lesson ". $argv1. " Homework
|teitl=". $argv1. "-7 Gwaith Cartref Gwers ". $argv1. "
|Please watch this video which will include all 4 sections below: {lnk:video link:} {/}
|1. Memorize the 28 new words from section ". $argv1. "-2. You will need to be able to recite/sing them to the tune of \"Bah-bah-black-sheep\" at the start of the next lesson.
|2. Review the answers from the quiz in section ". $argv1. "-6.
|3. Review the 28 new words for the next lesson.
|4. Review the grammar notes for the next lesson.
|==================================
//|ffeil=modiwl". $lessonNum. "-4b
//|modiwl=". $argv1. "-4b EN_XXXXXXXX
//|teitl=". $argv1. "-4b CY_XXXXXXX
//|Sut_mae`! Sut wyt_ti? 
//|==================================
Note: ***^a2> prefix allows settings to be read by r! a2
***^a2>ffeil=modiwl". $lessonNum. "-2
***^a2>modiwl=". $argv1. "-2 28 Words
***^a2>teitl=". $argv1. "-2 28 Gair
//`1) achos =  because~conj
|==================================
|ffeil=modiwl". $lessonNum. "-4a
|modiwl=". $argv1. "-4a EN_XXXXXXXX
|teitl=". $argv1. "-4a CY_XXXXXXX
|Hi_there`! Sut wyt_ti? 
|=================================
";

return $output;

}///endfunc


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
