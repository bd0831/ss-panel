<?php
require_once '../lib/config.php';
require_once '_check.php';
$price=$_GET['type'];
$total=$_GET['total'];
$value=$goods[$price];
function randomCode($n) {  
	  $srcstr="ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
	  $strs="";
	  for($i=0;$i<$n;$i++) {  
	    $strs.=$srcstr[rand(0,33)];  
	 }  
	 return $strs;
}
for($i=0;$i<$total;$i++){
	$array[$i]=$price.randomCode(7);
}
$temp="";
foreach ($array as $payCode) {
	$db->insert('recharge',[
		'code'=>$payCode,
		'price'=>$price,
		'value'=>$value
		]);
	$temp.=$payCode.",\n";
}
$str=substr($temp,0,-2);
header('Content-Disposition: attachment; filename="payCode.txt"');
header('Content-Type: text/plain');
header('Content-Length: ' . strlen($str));
header('Connection: close');
echo $str;

?>
