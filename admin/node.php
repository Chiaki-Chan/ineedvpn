<?php
require_once '_main.php';
$node = new Ss\Node\Node();
?>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="row ace-thumbnails">
                <div class="col-xs-12">
                    <a class="callout bule waves-effect waves-light">
                        <h5>
                            節點列表
                            <small>Node List</small>
                        </h5>
                    </a>
                    <a data-rel="colorbox" class="btn btn-success btn-sm waves-effect waves-light green" href="node_add.php">添加</a>
                    <div class="box">
                        <div class="box-body table-responsive no-padding waves-effect waves-light" style="width:100%">
                            <table class="table table-hover">
                                <tr>
                                    <th>ID</th>
                                    <th>命名</th>
                                    <th>地址</th>
                                    <th>加密</th>
                                    <th>描述</th>
                                    <th>檔次</th>
                                    <th>排序</th>
                                    <th></th>
                                </tr>
                                <?php
                                $n = new \Ss\Node\Node();
                                $nodes = $n->AllNode();
                                foreach($nodes as $rs){ ?>
                                    <tr>
                                        <td>#<?php echo $rs['id']; ?></td>
                                        <td> <?php echo $rs['node_name']; ?></td>
                                        <td> <?php echo $rs['node_server']; ?></td>
                                        <td> <?php echo $rs['node_method']; ?></td>
                                        <td><?php echo $rs['node_info']; ?></td>
                                        <td><?php echo(@$rs['node_type']?"<b><font color='red'>高級</font></b>":"普通"); ?></td>
                                        <td><?php echo $rs['node_order']; ?></td>
                                        <td>
                                            <a data-rel="colorbox" class="btn btn-info btn-sm waves-effect waves-light blue" href="node_edit.php?id=<?php echo $rs['id']; ?>">Edit</a>
                                            <a class="btn btn-danger btn-sm waves-effect waves-light red" href="node_del.php?id=<?php echo $rs['id']; ?>">Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<?php
require_once '_footer.php'; ?>
