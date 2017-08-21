<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
	function _initialize()
	{
		$this->display('./loginhead');
		//$this->display('./left');
	}
//=================================================================================================//
/*登陆*/
//=================================================================================================//
	function index(){
		$User['email'] = @$_POST['Username'] ? $_POST['Username']:'';
    	$User['pass'] = @$_POST['Password'] ? md5($_POST['Password']):'';
        if($User['email']&&$User['pass'])
        {
            if($UserInfo=M('user')->where($User)->find()){
                if(M('ss_user_admin')->where(array('uid'=>$UserInfo['uid']))->find())
                {
                    session('UserInfo',$UserInfo);
                    session('UserLoged',1);
                    $this->success('登录成功！',U('./Admin'));
                }
                else
                    echo "<script>alert('帐号權限不夠,啦啦啦啦...')</script>";
            }
            else
                echo "<script>alert('帐号或密码有误,您再想想...')</script>";
        }
        $this->display('./login');
        $this->display('./foolt');
	}
//=================================================================================================//
/*注冊*/
//=================================================================================================//
   /* function regest(){
        $Email = @$_POST['email'] ? $_POST['email']:'';
        $Username = @$_POST['username'] ? $_POST['username']:'';
        $Password = @$_POST['password'] ? $_POST['password']:'';
        $Passwords = @$_POST['passwords'] ? $_POST['passwords']:'';
        if($_POST)
        {
            if(!$_POST['checked'])
                echo "<script>alert('道不同不相为谋...')</script>";
            elseif(!($Username&&$Password&&$Passwords&&$Email))
                echo "<script>alert('请完整填写资料！')</script>";
            elseif(M('user')->where(array('username'=>$Username))->find())
                echo "<script>alert('账户已存在！')</script>";
            elseif($Password!=$Passwords)
                echo "<script>alert('请确认两次密码！')</script>";
            elseif(strlen($Password)<8)
                echo "<script>alert('密码长度小于八位！')</script>";
            elseif($Userinfo=M('user')->data(array('username'=>$Username,'password'=>md5($Password),'email'=>$Email))->add())
            {
                session('UserInfo',$Userinfo);
                session('UserLoged',1);
                $this->success('注册成功！',U('./Login'));
            }
            else
                echo "<script>alert('注册失败！')</script>";
        }
        $this->display('./regest');
    }*/
//=================================================================================================//
/*找回*/
//=================================================================================================//
    function repassword(){
        $this->display('./repass');
    }
//==================================================================================================//
//*登出*/
//==================================================================================================//
    function logout(){
        session('UserLoged',0);
        session('UserInfo',0);
        $this->redirect('./Login');
    }
}