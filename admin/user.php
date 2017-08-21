<?php
require_once '_main.php';
$Users = new Ss\User\User();
?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <div class="row ace-thumbnails">
                <div class="col-xs-12">
                    <a class="callout bule waves-effect waves-light">
                        <h5>
                            用户管理
                            <small>User Manage</small>
                        </h5>
                    </a>
                    <a class="btn btn-success btn-sm waves-effect waves-light green" data-rel="colorbox" href="user_edit.php">添加</a> 
                    <div class="box">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>ID</th>
                                    <th>賬號/手機號</th>
                                    <th>用户名</th>
                                    <th>端口</th>
                                    <th>总流量</th>
                                    <th>剩余流量</th>
                                    <th>已使用流量</th>
                                    <!--th>邀请人</th-->
                                    <th></th>
                                </tr>
                                <?php
                                $us = $Users->AllUser();
                                $rsi=0;
                                foreach ( $us as $rs ){ $rsi++;?>
                                    <tr>
                                        <td>#<?php echo $rsi; ?></td>
                                        <td><?php echo $rs['email']; ?></td>
                                        <td><?php echo $rs['user_name']; ?></td>
                                        <td><?php echo $rs['port']; ?></td>
                                        <td><?php \Ss\Etc\Comm::flowAutoShow($rs['transfer_enable']); ?></td>
                                        <td><?php \Ss\Etc\Comm::flowAutoShow(($rs['transfer_enable']-$rs['u']-$rs['d'])); ?></td>
                                        <td><?php \Ss\Etc\Comm::flowAutoShow(($rs['u']+$rs['d'])); ?></td>
                                        <!--td>
                                            <?php 
                                            if ( $rs['ref_by'] != 0 ){
                                                $ref_u  = new \Ss\User\UserInfo($rs['ref_by']);
                                                $ref_name = $ref_u->GetUserName();
                                            }

                                            echo $ref_name;
                                            ?>
                                        </td-->
                                        <td>
                                            <a data-rel="colorbox" class="btn btn-info btn-sm waves-effect waves-light blue" href="user_edit.php?uid=<?php echo $rs['uid']; ?>">Edit</a>
                                            <a class="btn btn-danger btn-sm waves-effect waves-light red" href="user_del.php?uid=<?php echo $rs['uid']; ?>" onclick="JavaScript:return confirm('确定删除吗？')">Delete</a>
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
