<?php
require_once '_main.php';
$node = new Ss\Node\Node();
?>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <a class="callout bule waves-effect waves-light">
            <h5>
                节点列表
                <small>Node List</small>
            </h5>
            <p>请勿在任何地方公开节点地址！</p>
        </a>

        <!-- Main content -->
        <section class="content">
            <!-- START PROGRESS BARS -->
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-solid">
                        <div class="box-header">
                            <i class="fa fa-th-list"></i>
                            <h3 class="box-title">标准节点</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <?php
                            $node0 = $node->NodesArray(0);
                            foreach($node0 as $row){
                                ?>
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs pull-right">
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                操作 <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu ace-thumbnails">
                                                <li>
                                                    <a role="menuitem" data-rel="colorbox" href="node_info.php?id=<?php echo $row['id']; ?>">
                                                        配置信息</a>
                                                </li>
                                                <li>
                                                    <a role="menuitem" data-rel="colorbox" href="node_qr.php?id=<?php echo $row['id']; ?>">
                                                        二维码
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="pull-left header"><i class="fa fa-angle-right"></i> <?php echo $row['node_name']; ?></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1-1">
                                            <p> <a class="btn btn-xs bg-blue waves-effect waves-light margin" href="#">IP:</a> <code><?php echo $row['node_server']; ?></code>
                                                <?php
                                                    if($row['node_status']=='1')
                                                        echo '<a class="btn btn-xs bg-blue waves-effect waves-light margin" href="#">可用</a>';
                                                    elseif($row['node_status']=='2')
                                                        echo '<a class="btn btn-xs bg-orange waves-effect waves-light margin" href="#">維護</a>';
                                                    elseif($row['node_status']=='3')
                                                        echo '<a class="btn btn-xs bg-red waves-effect waves-light margin" href="#">停用</a>';
                                                    else
                                                        echo '<a class="btn btn-xs bg-orange waves-effect waves-light margin" href="#">未知</a>';
                                                 ?>
                                                <a class="btn btn-xs bg-green waves-effect waves-light margin"  href="#"><?php echo $row['node_method']; ?></a>
                                            </p>
                                            <p> <?php echo $row['node_info']; ?></p>
                                        </div><!-- /.tab-pane -->
                                    </div><!-- /.tab-content -->
                                </div><!-- nav-tabs-custom -->
                            <?php }?>
                        </div><!-- /.box-body -->


                    </div><!-- /.box -->
                </div><!-- /.col (left) -->

                <div class="col-md-6">
                    <div class="box box-solid">
                        <div class="box-header">
                            <i class="fa fa-code"></i>
                            <h3 class="box-title">高级节点</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                        <?php
                            $node1 = $node->NodesArray(1);
                            foreach($node1 as $row){
                                ?>
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs pull-right">
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                操作 <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu ace-thumbnails">
                                                <li role="presentation">
                                                    <a role="menuitem" data-rel="colorbox" href="node_info.php?id=<?php echo $row['id']; ?>">配置信息</a></li>
                                                <li role="presentation">
                                                    <a role="menuitem" data-rel="colorbox" href="node_qr.php?id=<?php echo $row['id']; ?>">二维码</a></li>
                                            </ul>
                                        </li>
                                        <li class="pull-left header"><i class="fa fa-angle-right"></i> <?php echo $row['node_name']; ?></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1-1">
                                            <p> <a class="btn btn-xs bg-blue waves-effect waves-light margin" href="#">IP:</a> <code><?php echo $row['node_server']; ?></code>
                                                <?php
                                                    if($row['node_status']=='1')
                                                        echo '<a class="btn btn-xs bg-blue waves-effect waves-light margin" href="#">可用</a>';
                                                    elseif($row['node_status']=='2')
                                                        echo '<a class="btn btn-xs bg-orange waves-effect waves-light margin" href="#">維護</a>';
                                                    elseif($row['node_status']=='3')
                                                        echo '<a class="btn btn-xs bg-red waves-effect waves-light margin" href="#">停用</a>';
                                                    else
                                                        echo '<a class="btn btn-xs bg-orange waves-effect waves-light margin" href="#">未知</a>';
                                                 ?>
                                                <a class="btn btn-xs bg-green waves-effect waves-light margin" href="#"><?php echo $row['node_method']; ?></a>
                                            </p>
                                            <p> <?php echo $row['node_info']; ?></p>
                                        </div><!-- /.tab-pane -->
                                    </div><!-- /.tab-content -->
                                </div><!-- nav-tabs-custom -->
                            <?php }?>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col (right) -->
                 
            </div><!-- /.row -->
            <!-- END PROGRESS BARS -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<?php
require_once '_footer.php'; ?>
