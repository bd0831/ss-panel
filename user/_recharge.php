<?php
require_once '../lib/config.php';
require_once '_check.php';
$payCode=$_POST['payCode'];
$pay=new \Ss\Etc\Pay();
$ret=$pay->recharge($payCode,$uid);
if($ret>0){
	$a['ok']=1;
	$a['msg']=$a['msg']="充值成功，获得".$ret."GB流量";
	$oo->add_transfer($ret*1024*$tomb);
	$oo->add_disable_date(3600*24*30);
	$oo->setEnable();
}else{
	$a['msg']="充值码无效";
}
echo json_encode($a);



