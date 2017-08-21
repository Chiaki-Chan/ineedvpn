<?php
require_once '../lib/config.php';
require_once '_check.php';

if(!empty($_POST)){
    $uid = $_POST['uid'];
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $passwd = $_POST['passwd'];
    $email = $_POST['email'];
    $port = $_POST['port'];
    $transfer_enable = $_POST['transfer_enable'];
    //$invite_num = $_POST['invite_num'];
      
    //更新
    $User = new Ss\User\User($uid);
    if($uid){
        $query = $User->updateUser($name,$email,$pass,$passwd,$port,$transfer_enable/*,$invite_num*/);
    }
    else{
        $query = $User->AddUser($name,$email,$pass,$passwd,$port,$transfer_enable/*,$invite_num*/);
    }
    if($query){
                $ue['code'] = '1';
                $ue['ok'] = '1';
                $ue['msg'] = "修改成功！即将跳转到用户管理列表！";
    }else{
                $ue['code'] = '0';
                $ue['msg'] = "出错了，请重试";
    }
}
print_r(json_encode($ue));
