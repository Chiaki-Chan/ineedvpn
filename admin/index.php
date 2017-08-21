<?php
require_once '_main.php';
$ssmin = new \Ss\Etc\Ana();
$mt = $ssmin->getMonthTraffic();
$mt = $mt/$togb;
$mt = round($mt,3);
$active_user = $ssmin->activedUserCount();
$all_user = $ssmin->allUserCount();
$node_count = $ssmin->nodeCount();
?>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) --> <!--col-xs-6-->
            <div class="row">
                <div class="col-lg-3" style="width:50%">
                    <!-- small box -->
                    <a href="node.php" class="small-box-footer">
                        <div class="small-box bg-aqua col-xs-12 waves-effect waves-light">
                            <div class="inner">
                                <h3>
                                    <?php  echo $node_count; ?>
                                </h3>
                                <p>
                                    节点
                                </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-cloud"></i>
                            </div>
                            管理 <i class="fa fa-arrow-circle-right"></i>
                        </div>
                    </a>
                </div><!-- ./col -->

                <div class="col-lg-3" style="width:50%">
                    <!-- small box -->
                    <a href="user.php" class="small-box-footer">
                        <div class="small-box bg-yellow col-xs-12 waves-effect waves-light">
                            <div class="inner">
                                <h3>
                                    <?php  echo $all_user; ?>
                                </h3>
                                <p>
                                    用户
                                </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            查看 <i class="fa fa-arrow-circle-right"></i>
                        </div>
                    </a>
                </div><!-- ./col -->
                
            </div><!-- /.row -->
            <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title"><?php echo $site_name; ?> 统计信息</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <p><?php echo $site_name;  ?>已经产生流量<code><?php echo $ssmin->getTrafficGB(); ?></code>GB。</p>
                            <p>注册用户：<code><?php echo $ssmin->allUserCount();?> </code></p>
                            <p>已经有<code><?php echo $ssmin->activedUserCount();?></code>个用户使用了<?php echo $site_name; ?>服务。</p>
                            <p>签到用户：<code><?php echo   $ssmin->checkinUser(time()); ?></code></p>
                            <p>24小时签到用户：<code><?php echo   $ssmin->CheckInUser(3600*24); ?></code></p>
                            <p>实时在线人数：<code><?php echo $ssmin->onlineUserCount(10);?></code>。</p>
                            <p>过去1小时在线人数：<code><?php echo $ssmin->onlineUserCount(3600);?></code>。</p>
                            <p>过去5分钟在线人数：<code><?php echo $ssmin->onlineUserCount(300);?></code>。</p>
                            <p>过去1分钟在线人数：<code><?php echo $ssmin->onlineUserCount(60);?></code>。</p>
                            <p>过去24小时在线人数：<code><?php echo $ssmin->onlineUserCount(3600*24);?></code>。</p>
                            <!--p>当前时间：<?php  echo  date("Y-m-d H:i",time()); ?></p-->
                            <!--p>当前版本：<code><?php echo $version; ?></code></p-->
                        </div><!-- /.box -->
                </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<?php
require_once '_footer.php'; ?>



