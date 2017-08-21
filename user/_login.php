<?php
require_once '../lib/config.php';
$email = $_POST['email'];
$email = strtolower($email);
$passwd = $_POST['passwd'];
$passwd = \Ss\User\Comm::SsPW($passwd);
$rem = $_POST['remember_me'];
$c = new \Ss\User\UserCheck();
$q = new \Ss\User\Query();
if($c->EmailLogin($email,$passwd)){
    $rs['code'] = '1';
    $rs['ok'] = '1';
    $rs['msg'] = "欢迎回来";
    //login success
    if($rem= "week"){
        $ext = 3600*24*7;
    }else{
        $ext = 3600;
    }
    //获取用户id
    $id = $q->GetUidByEmail($email);
    //处理密码
    $pw = \Ss\User\Comm::CoPW($passwd);
    setcookie("user_pwd",$pw,time()+$ext);
    setcookie("uid",$id,time()+$ext);
    setcookie("user_email",$email,time()+$ext);
}else{
    $rs['code'] = '0';
    $rs['msg'] = "手機或密碼錯誤<br/>幫助郵箱:<a href='mailto:help@ineedvpn.net'><b>help@ineedvpn.net</b></a>";
}
echo json_encode($rs);