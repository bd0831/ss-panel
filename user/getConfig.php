<?php
require_once '../lib/config.php';
require_once '_check.php';
$node = new Ss\Node\Node();
$node0 = $node->NodesArray(0);

$array=[];
foreach ($node0 as $i) {
	$con['server']=$i['node_server'];
	$con['server_port']=intval($oo->get_port());
	$con['method']=$i['node_method'];
	$con['obfs']=$i['node_obfs'];
	$con['obfsparam']=$i['node_obfs_param'];
	$con['protocol']=$i['node_protocol'];
	$con['protocolparam']=$i['node_protocol_param'];
	$con['password']=$oo->get_pass();
	$con['group']=$site_url;
	$con['remarks']=$i['node_name'];
	$con['enable']=true;
	$con['remarks_base64']=base64_encode($i['node_name']);
	$array[]=$con;
}
$config=array("configs"=>$array);
$str=json_encode($config,JSON_PRETTY_PRINT);

header('Content-Disposition: attachment; filename="gui-config.json"');
header('Content-Type: text/plain');
header('Content-Length: ' . strlen($str));
header('Connection: close');
echo $str;


//       "obfsparam" : "obfsP",
//       "enable" : true,
//       // "server_port" : 10000,
//       // "protocol" : "auth_chain_a",
//       // "server" : "si.ssfly.club",
//       "remarks_base64" : "5aSH5rOo",
//       // "password" : "m",
//       "group" : "group",
//       "obfs" : "tls1.2_ticket_auth",
//       "protocolparam" : "protoP",
//       "remarks" : "备注",
//       "method" : "none"

//         $server = $array['node_server'];
// $method = $array['node_method'];
// $protocol=$array['node_protocol'];
// $protocol_param=$array['node_protocol_param'];
// $obfs=$array['node_obfs'];
// $obfs_param=$array['node_obfs_param'];