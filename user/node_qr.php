<?php
require_once '../lib/config.php';
require_once '_check.php';

function encode($str){
	return str_replace('=','',base64_encode($str));
}
$id = $_GET['id'];
$node = new \Ss\Node\NodeInfo($id);
$array=$node->NodeArray();
$server = $array['node_server'];
$method = $array['node_method'];
$protocol=$array['node_protocol'];
$protocol_param=$array['node_protocol_param'];
$obfs=$array['node_obfs'];
$obfs_param=$array['node_obfs_param'];
$pass = $oo->get_pass();
$port = $oo->get_port();
$name = $array['node_name'];



$ssrurl = $server.":".$port.":".$protocol.":".$method.":".$obfs.":".encode($pass)."/?obfsparam=".encode($obfs_param)."&protoparam=".encode($protocol_param)."&remarks=".encode($name)."&group=".encode($site_url);
$ssrqr = "ssr://".encode($ssrurl);
?>
<div style="width: 70%;word-wrap:break-word;word-break: normal;"><?php echo $ssrqr;?></div>

<div align="center">
    <div id="qrcode"></div>
</div>

<script src="../asset/js/jQuery.min.js"></script>
<script src="../asset/js/jquery.qrcode.min.js"></script>
<script>
    jQuery('#qrcode').qrcode("<?php echo $ssrqr;?>");
</script>


