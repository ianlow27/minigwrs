<?php
//------------------------------------------------------
function mjemojis($pstr){
$pstr = preg_replace("/\{mjmouth\}/", "🗣", $pstr);
$pstr = preg_replace("/\{mjself\}/", "🔄", $pstr);
$pstr = preg_replace("/\{mjpointleft\}/", "👈", $pstr);
$pstr = preg_replace("/\{mjperson\}/", "🧍", $pstr);







return $pstr;
}//dfunc
?>
