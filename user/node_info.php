<?php
require_once '../lib/config.php';
require_once '_check.php';
$id = $_GET['id'];
$node = new \Ss\Node\NodeInfo($id);
$server =  $node->Server();
$method = $node->Method();
$pass = $oo->get_pass();
$port = $oo->get_port();
?>
<table>
	<tr>
		<td><a class="btn btn-xs bg-blue waves-effect waves-light " href="#">连接地址</a></td>
		<td><input type="text" value="<?php echo $server; ?>"></td>
	</tr>
	<tr>
		<td><a class="btn btn-xs bg-blue waves-effect waves-light " href="#">连接端口</a></td>
		<td><input type="text" value="<?php echo $port; ?>"></td>
	</tr>
	<tr>
		<td><a class="btn btn-xs bg-blue waves-effect waves-light " href="#">连接密码</a></td>
		<td><input type="text" value="<?php echo $pass; ?>"></td>
	</tr>
	<tr>
		<td><a class="btn btn-xs bg-blue waves-effect waves-light " href="#">本地端口</a></td>
		<td><input type="text" value="1080"></td>
	</tr>
	<tr>
		<td><a class="btn btn-xs bg-blue waves-effect waves-light " href="#">加密方式</a></td>
		<td><input type="text" value="<?php echo $method; ?>"></td>
	</tr>
</table>
