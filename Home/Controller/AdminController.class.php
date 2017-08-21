<?php
namespace Home\Controller;
use Think\Controller;
class AdminController extends Controller {
	function _initialize()
	{
		if($_SESSION['UserInfo']=='' || $_SESSION['UserLoged']=0)
    	{
    		$this->redirect('./Login');
    	}
    	else
    		$this->UserInfo=$UserInfo=M('user')->where(array('email'=>$_SESSION['UserInfo']['email']))->find();
		$this->display('./head');
		$this->display('./top');
		//$this->display('./left');
		//global
		//var_dump($_SESSION['UserInfo']);
		//echo '<br>'.$_SESSION['UserLoged'];
	}
 	function index()
 	{
 		switch($maked=$_GET['maked'])
 		{
 			case '已處理':
 				$SendListForDB=M('application')->where(array('Make'=>1))->select();
 				break;
 			case '已發送':
 				$SendListForDB=M('application')->where(array('Make'=>2))->select();
 				break;
 			case '未處理':
				$SendListForDB=M('application')->where(array('Make'=>0))->select();
 				break;
 			default:
 				$SendListForDB=M('application')->select();
 				$maked='所有';
 				break;
 		}
 		$this->selectnow=$maked;

 		$this->sendinfo=array(
 			'已處理',
 			'已發送',
 			'未處理');
 		$this->Count=$i=count($SendListForDB);$Countmaked=0;$Countumaked=0;$i=$i-1;
 		while ($SendListForDB[$i]) {
 			switch ($SendListForDB[$i]['make']) {
 				case '1':
 					$MakeInfo="<b><font color='green'>已處理</font></b>";
 					//$SentButtonInfo="發送";
 					$Countmaked+=1;
 					break;
 				case '2':
 					$MakeInfo="<b><font color='blue'>已發送</font></b>";
 					//$SentButtonInfo="發送";
 					break;
 				default:
 					$MakeInfo="<b><font color='red'>未處理</font></b>";
 					//$SentButtonInfo="發送";
 					$Countumaked+=1;
 					break;
 			}
 			$SendList[$i]=array(
 				'showid'=>$i+1,
 				'id'=>$SendListForDB[$i]['id'],
 				'previoustel'=>$SendListForDB[$i]['previoustel'],
 				'tel'=>$SendListForDB[$i]['tel'],
 				'newpass'=>$SendListForDB[$i]['newpass'],
 				'makeinfo'=>$MakeInfo,
 				'createtime'=>date("Y年m月d日 H:i:s",$SendListForDB[$i]['createtime'])
 				);
 			if($TempUserInfo=M('user')->where(array('email'=>$SendList[$i]['tel']))->find())
 				$SendList[$i]['port']=$TempUserInfo['port'];
 			$i=$i-1;
 		}
 		//=$i;
 		$this->Countumaked=$Countumaked;
 		$this->Countmaked=$Countmaked; 	
 		//$this->SentButtonInfo=$SentButtonInfo;	
 		$this->SendList=$SendList;
 		$this->display('./sendedlist');
 		$this->display('./foolt');
 	}
 	function delsended($tel,$make)
 	{
 		if($tel=='all')
 		{
 			if($make==1)
 			{
	 			if(M('application')->where(array('Make'=>1))->delete())
	 				$this->success('<font color="green">刪除成功！</font>',U('./Admin'),1);
	 			else
	 				$this->error('<font color="red">刪除失敗！</font>',U('./Admin'),1);
 			}
 			else
 			{
	 			if(M('application')->where(array('id'))->delete())
	 				$this->success('<font color="green">刪除成功！</font>',U('./Admin'),1);
	 			else
	 				$this->error('<font color="red">刪除失敗！</font>',U('./Admin'),1);
 			}
 		}
 		else{
 			if(M('application')->where(array('Tel'=>$tel))->delete())
 				$this->success('<font color="green">刪除成功！</font>',U('./Admin'),1);
 			else
	 				$this->error('<font color="red">刪除失敗！</font>',U('./Admin'),1);
 		}
 	}
 	function makesended($tel)
 	{
 		$liuliang=536870912;
 		if($tel=='all')
 		{
 			$othertel=M('application')->where(array('Make'=>0))->select();
 			$i=0;$igood=0;
 			while ($othertel[$i]){
				$newpass=intval($othertel[$i]['tel'],11)*100000+intval($othertel[$i]['tel'],1)*6 + intval($othertel[$i]['tel'],2)*3 +intval($othertel[$i]['tel'],3)*103+intval($othertel[$i]['tel'],4)*100;
				$newpass=time();
				if(M('user')->data(array(
					'port'=>M('user')->max('port')+1,
					'transfer_enable'=>$liuliang,
					'email'=>$othertel[$i]['tel'],
					'user_name'=>$othertel[$i]['tel'],
					'passwd'=>$newpass,
					'pass'=>md5($newpass)))->add())
 				{
 					M('application')->where(array('tel'=>$othertel[$i]['tel']))->save(array('Make'=>1));
 					$igood++;
 				}	
 				$i++;
 			}
 			$this->success('<font color="green">成功'.$igood.'個!!!</font>',U('./Admin'));
 		}
 		else{
 			$telinfo=M('application')->where(array('tel'=>$tel))->find();
 			if(M('user')->where(array('email'=>$tel))->find())
	 			$this->error('<font color="green">賬號已存在！</font><font color="red">重複！</font>',U('./Admin'),2);
	 		else{
	 			$newpass=740000+intval($tel,1)*3 + intval($tel,2)*53 +intval($tel,3)*150+intval($tel,4)*1010;
	 			if(M('user')->data(array(
	 				'port'=>M('user')->max('port')+1,
	 				'transfer_enable'=>$liuliang,
	 				'email'=>$tel,
	 				'user_name'=>$tel,
	 				'passwd'=>$newpass,
	 				'pass'=>md5($newpass)))->add()){
	 				M('application')->where(array('Tel'=>$tel,'Make'=>0))->save(array('NewPass'=>$newpass,'Make'=>1));
	 				$this->success('<font color="green">修改成功！</font>',U('./Admin'),1);
	 			}
	 			else
	 				$this->error('<font color="red">修改失敗！</font>',U('./Admin'),2);
	 		}
 		}
 	}
 	function makesendedd($tel){
 		if($Telinfo=M('application')->where(array('Tel'=>$tel))->find())
 		{
 			if($Telinfo['make']<>2){
 				if(M('application')->where(array('Tel'=>$tel))->save(array('Make'=>2)))
 					$this->success('<font color="green">修改成功！</font>',U('./Admin'),1);
 				else
 					$this->error('<font color="red">修改失敗！</font>',U('./Admin'),2);
 			}
 			else{
 				if(M('application')->where(array('Tel'=>$tel))->save(array('Make'=>0)))
 					$this->success('<font color="green">修改成功！</font>',U('./Admin'),1);
 				else
 					$this->error('<font color="red">修改失敗！</font>',U('./Admin'),2);
 			}
 		}
 	}
 	function other(){
 		echo M('user')->max('port');
 	}
//==================================================================================================//
//*修改个人信息*/
//==================================================================================================//
 	/*function reinfo(){
 		if($_POST)
 		{
 			$NewUserInfo['username']=@$_POST['Username'] ? $_POST['Username']:'';
 			$NewUserInfo['email']=@$_POST['Email'] ? $_POST['Email']:'';
 			$Password=@$_POST['Password'] ?$_POST['Password']:'';
 			$Passwords=@$_POST['Passwords'] ? $_POST['Passwords']:'';
 			$OldPassword=@$_POST['OldPassword'] ?$_POST['OldPassword']:'';
 			$NewUserInfo['vpnuser']=@$_POST['VPNUser'] ? $_POST['VPNUser']:'';
 			$NewUserInfo['vpnport']=@$_POST['VPNPort'] ? $_POST['VPNPort']:'';
 			$NewUserInfo['vpnpass']=@$_POST['VPNPass'] ? $_POST['VPNPass']:'';
 			if($Password)
 			{
 				if($Password!=$Passwords){
 					$passinfo="密码未修改！";
                	echo "<script>alert('请确认两次密码！')</script>";
 				}
                elseif(M('user')->where(array('password'=>md5($OldPassword)))->find())
                	$NewUserInfo['password']=md5($Password);
                else{
 					$passinfo=$passinfo."旧密码错误！";
                }
 			}
 			if(M('user')->where(array('username'=>$NewUserInfo['username']))->save($NewUserInfo))
 				echo "<script>alert('修改成功！".$passinfo."')</script>";
 			else
 				echo "<script>alert('修改失败！".$passinfo."')</script>";
 			$this->UserInfo=$UserInfo=M('user')->where(array('username'=>$NewUserInfo['username']))->find();
 		}
 		$this->display('./reinfo');
 		$this->display('./foolt');
 	} */
//==================================================================================================//
//*服務器列表*/
//==================================================================================================//	
 	function serverlist($text="aaa")
 	{
 		print_r($text);
 	}
}