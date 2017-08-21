<?php
require_once '../lib/config.php';
require_once '_check.php';
$id = $_GET['id'];
$node = new \Ss\Node\NodeInfo($id);
$server =  $node->Server();
$method = $node->Method();
$pass = $oo->get_pass();
$port = $oo->get_port();

$ssurl =  $method.":".$pass."@".$server.":".$port;
$ssqr = "ss://".base64_encode($ssurl);
?>
<!--
<p>ss://<?php echo $ssurl;?></p>
<p id="ssqr_text" ><?php echo $ssqr;?></p>
-->
<div id="qrcode"></div>
<!--<script src="/Public/asset/js/jQuery.min.js"></script>-->
<script src="/Public/asset/js/jquery.qrcode.min.js"></script>
<script>
    jQuery('#qrcode').qrcode("<?php echo $ssqr;?>");
</script>




