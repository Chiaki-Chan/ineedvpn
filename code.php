<?php
require_once 'lib/config.php';
include_once 'Public/Template/header.html';
$c = new \Ss\User\Invite();
?>

<div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <br><br>
            <a href="./index.php"><h1 class="header center blue-text"><?php echo $site_name; ?></h1></a>
        </div>
</div>


<div class="container">
    <div class="section"> 
        <!--   Icon Section   -->
        <div class="row">
            <div class="row marketing">
                <div class="icon-block">
                    <h2 class="center light-blue-text"><i class="material-icons">flash_on</i></h2>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr class="center light-blue-text">
                            <th>###</th>
                            <th>邀请码</th>
                            <th>状态</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $datas = $c->CodeArray(); 
                        foreach($datas as $data ){
                            ?>
                            <tr>
                                <td><?php echo $data['id'];?></td>
                                <td><?php echo $data['code'];?></td>
                                <td>可用</td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>  
</div>
<?php  include_once 'ana.php';
include_once 'footer.php';?>
