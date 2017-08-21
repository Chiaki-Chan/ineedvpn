<?php
require_once '../lib/config.php';
require_once '_check.php';
$uid=0;
if(!empty($_GET)){
    //获取id
    $uid = $_GET['uid'];
    $u = new \Ss\User\UserInfo($uid);
    $rs = $u->UserArray();
}

?>

<!-- =============================================== -->

                <!-- general form elements -->
<div class="box box-primary" style="width:400px;height:600px">
<!--h5 class="box-title">Edit - 用户ID: <?php echo $uid;?></h5-->
    <table class="box-body">
        <tr>
            <td><input type="hidden" class="form-control" id="uid" value="<?php echo @$uid?$uid:'';?>"  >
                <a class="btn btn-xs bg-blue waves-effect waves-light " href="#">顯示名</a>
            </td>
            <td>
                <input  type="text"  id="name" value="<?php echo @$rs['user_name']?$rs['user_name']:'';?>" >
            </td>
            <td rowspan="6">
                <div id="msg-success" class="alert alert-info alert-dismissable" style="display: none;">
                    <button type="button" class="close" id="ok-close" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-info"></i> 成功!</h4>
                    <p id="msg-success-p"></p>
                </div>
                <div id="msg-error" class="alert alert-warning alert-dismissable" style="display: none;">
                    <button type="button" class="close" id="error-close" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> 出错了!</h4>
                    <p id="msg-error-p"></p>
                </div>
            </td>
        </tr>
        <tr>
            <td><a class="btn btn-xs bg-blue waves-effect waves-light " href="#">注册賬號</a></td>
            <td><input  type="text" id="email" value="<?php echo @$rs['email']?$rs['email']:'';?>"  ></td></td>
        </tr>
        <tr>
            <td><a class="btn btn-xs bg-blue waves-effect waves-light " href="#">网站密码</a></td>
            <td><input  type="text" id="pass" value="" ></td>
        </tr>
        <tr>
            <td><a class="btn btn-xs bg-blue waves-effect waves-light " href="#">SS连接密码</a></td>
            <td><input type="text"  id="passwd" value="<?php echo @$rs['passwd']?$rs['passwd']:'';?>" ></td>
        </tr>
        <tr>
            <td><a class="btn btn-xs bg-blue waves-effect waves-light " href="#">SS连接端口</a></td>
            <td><input id="port"  type="text"  value="<?php echo @$rs['port']?$rs['port']:'';?>" ></td>
        </tr>
        <tr>
            <td><a class="btn btn-xs bg-blue waves-effect waves-light " href="#">设置流量</a></td>
            <td><input id="transfer_enable" type="text"  value="<?php echo @$rs['transfer_enable']?$rs['transfer_enable']/$togb:'';?>" placeholder="单位为GB，直接输入数值" ></td>
        </tr>
        
        <!--tr>
            <td><a class="btn btn-xs bg-blue waves-effect waves-light " href="#">邀请码数量</a></td>
            <td><input id="invite_num"  value="<?php echo $rs['invite_num'];?>"  ></td>
        </tr-->
        <tr>
            <td colspan="3">
            <div align="center">
                <button type="submit" id="submit" name="submit" style="width:100%;" class="btn-large waves-effect waves-light blue">...Submit</button>
            </div>
            </td>
        </tr>
    </table><!-- /.box-body -->
</div>
<script>
    $(document).ready(function(){
        $("#submit").click(function(){
            $.ajax({
                type:"POST",
                url:"_user_edit.php",
                dataType:"json",
                data:{
                    uid: $("#uid").val(),
                    name: $("#name").val(),
                    pass:$("#pass").val(),
                    email: $("#email").val(),
                    passwd: $("#passwd").val(),
                    port:$("#port").val(),
                    transfer_enable: $("#transfer_enable").val() * 1024 * 1024 * 1024
                    //invite_num: $("#invite_num").val()
                },
                success:function(data){
                    if(data.ok){
                        $("#msg-error").hide(10);
                        $("#msg-success").show(100);
                        $("#msg-success-p").html(data.msg);
                        window.setTimeout("location.href='user.php'", 2000);
                    }else{
                        $("#msg-error").show(100);
                        $("#msg-error-p").html(data.msg);
                    }
                },
                error:function(jqXHR){
                    $("#msg-error").hide(10);
                    $("#msg-error").show(100);
                    $("#msg-error-p").html("发生错误："+jqXHR.status);
                    // 在控制台输出错误信息
                    console.log(removeHTMLTag(jqXHR.responseText));
                }
            })
        })
        $("#ok-close").click(function(){
            $("#msg-success").hide(100);
        })
        $("#error-close").click(function(){
            $("#msg-error").hide(100);
        })
    })
</script>
<script type="text/javascript">
            // 过滤HTML标签以及&nbsp 来自：http://www.cnblogs.com/liszt/archive/2011/08/16/2140007.html
            function removeHTMLTag(str) {
                    str = str.replace(/<\/?[^>]*>/g,''); //去除HTML tag
                    str = str.replace(/[ | ]*\n/g,'\n'); //去除行尾空白
                    str = str.replace(/\n[\s| | ]*\r/g,'\n'); //去除多余空行
                    str = str.replace(/&nbsp;/ig,'');//去掉&nbsp;
                    return str;
            }
</script>
