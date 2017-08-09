<?php
require_once '../lib/config.php';
require_once '_check.php';
$payCode=$_POST['payCode'];
$a['msg']='';
if(!$db->has('recharge',["AND"=>['code'=>$payCode,'uid'=>'0']])){
	$a['msg']="充值码无效";
}else{
	$data=$db->select('recharge',[
		'id','value'
		],["AND"=>[
		'code'=>$payCode,
		'uid'=>'0'
		]],[
		'limit'=>'1'
		])[0];
	$db->update('recharge',[
		'uid'=>$oo->uid,
		'time'=>time()
		],[
			'id'=>$data['id']
		]);
	$db->update('user',[
		'enable'=>1
		],[
		'uid'=>$oo->uid
		]);
	$oo->add_transfer($data['value']*1024*$tomb);
	$a['msg']="充值成功，获得".$data['value']."GB流量";
}
echo json_encode($a);