<?php
require_once '../lib/config.php';
require_once '_check.php';

//更新
if(!empty($_POST)){
    $node_id       = $_POST['node_id'];
    $node_name     = $_POST['node_name'];
    $node_type     = $_POST['node_type'];
    $node_server   = $_POST['node_server'];
    $node_method   = $_POST['node_method'];
    $node_info     = $_POST['node_info'];
    $node_status   = $_POST['node_status'];
    $node_order    = $_POST['node_order'];
    $node = new \Ss\Node\NodeInfo($node_id);
    $query = $node->Update($node_name,$node_type,$node_server,$node_method,$node_info,$node_status,$node_order);
    if($query){
        echo ' <script>alert("更新成功!")</script> ';
        echo " <script>window.location='node.php';</script> " ;
    }
}

if(!empty($_GET)){
    //获取id
    $id = $_GET['id'];
    $node = new \Ss\Node\NodeInfo($id);
    $rs = $node->NodeArray();
}

?>

<!-- =============================================== -->
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- form start -->
                    <form role="form" method="post" action="node_edit.php">
                        <table class="box-body">
                            <tr class="form-group" style="display:none" >
                                <td><a class="btn btn-xs bg-orange waves-effect waves-light margin">ID</a></td>
                                <td><input type="text" class="form-control" name="node_id" value="<?php echo $id;?>"  ></td>
                            </tr>
                            <tr class="form-group">
                                <td><a class="btn btn-xs bg-orange waves-effect waves-light margin">主机名称</a></td>
                                <td><input type="text" class="form-control" name="node_name" value="<?php echo $rs['node_name'];?>" ></td>
                            </tr>

                            <tr class="form-group">
                                <td><a class="btn btn-xs bg-orange waves-effect waves-light margin">主机地址</a></td>
                                <td><input type="text" class="form-control" name="node_server" value="<?php echo $rs['node_server'];?>" ></td>
                            </tr>
                            <tr class="form-group">
                                <td><a class="btn btn-xs bg-orange waves-effect waves-light margin">加密方式</a></td>
                                <td><select class="form-control" name="node_method" >
                                    <option value="<?php echo $rs['node_method'];?>"><?php echo $rs['node_method'];?></option>
                                    <option value="table">table</option>
                                    <option value="rc4">rc4</option>
                                    <option value="rc4-md5">rc4-md5</option>
                                    <option value="salsa20">salsa20</option>
                                    <option value="aes-128-cfb">aes-128-cfb</option>
                                    <option value="aes-192-cfb">aes-192-cfb</option>
                                    <option value="aes-256-cfb">aes-256-cfb</option>
                                </select></td>
                            </tr>
                            <tr class="form-group">
                                <td><a class="btn btn-xs bg-blue waves-effect waves-light margin">当前分类</a></td>
                                <td><select class="form-control"  name="node_type"  >
                                    <option value="<?php echo $rs['node_type'];?>"><?php echo @$rs['node_type']?'高级节点':'普通节点';?></option>
                                    <option value="0">普通节点</option>
                                    <option value="1">高级节点</option>
                                </select></td>
                            </tr>
                            <tr class="form-group">
                                <td><a class="btn btn-xs bg-blue waves-effect waves-light margin">当前状态</a></td>
                                <td>
                                    <select class="form-control"  name="node_status"  >
                                        <option value="<?php echo $rs['node_status'];?>"><?php
                                            echo "當前爲[";
                                            switch ($rs['node_status']) {
                                                case '1':
                                                    echo '可用';
                                                    break;
                                                case '2':
                                                    echo '維護';
                                                    break;
                                                case '3':
                                                    echo '停用';
                                                    break;
                                            }
                                            echo "]";
                                        ?></option>
                                        <option value="1">可用</option>
                                        <option value="2">維護</option>
                                        <option value="3">停用</option>
                                    </select>
                                </td>
                            </tr>

                            <tr class="form-group">
                                <td><a class="btn btn-xs bg-blue waves-effect waves-light margin">当前排序</a></td>
                                <td><input  type="text" class="form-control" name="node_order"  value="<?php echo $rs['node_order'];?>" ></td>
                            </tr>
                            <tr class="form-group">
                                <td><a class="btn bg-blue waves-effect waves-light margin">节点描述</a></td>
                                <td><textarea class="form-control" placeholder="节点备注信息~~~~ >_<" name="node_info"><?php echo $rs['node_info'];?></textarea></td>
                            </tr>
                        </table><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" style="width:100%;" name="action" value="edit" class="btn btn-primary waves-effect waves-light blue">...修改</button>
                        </div>
                    </form>
                </div>