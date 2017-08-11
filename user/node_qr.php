<?php
require_once '../lib/config.php';
require_once '_check.php';

$id = $_GET['id'];
$node = new \Ss\Node\Node();
$ssrqr=$node->getSSRUrl($id);
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


