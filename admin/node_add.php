<?php
require_once '../lib/config.php';
require_once '_check.php';

if(!empty($_POST)){
    $node_name     = $_POST['node_name'];
    $node_type     = $_POST['node_type'];
    $node_server   = $_POST['node_server'];
    $node_method   = $_POST['node_method'];
    $node_info     = $_POST['node_info'];
    $node_status   = $_POST['node_status'];
    $node_order    = $_POST['node_order'];

    $node = new Ss\Node\Node();
    $query = $node->Add($node_name,$node_type,$node_server,$node_method,$node_info,$node_status,$node_order);
    if($query){
        echo ' <script>alert("添加成功!")</script> ';
        echo " <script>window.location='node.php';</script> " ;
    }
}

?>

<!-- =============================================== -->
                <div class="box box-primary">
                    <form role="form" method="post" action="node_add.php">
                        <div class="box-body" style="width:400px">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Node Name" name="node_name" value="" >
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Server IP/Domain" name="node_server" value="" >
                            </div>

                            <div class="form-group">
                                <select class="form-control" name="node_method">
                                    <option selected="selected" value="aes-256-cfb">默认加密方式:aes-256-cfb</option>
                                    <option value="table">table</option>
                                    <option value="rc4">rc4</option>
                                    <option value="rc4-md5">rc4-md5</option>
                                    <option value="salsa20">salsa20</option>
                                    <option value="aes-128-cfb">aes-128-cfb</option>
                                    <option value="aes-192-cfb">aes-192-cfb</option>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control"  name="node_type"  >
                                    <option value="0">默认分类:普通节点</option>
                                    <option value="0">普通节点</option>
                                    <option value="1">高级节点</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <select class="form-control"  name="node_status"  >
                                    <option value="1">状态-可用</option>
                                    <option value="2">状态-維護</option>
                                    <option value="3">状态-停用</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input  type="text" class="form-control" placeholder="排序" name="node_order"  value="" >
                            </div>
                            <div class="form-group">
                                <textarea type="text" class="form-control" placeholder="节点备注信息~~~~ >_<" name="node_info"></textarea>
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" name="action" style="width:100%;" value="add" class="btn btn-primary waves-effect waves-light blue">添加</button>
                        </div>
                    </form>
                </div>